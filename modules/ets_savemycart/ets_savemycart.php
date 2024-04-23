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

require_once dirname(__FILE__) . '/classes/EtsScLink.php';
require_once dirname(__FILE__) . '/classes/EtsScTools.php';
require_once dirname(__FILE__) . '/classes/EtsScCart.php';
require_once dirname(__FILE__) . '/classes/EtsScProduct.php';

class Ets_savemycart extends Module
{
	static $currentIndex;
	static $_configs;
	private $content;
	public $prestashop_17;
	public $prestashop_800;
	public $cartRuleErrros;
	public $hooks = [
		'header',
		'displayBackOfficeHeader',
		'displayHeader',
		'displayShoppingCartFooter',
		'displayCustomerAccount',
		'displaySaveMyCart',
		'moduleRoutes',
		'actionCartSave',
	];

	public function __construct()
	{
		$this->name = 'ets_savemycart';
		$this->tab = 'front_office_features';
		$this->version = '1.0.6';
		$this->author = 'ETS-Soft';
		$this->need_instance = 0;
		$this->bootstrap = true;

		parent::__construct();

        $this->displayName = $this->l('Save & Share My Cart');
        $this->description = $this->l('Allow customers to save their shopping carts to buy later or share with their friends so that they can buy your products easier without searching');
$this->refs = 'https://prestahero.com/';
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->prestashop_17 = version_compare(_PS_VERSION_, '1.7.0.0', '>=') ? 1 : 0;
        $this->prestashop_800 = version_compare(_PS_VERSION_, '8.0.0', '>=') ? 1 : 0;
    }

	public function install()
	{
		include(dirname(__FILE__) . '/sql/install.php');

		return parent::install() &&
			$this->_registerHooks() &&
			$this->_doConfigs() &&
			$this->_doEmailTemplate();
	}

	private function _registerHooks()
	{
		foreach ($this->hooks as $hook) {
			$this->registerHook($hook);
		}
		return true;
	}

	public function uninstall()
	{
		include(dirname(__FILE__) . '/sql/uninstall.php');

		return parent::uninstall() &&
			$this->_unRegisterHooks() &&
			$this->_doConfigs(true);
	}

	private function _unRegisterHooks()
	{
		foreach ($this->hooks as $hook) {
			$this->unregisterHook($hook);
		}
		return true;
	}

	public function _doConfigs($uninstall = false, $resetStyles = false)
	{
		if ($configs = $this->getConfigs($resetStyles)) {
			$languages = [];
			foreach ($configs as $key => $config) {
				if ($uninstall) {
					if (!Configuration::deleteByName($key)) {
						return false;
					}
                } else {
                    if (!count($languages)) {
                        $languages = Language::getLanguages(false);
                    }
                    $global = isset($config['global']) && $config['global'] ? 1 : 0;
                    if (isset($config['lang']) && $config['lang']) {
                        $values = array();
                        foreach ($languages as $l) {
                            $values[$l['id_lang']] = isset($config['default']) ? $config['default'] : '';
                        }
                        $this->setFields($key, $global, $values, true);
                    } else {
                        $this->setFields($key, $global, isset($config['default']) ? $config['default'] : '', true);
                    }
                }
            }
        }

        return true;
    }

    /**
     * @param null $language LanguageCore
     * @return bool
     */
    public function _doEmailTemplate($language = null)
    {
        if ($language !== null) {
            $this->recurseCopy(dirname(__FILE__) . '/views/templates/api/mails/' . ($language->is_rtl ? 'en' : 'he'), dirname(__FILE__) . '/views/templates/api/mails/' . $language->iso_code);
        } elseif (($languages = Language::getLanguages(false))) {
            foreach ($languages as $language) {
                $path_mail_iso_code = ($path_email = dirname(__FILE__) . '/views/templates/api/mails/') . $language['iso_code'];
                if (!@file_exists($path_mail_iso_code) || !glob($path_mail_iso_code . '/*')) {
                    $this->recurseCopy($path_email . ($language['is_rtl'] ? 'en' : 'he'), $path_mail_iso_code);
                }
            }
        }

        return true;
    }

    public function recurseCopy($src, $dst)
    {
        if (!@file_exists($src)) {
            return false;
        }
        $dir = opendir($src);
        if (!@mkdir($dst)) {
            return false;
        }
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurseCopy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    @copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    // CODE:
    public function getConfigs($isStyleConfigs=false)
    {
        if (!self::$_configs) {
            self::$_configs = array(
                'ETS_SC_SAVE_MY_CART' => array(
                    'type' => 'switch',
                    'is_bool' => true,
                    'label' => $this->l('Allow customers to save their shopping cart?'),
                    'name' => 'ETS_SC_SAVE_MY_CART',
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled'),
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled'),
                        ),
                    ),
                    'default' => 1,
                ),
                'ETS_SC_SHARE_MY_CART' => array(
                    'type' => 'switch',
                    'is_bool' => true,
                    'label' => $this->l('Enable shopping cart sharing'),
                    'name' => 'ETS_SC_SHARE_MY_CART',
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled'),
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled'),
                        ),
                    ),
                    'default' => 1,
                ),
                'ETS_SC_BINDING_CART' => array(
                    'type' => 'select',
                    'label' => $this->l('Allow module to override shopping cart'),
                    'name' => 'ETS_SC_BINDING_CART',
                    'options' => [
                        'query' => [
                            [
                                'id_option' => 'override',
                                'name' => $this->l('Override'),
                            ],
                            [
                                'id_option' => 'append',
                                'name' => $this->l('Append'),
                            ]
                        ],
                        'id' => 'id_option',
                        'name' => 'name'
                    ],
                    'desc' => $this->l('If you select "Override" option, the current shopping cart will be replaced with your saved cart, or else your saved cart will be added to the current cart'),
                    'default' => 'override',
                ),
                'ETS_SC_NUMBER_OF_CLICK' => array(
                    'type' => 'text',
                    'label' => $this->l('Number of clicks to shopping cart link'),
                    'name' => 'ETS_SC_NUMBER_OF_CLICK',
                    'desc' => $this->l('The available number of clicks to a specific shopping cart link. Exceed this number, users cannot access your shopping cart anymore. Leave blank to no limit number of click to shopping cart.'),
                    'col' => 3,
                    'suffix' => $this->l('Click(s)'),
                    'validate' => 'isUnsignedInt',
                    'default' => '',
//                    'regex' => [
//                        [
//                            'pattern' => '/^(?:[1-9](?:[0-9]+)?|0+[1-9]+)$/',
//                            'bool' => true,
//                            'error' => $this->l('The click value must be greater than 0'),
//                        ],
//                    ]
                ),
                'ETS_SC_BUTTON_TEXT_COLOR' =>  array(
                    'type' => 'color',
                    'label' => $this->l('Button text color '),
                    'name' => 'ETS_SC_BUTTON_TEXT_COLOR',
                    'default' => '#ffffff',
                    'style_config'=>true
                ),
                'ETS_SC_BUTTON_TEXT_HOVER_COLOR' =>  array(
                    'type' => 'color',
                    'label' => $this->l('Button text hover color '),
                    'name' => 'ETS_SC_BUTTON_TEXT_HOVER_COLOR',
                    'default' => '#ffffff',
                    'style_config'=>true
                ),
                'ETS_SC_BUTTON_COLOR' =>  array(
                    'type' => 'color',
                    'label' => $this->l('Button background color '),
                    'name' => 'ETS_SC_BUTTON_COLOR',
                    'default' => '#2fb5d2',
                    'style_config'=>true
                ),
                'ETS_SC_BUTTON_HOVER_COLOR' =>  array(
                    'type' => 'color',
                    'label' => $this->l('Button background hover color '),
                    'name' => 'ETS_SC_BUTTON_HOVER_COLOR',
                    'default' => '#2592a9',
                    'style_config'=>true
                ),
                'ETS_SC_RESET_BUTTON' =>  array(
                    'type' => 'button',
                    'name' => 'ETS_SC_RESET_BUTTON',
                    'default' => 1,
                ),
            );
        }
        if ($isStyleConfigs){
            return array_filter(self::$_configs,function ($v,$k){
                return isset($v['style_config']) && $v['style_config'];
            },ARRAY_FILTER_USE_BOTH);
        }
        return self::$_configs;
    }

    public function getContent()
    {
        self::$currentIndex = $this->getAdminLink('AdminModules') . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        if (Tools::isSubmit('submitConfig')) {
            $this->_postConfig();
        }
        if (Tools::isSubmit('reset_config')){
            $this->_doConfigs(false,true);
            die(json_encode(array(
                'success' => $this->l('Configuration was successfully reset. This page will be reloaded in 3 seconds'),
            )));
        }
        $this->setDisplayHeader();
        $this->renderForm();

        return $this->content.$this->displayIframe();
    }

    public function getAdminLink($controller, $token = null)
    {
        return version_compare(_PS_VERSION_, '1.5.0.0', '<') ? 'index.php?tab=' . $controller . '&token=' . (trim($token) !== '' ? $token : trim(Tools::getValue('token'))) : $this->context->link->getAdminLink($controller);
    }

    public function renderForm()
    {
        if ($configs = $this->getConfigs()) {
            $fields_form_1 = array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Configuration'),
                        'icon' => 'icon-AdminAdmin',
                    ),
                    'input' => $configs,
                    'submit' => array(
                        'title' => $this->l('Save'),
                    ),
                ),
            );
            $helper = new HelperForm();
            $helper->show_toolbar = false;
            $helper->table = $this->table;
            $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
            $helper->default_form_language = $lang->id;
            $helper->module = $this;
            $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
            $helper->identifier = $this->identifier;
            $helper->submit_action = 'submitConfig';
            $helper->currentIndex = self::$currentIndex;
            $helper->token = $this->context->controller->token;
            $helper->tpl_vars = array(
                'fields_value' => $this->getFieldsValues($helper->submit_action),
                'languages' => $this->context->controller->getLanguages(),
                'id_language' => $this->context->language->id,
                'img_path' => $this->_path . 'views/img/',
                'baseAdminUrl' => $this->baseAdminUrl(),
            );

            $this->content .= $helper->generateForm(array($fields_form_1));
        }
    }
    public function baseAdminUrl()
    {
        return $this->context->link->getAdminLink('AdminModules', true) . '&configure=' . $this->name;
    }
    public function getConfigsValues($configs,$submitAction = '')
    {
        $fields = array();
        $languages = Language::getLanguages(false);
        if (Tools::isSubmit($submitAction)) {
            foreach ($configs as $config) {
                $key = $config['name'];
                if (isset($config['lang']) && $config['lang']) {
                    foreach ($languages as $l) {
                        $fields[$key][$l['id_lang']] = Tools::getValue($key . '_' . $l['id_lang'], isset($config['default']) ? $config['default'] : '');
                    }
                } elseif ($config['type'] == 'select' && isset($config['multiple']) && $config['multiple']) {
                    $fields[$key . ($config['type'] == 'select' ? '[]' : '')] = Tools::getValue($key, array());
                } elseif ($config['type'] == 'group' || $config['type'] == 'checkboxes') {
                    $fields[$key] = Tools::getValue($key, array());
                } else
                    $fields[$key] = Tools::getValue($key, isset($config['default']) ? $config['default'] : '');
            }
        } else {
            foreach ($configs as $config) {
                $key = $config['name'];
                $global = !empty($config['global']) ? 1 : 0;
                if (isset($config['lang']) && $config['lang']) {
                    foreach ($languages as $l) {
                        $fields[$key][$l['id_lang']] = $this->getFields($key, $global, $l['id_lang']);
                    }
                } elseif ($config['type'] == 'select' && isset($config['multiple']) && $config['multiple']) {
                    $fields[$key . ($config['type'] == 'select' ? '[]' : '')] = ($result = $this->getFields($key, $global)) != '' ? explode(',', $result) : array();
                } elseif ($config['type'] == 'group' || $config['type'] == 'checkboxes') {
                    $fields[$key] = ($result = $this->getFields($key, $global)) != '' ? explode(',', $result) : array();
                } else
                    $fields[$key] = $this->getFields($key, $global, null);
            }
        }
        return $fields;
    }
    public function getFieldsValues($submit_action = '',$isStyle = false)
    {
       return $this->getConfigsValues($this->getConfigs($isStyle),$submit_action);

    }

    public function getFields($key, $global = false, $idLang = null)
    {
        return $global ? Configuration::getGlobalValue($key, $idLang) : Configuration::get($key, $idLang);
    }

    public function _postConfig()
    {
        if ($configs = $this->getConfigs()) {
            $languages = Language::getLanguages(false);
            $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
            foreach ($configs as $key => $config) {
                if (isset($config['lang']) && $config['lang']) {
                    if (isset($config['required'])
                        && $config['required']
                        && $config['type'] != 'switch'
                        && trim(Tools::getValue($key . '_' . $id_lang_default) == '')
                    ) {
                        $this->_errors[] = $config['label'] . ' ' . $this->l('is required');
                    }
                } else {
                    if (isset($config['required'])
                        && $config['required']
                        && $config['type'] != 'switch'
                        && trim(Tools::getValue($key) == '')
                    ) {
                        $this->_errors[] = $config['label'] . ' ' . $this->l('is required');
                    } elseif (isset($config['regex'])
                        && is_array($config['regex'])
                        && count($config['regex']) > 0
                    ) {
                        foreach ($config['regex'] as $regex) {
                            if (isset($regex['bool'])
                                && isset($regex['pattern'])
                                && trim($regex['pattern']) !== ''
                            ) {
                                if ($regex['bool'] && !preg_match($regex['pattern'], trim(Tools::getValue($key))) || !$regex['bool'] && preg_match($regex['pattern'], trim(Tools::getValue($key)))) {
                                    $this->_errors[] = $config['label'] . ' ' . (isset($regex['error']) ? $regex['error'] : $this->l('invalid'));
                                }
                            }
                        }
                    } elseif (isset($config['validate'])
                        && method_exists('Validate', $config['validate'])
                    ) {
                        $validate = $config['validate'];
                        if ($key == 'ETS_SC_NUMBER_OF_CLICK' && trim(Tools::getValue($key)) == ''){
                            //Do something
                        }else {
                            if (!Validate::$validate(trim(Tools::getValue($key))))
                                $this->_errors[] = $config['label'] . ' ' . $this->l('is invalid');
                            else{
                                if ($key == 'ETS_SC_NUMBER_OF_CLICK' && Tools::getValue($key) == 0){
                                    $this->_errors[] = $this->l('The click value must be greater than 0');
                                }
                            }
                            unset($validate);
                        }
                    } elseif ($config['type'] !== 'checkboxes'
                        && !Validate::isCleanHtml(trim(Tools::getValue($key)))
                    ) {
                        $this->_errors[] = $config['label'] . ' ' . $this->l('is invalid');
                    }
                }
            }
            if (!$this->_errors) {
                foreach ($configs as $key => $config) {
                    $global = isset($config['global']) && $config['global'] ? 1 : 0;
                    if (isset($config['lang']) && $config['lang']) {
                        $values = array();
                        foreach ($languages as $lang) {
                            if ($config['type'] == 'switch')
                                $values[$lang['id_lang']] = (int)trim(Tools::getValue($key . '_' . $lang['id_lang'])) ? 1 : 0;
                            else
                                $values[$lang['id_lang']] = trim(Tools::getValue($key . '_' . $lang['id_lang'])) ? trim(Tools::getValue($key . '_' . $lang['id_lang'])) : trim(Tools::getValue($key . '_' . $id_lang_default));
                        }
                        $this->setFields($key, $global, $values, true);
                    } else {
                        if ($config['type'] == 'switch') {
                            $this->setFields($key, $global, (int)trim(Tools::getValue($key)) ? 1 : 0, true);
                        } elseif ($config['type'] == 'checkboxes' || $config['type'] == 'select' && isset($config['multiple']) && $config['multiple']) {
                            $this->setFields($key, $global, implode(',', Tools::getValue($key, array())), true);
                        } else {
                            $this->setFields($key, $global, trim(Tools::getValue($key)), true);
                        }
                    }
                }
            }

            if (!count($this->_errors)) {
                Tools::redirectAdmin(self::$currentIndex . '&conf=4');
            } else {
                $this->content .= $this->displayError($this->_errors);
            }
        }
    }

    public function setFields($key, $global, $values, $html = false)
    {
        return $global ? Configuration::updateGlobalValue($key, $values, $html) : Configuration::updateValue($key, $values, $html);
    }

    public function setDisplayHeader()
    {
        $js_files = [
            $this->_path . 'views/js/back.js',
        ];
        $this->smarty->assign([
            'js_files' => $js_files,
        ]);
        $this->content .= $this->display(__FILE__, 'bo-header.tpl');
    }

    // END CODE:

    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name || Tools::getValue('configure') == $this->name) {
//            $this->context->controller->addJS($this->_path . 'views/js/back.js');
            $this->context->controller->addCSS($this->_path . 'views/css/back.css');
            $this->context->controller->addJS($this->_path . 'views/js/colorpicker.js');
        }
    }

    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path . 'views/js/jquery.growl.js');
        $this->context->controller->addJS($this->_path . 'views/js/front.js');
        $this->context->controller->addCSS($this->_path . 'views/css/front.css');
    }

    public function hookDisplayHeader()
    {
        $this->hookHeader();
        if (trim(Tools::getValue('controller')) == 'product' && ($id_product = (int)Tools::getValue('id_product')) > 0) {
            $this->context->cookie->ets_sc_product_id = $id_product;
        } else {
            $this->context->cookie->ets_sc_product_id = 0;
        }
        $tpl_var = $this->getFieldsValues('',true);
        $tpl_var['link']= EtsScLink::getInstance()->getLinkRewrite($this->context->language->id);
        $tpl_var['ETS_SC_LINK_SHOPPING_CART'] = $this->context->link->getModuleLink($this->name, 'cart', array(), (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE'));
        $this->smarty->assign($tpl_var);
        if (Tools::getValue('cr_err')) {
            $this->context->controller->warning= $this->l('Some voucher can not be used due to special customer condition.');
        }
        return $this->display(__FILE__, 'fo-head.tpl');
    }

    public function hookDisplayShoppingCartFooter()
    {
        if (!isset($this->context->cart->id) || !$this->context->cart->getLastProduct()) {
            return;
        }
        $tpl_var = array();
        if ((int)Configuration::get('ETS_SC_SAVE_MY_CART') && !EtsScCart::itemExist($this->context->cart->id)) {
            $tpl_var['save_cart_html'] = $this->display(__FILE__, 'fo-shopping-cart.tpl');

        }
        $tpl_var['isShareable'] = Configuration::get('ETS_SC_SHARE_MY_CART');
        $this->smarty->assign($tpl_var);
        return $this->display(__FILE__, 'fo-button-share.tpl');
    }

    public function hookDisplayCustomerAccount()
    {
        if ((int)Configuration::get('ETS_SC_SAVE_MY_CART')) {
            $this->smarty->assign(array(
                'link' => EtsScLink::getInstance()->getLinkRewrite($this->context->language->id),//$this->context->link->getModuleLink($this->name, 'cart', array(), (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE')),
                'is17' => $this->prestashop_17
            ));
            return $this->display(__FILE__, 'fo-block.tpl');
        }
    }

	public function hookDisplaySaveMyCart(&$params)
	{
		$params['isShareable'] = Configuration::get('ETS_SC_SHARE_MY_CART');
		$this->smarty->assign($params);
		return $this->display(__FILE__, 'fo-shopping-cart-list.tpl');
	}

	public function hookActionCartSave($params)
	{
		if (!empty($params['cookie'])
			&& isset($params['cookie']->id_customer)
			&& ((isset($params['cookie']->id_cart) && ($params['cookie']->id_cart)) || (isset($params['cart']) && isset($params['cart']->id)))
			&& ($customer = new Customer((int)$params['cookie']->id_customer))
			&& (Tools::getIsset('add') || Tools::getIsset('update') || Tools::getIsset('delete'))
		) {
			if (!Tools::getIsset('delete') && $this->context->cart) {
				$this->updateMyCartWhenCurrentCartUpdate($this->context->cart, $customer, $this->context);
			} else if (Tools::getIsset('delete')) {
				$cart = new Cart((int)$params['cookie']->id_cart);
				$this->updateMyCartWhenCurrentCartUpdate($cart, $customer);
			}
		}
	}

	public function updateMyCartWhenCurrentCartUpdate(Cart $cart, Customer $customer, Context $context = null)
	{
		$shopping_cart = new EtsScCart($cart->id);
		if ($shopping_cart->id_customer == $customer->id) {
			if ($context === null) {
				$context = Context::getContext();
				$context->customer = $customer;
				$context->cart = $cart;
				$context->currency = new Currency($cart->id_currency);
			}
			$group = new Group($customer->id_default_group ?: Group::getCurrent()->id);
			$shopping_cart->total = $context->cart->getCartTotalPrice();
			$shopping_cart->sub_total = $context->cart->getOrderTotal(!$group->price_display_method, Cart::ONLY_PRODUCTS);
			$shopping_cart->total_shipping = $context->cart->getOrderTotal(!$group->price_display_method, Cart::ONLY_SHIPPING);
			$shopping_cart->total_tax = $group->price_display_method ? 0 : ($shopping_cart->total - $context->cart->getOrderTotal(false));
			$shopping_cart->update();
			$product_in_cart = $cart->getProducts(false, false, null, false);
			$shopping_cart->deleteProductsInCart();
			if ($product_in_cart) {
				foreach ($product_in_cart as $prod) {
					$product = new EtsScProduct();
					$product->id_cart = $cart->id;
					$product->id_product = $prod['id_product'];
					$product->id_address_delivery = $prod['id_address_delivery'];
					$product->id_shop = $prod['id_shop'];
					$product->id_product_attribute = $prod['id_product_attribute'];
					$product->id_customization = $prod['id_customization'];
					$product->quantity = $prod['quantity'];
					$product->add();
				}
			}
		}
	}

	public function getFormattedName($name = false)
	{
		return $this->prestashop_17 ? ImageType::getFormattedName($name) : ImageType::getFormatedName($name);
	}

	//const _REWRITE_PATTERN_ = '[_a-zA-Z0-9\x{0600}-\x{06FF}\pL\pS-]*?';
	const _REWRITE_ = 'savemycart';

	public function hookModuleRoutes()
    {
        return array(
            'ets_pc_savemycart' => array(
                'controller' => 'cart',
                'rule' => self::_REWRITE_ . '.html',
                'keywords' => array(),
                'params' => array(
                    'fc' => 'module',
                    'module' => $this->name,
                ),
            ),
        );
    }
    public function setCartRuleErr($err)
    {
        $this->cartRuleErrros = array();
        $this->cartRuleErrros = $err;
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
