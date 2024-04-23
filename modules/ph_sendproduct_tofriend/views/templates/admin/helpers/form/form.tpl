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
{block name="input"}
    {if $input.type=='range'}
        <div class="range_custom">
            <span class="range_min">{$input.min|intval}</span>
            <span class="range_max">{$input.max|intval}</span>
            <input  name="{$input.name|escape:'html':'UTF-8'}" type="range" min="{$input.min|intval}" max="{$input.max|intval}" value="{$fields_value[$input.name]|intval}" data-unit="{if isset($input.unit)}{$input.unit|escape:'html':'UTF-8'}{/if}" data-units="{if isset($input.units)}{$input.units|escape:'html':'UTF-8'}{/if}" />
            <div class="range_new">
                <span class="range_new_bar"></span>
                <span class="range_new_run">
                        <span class="range_new_button"></span>
                    </span>
            </div>
            <span class="input-group-unit">
                    {if $fields_value[$input.name] <=1}
                        {if $fields_value[$input.name]}{$fields_value[$input.name]|intval}{else}1{/if}{if isset($input.unit)}&nbsp;{$input.unit|escape:'html':'UTF-8'}{/if}
                    {else}
                        {$fields_value[$input.name]|intval}{if isset($input.units)}&nbsp;{$input.units|escape:'html':'UTF-8'}{/if}
                    {/if}
                </span>
        </div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}