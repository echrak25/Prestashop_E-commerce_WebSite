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
 
{block name='product_miniature_item'}
  <article class="product-miniature js-product-miniature" data-id-product="{$product.id_product|escape:'html':'UTF-8'}" data-id-product-attribute="{$product.id_product_attribute|escape:'html':'UTF-8'}" itemscope itemtype="http://schema.org/Product">
    <div class="thumbnail-container">
      {block name='product_thumbnail'}
        <div class="product_special_img">
            <div class="table table_img">
                <div class="table-cell">
                    <a href="{$product.url|escape:'html':'UTF-8'}" class="thumbnail product-thumbnail">
                        <img src = "{$product.cover.bySize.home_default.url|escape:'html':'UTF-8'}" alt = "{$product.cover.legend|escape:'html':'UTF-8'}" data-full-size-image-url = "{$product.cover.large.url|escape:'html':'UTF-8'}" >
                        
                    </a>
                    {if $product.has_discount}
                          <span class="discount-percentage">{$product.discount_percentage|escape:'html':'UTF-8'}</span>
                      {/if}
                </div>
            </div>
        </div>
      {/block}
      <div class="product-description">
        
        <div class="table">
            <div class="table-cell">
                {block name='product_name'}
                  <h3 class="h3 product-title" itemprop="name"><a href="{$product.url|escape:'html':'UTF-8'}">{$product.name|truncate:30:'...'}</a></h3>
                {/block}
                {block name='product_reviews'}
                    {hook h='displayProductListReviews' product=$product}
                {/block}
                {block name='product_price_and_shipping'}
                  {if $product.show_price}
                    <div class="product-price-and-shipping">
                          {if $product.has_discount}
                            {hook h='displayProductPriceBlock' product=$product type="old_price"}
                            <span class="regular-price">{$product.regular_price|escape:'html':'UTF-8'}</span>
                            {*if $product.discount_type === 'percentage'}
                              <span class="discount-percentage">{$product.discount_percentage|escape:'html':'UTF-8'}</span>
                            {/if*}
                          {/if}
                          {hook h='displayProductPriceBlock' product=$product type='unit_price'}
                            {hook h='displayProductPriceBlock' product=$product type='weight'}
                          {hook h='displayProductPriceBlock' product=$product type="before_price"}
                          <span itemprop="price" class="price">{$product.price|escape:'html':'UTF-8'}</span>
                          
                    </div>
                  {/if}
                {/block}
                  
              {if isset($product.description_short) && $product.description_short !=''}
                <div class="short_description">{$product.description_short|truncate:100:'...' nofilter}</div>
              {/if}
              {if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.to)}
                <div id="ets_clock_{$product.id_product|intval}" data-id-product="{$product.id_product|intval}" data-date-to="{$product.specific_prices.to|escape:'html':'UTF-8'}" class="ets_clock"></div>
              {/if}
            </div>
        </div>
    </div>
    
    </div>
     </article>
{/block}
