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

<div class="atc_div {if $ETS_ATC_DISPLAY_TYPE}add-to-cart-icon {else}add-to-cart-button {/if}">
    <input name="qty" type="hidden" class="form-control ets_atc_qty" value="1" onfocus="if(this.value == '1') this.value = '';" onblur="if(this.value == '') this.value = '1';"/>
    <button id="ets_addToCart" class="btn btn-primary">
        {if $ETS_ATC_DISPLAY_TYPE}
        {$icons[$ETS_ATC_ICON_STYLE_ICON] nofilter}
        {else}
            {if $ETS_ATC_BUTTON_ICON == '1'}
                    {$ETS_ATC_BUTTON_LABEL[$id_language]|escape:'html':'UTF-8'}
            {elseif $ETS_ATC_BUTTON_ICON == '2'}
                    {$icons['fa-cart-plus'] nofilter}
                {$ETS_ATC_BUTTON_LABEL[$id_language]|escape:'html':'UTF-8'}
            {elseif $ETS_ATC_BUTTON_ICON == '3'}
                {$icons['fa-opencart'] nofilter}
                {$ETS_ATC_BUTTON_LABEL[$id_language]|escape:'html':'UTF-8'}
            {elseif $ETS_ATC_BUTTON_ICON == '4'}
                {$icons['fa-shopping-bag'] nofilter}
                {$ETS_ATC_BUTTON_LABEL[$id_language]|escape:'html':'UTF-8'}
            {/if}
        {/if}
    </button>

</div>