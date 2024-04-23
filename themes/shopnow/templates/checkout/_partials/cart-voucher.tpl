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
{if $cart.vouchers.allowed}
  <div class="block-promo">
    <div class="cart-voucher">
      {if $cart.vouchers.added}
        <ul class="promo-name card-block">
          {foreach from=$cart.vouchers.added item=voucher}
            <li class="cart-summary-line">
              <span class="label">{$voucher.name|escape:'html':'UTF-8'}</span>
              <a href="{$voucher.delete_url|escape:'html':'UTF-8'}" data-link-action="remove-voucher"><i class="material-icons">&#xE872;</i></a>
              <div class="pull-xs-right">
                {$voucher.reduction_formatted|escape:'html':'UTF-8'}
              </div>
            </li>
          {/foreach}
        </ul>
      {/if}
      <p>
        <a class="collapse-button promo-code-button" data-toggle="collapse" href="#promo-code" aria-expanded="false" aria-controls="promo-code">
          {l s='Have a promo code?' d='Shop.Theme.Checkout'}
        </a>
      </p>
      <div class="promo-code collapse{if $cart.discounts|count > 0} in{/if}" id="promo-code">
        <form action="{$urls.pages.cart|escape:'html':'UTF-8'}" data-link-action="add-voucher" method="post">
          <input type="hidden" name="token" value="{$static_token|escape:'html':'UTF-8'}">
          <input type="hidden" name="addDiscount" value="1">
          <input class="promo-input" type="text" name="discount_name" placeholder="{l s='Promo code' d='Shop.Theme.Checkout'}">
          <button type="submit" class="btn btn-primary"><span>{l s='Add' d='Shop.Theme.Actions'}</span></button>
        </form>
        <div class="alert alert-danger js-error" role="alert">
          <i class="material-icons">&#xE001;</i><span class="m-l-1 js-error-text"></span>
        </div>
      </div>
      {if $cart.discounts|count > 0}
        <p class="block-promo promo-highlighted">
          {l s='Take advantage of our exclusive offers:' d='Shop.Theme.Actions'}
        </p>
        <ul class="js-discount card-block promo-discounts">
        {foreach from=$cart.discounts item=discount}
          <li class="cart-summary-line">
            <span class="label"><span class="code">{$discount.code|escape:'html':'UTF-8'}</span> - {$discount.name|escape:'html':'UTF-8'}</span>
          </li>
        {/foreach}
        </ul>
      {/if}
    </div>
  </div>
{/if}
