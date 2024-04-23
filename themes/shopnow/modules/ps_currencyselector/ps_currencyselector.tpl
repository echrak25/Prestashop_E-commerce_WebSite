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
<div id="_desktop_currency_selector">
  <div class="currency-selector dropdown js-dropdown">
    <span class="expand-more _gray-darker" data-toggle="dropdown">{$current_currency.sign|escape:'html':'UTF-8'} ({$current_currency.iso_code|escape:'html':'UTF-8'})</span>
    <a data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="">
      <i class="material-icons material-icons-expand_more"></i>
    </a>
    <ul class="dropdown-menu">
      {foreach from=$currencies item=currency}
        <li {if $currency.current} class="current" {/if}>
          <a title="{$currency.name|escape:'html':'UTF-8'}" rel="nofollow" href="{$currency.url|escape:'html':'UTF-8'}" class="dropdown-item">{$currency.sign|escape:'html':'UTF-8'} ({$currency.iso_code|escape:'html':'UTF-8'})</a>
        </li>
      {/foreach}
    </ul>
    <select class="link hidden-md-up hidden-sm-down">
      {foreach from=$currencies item=currency}
        <option value="{$currency.url|escape:'html':'UTF-8'}"{if $currency.current} selected="selected"{/if}>{$currency.sign|escape:'html':'UTF-8'} ({$currency.iso_code|escape:'html':'UTF-8'})</option>
      {/foreach}
    </select>
  </div>
</div>