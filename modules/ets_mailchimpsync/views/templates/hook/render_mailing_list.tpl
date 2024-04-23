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

{if $list_filters}
    <div class="panel filter-list-tbl">
        <div class="panel-heading"><i class="icon-AdminCatalog"></i> {l s='Mailing lists' mod='ets_mailchimpsync'}</div>
        <div class="table-responsive-row clearfix">
            <table class="table configuration" cellspacing="0" cellpadding="0" style="width: 100%; margin-bottom:10px;">
                <thead>
                    <tr>
                        <th class="center" style="text-align: center; width: 70px;font-weight: bold;"><span class="title_block">{l s='List ID' mod='ets_mailchimpsync'}</span></th>
                        <th class="left"><span class="title_block" style="font-weight: bold;">{l s='Category' mod='ets_mailchimpsync'}</span></th>
                        <th class="left"><span class="title_block" style="font-weight: bold;">{l s='Product(s)' mod='ets_mailchimpsync'} </span></th>
                        <th class="center"><span class="title_block" style="font-weight: bold;">{l s='Spent (from - to)' mod='ets_mailchimpsync'}</span></th>
                        <th class="center"><span class="title_block" style="font-weight: bold;">{l s='Newsletter' mod='ets_mailchimpsync'}</span></th>
                        <th class="center"><span class="title_block" style="font-weight: bold;">{l s='Opt in' mod='ets_mailchimpsync'}</span></th>
                        <th class="left"><span class="title_block" style="font-weight: bold;">{l s='Currency' mod='ets_mailchimpsync'}</span></th>
                        <th class="left"><span class="title_block" style="font-weight: bold;">{l s='Country' mod='ets_mailchimpsync'}</span></th>
                        <th class="left"><span class="title_block" style="font-weight: bold;">{l s='Language' mod='ets_mailchimpsync'}</span></th>
                        <th class="center"><span class="title_block" style="font-weight: bold;">{l s='Mailchimp list' mod='ets_mailchimpsync'}</span></th>
                        <th class="center"><span class="title_block" style="font-weight: bold;">{l s='Sync' mod='ets_mailchimpsync'}</span></th>
                        <th class="center"><span class="title_block" style="font-weight: bold;">{l s='Action' mod='ets_mailchimpsync'}</span></th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$list_filters item='filter'}
                        <tr {if $id_export == $filter.id_export}style="background: #C7FFFF;"{/if}>
                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="center">{$filter.id_export|escape:'htmlall':'UTF-8'}</td>
                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="left">{if $filter.category_name}{$filter.category_name|escape:'htmlall':'UTF-8'}{else}{l s='--' mod='ets_mailchimpsync'}{/if}</td>
                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="left">{if $filter.list_name_product}{$filter.list_name_product|escape:'htmlall':'UTF-8'}{else}{l s='--' mod='ets_mailchimpsync'}{/if}</td>
                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="center">
                                {if $filter.spent_from!=0 || $filter.spent_to!=0}
                                     {if $filter.id_currency}
                                        {displayPrice price=$filter.spent_from currency=$filter.id_currency}
                                     {else}
                                        {(float)$filter.spent_from|escape:'htmlall':'UTF-8'}
                                     {/if} -
                                     {if !(float)$filter.spent_to}
                                        {l s='Any' mod='ets_mailchimpsync'}
                                     {else}
                                         {if $filter.id_currency}
                                            {displayPrice price= $filter.spent_to currency=$filter.id_currency}
                                         {else}
                                            {(float)$filter.spent_to|escape:'htmlall':'UTF-8'}
                                         {/if}
                                     {/if}
                                {else}
                                    {l s='--' mod='ets_mailchimpsync'}
                                {/if}
                            </td>
                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="center">{if $filter.newsletter==1}{l s='Yes' mod='ets_mailchimpsync'}{elseif $filter.newsletter==0}{l s='No' mod='ets_mailchimpsync'}{else}{l s='Both' mod='ets_mailchimpsync'}{/if}</td>
                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="center">{if $filter.optin==1}{l s='Yes' mod='ets_mailchimpsync'}{elseif $filter.optin==0}{l s='No' mod='ets_mailchimpsync'}{else}{l s='Both' mod='ets_mailchimpsync'}{/if}</td>
                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="left">{if $filter.id_currency}{$filter.iso_code|escape:'htmlall':'UTF-8'}{else}{l s='--' mod='ets_mailchimpsync'}{/if}</td>
                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="left">{if $filter.country}{$filter.country|escape:'htmlall':'UTF-8'}{else}{l s='--' mod='ets_mailchimpsync'}{/if}</td>
                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="left">{if $filter.id_lang}{$filter.name_lang|escape:'htmlall':'UTF-8'}{else}{l s='--' mod='ets_mailchimpsync'}{/if}</td>
                                {if $filter.idmailchimp}
                                    {assign var="flag" value=true}
                                    {foreach from=$retvals item='retval'}
                                        {if ($filter.idmailchimp == $retval.id)}
                                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="center">{$retval.name|escape:'htmlall':'UTF-8'}</td>
                                            {assign var="flag" value=false}
                                            <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="center"><span title="{l s='Synchronize with Mailchimp list' mod='ets_mailchimpsync'}" class="btn btn-default sync sync-{$filter.id_export|escape:'htmlall':'UTF-8'}" rel="{$filter.id_export|escape:'htmlall':'UTF-8'}"><i class="icon-random process-icon-random"></i> {l s='SYNC' mod='ets_mailchimpsync'}</span></td>
                                        {/if}
                                    {/foreach}
                                    {if ($flag)}
                                        <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="center">
                                            {l s='List not found' mod='ets_mailchimpsync'}
                                        </td>
                                        <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="center">
                                            {l s='--' mod='ets_mailchimpsync'}
                                        </td>
                                    {/if}
                                {else}
                                    <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="center">
                                        {l s='--' mod='ets_mailchimpsync'}
                                    </td>
                                    <td {if $id_export == $filter.id_export}style="background: none;"{/if} class="center">
                                        {l s='--' mod='ets_mailchimpsync'}
                                    </td>
                                {/if}
                            </td>
                            <td {if $id_export == $filter.id_export}style="background: none; padding: 10px;"{else}style="padding: 10px;"{/if} class="center">
                                <div class="wrapper_btn_action">
                                    <a class="btn btn-default" href="{$postUrl|escape:'htmlall':'UTF-8'}&export_list=true&id_export={$filter.id_export|escape:'htmlall':'UTF-8'}"><span class="icon_svg_export"><svg aria-hidden="true" data-prefix="fas" data-icon="download" class="svg-inline--fa fa-download fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg></span> {l s='Export to CSV' mod='ets_mailchimpsync'}</a>
                                    <div class="box_btn_edit_delete">
                                        {if $id_export != $filter.id_export}<a href="{$postUrl|escape:'htmlall':'UTF-8'}&id_export={$filter.id_export|escape:'htmlall':'UTF-8'}&editFilter=yes" class="btn btn-default"><i class="icon-pencil"></i> {l s='Edit' mod='ets_mailchimpsync'}</a>{/if}
                                        <a style="opacity: 0.6;" class="btn btn-default" title="{l s='Delete this list' mod='ets_mailchimpsync'}" href="{$filter.link_del|escape:'htmlall':'UTF-8'}" onclick="return confirm('{l s='Do you want to delete this list? This action does not delete the list on your Mailchimp account' mod='ets_mailchimpsync'}');" ><i class="icon-trash"></i> {l s='Delete' mod='ets_mailchimpsync'}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
        {if isset($paggination) && $paggination}
            <div class="ets_mailchim_pagg">
                {$paggination nofilter}
            </div>
        {/if}
    </div>
{/if}