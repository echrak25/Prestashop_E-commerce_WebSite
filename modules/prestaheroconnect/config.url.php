<?php
/**
 * 2007-2024 PrestaHero
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
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 *  @author PrestaHero <contact@prestahero.com>
 *  @copyright  2007-2024 PrestaHero
 *  @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of PrestaHero
 */

if (!defined('_PS_VERSION_')) {
    exit;
}
if(!defined('_PH_CON_REQUEST_LANG_')){
    define('_PH_CON_REQUEST_LANG_', class_exists('Context') && in_array(Context::getContext()->language->iso_code, array('en','fr','es','it')) ? Context::getContext()->language->iso_code : 'en');
}
if(!defined('_PH_CON_DOMAIN_')){
    define('_PH_CON_DOMAIN_', 'https://prestahero.com/'.(_PH_CON_REQUEST_LANG_ ? _PH_CON_REQUEST_LANG_.'/' : ''));
}
if(!defined('_PH_CON_URL_MODULES_')){
    define('_PH_CON_URL_MODULES_', _PH_CON_DOMAIN_.'feed-api');
}
if(!defined('_PH_CON_URL_UPGRADE_MODULE_')){
    define('_PH_CON_URL_UPGRADE_MODULE_', _PH_CON_DOMAIN_.'download-api');
}
if(!defined('_PH_CON_URL_CHECK_LOGIN_')){
    define('_PH_CON_URL_CHECK_LOGIN_', _PH_CON_DOMAIN_.'login-api');
}
if(!defined('_PH_CON_URL_CHECK_MODULE_PAID_')){
    define('_PH_CON_URL_CHECK_MODULE_PAID_', _PH_CON_DOMAIN_.'checkpaid-api');
}
if(!defined('_PH_CON_ON_TESTING_')){
    define('_PH_CON_ON_TESTING_', 0);
}