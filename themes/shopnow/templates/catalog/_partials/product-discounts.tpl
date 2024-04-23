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
{if $product.quantity_discounts}
<section class="product-discounts">
    <h3 class="h6 product-discounts-title">{l s='Volume discounts' d='Shop.Theme.Catalog'}</h3>
    <table class="table-product-discounts">
      <thead>
      <tr>
        <th>{l s='Quantity' d='Shop.Theme.Catalog'}</th>
        <th>{$configuration.quantity_discount.label|escape:'html':'UTF-8'}</th>
        <th>{l s='You Save' d='Shop.Theme.Catalog'}</th>
      </tr>
      </thead>
      <tbody>
      {foreach from=$product.quantity_discounts item='quantity_discount' name='quantity_discounts'}
        <tr data-discount-type="{$quantity_discount.reduction_type|escape:'html':'UTF-8'}" data-discount="{$quantity_discount.real_value|escape:'html':'UTF-8'}" data-discount-quantity="{$quantity_discount.quantity|escape:'html':'UTF-8'}">
          <td>{$quantity_discount.quantity|escape:'html':'UTF-8'}</td>
          <td>{$quantity_discount.discount|escape:'html':'UTF-8'}</td>
          <td>{l s='Up to %discount%' d='Shop.Theme.Catalog' sprintf=['%discount%' => $quantity_discount.save]}</td>
        </tr>
      {/foreach}
      </tbody>
    </table>
</section>
{/if}
