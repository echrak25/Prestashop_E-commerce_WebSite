{*
* 2007-2022 ETS-Soft
*
* NOTICE OF LICENSE
*
* This file is not open source! Each license that you purchased is only available for 1 wesite only.
* If you want to use this file on more websites (or projects), you need to purchase additional licenses. 
* You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
* 
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs, please contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2022 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
<tr class="comparison_header">
	<td>
		{l s='Comments' mod='productcomments'}
	</td>
	{section loop=$list_ids_product|count step=1 start=0 name=td}
		<td></td>
	{/section}
</tr>

{foreach from=$grades item=grade key=grade_id}
<tr>
	{cycle values='comparison_feature_odd,comparison_feature_even' assign='classname'}
	<td class="{$classname|escape:'html':'UTF-8'}">
		{$grade|escape:'html':'UTF-8'}
	</td>

	{foreach from=$list_ids_product item=id_product}
		{assign var='tab_grade' value=$product_grades[$grade_id]}
		<td  width="{$width|escape:'html':'UTF-8'}%" class="{$classname|escape:'html':'UTF-8'} comparison_infos ajax_block_product" align="center">
		{if isset($tab_grade[$id_product]) AND $tab_grade[$id_product]}
			{section loop=6 step=1 start=1 name=average}
				<input class="auto-submit-star" disabled="disabled" type="radio" name="{$grade_id|escape:'html':'UTF-8'}_{$id_product|escape:'html':'UTF-8'}_{$smarty.section.average.index|escape:'html':'UTF-8'}" {if isset($tab_grade[$id_product]) AND $tab_grade[$id_product]|round neq 0 and $smarty.section.average.index eq $tab_grade[$id_product]|round}checked="checked"{/if} />
			{/section}
		{else}
			-
		{/if}
		</td>
	{/foreach}
</tr>				
{/foreach}

	{cycle values='comparison_feature_odd,comparison_feature_even' assign='classname'}
<tr>
	<td  class="{$classname|escape:'html':'UTF-8'} comparison_infos">{l s='Average' mod='productcomments'}</td>
{foreach from=$list_ids_product item=id_product}
	<td  width="{$width|escape:'html':'UTF-8'}%" class="{$classname|escape:'html':'UTF-8'} comparison_infos" align="center" >
	{if isset($list_product_average[$id_product]) AND $list_product_average[$id_product]}
		{section loop=6 step=1 start=1 name=average}
			<input class="auto-submit-star" disabled="disabled" type="radio" name="average_{$id_product|escape:'html':'UTF-8'}" {if $list_product_average[$id_product]|round neq 0 and $smarty.section.average.index eq $list_product_average[$id_product]|round}checked="checked"{/if} />
		{/section}	
	{else}
		-
	{/if}
	</td>	
{/foreach}
</tr>

<tr>
	<td  class="{$classname|escape:'html':'UTF-8'} comparison_infos">&nbsp;</td>
	{foreach from=$list_ids_product item=id_product}
	<td  width="{$width|escape:'html':'UTF-8'}%" class="{$classname|escape:'html':'UTF-8'} comparison_infos" align="center" >
			{if isset($product_comments[$id_product]) AND $product_comments[$id_product]}
		<a href="#" rel="#comments_{$id_product|escape:'html':'UTF-8'}" class="cluetip">{l s='view comments' mod='productcomments'}</a>
		<div style="display:none" id="comments_{$id_product|escape:'html':'UTF-8'}">
		{foreach from=$product_comments[$id_product] item=comment}	
			<div class="comment">
				<div class="customer_name">
				{dateFormat date=$comment.date_add|escape:'html':'UTF-8' full=0}
						{$comment.customer_name|escape:'html':'UTF-8'}.
				</div> 
				{$comment.content|escape:'html':'UTF-8'|nl2br}
			</div>
			<br />
		{/foreach}
		</div>
	{else}
		-
	{/if}
	</td>	
{/foreach}
</tr>