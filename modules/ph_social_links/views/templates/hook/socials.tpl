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
<div class="ph-list-socials-form">
    <h4 class="title">{l s='Social Networks' mod='ph_social_links'}</h4>
    <ul class="ph-list-socials">
        {foreach from=$socials key='key' item='social'}
            <li class="item-social {$key|strtolower|escape:'html':'UTF-8'}">
                <label for="PH_SL_LINK_ENABLED_{$key|escape:'html':'UTF-8'}">
                    <input data-social="{$key|strtolower|escape:'html':'UTF-8'}" name="PH_SL_LINK_ENABLED[{$key|escape:'html':'UTF-8'}]" id="PH_SL_LINK_ENABLED_{$key|escape:'html':'UTF-8'}" value="1"{if isset($socials_link_enabled[$key]) && $socials_link_enabled[$key]} checked="checked"{/if} type="checkbox" />
                    <i>{$social.svg nofilter}</i>
                    <span class="ph_sc_name">{$social.name|escape:'html':'UTF-8'}</span>
                </label>
                <div class="item-social-input">
                    <input placeholder="{if isset($social.placeholder)}{$social.placeholder|escape:'html':'UTF-8'}{/if}" class="social_link social_link_{$key|strtolower|escape:'html':'UTF-8'}" type="text" name="PH_SL_LINK_VALUES[{$key|escape:'html':'UTF-8'}]" value="{if isset($socials_link_value[$key])}{$socials_link_value[$key]|escape:'html':'UTF-8'}{/if}" {if !(isset($socials_link_enabled[$key]) && $socials_link_enabled[$key])} disabled="disabled"{/if} />
                    <p class="error_link">{l s='The social link is invalid. Please enter the correct link to your social account into the respective field.' mod='ph_social_links'}</p>
                </div>
            </li>
        {/foreach}
    </ul>
</div>
















