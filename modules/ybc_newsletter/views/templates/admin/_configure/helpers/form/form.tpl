{*
* 2007-2017 PrestaShop
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
{block name="field"}
    {$smarty.block.parent}
	{if $input.type == 'file' &&  isset($input.display_img) && $input.display_img}
        <label class="control-label col-lg-3" style="font-style: italic;">{l s='Uploaded image: ' mod='ybc_newsletter'}</label>
        <div class="col-lg-9">
    		<a  class="ybc_fancy" href="{$input.display_img|escape:'html':'UTF-8'}"><img title="{l s='Click to see full size image' mod='ybc_newsletter'}" style="display: inline-block; max-width: 200px;" src="{$input.display_img|escape:'html':'UTF-8'}" /></a>
            {if isset($input.img_del_link) && $input.img_del_link && !(isset($input.required) && $input.required)}
                <a onclick="return confirm('{l s='Do you want to delete this image?' mod='ybc_newsletter'}');" style="display: inline-block; text-decoration: none!important;" href="{$input.img_del_link|escape:'html':'UTF-8'}"><span style="color: #666"><i style="font-size: 20px;" class="process-icon-delete"></i></span></a>
            {/if}
        </div>
    {/if}
    {if $input.name == 'YBC_NEWSLETTER_TEMPLATE'}
        <div class="col-lg-3"></div>
        <div class="col-lg-9">
            <div class="ybc-templates" style="cursor: pointer;text-decoration: underline; font-style: italic; margin-top: 4px; color: #00aff0;">
                {l s='Preview this template' mod='ybc_newsletter'}
            </div>
        </div>
    {/if}
{/block}
{block name="input_row"}
    {if $input.name=='YBC_NEWSLETTER_DISPLAY_POPUP'}
        <div class="ybc_newsletter_form_tab_content">
            <div class="ybc_newsletter_form_tab_div">
                <ul class="ybc_newsletter_form_tab">
                    <li class="ybc_newsletter_general active" data-tab="general">{l s='General' mod='ybc_newsletter'}</li>
                    <li class="ybc_newsletter_time_option" data-tab="time_option">{l s='Conditions' mod='ybc_newsletter'}</li>
                    <li class="ybc_newsletter_design" data-tab="design">{l s='Design' mod='ybc_newsletter'}</li>
                    <li class="ybc_newsletter_email" data-tab="email">{l s='Email' mod='ybc_newsletter'}</li>
                    <li class="ybc_newsletter_socials" data-tab="socials">{l s='Socials' mod='ybc_newsletter'}</li>
                    <li class="ybc_newsletter_misc" data-tab="misc">{l s='MISC' mod='ybc_newsletter'}</li>
                </ul>
            </div>
            <div class="ybc_newsletter_form">
                <div class="ybc_newsletter_form_general active">
                    {/if}
                    {if $input.name=='YBC_NEWSLETTER_TIME_IN'}
                        </div><div class="ybc_newsletter_form_time_option">
                    {/if}
                    {if $input.name=='YBC_NEWSLETTER_TEMPLATE'}
                        </div><div class="ybc_newsletter_form_design">
                    {/if}  
                    {if $input.name=='YBC_REQUIRE_VERIFICATION'}
                        </div><div class="ybc_newsletter_form_email">
                    {/if}  
                    {if $input.name=='BLOCKSOCIAL_FACEBOOK'}
                        </div><div class="ybc_newsletter_form_socials">
                    {/if}
                    {if $input.name=='YBC_NEWSLETTER_PAGE[]'}
                        </div><div class="ybc_newsletter_form_misc">
                    {/if}  
                    <div class="form-group-wrapper row_{strtolower($input.name)|escape:'html':'UTF-8'}">{$smarty.block.parent}</div>
                    {if $input.name=='YBC_NEWSLETTER_PAGE[]'}
                </div>
            </div>
        </div>
    {/if}
{/block}
{block name="footer"}
    {capture name='form_submit_btn'}{counter name='form_submit_btn'}{/capture}
	{if isset($fieldset['form']['submit']) || isset($fieldset['form']['buttons'])}
		<div class="panel-footer">
            <script type="text/javascript">
                $(document).ready(function(){
                    if($('.ybc_fancy').length > 0)
                    {
                        $('.ybc_fancy').fancybox();
                    }
                });
            </script>
            {if isset($export_link) && $export_link}
                <a class="btn btn-default" href="{$export_link|escape:'html':'UTF-8'}"><i class="process-icon-export"></i>{l s='Export to .csv file' mod='ybc_newsletter'}</a>
            {/if}
            {if isset($fieldset['form']['submit']) && !empty($fieldset['form']['submit'])}
			<button type="submit" value="1"	id="{if isset($fieldset['form']['submit']['id'])}{$fieldset['form']['submit']['id']|escape:'html':'UTF-8'}{else}{$table|escape:'html':'UTF-8'}_form_submit_btn{/if}{if $smarty.capture.form_submit_btn > 1}_{($smarty.capture.form_submit_btn - 1)|intval}{/if}" name="{if isset($fieldset['form']['submit']['name'])}{$fieldset['form']['submit']['name']|escape:'html':'UTF-8'}{else}{$submit_action|escape:'html':'UTF-8'}{/if}{if isset($fieldset['form']['submit']['stay']) && $fieldset['form']['submit']['stay']}AndStay{/if}" class="{if isset($fieldset['form']['submit']['class'])}{$fieldset['form']['submit']['class']|escape:'html':'UTF-8'}{else}btn btn-default pull-right{/if}">
				<i class="{if isset($fieldset['form']['submit']['icon'])}{$fieldset['form']['submit']['icon']|escape:'html':'UTF-8'}{else}process-icon-save{/if}"></i> {$fieldset['form']['submit']['title']|escape:'html':'UTF-8'}
			</button>
			{/if}
            
		</div>
	{/if}
{/block}
