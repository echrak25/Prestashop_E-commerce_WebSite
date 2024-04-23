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
 
class Ets_wl_wishList extends ObjectModel
{
    /** @var int Wishlist ID */
    public $id;

    /** @var int Customer ID */
    public $id_customer;

    /** @var int Token */
    public $token;

    /** @var string Name */
    public $name;

    /** @var string Object creation date */
    public $date_add;

    /** @var string Object last modification date */
    public $date_upd;

    /** @var int Object last modification date */
    public $id_shop;

    /** @var int Object last modification date */
    public $id_shop_group;

    /** @var int default */
    public $default;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = [
        'table' => 'ets_wishlist',
        'primary' => 'id_ets_wishlist',
        'fields' => [
            'id_customer' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true],
            'token' => ['type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'required' => true],
            'name' => ['type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'required' => true],
            'date_add' => ['type' => self::TYPE_DATE, 'validate' => 'isDate'],
            'date_upd' => ['type' => self::TYPE_DATE, 'validate' => 'isDate'],
            'id_shop' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedId'],
            'id_shop_group' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedId'],
            'default' => ['type' => self::TYPE_BOOL, 'validate' => 'isBool'],
        ],
    ];

    /**
     * Get Customers having a wishlist
     *
     * @return array Results
     */
    public static function getCustomers()
    {
        $cache_id = 'WishList::getCustomers';

        if (false === Cache::isStored($cache_id)) {
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                SELECT c.`id_customer`, c.`firstname`, c.`lastname`
                    FROM `' . _DB_PREFIX_ . 'wishlist` w
                INNER JOIN `' . _DB_PREFIX_ . 'customer` c ON c.`id_customer` = w.`id_customer`
                ORDER BY c.`firstname` ASC'
            );

            Cache::store($cache_id, $result);
        }

        return Cache::retrieve($cache_id);
    }

    /**
     * Return true if wishlist exists else false
     *
     * @param int $id_wishlist
     * @param int $id_customer
     *
     * @return bool exists
     */
    public static function exists($id_wishlist, $id_customer)
    {
        $result = Db::getInstance()->getRow('
            SELECT 1
            FROM `' . _DB_PREFIX_ . 'wishlist`
            WHERE `id_wishlist` = ' . (int) $id_wishlist . '
            AND `id_customer` = ' . (int) $id_customer . '
            AND `id_shop` = ' . (int) Context::getContext()->shop->id
        );

        return (bool) $result;
    }

    /**
     * Set current WishList as default
     *
     * @return bool
     */
    public function setDefault()
    {
        if ($default = $this->getDefault($this->id_customer)) {
            Db::getInstance()->update('wishlist', ['default' => '0'], 'id_wishlist = ' . (int) $default);
        }

        return Db::getInstance()->update('wishlist', ['default' => '1'], 'id_wishlist = ' . (int) $this->id);
    }

    /**
     * Return if there is a default already set
     *
     * @param int $id_customer
     *
     * @return bool
     */
    public static function isDefault($id_customer)
    {
        return (bool) Db::getInstance()->getValue('SELECT 1 FROM `' . _DB_PREFIX_ . 'wishlist` WHERE `id_customer` = ' . (int) $id_customer . ' AND `default` = 1');
    }

    /**
     * @param int $id_customer
     *
     * @return int
     */
    public static function getDefault($id_customer)
    {
        return (int) Db::getInstance()->getValue('SELECT `id_wishlist` FROM `' . _DB_PREFIX_ . 'wishlist` WHERE `id_customer` = ' . (int) $id_customer . ' AND `default` = 1');
    }

    /**
     * Add product to ID wishlist
     *
     * @param int $id_wishlist
     * @param int $id_customer
     * @param int $id_product
     * @param int $id_product_attribute
     * @param int $quantity
     *
     * @return bool succeed
     */
    public static function addProduct($id_wishlist, $id_customer, $id_product, $id_product_attribute, $quantity)
    {
        $result = Db::getInstance()->getRow('
            SELECT wp.`quantity`
                FROM `' . _DB_PREFIX_ . 'ets_wishlist_product` wp
            JOIN `' . _DB_PREFIX_ . 'ets_wishlist` w ON (w.`id_ets_wishlist` = wp.`id_ets_wishlist`)
            WHERE wp.`id_ets_wishlist` = ' . (int) $id_wishlist . '
            AND w.`id_customer` = ' . (int) $id_customer . '
            AND wp.`id_product` = ' . (int) $id_product . '
            AND wp.`id_product_attribute` = ' . (int) ($id_product_attribute)
        );

        if (!empty($result)) {
            if ((int) $result['quantity'] + (int) $quantity <= 0) {
                return self::removeProduct($id_wishlist, $id_customer, $id_product, $id_product_attribute);
            }

            // TODO: use a method for this like updateProduct ?
            return Db::getInstance()->update(
                'ets_wishlist_product',
                [
                    'quantity' => (int) $quantity + (int) $result['quantity'],
                ],
                '`id_ets_wishlist` = ' . (int) $id_wishlist . ' AND `id_product` = ' . (int) $id_product . ' AND `id_product_attribute` = ' . (int) $id_product_attribute
            );
        }
        return Db::getInstance()->insert(
            'ets_wishlist_product',
            [
                'id_ets_wishlist' => (int) $id_wishlist,
                'id_product' => (int) $id_product,
                'id_product_attribute' => (int) $id_product_attribute,
                'quantity' => (int) $quantity,
                'priority' => 1,
            ]
        );
    }
    public static function checkAddedToWishlist($id_product,$id_product_attribute)
    {
        $result = Db::getInstance()->getRow('
            SELECT wp.`quantity`,w.`id_ets_wishlist`
                FROM `' . _DB_PREFIX_ . 'ets_wishlist_product` wp
            JOIN `' . _DB_PREFIX_ . 'ets_wishlist` w ON (w.`id_ets_wishlist` = wp.`id_ets_wishlist`)
            WHERE  w.`id_customer` = ' . (int) Context::getContext()->customer->id. '
            AND wp.`id_product` = ' . (int) $id_product . '
            AND wp.`id_product_attribute` = ' . (int) ($id_product_attribute)
        );
        if (!empty($result))
        {
            return $result['id_ets_wishlist'];
        }
        else
            return false;
    }

    /**
     * Remove product from wishlist
     *
     * @param int $id_wishlist
     * @param int $id_customer
     * @param int $id_product
     * @param int $id_product_attribute
     *
     * @return bool
     */
    public static function removeProduct($id_wishlist, $id_customer, $id_product, $id_product_attribute)
    {
        if($id_wishlist)
        {
            $result = Db::getInstance()->getRow('
                SELECT w.`id_ets_wishlist`, wp.`id_ets_wishlist_product`
                FROM `' . _DB_PREFIX_ . 'ets_wishlist` w
                INNER JOIN `' . _DB_PREFIX_ . 'ets_wishlist_product` wp ON (wp.`id_ets_wishlist` = w.`id_ets_wishlist`)
                WHERE `id_customer` = ' . (int) $id_customer . ($id_wishlist ? '
                AND w.`id_ets_wishlist` = ' . (int) $id_wishlist:'')
            );
            if (empty($result)) {
                return false;
            }
            Db::getInstance()->delete(
                'ets_wishlist_product_cart',
                'id_ets_wishlist_product = ' . (int) $result['id_ets_wishlist_product']
            );
            return Db::getInstance()->delete(
                'ets_wishlist_product',
                'id_ets_wishlist = ' . (int) $result['id_ets_wishlist'] . ' AND id_product = ' . (int) $id_product . ' AND id_product_attribute = ' . (int) $id_product_attribute
            );
        }
        else
        {
            $result = Db::getInstance()->executeS('
                SELECT w.`id_ets_wishlist`, wp.`id_ets_wishlist_product`
                FROM `' . _DB_PREFIX_ . 'ets_wishlist` w
                INNER JOIN `' . _DB_PREFIX_ . 'ets_wishlist_product` wp ON (wp.`id_ets_wishlist` = w.`id_ets_wishlist`)
                WHERE `id_customer` = ' . (int) $id_customer 
            );
            if (empty($result)) {
                return false;
            }
            if($result)
            {
                foreach($result as $item)
                {
                    Db::getInstance()->delete(
                        'ets_wishlist_product_cart',
                        'id_ets_wishlist_product = ' . (int) $item['id_ets_wishlist_product']
                    );
                    Db::getInstance()->delete(
                        'ets_wishlist_product',
                        'id_ets_wishlist = ' . (int) $item['id_ets_wishlist'] . ' AND id_product = ' . (int) $id_product . ' AND id_product_attribute = ' . (int) $id_product_attribute
                    );
                }
            }
            return true;
        }
    }

    /**
     * Update product to wishlist
     *
     * @param int $id_wishlist
     * @param int $id_product
     * @param int $id_product_attribute
     * @param int $priority
     * @param int $quantity
     *
     * @return bool succeed
     */
    public static function updateProduct($id_wishlist, $id_product, $id_product_attribute, $priority, $quantity)
    {
        if ($priority < 0 || $priority > 2) {
            return false;
        }

        return Db::getInstance()->update(
            'wishlist_product',
            [
                'priority' => (int) $priority,
                'quantity' => (int) $quantity,
            ],
            'id_wishlist = ' . (int) $id_wishlist . 'id_product` = ' . (int) $id_product . 'id_product_attribute` = ' . (int) $id_product_attribute
        );
    }

    /**
     * Get all Wishlists by Customer ID
     *
     * @param int $id_customer
     *
     * @return array Results
     */
    public static function getAllWishlistsByIdCustomer($id_customer,$check_product=false)
    {
        $shop_restriction = '';
        if (Shop::getContextShopID()) {
            $shop_restriction = 'AND id_shop = ' . (int) Shop::getContextShopID();
        } elseif (Shop::getContextShopGroupID()) {
            $shop_restriction = 'AND id_shop_group = ' . (int) Shop::getContextShopGroupID();
        }

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
            SELECT  w.`id_ets_wishlist`, COUNT(wp.`id_product`) AS nbProducts, w.`name`, w.`default`, w.`token`
            FROM `' . _DB_PREFIX_ . 'ets_wishlist_product` wp
            RIGHT JOIN `' . _DB_PREFIX_ . 'ets_wishlist` w ON (w.`id_ets_wishlist` = wp.`id_ets_wishlist`)
            WHERE w.`id_customer` = ' . (int) $id_customer . '
            ' . $shop_restriction . '
            GROUP BY w.`id_ets_wishlist`
            '.($check_product ? ' HAVING nbProducts >0': '').'
            ORDER BY w.`default` DESC, w.`date_add` ASC'
        );
    }

    /**
     * Get products by Wishlist
     *
     * @param int $id_wishlist
     *
     * @return array|false Results
     */
    public static function getProductsByWishlist($id_wishlist)
    {
        $wishlistProducts = Db::getInstance()->executeS('
            SELECT `id_product`, `id_product_attribute`, `quantity`
            FROM `' . _DB_PREFIX_ . 'wishlist_product`
            WHERE `id_wishlist` = ' . (int) $id_wishlist . '
            And quantity > 0'
        );

        if (!empty($wishlistProducts)) {
            return $wishlistProducts;
        }

        return false;
    }

    /**
     * Get Wishlist products by Customer ID
     *
     * @param int $id_wishlist
     * @param int $id_customer
     * @param int $id_lang
     * @param int|null $id_product
     * @param bool $quantity
     *
     * @return array Results
     */
    public static function getProductByIdCustomer($id_wishlist, $id_customer, $id_lang, $id_product = null, $quantity = false)
    {
        $products = Db::getInstance()->executeS('
            SELECT wp.`id_product`, wp.`quantity` as wishlist_quantity, p.`quantity` AS product_quantity, pl.`name`, wp.`id_product_attribute`, wp.`priority`, pl.link_rewrite, cl.link_rewrite AS category_rewrite
            FROM `' . _DB_PREFIX_ . 'wishlist_product` wp
            LEFT JOIN `' . _DB_PREFIX_ . 'product` p ON p.`id_product` = wp.`id_product`
            ' . Shop::addSqlAssociation('product', 'p') . '
            LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON pl.`id_product` = wp.`id_product`' . Shop::addSqlRestrictionOnLang('pl') . '
            LEFT JOIN `' . _DB_PREFIX_ . 'wishlist` w ON w.`id_wishlist` = wp.`id_wishlist`
            LEFT JOIN `' . _DB_PREFIX_ . 'category_lang` cl ON cl.`id_category` = product_shop.`id_category_default` AND cl.id_lang=' . (int) $id_lang . Shop::addSqlRestrictionOnLang('cl') . '
            WHERE w.`id_customer` = ' . (int) $id_customer . '
            AND pl.`id_lang` = ' . (int) $id_lang . '
            AND wp.`id_wishlist` = ' . (int) $id_wishlist .
            (empty($id_product) === false ? ' AND wp.`id_product` = ' . (int) $id_product : '') .
            ($quantity == true ? ' AND wp.`quantity` != 0' : '') . '
            GROUP BY p.id_product, wp.id_product_attribute'
        );

        if (empty($products)) {
            return [];
        }

        for ($i = 0; $i < sizeof($products); ++$i) {
            if (isset($products[$i]['id_product_attribute']) &&
                Validate::isUnsignedInt($products[$i]['id_product_attribute'])) {
                $result = Db::getInstance()->executeS('
                SELECT al.`name` AS attribute_name, pa.`quantity` AS "attribute_quantity"
                FROM `' . _DB_PREFIX_ . 'product_attribute_combination` pac
                LEFT JOIN `' . _DB_PREFIX_ . 'attribute` a ON (a.`id_attribute` = pac.`id_attribute`)
                LEFT JOIN `' . _DB_PREFIX_ . 'attribute_group` ag ON (ag.`id_attribute_group` = a.`id_attribute_group`)
                LEFT JOIN `' . _DB_PREFIX_ . 'attribute_lang` al ON (a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = ' . (int) $id_lang . ')
                LEFT JOIN `' . _DB_PREFIX_ . 'attribute_group_lang` agl ON (ag.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = ' . (int) $id_lang . ')
                LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute` pa ON (pac.`id_product_attribute` = pa.`id_product_attribute`)
                ' . Shop::addSqlAssociation('product_attribute', 'pa') . '
                WHERE pac.`id_product_attribute` = ' . (int) ($products[$i]['id_product_attribute']));
                $products[$i]['attributes_small'] = '';
                if ($result) {
                    foreach ($result as $row) {
                        $products[$i]['attributes_small'] .= $row['attribute_name'] . ', ';
                    }
                }
                $products[$i]['attributes_small'] = rtrim($products[$i]['attributes_small'], ', ');
                if (isset($result[0])) {
                    $products[$i]['attribute_quantity'] = $result[0]['attribute_quantity'];
                }
            } else {
                $products[$i]['attribute_quantity'] = $products[$i]['product_quantity'];
            }
        }

        return $products;
    }

    /**
     * Add bought product
     *
     * @param int $id_wishlist
     * @param int $id_product
     * @param int $id_product_attribute
     * @param int $id_cart
     * @param int $quantity
     *
     * @return bool succeed
     */
    public static function addBoughtProduct($id_wishlist, $id_product, $id_product_attribute, $id_cart, $quantity)
    {
        $result = Db::getInstance()->getRow('
            SELECT `quantity`, `id_ets_wishlist_product`
            FROM `' . _DB_PREFIX_ . 'ets_wishlist_product` wp
            WHERE `id_ets_wishlist` = ' . (int) $id_wishlist . '
            AND `id_product` = ' . (int) $id_product . '
            AND `id_product_attribute` = ' . (int) $id_product_attribute
        );

        if (empty($result) ||
            ($result['quantity'] - $quantity) < 0 ||
            $quantity > $result['quantity']) {
            return false;
        }
        Db::getInstance()->executeS('
            SELECT *
            FROM `' . _DB_PREFIX_ . 'ets_wishlist_product_cart`
            WHERE `id_ets_wishlist_product`=' . (int) $result['id_ets_wishlist_product'] . ' AND `id_cart`=' . (int) $id_cart
        );

        if (Db::getInstance()->NumRows() > 0) {
            $result2 = Db::getInstance()->execute('
                UPDATE `' . _DB_PREFIX_ . 'ets_wishlist_product_cart`
                SET `quantity`=`quantity` + ' . (int) $quantity . '
                WHERE `id_ets_wishlist_product`=' . (int) $result['id_ets_wishlist_product'] . ' AND `id_cart`=' . (int) $id_cart
            );
        } else {
            $result2 = Db::getInstance()->execute('
                INSERT INTO `' . _DB_PREFIX_ . 'ets_wishlist_product_cart`
                (`id_ets_wishlist_product`, `id_cart`, `quantity`, `date_add`) VALUES(
                ' . (int) $result['id_ets_wishlist_product'] . ',
                ' . (int) $id_cart . ',
                ' . (int) $quantity . ',
                \'' . pSQL(date('Y-m-d H:i:s')) . '\')');
        }

        if ($result2 === false) {
            return false;
        }

        $newQuantity = (int) $result['quantity'] - (int) $quantity;
        $minimalQuantity = self::getMinimalProductQuantity($id_product, $id_product_attribute);
        return Db::getInstance()->execute('
            UPDATE `' . _DB_PREFIX_ . 'ets_wishlist_product` SET
            `quantity` = ' . (int) max($minimalQuantity, $newQuantity) . '
            WHERE `id_ets_wishlist` = ' . (int) $id_wishlist . '
            AND `id_product` = ' . (int) $id_product . '
            AND `id_product_attribute` = ' . (int) $id_product_attribute);
    }

    /**
     * @param int $id_customer
     * @param int $idShop
     *
     * @return array|false
     */
    public static function getAllProductByCustomer($id_customer, $idShop)
    {
        $result = Db::getInstance()->executeS('
            SELECT  `id_product`, `id_product_attribute`, w.`id_wishlist`, wp.`quantity`
            FROM `' . _DB_PREFIX_ . 'wishlist_product` wp
            LEFT JOIN `' . _DB_PREFIX_ . 'wishlist` w ON (w.`id_wishlist` = wp.`id_wishlist`)
            WHERE w.`id_customer` = ' . (int) $id_customer . '
            AND w.id_shop = ' . (int) $idShop . '
            AND wp.`quantity` > 0 ');

        if (empty($result)) {
            return false;
        }

        return $result;
    }

    /**
     * Get ID wishlist by Token
     *
     * @param string $token
     *
     * @return array Results
     *
     * @throws PrestaShopException
     */
    public static function getByToken($token)
    {
        if (empty($token) || false === Validate::isMessage($token)) {
            throw new PrestaShopException('Invalid token');
        }

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
            SELECT w.`id_ets_wishlist`, w.`name`, w.`id_customer`, c.`firstname`, c.`lastname`
            FROM `' . _DB_PREFIX_ . 'ets_wishlist` w
            INNER JOIN `' . _DB_PREFIX_ . 'customer` c ON c.`id_customer` = w.`id_customer`
            WHERE `token` = \'' . pSQL($token) . '\''
        );
    }

    /**
     * @param int $idProduct
     * @param int $idAttribute
     *
     * @return int
     */
    private static function getMinimalProductQuantity($idProduct, $idAttribute)
    {
        if ($idAttribute) {
            $minimalQuantity = Attribute::getAttributeMinimalQty($idAttribute);
            if (false !== $minimalQuantity) {
                return (int) $minimalQuantity;
            }
        }

        return (int) (new Product($idProduct))->minimal_quantity;
    }
    public function getProductsOrCount(
        $type = 'products',
        $sort='',$start=0,$limit=10
    ) {
        $context = Context::getContext();
        $querySearch = new DbQuery();
        if ('products' === $type) {
            $querySearch->select('p.*');
            $querySearch->select('wp.quantity AS wishlist_quantity');
            $querySearch->select('product_shop.*');
            $querySearch->select('stock.out_of_stock, IFNULL(stock.quantity, 0) AS quantity');
            $querySearch->select('pl.`description`, pl.`description_short`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`,
            pl.`meta_title`, pl.`name`, pl.`available_now`, pl.`available_later`');
            $querySearch->select('image_shop.`id_image` AS id_image');
            $querySearch->select('il.`legend`');
            $querySearch->select('
            DATEDIFF(
                product_shop.`date_add`,
                DATE_SUB(
                    "' . date('Y-m-d') . ' 00:00:00",
                    INTERVAL ' . (0 <= (int) Configuration::get('PS_NB_DAYS_NEW_PRODUCT') ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20) . ' DAY
                )
            ) > 0 AS new'
            );

            if (Combination::isFeatureActive()) {
                $querySearch->select('product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity, IFNULL(product_attribute_shop.`id_product_attribute`,0) AS id_product_attribute');
            }
        } else {
            $querySearch->select('COUNT(wp.id_product)');
        }
        $querySearch->from('product', 'p');
        $querySearch->join(Shop::addSqlAssociation('product', 'p'));
        $querySearch->innerJoin('ets_wishlist_product', 'wp', 'wp.`id_product` = p.`id_product`');
        $querySearch->leftJoin('category_product', 'cp', 'p.id_product = cp.id_product AND cp.id_category = product_shop.id_category_default');

        if (Combination::isFeatureActive()) {
            $querySearch->leftJoin('product_attribute_shop', 'product_attribute_shop', 'p.`id_product` = product_attribute_shop.`id_product` AND product_attribute_shop.`id_product_attribute` = wp.id_product_attribute AND product_attribute_shop.id_shop=' . (int) $context->shop->id);
        }
        if ('products' === $type) {
            $querySearch->leftJoin('stock_available', 'stock', 'stock.id_product = `p`.id_product AND stock.id_product_attribute = wp.id_product_attribute' . \StockAvailable::addSqlShopRestriction(null, (int) $context->shop->id, 'stock'));
            $querySearch->leftJoin('product_lang', 'pl', 'p.`id_product` = pl.`id_product` AND pl.`id_lang` = ' . (int) $context->language->id . \Shop::addSqlRestrictionOnLang('pl'));
            $querySearch->leftJoin('image_shop', 'image_shop', 'image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop = ' . (int) $context->shop->id);
            $querySearch->leftJoin('image_lang', 'il', 'image_shop.`id_image` = il.`id_image` AND il.`id_lang` = ' . (int) $context->language->id);
            $querySearch->leftJoin('category', 'ca', 'cp.`id_category` = ca.`id_category` AND ca.`active` = 1');
        }

        if (Group::isFeatureActive()) {
            $groups = FrontController::getCurrentCustomerGroups();
            $sqlGroups = false === empty($groups) ? 'IN (' . implode(',', $groups) . ')' : '=' . (int) Group::getCurrent()->id;
            $querySearch->leftJoin('category_group', 'cg', 'cp.`id_category` = cg.`id_category` AND cg.`id_group`' . $sqlGroups);
        }

        $querySearch->where('wp.id_ets_wishlist = ' . (int) $this->id);
        $querySearch->where('product_shop.active = 1');
        $querySearch->where('product_shop.visibility IN ("both", "catalog")');

        if ('products' === $type) {
            if($sort)
                $querySearch->orderBy($sort);
            if($limit)
                $querySearch->limit($limit,$start);
            $products = Db::getInstance()->executeS($querySearch);
            if (empty($products)) {
                return [];
            }
            return Product::getProductsProperties((int) $context->language->id, $products);
        }

        return (int) Db::getInstance()->getValue($querySearch);
    }
    public static function printProductsById($id_wishlist)
    {
        $sql ='SELECT wp.id_product,wp.id_product_attribute,pl.name FROM `'._DB_PREFIX_.'ets_wishlist_product` wp
        INNER JOIN '._DB_PREFIX_.'product p ON (p.id_product = wp.id_product)
        LEFT JOIN '._DB_PREFIX_.'product_lang pl ON (pl.id_product= p.id_product AND pl.id_lang="'.(int)Context::getContext()->language->id.'")
        WHERE wp.id_ets_wishlist='.(int)$id_wishlist;
        $products = Db::getInstance()->executeS($sql);
        if($products)
        {
            foreach($products as &$product)
            {
                $product_class = new Product($product['id_product'],false,Context::getContext()->language->id);
                $image=false;
                if($product['id_product_attribute'])
                {
                    $sql = 'SELECT * FROM `'._DB_PREFIX_.'product_attribute_image` pai
                    INNER JOIN `'._DB_PREFIX_.'image` i ON pai.id_image=i.id_image WHERE pai.id_product_attribute='.(int)$product['id_product_attribute'];
                    if(!$image = Db::getInstance()->getRow($sql.' AND i.cover=1'))
                        $image  = Db::getInstance()->getRow($sql);
                }
                if(!$image)
                {
                    $sql = 'SELECT i.id_image FROM `'._DB_PREFIX_.'image` i';
                    if($product['id_product_attribute'])
                        $sql .= ' LEFT JOIN `'._DB_PREFIX_.'product_attribute_image` pai ON (i.id_image=pai.id_image AND pai.id_product_attribute="'.(int)$product['id_product_attribute'].'")';
                    $sql .= ' WHERE i.id_product="'.(int)$product['id_product'].'"';
                    if(!$image = Db::getInstance()->getRow($sql.' AND i.cover=1'))
                    {
                        $image = Db::getInstance()->getRow($sql);
                    }
                }
                if($image)
                {
                    if(version_compare(_PS_VERSION_, '1.7', '>='))
                        $type_image= ImageType::getFormattedName('small');
                    else
                        $type_image= ImageType::getFormatedName('small');
                    $product['image'] =  Context::getContext()->link->getImageLink($product_class->link_rewrite,$image['id_image'],$type_image);
                }
                else
                {
                    $product['image'] = '';
                }
            }
        }
        if($products)
        {
            Context::getContext()->smarty->assign(
                array(
                    'products' => $products,
                    'link'=> Context::getContext()->link,
                )
            );
            return Context::getContext()->smarty->fetch(_PS_MODULE_DIR_.'ets_wishlist_pres17/views/templates/hook/images.tpl');
        }
        
    }
}
