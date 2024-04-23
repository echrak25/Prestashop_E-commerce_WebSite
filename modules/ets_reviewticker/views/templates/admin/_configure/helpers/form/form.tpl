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
{extends file="helpers/form/form.tpl"}
{block name="input"}
    {if $input.type == 'switch'}
		<span class="switch prestashop-switch fixed-width-lg">
			{foreach $input.values as $value}
			<input type="radio" name="{$input.name|escape:'html':'UTF-8'}"{if $value.value == 1} id="{$input.name|escape:'html':'UTF-8'}_on"{else} id="{$input.name|escape:'html':'UTF-8'}_off"{/if} value="{$value.value|intval}"{if $fields_value[$input.name] == $value.value} checked="checked"{/if}{if (isset($input.disabled) && $input.disabled) or (isset($value.disabled) && $value.disabled)} disabled="disabled"{/if}/>
			{strip}
			<label {if $value.value == 1} for="{$input.name|escape:'html':'UTF-8'}_on"{else} for="{$input.name|escape:'html':'UTF-8'}_off"{/if}>
				{if $value.value == 1}
					{l s='Yes' mod='ets_reviewticker'}
				{else}
					{l s='No' mod='ets_reviewticker'}
				{/if}
			</label>
			{/strip}
			{/foreach}
			<a class="slide-button btn"></a>
		</span>
    {else}
        {$smarty.block.parent}
        {if isset($input.length_field) && $input.length_field}
            <div class="as_length_field"><label for="{$input.name|escape:'html':'UTF-8'}_length">{l s='Length:' mod='ets_reviewticker'} </label><input type="text" class="as_input_length" id="{$input.name|escape:'html':'UTF-8'}_length" name="{$input.name|escape:'html':'UTF-8'}_length" value="{if isset($input.field_length) && $input.field_length!==false}{$input.field_length|intval}{/if}" data-default-length="{$input.default_length|intval}" /></div>
        {/if}                  
    {/if}
{/block}
{block name="input_row"}
    {if $input.name=='ETS_RT_ALERT'}
        <div class="rt_form_tab_content">
            <div class="rt_form_tab_div">
                <ul class="rt_form_tab">
                    <li class="rt_general active" data-tab="general">{l s='General' mod='ets_reviewticker'}</li>
                    <li class="rt_condition" data-tab="condition">{l s='Conditions' mod='ets_reviewticker'}</li>
                    <li class="rt_display" data-tab="display">{l s='Display' mod='ets_reviewticker'}</li>
                    <li class="rt_pages" data-tab="pages">{l s='MISC' mod='ets_reviewticker'}</li>
                </ul>
            </div>
            <div class="rt_form">
                <div class="rt_form_general active">
                    {/if}
                    {if $input.name=='ETS_RT_TIME_LIMIT_DAY'}
                        </div><div class="rt_form_condition">
                    {/if}
                    {if $input.name=='ETS_RT_REPEAT'}
                        </div><div class="rt_form_display">
                    {/if}  
                    {if $input.name=='ETS_RT_PAGE[]'}
                        </div><div class="rt_form_pages">
                    {/if}    
                    <div class="form-group-wrapper row_{strtolower($input.name)|escape:'html':'UTF-8'}">{$smarty.block.parent}</div>
                    {if $input.name=='ETS_RT_PAGE[]'}
                </div>
            </div>
        </div>
    {/if}
{/block}