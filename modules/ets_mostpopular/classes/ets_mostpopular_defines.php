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

class Ets_mostpopular_defines
{
    public static $instance;
    public $smarty;
    public function __construct()
    {
        if (is_object(Context::getContext()->smarty)) {
            $this->smarty = Context::getContext()->smarty;
        }
    }
    public static function getInstance()
    {
        if (!(isset(self::$instance)) || !self::$instance) {
            self::$instance = new Ets_mostpopular_defines();
        }
        return self::$instance;
    }
    public function l($string)
    {
        return Translate::getModuleTranslation('ets_mostpopular', $string, pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public function getConfigInputs()
    {
        return array(
            array(
                'type' => 'categories',
                'tree' => [
                  'id' => 'home_featured_category',
                  'selected_categories' => [Configuration::get('ETS_MOSTP_HOME_FEATURED_CAT')],
                ],
                'label' => $this->l('Select a category to display featured products'),
                'name' => 'ETS_MOSTP_HOME_FEATURED_CAT',
                'default' => (int)Context::getContext()->shop->getCategory(),
            ),
            array(
                'type' => 'switch',
                'label' => $this->l('Randomly display featured products'),
                'name' => 'ETS_MOSTP_HOME_FEATURED_RANDOMIZE',
                'class' => 'fixed-width-xs',
                'desc' => $this->l('Enable if you wish the products to be displayed randomly (default: no).'),
                'values' => array(
                    array(
                        'id' => 'active_on',
                        'value' => 1,
                        'label' => $this->l('Yes'),
                    ),
                    array(
                        'id' => 'active_off',
                        'value' => 0,
                        'label' => $this->l('No'),
                    ),
                ),
            ),
            array(
                'name' => 'ETS_MOSTP_TILE_HOME_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position home_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Popular products'),
                'default_lang' => 'Popular products',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_MOSTP_NUMBER_PRODUCT_IN_HOME',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position home_block',
                'validate' => 'isUnsignedInt',
                'default' => 8,
                'desc' => $this->l('Leave blank to show all Popular products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_MOSTP_DISPLAY_TYPE_IN_HOME',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position home_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_MOSTP_DISPLAY_TYPE_IN_HOME_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_MOSTP_DISPLAY_TYPE_IN_HOME_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_MOSTP_AUTO_PLAY_HOME',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_MOSTP_AUTO_PLAY_HOME_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_MOSTP_AUTO_PLAY_HOME_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position home_block',
            ),
            array(
                'name' => 'ETS_MOSTP_TILE_LEFT_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position left_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Popular products'),
                'default_lang' => 'Popular products',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_MOSTP_NUMBER_PRODUCT_IN_LEFT',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position left_block',
                'validate' => 'isUnsignedInt',
                'default' =>8,
                'desc' => $this->l('Leave blank to show all Popular products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_MOSTP_DISPLAY_TYPE_IN_LEFT',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position left_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_MOSTP_DISPLAY_TYPE_IN_LEFT_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_MOSTP_DISPLAY_TYPE_IN_LEFT_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
                
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_MOSTP_AUTO_PLAY_LEFT',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_MOSTP_AUTO_PLAY_LEFT_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_MOSTP_AUTO_PLAY_LEFT_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position left_block',
            ),
            array(
                'name' => 'ETS_MOSTP_TILE_RIGHT_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position right_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Popular products'),
                'default_lang' => 'Popular products',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_MOSTP_NUMBER_PRODUCT_IN_RIGHT',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position right_block',
                'validate' => 'isUnsignedInt',
                'default' => 8,
                'desc' => $this->l('Leave blank to show all Popular products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_MOSTP_DISPLAY_TYPE_IN_RIGHT',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position right_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_MOSTP_DISPLAY_TYPE_IN_RIGHT_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_MOSTP_DISPLAY_TYPE_IN_RIGHT_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_MOSTP_AUTO_PLAY_RIGHT',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_MOSTP_AUTO_PLAY_RIGHT_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_MOSTP_AUTO_PLAY_RIGHT_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position right_block',
            ),
            array(
                'name' => 'ETS_MOSTP_TILE_PRODUCT_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position product_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Popular products'),
                'default_lang' => 'Popular products',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_MOSTP_NUMBER_PRODUCT_IN_PRODUCT',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position product_block',
                'validate' => 'isUnsignedInt',
                'default' => 8,
                'desc' => $this->l('Leave blank to show all Popular products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_MOSTP_DISPLAY_TYPE_IN_PRODUCT',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position product_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_MOSTP_DISPLAY_TYPE_IN_PRODUCT_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_MOSTP_DISPLAY_TYPE_IN_PRODUCT_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_MOSTP_AUTO_PLAY_PRODUCT',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_MOSTP_AUTO_PLAY_PRODUCT_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_MOSTP_AUTO_PLAY_PRODUCT_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position product_block',
            ),
        );
    }
    public static function getMostPopularProducts(
        $idLang,
        $pageNumber,
        $productPerPage,
        $orderBy = null,
        $orderWay = null,
        $getTotal = false,
        $active = true,
        $random = false,
        $randomNumberProducts = 1,
        $checkAccess = true,
        Context $context = null
    ) {
        if (!$context) {
            $context = Context::getContext();
        }
        $category = new Category((int) Configuration::get('ETS_MOSTP_HOME_FEATURED_CAT'));
        if(Validate::isLoadedObject($category))
        {
            if ($checkAccess && !$category->checkAccess($context->customer->id)) {
                return false;
            }
            $front = in_array($context->controller->controller_type, ['front', 'modulefront']);
            $idSupplier = (int) Tools::getValue('id_supplier');
    
            /* Return only the number of products */
            if ($getTotal) {
                $sql = 'SELECT COUNT(cp.`id_product`) AS total
    					FROM `' . _DB_PREFIX_ . 'product` p
    					' . Shop::addSqlAssociation('product', 'p') . '
    					LEFT JOIN `' . _DB_PREFIX_ . 'category_product` cp ON p.`id_product` = cp.`id_product`
    					WHERE cp.`id_category` = ' . (int) $category->id.
                    ($front ? ' AND product_shop.`visibility` IN ("both", "catalog")' : '') .
                    ($active ? ' AND product_shop.`active` = 1' : '') .
                    ($idSupplier ? ' AND p.id_supplier = ' . (int) $idSupplier : '');
    
                return (int) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
            }
    
            if ($pageNumber < 1) {
                $pageNumber = 1;
            }
    
            /** Tools::strtolower is a fix for all modules which are now using lowercase values for 'orderBy' parameter */
            $orderBy = $orderBy && Validate::isOrderBy($orderBy) ? Tools::strtolower($orderBy) : 'position';
            $orderWay = $orderWay && Validate::isOrderWay($orderWay) ? Tools::strtoupper($orderWay) : 'ASC';
            if(Configuration::get('ETS_MOSTP_HOME_FEATURED_RANDOMIZE'))
            {
                $random = true;
                $randomNumberProducts = 8;
            }
            $orderByPrefix = false;
            if ($orderBy === 'id_product' || $orderBy === 'date_add' || $orderBy === 'date_upd') {
                $orderByPrefix = 'p';
            } elseif ($orderBy === 'name') {
                $orderByPrefix = 'pl';
            } elseif ($orderBy === 'manufacturer' || $orderBy === 'manufacturer_name') {
                $orderByPrefix = 'm';
                $orderBy = 'name';
            } elseif ($orderBy === 'position') {
                $orderByPrefix = 'cp';
            }
    
            if ($orderBy === 'price') {
                $orderBy = 'orderprice';
            }
    
            $nbDaysNewProduct = Configuration::get('PS_NB_DAYS_NEW_PRODUCT');
            if (!Validate::isUnsignedInt($nbDaysNewProduct)) {
                $nbDaysNewProduct = 20;
            }
    
            $sql = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) AS quantity' . (Combination::isFeatureActive() ? ', IFNULL(product_attribute_shop.id_product_attribute, 0) AS id_product_attribute,
    					product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity' : '') . ', pl.`description`, pl.`description_short`, pl.`available_now`,
    					pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, image_shop.`id_image` id_image,
    					il.`legend` as legend, m.`name` AS manufacturer_name, cl.`name` AS category_default,
    					DATEDIFF(product_shop.`date_add`, DATE_SUB("' . date('Y-m-d') . ' 00:00:00",
    					INTERVAL ' . (int) $nbDaysNewProduct . ' DAY)) > 0 AS new, product_shop.price AS orderprice
    				FROM `' . _DB_PREFIX_ . 'category_product` cp
    				LEFT JOIN `' . _DB_PREFIX_ . 'product` p
    					ON p.`id_product` = cp.`id_product`
    				' . Shop::addSqlAssociation('product', 'p') .
                    (Combination::isFeatureActive() ? ' LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_shop` product_attribute_shop
    				ON (p.`id_product` = product_attribute_shop.`id_product` AND product_attribute_shop.`default_on` = 1 AND product_attribute_shop.id_shop=' . (int) $context->shop->id . ')' : '') . '
    				' . Product::sqlStock('p', 0) . '
    				LEFT JOIN `' . _DB_PREFIX_ . 'category_lang` cl
    					ON (product_shop.`id_category_default` = cl.`id_category`
    					AND cl.`id_lang` = ' . (int) $idLang . Shop::addSqlRestrictionOnLang('cl') . ')
    				LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl
    					ON (p.`id_product` = pl.`id_product`
    					AND pl.`id_lang` = ' . (int) $idLang . Shop::addSqlRestrictionOnLang('pl') . ')
    				LEFT JOIN `' . _DB_PREFIX_ . 'image_shop` image_shop
    					ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop=' . (int) $context->shop->id . ')
    				LEFT JOIN `' . _DB_PREFIX_ . 'image_lang` il
    					ON (image_shop.`id_image` = il.`id_image`
    					AND il.`id_lang` = ' . (int) $idLang . ')
    				LEFT JOIN `' . _DB_PREFIX_ . 'manufacturer` m
    					ON m.`id_manufacturer` = p.`id_manufacturer`
    				WHERE product_shop.`id_shop` = ' . (int) $context->shop->id . '
    					AND cp.`id_category` = ' . (int) $category->id
                        . ($active ? ' AND product_shop.`active` = 1' : '')
                        . ($front ? ' AND product_shop.`visibility` IN ("both", "catalog")' : '')
                        . ($idSupplier ? ' AND p.id_supplier = ' . (int) $idSupplier : '');
    
            if ($random === true) {
                $sql .= ' ORDER BY RAND() LIMIT ' . (int) $randomNumberProducts;
            } elseif ($orderBy !== 'orderprice') {
                $sql .= ' ORDER BY ' . (!empty($orderByPrefix) ? $orderByPrefix . '.' : '') . '`' . bqSQL($orderBy) . '` ' . pSQL($orderWay);
                if($productPerPage  && $productPerPage !==true)
                    $sql .= ' LIMIT ' . (((int) $pageNumber - 1) * (int) $productPerPage) . ',' . (int) $productPerPage;
            }
    
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql, true, false);
            if (!$result) {
                return [];
            }
    
            if ($orderBy === 'orderprice') {
                Tools::orderbyPrice($result, $orderWay);
                $result = array_slice($result, (int) (($pageNumber - 1) * $productPerPage), (int) $productPerPage);
            }
    
            // Modify SQL result
            return Product::getProductsProperties($idLang, $result);
        }
    }
}