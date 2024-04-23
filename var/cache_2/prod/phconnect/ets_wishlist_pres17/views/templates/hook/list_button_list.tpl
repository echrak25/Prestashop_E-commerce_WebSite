{*
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
*}
<button class="{$ETS_WL_BACKGROUND_BORDER|escape:'html':'UTF-8'} {$ETS_WL_BUTTON_POSITION|escape:'html':'UTF-8'} ets-wishlist-button-add{if $customer_logged}{if $added_to_wishlist} delete_wishlist{else} add_wishlist{/if}{else} login{/if} ets-wishlist-button-add_{$id_product|intval}_{$id_product_attribute|intval}" data-id-product="{$id_product|intval}" data-id-product-attribute="{$id_product_attribute|intval}" data-id_wishlist="{$added_to_wishlist|intval}" data-url="{$url_wishlist nofilter}">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"/>
    </svg>
</button>