{*
* 2007-2015 PrestaShop
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
{if isset($reviews) && $reviews}
    <ul class="ets_reviewticker {if $ETS_RT_RTL}rt_rtl{/if} {if $ETS_RT_HIDE_ON_MOBILE}rt_hide_on_mobile{/if} rt_pos_{if $ETS_RT_POSITION}{$ETS_RT_POSITION|escape:'html':'UTF-8'}{else}botton_left{/if} rt_tran_{if $ETS_RT_TRANSITION}{$ETS_RT_TRANSITION|escape:'html':'UTF-8'}{else}slide_up{/if}">
        {foreach from=$reviews item='review'}
            {if $review.alert}
                <li data-id-order-detail="{$review.id_product_comment|intval}">
                    {if $review.image}<a href="{$review.product_link|escape:'html':'UTF-8'}">
                    <img alt="{$review.name|escape:'html':'UTF-8'}" src="{$review.image|escape:'html':'UTF-8'}" /></a>{/if}
                    <div class="rt_alert_content">{$review.alert nofilter}</div>
                    {if $ETS_RT_ALLOW_CLOSE}<div class="ets_rt_close"><span>{l s='Close' mod='ets_reviewticker'}</span></div>{/if}
                </li>
            {/if}
        {/foreach}
    </ul>
{/if}