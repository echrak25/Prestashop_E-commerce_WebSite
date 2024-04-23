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
{if $blockName=='home' || $blockName=='product' || $blockName=='shipping'}
    {assign var='nbItemsPerLine' value=3}
	{assign var='nbItemsPerLineTablet' value=4}
	{assign var='nbItemsPerLineMobile' value=6}
{else}
    {assign var='nbItemsPerLine' value=12}
	{assign var='nbItemsPerLineTablet' value=12}
	{assign var='nbItemsPerLineMobile' value=4}
{/if}
{if !isset($ajax) || !$ajax}
    <script type="text/javascript">
        {if $blockName=='home' || $blockName=='product' || $blockName=='shipping'}
            var ets_wlp_nbItemsPerLine =4;
            var ets_wlp_nbItemsPerLineTablet =3;
            var ets_wlp_nbItemsPerLineMobile=2;
        {else}
            var ets_wlp_nbItemsPerLine =1;
            var ets_wlp_nbItemsPerLineTablet =1;
            var ets_wlp_nbItemsPerLineMobile=1;
        {/if}
    </script>
{/if}
<div class="{$blockName|escape:'html':'UTF-8'} products product_list wishlist_products_list_wrapper layout-{$ets_wlp_display_type|escape:'html':'UTF-8'} ets_wlp_desktop_{$nbItemsPerLine|intval} ets_wlp_tablet_{$nbItemsPerLineTablet|intval} ets_wlp_mobile_{$nbItemsPerLineMobile|intval}{if $slide_auto_play} auto{/if} ">
    {foreach from=$products item="product"}
      {include file="catalog/_partials/miniatures/product.tpl" product=$product}
    {/foreach}
</div>
<a href="{$allWishlistProductsLink|escape:'html':'UTF-8'}" class="float-xs-left float-md-right ets_wlp_all_products">{l s='All products' mod='ets_wishlist_pres17'} <i class="material-icons">&#xE315;</i></a>