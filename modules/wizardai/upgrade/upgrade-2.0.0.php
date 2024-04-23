
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
function upgrade_module_2_0_0($module)
{
    $sql = [];
    $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'wizard_jobs`;';
    $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'wizard_prompts`;';
    $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'wizard_prompts_lang`;';
    $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'wizard_characters`;';
    $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'wizard_images`;';
    foreach ($sql as $query) {
        if (Db::getInstance()->execute($query) == false) {
            return false;
        }
    }

    $module->MBOInstaller();

    if (Shop::isFeatureActive()) {
        Shop::setContext(Shop::CONTEXT_ALL);
    }

    require_once _PS_MODULE_DIR_ . 'wizardai/sql/install.php';

    Configuration::updateValue('WIZARDAI_SECURITY_TOKEN', bin2hex(random_bytes(32)));
    Configuration::updateValue('WIZARDAI_CRON_TOKEN', bin2hex(random_bytes(32)));
    Configuration::updateValue('WIZARDAI_CRON_AJAX_TOKEN', bin2hex(random_bytes(32)));

    $module->registerHook('displayBackOfficeHeader');
    $module->registerHook('actionObjectProductAddAfter');
    $module->registerHook('actionProductAdd');
    $module->registerHook('actionCreativeElementsInit');
    $module->installFixtures();

    return true;
}
