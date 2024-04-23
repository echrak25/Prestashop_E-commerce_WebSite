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
<div class="col ets_tc_col">
    <div class="card free_download-card">
        <h3 class="card-header">
            <i class="lh_16"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ticket-alt" class="svg-inline--fa fa-ticket-alt fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width:20px;height:20px;"><path fill="currentColor" d="M128 160h320v192H128V160zm400 96c0 26.51 21.49 48 48 48v96c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48v-96c26.51 0 48-21.49 48-48s-21.49-48-48-48v-96c0-26.51 21.49-48 48-48h480c26.51 0 48 21.49 48 48v96c-26.51 0-48 21.49-48 48zm-48-104c0-13.255-10.745-24-24-24H120c-13.255 0-24 10.745-24 24v208c0 13.255 10.745 24 24 24h336c13.255 0 24-10.745 24-24V152z"></path></svg></i>
            {l s='Tickets' mod='ets_trackingcustomer'}
            <span class="badge badge-primary rounded">{Count($tickets)|intval}</span>
        </h3>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>{l s='Ticket ID' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Product' mod='ets_trackingcustomer'}</th>
                        <th class="text-center">{l s='Replied' mod='ets_trackingcustomer'}</th>
                        <th class="text-center">{l s='Status' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Date' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Action' mod='ets_trackingcustomer'}</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from = $tickets item='ticket'}
                        <tr>
                            <td>{$ticket.id_ticket|intval}</td>
                            <td>
                                {if $ticket.id_product}
                                    <a href="{$link->getProductLink($ticket.id_product)|escape:'html':'UTF-8'}" target="_blank">
                                    {if $ticket.image}
                                        <img src="{$ticket.image|escape:'html':'UTF-8'}" />
                                    {else}
                                        {if $ticket.name}{$ticket.name|escape:'html':'UTF-8'}{else}--{/if}
                                    {/if}
                                    </a>
                                {else}
                                --
                                {/if}
                            </td>
                            <td class="ticket_replied text-center">
                                {if $ticket.replied}
                                    <i class="ets_svg_rep check_svg" title="{l s='Replied' mod='ets_trackingcustomer'}">
                                        <svg width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>
                                    </i>
                                {else}
                                    <i class="ets_svg_rep times_svg" title="{l s='Wait for reply' mod='ets_trackingcustomer'}">
                                        <svg width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1024 544v448q0 14-9 23t-23 9h-320q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h224v-352q0-14 9-23t23-9h64q14 0 23 9t9 23zm416 352q0-148-73-273t-198-198-273-73-273 73-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273zm224 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
                                    </i>
                                {/if}
                            </td>
                            <td class="ticket_status text-center"><span class="status_{$ticket.status|escape:'html':'UTF-8'}">{$ticket.status|escape:'html':'UTF-8'}</span></td>
                            <td>{dateFormat date=$ticket.date_add}</td>
                            <td>
                                <div class="btn-group-action">
                                    <div class="btn-group">
                                        <a class="btn tooltip-link dropdown-item" href="{$ticket.view_link|escape:'html':'UTF-8'}" data-toggle="pstooltip" data-placement="top" data-original-title="{l s='View' mod='ets_trackingcustomer'}">
                                            <i class="material-icons">zoom_in</i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>