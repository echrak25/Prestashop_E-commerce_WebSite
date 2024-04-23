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
<article id="address-{$address.id|escape:'html':'UTF-8'}" class="address" data-id-address="{$address.id|escape:'html':'UTF-8'}">
  <div class="address-body">
    <h4>{$address.alias|escape:'html':'UTF-8'}</h4>
    <address>{$address.formatted nofilter}</address>
  </div>
  <div class="address-footer">
    <a href="{url entity=address id=$address.id}" data-link-action="edit-address">
      <i class="material-icons">&#xE254;</i>
      <span>{l s='Update' d='Shop.Theme.Actions'}</span>
    </a>
    <a href="{url entity=address id=$address.id params=['delete' => 1, 'token' => $token]}" data-link-action="delete-address">
      <i class="material-icons">&#xE872;</i>
      <span>{l s='Delete' d='Shop.Theme.Actions'}</span>
    </a>
  </div>
</article>
