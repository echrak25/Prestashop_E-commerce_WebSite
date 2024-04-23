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
<table class="table">
    <thead>
        <tr class="column-headers ">
            <th>{l s='Product' mod='ets_wishlist_pres17'}</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>{l s='Reference' mod='ets_wishlist_pres17'}</th>
            <th>{l s='Combination' mod='ets_wishlist_pres17'}</th>
            <th>{l s='Category' mod='ets_wishlist_pres17'}</th>
            <th class="text-center">{l s='Price (tax excl.)' mod='ets_wishlist_pres17'}</th>
            <th class="text-center">{l s='Available Qty' mod='ets_wishlist_pres17'}</th>
            <th class="text-center">{l s='Conversion rate' mod='ets_wishlist_pres17'}</th>
        </tr>
    </thead>
    <tbody>
        {if $products}
            {foreach from=$products item='product'}
                <tr>
                    <td class="position-type column-position">
                         <div class="text-center"> {$product.id_product|intval} </div>   
                    </td>
                    <td class="image-type column-image">
                        <img src="{$product.image_small_url|escape:'html':'UTF-8'}" />
                    </td>
                    <td class="link-type column-name">
                        <a target="_blank" class="text-primary" href="{$product.link|escape:'html':'UTF-8'}">
                            {$product.name|escape:'html':'UTF-8'}
                        </a>
                    </td>
                    <td class="data-type column-reference">{$product.reference|escape:'html':'UTF-8'} </td>
                    <td class="data-type column-combination">{if $product.combination}{$product.combination|escape:'html':'UTF-8'}{else}--{/if} </td>
                    <td class="data-type column-category_name">{$product.category_name|escape:'html':'UTF-8'} </td>
                    <td class="data-type column-price text-center">{$product.price|escape:'html':'UTF-8'} </td>
                    <td class="data-type column-quantity text-center"> {$product.quantity|intval} </td>
                    <td class="data-type column-conversionRate text-center">{$product.conversionRate|escape:'html':'UTF-8'} </td>
                </tr>
            {/foreach}
        {else} 
            <tr>
                <td class="no-data" colspan="9">{l s='No products found' mod='ets_wishlist_pres17'}</td>
            </tr>
        {/if}
    </tbody>
</table>