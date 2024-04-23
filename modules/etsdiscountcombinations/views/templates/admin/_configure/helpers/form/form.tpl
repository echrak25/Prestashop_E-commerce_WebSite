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
    {if $input.type == 'search_rule'}
        <div class="dc_search_rule_form">
            <div class="input-group ">
                <input class="dc_search_rule" name="dc_search_rule" {if isset($input.placeholder)}placeholder="{$input.placeholder|escape:'html':'UTF-8'}"{/if} autocomplete="off" type="text" />
                <span class="input-group-addon"> <i class="icon-search"></i> </span>
            </div>
            <input class="dc_ids_rule" name="{$input.name|escape:'html':'UTF-8'}" value="{$fields_value[$input.name]|escape:'html':'UTF-8'}" type="hidden" />
            <ul class="dc_rules" id="block_search_{$input.name|escape:'html':'UTF-8'}">
                {Module::getInstanceByName('etsdiscountcombinations')->displayListRules($fields_value[$input.name]) nofilter}
                <li class="dc_rule_loading"></li>
            </ul>
        </div>
    {elseif $input.type=='html'}
        {$input.html_content nofilter}
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
{block name='description'}
    {if $input.type == 'file' && isset($input.is_image) && $input.is_image}
        {$smarty.block.parent}
        <p class="help-block">{l s='Available image type: jpg, png, gif, jpeg'  mod='etsdiscountcombinations'}. {l s='Limit'  mod='etsdiscountcombinations'} {Configuration::get('PS_ATTACHMENT_MAXIMUM_SIZE')|escape:'html':'UTF-8'}Mb</p>

    {elseif isset($input.desc) && !is_array($input.desc)}
        <p class="help-block">{$input.desc|replace:'[highlight]':'<code>'|replace:'[end_highlight]':'</code>'|replace:'[highlighta]':'<a href="#">'|replace:'[end_highlighta]':'</a>' nofilter}</p>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
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