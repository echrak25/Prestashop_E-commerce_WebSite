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
                {implode('<br/>',$errors) nofilter}
            </div>
        {/if}
    </div>
{/if}
<form class="defaultForm form-horizontal" action="{$postUrl|escape:'html':'UTF-8'}" method="post">
    <div class="panel">
        <div class="panel-heading"><i class="icon-cogs"></i> {l s='Mailchimp API setup' mod='ets_mailchimpsync'}</div>
        <div class="form-wrapper">
            <div class="form-group">
                <label class="control-label col-lg-3" for="YBC_API_KEY">{l s='Mailchimp API key' mod='ets_mailchimpsync'}</label>
                <div class="col-lg-6">
                    <input id="YBC_API_KEY" type="text" value="{$YBC_API_KEY|escape:'htmlall':'UTF-8'}" name="YBC_API_KEY" />
                    {if isset($api_invalid) && $api_invalid}
                        <div class="alert alert-danger alert_api_invaild">
                            {$api_invalid|escape:'htmlall':'UTF-8'}
                        </div>
                    {/if}
                    <a class="how_get_mailchim" href="{$mailchimpModulePath|escape:'htmlall':'UTF-8'}Get_Mailchimp_API_key.pdf" target="_blank">{l s='How to get Mailchimp API key?' mod='ets_mailchimpsync'}</a>
                </div>
            </div>
            {if isset($YBC_API_KEY) && $YBC_API_KEY && isset($check_api) && $check_api }
                <div class="form-group">
                    <label class="control-label col-lg-3">{l s='Cronjob URL' mod='ets_mailchimpsync'}</label>
                    <div class="col-lg-9">
                        <b>{l s='Http url: ' mod='ets_mailchimpsync'}</b><a style="text-decoration: none; color: #00aff0; font-size: 13px;" href="{$shop_link|escape:'htmlall':'UTF-8'}modules/ets_mailchimpsync/syncmailchimp.php" target="_blank">{$shop_link|escape:'htmlall':'UTF-8'}modules/ets_mailchimpsync/syncmailchimp.php</a>
                        <br />
                        <b>{l s='Physical path: ' mod='ets_mailchimpsync'}</b> {$physicalPath|escape:'htmlall':'UTF-8'}
                        <br />
                        <i>{l s='Make a cronjob for this url to automatically synchronize your Prestashop mailing list with Mailchimp mailing list' mod='ets_mailchimpsync'}</i>
                    </div>
                </div>
            {/if}
            <div class="form-group">
                <label class="control-label col-lg-3"></label>
                <div class="col-lg-9">
                    <button class="btn btn-default pull-left" name="submit_save_setting" id="module_form_submit_btn" value="1" type="submit">
            		  <i class="icon-random process-icon-save"></i> {l s='Save API key' mod='ets_mailchimpsync'}
            	    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<form class="defaultForm form-horizontal" action="{$postUrl|escape:'htmlall':'UTF-8'}" method="post">
    <div class="panel">
        <div class="panel-heading"><i class="icon-random process-icon-random"></i> {l s='Create/Update a mailing list' mod='ets_mailchimpsync'}</div>
        <div class="form-wrapper">
            <div class="form-group">
                <label for="product_autocomplete_input" class="control-label col-lg-3">{l s='Bought product(s)' mod='ets_mailchimpsync'}</label>
                <div class="col-lg-9">
                    <input type="hidden" name="inputAccessories" id="inputAccessories" value="{if isset($accessories)&&$accessories}{foreach from=$accessories item=accessory}{$accessory.id_product|escape:'htmlall':'UTF-8'}-{/foreach}{/if}" />
			        <input type="hidden" name="nameAccessories" id="nameAccessories" value="{if isset($accessories)&&$accessories}{foreach from=$accessories item=accessory}{$accessory.name|escape:'html':'UTF-8'}¤{/foreach}{/if}" />
			         <div id="ajax_choose_product">
      				  <input style="max-width: 280px;" placeholder="{l s='Type in product name or referrence' mod='ets_mailchimpsync'}" type="text" value="" id="product_autocomplete_input" />
                    </div>
        			<div id="divAccessories">
        				{* @todo : donot use 3 foreach, but assign var *}
                        {if isset($accessories)&&$accessories}
        				{foreach from=$accessories item=accessory}
        					{$accessory.name|escape:'html':'UTF-8'}{if !empty($accessory.reference)}{$accessory.reference|escape:'html':'UTF-8'}{/if}
        					<span class="delAccessory" name="{$accessory.id_product|escape:'html':'UTF-8'}" style="cursor: pointer;" onclick="ybcDelAccessory('{$accessory.id_product|escape:'html':'UTF-8'}')">
        						<img src="../img/admin/delete.gif" class="middle" alt="" />
        					</span><br />
        				{/foreach}
                        {/if}
        			</div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">{l s='Spent' mod='ets_mailchimpsync'}</label>
                <div class="col-lg-9">
                    <input placeholder="{l s='From' mod='ets_mailchimpsync'}" name="from_price" style="margin-right: 20px; width: 70px; display: inline-block;" id="from_price" type="text" value="{if isset($from_price)}{$from_price|escape:'htmlall':'UTF-8'}{/if}" />
                    <input placeholder="{l s='To' mod='ets_mailchimpsync'}"  name="to_price" id="to_price" type="text" style="width: 70px; display: inline-block;" value="{if isset($to_price)}{$to_price|escape:'htmlall':'UTF-8'}{/if}" />
                </div>
            </div>
            <div class="form-group">
                <label for="select_currency" class="control-label col-lg-3">{l s='Currency' mod='ets_mailchimpsync'}</label>
                <div class="col-lg-9">
                    <select  style="width: 300px" id="select_currency" name="select_currency">
                        {if $currencies}
                            <option value="0">{l s='--' mod='ets_mailchimpsync'}</option>
                            {foreach from=$currencies item='currency'}
                                <option value="{$currency.id_currency|escape:'htmlall':'UTF-8'}" {if $id_currency == $currency.id_currency}selected="selected"{/if}>{$currency.iso_code|escape:'htmlall':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="bought_category" class="control-label col-lg-3">{l s='Bought at least a product in category' mod='ets_mailchimpsync'}</label>
                <div class="col-lg-9">
                    <select  style="width: 300px" id="bought_category" name="bought_category">
                        <option value="0"> {l s='--' mod='ets_mailchimpsync'} </option>
                        {$categoryOptions nofilter}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">{l s='Subscribed to newsletter?' mod='ets_mailchimpsync'}</label>
                <div class="col-lg-9">
                    <input name="newsletter" class="newsletter" value="2" type="radio" {if $newsletter==2}checked="checked"{/if} id="ybc_newsletter_both" /> <label style="width: auto; float: none;" for="ybc_newsletter_both">{l s='Both' mod='ets_mailchimpsync'}</label>
                    <input name="newsletter" class="newsletter"  value="1" type="radio"{if $newsletter==1}checked="checked"{/if} id="ybc_newsletter_yes" /> <label style="width: auto; float: none;" for="ybc_newsletter_yes">{l s='Yes' mod='ets_mailchimpsync'}</label>
                    <input name="newsletter" class="newsletter" value="0" type="radio"  {if $newsletter==0}checked="checked"{/if}  id="ybc_newsletter_no" /> <label style="width: auto; float: none;" for="ybc_newsletter_no">{l s='No' mod='ets_mailchimpsync'}</label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">{l s='Opt in?' mod='ets_mailchimpsync'}</label>
                <div class="col-lg-9">
                    <input name="optin" class="optin" value="2" type="radio" {if $optin==2}checked="checked"{/if} id="ybc_optin_both" /> <label style="width: auto; float: none;" for="ybc_optin_both">{l s='Both' mod='ets_mailchimpsync'}</label>
                    <input name="optin" class="optin"  value="1" type="radio"{if $optin==1}checked="checked"{/if} id="ybc_optin_yes" /> <label style="width: auto; float: none;" for="ybc_optin_yes">{l s='Yes' mod='ets_mailchimpsync'}</label>
                    <input name="optin" class="optin" value="0" type="radio"  {if $optin==0}checked="checked"{/if}  id="ybc_optin_no" /> <label style="width: auto; float: none;" for="ybc_optin_no">{l s='No' mod='ets_mailchimpsync'}</label>
                </div>
            </div>
            <div class="form-group">
                <label for="id_country" class="control-label col-lg-3">{l s='Country' mod='ets_mailchimpsync'}</label>
                <div class="col-lg-9">
                    <select id="id_country" name="id_country" style="width: 300px">
                        <option value="0"> {l s='--' mod='ets_mailchimpsync'} </option>
                        {if $countries}
                            {foreach from=$countries item='country'}
                                <option {if $country.id_country == $id_country}selected="selected"{/if} value="{$country.id_country|escape:'htmlall':'UTF-8'}">{$country.name|escape:'htmlall':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="id_lang" class="control-label col-lg-3">{l s='Language' mod='ets_mailchimpsync'}</label>
                <div class="col-lg-9">
                    <select id="id_lang" name="id_lang" style="width: 300px">
                        <option value="0"> {l s='--' mod='ets_mailchimpsync'} </option>
                        {if $languages}
                            {foreach from=$languages item='language'}
                                <option {if $language.id_lang == $id_lang}selected="selected"{/if} value="{$language.id_lang|escape:'htmlall':'UTF-8'}">{$language.name|escape:'htmlall':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="idmailchimp" class="control-label col-lg-3">{l s='Synchronize with this Mailchimp list' mod='ets_mailchimpsync'}</label>
                <div class="col-lg-9">
                    <select name="idmailchimp" id="idmailchimp" style="width: 300px">
                        <option value=""> {l s='---' mod='ets_mailchimpsync'} </option>
                        {if $retvals}
                            {foreach from=$retvals item='retval'}
                                <option {if $retval.id==$idmailchimp}selected="selected"{/if} value="{$retval.id|escape:'htmlall':'UTF-8'}">{$retval.name|escape:'htmlall':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3"></label>
                <div class="col-lg-9">
                    {if $id_export}
                        <input type="hidden" name="id_export" value="{$id_export|escape:'htmlall':'UTF-8'}" />
                    {/if}
                    <div class="margin-form" style="padding-top: 10px;">
                        {if !$id_export}
                            <button class="btn btn-default" name="submit_save_filter" id="submit_save_filter" type="submit"><i class="icon-plus-sign"></i> {l s='Create this list' mod='ets_mailchimpsync'}</button>
                        {else}
                            <button class="btn btn-default" name="submit_update_filter" id="submit_update_filter" type="submit"><i class="icon-random process-icon-save"></i> {l s='Update this list' mod='ets_mailchimpsync'}</button>

                        {/if}
                        {if $id_export}
                            <a class="btn btn-default" style="font-size: 12px;" href="{$postUrl|escape:'htmlall':'UTF-8'}" title="{l s='Cancel' mod='ets_mailchimpsync'}"><i class="icon-random process-icon-cancel"></i> {l s='Cancel' mod='ets_mailchimpsync'}</a>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="content_list_mail">
    {if isset($content_mailing) && $content_mailing}{$content_mailing nofilter}{/if}
</div>

<script type="text/javascript">
    var id_export;
    var error_msg = '{l s='Request timed out' mod='ets_mailchimpsync'}';
    var warning_msg = '{l s='Process completed with warning: ' mod='ets_mailchimpsync'}';
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
