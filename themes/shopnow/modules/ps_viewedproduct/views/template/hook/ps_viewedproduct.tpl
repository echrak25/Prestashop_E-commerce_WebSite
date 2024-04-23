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
<section class="viewed_products col-md-12 col-xs-12">
  <h2 class="h1 products-section-title text-uppercase">
    <span>
        {l s='Viewed products' d='Modules.Viewedproduct.Shop'}
    </span>
  </h2>
  <div class="row">
      <div class="products">
        {foreach from=$products item="product"}
          {include file="catalog/_partials/miniatures/product.tpl" product=$product}
        {/foreach}
      </div>
  </div>
</section>
