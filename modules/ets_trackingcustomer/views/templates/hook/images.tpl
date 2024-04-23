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
{if $products}
    {if $no_html}
        {foreach from = $products item='product'}
            {$product.product_name|escape:'html':'UTF-8'} ({$product.product_quantity|intval} {if $product.product_quantity >1}{l s='items' mod='ets_trackingcustomer'}{else}{l s='item' mod='ets_trackingcustomer'}{/if}), 
        {/foreach}
    {else}
        <div class="list-order-products">
            {foreach from = $products item='product'}
                <a target="_blank" href="{$link->getProductLink($product.product_id,null,null,null,null,null,$product.product_attribute_id)|escape:'html':'UTF-8'}" title="{$product.product_name|escape:'html':'UTF-8'} ({$product.product_quantity|intval} {if $product.product_quantity >1}{l s='items' mod='ets_trackingcustomer'}{else}{l s='item' mod='ets_trackingcustomer'}{/if})">
                    {if $product.image}
                        <img src="{$product.image|escape:'html':'UTF-8'}" alt="{$product.product_name|escape:'html':'UTF-8'}" title="{$product.product_name|escape:'html':'UTF-8'} ({$product.product_quantity|intval} {if $product.product_quantity >1}{l s='items' mod='ets_trackingcustomer'}{else}{l s='item' mod='ets_trackingcustomer'}{/if})" />
                    {else}
                        {$product.product_name|escape:'html':'UTF-8'}
                    {/if}
                </a>
            {/foreach}
        </div>
    {/if}
{/if}