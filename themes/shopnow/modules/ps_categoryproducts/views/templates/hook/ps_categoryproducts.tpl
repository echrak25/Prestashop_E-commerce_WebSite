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
<div class="col-md-12 col-xs-12">
    <section class="categoryproducts">
      <h2 class="h1 products-section-title text-uppercase">
        <span>
            {if $products|@count == 1}
              {l s='%s other product in the category' sprintf=[$products|@count] d='Modules.Categoryproducts.Shop'}
            {else}
              {l s='%s other products in the category' sprintf=[$products|@count] d='Modules.Categoryproducts.Shop'}
            {/if}
        </span>
      </h2>
      <div class="categoryproducts_content">
          {foreach from=$products item="product"}
              {include file="catalog/_partials/miniatures/product.tpl" product=$product}
          {/foreach}
      </div>
    </section>
</div>
