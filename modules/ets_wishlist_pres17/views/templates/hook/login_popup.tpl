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
<div class="ets-wishlist-login">
    <div  tabindex="-1" role="dialog" aria-modal="true" class="ets-wishlist-modal modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div  class="modal-content">
                <div  class="modal-header">
                    <h5  class="modal-title">{l s='Sign in' mod='ets_wishlist_pres17'}</h5> 
                    <button  type="button" data-dismiss="modal" class="close" title="{l s='Close' mod='ets_wishlist_pres17'}">
                        <span  aria-hidden="true">×</span>
                    </button>
                </div> 
                <div  class="modal-body">
                    <p  class="modal-text">{l s='You need to be logged in to save products in your wish list.' mod='ets_wishlist_pres17'}</p>
                </div> 
                <div  class="modal-footer">
                    <button  type="button" data-dismiss="modal" class="modal-cancel btn btn-secondary">
                        {l s='Cancel' mod='ets_wishlist_pres17'}
                    </button> 
                    <a  type="button" href="{$link_login|escape:'html':'UTF-8'}" class="btn btn-primary">
                        {l s='Sign in' mod='ets_wishlist_pres17'}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div  class="modal-backdrop fade"></div>
 </div>