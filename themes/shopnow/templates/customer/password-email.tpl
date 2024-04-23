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
  {l s='Forgot your password?' d='Shop.Theme.Actions'}
{/block}

{block name='page_content'}
  <form action="{$urls.pages.password|escape:'html':'UTF-8'}" method="post">

    <header>
      <p>{l s='Please enter the email address you used to register. You will receive a temporary link to reset your password.' d='Shop.Theme.Actions'}</p>
    </header>

    <section class="form-fields">
      <div class="form-group row">
        <label class="col-md-3 form-control-label required">{l s='Email address' d='Shop.Forms.Labels'}</label>
        <div class="col-md-5">
          <input type="email" name="email" id="email" value="{if isset($smarty.post.email)}{$smarty.post.email|escape:'html':'UTF-8'}{/if}" class="form-control" required>
        </div>
      </div>
    </section>

    <footer class="form-footer text-xs-center">
      <button class="form-control-submit btn btn-primary" name="submit" type="submit">
        {l s='Send reset link' d='Shop.Theme.Actions'}
      </button>
    </footer>

  </form>
{/block}

{block name='page_footer'}
  <a href="{$urls.pages.my_account|escape:'html':'UTF-8'}" class="account-link">
    <i class="material-icons">&#xE5CB;</i>
    <span>{l s='Back to login' d='Shop.Theme.Actions'}</span>
  </a>
{/block}
