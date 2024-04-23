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
{extends file='customer/page.tpl'}

{block name='page_title'}
  {l s='Order details' d='Shop.Theme.Actions'}
{/block}

{block name='page_content'}
  <div class="col-xs-12 col-xm-12">
  {block name='order_infos'}
    <div id="order-infos">
      <div class="box">
          <div class="row">
            <div class="col-xs-{if $order.details.reorder_url}9{else}12{/if}">
              <strong>
                {l
                  s='Order Reference %reference% - placed on %date%'
                  d='Shop.Theme.Actions'
                  sprintf=['%reference%' => $order.details.reference, '%date%' => $order.details.order_date]
                }
              </strong>
            </div>
            {if $order.details.reorder_url}
              <div class="col-xs-3 text-xs-right">
                <a href="{$order.details.reorder_url|escape:'html':'UTF-8'}" class="button-primary">{l s='Reorder' d='Shop.Theme.Actions'}</a>
              </div>
            {/if}
            <div class="clearfix"></div>
          </div>
      </div>

      <div class="box">
          <ul>
            <li><strong>{l s='Carrier' d='Shop.Theme.Checkout'}</strong> {$order.carrier.name|escape:'html':'UTF-8'}</li>
            <li><strong>{l s='Payment method' d='Shop.Theme.Checkout'}</strong> {$order.details.payment|escape:'html':'UTF-8'}</li>

            {if $order.details.invoice_url}
              <li>
                <a href="{$order.details.invoice_url|escape:'html':'UTF-8'}">
                  {l s='Download your invoice as a PDF file.' d='Shop.Theme.Actions'}
                </a>
              </li>
            {/if}

            {if $order.details.recyclable}
              <li>
                {l s='You have given permission to receive your order in recycled packaging.' d='Shop.Theme.Actions'}
              </li>
            {/if}

            {if $order.details.gift_message}
              <li>{l s='You have requested gift wrapping for this order.' d='Shop.Theme.Actions'}</li>
              <li>{l s='Message' d='Shop.Theme.Actions'} {$order.details.gift_message nofilter}</li>
            {/if}
          </ul>
      </div>
    </div>
  {/block}

  {block name='order_history'}
    <section id="order-history" class="box">
      <h3>{l s='Follow your order\'s status step-by-step' d='Shop.Theme.Actions'}</h3>
      <table class="table table-striped table-bordered table-labeled hidden-xs-down">
        <thead class="thead-default">
          <tr>
            <th>{l s='Date' d='Shop.Theme.Actions'}</th>
            <th>{l s='Status' d='Shop.Theme.Actions'}</th>
          </tr>
        </thead>
        <tbody>
          {foreach from=$order.history item=state}
            <tr>
              <td>{$state.history_date|escape:'html':'UTF-8'}</td>
              <td>
                <span class="label label-pill {$state.contrast|escape:'html':'UTF-8'}" style="background-color:{$state.color|escape:'html':'UTF-8'}">
                  {$state.ostate_name|escape:'html':'UTF-8'}
                </span>
              </td>
            </tr>
          {/foreach}
        </tbody>
      </table>
      <div class="hidden-sm-up history-lines">
        {foreach from=$order.history item=state}
          <div class="history-line">
            <div class="date">{$state.history_date|escape:'html':'UTF-8'}</div>
            <div class="state">
              <span class="label label-pill {$state.contrast|escape:'html':'UTF-8'}" style="background-color:{$state.color|escape:'html':'UTF-8'}">
                {$state.ostate_name|escape:'html':'UTF-8'}
              </span>
            </div>
          </div>
        {/foreach}
      </div>
    </section>
  {/block}

  {if $order.follow_up}
    <div class="box">
      <p>{l s='Click the following link to track the delivery of your order' d='Shop.Theme.Actions'}</p>
      <a href="{$order.follow_up|escape:'html':'UTF-8'}">{$order.follow_up|escape:'html':'UTF-8'}</a>
    </div>
  {/if}

  {block name='addresses'}
    <div class="addresses">
      {if $order.addresses.delivery}
        <div class="col-lg-6 col-md-6 col-sm-6">
          <article id="delivery-address" class="box">
            <h4>{l s='Delivery address %alias%' d='Shop.Theme.Checkout' sprintf=['%alias%' => $order.addresses.delivery.alias]}</h4>
            <address>{$order.addresses.delivery.formatted nofilter}</address>
          </article>
        </div>
      {/if}

      <div class="col-lg-6 col-md-6 col-sm-6">
        <article id="invoice-address" class="box">
          <h4>{l s='Invoice address %alias%' d='Shop.Theme.Checkout' sprintf=['%alias%' => $order.addresses.invoice.alias]}</h4>
          <address>{$order.addresses.invoice.formatted nofilter}</address>
        </article>
      </div>
      <div class="clearfix"></div>
    </div>
  {/block}

  {$HOOK_DISPLAYORDERDETAIL nofilter}

  {block name='order_detail'}
    {if $order.details.is_returnable}
      {include file='customer/_partials/order-detail-return.tpl'}
    {else}
      {include file='customer/_partials/order-detail-no-return.tpl'}
    {/if}
  {/block}

  {block name='order_carriers'}
    {if $order.shipping}
      <div class="box">
        <table class="table table-striped table-bordered hidden-sm-down">
          <thead class="thead-default">
            <tr>
              <th>{l s='Date' d='Shop.Theme.Actions'}</th>
              <th>{l s='Carrier' d='Shop.Theme.Checkout'}</th>
              <th>{l s='Weight' d='Shop.Theme.Checkout'}</th>
              <th>{l s='Shipping cost' d='Shop.Theme.Checkout'}</th>
              <th>{l s='Tracking number' d='Shop.Theme.Checkout'}</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$order.shipping item=line}
              <tr>
                <td>{$line.shipping_date|escape:'html':'UTF-8'}</td>
                <td>{$line.carrier_name|escape:'html':'UTF-8'}</td>
                <td>{$line.shipping_weight|escape:'html':'UTF-8'}</td>
                <td>{$line.shipping_cost|escape:'html':'UTF-8'}</td>
                <td>{$line.tracking|escape:'html':'UTF-8'}</td>
              </tr>
            {/foreach}
          </tbody>
        </table>
        <div class="hidden-md-up shipping-lines">
          {foreach from=$order.shipping item=line}
            <div class="shipping-line">
              <ul>
                <li>
                  <strong>{l s='Date' d='Shop.Theme.Actions'}</strong> {$line.shipping_date|escape:'html':'UTF-8'}
                </li>
                <li>
                  <strong>{l s='Carrier' d='Shop.Theme.Checkout'}</strong> {$line.carrier_name|escape:'html':'UTF-8'}
                </li>
                <li>
                  <strong>{l s='Weight' d='Shop.Theme.Checkout'}</strong> {$line.shipping_weight|escape:'html':'UTF-8'}
                </li>
                <li>
                  <strong>{l s='Shipping cost' d='Shop.Theme.Checkout'}</strong> {$line.shipping_cost|escape:'html':'UTF-8'}
                </li>
                <li>
                  <strong>{l s='Tracking number' d='Shop.Theme.Checkout'}</strong> {$line.tracking|escape:'html':'UTF-8'}
                </li>
              </ul>
            </div>
          {/foreach}
        </div>
      </div>
    {/if}
  {/block}

  {block name='order_messages'}
    {include file='customer/_partials/order-messages.tpl'}
  {/block}
  </div>
{/block}
