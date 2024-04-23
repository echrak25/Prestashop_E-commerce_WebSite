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
{extends file='customer/order-detail.tpl'}

{block name='page_title'}
  {l s='Guest Tracking' d='Shop.Theme.Actions'}
{/block}

{block name='order_detail'}
  {include file='customer/_partials/order-detail-no-return.tpl'}
{/block}

{block name='order_messages'}
{/block}

{block name='page_content' append}
  {block name='guest_to_customer'}
    <form action="{$urls.pages.guest_tracking|escape:'html':'UTF-8'}" method="post">
      <header>
        <h1 class="h3">{l s='Transform your guest account into a customer account and enjoy:' d='Shop.Theme.Actions'}</h1>
        <ul>
          <li> -{l s='Personalized and secure access' d='Shop.Theme.Actions'}</li>
          <li> -{l s='Fast and easy checkout' d='Shop.Theme.Actions'}</li>
          <li> -{l s='Easier merchandise return' d='Shop.Theme.Actions'}</li>
        </ul>
      </header>

      <section class="form-fields">

        <label>
          <span>{l s='Set your password:' d='Shop.Forms.Labels'}</span>
          <input type="password" data-validate="isPasswd" name="password" value="">
        </label>

      </section>

      <footer class="form-footer">
        <input type="hidden" name="submitTransformGuestToCustomer" value="1">
        <input type="hidden" name="id_order" value="{$order.details.id|escape:'html':'UTF-8'}">
        <input type="hidden" name="order_reference" value="{$order.details.reference|escape:'html':'UTF-8'}">
        <input type="hidden" name="email" value="{$guest_email|escape:'html':'UTF-8'}">

        <button class="btn btn-primary" type="submit">{l s='Send' d='Shop.Theme.Actions'}</button>
      </footer>

    </form>
  {/block}
{/block}
