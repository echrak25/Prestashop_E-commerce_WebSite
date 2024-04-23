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

<div class="shopping-cart-list ets_aban_listsavecart">
	<h6>{l s='Here are the shopping carts you have saved' mod='ets_savemycart'}</h6>
	{if !empty($msg_success)}<ul class="ets_sc_messages alert alert-success">
		{foreach from=$msg_success item='msg'}
			<li>{$msg|escape:'html':'UTF-8'}</li>
		{/foreach}
	</ul>{/if}
    {if !empty($carts)}
		<table class="table table-striped table-bordered table-labeled">
			<thead class="thead-default">
			<tr>
				<th class="text-center">{l s='Cart ID' mod='ets_savemycart'}</th>
				<th class="text-center">{l s='Cart name' mod='ets_savemycart'}</th>
				<th class="text-center">{l s='Product(s)' mod='ets_savemycart'}</th>
				<th class="text-center">{l s='Total cost' mod='ets_savemycart'}</th>
				<th class="text-center ets_aban_action">{l s='Action' mod='ets_savemycart'}</th>
			</tr>
			</thead>
			<tbody>
            {foreach from=$carts item=cart}
				<tr>
					<th class="sc_id text-center size_1" scope="row">{$cart.id_cart|intval}</th>
					<td class="sc_product_name text-center size_2">{$cart.cart_name|escape:'html':'UTF-8'}</td>
					<td class="sc_products_list text-xs-left size_3">
						{if !empty($cart.products)}<ul class="ets_sc_products">{foreach from=$cart.products item=product}
							<li><a href="{$product.link nofilter}" title="{$product.name|escape:'html':'UTF-8'}"><img src="{$product.image nofilter}" alt="{$product.name|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" /></a></li>
						{/foreach}</ul>{/if}
					</td>
					<td class="sc_price text-center size_2"><span class="badge-info">{$cart.total|escape:'html':'UTF-8'}</span></td>
					<td class="sc_action text-center ets_aban_action size_2" cart-actions">
						<a class="ets_sc_view_shopping_cart btn-primary" href="{$cart.view_url nofilter}" data-tooltip="{l s='View' mod='ets_savemycart'}" data-tooltip-pos="top">
                            <i class="ets_svg_icon ets_svg_fill_gray ets_svg_fill_hover_blue">
								<svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1088 800v64q0 13-9.5 22.5t-22.5 9.5h-224v224q0 13-9.5 22.5t-22.5 9.5h-64q-13 0-22.5-9.5t-9.5-22.5v-224h-224q-13 0-22.5-9.5t-9.5-22.5v-64q0-13 9.5-22.5t22.5-9.5h224v-224q0-13 9.5-22.5t22.5-9.5h64q13 0 22.5 9.5t9.5 22.5v224h224q13 0 22.5 9.5t9.5 22.5zm128 32q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 53-37.5 90.5t-90.5 37.5q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"/></svg>
							</i>
                        </a>
						<a href="{$cart.load_cart_url nofilter}" class="ets_sc_checkout_cart btn-primary" id="submit_load_cart" name="submitLoadCart" data-tooltip="{l s='Checkout' mod='ets_savemycart'}" data-tooltip-pos="top">
                            <i class="ets_svg_icon ets_svg_fill_gray ets_svg_fill_hover_blue">
                                <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M704 1536q0 52-38 90t-90 38-90-38-38-90 38-90 90-38 90 38 38 90zm896 0q0 52-38 90t-90 38-90-38-38-90 38-90 90-38 90 38 38 90zm128-1088v512q0 24-16.5 42.5t-40.5 21.5l-1044 122q13 60 13 70 0 16-24 64h920q26 0 45 19t19 45-19 45-45 19h-1024q-26 0-45-19t-19-45q0-11 8-31.5t16-36 21.5-40 15.5-29.5l-177-823h-204q-26 0-45-19t-19-45 19-45 45-19h256q16 0 28.5 6.5t19.5 15.5 13 24.5 8 26 5.5 29.5 4.5 26h1201q26 0 45 19t19 45z"/></svg>
                            </i>
                        </a>
					{if isset($isShareable) && $isShareable}
						<a id="submit_share_card" class="ets_sc_share_cart btn-primary" data-id-cart = "{$cart.id_cart nofilter}" data-tooltip="{l s='Share to friend' mod='ets_savemycart'}" style="cursor: pointer;" data-tooltip-pos="top">
							<i class="ets_svg_icon ets_svg_fill_gray ets_svg_fill_hover_blue">
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z" class=""></path></svg>
							</i>
						</a>
					{/if}
						<a href="{$cart.delete_url nofilter}" class="ets_sc_delete_cart btn-primary" data-confirm="{l s='Do you want to delete this item?' mod='ets_savemycart'}" data-tooltip="{l s='Delete' mod='ets_savemycart'}" data-tooltip-pos="top">
							<i class="ets_svg_icon ets_svg_fill_gray ets_svg_fill_hover_blue">
								<svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M704 736v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm128 724v-948h-896v948q0 22 7 40.5t14.5 27 10.5 8.5h832q3 0 10.5-8.5t14.5-27 7-40.5zm-672-1076h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z"/></svg>
							</i>
						</a>
					</td>
				</tr>
            {/foreach}
			</tbody>
		</table>
    {else}<p class="ets_sc_no_cart">{l s='No shopping cart available.' mod='ets_savemycart'}</p>{/if}
</div>