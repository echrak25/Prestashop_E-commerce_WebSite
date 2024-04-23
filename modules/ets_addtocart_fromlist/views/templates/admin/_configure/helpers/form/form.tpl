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
    {if $input.name == 'ETS_ATC_BUTTON_ICON' || $input.name == 'ETS_ATC_ADJUST_TOP'||$input.name == 'ETS_ATC_ADJUST_BOTTOM'
    ||$input.name == 'ETS_ATC_ADJUST_RIGHT'||$input.name == 'ETS_ATC_ADJUST_LEFT'
    || $input.name == 'ETS_ATC_ADJUST_ICON_TOP'||$input.name == 'ETS_ATC_ADJUST_ICON_BOTTOM'
    ||$input.name == 'ETS_ATC_ADJUST_ICON_RIGHT'||$input.name == 'ETS_ATC_ADJUST_ICON_LEFT'}
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
{block name="input"}
    {if $input.name == 'ETS_ATC_ICON_STYLE_ICON'}
        <select name="ETS_ATC_ICON_STYLE_ICON" class="atc-icon fixed-width-xl" id="ETS_ATC_ICON_STYLE_ICON" value="{$fields_value[$input.name]|escape:'html':'UTF-8'}">

            {foreach $input.options.query as $key => $value}
                <option value="{$value.option_value|escape:'html':'UTF-8'}" {if $fields_value[$input.name] == $value.option_value}selected="selected"{/if}>{$value.option_title|escape:'html':'UTF-8'}</option>
            {/foreach}
        </select>
    {elseif $input.name == 'ETS_ATC_BUTTON_LABEL'}
        <div class="row ets_act_label" style="display: flex">
            <select name="ETS_ATC_BUTTON_ICON" class="atc-button col-lg-2" id="ETS_ATC_BUTTON_ICON" value="{$fields_value['ETS_ATC_BUTTON_ICON']|escape:'html':'UTF-8'}">

                {foreach $fieldset.form.input['ETS_ATC_BUTTON_ICON'].values as $key => $value}
                    <option data-icon="{$value.data_icon|escape:'html':'UTF-8'}" value="{$value.value|escape:'html':'UTF-8'}" {if $fields_value['ETS_ATC_BUTTON_ICON'] == $value.value}selected="selected"{/if}>{$value.label|escape:'html':'UTF-8'}</option>
                {/foreach}
            </select>
            <div class="ets_lable_input has_charCount {if count($languages) > 1}has_multi_lang{/if}">
                {$smarty.block.parent}
                <p id="charCount">0/20</p>
            </div>
        </div>
    {elseif $input.name == 'ETS_ATC_BUTTON_ICON' || $input.name == 'ETS_ATC_BUTTON_ICON'}
            <div class="ets_remove_element"></div>
    {elseif $input.name == 'ETS_ATC_ADJUST_POSITION' || $input.name == 'ETS_ATC_ADJUST_POSITION_ICON'}
        <div class="row ets-adjust-postition-group" style="display: flex">
            {foreach from=$input.options key='name' item='item'}
                <div class="ets_position_input_group" style="display: flex">
                    <label class="control-label" style="padding-right: 5px">
                        {$item.label|escape:'html':'UTF-8'}
                    </label>
                    <div class="input-group ets-input-position-field {$item.class|escape:'html':'UTF-8'}" style="margin-right: 20px">
                        <input type="text" name="{$name|escape:'html':'UTF-8'}" id="{$name|escape:'html':'UTF-8'}" value="{$fields_value[$name]|escape:'html':'UTF-8'}" style="max-width: 120px">
                        <span class="input-group-addon">{$item.prefix|escape:'html':'UTF-8'}</span>
                    </div>
                </div>

            {/foreach}
        </div>
    {elseif $input.name == 'ETS_ATC_RESET_CONFIG'}
        <button class="ets_atc_reset btn btn-default">
            {$input.label|escape:'html':'UTF-8'}
        </button>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
{block name="other_fieldsets"}
    <script>
        var baseAdminUrl = "{$baseAdminUrl|escape:'quotes':'UTF-8'}";
    </script>
{/block}

