{*
* 2007-2023 ETS-Soft
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
* versions in the future. If you wish to customize PrestaShop for your
* needs, please contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2023 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
<style>
    .back-to-top .back-icon {
        width: 40px;
        height: 40px;
        position: fixed;
        z-index: 999999;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-flow: column;
        {if $ETS_BUTTON_POSITION|escape:'htmlall':'UTF-8'}
            left: {if $ETS_FLOATING_BY_LEFT|escape:'htmlall':'UTF-8'} {$ETS_FLOATING_BY_LEFT|escape:'htmlall':'UTF-8'}px {else} 50px {/if};
            bottom: {if $ETS_FLOATING_BY_BOTTOM|escape:'htmlall':'UTF-8'} {$ETS_FLOATING_BY_BOTTOM|escape:'htmlall':'UTF-8'}px {else} 50px {/if};
        {else}
            right: {if $ETS_FLOATING_BY_RIGHT|escape:'htmlall':'UTF-8'} {$ETS_FLOATING_BY_RIGHT|escape:'htmlall':'UTF-8'}px {else} 50px {/if};
            bottom: {if $ETS_FLOATING_BY_BOTTOM|escape:'htmlall':'UTF-8'} {$ETS_FLOATING_BY_BOTTOM|escape:'htmlall':'UTF-8'}px {else} 50px {/if};
        {/if}
        border: 1px solid transparent;
        {if $ETS_BUTTON_ICON_SELECT|escape:'htmlall':'UTF-8' == 'icon'}
            background-color: {if $ETS_BUTTON_BACKGROUND_COLOR|escape:'htmlall':'UTF-8'}{$ETS_BUTTON_BACKGROUND_COLOR|escape:'htmlall':'UTF-8'}{else}#4545f7{/if};
        {else}
            background-color: transparent;
        {/if}
        border-radius: {if $ETS_BORDER_TYPE|escape:'htmlall':'UTF-8' == 'circle'} 50% {elseif $ETS_BORDER_TYPE|escape:'htmlall':'UTF-8' == 'rounded'} 3px {else} 0 {/if};
    }
    .back-to-top i,
    .back-to-top .back-icon svg {
        font-size: 24px;
    }
    .back-to-top .back-icon svg path {
        color: {if $ETS_BUTTON_ICON_COLOR|escape:'htmlall':'UTF-8'} {$ETS_BUTTON_ICON_COLOR|escape:'htmlall':'UTF-8'} {else}white{/if} ;
    }
    .back-to-top .back-icon:hover {
        {if $ETS_BUTTON_ICON_SELECT|escape:'htmlall':'UTF-8' == 'icon'}
            background-color: {$ETS_BUTTON_HOVER_COLOR|escape:'htmlall':'UTF-8'};
        {/if}
    }
</style>