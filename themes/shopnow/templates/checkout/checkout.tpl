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
<!doctype html>
<html lang="{$language.iso_code|escape:'html':'UTF-8'}">

  <head>
    {block name='head'}
      {include file='_partials/head.tpl'}
    {/block}
  </head>

  <body id="{$page.page_name|escape:'html':'UTF-8'}" class="{$page.body_classes|classnames} {if isset($YBC_TC_CLASSES)}{$YBC_TC_CLASSES|escape:'html':'UTF-8'}{/if}">

    {hook h='displayAfterBodyOpeningTag'}

    <header id="header">
      {block name='header'}
        {include file='checkout/_partials/header.tpl'}
      {/block}
    </header>

    {block name='notifications'}
      {include file='_partials/notifications.tpl'}
    {/block}
    
    <section id="wrapper">
        {block name='breadcrumb'}
            <div class="breadcrumb_wrapper">
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
                                  <span itemprop="name">{l s='Check Out' d='Shop.Theme.Checkout'}</span>
                                </a>
                              </li>
                          </ol>
                        </nav>
                </div>
            </div>
      {/block}
    
      <div class="container">

      {block name='content'}
        <div id="content">
          <div class="row">
            <div class="col-md-8">
              {render file='checkout/checkout-process.tpl' ui=$checkout_process}
            </div>
            <div class="col-md-4">

              {include file='checkout/_partials/cart-summary.tpl' cart = $cart}

              {hook h='displayReassurance'}
            </div>
          </div>
        </div>
      {/block}
      </div>

    <footer id="footer">
      {block name='footer'}
        {include file='checkout/_partials/footer.tpl'}
      {/block}
    </footer>

    {block name='javascript_bottom'}
      {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
    {/block}

    {hook h='displayBeforeBodyClosingTag'}

  </body>

</html>
