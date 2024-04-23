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
    $('td.column-total_purchased_products,.column-exit_page,.column-last_action,.column-total_page_visit,.column-total_page_visit,.column-source,.column-id_message,.column-id_ets_hd_ticket,.column-id_ets_hd_ticket,.column-last_abandoned_id,.column-id_last_order_domain,.column-id_last_order,.column-total_purchased_products').removeClass('clickable');
    if($('input#customer_last_action').length)
        $('input#customer_last_action').remove();
    $(document).on('click','.arrange_customer_list,#desc-customer-arrange2:not(.custom_session_list)',function(e){
        if($('.ets_customer_popup').length==0)
        {
            var html_popup = '<div class="ets_customer_popup">';
                html_popup += '<div class="popup_content table">';
                    html_popup +='<div class="popup_content_tablecell">';
                        html_popup += '<div class="popup_content_wrap" style="position: relative">';
                        html_popup += '<span class="close_popup" title="Close">+</span>';
                            html_popup += '<div id="block-form-popup-dublicate">';
                            html_popup += '</div>';
                        html_popup += '</div>';
                    html_popup += '</div>';
                html_popup += '</div>';
            html_popup += '</div>';
            $('#customer_grid_panel').after(html_popup);
        }
        e.preventDefault();
        var href= $(this).attr('href');
        $('body').addClass('loading');
        $.ajax({
            url: href,
            data: 'ajax=1&arrangeCustomer=1',
            type: 'post',
            dataType: 'json',
            success: function(json){
                $('#block-form-popup-dublicate').html(json.block_html);
                $('.ets_customer_popup').addClass('show');
                $('body').removeClass('loading');
            },
            error: function(xhr, status, error)
            { 
                
            }
        });
    });
    $(document).on('click','button[name="btnSubmitRessetToDefaultList"]',function(e){
        e.preventDefault();
        if(!$(this).hasClass('loading'))
        {
            var $this = $(this);
            $this.addClass('loading');
            $.ajax({
                url: $('#desc-customer-arrange2').attr('href'),
                data: 'btnSubmitRessetToDefaultListCustomer=1',
                type: 'post',
                dataType: 'json',
                success: function(json){
                    if(json.success)
                    {
                        showSuccessMessage(json.success);
                        window.location.reload();
                    }
                    if(json.errors)
                        showErrorMessage(json.errors);
                    $this.removeClass('loading');
                },
                error: function(xhr, status, error)
                { 
                    $this.removeClass('loading');
                }
            });
        }
    });
    $(document).on('click','button[name="btnSubmitArrangeListCustomer"]',function(e){
        e.preventDefault();
        if(!$(this).hasClass('loading'))
        {
            var $this = $(this);
            var formData = new FormData($(this).parents('form').get(0));
            formData.append('btnSubmitArrangeListCustomer',1);
            $(this).addClass('loading');
            $.ajax({
                url: $('#desc-customer-arrange2').attr('href'),
                data: formData,
                type: 'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(json){
                    $this.removeClass('loading');
                    if(json.success)
                    {
                        $.growl.notice({ message: json.success });
                        // window.location.reload();
                    }
                    if(json.errors)
                       showErrorMessage(json.errors);
                },
                error: function(xhr, status, error)
                { 
                    $this.removeClass('loading');
                }
            });
        }
    });
    $(document).on('click','.open_close_list',function(){
       $(this).toggleClass('list_close').toggleClass('list_open');
       $(this).next('.list-group-content').toggle(); 
    });
    $(document).on('click','.close_field',function(){
        var field= $(this).data('field');
        $('#list-customer-fields .field_'+field).remove();
        $('input.arrange_list_customer[value="'+field+'"]').removeAttr('checked');
        $('input.arrange_list_customer[value="'+field+'"]').prop('checked',false);
    });
    $(document).on('click','.clear_all_fields',function(e){
       e.preventDefault(); 
       $('#list-customer-fields').html('');
       $('.list-group-content input[type="checkbox"]').removeAttr('checked');
       $('.list-group-content input[type="checkbox"]').prop('checked',false);
    });
    $(document).on('click','.clear_all_session_fields',function(e){
        $('#list-customer-fields li:not(.field_id_ets_tc_session):not(.field_customer_name)').remove();
        $('.list-group-content input[type="checkbox"]:not(#list_id_ets_tc_session):not(#list_customer_name)').removeAttr('checked');
        $('.list-group-content input[type="checkbox"]:not(#list_id_ets_tc_session):not(#list_customer_name)').prop('checked',false);
    });
    $(document).mouseup(function (e){
        if($('.ets_customer_popup #form_arrange').length)
        {
            var container_popup = $('.ets_customer_popup #form_arrange');
            if (!container_popup.is(e.target)&& container_popup.has(e.target).length === 0)
            {
                $('.ets_customer_popup').removeClass('show');
            }
        }
    });
    $(document).on('click','.close_popup,.close_duplicate',function(){
        $('.ets_customer_popup').removeClass('show');
    });
    $(document).keyup(function(e) { 
        if(e.keyCode == 27 && $('.ets_customer_popup').length) {
            $('.ets_customer_popup').removeClass('show');
        }
    });
    $(document).on('click','.all_arrange_list_customer',function(){
        var $list_group = $(this).closest('.list-group');
        if($(this).is(':checked'))
        {
            $list_group.find('input.arrange_list_customer').attr('checked','checked');
            $list_group.find('input.arrange_list_customer').prop('checked',true);
        } else {
            $list_group.find('input.arrange_list_customer:not(#list_id_ets_tc_session):not(#list_customer_name)').removeAttr('checked');
            $list_group.find('input.arrange_list_customer:not(#list_id_ets_tc_session):not(#list_customer_name)').prop('checked',false);
        }
        $list_group.find('input.arrange_list_customer').change();
    });
    $(document).on('change','.arrange_list_customer',function(){
        var field = $(this).val();
        var field_title= $(this).data('title');
        if($(this).is(':checked'))
        {
            if($('#list-customer-fields .field_'+field).length==0)
            {
               $('#list-customer-fields').append('<li class="field_'+field+'"><label><input name="listFieldCustomers[]" value="'+field+'" type="hidden">'+field_title+'</label><span class="close_field" data-field="'+field+'"> Close</span></li>')
            }
            if($(this).closest('.list-group').find('input.arrange_list_customer:checked').length == $(this).closest('.list-group').find('input.arrange_list_customer').length)
            {
                $(this).closest('.list-group').find('.all_arrange_list_customer').attr('checked','checked');
                $(this).closest('.list-group').find('.all_arrange_list_customer').prop('checked',true);
            }
        }
        else
        {
            $('#list-customer-fields .field_'+field).remove();
            $(this).closest('.list-group').find('.all_arrange_list_customer').removeAttr('checked');
            $(this).closest('.list-group').find('.all_arrange_list_customer').prop('checked',false);
        }
    });
    $(document).on('click','.btn_save_view',function(){
        $('#form_arrange .form-save-view').addClass('show');
        if($('#id_view_selected').val()!=0)
        {
            $('button[name="btnSubmitSaveAsView"]').show();
            $('#view_name').val($('#id_view_selected option[value="'+$('#id_view_selected').val()+'"]').html());                          
        }
        else
        {
            $('button[name="btnSubmitSaveAsView"]').hide();
            $('#view_name').val('');
        }
    });
    $(document).on('click','.close_form_save_view,.tbn-cancel-view',function(){
        $('#form_arrange .form-save-view').removeClass('show');
    });
    $(document).on('change','#id_view_selected2',function(){
        var $this = $(this);
        $.ajax({
            url: $('#desc-customer-arrange2').attr('href'),
            data: 'submitChangeView=1&id_view_selected='+$this.val(),
            type: 'post',
            dataType: 'json',
            success: function(json){
                if(json.success)
                {
                    $.growl.notice({ message: json.success });
                    window.location.reload();
                }
            },
            error: function(xhr, status, error)
            { 
                $this.removeClass('loading');
            }
        });
    });
    $(document).on('change','#id_view_selected',function(){
        var fields = $('#id_view_selected option[value="'+$(this).val()+'"]').data('fields');
        $('#list-customer-fields').html('');
        $('.list-group-content input[type="checkbox"]').removeAttr('checked');
        $('.list-group-content input[type="checkbox"]').prop('checked',false);
        if($(this).val()!=0)
        {
            $('.btn_delete_view').show();
            $('.btn_save_view').html(Update_view_text);
        }
        else
        {
            $('.btn_delete_view').hide();
            $('.btn_save_view').html(Save_view_text);
        }
        if(fields)
        {
            fields = fields.split(',');
            for(var i=0;i<fields.length;i++)
            {
                if($('input.arrange_list_customer[value="'+fields[i]+'"]').length)
                {
                    $('input.arrange_list_customer[value="'+fields[i]+'"]').prop('checked',true);
                    $('input.arrange_list_customer[value="'+fields[i]+'"]').change();
                }
                
            }
        }
        var $this = $(this);
        $.ajax({
            url: $('#desc-customer-arrange2').attr('href'),
            data: 'submitChangeView=1&id_view_selected='+$this.val(),
            type: 'post',
            dataType: 'json',
            success: function(json){
                if(json.success)
                {
                    $.growl.notice({ message: json.success });
                    window.location.reload();
                }
            },
            error: function(xhr, status, error)
            { 
                $this.removeClass('loading');
            }
        });
    });
    $(document).on('click','.btn_delete_view',function(e){
        e.preventDefault();
        if(!$(this).hasClass('loading') && $('#id_view_selected').val()!=0 &&  confirm(comfirm_delete_view))
        {
            var $this = $(this);
            $(this).addClass('loading');
            $('.ets_alert_error').remove();
            $.ajax({
                url: $('#desc-customer-arrange2').attr('href'),
                data: 'btnSubmitDeleteView=1&id_view_selected='+$('#id_view_selected').val(),
                type: 'post',
                dataType: 'json',
                success: function(json){
                    $this.removeClass('loading');
                    if(json.success)
                    {
                        $.growl.notice({ message: json.success });
                        if(json.list_sellect_view)
                        {
                            $('#form_view_selected').html(json.list_sellect_view);
                            $('#id_view_selected').change();
                            $('.btn_delete_view').hide();
                        }
                    }
                    if(json.errors)
                    {
                        $this.before(json.errors); 
                    }
                },
                error: function(xhr, status, error)
                { 
                    $this.removeClass('loading');
                }
            });
        }
        
    });
    $(document).on('click','button[name="btnSubmitSaveView"],button[name="btnSubmitSaveAsView"]',function(e){
        e.preventDefault();
        $('.ets_alert_error').remove();
        if(!$(this).hasClass('loading'))
        {
            var $this = $(this);
            var formData = new FormData($(this).parents('form').get(0));
            formData.append($(this).attr('name'),1);
            $(this).addClass('loading');
            $.ajax({
                url: $('#desc-customer-arrange2').attr('href'),
                data: formData,
                type: 'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(json){
                    $this.removeClass('loading');
                    if(json.success)
                    {
                        $.growl.notice({ message: json.success });
                        window.location.reload();
                        if(json.list_sellect_view)
                        {
                            $('#form_view_selected').html(json.list_sellect_view);
                        }
                    }
                    if(json.errors)
                    {
                        $this.parents('.form-save-view').find('.form-body .col-lg-9.error').append('<span class="ets_alert_error">'+json.errors+'</span>'); 
                    }
                },
                error: function(xhr, status, error)
                { 
                    $this.removeClass('loading');
                }
            });
        }
        
    });
    $(document).on('click','.custom_session_list',function(e){
        e.preventDefault();
        $('.ets_customer_popup').addClass('show');
    });
});