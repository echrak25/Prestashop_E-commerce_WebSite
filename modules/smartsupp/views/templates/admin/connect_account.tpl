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

<div id="smartsupp_connect_account" class="panel">
	<header class="header">
		<img src="{$module_dir|escape:'html':'UTF-8'}views/img/smartsupp_logo.png" alt="Smartsupp" />
		<nav>
			<div class="header-user">
				<span class="header-user__email">
					{l s='Not a Smartsupp user yet?' mod='smartsupp'}
				</span>
				<button id="create_account_btn2" class="btn btn--sm">
					{l s='Create a free account' mod='smartsupp'}
				</button>
			</div>
		</nav>
	</header>

	<main class="main" role="main">
		<div class="main__left">
			<div class="main-form">
				<h1 class="main-form__h1">
					{l s='Log in' mod='smartsupp'}
				</h1>
				<div id="smartsupp-login-alerts" class="alerts">
					<div id="smartsupp-login-alert" class="alert alert-danger js-clear"></div>
				</div>
				<div class="form-horizontal">
					<input id="SMARTSUPP_EMAIL" type="email" value="" name="SMARTSUPP_EMAIL" placeholder="{l s='E-mail:' mod='smartsupp'}" class="input" required>
					<input id="SMARTSUPP_PASSWORD" type="password" value="" name="SMARTSUPP_PASSWORD" placeholder="{l s='Password:' mod='smartsupp'}" class="input" required>
					<button id="connect_existing_account_do" class="btn btn--primary btn--arrow btn--all-width">
						{l s='Log in' mod='smartsupp'}
					</button>
                    <p class="main-form__bottom-text">
						<span>
							<a href="https://app.smartsupp.com/app/sign/reset" target="_blank" class="link">
								{l s='I forgot my password' mod='smartsupp'}
							</a>
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