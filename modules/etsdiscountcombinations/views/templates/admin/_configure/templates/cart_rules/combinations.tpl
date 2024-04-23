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
{*overried by etsdiscountcombinations*}
{Module::getInstanceByName('etsdiscountcombinations')->displayFormCombination($cart_rules) nofilter}
<div class="form-group rule_combination manual" style="">
    <label class="control-label col-lg-3">&nbsp; </label>
    <div class="col-lg-9">
        {if ($cart_rules.unselected|@count) + ($cart_rules.selected|@count) > 0}
        	<p class="checkbox" style="opacity:0">
        		<label>
        			<input type="checkbox" id="cart_rule_restriction" name="cart_rule_restriction" value="1" {if $cart_rules.unselected|@count}checked="checked"{/if} />
        			{l s='Compatibility with other cart rules' mod='etsdiscountcombinations'}
        		</label>
        	</p>
        	<div id="cart_rule_restriction_div" style="margin-top: -40px;">
        		<br />
        		<table  class="table">
        			<tr>
        				<td>
        					<p>{l s='Non-combinable cart rules' mod='etsdiscountcombinations'}</p>
        					<select id="cart_rule_select_1" class="jscroll" multiple="">
        					</select>
        					<a class="jscroll-next btn btn-default btn-block clearfix" href="">{l s='Next' mod='etsdiscountcombinations'}</a>
        					<a id="cart_rule_select_add" class="btn btn-default btn-block clearfix">{l s='Add' mod='etsdiscountcombinations'} <i class="icon-arrow-right"></i></a>
        				</td>
        				<td>
        					<p>{l s='Combinable cart rules' mod='etsdiscountcombinations'}</p>
        					<select name="cart_rule_select[]" class="jscroll" id="cart_rule_select_2" multiple>
        					</select>
        					<a class="jscroll-next btn btn-default btn-block clearfix" href="">{l s='Next' mod='etsdiscountcombinations'}</a>
        					<a id="cart_rule_select_remove" class="btn btn-default btn-block clearfix" ><i class="icon-arrow-left"></i> {l s='Remove' mod='etsdiscountcombinations'}</a>
        				</td>
        			</tr>
        		</table>
        	</div>
        {/if}
    </div>
</div>