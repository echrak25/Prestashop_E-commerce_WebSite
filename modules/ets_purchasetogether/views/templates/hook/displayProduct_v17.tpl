{**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
 

{if isset($configs.ETS_PT_HOOK_TO) && $configs.ETS_PT_HOOK_TO == 'displayFooterProduct'}
    <div id="ets_purchasetogether" class="ets_purchase_footerproduct">
{else if isset($configs.ETS_PT_HOOK_TO) && $configs.ETS_PT_HOOK_TO == 'displayProductAdditionalInfo'}
    <div id="ets_purchasetogether" class="ets_purchase_productaddition">
{else}
    <div id="ets_purchasetogether">
{/if}

{if isset($configs.ETS_PT_DISPLAY_TYPE) && $configs.ETS_PT_DISPLAY_TYPE == 1}
    {if isset($purchase_togethers) && $purchase_togethers && count($purchase_togethers) != $alldisabled}
        <h2 class="ets_purchase_title"><span>{$configs.ETS_PT_TITLE|escape:'html':'UTF-8'}</span></h2>
        <div class="ets-product-specific">
            {foreach from=$purchase_togethers item="product"}
                {if isset($product.disabled) && !$product.disabled}
                    {block name='product_miniature'}
                        {include file='modules/ets_purchasetogether/views/templates/hook/_product.tpl' product=$product}
                    {/block}
                {/if}
            {/foreach}
        </div>
        <div class="clear"></div>
        {block name="purchase_together"}
            <ul class="ets-list-checkbox-product ets-list-content-checkbox">
                {*Display current product*}
            {if (isset($configs.ETS_PT_EXCLUDE_CURRENT_PRODUCT) && !$configs.ETS_PT_EXCLUDE_CURRENT_PRODUCT) 
                && !(isset($configs.ETS_PT_EXCLUDE_OUT_OF_STOCK) && $configs.ETS_PT_EXCLUDE_OUT_OF_STOCK && $currProduct.quantity <= $currProduct.out_of_stock)}
                <li class="item-product ">
                    <div class="row-product">
                    <div class="ets_purchase_item_image">
                        <input class=""
                            id="product_{$currProduct.id|intval}_{$currProduct.id_product_attribute|intval}" 
                            type="checkbox" 
                            checked="checked"
                            {if isset($configs.ETS_PT_REQUIRE_CURRENT_PRODUCT) && $configs.ETS_PT_REQUIRE_CURRENT_PRODUCT}disabled="disabled"{/if}
                            name="product_current" />
                    </div>
                    <div class="ets_purchase_item_des">
                        <label for="product_{$currProduct.id|intval}_{$currProduct.id_product_attribute|intval}">{l s='This current product' d='Shop.Theme'} (<b>{$currProduct.name|escape:'html':'UTF-8'}</b>)</label>
                        
                        {block name='product_price_and_shipping'}
                            {if $currProduct.show_price && isset($configs.ETS_PT_DISPLAY_PRODUCT_PRICE) && $configs.ETS_PT_DISPLAY_PRODUCT_PRICE}
                                <span class="product-price-and-shipping">
                                    {*if $currProduct.has_discount}
                                        {if isset($configs.ETS_PT_DISPLAY_OLD_PRICE) && $configs.ETS_PT_DISPLAY_OLD_PRICE}
                                            {hook h='displayProductPriceBlock' product=$currProduct type="old_price"}
                                            <span class="regular-price">{$currProduct.regular_price|escape:'html':'UTF-8'}</span>
                                        {/if}
                                        {if $currProduct.discount_type === 'percentage' && isset($configs.ETS_PT_DISPLAY_DISCOUNT) && $configs.ETS_PT_DISPLAY_DISCOUNT}
                                          <span class="discount-percentage">{$currProduct.discount_percentage|escape:'html':'UTF-8'}</span>
                                        {/if}
                                    {/if*}
                                    {hook h='displayProductPriceBlock' product=$currProduct type="before_price"}
                                    <span itemprop="price" class="price">{$currProduct.price|escape:'html':'UTF-8'}</span>
                                    {hook h='displayProductPriceBlock' product=$currProduct type='unit_price'}
                                    {hook h='displayProductPriceBlock' product=$currProduct type='weight'}
                                </span>
                            {/if}
                        {/block}
                        <p class="attribute_small this-product">{if isset($currProduct.attribute_small) && $currProduct.attribute_small}{$currProduct.attribute_small|escape:'html':'UTF-8'}{/if}</p>
                        {if isset($configs.ETS_PT_DISPLAY_PRODUCT_DESCRIPTION) && $configs.ETS_PT_DISPLAY_PRODUCT_DESCRIPTION}
                          {block name='product_description'}
                            <div class="product-description" itemprop="description">
                                {if $currProduct.description_short}{$currProduct.description_short|truncate:$configs.ETS_PT_MAX_DESCRIPTION_LENGHT:'...' nofilter}
                                {else}{$currProduct.description|truncate:$configs.ETS_PT_MAX_DESCRIPTION_LENGHT:'...' nofilter}{/if}
                            </div>
                          {/block}
                        {/if}
                        {*show ratting*}
                        {if isset($configs.ETS_PT_DISPLAY_RATING) && $configs.ETS_PT_DISPLAY_RATING}
                          {block name='product_reviews'}
                            {hook h='displayProductListReviews' product=$currProduct}
                          {/block} 
                        {/if}
                    </div> 
                    </div>                  
                </li>
            {/if}
                {*Display purchased together product*}
            {foreach from=$purchase_togethers item=product}
                {if isset($product.disabled) && !$product.disabled}
                    <li class="item-product">
                        <div class="row-product">
                            <div class="ets_purchase_item_image">
                                <input type="checkbox" class=""
                                    checked="checked"
                                    data-id="{$product.id_product|intval}"
                                    data-attribute="{$product.id_product_attribute|intval}"
                                    data-qty="{if isset($configs.ETS_PT_DEFAULT_QUANTITY_ADDED_TO_CART) && $configs.ETS_PT_DEFAULT_QUANTITY_ADDED_TO_CART}{$configs.ETS_PT_DEFAULT_QUANTITY_ADDED_TO_CART|escape:'html':'UTF-8'}{else}1{/if}"
                                    id="purchase_{$product.id_product|intval}_{$product.id_product_attribute|intval}" 
                                    name="purchase_together[]" />
                            </div>
                            <div class="ets_purchase_item_des">
                                <label for="purchase_{$product.id_product|intval}_{$product.id_product_attribute|intval}">
                                      <span class="product-title"><a href="{$product.url|escape:'html':'UTF-8'}">{$product.name_attribute|truncate:100:'...'}</a></span>
                                </label>
                                {block name='product_price_and_shipping'}
                                    {if $product.show_price && isset($configs.ETS_PT_DISPLAY_PRODUCT_PRICE) && $configs.ETS_PT_DISPLAY_PRODUCT_PRICE}
                                        <span class="product-price-and-shipping">
                                            {*if $product.has_discount}
                                                {if isset($configs.ETS_PT_DISPLAY_OLD_PRICE) && $configs.ETS_PT_DISPLAY_OLD_PRICE}
                                                    {hook h='displayProductPriceBlock' product=$product type="old_price"}
                                                    <span class="regular-price">{$product.regular_price|escape:'html':'UTF-8'}</span>
                                                {/if}
                                                {if $product.discount_type === 'percentage' && isset($configs.ETS_PT_DISPLAY_DISCOUNT) && $configs.ETS_PT_DISPLAY_DISCOUNT}
                                                  <span class="discount-percentage">{$product.discount_percentage|escape:'html':'UTF-8'}</span>
                                                {/if}
                                            {/if*}
                                            {hook h='displayProductPriceBlock' product=$product type="before_price"}
                                            <span itemprop="price" class="price">{$product.price|escape:'html':'UTF-8'}</span>
                                            {hook h='displayProductPriceBlock' product=$product type='unit_price'}
                                            {hook h='displayProductPriceBlock' product=$product type='weight'}
                                        </span>
                                    {/if}
                                {/block}
                                <p class="attribute_small">{if isset($product.attribute_small) && $product.attribute_small}{$product.attribute_small|escape:'html':'UTF-8'}{/if}</p>
                                
                                {if isset($configs.ETS_PT_DISPLAY_PRODUCT_DESCRIPTION) && $configs.ETS_PT_DISPLAY_PRODUCT_DESCRIPTION}
                                  {block name='product_description'}
                                    <div class="product-description" itemprop="description">
                                        {if $product.description_short}{$product.description_short|truncate:$configs.ETS_PT_MAX_DESCRIPTION_LENGHT:'...' nofilter}
                                        {else}{$product.description|truncate:$configs.ETS_PT_MAX_DESCRIPTION_LENGHT:'...' nofilter}{/if}
                                    </div>
                                  {/block}
                                {/if}
                                {*show ratting*}
                                {if isset($configs.ETS_PT_DISPLAY_RATING) && $configs.ETS_PT_DISPLAY_RATING}
                                  {block name='product_reviews'}
                                    {hook h='displayProductListReviews' product=$product}
                                  {/block} 
                                {/if}
                            </div>
                        </div>
                    </li>
                {/if}
            {/foreach}
            </ul>
        	<div class="button-container {if count($purchase_togethers) == $alldisabled}disabled{/if}">
        		<a class="ets_ajax_add_to_cart_button btn btn-primary" href="{$ajax_cart|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add all to cart' d='Shop.Theme'}">
        			<span>{l s='Add all to cart' d='Shop.Theme'}</span>
        		</a>
        	</div>
        {/block}
    {/if}
{else}
    {if isset($purchase_togethers) && $purchase_togethers && count($purchase_togethers) != $alldisabled}
        <h2 class="ets_purchase_title"><span>{$configs.ETS_PT_TITLE|escape:'html':'UTF-8'}</span></h2>
        {block name="purchase_together"}
            <ul class="ets-list-checkbox-product ets_purchase_type_list">
                {*Display current product*}
                {if (isset($configs.ETS_PT_EXCLUDE_CURRENT_PRODUCT) && !$configs.ETS_PT_EXCLUDE_CURRENT_PRODUCT)
                    && !(isset($configs.ETS_PT_EXCLUDE_OUT_OF_STOCK) && $configs.ETS_PT_EXCLUDE_OUT_OF_STOCK && $currProduct.quantity <= $currProduct.out_of_stock)}
                    <li class="item-product">
                        <div class="row-product">
                            <div class="ets_purchase_item_image">
                                <input class=""
                                    id="product_{$currProduct.id|intval}_{$currProduct.id_product_attribute|intval}" {*|| in_array(($currProduct.id|cat:'-'|cat:$currProduct.id_product_attribute), $includeIds)*}
                                    type="checkbox" 
                                    checked="checked"
                                    {if isset($configs.ETS_PT_REQUIRE_CURRENT_PRODUCT) && $configs.ETS_PT_REQUIRE_CURRENT_PRODUCT}disabled="disabled"{/if} 
                                    name="product_current" />
                                {block name='product_thumbnail'}
                                    <a href="{$currProduct.url|escape:'html':'UTF-8'}" class="thumbnail product-thumbnail">
                                      <img
                                        src = "{$currProduct.cover.bySize.small_default.url|escape:'html':'UTF-8'}"
                                        alt = "{$currProduct.cover.legend|escape:'html':'UTF-8'}"
                                        data-full-size-image-url = "{$currProduct.cover.small.url|escape:'html':'UTF-8'}"
                                      >
                                    </a>
                                {/block}     
                            </div>
                            <div class="ets_purchase_item_des">
                                <label for="product_{$currProduct.id|intval}_{$currProduct.id_product_attribute|intval}">{l s='This product' d='Shop.Theme'} (<b>{$currProduct.name|escape:'html':'UTF-8'}</b>)</label>
                                {block name='product_price_and_shipping'}
                                    {if $currProduct.show_price && isset($configs.ETS_PT_DISPLAY_PRODUCT_PRICE) && $configs.ETS_PT_DISPLAY_PRODUCT_PRICE}
                                        <span class="product-price-and-shipping">
                                            {*if $currProduct.has_discount}
                                                {if isset($configs.ETS_PT_DISPLAY_OLD_PRICE) && $configs.ETS_PT_DISPLAY_OLD_PRICE}
                                                    {hook h='displayProductPriceBlock' product=$currProduct type="old_price"}
                                                    <span class="regular-price">{$currProduct.regular_price|escape:'html':'UTF-8'}</span>
                                                {/if}
                                                {if $currProduct.discount_type === 'percentage' && isset($configs.ETS_PT_DISPLAY_DISCOUNT) && $configs.ETS_PT_DISPLAY_DISCOUNT}
                                                  <span class="discount-percentage">{$currProduct.discount_percentage|escape:'html':'UTF-8'}</span>
                                                {/if}
                                            {/if*}
                                            {hook h='displayProductPriceBlock' product=$currProduct type="before_price"}
                                            <span itemprop="price" class="price">{$currProduct.price|escape:'html':'UTF-8'}</span>
                                            {hook h='displayProductPriceBlock' product=$currProduct type='unit_price'}
                                            {hook h='displayProductPriceBlock' product=$currProduct type='weight'}
                                        </span>
                                    {/if}
                                {/block}
                                <p class="attribute_small this-product">{if isset($currProduct.attribute_small) && $currProduct.attribute_small}{$currProduct.attribute_small|escape:'html':'UTF-8'}{/if}</p>
             
                                {if isset($configs.ETS_PT_DISPLAY_PRODUCT_DESCRIPTION) && $configs.ETS_PT_DISPLAY_PRODUCT_DESCRIPTION}
                                  {block name='product_description'}
                                    <div class="product-description" itemprop="description">
                                        {if $currProduct.description_short}{$currProduct.description_short|truncate:$configs.ETS_PT_MAX_DESCRIPTION_LENGHT:'...' nofilter}
                                        {else}{$currProduct.description|truncate:$configs.ETS_PT_MAX_DESCRIPTION_LENGHT:'...' nofilter}{/if}
                                    </div>
                                  {/block}
                                {/if}
                                {*show ratting*}
                                {if isset($configs.ETS_PT_DISPLAY_RATING) && $configs.ETS_PT_DISPLAY_RATING}
                                  {block name='product_reviews'}
                                    {hook h='displayProductListReviews' product=$currProduct}
                                  {/block} 
                                {/if}                        
                            </div>  
                        </div>                  
                    </li>
                {/if}
                {*Display purchased together product*}
                {foreach from=$purchase_togethers item=product}
                    {if isset($product.disabled) && !$product.disabled}
                        <li class="item-product">
                            <div class="row-product">
                                <div class="ets_purchase_item_image">
                                    <input type="checkbox" class=""
                                        checked="checked"
                                        data-id="{$product.id_product|intval}"
                                        data-attribute="{$product.id_product_attribute|intval}"
                                        data-qty="{if isset($configs.ETS_PT_DEFAULT_QUANTITY_ADDED_TO_CART) && $configs.ETS_PT_DEFAULT_QUANTITY_ADDED_TO_CART}{$configs.ETS_PT_DEFAULT_QUANTITY_ADDED_TO_CART|escape:'html':'UTF-8'}{else}1{/if}"
                                        id="purchase_{$product.id_product|intval}_{$product.id_product_attribute|intval}" 
                                        name="purchase_together[]" />
                                    {block name='product_thumbnail'}
                                    <a href="{$product.url|escape:'html':'UTF-8'}" class="thumbnail product-thumbnail">
                                      <img
                                        src = "{$product.cover.bySize.small_default.url|escape:'html':'UTF-8'}"
                                        alt = "{$product.cover.legend|escape:'html':'UTF-8'}"
                                        data-full-size-image-url = "{$product.cover.small.url|escape:'html':'UTF-8'}"
                                      >
                                    </a>
                                    {/block}
                                </div>
                                <div class="ets_purchase_item_des">
                                    <label for="purchase_{$product.id_product|intval}_{$product.id_product_attribute|intval}">
                                          <span class="product-title"><a href="{$product.url|escape:'html':'UTF-8'}">{$product.name_attribute|truncate:100:'...'}</a></span>
                                    </label>
                                    {block name='product_price_and_shipping'}
                                        {if $product.show_price && isset($configs.ETS_PT_DISPLAY_PRODUCT_PRICE) && $configs.ETS_PT_DISPLAY_PRODUCT_PRICE}
                                            <span class="product-price-and-shipping">
                                                {if $product.has_discount}
                                                    {if isset($configs.ETS_PT_DISPLAY_OLD_PRICE) && $configs.ETS_PT_DISPLAY_OLD_PRICE}
                                                        {hook h='displayProductPriceBlock' product=$product type="old_price"}
                                                        <span class="regular-price">{$product.regular_price|escape:'html':'UTF-8'}</span>
                                                    {/if}
                                                    {if $product.discount_type === 'percentage' && isset($configs.ETS_PT_DISPLAY_DISCOUNT) && $configs.ETS_PT_DISPLAY_DISCOUNT}
                                                      <span class="discount-percentage">{$product.discount_percentage|escape:'html':'UTF-8'}</span>
                                                    {/if}
                                                {/if}
                                                {hook h='displayProductPriceBlock' product=$product type="before_price"}
                                                <span itemprop="price" class="price">{$product.price|escape:'html':'UTF-8'}</span>
                                                {hook h='displayProductPriceBlock' product=$product type='unit_price'}
                                                {hook h='displayProductPriceBlock' product=$product type='weight'}
                                            </span>
                                        {/if}
                                    {/block}
                                    <p class="attribute_small">{if isset($product.attribute_small) && $product.attribute_small}{$product.attribute_small|escape:'html':'UTF-8'}{/if}</p>
                                    
                                    {if isset($configs.ETS_PT_DISPLAY_PRODUCT_DESCRIPTION) && $configs.ETS_PT_DISPLAY_PRODUCT_DESCRIPTION}
                                      {block name='product_description'}
                                        <div class="product-description" itemprop="description">
                                            {if $product.description_short}{$product.description_short|truncate:$configs.ETS_PT_MAX_DESCRIPTION_LENGHT:'...' nofilter}
                                            {else}{$product.description|truncate:$configs.ETS_PT_MAX_DESCRIPTION_LENGHT:'...' nofilter}{/if}
                                        </div>
                                      {/block}
                                    {/if}
                                    {*show ratting*}
                                    {if isset($configs.ETS_PT_DISPLAY_RATING) && $configs.ETS_PT_DISPLAY_RATING}
                                      {block name='product_reviews'}
                                        {hook h='displayProductListReviews' product=$product}
                                      {/block} 
                                    {/if}
                                </div>
                            </div>
                        </li>
                    {/if}
                {/foreach}
            </ul>
        	<div class="button-container {if count($purchase_togethers) == $alldisabled}disabled{/if}">
        		<a class="ets_ajax_add_to_cart_button btn btn-primary" href="{$ajax_cart|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add all products to cart'}">
        			<span>{l s='Add all products to cart' d='Shop.Theme'}</span>
        		</a>
        	</div>
            
        {/block}
    {/if}
    
{/if}
<div class="clearfix"></div>
{if isset($configs.ETS_PT_HOOK_TO) && $configs.ETS_PT_HOOK_TO == 'displayFooterProduct'}
    </div>
{else if isset($configs.ETS_PT_HOOK_TO) && $configs.ETS_PT_HOOK_TO == 'displayProductAdditionalInfo'}
    </div>
{else}
    </div>
{/if}

