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
{extends file='page.tpl'}

{block name='page_title'}
  <span class="sitemap-title">{l s='Sitemap' d='Shop.Theme.Actions'}</span>
{/block}

{block name='page_content_container'}
  <div class="container-fluid">
    <div class="row sitemap">
        <div class="col-md-3">
          <h2>{$our_offers|escape:'html':'UTF-8'}</h2>
          {include file='cms/_partials/sitemap-nested-list.tpl' links=$links.offers}
        </div>
        <div class="col-md-3">
          <h2>{$categories|escape:'html':'UTF-8'}</h2>
          {include file='cms/_partials/sitemap-nested-list.tpl' links=$links.categories}
        </div>
        <div class="col-md-3">
          <h2>{$your_account|escape:'html':'UTF-8'}</h2>
          {include file='cms/_partials/sitemap-nested-list.tpl' links=$links.user_account}
        </div>
        <div class="col-md-3">
          <h2>{$pages|escape:'html':'UTF-8'}</h2>
          {include file='cms/_partials/sitemap-nested-list.tpl' links=$links.pages}
        </div>
    </div>
  </div>
{/block}
