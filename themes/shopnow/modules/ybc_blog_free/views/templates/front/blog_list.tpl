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
      <header id="header">
        {block name='header'}
          {include file='_partials/header.tpl'}
        {/block}
      </header>
      {block name='notifications'}
        {include file='_partials/notifications.tpl'}
      {/block}
      <section id="wrapper">
        {block name='breadcrumb'}
            {include file='_partials/breadcrumb.tpl'}
          {/block}
        <div class="container">
          <div class="row">
              {if isset($blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION) && $blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION=='left'}
              {block name="left_column"}
                <div id="left-column" class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                  {hook h="blogSidebar"}
                </div>
              {/block}
              {/if}  
              {block name="content_wrapper"}
                <div id="content-wrapper" class="{if isset($blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION) && $blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION=='left'}left-column col-xs-12 col-sm-8 col-md-8 col-lg-9{elseif isset($blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION) && $blog_config.YBC_BLOG_FREE_SIDEBAR_POSITION=='right'}right-column col-xs-12 col-sm-8 col-md-8 col-lg-9{/if}">
                  {block name="content"}
                    <div class="ybc_blog_free_layout_{$blog_layout|escape:'html':'UTF-8'} ybc-blog-wrapper ybc-blog-wrapper-blog-list {if $blog_latest}ybc-page-latest{elseif $blog_category}ybc-page-category{elseif $blog_tag}ybc-page-tag{elseif $blog_search}ybc-page-search{elseif $author}ybc-page-author{else}ybc-page-home{/if}">
                        {if $is_main_page}
                            {hook h='blogSlidersBlock'}
                        {/if}
                        {if $blog_category}
                            {if isset($blog_category.enabled) && $blog_category.enabled}
                                <div class="blog-category {if $blog_category.image}has-blog-image{/if}">
                                    {if $blog_category.image}
                                        <img src="{$blog_dir|escape:'html':'UTF-8'}views/img/category/{$blog_category.image|escape:'html':'UTF-8'}" alt="{$blog_category.title|escape:'html':'UTF-8'}" title="{$blog_category.title|escape:'html':'UTF-8'}" />
                                    {/if}
                                    <h1 class="page-heading product-listing">{$blog_category.title|escape:'html':'UTF-8'}</h1>            
                                    {if $blog_category.description}
                                        <div class="blog-category-desc">
                                            {$blog_category.description|escape nofilter}
                                        </div>
                                    {/if}
                                </div>
                            {else}
                                <p class="alert alert-warning">{l s='This category is not available' mod='ybc_blog_free'}</p>
                            {/if}
                        {elseif $blog_latest}
                           <h1 class="page-heading product-listing">{l s='Latest posts' mod='ybc_blog_free'}</h1>
                        {elseif $blog_tag}
                            <h1 class="page-heading product-listing">{l s='Tag: ' mod='ybc_blog_free'}"{ucfirst($blog_tag)|escape:'html':'UTF-8'}"</h1>
                        {elseif $blog_search}
                            <h1 class="page-heading product-listing">{l s='Search: ' mod='ybc_blog_free'}"{ucfirst($blog_search)|escape:'html':'UTF-8'}"</h1>
                        {elseif $author}
                            <h1 class="page-heading product-listing">{l s='Author: ' mod='ybc_blog_free'}"{$author|escape:'html':'UTF-8'}"</h1>
                        {/if}
                        
                        {if !($blog_category && (!isset($blog_category.enabled) || isset($blog_category.enabled) && !$blog_category.enabled)) && ($blog_category || $blog_tag || $blog_search || $author || $is_main_page || $blog_latest)}
                            {if isset($blog_posts) && $blog_posts}
                                <ul class="ybc-blog-list row {if $is_main_page}blog-main-page{/if}">
                                    {assign var='first_post' value=true}
                                    {foreach from=$blog_posts item='post'}            
                                        <li>                         
                                            <div class="post-wrapper">
                                                {if $is_main_page && $first_post && ($blog_layout == 'large_list' || $blog_layout == 'large_grid')}
                                                    {if $post.image}
                                                        <a class="ybc_item_img" href="{$post.link|escape:'html':'UTF-8'}">
                                                            <img title="{$post.title|escape:'html':'UTF-8'}" src="{$post.image|escape:'html':'UTF-8'}" alt="{$post.title|escape:'html':'UTF-8'}" />
                                                        </a>                              
                                                    {elseif $post.thumb}
                                                        <a class="ybc_item_img" href="{$post.link|escape:'html':'UTF-8'}">
                                                            <img title="{$post.title|escape:'html':'UTF-8'}" src="{$post.thumb|escape:'html':'UTF-8'}" alt="{$post.title|escape:'html':'UTF-8'}" />
                                                        </a>
                                                    {/if}
                                                    {assign var='first_post' value=false}
                                                {elseif $post.thumb}
                                                    <a class="ybc_item_img" href="{$post.link|escape:'html':'UTF-8'}">
                                                        <img title="{$post.title|escape:'html':'UTF-8'}" src="{$post.thumb|escape:'html':'UTF-8'}" alt="{$post.title|escape:'html':'UTF-8'}" />
                                                    </a>
                                                {/if}
                                                <div class="ybc-blog-wrapper-content">
                                                <div class="ybc-blog-wrapper-content-main">
                                                    <a class="ybc_title_block" href="{$post.link|escape:'html':'UTF-8'}">{$post.title|escape:'html':'UTF-8'}</a>
                                                    {if $show_date || $show_categories && $post.categories}
                                                        <div class="ybc-blog-sidear-post-meta"> 
                                                            {if !$date_format}{assign var='date_format' value='F jS Y'}{/if}
                                                            {if $show_categories && $post.categories}
                                                                <div class="ybc-blog-categories">
                                                                    {assign var='ik' value=0}
                                                                    {assign var='totalCat' value=count($post.categories)}
                                                                    <span class="be-label">{l s='Posted in' mod='ybc_blog_free'}: </span>
                                                                    {foreach from=$post.categories item='cat'}
                                                                        {assign var='ik' value=$ik+1}                                        
                                                                        <a href="{$cat.link|escape:'html':'UTF-8'}">{ucfirst($cat.title)|escape:'html':'UTF-8'}</a>{if $ik < $totalCat}, {/if}
                                                                    {/foreach}
                                                                </div>
                                                            {/if}
                                                            {if $show_date}                                
                                                                <span class="post-date">{date($date_format,strtotime($post.datetime_added))|escape:'html':'UTF-8'}</span>                                
                                                            {/if} 
                                                        </div> 
                                                    {/if}
                                                    <div class="ybc-blog-latest-toolbar">	
                    									{if $show_views}                    
                                                                <span class="ybc-blog-latest-toolbar-views" title="{l s='Page views' mod='ybc_blog_free'}">
                                                                    {$post.click_number|intval}
                                                                    {if $post.click_number !=1}<span>
                                                                        {l s='Views' mod='ybc_blog_free'}</span>
                                                                    {else}
                                                                        <span>{l s='View' mod='ybc_blog_free'}</span>
                                                                    {/if}
                                                                </span>
                                                        {/if} 
                                                        {if $allow_rating}
                                                            {if $post.total_review}
                                                                <span title="{l s='Comments' mod='ybc_blog_free'}" class="blog__rating_reviews">
                                                                     {$post.total_review|intval}
                                                                </span>
                                                            {/if}
                                                        {/if}
                                                        {if $allow_like}
                                                            <span title="{if $post.liked}{l s='Liked' mod='ybc_blog_free'}{else}{l s='Like this post' mod='ybc_blog_free'}{/if}" class="item ybc-blog-like-span ybc-blog-like-span-{$post.id_post|escape:'html':'UTF-8'} {if $post.liked}active{/if}"  data-id-post="{$post.id_post|escape:'html':'UTF-8'}">                        
                                                                <span class="blog-post-total-like ben_{$post.id_post|escape:'html':'UTF-8'}">{$post.likes|escape:'html':'UTF-8'}</span>
                                                                <span class="blog-post-like-text blog-post-like-text-{$post.id_post|escape:'html':'UTF-8'}"><span>{l s='Liked' mod='ybc_blog_free'}</span></span>
                                                            </span> 
                                                        {/if}                     
                                                        {if $allow_rating && isset($post.everage_rating) && $post.everage_rating}
                                                            {assign var='everage_rating' value=$post.everage_rating}
                                                            <div class="blog-extra-item be-rating-block item">
                                                                <span>{l s='Rating: ' mod='ybc_blog_free'}</span>
                                                                <div class="blog_rating_wrapper">
                                                                    <div class="ybc_blog_free_review" title="{l s='Everage rating' mod='ybc_blog_free'}">
                                                                        {for $i = 1 to $everage_rating}
                                                                            <div class="star star_on"></div>
                                                                        {/for}
                                                                        {if $everage_rating<5}
                                                                            {for $i = $everage_rating + 1 to 5}
                                                                                <div class="star"></div>
                                                                            {/for}
                                                                        {/if}
                                                                        <span  class="ybc-blog-rating-value">{number_format((float)$everage_rating, 1, '.', '')|escape:'html':'UTF-8'}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {/if}   
                                                    </div>
                                                    <div class="blog_description">
                                                        {if $post.short_description}
                                                            {$post.short_description|strip_tags:'UTF-8'|truncate:500:'...'|escape:'html':'UTF-8'}
                                                        {elseif $post.description}
                                                            {$post.description|strip_tags:'UTF-8'|truncate:500:'...'|escape:'html':'UTF-8'}
                                                        {/if}                                
                                                    </div>
                                                    <a class="read_more" href="{$post.link|escape:'html':'UTF-8'}">{l s='Read More' mod='ybc_blog_free'}</a>
                                                  </div>
                                                </div>
                                            </div>
                                            
                                        </li>
                                    {/foreach}
                                </ul>
                                {if $blog_paggination}
                                    <div class="blog-paggination">
                                        {$blog_paggination nofilter}
                                    </div>
                                {/if}
                            {else}
                                <p>{l s='No posts found' mod='ybc_blog_free'}</p>
                            {/if}
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