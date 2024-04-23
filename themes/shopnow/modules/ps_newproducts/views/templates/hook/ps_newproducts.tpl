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
<section class="featured-products clearfix home-block-section col-xs-12 col-sm-12">
  <h3 class="h1 products-section-title text-uppercase title-home">
    <span>{l s='New products' d='Shop.Theme.Catalog'}</span>
  </h3>
  <div class="products product_list">
    {foreach from=$products item="product"}
      {include file="catalog/_partials/miniatures/product.tpl" product=$product}
    {/foreach}
  </div>
  {*<a class="all-product-link pull-xs-left pull-md-right h4" href="{$allNewProductsLink|escape:'html':'UTF-8'}">
    {l s='All new products' d='Shop.Theme.Catalog'}<i class="material-icons">&#xE315;</i>
  </a>*}
</section>
{hook h='ybcCustom2'}
