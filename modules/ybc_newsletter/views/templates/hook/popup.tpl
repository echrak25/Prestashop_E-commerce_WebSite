{*
* 2007-2017 PrestaShop
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
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if $YBC_NEWSLETTER_TEMPLATE == 'ynpt1'}
    {include file="$YBC_NEWSLETTER_TPL/hook/template1.tpl"}
{elseif $YBC_NEWSLETTER_TEMPLATE == 'ynpt2'}
    {include file="$YBC_NEWSLETTER_TPL/hook/template2.tpl"}
{elseif $YBC_NEWSLETTER_TEMPLATE == 'ynpt3'}
    {include file="$YBC_NEWSLETTER_TPL/hook/template3.tpl"}
{elseif $YBC_NEWSLETTER_TEMPLATE == 'ynpt4'}
    {include file="$YBC_NEWSLETTER_TPL/hook/template4.tpl"}
{elseif $YBC_NEWSLETTER_TEMPLATE == 'ynpt5'}
    {include file="$YBC_NEWSLETTER_TPL/hook/template5.tpl"}
{elseif $YBC_NEWSLETTER_TEMPLATE == 'ynpt6'}
    {include file="$YBC_NEWSLETTER_TPL/hook/template6.tpl"}
{elseif $YBC_NEWSLETTER_TEMPLATE == 'ynpt8'}
    {include file="$YBC_NEWSLETTER_TPL/hook/template8.tpl"}       
{/if}
<script type="text/javascript">
    var YBC_NEWSLETTER_POPUP_DELAY ={$YBC_NEWSLETTER_POPUP_DELAY|escape:'html':'UTF-8'};
    var YBC_NEWSLETTER_POPUP_TYPE_SHOW = 'ybc_type_{$YBC_NEWSLETTER_POPUP_TYPE_SHOW|escape:'html':'UTF-8'}';
    var YBC_NEWSLETTER_POPUP_TYPE_SHOW_PARENT = 'ybc_parent_type_{$YBC_NEWSLETTER_POPUP_TYPE_SHOW|escape:'html':'UTF-8'}';
    var YBC_NEWSLETTER_CLOSE_PERMANAL ={$YBC_NEWSLETTER_CLOSE_PERMANAL|intval};
</script>