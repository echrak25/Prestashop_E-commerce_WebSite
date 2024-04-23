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
<script type="text/javascript" src="{$ets_tc_module_dir|escape:'html':'UTF-8'}views/js/chart.min.js"></script>
<div class="tc_analytic_wapper">
    <div class="row">
        <ul class="tc_admin_filter_session">
            <li class="tc_filter filter_day" data-filter="day">{l s='Day' mod='ets_trackingcustomer'}</li>
            <li class="tc_filter filter_day_1" data-filter="day_1">{l s='Day-1' mod='ets_trackingcustomer'}</li>
            <li class="tc_filter filter_month active" data-filter="month">{l s='Month' mod='ets_trackingcustomer'}</li>
            <li class="tc_filter filter_month_1" data-filter="month_1">{l s='Month-1' mod='ets_trackingcustomer'}</li>
            <li class="tc_filter filter_from_to" data-filter="from_to">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="input-group">
                        <span class="input-group-addon">{l s='From' mod='ets_trackingcustomer'}</span>
                            <input id="filter_from_date" class="datetimepicker input-medium" name="filter_from_date" value="" type="text" autocomplete="off" />
                            <span class="input-group-addon">
                                <i class="icon-calendar-empty"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="input-group">
                        <span class="input-group-addon">{l s='To' mod='ets_trackingcustomer'}</span>
                            <input id="filter_to_date" class="datetimepicker input-medium" name="filter_to_date" value="" type="text" autocomplete="off" />
                            <span class="input-group-addon">
                                <i class="icon-calendar-empty"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-default" name="btnFilterAnalytic">{l s='Filter' mod='ets_trackingcustomer'}</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 tc_chart_session_traffic">
            <div class="card chart_session_traffic">
                <h3 class="card-header">{l s='Session traffic' mod='ets_trackingcustomer'}</h3>
                <div class="card-body">
                    <canvas  id="chartSessionTraffic" style="height: 300px; width: 100%;"></canvas >
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card top-visit-page">
                <h3 class="card-header">{l s='Top visit pages' mod='ets_trackingcustomer'}</h3>
                <span class="panel-heading-action">
                    <select class="form-control" name="filter_visit_page_by_customer" data-filter='{$filter_action|escape:'html':'UTF-8'}'>
                        <option  value="">{l s='All users' mod='ets_trackingcustomer'}</option>
                        {if Module::isEnabled('ets_free_downloads')}
                            <option  value="is_verified">{l s='Verified customers' mod='ets_trackingcustomer'}</option>
                        {/if}
                        <option  value="is_registered">{l s='Registered customers' mod='ets_trackingcustomer'}</option>
                        <option  value="is_visitors">{l s='Visitors' mod='ets_trackingcustomer'}</option>
                        <option  value="place_order">{l s='Place order' mod='ets_trackingcustomer'}</option>
                    </select>
                </span>
                <div class="card-body">
                    {$top_visit_page nofilter}
                </div>
            </div>
            <div class="card top-action">
                <h3 class="card-header">
                    {l s='Top actions' mod='ets_trackingcustomer'}
                </h3>
                <span class="panel-heading-action ">
                    <select class="form-control" name="filter_actions" data-filter='{$filter_action|escape:'html':'UTF-8'}'>
                        <option  value="">{l s='All users' mod='ets_trackingcustomer'}</option>
                        {if Module::isEnabled('ets_free_downloads')}
                            <option  value="is_verified">{l s='Verified customers' mod='ets_trackingcustomer'}</option>
                        {/if}
                        <option  value="is_registered">{l s='Registered customers' mod='ets_trackingcustomer'}</option>
                        <option  value="is_visitors">{l s='Visitors' mod='ets_trackingcustomer'}</option>
                        <option  value="place_order">{l s='Place order' mod='ets_trackingcustomer'}</option>
                    </select>
                </span>
                <div class="card-body">
                    {$top_action nofilter}
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card top-customer">
                <h3 class="card-header">
                    {l s='Top customers by actions' mod='ets_trackingcustomer'}
                </h3>
                <span class="panel-heading-action">
                    <select class="form-control" name="filter_customer_by_action" data-filter='{$filter_action|escape:'html':'UTF-8'}'>
                        <option  value="">{l s='All actions' mod='ets_trackingcustomer'}</option>
                        {$select_list_actions nofilter}
                    </select>
                    <select class="form-control" name="filter_customer" data-filter='{$filter_action|escape:'html':'UTF-8'}'>
                        <option  value="">{l s='All users' mod='ets_trackingcustomer'}</option>
                        {if Module::isEnabled('ets_free_downloads')}
                            <option  value="is_verified">{l s='Verified customers' mod='ets_trackingcustomer'}</option>
                        {/if}
                        <option  value="is_registered">{l s='Registered customers' mod='ets_trackingcustomer'}</option>
                        <option  value="is_visitors">{l s='Visitors' mod='ets_trackingcustomer'}</option>
                        <option  value="place_order">{l s='Place order' mod='ets_trackingcustomer'}</option>
                    </select>
                </span>
                <div class="card-body">
                    {$top_customer_by_action nofilter}
                </div>
            </div>
            <div class="card top-customer-insight">
                <h3 class="card-header">{l s='Customer insights' mod='ets_trackingcustomer'}</h3>
                <span class="panel-heading-action">
                    <select class="form-control" name="filter_insights" data-filter='{$filter_action|escape:'html':'UTF-8'}'>
                        <option  value="">{l s='All users' mod='ets_trackingcustomer'}</option>
                        {if Module::isEnabled('ets_free_downloads')}
                            <option  value="is_verified">{l s='Verified customers' mod='ets_trackingcustomer'}</option>
                        {/if}
                        <option  value="is_registered">{l s='Registered customers' mod='ets_trackingcustomer'}</option>
                        <option  value="is_visitors">{l s='Visitors' mod='ets_trackingcustomer'}</option>
                        <option  value="place_order">{l s='Place order' mod='ets_trackingcustomer'}</option>
                    </select>
                </span>
                <div class="card-body">
                    {$top_insight nofilter}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
   $('.datetimepicker').datetimepicker({
				prevText: '',
				nextText: '',
				dateFormat: 'yy-mm-dd',
				currentText: '{l s='Now' mod='ets_trackingcustomer' js=1}',
				closeText: '{l s='Done' mod='ets_trackingcustomer' js=1}',
				ampm: false,
				amNames: ['AM', 'A'],
				pmNames: ['PM', 'P'],
				timeFormat: 'hh:mm:ss tt',
				timeSuffix: '',
				timeOnlyTitle: '{l s='Choose Time' mod='ets_trackingcustomer' js=1}',
				timeText: '{l s='Time' mod='ets_trackingcustomer' js=1}',
				hourText: '{l s='Hour' mod='ets_trackingcustomer' js=1}',
				minuteText: '{l s='Minute' mod='ets_trackingcustomer' js=1}',
                changeMonth:true,
                changeYear:true
			}); 
});
var session_datasets ={$session_datasets|json_encode};
var chart_labels=[{foreach from=$chart_labels item='data'}'{$data|escape:'html':'UTF-8'}',{/foreach}];
</script>
<script type="text/javascript" src="{$ets_tc_module_dir|escape:'html':'UTF-8'}views/js/analytic.js"></script>