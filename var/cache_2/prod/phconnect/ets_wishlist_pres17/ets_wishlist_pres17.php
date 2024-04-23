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
require_once(dirname(__FILE__) . '/classes/Ets_wishlist_define.php');
require_once(dirname(__FILE__) . '/classes/Ets_wl_wishlist.php');
require_once(dirname(__FILE__) . '/classes/Ets_wl_statistics.php');
require_once(dirname(__FILE__) . '/classes/Ets_wl_paggination_class.php');
class Ets_wishlist_pres17 extends Module
{
    public $hooks = array(
        'displayBackOfficeHeader',
        'displayHeader',
        'Header',
        'displayProductActions',
        'displayCustomerAccount',
        'displayProductListReviews',
        'displayBeforeBodyClosingTag',
        'displayleftcolumn',
        'displayrightcolumn',
        'displayShoppingCartFooter',
    );
    public $_errors= array();
    public function __construct()
    {
        $this->name = 'ets_wishlist_pres17';
        $this->tab = 'front_office_features';
        $this->version = '1.0.4';
        $this->author = 'PrestaHero';
        $this->need_instance = 0;
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Advanced Wish list');
        $this->description = $this->l('Advanced wish list for PrestaShop 1.7.x websites');
$this->refs = 'https://prestahero.com/';
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }
    public function install()
    {
        return parent::install() && $this->installDb() && $this->installHooks()&& $this->_installDefaultConfig() && $this->createCustomCss() && $this->installLinkDefault();
    }
    public function unInstall()
    {
        return parent::unInstall() && $this->unInstallDb() && $this->unInstallHooks() && $this->_unInstallDefaultConfig();
    }
    public function installDb()
    {
        return Ets_wishlist_defines::installDb();
    }
    public function unInstallDb()
    {
        return Ets_wishlist_defines::unInstallDb();
    }
    public function installHooks()
    {
        foreach($this->hooks as $hook)
            $this->registerHook($hook);
        return true;
    }
    public function unInstallHooks()
    {
        foreach($this->hooks as $hook)
            $this->unregisterHook($hook);
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
                                $values[$language['id_lang']] = isset($input['default_lang']) && $input['default_lang'] ? $this->getTextLang($input['default_lang'],$language,'Ets_wishlist_Define') : $input['default'];
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
        return true; 
    }
    public function getConfigInputs()
    {
        return Ets_wishlist_defines::getInstance()->getConfigInputs();
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
        $current_tab = Tools::getValue('current_tab','left_block');
        if(!in_array($current_tab,array('left_block','right_block','shipping_block')))
            $current_tab = 'left_block';
        $helper->tpl_vars = array(
            'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
            'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL'),
            'fields_value' => $this->getFieldsValues($inputs),
            'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
            'link' => $this->context->link,
            'configTabs' => $configTabs,
            'current_currency'=> $this->context->currency,
            'current_tab' => $current_tab,
            'ETS_WLP_ENABLED_IN_LEFT' => (int)Tools::getValue('ETS_WLP_ENABLED_IN_LEFT',Configuration::get('ETS_WLP_ENABLED_IN_LEFT')) ,
            'ETS_WLP_ENABLED_IN_RIGHT' =>(int)Tools::getValue('ETS_WLP_ENABLED_IN_RIGHT',Configuration::get('ETS_WLP_ENABLED_IN_RIGHT')),
            'ETS_WLP_ENABLED_IN_SHIPPING' =>(int)Tools::getValue('ETS_WLP_ENABLED_IN_SHIPPING',Configuration::get('ETS_WLP_ENABLED_IN_SHIPPING')),
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
    public function displayTabs()
    {
        $current_tab = Tools::getValue('current_tab','settings');
        if(!in_array($current_tab, array('settings','statistics')))
            $current_tab = 'settings';
        $this->smarty->assign(
            array(
                'current_tab' => $current_tab,
                'link'=> $this->context->link,
                '_img_path'=> $this->_path.'views/img/',
                'link_config' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name,
            )
        );  
        return $this->display(__FILE__,'tabs.tpl');
    }
    public function getContent()
    {
        $this->_html = '';
        $this->_html .= $this->displayTabs();
        $current_tab = Tools::getValue('current_tab','settings');
        if(!in_array($current_tab, array('settings','statistics')))
            $current_tab = 'settings';
        if($current_tab =='settings')
        {
            $inputs = $this->getConfigInputs();
            if (Tools::isSubmit('btnSubmit')) {
                $this->saveSubmit($inputs);
            }
            $this->_html .= $this->renderForm($inputs,'btnSubmit',$this->l('Settings'));
        }
        else
        {
            $this->_html .= $this->renderStatistics();
        }
        $this->_html .= $this->displayIframe();
        return $this->_html;
    }
    public function renderStatistics()
    {
        $this->smarty->assign(
            array(
                'all_time_products' => Ets_wl_statistics::computeStatsFor('allTime'),
                'day_products' => Ets_wl_statistics::computeStatsFor('currentDay'),
                'month_products' => Ets_wl_statistics::computeStatsFor('currentMonth'),
                'year_products' => Ets_wl_statistics::computeStatsFor('currentYear'),
            )
        );
        return $this->display(__FILE__,'statistics.tpl');
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
            $this->createCustomCss();
            if(Tools::isSubmit('ajax'))
            {
                if(count($this->_errors))
                {
                    if(Tools::isSubmit('ajax'))
                    {
                        die(
                            Tools::jsonEncode(
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
                        Tools::jsonEncode(
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
                    Tools::jsonEncode(
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
                        elseif($val!=='' && $val<=0 && isset($input['validate']) && ($validate = $input['validate']) && ($validate=='isUnsignedInt' || $validate=='isUnsignedFloat') )
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
        $ETS_WLP_ENABLED_IN_LEFT = (int)Tools::getValue('ETS_WLP_ENABLED_IN_LEFT');
        $ETS_WLP_ENABLED_IN_RIGHT = (int)Tools::getValue('ETS_WLP_ENABLED_IN_RIGHT');
        $ETS_WLP_ENABLED_IN_SHIPPING = (int)Tools::getValue('ETS_WLP_ENABLED_IN_SHIPPING');
        if($ETS_WLP_ENABLED_IN_LEFT)
        {
            $title_left = Tools::getValue('ETS_WLP_TILE_LEFT_BLOCK_'.$id_lang_default);
            if(!$title_left)
                $this->_errors[] = $this->l('Block title in left column is required');
            elseif(!Validate::isCleanHtml($title_left))
                $this->_errors[] = $this->l('Block title in left column is not valid');
        }
        if($ETS_WLP_ENABLED_IN_RIGHT)
        {
            $title_right = Tools::getValue('ETS_WLP_TILE_RIGHT_BLOCK_'.$id_lang_default);
            if(!$title_right)
                $this->_errors[] = $this->l('Block title in right column is required');
            elseif(!Validate::isCleanHtml($title_right))
                $this->_errors[] = $this->l('Block title in right column is not valid');
        }
        if($ETS_WLP_ENABLED_IN_SHIPPING)
        {
            $title_shipping = Tools::getValue('ETS_WLP_TILE_SHIPPING_BLOCK_'.$id_lang_default);
            if(!$title_shipping)
                $this->_errors[] = $this->l('Block title in shipping cart page is required');
            elseif(!Validate::isCleanHtml($title_shipping))
                $this->_errors[] = $this->l('Block title in shipping cart page is not valid');
        }
        if(!$this->_errors)
        {
            Configuration::updateValue('ETS_WLP_ENABLED_IN_LEFT',$ETS_WLP_ENABLED_IN_LEFT);
            Configuration::updateValue('ETS_WLP_ENABLED_IN_RIGHT',$ETS_WLP_ENABLED_IN_RIGHT);
            Configuration::updateValue('ETS_WLP_ENABLED_IN_SHIPPING',$ETS_WLP_ENABLED_IN_SHIPPING);
        }
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
    public function addJquery()
    {
        if (version_compare(_PS_VERSION_, '1.7.6.0', '>=') && version_compare(_PS_VERSION_, '1.7.7.0', '<'))
            $this->context->controller->addJS(_PS_JS_DIR_ . 'jquery/jquery-'._PS_JQUERY_VERSION_.'.min.js');
        else
            $this->context->controller->addJquery();
    }
    public function hookDisplayBackOfficeHeader()
    {
        $configure = Tools::getValue('configure');
        $controller = Tools::getValue('controller');
        if($controller =='AdminModules' && $configure == $this->name)
        {
            $this->addJquery();
            $this->context->controller->addJS($this->_path.'views/js/admin.js');
            $this->context->controller->addCSS($this->_path.'views/css/admin.css');
            $current_tab = Tools::getValue('current_tab','settings');
            if(!in_array($current_tab, array('settings','statistics')))
                $current_tab = 'settings';  
            if($current_tab=='statistics')  
            {
                $this->context->controller->addJS($this->_path.'views/js/statistics.js');
                $this->context->controller->addCSS($this->_path.'views/css/statistics.css');
            }        
        }
    }
    public function hookHeader()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/slick.css', 'all');
        $this->context->controller->addJS($this->_path . 'views/js/slick.min.js');
        $this->context->controller->addJS($this->_path.'/views/js/block.js');
        $this->context->controller->addCSS($this->_path.'/views/css/block.css');
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
        $this->context->controller->addCSS($this->_path.'/views/css/wishlist.css');
        $module = Tools::getValue('module');
        if($module== $this->name)
        {
            $this->context->controller->addCSS($this->_path.'/views/css/page.css');
        }
        if(file_exists(dirname(__FILE__).'/views/css/custom.css'))
        {
            $this->context->controller->addCSS($this->_path.'/views/css/custom.css');
        }
    }
    public function hookDisplayCustomerAccount(array $params)
    {
        $this->smarty->assign([
            'list_wishlist_url' => $this->context->link->getModuleLink($this->name, 'lists'),
            'title_wishlist_page' => Configuration::get('ETS_WL_MY_WISHLISTS',$this->context->language->id),
        ]);
        return $this->display(__FILE__,'displayCustomerAccount.tpl');
    }
    public function createCustomCss()
    {
        $css = Tools::file_get_contents(dirname(__FILE__).'/views/css/install.css');
        $inputs = $this->getConfigInputs();
        $replaces = array();
        if($inputs)
        {
            foreach($inputs as $input)
            {
                if(isset($input['iscss']) && $input['iscss'])
                    $replaces[$input['name']] = Configuration::get($input['name']) ? :'';
            }
        }
        $css = str_replace(array_keys($replaces),$replaces,$css);
        file_put_contents(dirname(__FILE__).'/views/css/custom.css',$css);
        return true;
    }
    public static function isColor($color)
    {
        return preg_match('/^(#[0-9a-fA-F]{6})$/', $color);
    }
    public function hookDisplayProductListReviews($params)
    {
        if(Configuration::get('ETS_WL_ENABLE_PRODUCT_LIST') && (isset($params['id_product']) && ($id_product = (int)$params['id_product'])) ||  (isset($params['product']) && ($product = $params['product']) && isset($product['id_product']) && ($id_product = (int)$product['id_product'])) )
        {
            $id_product_attribute = isset($params['id_product_attribute']) && (int)$params['id_product_attribute']  ? (int)$params['id_product_attribute'] :(isset($product['id_product_attribute']) ? $product['id_product_attribute']:0);
            $this->smarty->assign(
                array(
                    'customer_logged' => $this->context->customer->isLogged(),
                    'id_product' => $id_product,
                    'id_product_attribute' => $id_product_attribute,
                    'added_to_wishlist' => Ets_wl_wishList::checkAddedToWishlist($id_product,$id_product_attribute), 
                    'url_wishlist' => $this->context->link->getModuleLink($this->name,'action'),
                    'ETS_WL_BUTTON_POSITION' => Configuration::get('ETS_WL_BUTTON_POSITION') ? :'left',
                    'ETS_WL_BACKGROUND_BORDER' => Configuration::get('ETS_WL_BACKGROUND_BORDER') ? :'square',
                )
            );
            return $this->display(__FILE__,'list_button_list.tpl');
        }
    }
    public function hookDisplayProductActions($params){
        if(Configuration::get('ETS_WL_ENABLE_PRODUCT_PAGE') && (isset($params['id_product']) && ($id_product = (int)$params['id_product'])) ||  (isset($params['product']) && ($product = $params['product']) && isset($product['id_product']) && ($id_product = (int)$product['id_product'])) )
        {
            $id_product_attribute = isset($params['id_product_attribute']) && (int)$params['id_product_attribute']  ? (int)$params['id_product_attribute'] :(isset($product['id_product_attribute']) ? $product['id_product_attribute']:0);
            $this->smarty->assign(
                array(
                    'customer_logged' => $this->context->customer->isLogged(),
                    'id_product' => $id_product,
                    'id_product_attribute' => $id_product_attribute,
                    'added_to_wishlist' => Ets_wl_wishList::checkAddedToWishlist($id_product,$id_product_attribute), 
                    'url_wishlist' => $this->context->link->getModuleLink($this->name,'action'),
                    'ETS_WL_BUTTON_POSITION' => Configuration::get('ETS_WL_BUTTON_POSITION') ? :'left',
                    'ETS_WL_BACKGROUND_BORDER' => Configuration::get('ETS_WL_BACKGROUND_BORDER') ? :'square',
                )
            );
            return $this->display(__FILE__,'list_button_list.tpl');
        }
    }
    public function hookDisplayBeforeBodyClosingTag($params)
    {
        if($this->context->customer->isLogged())
        {
            $this->smarty->assign(
                array(
                    'list_wishlists' => $this->getAllWishList(),
                    'link_new_wishlist' => $this->context->link->getModuleLink($this->name,'action',array('action'=>'createNewWishlist')),
                    'link_add_product_to_wishlist' => $this->context->link->getModuleLink($this->name,'action',array('action'=>'addProductToWishList'))
                )
            );
            return $this->display(__FILE__,'wishlist_popup.tpl');
        }
        else
        {
            $this->smarty->assign(
                array(
                    'link_login' => $this->context->link->getPageLink('authentication'),
                )  
            );
            return $this->display(__FILE__,'login_popup.tpl');
        }
    }
    public function getAllWishList()
    {
        $infos = Ets_wl_wishList::getAllWishListsByIdCustomer($this->context->customer->id);
        if (empty($infos)) {
            $wishlist = new Ets_wl_wishList();
            $wishlist->id_shop = $this->context->shop->id;
            $wishlist->id_shop_group = $this->context->shop->id_shop_group;
            $wishlist->id_customer = $this->context->customer->id;
            $wishlist->name = Configuration::get('ETS_WL_DEFAULT_TITLE',$this->context->language->id) ? : $this->l('My wishlist');
            $wishlist->token = $this->generateWishListToken();
            $wishlist->default = 1;
            $wishlist->add();
            $infos = Ets_wl_wishList::getAllWishListsByIdCustomer($this->context->customer->id);
        }
        foreach ($infos as $key => $wishlist) {
            $infos[$key]['shareUrl'] = $this->context->link->getModuleLink($this->name, 'view', ['token' => $wishlist['token']]);
            $infos[$key]['listUrl'] = $this->context->link->getModuleLink($this->name, 'view', ['id_wishlist' => $wishlist['id_ets_wishlist']]);
            $infos[$key]['deleteUrl'] = $this->context->link->getModuleLink($this->name,'action',['action' => 'deleteWishlist','id_wishlist'=>$wishlist['id_ets_wishlist']]);
        }
        return $infos;
    }
    public function generateWishListToken()
    {
        return Tools::strtoupper(substr(sha1(uniqid((string) rand(), true) . _COOKIE_KEY_ . $this->context->customer->id), 0, 16));
    }
    public function hasReadAccessToWishlist($wishlist)
    {
        if (!empty($wishlist->token) && Tools::getIsset('token')) {
            return true;
        }
        return $this->hasWriteAccessToWishlist($wishlist);
    }

    /**
     * @return bool
     */
    public function hasWriteAccessToWishlist($wishlist)
    {
        if (false === Validate::isLoadedObject($this->context->customer)) {
            return false;
        }
        return ((int) $wishlist->id_customer) == $this->context->customer->id;
    }
    public static function productsForTemplate($products, Context $context = null)
    {
        if (!$products || !is_array($products))
            return array();
        if (!$context)
            $context = Context::getContext();
        $assembler = new ProductAssembler($context);
        $presenterFactory = new ProductPresenterFactory($context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new PrestaShop\PrestaShop\Core\Product\ProductListingPresenter(
            new PrestaShop\PrestaShop\Adapter\Image\ImageRetriever(
                $context->link
            ),
            $context->link,
            new PrestaShop\PrestaShop\Adapter\Product\PriceFormatter(),
            new PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever(),
            $context->getTranslator()
        );

        $products_for_template = array();

        foreach ($products as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $context->language
            );
        }
        return $products_for_template;
    }
    public function displayText($content,$tag,$class=null,$id=null,$href=null,$blank=false,$src = null,$name = null,$value = null,$type = null,$data_id_product = null,$rel = null,$attr_datas=null)
    {
        $this->smarty->assign(
            array(
                'content' =>$content,
                'tag' => $tag,
                'tag_class'=> $class,
                'tag_id' => $id,
                'href' => $href,
                'blank' => $blank,
                'src' => $src,
                'attr_name' => $name,
                'value' => $value,
                'type' => $type,
                'data_id_product' => $data_id_product,
                'attr_datas' => $attr_datas,
                'rel' => $rel,
            )
        );
        return $this->display(__FILE__,'html.tpl');
    }
    public function displayPaggination($limit,$name)
    {
        $controller = Tools::getValue('controller');
        if($controller!='view' && $controller!='action')
        {
            $this->context->smarty->assign(
                array(
                    'limit' => $limit,
                    'pageName' => $name,
                )
            );
            return $this->display(__FILE__,'limit.tpl');
        }
    }
    public function displayListProductsByWishlist($wishlist)
    {
        $page = (int)Tools::getValue('page');
        if($page<=0)
            $page = 1;
        $totalRecords = (int)$wishlist->getProductsOrCount('total');
        $paggination = new Ets_wl_paggination_class();            
        $paggination->total = $totalRecords;
        $paggination->url = $this->context->link->getModuleLink($this->name,'view',array_merge($this->getViewAccessParams(),array('page'=>'_page_')));
        $paggination->limit = (int)Configuration::get('PS_PRODUCTS_PER_PAGE') ? : 12;
        $paggination->name ='products';
        $totalPages = ceil($totalRecords / $paggination->limit);
        if($page > $totalPages)
            $page = $totalPages;
        $paggination->page = $page;
        $start = $paggination->limit * ($page - 1);
        if($start < 0)
            $start = 0;
        $sort = 'cp.position asc';
        if($sortorder = Tools::getValue('order') )
        {
            switch (Tools::strtolower($sortorder)) {
                case 'product.name.asc':
                    $sort ='pl.name asc';
                    break;
                case 'product.name.desc':
                    $sort ='pl.name desc';
                    break;
                case 'product.price.asc':
                    $sort ='p.price asc';
                    break;
                case 'wishlist_product.id_wishlist_product.desc':
                    $sort ='id_ets_wishlist_product desc';
                    break;
            }
        }
        $products = $wishlist->getProductsOrCount('products',$sort,$start,$paggination->limit);
        $products = Ets_wishlist_pres17::productsForTemplate($products);
        $this->smarty->assign(
            array(
                'id_wishlist' => $wishlist->id,
                'link' => $this->context->link,
                'wishlistName' => $wishlist->name,
                'totalRecords' => $totalRecords,
                'isGuest' => !$this->hasWriteAccessToWishlist($wishlist),
                'urlView' => Context::getContext()->link->getModuleLink($this->name, 'view', $this->getViewAccessParams()),
                'wishlistsLink' => Context::getContext()->link->getModuleLink($this->name, 'lists'),
                'deleteProductUrl' => Context::getContext()->link->getModuleLink($this->name, 'action', ['action' => 'deleteProductFromWishlist']),
                'addProductToCartUrl' => Context::getContext()->link->getModuleLink($this->name,'action',['action'=>'addProductToCart']),
                'products' => $products,
                'sortOrder' => Tools::strtolower($sortorder),
                'paggination' => $paggination->render(),
            )
        );
        return $this->display(__FILE__,'products-list.tpl');
    }
    private function getViewAccessParams()
    {
        if (Tools::getIsset('token')) {
            return ['token' => Tools::getValue('token')];
        }
        if (($id_wishlist = (int)Tools::getValue('id_wishlist'))) {
            return ['id_wishlist' => $id_wishlist];
        }

        return [];
    }
    public function installLinkDefault()
    {
        $metas= array(
            array(
                'controller' => 'lists',
                'title' => $this->l('List wishlist'),
                'url_rewrite' => 'whislist-list'
            ),
            array(
                'controller' => 'view',
                'title' => $this->l('View wishlist'),
                'url_rewrite' => 'whislist-view'
            ),
        );
        $languages = Language::getLanguages(false);
        foreach($metas as $meta)
        {
            if(!Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'meta_lang` WHERE url_rewrite ="'.pSQL($meta['url_rewrite']).'"') && !Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'meta` WHERE page ="module-'.pSQL($this->name).'-'.pSQL($meta['controller']).'"'))
            {
                $meta_class = new Meta();
                $meta_class->page = 'module-'.$this->name.'-'.$meta['controller'];
                $meta_class->configurable=1;
                foreach($languages as $language)
                {
                    $meta_class->title[$language['id_lang']] = $meta['title'];
                    $meta_class->url_rewrite[$language['id_lang']] = $meta['url_rewrite'];
                }
                $meta_class->add();
            }
        }
        return true;
    }
    public function displayBlockWishlist($id_wishlist,$position)
    {
        $wishlist = new Ets_wl_wishList($id_wishlist);
        $nbProduct = Configuration::get('ETS_WLP_NUMBER_PRODUCT_IN_'.Tools::strtoupper($position)) ? : false;
        $products = $wishlist->getProductsOrCount('products','cp.position asc',0,$nbProduct);
        $products = Ets_wishlist_pres17::productsForTemplate($products);
        if(Tools::isSubmit('ajax'))
        {
            $page = array(
                'page_name' => Tools::getValue('page_name'),
            );
            $this->smarty->assign('page',$page);
        }
        $this->smarty->assign(
            array(
                'products' => $products,
                'ajax' => Tools::isSubmit('ajax'),
                'blockName' => $position,
                'ets_wlp_display_type' => Configuration::get('ETS_WLP_DISPLAY_TYPE_IN_'.Tools::strtoupper($position)) ? : 'gird', 
                'allWishlistProductsLink' => $this->context->link->getModuleLink($this->name,'view',array('id_wishlist'=>$id_wishlist)),
                'slide_auto_play' => Configuration::get('ETS_WLP_AUTO_PLAY_'.Tools::strtoupper($position)),
            )
        );
        return $this->display(__FILE__,'block_products_list.tpl');
    }
    public function _runHook($position)
    {
        if($this->context->customer->logged && Configuration::get('ETS_WLP_ENABLED_IN_'.Tools::strtoupper($position)))
        {
            $wishlists = Ets_wl_wishList::getAllWishListsByIdCustomer($this->context->customer->id,true);
            if($wishlists)
            {
                $id_wishlist = $wishlists[0]['id_ets_wishlist'];
                $controller = Tools::getValue('controller');
                $this->smarty->assign(
                    array(
                        'wishlists' => $wishlists,
                        'blockName' => $position,
                        'link' => $this->context->link,
                        'controller' => Validate::isControllerName($controller) ? $controller:'',
                        'block_title' => Configuration::get('ETS_WLP_TILE_'.Tools::strtoupper($position).'_BLOCK',$this->context->language->id),
                        'list_product' => $this->displayBlockWishlist($id_wishlist,$position),
                    )
                );
                return $this->display(__FILE__,'block.tpl');
            }
        }
    }
    public function hookDisplayleftcolumn()
    {
        return $this->_runHook('left');
    }
    public function hookDisplayrightcolumn()
    {
        return $this->_runHook('right');
    }
    public function hookDisplayShoppingCartFooter()
    {
        return $this->_runHook('shipping');
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
