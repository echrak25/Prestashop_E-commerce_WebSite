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

class Ets_dc_defines
{
    public static $instance;
    public static function getInstance()
    {
        if (!(isset(self::$instance)) || !self::$instance) {
            self::$instance = new Ets_dc_defines();
        }
        return self::$instance;
    }
    public function l($string)
    {
        return Translate::getModuleTranslation('etsdiscountcombinations', $string, pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public static function installDb()
    {
        return Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_dc_cart_rule_combination` ( 
        `id_cart_rule` INT(11) NOT NULL , 
        `rule_combination` VARCHAR(32) NOT NULL , 
        `specific_rule_combination` VARCHAR(100) NOT NULL , 
        PRIMARY KEY (`id_cart_rule`)) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci');
    }
    public static function unInstallDb()
    {
        $tables = array(
            'ets_dc_cart_rule_combination',
        );
        if($tables)
        {
            foreach($tables as $table)
               Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . pSQL($table).'`'); 
        }
        return true;
    }
    public function getConfigInputs()
    {
        return array(
            array(
                'type'=>'radio',
                'label' => $this->l('Default cart rule combination'),
                'name' => 'ETS_DC_CART_RULE_COMBINATION',
                'default' =>'combinable_all',
                'values' => array(
                    array(
                        'id' => 'ETS_DC_CART_RULE_COMBINATION_combinable_all',
                        'value'=>'combinable_all',
                        'label' => $this->l('Combinable with all cart rules'),
                    ),
                    array(
                        'id' => 'ETS_DC_CART_RULE_COMBINATION_not_combinable_all',
                        'value'=>'not_combinable_all',
                        'label' => $this->l('Not combinable with all cart rules')
                    ),
                    array(
                        'id' => 'ETS_DC_CART_RULE_COMBINATION_specific',
                        'value'=>'specific',
                        'label' => $this->l('Only combinable with specific cart rule')
                    ),
                    array(
                        'id' => 'ETS_DC_CART_RULE_COMBINATION_manual',
                        'value'=>'manual',
                        'label' => $this->l('Manually select combinable/non combinable cart rules')
                    ),
                ),
                'validate' => 'isCleanHtml',
            ),
            array(
                'type'=>'search_rule',
                'label' => $this->l('Select cart rule to combine'),
                'name'=> 'ETS_DC_SPECIFIC_RULE_COBINATION',
                'placeholder' => $this->l('Search ID, code, name'),
                'form_group_class'=> 'rule_combination specific',
                'showRequired' => true,
            ),
            array(
                'type'=>'html',
                'label' =>'',
                'name'=> 'ETS_DC_UN_COMBINABLE_ID_CART_RULE',
                'html_content'=> $this->displayFormCombinableCartRule(),
                'form_group_class'=> 'rule_combination manual',
                'multiple' => true,
            ),
            array(
                'type'=>'html',
                'label' =>'',
                'name'=> '',
                'html_content'=> $this->displayNotifyCartRule(),
                'form_group_class'=> 'rule_combination manual specific',
            ),
        );
    }
    public function displayFormCombinableCartRule()
    {
        if(Tools::isSubmit('btnSubmit'))
            $uncombinable_id_cart_rules = Tools::getValue('ETS_DC_UN_COMBINABLE_ID_CART_RULE') ;
        else
            $uncombinable_id_cart_rules = Configuration::get('ETS_DC_UN_COMBINABLE_ID_CART_RULE') ? explode(',',Configuration::get('ETS_DC_UN_COMBINABLE_ID_CART_RULE')):array();
        $sql = 'SELECT cr.id_cart_rule,crl.name FROM `'._DB_PREFIX_.'cart_rule` cr 
        LEFT JOIN `'._DB_PREFIX_.'cart_rule_shop` crs ON (cr.id_cart_rule= crs.id_cart_rule)
        LEFT JOIN `'._DB_PREFIX_.'cart_rule_lang` crl ON (cr.id_cart_rule= crl.id_cart_rule AND crl.id_lang="'.(int)Context::getContext()->language->id.'")
        WHERE cr.active=1 AND (crs.id_shop="'.(int)Context::getContext()->shop->id.'" OR crs.id_cart_rule is null)' .($uncombinable_id_cart_rules ? ' AND cr.id_cart_rule NOT IN ('.implode(',',array_map('intval',$uncombinable_id_cart_rules)).')':'');
        $combinable_cart_rules = Db::getInstance()->executeS($sql);
        if($uncombinable_id_cart_rules)
        {
            $sql = 'SELECT cr.id_cart_rule,crl.name FROM `'._DB_PREFIX_.'cart_rule` cr 
            LEFT JOIN `'._DB_PREFIX_.'cart_rule_shop` crs ON (cr.id_cart_rule= crs.id_cart_rule)
            LEFT JOIN `'._DB_PREFIX_.'cart_rule_lang` crl ON (cr.id_cart_rule= crl.id_cart_rule AND crl.id_lang="'.(int)Context::getContext()->language->id.'")
            WHERE cr.active=1 AND (crs.id_shop="'.(int)Context::getContext()->shop->id.'" OR crs.id_cart_rule is null)' .($uncombinable_id_cart_rules ? ' AND cr.id_cart_rule IN ('.implode(',',array_map('intval',$uncombinable_id_cart_rules)).')':'');
            $uncombinable_cart_rules = Db::getInstance()->executeS($sql);
        }
        else
            $uncombinable_cart_rules = array(); 
        Context::getContext()->smarty->assign(
            array(
                'combinable_cart_rules' => $combinable_cart_rules,
                'uncombinable_cart_rules' => $uncombinable_cart_rules,
            )
        );
        return Context::getContext()->smarty->fetch(_PS_MODULE_DIR_.'etsdiscountcombinations/views/templates/hook/combinable_cart_rule.tpl');
    }
    public function _submitSearchRule(){
        if (($query = Tools::getValue('q', false)) && Validate::isCleanHtml($query))
        {
            $excludeIds = Tools::getValue('excludeIds', false);
            $excludedCartRules = array();
            if ($excludeIds && $excludeIds != 'NaN' && Validate::isCleanHtml($excludeIds)) {
                $excludeIds = implode(',', array_map('intval', explode(',', $excludeIds)));
                if($excludeIds && ($ids = explode(',',$excludeIds)) ) {
                    foreach($ids as $id) {
                        $excludedCartRules[] = $id;
                    }
                }
            } else {
                $excludeIds = false;
            }
            $sql = 'SELECT * FROM  `'._DB_PREFIX_.'cart_rule` cr
            LEFT JOIN `'._DB_PREFIX_.'cart_rule_shop` crs ON (cr.id_cart_rule= crs.id_cart_rule)
            LEFT JOIN `'._DB_PREFIX_.'cart_rule_lang` crl ON (cr.id_cart_rule=crl.id_cart_rule AND crl.id_lang="'.(int)Context::getContext()->language->id.'")
            WHERE cr.active=1 AND (crs.id_shop="'.(int)Context::getContext()->shop->id.'" OR crs.id_cart_rule is null) AND (crl.name LIKE "%'.pSQL($query).'%" OR cr.code like "%'.pSQL($query).'%" OR cr.id_cart_rule="'.(int)$query.'") '.($excludedCartRules ? ' AND cr.id_cart_rule NOT IN ('.implode(',',array_map('intval',$excludedCartRules)).')':'');
            $rules = Db::getInstance()->executeS($sql);   
            if ($rules)
            {
                foreach ($rules as &$item)
                    echo $item['id_cart_rule'] . '|' . $item['name'] . '|' . ($item['code'] ? sprintf($this->l('Code: %s'),$item['code']):''). "\n";
            }
        }
        die;
    }
    public static function getRulesByIds($id_rules)
    {
        if(!is_array($id_rules))
        {
            $id_rules = explode(',',$id_rules);
        }
        $sql = 'SELECT * FROM  `'._DB_PREFIX_.'cart_rule` cr
        LEFT JOIN `'._DB_PREFIX_.'cart_rule_shop` crs ON (cr.id_cart_rule= crs.id_cart_rule)
        LEFT JOIN `'._DB_PREFIX_.'cart_rule_lang` crl ON (cr.id_cart_rule=crl.id_cart_rule AND crl.id_lang="'.(int)Context::getContext()->language->id.'")
        WHERE cr.id_cart_rule IN ('.implode(',',array_map('intval',$id_rules)).') AND (crs.id_shop="'.(int)Context::getContext()->shop->id.'" OR crs.id_cart_rule is null)';
        $rules = Db::getInstance()->executeS($sql); 
        return $rules;    
    }
    public function displayNotifyCartRule()
    {
        $sql = 'SELECT * FROM  `'._DB_PREFIX_.'cart_rule` cr
        LEFT JOIN `'._DB_PREFIX_.'cart_rule_shop` crs ON (cr.id_cart_rule= crs.id_cart_rule)
        WHERE cr.active=1 AND (crs.id_shop="'.(int)Context::getContext()->shop->id.'" OR crs.id_cart_rule is null)';
        if(!Db::getInstance()->getRow($sql))
        {
            Context::getContext()->smarty->assign(
                array(
                    'link'=> Context::getContext()->link,
                )
            );
            return Context::getContext()->smarty->fetch(_PS_MODULE_DIR_.'etsdiscountcombinations/views/templates/hook/notify.tpl');
        }
    }
    public static function checkEnableOtherShop($id_module)
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'module_shop` WHERE `id_module` = ' . (int) $id_module . ' AND `id_shop` NOT IN(' . implode(', ', Shop::getContextListShopID()) . ')';
        return Db::getInstance()->executeS($sql);
    }
}