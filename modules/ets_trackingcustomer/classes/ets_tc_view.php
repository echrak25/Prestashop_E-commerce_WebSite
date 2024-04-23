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
class Ets_tc_view extends ObjectModel
{
    public $name;
    public $fields;  
    public static $definition = array(
		'table' => 'ets_tc_view',
		'primary' => 'id_ets_tc_view',
		'multilang' => false,
		'fields' => array(
			'name' => array('type' => self::TYPE_STRING),
            'fields' => array('type' => self::TYPE_STRING),
        )
	);
    public	function __construct($id_item = null, $id_lang = null, $id_shop = null)
	{
		parent::__construct($id_item, $id_lang, $id_shop);
	}
    public static function getListViews()
    {
        $sql = 'SELECT * FROM `'._DB_PREFIX_.'ets_tc_view`';
        return Db::getInstance()->executeS($sql);
    }
    public static function getViewByIdEmployee($id_employee)
    {
        $sql ='SELECT v.id_ets_tc_view FROM `'._DB_PREFIX_.'ets_tc_view` v
        INNER JOIN `'._DB_PREFIX_.'ets_tc_view_employee` e ON (v.id_ets_tc_view=e.id_ets_tc_view AND e.id_employee='.(int)$id_employee.')';
        return (int)Db::getInstance()->getValue($sql);
    }
    public function submitChangeView($id_view_selected)
    {
        if(Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'ets_tc_view_employee` WHERE id_employee='.(int)Context::getContext()->employee->id))
           return Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'ets_tc_view_employee` SET id_ets_tc_view="'.(int)$id_view_selected.'" WHERE id_employee='.(int)Context::getContext()->employee->id);
        else
            return Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'ets_tc_view_employee`(id_ets_tc_view,id_employee) VALUES("'.(int)$id_view_selected.'","'.(int)Context::getContext()->employee->id.'")');
        
    }
    public static function updateView($id_view_selected,$listFieldCustomers)
    {
        self::submitChangeView($id_view_selected);
        if(!$id_view_selected)
        {
            if ($listFieldCustomers) {
                Configuration::updateValue('ETS_TC_ARRANGE_LIST_CUSTOMER', implode(',', array_map('pSQL',$listFieldCustomers)));
            } else
                Configuration::updateValue('ETS_TC_ARRANGE_LIST_CUSTOMER', '');
        }
        else
        {
            $viewOjb = new Ets_tc_view($id_view_selected);
            $viewOjb->fields = implode(',', array_map('pSQL',$listFieldCustomers));
            $viewOjb->update();
        }
    }
    public static function checkExistName($name,$id_view)
    {
        return Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'ets_tc_view` WHERE name="'.pSQL($name).'"'.($id_view ? ' AND id_ets_tc_view!='.(int)$id_view :'') );
    }
    public function delete()
    {
        if(parent::delete())
        {
            Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'ets_tc_view_employee` SET id_ets_tc_view=0 WHERE id_ets_tc_view='.(int)$this->id);
            return true;
        }
    }
 }