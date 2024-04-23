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
<div class="ets-wishlist-products-container-header">
    <h1>
        {$wishlistName|escape:'html':'UTF-8'}
        <span class="ets-wishlist-products-count"> ({$totalRecords|intval}) </span>
        {if Configuration::get('ETS_WL_DISPLAY_SHARE_BUTTON_ON_WISHLIST_PAGE')}
            <ul class="buttons-share-wishlist" style="">
                <li class="facebook">
                    <a class="" href="https://www.facebook.com/sharer.php?u={$urlView|escape:'html':'UTF-8'}" title="Share" target="_blank" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
                    </a>
                </li>
                <li class="twitter">
                    <a class="" href="https://twitter.com/intent/tweet?text={$wishlistName|escape:'html':'UTF-8'} {$urlView|escape:'html':'UTF-8'}" title="Tweet" target="_blank" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
                    </a>
                </li>
                <li class="pinterest">
                    <a class="" href="https://www.pinterest.com/pin/create/button/?url={$urlView|escape:'html':'UTF-8'}" title="Pinterest" target="_blank" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"/></svg>
                    </a>
                </li>
                <li class="copylink">
                    <a title="{l s='Copy link' mod='ets_wishlist_pres17'}" href="#" class="btn-copy-url-share" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z"/></svg>
                    </a>
                    <input name="share_link_wishlist" type="text" value="{$urlView|escape:'html':'UTF-8'}" style="opacity:0;width:1px"  />
                </li>
            </ul>
        {/if}
        <div class="clearfix"></div>
    </h1>
    <div class="sort-by-row">
        <span class="col-sm-3 col-md-3 hidden-sm-down sort-by">Sort by:</span>
        <div class="col-sm-9 col-xs-8 col-md-9 products-sort-order dropdown">
            <button class="btn-unstyle select-title" rel="nofollow" data-toggle="dropdown" aria-label="Sort by selection" aria-haspopup="true" aria-expanded="false">
                {if $sortOrder=='product.name.asc'}
                    {l s='Name, A to Z' mod='ets_wishlist_pres17'}
                {elseif $sortOrder=='product.name.desc'}
                    {l s='Name, Z to A' mod='ets_wishlist_pres17'}
                {elseif $sortOrder=='product.price.asc'}
                    {l s='Price, low to high' mod='ets_wishlist_pres17'}
                {elseif $sortOrder=='wishlist_product.id_wishlist_product.desc'}
                    {l s='Last added' mod='ets_wishlist_pres17'}
                {else}
                    {l s='Relevance' mod='ets_wishlist_pres17'}
                {/if}
                <i class="material-icons float-xs-right"><i class="material-icons float-xs-right">arrow_drop_down</i></i>
            </button>
            <div class="dropdown-menu">
                <a href="{$urlView|escape:'html':'UTF-8'}" class="select-list" rel="nofollow">
                    {l s='Relevance' mod='ets_wishlist_pres17'}
                </a>
                <a href="{$urlView|escape:'html':'UTF-8'}&order=product.name.asc" class="select-list" rel="nofollow"> 
                {l s='Name, A to Z' mod='ets_wishlist_pres17'}
                </a>
                <a href="{$urlView|escape:'html':'UTF-8'}&order=product.name.desc" class="select-list" rel="nofollow">
                 {l s='Name, Z to A' mod='ets_wishlist_pres17'}
                 </a>
                <a href="{$urlView|escape:'html':'UTF-8'}&order=product.price.asc" class="select-list" rel="nofollow">
                 {l s='Price, low to high' mod='ets_wishlist_pres17'}
                </a>
                <a href="{$urlView|escape:'html':'UTF-8'}&order=wishlist_product.id_wishlist_product.desc" class="select-list" rel="nofollow">
                 {l s='Last added' mod='ets_wishlist_pres17'}
                </a>
            </div>
        </div>
    </div>
</div>
<section id="content" class="page-content card card-block">
    {if $products}
        <ul class="ets-wishlist-products-list">
            {foreach from=$products item='product'}
                <li class="ets-wishlist-products-item" data-id="{$product.id_product|intval}-{$product.id_product_attribute|intval}">
                    <div class="ets-wishlist-product">
                        <a href="{$product.url|escape:'html':'UTF-8'}" class="ets-wishlist-product-link">
                            <div class="ets-wishlist-product-image">
                                {if $product.cover}
                                    <img src="{$product.cover.bySize.home_default.url|escape:'html':'UTF-8'}" alt="{if !empty($product.cover.legend)}{$product.cover.legend|escape:'html':'UTF-8'}{else}{$product.name|truncate:30:'...'|escape:'html':'UTF-8'}{/if}" title="{$product.name|escape:'html':'UTF-8'}" class="" />
                                {else}
                                    <img src="{$urls.no_picture_image.bySize.home_default.url|escape:'html':'UTF-8'}"loading="lazy"width="250" height="250"/>
                                {/if} 
                                <p class="ets-wishlist-product-availability">
                                </p>
                            </div>
                            <div class="ets-wishlist-product-right">
                                <p class="ets-wishlist-product-title">{$product.name|escape:'html':'UTF-8'}</p>
                                <p class="ets-wishlist-product-price">{$product.price|escape:'html':'UTF-8'}</p>
                                {if isset($product.attributes) && $product.attributes}
                                    <div class="ets-wishlist-product-combinations">
                                        <p class="ets-wishlist-product-combinations-text">
                                            {foreach from=$product.attributes item='attribute'}
                                                {$attribute.group|escape:'html':'UTF-8'}: {$attribute.name|escape:'html':'UTF-8'}
                                                <span>-</span>
                                            {/foreach}
                                            <span>
                                                {l s='Quantity' mod='ets_wishlist_pres17'} : 1
                                            </span> 
                                        </p> 
                                        <a href="{$product.url|escape:'html':'UTF-8'}">
                                            <i class="material-icons">create</i>
                                        </a>
                                    </div>
                                {/if}
                            </div>
                        </a>
                        <div class="ets-wishlist-product-bottom " >
                            <button class="btn ets-wishlist-product-addtocart btn-primary" data-id_wishlist="{$id_wishlist|intval}" data-link="{$link->getPageLink('cart',null,null,['add'=>1,'id_product'=>$product.id_product,'id_product_attribute'=>$product.id_product_attribute,'op'=>'up'])|escape:'html':'UTF-8'}" class="btn btn-primary add-to-cart-gift-product" data-id_product="{$product.id_product|intval}" data-id_product_attribute="{$product.id_product_attribute|intval}">
                                <i class="material-icons shopping-cart">
                                    shopping_cart
                                </i>
                                {l s='Add to cart' mod='ets_wishlist_pres17'}
                            </button>
                            {if !$isGuest}
                                <button class="ets-wishlist-button-add btn_delete_wishlist view_page" data-url="{$deleteProductUrl nofilter}" data-id-product="{$product.id_product|intval}" data-id-product-attribute="{$product.id_product_attribute|intval}" data-id_wishlist="{$id_wishlist|intval}">
                                    <i class="material-icons">delete</i>
                                </button>
                            {/if}
                        </div>
                        <p class="ets-wishlist-product-availability wishlist-product-availability-responsive">
                         <!----> <!----> 
                        </p>
                    </div>
                </li>
            {/foreach}
        </ul>
    {else}
        <div class="alert alert-warning">{l s='No products found' mod='ets_wishlist_pres17'}</div>
    {/if}
    {$paggination nofilter}
</section>