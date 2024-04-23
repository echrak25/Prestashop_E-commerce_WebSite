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

if (!defined('_PS_VERSION_')) {
    exit;
}
if (!defined('_PS_ETS_SCROLL_IMG_DIR_')) {
    define('_PS_ETS_SCROLL_IMG_DIR_', _PS_IMG_DIR_ . 'ph_scrolltotop/');
}
if (!defined('_PS_ETS_BASE_IMG_DIR_')) {
    define('_PS_ETS_BASE_IMG_DIR_', __PS_BASE_URI__ . 'img/ph_scrolltotop/');
}
require_once(dirname(__FILE__) . '/classes/Ets_stt_defines.php');
const ALLOW_IMG_FILE_TYPE = array('jpeg', 'jpg', 'png', 'svg','gif');
class Ph_scrolltotop extends Module
{
    protected $config_form = false;
    private $newImgPath ='';
    private $newImgName ='';
    public function __construct()
    {
        $this->name = 'ph_scrolltotop';
        $this->tab = 'administration';
        $this->version = '1.0.4';
        $this->author = 'ETS-Soft';
        $this->need_instance = 1;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Amazing Scroll to Top');
        $this->description = $this->l('Create and customize your scroll to top button.');
$this->refs = 'https://prestahero.com/';

        $this->confirmUninstall = $this->l('');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function _installDb()
    {
        return Ets_stt_defines::getInstance()->_installDb();
    }
    public function _uninstallDb()
    {
        return Ets_stt_defines::getInstance()->_uninstallDb();
    }
    public function install()
    {
        $this->_installDb();
        $this->initDefaultData();
        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('displayBackOfficeHeader') &&
            $this->registerHook('displayFooter');
    }

    public function initDefaultData()
    {
        $configs =  $this->getConfigForm(true);
        foreach ($configs as $key => $val){
            Configuration::updateValue($key, $val['default']);
        }
    }
    public function uninstall()
    {
        $configs = $this->getConfigForm(true);
        foreach ($configs as $key=>$val){
            Configuration::deleteByName($key);
        }
        if (file_exists(_PS_ETS_SCROLL_IMG_DIR_)) {
            array_map('unlink',glob(_PS_ETS_SCROLL_IMG_DIR_.'/*.*'));
            rmdir(_PS_ETS_SCROLL_IMG_DIR_);
        }
        $this->_uninstallDb();

        return parent::uninstall() &&
	        $this->unregisterHook('header') &&
	        $this->unregisterHook('displayBackOfficeHeader') &&
	        $this->unregisterHook('displayFooter');
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        $this->context->smarty->assign('module_dir', $this->_path);
        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');
        $this->postDataHandler($output);
        return $output.$this->renderForm().$this->displayIframe();
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
        $helper->submit_action = 'submitPh_scrolltotopModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
            'baseImageUrl' => _MODULE_DIR_.'ph_scrolltotop/views/img/',
            'iconForm' => $this->display(__FILE__, 'admin-icon.tpl'),
            'baseAdminUrl' => $this->baseAdminUrl(),
            'imageName' => Configuration::get('ETS_CUSTOM_ICON') ? Tools::substr(strrchr(Configuration::get('ETS_CUSTOM_ICON'), "/"), 1):'',
            'imagePath' => Configuration::get('ETS_CUSTOM_ICON') ? _PS_ETS_BASE_IMG_DIR_.Tools::substr(strrchr(Configuration::get('ETS_CUSTOM_ICON'), "/"), 1):'',
            'delete_url' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&deleteimage=1&imgPath='.Configuration::get('ETS_CUSTOM_ICON'),
        );
        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm($getInputs = false)
    {
        $inputs = array(
           'ETS_SCROLLTOTOP_LIVE_MODE' => array(
                'type' => 'switch',
                'label' => $this->l('Enable Scroll to top button:'),
                'name' => 'ETS_SCROLLTOTOP_LIVE_MODE',
                'is_bool' => true,
                'default' => true,
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
            'ETS_SCROLL_PIXEL' => array(
                'type' => 'text',
                'label' => $this->l('Scroll pixel:'),
                'name' => 'ETS_SCROLL_PIXEL',
                'col' => 2,
                'suffix' => 'px',
                'required' => true,
                'desc' => $this->l('Scroll to top button will appear after scrolling X (pixel) screen height.'),
                'default' => 500,
            ),
            'ETS_BUTTON_POSITION' => array(
                'type'      => 'radio',
                'label'     => $this->l('Position:'),
                'desc'      => $this->l("Choose the button display position"),
                'name'      => 'ETS_BUTTON_POSITION',
                'required'  => true,
                'class'     => 't',
                'is_bool'   => true,
                'default' => 0,
                'values'    => array(
                    array(
                        'id'    => 'active_on',
                        'value' => 1,
                        'label' => $this->l('Bottom left')
                    ),
                    array(
                        'id'    => 'active_off',
                        'value' => 0,
                        'label' => $this->l('Bottom right')
                    )
                ),
            ),
            'ETS_FLOATING_BY_BOTTOM' => array(
                'type' => 'ets_touch_spin',
                'name' => 'ETS_FLOATING_BY_BOTTOM',
                'label' => $this->l('Change position of floating button by bottom:'),
                'desc' => $this->l('Enter a positive number (eg: 10, 15, 20) to move the floating button position up. Enter a negative number (eg: -10, -15, -20) to move the floating button position down. '),
                'default' => 50,
            ),
            'ETS_FLOATING_BY_LEFT' => array(
                'type' => 'ets_touch_spin',
                'name' => 'ETS_FLOATING_BY_LEFT',
                'label' => $this->l('Change position of floating button by left:'),
                'desc' => $this->l('Enter a positive number (eg: 10, 15, 20) to move the floating button position right. Enter a negative number (eg: -10, -15, -20) to move the floating button position left. '),
                'default' => 50,
            ),
            'ETS_FLOATING_BY_RIGHT' => array(
                'type' => 'ets_touch_spin',
                'name' => 'ETS_FLOATING_BY_RIGHT',
                'label' => $this->l('Change position of floating button by right:'),
                'desc' => $this->l('Enter a positive number (eg: 10, 15, 20) to move the floating button position left. Enter a negative number (eg: -10, -15, -20) to move the floating button position right. '),
                'default' => 50,
            ),
            'ETS_BUTTON_ICON_SELECT' => array(
                'type' => 'select',
                'label' => $this->l('Button icon:'),
                'name' => 'ETS_BUTTON_ICON_SELECT',
                'options' => array(
                    'query' => array(
                        array(
                            'option_value' => 'icon',
                            'option_title' => $this->l('Default Icon')
                        ),
                        array(
                            'option_value' => 'custom',
                            'option_title' => $this->l('Custom Icon')
                        )
                    ),
                    'id' => 'option_value',
                    'name' => 'option_title'
                ),
                'default' => 'icon',
            ),
            'ETS_BUTTON_ICON' => array(
                'label' => $this->l('Font awesome icon:'),
                'type' => 'text',
                'name' => 'ETS_BUTTON_ICON',
                'class' => 'ets_browse_icon',
                'desc' => $this->l('Use font awesome class. Ex: fa-bars, fa-plus, ...'),
                'default' => 'fa-arrow-up',
            ),
            'ETS_CUSTOM_ICON' => array(
                'label' => $this->l('Button custom icon image:'),
                'type' => 'file',
                'name'=>'ETS_CUSTOM_ICON',
                'desc' => $this->l('Recommended minimum size: 32x32 px and maximum file size: ').Configuration::get('PS_ATTACHMENT_MAXIMUM_SIZE').'MB',
                'default' => '',
                'col'=>'5',
            ),
            'ETS_BORDER_TYPE' => array(
                'type' => 'select',
                'label' => $this->l('Button border:'),
                'name' => 'ETS_BORDER_TYPE',
                'default' => 'rounded',
                'options' => array(
                    'query' => array(
                        array(
                            'option_value' => 'circle',
                            'option_title' => $this->l('Circle')
                        ),
                        array(
                            'option_value' => 'square',
                            'option_title' => $this->l('Square')
                        ),
                        array(
                            'option_value' => 'rounded',
                            'option_title' => $this->l('Rounded')
                        )

                    ),
                    'id' => 'option_value',
                    'name' => 'option_title'
                ),
            ),
            'ETS_BUTTON_ICON_COLOR' => array(
                'type' => 'color',
                'label' => $this->l('Button icon color:'),
                'name' => 'ETS_BUTTON_ICON_COLOR',
                'default' => '#ffffff',
            ),
            'ETS_BUTTON_BACKGROUND_COLOR' => array(
                'type' => 'color',
                'label' => $this->l('Button background color:'),
                'name' => 'ETS_BUTTON_BACKGROUND_COLOR',
                'default' => '#2fb5d2',
            ),
            'ETS_BUTTON_HOVER_COLOR' => array(
                'type' => 'color',
                'label' => $this->l('Button hover color:'),
                'name' => 'ETS_BUTTON_HOVER_COLOR',
                'default' => '#2592a9',
            ),
        );
        if ($getInputs){
            return $inputs;
        }
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'input' => $inputs,
            ),
        );
    }
    public function baseAdminUrl()
    {
        return $this->context->link->getAdminLink('AdminModules', true) . '&configure=' . $this->name;
    }
    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
       $configs = $this->getConfigForm(true);
       $values = array();
       foreach ($configs as $key => $val){
            $values[$key] = Tools::getValue($key, Configuration::get($key));
        }
        return $values;
    }

    /**
     * Save form data.
     */
    public function getFileNameFromPath($path){
       return Tools::substr(strrchr($path, "/"), 1);
    }
    public function postDataHandler(&$output)
    {
        if (Tools::isSubmit('reset_config')){
            $this->initDefaultData();
            foreach(glob(_PS_ETS_SCROLL_IMG_DIR_.'*.*') as $v){
                unlink($v);
            }
            die(json_encode(array(
                'success' => $this->l('Configuration was successfully reset. This page will be reloaded in 3 seconds'),
            )));
        }
        if (Tools::isSubmit('submitPh_scrolltotopModule')) {
            $configs = $this->getConfigForm(true);
            $values = Tools::getAllValues();
            $this->validateData($configs,$values);
            if ($this->_errors){
                if ($this->newImgPath){
                    unlink($this->newImgPath);
                }
                $output.= $this->displayError($this->_errors);
            }else {
                foreach ($configs as $key => $val){
                    if ($key == 'ETS_CUSTOM_ICON' && Tools::getValue('ETS_BUTTON_ICON_SELECT') == 'custom'){
                        if ($this->newImgName && $this->newImgPath){
                            $oldImage =_PS_ETS_SCROLL_IMG_DIR_.$this->getFileNameFromPath(Configuration::get($key));
                            if (Configuration::get($key) && file_exists($oldImage)) {
                                unlink($oldImage);
                            }
                            Configuration::updateValue($key,_PS_ETS_BASE_IMG_DIR_.$this->newImgName);
                        }
                    }elseif ($key == 'ETS_BUTTON_ICON'){
                        if (empty(Tools::getValue('ETS_BUTTON_ICON')) && !Configuration::get('ETS_BUTTON_ICON')){
                            Configuration::updateValue('ETS_BUTTON_ICON',$val['default']);
                        }else {
                            Configuration::updateValue('ETS_BUTTON_ICON',Tools::getValue('ETS_BUTTON_ICON'));
                        }
                    }
                    else{
                        Configuration::updateValue($key,Tools::getValue($key)?Tools::getValue($key):$val['default']);
                    }
                }
                $output.= $this->displayConfirmation($this->l('Your configuration has been saved successfully!'));
            }
        }
        if (Tools::getValue('deleteimage')){
            $imgName = Tools::getValue('imageName');
            if ($imgName && file_exists(_PS_ETS_SCROLL_IMG_DIR_.$imgName) && unlink(_PS_ETS_SCROLL_IMG_DIR_.$imgName)){
                Configuration::updateValue('ETS_CUSTOM_ICON','');
                die(json_encode(array(
                    'success' => true,
                    'message' => $this->l('Delete image successfully'),
                )));
            }else {
                die(json_encode(array(
                    'success' => false,
                    'message' => $this->l('Delete image successfully'),
                )));
            }
        }
    }

    public function validateData($configs,$values)
    {
        foreach ($configs as $key => $val){
            if ($val['type'] == 'text'){
                if ($key =='ETS_BUTTON_ICON'){
                    if ($values['ETS_BUTTON_ICON_SELECT'] == 'icon' && empty(trim($values[$key]))){
                        $this->_errors[] =$this->l('Cannot leave button icon field empty!');
                    }
                }else {
                    if (!Validate::isInt(Tools::getValue($key)) || (int)Tools::getValue($key) <= 0){
                        $this->_errors[] = $this->l('Input value is invalid. Accept number > 0 only!');
                    }
                }
            }elseif ($val['type'] == 'file' && $values['ETS_BUTTON_ICON_SELECT'] == 'custom') {

                if (!isset($_FILES[$key]) || !$_FILES[$key] || empty($_FILES[$key]['name'])){
                    if (empty(Configuration::get('ETS_CUSTOM_ICON'))){
                        $this->_errors[] = $this->l('File upload field is empty!');
                    }
                }else{
                    $file = $_FILES[$key];
                    $file['name'] = str_replace(' ','_',$_FILES[$key]['name']);
                    $file['name'] = $this->convert_vi_to_en($file['name']);
                    $type = Tools::strtolower(Tools::substr(strrchr($_FILES[$key]['name'], '.'), 1));
                    $imageName = _PS_ETS_SCROLL_IMG_DIR_.Tools::strtolower($file['name']);
                    $max_size = Configuration::get('PS_ATTACHMENT_MAXIMUM_SIZE') *1024*1024;
                    if ($file['size'] > $max_size){
                        $this->_errors[] = $this->l('File is too large. Maximum file size allowed: ').Configuration::get('PS_ATTACHMENT_MAXIMUM_SIZE').'MB';
                    }elseif (!in_array($type, ALLOW_IMG_FILE_TYPE)){
                        $this->_errors[] = $this->l('Invalid file type. Allowed type: ').implode(',',ALLOW_IMG_FILE_TYPE);
                    } else{
                        if (!file_exists(_PS_ETS_SCROLL_IMG_DIR_) && !@mkdir(_PS_ETS_SCROLL_IMG_DIR_)){
                            $this->_errors[] = $this->l('An error occurred while attempting to upload the file.');
                        }else {
                            if(!file_exists($imageName)){
                                if (!move_uploaded_file($file['tmp_name'], $imageName)) {
                                    $this->_errors[] = $this->l('An error occurred while attempting to upload the file.');
                                }else {
                                    $this->newImgPath = $imageName;
                                    $this->newImgName = Tools::strtolower($file['name']);
                                }
                            }else {
                                $this->_errors[] = $this->l('The file name already exists.');
                            }
                        }
                    }
                }

            }elseif ($val['type'] == 'color'){
                if (!Validate::isColor(Tools::getValue($key))){
                    $this->_errors[]  =$this->l('Invalid color input value.');
                }
            }else {
                if ($val['type'] == 'switch' || $val['type'] == 'radio') {
                    if (!Validate::isInt($values[$key]) || ((int)$values[$key] > 1 && (int)$values[$key] < 0)){
                        $this->_errors[] =$this->l('Invalid input value.');
                    }
                }elseif ($val['type'] == 'select' && !in_array($values[$key],array('icon','custom','circle','square','rounded'))) {
                    $this->_errors[] =$this->l('Invalid input value.');
                }
            }
        }
    }

    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('configure') == 'ph_scrolltotop' || Tools::getValue('module_name') =='ph_scrolltotop'){
            $this->context->controller->addJS($this->_path.'views/js/jquery.bootstrap-touchspin.min.js');
            $this->context->controller->addJS($this->_path.'/views/js/solid.min.js');
            $this->context->controller->addJS($this->_path.'/views/js/fontawesome.js');
            $this->context->controller->addJS($this->_path.'views/js/admin.js');
            $this->context->controller->addCSS($this->_path.'views/css/jquery.bootstrap-touchspin.min.css');
            $this->context->controller->addCSS($this->_path.'/views/css/fontawesome.min.css');
            $this->context->controller->addCSS($this->_path.'/views/css/solid.css');
            $this->context->controller->addCSS($this->_path.'views/css/admin.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        Media::addJsDef(array('ETS_SCROLL_PIXEL'=>(int)Configuration::get('ETS_SCROLL_PIXEL')??500));
        $this->context->controller->addJS($this->_path.'/views/js/solid.min.js');
        $this->context->controller->addJS($this->_path.'/views/js/fontawesome.js');
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/fontawesome.min.css');
        $this->context->controller->addCSS($this->_path.'/views/css/solid.css');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
        $this->smarty->assign($this->getConfigFormValues());
        return $this->display(__FILE__, 'custom-styles.tpl');
    }
    public function hookDisplayFooter($params)
    {
        if (!Configuration::get('ETS_SCROLLTOTOP_LIVE_MODE')) {
            return false;
        }
        $this->smarty->assign($this->getConfigFormValues());
        return $this->display(__FILE__, 'back-to-top.tpl');
    }
   public function convert_vi_to_en($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        return $str;
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
