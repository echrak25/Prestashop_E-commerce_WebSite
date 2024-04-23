{*
* 2007-2022 ETS-Soft
*
* NOTICE OF LICENSE
*
* This file is not open source! Each license that you purchased is only available for 1 wesite only.
* If you want to use this file on more websites (or projects), you need to purchase additional licenses. 
* You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
* 
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs, please contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2022 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
{if isset($products) && $products}	
	{foreach from=$products item="product"}
          <article class="product-miniature js-product-miniature" data-id-product="{$product.id_product|escape:'html':'UTF-8'}" data-id-product-attribute="{$product.id_product_attribute|escape:'html':'UTF-8'}" itemscope itemtype="http://schema.org/Product">
          <div class="thumbnail-container">
            {block name='product_thumbnail'}
              <a href="{$product.url|escape:'html':'UTF-8'}" class="thumbnail product-thumbnail">
                <img src = "{$product.cover.bySize.home_default.url|escape:'html':'UTF-8'}" alt = "{$product.cover.legend|escape:'html':'UTF-8'}" data-full-size-image-url = "{$product.cover.large.url|escape:'html':'UTF-8'}" >
              </a>
            {/block}
            <div class="product-description">
              {block name='product_name'}
                <h3 class="h3 product-title" itemprop="name"><a href="{$product.url|escape:'html':'UTF-8'}">{$product.name|truncate:30:'...'}</a></h3>
              {/block}
                <div class="mm_short_description">
                    {$product.description_short|truncate:80:'...' nofilter}
                </div>
              {block name='product_price_and_shipping'}
                {if $product.show_price}
                  <div class="product-price-and-shipping">
                    {hook h='displayProductPriceBlock' product=$product type="before_price"}
        
                    <span itemprop="price" class="price">{$product.price|escape:'html':'UTF-8'}</span>
        
                    {hook h='displayProductPriceBlock' product=$product type='unit_price'}
        
                    {hook h='displayProductPriceBlock' product=$product type='weight'}
                    {if $product.has_discount}
                      {hook h='displayProductPriceBlock' product=$product type="old_price"}
        
                      <span class="regular-price">{$product.regular_price|escape:'html':'UTF-8'}</span>
                      {if $product.discount_type === 'percentage'}
                        <span class="discount-percentage">{$product.discount_percentage|escape:'html':'UTF-8'}</span>
                      {/if}
                    {/if}
        
                    
                  </div>
                {/if}
              {/block}
            </div>
            {block name='product_flags'}
              <ul class="product-flags">
                {foreach from=$product.flags item=flag}
                  <li class="{$flag.type|escape:'html':'UTF-8'}">{$flag.label|escape:'html':'UTF-8'}</li>
                {/foreach}
              </ul>
            {/block}
            <div class="highlighted-informations{if !$product.main_variants} no-variants{/if} hidden-sm-down">
              <a href="#" class="quick-view" data-link-action="quickview" >
                <i class="material-icons search">search</i> {l s='Quick view' d='Shop.Theme.Actions'}
              </a>
              {block name='product_variants'}
                {if $product.main_variants}
                  {include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
                {/if}
              {/block}
            </div>
        
          </div>
        </article>
    {/foreach}   
{/if}