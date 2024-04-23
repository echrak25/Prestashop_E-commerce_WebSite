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
<div class="ets_cd_block">
    {if $ETS_CD_TITLE_COUNT_DOWN}
        <div class="title-click">{$ETS_CD_TITLE_COUNT_DOWN|escape:'html':'UTF-8'}</div>
    {/if}
    <div class="ets-cd-countdown alignment-center {if $ETS_CD_DISPLAY_TYPE}{$ETS_CD_DISPLAY_TYPE|escape:'html':'UTF-8'}{else}normal{/if}" data-datetime="{$to_specific_prices|escape:'html':'UTF-8'}" data-text_color="{if $ETS_CD_TIME_UNIT_COLOR}{$ETS_CD_TIME_UNIT_COLOR|escape:'html':'UTF-8'}{else}#ffffff{/if}" data-box_color="{if $ETS_CD_BACKGROUND_COLOR}{$ETS_CD_BACKGROUND_COLOR|escape:'html':'UTF-8'}{else}#0000000{/if}" data-animate-type="{if $ETS_CD_DISPLAY_TYPE}{$ETS_CD_DISPLAY_TYPE|escape:'html':'UTF-8'}{else}normal{/if}" data-trans-days="{l s='Days' mod='ets_countdown'}" data-trans-hours="{l s='Hours' mod='ets_countdown'}"  data-trans-minutes="{l s='Minutes' mod='ets_countdown'}" data-trans-seconds="{l s='Seconds' mod='ets_countdown'}">
        {$to_specific_prices|escape:'html':'UTF-8'}
    </div>
</div>
