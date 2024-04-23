<?php

include(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
if(!class_exists('ptProduct'))
    require_once(dirname(__FILE__).'/classes/ptProduct.php');  
/**
 * ajax add purchase together
*/
$context = Context::getContext();

if(Tools::getIsset('add')){
    if (Tools::getIsset('id_product') && Tools::getIsset('id_product_related') && ($id_product = Tools::getValue('id_product')) && $id_product 
    && ($id_product_related = Tools::getValue('id_product_related')) && $id_product_related && ($id_shop = Tools::getValue('id_shop', 1)) && $id_shop)
    {
        $res = false;
        if(!$id_product || !$id_product_related)
            $res =  false;
        else{
            $id_product_attribute = Tools::getValue('id_product_attribute')?Tools::getValue('id_product_attribute'):0;
            if(!ptProduct::getExits($id_product, $id_product_related, $id_product_attribute, $id_shop)){
                $res =  ptProduct::addPurchaseTogether($id_product, $id_product_related, $id_product_attribute, $id_shop);
            }else
                $res =  false;
        }
        die(json_encode(array(
            'hasError'=>$res ? false : true,
        )));
    }
}
/**
 * ajax delete purchase together
*/
if(Tools::getIsset('del')){
    if (Tools::getIsset('id_product') && Tools::getIsset('id_product_related') && ($id_product = Tools::getValue('id_product')) && $id_product 
    && ($id_product_related = Tools::getValue('id_product_related')) && $id_product_related && ($id_shop = Tools::getValue('id_shop', 1)) && $id_shop)
    {
        $res = false;
        if(!$id_product || !$id_product_related)
            $res =  false;
        else{
            $id_product_attribute = Tools::getValue('id_product_attribute')?Tools::getValue('id_product_attribute'):0;
            if(ptProduct::getExits($id_product, $id_product_related, $id_product_attribute, $id_shop)){
                $res =  ptProduct::deletePurchaseTogether($id_product, $id_product_related, $id_product_attribute, $id_shop);
            }else
                $res =  false;
        }
        die(json_encode(array(
            'hasError'=>$res ? false : true,
        )));
    }
}
/**
 * ajax search product.
*/
$query = Tools::getValue('q', false);
if ($query or $query != '' or Tools::strlen($query) > 1) 
{
    if ($pos = strpos($query, ' (ref:')) {
        $query = Tools::substr($query, 0, $pos);
    }
    
    $excludeIds = Tools::getValue('excludeIds', false);
    $id_product = Tools::getValue('id_product') ? Tools::getValue('id_product') : 0;
    
    if ($excludeIds && $excludeIds != 'NaN') {
        $excludeIds = explode(',', $excludeIds);
    } else {
        $excludeIds = array();
    }
    $excludeVirtuals = (bool)Tools::getValue('excludeVirtuals', true);
    $exclude_packs = (bool)Tools::getValue('exclude_packs', true);
    $id_shop = Tools::getValue('id_shop', 1);
    
    $sql = 'SELECT p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`, image_shop.`id_image` id_image, il.`legend`, p.`cache_default_attribute`
    		FROM `'._DB_PREFIX_.'product` p
    		'.Shop::addSqlAssociation('product', 'p').'
    		LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.id_product = p.id_product AND pl.id_lang = '.(int)$context->language->id.Shop::addSqlRestrictionOnLang('pl').')
    		LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
    			ON (image_shop.`id_product` = p.`id_product` AND image_shop.id_shop='.(int)$id_shop.')
    		LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$context->language->id.')
    		WHERE (pl.name LIKE \'%'.pSQL($query).'%\' OR p.reference LIKE \'%'.pSQL($query).'%\')'.
            ($id_product ? ' AND p.id_product NOT IN('.$id_product.')' : '').
            ($excludeVirtuals ? ' AND NOT EXISTS (SELECT 1 FROM `'._DB_PREFIX_.'product_download` pd WHERE (pd.id_product = p.id_product))' : '').
            ($exclude_packs ? ' AND (p.cache_is_pack IS NULL OR p.cache_is_pack = 0)' : '').
            ' GROUP BY p.id_product';
    $items = Db::getInstance()->executeS($sql);
    if ($items) {
        // packs
        $results = array();
        foreach ($items as $item) 
        {
            if (Combination::isFeatureActive() && $item['cache_default_attribute']) 
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
    					WHERE pa.`id_product` = '.(int)$item['id_product'].'
    					GROUP BY pa.`id_product_attribute`, ag.`id_attribute_group`
    					ORDER BY pa.`id_product_attribute`';
    
                $combinations = Db::getInstance()->executeS($sql);
                if (!empty($combinations)) 
                {
                    foreach ($combinations as $k => $combination) 
                    {
                        if(in_array($item['id_product'].'-'.$combination['id_product_attribute'], $excludeIds))
                            continue;
                        $results[$combination['id_product_attribute']]['id_product'] = $item['id_product'];
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
                    if(in_array($item['id_product'].'-'.$item['cache_default_attribute'], $excludeIds))
                        continue;
                    $product = array(
                        'id_product' => (int)($item['id_product']),
                        'id_product_attribute'=>(int)$item['cache_default_attribute'],
                        'name' => $item['name'],
                        'ref' => (!empty($item['reference']) ? $item['reference'] : ''),
                        'image' => str_replace('http://', Tools::getShopProtocol(), $context->link->getImageLink($item['link_rewrite'], $item['id_image'], 'home_default')),
                    );
                    array_push($results, $product);
                }
            } else {
                if(in_array($item['id_product'].'-0', $excludeIds))
                    continue;
                $product = array(
                    'id_product' => (int)($item['id_product']),
                    'id_product_attribute'=>0,
                    'name' => $item['name'],
                    'ref' => (!empty($item['reference']) ? $item['reference'] : ''),
                    'image' => str_replace('http://', Tools::getShopProtocol(), $context->link->getImageLink($item['link_rewrite'], $item['id_image'], 'home_default')),
                );
                array_push($results, $product);
            }
        }
        $results = array_values($results);
        ob_end_clean();
        die(json_encode($results));
    } else {
        ob_end_clean();
        die(json_encode(new stdClass));
    }    
}
die('ok');
