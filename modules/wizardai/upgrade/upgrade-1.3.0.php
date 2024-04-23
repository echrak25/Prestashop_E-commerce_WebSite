
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
function upgrade_module_1_3_0($module)
{
    $sql = [];

    $sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'wizard_prompts` (
        `id_wizard_prompt` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `entity` VARCHAR(255) NOT NULL,
        `field` VARCHAR(50) NOT NULL,
        `conditions` TEXT DEFAULT NULL,
        `content` TEXT NOT NULL,
        `append_to_text` TINYINT(1) NOT NULL DEFAULT 0,
        `add_to_cron` TINYINT(1) NOT NULL DEFAULT 0,
        `is_default` TINYINT(1) NOT NULL DEFAULT 0,
        `is_active` TINYINT(1) NOT NULL DEFAULT 1,
        `id_shop` INT UNSIGNED NOT NULL,
        PRIMARY KEY (`id_wizard_prompt`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

    $sql[] = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'wizard_prompts_lang (
        id_wizard_prompt INT UNSIGNED NOT NULL,
        id_lang INT UNSIGNED NOT NULL,
        label VARCHAR(255) NOT NULL DEFAULT "Generate",
        PRIMARY KEY (id_wizard_prompt, id_lang)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

    foreach ($sql as $query) {
        if (Db::getInstance()->execute($query) == false) {
            return false;
        }
    }

    return true;
}
