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
use PrestaShop\PrestaShop\Adapter\Category\CategoryProductSearchProvider;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

require_once dirname(__FILE__) . '/classes/PhRbcDefine.php';

class Ph_recommendbycategories extends Module
{
    public $saveWithSuccess = false;

    public function __construct()
    {
        $this->name = 'ph_recommendbycategories';
        $this->author = 'ETS-Soft';
        $this->tab = 'front_office_features';
        $this->version = '1.0.6';
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Smart Related Products, Same category products');
        $this->description = $this->l('Smart product suggestions (related products) based on same category, prioritized products, or prioritized categories');
$this->refs = 'https://prestahero.com/';
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return parent::install()
            && $this->registerHook('displayBackOfficeHeader')
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayFooterProduct')
            && $this->setDefaultConfig();
    }

    public function uninstall()
    {
        return parent::uninstall()
            && $this->deleteConfigKey();
    }

    public function setDefaultConfig()
    {
        $phDef = PhRbcDefine::getInstance();
        foreach ($phDef->getFormFields() as $config) {
            if (isset($config['default']) && $config['default']) {
                Configuration::updateValue($config['name'], $config['default']);
            }
        }
        return true;
    }

    public function deleteConfigKey()
    {
        $phDef = PhRbcDefine::getInstance();
        foreach ($phDef->getFormFields() as $config) {
            Configuration::deleteByName($config['name']);
        }
        return true;
    }

    public function getContent()
    {
        $html = $this->saveFormConfig();
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
        $phDef = PhRbcDefine::getInstance();
        $configFields = $phDef->getFormFields();
        $fields_value = array();

        foreach ($configFields as $item) {
            $fields_value[$item['name']] = Tools::isSubmit('submitOptionPhRbcConfig') || $this->saveWithSuccess ? $this->getConfigData($item['name'], isset($item['lang']) && $item['lang']) : $this->getConfigData($item['name'], isset($item['lang']) && $item['lang'], true);
        }
        $helper->tpl_vars = array(
            'fields_value' => $fields_value,
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                ),
                'input' => array(),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'name' => 'submitOptionPhRbcConfig',
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

    public function saveFormConfig()
    {
        if (Tools::getValue('submitOptionPhRbcConfig')) {
            $phDef = PhRbcDefine::getInstance();
            $configs = $phDef->getFormFields();
            $errors = array();
            $languages = Language::getLanguages(false);
            foreach ($configs as $config) {
                $value = Tools::getValue($config['name'], '');
                if (isset($config['lang']) && $config['lang']) {
                    if (isset($config['required']) && $config['required'] && Tools::getValue($config['name'] . '_' . Configuration::get('PS_LANG_DEFAULT')) == '')
                        $errors[] = isset($config['message']['required']) ? $config['message']['required'] : $config['name'] . ' ' . $this->l('is required');
                    elseif (isset($config['validate']) && $config['validate']) {
                        foreach ($languages as $lang) {
                            if (($langVal = Tools::getValue($config['name'] . '_' . $lang['id_lang'])) && !Validate::{$config['validate']}($langVal)) {
                                $errors[] = isset($config['message']['validate']) ? '"' . $lang['iso_code'] . '" ' . $config['message']['validate'] : '"' . $lang['iso_code'] . '" ' . $config['name'] . ' ' . $this->l('is invalid');
                            }
                        }
                    }
                } else if (isset($config['required']) && $config['required'] && !$value && Tools::strlen($value) == 0) {
                    $errors[] = isset($config['message']['required']) ? $config['message']['required'] : $config['name'] . ' ' . $this->l('is required');
                } else if ($config['name'] == 'PH_RBC_NB_PROD_DISPLAYED' && ($value == 0 || !Validate::isUnsignedInt($value))) {
                    $errors[] = isset($config['message']['validate']) ? $config['message']['validate'] : $config['name'] . ' ' . $this->l('is invalid');
                } else if (($config['name'] == 'PH_RBC_2ND_CATEGORY' || $config['name'] == 'PH_RBC_2ND_PRODUCTS') && $value != '' && !preg_match('/^[0-9]+(,[0-9]+)*$/', $value)) {
                    $errors[] = isset($config['message']['validate']) ? $config['message']['validate'] : $config['name'] . ' ' . $this->l('is invalid');
                }
            }

            if ($errors) {
                return $this->displayError($errors);
            }

            foreach ($configs as $config) {
                if (isset($config['lang']) && $config['lang']) {
                    $value = array();
                    foreach ($languages as $lang) {
                        $value[$lang['id_lang']] = ($valueLang = Tools::getValue($config['name'] . '_' . $lang['id_lang'])) != '' ? $valueLang : Tools::getValue($config['name'] . '_' . Configuration::get('PS_LANG_DEFAULT'));
                    }
                    Configuration::updateValue($config['name'], $value);
                } else {
                    $value = Tools::getValue($config['name']);
                    Configuration::updateValue($config['name'], is_array($value) ? implode(',', $value) : $value);
                }
            }
            $this->saveWithSuccess = true;
            return $this->displayConfirmation($this->l('Configuration updated successfully'));
        }
        return '';
    }

    public function hookDisplayBackOfficeHeader()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/admin.css');
    }

    public function hookDisplayHeader()
    {
        if (Tools::getValue('controller') != 'product')
            return;
        $this->context->controller->addCSS($this->_path . 'views/css/front.css');
        if ((int)Configuration::get('PH_RBC_ENABLE_SLIDER') || (int)Configuration::get('PH_RBC_ENABLE_SLIDER_ON_MOBILE')) {
            $this->context->controller->addCSS($this->_path . 'views/css/slick.css');
            $this->context->controller->addCSS($this->_path . 'views/css/slick-theme.css');
            $this->context->controller->addJS($this->_path . 'views/js/slick.min.js');
            $this->context->controller->addJS($this->_path . 'views/js/front.js');
        }
    }

    public function hookDisplayFooterProduct($params)
    {
        if (!isset($params['product'])) {
            return;
        }
        $product = $params['product'];
        return $this->showRecommendedProducts($product->id, $product->id_category_default);
    }

    public function showRecommendedProducts($idProduct, $idCategory)
    {
        $limit = (int)Configuration::get('PH_RBC_NB_PROD_DISPLAYED') ?: 4;
        $random = (bool)Configuration::get('PH_RBC_RANDOM_ORDER');
        $excludeFreeProducts = (bool)Configuration::get('PH_RBC_EXCLUDE_FREE_PRODUCTS');
        $excluded = ($excludedStr = Configuration::get('PH_RBC_EXCLUDED_PRODUCTS')) ? array_unique(array_map('intval', explode(',', $excludedStr))) : false;
        $excludedStr = $excluded ? implode(',',$excluded) : false;
        $ids = array();
        $extraWhere = "";
        if ($excludedStr) $extraWhere .= " AND cp.id_product NOT IN(".$excludedStr.") ";
        if ($excludeFreeProducts) $extraWhere .= " AND p.price != 0";

        if ($idCategory && ($productIds = Db::getInstance()->executeS("
                SELECT DISTINCT cp.id_product 
                FROM `" . _DB_PREFIX_ . "category_product` cp 
                JOIN `" . _DB_PREFIX_ . "product` p ON cp.id_product = p.id_product
                WHERE cp.id_category=" . (int)$idCategory . " AND cp.id_product != " . (int)$idProduct . $extraWhere ." AND p.active=1
                ORDER BY cp.position ASC LIMIT " . (int)$limit))) {
            $ids = array_column($productIds, 'id_product');
            if($ids && $random)
                shuffle($ids);
        }
        if (count($ids) < $limit) {
            if (($minorProductStr = Configuration::get('PH_RBC_2ND_PRODUCTS')) && ($minorProductIds = array_unique(array_map('intval', explode(',', $minorProductStr)))))
            {
                shuffle($minorProductIds);
                $ids = array_unique(array_merge($ids,$minorProductIds));
                foreach($ids as $key => $id)
                    if($id == $idProduct)
                    {
                        unset($ids[$key]);
                        break;
                    }
            }
            if(count($ids) > $limit)
                $ids = array_slice($ids,0,$limit);
        }
        if (count($ids) < $limit && ($minorCateStr = Configuration::get('PH_RBC_2ND_CATEGORY')) && ($minorCatIds = array_unique(array_map('intval', explode(',', $minorCateStr))))) {
            $sqlCateIds = "";
            foreach ($minorCatIds as $k => $id) {
                $sqlCateIds .= ($k > 0 ? " UNION " : "") . " SELECT " . (int)$id . " as id_category," . (int)($k + 1) . " as sort_order";
            }
            if(($productIds = Db::getInstance()->executeS("SELECT DISTINCT cp.id_product 
                    FROM (" . $sqlCateIds . ") ids 
                    LEFT JOIN `" . _DB_PREFIX_ . "category_product` cp ON cp.id_category = ids.id_category
                    LEFT JOIN `" . _DB_PREFIX_ . "product` p ON cp.id_product = p.id_product
                    WHERE cp.id_product != " . (int)$idProduct . ($excludedStr ? " AND cp.id_product NOT IN(".$excludedStr.") " : "").  " AND p.active=1
                    ORDER BY ids.sort_order ASC, cp.position ASC LIMIT 0," . (int)$limit)) && ($productIds = array_column($productIds, 'id_product')))
            {
                shuffle($productIds);
                $ids = array_unique(array_merge($ids,$productIds));
                foreach($ids as $key => $id)
                    if($id == $idProduct)
                    {
                        unset($ids[$key]);
                        break;
                    }
            }
            if(count($ids) > $limit)
                    $ids = array_slice($ids,0,$limit);
        }
        $recommendedProducts = $this->getRecommendedProducts($ids);
        $this->smarty->assign(array(
            'products' => $recommendedProducts,
            'position' => 0,
            'title' => ($title = Configuration::get('PH_RBC_TITLE', $this->context->language->id)) != '' ? $title : $this->l('Other products you may be interested in'),
            'enable_slider_on_desktop' => Configuration::get('PH_RBC_ENABLE_SLIDER') ? true : false,
            'enable_slider_on_mobile' => Configuration::get('PH_RBC_ENABLE_SLIDER_ON_MOBILE') ? true : false,
        ));
        return $this->display(__FILE__, 'recommended_product.tpl');
    }

    public function getRecommendedProducts($productIds)
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
        if (is_array($productIds)) {
            foreach ($productIds as $productId) {
                if (($product = new Product($productId)) && !$product->id)
                    continue;
                $products_for_template[] = $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct(array('id_product' => $productId)),
                    $this->context->language
                );
            }
        }
        return $products_for_template;
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