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
	var ets_sc_close_title = '{l s='Close' mod='ets_savemycart'}';
	var customerCartLink = '{$link nofilter}';
    {if !empty($ETS_SC_LINK_SHOPPING_CART)}var ETS_SC_LINK_SHOPPING_CART='{$ETS_SC_LINK_SHOPPING_CART|escape:'quotes':'UTF-8'}';{/if}
</script>
<style>
	{if isset($ETS_SC_BUTTON_TEXT_COLOR)
		&& isset($ETS_SC_BUTTON_TEXT_HOVER_COLOR)
		&& isset($ETS_SC_BUTTON_COLOR)
		&& isset($ETS_SC_BUTTON_HOVER_COLOR)
	}
	#ets_sc_cart_save,
	#ets_sc_btn_share,
	#submit_cart,
	#submit_login,
	.btn.ets_sc_checkout,
	.btn.ets_sc_cancel,
	.btn.ets_sc_delete,
	.btn.ets_sc_load_this_cart,
	button[name="submitSend"]
	{
		{if $ETS_SC_BUTTON_TEXT_COLOR} color: {$ETS_SC_BUTTON_TEXT_COLOR nofilter}; {/if}
		{if $ETS_SC_BUTTON_COLOR} background-color: {$ETS_SC_BUTTON_COLOR nofilter}; {/if}
	}
	#ets_sc_cart_save:hover,
	#ets_sc_btn_share:hover,
	#submit_cart:hover,
	#submit_login:hover,
	.btn.ets_sc_checkout:hover,
	.btn.ets_sc_cancel:hover,
	.btn.ets_sc_delete:hover,
	.btn.ets_sc_load_this_cart:hover,
	button[name="submitSend"]:hover
	{
	{if $ETS_SC_BUTTON_TEXT_HOVER_COLOR} color: {$ETS_SC_BUTTON_TEXT_HOVER_COLOR nofilter}; {/if}
	{if $ETS_SC_BUTTON_HOVER_COLOR} background-color: {$ETS_SC_BUTTON_HOVER_COLOR nofilter}; {/if}
	}
	{/if}
</style>