{*
* 2007-2022 ETS-Soft
*
* NOTICE OF LICENSE
*
* This file is not open source! Each license that you purchased is only available for 1 wesite only.
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
*  @copyright  2007-2022 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
{if $ETS_WA_NUMBER_PHONE}
    {literal}
        <style>
            .ets_wa_whatsapp_block.right_center{
                right:{/literal}{if $ETS_WA_ADJUST_RIGHT}{$ETS_WA_ADJUST_RIGHT|intval}px{else}0{/if}{literal};
                bottom:50%;
            }
            .ets_wa_whatsapp_block.right_bottom{
                right:{/literal}{if $ETS_WA_ADJUST_RIGHT}{$ETS_WA_ADJUST_RIGHT|intval}px{else}0{/if}{literal};
                bottom:{/literal}{if $ETS_WA_ADJUST_BOTTOM}{$ETS_WA_ADJUST_BOTTOM|intval}px{else}0{/if}{literal};
            }
            .ets_wa_whatsapp_block.left_center{
                left:{/literal}{if $ETS_WA_ADJUST_LEFT}{$ETS_WA_ADJUST_LEFT|intval}px{else}0{/if}{literal};
                bottom:50%;
            }
            .ets_wa_whatsapp_block.left_bottom{
                left:{/literal}{if $ETS_WA_ADJUST_LEFT}{$ETS_WA_ADJUST_LEFT|intval}px{else}0{/if}{literal};
                bottom:{/literal}{if $ETS_WA_ADJUST_BOTTOM}{$ETS_WA_ADJUST_BOTTOM|intval}px{else}0{/if}{literal};
            }
        </style>
    {/literal}
    <div class="ets_wa_whatsapp_block {$ETS_WA_DISPLAY_POSITION|escape:'html':'UTF-8'}">
        <a target="_blank" data-mobile-href="https://api.whatsapp.com/send?phone={$ETS_WA_COUNTRY->call_prefix|escape:'html':'UTF-8'}{$ETS_WA_NUMBER_PHONE|escape:'html':'UTF-8'}{if $ETS_WA_SEND_CURRENT_URL}&text={$ETS_WA_SEND_CURRENT_URL|escape:'html':'UTF-8'}{/if}" href="https://web.whatsapp.com/send?phone={$ETS_WA_COUNTRY->call_prefix|escape:'html':'UTF-8'}{$ETS_WA_NUMBER_PHONE|escape:'html':'UTF-8'}{if $ETS_WA_SEND_CURRENT_URL}&text={$ETS_WA_SEND_CURRENT_URL|escape:'html':'UTF-8'}{/if}">
            <img src="{$link->getMediaLink("`$smarty.const._MODULE_DIR_`ets_whatsapp/views/img/whatsapp.png")|escape:'html':'UTF-8'}" />
        </a>
        {if $ETS_WA_DISPLAY_TITLE}
            <p class="ets_wa_title">{$ETS_WA_DISPLAY_TITLE|escape:'html':'UTF-8'}</p>
        {/if}
    </div>
{/if}