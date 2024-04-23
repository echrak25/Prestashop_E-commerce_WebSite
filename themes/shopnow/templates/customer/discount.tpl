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
  {l s='Your vouchers' d='Shop.Theme.Actions'}
{/block}

{block name='page_content'}
  {if $cart_rules}
    <table class="table table-striped table-bordered hidden-sm-down">
      <thead class="thead-default">
        <tr>
          <th>{l s='Code' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Description' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Quantity' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Value' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Minimum' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Cumulative' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Expiration date' d='Shop.Theme.Checkout'}</th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$cart_rules item=cart_rule}
          <tr>
            <th scope="row">{$cart_rule.code|escape:'html':'UTF-8'}</th>
            <td>{$cart_rule.name|escape:'html':'UTF-8'}</td>
            <td class="text-xs-right">{$cart_rule.quantity_for_user|escape:'html':'UTF-8'}</td>
            <td>{$cart_rule.value|escape:'html':'UTF-8'}</td>
            <td>{$cart_rule.voucher_minimal|escape:'html':'UTF-8'}</td>
            <td>{$cart_rule.voucher_cumulable|escape:'html':'UTF-8'}</td>
            <td>{$cart_rule.voucher_date|escape:'html':'UTF-8'}</td>
          </tr>
        {/foreach}
      </tbody>
    </table>
    <div class="cart-rules hidden-md-up">
      {foreach from=$cart_rules item=slip}
        <div class="cart-rule">
          <ul>
            <li>
              <strong>{l s='Code' d='Shop.Theme.Checkout'}</strong>
              {$cart_rule.code|escape:'html':'UTF-8'}
            </li>
            <li>
              <strong>{l s='Description' d='Shop.Theme.Checkout'}</strong>
              {$cart_rule.name|escape:'html':'UTF-8'}
            </li>
            <li>
              <strong>{l s='Quantity' d='Shop.Theme.Checkout'}</strong>
              {$cart_rule.quantity_for_user|escape:'html':'UTF-8'}
            </li>
            <li>
              <strong>{l s='Value' d='Shop.Theme.Checkout'}</strong>
              {$cart_rule.value|escape:'html':'UTF-8'}
            </li>
            <li>
              <strong>{l s='Minimum' d='Shop.Theme.Checkout'}</strong>
              {$cart_rule.voucher_minimal|escape:'html':'UTF-8'}
            </li>
            <li>
              <strong>{l s='Cumulative' d='Shop.Theme.Checkout'}</strong>
              {$cart_rule.voucher_cumulable|escape:'html':'UTF-8'}
            </li>
            <li>
              <strong>{l s='Expiration date' d='Shop.Theme.Checkout'}</strong>
              {$cart_rule.voucher_date|escape:'html':'UTF-8'}
            </li>
          </ul>
        </div>
      {/foreach}
    </div>
  {/if}
{/block}
