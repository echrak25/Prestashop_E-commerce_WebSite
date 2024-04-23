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
<div class="customer-sessions-row">
    <h3 class="session-header">
        {l s='Session' mod='ets_trackingcustomer'} {$session.id_ets_tc_session|intval}{if !isset($multi_session) && isset($customer) && $customer} - <span class="customer_info"><a href="{$link_customer|escape:'html':'UTF-8'}">{$customer->firstname|escape:'html':'UTF-8'}&nbsp;{$customer->lastname|escape:'html':'UTF-8'}</a> ({$customer->email|escape:'html':'UTF-8'}){if $country_name} - {$country_name|escape:'html':'UTF-8'}{/if}
            {if $is_verified}
                <span class="list-action-enable action-enabled verified_customer">
                    <i class="ets_icon_svg success_cl">
                        <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
                    </i> {l s='Verified customer' mod='ets_trackingcustomer'}
                </span>
            {/if}
            {/if}
        </span>
        {if isset($multi_session) && $multi_session}
            <span class="open_close_session {if isset($session.open) && $session.open}session_open{else}session_close{/if}" title="{if isset($session.open) && $session.open}{l s='Close' mod='ets_trackingcustomer'}{else}{l s='Open' mod='ets_trackingcustomer'}{/if}" data-title-close="{l s='Close' mod='ets_trackingcustomer' js=1}" data-title-open="{l s='Open' mod='ets_trackingcustomer' js=1}" >{l s='Open/Close' mod='ets_trackingcustomer'}</span>
        {else}
            {assign var ='other_session' value=Ets_tc_session::checkCustomerMultiSession($session.id_ets_tc_session,$session.id_customer)}
            {if $other_session}
                <a class="other_session" href="{$link->getAdminLink('AdminTrackingCustomerSession')|escape:'html':'UTF-8'}&current_tab=customer_session&id_customer={$session.id_customer|intval}">
                    <i class="ets_icon">
                        <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1664 960q-152-236-381-353 61 104 61 225 0 185-131.5 316.5t-316.5 131.5-316.5-131.5-131.5-316.5q0-121 61-225-229 117-381 353 133 205 333.5 326.5t434.5 121.5 434.5-121.5 333.5-326.5zm-720-384q0-20-14-34t-34-14q-125 0-214.5 89.5t-89.5 214.5q0 20 14 34t34 14 34-14 14-34q0-86 61-147t147-61q20 0 34-14t14-34zm848 384q0 34-20 69-140 230-376.5 368.5t-499.5 138.5-499.5-139-376.5-368q-20-35-20-69t20-69q140-229 376.5-368t499.5-139 499.5 139 376.5 368q20 35 20 69z"/></svg>
                    </i>
                    {l s='View all customer sessions' mod='ets_trackingcustomer'} ({$other_session|intval})
                </a>
            {/if}
        {/if}
    </h3>
    <div class="session-body" {if !isset($session.open) && isset($multi_session) && $multi_session} style="display:none"{/if}>
        <div class="row">
            <div class="col">
                 <div class="card cart-info">
                    <h3 class="card-header">{l s='Info' mod='ets_trackingcustomer'}</h3>
                    <div class="card-body">
                        <ul>
                            <li>
                                <span class="title">{l s='Source site' mod='ets_trackingcustomer'}</span>
                                <span class="cotent">
                                    {if $session.source}
                                        {$session.source|escape:'html':'UTF-8'}
                                    {else}
                                        --
                                    {/if}
                                </span>
                            </li>
                            <li>
                                <span class="title">{l s='Medium' mod='ets_trackingcustomer'}</span>
                                <span class="cotent">
                                    {if $session.utm_medium}
                                        {$session.utm_medium|escape:'html':'UTF-8'}
                                    {else}
                                        --
                                    {/if}
                                </span>
                            </li>
                            <li>
                                <span class="title">{l s='Total viewed pages' mod='ets_trackingcustomer'}</span>
                                <span class="cotent">
                                    {if $session.total_page_visit}
                                        {$session.total_page_visit|intval}
                                    {else}
                                        --
                                    {/if}
                                </span>
                            </li>
                            <li>
                                <span class="title">{l s='Total actions' mod='ets_trackingcustomer'}</span>
                                <span class="cotent">
                                    {if isset($session.total_action) && $session.total_action}
                                        {$session.total_action|escape:'html':'UTF-8'}
                                    {else}
                                        --
                                    {/if}
                                </span>
                            </li>
                            <li>
                                <span class="title">{l s='Duration' mod='ets_trackingcustomer'}</span>
                                <span class="cotent">
                                    {if $session.duration}
                                        {$session.duration nofilter}
                                    {else}
                                        --
                                    {/if}
                                </span>
                            </li>
                            <li>
                                <span class="title">{l s='Browser' mod='ets_trackingcustomer'}</span>
                                <span class="cotent">
                                    {if $session.browser}
                                        <img class="icon-browser {$session.browser|strtolower|escape:'html':'UTF-8'}" src="../modules/ets_trackingcustomer/views/img/{str_replace(' ','_',$session.browser)|strtolower|escape:'html':'UTF-8'}.png" />
                                        {$session.browser|escape:'html':'UTF-8'}
                                    {else}
                                        --
                                    {/if}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                {assign var='customer_session' value= Ets_tc_session::checkCreateAccount($session.id_ets_tc_session) }
                {assign var='count_order_session' value= Ets_tc_session::getCountOrderInSession($session.id_ets_tc_session) }
                {assign var ='add_ticket' value =  Ets_tc_session::checkAction($session.id_ets_tc_session,'add_ticket')}
                {assign var ='add_ticket_hd' value = Ets_tc_session::checkAction($session.id_ets_tc_session,'add_ticket_hd')}
                {assign var ='add_comment_blog' value= Ets_tc_session::checkAction($session.id_ets_tc_session,'add_comment_blog')}
                {assign var='add_comment_product' value =Ets_tc_session::checkAction($session.id_ets_tc_session,'add_comment_product')}
                {assign var ='download_product' value= Ets_tc_session::checkAction($session.id_ets_tc_session,'download_product')}
                {assign var ='view_demo' value= Ets_tc_session::checkAction($session.id_ets_tc_session,'view_demo')}
                {if $customer_session || $count_order_session || $add_ticket || $add_comment_blog || $add_comment_product || $download_product || $view_demo}
                <div class="card cart-result">
                    <h3 class="card-header">{l s='Result' mod='ets_trackingcustomer'}</h3>
                    <div class="card-body">
                        <ul>
                            {if $customer_session}
                                <li class="customer_session">
                                    <h4>
                                        <svg width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>
                                        {l s='Register new account' mod='ets_trackingcustomer'}</h4>
                                    <span><a href="{Ets_tc_session::getLinkCustomerAdmin($customer_session->id)|escape:'html':'UTF-8'}">{$customer_session->firstname|escape:'html':'UTF-8'}&nbsp;{$customer_session->lastname|escape:'html':'UTF-8'} ({$customer_session->email|escape:'html':'UTF-8'})</a></span>
                                </li>
                            {/if}
                            {if $count_order_session}
                                <li class="order_session">
                                    <h4>
                                        <svg width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>
                                        {l s='Place order' mod='ets_trackingcustomer'}</h4>
                                    {assign var = 'order_products' value=Ets_tc_session::getListOrderProducts($session.id_ets_tc_session)}
                                    <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{l s='Order reference' mod='ets_trackingcustomer'}</th>
                                                    <th>{l s='Image' mod='ets_trackingcustomer'}</th>
                                                    <th>{l s='Product' mod='ets_trackingcustomer'}</th>
                                                    <th>{l s='Price' mod='ets_trackingcustomer'}</th>
                                                    <th class="text-center">{l s='Quantity' mod='ets_trackingcustomer'}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach from=$order_products item='order_product'}
                                                     <tr>
                                                        <td><a href="{$order_product.link_order|escape:'html':'UTF-8'}">{$order_product.reference|escape:'html':'UTF-8'}</a></td>
                                                        <td>
                                                            <a href="{$order_product.link_product|escape:'html':'UTF-8'}" target="_blank">
                                                                <img src="{$order_product.image|escape:'html':'UTF-8'}" alt="{$order_product.name|escape:'html':'UTF-8'}" />
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{$order_product.link_product|escape:'html':'UTF-8'}" target="_blank">{$order_product.name|escape:'html':'UTF-8'}</a>
                                                            {if isset($order_product.shop_name) && $order_product.shop_name}
                                                                <br />{l s='Shop to install' mod='ets_trackingcustomer'}: {$order_product.shop_name|escape:'html':'UTF-8'}
                                                            {/if}
                                                        </td>
                                                        <td>{$order_product.product_price|escape:'html':'UTF-8'}</td>
                                                        <td class="text-center">{$order_product.product_quantity|escape:'html':'UTF-8'}</td>
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    </li>
                                {/if}
                                {if $add_ticket}
                                    <h4>
                                        <svg width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>
                                        {l s='Add ticket' mod='ets_trackingcustomer'}
                                    </h4>
                                    {assign var='tickets' value = Ets_tc_session::getListTicketsBySession($session.id_ets_tc_session)}
                                    {if $tickets}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{l s='ID' mod='ets_trackingcustomer'}</th>
                                                    <th>{l s='Product' mod='ets_trackingcustomer'}</th>
                                                    <th class="text-center">{l s='Replied' mod='ets_trackingcustomer'}</th>
                                                    <th class="text-center">{l s='Status' mod='ets_trackingcustomer'}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach from=$tickets item='ticket'}
                                                    <tr>
                                                        <td><a href="{$link->getAdminLink('AdminLiveChatTickets')|escape:'html':'UTF-8'}&viewticket&id_ticket={$ticket.id_ticket|intval}">{$ticket.id_ticket|intval}</a></td>
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
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    {/if}
                                {/if}
                                {if $add_ticket_hd}
                                    <h4>
                                        <svg width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>
                                        {l s='Add ticket (helpdesk system)' mod='ets_trackingcustomer'}
                                    </h4>
                                    {assign var='hd_tickets' value = Ets_tc_session::getListHDTicketsBySession($session.id_ets_tc_session)}
                                    {if $hd_tickets}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{l s='ID' mod='ets_trackingcustomer'}</th>
                                                    <th>{l s='Product' mod='ets_trackingcustomer'}</th>
                                                    <th class="text-center">{l s='Replied' mod='ets_trackingcustomer'}</th>
                                                    <th class="text-center">{l s='Status' mod='ets_trackingcustomer'}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach from=$hd_tickets item='ticket'}
                                                    <tr>
                                                        <td><a href="{$link->getAdminLink('AdminEtsHDTickets')|escape:'html':'UTF-8'}&id_ets_hd_ticket={$ticket.id_ticket|intval}">{$ticket.id_ticket|intval}</a></td>
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
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    {/if}
                                {/if}
                                {if $add_comment_product}
                                    <h4>
                                        <svg width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>
                                        {l s='Write a product comment' mod='ets_trackingcustomer'}
                                    </h4>
                                    {assign var='comment_products' value= Ets_tc_session::getListComemntProducts($session.id_ets_tc_session)}
                                    {if $comment_products}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{l s='Image' mod='ets_trackingcustomer'}</th>
                                                    <th>{l s='Product' mod='ets_trackingcustomer'}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach from= $comment_products item='product'}
                                                     <tr>
                                                        <td>
                                                            <a href="{$product.link_product|escape:'html':'UTF-8'}" target="_blank"><img src="{$product.image|escape:'html':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}" /></a>
                                                        </td>
                                                        <td>
                                                            <a href="{$product.link_product|escape:'html':'UTF-8'}" target="_blank">
                                                                {$product.name|escape:'html':'UTF-8'}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    {/if}
                                {/if}
                                {if $add_comment_blog}
                                    <h4>
                                        <svg width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>
                                        {l s='Write a blog post comment' mod='ets_trackingcustomer'}
                                    </h4>
                                    {assign var='comment_posts' value= Ets_tc_session::getListCommentPosts($session.id_ets_tc_session)}
                                    {if $comment_posts}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{l s='ID' mod='ets_trackingcustomer'}</th>
                                                    <th>{l s='Blog post' mod='ets_trackingcustomer'}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach from= $comment_posts item='post'}
                                                     <tr>
                                                        <td>
                                                            {$post.id_post|intval}
                                                        </td>
                                                        <td>
                                                            <a href="{$post.link|escape:'html':'UTF-8'}" target="_blank">
                                                                {$post.title|escape:'html':'UTF-8'}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    {/if}
                                {/if}
                                {if $download_product}
                                    <h4>
                                        <svg width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>
                                        {l s='Download free module' mod='ets_trackingcustomer'}
                                    </h4>
                                    {assign var = 'download_products' value=Ets_tc_session::getListDownloadProducts($session.id_ets_tc_session)}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{l s='Image' mod='ets_trackingcustomer'}</th>
                                                <th>{l s='Product' mod='ets_trackingcustomer'}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach from= $download_products item='download_product'}
                                                 <tr>
                                                    <td>
                                                        <a href="{$download_product.link_product|escape:'html':'UTF-8'}" target="_blank">
                                                            <img src="{$download_product.image|escape:'html':'UTF-8'}" alt="{$download_product.name|escape:'html':'UTF-8'}" />
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{$download_product.link_product|escape:'html':'UTF-8'}" target="_blank">{$download_product.name|escape:'html':'UTF-8'}</a>
                                                    </td>
                                                </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                {/if}
                                {if $view_demo}
                                    <h4>
                                        <svg width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>
                                        {l s='View demo' mod='ets_trackingcustomer'}
                                    </h4>
                                    {assign var = 'view_products' value=Ets_tc_session::getListViewProducts($session.id_ets_tc_session)}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{l s='Image' mod='ets_trackingcustomer'}</th>
                                                <th>{l s='Product' mod='ets_trackingcustomer'}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach from= $view_products item='view_product'}
                                                 <tr>
                                                    <td>
                                                        <a href="{$view_product.link_product|escape:'html':'UTF-8'}">
                                                            <img src="{$view_product.image|escape:'html':'UTF-8'}" alt="{$view_product.name|escape:'html':'UTF-8'}" />
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{$view_product.link_product|escape:'html':'UTF-8'}" target="_blank">{$view_product.name|escape:'html':'UTF-8'}</a>
                                                    </td>
                                                </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                {/if}
                            </ul>
                        </div>
                    </div>
                {/if}
            </div>
            <div class="col ets_tc_box-right">
                <div class="card cart-result">
                    <h3 class="card-header">{l s='Activities' mod='ets_trackingcustomer'}</h3>
                    <div class="card-body">
                        <ul>
                            <li class="start"><span class="start_title">{l s='Start' mod='ets_trackingcustomer'}</span> <span class="date"><span class="date_add">{dateFormat date = $session.date_add full=1}</span></span></li>
                            {if $session.actions}
                                {assign var='count_action' value=1}
                                {foreach from = $session.actions item='action'}
                                    <li class="{if $action.action=='visit_page'}visit_page{else}actions_fun{/if}">
                                        {if $action.action=='visit_page'}
                                            <div class="visit_page_content">
                                                <i class="fa fa-eye"></i>
                                                <a class="visit_page_link" href="{$action.page_url|escape:'html':'UTF-8'}" target="_blank">
                                                    <img src="{$link->getMediaLink("`$smarty.const.__PS_BASE_URI__`img/l/`$action.id_lang|escape:'htmlall':'UTF-8'`")}.jpg" />{if isset($action.iso_code) && $action.iso_code}|{$action.iso_code|escape:'html':'UTF-8'}{/if}
                                                    {$action.page|escape:'html':'UTF-8'}{if isset($action.title) && $action.title} - {$action.title|escape:'html':'UTF-8'}{/if}{if isset($action.search) && $action.search} ({$action.search|escape:'html':'UTF-8'}){/if}
                                                    <i title ="{l s='View page' mod='ets_trackingcustomer'}"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" class="svg-inline--fa fa-external-link-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20px" height="20px"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z"></path></svg></i>
                                                </a>
                                            </div>
                                            <div class="date">
                                                <span class="date_content">
                                                    {if isset($action.duration) && $action.duration}{$action.duration nofilter}{else}<span>&nbsp;</span>{/if} <span class="date_add">{$action.date_add_text|escape:'html':'UTF-8'}</span>
                                                </span>
                                            </div>
                                            {assign var='count_action' value=1}
                                        {else}
                                            <div class="visit_page_content">
                                            {if $action.action=="add_cart"}
                                                <i class="fa fa-cart-plus"></i>
                                            {elseif $action.action=="add_ticket_hd" || $action.action=='add_ticket'}
                                                <i class="fa fa-ticket"></i>
                                            {elseif $action.action=="add_comment_blog"}
                                                <i class="fa fa-commenting-o"></i>
                                            {elseif $action.action=='add_comment_product'}
                                                <i class="fa fa-comments-o"></i>    
                                            {elseif $action.action=="add_question_comment"}
                                                <i class="fa fa-question-circle-o"></i>
                                            {elseif $action.action=="create" || $action.action=='create_guest'}
                                                <i class="fa fa-user-plus"></i>
                                            {elseif $action.action=="create_order" || $action.action=='create_order_guest'}
                                                <i class="fa fa-shopping-cart"></i>
                                            {elseif $action.action=="download_attachment" || $action.action=="download_document"}
                                                <i class="fa fa-download"></i>
                                            {elseif $action.action=="download_product" || $action.action=="download_module"}
                                                <i class="fa fa-cloud-download"></i>
                                            {elseif $action.action=="delete_product"}
                                                <i class="fa fa-trash-o"></i>
                                            {elseif $action.action=="reduce_quantity"}
                                                <i class="fa fa-cart-arrow-down"></i>
                                            {elseif $action.action=="login"}
                                                <i class="fa fa-sign-in"></i>
                                            {elseif $action.action=="logout"}
                                                <i class="fa fa-sign-out"></i>
                                            {elseif $action.action=="view_demo"}
                                                <i class="fa fa-external-link-square"></i>
                                            {elseif $action.action=="view_image"}
                                                <i class="fa fa-picture-o"></i>
                                            {elseif $action.action=="add_discount"}
                                                <i class="fa fa-percent"></i>
                                            {/if}
                                             {$action.action_text|escape:'html':'UTF-8'}
                                             {assign var='count_action' value=$count_action+1}
                                             {if ($action.action=="delete_product" || $action.action=='add_cart' || $action.action=='reduce_quantity' || $action.action=='download_product' || $action.action=='download_module') && isset($action.id_product) && $action.id_product}
                                             - <a href="{$action.link_product|escape:'html':'UTF-8'}" target="_blank">{$action.product_name|escape:'html':'UTF-8'}</a>
                                             {/if}
                                             {if ($action.action=='add_cart' || $action.action=='reduce_quantity') && $action.id_product}
                                                    <span class="btn-view-cart" title="{l s='View action' mod='ets_trackingcustomer'}">
                                                        {if $action.action=='add_cart' && $action.id_product}
                                                            <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M704 1536q0 52-38 90t-90 38-90-38-38-90 38-90 90-38 90 38 38 90zm896 0q0 52-38 90t-90 38-90-38-38-90 38-90 90-38 90 38 38 90zm128-1088v512q0 24-16.5 42.5t-40.5 21.5l-1044 122q13 60 13 70 0 16-24 64h920q26 0 45 19t19 45-19 45-45 19h-1024q-26 0-45-19t-19-45q0-11 8-31.5t16-36 21.5-40 15.5-29.5l-177-823h-204q-26 0-45-19t-19-45 19-45 45-19h256q16 0 28.5 6.5t19.5 15.5 13 24.5 8 26 5.5 29.5 4.5 26h1201q26 0 45 19t19 45z"/></svg>
                                                        {else}
                                                            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="14px" height="14px"><path fill="currentColor" d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"></path></svg>
                                                        {/if}
                                                    </span>
                                                    <div class="ets_action_view_popup">
                                                        <div class="popup_content table">
                                                            <div class="popup_content_tablecell">
                                                                <div class="popup_content_wrap" style="position: relative">
                                                                    <span class="close_popup" title="{l s='Close' mod='ets_trackingcustomer'}">+</span>
                                                                    <div id="block-view-action">
                                                                        <div class="panel">
                                                                            <div class="panel-heading">
                                                                                {l s='View action' mod='ets_trackingcustomer'}: {$action.action_text|escape:'html':'UTF-8'}
                                                                            </div>
                                                                            <div class="form-wrapper">
                                                                                <div class="form-group">
                                                                                    <table class="table">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>{l s='Image' mod='ets_trackingcustomer'}</th>
                                                                                                <th>{l s='Product' mod='ets_trackingcustomer'}</th>
                                                                                                <th>{l s='Price' mod='ets_trackingcustomer'}</th>
                                                                                                <th class="text-center">{l s='Quantity' mod='ets_trackingcustomer'}</th>
                                                                                                <th>{l s='Total' mod='ets_trackingcustomer'}</th>
                                                                                                <th>{l s='Date' mod='ets_trackingcustomer'}</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td><a href="{$action.link_product|escape:'html':'UTF-8'}" target="_blank"><img src="{$action.image|escape:'html':'UTF-8'}" alt="{$action.product_name|escape:'html':'UTF-8'}"/></a></td>
                                                                                                <td><a href="{$action.link_product|escape:'html':'UTF-8'}" target="_blank">{$action.product_name|escape:'html':'UTF-8'}</a></td>
                                                                                                <td>{$action.price|escape:'html':'UTF-8'}</td>
                                                                                                <td class="text-center">{$action.quantity|intval}</td>
                                                                                                <td>{$action.total_price|escape:'html':'UTF-8'}</td>
                                                                                                <td>{dateFormat date=$action.date_add full=1}</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 {/if}
                                            </div>
                                            <div class="date">
                                                <span class="date_content">
                                                    <span>&nbsp;</span><span class="date_add">{$action.date_add_text|escape:'html':'UTF-8'}</span>
                                                </span>
                                            </div>
                                        {/if}
                                    </li>
                                {/foreach}
                            {/if}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{if !(isset($multi_session) && $multi_session)}
    <div class="footer_panel">
        <a class="btn btn-default backtolist" href="{$link->getAdminLink('AdminTrackingCustomerSession')|escape:'html':'UTF-8'}&current_tab=customer_session">
            <i class="icon-arrow-circle-left"></i>
            {l s='Back to list' mod='ets_trackingcustomer'}
        </a>
    </div>
{/if}