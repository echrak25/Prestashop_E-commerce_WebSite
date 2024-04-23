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
<form id="order-return-form" action="{$urls.pages.order_follow|escape:'html':'UTF-8'}" method="post">

<div class="box hidden-sm-down">
  <table id="order-products" class="table table-bordered return">
    <thead class="thead-default">
      <tr>
        <th class="head-checkbox"><input type="checkbox"/></th>
        <th>{l s='Product' d='Shop.Theme.Catalog'}</th>
        <th>{l s='Quantity' d='Shop.Theme.Catalog'}</th>
        <th>{l s='Returned' d='Shop.Theme.Actions'}</th>
        <th>{l s='Unit price' d='Shop.Theme.Catalog'}</th>
        <th>{l s='Total price' d='Shop.Theme.Catalog'}</th>
      </tr>
    </thead>
    {foreach from=$order.products item=product name=products}
      <tr>
        <td>
          {if !$product.customizations}
            <span id="_desktop_product_line_{$product.id_order_detail|escape:'html':'UTF-8'}">
              <input type="checkbox" id="cb_{$product.id_order_detail|escape:'html':'UTF-8'}" name="ids_order_detail[{$product.id_order_detail|escape:'html':'UTF-8'}]" value="{$product.id_order_detail|escape:'html':'UTF-8'}">
            </span>
          {else}
            {foreach $product.customizations  as $customization}
              <span id="_desktop_product_customization_line_{$product.id_order_detail|escape:'html':'UTF-8'}_{$customization.id_customization|escape:'html':'UTF-8'}">
                <input type="checkbox" id="cb_{$product.id_order_detail|escape:'html':'UTF-8'}" name="customization_ids[{$product.id_order_detail|escape:'html':'UTF-8'}][]" value="{$customization.id_customization|escape:'html':'UTF-8'}">
              </span>
            {/foreach}
          {/if}
        </td>
        <td>
          <strong>{$product.name|escape:'html':'UTF-8'}</strong><br/>
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
        <td class="qty">
          {if !$product.customizations}
            <div class="current">
              {$product.quantity|escape:'html':'UTF-8'}
            </div>
            {if $product.quantity > $product.qty_returned}
              <div class="select" id="_desktop_return_qty_{$product.id_order_detail|escape:'html':'UTF-8'}">
                <select name="order_qte_input[{$product.id_order_detail|escape:'html':'UTF-8'}]" class="form-control form-control-select">
                  {section name=quantity start=1 loop=$product.quantity+1-$product.qty_returned}
                    <option value="{$smarty.section.quantity.index|escape:'html':'UTF-8'}">{$smarty.section.quantity.index|escape:'html':'UTF-8'}</option>
                  {/section}
                </select>
              </div>
            {/if}
          {else}
            {foreach $product.customizations as $customization}
               <div class="current">
                {$customization.quantity|escape:'html':'UTF-8'}
              </div>
              <div class="select" id="_desktop_return_qty_{$product.id_order_detail|escape:'html':'UTF-8'}_{$customization.id_customization|escape:'html':'UTF-8'}">
                <select
                  name="customization_qty_input[{$customization.id_customization|escape:'html':'UTF-8'}]"
                  class="form-control form-control-select"
                >
                  {section name=quantity start=1 loop=$customization.quantity+1}
                    <option value="{$smarty.section.quantity.index|escape:'html':'UTF-8'}">{$smarty.section.quantity.index|escape:'html':'UTF-8'}</option>
                  {/section}
                </select>
              </div>
            {/foreach}
            <div class="clearfix"></div>
          {/if}
        </td>
        <td class="text-xs-right">{$product.qty_returned|escape:'html':'UTF-8'}</td>
        <td class="text-xs-right">{$product.price|escape:'html':'UTF-8'}</td>
        <td class="text-xs-right">{$product.total|escape:'html':'UTF-8'}</td>
      </tr>
    {/foreach}
    <tfoot>
      {foreach $order.subtotals as $line}
        {if $line.value}
          <tr class="text-xs-right line-{$line.type|escape:'html':'UTF-8'}">
            <td colspan="5">{$line.label|escape:'html':'UTF-8'}</td>
            <td colspan="2">{$line.value|escape:'html':'UTF-8'}</td>
          </tr>
        {/if}
      {/foreach}
      <tr class="text-xs-right line-{$order.totals.total.type|escape:'html':'UTF-8'}">
        <td colspan="5">{$order.totals.total.label|escape:'html':'UTF-8'}</td>
        <td colspan="2">{$order.totals.total.value|escape:'html':'UTF-8'}</td>
      </tr>
    </tfoot>
  </table>
</div>

<div class="order-items hidden-md-up box">
  {foreach from=$order.products item=product}
    <div class="order-item">
      <div class="row">
        <div class="checkbox">
          {if !$product.customizations}
            <span id="_mobile_product_line_{$product.id_order_detail|escape:'html':'UTF-8'}"></span>
          {else}
            {foreach $product.customizations  as $customization}
              <span id="_mobile_product_customization_line_{$product.id_order_detail|escape:'html':'UTF-8'}_{$customization.id_customization|escape:'html':'UTF-8'}"></span>
            {/foreach}
          {/if}
        </div>
        <div class="content">
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
                      <div class="q">{l s='Quantity' d='Shop.Theme.Catalog'}: {$customization.quantity|escape:'html':'UTF-8'}</div>
                      <div class="s" id="_mobile_return_qty_{$product.id_order_detail|escape:'html':'UTF-8'}_{$customization.id_customization|escape:'html':'UTF-8'}"></div>
                    {/foreach}
                  {else}
                    <div class="q">{l s='Quantity' d='Shop.Theme.Catalog'}: {$product.quantity|escape:'html':'UTF-8'}</div>
                    {if $product.quantity > $product.qty_returned}
                      <div class="s" id="_mobile_return_qty_{$product.id_order_detail|escape:'html':'UTF-8'}"></div>
                    {/if}
                  {/if}
                  {if $product.qty_returned > 0}
                    <div>{l s='Returned' d='Shop.Theme.Actions'}: {$product.qty_returned|escape:'html':'UTF-8'}</div>
                  {/if}
                </div>
                <div class="col-xs-4 text-xs-right">
                  {$product.total|escape:'html':'UTF-8'}
                </div>
              </div>
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

<div class="box">
  <header>
    <h3>{l s='Merchandise return' d='Shop.Theme.Actions'}</h3>
    <p>{l s='If you wish to return one or more products, please mark the corresponding boxes and provide an explanation for the return. When complete, click the button below.' d='Shop.Theme.Actions'}</p>
  </header>
  <section class="form-fields">
    <div class="form-group">
      <textarea cols="67" rows="3" name="returnText" class="form-control"></textarea>
    </div>
  </section>
  <footer class="form-footer">
    <input type="hidden" name="id_order" value="{$order.details.id|escape:'html':'UTF-8'}">
    <button class="form-control-submit btn btn-primary" type="submit" name="submitReturnMerchandise">
      {l s='Request a return' d='Shop.Theme.Actions'}
    </button>
  </footer>
</div>

</form>
