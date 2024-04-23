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
{if $posts}
    <div class="block ybc_block_latest {$blog_config.YBC_BLOG_FREE_RTL_CLASS|escape:'html':'UTF-8'} {if isset($page) && $page}page_{$page|escape:'html':'UTF-8'}{else}page_blog{/if} {if isset($page) && $page=='home'}{if isset($blog_config.YBC_BLOG_FREE_HOME_POST_TYPE) && $blog_config.YBC_BLOG_FREE_HOME_POST_TYPE=='default' || count($posts)<=1}ybc_block_default{else}ybc_block_slider{/if}{else}{if isset($blog_config.YBC_BLOG_FREE_SIDEBAR_POST_TYPE) && $blog_config.YBC_BLOG_FREE_SIDEBAR_POST_TYPE=='default' || count($posts)<=1}ybc_block_default{else}ybc_block_slider{/if}{/if}">
        <h4 class="title_blog title_block">{l s='Latest posts' mod='ybc_blog_free'}</h4>
        <ul class="block_content">
            {foreach from=$posts item='post'}
                <li> 
                    {if $post.thumb}<a class="ybc_item_img" href="{$post.link|escape:'html':'UTF-8'}"><img src="{$post.thumb|escape:'html':'UTF-8'}" alt="{$post.title|escape:'html':'UTF-8'}" title="{$post.title|escape:'html':'UTF-8'}" /></a>{/if}
                    <div class="ybc-blog-latest-post-content">
                        <a class="ybc_title_block" href="{$post.link|escape:'html':'UTF-8'}">{$post.title|escape:'html':'UTF-8'}</a>
                        <div class="ybc-blog-sidear-post-meta">
                            {if isset($post.categories) && $post.categories}
                                <div class="ybc-blog-categories">
                                    {assign var='ik' value=0}
                                    {assign var='totalCat' value=count($post.categories)}                        
                                    <div class="be-categories">
                                        <span class="be-label">{l s='Posted in' mod='ybc_blog_free'}: </span>
                                        {foreach from=$post.categories item='cat'}
                                            {assign var='ik' value=$ik+1}                                        
                                            <a href="{$cat.link|escape:'html':'UTF-8'}">{ucfirst($cat.title)|escape:'html':'UTF-8'}</a>{if $ik < $totalCat}<span class="comma">, </span>{/if}
                                        {/foreach}
                                    </div>
                                </div>
                            {/if}
                            <span class="post-date">{if isset($blog_config.YBC_BLOG_FREE_DATE_FORMAT)&&$blog_config.YBC_BLOG_FREE_DATE_FORMAT}{date($blog_config.YBC_BLOG_FREE_DATE_FORMAT, strtotime($post.datetime_added))|escape:'html':'UTF-8'}{else}{date('F jS Y', strtotime($post.datetime_added))|escape:'html':'UTF-8'}{/if}</span>
                        </div>
                        {if $allowComments || $show_views || $allow_like} 
                            <div class="ybc-blog-latest-toolbar">
                                {if $show_views}
                                    <span class="ybc-blog-latest-toolbar-views">{$post.click_number|intval} {if $post.click_number!=1}<span>{l s='views' mod='ybc_blog_free'}</span>{else}<span>{l s='view' mod='ybc_blog_free'}</span>{/if}</span>
                                {/if}   
                                {if $allowComments}
                                    <span class="ybc-blog-latest-toolbar-comments">{$post.comments_num|intval} {if $post.comments_num!=1}<span>
                                    {l s='comments' mod='ybc_blog_free'}</span>{else}<span>{l s='comment' mod='ybc_blog_free'}</span>{/if}</span>
                                {/if}                                 
                                {if $allow_like}
                                    <span title="{if $post.liked}{l s='Liked' mod='ybc_blog_free'}{else}{l s='Like this post' mod='ybc_blog_free'}{/if}" class="ybc-blog-like-span ybc-blog-like-span-{$post.id_post|intval} {if $post.liked}active{/if}"  data-id-post="{$post.id_post|intval}">
                                        <span class="ben_{$post.id_post|intval}">{$post.likes|intval}</span>
                                        <span class="blog-post-like-text blog-post-like-text-{$post.id_post|intval}">{l s='Liked' mod='ybc_blog_free'}</span>
                                        
                                    </span> 
                                {/if}
                                
                            </div>
                        {/if}                           
                        {if $post.short_description}
                            <div class="blog_description"><p>
                                {if isset($blog_config.YBC_BLOG_FREE_POST_EXCERPT_LENGTH) && (int)$blog_config.YBC_BLOG_FREE_POST_EXCERPT_LENGTH>0}
                                    {$post.short_description|strip_tags:'UTF-8'|truncate:(int)$blog_config.YBC_BLOG_FREE_POST_EXCERPT_LENGTH:'...'|escape:'html':'UTF-8'}
                                {else}
                                    {$post.short_description|strip_tags:'UTF-8'|escape:'html':'UTF-8'}
                                {/if}</p>
                            </div>
                        {elseif $post.description}
                            <div class="blog_description">
                                {if isset($blog_config.YBC_BLOG_FREE_POST_EXCERPT_LENGTH) && (int)$blog_config.YBC_BLOG_FREE_POST_EXCERPT_LENGTH>0}
                                    {$post.description|strip_tags:'UTF-8'|truncate:120:'...'|escape:'html':'UTF-8'}
                                {else}
                                    {$post.description|strip_tags:'UTF-8'|escape:'html':'UTF-8'}
                                {/if}                                
                            </div>
                        {/if}
                        <a class="read_more" href="{$post.link|escape:'html':'UTF-8'}">{l s='Read more ...' mod='ybc_blog_free'}</a>
                        
                        
                    </div>
                </li>
            {/foreach}
        </ul>
        <div class="clear"></div>
    </div>
    
{/if}