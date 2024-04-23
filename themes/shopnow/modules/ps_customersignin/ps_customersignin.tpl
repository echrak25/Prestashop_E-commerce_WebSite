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
<div id="_desktop_user_info">
  <div class="user-info">
    {if $logged}
        <span class="show_on_mobile">{l s='Hi, ' d='Shop.Theme.Actions'}{$customer.firstname|escape:'html':'UTF-8'} <i class="material-icons material-icons-expand_more"></i></span>
        <div class="toggle_user_mobile">
          <a class="user-info-account" href="{$my_account_url|escape:'html':'UTF-8'}" title="{l s='My account' d='Shop.Theme.Actions'}" rel="nofollow" >
            <span><i class="fa fa-user"></i> {l s='My account' d='Shop.Theme.Actions'}</span>
          </a>
          <a class="logout" href="{$logout_url|escape:'html':'UTF-8'}" rel="nofollow" >
            <i class="fa fa-unlock"></i> {l s='Sign out' d='Shop.Theme.Actions'}
          </a>
        </div>
    {else}
          <a class="user-info-account" href="{$my_account_url|escape:'html':'UTF-8'}" title="{l s='My account' d='Shop.Theme.Actions'}" rel="nofollow" >
            <span><i class="fa fa-user"></i> {l s='My account' d='Shop.Theme.Actions'}</span>
          </a>
          <a href="{$my_account_url|escape:'html':'UTF-8'}" title="{l s='Log in to your customer account' d='Shop.Theme.Actions'}" rel="nofollow" >
            <span><i class="fa fa-lock"></i> {l s='Sign in' d='Shop.Theme.Actions'}</span>
          </a>
    {/if}
  </div>
</div>