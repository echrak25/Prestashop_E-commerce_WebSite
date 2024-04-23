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

class Ets_tc_defines
{
    public static $instance;
    public function __construct()
    {
        $this->context = Context::getContext();
        if (is_object($this->context->smarty)) {
            $this->smarty = $this->context->smarty;
        }
    }
    public static function getInstance()
    {
        if (!(isset(self::$instance)) || !self::$instance) {
            self::$instance = new Ets_tc_defines();
        }
        return self::$instance;
    }
    public function _installDb(){
        $res =  Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_tc_view` ( 
        `id_ets_tc_view` INT(11) NOT NULL AUTO_INCREMENT , 
        `name` VARCHAR(1000) NOT NULL , 
        `fields` TEXT NOT NULL , 
        PRIMARY KEY (`id_ets_tc_view`)) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci') ;
        $res &= Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_tc_view_employee` (
        `id_ets_tc_view` INT(11) NOT NULL , 
        `id_employee` INT(11) NOT NULL , 
        PRIMARY KEY (`id_ets_tc_view`, `id_employee`)) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci');
        $res &= Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_tc_session` (
         `id_ets_tc_session` INT(11) NOT NULL AUTO_INCREMENT , 
         `source` VARCHAR(150) NOT NULL , 
         `url_source` VARCHAR(200) NOT NULL , 
         `utm_source` VARCHAR(50) NOT NULL , 
         `utm_medium` VARCHAR(50) NOT NULL , 
         `browser` VARCHAR(50) NOT NULL , 
         `id_first_page` INT(11) NOT NULL , 
         `id_first_object` INT(11) NOT NULL , 
         `first_url` VARCHAR(200) NOT NULL , 
         `id_customer` INT(11) NOT NULL , 
         `id_shop` INT(11) NOT NULL , 
         `create_account` INT(11) NOT NULL , 
         `add_cart` INT(11) NOT NULL , 
         `create_order` INT(11) NOT NULL , 
         `id_guest` INT(11) NOT NULL , 
         `duration` INT(11) NOT NULL , 
         `id_exit_page` INT(11) NOT NULL , 
         `id_exit_object` INT(11) NOT NULL , 
         `exit_url` VARCHAR(200) NOT NULL , 
         `date_exit` DATETIME NOT NULL ,
         `total_page_visit` INT(11) NOT NULL,  
         `last_action` VARCHAR(22),
         `first_page` VARCHAR(200),
         `exit_page` VARCHAR(200),
         `date_add` DATETIME NOT NULL ,
          PRIMARY KEY (`id_ets_tc_session`), 
          INDEX (`id_customer`) ,INDEX(`id_guest`),INDEX(`id_first_page`),INDEX(`id_exit_page`) ) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci');
        $res &= Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_tc_action` ( 
        `id_ets_tc_session` INT(11) NOT NULL , 
        `action` VARCHAR(22) NOT NULL , 
        `id_page` int(11) NOT NULL , 
        `id_lang` int(11) NOT NULL , 
        `id_currency` int(11) NOT NULL , 
        `id_country` int(11) NOT NULL , 
        `page_url` VARCHAR(200) NOT NULL , 
        `search` VARCHAR(150),
        `id_object` INT(11) NOT NULL,
        `id_product` INT(11) NOT NULL , 
        `id_cart` INT(11) NOT NULL , 
        `id_order` INT(11) NOT NULL ,
        `id_ticket` INT(11) NOT NULL , 
        `id_product_attribute` INT(11) NOT NULL, 
        `quantity` INT(11) NOT NULL,
        `duration` INT(11),
        `is_verified` TINYINT(1),
        `is_registered` INT(11),
        `is_visitors` TINYINT(1),
        `date_add` DATETIME NOT NULL , 
        `date_exit` DATETIME NOT NULL , 
        INDEX(id_ets_tc_session),INDEX(id_ticket), INDEX(id_page),INDEX(id_lang), INDEX(id_currency),INDEX (`id_order`), INDEX (`id_cart`), INDEX (`id_product`),INDEX(id_product_attribute), INDEX (`action`),INDEX(date_add),INDEX(is_verified),INDEX(is_registered),INDEX(is_visitors)) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci');
        return $res;
    }
    public function _unInstallDb()
    {
        $tables = array(
            'ets_tc_view',
            'ets_tc_view_employee',
            'ets_tc_session',
            'ets_tc_action'
        );
        if($tables)
        {
            foreach($tables as $table)
               Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . pSQL($table).'`'); 
        }
        return true;
    }
}