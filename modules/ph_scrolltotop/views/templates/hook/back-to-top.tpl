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
{if $ETS_SCROLLTOTOP_LIVE_MODE}
    <div class="back-to-top">
        <a href="#">
            {if $ETS_BUTTON_ICON_SELECT == 'icon'}
            <span class="back-icon">
            <i class="{if $ETS_BUTTON_ICON}fa {$ETS_BUTTON_ICON|escape:'html':'UTF-8'}{else}fa fa-arrow-circle-up{/if}" aria-hidden="true"></i>
      {else}
        <span class="back-icon"
              style="
                      background-image: url({$ETS_CUSTOM_ICON|escape:'html':'UTF-8'});
                      background-repeat: no-repeat;
                      background-position: center;
                      background-size: cover;
                      width: 40px;
                      height: 40px;
                      ">
      {/if}
        </span>
        </a>
    </div>
{/if}
