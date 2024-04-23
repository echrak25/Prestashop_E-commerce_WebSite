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
  {l s='Merchandise returns' d='Shop.Theme.Actions'}
{/block}

{block name='page_content'}

  {if $ordersReturn && count($ordersReturn)}

    <h6>{l s='Here is a list of pending merchandise returns' d='Shop.Theme.Actions'}</h6>

    <table class="table table-striped table-bordered hidden-sm-down">
      <thead class="thead-default">
        <tr>
          <th>{l s='Order' d='Shop.Theme.Actions'}</th>
          <th>{l s='Return' d='Shop.Theme.Actions'}</th>
          <th>{l s='Package status' d='Shop.Theme.Actions'}</th>
          <th>{l s='Date issued' d='Shop.Theme.Actions'}</th>
          <th>{l s='Returns form' d='Shop.Theme.Actions'}</th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$ordersReturn item=return}
          <tr>
            <td><a href="{$return.details_url|escape:'html':'UTF-8'}">{$return.reference|escape:'html':'UTF-8'}</a></td>
            <td><a href="{$return.return_url|escape:'html':'UTF-8'}">{$return.return_number|escape:'html':'UTF-8'}</a></td>
            <td>{$return.state_name|escape:'html':'UTF-8'}</td>
            <td>{$return.return_date|escape:'html':'UTF-8'}</td>
            <td class="text-xs-center">
              {if $return.print_url}
                <a href="{$return.print_url|escape:'html':'UTF-8'}">{l s='Print out' d='Shop.Theme.Actions'}</a>
              {else}
                -
              {/if}
            </td>
          </tr>
        {/foreach}
      </tbody>
    </table>
    <div class="order-returns hidden-md-up">
      {foreach from=$ordersReturn item=return}
        <div class="order-return">
          <ul>
            <li>
              <strong>{l s='Order' d='Shop.Theme.Actions'}</strong>
              <a href="{$return.details_url|escape:'html':'UTF-8'}">{$return.reference|escape:'html':'UTF-8'}</a>
            </li>
            <li>
              <strong>{l s='Return' d='Shop.Theme.Actions'}</strong>
              <a href="{$return.return_url|escape:'html':'UTF-8'}">{$return.return_number|escape:'html':'UTF-8'}</a>
            </li>
            <li>
              <strong>{l s='Package status' d='Shop.Theme.Actions'}</strong>
              {$return.state_name|escape:'html':'UTF-8'}
            </li>
            <li>
              <strong>{l s='Date issued' d='Shop.Theme.Actions'}</strong>
              {$return.return_date|escape:'html':'UTF-8'}
            </li>
            {if $return.print_url}
              <li>
                <strong>{l s='Returns form' d='Shop.Theme.Actions'}</strong>
                <a href="{$return.print_url|escape:'html':'UTF-8'}">{l s='Print out' d='Shop.Theme.Actions'}</a>
              </li>
            {/if}
          </ul>
        </div>
      {/foreach}
    </div>

  {/if}

{/block}
