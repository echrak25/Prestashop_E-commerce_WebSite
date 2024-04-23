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
{if $setting_updated}
    <div class="conf">{l s='Setting updated' mod='ybc_productimagehover'}</div>
{/if}
<form class="defaultForm form-horizontal" enctype="multipart/form-data" method="post" action="{$postUrl|escape:'html':'UTF-8'}">
    <fieldset>
        <legend><img src="../img/t/AdminTools.gif"/>{l s="Setting"}</legend>
        <table>
            <tbody>
                <tr>
                    <td><label class="control-label" for="transition-effect">{l s='Transition effect' mod='ybc_productimagehover'}</label></td>
                    <td>
                          <select id="transition-effect" class="fixed-width-xl" name="YBC_PI_TRANSITION_EFFECT">
                            {foreach from=$effects item='effect'}
                                <option {if $effect.id == $YBC_PI_TRANSITION_EFFECT}selected="selected"{/if} value="{$effect.id|escape:'html':'UTF-8'}">{$effect.name|escape:'html':'UTF-8'}</option>
                            {/foreach}
                        </select>                  
                    </td>
                </tr>
                <tr>
                    <td><label class="control-label col-lg-3" for="those-pages">{l s='Apply transition effect on those pages' mod='ybc_productimagehover'}</label></td>
                    <td>
                        <select id="those-pages" class="fixed-width-xl" name="YBC_PI_THOSE_PAGES[]" multiple size="6">
                            {foreach from=$those_pages item='page'}
                                <option {if in_array('allpage', $YBC_PI_THOSE_PAGES) || in_array($page.id, $YBC_PI_THOSE_PAGES)}selected="selected"{/if} value="{$page.id|escape:'html':'UTF-8'}">{$page.name|escape:'html':'UTF-8'}</option>
                            {/foreach}
                        </select>                 
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button class="btn btn-default pull-right" name="submitUpdate" id="module_form_submit_btn" value="1" type="submit">
                		  <i class="process-icon-save"></i> {l s='Update settings' mod='ybc_productimagehover'}
                	    </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</form>
<div class="clear"></div>