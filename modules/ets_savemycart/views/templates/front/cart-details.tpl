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

{block name='order_products_table'}
	<div class="box hidden-sm-down">
		<h4 class="savecart_titlebox">{$cart.shopping_cart->cart_name|escape:'html':'UTF-8'} ({l s='Cart ID: %s' sprintf=[$cart.shopping_cart->id_cart] mod='ets_savemycart'})</h4>
		<table id="order-products" class="table table-bordered">
			<thead class="thead-default">
			<tr>
				<th>{l s='Product' mod='ets_savemycart'}</th>
				<th class="text-xs-center">{l s='Quantity' mod='ets_savemycart'}</th>
				<th class="text-xs-center">{l s='Unit price' mod='ets_savemycart'}</th>
				<th class="text-xs-right">{l s='Total price' mod='ets_savemycart'}</th>
			</tr>
			</thead>
            {foreach from=$cart.products item=product}
				<tr>
					<td>
						<a class="order-products-thumb" href="{$product.link nofilter}" title="{$product.name|escape:'html':'UTF-8'}">
							<img src="{$product.image nofilter}" alt="{$product.name|escape:'html':'UTF-8'}" />
							<span class="order-products-name">
                                <strong>{$product.name|escape:'html':'UTF-8'}</strong>
                                {if !empty($product.attributes)}
                                    <span class="order-products-attribute">{$product.attributes|escape:'html':'UTF-8'}</span>
                                {/if}
                            </span>
						</a>
					</td>
					<td class="text-xs-center">{$product.cart_quantity|intval}</td>
					<td class="text-xs-center">{$product.price|escape:'html':'UTF-8'}</td>
					<td class="text-xs-right">{$product.total|escape:'html':'UTF-8'}</td>
				</tr>
            {/foreach}
			<tfoot>
			{if !empty($cart.sub_total)}<tr class="text-xs-right line-sub-total">
				<td colspan="3">{l s='Subtotal' mod='ets_savemycart'}&nbsp;{if $cart.use_tax}{l s='(tax incl.)'  mod='ets_savemycart'}{else}{l s='(tax excl.)'  mod='ets_savemycart'}{/if}</td>
				<td>{$cart.sub_total|escape:'html':'UTF-8'}</td>
			</tr>{/if}
            <tr class="text-xs-right line-total-shipping">
				<td colspan="3">{l s='Total shipping' mod='ets_savemycart'}</td>
				<td>{if $cart.total_shipping}{$cart.total_shipping|escape:'html':'UTF-8'}{else}{l s='Free' mod='ets_savemycart'}{/if}</td>
			</tr>
            {if $cart.total_tax}<tr class="text-xs-right line-total-tax">
				<td colspan="3">{l s='Total tax' mod='ets_savemycart'}</td>
				<td>{$cart.total_tax|escape:'html':'UTF-8'}</td>
			</tr>{/if}
            {if !empty($cart.total)}<tr class="text-xs-right line-total">
				<td colspan="3">{l s='Total' mod='ets_savemycart'}&nbsp;{if $cart.use_tax}{l s='(tax incl.)'  mod='ets_savemycart'}{else}{l s='(tax excl.)'  mod='ets_savemycart'}{/if}</td>
				<td>{$cart.total|escape:'html':'UTF-8'}</td>
			</tr>{/if}
			</tfoot>
		</table>
	</div>
	<div class="ets_sc_actions">
		<a href="javascript:void(0)" class="ets_sc_cancel btn btn-primary">{l s='Cancel' mod='ets_savemycart'}</a>
		<a href="{$cart.delete_url nofilter}" class="ets_sc_delete btn btn-primary" data-confirm="{l s='Do you want to delete this item?' mod='ets_savemycart'}">{l s='Delete cart' mod='ets_savemycart'}</a>
		<a href="{$cart.load_cart_url nofilter}" class="ets_sc_load_this_cart btn btn-primary pull-right" id="submit_load_cart">{l s='Checkout now' mod='ets_savemycart'}</a>
	</div>
{/block}

