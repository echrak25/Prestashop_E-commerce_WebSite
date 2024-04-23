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
    {if $input.type == 'checkbox'}
            {if isset($input.values.query) && $input.values.query}
                {foreach $input.values.query as $value}
    				{assign var=id_checkbox value=$input.name|cat:'_'|cat:$value[$input.values.id]|escape:'html':'UTF-8'}
    				<div class="checkbox{if isset($input.expand) && strtolower($input.expand.default) == 'show'} hidden{/if}">
    					{strip}
    						<label for="{$id_checkbox|intval}">                                
    							<input type="checkbox" name="{$input.name|escape:'html':'UTF-8'}[]" id="{$id_checkbox|escape:'html':'UTF-8'}" {if isset($value.value)} value="{$value.value|escape:'html':'UTF-8'}"{/if}{if isset($fields_value[$input.name]) && is_array($fields_value[$input.name]) && $fields_value[$input.name] && in_array($value.value,$fields_value[$input.name])} checked="checked"{/if} />
    							{$value[$input.values.name]|escape:'html':'UTF-8'}
    						</label>
    					{/strip}
    				</div>
    			{/foreach} 
            {/if} 
    {else}
        {$smarty.block.parent}
        {if $input.name=='ETS_MM_CACHE_LIFE_TIME'}
            <a class="mm_clear_cache" href="{$mm_clear_cache_url|escape:'html':'UTF-8'}">{l s='Clear menu cache' mod='ets_megamenu'}</a>
        {/if}               
    {/if}            
{/block}
{block name="field"}
    {if $input.name}
        {$smarty.block.parent}
    	{if $input.type == 'file' &&  isset($input.display_img) && $input.display_img}
            <label class="control-label col-lg-3 uploaded_image_label" style="font-style: italic;">{l s='Uploaded image: ' mod='ets_megamenu'}</label>
            <div class="col-lg-9 uploaded_img_wrapper">
        		<a  class="ets_mm_fancy" href="{$input.display_img|escape:'html':'UTF-8'}"><img title="{l s='Click to see full size image' mod='ets_megamenu'}" style="display: inline-block; max-width: 200px;" src="{$input.display_img|escape:'html':'UTF-8'}" /></a>
                {if (!isset($input.hide_delete) || isset($input.hide_delete) && !$input.hide_delete) && isset($input.img_del_link) && $input.img_del_link && !(isset($input.required) && $input.required)}
                    <a class="delete_url" style="display: inline-block; text-decoration: none!important;" href="{$input.img_del_link|escape:'html':'UTF-8'}"><span style="color: #666"><i style="font-size: 20px;" class="process-icon-delete"></i></span></a>
                {/if}
            </div>        
        {/if}    
    {/if}
{/block}

{block name="footer"}
    {capture name='form_submit_btn'}{counter name='form_submit_btn'}{/capture}      
	{if isset($fieldset['form']['submit']) || isset($fieldset['form']['buttons'])}
		<div class="panel-footer">
            {if isset($reset_default) && $reset_default}
                <span class="btn btn-default mm_reset_default" title="{l s='Only reset configuration to default. Menu data won\'t be lost' mod='ets_megamenu'}">
                    <img src="{$image_baseurl|escape:'html':'UTF-8'}loader.gif" />
                    <i class="process-icon-refresh"></i>
                    {l s='Reset' mod='ets_megamenu'}
                </span>
            {/if}
            {if isset($fieldset['form']['submit']) && !empty($fieldset['form']['submit'])}
            <div class="img_loading_wrapper hidden">
                <img src="{$image_baseurl|escape:'html':'UTF-8'}ajax-loader.gif" title="{l s='Loading' mod='ets_megamenu'}" class="ets_megamenu_loading" />
            </div>
            <input type="hidden" name="mm_object" value="{$mm_object|escape:'html':'UTF-8'}" />
            {if isset($list_item) && $list_item}
                <input type="hidden" name="itemId" value="{$item_id|intval}" />
                <input type="hidden" name="mm_form_submitted" value="1" />
            {else}
                <input type="hidden" name="mm_config_submitted" value="1" />
            {/if}
            <div class="mm_save_wrapper">
    			<button type="submit" value="1"	class="mm_save_button {if isset($list_item) && $list_item}mm_save{else}mm_config_save{/if} {if isset($fieldset['form']['submit']['class'])}{$fieldset['form']['submit']['class']|escape:'html':'UTF-8'}{else}btn btn-default pull-right{/if}">
    				<i class="{if isset($fieldset['form']['submit']['icon'])}{$fieldset['form']['submit']['icon']|escape:'html':'UTF-8'}{else}process-icon-save{/if}"></i> {$fieldset['form']['submit']['title']|escape:'html':'UTF-8'}
    			</button>
                <div class="mm_saving">
                    <img src="{$image_baseurl|escape:'html':'UTF-8'}loader.gif" />
                    {l s='Saving' mod='ets_megamenu'}
                </div>
            </div>
			{/if}
            
		</div>
	{/if}    
{/block}
{block name="input_row"}
    {if $input.name=='ETS_MM_LAYOUT'}
        <div class="mm_config_form_tab_div">
            <ul class="mm_config_form_tab">
                <li class="mm_config_genneral active" data-tab="general">{l s='General' mod='ets_megamenu'}</li>
                <li class="mm_config_design" data-tab="design">{l s='Design' mod='ets_megamenu'}</li>
            </ul>
        </div>
        <div class="mm_config_forms">
            <div class="mm_config_general active">
    {/if}
    {if $input.name=='ETS_MM_SKIN'}
        </div>
        <div class="mm_config_design">
    {/if}    
    <div class="form-group-wrapper row_{strtolower($input.name)|escape:'html':'UTF-8'}">{$smarty.block.parent}</div>
    {if $input.name=='ETS_MM_CUSTOM_CSS'}
        </div>
        </div>
    {/if}
{/block}