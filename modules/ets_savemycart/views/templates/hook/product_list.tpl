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
{foreach $list as $product}
	<tr>
		<td style="border:1px solid #d2dae3;padding: 20px;color:#555454;vertical-align: middle;width:85px;">
            <table>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
                <tr>
                    <td>
                        <img width="60" src="{$product['image'] nofilter}" alt="{$product['name']|escape:'html':'UTF-8'}">
                    </td>
                </tr>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
            </table>
		</td>
		<td style="border:1px solid #d2dae3;padding: 20px;color:#555454;vertical-align: middle;">
            <table>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
                <tr>
                    <td style="padding:5px;">
                        <span style="font-size:9pt;">{$product['name']|escape:'html':'UTF-8'}</span><br />
                        {if $product['reference']|trim != ''|escape:'html':'UTF-8'}<span style="color:#999999;font-size:8pt;">{l s='SKU' mod='ets_savemycart'}:{$product['reference']|escape:'html':'UTF-8'}</span><br />{/if}
                        {if isset($product.attributes) && $product.attributes}
                            {assign var='ik2' value=0}
                            <span class="product_combination" style="color:#999999;font-size:8pt;">
                                {foreach from=$product.attributes item='attribute'}
                                    {assign var='ik2' value=$ik2+1}
                                    {$attribute.group_name|truncate:80:'...':true|escape:'html':'UTF-8'}: {$attribute.attribute_name|truncate:80:'...':true|escape:'html':'UTF-8'}
                                    {if $ik2 < count($product.attributes)}, {/if}
                                {/foreach}
                            </span>
                        {/if}
                    </td>
                </tr>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
            </table>
		</td>
		<td style="border:1px solid #d2dae3;padding: 20px;color:#555454;vertical-align: middle;">
            <table>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
                <tr>
                    <td>
                        {if $product['is_available']}{l s='Yes' mod='ets_savemycart'}{else}{l s='No' mod='ets_savemycart'}{/if}
                    </td>
                </tr>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
            </table>
		</td>
		<td style="border:1px solid #d2dae3;text-align:center;overflow: hidden;position: relative;padding: 20px;vertical-align: middle;">
			<table>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
                <tr>
                    <td>
                        {if isset($product['reduction'])}<span class="reduction" style="
                            font-size: 8pt;
                            padding: 5px;
                            color: white;
                            background-color: #f14a69;
                            display: inline-block;"> - {$product['reduction']|escape:'html':'UTF-8'}</span>
                        {/if}
                        <span class="price" style="color: #1491ee;font-size:12pt;line-height:1.3;">{$product['unit_price']|escape:'html':'UTF-8'}</span><br>
                        {if isset($product['old_price']) && isset($product['reduction'])}
                            <span class="old-price" style="color: #7587a1;text-decoration: line-through;line-height:1.3;font-size: 9pt;">{$product['old_price']|escape:'html':'UTF-8'}</span>
                        {/if}
                    </td>
                </tr>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
            </table>
		</td>
		<td style="border:1px solid #d2dae3;padding: 12pt;color:#555454;vertical-align: middle;width:70px;text-align:center">
            <table>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
                <tr>
                    <td>
                        {$product['quantity']|intval}
                    </td>
                </tr>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
            </table>
		</td>
		<td style="border:1px solid #d2dae3;font-size:12pt;color:#7587a1;vertical-align: middle;text-align:center;">
            <table>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
                <tr>
                    <td style="color:#1491ee;">
                        {$product['price']|escape:'html':'UTF-8'}
                    </td>
                </tr>
                <tr style="font-size:3pt;">
                    <td style="padding:2px 0"></td>
                </tr>
            </table>
		</td>
	</tr>
    {foreach $product['customization'] as $customization}
		<tr>
			<td colspan="3" style="border:1px solid #d2dae3;">
				<strong>{$product['name']|escape:'html':'UTF-8'}</strong><br>
                {$customization['customization_text']|escape:'html':'UTF-8'}
			</td>
			<td style="border:1px solid #d2dae3;">
                {$product['unit_price']|escape:'html':'UTF-8'}
			</td>
			<td style="border:1px solid #d2dae3;">
                {$customization['customization_quantity']|intval}
			</td>
			<td style="border:1px solid #d2dae3;">
                {$customization['quantity']|intval}
			</td>
		</tr>
    {/foreach}
{/foreach}
