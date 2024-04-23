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
  {l s='Order history' d='Shop.Theme.Actions'}
{/block}

{block name='page_content'}
  <div class="col-xs-12 col-xm-12">
  <h6>{l s='Here are the orders you\'ve placed since your account was created.' d='Shop.Theme.Actions'}</h6>

  {if $orders}
    <table class="table table-striped table-bordered table-labeled hidden-sm-down">
      <thead class="thead-default">
        <tr>
          <th>{l s='Order reference' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Date' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Total price' d='Shop.Theme.Checkout'}</th>
          <th class="hidden-md-down">{l s='Payment' d='Shop.Theme.Checkout'}</th>
          <th class="hidden-md-down">{l s='Status' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Invoice' d='Shop.Theme.Checkout'}</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$orders item=order}
          <tr>
            <th scope="row">{$order.details.reference|escape:'html':'UTF-8'}</th>
            <td>{$order.details.order_date|escape:'html':'UTF-8'}</td>
            <td class="text-xs-right">{$order.totals.total.value|escape:'html':'UTF-8'}</td>
            <td class="hidden-md-down">{$order.details.payment|escape:'html':'UTF-8'}</td>
            <td>
              <span
                class="label label-pill {$order.history.current.contrast|escape:'html':'UTF-8'}"
                style="background-color:{$order.history.current.color|escape:'html':'UTF-8'}"
              >
                {$order.history.current.ostate_name|escape:'html':'UTF-8'}
              </span>
            </td>
            <td class="text-xs-center hidden-md-down">
              {if $order.details.invoice_url}
                <a href="{$order.details.invoice_url|escape:'html':'UTF-8'}"><i class="material-icons">&#xE415;</i></a>
              {else}
                -
              {/if}
            </td>
            <td class="text-xs-center order-actions">
              <a href="{$order.details.details_url|escape:'html':'UTF-8'}" data-link-action="view-order-details">
                {l s='Details' d='Shop.Theme.Actions'}
              </a>
              {if $order.details.reorder_url}
                <a href="{$order.details.reorder_url|escape:'html':'UTF-8'}">{l s='Reorder' d='Shop.Theme.Actions'}</a>
              {/if}
            </td>
          </tr>
        {/foreach}
      </tbody>
    </table>

    <div class="orders hidden-md-up">
      {foreach from=$orders item=order}
        <div class="order">
          <div class="row">
            <div class="col-xs-10">
              <a href="{$order.details.details_url|escape:'html':'UTF-8'}"><h3>{$order.details.reference|escape:'html':'UTF-8'}</h3></a>
              <div class="date">{$order.details.order_date|escape:'html':'UTF-8'}</div>
              <div class="total">{$order.totals.total.value|escape:'html':'UTF-8'}</div>
              <div class="status">
                <span
                  class="label label-pill {$order.history.current.contrast|escape:'html':'UTF-8'}"
                  style="background-color:{$order.history.current.color|escape:'html':'UTF-8'}"
                >
                  {$order.history.current.ostate_name|escape:'html':'UTF-8'}
                </span>
              </div>
            </div>
            <div class="col-xs-2 text-xs-right">
                <div>
                  <a href="{$order.details.details_url|escape:'html':'UTF-8'}" data-link-action="view-order-details" title="{l s='Details' d='Shop.Theme.Actions'}">
                    <i class="material-icons">&#xE8B6;</i>
                  </a>
                </div>
                {if $order.details.reorder_url}
                  <div>
                    <a href="{$order.details.reorder_url|escape:'html':'UTF-8'}" title="{l s='Reorder' d='Shop.Theme.Actions'}">
                      <i class="material-icons">&#xE863;</i>
                    </a>
                  </div>
                {/if}
            </div>
          </div>
        </div>
      {/foreach}
    </div>

  {/if}
</div>
{/block}
