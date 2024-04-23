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
require_once dirname(__FILE__) . '/classes/ETS_AddToCartDefines.php';

class Ets_addtocart_fromlist extends Module
{
    public $etsDefines;
    public $is17;
    public $is16;
    public $is175;

    public $hooks = [
    	'header',
    	'displayBackOfficeHeader',
    	'displayATCButton',
    ];

    public function __construct()
    {
        $this->name = 'ets_addtocart_fromlist';
        $this->tab = 'administration';
        $this->version = '1.0.3';
        $this->author = 'ETS-Soft';
        $this->need_instance = 1;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Add to cart from list');
        $this->description = $this->l('Enable customers to quickly add a product to cart without a need to go to product page');
$this->refs = 'https://prestahero.com/';

        $this->confirmUninstall = $this->l('');
        $this->is17 = version_compare(_PS_VERSION_, '1.7.0', '>=');
        $this->is16 = version_compare(_PS_VERSION_, '1.6.0', '>=');
        $this->is175 = version_compare(_PS_VERSION_, '1.7.6', '<');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->etsDefines = ETS_AddToCartDefines::getInstance();
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        $this->initDefaultData();

        include(dirname(__FILE__) . '/sql/install.php');
        $this->regexTemplates();
        return parent::install() &&
	        $this->_registerHooks();
    }

    public function _registerHooks() {
    	foreach ($this->hooks as $hook) {
    		$this->registerHook($hook);
	    }
    	return true;
    }

    public function uninstall()
    {
        $this->deletetDefaultData();

        include(dirname(__FILE__) . '/sql/uninstall.php');
		$this->_unregisterHooks();
        return parent::uninstall();
    }

    private function _unregisterHooks() {
    	foreach ($this->hooks as $hook) {
    		$this->unregisterHook($hook);
	    }
    	return true;
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        $output = $this->context->smarty->fetch($this->local_path . 'views/templates/admin/configure.tpl');
        $this->postProcess($output);
        $this->context->smarty->assign('module_dir', $this->_path);
        return $output . $this->renderForm().$this->displayIframe();
    }

    public function hookDisplayATCButton()
    {
        if (Configuration::get('ETS_ADDTOCART_FROMLIST_LIVE_MODE')) {
            $values = $this->getConfigFormValues();
            $values['icons'] = $this->etsDefines ? $this->etsDefines::getInstance()->getIcons():ETS_AddToCartDefines::getInstance()->getIcons();
            $values['id_language'] = $this->context->language->id;
            $this->context->smarty->assign($values);
            return $this->display(__FILE__, '/views/templates/hook/add-to-cart-button.tpl');
        }
    }

    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitEts_addtocart_fromlistModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(),
            'img_dir' => $this->_path.'/views/img/',
            'baseAdminUrl' => $this->baseAdminUrl(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
            'icons' => ETS_AddToCartDefines::getInstance()->getIcons(),
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-AdminAdmin'
                ),
                'input' => array(),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );
        $configs = $this->etsDefines->getConfigs();
        $fields_form['form']['input'] = $configs;
        return $fields_form;
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        $fieldValues = array();
        $this->etsDefines ? $configs = $this->etsDefines->getConfigs() : $configs = ETS_AddToCartDefines::getInstance()->getConfigs();
        foreach ($configs as $k => $v) {
            if(isset($v['lang']) && $v['lang'])
            {
                $languages = Language::getLanguages(false);
                foreach ($languages as $lang) {
                    $fieldValues[$k][$lang['id_lang']] = Configuration::get($k,$lang['id_lang'],$this->context->shop->id_shop_group,$this->context->shop->id,$v['default']);
                }

            }
            elseif ($v['type'] == 'custom'){
                foreach ($v['options'] as $name => $option) {
                    $fieldValues[$name] = Configuration::get($name, null,$this->context->shop->id_shop_group,$this->context->shop->id,$option['default']);
                }
            }
            else
                $fieldValues[$k] = Configuration::get($k, null,$this->context->shop->id_shop_group,$this->context->shop->id,$v['default']);
        }
        return $fieldValues;
    }

    /**
     * Save form data.
     */
    protected function postProcess(&$output)
    {
        if (((bool)Tools::isSubmit('submitEts_addtocart_fromlistModule')) == true) {
            $configs = $this->etsDefines ? $this->etsDefines->getConfigs():ETS_AddToCartDefines::getInstance()->getConfigs();
            $this->validateData($configs);
            if (!$this->_errors) {
                foreach ($configs as $key => $val) {
                    if (isset($val['lang']) && $val['lang']) {
                        $values = array();
                        $languages = Language::getLanguages(false);
                        foreach ($languages as $lang) {
                            $values[$lang['id_lang']] = trim(Tools::getValue($key.'_'.$lang['id_lang'])) ? trim(Tools::getValue($key.'_'.$lang['id_lang'])) : $val['default'];
                        }
                        Configuration::updateValue($key,$values);
                    }
                    elseif ($val['type'] == 'custom'){
                        foreach ($val['options'] as $name => $option) {
                            Configuration::updateValue($name,Tools::getValue($name));
                        }
                    }
                    else {
                        Configuration::updateValue($key, Tools::getValue($key));
                    }
                }
                $output.= $this->displayConfirmation($this->l('Your configuration has been saved successfully!'));
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
            }else {
                Configuration::updateValue('ETS_ATC_DISPLAY_TYPE',Tools::getValue('ETS_ATC_DISPLAY_TYPE'));
                $output.= $this->displayError($this->_errors);
            }
        }else if (Tools::isSubmit('reset_config')){
            $this->initDefaultData(true);
            die(json_encode(array(
                'success' => $this->l('Configuration was successfully reset. This page will be reloaded in 3 seconds'),
            )));
        }

    }

    public function regexTemplates() {
        $tpl_product  = $this->is17 ? 'templates/catalog/_partials/miniatures/product.tpl' : 'product-list.tpl';
        $tpl_product = (@file_exists(_PS_THEME_DIR_ . $tpl_product) ? _PS_THEME_DIR_ : _PS_PARENT_THEME_DIR_) . $tpl_product;

        if (!@file_exists($tpl_product . '.backup') && @file_exists($tpl_product)) {
            $tpl_content = Tools::file_get_contents($tpl_product);
            if (!preg_match('/\{hook[^\}]+?displayATCButton[^\}]+?\}/ms', $tpl_content) && @copy($tpl_product, $tpl_product . '.backup')) {
                $pattern = $this->is17 ? '/(<\/div>\n(\s*?)<\/article>)/ms' : '/(<div\s+class\s*=\s*"[^"]*?product-container[^"]*?">)/ms';
                if ($this->is17 && !preg_match($pattern,$tpl_content))
                    $pattern = '/(<\/div>(\s*?)<\/article>)/ms';
                $tpl_content = preg_replace(
                    $pattern,
                    '{hook h=\'displayATCButton\'}$1',
                    $tpl_content
                );
                @file_put_contents($tpl_product, $tpl_content);
            }
        }
    }

    public function baseAdminUrl()
    {
        return $this->context->link->getAdminLink('AdminModules', true) . '&configure=' . $this->name;
    }
    public function validateData($configs)
    {
        foreach ($configs as $key => $val) {
            if ($val['type'] == 'text') {
                if (isset($val['lang']) && $val['lang'] && $val['required'] && Tools::getValue('ETS_ATC_DISPLAY_TYPE') != 1) {
                    $languages = Language::getLanguages(false);
                    foreach ($languages as $lang) {
                        $tmp = Tools::getValue($key.'_'.$lang['id_lang']);
                        if (!trim($tmp)) {
                            $this->_errors[] = $val['label'].'_'.$lang['iso_code'].$this->l(' is required.');
                        }else if (Tools::strlen($tmp) > 20) {
                            $this->_errors[] = $val['label'].'_'.$lang['iso_code'].$this->l(' is too long. 20 characters allowed.');
                        }
                    }
                }
                elseif (!Validate::isInt(Tools::getValue($key)) || (int)Tools::getValue($key) < 0) {
                    $this->_errors[] = $val['label'].' '.$this->l('Input value is invalid.');
                }
            }
            elseif ($val['type'] == 'custom'){
                foreach ($val['options'] as $name => $option) {
                    if (!Validate::isInt(Tools::getValue($name))) {
                        $this->_errors[] = $option['label'].' '.$this->l('Input value is invalid.');
                    }
                }
            }
            elseif ($val['type'] == 'color') {
                if (!Validate::isColor(Tools::getValue($key))) {
                    $this->_errors[] = $val['label'].' '.$this->l('Invalid color input value.');
                }
            }
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be loaded in the BO.
     */
    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name || Tools::getValue('configure') == $this->name) {
            Media::addJsDef(['icons' => $this->etsDefines->getIcons(),
                        'img_dir' =>$this->_path.'/views/img/',
                    ]);

            $this->context->controller->addCSS($this->_path . 'views/css/back.css');
            $this->context->controller->addCSS($this->_path . 'views/css/select2.min.css');
            if ($this->is175) {
                $this->context->smarty->assign(array(
                    'js_path' =>$this->_path.'/views/js/',
                ));
                return $this->display(__FILE__,'admin_header.tpl');
            }else {
                $this->context->controller->addJS($this->_path . 'views/js/back.js');
                $this->context->controller->addJS($this->_path . 'views/js/select2.min.js');
                $this->context->controller->addJS($this->_path . 'views/js/colorpicker.js');
            }
        }
    }


    public function hookHeader()
    {
        if (Configuration::get('ETS_ADDTOCART_FROMLIST_LIVE_MODE')) {
            $this->context->controller->addJS($this->_path . '/views/js/front.js');
            $this->context->controller->addCSS($this->_path . '/views/css/front.css');
            $this->context->smarty->assign($this->getConfigFormValues());
            $this->context->smarty->assign(['id_language' => $this->context->language->id]);
            return $this->display(__FILE__, '/views/templates/hook/style.tpl');
        }
    }

    public function initDefaultData($reset=false)
    {
        $this->etsDefines ? $configs = $this->etsDefines->getConfigs() : $configs = ETS_AddToCartDefines::getInstance()->getConfigs();
        foreach ($configs as $key => $val) {
            if ($reset && isset($val['group_type'])) {
                if(Tools::getValue('config_type') && $val['group_type'] == 'icon_style') {
                    Configuration::updateValue($key, $val['default']);
                }elseif (!Tools::getValue('config_type') && $val['group_type'] == 'style') {
                    Configuration::updateValue($key, $val['default']);
                }
                Configuration::updateValue('ETS_ATC_DISPLAY_TYPE',(int)Tools::getValue('config_type'));
            }else {
                if (isset($val['lang']) && $val['lang']) {
                    $values = array();
                    $languages = Language::getLanguages(false);
                    foreach ($languages as $lang) {
                        $values[$lang['id_lang']] = trim(Tools::getValue($key.'_'.$lang['id_lang'])) ? trim(Tools::getValue($key.'_'.$lang['id_lang'])) : $val['default'];
                    }
                    Configuration::updateValue($key,$values);
                }
                elseif ($val['type'] == 'custom'){
                    foreach ($val['options'] as $name => $option) {
                        Configuration::updateValue($name,$option['default']);
                    }
                }
                else {
                    Configuration::updateValue($key, $val['default']);
                }
            }
        }
    }

    private function deletetDefaultData()
    {
        $this->etsDefines ? $configs = $this->etsDefines->getConfigs() : $configs = ETS_AddToCartDefines::getInstance()->getConfigs();
        foreach ($configs as $key => $val) {
                Configuration::deleteByName($key);
        }
    }
    public function displayIframe()
    {
        switch($this->context->language->iso_code) {
            case 'en':
                $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            case 'it':
                $url = 'https://cdn.prestahero.com/it/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            case 'fr':
                $url = 'https://cdn.prestahero.com/fr/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            case 'es':
                $url = 'https://cdn.prestahero.com/es/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            default:
                $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
        }
        $this->smarty->assign(
            array(
                'url_iframe' => $url
            )
        );
        return $this->display(__FILE__,'iframe.tpl');
    }
}
