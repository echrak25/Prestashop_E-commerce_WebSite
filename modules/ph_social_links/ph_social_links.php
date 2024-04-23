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

if (!defined('_PS_VERSION_'))
    exit;
require_once(dirname(__FILE__) . '/classes/ph_social_link_defines.php');
class Ph_social_links extends Module
{
    public $is17 =false;
    public $_html = '';
    public $_errors =array();
    public $hooks = array(
        'displayBackOfficeHeader',
        'displayHeader',
    );
    public function __construct()
    {
        $this->name = 'ph_social_links';
        $this->tab = 'front_office_features';
        $this->version = '1.0.5';
        $this->author = 'PrestaHero';
        $this->need_instance = 0;
        $this->secure_key = Tools::encrypt($this->name);
        $this->bootstrap = true;
        parent::__construct();
		$this->module_key = '7a77b0a666933ff72256b7e373193511';
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->module_dir = $this->_path;
        $this->displayName = $this->l('Social network links');
        $this->description = $this->l('Display social network links such as Facebook, Twitter, Youtube, etc. on your website. Make it easier for customers to follow your social accounts');
$this->refs = 'https://prestahero.com/';
        if(version_compare(_PS_VERSION_, '1.7', '>='))
            $this->is17 = true;
    }
    public function install()
    {
        return parent::install() && $this->_installHooks()&& $this->_installDefaultConfig();
    }
    public function unInstall()
    {
        return parent::unInstall() && $this->_unInstallHooks()&& $this->_unInstallDefaultConfig();
    }
    public function _installHooks()
    {
        foreach($this->hooks as $hook)
            $this->registerHook($hook);
        if($hooks = $this->getPositions())
        {
            foreach(array_keys($hooks) as $hook)
                $this->registerHook($hook);
        }
        return true;
    }
    public function _unInstallHooks()
    {
        foreach($this->hooks as $hook)
            $this->unRegisterHook($hook);
        if($hooks = $this->getPositions())
        {
            foreach(array_keys($hooks) as $hook)
                $this->unRegisterHook($hook);
        }
        return true;
    }
    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/front.css', 'all');
    }
    public function hookDisplayBackOfficeHeader()
    {
        $controller = Tools::getValue('controller');
        $configure = Tools::getValue('configure'); 
        if(($controller=='AdminModules' && $configure== $this->name))
        {
            $this->context->controller->addCSS($this->_path.'views/css/admin.css');
            if (version_compare(_PS_VERSION_, '1.7.6.0', '>=') && version_compare(_PS_VERSION_, '1.7.7.1', '<') )
                $this->context->controller->addJS(_PS_JS_DIR_ . 'jquery/jquery-'.(version_compare(_PS_VERSION_, '1.7.7.0', '>=') ?'3.4.1':_PS_JQUERY_VERSION_ ).'.min.js');
            else
                $this->context->controller->addJquery();
            $this->context->controller->addJS($this->_path.'views/js/admin.js');
        }
    }
    public function _installDefaultConfig()
    {
        $inputs = $this->getConfigInputs();
        $languages = Language::getLanguages(false);
        if($inputs)
        {
            foreach($inputs as $input)
            {
                if($input['type']!='custom_html' && isset($input['default']) && $input['default'])
                {
                    if(isset($input['lang']) && $input['lang'])
                    {
                        $values = array();
                        foreach($languages as $language)
                        {
                            $values[$language['id_lang']] = isset($input['default_lang']) && $input['default_lang'] ? $this->getTextLang($input['default_lang'],$language) : $input['default'];
                        }
                        Configuration::updateGlobalValue($input['name'],$values);
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
                Configuration::deleteByName($input['name']);
            }
        }
        Configuration::deleteByName('PH_SL_LINK_VALUES');
        return true; 
    }
    public function getConfigInputs()
    {
        return array(
            array(
                'type' => 'custom_html',
                'name' => 'PH_SL_LINK_ENABLED',
                'html_content' =>$this->displayFormSocical(),
            ),
            array(
                'name' => 'PH_SL_DISPLAY_POSITIONS',
                'type' => 'checkbox',
                'label' => $this->l('Position to display'),
                'values' => array(
                    'query' => $this->getPositions(),
                    'id' => 'id',
                    'name' => 'title'
                ),
                'validate'=>'isCleanHtml',
                'required' => true,
            ),
            array(
                'name'=> 'PH_SL_LINK_TITLE',
                'label' => $this->l('Link title'),
                'type' => 'text',
                'lang' => true,
                'default' => $this->l('Follow us'),
                'default_lang' => 'Follow us',
                'form_group_class' => 'row_link_title',
            ),
            array(
                'name' => 'PH_SL_BUTTON_BORDER',
                'label' => $this->l('Border'),
                'type'=> 'select',
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'default',
                            'name' => $this->l('Square'),
                        ),
                        array(
                            'id' => 'rounded',
                            'name' => $this->l('Rounded'),
                        ),
                        array(
                            'id' => 'cricle',
                            'name' => $this->l('Circle'),
                        ),
                    ),
                    'id' => 'id',
                    'name' => 'name'
                ),
                'validate'=>'isCleanHtml',
                'form_group_class' => 'row_flat_type',
                'default' => 'default',
            ),
            array(
                'name' => 'PH_SL_BUTTON_SIZE',
                'label' => $this->l('Button size'),
                'type'=> 'select',
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'small',
                            'name' => $this->l('Small (25 px)'),
                        ),
                        array(
                            'id' => 'medium',
                            'name' => $this->l('Medium (30 px)'),
                        ),
                        array(
                            'id' => 'large',
                            'name' => $this->l('Large (35 px)'),
                        ),
                    ),
                    'id' => 'id',
                    'name' => 'name'
                ),
                'validate'=>'isCleanHtml',
                'default' => 'medium',
                'form_group_class' => 'row_flat_type',
            ),
            array(
                'name' => 'PH_SL_HIDE_ON_MOBILE',
                'label' => $this->l('Hide on mobile'),
                'type' => 'switch',
                'values' => array(
                    array(
                        'label' => $this->l('On'),
                        'id' => 'PH_SL_HIDE_ON_MOBILE_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('Off'),
                        'id' => 'PH_SL_HIDE_ON_MOBILE_off',
                        'value' => 0,
                    )
                ),
                'validate' => 'isUnsignedInt',
                'default' => 0,
            ),
            array(
                'name' => 'PH_SL_SOCIAL_ENABLED',
                'label' => $this->l('Enable'),
                'type' => 'switch',
                'values' => array(
                    array(
                        'label' => $this->l('On'),
                        'id' => 'PH_SL_SOCIAL_ENABLED_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('Off'),
                        'id' => 'PH_SL_SOCIAL_ENABLED_off',
                        'value' => 0,
                    )
                ),
                'validate' => 'isUnsignedInt',
                'default' => 1,
            ),
        );
    }
    public function getConfigFieldsValues()
    {
        $languages = Language::getLanguages(false);
        $fields = array();
        $inputs = $this->getConfigInputs();
        if($inputs)
        {
            foreach($inputs as $input)
            {
                if($input['type']=='custom_html')
                    continue;
                if(!isset($input['lang']))
                {
                    if($input['type']!='checkbox')
                        $fields[$input['name']] = Tools::getValue($input['name'],Configuration::get($input['name']));
                    else
                        $fields[$input['name']] = Tools::isSubmit('btnSubmit') ?  Tools::getValue($input['name']) : (Configuration::get($input['name']) ? explode(',',Configuration::get($input['name'])):array());
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
    public function _postValidation()
    {
        $languages = Language::getLanguages(false);
        $inputs = $this->getConfigInputs();
        $id_lang_default = Configuration::get('PS_LANG_DEFAULT');
        foreach($inputs as $input)
        {
            if($input['type']=='custom_html')
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
                    elseif($val_default && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate) && !Validate::{$validate}($val_default))
                        $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                    elseif($val_default && !Validate::isCleanHtml($val_default))
                        $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                    else
                    {
                        foreach($languages as $language)
                        {
                            if(($value = Tools::getValue($input['name'].'_'.$language['id_lang'])) && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate)  && !Validate::{$validate}($value))
                                $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                            elseif($value && !Validate::isCleanHtml($value))
                                $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                        }
                    }
                }
                else
                {
                    foreach($languages as $language)
                    {
                        if(($value = Tools::getValue($input['name'].'_'.$language['id_lang'])) && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate)  && !Validate::{$validate}($value))
                            $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                        elseif($value && !Validate::isCleanHtml($value))
                            $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                    }
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
                    if($val!=='' && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate) && !Validate::{$validate}($val))
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
        $PH_SL_LINK_ENABLED = Tools::getValue('PH_SL_LINK_ENABLED');
        $PH_SL_LINK_VALUES =  Tools::getValue('PH_SL_LINK_VALUES');
        if($PH_SL_LINK_ENABLED)
        {
            if(self::validateArray($PH_SL_LINK_ENABLED))
            {
                foreach($PH_SL_LINK_ENABLED as $social=>$enabled)
                {
                    if($enabled && (!isset($PH_SL_LINK_VALUES[$social]) || !$PH_SL_LINK_VALUES[$social]))
                    {
                        $this->_errors[] =  $this->l('Social link is required');
                        break;
                    }
                }
            }
            else
                $this->_errors[] = $this->l('Social network is not valid');
        }
        if($PH_SL_LINK_VALUES)
        {
            foreach($PH_SL_LINK_VALUES as $link)
            {
                if($link && !self::isLink($link))
                {
                    $this->_errors[] = $this->l('Social networks link is not valid');
                    break;
                }
            }
        }
    }
    public function renderForm()
    {
        $current_tab = Tools::getValue('current_tab','social');
        if(!in_array($current_tab, array('social','style')))
            $current_tab = 'social';
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => ''
                ),
                'input' => $this->getConfigInputs(),
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
        $helper->submit_action = 'btnSubmit';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&current_tab='.$current_tab;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $language->id;
        $helper->override_folder ='/';
        $helper->tpl_vars = array(
            'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
            'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL'),
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
            'link' => $this->context->link,
        );
        $this->fields_form = array();
        return $helper->generateForm(array($fields_form));
    }
    public function getContent()
    {
        if (Tools::isSubmit('btnSubmit')) {
            $this->_postValidation();
            if (!count($this->_errors)) {
                $inputs = $this->getConfigInputs();
                $languages = Language::getLanguages(false);
                $id_lang_default = Configuration::get('PS_LANG_DEFAULT');
                if($inputs)
                {
                    foreach($inputs as $input)
                    {
                        if($input['type']!='custom_html')
                        {
                            if(isset($input['lang']) && $input['lang'])
                            {
                                $values = array();
                                foreach($languages as $language)
                                {
                                    $value_default = Tools::getValue($input['name'].'_'.$id_lang_default);
                                    $value = Tools::getValue($input['name'].'_'.$language['id_lang']);
                                    $values[$language['id_lang']] = ($value && Validate::isCleanHtml($value)) || !isset($input['required']) ? $value : (Validate::isCleanHtml($value_default) ? $value_default :'');
                                }
                                Configuration::updateValue($input['name'],$values);
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
                $PH_SL_LINK_ENABLED = Tools::getValue('PH_SL_LINK_ENABLED',array());
                if(is_array($PH_SL_LINK_ENABLED) && self::validateArray($PH_SL_LINK_ENABLED))
                    Configuration::updateValue('PH_SL_LINK_ENABLED',json_encode($PH_SL_LINK_ENABLED));
                $PH_SL_LINK_VALUES = Tools::getValue('PH_SL_LINK_VALUES',array());
                if(is_array($PH_SL_LINK_VALUES) && self::validateArray($PH_SL_LINK_VALUES))
                    Configuration::updateValue('PH_SL_LINK_VALUES',json_encode($PH_SL_LINK_VALUES));
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            } else {
                $this->_html .= $this->displayError($this->_errors);
            }
        }
        $this->_html .= $this->renderForm();
        $this->_html .= $this->displayIframe();
        return $this->_html;
    }
    public function displayFormSocical()
    {
        $socials_link_enabled = Tools::getValue('PH_SL_LINK_ENABLED',Configuration::get('PH_SL_LINK_ENABLED') ? json_decode(Configuration::get('PH_SL_LINK_ENABLED'),true):array()) ;
        $socials_link_value = Tools::getValue('PH_SL_LINK_VALUES',Configuration::get('PH_SL_LINK_VALUES') ? json_decode(Configuration::get('PH_SL_LINK_VALUES'),true):array());
        $this->smarty->assign(
            array(
                'socials' => $this->getListSocials(),
                'socials_link_enabled' =>  $socials_link_enabled,
                'socials_link_value' => $socials_link_value,         
            )
        );
        return $this->display(__FILE__,'socials.tpl');
    }
    public function getListSocials()
    {
        return Ph_social_link_defines::getInstance()->getListSocials();
    }
    public function getPositions()
    {
        return array(
            'displayBanner' => array(
                'id'=> 'displayBanner',
                'title' => $this->l('On top of web page'),
            ),
            'displayNav1' => array(
                'id'=> 'displayNav1',
                'title' => $this->l('On the top navigation bar'),
            ),
            'displayAfterBodyOpeningTag' => array(
                'id' => 'displayAfterBodyOpeningTag',
                'title' => $this->l('On the left of web page')
            ),
            'displayBeforeBodyClosingTag' => array(
                'id' => 'displayBeforeBodyClosingTag',
                'title' => $this->l('On the right of web page')
            ),
            'displayFooterAfter' => array(
                'id' => 'displayFooterAfter',
                'title' => $this->l('On the bottom of Footer section'),
            ),
        );
    }
    public static function validateArray($array,$validate='isCleanHtml')
    {
        if(!is_array($array))
            return true;
        if(method_exists('Validate',$validate))
        {
            if($array && is_array($array))
            {
                $ok= true;
                foreach($array as $val)
                {
                    if(!is_array($val))
                    {
                        if($val && !Validate::$validate($val))
                        {
                            $ok= false;
                            break;
                        }
                    }
                    else
                        $ok = self::validateArray($val,$validate);
                }
                return $ok;
            }
        }
        return true;
    }
    public function hookDisplayNav1()
    {
        return $this->displaySocicalBlock('displayNav1');     
    }
    public function hookDisplayBanner()
    {
        //return $this->displaySocicalBlock('displayBanner');  
    }
    public function hookDisplayAfterBodyOpeningTag()
    {
        return $this->displaySocicalBlock('displayAfterBodyOpeningTag').$this->displaySocicalBlock('displayBanner');    
    }
    public function hookDisplayBeforeBodyClosingTag()
    {
        return $this->displaySocicalBlock('displayBeforeBodyClosingTag');    
    }
    public function hookDisplayFooterAfter()
    {
        return $this->displaySocicalBlock('displayFooterAfter');    
    }
    public function displaySocicalBlock($position)
    {
        if(!Configuration::get('PH_SL_SOCIAL_ENABLED'))
            return '';
        $PH_SL_DISPLAY_POSITIONS = Configuration::get('PH_SL_DISPLAY_POSITIONS') ? explode(',',Configuration::get('PH_SL_DISPLAY_POSITIONS')):array();
        if(in_array($position,$PH_SL_DISPLAY_POSITIONS)|| in_array('all',$PH_SL_DISPLAY_POSITIONS))
        {
            $socials_link_enabled = Configuration::get('PH_SL_LINK_ENABLED') ? json_decode(Configuration::get('PH_SL_LINK_ENABLED'),true):array() ;
            $socials_link_value = Configuration::get('PH_SL_LINK_VALUES') ? json_decode(Configuration::get('PH_SL_LINK_VALUES'),true):array();
            if($socials_link_enabled)
            {
                $this->smarty->assign(
                    array(
                        'socials' => $this->getListSocials(),
                        'socials_link_enabled' => $socials_link_enabled,
                        'socials_link_value' => $socials_link_value,
                        'ph_position' => $position,
                        'PH_SL_BUTTON_BORDER' => Configuration::get('PH_SL_BUTTON_BORDER') ? : 'default',
                        'PH_SL_BUTTON_SIZE' => Configuration::get('PH_SL_BUTTON_SIZE') ? :'medium',
                        'PH_SL_HIDE_ON_MOBILE' => (int)Configuration::get('PH_SL_HIDE_ON_MOBILE'),
                        'PH_SL_LINK_TITLE' => Configuration::get('PH_SL_LINK_TITLE',$this->context->language->id),
                    )
                );
                return $this->display(__FILE__,'social_block.tpl');
            }
        }
    }
    public function displayPreviewSocial()
    {
         $socials_link_enabled = Tools::getValue('PH_SL_LINK_ENABLED',Configuration::get('PH_SL_LINK_ENABLED') ? json_decode(Configuration::get('PH_SL_LINK_ENABLED'),true):array()) ;
         $socials_link_value = Tools::getValue('PH_SL_LINK_VALUES',Configuration::get('PH_SL_LINK_VALUES') ? json_decode(Configuration::get('PH_SL_LINK_VALUES'),true):array());
         $PH_SL_BUTTON_BORDER = Tools::getValue('PH_SL_BUTTON_BORDER',Configuration::get('PH_SL_BUTTON_BORDER'));
         $PH_SL_BUTTON_SIZE = Tools::getValue('PH_SL_BUTTON_SIZE',Configuration::get('PH_SL_BUTTON_SIZE'));
         $PH_SL_HIDE_ON_MOBILE = (int)Tools::getValue('PH_SL_HIDE_ON_MOBILE',Configuration::get('PH_SL_HIDE_ON_MOBILE'));
         $this->smarty->assign(
            array(
                'socials' => $this->getListSocials(),
                'socials_link_enabled' =>  $socials_link_enabled,
                'socials_link_value' => $socials_link_value, 
                'PH_SL_BUTTON_BORDER' => Validate::isCleanHtml($PH_SL_BUTTON_BORDER) ? $PH_SL_BUTTON_BORDER : 'default',
                'PH_SL_BUTTON_SIZE' => Validate::isCleanHtml($PH_SL_BUTTON_SIZE) ? $PH_SL_BUTTON_SIZE :'medium',
                'PH_SL_HIDE_ON_MOBILE' => $PH_SL_HIDE_ON_MOBILE,
                'PH_SL_LINK_TITLE' => Configuration::get('PH_SL_LINK_TITLE',$this->context->language->id),
                'link'=> $this->context->link,        
            )
         );
         return $this->display(__FILE__,'social_preview.tpl');
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
    public static function isLink($link)
    {
        $link_validation = '/(http|https)\:\/\/[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/';
        if($link =='#' || preg_match($link_validation, $link)){
            return  true;
        }
        return false;
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