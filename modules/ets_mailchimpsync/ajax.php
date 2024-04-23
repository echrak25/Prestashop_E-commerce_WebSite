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

	if ( !defined('_PS_ADMIN_DIR_') )
		define('_PS_ADMIN_DIR_', getcwd());
	if ( !defined('PS_ADMIN_DIR') )
		define('PS_ADMIN_DIR', _PS_ADMIN_DIR_);
	include( dirname(__FILE__) . '/../../config/config.inc.php' );
	if ( version_compare(_PS_VERSION_, '1.5.0.0', '<') )
		include( dirname(__FILE__) . '/../../init.php' );

	$ps_version = version_compare(_PS_VERSION_, '1.7.0', '>=') === true ? true : false;

	if ( !Tools ::isSubmit('token') || Tools ::isSubmit('token') && Tools ::getValue('token') != Tools ::getAdminTokenLite('AdminModules') )
		die();

	$query = Tools ::getValue('q', false);
	if ( !$query OR $query == '' OR Tools ::strlen($query) < 1 )
		die();

	/*
	 * In the SQL request the "q" param is used entirely to match result in database.
	 * In this way if string:"(ref : #ref_pattern#)" is displayed on the return list,
	 * they are no return values just because string:"(ref : #ref_pattern#)"
	 * is not write in the name field of the product.
	 * So the ref pattern will be cut for the search request.
	 */
	if ( $pos = strpos($query, ' (ref:') )
		$query = Tools ::substr($query, 0, $pos);

	$excludeIds = Tools ::getValue('excludeIds', false);
	if ( $excludeIds && $excludeIds != 'NaN' )
		$excludeIds = implode(',', array_map('intval', explode(',', $excludeIds)));
	else
		$excludeIds = '';

	// Excluding downloadable products from packs because download from pack is not supported
	$excludeVirtuals = (bool)Tools ::getValue('excludeVirtuals', false);
	$exclude_packs   = (bool)Tools ::getValue('exclude_packs', false);

	$sql = 'SELECT p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`, MAX(image_shop.`id_image`) id_image, il.`legend`
		FROM `' . _DB_PREFIX_ . 'product` p
		LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON (pl.id_product = p.id_product AND pl.id_lang = ' . (int)Context ::getContext() -> language -> id . Shop ::addSqlRestrictionOnLang('pl') . ')
		LEFT JOIN `' . _DB_PREFIX_ . 'image` i ON (i.`id_product` = p.`id_product`)' .
	       Shop ::addSqlAssociation('image', 'i', false, 'image_shop.cover=1') . '
		LEFT JOIN `' . _DB_PREFIX_ . 'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = ' . (int)Context ::getContext() -> language -> id . ')
		WHERE (pl.name LIKE \'%' . pSQL($query) . '%\' OR p.reference LIKE \'%' . pSQL($query) . '%\')' .
	       ( !empty($excludeIds) ? ' AND p.id_product NOT IN (' . pSQL($excludeIds) . ') ' : ' ' ) .
	       ( $excludeVirtuals ? 'AND p.id_product NOT IN (SELECT pd.id_product FROM `' . _DB_PREFIX_ . 'product_download` pd WHERE (pd.id_product = p.id_product))' : '' ) .
	       ( $exclude_packs ? 'AND (p.cache_is_pack IS NULL OR p.cache_is_pack = 0)' : '' ) .
	       ' GROUP BY p.id_product';

	$items = Db ::getInstance() -> executeS($sql);

	$acc = (bool)Tools ::isSubmit('excludeIds');

	if ( $items && $acc )
		foreach ( $items AS $item )
			echo trim($item['name']) . ( !empty($item['reference']) ? ' (ref: ' . $item['reference'] . ')' : '' ) . '|' . (int)( $item['id_product'] ) . "\n";
	elseif ( $items ) {
		// packs
		$results = array();
		foreach ( $items AS $item ) {
			$product = array(
				'id'    => (int)( $item['id_product'] ),
				'name'  => $item['name'],
				'ref'   => ( !empty($item['reference']) ? $item['reference'] : '' ),
				'image' => str_replace('http://', Tools ::getShopProtocol(), Context ::getContext() -> link -> getImageLink($item['link_rewrite'], $item['id_image'], $ps_version ? ImageType ::getFormattedName('home') : ImageType ::getFormatedName('home'))),
			);
			array_push($results, $product);
		}
		echo json_encode($results);
	} else
		die();