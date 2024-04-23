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

if (!defined('_PS_VERSION_')) { exit; }
require_once(dirname(__FILE__) . '/classes/ets_dc_defines.php');
require_once(dirname(__FILE__) . '/classes/ets_dc_cart_rule_combination.php');
class Etsdiscountcombinations extends Module
{
    public $_errors = array();
    public $hooks = array(
        'displayBackOfficeHeader',
        'actionObjectCartRuleUpdateAfter',
        'actionObjectCartRuleDeleteAfter',
        'actionObjectCartRuleAddAfter',
    );
    public $_html;
    public function __construct()
    {
        $this->name = 'etsdiscountcombinations';
        $this->tab = 'front_office_features';
        $this->version = '1.0.7';
        $this->author = 'PrestaHero';
        $this->need_instance = 0;
        $this->bootstrap = true;
        parent::__construct();
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->displayName = $this->l('Advanced Discount Combination');
        $this->description = $this->l('Make it easier to create discount combinations or combine cart rules with our advanced PrestaShop discount combination module');
$this->refs = 'https://prestahero.com/';
        $this->module_key = '9c4a18d3f8c2053b471b47f06eebfc79';
    }
    public function install()
    {
        return parent::install() && $this->_installHooks() && $this->_installDefaultConfig() && $this->installDb() && $this->_installOverried();
    }
    public function unInstall()
    {
        return parent::unInstall() && $this->_unInstallHooks()&& $this->_unInstallDefaultConfig() && $this->unInstallDb() && $this->_unInstallOverried();
    }
    public function installDb()
    {
        return Ets_dc_defines::installDb();
    }
    public function unInstallDb()
    {
        return Ets_dc_defines::unInstallDb();
    }
    public function _installHooks()
    {
        foreach($this->hooks as $hook)
        {
            $this->registerHook($hook);
        }
        return true;
    }
    public function _unInstallHooks()
    {
        foreach($this->hooks as $hook)
        {
            $this->unRegisterHook($hook);
        }
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
                                $values[$language['id_lang']] = isset($input['default_lang']) && $input['default_lang'] ? $this->getTextLang($input['default_lang'],$language,'ets_dc_defines') : $input['default'];
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
        return Ets_dc_defines::getInstance()->getConfigInputs();
    }
    public function _installOverried()
    {
        $this->copy_directory(dirname(__FILE__) . '/views/templates/admin/_configure/templates', _PS_OVERRIDE_DIR_ . 'controllers/admin/templates');
        return true;
    }

    public function _unInstallOverried()
    {
        $this->delete_directory(_PS_OVERRIDE_DIR_ . 'controllers/admin/templates/cart_rules');
        return true;
    }
    public function copy_directory($src, $dst)
    {
        $dir = opendir($src);
        if(!file_exists($dst))
            @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $this->copy_directory($src . '/' . $file, $dst . '/' . $file);
                } elseif(!file_exists($dst . '/' . $file)) {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
                elseif(file_exists($dst . '/' . $file))
                {
                    copy($dst . '/' . $file, $dst . '/backup_' . $file);
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
    public function delete_directory($directory)
    {
        $dir = opendir($directory);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($directory . '/' . $file)) {
                    $this->delete_directory($directory . '/' . $file);
                } else {
                    if (file_exists($directory . '/' . $file) && $file != 'index.php' && ($content = Tools::file_get_contents($directory . '/' . $file)) && Tools::strpos($content, 'overried by etsdiscountcombinations') !== false) {
                        @unlink($directory . '/' . $file);
                        if (file_exists($directory . '/backup_' . $file))
                            copy($directory . '/backup_' . $file, $directory . '/' . $file);
                    }

                }
            }
        }
        closedir($dir);
    }
    public function getContent()
    {
        if(Tools::isSubmit('submitSearchRule'))
        {
            Ets_dc_defines::getInstance()->_submitSearchRule();
        }
        $this->_html = '';
        $inputs = $this->getConfigInputs();
        if (Tools::isSubmit('btnSubmit')) {
            $this->saveSubmit($inputs);
        }
        $this->context->smarty->assign(
            array(
                'link' => $this->context->link,
            )
        );
        $this->_html .=$this->display(__FILE__,'admin_header.tpl');
        $this->_html .= $this->renderForm($inputs,'btnSubmit',$this->l('Settings'));
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
                    if($input['type']!='html' || $input['name']=='ETS_DC_UN_COMBINABLE_ID_CART_RULE')
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
                            
                            if($input['type']=='checkbox' || $input['name']=='ETS_DC_UN_COMBINABLE_ID_CART_RULE')
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
            if($input['type']=='html' && $input['name']!='ETS_DC_UN_COMBINABLE_ID_CART_RULE')
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
                    if($input['type']!='checkbox' && !(isset($input['multiple']) && $input['multiple']) )
                    {
                       
                        if($val===''&& isset($input['required']) && $input['required'])
                        {
                            $this->_errors[] = sprintf($this->l('%s is required'),$input['label']);
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
        $ETS_DC_CART_RULE_COMBINATION = Tools::getValue('ETS_DC_CART_RULE_COMBINATION');
        if($ETS_DC_CART_RULE_COMBINATION=='specific')
        {
            $specific_rule_combination = Tools::getValue('ETS_DC_SPECIFIC_RULE_COBINATION');
            if(!$specific_rule_combination)
                $this->_errors[] = $this->l('Select cart rule to combine is required');
            elseif(!Validate::isCleanHtml($specific_rule_combination))
                $this->_errors[] = $this->l('Selected cart rule to combine is not valid');
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
    public function displayListRules($id_rules)
    {
        if($id_rules)
        {
            $rules = Ets_dc_defines::getRulesByIds($id_rules);
            if($rules)
            {
                $this->smarty->assign(
                    array(
                        'rules' => $rules,
                    )
                );
                return $this->display(__FILE__,'rules.tpl');
            }
        }
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
            $this->context->controller->addCSS($this->_path . 'views/css/admin.css', 'all');
            $this->addJquery();
            $this->context->controller->addJS($this->_path . 'views/js/admin.js');
        }
        if($controller=='AdminCartRules')
        {
            $this->context->controller->addCSS($this->_path . 'views/css/admin.css', 'all');
            $this->addJquery();
            $this->context->controller->addJS($this->_path . 'views/js/cart_rule.js');
        }
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
    public function displayFormCombination($cart_rules)
    {
        if($id_cart_rule = (int)Tools::getValue('id_cart_rule'))
            $cartRule = new CartRule($id_cart_rule);
        else
            $cartRule = new CartRule();
        $ruleCombination = Ets_dc_cart_rule_combination::getCombinationCartRule($cartRule->id);
        $this->context->smarty->assign(
            array(
                'cart_rules' => $cart_rules,
                'cartRule' => $cartRule,
                'ETS_DC_CART_RULE_COMBINATION' => Configuration::get('ETS_DC_CART_RULE_COMBINATION'),
                'rule_combination' => Tools::getValue('rule_combination',$ruleCombination ? $ruleCombination['rule_combination']:''),
                'specific_rule_combination'=> Tools::getValue('specific_rule_combination',$ruleCombination ? $ruleCombination['specific_rule_combination']:''),
            )
        );
        return $this->display(__FILE__,'combinations.tpl');
    }
    public function hookActionObjectCartRuleAddAfter($params)
    {
        if(isset($params['object']) && ($cartRule = $params['object']) && Validate::isLoadedObject($cartRule) && ($rule_combination = Tools::getValue('rule_combination')) && in_array($rule_combination,array('default','combinable_all','not_combinable_all','specific','manual'))  )
        {
            $specific_rule_combination = Tools::getValue('specific_rule_combination');
            if(!Validate::isCleanHtml($specific_rule_combination) || (!$specific_rule_combination && $rule_combination=='specific'))
            {
                $specific_rule_combination ='';
                $rule_combination ='combinable_all';
            }
            Ets_dc_cart_rule_combination::updateCombinationCartRule($cartRule->id,$rule_combination,$specific_rule_combination);
        }
    }
    public function hookActionObjectCartRuleUpdateAfter($params)
    {
        
        $this->hookActionObjectCartRuleAddAfter($params);
    }
    public function hookActionObjectCartRuleDeleteAfter($params)
    {
        if(isset($params['object']) && ($cartRule = $params['object']) && Validate::isLoadedObject($cartRule) && ($rule_combination = Tools::getValue('rule_combination')) && in_array($rule_combination,array('default','combinable_all','not_combinable_all','specific','manual'))  )
        {
            Ets_dc_cart_rule_combination::deleteCombinationCartRule($cartRule->id);
        }
    }
    public function checkValidity($cartRule,$display_error)
    {
        if(($error = Hook::exec('checkValidityExtraCombination')))
        {
            return !$display_error ? false : $error;
        }
        $combination = Ets_dc_cart_rule_combination::getCombinationCartRule($cartRule->id);
        if($combination && isset($combination['rule_combination']))
            $rule_combination = $combination['rule_combination'];
        else
            $rule_combination = 'default';
        if($rule_combination)
        {
            switch($rule_combination) {
            case 'default':
            $ETS_DC_CART_RULE_COMBINATION = Configuration::get('ETS_DC_CART_RULE_COMBINATION');
            if($ETS_DC_CART_RULE_COMBINATION=='not_combinable_all')
                return Ets_dc_cart_rule_combination::getInstance()->checkNotCombinableAll($cartRule,$display_error);
            elseif($ETS_DC_CART_RULE_COMBINATION=='specific')
            {
                $specific = Configuration::get('ETS_DC_SPECIFIC_RULE_COBINATION');
                return Ets_dc_cart_rule_combination::getInstance()->checkCombinableSpecific($cartRule,$specific, $display_error);
            }
            elseif($ETS_DC_CART_RULE_COMBINATION=='manual')
                return Ets_dc_cart_rule_combination::getInstance()->checkCombinableManual($cartRule, $display_error);
            else
                return Ets_dc_cart_rule_combination::getInstance()->checkCombinableAll($cartRule, $display_error);
            case 'not_combinable_all':
                return Ets_dc_cart_rule_combination::getInstance()->checkNotCombinableAll($cartRule,$display_error);
            case 'specific':
                    return Ets_dc_cart_rule_combination::getInstance()->checkCombinableSpecific($cartRule,$combination['specific_rule_combination'], $display_error);
            default:
                return Ets_dc_cart_rule_combination::getInstance()->checkCombinableAll($cartRule, $display_error);

            } 
        }
        return !$display_error ? true :'';    
    }
    public function postProcessCartRule()
    {
        if (Tools::isSubmit('submitAddcart_rule') || Tools::isSubmit('submitAddcart_ruleAndStay')) {
            $rule_combination = Tools::getValue('rule_combination');
            if($rule_combination=='specific')
            {
                $specific_rule_combination = Tools::getValue('specific_rule_combination');
                if(!$specific_rule_combination)
                    $this->context->controller->errors[] = $this->l('Select cart rule to combine is required');
                elseif(!Validate::isCleanHtml($specific_rule_combination))
                    $this->context->controller->errors[] = $this->l('Selected cart rule to combine is not valid');
            }
        }
    }
    private function safeMkDir($path, $permission = 0755)
    {
        if (!@mkdir($concurrentDirectory = $path, $permission) && !is_dir($concurrentDirectory)) {
            throw new \PrestaShopException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }

        return true;
    }
    private function checkOverrideDir()
    {
        if (defined('_PS_OVERRIDE_DIR_')) {
            $psOverride = @realpath(_PS_OVERRIDE_DIR_) . DIRECTORY_SEPARATOR;
            if (!is_dir($psOverride)) {
                $this->safeMkDir($psOverride);
            }
            $base = str_replace('/', DIRECTORY_SEPARATOR, $this->getLocalPath() . 'override');
            $iterator = new RecursiveDirectoryIterator($base, FilesystemIterator::SKIP_DOTS);
            /** @var RecursiveIteratorIterator|\SplFileInfo[] $iterator */
            $iterator = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);
            $iterator->setMaxDepth(4);
            foreach ($iterator as $k => $item) {
                if (!$item->isDir()) {
                    continue;
                }
                $path = str_replace($base . DIRECTORY_SEPARATOR, '', $item->getPathname());
                if (!@file_exists($psOverride . $path)) {
                    $this->safeMkDir($psOverride . $path);
                    @touch($psOverride . $path . DIRECTORY_SEPARATOR . '_do_not_remove');
                }
            }
            if (!file_exists($psOverride . 'index.php')) {
                Tools::copy($this->getLocalPath() . 'index.php', $psOverride . 'index.php');
            }
        }
    }
    public function uninstallOverrides(){
        if(parent::uninstallOverrides())
        {
            require_once(dirname(__FILE__) . '/classes/OverrideUtil');
            $class= 'Ets_dccr_overrideUtil';
            $method = 'restoreReplacedMethod';
            call_user_func_array(array($class, $method),array($this));
            return true;
        }
        return false;
    }
    public function installOverrides()
    {
        require_once(dirname(__FILE__) . '/classes/OverrideUtil');
        $class= 'Ets_dccr_overrideUtil';
        $method = 'resolveConflict';
        call_user_func_array(array($class, $method),array($this));
        if(parent::installOverrides())
        {
            call_user_func_array(array($class, 'onModuleEnabled'),array($this));
            return true;
        }
        return false;
    }
    public function enable($force_all = false)
    {
        if(!$force_all && Ets_dc_defines::checkEnableOtherShop($this->id) && $this->getOverrides() != null)
        {
            try {
                $this->uninstallOverrides();
            }
            catch (Exception $e)
            {
                if($e)
                {
                    //
                }
            }
        }
        $this->checkOverrideDir();
        return parent::enable($force_all);
    }
    public function disable($force_all = false)
    {
        if(parent::disable($force_all))
        {
            if(!$force_all && Ets_dc_defines::checkEnableOtherShop($this->id))
            {
                if($this->getOverrides() != null)
                {
                    try {
                        $this->installOverrides();
                    }
                    catch (Exception $e)
                    {
                        if($e)
                        {
                            //
                        }
                    }
                }
            }
            return true;
        }
        return false;
    }
}