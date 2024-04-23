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
    .add-to-cart-icon #ets_addToCart {
        position: absolute;
        width: {($ETS_ATC_ICON_SIZE + 10) nofilter}px;
        height: {($ETS_ATC_ICON_SIZE + 10) nofilter}px;
        z-index: 10;
        top: {$ETS_ATC_ADJUST_ICON_TOP nofilter}px;
    {if $ETS_ATC_ICON_POSITION == 'icon-left'}
        left: {$ETS_ATC_ADJUST_ICON_LEFT nofilter}px;
    {else}
        right: {$ETS_ATC_ADJUST_ICON_RIGHT nofilter}px;
    {/if}
        padding-right: 10px;
        padding-left: 3px;
        padding-top: 5px;
    {if $ETS_ATC_ICON_BACKGROUND_BORDER == 'icon-rounded'}
        border-radius: 3px;
    {elseif $ETS_ATC_ICON_BACKGROUND_BORDER =='icon-circle'}
        border-radius: 50%;
    {else}
        border-radius:0;
    {/if}
        background-color: {$ETS_ATC_ICON_BACKGROUND_COLOR nofilter};
    }
    .add-to-cart-icon #ets_addToCart:hover {
        background-color: {$ETS_ATC_ICON_BACKGROUND_COLOR_HOVER nofilter};
    }
    .add-to-cart-icon #ets_addToCart svg {
        width: {$ETS_ATC_ICON_SIZE nofilter}px;
        height: {$ETS_ATC_ICON_SIZE nofilter}px;
        color: {$ETS_ATC_ICON_COLOR nofilter};
        fill: {$ETS_ATC_ICON_COLOR nofilter};
    }
    .add-to-cart-button #ets_addToCart {
        position: relative;
        z-index: 10;
        margin-left: {$ETS_ATC_ADJUST_LEFT nofilter}px;
        margin-top: {$ETS_ATC_ADJUST_TOP nofilter}px;
        margin-right: {$ETS_ATC_ADJUST_RIGHT nofilter}px;
        margin-bottom: {$ETS_ATC_ADJUST_BOTTOM nofilter}px;
    {if $ETS_ATC_BUTTON_POSITION == 'button-left'}
        float: left;
    {elseif $ETS_ATC_BUTTON_POSITION =='button-right'}
        float: right;
    {else}
        width: calc(100% - {($ETS_ATC_ADJUST_LEFT + $ETS_ATC_ADJUST_RIGHT) nofilter}px);
    {/if}
        background-color: {$ETS_ATC_BUTTON_BACKGROUND_COLOR nofilter};
        border: 3px solid {$ETS_ATC_BUTTON_BORDER_COLOR nofilter};
        color: {$ETS_ATC_BUTTON_TEXT_COLOR nofilter};
        {if isset($ETS_ATC_BUTTON_BORDER_RADIUS) && $ETS_ATC_BUTTON_BORDER_RADIUS}
        border-radius: {$ETS_ATC_BUTTON_BORDER_RADIUS nofilter}px;
        {/if}
    }
    .add-to-cart-button #ets_addToCart:hover {
        background-color: {$ETS_ATC_BUTTON_BACKGROUND_HOVER_COLOR nofilter};
        border: 3px solid {$ETS_ATC_BUTTON_BORDER_HOVER_COLOR nofilter};
        color: {$ETS_ATC_BUTTON_TEXT_HOVER_COLOR nofilter};
        {if isset($ETS_ATC_BUTTON_BORDER_RADIUS) && $ETS_ATC_BUTTON_BORDER_RADIUS}
            border-radius: {$ETS_ATC_BUTTON_BORDER_RADIUS nofilter}px;
        {/if}
    }
    .add-to-cart-button #ets_addToCart:hover {
        fill: {$ETS_ATC_BUTTON_TEXT_HOVER_COLOR nofilter};
    }
    .add-to-cart-button svg {
        width: 21px;
        height: 21px;
        fill: {$ETS_ATC_BUTTON_TEXT_COLOR nofilter};
        padding-top: 5px;
        margin-right: 5px;
    }

</style>