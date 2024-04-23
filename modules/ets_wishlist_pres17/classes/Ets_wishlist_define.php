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

class Ets_wishlist_defines
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
            self::$instance = new Ets_wishlist_defines();
        }
        return self::$instance;
    }
    public function l($string)
    {
        return Translate::getModuleTranslation('ets_wishlist_pres17', $string, pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public function getConfigInputs()
    {
        return array(
            array(
                'type' => 'text',
                'name' => 'ETS_WL_DEFAULT_TITLE',
                'label' => $this->l('Wish list default title'),
                'validate' => 'isCleanHtml',
                'default' => $this->l('My wish list'),
                'default_lang' => 'My wish list',
                'lang' => true,
            ),
            array(
                'type' => 'text',
                'name' => 'ETS_WL_CREATE_BUTTON_LABEL',
                'label' => $this->l('Create button label'),
                'validate' => 'isCleanHtml',
                'default' => $this->l('Create new list'),
                'default_lang' => 'Create new list',
                'lang' => true,
            ),
            array(
                'type' => 'text',
                'name' => 'ETS_WL_MY_WISHLISTS',
                'label' => $this->l('Wish list page name '),
                'validate' => 'isCleanHtml',
                'default' => $this->l('My wish lists'),
                'default_lang' => 'My wish lists',
                'lang' => true,
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_WL_ENABLE_PRODUCT_PAGE',
                'label' => $this->l('Enable wish list button on product page'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_WL_ENABLE_PRODUCT_PAGE_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_WL_ENABLE_PRODUCT_PAGE_off',
                        'value' => 0,
                    )
                ),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_WL_ENABLE_PRODUCT_LIST',
                'label' => $this->l('Enable wishlist on product list '),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_WL_ENABLE_PRODUCT_LIST_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_WL_ENABLE_PRODUCT_LIST_off',
                        'value' => 0,
                    )
                ),
            ),

            array(
                'type' => 'select',
                'label' => $this->l('Position'),
                'name' => 'ETS_WL_BUTTON_POSITION',
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'left',
                            'name' => $this->l('Left'),
                        ),
                        array(
                            'id' => 'right',
                            'name' => $this->l('Right'),
                        )
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
                'default' => 'right',
                'form_group_class' => 'button_product_list',
            ),
            array(
                'type' => 'text',
                'label' => $this->l('Adjust position top'),
                'name' => 'ETS_WL_BUTTON_POSITION_TOP',
                'suffix' => 'px',
                'default' => '60',
                'form_group_class' => 'button_product_list',
                'validate' => 'isUnsignedFloat',
                'iscss' => true,
            ),
            array(
                'type' => 'text',
                'label' => $this->l('Adjust position left'),
                'name' => 'ETS_WL_BUTTON_POSITION_LEFT',
                'suffix' => 'px',
                'form_group_class' => 'button_product_list',
                'default' => '',
                'validate' => 'isUnsignedFloat',
                'iscss' => true,
            ),
            array(
                'type' => 'text',
                'label' => $this->l('Adjust position right'),
                'name' => 'ETS_WL_BUTTON_POSITION_RIGHT',
                'suffix' => 'px',
                'form_group_class' => 'button_product_list',
                'default' => '10',
                'validate' => 'isUnsignedFloat',
                'iscss' => true,
            ),
            array(
                'type' => 'color',
                'label' => $this->l('Icon background color'),
                'name' => 'ETS_WL_BT_BG_COLOR',
                'default' => '#ffffff',
                'form_group_class' => 'button_all_position',
                'validate' => 'isColor',
                'iscss' => true,
            ), 
            array(
                'type' => 'color',
                'label' => $this->l('Icon hover background color'),
                'name' => 'ETS_WL_BT_HOVER_BG_COLOR',
                'default' => '#f9f9f9',
                'form_group_class' => 'button_all_position',
                'validate' => 'isColor',
                'iscss' => true,
            ), 
            array(
                'type' => 'color',
                'label' => $this->l('Icon color'),
                'name' => 'ETS_WL_BT_COLOR',
                'default' => '#7a7a7a',
                'form_group_class' => 'button_all_position',
                'validate' => 'isColor',
                'iscss' => true,
            ), 
            array(
                'type' => 'color',
                'label' => $this->l('Icon color when added product to wishlist'),
                'name' => 'ETS_WL_BT_ACTIVE_COLOR',
                'default' => '#ff0000',
                'form_group_class' => 'button_all_position',
                'validate' => 'isColor',
                'iscss' => true,
            ), 
            array(
                'type' => 'select',
                'label' => $this->l('Background border'),
                'name' => $this->l('ETS_WL_BACKGROUND_BORDER'),
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'square',
                            'name' => $this->l('Square'),
                        ),
                        array(
                            'id' => 'circle',
                            'name' => $this->l('Circle'),
                        ),
                        array(
                            'id' => 'rounded',
                            'name' => $this->l('Rounded'),
                        )
                    ),
                    'id' => 'id',
                    'name' => 'name',
                ),
                'default' => 'circle',
                'form_group_class' => 'button_all_position',
                'iscss' => true,
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_WL_DISPLAY_SHARE_BUTTON_ON_WISHLIST_PAGE',
                'label' => $this->l('Display share button on wishlist page'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_WL_DISPLAY_SHARE_BUTTON_ON_WISHLIST_PAGE_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_WL_DISPLAY_SHARE_BUTTON_ON_WISHLIST_PAGE_off',
                        'value' => 0,
                    )
                ),
            ),
            array(
                'name' => 'ETS_WLP_TILE_LEFT_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position left_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Wishlist'),
                'default_lang' => 'Wishlist',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_WLP_NUMBER_PRODUCT_IN_LEFT',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position left_block',
                'validate' => 'isUnsignedInt',
                'default' =>8,
                'desc' => $this->l('Leave blank to show all wishlist products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_WLP_DISPLAY_TYPE_IN_LEFT',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position left_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_WLP_DISPLAY_TYPE_IN_LEFT_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_WLP_DISPLAY_TYPE_IN_LEFT_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
                
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_WLP_AUTO_PLAY_LEFT',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_WLP_AUTO_PLAY_LEFT_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_WLP_AUTO_PLAY_LEFT_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position left_block',
            ),
            array(
                'name' => 'ETS_WLP_TILE_RIGHT_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position right_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Wishlist'),
                'default_lang' => 'Wishlist',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_WLP_NUMBER_PRODUCT_IN_RIGHT',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position right_block',
                'validate' => 'isUnsignedInt',
                'default' => 8,
                'desc' => $this->l('Leave blank to show all wishlist products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_WLP_DISPLAY_TYPE_IN_RIGHT',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position right_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_WLP_DISPLAY_TYPE_IN_RIGHT_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_WLP_DISPLAY_TYPE_IN_RIGHT_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_WLP_AUTO_PLAY_RIGHT',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_WLP_AUTO_PLAY_RIGHT_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_WLP_AUTO_PLAY_RIGHT_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position right_block',
            ),
            array(
                'name' => 'ETS_WLP_TILE_SHIPPING_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position shipping_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Wishlist'),
                'default_lang' => 'Wishlist',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_WLP_NUMBER_PRODUCT_IN_SHIPPING',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position shipping_block',
                'validate' => 'isUnsignedInt',
                'default' => 8,
                'desc' => $this->l('Leave blank to show all wishlist products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_WLP_DISPLAY_TYPE_IN_SHIPPING',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position shipping_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_WLP_DISPLAY_TYPE_IN_SHIPPING_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_WLP_DISPLAY_TYPE_IN_SHIPPING_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_WLP_AUTO_PLAY_SHIPPING',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_WLP_AUTO_PLAY_SHIPPING_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_WLP_AUTO_PLAY_SHIPPING_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position shipping_block',
            ),
        );
    }
    public static function installDb()
    {
        return Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_wishlist` (
          `id_ets_wishlist` int(10) unsigned NOT NULL auto_increment,
          `id_customer` int(10) unsigned NOT NULL,
          `token` varchar(64) character set utf8 NOT NULL,
          `name` varchar(64) character set utf8 NOT NULL,
          `counter` int(10) unsigned NULL,
          `id_shop` int(10) unsigned default 1,
          `id_shop_group` int(10) unsigned default 1,
          `date_add` datetime NOT NULL,
          `date_upd` datetime NOT NULL,
          `default` int(10) unsigned default 0,
          PRIMARY KEY  (`id_ets_wishlist`)
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci')
        && Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_wishlist_email` (
          `id_ets_wishlist` int(10) unsigned NOT NULL,
          `email` varchar(128) character set utf8 NOT NULL,
          `date_add` datetime NOT NULL,
          INDEX(id_ets_wishlist)
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci')
        && Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_wishlist_product` (
          `id_ets_wishlist_product` int(10) NOT NULL auto_increment,
          `id_ets_wishlist` int(10) unsigned NOT NULL,
          `id_product` int(10) unsigned NOT NULL,
          `id_product_attribute` int(10) unsigned NOT NULL,
          `quantity` int(10) unsigned NOT NULL,
          `priority` int(10) unsigned NOT NULL,
          PRIMARY KEY  (`id_ets_wishlist_product`),
          INDEX(id_ets_wishlist),INDEX(id_product),INDEX(id_product_attribute)
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci')
        && Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_wishlist_product_cart` (
          `id_ets_wishlist_product` int(10) unsigned NOT NULL,
          `id_cart` int(10) unsigned NOT NULL,
          `quantity` int(10) unsigned NOT NULL,
          `date_add` datetime NOT NULL,
          INDEX(id_ets_wishlist_product),INDEX(id_cart)
        ) ENGINE = ' . _MYSQL_ENGINE_ . ' CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci')
        && Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_blockwishlist_statistics` ( 
        `id_statistics` INT(11) NOT NULL AUTO_INCREMENT , 
        `id_cart` INT(11) NOT NULL , 
        `id_product` INT(11) NOT NULL , 
        `id_product_attribute` INT(11) NOT NULL , 
        `date_add` DATETIME NOT NULL , 
        `id_shop` INT(11) NOT NULL , 
        PRIMARY KEY (`id_statistics`), INDEX (`id_cart`), INDEX (`id_product`), INDEX (`id_product_attribute`), INDEX (`id_shop`)) ENGINE = ' . _MYSQL_ENGINE_ . ' CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci');
    }
    public static function unInstallDb()
    {
        $tables = array(
            'ets_wishlist',
            'ets_wishlist_email',
            'ets_wishlist_product',
            'ets_wishlist_product_cart',
            'ets_blockwishlist_statistics',
        );
        if($tables)
        {
            foreach($tables as $table)
               Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . pSQL($table).'`'); 
        }
        return true;
    }
}