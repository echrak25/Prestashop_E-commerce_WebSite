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
require_once dirname(__FILE__) . '/config.url.php';
require_once dirname(__FILE__) . '/classes/PhConCache.php';
require_once dirname(__FILE__) . '/classes/PhConDefine.php';
require_once dirname(__FILE__) . '/classes/PhConModule.php';
require_once dirname(__FILE__) . '/classes/PhConApi.php';
require_once dirname(__FILE__) . '/classes/PhConEmployeeToken.php';

class Prestaheroconnect extends Module
{
    public $is17;
    public static $instance;

    public function __construct()
    {
        $this->name = 'prestaheroconnect';
        $this->author = 'PrestaHero';
        $this->tab = 'front_office_features';
        $this->version = '1.1.8';
        $this->bootstrap = true;

        parent::__construct();
        $this->displayName = $this->l('PrestaHero Connect');
        $this->description = $this->l('Connect your website with PrestaHero to keep your modules up-to-date and install your purchased (or free) modules easily in 1-click!');
$this->refs = 'https://prestahero.com/';
        $this->ps_versions_compliancy = array('min' => '1.6.0.0', 'max' => _PS_VERSION_);
        $this->is17 = version_compare('1.7.0', _PS_VERSION_, '<=');
    }

    public function install()
    {
        return parent::install()
            && $this->registerHook('displayBackOfficeHeader')
            && $this->registerHook('displayDashboardToolbarTopMenu')
            && $this->__installTabs()
            && PhConDefine::getInstance()->installDb();
    }

    public function uninstall()
    {
        PhConApi::getApi()->logout();
        PhConCache::removeCacheDir();
        return parent::uninstall()
            && $this->__uninstallTabs()
            && PhConDefine::getInstance()->uninstallDb();
    }

    protected function __installTabs()
    {
        $languages = Language::getLanguages(false);
        $parentTab = new Tab();
        $parentTab->module = $this->name;
        foreach ($languages as $lang) {
            $parentTab->name[$lang['id_lang']] = $this->l('PrestaHero');
        }

        $parentTab->id_parent = 0;
        $parentTab->class_name = 'AdminPhConRoot';
        $parentTab->save();

        $tab = new Tab();
        $tab->class_name = 'AdminPhConListModules';
        $tab->module = $this->name;
        $tab->icon = 'ph-con-sidebar-icon-list-module';
        foreach ($languages as $lang) {
            $tab->name[$lang['id_lang']] = $this->is17 ? $this->l('PrestaHero modules', false, isset($lang['locale']) ? $lang['locale'] : null) : $this->l('PrestaHero modules');
        }
        $tab->id_parent = $parentTab->id;
        $tab->save();
        return true;
    }

    protected function __uninstallTabs()
    {
        if (($idParent = Tab::getIdFromClassName('AdminPhConRoot')) && ($parentTab = new Tab($idParent)) && $parentTab->id)
            $parentTab->delete();
        if (($idSubTab = Tab::getIdFromClassName('AdminPhConListModules')) && ($subTab = new Tab($idSubTab)) && $subTab->id)
            $subTab->delete();
        return true;
    }

    public function hookDisplayBackOfficeHeader()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/global.css');
        if (!$this->is17) {
            $this->context->controller->addCSS($this->_path . 'views/css/global16.css');
        }
        $controller = Tools::getValue('controller');
        if ($this->isOldAction()) {
            $actions = array('install', 'delete', 'uninstall', 'update', 'enable', 'disable_device', 'reset');
            if ($this->context->cookie->fromPhActionList) {
                unset($this->context->cookie->fromPhActionList);
                $hasAction = 0;
                foreach ($actions as $action) {
                    if (Tools::getIsset($action)) {
                        $hasAction = 1;
                        break;
                    }
                }
                if (!$hasAction) {
                    $this->context->cookie->phActionExecuted = $this->context->cookie->phActionListType;
                    $this->context->cookie->phActionValue = $this->context->cookie->phActionListValue;
                    $this->context->cookie->phActionModuleName = Tools::getValue('module_name');

                    unset($this->context->cookie->phActionListType);
                    unset($this->context->cookie->phActionListValue);
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminPhConListModules'));
                } else {
                    unset($this->context->cookie->phActionListType);
                    unset($this->context->cookie->phActionListValue);
                }
            }
            if ($controller == 'AdminModules' && Tools::getValue('fromPhActionList')) {
                $this->context->cookie->fromPhActionList = 1;
                foreach ($actions as $action) {
                    if (Tools::getIsset($action)) {
                        $this->context->cookie->phActionListType = $action;
                        $this->context->cookie->phActionListValue = Tools::getValue($action);
                        break;
                    }
                }
            }
        }
        if ($controller == 'AdminPhConListModules') {
            $this->context->controller->addCSS($this->_path . 'views/css/admin.css');
        }
        $this->smarty->assign(array(
            'globalJs' => $this->_path . 'views/js/global.js',
            'phLogoIcon' => $this->_path . 'views/img/prestahero-logo.png',
            'linkAdminJs' =>  in_array($controller, array('AdminPhConListModules','AdminModulesManage')) ? $this->_path . 'views/js/admin.js' : '',
            'transJs' => $this->transJs(),
            'linkAjaxModule' => $this->context->link->getAdminLink('AdminModules') . '&configure=' . $this->name,
            'controllerName' => $controller,
            'accountName' => PhConApi::getApi()->isLogged() ? PhConApi::getApi()->userName : null,
            'linkLogoutPhAccount' => $this->context->link->getAdminLink('AdminModules') . '&configure=' . $this->name . '&logoutPhAccount=1',
            'linkModuleList' => $this->context->link->getAdminLink('AdminPhConListModules'),
            'phLinks' => array(
                'my_account' => PhConDefine::getLinkPrestahero('my_account', $this->context->language->id),
                'contact' => PhConDefine::getLinkPrestahero('contact_us', $this->context->language->id),
            ),
            'is17' => $this->is17,
            'msgAction' => $this->getMessageAction(),
            'isOldAction' => $this->isOldAction(),
            'reloadUpgradeCount' => $controller=='AdminPhConListModules' && !Tools::isSubmit('configure') || $controller=='AdminModules' && !Tools::isSubmit('configure') || $controller=='AdminModulesManage' || !($lastUpdate = (int)Configuration::get('PH_CON_UPGRADE_COUNT_TIME')) || time()-$lastUpdate >= 24*3600 ? true : false,
            'upgradeCount' => (int)Configuration::get('PH_CON_UPGRADE_COUNT'),
            'isLogged' => PhConApi::getApi()->isLogged() ? true : false,
        ));
        return $this->display(__FILE__, 'admin_head.tpl');
    }

    public function isOldAction()
    {
        $linkAction = PhConModule::getActionLinks('prestaheroconnect', 'install', Module::getInstanceByName('prestaheroconnect'));
        if (strpos($linkAction, 'controller=AdminModules') !== false) {
            return true;
        }
        return false;
    }

    public function getMessageAction()
    {
        $msgAction = '';
        $controller = Tools::getValue('controller');
        if ($this->isOldAction() && ($action = $this->context->cookie->phActionExecuted) && $controller == 'AdminPhConListModules') {
            $actionValue = $this->context->cookie->phActionValue;
            $moduleName = $this->context->cookie->phActionModuleName;
            switch ($action) {
                case 'install':
                    $msgAction = $this->l('Installed module') . ' ' . $moduleName . ' ' . $this->l('successfully');
                    break;
                case 'delete':
                    $msgAction = $this->l('Deleted module') . ' ' . $moduleName . ' ' . $this->l('successfully');
                    break;
                case 'uninstall':
                    $msgAction = $this->l('Uninstalled module') . ' ' . $moduleName . ' ' . $this->l('successfully');
                    break;
                case 'update':
                    $msgAction = $this->l('Upgraded module') . ' ' . $moduleName . ' ' . $this->l('successfully');
                    break;
                case 'enable':
                    if ($actionValue == 1) {
                        $msgAction = $this->l('Enabled module') . ' ' . $moduleName . ' ' . $this->l('successfully');
                    } else {
                        $msgAction = $this->l('Disabled module') . ' ' . $moduleName . ' ' . $this->l('successfully');
                    }
                    break;
                case 'disable_device':
                    if ($actionValue == 4) {
                        $msgAction = $this->l('Module is disabled for mobile') . ' ' . $moduleName . ' ' . $this->l('successfully');
                    } elseif ($actionValue == 2) {
                        $msgAction = $this->l('Module is disabled for tablet') . ' ' . $moduleName . ' ' . $this->l('successfully');
                    } else {
                        $msgAction = $this->l('Module is disabled for desktop') . ' ' . $moduleName . ' ' . $this->l('successfully');
                    }
                    break;
                case 'reset':
                    $msgAction = $this->l('Reset module') . ' ' . $moduleName . ' ' . $this->l('successfully');
                    break;
            }
        }
        unset($this->context->cookie->phActionExecuted);
        unset($this->context->cookie->phActionValue);
        unset($this->context->cookie->phActionModuleName);
        return $msgAction;
    }

    public function getTotalModuleNeedUpgrade()
    {
        $modules = PhConModule::getPrestaheroModules();
        if (!$modules) {
            return 0;
        }
        $total = 0;
        foreach ($modules as $module) {
            if ($module['is_installed'] && ($module['to_upgrade'] || $module['upgrade_from_server'])) {
                $total++;
            }
        }
        return $total;
    }

    public function hookDisplayDashboardToolbarTopMenu()
    {

        if (Tools::getValue('controller') == 'AdminPhConListModules' && !PhConApi::getApi()->isLogged()) {
            $is1778 = version_compare(_PS_VERSION_, '1.7.8', '>=');
            $this->smarty->assign(array(
                'is1778' => $is1778
            ));
            return $this->display(__FILE__, 'login.tpl');
        }
        return '';
    }

    public function getContent()
    {
        if (Tools::isSubmit('logoutPhAccount')) {
            PhConApi::getApi()->logout();
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminPhConListModules'));
        }

        if (Tools::isSubmit('phConCheckAccount')) {
            $email = Tools::getValue('email');
            $password = Tools::getValue('password');
            $rememberMe = (int)Tools::getValue('rememberMe', 0) ? true : false;
            $errors = array();
            if (!$email)
                $errors[] = $this->l('The email is required');
            elseif (!Validate::isEmail($email))
                $errors[] = $this->l('The email is invalid');
            if (!$password)
                $errors[] = $this->l('The password is required');
            if (!$errors) {
                $res = PhConApi::getApi()->login($email, $password, $rememberMe);
                if ($res === null)
                    $errors[] = $this->l('Could not connect to PrestaHero server.');
                elseif ($res !== true)
                    $errors = $res;
            }
            if (!$errors && ($modules = (new PhConApi())->getModulesOnMarket(false)))
                PhConCache::set($this->context->employee->id . '_' . $this->context->language->iso_code . '_' . $this->context->currency->iso_code, $modules);
            die(json_encode(array(
                'success' => !$errors ? true : false,
                'link_redirect' =>$this->context->link->getAdminLink('AdminPhConListModules'),
                'errors' => $errors ? implode('<br/>', $errors) : '',
                'message' => !$errors ? $this->l('Authenticated successfully') : '',
            )));
        }

        if (Tools::isSubmit('phConCheckModulePaid')) {
            $res = PhConApi::getApi()->checkModulePaid();
            die(json_encode($res));
        }

        if (Tools::isSubmit('phConInstallModuleFromServer') || Tools::isSubmit('upgradeModule')) {
            $moduleName = Tools::getValue('moduleName', Tools::getValue('module'));
            $idProduct = (int)Tools::getValue('idProduct');
            $errors = array();
            if (!$moduleName)
                $errors[] = $this->l('Module name is required');
            elseif (!Validate::isModuleName($moduleName))
                $errors[] = $this->l('Module name is not valid');
            elseif (!PhConModule::checkCompliancy($moduleName))
                $errors[] = sprintf($this->l('Module %s is not compatible with your PrestaShop version'), $moduleName);
            elseif (!$idProduct)
                $errors[] = $this->l('Product ID is required');
            elseif (!PhConApi::getApi()->isLogged())
                $errors[] = $this->l('You need to connect to PrestaHero');
            elseif (($download = PhConApi::getApi()->downloadModule($moduleName, $idProduct)) && is_array($download))
            {
                $errors[] = $download['message'];
                $tokenExpired = isset($download['token_expired']) && $download['token_expired'] ? true : false;
            }
            elseif (!$download)
                $errors[] = $this->l('Could not connect to PrestaHero');
            elseif (!PhConModule::updateNewCodeModule($download, $moduleName))
                $errors[] = sprintf($this->l('Could not download module: %s'), $moduleName);
            if (Tools::isSubmit('upgradeModule')) {

                die(json_encode(array($moduleName => array(
                    'status' => !$errors ? true : false,
                    'msg' => $errors ? implode('<br/>', $errors) : $this->l('Module downloaded successfully'),
                    'link_upgrade' => PhConModule::getActionLinks($moduleName, 'upgrade', Module::getInstanceByName($moduleName), $this->context),
                    'isLogged' => PhConApi::getApi()->isLogged(),
                    'token_expired' => isset($tokenExpired) && $tokenExpired ? true : false,
                ))));
            }
            die(json_encode(array(
                'success' => !$errors ? true : false,
                'message' => $errors ? implode('<br/>', $errors) : $this->l('Module downloaded successfully'),
                'link_install' => PhConModule::getActionLinks($moduleName, 'install', Module::getInstanceByName($moduleName), $this->context),
                'isLogged' => PhConApi::getApi()->isLogged(),
                'token_expired' => isset($tokenExpired) && $tokenExpired ? true : false,
            )));
        }


        if (Tools::isSubmit('phConRefreshListModule')) {
            if ($modules = PhConApi::getApi()->getModulesOnMarket(false)) {
                PhConCache::set($this->context->employee->id . '_' . $this->context->language->iso_code . '_' . $this->context->currency->iso_code, $modules);
            }
            die(json_encode(array(
                'success' => $modules ? true : false,
                'message' => $modules ? $this->l('Cache cleared') : $this->l('Cannot connect to PrestaHero'),
            )));
        }

        if (Tools::isSubmit('phConGetModalLogin')) {
            die(json_encode(array(
                'success' => true,
                'html' => $this->display(__FILE__, 'modal_login.tpl')
            )));
        }

        if (Tools::isSubmit('phConCheckUpgrade')) {
            $phModules = PhConModule::getPrestaheroModules();
            $listModules = array();
            foreach ($phModules as $item) {
                if ($item['upgrade_from_server'] && $item['is_installed']) {
                    $listModules[] = array(
                        'name' => $item['name'],
                        'link_upgrade' => $this->context->link->getAdminLink('AdminModules') . '&configure=prestaheroconnect&upgradeModule=1&module=' . $item['name'] . '&idProduct=' . (int)$item['id_product']
                    );
                }
            }
            die(json_encode(array(
                'success' => true,
                'modules' => $listModules
            )));
        }

        if(Tools::isSubmit('deleteModule')){
            $error = null;
            if(!($moduleName = (string)Tools::getValue('module')) || !Validate::isModuleName($moduleName))
                $error = $this->l('Module name is not valid');
            elseif(Module::isInstalled($moduleName))
                $error = $this->l('Could not delete already installed module');
            elseif(!is_dir(_PS_MODULE_DIR_.$moduleName))
                $error = $this->l('Module directory does not exist');
            else
                PhConModule::deleteDir(_PS_MODULE_DIR_.$moduleName);
            die(json_encode(array($moduleName => array(
                'status' => !is_null($error) ? false : true,
                'deleted_module' => 1,
                'msg' => is_null($error) ? sprintf($this->l('Module %s deleted successfully'), $moduleName) : $error,
            ))));
        }

        if(Tools::isSubmit('phConGetNbModuleToUpgrade')){
            $totalModulesToUpgrade = (int)$this->getTotalModuleNeedUpgrade();
            Configuration::updateValue('PH_CON_UPGRADE_COUNT_TIME',time());
            Configuration::updateValue('PH_CON_UPGRADE_COUNT',$totalModulesToUpgrade);
            die(json_encode(array(
                'success' => true,
                'nb_upgrade' => $totalModulesToUpgrade,
            )));
        }

        if(Tools::isSubmit('updateLocal')){
            $error = null;
            $moduleName = ($moduleName = Tools::getValue('module')) && Validate::isModuleName($moduleName) ? trim($moduleName) : '';
            if(!$moduleName){
                $error = $this->l('Module name is not valid');
            }
            elseif(!Module::isInstalled($moduleName)){
                $error = $this->l('Cannot upgrade this module because it is not installed');
            }
            elseif(!PhConModule::upgradeLocalModule($moduleName)){
                $error = $this->l('Cannot upgrade this module because it is not installed');
            }
            if($error){
                $this->context->cookie->ph_con_error = $error;
            }
            else
                $this->context->cookie->ph_con_success = sprintf($this->l('Module %s upgraded successfully'), $moduleName);
        }
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminPhConListModules'));
    }

    public function transJs()
    {
        return array(
            'install' => $this->l('Install'),
            'delete' => $this->l('Delete'),
            'email_required' => $this->l('The email field is required'),
            'password_required' => $this->l('The password field is required'),
            'account_invalid' => $this->l('The email or password is invalid'),
            'logout' => $this->l('Log out'),
            'install_from_server' => $this->l('Install from server'),
            'refresh_and_clear_cache' => $this->l('Refresh and clear cache'),
            'view_my_prestahero' => $this->l('PrestaHero profile'),
            'contact_prestahero' => $this->l('Contact PrestaHero'),
            'connect_to_prestahero' => $this->l('Connect to PrestaHero'),
            'upgrade' => $this->l('Upgrade'),
            'install_prestahero' => $this->l('Install PrestaHero'),
            'install_from_prestahero' => $this->l('Install from PrestaHero'),
            'buy_now' => $this->l('Buy now'),
            'purchased' => $this->l('Purchased'),
            'confirm_delete_module' => $this->l('Do you want to delete this item?'),
            'txt_modulelist' => $this->l('PrestaHero modules and themes'),
            'txt_modules_to_upgrade' => $this->l('Number of modules to upgrade'),
        );
    }

    public function displayListModules($smartyParams)
    {
        $this->smarty->assign($smartyParams);
        return $this->display(__FILE__, 'list_modules.tpl');
    }

    public function getAlertNoConnect()
    {
        $this->smarty->assign(array(
            'phLinkConnect' => 'https://prestahero.com/'
        ));
        return $this->display(__FILE__, 'alert_no_connect.tpl');
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Prestaheroconnect();
        }
        return self::$instance;
    }
}