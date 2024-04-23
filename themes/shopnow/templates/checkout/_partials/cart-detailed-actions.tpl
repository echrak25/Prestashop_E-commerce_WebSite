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
<div class="checkout cart-detailed-actions card-block">
  {if $cart.minimalPurchaseRequired}
    <div class="alert alert-warning" role="alert">
      {$cart.minimalPurchaseRequired|escape:'html':'UTF-8'}
    </div>
    <div class="text-xs-center">
      <button type="button" class="btn btn-primary disabled" disabled>{l s='Checkout' d='Shop.Theme.Actions'}</button>
    </div>
  {else}
    <div class="text-xs-center">
      <a href="{$urls.pages.order|escape:'html':'UTF-8'}" class="btn btn-primary">{l s='Checkout' d='Shop.Theme.Actions'}</a>
      {hook h='displayExpressCheckout'}
    </div>
  {/if}
</div>
