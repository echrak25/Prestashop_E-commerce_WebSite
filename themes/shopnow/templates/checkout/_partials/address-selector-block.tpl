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
{foreach $addresses as $address}
  <article
    class="address-item{if $address.id == $selected} selected{/if}"
    id="{$name|classname}-address-{$address.id|escape:'html':'UTF-8'}"
  >
    <header class="h4">
      <label class="radio-block">
        <span class="custom-radio">
          <input
            type="radio"
            name="{$name|escape:'html':'UTF-8'}"
            value="{$address.id|escape:'html':'UTF-8'}"
            {if $address.id == $selected}checked{/if}
          >
          <span></span>
        </span>
        <span class="address-alias h4">{$address.alias|escape:'html':'UTF-8'}</span>
        <div class="address">{$address.formatted nofilter}</div>
      </label>
    </header>
    <hr>
    <footer class="address-footer">
      {if $interactive}
        <a
          class="edit-address text-muted"
          data-link-action="edit-address"
          href="{url entity='order' params=['id_address' => $address.id, 'editAddress' => $type, 'token' => $token]}"
        >
          <i class="material-icons edit">&#xE254;</i>{l s='Edit' d='Shop.Theme.Actions'}
        </a>
        <a
          class="delete-address text-muted"
          data-link-action="delete-address"
          href="{url entity='order' params=['id_address' => $address.id, 'deleteAddress' => true, 'token' => $token]}"
        >
          <i class="material-icons delete">&#xE872;</i>{l s='Delete' d='Shop.Theme.Actions'}
        </a>
      {/if}
    </footer>
  </article>
{/foreach}
{if $interactive}
  <p>
    <button class="ps-hidden-by-js form-control-submit center-block" type="submit">{l s='Save' d='Shop.Theme.Actions'}</button>
  </p>
{/if}
