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
<table class="table" style="font-size:10pt;line-height:1.2;width:100%;">
	<tr>
		<td align="left" class="titleblock">
            <p class="title" style="color: #444444;">{l s='Dear' mod='ets_savemycart'} <span style="font-weight: bold;text-transform: capitalize;">{$recipients_name|escape:'html':'UTF-8'}</span>,</p><br/>
			<p class="subtitle" style="color: #444444;">{l s='The below Products/Shopping Cart has been sent to you through the [1]%s[/1] and a PDF version is attached for your convenience.' sprintf=[$PS_SHOP_NAME] tags=['<span style="font-weight: bold;text-transform: capitalize;">'] mod='ets_savemycart'}</p>
		</td>
	</tr>
	<tr>
		<td style="padding:7px 0"></td>
	</tr>
	<tr>
		<td style="padding:7px 0;">
			<table width="650" style="width:100%;">
				<tr align="left">
					<th bgcolor="#f1f4f7" style="border:1px solid #d2dae3;color: #444444;width:85px;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:0.6pt 0.3pt;display:block;font-size: 8pt;">&nbsp;{l s='PRODUCT' mod='ets_savemycart'}</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:7px 0"></td>
                            </tr>
                        </table>
                        
                    </th>
					<th bgcolor="#f1f4f7" style="border:1px solid #d2dae3;color: #444444;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:0.6pt 0.3pt;display:block;font-size: 8pt;">&nbsp;{l s='DESCRIPTION' mod='ets_savemycart'}</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:7px 0"></td>
                            </tr>
                        </table>
                    </th>
					<th bgcolor="#f1f4f7" style="border:1px solid #d2dae3;color: #444444;width:50px;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:0.6pt 0.3pt;display:block;font-size: 8pt;">&nbsp;{l s='AVAIL' mod='ets_savemycart'}</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:7px 0"></td>
                            </tr>
                        </table>
                    </th>
					<th bgcolor="#f1f4f7" style="border:1px solid #d2dae3;color: #444444;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:0.6pt 0.3pt;display:block;font-size: 8pt;">&nbsp;{l s='UNIT PRICE' mod='ets_savemycart'}</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:7px 0"></td>
                            </tr>
                        </table>
                    </th>
					<th bgcolor="#f1f4f7" style="border:1px solid #d2dae3;color: #444444;width:70px;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:0.6pt 0.3pt;display:block;font-size: 8pt;">&nbsp;{l s='QUANTITY' mod='ets_savemycart'}</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:7px 0"></td>
                            </tr>
                        </table>
                    </th>
					<th bgcolor="#f1f4f7" style="border:1px solid #d2dae3;color: #444444;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:0.6pt 0.3pt;display:block;font-size: 8pt;color:#444444">&nbsp;{l s='TOTAL PRICE' mod='ets_savemycart'}</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:7px 0"></td>
                            </tr>
                        </table>
                    </th>
				</tr>
				{*Product detail*}
                {include file="./product_list.tpl" list=$product_list}
				{*Total product*}
				<tr class="conf_body">
                    <td colspan="2">&nbsp;</td>
					<td bgcolor="#f1f4f7" align="right" colspan="2" style="border:1px solid #d2dae3;color:#555454;padding:7px 0;vertical-align: middle;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:1pt 0;line-height:1;font-size: 9pt;color:#444444;text-align:right;">{l s='TOTAL PRODUCTS' mod='ets_savemycart'}{$use_tax_display nofilter}&nbsp;</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                        </table>
					</td>
					<td bgcolor="#f1f4f7" colspan="2" align="right" style="border:1px solid #d2dae3;padding:7px 0;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color:#1491ee;margin:1pt 0;">{$total_products nofilter}</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                        </table>
					</td>
				</tr>
				{*Shipping*}
				<tr class="conf_body">
                    <td colspan="2">&nbsp;</td>
					<td bgcolor="#f1f4f7" colspan="2" align="right" style="border:1px solid #d2dae3;color:#555454;padding:7px 0;vertical-align: middle;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
        						  <span style="margin:1pt 0;font-size: 9pt;color:#444444;text-align:right;margin:0;line-height:1;">{l s='TOTAL SHIPPING' mod='ets_savemycart'}&nbsp;</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                        </table>
					</td>
					<td bgcolor="#f1f4f7" colspan="2" align="right" style="border:1px solid #d2dae3;padding:7px 0;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:1pt 0;color:#53bb75;">{$total_shipping nofilter}</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                        </table>
					</td>
				</tr>
                {*Discount*}
                <tr class="conf_body">
                    <td colspan="2">&nbsp;</td>
                    <td bgcolor="#f1f4f7" colspan="2" align="right" style="border:1px solid #d2dae3;color:#555454;padding:7px 0;vertical-align: middle;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:1pt 0;font-size: 9pt;color:#444444;text-align:right;margin:0;line-height:1;">{l s='TOTAL DISCOUNT' mod='ets_savemycart'}&nbsp;</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                        </table>
                    </td>
                    <td bgcolor="#f1f4f7" colspan="2" align="right" style="border:1px solid #d2dae3;padding:7px 0;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:1pt 0;color:orangered;">{$total_discount nofilter}</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
				{*Total*}
				<tr class="conf_body">
                    <td colspan="2">&nbsp;</td>
					<td bgcolor="#f1f4f7" align="right" colspan="2" style="border:1px solid #d2dae3;padding:7px 0;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td align="right">
        						  <span style="margin:1pt 0;font-size: 16pt;color:#555454;margin:0;line-height:1;">{l s='TOTAL' mod='ets_savemycart'}&nbsp;</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                        </table>
					</td>
					<td bgcolor="#ffffff" colspan="2" align="right" style="border:1px solid #d2dae3;padding:7px 0;">
                        <table>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin:1pt 0;font-size:16pt;color: #fe9f38;">{$total nofilter}</span>
                                </td>
                            </tr>
                            <tr style="font-size:3pt;">
                                <td style="padding:2px 0"></td>
                            </tr>
                        </table>
					</td>
				</tr>
				</tbody>
			</table>
		</td>
	</tr>
	<tr>
		<td style="padding:7px 0"></td>
	</tr>
	<tr>
		<td align="left">
			<h3 style="color: #444444;text-align: center;">{l s='So, What Can You Do with This Shopping Cart?' mod='ets_savemycart'}</h3>
			<p style="color: #444444;text-align: center;line-height: 1.6;">
                {l s='You can now view this shopping cart on the [1]%s[/1] , change quantities, update the Cart & Vouchers and place your order securely online.' mod='ets_savemycart' tags=['<span style="font-weight: bold;text-transform: capitalize;">'] sprintf=[$PS_SHOP_NAME]}<br>
			</p>
            <p style="text-align: center;">
                <table style="border:none;margin:0 auto;">
                    <tr style="border:none;">
                        <td style="width: 20%;">&nbsp;</td>
                        <td bgcolor="#2fb5d2" style="width:60%;border:1px solid #2fb5d2;line-height:1;">
                            <a href="{$shopping_cart_link nofilter}" style="margin-top: 10px;color: #ffffff;text-decoration: none;display: inline-block;margin: 0 auto;padding: 10px 15px;">
                                <br />
                                {l s='To View This Shopping Cart Online Click Here' mod='ets_savemycart'}
                                <br />
                            </a>
                        </td>
                        <td style="width: 20%;">&nbsp;</td>
                    </tr>
                </table>
			</p>
			<p style="text-align: center;color: #444444">{l s='Or' mod='ets_savemycart'}</p>
			<p style="color: #444444;text-align: center;">{l s='You can simply forward this to someone else.' mod='ets_savemycart'}</p>
            <p>&nbsp;</p>
			<p style="color: #444444;text-align: center;">{l s='If you need any further assistance, contact us today!' mod='ets_savemycart'}</p>
		</td>
	</tr>
</table>
