/*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
$(document).ready(function(){
    $(document).on('click','.mm_add_menu',function(){
        $('.mm_pop_up').addClass('hidden');
        $('.mm_menu_form').removeClass('hidden');
        $('.mm_forms').removeClass('hidden').parents('.mm_popup_overlay').removeClass('hidden');
        if($('.mm_menu_form .mm_form form input[name="itemId"]').length <= 0 || $('.mm_menu_form .mm_form form input[name="mm_object"]')!='MM_Menu'  || $('.mm_menu_form .mm_form form input[name="itemId"]').length > 0 && parseInt($('.mm_menu_form .mm_form form input[name="itemId"]').val())!=0)
            $('.mm_menu_form .mm_form').html($('.mm_menu_form_new').html());
        checkFormFields();
        $('.mm-alert').remove();
        return false;
    });
    $(document).on('click','.mm_import_button',function(){
        $(this).parents('.mm_pop_up').addClass('hidden');
        $(this).parents('.mm_forms').addClass('hidden');
        $('.mm_export_form').removeClass('hidden');
        $('.mm_export.mm_pop_up').removeClass('hidden');
    });
    $(document).on('click','.mm_menu_toggle',function(){
        if(!$(this).parents('.mm_menus_li').eq(0).hasClass('open'))
        {
            $('.mm_menus_li').removeClass('open');
            $(this).parents('.mm_menus_li').eq(0).addClass('open');
            setTimeout(function() {
                var item_active_height = $('.mm_menus_li.open').find('.mm_columns_ul').height();
                console.log(item_active_height);
                $('.ets_megamenu').css('min-height',item_active_height+'px');
            }, 200);

        }
    });
    $(document).on('click','.mm_save',function(){
        if(!$(this).parents('form').eq(0).hasClass('active') && $('.defaultForm.active').length <= 0)
        {
            $(this).parents('form').eq(0).addClass('active');
            $(this).parents('.mm_save_wrapper').eq(0).addClass('loading');
            $('.mm-alert').remove();
            var formData = new FormData($(this).parents('form').get(0));
            $.ajax({
                url: $(this).parents('form').eq(0).attr('action'),
                data: formData,
                type: 'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(json){
                    showSaveMessage(json.alert);
                    $('.mm_save_wrapper').removeClass('loading');
                    if(json.images && json.success)
                    {
                        $.each(json.images,function(i,item){
                            if($('.defaultForm.active input[name="'+item.name+'"]').length > 0)
                            {
                                updatePreviewImage(item.name,item.url,item.delete_url);
                            }
                        });
                    }
                    if(json.itemId && json.itemKey && json.success)
                    {
                        $('.defaultForm.active input[name="'+json.itemKey+'"]').val(json.itemId);
                        $('.defaultForm.active input[name="itemId"]').val(json.itemId);
                    }
                    if(json.mm_object=='MM_Menu' && json.success && json.title)
                    {
                        if($('.mm_menus ul').length <= 0)
                        {
                            $('.mm_menus').append('<ul class="mm_menus_ul"></ul>');
                            //Sortable
                            mmSort('.mm_menus_ul');
                        }
                        if($('.mm_menus > ul.mm_menus_ul > li.item'+json.itemId).length <=0 )
                        {
                            $('.mm_menus_li').removeClass('open');
                            $('.mm_menus > ul.mm_menus_ul').append('<li class="mm_menus_li '+(!json.vals.enabled ? ' mm_disabled ' : '')+' item'+json.itemId+' open" data-id-menu="'+json.itemId+'" data-obj="menu"><div class="mm_menus_li_content"><span class="mm_menu_name mm_menu_toggle">'+json.title+'</span><div class="mm_buttons"><span class="mm_menu_delete" title="'+mmDeleteTitleTxt+'">'+mmDeleteTxt+'</span><span class="mm_duplicate" title="'+mmDuplicateMenuTxt+'">'+mmDuplicateTxt+'</span><span class="mm_menu_edit">'+mmEditTxt+'</span><span class="mm_menu_toggle mm_menu_toggle_arrow">'+mmCloseTxt+'</span><div class="mm_add_column btn btn-default" data-id-menu="'+json.vals.id_menu+'">'+mmAddColumnTxt+'</div></div></div><ul class="mm_columns_ul"></ul></li>');
                            $('.mm_form form .panel-heading').html(mmEditMenuTxt);
                            mmSort('.mm_columns_ul');
                        }
                        else
                        {
                            $('.mm_menus > ul.mm_menus_ul > li.item'+json.itemId + ' .mm_menu_name').html(json.title);
                            if(json.vals.enabled)
                                $('.mm_menus > ul.mm_menus_ul > li.item'+json.itemId).removeClass('mm_disabled');
                            else
                                $('.mm_menus > ul.mm_menus_ul > li.item'+json.itemId).addClass('mm_disabled');
                        }
                    }
                    if(json.mm_object=='MM_Column' && json.success)
                    {
                        if($('.mm_menus_li.item'+json.vals.id_menu+' > ul.mm_columns_ul').length <= 0)
                        {
                            $('.mm_menus_li.item'+json.vals.id_menu).append('<ul class="mm_columns_ul"></ul>');
                            //Sortable
                            mmSort('.mm_columns_ul');
                        }
                        if($('.mm_menus_li.item'+json.vals.id_menu+' > ul.mm_columns_ul > li.item'+json.itemId).length <=0 )
                        {
                            $('.mm_menus_li.item'+json.vals.id_menu+' > ul.mm_columns_ul').append('<li class="mm_columns_li item'+json.itemId+' column_size_'+json.vals.column_size+' '+(json.vals.is_breaker ? 'mm_breaker' : '')+'" data-id-column="'+json.itemId+'" data-obj="column">'+'<div class="mm_buttons"><span class="mm_column_delete" title="'+mmDeleteColumnTxt+'">'+mmDeleteTxt+'</span><span class="mm_duplicate" title="'+mmDuplicateColumnTxt+'">'+mmDuplicateTxt+'</span><span class="mm_column_edit" title="'+mmEditColumnTxt+'">'+mmEditTxt+'</span><div class="mm_add_block btn btn-default" data-id-column="'+json.vals.id_column+'">'+mmAddBlockTxt+'</div></div><ul class="mm_blocks_ul"></ul></li>');
                            $('.mm_form form .panel-heading').html(mmEditColumnTxt);
                            mmSort('.mm_blocks_ul');
                        }
                        else
                            $('.mm_menus_li.item'+json.vals.id_menu+' > ul.mm_columns_ul > li.item'+json.itemId).attr('class','mm_columns_li item'+json.itemId+' column_size_'+json.vals.column_size+' '+(json.vals.is_breaker ? 'mm_breaker' : ''));
                    }
                    if(json.mm_object=='MM_Block' && json.success && json.vals.blockHtml)
                    {
                        if($('.mm_columns_li.item'+json.vals.id_column+' > ul.mm_blocks_ul').length <= 0)
                        {
                            $('.mm_columns_li.item'+json.vals.id_column).append('<ul class="mm_blocks_ul"></ul>');
                            //Sortable
                            mmSort('.mm_blocks_ul');
                        }
                        if($('.mm_columns_li.item'+json.vals.id_column+' > ul.mm_blocks_ul > li.item'+json.itemId).length <=0 )
                        {
                            $('.mm_columns_li.item'+json.vals.id_column+' > ul.mm_blocks_ul').append('<li class="mm_blocks_li '+(!json.vals.enabled ? ' mm_disabled ' : '')+' item'+json.itemId+'" data-id-block="'+json.itemId+'" data-obj="block">'+'<div class="mm_buttons"><span class="mm_block_delete" title="'+mmDeleteBlockTxt+'">'+mmDeleteTxt+'</span><span class="mm_duplicate" title="'+mmDuplicateBlockTxt+'">'+mmDuplicateTxt+'</span><span class="mm_block_edit" title="'+mmEditBlockTxt+'">'+mmEditTxt+'</span></div><div class="mm_block_wrapper">'+json.vals.blockHtml+'</div></li>');
                            $('.mm_form form .panel-heading').html(mmEditBlockTxt);
                        }
                        else
                        {
                            $('.mm_columns_li.item'+json.vals.id_column+' > ul.mm_blocks_ul > li.item'+json.itemId + ' .mm_block_wrapper').html(json.vals.blockHtml);
                            if(json.vals.enabled)
                                $('.mm_columns_li.item'+json.vals.id_column+' > ul.mm_blocks_ul > li.item'+json.itemId).removeClass('mm_disabled');
                            else
                                $('.mm_columns_li.item'+json.vals.id_column+' > ul.mm_blocks_ul > li.item'+json.itemId).addClass('mm_disabled');
                        }
                    }
                    $('.defaultForm.active').removeClass('active');
                    if(json.success)
                    {
                        mmAlertSucccess($('.mm_menu_form .alert-success').html());
                        $('.mm_pop_up').addClass('hidden').parents('.mm_forms').addClass('hidden').parents('.mm_popup_overlay').addClass('hidden');
                    }
                    setTimeout(function() {
                        var min_height = $('.mm_menus_ul > li.open').find('.mm_columns_ul').height();
                        $('.ets_megamenu').css('min-height',min_height+'px');
                    }, 200);
                },
                error: function(xhr, status, error)
                {
                    $('.defaultForm.active').removeClass('active');
                    $('.mm_save_wrapper').removeClass('loading');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    $(document).on('click','.mm_close',function(){
        $(this).parents('.mm_pop_up').addClass('hidden').parents('.mm_popup_overlay').addClass('hidden');
        $(this).parents('.mm_forms').addClass('hidden');
        $('.mm_export_form').addClass('hidden');
    });
    $(document).on('change','input[type="file"]',function(){
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','zip'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            $(this).val('');
            if($(this).next('.dummyfile').length > 0)
            {
                $(this).next('.dummyfile').eq(0).find('input[type="text"]').val('');
            }
            if($(this).parents('.col-lg-9').eq(0).find('.preview_img').length > 0)
                $(this).parents('.col-lg-9').eq(0).find('.preview_img').eq(0).remove();
            if($(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').length > 0)
            {
                $(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').removeClass('hidden');
                $(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.uploaded_img_wrapper').removeClass('hidden');
            }
            alert(ets_mm_invalid_file);
        }
        else
        {
            readURL(this);
        }
    });
    $(document).on('click','.del_preview',function(){
        if($(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').length > 0)
        {
            $(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').removeClass('hidden');
            $(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.uploaded_img_wrapper').removeClass('hidden');
        }
        $(this).parents('.col-lg-9').eq(0).find('.dummyfile input[type="text"]').val('');
        if($(this).parents('.col-lg-9').eq(0).find('input[type="file"]').length > 0)
        {
            $(this).parents('.col-lg-9').eq(0).find('input[type="file"]').eq(0).val('');
        }

        $(this).parents('.preview_img').remove();
    });
    $(document).on('click','.delete_url',function(){
        var delLink = $(this);
        if(!$(this).parents('form').eq(0).hasClass('active') && $('.defaultForm.active').length <= 0)
        {
            $(this).parents('form').eq(0).addClass('active');
            $.ajax({
                url: $(this).attr('href'),
                data: {},
                type: 'post',
                dataType: 'json',
                success: function(json){
                    showSaveMessage(json.alert);
                    if(json.success)
                    {
                        delLink.parents('.uploaded_img_wrapper').eq(0).prev('.uploaded_image_label').eq(0).remove();
                        delLink.parents('.uploaded_img_wrapper').eq(0).remove();
                    }
                    $('.defaultForm.active').removeClass('active');
                },
                error: function(xhr, status, error)
                {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                    $('.defaultForm.active').removeClass('active');
                }
            });
        }
        return false;
    });
    $(document).on('click','.mm_menu_edit',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $('.ets_megamenu').addClass('loading-form');
            $('.mm-alert').remove();
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).data('id-menu'),
                    request_form: 1,
                    mm_object: 'MM_Menu',
                },
                success: function(json){
                    showSaveMessage(json.alert);
                    $('.mm_pop_up').addClass('hidden');
                    $('.mm_forms').removeClass('hidden');
                    $('.mm_menu_form').removeClass('hidden');
                    $('.mm_menu_form .mm_form').html(json.form);
                    checkFormFields();
                    $('.mm_menu_form .mm_form .mColorPickerInput').mColorPicker();
                    $('.mm_menus_li.item'+json.itemId+' .mm_menu_edit').removeClass('active');
                    $('.mm_menus_li').removeClass('open');
                    $('.mm_menus_li.item'+json.itemId).addClass('open');
                    $('.ets_megamenu').removeClass('loading-form');
                },
                error: function(xhr, status, error)
                {
                    $('.mm_menu_edit').removeClass('active');
                    $('.ets_megamenu').removeClass('loading-form');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
    });
    $(document).on('click','.mm_menu_delete',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).data('id-menu'),
                    deleteobject: 1,
                    mm_object: 'MM_Menu',
                },
                success: function(json){
                    if(json.success)
                    {
                        if($('.mm_menus_li.item'+json.itemId).hasClass('open'))
                        {
                            if($('.mm_menus_li.item'+json.itemId).prev('li').length > 0)
                                $('.mm_menus_li.item'+json.itemId).prev('li').addClass('open');
                            else
                            if($('.mm_menus_li.item'+json.itemId).next('li').length > 0)
                                $('.mm_menus_li.item'+json.itemId).next('li').addClass('open');
                        }
                        $('.mm_menus_li.item'+json.itemId).remove();
                        mmAlertSucccess(json.successMsg);
                    }
                    else
                        $('.mm_menus_li.item'+json.itemId+' .mm_menu_delete').removeClass('active');
                },
                error: function(xhr, status, error)
                {
                    $('.mm_menu_delete').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });

    //Column

    $(document).on('click','.mm_add_column',function(){
        $('.mm_pop_up').addClass('hidden');
        $('.mm_forms').removeClass('hidden');
        $('.mm_menu_form').removeClass('hidden');
        if($('.mm_menu_form .mm_form form input[name="itemId"]').length <= 0 || $('.mm_menu_form .mm_form form input[name="mm_object"]')!='MM_Column'  || $('.mm_menu_form .mm_form form input[name="itemId"]').length > 0 && (parseInt($('.mm_menu_form .mm_form form input[name="itemId"]').val())!=0 || parseInt($('.mm_menu_form .mm_form form input[name="itemId"]').val())==0 && parseInt($('.mm_menu_form .mm_form form input[name="id_menu"]').val()))!=parseInt($(this).attr('data-id-menu')))
        {
            $('.mm_menu_form .mm_form').html($('.mm_column_form_new').html());
            $('.mm_menu_form .mm_form form input[name="id_menu"]').val($(this).attr('data-id-menu'));
        }
        $('.mm-alert').remove();
        return false;
    });
    $(document).on('click','.mm_column_delete',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).data('id-column'),
                    deleteobject: 1,
                    mm_object: 'MM_Column',
                },
                success: function(json){
                    if(json.success)
                    {
                        $('.mm_columns_li.item'+json.itemId).remove();
                        mmAlertSucccess(json.successMsg);
                    }
                    else
                        $('.mm_columns_li.item'+json.itemId+' .mm_column_delete').removeClass('active');
                },
                error: function(xhr, status, error)
                {
                    $('.mm_column_delete').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    $(document).on('click','.mm_column_edit',function(){
        if(!$(this).hasClass('active'))
        {
            $('.ets_megamenu').addClass('loading-form');
            $(this).addClass('active');
            $('.mm-alert').remove();
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).data('id-column'),
                    request_form: 1,
                    mm_object: 'MM_Column',
                },
                success: function(json){
                    $('.mm_pop_up').addClass('hidden');
                    $('.mm_forms').removeClass('hidden');
                    $('.mm_menu_form').removeClass('hidden');
                    $('.mm_menu_form .mm_form').html(json.form);
                    checkFormFields();
                    $('.mm_menu_form .mm_form .mColorPickerInput').mColorPicker();
                    $('.mm_columns_li.item'+json.itemId+' .mm_column_edit').removeClass('active');
                    $('.ets_megamenu').removeClass('loading-form');
                },
                error: function(xhr, status, error)
                {
                    $('.mm_column_edit').removeClass('active');
                    $('.ets_megamenu').removeClass('loading-form');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
    });

    //Block
    $(document).on('click','.mm_add_block',function(){
        $('.mm_pop_up').addClass('hidden');
        $('.mm_menu_form').removeClass('hidden');
        $('.mm_forms').removeClass('hidden');
        if($('.mm_menu_form .mm_form form input[name="itemId"]').length <= 0 || $('.mm_menu_form .mm_form form input[name="mm_object"]')!='MM_Block'  || $('.mm_menu_form .mm_form form input[name="itemId"]').length > 0 && (parseInt($('.mm_menu_form .mm_form form input[name="itemId"]').val())!=0 || parseInt($('.mm_menu_form .mm_form form input[name="itemId"]').val())==0 && parseInt($('.mm_menu_form .mm_form form input[name="id_column"]').val()))!=parseInt($(this).attr('data-id-column')))
        {
            $('.mm_menu_form .mm_form').html($('.mm_block_form_new').html());
            $('.mm_menu_form .mm_form form input[name="id_column"]').val($(this).attr('data-id-column'));
            checkFormFields();
        }
        $('.mm-alert').remove();
        return false;
    });
    $(document).on('click','.mm_block_edit',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $('.ets_megamenu').addClass('loading-form');
            $('.mm-alert').remove();
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).data('id-block'),
                    request_form: 1,
                    mm_object: 'MM_Block',
                },
                success: function(json){
                    $('.mm_pop_up').addClass('hidden');
                    $('.mm_forms').removeClass('hidden');
                    $('.mm_menu_form').removeClass('hidden');
                    $('.mm_menu_form .mm_form').html(json.form);
                    checkFormFields();
                    $('.mm_menu_form .mm_form .mColorPickerInput').mColorPicker();
                    $('.mm_blocks_li.item'+json.itemId+' .mm_block_edit').removeClass('active');
                    $('.ets_megamenu').removeClass('loading-form');
                },
                error: function(xhr, status, error)
                {
                    $('.mm_block_edit').removeClass('active');
                    $('.ets_megamenu').removeClass('loading-form');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
    });
    $(document).on('click','.mm_block_delete',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).data('id-block'),
                    deleteobject: 1,
                    mm_object: 'MM_Block',
                },
                success: function(json){
                    if(json.success)
                    {
                        $('.mm_blocks_li.item'+json.itemId).remove();
                        mmAlertSucccess(json.successMsg);
                    }
                    else
                        $('.mm_blocks_li.item'+json.itemId+' .mm_block_delete').removeClass('active');
                },
                error: function(xhr, status, error)
                {
                    $('.mm_block_delete').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });

    //Duplicate
    $(document).on('click','.mm_duplicate',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            var mm_object = $(this).parents('li').eq(0).data('obj');
            var itemId = 0;
            if(mm_object=='menu')
                itemId = $(this).parents('li').eq(0).data('id-menu');
            else if(mm_object=='column')
                itemId = $(this).parents('li').eq(0).data('id-column');
            else
                itemId = $(this).parents('li').eq(0).data('id-block');
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: itemId,
                    duplicateItem: 1,
                    mm_object: mm_object,
                },
                success: function(json){
                    if(json.mm_object!='menu')
                    {
                        if($('li[data-id-'+json.mm_object+'="'+json.itemId+'"] > .mm_buttons .mm_duplicate').length > 0)
                            $('li[data-id-'+json.mm_object+'="'+json.itemId+'"] > .mm_buttons .mm_duplicate').removeClass('active');
                    }
                    else
                    {
                        if($('li[data-id-'+json.mm_object+'="'+json.itemId+'"] > .mm_menus_li_content .mm_buttons > .mm_duplicate').length > 0)
                            $('li[data-id-'+json.mm_object+'="'+json.itemId+'"] > .mm_menus_li_content .mm_buttons > .mm_duplicate').removeClass('active');
                    }
                    if(json.html)
                    {
                        if($('li[data-id-'+json.mm_object+'="'+json.itemId+'"]').length > 0)
                            $('li[data-id-'+json.mm_object+'="'+json.itemId+'"]').after(json.html);
                        else
                        if($('ul.mm_'+json.mm_object+'s_ul').length > 0)
                            $('ul.mm_'+json.mm_object+'s_ul').append(json.html);
                    }
                    if(json.mm_object=='menu')
                    {
                        $('.mm_menus_li').removeClass('open');
                        $('li[data-id-'+json.mm_object+'="'+json.newItemId+'"]').addClass('open');
                        setTimeout(function() {
                            var min_height = $('.mm_menus_ul > li.open').find('.mm_columns_ul').height();
                            $('.ets_megamenu').css('min-height',min_height+'px');
                        }, 200);

                    }
                    mmSort('.mm_blocks_ul');
                    mmSort('.mm_columns_ul');
                    mmSort('.mm_menus_ul');
                    if(json.alerts.success)
                        mmAlertSucccess(json.alerts.success);
                    else
                        alert(json.alerts.errors);
                },
                error: function(xhr, status, error)
                {
                    $('.mm_duplicate').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });

    $(document).on('change','.mm_form select[name="link_type"],.mm_form select[name="block_type"]',function(){
        checkFormFields();
    });

    //Config
    $(document).on('click','.mm_config_save',function(){
        if(!$('.mm_config_form_content').hasClass('active'))
        {
            $('.mm_config_form_content').addClass('active');
            $(this).parents('.mm_save_wrapper').eq(0).addClass('loading');
            $('.mm-alert').remove();
            var formData = new FormData($(this).parents('form').get(0));
            $.ajax({
                url: $(this).parents('form').eq(0).attr('action'),
                data: formData,
                type: 'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(json){
                    $('.mm-alert').remove();
                    //$('.ets_megamenu').attr('class','ets_megamenu '+json.layout_direction);
                    $('.mm_config_form_content').removeClass('active');
                    $('.mm_config_form_content').append(json.alert);
                    if(json.success)
                    {
                        mmAlertSucccess($('.mm_config_form_content .alert-success').html());
                        $('.mm_pop_up').addClass('hidden').parents('.mm_popup_overlay').addClass('hidden');
                    }
                    $('.mm_save_wrapper').removeClass('loading');

                },
                error: function(xhr, status, error)
                {
                    $('.mm-alert').remove();
                    $('.mm_save_wrapper').removeClass('loading');
                    $('.mm_config_form_content').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    $(document).on('click','.mm_config_button',function(){
        $('.mm_pop_up').addClass('hidden');
        $('.mm_config_form').removeClass('hidden').parents('.mm_popup_overlay').removeClass('hidden');
        $('.mm-alert.alert-success').remove();
    });
    $(document).on('click','.mm_import_menu',function(){
        if(!$('.mm_import_option_form').hasClass('active'))
        {
            $('.mm_import_option_form').addClass('active');
            var formData = new FormData($(this).parents('form').get(0));
            $('.mm_import_option_form .alert').remove();
            $.ajax({
                url: $('.mm_import_option_form').attr('action'),
                data: formData,
                type: 'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(json){
                    $('.mm_import_option_form').removeClass('active');
                    if(json.success)
                    {
                        $('.mm_pop_up').addClass('hidden');
                        $('.mm_forms').addClass('hidden');
                        $('.mm_export_form').addClass('hidden');
                        $('.mm_export.mm_pop_up').addClass('hidden');
                        mmAlertSucccess(json.success);
                        setTimeout(function(){
                            location.reload();
                        },3000);
                    }
                    else
                    {
                        $('.mm_import_option_form').append('<div class="alert alert-danger">'+json.error+'</div>');
                    }
                },
                error: function(xhr, status, error)
                {
                    $('.mm_import_option_form').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    //Reset
    $(document).on('click','.mm_reset_default',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    reset_config: 1,
                },
                success: function(json){
                    $('.mm_reset_default').removeClass('active');
                    if(json.success)
                    {
                        mmAlertSucccess(json.success);
                        setTimeout(function(){
                            location.reload();
                        },3000);
                    }
                },
                error: function(xhr, status, error)
                {
                    $('.mm_reset_default').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    //Sortable
    mmSort('.mm_blocks_ul');
    mmSort('.mm_columns_ul');
    mmSort('.mm_menus_ul');

    //Color
    if($('select[name="ETS_MM_SKIN"]').val()=='custom')
        $('.row_ets_mm_color1, .row_ets_mm_color2, .row_ets_mm_color3, .row_ets_mm_color4, .row_ets_mm_color5, .row_ets_mm_color6, .row_ets_mm_color7, .row_ets_mm_color8, .row_ets_mm_color9').show();
    else
        $('.row_ets_mm_color1, .row_ets_mm_color2, .row_ets_mm_color3, .row_ets_mm_color4, .row_ets_mm_color5, .row_ets_mm_color6, .row_ets_mm_color7, .row_ets_mm_color8, .row_ets_mm_color9').hide();
    $(document).on('change','select[name="ETS_MM_SKIN"]',function(){
        if($('select[name="ETS_MM_SKIN"]').val()=='custom')
            $('.row_ets_mm_color1, .row_ets_mm_color2, .row_ets_mm_color3, .row_ets_mm_color4, .row_ets_mm_color5, .row_ets_mm_color6, .row_ets_mm_color7, .row_ets_mm_color8, .row_ets_mm_color9').show();
        else
            $('.row_ets_mm_color1, .row_ets_mm_color2, .row_ets_mm_color3, .row_ets_mm_color4, .row_ets_mm_color5, .row_ets_mm_color6, .row_ets_mm_color7, .row_ets_mm_color8, .row_ets_mm_color9').hide();
    });

    //Cache
    if(parseInt($('input[name="ETS_MM_CACHE_ENABLED"]:checked').val())==1)
        $('.row_ets_mm_cache_life_time').show();
    else
        $('.row_ets_mm_cache_life_time').hide();
    $(document).on('change','input[name="ETS_MM_CACHE_ENABLED"]',function(){
        if(parseInt($('input[name="ETS_MM_CACHE_ENABLED"]:checked').val())==1)
            $('.row_ets_mm_cache_life_time').show();
        else
            $('.row_ets_mm_cache_life_time').hide();
    });
    $(document).on('click','.mm_clear_cache',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $.ajax({
                url: $(this).attr('href'),
                data: {
                    clearMenuCache: 1,
                },
                type: 'post',
                dataType: 'json',
                success: function(json){
                    $('.mm_clear_cache').removeClass('active');
                    if(json.success)
                        mmAlertSucccess(json.success);
                },
                error: function(xhr, status, error)
                {
                    $('.mm_clear_cache').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    //Initial events
    $('.ets_mm_fancy').fancybox();
    if($('.mm_menus_ul > li').length > 0){
        $('.mm_menus_ul > li:first-child').addClass('open');
        setTimeout(function() {
            var min_height = $('.mm_menus_ul > li:first-child').find('.mm_columns_ul').height();
            $('.ets_megamenu').css('min-height',min_height+'px');
        }, 200);
    }

    $(document).mouseup(function (e)
    {
        var container = $(".mm_pop_up");
        var colorpanel = $('#mColorPicker');
        if (!container.is(e.target)
            && container.has(e.target).length === 0 && !colorpanel.is(e.target) && colorpanel.has(e.target).length === 0
            && ($('#mColorPicker').length <=0 || ($('#mColorPicker').length > 0 && $('#mColorPicker').css('display')=='none'))
            && $('.mm_export.mm_pop_up').hasClass('hidden'))
        {
            $('.mm_pop_up').addClass('hidden').parents('.mm_popup_overlay').addClass('hidden');
            $('.mm_forms').addClass('hidden');
            $('.mm_export_form').addClass('hidden');
        }
    });
    $(document).keyup(function(e) {
        if (e.keyCode === 27)
        {
            $('.mm_pop_up').addClass('hidden').parents('.mm_popup_overlay').addClass('hidden');
            $('.mm_forms').addClass('hidden');
            $('.mm_export_form').addClass('hidden');
        }
    });
    $(document).on('click','.mm_change_mode',function(){
        $('.mm_change_mode').removeClass('active');
        $(this).addClass('active');
        if($(this).hasClass('mm_layout_rlt'))
            $('.ets_megamenu').removeClass('ets-dir-ltr').addClass('ets-dir-rtl');
        else
            $('.ets_megamenu').removeClass('ets-dir-rtl').addClass('ets-dir-ltr');
    });

    $(document).on('click','.mm_view_mode',function(){
        if(!$(this).hasClass('active'))
        {
            $('.mm_view_mode').removeClass('active');
            $(this).addClass('active');
            if($(this).hasClass('mm_view_mode_tab_select'))
                $('.ets_megamenu').removeClass('mm_view_mode_list').addClass('mm_view_mode_tab');
            else
                $('.ets_megamenu').removeClass('mm_view_mode_tab').addClass('mm_view_mode_list');
        }
    });
    if($('select[name="ETS_MM_HOOK_TO"]').val()=='customhook' && $('select[name="ETS_MM_HOOK_TO"]').next('.help-block').length > 0)
        $('select[name="ETS_MM_HOOK_TO"]').next('.help-block').addClass('active');
    $(document).on('change','select[name="ETS_MM_HOOK_TO"]',function(){
        if($(this).val()=='customhook' && $(this).next('.help-block').length > 0)
            $(this).next('.help-block').addClass('active');
        else
            $(this).next('.help-block').removeClass('active');
    });
    $(document).on('click','.mm_config_form_tab > li',function(){
        $('.mm_config_form_tab > li,.mm_config_forms > div').removeClass('active');
        $(this).addClass('active');
        $('.mm_config_forms div.mm_config_'+$(this).attr('data-tab')).addClass('active');
    });
});
function mmSort(selector)
{
    $(selector).sortable({
        connectWith: selector,
        update: function(e,ui)
        {
            if (this === ui.item.parent()[0]) {
                var obj = ui.item.attr('data-obj');
                var itemId = ui.item.attr('data-id-'+obj);
                var parentObj = ui.item.parents('li').length > 0 ? ui.item.parents('li').eq(0).attr('data-obj') : false;
                var parentId = parentObj && ui.item.parents('li').length > 0 ? ui.item.parents('li').eq(0).attr('data-id-'+parentObj) : 0;
                var previousId = ui.item.prev('li').length > 0 ? ui.item.prev('li').attr('data-id-'+obj) : 0;
                $.ajax({
                    url: mmBaseAdminUrl,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        itemId: itemId,
                        obj: obj,
                        parentId: parentId,
                        parentObj: parentObj ? parentObj : '',
                        previousId: previousId,
                        updateOrder: 1,
                    },
                    success: function(json)
                    {
                        if(!json.success)
                            $(selector).sortable('cancel');
                    },
                    error: function()
                    {
                        $(selector).sortable('cancel');
                    }
                });
            }
        }
    }).disableSelection();
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            if($(input).parents('.col-lg-9').eq(0).find('.preview_img').length <= 0)
            {
                $(input).parents('.col-lg-9').eq(0).append('<div class="preview_img"><img src="'+e.target.result+'"/> <i style="font-size: 20px;" class="process-icon-delete del_preview"></i></div>');
            }
            else
            {
                $(input).parents('.col-lg-9').eq(0).find('.preview_img img').eq(0).attr('src',e.target.result);
            }
            if($(input).parents('.col-lg-9').eq(0).next('.uploaded_image_label').length > 0)
            {
                $(input).parents('.col-lg-9').eq(0).next('.uploaded_image_label').addClass('hidden');
                $(input).parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.uploaded_img_wrapper').addClass('hidden');
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function updatePreviewImage(name,url,delete_url)
{
    if($('.defaultForm.active input[name="'+name+'"]').length > 0 && $('.defaultForm.active input[name="'+name+'"]').parents('.col-lg-9').length > 0)
    {
        if($('.defaultForm.active input[name="'+name+'"]').parents('.col-lg-9').eq(0).find('.preview_img').length > 0)
            $('.defaultForm.active input[name="'+name+'"]').parents('.col-lg-9').eq(0).find('.preview_img').eq(0).remove();
        if($('.defaultForm.active input[name="'+name+'"]').parents('.col-lg-9').eq(0).next('.uploaded_image_label').length<=0)
        {
            $('.defaultForm.active input[name="'+name+'"]').parents('.col-lg-9').eq(0).after('<label class="control-label col-lg-3 uploaded_image_label" style="font-style: italic;">Uploaded image: </label><div class="col-lg-9 uploaded_img_wrapper"><a class="ybc_fancy" href="'+url+'"><img title="Click to see full size image" style="display: inline-block; max-width: 200px;" src="'+url+'"></a>'+(delete_url ? '<a class="delete_url" style="display: inline-block; text-decoration: none!important;" href="'+delete_url+'"><span style="color: #666"><i style="font-size: 20px;" class="process-icon-delete"></i></span></a>' : '')+'</div>');
        }
        else
        {
            var imageWrapper = $('.defaultForm.active input[name="'+name+'"]').parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.col-lg-9');
            imageWrapper.find('a.ets_mm_fancy').eq(0).attr('href',url);
            imageWrapper.find('a.ets_mm_fancy img').eq(0).attr('src',url);
            if(imageWrapper.find('a.delete_url').length > 0)
                imageWrapper.find('a.delete_url').eq(0).attr('href',delete_url);
            $('.defaultForm.active input[name="'+name+'"]').parents('.col-lg-9').eq(0).next('.uploaded_image_label').removeClass('hidden');
            $('.defaultForm.active input[name="'+name+'"]').parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.uploaded_img_wrapper').removeClass('hidden');
        }
        $('.defaultForm.active input[name="'+name+'"]').val('');
    }
}
function showSaveMessage(alertmsg)
{
    if(alertmsg)
    {
        if($('.defaultForm.active').parents('.mm_pop_up').eq(0).find('.alert').length > 0)
            $('.defaultForm.active').parents('.mm_pop_up').eq(0).find('.alert').remove();
        $('.defaultForm.active').parents('.mm_pop_up').eq(0).append(alertmsg);
    }
}
function checkFormFields()
{
    if($('.mm_form select[name="link_type"]').length > 0)
    {
        $('.mm_form .row_link, .mm_form .row_id_manufacturer, .mm_form .row_id_category, .mm_form .row_id_cms').hide();
        if($('.mm_form select[name="link_type"]').val()=='CUSTOM')
            $('.mm_form .row_link').show();
        else if($('.mm_form select[name="link_type"]').val()=='CMS')
            $('.mm_form .row_id_cms').show();
        else if($('.mm_form select[name="link_type"]').val()=='CATEGORY')
            $('.mm_form .row_id_category').show();
        else if($('.mm_form select[name="link_type"]').val()=='MNFT')
            $('.mm_form .row_id_manufacturer').show();
    }
    if($('.mm_form select[name="block_type"]').length > 0)
    {
        $('.mm_form .row_image, .mm_form .row_id_manufacturers, .mm_form .row_id_categories, .mm_form .row_id_cmss,.mm_form .row_image_link,.mm_form .row_content,.mm_form .row_id_products').hide();
        if($('.mm_form select[name="block_type"]').val()=='HTML')
            $('.mm_form .row_content').show();
        else if($('.mm_form select[name="block_type"]').val()=='CMS')
            $('.mm_form .row_id_cmss').show();
        else if($('.mm_form select[name="block_type"]').val()=='CATEGORY')
            $('.mm_form .row_id_categories').show();
        else if($('.mm_form select[name="block_type"]').val()=='MNFT')
            $('.mm_form .row_id_manufacturers').show();
        else if($('.mm_form select[name="block_type"]').val()=='PRODUCT')
            $('.mm_form .row_id_products').show();
        else if($('.mm_form select[name="block_type"]').val()=='IMAGE')
        {
            $('.mm_form .row_image').show();
            $('.mm_form .row_image_link').show();
        }
    }
}
function mmAlertSucccess(successMsg)
{
    if($('#content .ets_mm_success_alert').length <= 0)
    {
        $('#content').append('<div class="alert alert-success ets_mm_success_alert" style="display: none;"></div>');
    }
    $('#content .ets_mm_success_alert').html(successMsg);
    $('#content .ets_mm_success_alert').fadeIn().delay(5000).fadeOut();
}