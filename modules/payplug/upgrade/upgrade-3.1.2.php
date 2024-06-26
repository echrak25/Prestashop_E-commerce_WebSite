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
 * @author    Payplug SAS
 * @copyright 2013 - 2024 Payplug SAS
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * International Registered Trademark & Property of Payplug SAS
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_3_1_2($object)
{
    $flag = true;

    // we cannot allow 1.6 versions tu update from 1.7 content (and vice versa)
    if (version_compare(_PS_VERSION_, '1.7', '<')) {
        return $flag;
    }

    // Update payplug card table
    $sql_requests = [];

    try {
        $exists = Db::getInstance()->executeS('SHOW TABLES LIKE "' . _DB_PREFIX_ . $object->name . '_card"');
    } catch (Exception $e) {
        return $flag;
    }

    if ($exists) {
        $sql_payplug_card = [
            'ALTER TABLE `' . _DB_PREFIX_ . $object->name . '_card` 
                CHANGE `id_' . $object->name . '_card` `position` INT(11) UNSIGNED NOT NULL',
            'ALTER TABLE `' . _DB_PREFIX_ . $object->name . '_card` DROP PRIMARY KEY',
            'ALTER TABLE `' . _DB_PREFIX_ . $object->name . '_card` DROP `position`',
            'ALTER TABLE `' . _DB_PREFIX_ . $object->name . '_card` 
                ADD `id_' . $object->name . '_card` INT(11) NOT NULL AUTO_INCREMENT FIRST, 
                ADD PRIMARY KEY (`id_' . $object->name . '_card`)',
        ];

        $sql_requests = array_merge($sql_requests, $sql_payplug_card);
    }

    try {
        foreach ($sql_requests as $sql_request) {
            $request = Db::getInstance()->execute($sql_request);
            if (!$request) {
                $flag = false;
            }
        }
    } catch (PrestaShopDatabaseException $e) {
        $flag = false;
    }

    return $flag;
}
