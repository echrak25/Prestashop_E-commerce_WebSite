{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!doctype html>
<html lang="{$language.iso_code|escape:'html':'UTF-8'}">

  <head>
    {block name='head'}
      {include file='_partials/head.tpl'}
    {/block}
  </head>

  <body id="{$page.page_name|escape:'html':'UTF-8'}" class="{$page.body_classes|classnames}">

    {hook h='displayAfterBodyOpeningTag'}

    <main>
      {block name='product_activation'}
        {include file='catalog/_partials/product-activation.tpl'}
      {/block}
      <header id="header">
        {block name='header'}
          {include file='_partials/header.tpl'}
        {/block}
      </header>
      {block name='notifications'}
        {include file='_partials/notifications.tpl'}
      {/block}
      <section id="wrapper">
        <div class="container">
          {block name='breadcrumb'}
            {include file='_partials/breadcrumb.tpl'}
          {/block}
          {if isset($blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION) && $blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION=='left'}
          {block name="left_column"}
            <div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
              {hook h="blogSidebar"}
            </div>
          {/block}
          {/if}  
          {block name="content_wrapper"}
            <div id="content-wrapper" class="{if isset($blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION) && $blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION=='left'}left-column col-xs-12 col-sm-8 col-md-9{elseif isset($blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION) && $blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION=='right'}right-column col-xs-12 col-sm-8 col-md-9{/if}">
              {block name="content"}
                <div class="ybc_blog_free_layout_{$blog_layout|escape:'html':'UTF-8'} ybc-blog-wrapper ybc-blog-wrapper-gallery">
                    <h1 class="page-heading">{l s='Blog gallery' mod='ybc_blog_free'}</h1>
                    {if isset($blog_galleries)}                   
                        <ul class="ybc-gallery">
                            {foreach from=$blog_galleries item='gallery'}            
                                <li>
                                    <a class="gallery_item"  {if $gallery.description} title="{strip_tags($gallery.description)|escape:'html':'UTF-8'}"{/if} rel="prettyPhotoGalleryPage[gallery]" href="{$gallery.image|escape:'html':'UTF-8'}"><img src="{$gallery.thumb|escape:'html':'UTF-8'}" title="{$gallery.title|escape:'html':'UTF-8'}" alt="{$gallery.title|escape:'html':'UTF-8'}" /></a>                    
                                </li>
                            {/foreach}
                        </ul>                    
                        {if $blog_paggination}
                            <div class="blog-paggination">
                                {$blog_paggination nofilter}
                            </div>
                        {/if}
                    {else}
                        <p class="alert alert-warning">{l s='No item found' mod='ybc_blog_free'}</p>
                    {/if}
                </div>                
              {/block}
            </div>
          {/block}
          {if isset($blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION) && $blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION=='right'}
          {block name="right_column"}
            <div id="right-column" class="col-xs-12 col-sm-4 col-md-3">
              {hook h="blogSidebar"}
            </div>
          {/block}
          {/if}
        </div>
      </section>

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