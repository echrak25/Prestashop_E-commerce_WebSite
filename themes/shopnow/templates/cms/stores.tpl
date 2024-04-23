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
{extends file='page.tpl'}

{block name='page_title'}
  {l s='Our stores' d='Shop.Theme.Actions'}
{/block}

{block name='page_content_container'}
  <div id="content" class="page-content page-stores">

    {foreach $stores as $store}
      <article id="store-{$store.id|escape:'html':'UTF-8'}" class="store-item card">
        <div class="store-item-container clearfix">
            {if $store.image}
              <div class="col-md-3 store-picture hidden-sm-down">
            <img src="{$store.image.bySize.stores_default.url|escape:'html':'UTF-8'}" alt="{$store.image.legend|escape:'html':'UTF-8'}" title="{$store.image.legend|escape:'html':'UTF-8'}">
          </div>
              {/if}
          <div class="col-md-5 col-sm-7 col-xs-12 store-description">
            <h3 class="h3 card-title">{$store.name|escape:'html':'UTF-8'}</h3>
            <address>{$store.address.formatted nofilter}</address>
            {if $store.note || $store.phone || $store.fax || $store.email}
              <a data-toggle="collapse" href="#about-{$store.id|escape:'html':'UTF-8'}" aria-expanded="false" aria-controls="about-{$store.id|escape:'html':'UTF-8'}"><strong>{l s='About and Contact' d='Shop.Theme.Actions'}</strong><i class="material-icons">&#xE409;</i></a>
            {/if}
          </div>
          <div class="col-md-4 col-sm-5 col-xs-12 divide-left">
            <table>
              {foreach $store.business_hours as $day}
              <tr>
                <th>{$day.day|truncate:4:'.'|escape:'html':'UTF-8'}</th>
                <td>
                  <ul>
                  {foreach $day.hours as $h}
                    <li>{$h|escape:'html':'UTF-8'}</li>
                  {/foreach}
                  </ul>
                </td>
              </tr>
              {/foreach}
            </table>
          </div>
        </div>
        <footer id="about-{$store.id|escape:'html':'UTF-8'}" class="collapse">
          <div class="store-item-footer divide-top">
            <div class="card-block">
              {if $store.note}
                <p class="text-justify">{$store.note|escape:'html':'UTF-8'}<p>
              {/if}
            </div>
            <ul class="card-block">
              {if $store.phone}
                <li><i class="material-icons">&#xE0B0;</i>{$store.phone|escape:'html':'UTF-8'}</li>
              {/if}
              {if $store.fax}
                <li><i class="material-icons">&#xE8AD;</i>{$store.fax|escape:'html':'UTF-8'}</li>
              {/if}
              {if $store.email}
                <li><i class="material-icons">&#xE0BE;</i>{$store.email|escape:'html':'UTF-8'}</li>
              {/if}
            </ul>
          </div>
        </footer>
      </article>
    {/foreach}

  </div>
{/block}
