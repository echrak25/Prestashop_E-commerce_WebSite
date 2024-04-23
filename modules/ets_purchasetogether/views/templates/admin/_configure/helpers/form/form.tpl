{extends file="helpers/form/form.tpl"}
{block name="field"}
    {if $input.type == 'optionslist'}
        <div class="col-lg-9">
            <ul style="float: left; padding: 0; margin-top: 5px;">
                {if $input.options}
                    {foreach from=$input.options.query item='option'}
                        <li class="ets-purchase-type-show" style="list-style: none; padding-bottom: 5px">
                            <input {if in_array($option.value, $fields_value[$input.name])} checked="checked" {/if} style="margin: 2px 7px 0 5px; float: left;" 
                            type="radio" 
                            value="{$option.value|escape:'html':'UTF-8'}"
                            name="{$input.name|escape:'html':'UTF-8'}" />
                            <img src="{$option.image|escape:'html':'UTF-8'}" height="{if isset($option.height)}{$option.heigh|escape:'html':'UTF-8'}px{/if}" width="{if isset($option.width)}{$option.width|escape:'html':'UTF-8'}px{/if}" alt="{$option.label|escape:'html':'UTF-8'}" title="{$option.label|escape:'html':'UTF-8'}" />
                            <p class="help-block">{$option.label|escape:'html':'UTF-8'}</p>
                        </li>
                    {/foreach}
                {/if}
            </ul>
        </div>
    {elseif $input.type == 'checkboxoptions'}
        <div class="col-lg-9">
            <ul style="float: left; padding: 0; margin-top: 5px;">
                {if $input.options}
                    {foreach from=$input.options.query item='option'}
                        <li style="list-style: none; padding-bottom: 5px">
                            <input {if $fields_value[$option.id]} checked="checked" {/if} style="margin: 2px 7px 0 5px; float: left;" 
                            type="checkbox"
                            id="{$option.id|escape:'html':'UTF-8'}"
                            name="{$option.id|escape:'html':'UTF-8'}" />
                            <label for="{$option.id|escape:'html':'UTF-8'}">{$option.label|escape:'html':'UTF-8'}</label>
                        </li>
                    {/foreach}
                {/if}
            </ul>
        </div>
    {/if}
    {$smarty.block.parent}
{/block}

{block name="footer"}
    {capture name='form_submit_btn'}{counter name='form_submit_btn'}{/capture}
	{if isset($fieldset['form']['submit']) || isset($fieldset['form']['buttons'])}
		<div class="panel-footer">
            {if isset($cancel_url) && $cancel_url}
                <a class="btn btn-default" href="{$cancel_url|escape:'html':'UTF-8'}"><i class="process-icon-cancel"></i>Cancel</a>
            {/if}
            {if isset($fieldset['form']['submit']) && !empty($fieldset['form']['submit'])}
			<button type="submit" value="1"	id="{if isset($fieldset['form']['submit']['id'])}{$fieldset['form']['submit']['id']}{else}{$table|escape:'html':'UTF-8'}_form_submit_btn{/if}{if $smarty.capture.form_submit_btn > 1}_{($smarty.capture.form_submit_btn - 1)|intval}{/if}" name="{if isset($fieldset['form']['submit']['name'])}{$fieldset['form']['submit']['name']}{else}{$submit_action|escape:'html':'UTF-8'}{/if}{if isset($fieldset['form']['submit']['stay']) && $fieldset['form']['submit']['stay']}AndStay{/if}" class="{if isset($fieldset['form']['submit']['class'])}{$fieldset['form']['submit']['class']}{else}btn btn-default pull-right{/if}">
				<i class="{if isset($fieldset['form']['submit']['icon'])}{$fieldset['form']['submit']['icon']}{else}process-icon-save{/if}"></i> {$fieldset['form']['submit']['title']}
			</button>
			{/if}
		</div>
	{/if}
{/block}