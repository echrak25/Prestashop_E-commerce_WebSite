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
<div class="row">
    <div class="col-sm-12">
        <div class="row justify-content-center wishlist-stats">
            <div class="panel col-xl-10">
                <div class="card">
                    <h3 class="card-header">
                        {l s='Top 10 most added products' mod='ets_wishlist_pres17'}
                    </h3>
                    <div class="card-block">
                        <div class="card-text">
                            <div class="row wishlist-stats-topbar">
                                <div class="btn-group">
                                    <button class="btn btn-default" data-tab="1">{l s='Day' mod='ets_wishlist_pres17'}</button>
                                    <button class="btn btn-default" data-tab="2">{l s='Month' mod='ets_wishlist_pres17'}</button>
                                    <button class="btn btn-default" data-tab="3">{l s='Year' mod='ets_wishlist_pres17'}</button>
                                    <button class="btn btn-default active" data-tab="4">{l s='All time' mod='ets_wishlist_pres17'}</button>
                                </div>
                            </div>
                            <div class="wishlist-tab" data-tab="1">
                                <div id="statistics_current_day_grid" class="row grid js-grid" data-grid-id="statistics_current_day">
                                    {include file="./products.tpl" products=$day_products}
                                </div>
                            </div>
                            <div class="wishlist-tab" data-tab="2">
                                <div id="statistics_current_month_grid" class="row grid js-grid" data-grid-id="statistics_current_month">
                                    {include file="./products.tpl" products=$month_products}
                                </div>
                            </div>
                            <div class="wishlist-tab" data-tab="3">
                                <div id="statistics_current_year_grid" class="row grid js-grid" data-grid-id="statistics_current_year">
                                    {include file="./products.tpl" products=$year_products}
                                </div>
                            </div>
                            <div class="wishlist-tab active" data-tab="4">
                                <div id="statistics_all_time_grid" class="row grid js-grid" data-grid-id="statistics_all_time">
                                    {include file="./products.tpl" products=$all_time_products}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>