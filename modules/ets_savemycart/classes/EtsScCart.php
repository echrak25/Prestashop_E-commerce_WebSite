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

class EtsScCart extends ObjectModel
{
    public $id_cart;
    public $id_customer;
    public $id_currency;
    public $cart_name;
    public $total;
    public $sub_total;
    public $total_shipping;
    public $total_tax;
    public $date_add;
    public static $definition = array(
        'table' => 'ets_savemycart_cart',
        'primary' => 'id_cart',
        'fields' => array(
            'id_cart' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_customer' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_currency' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'cart_name' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'required' => true, 'size' => 255),
            'total' => array('type' => self::TYPE_STRING),
            'sub_total' => array('type' => self::TYPE_STRING),
            'total_shipping' => array('type' => self::TYPE_STRING),
            'total_tax' => array('type' => self::TYPE_STRING),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        )
    );

    public static function itemExist($id_cart)
    {
        return (int)Db::getInstance()->getValue('SELECT id_cart FROM `' . _DB_PREFIX_ . 'ets_savemycart_cart` WHERE id_cart =' . (int)$id_cart);
    }

    public static function getShoppingCarts(Context $context = null)
    {
        if (!$context) {
            $context = Context::getContext();
        }
        $sql = '
            SELECT sc.id_cart,sc.total,sc.id_currency, sc.cart_name, cart.date_upd 
            FROM `' . _DB_PREFIX_ . 'ets_savemycart_cart` sc
                LEFT JOIN `' . _DB_PREFIX_ . 'cart` cart ON (cart.id_cart = sc.id_cart)
                LEFT JOIN `' . _DB_PREFIX_ . 'orders` o ON (o.id_cart = cart.id_cart)
            WHERE o.id_order is NULL AND cart.id_cart is NOT NULL 
                AND cart.id_shop = ' . (int)$context->shop->id . ' 
                AND cart.id_lang = ' . (int)$context->language->id . '
                AND sc.id_customer = ' . (int)$context->customer->id . '
        ';

        return Db::getInstance()->executeS($sql);
    }

    public static function getVerify($token, $verify)
    {
        $exToken = array();
        $cart = Db::getInstance()->getRow('
            SELECT * 
            FROM `' . _DB_PREFIX_ . 'ets_savemycart` 
            WHERE token=\'' . pSQL($token) . '\' AND MD5(CONCAT(\'' . _COOKIE_KEY_ . '\', id_cart))=\'' . pSQL($verify) . '\'
        ');
        if (empty($cart)){
                $exToken = Db::getInstance()->getRow('
                SELECT * 
                FROM `' . _DB_PREFIX_ . 'ets_savemycart_expired_token` 
                WHERE token=\'' . pSQL($token) . '\'');
        }
        if (!empty($exToken)){
            return array('invalidToken' => false,'expiredToken' => true,'cart'=>$cart);
        }elseif(empty($cart)){
            return array('invalidToken' => true,'expiredToken' => false,'cart'=>$cart);
        }
        return array('invalidToken' => false,'expiredToken' => false,'cart'=>$cart);
    }

    public static function getBindingCart($id)
    {
        if (!$id || !Validate::isUnsignedInt($id)) {
            return false;
        }
        return Db::getInstance()->executeS('SELECT * FROM `' . _DB_PREFIX_ . 'ets_savemycart_binding` WHERE id_ets_savemycart=' . (int)$id);
    }
    public static function getClickCount($id)
    {
        if (!$id || !Validate::isUnsignedInt($id)) {
            return false;
        }
        return Db::getInstance()->executeS('SELECT * FROM `' . _DB_PREFIX_ . 'ets_savemycart_count` WHERE id_ets_savemycart=' . (int)$id);
    }
    /**
     * @param $from_cart CartCore
     * @param $to_cart CartCore
     * @return bool|int
     */
    public static function copyCart($from_cart, &$to_cart)
    {
        $success = true;
        $products = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM `' . _DB_PREFIX_ . 'ets_savemycart_cart_product` WHERE `id_cart` = ' . (int)$from_cart->id);
        if (!$products || !count($products)) {
        	$products = $from_cart->getProducts();
        }
        $product_gift = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT cr.`gift_product`, cr.`gift_product_attribute` FROM `' . _DB_PREFIX_ . 'cart_rule` cr LEFT JOIN `' . _DB_PREFIX_ . 'order_cart_rule` ocr ON (ocr.`id_order` = ' . (int)$from_cart->id . ') WHERE ocr.`id_cart_rule` = cr.`id_cart_rule`');
        $id_address_delivery = Configuration::get('PS_ALLOW_MULTISHIPPING') ? $to_cart->id_address_delivery : 0;
	    $ETS_SC_BINDING_CART = trim(Configuration::get('ETS_SC_BINDING_CART'));
	    if ($ETS_SC_BINDING_CART === 'override') {
	    	$products_in_cart_to = $to_cart->getProducts(false, false, null, false);
		    foreach ($products_in_cart_to as $prod) {
			    $to_cart->deleteProduct(
				    $prod['id_product']
				    , $prod['id_product_attribute'] ?: null
				    , $prod['id_customization'] ?: null
				    , $prod['id_address_delivery'] ?: 0
			    );
		    }
	    }
	    foreach ($products as $product) {
		    if ($id_address_delivery)
			    if (Customer::customerHasAddress((int)$to_cart->id_customer, $product['id_address_delivery']))
				    $id_address_delivery = $product['id_address_delivery'];
		    $quantity = $product['quantity'];
			if (isset($product['cart_quantity']))
				$quantity = $product['cart_quantity'];
		    foreach ($product_gift as $gift)
			    if (isset($gift['gift_product']) && isset($gift['gift_product_attribute']) && (int)$gift['gift_product'] == (int)$product['id_product'] && (int)$gift['gift_product_attribute'] == (int)$product['id_product_attribute'])
				    $quantity = (int)$quantity - 1;
		    $success &= $to_cart->updateQty(
			    (int)$quantity,
			    (int)$product['id_product'],
			    (int)$product['id_product_attribute'],
			    null,
			    'up',
			    (int)$id_address_delivery,
			    new Shop((int)$from_cart->id_shop),
			    false
		    );
	    }
        // Customized products
        $customs = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT *
			FROM `' . _DB_PREFIX_ . 'customization` c
			LEFT JOIN `' . _DB_PREFIX_ . 'customized_data` cd ON cd.id_customization = c.id_customization
			WHERE c.id_cart = ' . (int)$from_cart->id
        );
        // Get datas from customization table
        $customs_by_id = array();
        foreach ($customs as $custom) {
            if (!isset($customs_by_id[$custom['id_customization']]))
                $customs_by_id[$custom['id_customization']] = array(
                    'id_product_attribute' => $custom['id_product_attribute'],
                    'id_product' => $custom['id_product'],
                    'quantity' => $custom['quantity']
                );
        }

        // Insert new customizations
        $custom_ids = array();
        foreach ($customs_by_id as $customization_id => $val) {
            Db::getInstance()->insert(
                'customization',
                [
                    'id_cart' => (int)$to_cart->id,
                    'id_product_attribute' => (int)$val['id_product_attribute'],
                    'id_product' => (int)$val['id_product'],
                    'id_address_delivery' => (int)$id_address_delivery,
                    'quantity' => (int)$val['quantity'],
                    'quantity_refunded' => 0,
                    'quantity_returned' => 0,
                    'in_cart' => 1,
                ]
            );
            $custom_ids[$customization_id] = Db::getInstance(_PS_USE_SQL_SLAVE_)->Insert_ID();
        }
        // Insert customized_data
        if (count($customs)) {
            $first = true;
            $sql_custom_data = 'INSERT INTO `' . _DB_PREFIX_ . 'customized_data` (`id_customization`, `type`, `index`, `value`) VALUES ';
            foreach ($customs as $custom) {
                if (!$first)
                    $sql_custom_data .= ',';
                else
                    $first = false;

                $sql_custom_data .= '(' . (int)$custom_ids[$custom['id_customization']] . ', ' . (int)$custom['type'] . ', ' .
                    (int)$custom['index'] . ', \'' . pSQL($custom['value']) . '\')';
            }
            Db::getInstance()->execute($sql_custom_data);
        }
        return $success;
    }

    public function getProductsInCart() {
	    $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'ets_savemycart_cart_product` WHERE id_cart=' . (int)$this->id_cart;
	    return Db::getInstance()->executeS($sql);
    }

    public function deleteProductsInCart() {
    	$sql = 'DELETE FROM `' . _DB_PREFIX_ . 'ets_savemycart_cart_product` WHERE id_cart=' . (int)$this->id_cart;
	    return Db::getInstance()->execute($sql);
    }
}