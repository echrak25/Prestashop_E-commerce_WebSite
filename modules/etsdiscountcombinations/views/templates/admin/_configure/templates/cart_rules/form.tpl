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
<div class="panel">
	<h3><i class="icon-tag"></i> {l s='Cart rule' mod='etsdiscountcombinations'}</h3>
	<div class="productTabs">
		<ul class="tab nav nav-tabs">
			<li class="tab-row">
				<a class="tab-page" id="cart_rule_link_informations" href="javascript:displayCartRuleTab('informations');"><i class="icon-info"></i> {l s='Information' mod='etsdiscountcombinations'}</a>
			</li>
			<li class="tab-row">
				<a class="tab-page" id="cart_rule_link_conditions" href="javascript:displayCartRuleTab('conditions');"><i class="icon-random"></i> {l s='Conditions' mod='etsdiscountcombinations'}</a>
			</li>
			<li class="tab-row">
				<a class="tab-page" id="cart_rule_link_actions" href="javascript:displayCartRuleTab('actions');"><i class="icon-wrench"></i> {l s='Actions' mod='etsdiscountcombinations'}</a>
			</li>
            <li class="tab-row">
				<a class="tab-page" id="cart_rule_link_combinations" href="javascript:displayCartRuleTab('combinations');"><i class="icon-compress"></i> {l s='Combinations' mod='etsdiscountcombinations'}</a>
			</li>
		</ul>
	</div>
	<form action="{$currentIndex|escape:'html':'UTF-8'}&amp;token={$currentToken|escape:'html':'UTF-8'}&amp;addcart_rule" id="cart_rule_form" class="form-horizontal" method="post">
		{if $currentObject->id}<input type="hidden" name="id_cart_rule" value="{$currentObject->id|intval}" />{/if}
		<input type="hidden" id="currentFormTab" name="currentFormTab" value="informations" />
		<div id="cart_rule_informations" class="panel cart_rule_tab">
			{include file='controllers/cart_rules/informations.tpl'}
		</div>
		<div id="cart_rule_conditions" class="panel cart_rule_tab">
			{include file='cart_rules/conditions.tpl'}
		</div>
		<div id="cart_rule_actions" class="panel cart_rule_tab">
			{include file='controllers/cart_rules/actions.tpl'}
		</div>
        <div id="cart_rule_combinations" class="panel cart_rule_tab">
			{include file='cart_rules/combinations.tpl'}
		</div>
		<button type="submit" class="btn btn-default pull-right" name="submitAddcart_rule" id="{$table|escape:'html':'UTF-8'}_form_submit_btn">{l s='Save' mod='etsdiscountcombinations'}
		</button>
		<!--<input type="submit" value="{l s='Save and stay' mod='etsdiscountcombinations'}" class="button" name="submitAddcart_ruleAndStay" id="" />-->
	</form>

	<script type="text/javascript">
		var product_rule_groups_counter = {if isset($product_rule_groups_counter)}{$product_rule_groups_counter|intval}{else}0{/if};
		var product_rule_counters = new Array();
		var currentToken = '{$currentToken|escape:'html':'UTF-8'}';
		var currentFormTab = '{if isset($smarty.post.currentFormTab)}{$smarty.post.currentFormTab|escape:'html':'UTF-8'}{else}informations{/if}';
		var currentText = '{l s='Now' js=1 mod='etsdiscountcombinations'}';
		var closeText = '{l s='Done' js=1 mod='etsdiscountcombinations'}';
		var timeOnlyTitle = '{l s='Choose Time' js=1 mod='etsdiscountcombinations'}';
		var timeText = '{l s='Time' js=1 mod='etsdiscountcombinations'}';
		var hourText = '{l s='Hour' js=1 mod='etsdiscountcombinations'}';
		var minuteText = '{l s='Minute' js=1 mod='etsdiscountcombinations'}';

		var languages = new Array();
		{foreach from=$languages item=language key=k}
			languages[{$k|escape:'html':'UTF-8'}] = {
				id_lang: {$language.id_lang|intval},
				iso_code: '{$language.iso_code|escape:'html':'UTF-8'}',
				name: '{$language.name|escape:'html':'UTF-8'}'
			};
		{/foreach}
		displayFlags(languages, {$id_lang_default|intval});

    {if isset($refresh_cart) }
      if (typeof window.parent.order_create !== "undefined") {
        window.parent.order_create.refreshCart();
      }
      window.parent.$.fancybox.close();
    {/if}

  </script>
	<script type="text/javascript" src="themes/default/template/controllers/cart_rules/form.js"></script>
	{include file="footer_toolbar.tpl"}
</div>
