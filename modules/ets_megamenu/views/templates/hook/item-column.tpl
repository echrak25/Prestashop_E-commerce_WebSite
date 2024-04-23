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
<li data-id-column="{$column.id_column|intval}" class="mm_columns_li item{$column.id_column|intval} column_size_{$column.column_size|intval} {if $column.is_breaker}mm_breaker{/if}" data-obj="column">
    <div class="mm_buttons">
        <span class="mm_column_delete" title="{l s='Delete this column' mod='ets_megamenu'}">{l s='Delete' mod='ets_megamenu'}</span>
        <span class="mm_duplicate" title="{l s='Duplicate this column' mod='ets_megamenu'}">{l s='Duplicate' mod='ets_megamenu'}</span>
        <span class="mm_column_edit" title="{l s='Edit this column' mod='ets_megamenu'}">{l s='Edit' mod='ets_megamenu'}</span>
        <div class="mm_add_block btn btn-default" data-id-column="{$column.id_column|intval}">{l s='Add new block' mod='ets_megamenu'}</div>    
    </div>
    <ul class="mm_blocks_ul">
        {if isset($column.blocks) && $column.blocks}                                                    
                {foreach from=$column.blocks item='block'}
                    {hook h='displayMMItemBlock' block=$block}
                {/foreach}                                                    
        {/if}
    </ul>
</li>