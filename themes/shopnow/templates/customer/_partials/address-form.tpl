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
<div class="js-address-form">
  {include file='_partials/form-errors.tpl' errors=$errors['']}

  <form
    method="POST"
    action="{url entity='address' params=['id_address' => $id_address]}"
    data-id-address="{$id_address|escape:'html':'UTF-8'}"
    data-refresh-url="{url entity='address' params=['ajax' => 1, 'action' => 'addressForm']}"
  >
    <section class="form-fields">
      {block name='form_fields'}
        {foreach from=$formFields item="field"}
          {block name='form_field'}
            {form_field field=$field}
          {/block}
        {/foreach}
      {/block}
    </section>

    <footer class="form-footer clearfix">
      <input type="hidden" name="submitAddress" value="1">
      {block name='form_buttons'}
        <button class="btn btn-primary pull-xs-right" type="submit" class="form-control-submit">
          {l s='Save' d='Shop.Theme.Actions'}
        </button>
      {/block}
    </footer>
  </form>
</div>
