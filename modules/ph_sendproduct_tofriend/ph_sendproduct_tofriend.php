<?php
/**
  * Copyright ETS Software Technology Co., Ltd
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
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once(dirname(__FILE__) . '/classes/ETSSPTranslate.php');
require_once(dirname(__FILE__) . '/classes/Ets_sptf_defines.php');
require_once(dirname(__FILE__) . '/classes/EtsSendProductForm.php');

class Ph_sendproduct_tofriend extends Module
{
    protected $config_form = false;

    public $hooks = [
    	'header',
    	'displayProductAdditionalInfo',
    	'displayBackOfficeHeader'
    ];

    public function __construct()
    {
        $this->name = 'ph_sendproduct_tofriend';
        $this->tab = 'front_office_features';
        $this->version = '1.0.4';
        $this->author = 'PrestaHero';
        $this->need_instance = 1;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();
        $this->displayName = $this->l('Send Product to Friend');
        $this->description = $this->l('Share a favorite product to your friends via email.');
$this->refs = 'https://prestahero.com/';

        $this->confirmUninstall = $this->l('');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        $this->_installDb();
        $this->initDefaultConfig();

        return parent::install() &&
	        $this->_registerhooks() &&
	        $this->createTemplateMail() &&
	        $this->installQuickTabs();
    }
    private function _registerhooks() {
    	foreach ($this->hooks as $hook) {
    		$this->registerHook($hook);
	    }
    	return true;
    }
    public function initDefaultConfig(){
        $configs = Ets_sptf_defines::getInstance()->getConfigs();
        $languages = Language::getLanguages(false);
        foreach ($configs as $key => $val) {
            if (isset($val['lang']) && $val['lang']){
                $values = array();
                foreach ($languages as $lang){
                    if ($val['type'] == 'switch')
                        $values[$lang['id_lang']] = $val['default'] ? 1 : 0;
                    else
                        $values[$lang['id_lang']] = $val['default'];
                }
                Configuration::updateValue($key,$values);
            }else {
                Configuration::updateValue($key,$val['default']);
            }
        }
    }
    public function createTemplateMail()
    {
        $languages = Language::getLanguages(false);
        $this->enable(true);
        foreach ($languages as $language) {
            if ($language['iso_code'] != 'en' && !file_exists(dirname(__FILE__) . '/mails/' . $language['iso_code'])) {
                mkdir(dirname(__FILE__) . '/mails/' . $language['iso_code'], 0755, true);
                Tools::copy(dirname(__FILE__) . '/mails/en/send_product.html', dirname(__FILE__) . '/mails/' . $language['iso_code'] . '/send_product.html');
                Tools::copy(dirname(__FILE__) . '/mails/en/send_product.txt', dirname(__FILE__) . '/mails/' . $language['iso_code'] . '/send_product.txt');
                Tools::copy(dirname(__FILE__) . '/mails/en/send_product_reply.html', dirname(__FILE__) . '/mails/' . $language['iso_code'] . '/send_product_reply.html');
                Tools::copy(dirname(__FILE__) . '/mails/en/send_product_reply.txt', dirname(__FILE__) . '/mails/' . $language['iso_code'] . '/send_product_reply.txt');
            }
        }
        return true;
    }

    public function uninstall()
    {
        $configs = Ets_sptf_defines::getInstance()->getConfigs();
        foreach ($configs as $key=>$val){
            Configuration::deleteByName($key);
        }
        $this->_uninstallDb();
        $this->_unregisterHooks();

        return parent::uninstall() && $this->uninstallQuickTabs();
    }

    private function _unregisterHooks() {
    	foreach ($this->hooks as $hook) {
    		$this->unregisterHook($hook);
	    }
    	return true;
    }

    public function _installDb()
    {
        return Ets_sptf_defines::getInstance()->_installDb();
    }

    public function _uninstallDb()
    {
        return Ets_sptf_defines::getInstance()->_uninstallDb();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
       if (Tools::getValue('controller') == 'AdminModules'){
           Tools::redirectAdmin($this->context->link->getAdminLink('AdminEtsSPSendProductForm'));
       }
        /**
         * If values have been submitted in the form, process.
         */
        if (((bool)Tools::isSubmit('submitPh_sendproduct_tofriendModule')) == true) {
            $this->postProcess();
        }

        $this->context->smarty->assign(array(
            'module_dir' => $this->_path,
            'tabs' => Ets_sptf_defines::getInstance()->def_config_tabs()
        ));

        $output = $this->context->smarty->fetch($this->local_path . 'views/templates/admin/configure.tpl');
        return $output . $this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitPh_sendproduct_tofriendModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Live mode'),
                        'name' => 'PH_SENDPRODUCT_TOFRIEND_LIVE_MODE',
                        'is_bool' => true,
                        'desc' => $this->l('Use this module in live mode'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        $configs = Ets_sptf_defines::getInstance()->getConfigs();
        $values = array();
        foreach ($configs as $key => $val){
            $values[$key] = Configuration::get($key);
        }
        return $values;
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name || Tools::getValue('configure') == $this->name || Tools::getValue('controller') == 'AdminEtsSPSendProductForm') {
            $this->context->controller->addJS($this->_path . 'views/js/back.js');
            $this->context->controller->addCSS($this->_path . 'views/css/back.css');
        }
        $this->smarty->assign(array(
           'sendProductFormLink'=>$this->context->link->getAdminLink('AdminEtsSPSendProductForm'),
            'baseImageUrl' => _MODULE_DIR_.'ph_sendproduct_tofriend/views/img/',
        ));
        return $this->display(__FILE__, 'admin_header.tpl');
    }

    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/solid.min.js');
        $this->context->controller->addJS($this->_path.'/views/js/fontawesome.js');
        $this->context->controller->addJS($this->_path . '/views/js/front.js');
        $this->context->controller->addCSS($this->_path . '/views/css/front.css');
        $this->context->controller->addCSS($this->_path.'/views/css/fontawesome.min.css');
        $this->context->controller->addCSS($this->_path.'/views/css/solid.css');
        $this->smarty->assign($this->getConfigFormValues());
        return $this->display(__FILE__,'custom_style.tpl');
    }

    public function hookDisplayProductAdditionalInfo()
    {
        if (Configuration::get('PH_SENDPRODUCT_TOFRIEND_LIVE_MODE')) {
            $tpt_var = array();
            if ($this->context->customer->isLogged()) {
                $tpt_var['customerEmail'] = $this->context->customer->email ?? '';
                $tpt_var['baseImageUrl'] = _MODULE_DIR_ . $this->name . '/views/img/';
                $tpt_var['customerName'] = $this->context->customer->firstname . ' ' . $this->context->customer->lastname;
            }
            $tpt_var['customButtonText'] = Configuration::get('PH_SENDPRODUCT_TOFRIEND_BUTTON_LABEL',$this->context->language->id,null,null,$this->l('Share product to friend'));
            $this->smarty->assign($tpt_var);
            return $this->display(__FILE__, 'modal-email-form.tpl');
        }
    }

    // Quick tab:
    const _ADMIN_TAB_PREFIX_ = 'AdminEtsSP';

    public function installQuickTabs()
    {
        $parent = ['origin' => 'Send product to friends', 'label' => $this->l('Send product to friends')];
        $id_parent = $this->addQuickTab(0, '', $parent['origin'], 1);
        if ($id_parent > 0
            && ($quick_tabs = Ets_sptf_defines::getInstance()->getQuickTabs())
            && is_array($quick_tabs)
            && count($quick_tabs) > 0
        ) {
            foreach ($quick_tabs as $t) {
                if (isset($t['class']) && isset($t['label']) && !$this->addQuickTab($id_parent, $t['class'], $t['origin'], !isset($t['active']) || $t['active'] ? 1 : 0))
                    return false;
            }
        }

        return true;
    }

    public function uninstallQuickTabs()
    {
        if ($this->removeQuickTab()
            && ($quick_tabs = Ets_sptf_defines::getInstance()->getQuickTabs())
            && is_array($quick_tabs)
            && count($quick_tabs) > 0
        ) {
            foreach ($quick_tabs as $t) {
                if (isset($t['class']) && !$this->removeQuickTab($t['class']))
                    return false;
            }
        }

        return true;
    }

    private function addQuickTab($id_parent, $class = '', $label = '', $active = 1)
    {
        if ($id_parent && !$class)
            return 0;
        $class_name = trim(self::_ADMIN_TAB_PREFIX_ . $class);
        $id = (int)Tab::getIdFromClassName($class_name);
        if ($id) {
            return 0;
        }
        $t = new Tab((int)$id);
        $t->active = $active;
        $t->class_name = $class_name;
        $t->name = array();
        if ($languages = Language::getLanguages(false)) {
            foreach ($languages as $l) {
                $t->name[$l['id_lang']] = ETSSPTranslate::trans($label, (int)$l['id_lang']) ?: $label;
            }
        }
        $t->id_parent = (int)$id_parent;
        $t->module = $this->name;

        return $t->save() ? $t->id : 0;
    }

    private function removeQuickTab($class_name = '')
    {
        $id = (int)Tab::getIdFromClassName(self::_ADMIN_TAB_PREFIX_ . $class_name);
        if (!$id) {
            return true;
        }
        $tab = new Tab($id);
        return !$tab->id || $tab->delete();
    }
    public function displayIframe()
    {
        switch($this->context->language->iso_code) {
            case 'en':
                $url = 'https://cdn.prestahero.com/module/ph_productfeed/productfeed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            case 'it':
                $url = 'https://cdn.prestahero.com/it/module/ph_productfeed/productfeed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            case 'fr':
                $url = 'https://cdn.prestahero.com/fr/module/ph_productfeed/productfeed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            case 'es':
                $url = 'https://cdn.prestahero.com/es/module/ph_productfeed/productfeed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            default:
                $url = 'https://cdn.prestahero.com/module/ph_productfeed/productfeed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
        }
        $this->smarty->assign(
            array(
                'url_iframe' => $url
            )
        );
        return $this->display(__FILE__,'iframe.tpl');
    }
}
