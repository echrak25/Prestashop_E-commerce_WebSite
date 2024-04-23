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
<div class="block {$blog_config.YBC_BLOG_FREE_RTL_CLASS|escape:'html':'UTF-8'} ybc_block_gallery {if isset($page) && $page}page_{$page|escape:'html':'UTF-8'}_gallery{else}page_blog_gallery{/if} {if isset($blog_config.YBC_BLOG_FREE_GALLERY_BLOCK_HOME_SLIDER_ENABLED) && $blog_config.YBC_BLOG_FREE_GALLERY_BLOCK_HOME_SLIDER_ENABLED && $page=='home' || isset($blog_config.YBC_BLOG_FREE_GALLERY_BLOCK_SIDEBAR_SLIDER_ENABLED) && $blog_config.YBC_BLOG_FREE_GALLERY_BLOCK_SIDEBAR_SLIDER_ENABLED && $page!='home'}ybc_block_slider{else}ybc_block_default{/if}">
    <h4 class="h1 products-section-title text-uppercase">
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