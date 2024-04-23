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
  <div id="search_filters">
    <h4 class="text-uppercase h6 hidden-sm-down">{l s='Filter By' d='Shop.Theme.Actions'}</h4>
    <div id="_desktop_search_filters_clear_all" class="hidden-sm-down clear-all-wrapper">
      <button data-search-url="{$clear_all_link|escape:'html':'UTF-8'}" class="btn btn-tertiary js-search-filters-clear-all">
        <i class="material-icons">clear</i>
        {l s='Clear all' d='Shop.Theme.Actions'}
      </button>
    </div>
    {foreach from=$facets item="facet"}
      {if $facet.displayed}
        <section class="facet">
          <h2 class="h6 facet-title hidden-sm-down">{$facet.label|escape:'html':'UTF-8'}</h2>
          {assign var=_expand_id value=10|mt_rand:100000}
          {assign var=_collapse value=true}
          {foreach from=$facet.filters item="filter"}
            {if $filter.active}{assign var=_collapse value=false}{/if}
          {/foreach}
          <div class="title hidden-md-up" data-target="#facet_{$_expand_id|escape:'html':'UTF-8'}" data-toggle="collapse"{if !$_collapse} aria-expanded="true"{/if}>
            <h2 class="h6 facet-title">{$facet.label|escape:'html':'UTF-8'}</h2>
            <span class="pull-xs-right">
              <span class="navbar-toggler collapse-icons">
                <i class="material-icons add">add</i>
                <i class="material-icons remove">remove</i>
              </span>
            </span>
          </div>
          {if $facet.widgetType !== 'dropdown'}
            <ul id="facet_{$_expand_id|escape:'html':'UTF-8'}" class="collapse{if !$_collapse} in{/if}">
              {foreach from=$facet.filters item="filter"}
                {if $filter.displayed}
                  <li>
                    <label class="facet-label{if $filter.active} active {/if}">
                      {if $facet.multipleSelectionAllowed}
                        <span class="custom-checkbox">
                          <input
                            data-search-url="{$filter.nextEncodedFacetsURL|escape:'html':'UTF-8'}"
                            type="checkbox"
                            {if $filter.active } checked {/if}
                          >
                          {if isset($filter.properties.color)}
                            <span class="color" style="background-color:{$filter.properties.color|escape:'html':'UTF-8'}"></span>
                            {elseif isset($filter.properties.texture)}
                              <span class="color texture" style="background-image:url({$filter.properties.texture|escape:'html':'UTF-8'})"></span>
                            {else}
                            <span {if !$js_enabled} class="ps-shown-by-js" {/if}>
                                <i class="material-icons checkbox-checked">check</i></span>
                          {/if}
                        </span>
                      {else}
                        <span class="custom-checkbox">
                          <input
                            data-search-url="{$filter.nextEncodedFacetsURL|escape:'html':'UTF-8'}"
                            type="radio"
                            name="filter {$facet.label|escape:'html':'UTF-8'}"
                            {if $filter.active } checked {/if}
                          >
                          <span {if !$js_enabled} class="ps-shown-by-js" {/if}>
                            <i class="material-icons checkbox-checked">check</i></span>
                        </span>
                      {/if}

                      <a
                        href="{$filter.nextEncodedFacetsURL|escape:'html':'UTF-8'}"
                        class="_gray-darker search-link js-search-link"
                        rel="nofollow"
                      >
                        {$filter.label|escape:'html':'UTF-8'}
                        {if $filter.magnitude}
                          <span class="magnitude">({$filter.magnitude|escape:'html':'UTF-8'})</span>
                        {/if}
                      </a>
                    </label>
                  </li>
                {/if}
              {/foreach}
            </ul>
          {else}
            <form>
              <input type="hidden" name="order" value="{$sort_order|escape:'html':'UTF-8'}">
              <select name="q">
                <option disabled selected hidden>{l s='(no filter)' d='Shop.Theme.Actions'}</option>
                {foreach from=$facet.filters item="filter"}
                  {if $filter.displayed}
                    <option
                      {if $filter.active}
                        selected
                        value="{$smarty.get.q|escape:'html':'UTF-8'}"
                      {else}
                        value="{$filter.nextEncodedFacets|escape:'html':'UTF-8'}"
                      {/if}
                    >
                      {$filter.label|escape:'html':'UTF-8'}
                      {if $filter.magnitude}
                        ({$filter.magnitude|escape:'html':'UTF-8'})
                      {/if}
                    </option>
                  {/if}
                {/foreach}
              </select>
              {if !$js_enabled}
                <button class="ps-hidden-by-js" type="submit">
                  {l s='Filter' d='Shop.Theme.Actions'}
                </button>
              {/if}
            </form>
          {/if}
        </section>
      {/if}
    {/foreach}
  </div>
