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
class Ets_cookie_banner extends Module
{
    public $is17 =false;
    public $_html = '';
    public $_errors =array();
    public $hooks = array(
        'displayBackOfficeHeader',
        'displayHeader',
        'displayBeforeBodyClosingTag'
    );
    public $module_dir;
    public function __construct()
    {
        $this->name = 'ets_cookie_banner';
        $this->tab = 'front_office_features';
        $this->version = '1.0.5';
        $this->author = 'PrestaHero';
        $this->need_instance = 0;
        $this->bootstrap = true;
        parent::__construct();
		$this->module_key = '7a77b0a666933ff72256b7e373193511';
        $this->module_dir = $this->_path;
        $this->displayName = $this->l('Cookie Banner');
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
        $this->description = $this->l('Display a banner asking for client’s consent for the cookies used on the store. Fully customizable - colors, positions, buttons, texts, etc.');
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
    public function _unInstallHooks()
    {
        foreach($this->hooks as $hook)
            $this->unRegisterHook($hook);
        return true;
    }
    public function _installHooks()
    {
        foreach($this->hooks as $hook)
            $this->registerHook($hook);
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
        $this->context->cookie->ets_cb_save_cookie = 0;
        $this->context->cookie->write();
        return true; 
    }
    public function getPositions()
    {
        return array(
            array(
                'id' => 'left_bottom',
                'value' => 'left_bottom',
                'class'=> 'ets_cb_position left_bottom',
                'label' => $this->l('Left bottom box')
            ),
            array(
                'id' => 'right_bottom',
                'value' => 'right_bottom',
                'class'=> 'ets_cb_position right_bottom',
                'label' => $this->l('Right bottom box')
            ),
            array(
                'id' => 'bottom',
                'value' => 'bottom',
                'class'=> 'ets_cb_position bottom',
                'label' => $this->l('Bottom bar'),
            ),
        );
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
                        Configuration::updateGlobalValue($input['name'],$values,true);
                    }
                    else
                        Configuration::updateGlobalValue($input['name'],$input['default']);
                }
            }
        }
        $this->context->cookie->ets_cb_save_cookie = 0;
        $this->context->cookie->write();
        return true;
    }
    public function getConfigInputs()
    {
        return array(
            array(
                'label' =>$this->l('Cookie content'),
                'type'=> 'textarea',
                'name'=>'ETS_CB_COOKIE_BANNER_CONTENT',
                'lang'=>true,
                'autoload_rte' =>true,
                'required' => true,
                'default' => $this->l('We use third-party cookies to enhance your browsing experience, analyze site traffic and personalize content, ads.').'&nbsp;<a href="#">'.$this->l('Learn more.').'</a>'
            ),
            array(
                'type' => 'radio',
                'label' => $this->l('Cookie banner position'),
                'name' => 'ETS_CB_COOKIE_BANNER_POSITION',
                'default' => 'left_bottom',
                'values' => $this->getPositions(),
                'validate' => 'isCleanHtml',
                'class'=> 'ets_cb_position',
            ),
            array(
                'type'=>'text',
                'label' => $this->l('Cookie banner width'),
                'name'=>'ETS_CB_COOKIE_BANNER_WIDTH',
                'suffix' =>'px',
                'validate' => 'isUnsignedFloat',
                'default' => '350',
                'col'=>9,
            ),
            array(
                'type'=>'color',
                'label' => $this->l('Cookie banner background'),
                'name'=>'ETS_CB_COOKIE_BANNER_BACKGROUND',
                'validate' => 'isColor',
                'default' => '#ffffff',
            ),
            array(
                'type'=>'color',
                'label' => $this->l('Cookie banner border color'),
                'name'=>'ETS_CB_COOKIE_BANNER_BORDER',
                'validate' => 'isColor',
                'default' => '#9e9e9e',
            ),
            array(
                'type'=>'text',
                'label' => $this->l('Cookie banner border radius'),
                'name'=>'ETS_CB_COOKIE_BANNER_RADIUS',
                'suffix' =>'px',
                'validate' => 'isUnsignedFloat',
                'col'=>9,
                'default' => '6',
            ),
            array(
                'type'=>'text',
                'label' => $this->l('Agree button label'),
                'default' => $this->l('Allow cookies'),
                'name'=>'ETS_CB_COOKIE_BUTTON_LABEL',
                'validate' => 'isCleanHtml',
                'form_group_class'=> 'ets_cb_agree_button',
                'lang'=>true,
                'required' => true,
            ),
            array(
                'type'=>'color',
                'label' => $this->l('Button text color'),
                'name'=>'ETS_CB_COOKIE_BUTTON_COLOR',
                'validate' => 'isColor',
                'default' => '#ffffff',
            ),
            array(
                'type'=>'color',
                'label' => $this->l('Button border color'),
                'name'=>'ETS_CB_COOKIE_BOTTON_BORDER',
                'validate' => 'isColor',
                'default' => '#00b1c9',
            ),
            array(
                'type'=>'color',
                'label' => $this->l('Button background'),
                'name'=>'ETS_CB_COOKIE_BT_BACKGROUND',
                'validate' => 'isColor',
                'default' => '#00b1c9',
            ),
            array(
                'type'=>'color',
                'label' => $this->l('Button text hover color'),
                'name'=>'ETS_CB_COOKIE_BT_HOVER_COLOR',
                'validate' => 'isColor',
                'default' => '#ffffff',
            ),
            array(
                'type'=>'color',
                'label' => $this->l('Button border hover color'),
                'name'=>'ETS_CB_COOKIE_BT_BORDER_HOVER',
                'validate' => 'isColor',
                'default' => '#2598a9',
            ),
            array(
                'type'=>'color',
                'label' => $this->l('Button background hover color'),
                'name'=>'ETS_CB_COOKIE_BT_BG_HOVER',
                'validate' => 'isColor',
                'default' => '#2598a9',
            ),
            array(
                'type' => 'text',
                'label' => $this->l('Do not accept label'),
                'lang' => true,
                'name' => 'ETS_CB_NOT_ACCEPT_LABEL',
                'default' => $this->l('Not accept'),
                'default_lang' => 'Not accept',
                'desc' => $this->l('Leave blank to not display "Not accept" button'),
            ),
            array(
                'type' => 'text',
                'label' => $this->l('URL redirect when customer choose "Not accept"'),
                'name' => 'ETS_CB_NOT_ACCEPT_URL',
            ),
        );
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
    public function renderForm()
    {
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
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
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
        return $helper->generateForm(array($fields_form));
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
                                    $values[$language['id_lang']] = ($value && Validate::isCleanHtml($value,true)) || !isset($input['required']) ? $value : (Validate::isCleanHtml($value_default,true) ? $value_default :'');
                                }
                                Configuration::updateValue($input['name'],$values,true);
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
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            } else {
                $this->_html .= $this->displayError($this->_errors);
            }
        }
        $this->_html .= $this->renderForm();
        $this->_html .= $this->displayIframe();
        return $this->_html;
    }
    public function hookDisplayBackOfficeHeader()
    {
        $controller = Tools::getValue('controller');
        $configure = Tools::getValue('configure');
        if($controller=='AdminModules' && $configure == $this->name)
        {
            $this->context->controller->addCSS($this->_path.'views/css/admin.css');
            $this->context->controller->addJS($this->_path.'views/js/admin.js');
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
    public static function isColor($color)
    {
        return preg_match('/^(#[0-9a-fA-F]{6})$/', $color);
    }
    public function hookDisplayHeader()
    {
        if(!$this->context->cookie->ets_cb_save_cookie)
        {
            $this->context->controller->addCSS($this->_path.'views/css/front.css');
            $this->context->controller->addJS($this->_path.'views/js/front.js');
        }
        
    }
    public function hookDisplayBeforeBodyClosingTag()
    {
        if($this->context->cookie->ets_cb_save_cookie)
            return '';
        $inputs = $this->getConfigInputs();
        $assign = array();
        $banner_css = Tools::file_get_contents(dirname(__FILE__).'/views/css/banner.css');
        if($inputs)
        {
            foreach($inputs as $input)
            {
                if(isset($input['lang']) && $input['lang'])
                    $assign[$input['name']] = Configuration::get($input['name'],$this->context->language->id);
                else
                {
                    $assign[$input['name']] = Configuration::get($input['name']);
                    $banner_css = str_replace($input['name'],$assign[$input['name']],$banner_css);
                }
            }
        }
        $assign['banner_css'] = $banner_css;
        $assign['link_submit'] = $this->context->link->getModuleLink($this->name,'submit');
        $this->smarty->assign($assign);
        return $this->display(__FILE__,'cookie_banner.tpl');
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
    public static function validateArray($array,$validate='isCleanHtml')
    {
        if(!is_array($array))
            return false;
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
}