{*
* Copyright ETS Software Technology Co., Ltd
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
*}
<div class="ets-wishlist-add-to" data-url="{$link_add_product_to_wishlist nofilter}">
    <div tabindex="-1" role="dialog" aria-modal="true" class="ets-wishlist-modal modal fade">
        <div  role="document" class="modal-dialog modal-dialog-centered">
            <div  class="modal-content">
                <div  class="modal-header">
                    <h5 class="modal-title">
                        {l s='Add to wish list' mod='ets_wishlist_pres17'}
                    </h5> 
                    <button type="button" data-dismiss="modal" class="close" title="{l s='Close' mod='ets_wishlist_pres17'}">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ets_wl_id_product_current" value="" id="ets_wl_id_product_current"/>
                    <input type="hidden" name="ets_wl_id_product_attribute_current" value="" id="ets_wl_id_product_attribute_current"/>
                    
                    <div class="ets-wishlist-chooselist">
                        <ul class="ets-wishlist-list">
                            {if $list_wishlists}
                                {foreach from = $list_wishlists item='wishlist'}
                                    <li class="item-wishlist" data-id="{$wishlist.id_ets_wishlist|intval}"><p>{$wishlist.name|escape:'html':'UTF-8'}</p></li>
                                {/foreach}
                            {/if} 
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                <a class="ets-wishlist-add-to-new">
                    <i  class="material-icons">add_circle_outline</i> {l s='Create new list' mod='ets_wishlist_pres17'}
                </a>
                </div>
            </div>
        </div>
    </div>
    <div  class="modal-backdrop fade">
    </div>
</div>
<div data-url="{$link_new_wishlist nofilter}" class="ets-wishlist-create">
    <div tabindex="-1" role="dialog" aria-modal="true" class="ets-wishlist-modal modal fade">
        <div  role="document" class="modal-dialog modal-dialog-centered">
            <div  class="modal-content">
                <div  class="modal-header">
                    <h5  class="modal-title">{l s='Create wish list' mod='ets_wishlist_pres17'}</h5>
                    <button  type="button" data-dismiss="modal" class="close" title="{l s='Close' mod='ets_wishlist_pres17'}">
                        <span  aria-hidden="true">×</span>
                    </button>
                </div> 
                <div  class="modal-body">
                    <div  class="form-group form-group-lg">
                        <label  for="wishlist_name" class="form-control-label required">{l s='Wish list name' mod='ets_wishlist_pres17'} </label>
                        <input name="wishlist_name" id="wishlist_name" placeholder="{l s='Add name' mod='ets_wishlist_pres17'}" class="form-control form-control-lg" type="text" />
                    </div>
                </div> 
                <div  class="modal-footer">
                    <button  type="button" data-dismiss="modal" class="modal-cancel btn btn-secondary">
                        {l s='Cancel' mod='ets_wishlist_pres17'}   
                    </button>
                    <button  type="button" class="btn btn-primary ets-btn-submit-new-wishlist">
                        {l s='Create wish list' mod='ets_wishlist_pres17'}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div  class="modal-backdrop fade"></div>
</div>
<div class="ets-wishlist-toast" data-required="{l s='Wish list name is required' mod='ets_wishlist_pres17'}">
    <p class="ets-wishlist-toast-text"> </p>
</div>