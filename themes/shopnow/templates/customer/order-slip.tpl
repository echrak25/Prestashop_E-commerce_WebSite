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
  {l s='Credit slips' d='Shop.Theme.Actions'}
{/block}

{block name='page_content'}
  <h6>{l s='Credit slips you have received after canceled orders' d='Shop.Theme.Actions'}.</h6>
  {if $credit_slips}
    <table class="table table-striped table-bordered hidden-sm-down">
      <thead class="thead-default">
        <tr>
          <th>{l s='Order' d='Shop.Theme.Actions'}</th>
          <th>{l s='Credit slip' d='Shop.Theme.Actions'}</th>
          <th>{l s='Date issued' d='Shop.Theme.Actions'}</th>
          <th>{l s='View credit slip' d='Shop.Theme.Actions'}</th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$credit_slips item=slip}
          <tr>
            <td><a href="{$slip.order_url_details|escape:'html':'UTF-8'}" data-link-action="view-order-details">{$slip.order_reference|escape:'html':'UTF-8'}</a></td>
            <td scope="row">{$slip.credit_slip_number|escape:'html':'UTF-8'}</td>
            <td>{$slip.credit_slip_date|escape:'html':'UTF-8'}</td>
            <td class="text-xs-center">
              <a href="{$slip.url|escape:'html':'UTF-8'}"><i class="material-icons">&#xE415;</i></a>
            </td>
          </tr>
        {/foreach}
      </tbody>
    </table>
    <div class="credit-slips hidden-md-up">
      {foreach from=$credit_slips item=slip}
        <div class="credit-slip">
          <ul>
            <li>
              <strong>{l s='Order' d='Shop.Theme.Actions'}</strong>
              <a href="{$slip.order_url_details|escape:'html':'UTF-8'}" data-link-action="view-order-details">{$slip.order_reference|escape:'html':'UTF-8'}</a>
            </li>
            <li>
              <strong>{l s='Credit slip' d='Shop.Theme.Actions'}</strong>
              {$slip.credit_slip_number|escape:'html':'UTF-8'}
            </li>
            <li>
              <strong>{l s='Date issued' d='Shop.Theme.Actions'}</strong>
              {$slip.credit_slip_date|escape:'html':'UTF-8'}
            </li>
            <li>
              <a href="{$slip.url|escape:'html':'UTF-8'}">{l s='View credit slip' d='Shop.Theme.Actions'}</a>
            </li>
          </ul>
        </div>
      {/foreach}
    </div>
  {/if}
{/block}
