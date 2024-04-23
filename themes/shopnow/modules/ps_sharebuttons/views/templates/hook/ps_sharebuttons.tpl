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
{block name='social_sharing'}
  {if $social_share_links}
      {if isset($tc_config.YBC_TC_SOCIAL_SHARING) && $tc_config.YBC_TC_SOCIAL_SHARING == 1}
      <div class="line clearfix"></div>
        <div class="social-sharing">
          <span>{l s='Share' d='Shop.Theme.Actions'}</span>
          <ul>
            {foreach from=$social_share_links item='social_share_link'}
              <li class="{$social_share_link.class|escape:'html':'UTF-8'} icon-gray">
                <a href="{$social_share_link.url|escape:'html':'UTF-8'}" class="text-hide" title="{$social_share_link.label|escape:'html':'UTF-8'}" target="_blank">
                    {$social_share_link.label|escape:'html':'UTF-8'}
                </a>
              </li>
            {/foreach}
          </ul>
        </div>
      {/if}
  {/if}
{/block}
{hook h='productcustom' product=$product}