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
<h3>{l s='Browsers' mod='ets_trackingcustomer'}</h3>
<table class="table">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>{l s='Browser' mod='ets_trackingcustomer'}</th>
            <th class="text-center">{l s='Times' mod='ets_trackingcustomer'}</th>
        </tr>
    </thead>
    <tbody>
        {if $browsers}
            {foreach from=$browsers key='key' item='browser'}
                <tr>
                    {assign var='stt' value=$key+1}
                    <td>{$stt|intval}</td>
                    <td>
                        <img class="icon-browser {$browser.browser|strtolower|escape:'html':'UTF-8'}" src="../modules/ets_trackingcustomer/views/img/{str_replace(' ','_',$browser.browser)|strtolower|escape:'html':'UTF-8'}.png" />
                        {$browser.browser|escape:'html':'UTF-8'}
                    </td>
                    <td class="text-center">{$browser.total_view|intval}</td>
                </tr>
            {/foreach}
        {else}
            <tr>
                <td colspan="100%">{l s='No data available' mod='ets_trackingcustomer'}</td>
            </tr>
        {/if}
    </tbody>
</table>
<h3>{l s='Countries' mod='ets_trackingcustomer'}</h3>
<table class="table">
    <thead>
        <tr>
            <th>{l s='ID' mod='ets_trackingcustomer'}</th>
            <th>{l s='Country' mod='ets_trackingcustomer'}</th>
            <th class="text-center">{l s='Times' mod='ets_trackingcustomer'}</th>
        </tr>
    </thead>
    <tbody>
        {if $countries}
            {foreach from=$countries key='key' item='country'}
                <tr>
                    <td>{$country.id_country|intval}</td>
                    <td>
                        {$country.name|escape:'html':'UTF-8'}
                    </td>
                    <td class="text-center">{$country.total_view|intval}</td>
                </tr>
            {/foreach}
        {else}
            <tr>
                <td colspan="100%">{l s='No data available' mod='ets_trackingcustomer'}</td>
            </tr>
        {/if}
    </tbody>
</table>
<h3>{l s='Languages' mod='ets_trackingcustomer'}</h3>
<table class="table">
    <thead>
        <tr>
            <th>{l s='ID' mod='ets_trackingcustomer'}</th>
            <th>{l s='Language' mod='ets_trackingcustomer'}</th>
            <th class="text-center">{l s='Times' mod='ets_trackingcustomer'}</th>
        </tr>
    </thead>
    <tbody>
        {if $languages}
            {foreach from=$languages key='key' item='language'}
                <tr>
                    <td>{$language.id_lang|intval}</td>
                    <td>
                        <img src="{$link->getMediaLink("`$smarty.const.__PS_BASE_URI__`img/l/`$language.id_lang|escape:'htmlall':'UTF-8'`")}.jpg" /> {$language.name|escape:'html':'UTF-8'}
                    </td>
                    <td class="text-center">{$language.total_view|intval}</td>
                </tr>
            {/foreach}
        {else}
            <tr>
                <td colspan="100%">{l s='No data available' mod='ets_trackingcustomer'}</td>
            </tr>
        {/if}
    </tbody>
</table>
