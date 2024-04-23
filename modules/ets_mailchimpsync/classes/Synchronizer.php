<?php
/**
 * Copyright ETS Software Technology Co., Ltd
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
 */

if (!defined('_PS_VERSION_')) { exit; }

require_once dirname(__FILE__) . '/User.php';

/**
 * MailChimp Sync Class
 *
 * This is the base class for any syncronization.  You cannot instantiate this
 * class as it is.  Either subclass it or use one of the provided implementations.
 *
 * @category  Galahad
 * @package   Galahad_MailChimp
 * @copyright Copyright (c) 2009 Chris Morrell <http://cmorrell.com>
 * @license   GPL <http://www.gnu.org/licenses/>
 */
abstract class Galahad_MailChimp_Synchronizer
{
    /**
     * MailChimp API Object
     *
     * @var MCAPI
     */
    protected $_mailChimp;

    /**
     * Default options for MailChimp API calls
     *
     * @var array
     */
    protected $_mailChimpOptions = array(
        'doubleOptIn' => false,
        'replaceInterests' => true,
        'sendGoodby' => false,
        'sendNotify' => false,
    );

    /**
     * Number of addresses to handle in batch
     *
     * @var int
     */
    protected $_batchSize = 500;

    /**
     * Log of all batch operations
     *
     * @var array
     */
    protected $_batchLog = array();

    /**
     * Log of all batch errors
     *
     * @var array
     */
    protected $_batchErrors = array();

    /**
     * List of users that should be updated at MailChimp
     *
     * @var string
     */
    protected $_updateUsers = array();

    /**
     * Constructor
     *
     * @param string $mailChimpUser
     * @param string $mailChimpPassword
     */
    public function __construct($mcApiKey, $batchSize = 500)
    {
        if (!class_exists('MCAPI')) {
            throw new Galahad_MailChimp_Synchronizer_Exception('The MailChimp MCAPI class is required to use Galahad_MailChimp_Synchronizer.');
        }

        $this->_mailChimp = new MCAPI($mcApiKey);
        $this->setBatchSize($batchSize);
    }

    /**
     * Sync databases
     *
     */
    public function sync($listId, $unsubscribe = false)
    {
        $this->processMailChimpUsers($listId);
        $this->processLocalUsers($listId);
        if ($unsubscribe) {
            $this->prestashopunsubscribers($listId);
        }
        return true;
    }

    public function setBatchSize($batchSize)
    {
        $batchSize = (int)$batchSize;
        if ($batchSize < 1) {
            throw new Galahad_MailChimp_Synchronizer_Exception('Invalid batch size!');
        }

        $this->_batchSize = $batchSize;
    }

    public function setMailChimpOptions($options = array())
    {
        $this->_mailChimpOptions = array_merge($this->_mailChimpOptions, $options);
    }

    public function getBatchLog()
    {
        return $this->_batchLog;
    }

    public function getBatchErrorLog()
    {
        if (!count($this->_batchErrors)) {
            return false;
        }

        return $this->_batchErrors;
    }

    /**
     * Gets a iterators of users
     *
     * @param string $listId
     * @return Iterator
     */
    abstract protected function getUsers($batchNumber, $listId = null);

    /**
     * Determines if a user exists
     *
     * @param string $email
     * @param string $listId
     * @return bool
     */
    abstract protected function userExists($email, $listId = null);

    /**
     * Runs through all the MailChimp users for a given list
     *
     * @param string $listId
     */
    protected function processMailChimpUsers($listId)
    {
        $unsubscribers = array();
        $start = 0;

        do {
            $batch = $this->_mailChimp->listMembers($listId, 'subscribed', null, $start, $this->_batchSize);
            $start++;
            if ($batch)
                foreach ($batch as $row) {
                    if (!$this->userExists($row['email'], $listId))
                        $unsubscribers[] = $row['email'];
                }
        } while (count($batch) == $this->_batchSize);

        unset($batch);
        unset($unsubscribers);
    }

    protected function mailchimpUnsubscribers($listId)
    {
        $start = 0;
        do {
            $batch = $this->_mailChimp->listMembers($listId, 'unsubscribed', null, $start, $this->_batchSize);
            $start++;
            foreach ($batch as $row)
                $this->unsubscribeFromPrestashop($row['email']);
        } while (count($batch) == $this->_batchSize);

        unset($batch);
    }

    protected function unsubscribeFromPrestashop($email)
    {
        if (Db::getInstance()->autoExecute(_DB_PREFIX_ . 'customer', array('newsletter' => 0), 'UPDATE', 'email LIKE \'' . pSQL($email) . '\''))
            return true;
        if (Db::getInstance()->delete(_DB_PREFIX_ . 'newsletter', 'email = \'' . pSQL($email) . '\'', 1))
            return true;
        else
            echo Db::getInstance()->getMsgError();
        return true;
    }

    protected function prestashopunsubscribers($listId)
    {
        $emails = array();
        $unsubscribers = Db::getInstance()->executeS('SELECT email FROM `' . _DB_PREFIX_ . 'customer` WHERE newsletter = 0');
        foreach ($unsubscribers as $unsubscriber)
            $emails[] = $unsubscriber['email'];
        if (is_array($emails) && !empty($emails))
            $this->_mailChimp->listBatchUnsubscribe($listId, $emails, true, false, false);
        unset($emails);
        return true;
    }

    /**
     * Runs through all local users for a given list
     *
     * @param string $listId
     */
    protected function processLocalUsers($listId)
    {
        $batch = 0;

        while ($users = $this->getUsers($batch++, $listId))
        {
            $batchResult = $this->_mailChimp->listBatchSubscribe($listId, $users, $this->_mailChimpOptions['doubleOptIn'], true, true);
            if ($this->_mailChimp->errorCode) {
                if (class_exists('Galahad_MailChimp_Synchronizer_Exception'))
                    throw new Galahad_MailChimp_Synchronizer_Exception('Error with batch subscribe: ' . $this->_mailChimp->errorMessage);
            } else {
                $this->_batchLog[] = "Subscribe Batch {$batch}: {$batchResult['success_count']} Succeeded";
                $this->_batchLog[] = "Subscribe Batch {$batch}: {$batchResult['error_count']} Failed";
                if ($batchResult['error_count'])
                    $this->_batchErrors["Subscribe Batch {$batch}"] = $batchResult['errors'];
            }
        }
    }
}