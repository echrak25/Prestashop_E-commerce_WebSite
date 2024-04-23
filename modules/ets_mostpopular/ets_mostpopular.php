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

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

if (!defined('_PS_VERSION_')) {
    exit;
}
require_once(dirname(__FILE__) . '/classes/ets_mostpopular_defines.php');
class Ets_mostpopular extends Module implements WidgetInterface
{
    private $templateFile;
    public $_errors= array();
    public $hooks = array(
        'displayFooterProduct',
        'actionProductAdd',
        'actionProductDelete',
        'actionProductUpdate',
        'actionAdminGroupsControllerSaveAfter',
        'displayHome',
        'displayHeader',
        'displayRightColumn',
        'displayLeftColumn',
        'displayBackOfficeHeader',
    );
    public $_html;
    public $fields_form;
    public function __construct()
    {
        $this->name = 'ets_mostpopular';
        $this->author = 'PrestaHero';
        $this->tab = 'front_office_features';
        $this->version = '1.0.5';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.7.0.0','max' => _PS_VERSION_);
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Most popular products');
        $this->description = $this->l('Add a block displaying your store’s most popular products on various positions');
$this->refs = 'https://prestahero.com/';
        $this->templateFile = 'module:ets_mostpopular/views/templates/hook/ets_mostpopular.tpl';
    }
    public function install()
    {
        return parent::install() && $this->installHooks()&& $this->_installDefaultConfig();
    }
    public function installHooks()
    {
        foreach($this->hooks as $hook)
            $this->registerHook($hook);
        return true;
    }
    public function _installDefaultConfig()
    {
        $inputs = $this->getConfigInputs();
        $languages = Language::getLanguages(false);
        if($inputs)
        {
            foreach($inputs as $input)
            {
                if($input['type']=='html')
                    Continue;
                if(isset($input['default']) && $input['default'])
                {
                    if(isset($input['lang']) && $input['lang'])
                    {
                        $values = array();
                        foreach($languages as $language)
                        {
                            if(isset($input['default_is_file']) && $input['default_is_file'])
                                $values[$language['id_lang']] = file_exists(dirname(__FILE__).'/default/'.$input['default_is_file'].'_'.$language['iso_code'].'.txt') ? Tools::file_get_contents(dirname(__FILE__).'/default/'.$input['default_is_file'].'_'.$language['iso_code'].'.txt') : Tools::file_get_contents(dirname(__FILE__).'/default/'.$input['default_is_file'].'_en.txt');
                            else
                                $values[$language['id_lang']] = isset($input['default_lang']) && $input['default_lang'] ? $this->getTextLang($input['default_lang'],$language,'ets_mostpopular_defines') : $input['default'];
                        }
                        Configuration::updateGlobalValue($input['name'],$values,isset($input['autoload_rte']) && $input['autoload_rte'] ? true : false);
                    }
                    else
                        Configuration::updateGlobalValue($input['name'],$input['default']);
                }
            }
        }
        return true;
    }
    public function uninstall()
    {
        return parent::uninstall() && $this->unInstallHooks() && $this->_unInstallDefaultConfig();
    }
    public function unInstallHooks()
    {
        foreach($this->hooks as $hook)
            $this->unregisterHook($hook);
        return true;
    }
    public function _unInstallDefaultConfig()
    {
        $inputs = $this->getConfigInputs();
        if($inputs)
        {
            foreach($inputs as $input)
            {
                if($input['type']=='html')
                    Continue;
                Configuration::deleteByName($input['name']);
            }
        }
        Configuration::deleteByName('ETS_MOSTP_ENABLED_IN_LEFT');
        Configuration::deleteByName('ETS_MOSTP_ENABLED_IN_RIGHT');
        Configuration::deleteByName('ETS_MOSTP_ENABLED_IN_PRODUCT');
        return true; 
    }
    public function getConfigInputs()
    {
        return Ets_mostpopular_defines::getInstance()->getConfigInputs();
    }
    public function renderWidget($hookName, array $configuration)
    {
        $variables = $this->getWidgetVariables($hookName, $configuration);
        if (empty($variables)) {
            return false;
        }
        $this->smarty->assign($variables);
        return $this->fetch($this->templateFile);
    }
    public function getWidgetVariables($hookName, array $configuration)
    {
        
        $position = '';
        switch(Tools::strtolower($hookName))
        {
            case 'displayhome':
                $position='home';
                break;
            case 'displayrightcolumn':
                $position='right';
                break;
            case 'displayleftcolumn':
                $position ='left';
                break;
        }
        if($position=='home' || Configuration::get('ETS_MOSTP_ENABLED_IN_'.Tools::strtoupper($position)))
        {
            $products = $this->getMostPopularProducts($position);
            if (!empty($products)) {
                return array(
                    'products' => $products,
                    'blockName' => $position,
                    'block_title' => Configuration::get('ETS_MOSTP_TILE_'.Tools::strtoupper($position).'_BLOCK',$this->context->language->id),
                    'ets_mostp_display_type' => Configuration::get('ETS_MOSTP_DISPLAY_TYPE_IN_'.Tools::strtoupper($position)) ? : 'gird', 
                    'slide_auto_play' => Configuration::get('ETS_MOSTP_AUTO_PLAY_'.Tools::strtoupper($position)),
                    'allFeaturedProductsLink' => Context::getContext()->link->getCategoryLink(Configuration::get('ETS_MOSTP_HOME_FEATURED_CAT')),
                    'ets_mostp_configuration' => $configuration,
                );
            }
        }
        return false;
    }
    protected function getMostPopularProducts($position)
    {
        if (Configuration::get('PS_CATALOG_MODE')) {
            return false;
        }
        $nProducts = (int) Configuration::get('ETS_MOSTP_NUMBER_PRODUCT_IN_'.Tools::strtoupper($position)) ? :true;
        if (!$nProducts) {
            return false;
        }
        $featuredProducts = Ets_mostpopular_defines::getMostPopularProducts(
            (int)$this->context->language->id,
            0,
            $nProducts
        );

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

        if (is_array($featuredProducts)) {
            foreach ($featuredProducts as $rawProduct) {
                $products_for_template[] = $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct($rawProduct),
                    $this->context->language
                );
            }
        }

        return $products_for_template;
    }
    public function addJquery()
    {
        if (version_compare(_PS_VERSION_, '1.7.6.0', '>=') && version_compare(_PS_VERSION_, '1.7.7.0', '<'))
            $this->context->controller->addJS(_PS_JS_DIR_ . 'jquery/jquery-'._PS_JQUERY_VERSION_.'.min.js');
        else
            $this->context->controller->addJquery();
    }
    public function hookDisplayBackOfficeHeader()
    {
        $controller = Tools::getValue('controller');
        $configure = Tools::getValue('configure');
        if($controller=='AdminModules' && $configure== $this->name)
        {
            $this->addJquery();
            $this->context->controller->addCSS($this->_path . 'views/css/admin.css', 'all');
            $this->context->controller->addJS($this->_path . 'views/js/admin.js');
        }
    }
    public function getContent()
    {
        $this->_html = '';
        self::registerPlugins();
        if (Tools::isSubmit('btnSubmit')) {
            $this->saveSubmit($this->getConfigInputs());
        }
        $inputs = $this->getConfigInputs();
        $this->_html .= $this->renderForm($inputs,'btnSubmit',$this->l('Settings'));
        $this->_html .= $this->displayIframe();
        return $this->_html;
    }
    public function saveSubmit($inputs)
    {
        $this->_postValidation($inputs);
        if (!count($this->_errors)) {
            $languages = Language::getLanguages(false);
            $id_lang_default = Configuration::get('PS_LANG_DEFAULT');
            if($inputs)
            {
                foreach($inputs as $input)
                {
                    if($input['type']!='html')
                    {
                        if(isset($input['lang']) && $input['lang'])
                        {
                            $values = array();
                            foreach($languages as $language)
                            {
                                $value_default = Tools::getValue($input['name'].'_'.$id_lang_default);
                                $value = Tools::getValue($input['name'].'_'.$language['id_lang']);
                                $values[$language['id_lang']] = ($value && Validate::isCleanHtml($value,true)) || !isset($input['required']) ? $value : (Validate::isCleanHtml($value_default,true) ? $value_default :'');
                            }
                            Configuration::updateValue($input['name'],$values,isset($input['autoload_rte']) && $input['autoload_rte'] ? true : false);
                        }
                        else
                        {
                            
                            if($input['type']=='checkbox')
                            {
                                $val = Tools::getValue($input['name'],array());
                                if(is_array($val) && self::validateArray($val))
                                {
                                    Configuration::updateValue($input['name'],implode(',',$val));
                                }
                            }
                            elseif($input['type']=='file')
                            {
                                //
                            }
                            else
                            {
                                $val = Tools::getValue($input['name']);
                                if(Validate::isCleanHtml($val))
                                    Configuration::updateValue($input['name'],$val);
                            }
                           
                        }
                    }
                    
                }
            }
            $ETS_MOSTP_ENABLED_IN_LEFT = (int)Tools::getValue('ETS_MOSTP_ENABLED_IN_LEFT');
            $ETS_MOSTP_ENABLED_IN_RIGHT = (int)Tools::getValue('ETS_MOSTP_ENABLED_IN_RIGHT');
            $ETS_MOSTP_ENABLED_IN_PRODUCT = (int)Tools::getValue('ETS_MOSTP_ENABLED_IN_PRODUCT');
            Configuration::updateValue('ETS_MOSTP_ENABLED_IN_LEFT',$ETS_MOSTP_ENABLED_IN_LEFT);
            Configuration::updateValue('ETS_MOSTP_ENABLED_IN_RIGHT',$ETS_MOSTP_ENABLED_IN_RIGHT);
            Configuration::updateValue('ETS_MOSTP_ENABLED_IN_PRODUCT',$ETS_MOSTP_ENABLED_IN_PRODUCT);
            if(Tools::isSubmit('ajax'))
            {
                if(count($this->_errors))
                {
                    if(Tools::isSubmit('ajax'))
                    {
                        die(
                            json_encode(
                                array(
                                    'errors' => $this->displayError($this->_errors),
                                )
                            )
                        );
                    }
                }
                else
                {
                    die(
                        json_encode(
                            array(
                                'success' => $this->l('Settings updated'),
                            )
                        )
                    );
                }
            }
            $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
        } else {
            if(Tools::isSubmit('ajax'))
            {
                die(
                    json_encode(
                        array(
                            'errors' => $this->displayError($this->_errors),
                        )
                    )
                );
            }
            $this->_html .= $this->displayError($this->_errors);
        }
    }
    public function _postValidation($inputs)
    {
        $languages = Language::getLanguages(false);
        $id_lang_default = Configuration::get('PS_LANG_DEFAULT');
        foreach($inputs as $input)
        {
            if($input['type']=='html')
                continue;
            if(isset($input['lang']) && $input['lang'])
            {
                if(isset($input['required']) && $input['required'])
                {
                    $val_default = Tools::getValue($input['name'].'_'.$id_lang_default);
                    if(!$val_default)
                    {
                        $this->_errors[] = sprintf($this->l('%s is required'),$input['label']);
                    }
                    elseif($val_default && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate) && !Validate::{$validate}($val_default,true))
                        $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                    elseif($val_default && !Validate::isCleanHtml($val_default,true))
                        $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                    else
                    {
                        foreach($languages as $language)
                        {
                            if(($value = Tools::getValue($input['name'].'_'.$language['id_lang'])) && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate)  && !Validate::{$validate}($value,true))
                                $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                            elseif($value && !Validate::isCleanHtml($value,true))
                                $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                        }
                    }
                }
                else
                {
                    foreach($languages as $language)
                    {
                        if(($value = Tools::getValue($input['name'].'_'.$language['id_lang'])) && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate)  && !Validate::{$validate}($value,true))
                            $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                        elseif($value && !Validate::isCleanHtml($value,true))
                            $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                    }
                }
            }
            else
            {
                if($input['type']=='file')
                {
                    
                    if(isset($input['required']) && $input['required'] && (!isset($_FILES[$input['name']]) || !isset($_FILES[$input['name']]['name']) ||!$_FILES[$input['name']]['name']))
                    {
                        $this->_errors[] = sprintf($this->l('%s is required'),$input['label']);
                    }
                    elseif(isset($_FILES[$input['name']]) && isset($_FILES[$input['name']]['name'])  && $_FILES[$input['name']]['name'])
                    {
                        $file_name = $_FILES[$input['name']]['name'];
                        $file_size = $_FILES[$input['name']]['size'];
                        $max_file_size = Configuration::get('PS_ATTACHMENT_MAXIMUM_SIZE')*1024*1024;
                        $type = Tools::strtolower(Tools::substr(strrchr($file_name, '.'), 1));
                        if(isset($input['is_image']) && $input['is_image'])
                            $file_types = array('jpg', 'png', 'gif', 'jpeg');
                        else
                            $file_types = array('jpg', 'png', 'gif', 'jpeg','zip','doc','docx');
                        if(!in_array($type,$file_types))
                            $this->_errors[] = sprintf($this->l('The file name "%s" is not in the correct format, accepted formats: %s'),$file_name,'.'.trim(implode(', .',$file_types),', .'));
                        $max_file_size = $max_file_size ? : Configuration::get('PS_ATTACHMENT_MAXIMUM_SIZE')*1024*1024;
                        if($file_size > $max_file_size)
                            $this->_errors[] = sprintf($this->l('The file name "%s" is too large. Limit: %s'),$file_name,Tools::ps_round($max_file_size/1048576,2).'Mb');
                    }
                }
                else
                {
                    $val = Tools::getValue($input['name']);
                    if($input['type']!='checkbox')
                    {
                       
                        if($val===''&& isset($input['required']) && $input['required'])
                        {
                            $this->_errors[] = sprintf($this->l('%s is required'),$input['label']);
                        }
                        if($val!=='' && isset($input['validate']) && ($validate = $input['validate']) && $validate=='isColor' && !self::isColor($val))
                        {
                            $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                        }
                        elseif($val!=='' && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate) && !Validate::{$validate}($val))
                        {
                            $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                        }
                        elseif($val!=='' && $val<=0 && isset($input['validate']) && ($validate = $input['validate']) && $validate=='isUnsignedInt')
                        {
                            $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                        }
                        elseif($val!==''&& !Validate::isCleanHtml($val))
                            $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                    }
                    else
                    {
                        if(!$val&& isset($input['required']) && $input['required'] )
                        {
                            $this->_errors[] = sprintf($this->l('%s is required'),$input['label']);
                        }
                        elseif($val && !self::validateArray($val,isset($input['validate']) ? $input['validate']:''))
                            $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                    }
                }
            }
        }
        $title_home = Tools::getValue('ETS_MOSTP_TILE_HOME_BLOCK_'.$id_lang_default);
        if(!$title_home)
            $this->_errors[] = $this->l('Block title in home page is required');
        elseif(!Validate::isCleanHtml($title_home))
            $this->_errors[] = $this->l('Block title in home page is not valid');
        $ETS_MOSTP_ENABLED_IN_LEFT = (int)Tools::getValue('ETS_MOSTP_ENABLED_IN_LEFT');
        $ETS_MOSTP_ENABLED_IN_RIGHT = (int)Tools::getValue('ETS_MOSTP_ENABLED_IN_RIGHT');
        $ETS_MOSTP_ENABLED_IN_PRODUCT = (int)Tools::getValue('ETS_MOSTP_ENABLED_IN_PRODUCT');
        if($ETS_MOSTP_ENABLED_IN_LEFT)
        {
            $title_left = Tools::getValue('ETS_MOSTP_TILE_LEFT_BLOCK_'.$id_lang_default);
            if(!$title_left)
                $this->_errors[] = $this->l('Block title in left column is required');
            elseif(!Validate::isCleanHtml($title_left))
                $this->_errors[] = $this->l('Block title in left column is not valid');
        }
        if($ETS_MOSTP_ENABLED_IN_RIGHT)
        {
            $title_right = Tools::getValue('ETS_MOSTP_TILE_RIGHT_BLOCK_'.$id_lang_default);
            if(!$title_right)
                $this->_errors[] = $this->l('Block title in right column is required');
            elseif(!Validate::isCleanHtml($title_right))
                $this->_errors[] = $this->l('Block title in right column is not valid');
        }
        if($ETS_MOSTP_ENABLED_IN_PRODUCT)
        {
            $title_product = Tools::getValue('ETS_MOSTP_TILE_PRODUCT_BLOCK_'.$id_lang_default);
            if(!$title_product)
                $this->_errors[] = $this->l('Block title in product page is required');
            elseif(!Validate::isCleanHtml($title_product))
                $this->_errors[] = $this->l('Block title in product page is not valid');
        }
    }
    public function renderForm($inputs,$submit,$title,$configTabs=array())
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $title,
                    'icon' => ''
                ),
                'input' => $inputs,
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = $this->id;
        $helper->module = $this;
        $helper->identifier = $this->identifier;
        $helper->submit_action = $submit;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $language->id;
        $helper->override_folder ='/';
        $PS_MEDIA_SERVER_1 = Configuration::get('PS_MEDIA_SERVER_1');
        $current_tab = Tools::getValue('current_tab','home_block');
        if(!in_array($current_tab,array('home_block','left_block','right_block','product_block')))
            $current_tab = 'home_block';
        $helper->tpl_vars = array(
            'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
            'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL'),
            'shop_domain' => $PS_MEDIA_SERVER_1 ? $this->context->shop->domain:'',
            'PS_MEDIA_SERVER_1' => $PS_MEDIA_SERVER_1,
            'fields_value' => $this->getFieldsValues($inputs),
            'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
            'link' => $this->context->link,
            'configTabs' => $configTabs,
            'current_tab' => $current_tab,
            'current_currency'=> $this->context->currency,
            'ETS_MOSTP_ENABLED_IN_LEFT' => (int)Tools::getValue('ETS_MOSTP_ENABLED_IN_LEFT',Configuration::get('ETS_MOSTP_ENABLED_IN_LEFT')) ,
            'ETS_MOSTP_ENABLED_IN_RIGHT' =>(int)Tools::getValue('ETS_MOSTP_ENABLED_IN_RIGHT',Configuration::get('ETS_MOSTP_ENABLED_IN_RIGHT')),
            'ETS_MOSTP_ENABLED_IN_PRODUCT' =>(int)Tools::getValue('ETS_MOSTP_ENABLED_IN_PRODUCT',Configuration::get('ETS_MOSTP_ENABLED_IN_PRODUCT')),
        );
        $this->fields_form = array();
        return $helper->generateForm(array($fields_form));
    }
    public function getFieldsValues($inputs)
    {
        $languages = Language::getLanguages(false);
        $fields = array();
        $inputs = $inputs;
        if($inputs)
        {
            foreach($inputs as $input)
            {
                if(!isset($input['lang']))
                {
                    $fields[$input['name']] = Tools::getValue($input['name'],Configuration::get($input['name']));
                }
                else
                {
                    foreach($languages as $language)
                    {
                        $fields[$input['name']][$language['id_lang']] = Tools::getValue($input['name'].'_'.$language['id_lang'],Configuration::get($input['name'],$language['id_lang']));
                    }
                }
            }
        }
        return $fields;
    }
    public function getTextLang($text, $lang,$file_name='')
    {
        if(is_array($lang))
            $iso_code = $lang['iso_code'];
        elseif(is_object($lang))
            $iso_code = $lang->iso_code;
        else
        {
            $language = new Language($lang);
            $iso_code = $language->iso_code;
        }
		$modulePath = rtrim(_PS_MODULE_DIR_, '/').'/'.$this->name;
        $fileTransDir = $modulePath.'/translations/'.$iso_code.'.'.'php';
        if(!@file_exists($fileTransDir)){
            return $text;
        }
        $fileContent = Tools::file_get_contents($fileTransDir);
        $text_tras = preg_replace("/\\\*'/", "\'", $text);
        $strMd5 = md5($text_tras);
        $keyMd5 = '<{' . $this->name . '}prestashop>' . ($file_name ? : $this->name) . '_' . $strMd5;
        preg_match('/(\$_MODULE\[\'' . preg_quote($keyMd5) . '\'\]\s*=\s*\')(.*)(\';)/', $fileContent, $matches);
        if($matches && isset($matches[2])){
           return  $matches[2];
        }
        return $text;
    }
    public function hookDisplayHeader()
    {
        
        $this->context->controller->addCSS($this->_path . 'views/css/slick.css', 'all');
        $this->context->controller->addCSS($this->_path . 'views/css/front.css', 'all');
        $this->context->controller->addJS($this->_path . 'views/js/slick.min.js');
        $this->context->controller->addJS($this->_path . 'views/js/front.js');
    }
    public function hookDisplayFooterProduct()
    {
        if(Configuration::get('ETS_MOSTP_ENABLED_IN_PRODUCT'))
        {
            $products = $this->getMostPopularProducts('product');
            if (!empty($products)) {
                $this->smarty->assign(
                    array(
                        'products' => $products,
                        'blockName' => 'product',
                        'block_title' => Configuration::get('ETS_MOSTP_TILE_PRODUCT_BLOCK',$this->context->language->id),
                        'ets_mostp_display_type' => Configuration::get('ETS_MOSTP_DISPLAY_TYPE_IN_PRODUCT') ? : 'gird', 
                        'slide_auto_play' => Configuration::get('ETS_MOSTP_AUTO_PLAY_PRODUCT'),
                        'allFeaturedProductsLink' => Context::getContext()->link->getCategoryLink(Configuration::get('ETS_MOSTP_HOME_FEATURED_CAT')),
                    )
                );
                return $this->fetch($this->templateFile);
            }
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

	public static function validateArray($array, $validate = 'isCleanHtml')
	{
		if (method_exists('Validate', $validate)) {
			if ($array && is_array($array)) {
				$ok = true;
				foreach ($array as $val) {
					if (!is_array($val)) {
						if ($val && !Validate::$validate($val)) {
							$ok = false;
							break;
						}
					} else
						$ok = self::validateArray($val, $validate);
				}
				return $ok;
			}
		}
		return true;
	}

	public static function isColor($color)
	{
		return preg_match('/^(#[0-9a-fA-F]{6})$/', $color);
	}
    public static function registerPlugins(){
        if(version_compare(_PS_VERSION_, '8.0.4', '>='))
        {
            $smarty = Context::getContext()->smarty->_getSmartyObj();
            if(!isset($smarty->registered_plugins[ 'modifier' ][ 'implode' ]))
                Context::getContext()->smarty->registerPlugin('modifier', 'implode', 'implode');
            if(!isset($smarty->registered_plugins[ 'modifier' ][ 'strpos' ]))
                Context::getContext()->smarty->registerPlugin('modifier', 'strpos', 'strpos');
        }
    }
}