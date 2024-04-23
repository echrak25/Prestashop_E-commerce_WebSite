
<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 */
if (!defined('_PS_VERSION_')) {
    exit;
}
/**
 * @param Module $module
 *
 * @return bool
 */
function upgrade_module_1_1_0($module)
{
    $sql = [];

    $sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'wizard_jobs` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `entity` VARCHAR(50) NOT NULL,
    `entity_id` INT(10) UNSIGNED NOT NULL,
    `task` VARCHAR(50) NOT NULL,
    `attempts` INT(11) NOT NULL,
    `id_lang` INT(11) NOT NULL,
    `id_shop` INT(11) NOT NULL,
    `is_failed` TINYINT(1) NOT NULL,
    `is_executed` TINYINT(1) NOT NULL,
    `generated_at` DATETIME NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

    foreach ($sql as $query) {
        if (Db::getInstance()->execute($query) == false) {
            return false;
        }
    }

    $module->registerHook('actionObjectProductAddAfter');
    $module->unregisterHook('backOfficeHeader');
    $module->registerHook('displayBackOfficeHeader');
    Configuration::updateValue('WIZARDAI_CRON_TOKEN', bin2hex(random_bytes(32)));

    return true;
}
