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
<div id="cart_rule_restriction_div">
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <p>{l s='Non-combinable cart rules' mod='etsdiscountcombinations'}</p>
                    <select id="cart_rule_select_1" class="jscroll" multiple="" style="opacity: 1;" name="ETS_DC_UN_COMBINABLE_ID_CART_RULE[]">
                        {if $uncombinable_cart_rules}
                            {foreach from=$uncombinable_cart_rules item='cart_rule'}
                                <option value="{$cart_rule.id_cart_rule|intval}">{$cart_rule.name|escape:'html':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>
                    <a id="cart_rule_select_add" class="btn btn-default btn-block clearfix">
                        {l s='Add' mod='etsdiscountcombinations'}
                        <i class="icon-arrow-right"></i>
                    </a>
                </td>
                <td>
                    <p>{l s='Combinable cart rules' mod='etsdiscountcombinations'}</p>
                    <select id="cart_rule_select_2" class="jscroll"  multiple="" style="opacity: 1;">
                        {if $combinable_cart_rules}
                            {foreach from=$combinable_cart_rules item='cart_rule'}
                                <option value="{$cart_rule.id_cart_rule|intval}">{$cart_rule.name|escape:'html':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>
                    <a id="cart_rule_select_remove" class="btn btn-default btn-block clearfix">
                        <i class="icon-arrow-left"></i>
                        {l s='Remove' mod='etsdiscountcombinations'}
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>