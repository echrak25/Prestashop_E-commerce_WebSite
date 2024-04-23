<?php
/**
 * 2007-2023 ETS-Soft
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
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 *  @author ETS-Soft <etssoft.jsc@gmail.com>
 *  @copyright  2007-2023 ETS-Soft
 *  @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

class Ets_stt_defines {
    public $module ;
    public $context ;
    public static $instance = null;
    public function __construct()
    {
        $this->context= Context::getContext();
        $this->module = Module::getInstanceByName('ph_scrolltotop');
    }
    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new Ets_stt_defines();
        }
        return self::$instance;
    }
    public function _installDb(){
        $sql = array();

        $sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ph_scrolltotop` ( `id_ph_scrolltotop` int(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY  (`id_ph_scrolltotop`)) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';
        foreach ($sql as $query) {
            if (Db::getInstance()->execute($query) == false) {
                return false;
            }
        }
        return true;
    }
    public function _uninstallDb(){
        $tables = array(
            'ph_scrolltotop',
        );
        if($tables)
        {
            foreach($tables as $table)
                Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . pSQL($table).'`');
        }
        return true;
    }
}