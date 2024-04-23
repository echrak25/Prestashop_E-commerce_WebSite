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
{if $manufacturers}
    <div id="ybc-mnf-block" class="col-md-12 col-xs-12">
        <h4 class="h1 products-section-title text-uppercase"><span>{$YBC_MF_TITLE|escape:'html':'UTF-8'}</span></h4>
        <ul id="ybc-mnf-block-ul" class="">
        	{foreach from=$manufacturers item=manufacturer}
        		<li class="ybc-mnf-block-li">
                    <a class="ybc-mnf-block-a-img" href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'html':'UTF-8'}"><img src="{$manufacturer.image|escape:'html':'UTF-8'}" alt="" /></a>
                    {if $YBC_MF_SHOW_NAME}<a class="ybc-mnf-block-a-name" href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'html':'UTF-8'}">{$manufacturer.name|escape:'html':'UTF-8'}</a>{/if}
                </li>
        	{/foreach}
        </ul>
    </div>
{/if}