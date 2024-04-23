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
<li class="mm_menus_li item{$menu.id_menu|intval} {if !$menu.enabled}mm_disabled{/if}" data-id-menu="{$menu.id_menu|intval}" data-obj="menu">                        
    <div class="mm_menus_li_content">
        <span class="mm_menu_name mm_menu_toggle">{$menu.title|escape:'html':'UTF-8'}</span>
        <div class="mm_buttons">
            <span class="mm_menu_delete" title="{l s='Delete this item' mod='ets_megamenu'}">{l s='Delete' mod='ets_megamenu'}</span>  
            <span class="mm_duplicate" title="{l s='Duplicate this menu' mod='ets_megamenu'}">{l s='Duplicate' mod='ets_megamenu'}</span>                      
            <span class="mm_menu_edit">{l s='Edit' mod='ets_megamenu'}</span>                
            <span class="mm_menu_toggle mm_menu_toggle_arrow">{l s='Close' mod='ets_megamenu'}</span> 
            <div class="mm_add_column btn btn-default" data-id-menu="{$menu.id_menu|intval}">{l s='Add new column' mod='ets_megamenu'}</div> 
        </div> 
    </div>
    <ul class="mm_columns_ul">
        {if $menu.columns}                            
                {foreach from=$menu.columns item='column'}
                    {hook h='displayMMItemColumn' column=$column}
                {/foreach}                            
        {/if}  
    </ul>   
</li>