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
require_once   _PS_MODULE_DIR_.'ets_savemycart/classes/EtsScLink.php';
require_once(dirname(__FILE__) . '/abstract.php');
class Ets_savemycartCartModuleFrontController extends EtsSaveCartFrontController
{
//    public $link_checkout;
//    public $current_url;

    public function __construct()
    {
        parent::__construct();
        if (!$this->module->prestashop_17) {
            if (isset($this->display_column_right)) $this->display_column_right = false;
            if (isset($this->display_column_left)) $this->display_column_left = false;
        }
    }

    public function initContent()
    {
        parent::initContent();
        $this->link_checkout = $this->context->link->getPageLink($this->module->prestashop_17 ? 'cart' : (Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order'), (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE')) . ($this->module->prestashop_17 ? '?action=show' : '');
        $this->current_url = $this->context->link->getModuleLink($this->module->name, 'cart', array(), (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE'));
        $scTools = new EtsScTools();
        if ((int)Tools::getValue('check_cart') > 0) {
            die(json_encode([
                'product_count' => count($this->context->cart->getProducts(true)) ? 1 : 0,
            ]));
        }

        if ((int)Tools::getValue('shopping_cart_form') > 0) {
            $product_link = '';
            if (isset($this->context->cookie->ets_sc_product_id) && $this->context->cookie->ets_sc_product_id > 0) {
                $p = new Product($this->context->cookie->ets_sc_product_id, false, $this->context->language->id);
                if ($p->id > 0) {
                    $product_link = $this->context->link->getProductLink($p->id, $p->link_rewrite, $p->category, $p->ean13, $this->context->language->id);
                }
            }
            $this->context->smarty->assign([
                'form_url' => $this->context->link->getModuleLink($this->module->name, 'submit', array(), true),
                'shopping_cart_link' => $this->context->link->getPageLink((Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order'), (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE')),
                'product_link' => $product_link ?: $this->context->link->getPageLink('index', true),
                'idCart' => Tools::getValue('id_cart')??'',
            ]);
            die(json_encode([
                'form_html' => $this->context->smarty->fetch($this->module->getLocalPath() . 'views/templates/hook/fo-form.tpl'),
            ]));
        }

        $assigns = array();
        /*---save cart---*/
        if (Tools::isSubmit('init')) {
            $this->popupInit($this->context->customer);
        } elseif (Tools::isSubmit('submitLogin')) {
            $this->submitLogin($assigns);
        } elseif (Tools::isSubmit('submitCreate')) {
            $this->submitCreate($assigns);
        } elseif (Tools::isSubmit('submitCart')) {
            $this->submitCart($this->context->customer, $assigns);
        } elseif (Tools::isSubmit('displayShoppingCart')) {
            $this->displayShoppingCart((int)Tools::getValue('id_cart'));
        } elseif (Tools::isSubmit('loadCart')) {
            $this->loadCart((int)Tools::getValue('id_cart'), $assigns);
        } elseif (Tools::isSubmit('deleteCart')) {
            $this->deleteCart((int)Tools::getValue('id_cart'));
        } elseif (Tools::isSubmit('checkout')) {
            if (!($verify = trim(Tools::getValue('verify')))) {
                $this->errors[] = $this->module->l('Verification is required', 'cart');
            } elseif (!($id_cart = (int)Tools::getValue('id_cart'))) {
                $this->errors[] = $this->module->l('Cart ID is required', 'cart');
            } elseif (!Validate::isCleanHtml($verify) || $this->module->encrypt($id_cart) != $verify) {
                $this->errors[] = $this->module->l('Invalid verification', 'cart');
            } else
                $this->cartRecover($id_cart);
        } elseif (Tools::isSubmit('offCart')) {
            $this->context->cookie->off_cart = (int)$this->context->cart->id;
            $this->context->cookie->write();
            die(json_encode(array('off_cart' => $this->context->cookie->off_cart,)));
        }
        /*---end save cart---*/
        if ($this->errors)
            $assigns['errors'] = $this->module->displayError($this->errors);
        if ((int)Tools::getValue('ajax'))
            die(json_encode($assigns));

        if (!$this->context->customer->isLogged())
            Tools::redirectLink($this->context->link->getPageLink('index', (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE')));

        /*---assign--*/
        $title = $this->module->l('My shopping carts', 'cart');
        $assigns['page'] = array(
            'title' => $title,
            'canonical' => $this->module->prestashop_17 ? $this->getCanonicalURL() : '',
            'meta' => array(
                'title' => $title,
                'description' => '',
                'keywords' => '',
                'robots' => 'index',
            ),
            'page_name' => 'cart',
            'body_classes' => array('my-saved-cart'),
            'admin_notifications' => array(),
        );
        $assigns['carts'] = $this->getShoppingCarts();
        if (!$this->module->prestashop_17) {
            $assigns['breadcrumb'] = ($breadcrumb = $this->getBreadcrumb());
            $assigns['path'] = $breadcrumb;
        }
        $this->context->smarty->assign($assigns);
        /*--end assign---*/

        /*---set template---*/
        $this->setTemplate(($this->module->prestashop_17 ? 'module:' . $this->module->name . '/views/templates/front/' : '') . 'shopping-cart' . ($this->module->prestashop_17 ? '' : '-16') . '.tpl');

    }

    public function deleteCart($id_cart, &$assigns = array())
    {
        if (!$id_cart) {
            $this->errors[] = $this->module->l('Cart does not exist!', 'cart');
        } else {
            try {
                $shopping_cart = new EtsScCart($id_cart);
                $sql = 'DELETE FROM `'._DB_PREFIX_.'ets_savemycart_cart_product` WHERE id_cart = '.(int)$id_cart;
                if ($shopping_cart->delete() && Db::getInstance()->execute($sql)) {

                    $this->success[] = $this->module->l('Item has been deleted', 'cart');
                }
            } catch (PrestaShopDatabaseException $e) {
                $this->errors[] = $e->getMessage();
            } catch (PrestaShopException $e) {
                $this->errors[] = $e->getMessage();
            }
        }
    }

    /*---renderList--*/
    public function getShoppingCarts()
    {
        if ($result = EtsScCart::getShoppingCarts($this->context)) {
            $currentURL = $this->current_url . (strpos('?', $this->current_url) ? '&' : '?');
            foreach ($result as &$c) {
                $cart = new Cart((int)$c['id_cart']);
                $c['total'] = ((int)$c['id_currency'] == $this->context->currency->id) ? Tools::displayPrice($c['total'],$this->context->currency) : Tools::displayPrice((float)($this->context->currency->conversion_rate * $c['total']),$this->context->currency);
                $c['view_url'] = $currentURL . 'displayShoppingCart&id_cart=' . $cart->id;
                $c['load_cart_url'] = $currentURL . 'loadCart&id_cart=' . $cart->id;
                $c['delete_url'] = $currentURL . 'deleteCart&id_cart=' . $cart->id;
//                $products = $cart->getProducts();
                $products = EtsScProduct::getCartProducts($c['id_cart'],$this->context->language->id);
                foreach ($products as &$product) {
                    $p = new Product($product['id_product'], true, $cart->id_lang, $cart->id_shop);
                    if ($p->id) {
                        $product['link'] = $this->context->link->getProductLink($product, null, null, null, null, null, $product['id_product_attribute'] ? $product['id_product_attribute'] : 0);
                        $product['name'] = $p->name;
                        $image = ($product['id_product_attribute'] && ($image = EtsScTools::getCombinationImageById($product['id_product_attribute'], $cart->id_lang))) ? $image : Product::getCover($product['id_product']);
                        $product['image'] = $this->context->link->getImageLink($p->link_rewrite, isset($image['id_image']) ? $image['id_image'] : 0, $this->module->getFormattedName('cart'));
                    }
                }
                $c['products'] = $products;
            }
        }
        return $result;
    }

    public function displayShoppingCart($id_cart)
    {
        if (!$id_cart)
            $this->errors[] = $this->module->l('Cart is empty.', 'cart');
        if (!$this->errors) {
            /*---init---*/
            $context = Context::getContext();
            $cart = new Cart($id_cart);
            $sc = new EtsScCart($id_cart);
            $customer = new Customer($sc->id_customer);
            $currency = Currency::getCurrencyInstance($sc->id_currency ?: Configuration::get('PS_CURRENCY_DEFAULT'));
            $group = new Group($customer->id_default_group ?: Group::getCurrent()->id);
            /*---end init---*/

//            $sub_total = Tools::convertPrice($cart->getOrderTotal(!$group->price_display_method, Cart::ONLY_PRODUCTS), $currency);
            $sub_total = $sc->id_currency == $currency->id ? $sc->sub_total : Tools::convertPrice($sc->sub_total, $currency);
            $total_shipping = $sc->id_currency == $currency->id ? $sc->total_shipping : Tools::convertPrice($sc->total_shipping, $currency);
            $total = $sc->id_currency == $currency->id ? $sc->total : Tools::convertPrice($sc->total, $currency);
            $total_tax = $sc->id_currency== $currency->id ? $sc->total_tax : Tools::convertPrice($sc->total_tax, $currency);
            $products = EtsScProduct::getCartProducts($id_cart,$this->context->language->id);
            if ($products) {
                foreach ($products as &$product) {
                    $p = new Product((int)$product['id_product'], false, $cart->id_lang);
                    $product['link'] = $context->link->getProductLink($product, null, null, null, null, null, $product['id_product_attribute'] ? $product['id_product_attribute'] : 0);
                    $image = ($product['id_product_attribute'] && ($image = EtsScTools::getCombinationImageById($product['id_product_attribute'], $cart->id_lang))) ? $image : Product::getCover($product['id_product']);
                    $product['image'] = $context->link->getImageLink($p->link_rewrite, isset($image['id_image']) ? $image['id_image'] : 0, $this->module->getFormattedName('cart'));
                    $product['price'] = Tools::displayPrice(Tools::convertPrice($product['price'], $currency), $currency);
                    $product['total'] = Tools::displayPrice(Tools::convertPrice($product['price'], $currency), $currency);
                }
            }
//            $shopping_cart = new EtsScCart($id_cart);
            /*--assign---*/
            $assign = array(
                'use_tax' => $group->price_display_method,
                'products' => $products,
                'sub_total' => Tools::displayPrice($sub_total, $currency),
                'total_shipping' => $total_shipping ? Tools::displayPrice($total_shipping, $currency) : 0,
                'total_tax' => $total_tax ? Tools::displayPrice($total_tax, $currency) : 0,
                'total' => Tools::displayPrice($total, $currency),
                'load_cart_url' => ($currentUrl = $this->current_url . (strpos('?', $this->current_url) ? '&' : '?')) . 'loadCart&id_cart=' . $id_cart,
                'delete_url' => $currentUrl . 'deleteCart&id_cart=' . $id_cart,
                'shopping_cart' => $sc,
            );
            $this->context->smarty->assign('cart', $assign);
            /*---end assign---*/


            die(json_encode(array(
                'html' => $this->context->smarty->fetch($this->module->getLocalPath() . 'views/templates/front/cart-details.tpl'),
            )));
        }
    }


    public function cartRecover($id_cart)
    {
        $cart = new Cart((int)$id_cart);
        if (!Validate::isLoadedObject($cart)) {
            $this->errors[] = $this->module->l('Cart does not exist!', 'cart');
        } else {
            $customer = new Customer((int)$cart->id_customer);
            if ($customer->id && $this->context->customer->isLogged($this->guestAllowed) && $this->context->customer->email !== $customer->email)
                Tools::redirectLink($this->link_checkout);
            elseif ($customer->id && !$this->context->customer->isLogged($this->guestAllowed)) {
                $this->context->cookie->recover_cart_id = $cart->id;
                $this->context->cookie->write();
                Tools::redirect('index.php?controller=authentication' . ($this->authRedirection ? '&back=' . $this->authRedirection : ''));
            } else
                $this->loadCart($cart->id);
        }
    }

    public function loadCart($id_cart, &$assigns = array())
    {
        if (!$id_cart) {
            $this->errors[] = $this->module->l('Cart does not exist!', 'cart');
        } else {
        	if ($this->context->cart && $this->context->cart->id == $id_cart)
		        Tools::redirectLink($this->link_checkout);
            $this->context->cart = new Cart($id_cart);
            $this->context->cookie->id_cart = (int)$this->context->cart->id;
            $this->context->cart->autosetProductAddress();
            // Login information have changed, so we check if the cart rules still apply
            $products = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM `' . _DB_PREFIX_ . 'ets_savemycart_cart_product` WHERE `id_cart` = ' . (int)$id_cart);
            $id_address_delivery = Configuration::get('PS_ALLOW_MULTISHIPPING') ? $this->context->cart->id_address_delivery : 0;
            $product_gift = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT cr.`gift_product`, cr.`gift_product_attribute` FROM `' . _DB_PREFIX_ . 'cart_rule` cr LEFT JOIN `' . _DB_PREFIX_ . 'order_cart_rule` ocr ON (ocr.`id_order` = ' . (int)$id_cart . ') WHERE ocr.`id_cart_rule` = cr.`id_cart_rule`');

            foreach ($products as $product) {
                if ($id_address_delivery)
                    if (Customer::customerHasAddress((int)$this->context->cart->id_customer, $product['id_address_delivery']))
                        $id_address_delivery = $product['id_address_delivery'];

                foreach ($product_gift as $gift)
                    if (isset($gift['gift_product']) && isset($gift['gift_product_attribute']) && (int)$gift['gift_product'] == (int)$product['id_product'] && (int)$gift['gift_product_attribute'] == (int)$product['id_product_attribute'])
                        $product['quantity'] = (int)$product['quantity'] - 1;

                $this->context->cart->updateQty(
                    0,
                    (int)$product['id_product'],
                    (int)$product['id_product_attribute'],
                    null,
                    'up',
                    (int)$id_address_delivery,
                    new Shop((int)$this->context->cart->id_shop),
                    false
                );
            }
            CartRule::autoRemoveFromCart($this->context);
            CartRule::autoAddToCart($this->context);
            $this->context->cookie->write();
            if (!(int)Tools::getValue('ajax'))
                Tools::redirectLink($this->link_checkout);
            $assigns['link_checkout'] = $this->link_checkout;
        }
    }
    /*---end renderList--*/

    /*---breadcrumb---*/

    public function getBreadcrumb()
    {
        $breadcrumb = $this->getBreadcrumbLinks();
        $breadcrumb['count'] = count($breadcrumb['links']);
        if ($this->module->prestashop_17)
            return $breadcrumb;
        else
            return $this->displayBreadcrumb($breadcrumb);
    }

    public function displayBreadcrumb($breadcrumb)
    {
        $this->context->smarty->assign('breadcrumb', $breadcrumb);
        return $this->context->smarty->fetch($this->module->getLocalPath() . '/views/templates/front/breadcrumb.tpl');
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = array();
        if ($this->module->prestashop_17) {
            $breadcrumb['links'][] = array(
                'title' => $this->module->l('Home', 'cart'),
                'url' => $this->context->link->getPageLink('index', true),
            );
        }
        $breadcrumb['links'][] = array(
            'title' => $this->module->l('My account', 'cart'),
            'url' => $this->context->link->getPageLink('my-account', true),
        );
        if (trim(Tools::getValue('controller')) === 'cart') {
            $breadcrumb['links'][] = array(
                'title' => $this->module->l('My shopping carts', 'cart'),
                'url' => $this->context->link->getModuleLink($this->module->name, 'cart', array(), (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE')),
            );
        }
        return $breadcrumb;
    }

    /*---end breadcrumb---*/

    /*---methods register and login customer---*/

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
        if ($customer->id){
            $tpl_var['openLogin'] = false;
            $this->context->smarty->assign($tpl_var);
            die(json_encode(array(
                'isLogged' => true,
                'html' => $product_count > 0 ? $this->context->smarty->fetch($this->module->getLocalPath() . '/views/templates/front/popup.tpl') : false,
            )));
        }else {
            $tpl_var['openLogin'] = true;
            $tpl_var['link_register'] = $this->context->link->getPageLink('authentication', (int)Configuration::get('PS_SSL_ENABLED_EVERYWHERE'));
            $this->context->smarty->assign($tpl_var);
            die(json_encode(array(
                'isLogged' => false,
                'html' => $product_count > 0 ? $this->context->smarty->fetch($this->module->getLocalPath() . '/views/templates/front/popup.tpl') : false,
            )));
        }

    }

//    protected function getCurrentURL()
//    {
//        if (!$this->module->prestashop_17)
//            return Tools::getCurrentUrlProtocolPrefix() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//        return parent::getCurrentURL();
//    }

//    public function submitLogin(&$assigns = array())
//    {
//        if (!($email = trim(Tools::getValue('email2'))))
//            $this->errors[] = $this->module->l('Email is required.', 'cart');
//        elseif (!Validate::isEmail($email))
//            $this->errors[] = $this->module->l('Invalid email address.', 'cart');
//        if (!($passwd = trim(Tools::getValue('passwd2'))))
//            $this->errors[] = $this->module->l('Password is required.', 'cart');
//        elseif (!Validate::isPasswd($passwd))
//            $this->errors[] = $this->module->l('Invalid password.', 'cart');
//        if (!$this->errors) {
//            Hook::exec(($this->module->prestashop_17 ? 'actionAuthenticationBefore' : 'actionBeforeAuthentication'));
//            $customer = new Customer();
//            $authentication = $customer->getByEmail($email, $passwd);
//            if (isset($authentication->active) && !$authentication->active) {
//                $this->errors[] = $this->module->l('Your account is not available at the moment, please contact us.', 'cart');
//            } elseif (!$authentication || !$customer->id || $customer->is_guest) {
//                $this->errors[] = $this->module->l('Authentication failed.', 'cart');
//            } else {
//                $this->updateContext($customer);
//                //save shopping cart.
////                $this->submitCart($customer, $assigns);
//                $product_count = (int)$this->context->cart->nbProducts();
//                $tpl_var = array(
//                    'product_count' => $product_count,
//                    'link_action' => $this->getCurrentURL(),
//                    'link_checkout' => $this->link_checkout,
//                    'id_customer' => (int)$this->context->customer->id,
//                    'openLogin' => false,
//                    'link' => EtsScLink::getInstance()->getLinkRewrite($this->context->language->id),
//                );
//                $this->context->smarty->assign($tpl_var);
//                die(json_encode(array(
//                    'isLogged' => true,
//                    'html' => $product_count > 0 ? $this->context->smarty->fetch($this->module->getLocalPath() . '/views/templates/front/popup.tpl') : false,
//                )));
//            }
//        }
//    }

//    public function submitCreate(&$assigns = array())
//    {
//        //validate fields.
//        if (!($first_name = trim(Tools::getValue('firstname3'))))
//            $this->errors[] = $this->module->l('First name is required', 'cart');
//        elseif (!Validate::isName($first_name))
//            $this->errors[] = $this->module->l('First name is invalid', 'cart');
//        if (!($last_name = trim(Tools::getValue('lastname3'))))
//            $this->errors[] = $this->module->l('Last name is required', 'cart');
//        elseif (!Validate::isName($last_name))
//            $this->errors[] = $this->module->l('Last name is invalid', 'cart');
//        if (!($email = trim(Tools::getValue('email3'))))
//            $this->errors[] = $this->module->l('Email is required.', 'cart');
//        elseif (!Validate::isEmail($email))
//            $this->errors[] = $this->module->l('Invalid email address', 'cart');
//        elseif (Customer::customerExists($email))
//            $this->errors[] = $this->module->l('Email is already existed.', 'cart');
//        if (!($passwd = trim(Tools::getValue('passwd3'))))
//            $this->errors[] = $this->module->l('Password is required', 'cart');
//        elseif (!Validate::isPasswd($passwd))
//            $this->errors[] = $this->module->l('Invalid password', 'cart');
//        //if data is validate.
//        if (!$this->errors) {
//            $customer = new Customer();
//            $customer->id_shop = (int)$this->context->shop->id;
//            $customer->lastname = $last_name;
//            $customer->firstname = $first_name;
//            $customer->email = $email;
//            $customer->passwd = md5(_COOKIE_KEY_ . $passwd);
//            if ($customer->save()) {
//                $customer->updateGroup(array(Configuration::get('ETS_SOLO_CUSTOMER_GROUP') != '' ? (int)Configuration::get('ETS_SOLO_CUSTOMER_GROUP') : (int)Configuration::get('PS_CUSTOMER_GROUP')));
//                $this->updateContext($customer);
//                //save shopping cart.
//                $this->submitCart($customer, $assigns);
//                if ($this->sendConfirmationMail($customer)) {
//                    Hook::exec('actionCustomerAccountAdd', array('_POST' => $_POST, 'newCustomer' => $customer));
//                }
//            } else
//                $this->errors[] = $this->module->l('', 'cart');
//        }
//    }

//    public function submitCart(Customer $customer, &$assigns = array())
//    {
//        if (!($cart_name = trim(Tools::getValue('cart_name'))))
//            $this->errors[] = $this->module->l('Cart name is required.', 'cart');
//        elseif (!Validate::isGenericName($cart_name))
//            $this->errors[] = $this->module->l('Cart name is invalid.', 'cart');
//        elseif (!$this->errors && !$customer->id) {
//            $this->errors[] = $this->module->l('Customer login failed.', 'cart');
//            $assigns['not_logged'] = 1;
//        } elseif (EtsScCart::itemExist($this->context->cart->id)) {
//            $this->errors[] = $this->module->l('Shopping cart is saved.', 'cart');
//            $assigns['cart_saved'] = 1;
//        }
//        if (!$this->errors) {
//            $shopping_cart = new EtsScCart($this->context->cart->id);
//            $shopping_cart->id_cart = $this->context->cart->id;
//            $shopping_cart->id_customer = $customer->id;
//            $shopping_cart->cart_name = $cart_name;
//            if ($shopping_cart->id && !$shopping_cart->update() || !$shopping_cart->add()) {
//                $this->errors[] = $this->module->l('Saving shopping cart failed.', 'cart');
//            } else
//                $assigns['ok'] = 1;
//            if (!$this->errors)
//                $assigns['msg'] = $this->module->l('Saved successfully', 'cart');
//        }
//    }

    public function sendConfirmationMail(Customer $customer)
    {
        if ($customer->is_guest || !Configuration::get('PS_CUSTOMER_CREATION_EMAIL')) {
            return true;
        }
        return Mail::Send(
            $this->context->language->id,
            'account',
            $this->module->l('Welcome!', 'cart'),
            array(
                '{firstname}' => $customer->firstname,
                '{lastname}' => $customer->lastname,
                '{email}' => $customer->email,
            ),
            $customer->email,
            $customer->firstname . ' ' . $customer->lastname
        );
    }

//    public function updateContext(Customer $customer)
//    {
//        if (!$this->module->prestashop_17) {
//            $this->context->cookie->id_compare = isset($this->context->cookie->id_compare) ? $this->context->cookie->id_compare : CompareProduct::getIdCompareByIdCustomer($customer->id);
//        }
//        $this->context->cookie->id_customer = (int)($customer->id);
//        $this->context->cookie->customer_lastname = $customer->lastname;
//        $this->context->cookie->customer_firstname = $customer->firstname;
//        $this->context->cookie->passwd = $customer->passwd;
//        $this->context->cookie->logged = 1;
//        $customer->logged = 1;
//        $this->context->customer = $customer;
//        $this->context->cookie->email = $customer->email;
//        $this->context->cookie->is_guest = $customer->isGuest();
//        // Add customer to the context
//        if (Configuration::get('PS_CART_FOLLOWING') && (empty($this->context->cookie->id_cart) || Cart::getNbProducts($this->context->cookie->id_cart) == 0) && $id_cart = (int)Cart::lastNoneOrderedCart($this->context->customer->id)) {
//            $this->context->cart = new Cart($id_cart);
//        } else {
//            if ($this->module->prestashop_17) {
//                $idCarrier = (int)$this->context->cart->id_carrier;
//            }
//            $this->context->cart->id_carrier = 0;
//            $this->context->cart->setDeliveryOption(null);
//            if ($this->module->prestashop_17) {
//                $this->context->cart->updateAddressId($this->context->cart->id_address_delivery, (int)Address::getFirstCustomerAddressId((int)($customer->id)));
//            }
//            $this->context->cart->id_address_delivery = (int)Address::getFirstCustomerAddressId((int)($customer->id));
//            $this->context->cart->id_address_invoice = (int)Address::getFirstCustomerAddressId((int)($customer->id));
//        }
//        $this->context->cart->id_customer = (int)$customer->id;
//        if (isset($idCarrier) && $idCarrier) {
//            $deliveryOption = array($this->cart->id_address_delivery => $idCarrier . ',');
//            $this->context->cart->setDeliveryOption($deliveryOption);
//        }
//        $this->context->cart->secure_key = $customer->secure_key;
//        $this->context->cart->save();
//        $this->context->cookie->id_cart = (int)$this->context->cart->id;
//
//        if (method_exists($this->context->cookie, 'registerSession') && class_exists('CustomerSession')) {
//            $this->context->cookie->registerSession(new CustomerSession());
//        }
//
//        $this->context->cookie->write();
//
//        $this->context->cart->autosetProductAddress();
//        Hook::exec('actionAuthentication', array('customer' => $customer));
//
//        // Login information have changed, so we check if the cart rules still apply
//        CartRule::autoRemoveFromCart($this->context);
//        CartRule::autoAddToCart($this->context);
//    }

    /*---end---*/
}