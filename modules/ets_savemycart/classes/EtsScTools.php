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

class EtsScTools
{
    // get combination image:
    public static function getCombinationImageById($id_product_attribute, $id_lang)
    {
        if (!$id_product_attribute || !Validate::isUnsignedInt($id_product_attribute)) {
            return false;
        }
        if (!$id_lang) {
            $id_lang = (int)Context::getContext()->language->id;
        }
        if (version_compare(_PS_VERSION_, '1.6.1.0', '<')) {
            if (!Combination::isFeatureActive() || !$id_product_attribute)
                return false;
            $result = Db::getInstance()->executeS('
				SELECT pai.`id_image`, pai.`id_product_attribute`, il.`legend`
				FROM `' . _DB_PREFIX_ . 'product_attribute_image` pai
				LEFT JOIN `' . _DB_PREFIX_ . 'image_lang` il ON (il.`id_image` = pai.`id_image`)
				LEFT JOIN `' . _DB_PREFIX_ . 'image` i ON (i.`id_image` = pai.`id_image`)
				WHERE pai.`id_product_attribute` = ' . (int)$id_product_attribute . ' AND il.`id_lang` = ' . (int)$id_lang . ' ORDER by i.`position` LIMIT 1'
            );
            if (!$result)
                return false;
            return $result[0];
        } else
            return Product::getCombinationImageById($id_product_attribute, $id_lang);
    }
    public static function getCartRule($id){
        if ((int)$id)
        {
            return Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'cart_rule` WHERE id_cart_rule = '.(int)$id);
        }
        return false;
    }
}