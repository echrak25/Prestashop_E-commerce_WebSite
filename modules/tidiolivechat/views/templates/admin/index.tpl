{*
* 2007-2021 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
-* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2021 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<script type="text/javascript">
    const apiUrl = "{$apiUrl|escape:'javascript':'UTF-8'}";
    const panelUrl = "{$panelUrl|escape:'javascript':'UTF-8'}";
    const moduleStatus = "{$moduleStatus|escape:'javascript':'UTF-8'}"; // values: nonintegrated, integrated
    const validationErrorMessages = {
        canNotBeEmpty: "{l s='Can’t be empty!' mod='tidiolivechat' js=1}",
        emailCanNotBeEmpty: "{l s='Email can’t be empty!' mod='tidiolivechat' js=1}",
        passwordCanNotBeEmpty: "{l s='Password can’t be empty!' mod='tidiolivechat' js=1}",
        emailIsInvalid: "{l s='Email is invalid!' mod='tidiolivechat' js=1}",
    };
    const buttonTexts = {
        integrateWithTidio: "{l s='Integrate with Tidio' mod='tidiolivechat' js=1}",
        loading: "{l s='Loading...' mod='tidiolivechat' js=1}",
        letsGo: "{l s='Let’s go' mod='tidiolivechat' js=1}",
    };
</script>

<div id="tidio-wrapper">
    <div class="tidio-box-wrapper">
        <div class="tidio-box tidio-box-actions">
            <div class="logos">
                <div class="logo logo-tidio"></div>
                <div class="logo logo-prestashop"></div>
            </div>

            <form novalidate id="tidio-start">
                <h1>{l s='Start using Tidio' mod='tidiolivechat'}</h1>
                <input type="email" id="email" placeholder="{l s='Email address' mod='tidiolivechat'}" required/>
                <div class="helper">{l s='For example' mod='tidiolivechat'} tidius@tidio.com</div>
                <div class="error"></div>
                <button>{l s='Let’s go' mod='tidiolivechat'}</button>
            </form>

            <form novalidate id="tidio-login">
                <h1>{l s='Log into your account' mod='tidiolivechat'}</h1>
                <input type="email" id="email" placeholder="{l s='Email address' mod='tidiolivechat'}" required/>
                <div class="helper">{l s='For example' mod='tidiolivechat'} tidius@tidio.com</div>
                <input type="password" id="password" placeholder="{l s='Password' mod='tidiolivechat'}" required/>
                <div class="helper"></div>
                <div class="error"></div>
                <button>{l s='Integrate with Tidio' mod='tidiolivechat'}</button>
                <a href="" id="forgot-password-link" class="button btn-link" target="_blank">{l s='Forgot password?' mod='tidiolivechat'}</a>
            </form>

            <form novalidate id="tidio-project">
                <h1>{l s='Choose your project' mod='tidiolivechat'}</h1>
                <p>{l s='Please choose the project you’d like to use in your store.' mod='tidiolivechat'}</p>
                <p>{l s='Some of your existing projects may already be connected with other platforms (e.g. Shopify, WordPress) and cannot be used in PrestaShop.' mod='tidiolivechat'}</p>
                <p>{l s='However, if you wish to use an account you have already used on another platform, please contact our support.' mod='tidiolivechat'}</p>
                <div class="custom-select" id="tidio-custom-select">
                    <select name="select-tidio-project" id="select-tidio-project">
                        <option selected="selected" disabled>{l s='Pick one from the list' mod='tidiolivechat'}&hellip;</option>
                    </select>
                </div>
                <div class="error"></div>
                <button disabled>{l s='Integrate with Tidio' mod='tidiolivechat'}</button>
                <button type="button" id="start-over" class="btn-link">{l s='Start all over again' mod='tidiolivechat'}</button>
            </form>

            <form novalidate id="tidio-new-email">
                <h1>{l s='Start using Tidio' mod='tidiolivechat'}</h1>
                <p>{l s='We have detected that the email address provided has already been used to install Tidio on another platform (e.g. Shopify, WordPress).' mod='tidiolivechat'}</p>
                <p>
                    <strong>{l s='In order to ensure correct operation, please enter a new email address.' mod='tidiolivechat'}</strong>
                </p>
                <p>{l s='However, if you wish to use an account you have already used on another platform, please contact our support.' mod='tidiolivechat'}</p>
                <input type="email" id="email" placeholder="{l s='Email address' mod='tidiolivechat'}" required/>
                <div class="helper">{l s='For example' mod='tidiolivechat'} tidius@tidio.com</div>
                <div class="error"></div>
                <button>{l s='Let’s go' mod='tidiolivechat'}</button>
            </form>

            <form id="after-install-text">
                <h1>{l s='Start using Tidio' mod='tidiolivechat'}</h1>
                <p>{l s='Tidio Live Chat widget is now installed and visible on your website.' mod='tidiolivechat'}</p>
                <p>
                    <strong>{l s='Open the Tidio panel to talk to your visitors, create and run chatbots, customize the widget and many more...' mod='tidiolivechat'}</strong>
                </p>
                <a href="" id="open-panel-link" class="button" target="_blank">{l s='Open Tidio Panel' mod='tidiolivechat'}</a>
            </form>
        </div>
        <div class="tidio-box tidio-box-chat">
            <h2>{l s='Customer service is great, but it’s [1]even better[/1] when it’s combined with higher sales' mod='tidiolivechat' tags=['<strong>']}</h2>
            <div class="tidio-box-chat-image"/>
        </div>
    </div>
</div>
