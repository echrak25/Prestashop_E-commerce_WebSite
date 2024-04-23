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
 * @author PrestaHero <etssoft.jsc@gmail.com>
 * @copyright  2007-2024 PrestaHero
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of PrestaHero
 */

if (!defined('_PS_VERSION_'))
    exit;

class AdminPhConListModulesController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();

        if (isset($this->context->cookie->ph_con_error) && $this->context->cookie->ph_con_error) {
            $this->errors[] = $this->context->cookie->ph_con_error;
            $this->context->cookie->ph_con_error = null;
        }
        if (isset($this->context->cookie->ph_con_success) && $this->context->cookie->ph_con_success) {
            $this->confirmations[] = $this->context->cookie->ph_con_success;
            $this->context->cookie->ph_con_success = null;
        }
    }

    public function renderList()
    {
        $phModules = PhConModule::getPrestaheroModules();
        $moduleCounter = array(
            'all' => 0,
            'must_have' => 0,
            'purchased' => 0,
            'downloaded' => 0,
            'installed' => 0,
            'to_upgrade' => 0,
            'free' => 0,
            'theme' => 0,
        );
        foreach ($phModules as $item) {
            $isModule = isset($item['is_module']) && $item['is_module'];
            if($isModule)
                $moduleCounter['all'] += 1;
            if ($isModule && isset($item['is_must_have']) && $item['is_must_have']) {
                $moduleCounter['must_have'] += 1;
            }
            if ($isModule && isset($item['to_buy']) && !$item['to_buy']) {
                $moduleCounter['downloaded'] += 1;
            }
            if ($isModule && isset($item['is_installed']) && $item['is_installed']) {
                $moduleCounter['installed'] += 1;
            }
            if ($isModule && isset($item['is_installed']) && $item['is_installed'] && ($item['to_upgrade'] || $item['upgrade_from_server'])) {
                $moduleCounter['to_upgrade'] += 1;
            }
            if ($isModule && isset($item['price_number']) && !$item['price_number']) {
                $moduleCounter['free'] += 1;
            }
            if (!$isModule) {
                $moduleCounter['theme'] += 1;
            }
        }
        $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
        $smartyParams = array(
            'phModules' => $phModules,
            'actionConfirm' => array('reset', 'uninstall', 'disable'),
            'linkActionLoginAddon' => $this->context->link->getAdminLink('AdminPhConListModules'),
            'notificationType' => ($notificationType = Configuration::get('PH_CON_NOTI_TYPE')) && in_array($notificationType, array('info', 'warning', 'danger')) ? $notificationType : 'info',
            'notificationContent' => ($notificationContent = Configuration::get('PH_CON_NOTI_CONTENT', $this->context->language->id)) ? $notificationContent : Configuration::get('PH_CON_NOTI_CONTENT', $id_lang_default),
            'phDesc' => ($description = Configuration::get('PH_CON_DESCRIPTION', $this->context->language->id)) ? $description : Configuration::get('PH_CON_DESCRIPTION', $id_lang_default),
            'moduleCounter' => $moduleCounter,
            'alertNoConnect' => !PhConApi::getApi()->isLogged() ? $this->module->getAlertNoConnect() : null,
            'phLogo' => Configuration::get('PH_CON_LOGO'),
            'is17' => $this->module->is17,
            'requestLang' => _PH_CON_REQUEST_LANG_,
        );
        return $this->module->displayListModules($smartyParams);
    }

}