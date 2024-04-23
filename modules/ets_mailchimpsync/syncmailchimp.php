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

	if ( !defined('_PS_ADMIN_DIR_') )
		define('_PS_ADMIN_DIR_', getcwd());
	if ( !defined('PS_ADMIN_DIR') )
		define('PS_ADMIN_DIR', _PS_ADMIN_DIR_);
	include( dirname(__FILE__) . '/../../config/config.inc.php' );
	if ( version_compare(_PS_VERSION_, '1.5.0.0', '<') )
		include( dirname(__FILE__) . '/../../init.php' );
	if ( !class_exists('Ets_mailchimpsync') )
		require_once( dirname(__FILE__) . '/ets_mailchimpsync.php' );
	if ( !class_exists('MCAPI') )
		require_once( _PS_ROOT_DIR_ . '/modules/ets_mailchimpsync/classes/MCAPI.class.php' );
	if ( !class_exists('Galahad_MailChimp_Synchronizer_Array') )
		require_once( _PS_ROOT_DIR_ . '/modules/ets_mailchimpsync/classes/Array.php' );
	if ( !class_exists('Exception') )
		require_once( _PS_ROOT_DIR_ . '/modules/ets_mailchimpsync/classes/Exception.php' );
	$module = Module ::getInstanceByName('ets_mailchimpsync');
	if ( Tools ::isSubmit('token') && Tools ::getValue('token') != Tools ::getAdminTokenLite('AdminModules') )
		die(json_encode(array( 'error' => $module -> l('Token is not valid') )));
	if ( Tools ::getValue('idexport') ){
		die(json_encode($module -> synchronizeMailchimpList((int)Tools ::getValue('idexport'))));
	}else{
		$arrResponse = $module -> synchronizeAllMailchimpLists();
		foreach( $arrResponse as $value ){
			echo 'ID List : '.$value['list_id'].'<br>';
			echo 'Status : '.$value['sync_result']['suc'].' : '.$value['sync_result']['submitted'].'<br>';
			echo '---------------------------------------------------<br>';
		}
		die();
	}
