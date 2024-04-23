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
<div class="col ets_tc_col">
    <div class="card free_download-card">
        <h3 class="card-header">
            <i><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" class="svg-inline--fa fa-link fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width:20px; height:20px;"><path fill="currentColor" d="M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z"></path></svg></i>
            {l s='License' mod='ets_trackingcustomer'}
            <span class="badge badge-primary rounded">{Count($products)|intval}</span>
        </h3>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>{l s='Order ref' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Image' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Product name' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Purchased date' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Domain' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Action' mod='ets_trackingcustomer'}</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from = $products item='product'}
                        <tr>
                            <td>
                                {if isset($product.idOrder) && $product.idOrder}
                                    <a href="{$product.view_order|escape:'html':'UTF-8'}">
                                {/if}
                                    {$product.order_ref|escape:'html':'UTF-8'}{if !(isset($product.idOrder) && $product.idOrder)} ({l s='Deleted order' mod='ets_trackingcustomer'}){/if}
                                {if isset($product.idOrder) && $product.idOrder}
                                    </a>
                                {/if}
                            </td>
                            <td>{if $product.image}<a href="{$link->getProductLink($product.id_product)|escape:'html':'UTF-8'}" target="_blank"><img src="{$product.image|escape:'html':'UTF-8'}" /></a>{/if}</td>
                            <td><a href="{$link->getProductLink($product.id_product)|escape:'html':'UTF-8'}" target="_blank">{$product.name|escape:'html':'UTF-8'}</a></td>
                            <td>{dateFormat date=$product.date_add}</td>
                            <td>{$product.shop_name|escape:'html':'UTF-8'}</td>
                            <td>
                                <div class="btn-group-action">
                                    <div class="btn-group">
                                        <a class="btn tooltip-link dropdown-item" href="{if $ph_mydownloads}{$product.view_link|escape:'html':'UTF-8'}&submitFilterets_ref={$product.order_ref|escape:'html':'UTF-8'}{else}{$product.view_order|escape:'html':'UTF-8'}{/if}" data-toggle="pstooltip" data-placement="top" data-original-title="{l s='View' mod='ets_trackingcustomer'}">
                                            <i class="material-icons">zoom_in</i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>