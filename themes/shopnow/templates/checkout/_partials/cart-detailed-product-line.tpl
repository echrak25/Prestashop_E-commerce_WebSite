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
<div class="product-line-grid">
  <!--  product left content: image-->
  <div class="product-line-grid-left col-md-3 col-xs-4">
    <span class="product-image media-middle">
      <img src="{$product.cover.bySize.cart_default.url|escape:'html':'UTF-8'}" alt="{$product.name|escape:'quotes'}">
    </span>
  </div>

  <!--  product left body: description -->
  <div class="product-line-grid-body col-md-4 col-xs-8">
    <div class="product-line-info">
      <a class="label" href="{$product.url|escape:'html':'UTF-8'}" data-id_customization="{$product.id_customization|intval}">{$product.name|escape:'html':'UTF-8'}</a>
    </div>

    <div class="product-line-info">
      <span class="value">{$product.price|escape:'html':'UTF-8'}</span>
      {if $product.unit_price_full}
        <div class="unit-price-cart">{$product.unit_price_full|escape:'html':'UTF-8'}</div>
      {/if}
    </div>

    <br/>

    {foreach from=$product.attributes key="attribute" item="value"}
      <div class="product-line-info">
        <span class="label">{$attribute|escape:'html':'UTF-8'}:</span>
        <span class="value">{$value|escape:'html':'UTF-8'}</span>
      </div>
    {/foreach}

    {if $product.customizations|count}
      <br/>
      {foreach from=$product.customizations item="customization"}
        <a href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization|escape:'html':'UTF-8'}">{l s='Product customization' d='Shop.Theme.Catalog'}</a>
        <div class="modal fade customization-modal" id="product-customizations-modal-{$customization.id_customization|escape:'html':'UTF-8'}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">{l s='Product customization' d='Shop.Theme.Catalog'}</h4>
              </div>
              <div class="modal-body">
                {foreach from=$customization.fields item="field"}
                  <div class="product-customization-line row">
                    <div class="col-sm-3 col-xs-4 label">
                      {$field.label|escape:'html':'UTF-8'}
                    </div>
                    <div class="col-sm-9 col-xs-8 value">
                      {if $field.type == 'text'}
                        {if (int)$field.id_module}
                          {$field.text nofilter}
                        {else}
                          {$field.text|escape:'html':'UTF-8'}
                        {/if}
                      {elseif $field.type == 'image'}
                        <img src="{$field.image.small.url|escape:'html':'UTF-8'}">
                      {/if}
                    </div>
                  </div>
                {/foreach}
              </div>
            </div>
          </div>
        </div>
      {/foreach}
    {/if}
  </div>

  <!--  product left body: description -->
  <div class="product-line-grid-right product-line-actions col-md-5 col-xs-12">
    <div class="row">
      <div class="col-xs-4 hidden-md-up"></div>
      <div class="col-md-10 col-xs-6">
        <div class="row">
          <div class="col-md-6 col-xs-6 qty">
            {if isset($product.is_gift) && $product.is_gift}
              <span class="gift-quantity">{$product.quantity|escape:'html':'UTF-8'}</span>
            {else}
              <input
                class="js-cart-line-product-quantity"
                data-down-url="{$product.down_quantity_url|escape:'html':'UTF-8'}"
                data-up-url="{$product.up_quantity_url|escape:'html':'UTF-8'}"
                data-update-url="{$product.update_quantity_url|escape:'html':'UTF-8'}"
                data-product-id="{$product.id_product|escape:'html':'UTF-8'}"
                type="text"
                value="{$product.quantity|escape:'html':'UTF-8'}"
                name="product-quantity-spin"
                min="{$product.minimal_quantity|escape:'html':'UTF-8'}"
              />
            {/if}
          </div>
          <div class="col-md-6 col-xs-2 price">
            <span class="product-price">
              <strong>
                {if isset($product.is_gift) && $product.is_gift}
                  <span class="gift">{l s='Gift' d='Shop.Theme.Checkout'}</span>
                {else}
                  {$product.total|escape:'html':'UTF-8'}
                {/if}
              </strong>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-xs-2 text-xs-right">
        <div class="cart-line-product-actions ">
          <a
              class                       = "remove-from-cart"
              rel                         = "nofollow"
              href                        = "{$product.remove_from_cart_url|escape:'html':'UTF-8'}"
              data-link-action            = "delete-from-cart"
              data-id-product             = "{$product.id_product|intval}"
              data-id-product-attribute   = "{$product.id_product_attribute|intval}"
              data-id-customization   	  = "{$product.id_customization|intval}"
          >
            {if !isset($product.is_gift) || !$product.is_gift}
            <i class="material-icons pull-xs-left">delete</i>
            {/if}
          </a>
          {hook h='displayCartExtraProductActions' product=$product}
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</div>
