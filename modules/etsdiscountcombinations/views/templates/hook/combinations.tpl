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
<script type="text/javascript">
    var dc_link_search_rule ='{$link->getAdminLink('AdminModules') nofilter}&configure=etsdiscountcombinations&submitSearchRule=1';
    var Delete_text = '{l s='Delete' mod='etsdiscountcombinations' js=1}';
</script>
<div class="form-group">
    <label class="control-label col-lg-3"> {l s='Cart rule combination' mod='etsdiscountcombinations'} </label>
    <div class="col-lg-9">
        <div class="radio ">
            <label>
                <input id="rule_combination_default" name="rule_combination" value="default" type="radio"{if $rule_combination=='default' || !$rule_combination } checked="checked"{/if} />
                {l s='Default behavior' mod='etsdiscountcombinations'}
                {if $ETS_DC_CART_RULE_COMBINATION =='combinable_all'}
                    (<span class="setting-default">{l s='Combinable with all cart rules.' mod='etsdiscountcombinations'}</span>)
                {elseif $ETS_DC_CART_RULE_COMBINATION =='not_combinable_all'}
                    (<span class="setting-default">{l s='Not combinable with all cart rules.' mod='etsdiscountcombinations'}</span>)
                {elseif $ETS_DC_CART_RULE_COMBINATION =='specific'}
                    (<span class="setting-default">{l s='Only combinable with specific cart rule.' mod='etsdiscountcombinations'}</span>)
                {elseif $ETS_DC_CART_RULE_COMBINATION =='manual'}
                    (<span class="setting-default">{l s='Manually select combinable/non combinable cart rules.' mod='etsdiscountcombinations'}</span>)
                {/if}
                <a href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=etsdiscountcombinations">
                    {l s='Configure here' mod='etsdiscountcombinations'}
                </a>
            </label>
        </div>
        <div class="radio ">
            <label>
                <input id="rule_combination_combinable_all" name="rule_combination" value="combinable_all" type="radio"{if $rule_combination=='combinable_all' } checked="checked"{/if} />
                {l s='Combinable with all cart rules' mod='etsdiscountcombinations'}
            </label>
        </div>
        <div class="radio">
            <label>
                <input id="rule_combination_not_combinable_all" name="rule_combination" value="not_combinable_all" type="radio"{if $rule_combination=='not_combinable_all'} checked="checked"{/if} />
                {l s='Not combinable with all cart rules' mod='etsdiscountcombinations'}
            </label>
        </div>
        {if ($cart_rules.unselected|@count) + ($cart_rules.selected|@count) > 0}
            <div class="radio ">
                <label>
                    <input id="rule_combination_specific" name="rule_combination" value="specific" type="radio"{if $rule_combination=='specific'} checked="checked"{/if} />
                    {l s='Only combinable with specific cart rule' mod='etsdiscountcombinations'}
                </label>
            </div>
            <div class="radio ">
                <label>
                    <input id="rule_combination_manual" name="rule_combination" value="manual" type="radio"{if $cart_rules.unselected|@count || $rule_combination=='manual'} checked="checked"{/if} />
                    {l s='Manually select combinable/non combinable cart rules' mod='etsdiscountcombinations'}
                </label>
            </div>
        {/if}
    </div>
</div>
{if ($cart_rules.unselected|@count) + ($cart_rules.selected|@count) > 0}
    <div class="form-group rule_combination specific" style="">
        <label class="control-label col-lg-3 required"> {l s='Select cart rule to combine' mod='etsdiscountcombinations'} </label>
        <div class="col-lg-9">
            <div class="dc_search_rule_form">
                <div class="input-group ">
                    <input class="dc_search_rule" name="dc_search_rule" placeholder="{l s='Search ID, code, name' mod='etsdiscountcombinations'}" autocomplete="off" type="text" />
                    <span class="input-group-addon"> <i class="icon-search"></i> </span>
                </div>
                <input class="dc_ids_rule" name="specific_rule_combination" value="{$specific_rule_combination|escape:'html':'UTF-8'}" type="hidden" />
                <ul class="dc_rules" id="block_search_specific_rule_combination">
                    {Module::getInstanceByName('etsdiscountcombinations')->displayListRules($specific_rule_combination) nofilter}
                    <li class="dc_rule_loading"></li>
                </ul>
            </div>
        </div>
    </div>
{/if}