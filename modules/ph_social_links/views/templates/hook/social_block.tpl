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
<div class="ph-social-link-block {$ph_position|escape:'html':'UTF-8'} button_size_{$PH_SL_BUTTON_SIZE|escape:'html':'UTF-8'} button_border_{$PH_SL_BUTTON_BORDER|escape:'html':'UTF-8'} button_type_flat_icon {if $PH_SL_HIDE_ON_MOBILE} hide_mobile{/if}" >
    <h4 class="ph_social_link_title">{$PH_SL_LINK_TITLE|escape:'html':'UTF-8'}</h4>
    <ul>
        {foreach from=$socials key='key' item='social'}
            {if isset($socials_link_enabled[$key]) && $socials_link_enabled[$key]}
                <li class="ph_social_item {$key|strtolower|escape:'html':'UTF-8'}">
                    <a title="{$social.name|escape:'html':'UTF-8'}" href="{$socials_link_value[$key]|escape:'html':'UTF-8'}" target="_blank">
                        <i>{$social.svg|escape:'html':'UTF-8' nofilter}</i>
                        <span class="tooltip_title">{$social.name|escape:'html':'UTF-8'}</span>
                    </a>
                </li>
            {/if}
        {/foreach}
    </ul>
</div>