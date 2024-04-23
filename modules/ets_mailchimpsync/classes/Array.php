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

require_once dirname(__FILE__) . '/Synchronizer.php';

/** @see Galahad_MailChimp_User */
require_once dirname(__FILE__) . '/User.php';

/**
 * Array Synchronizer
 *
 * Mostly used for testing and example purposes.  Takes an
 * array of users and lets you sync with your MailChimp account.
 *
 * @category  Galahad
 * @package   Galahad_MailChimp
 * @copyright Copyright (c) 2009 Chris Morrell <http://cmorrell.com>
 * @license   GPL <http://www.gnu.org/licenses/>
 */
class Galahad_MailChimp_Synchronizer_Array extends Galahad_MailChimp_Synchronizer
{
	/**
	 * Array of users
	 *
	 * @var array
	 */
	protected $_users;

	/**
	 * Whether or not the users need to be batched (automatic)
	 *
	 * @var bool
	 */
	protected $_batched = false;

	/**
	 * Array of e-mail addresses only
	 *
	 * @var array
	 */
	protected $_keys = null;

	/**
	 * Constructor
	 *
	 * @param string $mailChimpUser
	 * @param string $mailChimpPassword
	 * @param array $users
	 */
	public function __construct($mcApiKey, Array $users)
	{	   
		$this->_users = $users;
		unset($users);

		foreach ($this->_users as $i => $user) {
			$this->_keys[$user['EMAIL']] = $i;
		}

		parent::__construct($mcApiKey);
	}

	/**
	 * Determines if a user exists based on his or her e-mail address
	 *
	 * @param string $email
	 * @param string $listId
	 * @return bool
	 */
	protected function userExists($email, $listId = null)
	{
	   unset($listId);
		return isset($this->_keys[$email]);
	}

	/**
	 * Gets an array of users
	 *
	 * @param string $listId
	 * @return array
	 */
	protected function getUsers($batchNumber, $listId = null)
	{
		if (!$this->_batched) {
			$this->_users = array_chunk($this->_users, $this->_batchSize);
			$this->_batched = true;
		}

		if (!isset($this->_users[$batchNumber])) {
			return false;
		}
        unset($listId);
		return $this->_users[$batchNumber];
	}
}