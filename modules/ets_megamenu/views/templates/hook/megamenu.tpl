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
{if $menusHTML}
    <div class="ets_mm_megamenu 
        {if isset($mm_config.ETS_MM_LAYOUT)&&$mm_config.ETS_MM_LAYOUT}layout_{$mm_config.ETS_MM_LAYOUT|escape:'html':'UTF-8'}{/if}  
        {if isset($mm_config.ETS_MM_SKIN)&&$mm_config.ETS_MM_SKIN}skin_{$mm_config.ETS_MM_SKIN|escape:'html':'UTF-8'}{/if}  
        {if isset($mm_config.ETS_MM_TRANSITION_EFFECT)&&$mm_config.ETS_MM_TRANSITION_EFFECT}transition_{$mm_config.ETS_MM_TRANSITION_EFFECT|escape:'html':'UTF-8'}{/if}   
        {if isset($mm_config.ETS_MOBILE_MM_TYPE)&&$mm_config.ETS_MOBILE_MM_TYPE}transition_{$mm_config.ETS_MOBILE_MM_TYPE|escape:'html':'UTF-8'}{/if} 
        {if isset($mm_config.ETS_MM_CUSTOM_CLASS)&&$mm_config.ETS_MM_CUSTOM_CLASS}{$mm_config.ETS_MM_CUSTOM_CLASS|escape:'html':'UTF-8'}{/if} 
        {if isset($mm_config.ETS_MM_STICKY_ENABLED)&&$mm_config.ETS_MM_STICKY_ENABLED}sticky_enabled{else}sticky_disabled{/if} 
        {if isset($mm_config.ETS_MM_ACTIVE_ENABLED)&&$mm_config.ETS_MM_ACTIVE_ENABLED}enable_active_menu{/if} 
        {if isset($mm_layout_direction)&&$mm_layout_direction}{$mm_layout_direction|escape:'html':'UTF-8'}{else}ets-dir-ltr{/if}
        {if isset($mm_config.ETS_MM_HOOK_TO)&&$mm_config.ETS_MM_HOOK_TO=='customhook'}hook-custom{else}hook-default{/if}
        {if isset($mm_multiLayout)&&$mm_multiLayout}multi_layout{else}single_layout{/if}">
        <div class="ets_mm_megamenu_content">
            <div class="container">
                <div class="ybc-menu-toggle ybc-menu-btn closed">
                    <span class="ybc-menu-button-toggle_icon">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </span>
                    {l s='Menu' mod='ets_megamenu'}
                </div>
                {$menusHTML nofilter}
            </div>
        </div>
    </div>
{/if}