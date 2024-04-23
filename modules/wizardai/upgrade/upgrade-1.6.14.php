
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
function upgrade_module_1_6_14($module)
{
    // alter table wizard_prompts to add translate_result colonne with default to 1 after append_to_text
    $sql = 'ALTER TABLE `' . _DB_PREFIX_ . 'wizard_prompts` ADD `translate_result` TINYINT(1) NOT NULL DEFAULT 0 AFTER `append_to_text`';
    Db::getInstance()->execute($sql);

    return true;
}
