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
{block name="input_row"}
    {if $input.name=='PH_SL_LINK_ENABLED'}
        <div class="row">
        <div class="social_tab_content_style_left col-md-4 col-lg-4">
    {/if}
    {if $input.name=='PH_SL_DISPLAY_POSITIONS'}
        <div class="social_tab_content_style_center col-md-4 col-lg-4">
        <div class="social_tab_content_style_center_content">
        <h4 class="title">{l s='Display Social link buttons in form' mod='ph_social_links'}</h4>
    {/if}
    {if $input.type=='custom_html'}
        {$input.html_content nofilter}
    {else}
        {$smarty.block.parent}
    {/if}
    {if $input.name=='PH_SL_LINK_ENABLED' || $input.name=='PH_SL_SOCIAL_ENABLED'}
            {if $input.name=='PH_SL_SOCIAL_ENABLED'}
                <div class="form-group">
                    <button type="submit" value="1" id="configuration_form_submit_btn" name="btnSubmit" class="btn btn-default pull-right">
                		<i class="process-icon-save"></i> Save
                	</button>
                </div>
            {/if}
        </div>
        {if $input.name=='PH_SL_SOCIAL_ENABLED'}
        </div>
            <div class="social_tab_content_style_right col-md-4 col-lg-4">
                {Module::getInstanceByName('ph_social_links')->displayPreviewSocial() nofilter}
            </div>
            </div>

        {/if}
    {/if}
{/block}
{block name="input"}
    {if $input.type == 'checkbox'}
        {if isset($input.values.query) && $input.values.query}
            {assign var=id_checkbox value=$input.name|cat:'_'|cat:'all'}
            {assign var=checkall value=true}
			{if !(isset($fields_value[$input.name]) && is_array($fields_value[$input.name]) && $fields_value[$input.name] && in_array('all',$fields_value[$input.name]))} 
                {assign var=checkall value=false}
            {/if}
            {foreach $input.values.query as $value}
				{assign var=id_checkbox value=$input.name|cat:'_'|cat:$value[$input.values.id]|escape:'html':'UTF-8'}
				<div class="checkbox{if isset($input.expand) && strtolower($input.expand.default) == 'show'} hidden{/if}">
					{strip}
						<label for="{$id_checkbox|escape:'html':'UTF-8'}">                                
							<input type="checkbox" name="{$input.name|escape:'html':'UTF-8'}[]" id="{$id_checkbox|escape:'html':'UTF-8'}" {if isset($value[$input.values.id])} value="{$value[$input.values.id]|escape:'html':'UTF-8'}"{/if}{if isset($fields_value[$input.name]) && is_array($fields_value[$input.name]) && $fields_value[$input.name] && (in_array($value[$input.values.id],$fields_value[$input.name]) || in_array('all',$fields_value[$input.name])) } checked="checked"{/if} {if isset($value.class) && $value.class} class="{$value.class|escape:'html':'UTF-8'}"{/if}/>
							{$value[$input.values.name]|replace:'[highlight]':'<strong>'|replace:'[end_highlight]':'</strong>' nofilter}
						</label>
					{/strip}
				</div>
			{/foreach} 
        {/if}
   {elseif $input.type == 'switch'}
    	<span class="switch prestashop-switch fixed-width-lg">
    		{foreach $input.values as $value}
    		<input type="radio" name="{$input.name|escape:'html':'UTF-8'}"{if $value.value == 1} id="{$input.name|escape:'html':'UTF-8'}_on"{else} id="{$input.name|escape:'html':'UTF-8'}_off"{/if} value="{$value.value|escape:'html':'UTF-8'}"{if $fields_value[$input.name] == $value.value} checked="checked"{/if}{if (isset($input.disabled) && $input.disabled) or (isset($value.disabled) && $value.disabled)} disabled="disabled"{/if}/>
    		{strip}
    		<label {if $value.value == 1} for="{$input.name|escape:'html':'UTF-8'}_on"{else} for="{$input.name|escape:'html':'UTF-8'}_off"{/if}>
    			{if $value.value == 1}
    				{l s='On' mod='ph_social_links'}
    			{else}
    				{l s='Off' mod='ph_social_links'}
    			{/if}
    		</label>
    		{/strip}
    		{/foreach}
    		<a class="slide-button btn"></a>
    	</span>
   {else}
        {$smarty.block.parent}
   {/if}   
{/block}
{block name="after"}
    <script type="text/javascript">
        var ph_link_is_required_text= '{l s='The social link required' mod='ph_social_links' js=1}';
        var ph_link_is_not_valid_text= '{l s='The social link is invalid.' mod='ph_social_links' js=1}';
    </script>
{/block}