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
{block name='sitemap_item'}
  <ul{if isset($is_nested)} class="nested"{/if}>
    {foreach $links as $link}
      <li>
        <a class="san-g" id="{$link.id|escape:'html':'UTF-8'}" href="{$link.url|escape:'html':'UTF-8'}" title="{$link.label|escape:'html':'UTF-8'}">
          {$link.label|escape:'html':'UTF-8'}
        </a>
        {if isset($link.children) && $link.children|@count > 0}
          {include file='cms/_partials/sitemap-nested-list.tpl' links=$link.children is_nested=true}
        {/if}
      </li>
    {/foreach}
  </ul>
{/block}
