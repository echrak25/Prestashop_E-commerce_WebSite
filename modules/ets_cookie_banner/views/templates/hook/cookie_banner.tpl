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
{if $ETS_CB_COOKIE_BANNER_CONTENT}
    <style>
        {$banner_css nofilter}
    </style>
    <div class="ets_cookie_banber_block {$ETS_CB_COOKIE_BANNER_POSITION|escape:'html':'UTF-8'}">
        <span class="close_cookie"></span>
        <div class="ets_cookie_banner_content">
            {$ETS_CB_COOKIE_BANNER_CONTENT nofilter}
        </div>
        <div class="ets_cookie_banner_footer">
            <a class="btn btn-primary full-right ets-cb-btn-ok" href="{$link_submit|escape:'html':'UTF-8'}" >{if $ETS_CB_COOKIE_BUTTON_LABEL}{$ETS_CB_COOKIE_BUTTON_LABEL|escape:'html':'UTF-8'}{else}{l s='Ok' mod='ets_cookie_banner'}{/if}</a>
            {if $ETS_CB_NOT_ACCEPT_LABEL|trim}
                <a class="btn btn-primary full-left ets-cb-btn-not-ok" href="{if $ETS_CB_NOT_ACCEPT_URL}{$ETS_CB_NOT_ACCEPT_URL|escape:'html':'UTF-8'}{else}#{/if}" >{if $ETS_CB_NOT_ACCEPT_LABEL}{$ETS_CB_NOT_ACCEPT_LABEL|escape:'html':'UTF-8'}{else}{l s='Not accept' mod='ets_cookie_banner'}{/if}</a>
            {/if}
        </div>
    </div>
{/if}