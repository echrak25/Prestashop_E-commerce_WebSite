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
<style>
    #sptf-open-popup, .sptf-form-control.sptf-submit {
        {if isset($PH_SENDPRODUCT_TOFRIEND_BUTTON_COLOR) && $PH_SENDPRODUCT_TOFRIEND_BUTTON_COLOR}
            background: {$PH_SENDPRODUCT_TOFRIEND_BUTTON_COLOR|escape:'html':'UTF-8'};
        {else}
            background: #2fb5d2;
        {/if}
        {if isset($PH_SENDPRODUCT_TOFRIEND_TEXT_COLOR) && $PH_SENDPRODUCT_TOFRIEND_TEXT_COLOR}
            color: {$PH_SENDPRODUCT_TOFRIEND_TEXT_COLOR|escape:'html':'UTF-8'};
        {else}
            color: white;
        {/if}
    }
    #sptf-open-popup {
    {if isset($PH_SENDPRODUCT_TOFRIEND_BUTTON_BORDER_RADIUS) && $PH_SENDPRODUCT_TOFRIEND_BUTTON_BORDER_RADIUS}
        border-radius: {$PH_SENDPRODUCT_TOFRIEND_BUTTON_BORDER_RADIUS|escape:'html':'UTF-8'}px;
    {else}
        border-radius: 3px;
    {/if}
    }
    #sptf-open-popup:hover, .sptf-form-control.sptf-submit:hover {
        {if isset($PH_SENDPRODUCT_TOFRIEND_BUTTON_HOVER_COLOR) && $PH_SENDPRODUCT_TOFRIEND_BUTTON_HOVER_COLOR}
            background: {$PH_SENDPRODUCT_TOFRIEND_BUTTON_HOVER_COLOR|escape:'html':'UTF-8'};
        {else}
            background: #2fb5d2;
        {/if}
        {if isset($PH_SENDPRODUCT_TOFRIEND_TEXT_HOVER_COLOR) && $PH_SENDPRODUCT_TOFRIEND_TEXT_HOVER_COLOR}
            color: {$PH_SENDPRODUCT_TOFRIEND_TEXT_HOVER_COLOR|escape:'html':'UTF-8'};
        {else}
            color: white;
        {/if}
    }
</style>