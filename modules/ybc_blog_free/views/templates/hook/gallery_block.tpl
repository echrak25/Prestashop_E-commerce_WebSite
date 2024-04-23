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
<div class="block {$blog_config.YBC_BLOG_FREE_RTL_CLASS|escape:'html':'UTF-8'} ybc_block_gallery {if isset($page) && $page}page_{$page|escape:'html':'UTF-8'}_gallery{else}page_blog_gallery{/if} {if isset($blog_config.YBC_BLOG_FREE_GALLERY_BLOCK_HOME_SLIDER_ENABLED) && $blog_config.YBC_BLOG_FREE_GALLERY_BLOCK_HOME_SLIDER_ENABLED && $page=='home' || isset($blog_config.YBC_BLOG_FREE_GALLERY_BLOCK_SIDEBAR_SLIDER_ENABLED) && $blog_config.YBC_BLOG_FREE_GALLERY_BLOCK_SIDEBAR_SLIDER_ENABLED && $page!='home'}ybc_block_slider{else}ybc_block_default{/if}">
    <h4 class="title_blog title_block">
        <a href="{$gallery_link|escape:'html':'UTF-8'}">
            {l s='Blog gallery' mod='ybc_blog_free'}
        </a>
    </h4> 
    {if $galleries}
        <ul class="block_content">
            {foreach from=$galleries item='gallery'}  
                <li>
                    {if isset($blog_config.YBC_BLOG_FREE_GALLERY_SLIDESHOW_ENABLED) && $blog_config.YBC_BLOG_FREE_GALLERY_SLIDESHOW_ENABLED}
                    <a {if $gallery.description}title="{strip_tags($gallery.description)|escape:'html':'UTF-8'}"{/if}  rel="prettyPhotoBlock[galleryblock]" class="gallery_block_slider gallery_item" href="{$gallery.image|escape:'html':'UTF-8'}">
                        <img src="{$gallery.thumb|escape:'html':'UTF-8'}" title="{$gallery.title|escape:'html':'UTF-8'}"  alt="{$gallery.title|escape:'html':'UTF-8'}"  />
                    </a>
                    {else}
                        <img src="{$gallery.thumb|escape:'html':'UTF-8'}" title="{$gallery.title|escape:'html':'UTF-8'}"  alt="{$gallery.title|escape:'html':'UTF-8'}"  />
                    {/if}   
                    <h3 class="ybc_title_block">{if strlen($gallery.title) > 50}{substr($gallery.title,0,49)|escape:'html':'UTF-8'}...{else}{$gallery.title|escape:'html':'UTF-8'}{/if}</h3>
                </li>
            {/foreach}            
        </ul>        
    {else}
        <p>{l s='No featured images' mod='ybc_blog_free'}</p>
    {/if}
    <a class="view_all" href="{$gallery_link|escape:'html':'UTF-8'}">{l s='View gallery' mod='ybc_blog_free'}</a>
</div>