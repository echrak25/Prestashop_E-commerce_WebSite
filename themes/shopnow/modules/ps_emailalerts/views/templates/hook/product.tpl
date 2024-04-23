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
<div class="js-mailalert" data-url="{url entity='module' name='ps_emailalerts' controller='actions' params=['process' => 'add']}">
	{if isset($email) AND $email}
        <span class="control-label">{l s='Mail to' }</span>
		<input type="email" placeholder="{l s='your@email.com' d='Modules.Mailalerts.Shop'}"/>
	{/if}
  <input type="hidden" value="{$id_product|escape:'html':'UTF-8'}"/>
  <input type="hidden" value="{$id_product_attribute|escape:'html':'UTF-8'}"/>
	<a href="#" rel="nofollow" onclick="return addNotification();">{l s='Notify me when available' d='Modules.Mailalerts.Shop'}</a>
	<span class="hidden" style="display:none;"></span>
</div>
