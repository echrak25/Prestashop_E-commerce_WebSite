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

class Ets_dc_cart_rule_combination
{
    public static $instance;
    public static function getInstance()
    {
        if (!(isset(self::$instance)) || !self::$instance) {
            self::$instance = new Ets_dc_cart_rule_combination();
        }
        return self::$instance;
    }
    public function l($string)
    {
        return Translate::getModuleTranslation('etsdiscountcombinations', $string, pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public static function updateCombinationCartRule($id_cart_rule,$rule_combination,$specific_rule_combination)
    {
        if(Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'ets_dc_cart_rule_combination` WHERE id_cart_rule="'.(int)$id_cart_rule.'"'))
        {
             Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'ets_dc_cart_rule_combination` SET rule_combination="'.pSQL($rule_combination).'",specific_rule_combination="'.pSQL($specific_rule_combination).'" WHERE id_cart_rule='.(int)$id_cart_rule);
        }
        else
            return Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'ets_dc_cart_rule_combination` (id_cart_rule,rule_combination,specific_rule_combination) VALUES("'.(int)$id_cart_rule.'","'.pSQL($rule_combination).'","'.pSQL($specific_rule_combination).'")');    
    }
    public static function getCombinationCartRule($id_cart_rule)
    {
        return Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'ets_dc_cart_rule_combination` WHERE id_cart_rule ='.(int)$id_cart_rule);
    }
    public static function deleteCombinationCartRule($id_cart_rule)
    {
        return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'ets_dc_cart_rule_combination` WHERE id_cart_rule ='.(int)$id_cart_rule);
    }

    /**
     * @param CartRule $obj
     * @param $display_error
     * @throws PrestaShopDatabaseException
     */
    public function checkCombinableAll($obj,$display_error)
    {
        $cart = Context::getContext()->cart;
        $sql ='SELECT cr.id_cart_rule,cr.priority,crl.name,crc.rule_combination,crc.specific_rule_combination FROM `'._DB_PREFIX_.'cart_rule` cr
            INNER JOIN `'._DB_PREFIX_.'cart_cart_rule` ccr ON (cr.id_cart_rule = ccr.id_cart_rule AND ccr.id_cart = "'.(int)$cart->id.'")
            INNER JOIN `'._DB_PREFIX_.'ets_dc_cart_rule_combination` crc ON crc.id_cart_rule = cr.id_cart_rule
            LEFT JOIN `'._DB_PREFIX_.'cart_rule_lang` crl ON (cr.id_cart_rule = crl.id_cart_rule AND crl.id_lang="'.(int)Context::getContext()->language->id.'")
            WHERE cr.id_cart_rule!="'.(int)$obj->id.'"';
        if($cart_rules = Db::getInstance()->executeS($sql)) {
            foreach($cart_rules as $cart_rule)
            {
                if(isset($cart_rule['rule_combination']) && $cart_rule['rule_combination'])
                {
                    $rule_combination = $cart_rule['rule_combination'];
                    $specific = $cart_rule['specific_rule_combination'];
                }
                else{
                    $rule_combination = Configuration::get('ETS_DC_CART_RULE_COMBINATION');
                    $specific = Configuration::get('ETS_DC_SPECIFIC_RULE_COBINATION');
                }
                $ok = true;
                if($rule_combination=='not_combinable_all')
                {
                    $ok = false;
                }
                elseif($rule_combination=='specific' && $specific && ($specific = array_map('intval',explode(',',$specific))) && !in_array($obj->id,$specific))
                {
                    $ok = false;
                }
                elseif($rule_combination=='manual' && ($manual = Configuration::get('ETS_DC_UN_COMBINABLE_ID_CART_RULE')) && ($manual = array_map('intval',explode(',',$manual))) && in_array($obj->id,$manual) )
                {
                    $ok = false;
                }
                if($ok == false)
                {
                    if($obj->priority >= $cart_rule['priority'])
                        return (!$display_error) ? false : sprintf($this->l('This voucher is not combinable with another voucher already in your cart: %s'), $cart_rule['name']);
                    else
                        $cart->removeCartRule($cart_rule['id_cart_rule']);
                }
            }
        }
        return !$display_error ? true :'';
    }
    public function checkNotCombinableAll($obj,$display_error)
    {
        $cart = Context::getContext()->cart;
        if(Validate::isLoadedObject($cart))
        {
            $sql ='SELECT cr.id_cart_rule,cr.priority,crl.name FROM `'._DB_PREFIX_.'cart_rule` cr
            INNER JOIN `'._DB_PREFIX_.'cart_cart_rule` ccr ON (cr.id_cart_rule = ccr.id_cart_rule AND ccr.id_cart = "'.(int)$cart->id.'")
            LEFT JOIN `'._DB_PREFIX_.'cart_rule_lang` crl ON (cr.id_cart_rule = crl.id_cart_rule AND crl.id_lang="'.(int)Context::getContext()->language->id.'")
            WHERE cr.id_cart_rule!="'.(int)$obj->id.'"';
            if($cart_rules = Db::getInstance()->executeS($sql))
            {
                foreach($cart_rules as $cart_rule)
                {
                    if($obj->priority >= $cart_rule['priority'])
                        return (!$display_error) ? false : sprintf($this->l('This voucher is not combinable with another voucher already in your cart: %s'), $cart_rule['name']);
                    else
                        $cart->removeCartRule($cart_rule['id_cart_rule']);
                }
            }
        }
        return !$display_error ? true :''; 
    }
    public function checkCombinableSpecific($obj,$specific, $display_error)
    {
        $cart = Context::getContext()->cart;
        if(Validate::isLoadedObject($cart) && $specific)
        {
            $sql ='SELECT cr.id_cart_rule,cr.priority,crl.name FROM `'._DB_PREFIX_.'cart_rule` cr
            INNER JOIN `'._DB_PREFIX_.'cart_cart_rule` ccr ON (cr.id_cart_rule = ccr.id_cart_rule AND ccr.id_cart = "'.(int)$cart->id.'")
            LEFT JOIN `'._DB_PREFIX_.'cart_rule_lang` crl ON (cr.id_cart_rule = crl.id_cart_rule AND crl.id_lang="'.(int)Context::getContext()->language->id.'")
            WHERE cr.id_cart_rule!="'.(int)$obj->id.'" AND cr.id_cart_rule NOT IN ('.implode(',',array_map('intval',explode(',',$specific))).')';
            if($cart_rules = Db::getInstance()->executeS($sql))
            {
                foreach($cart_rules as $cart_rule)
                {
                    if($obj->priority >= $cart_rule['priority'])
                        return (!$display_error) ? false : sprintf($this->l('This voucher is not combinable with another voucher already in your cart: %s'), $cart_rule['name']);
                    else
                        $cart->removeCartRule($cart_rule['id_cart_rule']);
                }
            }
        }
        return !$display_error ? true :''; 
    }
    public function checkCombinableManual($obj, $display_error)
    {
        $cart = Context::getContext()->cart;
        $ETS_DC_UN_COMBINABLE_ID_CART_RULE = Configuration::get('ETS_DC_UN_COMBINABLE_ID_CART_RULE');
        if(Validate::isLoadedObject($cart) && $ETS_DC_UN_COMBINABLE_ID_CART_RULE)
        {
            $sql ='SELECT cr.id_cart_rule,cr.priority,crl.name FROM `'._DB_PREFIX_.'cart_rule` cr
            INNER JOIN `'._DB_PREFIX_.'cart_cart_rule` ccr ON (cr.id_cart_rule = ccr.id_cart_rule AND ccr.id_cart = "'.(int)$cart->id.'")
            LEFT JOIN `'._DB_PREFIX_.'cart_rule_lang` crl ON (cr.id_cart_rule = crl.id_cart_rule AND crl.id_lang="'.(int)Context::getContext()->language->id.'")
            WHERE cr.id_cart_rule!="'.(int)$obj->id.'" AND cr.id_cart_rule IN ('.implode(',',array_map('intval',explode(',',$ETS_DC_UN_COMBINABLE_ID_CART_RULE))).')';
            if($cart_rules = Db::getInstance()->executeS($sql))
            {
                foreach($cart_rules as $cart_rule)
                {
                    if($obj->priority >= $cart_rule['priority'])
                        return (!$display_error) ? false : sprintf($this->l('This voucher is not combinable with another voucher already in your cart: %s'), $cart_rule['name']);
                    else
                        $cart->removeCartRule($cart_rule['id_cart_rule']);
                }
            }
        }
        return !$display_error ? true :''; 
    }
}