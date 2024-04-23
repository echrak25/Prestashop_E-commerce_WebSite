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
<div id="block_myaccount_infos" class="links wrapper">
  <h3 class="myaccount-title hidden-sm-down">
    <a class="text-uppercase" href="{$urls.pages.my_account|escape:'html':'UTF-8'}" rel="nofollow">
      {l s='Your account' d='Shop.Theme.Actions'}
    </a>
  </h3>
  <div class="title clearfix hidden-md-up" data-target="#footer_account_list" data-toggle="collapse">
    <span class="h3">{l s='Your account' d='Shop.Theme.Actions'}</span>
    <span class="pull-xs-right">
      <span class="navbar-toggler collapse-icons">
         <i class="material-icons add">expand_more</i>
         <i class="material-icons remove">expand_less</i>
      </span>
    </span>
  </div>
  <ul class="account-list collapse" id="footer_account_list">
        <li>
            <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='my account' d='Shop.Theme.Actions'}"> {l s='My account' d='Shop.Theme.CustomerAccount'}</a>
        </li>
    {foreach from=$my_account_urls item=my_account_url}
        <li>
          <a href="{$my_account_url.url|escape:'html':'UTF-8'}" title="{$my_account_url.title|escape:'html':'UTF-8'}" rel="nofollow">
            {$my_account_url.title|escape:'html':'UTF-8'}
          </a>
        </li>
    {/foreach}
   
    {*hook h='displayMyAccountBlock'*}
	</ul>
</div>
