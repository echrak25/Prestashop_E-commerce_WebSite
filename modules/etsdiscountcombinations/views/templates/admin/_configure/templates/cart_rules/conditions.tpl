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
<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
			title="{l s='Optional: The cart rule will be available to everyone if you leave this field blank.' mod='etsdiscountcombinations'}">
			{l s='Limit to a single customer' mod='etsdiscountcombinations'}
		</span>
	</label>
	<div class="col-lg-9">
		<div class="input-group col-lg-12">
			<span class="input-group-addon"><i class="icon-user"></i></span>
			<input type="hidden" id="id_customer" name="id_customer" value="{$currentTab->getFieldValue($currentObject, 'id_customer')|intval}" />
			<input type="text" id="customerFilter" class="input-xlarge" name="customerFilter" value="{if $customerFilter}{$customerFilter|escape:'html':'UTF-8'}{elseif isset($smarty.post.customerFilter)}{$smarty.post.customerFilter|escape}{/if}" />
			<span class="input-group-addon"><i class="icon-search"></i></span>
		</div>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
			title="{l s='The default period is one month.' mod='etsdiscountcombinations'}">
			{l s='Valid' mod='etsdiscountcombinations'}
		</span>
	</label>
	<div class="col-lg-9">
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon">{l s='From' mod='etsdiscountcombinations'}</span>
					<input type="text" class="datepicker input-medium" name="date_from"
					value="{if $currentTab->getFieldValue($currentObject, 'date_from')}{$currentTab->getFieldValue($currentObject, 'date_from')|escape:'html':'UTF-8'}{else}{$defaultDateFrom|escape:'html':'UTF-8'}{/if}" />
					<span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon">{l s='To' mod='etsdiscountcombinations'}</span>
					<input type="text" class="datepicker input-medium" name="date_to"
					value="{if $currentTab->getFieldValue($currentObject, 'date_to')}{$currentTab->getFieldValue($currentObject, 'date_to')|escape:'html':'UTF-8'}{else}{$defaultDateTo|escape:'html':'UTF-8'}{/if}" />
					<span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
			title="{l s='You can choose a minimum amount for the cart either with or without the taxes and shipping.' mod='etsdiscountcombinations'}">
			{l s='Minimum amount' mod='etsdiscountcombinations'}
		</span>
	</label>
	<div class="col-lg-9">
		<div class="row">
			<div class="col-lg-3">
				<input type="text" name="minimum_amount" value="{$currentTab->getFieldValue($currentObject, 'minimum_amount')|floatval}" />
			</div>
			<div class="col-lg-2">
				<select name="minimum_amount_currency">
				{foreach from=$currencies item='currency'}
					<option value="{$currency.id_currency|intval}"
					{if $currentTab->getFieldValue($currentObject, 'minimum_amount_currency') == $currency.id_currency
						|| (!$currentTab->getFieldValue($currentObject, 'minimum_amount_currency') && $currency.id_currency == $defaultCurrency)}
						selected="selected"
					{/if}
					>
						{$currency.iso_code|escape:'html':'UTF-8'}
					</option>
				{/foreach}
				</select>
			</div>
			<div class="col-lg-3">
				<select name="minimum_amount_tax">
					<option value="0" {if $currentTab->getFieldValue($currentObject, 'minimum_amount_tax') == 0}selected="selected"{/if}>{l s='Tax excluded' mod='etsdiscountcombinations'}</option>
					<option value="1" {if $currentTab->getFieldValue($currentObject, 'minimum_amount_tax') == 1}selected="selected"{/if}>{l s='Tax included' mod='etsdiscountcombinations'}</option>
				</select>
			</div>
			<div class="col-lg-4">
				<select name="minimum_amount_shipping">
					<option value="0" {if $currentTab->getFieldValue($currentObject, 'minimum_amount_shipping') == 0}selected="selected"{/if}>{l s='Shipping excluded' mod='etsdiscountcombinations'}</option>
					<option value="1" {if $currentTab->getFieldValue($currentObject, 'minimum_amount_shipping') == 1}selected="selected"{/if}>{l s='Shipping included' mod='etsdiscountcombinations'}</option>
				</select>
			</div>
		</div>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
			title="{l s='The cart rule will be applied to the first "X" customers only.' mod='etsdiscountcombinations'}">
			{l s='Total available' mod='etsdiscountcombinations'}
		</span>
	</label>
	<div class="col-lg-9">
		<input class="form-control" type="text" name="quantity" value="{$currentTab->getFieldValue($currentObject, 'quantity')|intval}" />
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
			title="{l s='A customer will only be able to use the cart rule "X" time(s).' mod='etsdiscountcombinations'}">
			{l s='Total available for each user' mod='etsdiscountcombinations'}
		</span>
	</label>
	<div class="col-lg-9">
		<input class="form-control" type="text" name="quantity_per_user" value="{$currentTab->getFieldValue($currentObject, 'quantity_per_user')|intval}" />
	</div>
</div>



<div class="form-group">
	<label class="control-label col-lg-3">
		{l s='Restrictions' mod='etsdiscountcombinations'}
	</label>
	<div class="col-lg-9">
		{if ($countries.unselected|@count) + ($countries.selected|@count) > 1}
			<p class="checkbox">
				<label>
					<input type="checkbox" id="country_restriction" name="country_restriction" value="1" {if $countries.unselected|@count}checked="checked"{/if} />
					{l s='Country selection' mod='etsdiscountcombinations'}
				</label>
			</p>
			<span class="help-block">{l s='This restriction applies to the country of delivery.' mod='etsdiscountcombinations'}</span>
			<div id="country_restriction_div">
				<br />
				<table class="table">
					<tr>
						<td>
							<p>{l s='Unselected countries' mod='etsdiscountcombinations'}</p>
							<select id="country_select_1" multiple>
								{foreach from=$countries.unselected item='country'}
									<option value="{$country.id_country|intval}">&nbsp;{$country.name|escape}</option>
								{/foreach}
							</select>
							<a id="country_select_add" class="btn  btn-default btn-block clearfix">{l s='Add' mod='etsdiscountcombinations'} <i class="icon-arrow-right"></i></a>
						</td>
						<td>
							<p>{l s='Selected countries' mod='etsdiscountcombinations'}</p>
							<select name="country_select[]" id="country_select_2" class="input-large" multiple>
								{foreach from=$countries.selected item='country'}
									<option value="{$country.id_country|intval}">&nbsp;{$country.name|escape}</option>
								{/foreach}
							</select>
							<a id="country_select_remove" class="btn btn-default btn-block clearfix"><i class="icon-arrow-left"></i> {l s='Remove' mod='etsdiscountcombinations'} </a>
						</td>
					</tr>
				</table>
			</div>
		{/if}

		{if ($carriers.unselected|@count) + ($carriers.selected|@count) > 1}
			<p class="checkbox">
				<label>
					<input type="checkbox" id="carrier_restriction" name="carrier_restriction" value="1" {if $carriers.unselected|@count}checked="checked"{/if} />
					{l s='Carrier selection' mod='etsdiscountcombinations'}
				</label>
			</p>
			<div id="carrier_restriction_div">
				<br />
				<table class="table">
					<tr>
						<td>
							<p>{l s='Unselected carriers' mod='etsdiscountcombinations'}</p>
							<select id="carrier_select_1" class="input-large" multiple>
								{foreach from=$carriers.unselected item='carrier'}
									<option value="{$carrier.id_reference|intval}">&nbsp;{$carrier.name|escape}</option>
								{/foreach}
							</select>
							<a id="carrier_select_add" class="btn btn-default btn-block clearfix" >{l s='Add' mod='etsdiscountcombinations'} <i class="icon-arrow-right"></i></a>
						</td>
						<td>
							<p>{l s='Selected carriers' mod='etsdiscountcombinations'}</p>
							<select name="carrier_select[]" id="carrier_select_2" class="input-large" multiple>
								{foreach from=$carriers.selected item='carrier'}
									<option value="{$carrier.id_reference|intval}">&nbsp;{$carrier.name|escape}</option>
								{/foreach}
							</select>
							<a id="carrier_select_remove" class="btn btn-default btn-block clearfix"><i class="icon-arrow-left"></i> {l s='Remove' mod='etsdiscountcombinations'} </a>
						</td>
					</tr>
				</table>
			</div>
		{/if}

		{if ($groups.unselected|@count) + ($groups.selected|@count) > 1}
			<p class="checkbox">
				<label>
					<input type="checkbox" id="group_restriction" name="group_restriction" value="1" {if $groups.unselected|@count}checked="checked"{/if} />
					{l s='Customer group selection' mod='etsdiscountcombinations'}
				</label>
			</p>
			<div id="group_restriction_div">
				<br />
				<table class="table">
					<tr>
						<td>
							<p>{l s='Unselected groups' mod='etsdiscountcombinations'}</p>
							<select id="group_select_1" class="input-large" multiple>
								{foreach from=$groups.unselected item='group'}
									<option value="{$group.id_group|intval}">&nbsp;{$group.name|escape}</option>
								{/foreach}
							</select>
							<a id="group_select_add" class="btn btn-default btn-block clearfix" >{l s='Add' mod='etsdiscountcombinations'} <i class="icon-arrow-right"></i></a>
						</td>
						<td>
							<p>{l s='Selected groups' mod='etsdiscountcombinations'}</p>
							<select name="group_select[]" class="input-large" id="group_select_2" multiple>
								{foreach from=$groups.selected item='group'}
									<option value="{$group.id_group|intval}">&nbsp;{$group.name|escape}</option>
								{/foreach}
							</select>
							<a id="group_select_remove" class="btn btn-default btn-block clearfix" ><i class="icon-arrow-left"></i> {l s='Remove' mod='etsdiscountcombinations'}</a>
						</td>
					</tr>
				</table>
			</div>
		{/if}
			<p class="checkbox">
				<label>
					<input type="checkbox" id="product_restriction" name="product_restriction" value="1" {if $product_rule_groups|@count}checked="checked"{/if} />
					{l s='Product selection' mod='etsdiscountcombinations'}
				</label>
			</p>
			<div id="product_restriction_div">
				<br />
				<table id="product_rule_group_table" class="table">
					{foreach from=$product_rule_groups item='product_rule_group'}
						{$product_rule_group nofilter}
					{/foreach}
				</table>
				<a href="javascript:addProductRuleGroup();" class="btn btn-default ">
					<i class="icon-plus-sign"></i> {l s='Product selection' mod='etsdiscountcombinations'}
				</a>
			</div>

		{if ($shops.unselected|@count) + ($shops.selected|@count) > 1}
			<p class="checkbox">
				<label>
					<input type="checkbox" id="shop_restriction" name="shop_restriction" value="1" {if $shops.unselected|@count}checked="checked"{/if} />
					{l s='Shop selection' mod='etsdiscountcombinations'}
				</label>
			</p>
			<div id="shop_restriction_div">
				<br/>
				<table class="table">
					<tr>
						<td>
							<p>{l s='Unselected shops' mod='etsdiscountcombinations'}</p>
							<select id="shop_select_1" multiple>
								{foreach from=$shops.unselected item='shop'}
									<option value="{$shop.id_shop|intval}">&nbsp;{$shop.name|escape}</option>
								{/foreach}
							</select>
							<a id="shop_select_add" class="btn btn-default btn-block clearfix" >{l s='Add' mod='etsdiscountcombinations'} <i class="icon-arrow-right"></i></a>
						</td>
						<td>
							<p>{l s='Selected shops' mod='etsdiscountcombinations'}</p>
							<select name="shop_select[]" id="shop_select_2" multiple>
								{foreach from=$shops.selected item='shop'}
									<option value="{$shop.id_shop|intval}">&nbsp;{$shop.name|escape}</option>
								{/foreach}
							</select>
							<a id="shop_select_remove" class="btn btn-default btn-block clearfix" ><i class="icon-arrow-left"></i> {l s='Remove' mod='etsdiscountcombinations'}</a>
						</td>
					</tr>
				</table>
			</div>
		{/if}
	</div>
</div>
