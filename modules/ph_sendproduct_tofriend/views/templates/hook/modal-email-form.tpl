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
<script>
    var submitLink = "{$link->getModuleLink('ph_sendproduct_tofriend','submit')|escape:'html':'UTF-8'}";
    var productId = {$product.id|escape:'html':'UTF-8'};
</script>
<div id="ets-sptf-form" class="ets-sptf-wrapper">
    <div class="sptf-product-page">
        <div class="col-xs-12 mb-1 sptf-email-input" style="display: flex">
            <input class="sptf-non-modal-input" name="email" type="email" placeholder="{l s="Your friend's email address"  mod="ph_sendproduct_tofriend"}">
            <a id="sptf-open-popup" class="btn btn-primary float-xs-right"><i class="fas fa-envelope"></i><span style="margin-left: 10px">{$customButtonText|escape:'html':'UTF-8'}</span></a>
        </div>
    </div>
    <div class="ets-sptf-modal-overlay ets-sptf-form-container hidden">
        <div class="ets-sptf-form ets-sptf-modal hidden">
            <div class="ets-sptf-form">
                <div class="sptf_modal_close">{l s='Close' mod='ph_sendproduct_tofriend'}</div>
            </div>
            <div class="ets-sptf-form">
                <div class="defaultForm">
                    <div class="sptf-form-container">
                        <div class="sptf-form-heading">
                            <i class="fas fa-share"></i>
                            <span>
                                {l s='Share product to friend' mod='ph_sendproduct_tofriend'}
                            </span>
                        </div>
                        <div class="sptf-form">
                            <div class="sptf-product-info row">
                                <div class="col-md-3">
                                    <img class="product-image" src="{$product.cover.medium.url|escape:'html':'UTF-8'}" alt="{$product.cover.legend|escape:'html':'UTF-8'}" title="{$product.cover.legend|escape:'html':'UTF-8'}" itemprop="image">
                                </div>
                                <div class="col-md-6">
                                    <h3 class="product-name">{$product.name|escape:'html':'UTF-8'}</h3>
                                    <div id="product-description-short-{$product.id|escape:'html':'UTF-8'}" class="product-description" itemprop="description">{$product.description_short nofilter}</div>
                                    <p class="product-price">{$product.price|escape:'html':'UTF-8'}</p>
                                </div>
                            </div>
                            <br>
                            <div class="sptf-form-detail sptf-input-container col-md-12">
                                <div class="sptf-customer-info sptf-input-row">
                                    <label class="col-xs-12 col-sm-6" style="float: none; margin-bottom: 15px;">
                                        <span class="input-label">{l s="Your Name" mod='ph_sendproduct_tofriend'}</span>
                                        <span class="sptf-form-control-wrap your-name">
                                        <input size="40" class="sptf-form-control sptf-text sptf-validates-as-required form-control"
                                               aria-required="true" aria-invalid="false" type="text" name="your-name"
                                               {if isset($customerName) && $customerName}
                                                   value="{$customerName|escape:'html':'UTF-8'}"
                                                   data-name="{$customerName|escape:'html':'UTF-8'}"
                                               {/if}
                                                >
                                    </span>
                                    </label>
                                    <label class="col-xs-12 col-sm-6" style="float: none;clear: none;margin-bottom: 15px;">
                                        <span class="input-label">{l s="Your Email" mod='ph_sendproduct_tofriend'}</span>
                                        <span class="sptf-form-control-wrap your-email">
                                        <input size="40" class="sptf-form-control sptf-text sptf-email sptf-validates-as-required sptf-validates-as-email form-control"
                                               aria-required="true" aria-invalid="false" type="email" name="your-email"
                                               {if isset($customerEmail) && $customerEmail}
                                                   value="{$customerEmail|escape:'html':'UTF-8'}"
                                                   data-email="{$customerEmail|escape:'html':'UTF-8'}"
                                               {/if}
                                                >
                                    </span>
                                    </label>
                                </div>
                                <br>
                                <div class="sptf-customer-info sptf-input-row">
                                    <label class="col-xs-12 col-sm-6 sptf-wrapper" style="float: none; margin-bottom: 15px;">
                                        <span class="input-label">{l s="Your Friend's Name" mod='ph_sendproduct_tofriend'}</span>
                                        <span class="sptf-form-control-wrap friend-name">
                                        <input size="40" class="sptf-form-control sptf-text sptf-validates-as-required form-control" aria-required="true" aria-invalid="false" type="text" name="friend-name">
                                    </span>
                                    </label>
                                    <label class="col-xs-12 col-sm-6 sptf-wrapper" style="float: none;clear: none;margin-bottom: 15px;">
                                        <span class="input-label">{l s="Your Friend's Email" mod='ph_sendproduct_tofriend'}</span>
                                        <span class="sptf-form-control-wrap friend-email">
                                        <input size="40" class="sptf-form-control sptf-text sptf-email sptf-validates-as-required sptf-validates-as-email form-control" aria-required="true" aria-invalid="false" type="email" name="friend-email">
                                    </span>
                                    </label>
                                </div>
                                <div class="sptf-email-form">
                                    <br>
                                    <label class="col-xs-12 col-sm-12 sptf-wrapper" style="margin-bottom: 15px;">
                                        <span class="input-label sptf-message-label" style="text-align: left">{l s="Message" mod="ph_sendproduct_tofriend"}</span>
                                        <span class="sptf-form-wrap sptf-message">
                                        <textarea cols="40" rows="10" class="sptf-form-control sptf-textarea sptf-validates-as-required form-control" aria-required="true" aria-invalid="false" name="sptf-message"></textarea>
                                    </span>
                                    </label>
                                </div>
                                <div class="col-xs-12 col-sm-12 sptf-submit-wrapper">
                                    <button class="sptf-form-control sptf-submit" >
                                        <span>{l s="Send mail" mod="ph_sendproduct_tofriend"}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>