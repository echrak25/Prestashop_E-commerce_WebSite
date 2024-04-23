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

class EtsScProduct extends ObjectModel {
    public $id_cart;
    public $id_product;
    public $id_address_delivery;
    public $id_shop;
    public $id_product_attribute;
    public $id_customization;
    public $quantity;
    public $date_add;
    public static $definition = array(
        'table' => 'ets_savemycart_cart_product',
        'primary' => 'id_cart',
        'fields' => array(
            'id_cart' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_product' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_address_delivery' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_product_attribute' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_customization' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'quantity' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        )
    );
    public static function getCartProducts($id_cart,$id_lang){
        $context = Context::getContext();
        $sql = new DbQuery();
        $sql->select('cp.`id_product_attribute`, cp.`id_product`, cp.`quantity` AS cart_quantity, cp.id_shop, cp.`id_customization`, pl.`name`, p.`is_virtual`,
                        pl.`description_short`, pl.`available_now`, pl.`available_later`, product_shop.`id_category_default`, p.`id_supplier`,
                        p.`id_manufacturer`, m.`name` AS manufacturer_name, product_shop.`on_sale`, product_shop.`ecotax`, product_shop.`additional_shipping_cost`,
                        product_shop.`available_for_order`, product_shop.`show_price`, product_shop.`price`, product_shop.`active`, product_shop.`unity`, product_shop.`unit_price_ratio`,
                        stock.`quantity` AS quantity_available, p.`width`, p.`height`, p.`depth`, stock.`out_of_stock`, p.`weight`,
                        p.`available_date`, p.`date_add`, p.`date_upd`, IFNULL(stock.quantity, 0) as quantity, pl.`link_rewrite`, cl.`link_rewrite` AS category,
                        CONCAT(LPAD(cp.`id_product`, 10, 0), LPAD(IFNULL(cp.`id_product_attribute`, 0), 10, 0), IFNULL(cp.`id_address_delivery`, 0), IFNULL(cp.`id_customization`, 0)) AS unique_id, cp.id_address_delivery,
                        product_shop.advanced_stock_management, ps.product_supplier_reference supplier_reference');
        $sql->from('ets_savemycart_cart_product', 'cp');

        $sql->leftJoin('product', 'p', 'p.`id_product` = cp.`id_product`');
        $sql->innerJoin('product_shop', 'product_shop', '(product_shop.`id_shop` = cp.`id_shop` AND product_shop.`id_product` = p.`id_product`)');
        $sql->leftJoin(
            'product_lang',
            'pl',
            'p.`id_product` = pl.`id_product`
            AND pl.`id_lang` = ' . (int) $id_lang
        );

        $sql->leftJoin(
            'category_lang',
            'cl',
            'product_shop.`id_category_default` = cl.`id_category`
            AND cl.`id_lang` = ' . (int) $id_lang
        );

        $sql->leftJoin('product_supplier', 'ps', 'ps.`id_product` = cp.`id_product` AND ps.`id_product_attribute` = cp.`id_product_attribute` AND ps.`id_supplier` = p.`id_supplier`');
        $sql->leftJoin('manufacturer', 'm', 'm.`id_manufacturer` = p.`id_manufacturer`');

        $sql->join(Product::sqlStock('cp', 'cp'));

        $sql->where('cp.`id_cart` = ' . (int) $id_cart);
        $sql->where('p.`id_product` IS NOT NULL');

        $sql->orderBy('cp.`date_add`, cp.`id_product`, cp.`id_product_attribute` ASC');

        if (Customization::isFeatureActive()) {
            $sql->select('cu.`id_customization`, cu.`quantity` AS customization_quantity');
            $sql->leftJoin(
                'customization',
                'cu',
                'p.`id_product` = cu.`id_product` AND cp.`id_product_attribute` = cu.`id_product_attribute` AND cp.`id_customization` = cu.`id_customization` AND cu.`id_cart` = ' . (int) $id_cart
            );
            $sql->groupBy('cp.`id_product_attribute`, cp.`id_product`, cp.`id_shop`, cp.`id_customization`');
        } else {
            $sql->select('NULL AS customization_quantity, NULL AS id_customization');
        }


        if (Combination::isFeatureActive()) {
            $sql->select('
                product_attribute_shop.`price` AS price_attribute, product_attribute_shop.`ecotax` AS ecotax_attr,
                IF (IFNULL(pa.`reference`, \'\') = \'\', p.`reference`, pa.`reference`) AS reference,
                (p.`weight`+ pa.`weight`) weight_attribute,
                IF (IFNULL(pa.`ean13`, \'\') = \'\', p.`ean13`, pa.`ean13`) AS ean13,
                IF (IFNULL(pa.`isbn`, \'\') = \'\', p.`isbn`, pa.`isbn`) AS isbn,
                IF (IFNULL(pa.`upc`, \'\') = \'\', p.`upc`, pa.`upc`) AS upc,
                IF (IFNULL(pa.`mpn`, \'\') = \'\', p.`mpn`, pa.`mpn`) AS mpn,
                IFNULL(product_attribute_shop.`minimal_quantity`, product_shop.`minimal_quantity`) as minimal_quantity,
                IF(product_attribute_shop.wholesale_price > 0,  product_attribute_shop.wholesale_price, product_shop.`wholesale_price`) wholesale_price
            ');

            $sql->leftJoin('product_attribute', 'pa', 'pa.`id_product_attribute` = cp.`id_product_attribute`');
            $sql->leftJoin('product_attribute_shop', 'product_attribute_shop', '(product_attribute_shop.`id_shop` = cp.`id_shop` AND product_attribute_shop.`id_product_attribute` = pa.`id_product_attribute`)');
        } else {
            $sql->select(
                'p.`reference` AS reference, p.`ean13`, p.`isbn`,
                p.`upc` AS upc, p.`mpn` AS mpn, product_shop.`minimal_quantity` AS minimal_quantity, product_shop.`wholesale_price` wholesale_price'
            );
        }
//        $this->context->shop->id
        $sql->select('image_shop.`id_image` id_image, il.`legend`');
        $sql->leftJoin('image_shop', 'image_shop', 'image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop=' . (int) $context->shop->id);
        $sql->leftJoin('image_lang', 'il', 'il.`id_image` = image_shop.`id_image` AND il.`id_lang` = ' . (int) $id_lang);

        $result = Db::getInstance()->executeS($sql);

        // Reset the cache before the following return, or else an empty cart will add dozens of queries
        $products_ids = [];
        $pa_ids = [];
        $cart = new Cart($id_cart);
        if ($result) {
            foreach ($result as $key => $row) {
                $products_ids[] = $row['id_product'];
                $pa_ids[] = $row['id_product_attribute'];
                $specific_price = SpecificPrice::getSpecificPrice($row['id_product'], $context->shop->id, $cart->id_currency, $context->country->id, $context->shop->id_shop_group, $row['cart_quantity'], $row['id_product_attribute'], $cart->id_customer, $cart->id);
                if ($specific_price) {
                    $reduction_type_row = ['reduction_type' => $specific_price['reduction_type']];
                } else {
                    $reduction_type_row = ['reduction_type' => 0];
                }

                $result[$key] = array_merge($row, $reduction_type_row);
            }
        }else {
            return [];
        }
            $cart_shop_context = Context::getContext()->cloneContext();

            $givenAwayProductsIds = [];


            $products = [];

            foreach ($result as &$row) {
                if (!array_key_exists('is_gift', $row)) {
                    $row['is_gift'] = false;
                }

                $additionalRow = Product::getProductProperties((int) $id_lang, $row);
                $row['reduction'] = $additionalRow['reduction'];
                $row['reduction_without_tax'] = $additionalRow['reduction_without_tax'];
                $row['price_without_reduction'] = $additionalRow['price_without_reduction'];
                $row['specific_prices'] = $additionalRow['specific_prices'];
                unset($additionalRow);

                $givenAwayQuantity = 0;
                $giftIndex = $row['id_product'] . '-' . $row['id_product_attribute'];
                if ($row['is_gift'] && array_key_exists($giftIndex, $givenAwayProductsIds)) {
                    $givenAwayQuantity = $givenAwayProductsIds[$giftIndex];
                }
                if (!$row['is_gift'] || (int) $row['cart_quantity'] === $givenAwayQuantity) {
                    $productQuantity = $row['cart_quantity'];
                } else {
                    $productQuantity = $row['cart_quantity'] - $givenAwayQuantity;
                }
//                switch (Configuration::get('PS_ROUND_TYPE')) {
//                    case Order::ROUND_TOTAL:
//                        $row['total'] = $row['price_with_reduction_without_tax'] * $productQuantity;
//                        $row['total_wt'] = $row['price_with_reduction'] * $productQuantity;
//
//                        break;
//                    case Order::ROUND_LINE:
//                        $row['total'] = Tools::ps_round(
//                            $row['price_with_reduction_without_tax'] * $productQuantity,
//                            Context::getContext()->getComputingPrecision()
//                        );
//                        $row['total_wt'] = Tools::ps_round(
//                            $row['price_with_reduction'] * $productQuantity,
//                            Context::getContext()->getComputingPrecision()
//                        );
//
//                        break;
//
//                    case Order::ROUND_ITEM:
//                    default:
//                        $row['total'] = Tools::ps_round(
//                                $row['price_with_reduction_without_tax'],
//                                Context::getContext()->getComputingPrecision()
//                            ) * $productQuantity;
//                        $row['total_wt'] = Tools::ps_round(
//                                $row['price_with_reduction'],
//                                Context::getContext()->getComputingPrecision()
//                            ) * $productQuantity;
//
//                        break;
//                }

                $products[] = $row;
            }

        return $products;
    }

}