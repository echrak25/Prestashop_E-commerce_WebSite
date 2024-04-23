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

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ets_savemycart` (
    `id_ets_savemycart` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_cart` int(11) UNSIGNED NOT NULL,
    `token` varchar(255) NOT NULL,
    `cart_rules` varchar(255) DEFAULT NULL,
    PRIMARY KEY  (`id_ets_savemycart`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ets_savemycart_binding` (
    `id_ets_savemycart` int(11) UNSIGNED NOT NULL,
    `id_cart_binding` int(11) UNSIGNED NOT NULL,
    PRIMARY KEY  (`id_ets_savemycart`, `id_cart_binding`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
';
$sql[] = '
	CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ets_savemycart_cart` (
		`id_cart` int(11) unsigned NOT NULL,
		`id_customer` int(11) unsigned NOT NULL,
		`id_currency` int(11) unsigned NOT NULL,
		`cart_name` varchar(191) COLLATE utf8_general_ci NOT NULL,
		`total` DECIMAL(20,6) NOT NULL DEFAULT "0.00",
		`sub_total` DECIMAL(20,6) NOT NULL DEFAULT "0.00",
		`total_shipping` DECIMAL(20,6) NOT NULL DEFAULT "0.00",
		`total_tax` DECIMAL(20,6) NOT NULL DEFAULT "0.00",
		`date_add` datetime NOT NULL,
		PRIMARY KEY (`id_cart`),
		UNIQUE KEY `id_cart_id_customer` (`id_cart`,`id_customer`),
		KEY `id_customer` (`id_customer`)
	) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
';
$sql[] = '
	CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ets_savemycart_count` (
		`id_count` int(11) NOT NULL AUTO_INCREMENT,
        `id_ets_savemycart` int(11) UNSIGNED NOT NULL,
        `id_cart_binding` int(11) UNSIGNED NOT NULL,
		PRIMARY KEY (`id_count`)
	) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
';
$sql[] = '
	CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ets_savemycart_expired_token` (
		`id_cart` int(11) unsigned NOT NULL,
        `token` varchar(255) NOT NULL,
		PRIMARY KEY (`token`)
	) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
';
$sql[] = '
	CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ets_savemycart_cart_product` (
		`id_cart` int(11) unsigned NOT NULL,
		`id_product` int(11) unsigned NOT NULL,
		`id_address_delivery` int(11) unsigned NOT NULL,
		`id_shop` int(11) unsigned NOT NULL,
		`id_product_attribute` int(11) unsigned NOT NULL,
		`id_customization` int(11) unsigned NOT NULL,
		`quantity` int(11) unsigned NOT NULL,
		`date_add` datetime NOT NULL,
		PRIMARY KEY (`id_cart`,`id_product`,`id_address_delivery`,`id_product_attribute`,`id_customization`)
	) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
