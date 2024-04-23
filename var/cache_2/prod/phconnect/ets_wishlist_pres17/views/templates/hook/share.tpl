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
<div data-copied-text="{l s='Copied!' mod='ets_wishlist_pres17'}" class="ets-wishlist-share">
    <div  tabindex="-1" role="dialog" aria-modal="true" class="ets-wishlist-modal modal fade">
        <div  role="document" class="modal-dialog modal-dialog-centered">
            <div  class="modal-content">
                <div  class="modal-header">
                    <h5  class="modal-title">{l s='Share wish list' mod='ets_wishlist_pres17'}</h5>
                    <button  type="button" data-dismiss="modal" aria-label="Close" class="close">
                        <span  aria-hidden="true">×</span>
                    </button>
                </div> 
                <div  class="modal-body">
                    <div  class="form-group form-group-lg">
                        <label  for="share_link_wishlist" class="form-control-label">{l s='Share link' mod='ets_wishlist_pres17'}</label>
                        <input name="share_link_wishlist"  id="share_link_wishlist" placeholder="{l s='Share link' mod='ets_wishlist_pres17'}" class="form-control form-control-lg" type="text" />
                    </div>
                </div>
                <div  class="modal-footer">
                <button  type="button" data-dismiss="modal" class="modal-cancel btn btn-secondary">
                    {l s='Cancel' mod='ets_wishlist_pres17'}
                </button>
                <button type="button" class="btn btn-primary btn-copy-url-share">
                    {l s='Copy text' mod='ets_wishlist_pres17'}
                </button>
                </div>
            </div>
        </div>
    </div>
    <div  class="modal-backdrop fade"></div>
</div>