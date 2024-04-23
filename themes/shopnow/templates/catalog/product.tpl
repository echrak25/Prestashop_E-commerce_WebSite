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
{extends file=$layout}

{block name='head_seo' prepend}
  <link rel="canonical" href="{$product.canonical_url|escape:'html':'UTF-8'}">
{/block}

{block name='head' append}
  <meta property="og:type" content="product">
  <meta property="og:url" content="{$urls.current_url|escape:'html':'UTF-8'}">
  <meta property="og:title" content="{$page.meta.title|escape:'html':'UTF-8'}">
  <meta property="og:site_name" content="{$shop.name|escape:'html':'UTF-8'}">
  <meta property="og:description" content="{$page.meta.description|escape:'html':'UTF-8'}">
  <meta property="og:image" content="{$product.cover.large.url|escape:'html':'UTF-8'}">
  <meta property="product:pretax_price:amount" content="{$product.price_tax_exc|escape:'html':'UTF-8'}">
  <meta property="product:pretax_price:currency" content="{$currency.iso_code|escape:'html':'UTF-8'}">
  <meta property="product:price:amount" content="{$product.price_amount|escape:'html':'UTF-8'}">
  <meta property="product:price:currency" content="{$currency.iso_code|escape:'html':'UTF-8'}">
  {if isset($product.weight) && ($product.weight != 0)}
  <meta property="product:weight:value" content="{$product.weight|escape:'html':'UTF-8'}">
  <meta property="product:weight:units" content="{$product.weight_unit|escape:'html':'UTF-8'}">
  {/if}
{/block}

{block name='content'}

  <div id="main" itemscope itemtype="https://schema.org/Product">
    <meta itemprop="url" content="{$product.url|escape:'html':'UTF-8'}" />
      <div class="col-md-6 col-xs-12">
        {block name='page_content_container'}
          <div class="page-content" id="content">
            {block name='page_content'}
              {block name='product_cover_thumbnails'}
                    {include file='catalog/_partials/product-cover-thumbnails.tpl'}
              {/block}
            {/block}
          </div>
        {/block}
        </div>
        <div class="right_pb_product col-md-6 col-xs-12">
          {block name='page_header_container'}
            {block name='page_header'}
              <h1 class="h1 page-heading-product" itemprop="name">{block name='page_title'}{$product.name|escape:'html':'UTF-8'}{/block}</h1>
            {/block}
          {/block}
          {block name='product_prices'}
            {include file='catalog/_partials/product-prices.tpl'}
          {/block}

          <div class="product-information">
            {block name='product_description_short'}
              <div id="product-description-short-{$product.id|escape:'html':'UTF-8'}" itemprop="description">{$product.description_short nofilter}</div>
            {/block}

            {if $product.is_customizable && count($product.customizations.fields)}
              {block name='product_customization'}
                {include file="catalog/_partials/product-customization.tpl" customizations=$product.customizations}
              {/block}
            {/if}
            <div class="line clearfix"></div>
            <div class="product-actions">
              {block name='product_buy'}
                <form action="{$urls.pages.cart|escape:'html':'UTF-8'}" method="post" id="add-to-cart-or-refresh">
                  <input type="hidden" name="token" value="{$static_token|escape:'html':'UTF-8'}">
                  <input type="hidden" name="id_product" value="{$product.id|escape:'html':'UTF-8'}" id="product_page_product_id">
                  <input type="hidden" name="id_customization" value="{$product.id_customization|escape:'html':'UTF-8'}" id="product_customization_id">

                  {block name='product_variants'}
                    {include file='catalog/_partials/product-variants.tpl'}
                  {/block}

                  {block name='product_pack'}
                    {if $packItems}
                      <section class="product-pack">
                        <h3 class="h4">{l s='This pack contains' d='Shop.Theme.Catalog'}</h3>
                        {foreach from=$packItems item="product_pack"}
                          {block name='product_miniature'}
                            {include file='catalog/_partials/miniatures/pack-product.tpl' product=$product_pack}
                          {/block}
                        {/foreach}
                    </section>
                    {/if}
                  {/block}

                  {block name='product_discounts'}
                    {include file='catalog/_partials/product-discounts.tpl'}
                  {/block}
                    <div class="line clearfix"></div>
                  {block name='product_add_to_cart'}
                    {include file='catalog/_partials/product-add-to-cart.tpl'}
                  {/block}

                  {block name='product_additional_info'}
                    {include file='catalog/_partials/product-additional-info.tpl'}
                  {/block}

                  {block name='product_refresh'}
                    <input class="product-refresh ps-hidden-by-js" name="refresh" type="submit" value="{l s='Refresh' d='Shop.Theme.Actions'}">
                  {/block}
                </form>
              {/block}

            </div>

            {*hook h='displayReassurance'*}

        </div>
      </div>
      <div class="tabs col-md-12 col-xs-12">
          <ul class="nav nav-tabs">
            {if $product.description}
            <li class="nav-item">
              <a class="nav-link{if $product.description} active{/if}" data-toggle="tab" href="#description">{l s='Description' d='Shop.Theme.Catalog'}</a>
            </li>
            {/if}
            <li class="nav-item">
              <a class="nav-link{if !$product.description} active{/if}" data-toggle="tab" href="#product-details">{l s='Product Details' d='Shop.Theme.Catalog'}</a>
            </li>
            {if $product.attachments}
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#attachments">{l s='Attachments' d='Shop.Theme.Catalog'}</a>
            </li>
            {/if}
            {foreach from=$product.extraContent item=extra key=extraKey}
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#extra-{$extraKey|escape:'html':'UTF-8'}">{$extra.title|escape:'html':'UTF-8'}</a>
            </li>
            {/foreach}
            {hook h='productTab' product=$product}
          </ul>

          <div class="tab-content" id="tab-content">
           <div class="tab-pane fade in{if $product.description} active{/if}" id="description">
             {block name='product_description'}
               <div class="product-description">{$product.description nofilter}</div>
             {/block}
           </div>

           {block name='product_details'}
             {include file='catalog/_partials/product-details.tpl'}
           {/block}
           {block name='product_attachments'}
             {if $product.attachments}
              <div class="tab-pane fade in" id="attachments">
                 <section class="product-attachments">
                   <h3 class="h5 text-uppercase">{l s='Download' d='Shop.Theme.Actions'}</h3>
                   {foreach from=$product.attachments item=attachment}
                     <div class="attachment">
                       <h4><a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">{$attachment.name|escape:'html':'UTF-8'}</a></h4>
                       <p>{$attachment.description|escape:'html':'UTF-8'}</p
                       <a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">
                         {l s='Download' d='Shop.Theme.Actions'} ({$attachment.file_size_formatted|escape:'html':'UTF-8'})
                       </a>
                     </div>
                   {/foreach}
                 </section>
               </div>
             {/if}
           {/block}
           {foreach from=$product.extraContent item=extra key=extraKey}
           <div class="tab-pane fade in {$extra.attr.class|escape:'html':'UTF-8'}" id="extra-{$extraKey|escape:'html':'UTF-8'}" {foreach $extra.attr as $key => $val} {$key|escape:'html':'UTF-8'}="{$val|escape:'html':'UTF-8'}"{/foreach}>
               {$extra.content nofilter}
           </div>
           {/foreach}
           {hook h='productTabContent' product=$product}
        </div>
      </div>
    <div class="clearfix"></div>
    {block name='product_accessories'}
      {if $accessories}
        <section class="product-accessories col-md-12 col-xs-12">
          <h3 class="h1 products-section-title text-uppercase">
            <span>{l s='You might also like' d='Shop.Theme.Catalog'}</span></h3>
          <div class="products categoryproducts_content">
            {foreach from=$accessories item="product_accessory"}
              {block name='product_miniature'}
                {include file='catalog/_partials/miniatures/product.tpl' product=$product_accessory}
              {/block}
            {/foreach}
          </div>
        </section>
      {/if}
    {/block}

    {block name='product_footer'}
      {hook h='displayFooterProduct' product=$product category=$category}
    {/block}

    {block name='product_images_modal'}
      {include file='catalog/_partials/product-images-modal.tpl'}
    {/block}

    {block name='page_footer_container'}
      <footer class="page-footer">
        {block name='page_footer'}
          <!-- Footer content -->
        {/block}
      </footer>
    {/block}
  </div>

{/block}
