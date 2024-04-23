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

class Galahad_MailChimp_User
{
	protected $_email;
	protected $_mergeVariables = array();
	protected $_emailType = 'html';
	protected $_doubleOptIn = false;

	/**
	 * Constructor
	 *
	 * @param string $email
	 * @param array $mergeVariables
	 * @param string $emailType "html" or "text"
	 * @param bool $doubleOptIn
	 */
	public function __construct($email, $mergeVariables = array(), $emailType = 'html', $doubleOptIn = false)
	{
		$this->_email = $email;

		if (is_array($mergeVariables)) {
			$this->_mergeVariables = $mergeVariables;
		}

		if (in_array($emailType, array('html', 'text'))) {
			$this->_emailType = $emailType;
		}

		if (is_bool($doubleOptIn)) {
			$this->_doubleOptIn = $doubleOptIn;
		}
	}

	/**
	 * Get the users email address
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->_email;
	}

	/**
	 * Get additional merge variables
	 *
	 * @return array
	 */
	public function getMergeVariables()
	{
		return $this->_mergeVariables;
	}

	/**
	 * Whether the user prefers html or text e-mails
	 *
	 * @return string
	 */
	public function getEmailType()
	{
		return $this->_emailType;
	}

	/**
	 * Should MailChimp send a double opt-in request?
	 *
	 * @return bool
	 */
	public function getDoubleOptIn()
	{
		return $this->_doubleOptIn;
	}
}