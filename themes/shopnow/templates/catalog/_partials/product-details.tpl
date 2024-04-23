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
<div class="tab-pane fade{if !$product.description} in active{/if}"
     id="product-details"
     data-product="{$product.embedded_attributes|json_encode}"
  >
  {block name='product_reference'}
    {if isset($product_manufacturer->id)}
      <div class="product-manufacturer">
        {if isset($manufacturer_image_url)}
          <a href="{$product_brand_url|escape:'html':'UTF-8'}">
            <img src="{$manufacturer_image_url|escape:'html':'UTF-8'}" class="img img-thumbnail manufacturer-logo" alt="" />
          </a>
        {else}
          <label class="label">{l s='Brand' d='Shop.Theme.Catalog'}</label>
          <span>
            <a href="{$product_brand_url|escape:'html':'UTF-8'}">{$product_manufacturer->name|escape:'html':'UTF-8'}</a>
          </span>
        {/if}
      </div>
    {/if}
    
    {if isset($product.reference_to_display)}
        {if isset($tc_config.YBC_TC_PRODUCT_REF) && $tc_config.YBC_TC_PRODUCT_REF == 1}
          <div class="product-reference">
            <label class="label">{l s='Reference' d='Shop.Theme.Catalog'} </label>
            <span itemprop="sku">{$product.reference_to_display|escape:'html':'UTF-8'}</span>
          </div>
        {/if}
    {/if}
    
    
    {/block}
    {block name='product_quantities'}
      {if $product.show_quantities}
        {if isset($tc_config.YBC_TC_PRODUCT_QTY) && $tc_config.YBC_TC_PRODUCT_QTY == 1}
        <div class="product-quantities">
          <label class="label">{l s='In stock' d='Shop.Theme.Catalog'}</label>
          <span>{$product.quantity|escape:'html':'UTF-8'} {$product.quantity_label|escape:'html':'UTF-8'}</span>
        </div>
        {/if}
      {/if}
    {/block}
    {block name='product_availability_date'}
      {if $product.availability_date}
        <div class="product-availability-date">
          <label>{l s='Availability date:' d='Shop.Theme.Catalog'} </label>
          <span>{$product.availability_date|escape:'html':'UTF-8'}</span>
        </div>
      {/if}
    {/block}
    {block name='product_out_of_stock'}
      <div class="product-out-of-stock">
        {hook h='actionProductOutOfStock' product=$product}
      </div>
    {/block}

    {block name='product_features'}
      {if $product.features}
        <section class="product-features">
          <h3 class="h6">{l s='Data sheet' d='Shop.Theme.Catalog'}</h3>
          <dl class="data-sheet">
            {foreach from=$product.features item=feature}
              <dt class="name">{$feature.name|escape:'html':'UTF-8'}</dt>
              <dd class="value">{$feature.value|escape:'html':'UTF-8'}</dd>
            {/foreach}
          </dl>
        </section>
      {/if}
    {/block}

    {* if product have specific references, a table will be added to product details section *}
    {block name='product_specific_references'}
      {if isset($product.specific_references)}
        <section class="product-features">
          <h3 class="h6">{l s='Specific References' d='Shop.Theme.Catalog'}</h3>
            <dl class="data-sheet">
              {foreach from=$product.specific_references item=reference key=key}
                <dt class="name">{$key|escape:'html':'UTF-8'}</dt>
                <dd class="value">{$reference|escape:'html':'UTF-8'}</dd>
              {/foreach}
            </dl>
        </section>
      {/if}
    {/block}

    {block name='product_condition'}
      {if $product.condition}
        <div class="product-condition">
          <label class="label">{l s='Condition' d='Shop.Theme.Catalog'} </label>
          <link itemprop="itemCondition" href="{$product.condition.schema_url|escape:'html':'UTF-8'}"/>
          <span>{$product.condition.label|escape:'html':'UTF-8'}</span>
        </div>
      {/if}
    {/block}
</div>
