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
  {l s='Reset your password' d='Shop.Theme.Actions'}
{/block}

{block name='page_content'}
    <form action="{$urls.pages.password|escape:'html':'UTF-8'}" method="post">

      <section class="form-fields">

        <label>
          <span>{l s='Email address: %email%' d='Shop.Theme.Actions' sprintf=['%email%' => $customer_email|stripslashes]}</span>
        </label>

        <label>
          <span>{l s='New password' d='Shop.Forms.Labels'}</span>
          <input type="password" data-validate="isPasswd" name="passwd" value="">
        </label>

        <label>
          <span>{l s='Confirmation' d='Shop.Forms.Labels'}</span>
          <input type="password" data-validate="isPasswd" name="confirmation" value="">
        </label>

      </section>

      <footer class="form-footer">
        <input type="hidden" name="token" id="token" value="{$customer_token|escape:'html':'UTF-8'}">
        <input type="hidden" name="id_customer" id="id_customer" value="{$id_customer|escape:'html':'UTF-8'}">
        <input type="hidden" name="reset_token" id="reset_token" value="{$reset_token|escape:'html':'UTF-8'}">
        <button type="submit" name="submit">
          {l s='Change Password' d='Shop.Theme.Actions'}
        </button>
      </footer>

    </form>
{/block}

{block name='page_footer'}
  <ul>
    <li><a href="{$urls.pages.authentication|escape:'html':'UTF-8'}">{l s='Back to Login' d='Shop.Theme.Actions'}</a></li>
  </ul>
{/block}
