<?php

class ptProduct extends ProductCore
{
    /**
     * Insert Purchase Together
    */
    public static function addPurchaseTogether($id_product,$id_product_related, $id_product_attribute, $id_shop)
    {
        if(!$id_product || !$id_product_related)
            return false;
        else{
            return Db::getInstance()->insert('ets_purchase_together',
                array(
                    'id_product' => (int)$id_product,
                    'id_product_related' => (int)$id_product_related,
                    'id_product_attribute_related' => (int)$id_product_attribute,
                    'id_shop' => (int)$id_shop
                )
            );
        }
    }
    /**
     * Delete Purchase Together
    */
    public static function deletePurchaseTogether($id_product,$id_product_related, $id_product_attribute, $id_shop)
    {
        if(!$id_product || !$id_product_related || !$id_shop)
            return false;
        else{
            return Db::getInstance()->delete('ets_purchase_together','id_product = '.(int)$id_product.' 
                AND id_product_related = '.(int)$id_product_related.' 
                AND id_product_attribute_related = '.(int)$id_product_attribute.'
                AND id_shop='.(int)$id_shop
            );
        }
    }
    
    /**
     * Exits item Purchase Together
    */
    public static function getExits($id_product, $id_product_related, $id_product_attribute, $id_shop)
    {
        if(!$id_product || !$id_product_related)
            return false;
        else{
            return Db::getInstance()->getRow("SELECT * FROM `"._DB_PREFIX_."ets_purchase_together` 
                WHERE id_product = '".(int)$id_product."' AND id_product_related = '".(int)$id_product_related."' 
                AND id_product_attribute_related = '".(int)$id_product_attribute."'
                AND id_shop ='".(int)$id_shop."'");
        }
    }

    public static function getProductAttribute_v17($product_addeds)
    {
        $context = Context::getContext();
        $products_list = array();
        if (is_array($product_addeds) && !$product_addeds)
            return;
        foreach ($product_addeds as $key => $value) {
            $products_list[] = ptProduct::getProductAttribute((int)$value['id_product'], (int)$value['id_product_attribute'], $context->shop->id);
        }
        $assembler = new ProductAssembler($context);

        $presenterFactory = new ProductPresenterFactory($context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new PrestaShop\PrestaShop\Core\Product\ProductListingPresenter(
            new PrestaShop\PrestaShop\Adapter\Image\ImageRetriever(
                $context->link
            ),
            $context->link,
            new PrestaShop\PrestaShop\Adapter\Product\PriceFormatter(),
            new PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever(),
            $context->getTranslator()
        );
        $products_for_template = [];
        foreach ($products_list as $rawProduct) {
            $productErrorKey = $rawProduct['id_product'] . '_' . $rawProduct['id_product_attribute'];
            $productForTemplate = [
                'product' => $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct($rawProduct),
                    $context->language
                ),
                'errors' => []
            ];
            if (isset($product_addeds[$productErrorKey]['errors'])) {
                $productForTemplate['errors'] = $product_addeds[$productErrorKey]['errors'];
            }
            $products_for_template[] = $productForTemplate;
        }
        return $products_for_template;
    }
    
    public function getItemProducts_v17()
    {
        $context = Context::getContext();
        $products_list = $this->getItemProducts();
        
        $assembler = new ProductAssembler($context);

        $presenterFactory = new ProductPresenterFactory($context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new PrestaShop\PrestaShop\Core\Product\ProductListingPresenter(
            new PrestaShop\PrestaShop\Adapter\Image\ImageRetriever(
                $context->link
            ),
            $context->link,
            new PrestaShop\PrestaShop\Adapter\Product\PriceFormatter(),
            new PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever(),
            $context->getTranslator()
        );
        $products_for_template = [];

        foreach ($products_list as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $context->language
            );
        }
        return $products_for_template;
    }
    
    public static function getProductAttribute($id_product, $id_product_attribute, $id_shop)
    {
        $context = Context::getContext();
        $id_lang = $context->language->id;
        $query = 'SELECT p.`id_product`, pas.`id_product_attribute` as `id_product_attribute`, p.ean13, p.id_category_default,
            pl.`link_rewrite`, p.`reference`, pl.`name`, pl.`description`, pl.`description_short`, "" as `attribute_small` ,image_shop.`id_image` id_image, il.`legend` 
    		FROM `'._DB_PREFIX_.'product` p
    		'.Shop::addSqlAssociation('product', 'p').'
            LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` pas ON (p.`id_product` = pas.`id_product` AND pas.id_shop='.(int)$id_shop.')
    		LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.id_product = p.`id_product` AND pl.id_lang = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').')
    		LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop ON (image_shop.`id_product` = p.`id_product` AND image_shop.id_shop='.(int)$id_shop.')
    		LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
            WHERE p.id_product = '.(int)$id_product.($id_product_attribute?' AND pas.`id_product_attribute` = '.(int)$id_product_attribute:'').'
            GROUP BY pas.`id_product_attribute` ';    
        if(($item = Db::getInstance()->getRow($query)) && $item){
            if (Combination::isFeatureActive() && $item['id_product_attribute']){
                $sql = 'SELECT pa.`id_product_attribute`, pa.`reference`, ag.`id_attribute_group`, pai.`id_image`, agl.`name` AS group_name, al.`name` AS attribute_name,
    						a.`id_attribute`, null as `rewrite_attribute`   
    					FROM `'._DB_PREFIX_.'product_attribute` pa
                        '.Product::sqlStock('pa', (int)$item['id_product_attribute']).' 
    					'.Shop::addSqlAssociation('product_attribute', 'pa').' 
    					LEFT JOIN `'._DB_PREFIX_.'product_attribute_combination` pac ON pac.`id_product_attribute` = pa.`id_product_attribute` 
    					LEFT JOIN `'._DB_PREFIX_.'attribute` a ON a.`id_attribute` = pac.`id_attribute` 
    					LEFT JOIN `'._DB_PREFIX_.'attribute_group` ag ON ag.`id_attribute_group` = a.`id_attribute_group` 
    					LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al ON (a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = '.(int)$id_lang.')
    					LEFT JOIN `'._DB_PREFIX_.'attribute_group_lang` agl ON (ag.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = '.(int)$id_lang.')
    					LEFT JOIN `'._DB_PREFIX_.'product_attribute_image` pai ON pai.`id_product_attribute` = pa.`id_product_attribute`
    					WHERE pa.`id_product` = '.(int)$item['id_product'].' AND pa.`id_product_attribute`='.(int)$item['id_product_attribute'].' 
    					GROUP BY pa.`id_product_attribute`, ag.`id_attribute_group`
    					ORDER BY pa.`id_product_attribute` DESC';
                $combinations = Db::getInstance()->executeS($sql);
                if (!empty($combinations)) {
                    $results = array();
                    foreach ($combinations as $k => $combination) {
                        !empty($results[$combination['id_product_attribute']]['name']) ? $results[$combination['id_product_attribute']]['name'] .= ' '.$combination['group_name'].'-'.$combination['attribute_name']
                        : $results[$combination['id_product_attribute']]['name'] = $item['attribute_small'].' '.$combination['group_name'].'-'.$combination['attribute_name'];
                        
                        if (!empty($combination['reference'])) {
                            $results[$combination['id_product_attribute']]['reference'] = $combination['reference'];
                        } else {
                            $results[$combination['id_product_attribute']]['reference'] = !empty($item['reference']) ? $item['reference'] : '';
                        }
                        if (empty($results[$combination['id_product_attribute']]['id_image'])) {
                            $results[$combination['id_product_attribute']]['id_image'] = !empty($combination['id_image'])?$combination['id_image']: $item['id_image'];
                        }
                        $group_name =  str_replace(Configuration::get('PS_ATTRIBUTE_ANCHOR_SEPARATOR'), '_', Tools::link_rewrite(str_replace(array(',', '.'), '-', $combination['group_name'])));
                        $attribute_name =  str_replace(Configuration::get('PS_ATTRIBUTE_ANCHOR_SEPARATOR'), '_', Tools::link_rewrite(str_replace(array(',', '.'), '-', $combination['attribute_name'])));
                        
                        !empty($results[$combination['id_product_attribute']]['rewrite_attribute']) ? $results[$combination['id_product_attribute']]['rewrite_attribute'] .= '/'.$combination['id_attribute'].'-'.$group_name.'-'.$attribute_name
                        : $results[$combination['id_product_attribute']]['rewrite_attribute'] = $combination['id_attribute'].'-'.$group_name.'-'.$attribute_name;
                    
                    }
                    $results = array_values($results);
                    if(is_array($results) && $results){
                        $item['attribute_small'] = $results[0]['name'];
                        $item['reference'] = $results[0]['reference'];
                        $item['id_image'] = $results[0]['id_image'];
                        $item['rewrite_attribute'] = $results[0]['rewrite_attribute'];
                    }
                }
            }
            $item['category'] = Category::getLinkRewrite((int)$item['id_category_default'], (int)$id_lang);
            (isset($item['rewrite_attribute']) && $item['rewrite_attribute'])?
            $item['link'] = $context->link->getProductLink((int)$item['id_product'], $item['link_rewrite'], $item['category'], $item['ean13']).'#/'.$item['rewrite_attribute']
            :$item['link'] = $context->link->getProductLink((int)$item['id_product'], $item['link_rewrite'], $item['category'], $item['ean13']);
            $item['price_tax_exc'] = Product::getPriceStatic(
                (int)$item['id_product'],
                false,
                (int)$item['id_product_attribute'],
                (self::$_taxCalculationMethod == PS_TAX_EXC ? 2 : 6)
            );
            if (self::$_taxCalculationMethod == PS_TAX_EXC) {
                $item['price_tax_exc'] = Tools::ps_round($item['price_tax_exc'], 2);
                $item['price'] = Product::getPriceStatic(
                    (int)$item['id_product'],
                    true,
                    (int)$item['id_product_attribute'],
                    6
                );
                $item['price_without_reduction'] = Product::getPriceStatic(
                    (int)$item['id_product'],
                    false,
                    (int)$item['id_product_attribute'],
                    2,
                    null,
                    false,
                    false
                );
            } else {
                $item['price'] = Tools::ps_round(
                    Product::getPriceStatic(
                        (int)$item['id_product'],
                        true,
                        (int)$item['id_product_attribute'],
                        6
                    ),
                    (int)Configuration::get('PS_PRICE_DISPLAY_PRECISION')
                );
                $item['price_without_reduction'] = Product::getPriceStatic(
                    (int)$item['id_product'],
                    true,
                    (int)$item['id_product_attribute'],
                    6,
                    null,
                    false,
                    false
                );
            }
            $item['reduction'] = Product::getPriceStatic(
                (int)$item['id_product'],
                (bool)Tax::excludeTaxeOption(),
                (int)$item['id_product_attribute'],
                6,
                null,
                true,
                true,
                1,
                true,
                null,
                null,
                null,
                $specific_prices
            );
            $item['specific_prices'] = $specific_prices;
            
            if(is_array($item) && $item)
                return $item;
        }else
            return array();
    }
     
    public function getItemProducts()
    {
        $context = Context::getContext();
        $query = 'SELECT p.`id_product`, ept.`id_product_attribute_related` as `id_product_attribute`, p.ean13, p.id_category_default, pl.`description`, pl.`description_short`, 
            pl.`link_rewrite`, p.`reference`, p.on_sale, p.show_price, pl.`name` as `name_attribute`,"" as `attribute_small` , pl.`available_now`, pl.`available_later`,image_shop.`id_image` id_image, il.`legend`, 
            stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, DATEDIFF(
                p.`date_add`,
                DATE_SUB(
                  "'.date('Y-m-d').' 00:00:00",
                  INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY
                )
              ) > 0 AS new 
    		FROM `'._DB_PREFIX_.'product` p
            INNER JOIN `'._DB_PREFIX_.'ets_purchase_together` ept ON (ept.`id_product_related` = p.id_product)
    		'.Shop::addSqlAssociation('product', 'p').'
            '.Product::sqlStock('p', 0).'
    		LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.id_product = ept.`id_product_related` AND pl.id_lang = '.(int)$context->language->id.Shop::addSqlRestrictionOnLang('pl').')
    		LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
    			ON (image_shop.`id_product` = ept.`id_product_related` AND image_shop.id_shop='.(int)$context->shop->id.')
    		LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$context->language->id.')
            WHERE ept.id_product = '.(int)$this->id.' AND ept.id_shop = '.(int)$context->shop->id.' 
            GROUP BY ept.`id_product_attribute_related`';   
        
        if(($items = Db::getInstance()->executeS($query)) && $items)
        {
            foreach ($items as &$item) 
            {
                $id_lang = $context->language->id;
                if (Combination::isFeatureActive() && $item['id_product_attribute'])
                {
                    $sql = 'SELECT pa.`id_product_attribute`, pa.`reference`, ag.`id_attribute_group`, pai.`id_image`, agl.`name` AS group_name, al.`name` AS attribute_name,
        						a.`id_attribute`, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, null as `rewrite_attribute`   
        					FROM `'._DB_PREFIX_.'product_attribute` pa
                            '.Product::sqlStock('pa', (int)$item['id_product_attribute']).' 
        					'.Shop::addSqlAssociation('product_attribute', 'pa').' 
        					LEFT JOIN `'._DB_PREFIX_.'product_attribute_combination` pac ON pac.`id_product_attribute` = pa.`id_product_attribute` 
        					LEFT JOIN `'._DB_PREFIX_.'attribute` a ON a.`id_attribute` = pac.`id_attribute` 
        					LEFT JOIN `'._DB_PREFIX_.'attribute_group` ag ON ag.`id_attribute_group` = a.`id_attribute_group` 
        					LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al ON (a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = '.(int)$context->language->id.')
        					LEFT JOIN `'._DB_PREFIX_.'attribute_group_lang` agl ON (ag.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = '.(int)$context->language->id.')
        					LEFT JOIN `'._DB_PREFIX_.'product_attribute_image` pai ON pai.`id_product_attribute` = pa.`id_product_attribute`
        					WHERE pa.`id_product` = '.(int)$item['id_product'].' AND pa.`id_product_attribute`='.(int)$item['id_product_attribute'].' 
        					GROUP BY pa.`id_product_attribute`, ag.`id_attribute_group`
        					ORDER BY pa.`id_product_attribute` DESC';
                    $combinations = Db::getInstance()->executeS($sql);
                    if (!empty($combinations)) 
                    {
                        $results = array();
                        foreach ($combinations as $k => $combination) 
                        {
                            !empty($results[$combination['id_product_attribute']]['name']) ? $results[$combination['id_product_attribute']]['name'] .= ', '.$combination['group_name'].': '.$combination['attribute_name']
                            : $results[$combination['id_product_attribute']]['name'] = $item['attribute_small'].' '.$combination['group_name'].': '.$combination['attribute_name'];
                            
                            if (!empty($combination['reference'])) {
                                $results[$combination['id_product_attribute']]['reference'] = $combination['reference'];
                            } else {
                                $results[$combination['id_product_attribute']]['reference'] = !empty($item['reference']) ? $item['reference'] : '';
                            }
                            if (empty($results[$combination['id_product_attribute']]['id_image'])) {
                                $results[$combination['id_product_attribute']]['id_image'] = !empty($combination['id_image'])?$combination['id_image']: $item['id_image'];
                            }
                            if (empty($results[$combination['id_product_attribute']]['out_of_stock'])) {
                                $results[$combination['id_product_attribute']]['out_of_stock'] = $combination['out_of_stock'];
                            }
                            if (empty($results[$combination['id_product_attribute']]['quantity'])) {
                                $results[$combination['id_product_attribute']]['quantity'] = $combination['quantity'];
                            }
                            /*get linkrewite attribute*/
                            $group_name =  str_replace(Configuration::get('PS_ATTRIBUTE_ANCHOR_SEPARATOR'), '_', Tools::link_rewrite(str_replace(array(',', '.'), '-', $combination['group_name'])));
                            $attribute_name =  str_replace(Configuration::get('PS_ATTRIBUTE_ANCHOR_SEPARATOR'), '_', Tools::link_rewrite(str_replace(array(',', '.'), '-', $combination['attribute_name'])));
                            
                            !empty($results[$combination['id_product_attribute']]['rewrite_attribute']) ? $results[$combination['id_product_attribute']]['rewrite_attribute'] .= '/'.$combination['id_attribute'].'-'.$group_name.'-'.$attribute_name
                            : $results[$combination['id_product_attribute']]['rewrite_attribute'] = $combination['id_attribute'].'-'.$group_name.'-'.$attribute_name;
                        
                        }
                        $results = array_values($results);
                        if(is_array($results) && $results){
                            $item['attribute_small'] = $results[0]['name'];
                            $item['reference'] = $results[0]['reference'];
                            $item['id_image'] = $results[0]['id_image'];
                            $item['out_of_stock'] = $results[0]['out_of_stock'];
                            $item['quantity'] = $results[0]['quantity'];
                            $item['rewrite_attribute'] = $results[0]['rewrite_attribute'];
                        }
                    }
                }
                
                $item['category'] = Category::getLinkRewrite((int)$item['id_category_default'], (int)$id_lang);
                
                (isset($item['rewrite_attribute']) && $item['rewrite_attribute'])?
                $item['link'] = $context->link->getProductLink((int)$item['id_product'], $item['link_rewrite'], $item['category'], $item['ean13']).'#/'.$item['rewrite_attribute']
                :$item['link'] = $context->link->getProductLink((int)$item['id_product'], $item['link_rewrite'], $item['category'], $item['ean13']);
                
                $item['price_tax_exc'] = Product::getPriceStatic(
                    (int)$item['id_product'],
                    false,
                    (int)$item['id_product_attribute'],
                    (self::$_taxCalculationMethod == PS_TAX_EXC ? 2 : 6)
                );
        
                if (self::$_taxCalculationMethod == PS_TAX_EXC) {
                    $item['price_tax_exc'] = Tools::ps_round($item['price_tax_exc'], 2);
                    $item['price'] = Product::getPriceStatic(
                        (int)$item['id_product'],
                        true,
                        (int)$item['id_product_attribute'],
                        6
                    );
                    $item['price_without_reduction'] = Product::getPriceStatic(
                        (int)$item['id_product'],
                        false,
                        (int)$item['id_product_attribute'],
                        2,
                        null,
                        false,
                        false
                    );
                } else {
                    $item['price'] = Tools::ps_round(
                        Product::getPriceStatic(
                            (int)$item['id_product'],
                            true,
                            (int)$item['id_product_attribute'],
                            6
                        ),
                        (int)Configuration::get('PS_PRICE_DISPLAY_PRECISION')
                    );
                    $item['price_without_reduction'] = Product::getPriceStatic(
                        (int)$item['id_product'],
                        true,
                        (int)$item['id_product_attribute'],
                        6,
                        null,
                        false,
                        false
                    );
                }
                $item['reduction'] = Product::getPriceStatic(
                    (int)$item['id_product'],
                    (bool)Tax::excludeTaxeOption(),
                    (int)$item['id_product_attribute'],
                    6,
                    null,
                    true,
                    true,
                    1,
                    true,
                    null,
                    null,
                    null,
                    $specific_prices
                );
                $item['specific_prices'] = $specific_prices;
            }
            return $items;
        }else
            return array();
    }
    
    /**
     * get all item Purchase Together
    */
    public function getAllItems()
    {
        $results = array();
        $context = Context::getContext();
        $query = 'SELECT ept.`id_product_related`, ept.`id_product_attribute_related` as `attribute_related`, pl.`link_rewrite`, p.`reference`, pl.`name`, image_shop.`id_image` id_image, il.`legend` 
    		FROM `'._DB_PREFIX_.'product` p
            INNER JOIN `'._DB_PREFIX_.'ets_purchase_together` ept ON (ept.`id_product_related` = p.id_product)
    		'.Shop::addSqlAssociation('product', 'p').'
    		LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.id_product = ept.`id_product_related` AND pl.id_lang = '.(int)$context->language->id.Shop::addSqlRestrictionOnLang('pl').')
    		LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
    			ON (image_shop.`id_product` = ept.`id_product_related` AND image_shop.id_shop='.(int)$context->shop->id.')
    		LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$context->language->id.')
            WHERE ept.id_product = '.(int)$this->id.' AND ept.id_shop = '.(int)$context->shop->id.' 
            GROUP BY ept.`id_product_attribute_related`';
        if(($items = Db::getInstance()->executeS($query)) && $items)
        {
            foreach ($items as $item) 
            {
                // check if product have combination
                if (Combination::isFeatureActive() && $item['attribute_related']) 
                {
                    $sql = 'SELECT pa.`id_product_attribute`, pa.`reference`, ag.`id_attribute_group`, pai.`id_image`, agl.`name` AS group_name, al.`name` AS attribute_name,
        						a.`id_attribute`
        					FROM `'._DB_PREFIX_.'product_attribute` pa
        					'.Shop::addSqlAssociation('product_attribute', 'pa').'
        					LEFT JOIN `'._DB_PREFIX_.'product_attribute_combination` pac ON pac.`id_product_attribute` = pa.`id_product_attribute`
        					LEFT JOIN `'._DB_PREFIX_.'attribute` a ON a.`id_attribute` = pac.`id_attribute`
        					LEFT JOIN `'._DB_PREFIX_.'attribute_group` ag ON ag.`id_attribute_group` = a.`id_attribute_group`
        					LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al ON (a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = '.(int)$context->language->id.')
        					LEFT JOIN `'._DB_PREFIX_.'attribute_group_lang` agl ON (ag.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = '.(int)$context->language->id.')
        					LEFT JOIN `'._DB_PREFIX_.'product_attribute_image` pai ON pai.`id_product_attribute` = pa.`id_product_attribute`
        					WHERE pa.`id_product` = '.(int)$item['id_product_related'].' AND pa.`id_product_attribute`='.(int)$item['attribute_related'].' 
        					GROUP BY pa.`id_product_attribute`, ag.`id_attribute_group`
        					ORDER BY pa.`id_product_attribute`';
        
                    $combinations = Db::getInstance()->executeS($sql);
                    if (!empty($combinations)) 
                    {
                        foreach ($combinations as $k => $combination) 
                        {
                            $results[$combination['id_product_attribute']]['id_product'] = $item['id_product_related'];
                            $results[$combination['id_product_attribute']]['id_product_attribute'] = $combination['id_product_attribute'];
                            !empty($results[$combination['id_product_attribute']]['name']) ? $results[$combination['id_product_attribute']]['name'] .= ' '.$combination['group_name'].'-'.$combination['attribute_name']
                            : $results[$combination['id_product_attribute']]['name'] = $item['name'].' '.$combination['group_name'].'-'.$combination['attribute_name'];
                            if (!empty($combination['reference'])) {
                                $results[$combination['id_product_attribute']]['ref'] = $combination['reference'];
                            } else {
                                $results[$combination['id_product_attribute']]['ref'] = !empty($item['reference']) ? $item['reference'] : '';
                            }
                            if (empty($results[$combination['id_product_attribute']]['image'])) {
                                $results[$combination['id_product_attribute']]['image'] = !empty($combination['id_image'])?str_replace('http://', Tools::getShopProtocol(), $context->link->getImageLink($item['link_rewrite'], $combination['id_image'], 'home_default')): str_replace('http://', Tools::getShopProtocol(), $context->link->getImageLink($item['link_rewrite'], $item['id_image']));
                            }
                        }
                    } 
                    else 
                    {
                        $product = array(
                            'id_product' => (int)($item['id_product_related']),
                            'id_product_attribute'=>(int)$item['attribute_related'],
                            'name' => $item['name'],
                            'ref' => (!empty($item['reference']) ? $item['reference'] : ''),
                            'image' => str_replace('http://', Tools::getShopProtocol(), $context->link->getImageLink($item['link_rewrite'], $item['id_image'], 'home_default')),
                        );
                        array_push($results, $product);
                    }
                } else {
                    $product = array(
                        'id_product' => (int)($item['id_product_related']),
                        'id_product_attribute'=>0,
                        'name' => $item['name'],
                        'ref' => (!empty($item['reference']) ? $item['reference'] : ''),
                        'image' => str_replace('http://', Tools::getShopProtocol(), $context->link->getImageLink($item['link_rewrite'], $item['id_image'], 'home_default')),
                    );
                    array_push($results, $product);
                }
            }
            $results = array_values($results);
        }
        return $results;
    }
}