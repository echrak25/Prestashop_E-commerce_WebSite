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
  <article class="product-miniature js-product-miniature item actived" data-id-product="{$product.id_product|escape:'html':'UTF-8'}" data-id-product-attribute="{$product.id_product_attribute|escape:'html':'UTF-8'}" itemscope itemtype="http://schema.org/Product">
    <div class="thumbnail-container">
      {block name='product_thumbnail'}
        <a href="{$product.url|escape:'html':'UTF-8'}" class="thumbnail product-thumbnail">
          {*<img
            src = "{$product.cover.bySize.home_default.url|escape:'html':'UTF-8'}"
            alt = "{$product.cover.legend|escape:'html':'UTF-8'}"
            data-full-size-image-url = "{$product.cover.large.url|escape:'html':'UTF-8'}"
          >*}
          <img
            src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default') nofilter}"
            alt="{if !empty($product.legend)}{$product.legend nofilter}{else}{$product.name_attribute nofilter}{/if}"
           />
        </a>
      {/block}
      <div class="product-description">
        {block name='product_name'}
          <h1 class="h3 product-title" itemprop="name">
            <a href="{$product.url|escape:'html':'UTF-8'}">{$product.name_attribute|truncate:30:'...'}</a></h1>
        {/block}
        {*block name='attribute_small'}
            <span class="attribute-small">{if isset($product.attribute_small) && $product.attribute_small}{$product.attribute_small|escape:'html':'UTF-8'}{/if}</span>
        {/block*}
        {* dev hiepaiq
        {block name='product_price_and_shipping'}
          {if $product.show_price && isset($configs.ETS_PT_DISPLAY_PRODUCT_PRICE) && $configs.ETS_PT_DISPLAY_PRODUCT_PRICE}
            <div class="product-price-and-shipping">
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
          </div>
        {/if}
      {/block}
      
      {if isset($configs.ETS_PT_DISPLAY_PRODUCT_DESCRIPTION) && $configs.ETS_PT_DISPLAY_PRODUCT_DESCRIPTION}
          {block name='product_description'}
            <span class="product-description" itemprop="description">
                {if $product.description_short}{$product.description_short|truncate:$configs.ETS_PT_MAX_DESCRIPTION_LENGHT:'...' nofilter}
                {else}{$product.description|truncate:$configs.ETS_PT_MAX_DESCRIPTION_LENGHT:'...' nofilter}{/if}
            </span>
          {/block}
      {/if}
      {if isset($configs.ETS_PT_DISPLAY_RATING) && $configs.ETS_PT_DISPLAY_RATING}
          {block name='product_reviews'}
            {hook h='displayProductListReviews' product=$product}
          {/block}
      {/if}*}
      
      </div>
    </div>
  </article>
{/block}
