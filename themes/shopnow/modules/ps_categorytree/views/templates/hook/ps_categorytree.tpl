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
{function name="categories" nodes=[] depth=0}
  {strip}
    {if $nodes|count}
      <ul class="category-sub-menu">
        {foreach from=$nodes item=node}
          <li data-depth="{$depth|escape:'html':'UTF-8'}">
            {if $depth===0}
              <a href="{$node.link|escape:'html':'UTF-8'}">{$node.name|escape:'html':'UTF-8'}</a>
              {if $node.children}
                <div class="navbar-toggler collapse-icons" data-toggle="collapse" data-target="#exCollapsingNavbar{$node.id|escape:'html':'UTF-8'}">
                  <i class="material-icons add">add</i>
                  <i class="material-icons remove">remove</i>
                </div>
                <div class="collapse" id="exCollapsingNavbar{$node.id|escape:'html':'UTF-8'}">
                  {categories nodes=$node.children depth=$depth+1}
                </div>
              {/if}
            {else}
              <a class="category-sub-link" href="{$node.link|escape:'html':'UTF-8'}">{$node.name|escape:'html':'UTF-8'}</a>
              {if $node.children}
                <span class="arrows" data-toggle="collapse" data-target="#exCollapsingNavbar{$node.id|escape:'html':'UTF-8'}">
                  <i class="material-icons arrow-right">keyboard_arrow_right</i>
                  <i class="material-icons arrow-down">keyboard_arrow_down</i>
                </span>
                <div class="collapse" id="exCollapsingNavbar{$node.id|escape:'html':'UTF-8'}">
                  {categories nodes=$node.children depth=$depth+1}
                </div>
              {/if}
            {/if}
          </li>
        {/foreach}
      </ul>
    {/if}
  {/strip}
{/function}

<div class="block-categories hidden-sm-down">
  <ul class="category-top-menu">
    <li><a class="text-uppercase h6" href="{$categories.link nofilter}">{$categories.name|escape:'html':'UTF-8'}</a></li>
    <li>{categories nodes=$categories.children}</li>
  </ul>
</div>
