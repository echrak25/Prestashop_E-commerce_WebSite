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
<script type="text/javascript">
    var ybc_featuredcat_ajax_url = '{$mailchimpModulePath nofilter}ajax.php';
    var mailchimp_admin_token = '{$mailchimptoken|escape:'html':'UTF-8'}';
</script>
{if isset($save_ok)&& $save_ok || isset($update_ok)&& $update_ok || isset($delete_ok)&& $delete_ok || isset($errors) && $errors}
    <div style="margin-top: 20px;" {if $ps_version_1_6}class="bootstrap"{/if}>
        {if !isset($errors) || isset($errors) && !$errors}
            <div class="{if $ps_version_1_6}alert alert-success{else}conf confirm{/if}">
            <button type="button" class="close" data-dismiss="alert">×</button>
                {if isset($save_ok)&& $save_ok}{l s='Saved' mod='ets_mailchimpsync'}{/if}
                {if isset($update_ok)&& $update_ok}{l s='List updated' mod='ets_mailchimpsync'}{/if}
                {if isset($delete_ok)&& $delete_ok}{l s='List deleted' mod='ets_mailchimpsync'}{/if}
            </div>
        {/if}
        {if isset($errors) && $errors}
            <div class="{if $ps_version_1_6}alert alert-danger{else}error{/if}">
                {implode('<br/>',$errors)|escape:'htmlall':'UTF-8'}
            </div>
        {/if}
    </div>
{/if}
<h2>{l s ='Automatic Mailchimp Sync' mod='ets_mailchimpsync'}</h2>
<div class="module_error alert error" style="display: none;" id="ybcnotification">

</div>
<form action="{$postUrl|escape:'htmlall':'UTF-8'}" method="post">
    <fieldset class="width9 space">
		<legend><img class="middle" alt="" src="../img/admin/cog.gif"/>{l s='Mailchimp API setup' mod='ets_mailchimpsync'}</legend>
        <table>
            <tr>
                <td class="col-left" style="min-width: 245px;"><label for="YBC_API_KEY">{l s='Mailchimp API key' mod='ets_mailchimpsync'}</label></td>
                <td><input id="YBC_API_KEY" type="text" style="min-width: 280px;" value="{$YBC_API_KEY|escape:'htmlall':'UTF-8'}" name="YBC_API_KEY" /></td>
            </tr>
       
        </table>
        <div class="margin-form">
            <input class="button" type="submit" value="{l s='Save Mailchimp API key' mod='ets_mailchimpsync'}" name="submit_save_setting" />
        </div>
		<div style="float: left;">
            <label>{l s='Cronjob URL: ' mod='ets_mailchimpsync'}</label>
            <div style="float: left;">             
    			<b>{l s='Http url: ' mod='ets_mailchimpsync'}</b><a style="text-decoration: none; color: #00aff0; font-size: 13px;" href="{$shop_link|escape:'htmlall':'UTF-8'}modules/ets_mailchimpsync/syncmailchimp.php" target="_blank">{$shop_link|escape:'htmlall':'UTF-8'}modules/ybc_customexport/syncmailchimp.php</a>
                <br />
                <b>{l s='Physical path: ' mod='ets_mailchimpsync'}</b> {$physicalPath|escape:'htmlall':'UTF-8'}
                <br />
                <i>{l s='Make a cronjob for this url to automatically synchronize your Prestashop mailing list with Mailchimp mailing list' mod='ets_mailchimpsync'}</i>
            </div>
        </div>
	</fieldset>
</form>
<form action="{$postUrl|escape:'htmlall':'UTF-8'}" method="post">    
    <fieldset style="margin-top: 10px;">
        <legend><img class="middle" alt="" src="../img/admin/export.gif"/>{l s='Create/Update a mailing list' mod='ets_mailchimpsync'}</legend>
        <table style="border-collapse: separate;">
        	<tr>
        		<td class="col-left"><label for="product_autocomplete_input">{l s='Bought product(s)' mod='ets_mailchimpsync'}</label></td>
        		<td style="padding: 7px 0;">
        			<input type="hidden" name="inputAccessories" id="inputAccessories" value="{if isset($accessories)&&$accessories}{foreach from=$accessories item=accessory}{$accessory.id_product|escape:'htmlall':'UTF-8'}-{/foreach}{/if}" />
			        <input type="hidden" name="nameAccessories" id="nameAccessories" value="{if isset($accessories)&&$accessories}{foreach from=$accessories item=accessory}{$accessory.name|escape:'html':'UTF-8'}¤{/foreach}{/if}" />
			         <div id="ajax_choose_product">
      				<input style="min-width: 280px;" placeholder="{l s='Type in product name or referrence' mod='ets_mailchimpsync'}" type="text" value="" id="product_autocomplete_input" />
                    </div>
        			<div id="divAccessories">
        				{* @todo : donot use 3 foreach, but assign var *}
                        {if isset($accessories)&&$accessories}
        				{foreach from=$accessories item=accessory}
        					{$accessory.name|escape:'htmlall':'UTF-8'}{if !empty($accessory.reference)} {$accessory.reference|escape:'htmlall':'UTF-8'}{/if}
        					<span class="delAccessory" name="{$accessory.id_product|escape:'htmlall':'UTF-8'}" style="cursor: pointer;" onclick="ybcDelAccessory('{$accessory.id_product|escape:'htmlall':'UTF-8'}')">
        						<img src="../img/admin/delete.gif" class="middle" alt="" />
        					</span><br />
        				{/foreach}
                        {/if}
        			</div>
        		</td>
        	</tr>
            <tr>
                <td class="col-left">
                    <label for="from_price">{l s='Spent from ' mod='ets_mailchimpsync'}</label> 
                </td>
                <td style="padding: 7px 0;">     
                    <input name="from_price" style="margin-right: 10px; width: 45px;" id="from_price" type="text" value="{if isset($from_price)}{$from_price|escape:'htmlall':'UTF-8'}{/if}" />                               
                    <label for="to_price" style="width: auto; float: none;">{l s='To ' mod='ets_mailchimpsync'}  </label> 
                    <input name="to_price" id="to_price" type="text" style=" width: 45px;" value="{if isset($to_price)}{$to_price|escape:'htmlall':'UTF-8'}{/if}" />
                </td>
            </tr>
            <tr>
                <td class="col-left"><label for="select_currency">{l s='Currency' mod='ets_mailchimpsync'}</label></td>
                <td style="padding: 7px 0;">                    
                    <select style="min-width: 150px;" id="select_currency" name="select_currency">
                        {if $currencies}
                            <option value="0">{l s='--' mod='ets_mailchimpsync'}</option>
                            {foreach from=$currencies item='currency'}
                                <option value="{$currency.id_currency|escape:'htmlall':'UTF-8'}" {if $id_currency == $currency.id_currency}selected="selected"{/if}>{$currency.iso_code|escape:'htmlall':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>                    
                </td>
            </tr>
            <tr>
                <td class="col-left"><label for="bought_category">{l s='Bought at least a product in category' mod='ets_mailchimpsync'}</label></td>
                <td style="padding: 7px 0;">                    
                    <select style="min-width: 150px;" id="bought_category" name="bought_category">
                        <option value="0"> {l s='--' mod='ets_mailchimpsync'} </option>
                        {$categoryOptions nofilter}
                    </select>                    
                </td>
            </tr>
            <tr>
                <td class="col-left"><label>{l s='Subscribed to newsletter?' mod='ets_mailchimpsync'}</label></td>
                <td style="padding: 7px 0;">
                    <input name="newsletter" class="newsletter" value="2" type="radio" {if $newsletter==2}checked="checked"{/if} id="ybc_newsletter_both" /> <label style="width: auto; float: none;" for="ybc_newsletter_both">{l s='Both' mod='ets_mailchimpsync'}</label>
                    <input name="newsletter" class="newsletter"  value="1" type="radio"{if $newsletter==1}checked="checked"{/if} id="ybc_newsletter_yes" /> <label style="width: auto; float: none;" for="ybc_newsletter_yes">{l s='Yes' mod='ets_mailchimpsync'}</label>
                    <input name="newsletter" class="newsletter" value="0" type="radio"  {if $newsletter==0}checked="checked"{/if}  id="ybc_newsletter_no" /> <label style="width: auto; float: none;" for="ybc_newsletter_no">{l s='No' mod='ets_mailchimpsync'}</label>                    
                </td>
            </tr>
            <tr>
                <td class="col-left"><label>{l s='Opt in?' mod='ets_mailchimpsync'}</label></td>
                <td style="padding: 7px 0;">
                    <input name="optin" class="optin" value="2" type="radio" {if $optin==2}checked="checked"{/if} id="ybc_optin_both" /> <label style="width: auto; float: none;" for="ybc_optin_both">{l s='Both' mod='ets_mailchimpsync'}</label>
                    <input name="optin" class="optin"  value="1" type="radio"{if $optin==1}checked="checked"{/if} id="ybc_optin_yes" /> <label style="width: auto; float: none;" for="ybc_optin_yes">{l s='Yes' mod='ets_mailchimpsync'}</label>
                    <input name="optin" class="optin" value="0" type="radio"  {if $optin==0}checked="checked"{/if}  id="ybc_optin_no" /> <label style="width: auto; float: none;" for="ybc_optin_no">{l s='No' mod='ets_mailchimpsync'}</label>                    
                </td>
            </tr>
            <tr>
                <td class="col-left"><label for="id_country">{l s='Country' mod='ets_mailchimpsync'}</label></td>
                <td style="padding: 7px 0;">
                    <select style="min-width: 150px;" id="id_country" name="id_country">
                        <option value="0"> {l s='--' mod='ets_mailchimpsync'} </option>
                        {if $countries}
                            {foreach from=$countries item='country'}
                                <option {if $country.id_country == $id_country}selected="selected"{/if} value="{$country.id_country|escape:'htmlall':'UTF-8'}">{$country.name|escape:'htmlall':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col-left"><label for="id_lang">{l s='Language' mod='ets_mailchimpsync'}</label></td>
                <td style="padding: 7px 0;">
                    <select style="min-width: 150px;" id="id_lang" name="id_lang">
                        <option value="0"> {l s='--' mod='ets_mailchimpsync'} </option>
                        {if $languages}
                            {foreach from=$languages item='language'}
                                <option {if $language.id_lang == $id_lang}selected="selected"{/if} value="{$language.id_lang|escape:'htmlall':'UTF-8'}">{$language.name|escape:'htmlall':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col-left"><label for="idmailchimp">{l s='Synchronize with this Mailchimp list' mod='ets_mailchimpsync'}</label></td>
                <td style="padding: 7px 0;">
                    <select name="idmailchimp" id="idmailchimp" style="width: 150px">
                        <option value=""> {l s='---' mod='ets_mailchimpsync'} </option>
                        {if $retvals}
                            {foreach from=$retvals item='retval'}
                                <option {if $retval.id==$idmailchimp}selected="selected"{/if} value="{$retval.id|escape:'htmlall':'UTF-8'}">{$retval.name|escape:'htmlall':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>
                </td>
            </tr>
        </table>
        {if $id_export}
            <input type="hidden" name="id_export" value="{$id_export|escape:'htmlall':'UTF-8'}" />
        {/if}
        <div class="margin-form" style="padding-top: 10px;">
            {if !$id_export}
                <input class="button" type="submit" value="{l s='Create this list' mod='ets_mailchimpsync'}" name="submit_save_filter" id="submit_save_filter"/>
            {else}
                <input class="button" type="submit" value="{l s='Update this list' mod='ets_mailchimpsync'}" name="submit_update_filter" id="submit_update_filter"/>
            {/if}            
            {if $id_export}
                <a class="button" style="font-size: 12px;" href="{$postUrl|escape:'htmlall':'UTF-8'}" title="{l s='Cancel' mod='ets_mailchimpsync'}">{l s='Cancel' mod='ets_mailchimpsync'}</a>   
            {/if}         
        </div>
    </fieldset>
</form>
<div class="content_list_mail">
    {if isset($content_mailing) && $content_mailing}{$content_mailing nofilter}{/if}
</div>

<script type="text/javascript"> 
    var id_export;
    var error_msg = '{l s='Request timed out' mod='ets_mailchimpsync'}';
    var warning_msg = '{l s='Data synchronized with warning: ' mod='ets_mailchimpsync'}';
    var ps_version = {if $ps_version_1_6}true{else}false{/if};
    var ajaxUrl = '{$ajaxUrl|escape:'htmlall':'UTF-8'}';
    {literal}
    function syncMailChimp(idexport,start,total_sync) {
        if($('.sync-'+idexport).css('opacity')=='0.5' && start==0)
            return false;
        $('.mailchimp-alert').remove();
        $('#content .alert').remove();
        $('.sync-'+idexport).css('opacity','0.5');
        $.ajax({
			type: 'GET',
			url: ajaxUrl,
			async: true,
			dataType : "json",
			data: 'idexport='+idexport+'&token='+mailchimp_admin_token+'&start='+start+'&total_sync='+total_sync,
			success: function(json)
			{
			 
                if(json.tieptuc)
                {
                    syncMailChimp(idexport,parseInt(json.start)+1,json.total_sync);
                }
                else
                {
                    $('.sync-'+idexport).css('opacity','1');
    			    if(json.error)
                    {
                        $('#content .filter-list-tbl').before((ps_version ? '<div class="bootstrap mailchimp-alert">' : '')+'<div class="mailchimp-alert alert alert-warning">'+warning_msg+json.error+(json.submitted ? '<br/>'+json.submitted : '')+'</div>'+(ps_version ? '</div>' : ''));
                    }
                    else
                        $('#content .filter-list-tbl').before((ps_version ? '<div class="bootstrap mailchimp-alert">' : '')+'<div class="mailchimp-alert alert alert-success">'+json.suc+(json.submitted ? '<br/>'+json.submitted : '')+'</div>'+(ps_version ? '</div>' : ''));
                }
                
			},
            error: function(){
                $('.sync-'+idexport).css('opacity','1');
                $('#content .filter-list-tbl').before((ps_version ? '<div class="bootstrap mailchimp-alert">' : '')+'<div class="mailchimp-alert alert alert-error">'+error_msg+'</div>'+(ps_version ? '</div>' : ''));
            }

		}).done(function () {
        });
    }
    $(document).ready(function(){
        $(document).on('click','.sync',function(){
            var idexport = $(this).attr('rel');
            $('#ybcnotification').html("").hide();
            syncMailChimp(idexport,0,0);
            return false;
        });
    });
    {/literal}
</script>   
