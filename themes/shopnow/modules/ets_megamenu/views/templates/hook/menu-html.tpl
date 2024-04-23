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
{if isset($menus) && $menus}
    <ul class="mm_menus_ul">
        <li class="close_menu">
            <div class="pull-left">
                <span class="mm_menus_back">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                </span>
                {l s='Menu' mod='ets_megamenu'}
                
            </div>
            <div class="pull-right">
                <span class="mm_menus_back_icon"></span>
                {l s='Back' mod='ets_megamenu'}
            </div>
        </li>
        {foreach from=$menus item='menu'}
            <li  class="mm_menus_li {if $menu.custom_class}{$menu.custom_class|escape:'html':'UTF-8'}{/if} {if $menu.sub_menu_type}mm_sub_align_{strtolower($menu.sub_menu_type)|escape:'html':'UTF-8'}{/if} {if $menu.columns}mm_has_sub{/if}">
                <a href="{$menu.menu_link|escape:'html':'UTF-8'}">
                    {$menu.title|escape:'html':'UTF-8'}
                    {if $menu.bubble_text}<span class="mm_bubble_text" style="background: {if $menu.bubble_background_color}{$menu.bubble_background_color|escape:'html':'UTF-8'}{else}#FC4444{/if}; color: {if $menu.bubble_text_color|escape:'html':'UTF-8'}{$menu.bubble_text_color|escape:'html':'UTF-8'}{else}#ffffff{/if};">{$menu.bubble_text|escape:'html':'UTF-8'}</span>{/if}
                </a>
                {if $menu.columns}<span class="arrow closed"></span>{/if}
                {if $menu.columns}
                    <ul class="mm_columns_ul" style="width:{$menu.sub_menu_max_width|escape:'html':'UTF-8'}%;">
                        {foreach from=$menu.columns item='column'}
                            <li class="mm_columns_li column_size_{$column.column_size|intval} {if $column.is_breaker}mm_breaker{/if} {if $column.blocks}mm_has_sub{/if}">
                                {if isset($column.blocks) && $column.blocks}
                                    <ul class="mm_blocks_ul">
                                        {foreach from=$column.blocks item='block'}
                                            <li data-id-block="{$block.id_block|intval}" class="mm_blocks_li">
                                                {hook h='displayBlock' block=$block}
                                            </li>
                                        {/foreach}
                                    </ul>
                                {/if}
                            </li>
                        {/foreach}
                    </ul>
                {/if}     
            </li>
        {/foreach}
    </ul>
{/if}