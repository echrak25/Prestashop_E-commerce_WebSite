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
  {l s='Your addresses' d='Shop.Theme.Actions'}
{/block}

{block name='page_content'}
  {foreach $customer.addresses as $address}
    <div class="col-lg-4 col-md-6 col-sm-6">
    {block name='customer_address'}
      {include file='customer/_partials/block-address.tpl' address=$address}
    {/block}
    </div>
  {/foreach}
  <div class="clearfix"></div>
  <div class="addresses-footer">
    <a href="{$urls.pages.address|escape:'html':'UTF-8'}" data-link-action="add-address">
      <i class="material-icons">&#xE145;</i>
      <span>{l s='Create new address' d='Shop.Theme.Actions'}</span>
    </a>
  </div>
{/block}
