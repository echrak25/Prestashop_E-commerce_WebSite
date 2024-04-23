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
<div class="box hidden-sm-down">
  <table id="order-products" class="table table-bordered">
    <thead class="thead-default">
      <tr>
        <th>{l s='Product' d='Shop.Theme.Catalog'}</th>
        <th>{l s='Quantity' d='Shop.Theme.Catalog'}</th>
        <th>{l s='Unit price' d='Shop.Theme.Catalog'}</th>
        <th>{l s='Total price' d='Shop.Theme.Catalog'}</th>
      </tr>
    </thead>
    {foreach from=$order.products item=product}
      <tr>
        <td>
          <strong>
            <a {if isset($product.download_link)}href="{$product.download_link|escape:'html':'UTF-8'}"{/if}>
              {$product.name|escape:'html':'UTF-8'}
            </a>
          </strong><br/>
          {if $product.reference}
            {l s='Reference' d='Shop.Theme.Catalog'}: {$product.reference|escape:'html':'UTF-8'}<br/>
          {/if}
          {if $product.customizations}
            {foreach from=$product.customizations item="customization"}
              <div class="customization">
                <a href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization|escape:'html':'UTF-8'}">{l s='Product customization' d='Shop.Theme.Catalog'}</a>
              </div>
              <div id="_desktop_product_customization_modal_wrapper_{$customization.id_customization|escape:'html':'UTF-8'}">
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
              </div>
            {/foreach}
          {/if}
        </td>
        <td>
          {if $product.customizations}
            {foreach $product.customizations as $customization}
              {$customization.quantity|escape:'html':'UTF-8'}
            {/foreach}
          {else}
            {$product.quantity|escape:'html':'UTF-8'}
          {/if}
        </td>
        <td class="text-xs-right">{$product.price|escape:'html':'UTF-8'}</td>
        <td class="text-xs-right">{$product.total|escape:'html':'UTF-8'}</td>
      </tr>
    {/foreach}
    <tfoot>
      {foreach $order.subtotals as $line}
        {if $line.value}  
          <tr class="text-xs-right line-{$line.type|escape:'html':'UTF-8'}">
            <td colspan="3">{$line.label|escape:'html':'UTF-8'}</td>
            <td>{$line.value|escape:'html':'UTF-8'}</td>
          </tr>
        {/if}
      {/foreach}
      <tr class="text-xs-right line-{$order.totals.total.type|escape:'html':'UTF-8'}">
        <td colspan="3">{$order.totals.total.label|escape:'html':'UTF-8'}</td>
        <td>{$order.totals.total.value|escape:'html':'UTF-8'}</td>
      </tr>
    </tfoot>
  </table>
</div>

<div class="order-items hidden-md-up box">
  {foreach from=$order.products item=product}
    <div class="order-item">
      <div class="row">
        <div class="col-sm-5 desc">
          <div class="name">{$product.name|escape:'html':'UTF-8'}</div>
          {if $product.reference}
            <div class="ref">{l s='Reference' d='Shop.Theme.Catalog'}: {$product.reference|escape:'html':'UTF-8'}</div>
          {/if}
          {if $product.customizations}
            {foreach $product.customizations as $customization}
              <div class="customization">
                <a href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization|escape:'html':'UTF-8'}">{l s='Product customization' d='Shop.Theme.Catalog'}</a>
              </div>
              <div id="_mobile_product_customization_modal_wrapper_{$customization.id_customization|escape:'html':'UTF-8'}">
              </div>
            {/foreach}
          {/if}
        </div>
        <div class="col-sm-7 qty">
          <div class="row">
            <div class="col-xs-4 text-sm-left text-xs-left">
              {$product.price|escape:'html':'UTF-8'}
            </div>
            <div class="col-xs-4">
              {if $product.customizations}
                {foreach $product.customizations as $customization}
                  {$customization.quantity|escape:'html':'UTF-8'}
                {/foreach}
              {else}
                {$product.quantity|escape:'html':'UTF-8'}
              {/if}
            </div>
            <div class="col-xs-4 text-xs-right">
              {$product.total|escape:'html':'UTF-8'}
            </div>
          </div>
        </div>
      </div>
    </div>
  {/foreach}
</div>
<div class="order-totals hidden-md-up box">
  {foreach $order.subtotals as $line}
    {if $line.value}
      <div class="order-total row">
        <div class="col-xs-8"><strong>{$line.label|escape:'html':'UTF-8'}</strong></div>
        <div class="col-xs-4 text-xs-right">{$line.value|escape:'html':'UTF-8'}</div>
      </div>
    {/if}
  {/foreach}
  <div class="order-total row">
    <div class="col-xs-8"><strong>{$order.totals.total.label|escape:'html':'UTF-8'}</strong></div>
    <div class="col-xs-4 text-xs-right">{$order.totals.total.value|escape:'html':'UTF-8'}</div>
  </div>
</div>
