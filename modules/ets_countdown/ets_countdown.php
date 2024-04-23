<?php
/**
 * 2007-2023 ETS-Soft
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
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2023 ETS-Soft
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

if (!defined('_PS_VERSION_'))
    exit;
require_once(dirname(__FILE__) . '/classes/ets_countdown_defines.php');
class Ets_countdown extends Module
{
    public $hooks = array(
        'displayBackOfficeHeader',
        'displayHeader',
        'displayProductPriceBlock',
    );
    public $_html;
    public $_errors = array();
    public $fields_form;

    public function __construct()
    {
        $this->name = 'ets_countdown';
        $this->tab = 'front_office_features';
        $this->version = '1.0.4';
        $this->author = 'ETS-Soft';
        $this->need_instance = 0;
        $this->module_key = Tools::encrypt($this->name);
        $this->bootstrap = true;
        parent::__construct();
		$this->module_key = '7a77b0a666933ff72256b7e373193511';
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->displayName = $this->l('Countdown Discount Timer');
        $this->description = $this->l('Show a countdown box with the product on sale to tell your customer how much time they have left to purchase the discount product. ');
$this->refs = 'https://prestahero.com/';
    }
    public function install()
    {
        return parent::install() && $this->installHooks()&& $this->_installDefaultConfig()&& $this->createCustomCss();
    }
    public function unInstall()
    {
        return parent::unInstall() && $this->unInstallHooks() && $this->_unInstallDefaultConfig();
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
    public function getConfigInputs()
    {
        return Ets_countdown_defines::getInstance()->getConfigInputs();
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
                                $values[$language['id_lang']] = isset($input['default_lang']) && $input['default_lang'] ? $this->getTextLang($input['default_lang'],$language,'ets_countdown_defines') : $input['default'];
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
    public function getContent()
    {
        $this->_html = '';
        $inputs = $this->getConfigInputs();
        if (Tools::isSubmit('btnSubmit')) {
            $this->saveSubmit($inputs);
        }
        $this->_html .= $this->renderForm($inputs,'btnSubmit',$this->l('Settings'));
        $this->_html .= $this->displayIframe();
        return $this->_html;
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
        );
        $this->fields_form = array();
        return $helper->generateForm(array($fields_form));
    }
    public function getFieldsValues($inputs)
    {
        $languages = Language::getLanguages(false);
        $fields = array();
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
            $this->createCustomCss();
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
        }
    }
    public function addJquery()
    {
        if (version_compare(_PS_VERSION_, '1.7.6.0', '>=') && version_compare(_PS_VERSION_, '1.7.7.0', '<'))
            $this->context->controller->addJS(_PS_JS_DIR_ . 'jquery/jquery-'._PS_JQUERY_VERSION_.'.min.js');
        else
            $this->context->controller->addJquery();
    }
    public function hookDisplayHeader()
    {
        if(Configuration::get('ETS_CD_ENABLE_COUNT_DOWN'))
        {
            $this->context->controller->addJS($this->_path.'views/js/clock.js');
            $this->context->controller->addCss($this->_path.'views/css/front.css');
            $this->context->controller->addCss($this->_path.'views/css/custom.css');
        }
    }
    public function hookDisplayProductPriceBlock($params)
    {
        if(Configuration::get('ETS_CD_ENABLE_COUNT_DOWN'))
        {
            $controller = Tools::getValue('controller');
            $action = Tools::getValue('action');	
            if($controller=='product' && $action!="add-to-cart" && $action!='quickview' && ($id_product = (int)Tools::getValue('id_product')) && isset($params['type']) && $params['type']=='weight' && isset($params['hook_origin']) && $params['hook_origin']=='product_sheet' && isset($params['product']) && ($product = $params['product']) && ((is_array($product)&& $product['id_product'] == $id_product) || (is_object($product) && $product->id == $id_product)))
            {
                if( isset($product['price_without_reduction']) && $product['price_without_reduction'] >0 && isset($product['specific_prices']) && ($specific_prices = $product['specific_prices']) && $specific_prices['to']!='0000-00-00 00:00:00')
                {
                    $this->smarty->assign(
                        array(
                            'to_specific_prices' => $specific_prices['to'],
                            'ETS_CD_TIME_UNIT_COLOR' => Configuration::get('ETS_CD_TIME_UNIT_COLOR'),
                            'ETS_CD_BACKGROUND_COLOR' => Configuration::get('ETS_CD_BACKGROUND_COLOR'),
                            'ETS_CD_DISPLAY_TYPE' => Configuration::get('ETS_CD_DISPLAY_TYPE'),
                            'ETS_CD_TITLE_COUNT_DOWN' => Configuration::get('ETS_CD_TITLE_COUNT_DOWN',$this->context->language->id),
                        )   
                    );
                    return $this->display(__FILE__,'countdown.tpl');
                }
            }
        }
    }
    public function createCustomCss()
    {
        $css = Tools::file_get_contents(dirname(__FILE__).'/views/css/color.css');
        $replaces = array(
            'ETS_CD_TIME_UNIT_COLOR' => Configuration::get('ETS_CD_TIME_UNIT_COLOR'),
            'ETS_CD_BACKGROUND_COLOR' => Configuration::get('ETS_CD_BACKGROUND_COLOR'),
            'ETS_CD_NUMBER_COLOR' => Configuration::get('ETS_CD_NUMBER_COLOR'),
            'ETS_CD_BORDER_COLOR' => Configuration::get('ETS_CD_BORDER_COLOR'),
        );
        $css = str_replace(array_keys($replaces),$replaces,$css);
        file_put_contents(dirname(__FILE__).'/views/css/custom.css',$css);
        return true;
    }
    public static function isColor($color)
    {
        return preg_match('/^(#[0-9a-fA-F]{6})$/', $color);
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
		if($array)
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
		}
		return true;
	}
}