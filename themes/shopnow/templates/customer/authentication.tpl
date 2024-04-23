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

{block name='breadcrumb'}
  <div class="container">
        <nav class="breadcrumb">
          <ol itemscope itemtype="http://schema.org/BreadcrumbList">
            {foreach from=$breadcrumb.links item=path name=breadcrumb}
              <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{$path.url|escape:'html':'UTF-8'}">
                  <span itemprop="name">{$path.title|escape:'html':'UTF-8'}</span>
                </a>
                <meta itemprop="position" content="{$smarty.foreach.breadcrumb.iteration|escape:'html':'UTF-8'}" />
              </li>
            {/foreach}
            <li itemtype="http://schema.org/ListItem" itemscope="" itemprop="itemListElement">
                <a>
                  <span itemprop="name">{l s='Log in to your account' d='Shop.Theme.Actions'}</span>
                </a>
              </li>
          </ol>
        </nav>
    </div>
{/block}

{block name='page_content'}
    
    {block name='login_form_container'}
        <div class="flex login_page_content">
          <div class="col-xs-12 col-sm-6">
              <div class="login-form">
                {render file='customer/_partials/login-form.tpl' ui=$login_form}
              </div>
              {block name='display_after_login_form'}
                {hook h='displayCustomerLoginFormAfter'}
              {/block}
          </div>
          <div class="col-xs-12 col-sm-6">
              <div class="no-account register_form">
                <div class="register_form_cell">
                    <a href="{$urls.pages.register|escape:'html':'UTF-8'}" data-link-action="display-register-form">
                      {l s='No account? Create one here' d='Shop.Theme.Actions'}
                    </a>
                    <div class="clearfix"></div>
                    <a class="btn btn-primary button-to-register-form" href="{$urls.pages.register|escape:'html':'UTF-8'}" data-link-action="display-register-form">
                      {l s='Register' d='Shop.Theme.Actions'}
                    </a>
                </div>
              </div>
          </div>
      </div>
    {/block}
{/block}
