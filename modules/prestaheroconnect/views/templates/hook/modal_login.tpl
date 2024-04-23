{*
* 2007-2024 PrestaHero
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
* versions in the future. If you wish to customize PrestaShop for your
* needs please, contact us for extra customization service at an affordable price
*
*  @author PrestaHero <etssoft.jsc@gmail.com>
*  @copyright  2007-2024 PrestaHero
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of PrestaHero
*}

<div class="modal fade" tabindex="-1" role="dialog" id="phConLoginAddons">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="{l s='Close' mod='prestaheroconnect'}"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{l s='Connect to PrestaHero' mod='prestaheroconnect'}</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    {l s='Login using the account you have registered on the website' mod='prestaheroconnect'}<a href="https://prestahero.com/" target="_blank" style="padding: 0px 5px;">PrestaHero.com</a>
                </div>
                <form method="POST" action="">
                    <div class="errors"></div>
                    <div class="form-group">
                        <label>{l s='Email' mod='prestaheroconnect'}</label>
                        <input type="email" name="ph_email" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>{l s='Password' mod='prestaheroconnect'}</label>
                        <input type="password" name="ph_password" required class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked="checked" name="remember_me" value="1">
                                {l s='Remember me' mod='prestaheroconnect'}
                            </label>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary js-ph-con-submit-account-addons">{l s='Connect' mod='prestaheroconnect'}</button>
                    </div>
                    <div class="form-group form-group_action_pass_acc text-center">
                        <a class="forgot_password" href="https://prestahero.com/en/password-recovery" target="_blank">{l s='Forgot your password?' mod='prestaheroconnect'}</a>
                        <a class="create_account" href="https://prestahero.com/en/login?create_account=1" target="_blank">{l s='Create account' mod='prestaheroconnect'}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>