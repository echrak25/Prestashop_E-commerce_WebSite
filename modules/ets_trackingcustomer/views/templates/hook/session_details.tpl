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
<h3 class="session-title">{l s='Customer session' mod='ets_trackingcustomer'}:
    <span class="customer_info">
        {if $id_cart}
            {l s='Cart ID ' mod='ets_trackingcustomer'}{$id_cart|intval}
        {/if}
        {if $customer}
            {if $id_cart}-{/if}
            <a href="{$link_customer|escape:'html':'UTF-8'}">{$customer->firstname|escape:'html':'UTF-8'} {$customer->lastname|escape:'html':'UTF-8'}</a>
            ({$customer->email|escape:'html':'UTF-8'}){if $country_name} - {$country_name|escape:'html':'UTF-8'}{/if}
            {if $is_verified}
                <span class="list-action-enable action-enabled verified_customer">
                    <i class="ets_icon_svg success_cl">
                        <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
                    </i> {l s='Verified customer' mod='ets_trackingcustomer'}
                </span>
            {/if}
        {elseif !$id_cart}
            {l s='Guest' mod='ets_trackingcustomer'}-{$id_guest|intval}
        {/if}
    </span>
</h3>
<div class="sessions_list">
    {if $sessions}
        {foreach from=$sessions key='key' item='session'}
            {$session.detail nofilter}
        {/foreach}
    {else}
        <div class="customer-sessions-row no-data">
            <div class="alert alert-warning">{l s='No data found' mod='ets_trackingcustomer'}</div>
        </div>
    {/if}
</div>
<div class="footer_panel">
    <a class="btn btn-default backtolist" href="{$link->getAdminLink('AdminTrackingCustomerSession')|escape:'html':'UTF-8'}&current_tab=customer_session">
        <i class="icon-arrow-circle-left"></i>
        {l s='Back to list' mod='ets_trackingcustomer'}
    </a>
</div>