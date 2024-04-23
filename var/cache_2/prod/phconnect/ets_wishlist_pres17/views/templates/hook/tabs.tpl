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
<ul class="ets_wlp_tabs">
    <li class="tab tab_settings{if $current_tab=='settings'} active{/if}">
        <a href="{$link_config|escape:'html':'UTF-8'}&current_tab=settings">
             {l s='Settings' mod='ets_wishlist_pres17'}
        </a>
    </li>
    <li class="tab tab_settings{if $current_tab=='statistics'} active{/if}">
        <a href="{$link_config|escape:'html':'UTF-8'}&current_tab=statistics">
             {l s='Statistics' mod='ets_wishlist_pres17'}
        </a>
    </li>
</ul>
<div class="ets_wlp_tabs_height"></div>