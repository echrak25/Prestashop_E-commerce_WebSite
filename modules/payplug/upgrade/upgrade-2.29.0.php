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
 *  International Registered Trademark & Property of Payplug SAS
 */
require_once _PS_MODULE_DIR_ . 'payplug/classes/MyLogPHP.php';

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * @description Install PayPlug Cache DB in case of an upgrade of the module.
 *
 * @param mixed $object
 *
 * @return bool
 */
function upgrade_module_2_29_0($object)
{
    // we cannot allow 1.6 versions tu update from 1.7 content (and vice versa)
    if (version_compare(_PS_VERSION_, '1.7', '<')) {
        return true;
    }

    $flag = true;

    // install table `payplug_cache`
    $sql = '
            CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . $object->name . '_cache` (
            `id_' . $object->name . '_cache` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `cache_key` VARCHAR(255) NOT NULL,
            `cache_value` TEXT NOT NULL,
            `date_add` DATETIME NULL,
            `date_upd` DATETIME NULL
            ) ENGINE=' . _MYSQL_ENGINE_;

    return $flag && Db::getInstance()->execute($sql);
}
