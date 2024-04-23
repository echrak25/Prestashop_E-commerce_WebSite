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

require_once _PS_MODULE_DIR_ . 'ets_savemycart/classes/HTMLTemplateCartPdf.php';
require_once _PS_MODULE_DIR_.'ets_savemycart/classes/EtsScLink.php';
require_once(dirname(__FILE__) . '/abstract.php');
class Ets_savemycartSubmitModuleFrontController extends EtsSaveCartFrontController
{
//    private $link_checkout;
    private $cartRuleErrros;
    public function __construct()
    {
        parent::__construct();

        $this->display_column_right = false;
        $this->display_column_left = false;
    }

    public function init()
    {
        parent::init();

        $this->link_checkout = $this->context->link->getPageLink((Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order'), (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE'));

        $verify = trim(Tools::getValue('verify'));
        $token = trim(Tools::getValue('token'));
        if (trim($verify) !== '' && trim($token) !== '') {
	        // Limit cart:
	        $ETS_SC_NUMBER_OF_CLICK = !trim(Configuration::get('ETS_SC_NUMBER_OF_CLICK')) ? 100000 : (int)trim(Configuration::get('ETS_SC_NUMBER_OF_CLICK'));
            $rs = EtsScCart::getVerify($token, $verify);
            if ($shopping_cart = $rs['cart']) {
	            $numberOfClick = count(EtsScCart::getClickCount((int)$shopping_cart['id_ets_savemycart']));
                if (($cart = new Cart($shopping_cart['id_cart']))
                    && $cart->id > 0
                    && $cart->getLastProduct()
                ) {
                    if ($numberOfClick <= $ETS_SC_NUMBER_OF_CLICK) {
	                    if ((int)$this->context->cart->id == (int)$cart->id) {
		                    Db::getInstance()->insert(
			                    'ets_savemycart_count',
			                    [
				                    'id_ets_savemycart' => (int)$shopping_cart['id_ets_savemycart'],
				                    'id_cart_binding' => $this->context->cart->id
			                    ]
		                    );
		                    Tools::redirectLink($this->link_checkout);
		                    exit;
	                    }
	                    $id_cart_rules = explode(',',$shopping_cart['cart_rules']);
	                    $binding_carts = EtsScCart::getBindingCart((int)$shopping_cart['id_ets_savemycart']);

	                    if ($rs['expiredToken']) {
		                    Db::getInstance()->delete('ets_savemycart_expired_token', 'id_cart=' . (int)$shopping_cart['id_cart']);
	                    }
                        if ($this->context->cart->id) {
                            if (is_array($binding_carts) && count($binding_carts)){
                                foreach ($binding_carts as $binding_cart) {
                                    if (isset($binding_cart['id_cart_binding'])
                                        && $binding_cart['id_cart_binding']
                                        && $this->context->cart->id == $binding_cart['id_cart_binding']
                                    ) {
                                        Db::getInstance()->insert(
                                            'ets_savemycart_count',
                                            [
                                                'id_ets_savemycart' => (int)$shopping_cart['id_ets_savemycart'],
                                                'id_cart_binding' => $this->context->cart->id
                                            ]
                                        );
                                        $this->updateBoundCartCartRule($this->context->cart->id,$id_cart_rules);
                                        if ($this->cartRuleErrros){
                                            Tools::redirectLink($this->link_checkout.'?cr_err=1');
                                        }else{
                                            Tools::redirectLink($this->link_checkout);
                                        }
                                        exit;
                                    }
                                }
                            }

                        }
                        else {
                            $new_cart = new Cart();
                            $new_cart->id_lang = (int)$this->context->cookie->id_lang;
                            $new_cart->id_currency = (int)$this->context->cookie->id_currency;
                            $new_cart->id_guest = (int)$this->context->cookie->id_guest;
                            $new_cart->id_shop_group = (int)$this->context->shop->id_shop_group;
                            $new_cart->id_shop = $this->context->shop->id;
                            if ($this->context->cookie->id_customer) {
                                $new_cart->id_customer = (int)$this->context->cookie->id_customer;
                                $new_cart->id_address_delivery = (int)Address::getFirstCustomerAddressId($new_cart->id_customer);
                                $new_cart->id_address_invoice = (int)$cart->id_address_delivery;
                            } else {
                                $new_cart->id_address_delivery = 0;
                                $new_cart->id_address_invoice = 0;
                            }
                            $new_cart->add();
                            $this->context->cart = $new_cart;
                            CartRule::autoAddToCart($this->context);
                            $this->context->cookie->id_cart = $new_cart->id;
                        }

                        // Add new cart:
                        $res = false;
                        if ($this->context->cart->id > 0 && ($res = EtsScCart::copyCart($cart, $this->context->cart))) {
                            Db::getInstance()->insert(
                                'ets_savemycart_binding',
                                [
                                    'id_ets_savemycart' => (int)$shopping_cart['id_ets_savemycart'],
                                    'id_cart_binding' => $this->context->cart->id
                                ]
                            );
                            Db::getInstance()->insert(
                                'ets_savemycart_count',
                                [
                                    'id_ets_savemycart' => (int)$shopping_cart['id_ets_savemycart'],
                                    'id_cart_binding' => $this->context->cart->id
                                ]
                            );

                            $this->updateBoundCartCartRule($this->context->cart->id,$id_cart_rules);
                        }
                        if ($res) {
                            if ($this->cartRuleErrros){
                                Tools::redirectLink($this->link_checkout.'?cr_err=1');
                            }else{
                                Tools::redirectLink($this->link_checkout);
                            }
                        } else {
                            $this->errors[] = $this->module->l('Cannot binding new cart to your current cart.', 'submit');
                        }
                    } else {
                    	if (!Db::getInstance()->getRow('
			                SELECT * 
			                FROM `' . _DB_PREFIX_ . 'ets_savemycart_expired_token` 
			                WHERE token=\'' . pSQL($token) . '\'')) {
		                    Db::getInstance()->insert(
			                    'ets_savemycart_expired_token',
			                    [
				                    'id_cart' => (int)$shopping_cart['id_cart'],
				                    'token' => $token
			                    ]
		                    );
	                    }
//                        Db::getInstance()->delete('ets_savemycart', 'id_ets_savemycart=' . (int)$shopping_cart['id_ets_savemycart']);
//                        Db::getInstance()->delete('ets_savemycart_binding', 'id_ets_savemycart=' . (int)$shopping_cart['id_ets_savemycart']);
//                        Db::getInstance()->delete('ets_savemycart_count', 'id_ets_savemycart=' . (int)$shopping_cart['id_ets_savemycart']);
                        $this->errors[] = $this->module->l('You have run out of views turn for this cart.', 'submit');
                    }
                } else {
                    $this->errors[] = $this->module->l('The shopping cart is invalid.', 'submit');
                }
            } elseif ($rs['expiredToken']) {
                $this->errors[] = $this->module->l('You have run out of views turn for this cart.', 'submit');
            }else {
                $this->errors[] = $this->module->l('The token is invalid.', 'submit');
            }
        }
    }

    public function checkBindingCart($binding_carts, $id_cart)
    {
        if (!is_array($binding_carts) ||
            count($binding_carts) <= 0 ||
            $id_cart <= 0
        ) {
            return false;
        }
        foreach ($binding_carts as $binding_cart) {
            if (isset($binding_cart['id_cart_binding'])
                && $binding_cart['id_cart_binding']
                && $id_cart == $binding_cart['id_cart_binding']
            ) {
                return true;
            }
        }

        return false;
    }
    public function getIdCartRules(Cart $cart){
            $ids = array();
            foreach ($cart->getCartRules() as $key => $value){
                array_push($ids,$value['id_cart_rule']);
            }
            return $ids;
    }
    public function initContent()
    {
        parent::initContent();
        if (Tools::isSubmit('submitSend') || Tools::getValue('submitSend')) {
            if (!Tools::getValue('id_cart') && $this->context->cart->id <= 0 ) {
                Tools::redirectLink($this->context->link->getPageLink('index', (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE')));
            }
            Tools::getValue('id_cart') ? $currentCart = new Cart((int)Tools::getValue('id_cart')) : $currentCart = $this->context->cart;
            $name = Tools::getValue('name');
            if (trim($name) == '') {
                $this->errors[] = $this->module->l('Recipient name is required', 'submit');
            } elseif (!ValidateCore::isName($name)) {
                $this->errors[] = $this->module->l('Recipient name is invalid', 'submit');
            }
            $email = Tools::getValue('email');
            if (trim($email) == '') {
                $this->errors[] = $this->module->l('Email address is required', 'submit');
            } elseif (!ValidateCore::isEmail($email)) {
                $this->errors[] = $this->module->l('Email address is invalid', 'submit');
            }
            $products = $currentCart->getProducts();
            if (!count($products)) {
                $this->errors[] = $this->module->l('The shopping cart is empty', 'submit');
            }
            if (!count($this->errors)) {

                // Get product list in Cart:
                $virtual_product = true;
                $product_var_tpl_list = array();
                $id_group = isset($this->context->customer) && $this->context->customer->id ? Customer::getDefaultGroupId((int)$this->context->customer->id) : (int)Group::getCurrent()->id;
                $group = new Group($id_group);
                $use_tax_display = $group->price_display_method ? false : true;
                $currency = Currency::getCurrencyInstance($currentCart->id_currency);

                foreach ($products as $product) {
                    // Basic:
                    $p = new Product($product['id_product'], true, $this->context->language->id);
                    $price = $product['price'];
                    $price_wt = $product['price_wt'];
                    $product_price = Product::getTaxCalculationMethod() == PS_TAX_EXC ? Tools::ps_round($price, 2) : $price_wt;
                    $image = ($product['id_product_attribute'] && ($image = EtsScTools::getCombinationImageById($product['id_product_attribute'], $currentCart->id_lang))) ? $image : Product::getCover($product['id_product']);
                    $product['image'] = $this->context->link->getImageLink($p->link_rewrite, isset($image['id_image']) ? $image['id_image'] : 0, $this->getFormattedName('cart'));
                    $product_var_tpl = array(
                        'sku' => $p->reference,
                        'reference' => $product['reference'],
                        'name' => $product['name'],// . (isset($product['attributes']) ? ' - ' . $product['attributes'] : ''),
                        'unit_price' => Tools::displayPrice($product_price, $this->context->currency, false),
                        'price' => Tools::displayPrice($product_price * $product['quantity'], $this->context->currency, false),
                        'quantity' => $product['quantity'],
                        'customization' => array(),
                        'image' => $product['image'],
                        'is_available' => $p->checkQty(1),
                        'link' => $this->context->link->getProductLink($product, null, null, null, null, null, $product['id_product_attribute'] ? $product['id_product_attribute'] : 0),
                    );
                    if (($old_price = $p->getPriceWithoutReduct(!$use_tax_display, $product['id_product_attribute'] ? $product['id_product_attribute'] : null)) && $old_price != $product['price']) {
                        $product_var_tpl['old_price'] = Tools::displayPrice($old_price, $currency);

                        if (isset($p->specificPrice['reduction_type']) && $p->specificPrice['reduction_type'] !== 'percentage') {
                            $currency2 = CurrencyCore::getCurrencyInstance($p->specificPrice['id_currency'] > 0 ? (int)$p->specificPrice['id_currency'] : (int)ConfigurationCore::get('PS_CURRENCY_DEFAULT'));
                            $product_var_tpl['reduction'] = Tools::displayPrice(Tools::convertPriceFull($p->specificPrice['reduction'], $currency2, $currency), $currency);
                        } elseif (isset($p->specificPrice['reduction'])) {
                            $product_var_tpl['reduction'] = ($p->specificPrice['reduction'] * 100) . '%';
                        }
                    }
                    if (!empty($product['id_product_attribute'])) {
                        $p->id_product_attribute = $product['id_product_attribute'];
                        $product_var_tpl['attributes'] = $p->getAttributeCombinationsById($product['id_product_attribute'], $currentCart->id_lang);
                    }
                    // Product customized:
                    $customized_datas = Product::getAllCustomizedDatas((int)$currentCart->id);
                    if (isset($customized_datas[$product['id_product']][$product['id_product_attribute']])) {
                        $product_var_tpl['customization'] = array();
                        foreach ($customized_datas[$product['id_product']][$product['id_product_attribute']][$currentCart->id_address_delivery] as $customization) {
                            $customization_text = '';
                            if (isset($customization['datas'][Product::CUSTOMIZE_TEXTFIELD]))
                                foreach ($customization['datas'][Product::CUSTOMIZE_TEXTFIELD] as $text)
                                    $customization_text .= $text['name'] . ': ' . $text['value'] . Tools::nl2br(PHP_EOL);

                            if (isset($customization['datas'][Product::CUSTOMIZE_FILE]))
                                $customization_text .= sprintf(Tools::displayError('%d image(s)'), count($customization['datas'][Product::CUSTOMIZE_FILE])) . Tools::nl2br(PHP_EOL);

                            $customization_quantity = (int)$product['customization_quantity'];

                            $product_var_tpl['customization'][] = array(
                                'customization_text' => $customization_text,
                                'customization_quantity' => $customization_quantity,
                                'quantity' => Tools::displayPrice($customization_quantity * $product_price, $this->context->currency, false)
                            );
                        }
                    }

                    $product_var_tpl_list[] = $product_var_tpl;
                    // Check if is not a virutal product for the displaying of shipping
                    if (!$product['is_virtual'])
                        $virtual_product &= false;
                }
                $product_list_txt = '';
                $product_list_html = '';
                if (count($product_var_tpl_list) > 0) {
                    $product_list_txt = $this->getEmailTemplateContent('product_list.txt', Mail::TYPE_TEXT, $product_var_tpl_list,true);
                    $product_list_html = $this->getEmailTemplateContent('email_product_list.tpl', Mail::TYPE_HTML, $product_var_tpl_list);
                }

                // End list product in Cart:
                // Token
                $token = Tools::encrypt(Tools::passwdGen(8));
                $currency = new Currency($currentCart->id_currency);
                $data = [
                    'shopping_cart_link' => $this->context->link->getModuleLink($this->module->name, 'submit', ['token' => $token, 'verify' => Tools::encrypt($currentCart->id)], (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE')),
                    'recipients_name' => $name,
                    'products' => $product_list_html,
                    'products_txt' => $product_list_txt,
                    'total_products' => CartCore::getTotalCart($currentCart->id, $use_tax_display, Cart::ONLY_PRODUCTS),
                    'total_shipping' => CartCore::getTotalCart($currentCart->id, $use_tax_display, Cart::ONLY_SHIPPING),
                    'product_list' => $product_var_tpl_list,
                    'total' => CartCore::getTotalCart($currentCart->id, $use_tax_display),
                    'total_discount' => $this->context->getCurrentLocale()->formatPrice($currentCart->getDiscountSubtotalWithoutGifts(),$currency->iso_code),
                    'use_tax_display' => $use_tax_display ? $this->module->l('(Tax incl.)', 'submit') : $this->module->l('(Tax excl.)', 'submit'),
                    'forward_mail' => 'mailto:?subject=FW: '.$this->module->l('Shopping cart', 'submit'),
                ];

                // General PDF:
                $pdf = new PDF((object)$data, 'CartPdf', Context::getContext()->smarty);
                $file_attachement = [];
                $file_attachement['content'] = $pdf->render(false);
                $file_attachement['name'] = $name . '-' . sprintf('%06d', $currentCart->id) . '.pdf';
                $file_attachement['mime'] = 'application/pdf';

                // Send via mail to guest:
                $templateVars = [];
                foreach ($data as $key => $item) {
                    if (trim($key) !== 'product_list')
                        $templateVars['{' . $key . '}'] = $item;
                }
                // Send mail:
//                $template = 'shopping_cart';
//                $language = new Language($currentCart->id_lang);
//                $templatePath = $this->module->getLocalPath() . 'mails/';
//                $isoTemplate = $language->iso_code . '/' . $template;
//                $PS_MAIL_TYPE = trim(Configuration::get('PS_MAIL_TYPE'));

//                if (
//                	!file_exists($templatePath . $isoTemplate . '.txt')
//	                && ($PS_MAIL_TYPE == Mail::TYPE_BOTH || $PS_MAIL_TYPE == Mail::TYPE_TEXT)
//                ) {
//	                $isoTemplate = 'en/' . $template;
//                } elseif (
//                	!file_exists($templatePath . $isoTemplate . '.html')
//	                &&($PS_MAIL_TYPE == Mail::TYPE_BOTH ||$PS_MAIL_TYPE == Mail::TYPE_HTML)
//                ) {
//                	$isoTemplate = 'en/' . $template;
//                }

                if (!count($this->errors)) {
                    if (@Mail::Send(
                        (int)$currentCart->id_lang,
                        'shopping_cart',
                        Mail::l('Your friend has just shared his/her cart to you', (int)$currentCart->id_lang),
                        $templateVars,
                        $email,
                        $name,
                        $this->context->customer->email,
                        $this->context->shop->name,
                        $file_attachement, null, $this->module->getLocalPath() . 'mails/'
                    )) {
                        $ids = $this->getIdCartRules($currentCart);
                        // Add log when send mail to guest success!
                        if (!Db::getInstance()->insert('ets_savemycart',
                            [
                                'id_cart' => (int)$currentCart->id,
                                'token' => $token,
                                'cart_rules' => implode(',',$ids),
                            ]
                        )) {
                            $this->errors[] = $this->module->l('Adding log failed.', 'submit');
                        }
                        die(json_encode([
                            'ok' => 1,
                            'msg' => $this->module->l('Mail sent successfully.', 'submit')
                        ]));
                    } else
                        $this->errors[] = $this->module->l('Sending mail failed.', 'submit');
                }
            }
            die(json_encode([
                'errors' => Tools::nl2br(implode(PHP_EOL, $this->errors)),
            ]));
        }

        // Display Error:
        if (count($this->errors)) {
            $this->context->smarty->assign([
                'module' => $this->module->name,
                'errors' => $this->errors,
                'prestashop17' => $this->module->prestashop_17
            ]);
        }
        $this->setTemplate($this->module->prestashop_17 ? 'module:' . $this->module->name . '/views/templates/front/submit.tpl' : 'submit-16.tpl');
    }

    public function getFormattedName($name = false)
    {
        return version_compare(_PS_VERSION_, '1.7.0.0', '>=') ? ImageType::getFormattedName($name) : ImageType::getFormatedName($name);
    }

    protected function getEmailTemplateContent($template_name, $mail_type, $var,$isTxt=false)
    {
        $email_configuration = Configuration::get('PS_MAIL_TYPE');
        if ($email_configuration != $mail_type && $email_configuration != Mail::TYPE_BOTH)
            return '';
        if ($isTxt){
            if (file_exists(($file = $this->module->getLocalPath() . 'mails/' . $this->context->language->iso_code . DIRECTORY_SEPARATOR . $template_name))) {
                $this->context->smarty->assign('list', $var);
                return $this->context->smarty->fetch($file);
            }
        }else{
            if (file_exists(($file = $this->module->getLocalPath() . 'views/templates/front/'. $template_name))) {
                $this->context->smarty->assign('list', $var);
                return $this->context->smarty->fetch($file);
            }
        }
        return '';
    }

    public function updateBoundCartCartRule($id_cart,$ids)
    {
        $this->cartRuleErrros = array();
        if ((int)$id_cart && count($ids)){
            foreach ($ids as $key => $val){
                $cart_rule = EtsScTools::getCartRule((int)($val));
                if ($cart_rule) {
                    if ((int)$cart_rule ['id_customer'] != 0 && (int)$cart_rule['id_customer'] != (int)$this->context->customer->id){
                        $this->cartRuleErrros[] = sprintf($this->module->l('You cannot use this voucher: %s', 'submit'),$cart_rule['code']);
                    }elseif ((int)$cart_rule['quantity'] == 0){
                        $this->cartRuleErrros[] = sprintf($this->module->l('This voucher %s is out of stock', 'submit'),$cart_rule['code']);
                    }else{
                        try {
                            Db::getInstance()->insert('cart_cart_rule',
                                [
                                    'id_cart' => (int)$id_cart,
                                    'id_cart_rule' => (int)$val,
                                ]
                            );
                        } catch (Exception $e){
                            //Do something
                        }
                    }
                }
            }
        }
    }


    public function popupInit(Customer $customer)
    {
        $product_count = (int)$this->context->cart->nbProducts();
        $tpl_var = array(
            'product_count' => $product_count,
            'link_action' => $this->getCurrentURL(),
            'link_checkout' => $this->link_checkout,
            'id_customer' => (int)$this->context->customer->id,
            'link' => EtsScLink::getInstance()->getLinkRewrite($this->context->language->id),
        );
        if (!$customer->id) {
            $tpl_var['openLogin'] = true;
            $this->context->smarty->assign($tpl_var);
            die(json_encode(array(
                'isLogged' => false,
                'html' => $product_count > 0 ? $this->context->smarty->fetch($this->module->getLocalPath() . '/views/templates/front/popup.tpl') : false,
            )));
        }
    }

}