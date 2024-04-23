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
<script type="text/javascript">    
prettySkinGalleryPage = '{$prettySkin|escape:'html':'UTF-8'}';
prettyAutoPlayGalleryPage = {$prettyAutoPlay|intval};                    
</script>