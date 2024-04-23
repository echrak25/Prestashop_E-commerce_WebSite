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

<div class="savecart_bottom_page">
    {if isset($save_cart_html) && $save_cart_html}
        {$save_cart_html nofilter}
    {/if}
    {if isset($isShareable) && $isShareable}
    <button id="ets_sc_btn_share" name="shareCart" type="button" class="btn btn-primary pull-right">
        {l s='Share your shopping cart' mod='ets_savemycart'}
    </button>
    {/if}
</div>