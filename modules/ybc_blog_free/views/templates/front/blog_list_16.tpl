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
                        {$blog_category.description nofilter}
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
        {if isset($blog_posts)}
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
                                        <p>{$post.short_description|strip_tags:'UTF-8'|truncate:500:'...'|escape:'html':'UTF-8'}</p>
                                    {elseif $post.description}
                                        <p>{$post.description|strip_tags:'UTF-8'|truncate:500:'...'|escape:'html':'UTF-8'}</p>
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