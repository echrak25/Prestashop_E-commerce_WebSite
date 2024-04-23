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
{if $slides}
    <div class="bybc-blog-slider {$blog_config.YBC_BLOG_FREE_RTL_CLASS|escape:'html':'UTF-8'} {if isset($blog_config.YBC_BLOG_FREE_SLIDER_DISPLAY_CAPTION) && $blog_config.YBC_BLOG_FREE_SLIDER_DISPLAY_CAPTION}caption-enabled{else}caption-disabled{/if} {if isset($blog_config.YBC_BLOG_FREE_SLIDER_DISPLAY_NAV) && $blog_config.YBC_BLOG_FREE_SLIDER_DISPLAY_NAV}nav-enabled{else}nav-disabled{/if}">
        <div class="block_content">
            <div class="ybc-blog-slider loading slider-wrapper theme-{$nivoTheme|escape:'html':'UTF-8'}">
                <div class="loading_img">
                <img src="{$loading_img|escape:'html':'UTF-8'}" alt="{l s='loading' mod='ybc_blog_free'}" /></div>
                <div id="ybc_slider">                     
                    {foreach from=$slides item='slide'}
                        {if $slide.url}<a href="{$slide.url|escape:'html':'UTF-8'}">{/if}
                        <img src="{$slide.image|escape:'html':'UTF-8'}" alt="{$slide.caption|escape:'html':'UTF-8'}" title="{$slide.caption|escape:'html':'UTF-8'}" />
                        {if $slide.url}</a>{/if}
                    {/foreach}                
                </div>                
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var sliderAutoPlay = {if $nivoAutoPlay}true{else}false{/if};       
    </script>
{/if}