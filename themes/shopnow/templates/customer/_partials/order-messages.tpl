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
{if $order.messages}
<div class="box messages">
  <h3>{l s='Messages' d='Shop.Theme.Actions'}</h3>
  {foreach from=$order.messages item=message}
    <div class="message row">
      <div class="col-sm-4">
        {$message.name|escape:'html':'UTF-8'}<br/>
        {$message.message_date|escape:'html':'UTF-8'}
      </div>
      <div class="col-sm-8">
        {$message.message nofilter}
      </div>
    </div>
  {/foreach}
</div>
{/if}

<section class="order-message-form box">
  <form action="{$urls.pages.order_detail|escape:'html':'UTF-8'}" method="post">

    <header>
      <h3>{l s='Add a message' d='Shop.Theme.Actions'}</h3>
      <p>{l s='If you would like to add a comment about your order, please write it in the field below.' d='Shop.Theme.Actions'}</p>
    </header>

    <section class="form-fields">

      <div class="form-group row">
        <label class="col-md-3 form-control-label">{l s='Product' d='Shop.Forms.Labels'}</label>
        <div class="col-md-5">
          <select name="id_product" class="form-control form-control-select">
            <option value="0">{l s='-- please choose --' d='Shop.Forms.Labels'}</option>
            {foreach from=$order.products item=product}
              <option value="{$product.id_product|escape:'html':'UTF-8'}">{$product.name|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-md-3 form-control-label"></label>
        <div class="col-md-9">
          <textarea rows="3" name="msgText" class="form-control"></textarea>
        </div>
      </div>

    </section>

    <footer class="form-footer text-xs-center">
      <input type="hidden" name="id_order" value="{$order.details.id|escape:'html':'UTF-8'}">
      <button type="submit" name="submitMessage" class="btn btn-primary form-control-submit">
        {l s='Send' d='Shop.Theme.Actions'}
      </button>
    </footer>

  </form>
</section>
