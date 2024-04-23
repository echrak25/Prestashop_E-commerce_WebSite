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

  <body id="{$page.page_name|escape:'html':'UTF-8'}" class="{$page.body_classes|classnames} {if isset($YBC_TC_CLASSES)}{$YBC_TC_CLASSES|escape:'html':'UTF-8'}{/if}{if isset($tc_config.YBC_TC_LISTING_REVIEW) && $tc_config.YBC_TC_LISTING_REVIEW != 1} hidden_review{/if}">

    {hook h='displayAfterBodyOpeningTag'}

    <main>
      {block name='product_activation'}
        {include file='catalog/_partials/product-activation.tpl'}
      {/block}
      
      
      <header id="header" {if isset($tc_config.YBC_TC_LAYOUT) && $tc_config.YBC_TC_LAYOUT == 'LayoutHome1'}class="header_v1"{/if}>
      
        {block name='header'}
          {include file='_partials/header.tpl'}
        {/block}
      </header>
      
      
      {block name='notifications'}
        {include file='_partials/notifications.tpl'}
      {/block}
      <div id="wrapper" {if isset($tc_config.YBC_TC_LAYOUT) && $tc_config.YBC_TC_LAYOUT == 'LayoutHome1'}class="maincontent_v1"{/if}>
         {block name='breadcrumb'}
            {include file='_partials/breadcrumb.tpl'}
          {/block}
        {if $page.page_name != 'index' && $page.page_name != 'cart'}
        <div class="container">
            <div class="row">
        {/if}
          

          {block name="left_column"}
            <div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
              {if $page.page_name == 'product'}
                {hook h='displayLeftColumnProduct'}
              {else}
                {hook h="displayLeftColumn"}
              {/if}
            </div>
          {/block}

          {block name="content_wrapper"}
            <div id="content-wrapper" class="left-column right-column col-sm-4 col-md-6">
              {block name="content"}
                <p>Hello world! This is HTML5 Boilerplate.</p>
              {/block}
            </div>
          {/block}

          {block name="right_column"}
            <div id="right-column" class="col-xs-12 col-sm-4 col-md-3">
              {if $page.page_name == 'product'}
                {hook h='displayRightColumnProduct'}
              {else}
                {hook h="displayRightColumn"}
              {/if}
            </div>
          {/block}
          {if $page.page_name != 'index' && $page.page_name != 'cart'}
            </div>
            </div>
          {/if}
      </div> <!-- end wrapper -->

      <footer id="footer">
        {block name="footer"}
          {include file="_partials/footer.tpl"}
        {/block}
      </footer>

    </main>

    {block name='javascript_bottom'}
      {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
    {/block}

    {hook h='displayBeforeBodyClosingTag'}

  </body>

</html>
