{*
 * Smartsupp Live Chat integration module.
 * 
 * @package   Smartsupp
 * @author    Smartsupp <vladimir@smartsupp.com>
 * @link      http://www.smartsupp.com
 * @copyright 2016 Smartsupp.com
 * @license   GPL-2.0+
 *
 * Plugin Name:       Smartsupp Live Chat
 * Plugin URI:        http://www.smartsupp.com
 * Description:       Adds Smartsupp Live Chat code to PrestaShop.
 * Version:           2.2.0
 * Author:            Smartsupp
 * Author URI:        http://www.smartsupp.com
 * Text Domain:       smartsupp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 *}

<script type="text/javascript">
    var ajax_controller_url = "{$ajax_controller_url|escape:'htmlall':'UTF-8'}";    
</script>

<input id="smartsupp_key" type="hidden" value="{$smartsupp_key|escape:'htmlall':'UTF-8'}">

<div id="smartsupp_create_account" class="panel">
	<header class="header">
		<img src="{$module_dir|escape:'html':'UTF-8'}views/img/smartsupp_logo.png" alt="Smartsupp" />
		<nav>
			<div class="header-user">
				<span class="header-user__email">
					{l s='Already have an account?' mod='smartsupp'}
				</span>
				<button id="connect_existing_account_btn2" class="btn btn--sm">
					{l s='Log in' mod='smartsupp'}
				</button>
			</div>
		</nav>
		<div class="navbar-toggle">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
	</header>

	<main class="main" role="main">
		<div class="main__left">
			<div class="main-form">
				<h1 class="main-form__h1">
					{l s='Create a free account' mod='smartsupp'}
				</h1>
				<p class="main-form__top-text">
					{l s='Start personal conversation with your visitors today.' mod='smartsupp'}
				</p>
				<div class="form-horizontal">
					<div class="alerts">
						<div class="alert alert-danger js-clear"></div>
					</div>
					<input id="SMARTSUPP_EMAIL" type="email" value="" name="SMARTSUPP_EMAIL" placeholder="{l s='E-mail:' mod='smartsupp'}" class="input" required>
					<input id="SMARTSUPP_PASSWORD" type="password" value="" name="SMARTSUPP_PASSWORD" placeholder="{l s='Password:' mod='smartsupp'}" class="input" required>
					<label id="SMARTSUPP_MKT_LABEL" class="checkbox">
						<input id="SMARTSUPP_MKT" type="checkbox" value="" name="SMARTSUPP_MKT" class="checkbox__input">
						<div class="checkbox__shape"></div>
						<div class="checkbox__title checkbox__title--small">
							{l s='I want to get tips on how to use Smartsupp chat to the maximum and do excellent customer care' mod='smartsupp'}
						</div> 
					</label>
					<button id="create_account_do" class="btn btn--primary btn--arrow btn--all-width">
						{l s='Create a free account' mod='smartsupp'}
					</button>
                    <p class="main-form__bottom-text">
						<span>
							{l s='I have read and agree with' mod='smartsupp'} <a href="https://www.smartsupp.com/terms" target="_blank">{l s='Terms' mod='smartsupp'}</a> {l s='and' mod='smartsupp'} <a href="https://www.smartsupp.com/dpa" target="_blank">{l s='DPA' mod='smartsupp'}</a></label>
                        </span>
					</p>
				</div>
			</div>
        </div>

		<div class="main__right">
			<img src="{$module_dir|escape:'html':'UTF-8'}views/img/tablet-screen.png">
		</div>
	</main>

	{include file='./includes/features.tpl'}
	{include file='./includes/clients.tpl'}

</div>