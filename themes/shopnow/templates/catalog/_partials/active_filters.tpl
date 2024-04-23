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
<section id="js-active-search-filters" class="{if $activeFilters|count}active_filters{else}hide{/if}">
  <h4 class="h6 active-filter-title">{l s='Active filters' d='Shop.Theme.Actions'}</h4>
  {if $activeFilters|count}
    <ul>
      {foreach from=$activeFilters item="filter"}
        <li class="filter-block">{l s='%1$s: ' d='Shop.Theme.Catalog' sprintf=[$filter.facetLabel]} {$filter.label|escape:'html':'UTF-8'} <a class="js-search-link" href="{$filter.nextEncodedFacetsURL|escape:'html':'UTF-8'}">
        <i class="material-icons close">close</i></a></li>
      {/foreach}
    </ul>
  {/if}
</section>
