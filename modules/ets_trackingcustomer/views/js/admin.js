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
    $(document).on('click','.tbn-load-more-top-vist-page',function(e){
        e.preventDefault();
        if(!$(this).hasClass('loading'))
        {
            $(this).addClass('loading');
            var filter = $(this).data('filter');
            var page = $(this).data('page');
            $.ajax({
                url: '',
                data: {
                    loadmoreTopVisitPage:1,
                    ajax:1,
                    filter: filter,
                    page:page,
                    filter_visit_page_by_customer: $('select[name="filter_visit_page_by_customer"]').val(),
                },
                type: 'post',
                dataType: 'json',
                success: function(json){
                    $('.tbn-load-more-top-vist-page').parents('tr').remove();
                    $('table.tc-top-vist-page tbody').append(json.top_visit_page);
                },
                error: function(xhr, status, error)
                { 
                    $('.tbn-load-more-top-vist-page').removeClass('loading');
                }
            });
        }
    });
    $(document).on('click','.tbn-load-more-top-customer-by-action',function(e){
        e.preventDefault();
        if(!$(this).hasClass('loading'))
        {
            $(this).addClass('loading');
            var filter = $(this).data('filter');
            var page = $(this).data('page');
            $.ajax({
                url: '',
                data: {
                    loadmoreTopCustomerbyActions:1,
                    ajax:1,
                    filter: filter,
                    page:page,
                    filter_customer: $('select[name="filter_customer"]').val(),
                    filter_customer_by_action : $('select[name="filter_customer_by_action"]').val(),
                },
                type: 'post',
                dataType: 'json',
                success: function(json){
                    $('.tbn-load-more-top-customer-by-action').parents('tr').remove();
                    $('table.tc-top-customer-by-actions tbody').append(json.top_customer_by_actions);
                },
                error: function(xhr, status, error)
                { 
                    $('.tbn-load-more-top-customer-by-action').removeClass('loading');
                }
            });
        }
    });
    $(document).on('click','.tbn-load-more-top-action',function(e){
        e.preventDefault();
        if(!$(this).hasClass('loading'))
        {
            $(this).addClass('loading');
            var filter = $(this).data('filter');
            var page = $(this).data('page');
            $.ajax({
                url: '',
                data: {
                    loadmoreTopActions:1,
                    ajax:1,
                    filter: filter,
                    page:page,
                    filter_actions: $('select[name="filter_actions"]').val(),
                },
                type: 'post',
                dataType: 'json',
                success: function(json){
                    $('.tbn-load-more-top-action').parents('tr').remove();
                    $('table.tc-top-actions tbody').append(json.top_actions);
                },
                error: function(xhr, status, error)
                { 
                    $('.tbn-load-more-top-action').removeClass('loading');
                }
            });
        }
    });
    $(document).on('change','select[name="filter_actions"]',function(e){
        var filter = $(this).attr('data-filter');
        $('table.tc-top-actions').addClass('loading');
        $.ajax({
            url: '',
            data: {
                loadTopActions:1,
                filter: filter,
                filter_actions: $('select[name="filter_actions"]').val(),
            },
            type: 'post',
            dataType: 'json',
            success: function(json){
                $('table.tc-top-actions').replaceWith(json.top_actions);
            },
            error: function(xhr, status, error)
            { 
                $('table.tc-top-actions').removeClass('loading');
            }
        });
    });
    $(document).on('change','select[name="filter_customer_by_action"],select[name="filter_customer"]',function(e){
        var filter = $(this).attr('data-filter');
        $('table.tc-top-customer-by-actions').addClass('loading');
        $.ajax({
            url: '',
            data: {
                loadTopCustomerByActions:1,
                filter: filter,
                filter_customer_by_action: $('select[name="filter_customer_by_action"]').val(),
                filter_customer: $('select[name="filter_customer"]').val(),
            },
            type: 'post',
            dataType: 'json',
            success: function(json){
                $('table.tc-top-customer-by-actions').replaceWith(json.top_customers);
            },
            error: function(xhr, status, error)
            { 
                $('table.tc-top-customer-by-actions').removeClass('loading');
            }
        });
    });
    $(document).on('change','select[name="filter_visit_page_by_customer"]',function(e){
        var filter = $(this).attr('data-filter');
        $('table.tc-top-vist-page').addClass('loading');
        $.ajax({
            url: '',
            data: {
                loadTopVisitPage:1,
                filter: filter,
                filter_visit_page_by_customer: $('select[name="filter_visit_page_by_customer"]').val(),
            },
            type: 'post',
            dataType: 'json',
            success: function(json){
                $('table.tc-top-vist-page').replaceWith(json.top_visit_page);
            },
            error: function(xhr, status, error)
            { 
                $('table.tc-top-customer-by-actions').removeClass('loading');
            }
        });
    });
    $(document).on('change','select[name="filter_insights"]',function(e){
        var filter = $(this).attr('data-filter');
        $('.top-customer-insight table').addClass('loading');
        $.ajax({
            url: '',
            data: {
                loadTopInsight:1,
                filter: filter,
                filter_insights: $('select[name="filter_insights"]').val(),
            },
            type: 'post',
            dataType: 'json',
            success: function(json){
                $('.top-customer-insight .card-body').html(json.top_insight);
            },
            error: function(xhr, status, error)
            { 
                $('.top-customer-insight table').removeClass('loading');
            }
        });
    });
    if($('.module_confirmation.alert.alert-success').length)
    {
        setTimeout(function(){
            $('.module_confirmation.alert.alert-success').parent('.bootstrap').remove();
        },3000);
    }
    $(document).on('click','.btn-clear-session',function(e){
        e.preventDefault();
        if(!$(this).hasClass('loading') && confirm($(this).data('confirm')))
        {
            var $this = $(this);
            $(this).addClass('loading');
            $.ajax({
                url: '',
                data: 'btnSubmitClearSession=1&type='+$('#ETS_TC_CLEAR_SESSION').val(),
                type: 'post',
                dataType: 'json',
                success: function(json){
                    if(json.success)
                    {
                        showSuccessMessage(json.success);
                    }
                    $this.removeClass('loading');
                },
                error: function(xhr, status, error)
                { 
                    $this.removeClass('loading');
                }
            });
        }
        
    });
    $(document).on('click','.open_close_session',function(){
       $(this).toggleClass('session_close').toggleClass('session_open');
       $(this).parent().next('.session-body').toggle(); 
       if($(this).hasClass('session_close'))
            $(this).attr('title',$(this).data('title-open'));
       else
            $(this).attr('title',$(this).data('title-close'));
    });
    if ($(".ets_tc_datepicker input").length > 0) {
		$(".ets_tc_datepicker input").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth:true,
            changeYear:true
		});
	}
    $(document).on('click','.btn-view-cart',function(){
        $(this).next('.ets_action_view_popup').addClass('show');
    });
    $(document).mouseup(function (e){
        if($('.ets_action_view_popup.show').length)
        {
            var container_popup = $('.ets_action_view_popup #block-view-action');
            if (!container_popup.is(e.target)&& container_popup.has(e.target).length === 0)
            {
                $('.ets_action_view_popup').removeClass('show');
            }
        }
    });
    $(document).on('click','.close_popup',function(){
        $('.ets_action_view_popup').removeClass('show');
    });
    $(document).keyup(function(e) { 
        if(e.keyCode == 27 && $('.ets_action_view_popup.show').length) {
            $('.ets_action_view_popup').removeClass('show');
        }
    });
    $(document).on('click','.form-group.token_row .input-group-addon',function(){
        code = '';
    	/* There are no O/0 in the codes in order to avoid confusion */
    	var chars = "123456789ABCDEFGHIJKLMNPQRSTUVWXYZ";
    	for (var i = 1; i <= 12; ++i)
    		code += chars.charAt(Math.floor(Math.random() * chars.length));
        $('input[name="ETS_TC_TOKEN_AJAX"]').val(code.toLowerCase()).change(); 
    });
});

(function() {
    "use strict";

    function fnSetTopNavPos(_wrapperID) {
        var wrapper = document.getElementById(_wrapperID);
        if (!wrapper) {
            return;
        }
        var content = wrapper.parentElement,
            pageHead = wrapper.parentElement.querySelector('.bootstrap > .page-head');
        if (!content || !pageHead) {
            return;
        }
        var cpTop = 105;
        try {
            cpTop = parseInt(getComputedStyle(content)['padding-top'], 10);
        } catch (e) {
            cpTop = 105;
        }
        var menuOffset = $(pageHead).offset().top + $(pageHead).outerHeight() - $(window).scrollTop();
        var offset = $(content).offset().top + cpTop - menuOffset;
        wrapper.style.setProperty('--etstc-wrapper-offset-top', offset + 'px');
        wrapper.style.setProperty('--etstc-menu-offset-top', menuOffset + 'px');
    }

    document.addEventListener('DOMContentLoaded', function() {
        var topNavResizeTimeout = 100;
        var adminPanelWrapper = document.querySelector('#content > .ets_tc_tabs');
        if (adminPanelWrapper) {
            adminPanelWrapper = adminPanelWrapper.parentElement;
            adminPanelWrapper.classList.add('etstc-settings-wrapper');
            document.body.classList.add('etstc-settings');
            let _wrapperID = '';
            if (!adminPanelWrapper.hasAttribute('id')) {
                _wrapperID = 'etstc-settings-wrapper';
                adminPanelWrapper.setAttribute('id', _wrapperID);
            } else {
                _wrapperID = adminPanelWrapper.getAttribute('id');
            }
            setTimeout(function() {
                fnSetTopNavPos(_wrapperID);
            }, 100);

            window.addEventListener('resize', function() {
                clearTimeout(topNavResizeTimeout);
                topNavResizeTimeout = setTimeout(function() {
                    fnSetTopNavPos(_wrapperID);
                }, 100);
            });
        }
    });
})(jQuery);