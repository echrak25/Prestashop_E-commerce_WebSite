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

class Ets_sptf_defines extends ETSSPTranslate
{
    public $module;
    public $context;
    public static $instance = null;

    public function __construct()
    {
        $this->context = Context::getContext();
        $this->module = Module::getInstanceByName('ph_sendproduct_tofriend');
    }

    public function getConfigFields()
    {
        $inputFields = array("your-name", "your-email", "friend-name", "friend-email", "sptf-message");
        return $inputFields;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Ets_sptf_defines();
        }
        return self::$instance;
    }

    public function _installDb()
    {
        $sql = array();

        $sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ph_sendproduct_tofriend` (
        `id_sptf` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `email_to` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
        `receiver` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
        `email_from` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
        `sender` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
        `subject` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
        `body` text COLLATE utf8mb4_general_ci NOT NULL,
        `id_product` int(11) NOT NULL,
        `id_shop` int(11) UNSIGNED NOT NULL,
        `id_lang` int(11) UNSIGNED NOT NULL,
        `is_logged` TINYINT(1) DEFAULT 0,
        `status` TINYINT(1) DEFAULT 0,
        `date_add` DATETIME NOT NULL,
        `date_upd` DATETIME NOT NULL,
        INDEX (`id_product`,`is_logged`,`id_sptf`,`email_from`),
        PRIMARY KEY  (`id_sptf`)) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;';
        foreach ($sql as $query) {
            if (Db::getInstance()->execute($query) == false) {
                return false;
            }
        }
        return true;
    }

    public function _uninstallDb()
    {
        $tables = array(
            'ph_sendproduct_tofriend',
        );
        if ($tables) {
            foreach ($tables as $table)
                Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . pSQL($table) . '`');
        }
        return true;
    }

    static $cache_quick_access = array();

    public function getQuickTabs()
    {
        if (!self::$cache_quick_access) {
            self::$cache_quick_access = array(
                array(
                    'label' => $this->l('Sharing product list'),
                    'origin' => 'Sharing product list',
                    'icon' => 'send-product-form',
                    'class' => 'SendProductForm',
                    'active' => 1,
                ),
                array(
                    'label' => $this->l('Product sharing detail'),
                    'origin' => 'Product sharing detail',
                    'icon' => 'send-product-detail',
                    'class' => 'SendProductDetail',
                    'active' => 0,
                ),
            );
        }
        return self::$cache_quick_access;
    }
    static $cache_configs = [];
    public function getConfigs()
    {
        $values = array(
            array(
                'id' => 'active_on',
                'value' => 1,
                'label' => $this->l('Enabled'),
            ),
            array(
                'id' => 'active_off',
                'value' => 0,
                'label' => $this->l('Disabled'),
            ),
        );
            self::$cache_configs = array(
                'PH_SENDPRODUCT_TOFRIEND_LIVE_MODE' =>  array(
                        'type' => 'switch',
                        'label' => $this->l('Enable product sharing '),
                        'name' => 'PH_SENDPRODUCT_TOFRIEND_LIVE_MODE',
                        'is_bool' => true,
                        'values' => $values,
                        'default' => true,
                ),
                'PH_SENDPRODUCT_TOFRIEND_BUTTON_LABEL' =>  array(
                    'type' => 'text',
                    'lang' => true,
                    'label' => $this->l('Button label: '),
                    'name' => 'PH_SENDPRODUCT_TOFRIEND_BUTTON_LABEL',
                    'default' => 'Share product to friend',
                    'col' => '2',
                    'required' => true
                ),
                'PH_SENDPRODUCT_TOFRIEND_TEXT_COLOR' =>  array(
                    'type' => 'color',
                    'label' => $this->l('Button text color: '),
                    'name' => 'PH_SENDPRODUCT_TOFRIEND_TEXT_COLOR',
                    'default' => '#ffffff'
                ),
                'PH_SENDPRODUCT_TOFRIEND_TEXT_HOVER_COLOR' =>  array(
                    'type' => 'color',
                    'label' => $this->l('Button text hover color: '),
                    'name' => 'PH_SENDPRODUCT_TOFRIEND_TEXT_HOVER_COLOR',
                    'default' => '#ffffff'
                ),
                'PH_SENDPRODUCT_TOFRIEND_BUTTON_COLOR' =>  array(
                    'type' => 'color',
                    'label' => $this->l('Button background color: '),
                    'name' => 'PH_SENDPRODUCT_TOFRIEND_BUTTON_COLOR',
                    'default' => '#2fb5d2'
                ),
                'PH_SENDPRODUCT_TOFRIEND_BUTTON_HOVER_COLOR' =>  array(
                    'type' => 'color',
                    'label' => $this->l('Button background hover color: '),
                    'name' => 'PH_SENDPRODUCT_TOFRIEND_BUTTON_HOVER_COLOR',
                    'default' => '#2592a9'
                ),
                'PH_SENDPRODUCT_TOFRIEND_BUTTON_BORDER_RADIUS' => array(
                    'type'=>'range',
                    'label'=>$this->l('Button border radius: '),
                    'name'=>'PH_SENDPRODUCT_TOFRIEND_BUTTON_BORDER_RADIUS',
                    'min'=>'1',
                    'max'=>'20',
                    'unit' => 'px',
                    'units'=>'px',
                    'default'=>3,
                )
    );

        return self::$cache_configs;
    }
}