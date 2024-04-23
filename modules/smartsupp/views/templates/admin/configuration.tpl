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

<div id="smartsupp_configuration" class="panel">
	<header class="header">
		<img src="{$module_dir|escape:'html':'UTF-8'}views/img/smartsupp_logo.png" alt="Smartsupp" />
		<nav>
			<div class="header-user">
				<img class="header-user__avatar" src="{$module_dir|escape:'html':'UTF-8'}views/img/avatar-grey.png" alt="avatar" />
				<span class="header-user__email">
					{$smartsupp_email|escape:'htmlall':'UTF-8'}
				</span>
				<button id="deactivate_chat_do" class="btn btn--sm">
					{l s='Deactivate chat' mod='smartsupp'}
				</button>
			</div>
		</nav>
	</header>

	<main class="main" role="main">
		<div class="main__left">
			<div class="main-all-set">
				<h1 class="main-all-set__h1">
					{l s='All set and running' mod='smartsupp'}
				</h1>
				<p class="main-all-set__text">
					{l s='Congratulations! Smartsupp live chat is already visible on your website.' mod='smartsupp'}
				</p>
				<a href="https://dashboard.smartsupp.com/?utm_source=Prestashop&utm_medium=integration&utm_campaign=link" target="_blank" class="btn btn--primary btn--arrow">
					{l s='Chat with your visitors' mod='smartsupp'}
				</a>
				<p class="main-all-set__bottom-text">
					{l s='or' mod='smartsupp'} <a href="https://app.smartsupp.com/app/settings/chatbox/text?utm_source=Prestashop&utm_medium=integration&utm_campaign=link" target="_blank">{l s='Set up' mod='smartsupp'}</a> {l s='chat box design first' mod='smartsupp'}
				</p>
			</div>
		</div>

		<div class="main__right">
			<img src="{$module_dir|escape:'html':'UTF-8'}views/img/all-done.png">
		</div>
	</main>

</div>
