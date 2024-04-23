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
{if $pagination.should_be_displayed}
    <div class="ets_plp_pagination">
        {if $ETS_PLP_TYPE_PAGINATION=='show_pagination'} 
            <nav class="pagination">
              <div class="col-md-4">
                
              </div> 
              <div class="col-md-6 offset-md-2 pr-0">
                {block name='pagination_page_list'}
                    <ul class="page-list clearfix text-sm-center">
                      {foreach from=$pagination.pages item="page"}
                        <li {if $page.current} class="current" {/if}>
                          {if $page.type === 'spacer'}
                            <span class="spacer">&hellip;</span>
                          {else}
                            <a
                              rel="{if $page.type === 'previous'}prev{elseif $page.type === 'next'}next{else}nofollow{/if}"
                              href="{$page.url|escape:'html':'UTF-8'}"
                              class="{if $page.type === 'previous'}previous {elseif $page.type === 'next'}next {/if}{['disabled' => !$page.clickable, 'js-search-link' => true]|classnames}"
                            >
                              {if $page.type === 'previous'}
                                <i class="material-icons">&#xE314;</i>{l s='Previous' mod='ets_productlistpagination'}
                              {elseif $page.type === 'next'}
                                {l s='Next' mod='ets_productlistpagination'}<i class="material-icons">&#xE315;</i>
                              {else}
                                {$page.page|escape:'html':'UTF-8'}
                              {/if}
                            </a>
                          {/if}
                        </li>
                      {/foreach}
                    </ul>
                {/block}
              </div>
            </nav>
        {elseif $ETS_PLP_TYPE_PAGINATION=='load_more'}
            {foreach from=$pagination.pages item="page"}
                {if $page.type === 'next'}
                    <a class="load_more" href="{$page.url|escape:'html':'UTF-8'}&from-xhr">{$ETS_PLP_BUTTON_LABEL|escape:'html':'UTF-8'}</a>
                {/if}
            {/foreach}
        {elseif $ETS_PLP_TYPE_PAGINATION=='scroll'}
            {foreach from=$pagination.pages item="page"}
                {if $page.type === 'next'}
                    <a class="load_more_auto" href="{$page.url|escape:'html':'UTF-8'}&from-xhr" style="display:none">{l s='Auto load' mod='ets_productlistpagination'}</a>
                {/if}
            {/foreach}
        {/if}
    </div>

{/if}