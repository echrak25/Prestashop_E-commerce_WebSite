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

<div class="ets_sc_overload2">
	<div class="table">
		<div class="table-cell">
			<div class="ets_sc_content">
				<span class="ets_sc_close">{l s='Close' mod='ets_savemycart'}</span>
				<div class="ets_sc_sendmail_form ets_sc_sendmail">
					<form id="ets_shoppingcart_email_form" method="post" enctype="multipart/form-data" action="{$form_url nofilter}" novalidate>
						<div class="panel-heading">
							<h3 class="title">{l s='Send this shopping cart to friends' mod='ets_savemycart'}</h3>
						</div>
						<div class="ets-sp-panel-msg"></div>
						<div class="panel-body">
							<div class="form-group">
								<label for="name" class="required">{l s='Recipient name' mod='ets_savemycart'}</label>
								<input type="text" name="name" id="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="email" class="required">{l s='Email address' mod='ets_savemycart'}</label>
								<input type="text" name="email" id="email" class="form-control">
							</div>
							{if isset($idCart) && $idCart}<input style="visibility: hidden" class="hidden" name="id_cart"  value="{$idCart nofilter}">{/if}
						</div>
						<div class="panel-footer">
							<button name="submitSend" type="submit" value="1"
							        class="btn btn-primary">{l s='Send shopping cart now' mod='ets_savemycart'}</button>
						</div>
					</form>
				</div>
				<div class="ets_sc_sendmail_result ets_sc_sendmail">
					<h3 class="title">{l s='Great news, your shopping cart was successfully sent!' mod='ets_savemycart'}</h3>
					<div class="panel-footer">
						<a href="{$product_link nofilter}"
						   class="btn btn-primary">{l s='Continue shopping' mod='ets_savemycart'}</a>
						<a href="{$shopping_cart_link nofilter}"
						   class="btn btn-primary">{l s='Go to checkout' mod='ets_savemycart'}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
