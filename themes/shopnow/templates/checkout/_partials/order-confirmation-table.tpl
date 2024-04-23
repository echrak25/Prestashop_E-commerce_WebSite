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
{block name='order-items-table-head'}
<div id="order-items" class="col-md-8">
  <h3 class="card-title h3">{l s='Order items' d='Shop.Theme.Checkout'}</h3>
{/block}
  <div class="order-confirmation-table">
    <table class="table">
      {foreach from=$products item=product}
        <div class="order-line row">
          <div class="col-sm-2 col-xs-3">
            <span class="image">
              <img src="{$product.cover.medium.url|escape:'html':'UTF-8'}" />
            </span>
          </div>
          <div class="col-sm-4 col-xs-9 details">
            {if $add_product_link}<a href="{$product.url|escape:'html':'UTF-8'}" target="_blank">{/if}
              <span>{$product.name|escape:'html':'UTF-8'}</span>
            {if $add_product_link}</a>{/if}
            {if $product.customizations|count}
              {foreach from=$product.customizations item="customization"}
                <div class="customizations">
                  <a href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization|escape:'html':'UTF-8'}">{l s='Product customization' d='Shop.Theme.Catalog'}</a>
                </div>
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
            {hook h='displayProductPriceBlock' product=$product type="unit_price"}
          </div>
          <div class="col-sm-6 col-xs-12 qty">
            <div class="row">
              <div class="col-xs-5 text-sm-right text-xs-left">{$product.price|escape:'html':'UTF-8'}</div>
              <div class="col-xs-2">{$product.quantity|escape:'html':'UTF-8'}</div>
              <div class="col-xs-5 text-xs-right bold">{$product.total|escape:'html':'UTF-8'}</div>
            </div>
          </div>
        </div>
      {/foreach}
    <table>
      {foreach $subtotals as $subtotal}
        {if $subtotal.type !== 'tax'}
          <tr>
            <td>{$subtotal.label|escape:'html':'UTF-8'}</td>
            <td>{$subtotal.value|escape:'html':'UTF-8'}</td>
          </tr>
        {/if}
      {/foreach}
      {if $subtotals.tax.label !== null}
        <tr class="sub">
          <td>{$subtotals.tax.label|escape:'html':'UTF-8'}</td>
          <td>{$subtotals.tax.value|escape:'html':'UTF-8'}</td>
        </tr>
      {/if}
      <tr class="font-weight-bold">
        <td><span class="text-uppercase">{$totals.total.label|escape:'html':'UTF-8'}</span> {$labels.tax_short|escape:'html':'UTF-8'}</td>
        <td>{$totals.total.value|escape:'html':'UTF-8'}</td>
      </tr>
    </table>
  </div>
</div>
