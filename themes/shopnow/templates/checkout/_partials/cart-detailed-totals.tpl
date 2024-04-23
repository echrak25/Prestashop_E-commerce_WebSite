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
<div class="cart-detailed-totals">
  {if isset($cart.subtotals)}
    <div class="card-block">
      {foreach from=$cart.subtotals item="subtotal"}
        {if isset($subtotal.value) && $subtotal.value && $subtotal.type !== 'tax'}
          <div class="cart-summary-line" id="cart-subtotal-{$subtotal.type|escape:'html':'UTF-8'}">
          <span class="label{if 'products' === $subtotal.type} js-subtotal{/if}">
            {if 'products' == $subtotal.type}
              {$cart.summary_string|escape:'html':'UTF-8'}
            {else}
              {$subtotal.label|escape:'html':'UTF-8'}
            {/if}
          </span>
            <span class="value">{$subtotal.value|escape:'html':'UTF-8'}</span>
            {if $subtotal.type === 'shipping'}
              <div><small class="value">{hook h='displayCheckoutSubtotalDetails' subtotal=$subtotal}</small></div>
            {/if}
          </div>
        {/if}
      {/foreach}
    </div>
  {/if}

  {block name='cart_voucher'}
    {include file='checkout/_partials/cart-voucher.tpl'}
  {/block}

  <hr>

  <div class="card-block">
    {if isset($cart.totals.total)}
      <div class="cart-summary-line cart-total">
        <span class="label">{$cart.totals.total.label|escape:'html':'UTF-8'} {$cart.labels.tax_short|escape:'html':'UTF-8'}</span>
        <span class="value">{$cart.totals.total.value|escape:'html':'UTF-8'}</span>
      </div>
    {/if}
    {if isset($cart.subtotals.tax)}
      <div class="cart-summary-line">
        <small class="label">{$cart.subtotals.tax.label|escape:'html':'UTF-8'}</small>
        <small class="value">{$cart.subtotals.tax.value|escape:'html':'UTF-8'}</small>
      </div>
    {/if}
  </div>

  <hr>
</div>
