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
require_once   _PS_MODULE_DIR_.'ets_savemycart/classes/EtsScProduct.php';
class EtsSaveCartFrontController extends ModuleFrontController
{
    public $link_checkout;
    public $current_url;

    public function __construct()
    {
        parent::__construct();
    }
    public function submitLogin(&$assigns = array())
    {
        if (!($email = trim(Tools::getValue('email2'))))
            $this->errors[] = $this->module->l('Email is required.', 'cart');
        elseif (!Validate::isEmail($email))
            $this->errors[] = $this->module->l('Invalid email address.', 'cart');
        if (!($passwd = trim(Tools::getValue('passwd2'))))
            $this->errors[] = $this->module->l('Password is required.', 'cart');
        elseif (!Validate::isPlaintextPassword($passwd))
            $this->errors[] = $this->module->l('Invalid password.', 'cart');
        if (!$this->errors) {
            Hook::exec(($this->module->prestashop_17 ? 'actionAuthenticationBefore' : 'actionBeforeAuthentication'));
            $customer = new Customer();
            $authentication = $customer->getByEmail($email, $passwd);
            if (isset($authentication->active) && !$authentication->active) {
                $this->errors[] = $this->module->l('Your account is not available at the moment, please contact us.', 'cart');
            } elseif (!$authentication || !$customer->id || $customer->is_guest) {
                $this->errors[] = $this->module->l('Authentication failed.', 'cart');
            } else {
                $this->updateContext($customer);
                //save shopping cart.
//                $this->submitCart($customer, $assigns);
                $product_count = (int)$this->context->cart->nbProducts();
                $tpl_var = array(
                    'product_count' => $product_count,
                    'link_action' => $this->getCurrentURL(),
                    'link_checkout' => $this->link_checkout,
                    'id_customer' => (int)$this->context->customer->id,
                    'openLogin' => false,
                    'link' => EtsScLink::getInstance()->getLinkRewrite($this->context->language->id),
                );
                $this->context->smarty->assign($tpl_var);
                die(json_encode(array(
                    'isLogged' => true,
                    'html' => $product_count > 0 ? $this->context->smarty->fetch($this->module->getLocalPath() . '/views/templates/front/popup.tpl') : false,
                )));
            }
        }
    }

    public function submitCreate(&$assigns = array())
    {
        //validate fields.
        if (!($first_name = trim(Tools::getValue('firstname3'))))
            $this->errors[] = $this->module->l('First name is required', 'cart');
        elseif (!Validate::isName($first_name))
            $this->errors[] = $this->module->l('First name is invalid', 'cart');
        if (!($last_name = trim(Tools::getValue('lastname3'))))
            $this->errors[] = $this->module->l('Last name is required', 'cart');
        elseif (!Validate::isName($last_name))
            $this->errors[] = $this->module->l('Last name is invalid', 'cart');
        if (!($email = trim(Tools::getValue('email3'))))
            $this->errors[] = $this->module->l('Email is required.', 'cart');
        elseif (!Validate::isEmail($email))
            $this->errors[] = $this->module->l('Invalid email address', 'cart');
        elseif (Customer::customerExists($email))
            $this->errors[] = $this->module->l('Email is already existed.', 'cart');
        if (!($passwd = trim(Tools::getValue('passwd3'))))
            $this->errors[] = $this->module->l('Password is required', 'cart');
        elseif (!Validate::isPasswd($passwd))
            $this->errors[] = $this->module->l('Invalid password', 'cart');
        //if data is validate.
        if (!$this->errors) {
            $customer = new Customer();
            $customer->id_shop = (int)$this->context->shop->id;
            $customer->lastname = $last_name;
            $customer->firstname = $first_name;
            $customer->email = $email;
            $customer->passwd = md5(_COOKIE_KEY_ . $passwd);
            if ($customer->save()) {
                $customer->updateGroup(array(Configuration::get('ETS_SOLO_CUSTOMER_GROUP') != '' ? (int)Configuration::get('ETS_SOLO_CUSTOMER_GROUP') : (int)Configuration::get('PS_CUSTOMER_GROUP')));
                $this->updateContext($customer);
                //save shopping cart.
                $this->submitCart($customer, $assigns);
                if ($this->sendConfirmationMail($customer)) {
                    Hook::exec('actionCustomerAccountAdd', array('_POST' => $_POST, 'newCustomer' => $customer));
                }
            } else
                $this->errors[] = $this->module->l('', 'cart');
        }
    }
    public function submitCart(Customer $customer, &$assigns = array())
    {
        if (!($cart_name = trim(Tools::getValue('cart_name'))))
            $this->errors[] = $this->module->l('Cart name is required.', 'cart');
        elseif (!Validate::isGenericName($cart_name))
            $this->errors[] = $this->module->l('Cart name is invalid.', 'cart');
        elseif (!$this->errors && !$customer->id) {
            $this->errors[] = $this->module->l('Customer login failed.', 'cart');
            $assigns['not_logged'] = 1;
        } elseif (EtsScCart::itemExist($this->context->cart->id)) {
            $this->errors[] = $this->module->l('Shopping cart is saved.', 'cart');
            $assigns['cart_saved'] = 1;
        }
        if (!$this->errors) {
            $id_cart = $this->context->cart->id;
            $group = new Group($customer->id_default_group ?: Group::getCurrent()->id);
            $shopping_cart = new EtsScCart($this->context->cart->id);
            $shopping_cart->id_cart = $this->context->cart->id;
            $shopping_cart->id_customer = $customer->id;
            $shopping_cart->cart_name = $cart_name;
            $shopping_cart->id_currency = $this->context->cart->id_currency;
            $shopping_cart->total = $this->context->cart->getCartTotalPrice();
            $shopping_cart->sub_total = $this->context->cart->getOrderTotal(!$group->price_display_method, Cart::ONLY_PRODUCTS);
            $shopping_cart->total_shipping = $this->context->cart->getOrderTotal(!$group->price_display_method, Cart::ONLY_SHIPPING);
            $shopping_cart->total_tax = $group->price_display_method ? 0 : ($shopping_cart->total - $this->context->cart->getOrderTotal(false));
            $prods = $this->context->cart->getProducts();
            foreach ($prods as $prod) {
                $product = new EtsScProduct();
                $product->id_cart = $id_cart;
                $product->id_product = $prod['id_product'];
                $product->id_address_delivery = $prod['id_address_delivery'];
                $product->id_shop = $prod['id_shop'];
                $product->id_product_attribute = $prod['id_product_attribute'];
                $product->id_customization = $prod['id_customization'];
                $product->quantity = $prod['quantity'];
                $product->add();
            }
            if ($shopping_cart->id && !$shopping_cart->update() || !$shopping_cart->add()) {
                $this->errors[] = $this->module->l('Saving shopping cart failed.', 'cart');
            } else
                $assigns['ok'] = 1;
            if (!$this->errors)
                $assigns['msg'] = $this->module->l('Saved successfully', 'cart');
        }
    }
    public function updateContext(Customer $customer)
    {
        if (!$this->module->prestashop_17) {
            $this->context->cookie->id_compare = isset($this->context->cookie->id_compare) ? $this->context->cookie->id_compare : CompareProduct::getIdCompareByIdCustomer($customer->id);
        }
        $this->context->cookie->id_customer = (int)($customer->id);
        $this->context->cookie->customer_lastname = $customer->lastname;
        $this->context->cookie->customer_firstname = $customer->firstname;
        $this->context->cookie->passwd = $customer->passwd;
        $this->context->cookie->logged = 1;
        $customer->logged = 1;
        $this->context->customer = $customer;
        $this->context->cookie->email = $customer->email;
        $this->context->cookie->is_guest = $customer->isGuest();
        // Add customer to the context
        if (Configuration::get('PS_CART_FOLLOWING') && (empty($this->context->cookie->id_cart) || Cart::getNbProducts($this->context->cookie->id_cart) == 0) && $id_cart = (int)Cart::lastNoneOrderedCart($this->context->customer->id)) {
            $this->context->cart = new Cart($id_cart);
        } else {
            if ($this->module->prestashop_17) {
                $idCarrier = (int)$this->context->cart->id_carrier;
            }
            $this->context->cart->id_carrier = 0;
            $this->context->cart->setDeliveryOption(null);
            if ($this->module->prestashop_17) {
                $this->context->cart->updateAddressId($this->context->cart->id_address_delivery, (int)Address::getFirstCustomerAddressId((int)($customer->id)));
            }
            $this->context->cart->id_address_delivery = (int)Address::getFirstCustomerAddressId((int)($customer->id));
            $this->context->cart->id_address_invoice = (int)Address::getFirstCustomerAddressId((int)($customer->id));
        }
        $this->context->cart->id_customer = (int)$customer->id;
        if (isset($idCarrier) && $idCarrier) {
            $deliveryOption = array($this->cart->id_address_delivery => $idCarrier . ',');
            $this->context->cart->setDeliveryOption($deliveryOption);
        }
        $this->context->cart->secure_key = $customer->secure_key;
        $this->context->cart->save();
        $this->context->cookie->id_cart = (int)$this->context->cart->id;

        if (method_exists($this->context->cookie, 'registerSession') && class_exists('CustomerSession')) {
            $this->context->cookie->registerSession(new CustomerSession());
        }

        $this->context->cookie->write();

        $this->context->cart->autosetProductAddress();
        Hook::exec('actionAuthentication', array('customer' => $customer));

        // Login information have changed, so we check if the cart rules still apply
        CartRule::autoRemoveFromCart($this->context);
        CartRule::autoAddToCart($this->context);
    }
    public function popupInit(Customer $customer){

    }
    protected function getCurrentURL()
    {
        if (!$this->module->prestashop_17)
            return Tools::getCurrentUrlProtocolPrefix() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        return parent::getCurrentURL();
    }
}