{*
 * Copyright ETS Software Technology Co., Ltd
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
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
*}
<p><a href="{$link_customer|escape:'html':'UTF-8'}">{$customer_name|escape:'html':'UTF-8'}</a>{if $country_name} ({$country_name|escape:'html':'UTF-8'}){/if}{if $is_verified} <span class="list-action-enable action-enabled" title="{l s='Verified customer' mod='ets_trackingcustomer'}"><i class="fa fa-check icon icon-check"></i></span>{/if}</p>
<p>{$email_customer|escape:'html':'UTF-8'}</p>