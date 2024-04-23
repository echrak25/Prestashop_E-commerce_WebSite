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
{if !$ajax}
<table class="table tc-top-actions">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>{l s='Action' mod='ets_trackingcustomer'}</th>
            <th class="text-center">{l s='Executed' mod='ets_trackingcustomer'}</th>
        </tr>
    </thead>
    <tbody>
{/if}
        {if $top_actions}
            {assign var='stt' value=($current_page-1)*10+1}
            {foreach from=$top_actions key='key' item='action'}
                <tr>
                    <td>{$stt|intval}</td>
                    <td>{$action.action|escape:'html':'UTF-8'}</td>
                    <td class="text-center">{$action.total_view|intval}</td>
                </tr>
                {assign var='stt' value=$stt+1}
            {/foreach}
            {if $load_more}
                <tr>
                    <td colspan="100%">
                        <a class="tbn-load-more-top-action" href="#" data-filter='{$filter nofilter}' data-page="{$page_next|intval}">{l s='Load more' mod='ets_trackingcustomer'}</a>
                    </td>
                </tr>
            {/if}
        {else}
            <tr>
                <td colspan="100%">{l s='No data available' mod='ets_trackingcustomer'}</td>
            </tr>
        {/if}
{if !$ajax}
    </tbody>
</table>
{/if}