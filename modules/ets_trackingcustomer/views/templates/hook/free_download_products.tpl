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
            <i class="lh_16"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cloud-download-alt" class="svg-inline--fa fa-cloud-download-alt fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="height: 20px; width: 20px;"><path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zm-132.9 88.7L299.3 420.7c-6.2 6.2-16.4 6.2-22.6 0L171.3 315.3c-10.1-10.1-2.9-27.3 11.3-27.3H248V176c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v112h65.4c14.2 0 21.4 17.2 11.3 27.3z"></path></svg> </i>
            {l s='Free downloads' mod='ets_trackingcustomer'}
            <span class="badge badge-primary rounded">{Count($products)|intval}</span>
        </h3>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>{l s='ID' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Image' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Product name' mod='ets_trackingcustomer'}</th>
                        <th class="text-center">{l s='Downloaded quantity' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Date' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Version' mod='ets_trackingcustomer'}</th>
                        <th>{l s='Action' mod='ets_trackingcustomer'}</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from = $products item='product'}
                        <tr>
                            <td>{$product.id_product|intval}</td>
                            <td><a href="{$link->getProductLink($product.id_product)|escape:'html':'UTF-8'}"target="_blankt">{if $product.image}<img src="{$product.image|escape:'html':'UTF-8'}" />{/if}</a></td>
                            <td><a href="{$link->getProductLink($product.id_product)|escape:'html':'UTF-8'}"target="_blankt">{$product.name|escape:'html':'UTF-8'}</a></td>
                            <td class="text-center">{$product.num_downloaded|intval}</td>
                            <td>{dateFormat date=$product.last_downloaded}</td>
                            <td>{$product.version_download|escape:'html':'UTF-8'}</td>
                            <td>
                                <div class="btn-group-action">
                                    <div class="btn-group">
                                        <a class="btn tooltip-link dropdown-item" href="{$link->getAdminLink('AdminEtsFdListProduct')|escape:'html':'UTF-8'}&viewets_fd_product=1&id_ets_fd_product={$product.id_ets_fd_product|intval}" data-toggle="pstooltip" data-placement="top" data-original-title="{l s='View' mod='ets_trackingcustomer'}">
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
