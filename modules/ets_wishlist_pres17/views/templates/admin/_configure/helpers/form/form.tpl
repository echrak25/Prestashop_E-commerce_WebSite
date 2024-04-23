{*
* Copyright ETS Software Technology Co., Ltd
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
*}
{extends file="helpers/form/form.tpl"}
{block name="label"}
	{if isset($input.label)}
		<label class="control-label col-lg-3 {if (isset($input.required) && $input.required && $input.type != 'radio') || (isset($input.showRequired) && $input.showRequired)} required{/if}">
			{if isset($input.hint)}
			<span class="label-tooltip" data-toggle="tooltip" data-html="true" title="{if is_array($input.hint)}
						{foreach $input.hint as $hint}
							{if is_array($hint)}
								{$hint.text|escape:'html':'UTF-8'}
							{else}
								{$hint|escape:'html':'UTF-8'}
							{/if}
						{/foreach}
					{else}
						{$input.hint|escape:'html':'UTF-8'}
					{/if}">
			{/if}
			{$input.label|escape:'html':'UTF-8'}
			{if isset($input.hint)}
			</span>
			{/if}
		</label>
	{/if}
{/block}
{block name="input_row"}
    {if $input.name=='ETS_WL_BUTTON_POSITION_TOP' || $input.name=='ETS_WL_BUTTON_POSITION_RIGHT' || $input.name=='ETS_WL_BUTTON_POSITION_BUTTOM' || $input.name=='ETS_WL_BUTTON_POSITION_LEFT'  }
        {if $input.name=='ETS_WL_BUTTON_POSITION_TOP'}
            <div class="form-group {if isset($input.form_group_class)}{$input.form_group_class|escape:'html':'UTF-8'}{/if}">
                <label class="control-label col-lg-3"> {l s='Adjust position' mod='ets_wishlist_pres17'} </label>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="control-label">{l s='Top' mod='ets_wishlist_pres17'}</label>
                            <div class="input-group">
                                <input id="ETS_WL_BUTTON_POSITION_TOP" class="input-medium" name="ETS_WL_BUTTON_POSITION_TOP" value="{$fields_value['ETS_WL_BUTTON_POSITION_TOP']|escape:'html':'UTF-8'}" type="text" />
                                <span class="input-group-addon">
                                    {$input.suffix|escape:'html':'UTF-8'}
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label">{l s='Left' mod='ets_wishlist_pres17'}</label>
                            <div class="input-group">
                                <input id="ETS_WL_BUTTON_POSITION_LEFT" class="input-medium" name="ETS_WL_BUTTON_POSITION_LEFT" value="{$fields_value['ETS_WL_BUTTON_POSITION_LEFT']|escape:'html':'UTF-8'}" type="text" />
                                <span class="input-group-addon">
                                    {$input.suffix|escape:'html':'UTF-8'}
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label">{l s='Right' mod='ets_wishlist_pres17'}</label>
                            <div class="input-group">
                                <input id="ETS_WL_BUTTON_POSITION_RIGHT" class="input-medium" name="ETS_WL_BUTTON_POSITION_RIGHT" value="{$fields_value['ETS_WL_BUTTON_POSITION_RIGHT']|escape:'html':'UTF-8'}" type="text" />
                                <span class="input-group-addon">
                                    {$input.suffix|escape:'html':'UTF-8'}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {/if}
    {else}
        {if $input.name=='ETS_WLP_TILE_LEFT_BLOCK' || $input.name=='ETS_WLP_TILE_RIGHT_BLOCK' || $input.name=='ETS_WLP_TILE_SHIPPING_BLOCK'}
        <div class="form-group{if isset($input.form_group_class)} {$input.form_group_class|escape:'html':'UTF-8'}{/if}">
            <span class="title-page">
                {if $input.name=='ETS_WLP_TILE_LEFT_BLOCK'}
                    {l s='Display wish list products on left column' mod='ets_wishlist_pres17'}
                {/if}
                {if $input.name=='ETS_WLP_TILE_RIGHT_BLOCK'}
                    {l s='Display wish list products on right column' mod='ets_wishlist_pres17'}
                {/if}
                {if $input.name=='ETS_WLP_TILE_SHIPPING_BLOCK'}
                    {l s='Display wish list products on shipping cart page' mod='ets_wishlist_pres17'}
                {/if}
            </span>
        </div>
    {/if}
        <div class="form-group ets-form-group row_{$input.name|escape:'html':'UTF-8'}">
        {$smarty.block.parent}
        </div>
        {if $input.name=='ETS_WL_DISPLAY_SHARE_BUTTON_ON_WISHLIST_PAGE'}
            <div class="ets-form-wrapper">
            <div class="ets_wlp_position_display">
                <span class="title">{l s='Display positions' mod='ets_wishlist_pres17'}</span>
                <ul id="sidebar-positions" class="sidebar-positions">
                    <input type="hidden" name="current_tab" value="{$current_tab|escape:'html':'UTF-8'}" />
                    <li id="sidebar-position-left" class="sidebar-position left_block{if $current_tab=='left_block'} active{/if}">
                        <div class="title-position" data-tab="left_block">{l s='Left column' mod='ets_wishlist_pres17'}</div>
                        <label class="ets_wlp_switch {if $ETS_WLP_ENABLED_IN_LEFT} active{/if}">
                            <input class="ets_wlp_position"{if $ETS_WLP_ENABLED_IN_LEFT} checked="checked"{/if} value="1" name="ETS_WLP_ENABLED_IN_LEFT" type="checkbox" />
                            <span class="ets_wlp_position_label on">{l s='On' mod='ets_wishlist_pres17'}</span>
                            <span class="ets_wlp_position_label off">{l s='Off' mod='ets_wishlist_pres17'}</span>
                        </label>
                    </li>
                    <li id="sidebar-position-right" class="sidebar-position right_block{if $current_tab=='right_block'} active{/if}">
                        <div class="title-position" data-tab="right_block">{l s='Right column' mod='ets_wishlist_pres17'}</div>
                        <label class="ets_wlp_switch {if $ETS_WLP_ENABLED_IN_RIGHT} active{/if}">
                            <input class="ets_wlp_position"{if $ETS_WLP_ENABLED_IN_RIGHT} checked="checked"{/if} value="1" name="ETS_WLP_ENABLED_IN_RIGHT" type="checkbox" />
                            <span class="ets_wlp_position_label on">{l s='On' mod='ets_wishlist_pres17'}</span>
                            <span class="ets_wlp_position_label off">{l s='Off' mod='ets_wishlist_pres17'}</span>
                        </label>
                    </li>
                    <li id="sidebar-position-left" class="sidebar-position shipping_block{if $current_tab=='shipping_block'} active{/if}">
                        <div class="title-position" data-tab="shipping_block">{l s='Shipping cart page' mod='ets_wishlist_pres17'}</div>
                        <label class="ets_wlp_switch {if $ETS_WLP_ENABLED_IN_SHIPPING} active{/if}">
                            <input class="ets_wlp_position"{if $ETS_WLP_ENABLED_IN_SHIPPING} checked="checked"{/if} value="1" name="ETS_WLP_ENABLED_IN_SHIPPING" type="checkbox" />
                            <span class="ets_wlp_position_label on">{l s='On' mod='ets_wishlist_pres17'}</span>
                            <span class="ets_wlp_position_label off">{l s='Off' mod='ets_wishlist_pres17'}</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="form-wrapper">
        {/if}
        {if $input.name=='ETS_WLP_AUTO_PLAY_SHIPPING'}
            </div>
            </div>
        {/if}
    {/if}
{/block}