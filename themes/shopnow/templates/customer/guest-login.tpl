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
{extends file='page.tpl'}

{block name='page_title'}
  {l s='Guest Order Tracking' d='Shop.Theme.Actions'}
{/block}

{block name='page_content'}
  <form id="guestOrderTrackingForm" action="{$urls.pages.guest_tracking|escape:'html':'UTF-8'}" method="get">
    <header>
      <p>{l s='To track your order, please enter the following information:' d='Shop.Theme.Actions'}</p>
    </header>

    <section class="form-fields">

      <div class="form-group row">
        <label class="col-md-3 form-control-label required">
          {l s='Order Reference:' d='Shop.Forms.Labels'}
        </label>
        <div class="col-md-6">
          <input
            class="form-control"
            name="order_reference"
            type="text"
            size="8"
            value="{if isset($smarty.request.order_reference)}{$smarty.request.order_reference|escape:'html':'UTF-8'}{/if}"
          >
          <div class="form-control-comment">
            {l s='For example: QIIXJXNUI or QIIXJXNUI#1' d='Shop.Theme.Actions'}
          </div>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-md-3 form-control-label required">
          {l s='Email:' d='Shop.Forms.Labels'}
        </label>
        <div class="col-md-6">
          <input
            class="form-control"
            name="email"
            type="email"
            value="{if isset($smarty.request.email)}{$smarty.request.email|escape:'html':'UTF-8'}{/if}"
          >
        </div>
      </div>

    </section>

    <footer class="form-footer text-xs-center clearfix">
      <button class="btn btn-primary" type="submit">
        {l s='Send' d='Shop.Theme.Actions'}
      </button>
    </footer>
  </form>
{/block}
