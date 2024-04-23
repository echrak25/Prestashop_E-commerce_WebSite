/**
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
 */
var chart_session = false;
$(document).ready(function()
{
    var ctx_session = $('#chartSessionTraffic');
    var from_date_current = $('#filter_from_date').val();
    var to_date_current = $('#filter_to_date').val();
    chart_session= ets_trackingcustomer.creatDashboardChart(ctx_session,session_datasets,chart_labels);
    $(document).on('click','.tc_admin_filter_session .tc_filter',function(){
        if(!$(this).hasClass('active'))
        {
            $('.tc_admin_filter_session .tc_filter').removeClass('active');
            $(this).addClass('active');
            var data_filter = $(this).data('filter');
            if(data_filter!='from_to')
            {
                ets_trackingcustomer.ajaxLoadAnalytic(data_filter,'','');
                $('#filter_from_date').val('');
                $('#filter_to_date').val('');
            }
            else{
                var from_date = $('#filter_from_date').val();
                var to_date = $('#filter_to_date').val();
                if(from_date || to_date)
                    ets_trackingcustomer.ajaxLoadAnalytic(data_filter,from_date,to_date);
            }
        }
    });
    $(document).on('click','button[name="btnFilterAnalytic"]',function(e){
        e.preventDefault();
        var from_date = $('#filter_from_date').val();
        var to_date = $('#filter_to_date').val();
        if(from_date || to_date)
            ets_trackingcustomer.ajaxLoadAnalytic('from_to',from_date,to_date);
    });
});
var ets_trackingcustomer = {
    ajaxLoadAnalytic: function(data_filter,from_date,to_date)
    {
        $('body').addClass('loading');
        $.ajax({
            url: '',
            type: 'post',
            dataType: 'json',
            data: {
                actionSubmitAnalytic: 1,
                data_filter : data_filter,
                from_date : from_date,
                to_date : to_date,
                filter_actions : $('select[name="filter_actions"]').val(),
                filter_insights : $('select[name="filter_insights"]').val(),
                filter_customer: $('select[name="filter_customer"]').val(),
                filter_customer_by_action : $('select[name="filter_customer_by_action"]').val(),
                filter_visit_page_by_customer: $('select[name="filter_visit_page_by_customer"]').val(),
            },
            success: function(json)
            { 
                if(json.data_sessions)
                {
                    ets_trackingcustomer.updateDashboardChart(chart_session,json.label_datas,json.data_sessions);
                    $('.card.top-visit-page .card-body').html(json.top_visit_page);
                    $('.card.top-action .card-body').html(json.top_action);
                    $('.card.top-customer-insight .card-body').html(json.top_insight);
                    $('.card.top-customer .card-body').html(json.top_customer_by_action);
                    $('select[name="filter_actions"]').attr('data-filter',json.filter_action);
                    $('select[name="filter_customer"]').attr('data-filter',json.filter_action);
                    $('select[name="filter_customer_by_action"]').attr('data-filter',json.filter_action);
                    $('select[name="filter_visit_page_by_customer"]').attr('data-filter',json.filter_action);
                }
                $('body').removeClass('loading');
            }
        });
    },
    creatDashboardChart:function(ctx,datasets,labels){
        var aR = null; //store already returned tick
        var sessionLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                datasets: datasets,
                labels: labels,
                
            },
            options: {
              scales: {
                 yAxes: [{
                    ticks: {
                       min: 0,
                       callback: function(value) {if (value % 1 === 0) {return value;}},
                    }
                 }]
              },
              legend: {
                    display: true,
              },
              tooltips: {
                    mode: 'point'
              },
           }
        });
        return sessionLineChart;
    },
    updateDashboardChart:function(chart,label_datas,datas)
    {
        chart.data.labels=[];
        if(label_datas)
        {
            $(label_datas).each(function(){
                chart.data.labels.push(this);
            });
        }
        var i=0;
        chart.data.datasets.forEach(function(dataset){
            dataset.data=[];
            if(datas[i])
            {
                $(datas[i]).each(function(){
                    dataset.data.push(this);
                });
            }
            i++;
        });
        chart.update();
    }
}