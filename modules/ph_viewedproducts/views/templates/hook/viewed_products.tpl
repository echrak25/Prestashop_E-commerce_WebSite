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
    <section
            class="ph-viewed-products featured-products clearfix {if isset($hook) && $hook}ph_display_list{$hook|escape:'html':'UTF-8'}{/if}">
        <h2 class="viewed_title">{$title|escape:'html':'UTF-8'}</h2>
        <div class="products row">
            {foreach from=$products item="product"}
                {*include file="catalog/_partials/miniatures/product.tpl" product=$product*}
                {block name='product_miniature_item'}
                    <article class="product-miniature-viewed" title="{$product.name|escape:'html':'UTF-8'}"
                             data-id-product="{$product.id_product|escape:'html':'UTF-8'}"
                             data-id-product-attribute="{$product.id_product_attribute|escape:'html':'UTF-8'}" itemscope
                             itemtype="http://schema.org/Product">
                        <div class="thumbnail-container-viewed">
                            {block name='product_thumbnail'}
                                {if $product.cover}
                                    <a href="{$product.url|escape:'quotes':'UTF-8'}"
                                       class="thumbnail product-thumbnail">
                                        <img src="{$product.cover.bySize.home_default.url|escape:'quotes':'UTF-8'}"
                                             alt="{if !empty($product.cover.legend)}{$product.cover.legend|escape:'html':'UTF-8'}{else}{$product.name|truncate:30:'...'|escape:'html':'UTF-8'}{/if}"
                                             data-full-size-image-url="{$product.cover.large.url|escape:'quotes':'UTF-8'}"
                                        />
                                    </a>
                                {else}
                                    <a href="{$product.url|escape:'quotes':'UTF-8'}"
                                       class="thumbnail product-thumbnail">
                                        <img src="{$urls.no_picture_image.bySize.home_default.url|escape:'quotes':'UTF-8'}"/>
                                    </a>
                                {/if}
                            {/block}
                        </div>
                    </article>
                {/block}
            {/foreach}
        </div>
        <div class="clearfix"></div>
    </section>
{/if}