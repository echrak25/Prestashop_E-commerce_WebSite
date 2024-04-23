<?php
/**
 * 2007-2022 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 wesite only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2022 ETS-Soft
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;

require_once dirname(__FILE__) . '/classes/PhVpDefine.php';
require_once dirname(__FILE__) . '/classes/PhVpViewedProduct.php';

if (!defined('_PH_VP_DISPLAY_HOME_')) define('_PH_VP_DISPLAY_HOME_', 1);
if (!defined('_PH_VP_DISPLAY_FP_')) define('_PH_VP_DISPLAY_FP_', 2);
if (!defined('_PH_VP_DISPLAY_RC_')) define('_PH_VP_DISPLAY_RC_', 3);
if (!defined('_PH_VP_DISPLAY_LC_')) define('_PH_VP_DISPLAY_LC_', 4);
if (!defined('_PH_VP_DISPLAY_CUSTOM_')) define('_PH_VP_DISPLAY_CUSTOM_', 5);

class Ph_viewedproducts extends Module
{
    private $currentProductId;

    public function __construct()
    {
        $this->name = 'ph_viewedproducts';
        $this->author = 'ETS-Soft';
        $this->tab = 'front_office_features';
        $this->version = '1.1.2';
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Viewed products');
        $this->description = $this->l('Display a list of viewed products on various positions: Homepge, product pages, left sidebar, right sidebar. Product list is saved for logged-in customers.');
$this->refs = 'https://prestahero.com/';
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        $phDef = PhVpDefine::getInstance();
        return parent::install()
            && $this->registerHook('displayBackOfficeHeader')
            && $this->registerHook('actionCustomerAccountAdd')
            && $this->registerHook('actionAuthentication')
            && $this->registerHook('displayHome')
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayProductButtons')
            && $this->registerHook('displayFooterProduct')
            && $this->registerHook('displayProductAdditionalInfo')
            && $this->registerHook('displayRightColumn')
            && $this->registerHook('displayLeftColumn')
            && $this->registerHook('displayEtsVPCustom')
            && $phDef->installDb()
            && $this->setDefaultConfig();
    }

    public function uninstall()
    {
        $phDef = PhVpDefine::getInstance();
        return parent::uninstall()
            && $phDef->uninstallDb()
            && $this->removeConfigs();
    }

    public function setDefaultConfig()
    {
        $languages = Language::getLanguages(false);
        foreach (PhVpDefine::getInstance()->getFormFields() as $config){
            if(isset($config['default']) && $config['default']){
                if(isset($config['lang']) && $config['lang']){
                    $val = array();
                    foreach ($languages as $lang){
                        $val[$lang['id_lang']] = $config['default'];
                    }
                    Configuration::updateValue($config['name'], $val);
                }
                else
                    Configuration::updateValue($config['name'], $config['default']);
            }
        }
        return true;
    }

    public function removeConfigs()
    {
        $phDef = PhVpDefine::getInstance();
        foreach ($phDef->getFormFields() as $config) {
            Configuration::deleteByName($config['name']);
        }
        return true;
    }

    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/ets_viewedproducts.css', 'all');
    }

    public function hookDisplayBackOfficeHeader()
    {
        $controller = Tools::getValue('controller');
        $this->smarty->assign(array(
            'jsAdmin' => $controller == 'AdminModules' && Tools::getValue('configure') == $this->name ? $this->_path . 'views/js/admin.js' : null
        ));

        return $this->display(__FILE__, 'admin_head.tpl');
    }

    public function hookDisplayProductAdditionalInfo($params)
    {
        if(($product = $params['product']) && is_object($product) && $product->id)
            $this->addViewedProduct((int)$product->id);
    }

    public function hookActionCustomerAccountAdd($params)
    {
        if (!isset($params['newCustomer'])) {
            return;
        }
        $this->updateViewedProductToDB($params['newCustomer']->id);
    }

    public function hookActionAuthentication($params)
    {
        if (!isset($params['customer'])) {
            return;
        }
        $this->updateViewedProductToDB($params['customer']->id);
    }

    public function showViewedProducts($hook = null)
    {
        $viewedProductIds = $this->getViewedProductIds();
       // $idProductCurrent = Tools::getValue('controller')=='product' ? (int)Tools::getValue('id_product') : 0;

        //Remove current product
        /*if ($idProductCurrent && $viewedProductIds && ($index = array_search($idProductCurrent, $viewedProductIds)) !== false)
            array_splice($viewedProductIds, $index, 1);*/
        if (!$viewedProductIds) {
            return;
        }
        $products = $this->getViewedProducts($viewedProductIds);
        $this->smarty->assign(
            array(
                'products' => $products,
                'hook' => $hook,
                'title' => Configuration::get('PH_VP_TITLE', $this->context->language->id)
            )
        );
        return $this->display(__FILE__, 'viewed_products.tpl');
    }

    public function getContent()
    {
        $html = $this->saveConfigForm();
        return $html . $this->renderForm().$this->displayIframe();
    }

    public function renderForm()
    {
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitPhApiConfig';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $phDef = PhVpDefine::getInstance();
        $configFields = $phDef->getFormFields();
        $fields_value = array();
        foreach ($configFields as $item) {
            $fields_value[$item['name']] = Tools::isSubmit('submitOptionPhVpConfig') ? $this->getConfigData($item['name'], isset($item['lang']) && $item['lang']) : $this->getConfigData($item['name'], isset($item['lang']) && $item['lang'], true);
        }
        $hookAccepted = Tools::isSubmit('submitOptionPhVpConfig') ? $this->getConfigData('PH_VP_HOOK_DISPLAYED', false) : $this->getConfigData('PH_VP_HOOK_DISPLAYED', false, true);
        $helper->tpl_vars = array(
            'fields_value' => $fields_value,
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
            'listHooks' => $this->listHookDisplayViewedProduct(),
            'hookAccepted' => $hookAccepted && !is_array($hookAccepted) ? explode(',', $hookAccepted) : $hookAccepted
        );
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                ),
                'input' => array(),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'name' => 'submitOptionPhVpConfig',
                    'class' => 'btn btn-default pull-right'
                )
            )
        );
        $fields_form['form']['input'] = $configFields;
        return $helper->generateForm(array($fields_form));
    }

    public function getConfigData($name, $multiLang = false, $inConfig = false)
    {
        if (!$multiLang) {
            return $inConfig ? Configuration::get($name) : Tools::getValue($name);
        }
        $value = array();
        foreach (Language::getLanguages(false) as $lang) {
            $value[$lang['id_lang']] = $inConfig ? Configuration::get($name, $lang['id_lang']) : Tools::getValue($name . '_' . $lang['id_lang']);
        }
        return $value;
    }

    public function saveConfigForm()
    {
        if (Tools::isSubmit('submitOptionPhVpConfig')) {
            $phDef = PhVpDefine::getInstance();
            $configs = $phDef->getFormFields();
            $errors = array();
            $languages = Language::getLanguages(false);
            foreach ($configs as $config)
            {
                $value = Tools::getValue($config['name']);
                if(isset($config['lang']) && $config['lang'] && isset($config['required']) && $config['required']){
                    if(!Tools::getValue($config['name'] . '_' . Configuration::get('PS_LANG_DEFAULT')))
                        $errors[] = isset($config['message']['required']) ? $config['message']['required'] : $config['name'].' '.$this->l('is required');
                    elseif(isset($config['validate']) && $config['validate']){
                        foreach ($languages as $lang){
                            if(($langVal = Tools::getValue($config['name'] . '_' . $lang['id_lang'])) && !Validate::{$config['validate']}($langVal)){
                                $errors[] = isset($config['message']['validate']) ? '"'.$lang['iso_code'].'" '.$config['message']['validate'] : '"'.$lang['iso_code'].'" '.$config['name'].' '.$this->l('is invalid');
                            }
                        }
                    }
                }
                else if(!$value && $value != '0' && isset($config['required']) && $config['required']){
                    $errors[] = $config['message']['required'];
                } elseif ($value == '0' && $config['name'] == 'PH_VP_NB_PROD_DISPLAYED') {
                    $errors[] = $this->l('The number products to display must greater than zero');
                } elseif (($value || $value == '0') && isset($config['validate']) && $config['validate'] && !Validate::{$config['validate']}($value)) {
                    $errors[] = $config['message']['validate'];
                }
            }

            if ($errors) {
                return $this->displayError($errors);
            }
            $languages = Language::getLanguages(false);
            $langDefault = Configuration::get('PS_LANG_DEFAULT');
            foreach ($configs as $config) {
                if (isset($config['lang']) && $config['lang']) {
                    $value = array();
                    foreach ($languages as $lang) {
                        $value[$lang['id_lang']] = ($langValue = Tools::getValue($config['name'] . '_' . $lang['id_lang'])) ? $langValue : Tools::getValue($config['name'] . '_' . $langDefault);
                    }
                    Configuration::updateValue($config['name'], $value);
                } else {
                    $value = Tools::getValue($config['name']);
                    Configuration::updateValue($config['name'], is_array($value) ? implode(',', $value) : $value);
                }
            }

            return $this->displayConfirmation($this->l('Configuration updated'));
        }
        return null;
    }

    public function listHookDisplayViewedProduct()
    {
        return array(
            array(
                'title' => $this->l('Home page'),
                'name' => 'displayHome',
                'value' => 1,
            ),
            array(
                'title' => $this->l('Product page'),
                'name' => 'displayFooterProduct',
                'value' => 2,
            ),
            array(
                'title' => $this->l('Right column'),
                'name' => 'displayRightColumn',
                'value' => 3,
            ),

            array(
                'title' => $this->l('Left column'),
                'name' => 'displayLeftColumn',
                'value' => 4,
            ),
            array(
                'title' => $this->l('Custom hook'),
                'name' => 'displayEtsVPCustom',
                'value' => 5,
                'desc' => $this->l('Put "{hook h=\'displayEtsVPCustom\'}" in the tpl file where you want to show the viewed products')
            ),
        );
    }

    public function addViewedProduct($idProduct)
    {
        if ($viewedProducts = $this->context->cookie->__get('ph_vp_viewed'))
            $productIds = array_map('intval', array_unique(explode(',', $viewedProducts)));
        else
            $productIds = array();
        if ($productIds && $productIds[0] == $idProduct)
            return true;
        if ($productIds && ($index = array_search($idProduct, $productIds)) !== false)
            array_splice($productIds, $index, 1);
        $limit = (int)Configuration::get('PH_VP_NB_PROD_DISPLAYED');
        if ($limit && count($productIds) > $limit-1) { //limit
            array_splice($productIds, $limit-1);
        }
        array_unshift($productIds, $idProduct);
        $viewedProducts = implode(',', $productIds);
        $this->context->cookie->__set('ph_vp_viewed', $viewedProducts);
        if ($this->context->customer->isLogged()) {
            $idVP = Db::getInstance()->getValue("SELECT `id_ph_vp_viewed_product` FROM `" . _DB_PREFIX_ . "ph_vp_viewed_product` WHERE `id_customer`=" . (int)$this->context->customer->id);
            if ($idVP) {
                $vp = new PhVpViewedProduct((int)$idVP);
            } else {
                $vp = new PhVpViewedProduct();
                $vp->id_customer = $this->context->customer->id;
            }
            $vp->viewed_product = (string)$viewedProducts;
            $vp->save();
        }
    }

    public function getViewedProductIds()
    {
        return ($viewedProducts = $this->context->cookie->__get('ph_vp_viewed')) ? explode(',', $viewedProducts) : array();
    }

    public function getViewedProducts($productIds)
    {
        if (!$productIds) {
            return array();
        }

        $assembler = new ProductAssembler($this->context);

        $presenterFactory = new ProductPresenterFactory($this->context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new ProductListingPresenter(
            new ImageRetriever(
                $this->context->link
            ),
            $this->context->link,
            new PriceFormatter(),
            new ProductColorsRetriever(),
            $this->context->getTranslator()
        );

        $products_for_template = array();
        $limit = (int)Configuration::get('PH_VP_NB_PROD_DISPLAYED');
        if (is_array($productIds)) {
            foreach ($productIds as $productId) {
                if (($product = new Product($productId)) && (!$product->id || !$product->active || !$product->state ))
                    continue;
                $products_for_template[] = $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct(array('id_product' => $productId)),
                    $this->context->language
                );
                if(count($products_for_template) >= $limit)
                    break;
            }
        }
        return $products_for_template;
    }

    public function isShowViewedProductInHook($hookId)
    {
        $hookConfig = Configuration::get('PH_VP_HOOK_DISPLAYED');
        if (!$hookConfig) {
            return false;
        }
        $hookArray = explode(',', $hookConfig);
        if (in_array($hookId, $hookArray)) {
            return true;
        }
        return false;
    }

    public function getViewedObjByCustomerId($customerId)
    {
        if ($idVd = Db::getInstance()->getValue("
            SELECT `id_ph_vp_viewed_product` 
            FROM `" . _DB_PREFIX_ . "ph_vp_viewed_product` 
            WHERE id_customer=" . (int)$customerId
        ))
            return ($vpObj = new PhVpViewedProduct((int)$idVd)) && $vpObj->id ? $vpObj : false;
        return false;
    }

    public function updateViewedProductToDB($customerId)
    {
        if (!$customerId || !($ids = $this->getViewedProductIds())) {
            return;
        }
        if (!($vpObj = $this->getViewedObjByCustomerId($customerId))) {
            $vpObj = new PhVpViewedProduct();
            $vpObj->id_customer = (int)$customerId;
        }
        if($savedIds = $vpObj->viewed_product ? explode(',', $vpObj->viewed_product) : array())
        {
            $limit = (int)Configuration::get('PH_VP_NB_PROD_DISPLAYED');
            foreach($savedIds as $id)
            {
                if(!in_array($id,$ids))
                {
                    $ids[] = (int)$id;
                    if(count($ids) >= $limit) //$limit + 1
                        break;
                }
            }
        }
        $vpObj->viewed_product = implode(',', $ids);
        $this->context->cookie->__set('ph_vp_viewed', $vpObj->viewed_product);
        return $vpObj->save();
    }

    public function hookDisplayHome()
    {
        $this->smarty->assign(
            array(
                'hooks' => 'home',
            )
        );
        if (!$this->isShowViewedProductInHook(_PH_VP_DISPLAY_HOME_)) {
            return;
        }
        return $this->showViewedProducts();
    }

    public function hookDisplayFooterProduct()
    {
        if (!$this->isShowViewedProductInHook(_PH_VP_DISPLAY_FP_)) {
            return;
        }
        return $this->showViewedProducts('footer_product');
    }

    public function hookDisplayRightColumn()
    {
        if (!$this->isShowViewedProductInHook(_PH_VP_DISPLAY_RC_)) {
            return;
        }
        return $this->showViewedProducts('right');
    }

    public function hookDisplayLeftColumn()
    {
        if (!$this->isShowViewedProductInHook(_PH_VP_DISPLAY_LC_)) {
            return;
        }
        return $this->showViewedProducts('left');
    }
    public function hookDisplayEtsVPCustom()
    {
        if (!$this->isShowViewedProductInHook(_PH_VP_DISPLAY_CUSTOM_) || ($module=Tools::getValue('module')) && $module =='ph_productfeed') {
            return;
        }
        return $this->showViewedProducts('custom');
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