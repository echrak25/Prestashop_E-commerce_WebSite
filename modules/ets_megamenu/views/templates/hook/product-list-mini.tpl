{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if isset($products) && $products}	
	<!-- Products list -->
	<ul{if isset($id) && $id} id="{$id|intval}"{/if} class="product_list grid row{if isset($class) && $class} {$class|escape:'html':'UTF-8'}{/if}">
	{foreach from=$products item=product name=products}		
		<li class="ajax_block_product col-xs-12 col-sm-12">
			<div class="product-container" itemscope itemtype="https://schema.org/Product">
				<div class="left-block">
					<div class="product-image-container">
						<a class="product_img_link" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url">
							{assign var='imageLink' value=$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')}
                            <img class="replace-2x img-responsive" src="{if (strpos($imageLink,'http://')===false || strpos($imageLink,'https://'))}{$protocol_link|escape:'html':'UTF-8'}{/if}{$imageLink|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" {if isset($homeSize)} width="{$homeSize.width|floatval}" height="{$homeSize.height|floatval}"{/if} itemprop="image" />
						</a>
                    </div>
				</div>
				<div class="right-block">
					<h5 itemprop="name">
						{if isset($product.pack_quantity) && $product.pack_quantity}{$product.pack_quantity|intval|cat:' x '}{/if}
						<a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url" >
							{$product.name|truncate:45:'...'|escape:'html':'UTF-8'}
						</a>
					</h5>   
                    {if (!$PS_CATALOG_MODE && ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
						<div class="content_price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
							{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
								<span itemprop="price" class="price product-price">
									{hook h="displayProductPriceBlock" product=$product type="before_price"}
									{if isset($priceDisplay) && !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
								</span>									
								{if $product.price_without_reduction > 0 && isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
									{hook h="displayProductPriceBlock" product=$product type="old_price"}
									<span class="old-price product-price">
										{displayWtPrice p=$product.price_without_reduction}
									</span>
									{if $product.specific_prices.reduction_type == 'percentage'}
										<span class="price-percent-reduction">-{($product.specific_prices.reduction * 100)|floatval}%</span>
									{/if}
								{/if}								
							{/if}
						</div>
					{/if} 
                    <p class="product-desc" itemprop="description">
						{$product.description_short|strip_tags|escape:'html':'UTF-8'|truncate:60:'...'}
					</p>                
				</div>				
			</div><!-- .product-container> -->
		</li>
	{/foreach}
    </ul>
{/if}