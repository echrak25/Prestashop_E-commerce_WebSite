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
{if $rules}
    {foreach from=$rules item='rule'}
        <li class="dc_rule_item " data-id="{$rule.id_cart_rule|intval}">
            <div class="dc_rule_info">
                <span class="rule_name">{$rule.name|escape:'html':'UTF-8'}{if $rule.code} - {l s='Code:' mod='etsdiscountcombinations'} {$rule.code|escape:'html':'UTF-8'}{/if}</span>
            </div>
            <div class="dc_block_item_close" title="{l s='Delete' mod='etsdiscountcombinations'}">
                <i class="ets_svg_fill_lightgray">
                    <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z">
                    </svg>
                </i>
            </div>
        </li>
    {/foreach}
{/if}