<?php
/**
 * 2013 - 2024 Payplug SAS.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0).
 * It is available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to contact@payplug.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PayPlug module to newer
 * versions in the future.
 *
 *  @author    Payplug SAS
 *  @copyright 2013 - 2024 Payplug SAS
 *  @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * International Registered Trademark & Property of Payplug SAS
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_3_1_5($object)
{
    $flag = true;

    // Delete payplug_carrier table
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . $object->name . '_carrier';
    $flag = $flag && Db::getInstance()->execute($sql);

    // Add new conf var for Oney Only
    return $flag && Configuration::updateValue('PAYPLUG_STANDARD', 1);
}
