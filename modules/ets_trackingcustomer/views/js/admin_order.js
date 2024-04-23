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
$(document).ready(function(){
    if($('.adminorders').length && $('#order_filter_form .js-bulk-action-checkbox').length)
    {
       $('#order_filter_form .js-bulk-action-checkbox').each(function(){
            var idOrder = $(this).val();
            $(this).parents('tr').find('.dropdown-menu').append('<a class="btn tooltip-link js-link-row-action dropdown-item" target="_blank" href="'+ets_tc_link_view_session+'&id_order='+idOrder+'" data-confirm-message="" data-clickable-row=""><i class="material-icons icon icon-search-plus fa fa-search-plus"></i> '+View_session_text+'</a>');
       }); 
    }
    else if($('#order-view-page').length)
    {
        $('#order-view-page .order-navigation').before('<a class="btn btn-action tc_view_session" href="'+ets_tc_link_view_session+'" title="'+View_session_text+'" data-url="'+ets_tc_link_view_session+'" target="_blank"><i class="icon icon-search-plus fa fa-search-plus"></i> '+View_session_text+' </a>');
    } 
});