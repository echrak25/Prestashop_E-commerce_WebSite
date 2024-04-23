{*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if isset($isQuickview) && !empty($isQuickview)}
    <button class="wishlist-button-add wishlist-button-product quickview-button"
            onclick="WishlistCart('wishlist_block_list', 'add', '{$product.id_product|intval}', '{$product.id_product_attribute|intval}', 1,'{if isset($wishlists) && is_array($wishlists) && count($wishlists) > 1}{$wishlist.id_wishlist|escape:'html':'UTF-8'}{/if}');
                    return false;">
        <i class="material-icons">favorite_border</i>
    </button>
{else}
    {if isset($wishlists) && is_array($wishlists) && count($wishlists) > 1}
        <div class="wishlist">
            {foreach name=wl from=$wishlists item=wishlist}
                {if $smarty.foreach.wl.first}
                    <a class="wishlist_button_list" tabindex="0" data-toggle="popover" data-trigger="focus" title="{l s='Wishlist' mod='blockwishlist'}" data-placement="bottom">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </a>
                    <div hidden class="popover-content">
                    <table class="table" border="1">
                    <tbody>
                {/if}
                <tr title="{$wishlist.name|escape:'html':'UTF-8'}" value="{$wishlist.id_wishlist|escape:'html':'UTF-8'}" onclick="WishlistCart('wishlist_block_list', 'add', '{$product.id_product|intval}', '{$product.id_product_attribute|intval}', 1, '{$wishlist.id_wishlist|escape:'html':'UTF-8'}');">
                    <td>
                        {l s='Add to %s' sprintf=[$wishlist.name] mod='blockwishlist'}
                    </td>
                </tr>
                {if $smarty.foreach.wl.last}
                    </tbody>
                    </table>
                    </div>
                {/if}
                {foreachelse}
                <a href="#" id="wishlist_button_nopop" onclick="WishlistCart('wishlist_block_list', 'add', '{$id_product|intval}', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;" rel="nofollow"  title="{l s='Add to my wishlist' mod='blockwishlist'}">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                </a>
            {/foreach}
        </div>
    {else}
        <div class="wishlist">
            <a class="addToWishlist wishlistProd_{$product.id_product|intval}" href="#" data-rel="{$product.id_product|intval}" onclick="WishlistCart('wishlist_block_list', 'add', '{$product.id_product|intval}', '{$product.id_product_attribute|intval}', 1); return false;">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
            </a>
        </div>
    {/if}
{/if}
