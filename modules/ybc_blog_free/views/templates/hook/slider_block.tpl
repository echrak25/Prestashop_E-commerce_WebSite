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