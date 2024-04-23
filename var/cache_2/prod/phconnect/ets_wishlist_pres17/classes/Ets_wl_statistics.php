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
 
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\LegacyContext;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Localization\Locale;
use PrestaShop\PrestaShop\Core\Product\ProductPresenter;

class Ets_wl_statistics extends ObjectModel
{
    /** @var int ID */
    public $id_statistics;

    /** @var int id_product */
    public $id_product;

    /** @var int id_product_attribute */
    public $id_product_attribute;

    /** @var string date_add */
    public $date_add;

    /** @var int|null date_add */
    public $id_cart;

    /** @var int ID */
    public $id_shop;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = [
        'table' => 'ets_blockwishlist_statistics',
        'primary' => 'id_statistics',
        'fields' => [
            'id_cart' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => false],
            'id_product' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true],
            'id_product_attribute' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true],
            'date_add' => ['type' => self::TYPE_DATE, 'required' => true],
            'id_shop' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true],
        ],
    ];
    public static function computeStatsFor($statsRange = null)
    {
        $query = new DbQuery();
        $query->select('id_product');
        $query->select('id_product_attribute');
        $query->select('date_add');
        $query->select('COUNT(*) as count_stats');
        $query->from('ets_blockwishlist_statistics');
        $query->groupBy('id_product');
        $query->groupBy('id_product_attribute');
        $query->where('id_shop = "' . (int) Context::getContext()->shop->id . '"');
        $query->orderBy('count_stats desc');
        $query->limit(10);
        switch ($statsRange) {
            case 'currentYear':
                $dateStart = (new DateTime('now'))->modify('-1 year')->format('Y-m-d H:i:s');
            break;
            case 'currentMonth':
                $dateStart = (new DateTime('now'))->modify('-1 month')->format('Y-m-d H:i:s');
            break;
            case 'currentDay':
                $dateStart = (new DateTime('now'))->modify('-1 day')->format('Y-m-d H:i:s');
            break;
            case 'allTime':
                $dateStart = null;
            break;
            default:
                $dateStart = null;
            break;
        }

        if (null !== $dateStart) {
            $query->where('date_add >= "' . $dateStart . '"');
        }
        $results = Db::getInstance()->executeS($query);
        $stats = [];
        foreach ($results as $result) {
            $productAttributeKey = $result['id_product'] . '.' . $result['id_product_attribute'];
            $stats[$productAttributeKey] = $result['count_stats'];
        }
        self::computeConversionRate($stats, $dateStart);
        return $stats;
    }
    public static function computeConversionRate(&$stats, $dateStart = null)
    {
        $position = 0;
        foreach ($stats as $idProductAndAttribute => $count) {
            // first ID is product, second one is product_attribute
            $combination = '';
            $ids = explode('.', $idProductAndAttribute);
            $id_product = $ids[0];
            $id_product_attribute = $ids[1];
            $context = Context::getContext();
            if(!$context->customer)
                $context->customer = new Customer();
            $productAssembler = new ProductAssembler(Context::getContext());
            $productDetails = $productAssembler->assembleProduct([
                'id_product' => $id_product,
                'id_product_attribute' => $id_product_attribute,
            ]);

            if (!empty($productDetails['attributes'])) {
                $combinationArr = [];
                foreach ($productDetails['attributes'] as $attribute) {
                    $combinationArr[] = $attribute['group'] . ' : ' . $attribute['name'];
                }
                $combination = implode(',', $combinationArr);
            }
            $imgDetails = self::getProductImage($productDetails);
            $stats[$idProductAndAttribute] = [
                'position' => $position,
                'count' => $count,
                'id_product' => $id_product,
                'id_product_attribute' => $id_product_attribute,
                'name' => $productDetails['name'],
                'combination' => $combination,
                'category_name' => $productDetails['category_name'],
                'image_small_url' => $imgDetails['small']['url'],
                'link' => $productDetails['link'],
                'reference' => $productDetails['reference'],
                'price' => Tools::displayPrice($productDetails['price']),
                'quantity' => $productDetails['quantity'],
                'conversionRate' =>self::computeConversionByProduct($id_product, $id_product_attribute, $dateStart) . '%',
            ];

            ++$position;
        }
    }
    public static function getProductImage($productDetails)
    {
        $imgDetails = [];
        $context = Context::getContext();
        $presenterFactory = new ProductPresenterFactory($context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new ProductPresenter(
            new ImageRetriever(
                $context->link
            ),
            $context->link,
            new PriceFormatter(),
            new ProductColorsRetriever(),
            $context->getTranslator()
        );
        $presentedProduct = $presenter->present(
            $presentationSettings,
            $productDetails,
            $context->language
        );
        foreach ($presentedProduct as $key => $value) {
            if ($key == 'embedded_attributes') {
                $imgDetails = $value['cover'];
            }
        }
        return $imgDetails;
    }
    public static function computeConversionByProduct($id_product, $id_product_attribute, $dateStart = null)
    {
        $context = Context::getContext();
        $nbOrderPaidAndShipped = [];
        $queryOrders = '
            SELECT count(distinct(o.id_order)) as nb
            FROM ' . _DB_PREFIX_ . 'orders o
            INNER JOIN ' . _DB_PREFIX_ . 'ets_blockwishlist_statistics bws ON (o.id_cart = bws.id_cart )
            LEFT JOIN ' . _DB_PREFIX_ . 'order_history oh ON (o.`id_order` = oh.`id_order`)
            LEFT JOIN ' . _DB_PREFIX_ . 'order_state os ON (os.`id_order_state` = oh.`id_order_state` AND os.`paid` = 1 AND os.`shipped` = 1)
            LEFT JOIN ' . _DB_PREFIX_ . 'order_detail od ON (od.`id_order` = o.`id_order` AND od.`product_id` = bws.`id_product` AND od.`product_attribute_id` = bws.`id_product_attribute`)
            WHERE bws.`id_cart` <> 0 AND bws.`id_product` = ' . (int) $id_product . ' AND bws.`id_product_attribute` = ' . (int) $id_product_attribute . '
            AND bws.`id_shop` = ' . (int) $context->shop->id . '
            ';
        if (null != $dateStart) {
            $queryOrders .= 'AND bws.date_add >= "' . $dateStart . '"';
        }

        $nbOrderPaidAndShipped = Db::getInstance()->getRow($queryOrders);

        if (empty($nbOrderPaidAndShipped['nb'])) {
            return 0;
        }

        $queryCountAll = new DbQuery();
        $queryCountAll->select('COUNT(id_statistics)');
        $queryCountAll->from('ets_blockwishlist_statistics');
        $queryCountAll->where('id_product = ' . $id_product);
        $queryCountAll->where('id_product_attribute = ' . $id_product_attribute);
        $queryCountAll->where('id_shop = ' . (int) $context->shop->id);

        if (null != $dateStart) {
            $queryCountAll->where('date_add >= "' . $dateStart . '"');
        }

        $countAddedToWishlist = Db::getInstance()->getValue($queryCountAll);

        if (0 != $countAddedToWishlist) {
            return round(($nbOrderPaidAndShipped['nb'] / $countAddedToWishlist) * 100, 2);
        }

        return 0;
    }
}
