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
<section id="js-checkout-summary" class="card js-cart" data-refresh-url="{$urls.pages.cart|escape:'html':'UTF-8'}?ajax=1">
  <div class="card-block">
    {hook h='displayCheckoutSummaryTop'}
    {block name='cart_summary_products'}
      <div class="cart-summary-products">

        <h4 class="title_summary">{l s='Shopping Cart:' d='Shop.Theme.Actions'}<span>{$cart.summary_string|escape:'html':'UTF-8'}</span></h4>

        {*<p>
          <a href="#" data-toggle="collapse" data-target="#cart-summary-product-list">
            {l s='show details' d='Shop.Theme.Actions'}
          </a>
        </p>*}
        {block name='cart_summary_product_list'}
          <div class="" id="cart-summary-product-list">
            <ul class="media-list">
              {foreach from=$cart.products item=product}
                <li class="media">{include file='checkout/_partials/cart-summary-product-line.tpl' product=$product}</li>
              {/foreach}
            </ul>
          </div>
        {/block}
      </div>
    {/block}

    {block name='cart_summary_subtotals'}
      {foreach from=$cart.subtotals item="subtotal"}
        {if $subtotal && $subtotal.type !== 'tax'}
          <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-{$subtotal.type|escape:'html':'UTF-8'}">
            <span class="label">{$subtotal.label|escape:'html':'UTF-8'}</span>
            <span class="value">{$subtotal.value|escape:'html':'UTF-8'}</span>
          </div>
        {/if}
      {/foreach}
    {/block}

  </div>

  {block name='cart_summary_voucher'}
    {include file='checkout/_partials/cart-voucher.tpl'}
  {/block}

  {block name='cart_summary_totals'}
    {include file='checkout/_partials/cart-summary-totals.tpl' cart=$cart}
  {/block}

</section>
