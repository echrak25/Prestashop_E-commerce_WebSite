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
var mlsScale = 1;
function ScaleSlider(){
    mlsScale = $('.mls_slides_li.open .slide-content .left-content').width()/$('.mls_slide_list').attr('data-width-slide');
    var ratio = mlsScale;
    var height = ratio*$('.mls_slide_list').attr('data-height-slide');
    $('.slide-content .left-content').css('height',height+'px');
    $('.msl_layer_wrapper').css('transform', 'scale('+ratio+')');
    mlsDrag('.msl_layer');
    setTimeout(function() {
        var item_active_height = $('.mls_slides_li.open').find('.slide-content').height();
        $('.ets_multilayerslider_wrapper').css('min-height',item_active_height+'px');
    }, 300);
}
function ScaleSliderPlay(){
    if ($('.mls_slider_type_full') != '' ){
        var ratio = $(window).width()/$('.slide-content .msl_layer_wrapper').attr('data-width');
    } else {
        var ratio = $('.slide-content .left-content').width()/$('.slide-content .msl_layer_wrapper').attr('data-width');
    }
    var height = ratio*$('.slide-content .msl_layer_wrapper').attr('data-height');
    $('.slide-content .left-content').css('height',height+'px');
    $('.msl_layer_wrapper').css('transform', 'scale('+ratio+')');
}
function initMlsLayerPosition()
{
    if($('.ets_multilayerslider_wrapper').hasClass('multi-layout'))
        var multiLayout = true;
    else
        var multiLayout = false;
    if($('.ets_multilayerslider_wrapper').hasClass('mls-layout-rtl') && $('.msl_layer').length > 0)
    {
        $('.msl_layer').each(function(){
            if(multiLayout)
            {
                $(this).css('right',$(this).attr('data-right')+'px');
                $(this).css('left','auto');
            }
            else
            {
                $(this).css('left',$(this).attr('data-left')+'px');
                $(this).css('right','auto');

            }
        });
    }
}
$(document).ready(function(){
    initMlsLayerPosition();
    $(document).on('click','.mls_slides_li',function(){
        $('.mls_slides_li').removeClass('open');
        $(this).addClass('open');
        setTimeout(function() {
            var item_active_height = $('.mls_slides_li.open').find('.slide-content').height();
            $('.ets_multilayerslider_wrapper').css('min-height',item_active_height+'px');
        }, 300);
    });
    $(window).load(function(){
        ScaleSlider();
        setTimeout(function() {
            var item_active_height = $('.mls_slides_li.open').find('.slide-content').height();
            $('.ets_multilayerslider_wrapper').css('min-height',item_active_height+'px');
        }, 300);
    });
    $(document).on('click','.msl_screen_type > div',function(){
        $('.ets_multilayerslider_wrapper').removeClass('mls_'+$('.msl_screen_type > div.active').attr('data-size')+'_size').addClass('mls_'+$(this).attr('data-size')+'_size');
        $('.msl_screen_type > div.active').removeClass('active');
        $(this).addClass('active');
        var changeSlide = $(this).attr('data-width');
        if($(this).attr('data-width')!='auto')
            $('.left-content').css('width',changeSlide+'px');
        else
            $('.left-content').css('width','100%');
        ScaleSlider();

    });
    $(window).on('resize',function(e){
        ScaleSlider();
    });
    $(document).on('click','.mls_change_mode',function(){
        if(!$('.ets_multilayerslider').hasClass('updating-layout'))
        {
            if($(this).hasClass('rtl'))
                mlsUpdateLayout('rtl');
            else
                mlsUpdateLayout('ltr');
        }
    });
    $(document).mouseup(function (e)
    {
        var container = $(".mls_pop_up");
        var colorpanel = $('#mColorPicker');
        if (!container.is(e.target)
            && container.has(e.target).length === 0 && !colorpanel.is(e.target) && colorpanel.has(e.target).length === 0
            && ($('#mColorPicker').length <=0 || ($('#mColorPicker').length > 0 && $('#mColorPicker').css('display')=='none'))
            && $('.mls_export_form').hasClass('hidden')
        )
        {
            $('.mls_pop_up').addClass('hidden');
            $('.mls_forms').addClass('hidden');
            $('.mls_export_form').addClass('hidden');
            $('.mls_overlay').addClass('hidden');
        }
    });
    $(document).keyup(function(e) {
        if (e.keyCode === 27)
        {
            $('.mls_pop_up').addClass('hidden');
            $('.mls_forms').addClass('hidden');
            $('.mls_export_form').addClass('hidden');
            $('.mls_overlay').addClass('hidden');
        }
    });
    $(document).on('click','.mls_add_slide',function(){
        $('.mls_pop_up').addClass('hidden');
        $('.mls_slide_form').removeClass('hidden');
        $('.mls_forms').removeClass('hidden');
        if($('.mls_slide_form .mls_form form input[name="itemId"]').length <= 0 || $('.mls_slide_form .mls_form form input[name="mls_object"]')!='MLS_Slide'  || $('.mls_slide_form .mls_form form input[name="itemId"]').length > 0 && parseInt($('.mls_slide_form .mls_form form input[name="itemId"]').val())!=0)
            $('.mls_slide_form .mls_form').html($('.mls_slide_form_new').html());
        checkFormFields();
        $('.mm-alert').remove();
        return false;
    });
    $(document).on('click','.mls_export_button',function(){
        $('.mls_pop_up').addClass('hidden');
        $('.mls_export').removeClass('hidden');
        $('.mls_export_form').removeClass('hidden');
        return false;
    });
    $(document).on('click','.mls_slide_toggle',function(){
        if(!$(this).parents('.mls_slides_li').eq(0).hasClass('open'))
        {
            $('.mls_slides_li').removeClass('open');
            $(this).parents('.mls_slides_li').eq(0).addClass('open');
        }
        else
        {
            $('.mls_slides_li').removeClass('open');
        }
    });
    $(document).on('click','.mls_save',function(){
        if(!$(this).parents('form').eq(0).hasClass('active') && $('.defaultForm.active').length <= 0)
        {
            $(this).parents('form').eq(0).addClass('active');
            $(this).parents('.mls_save_wrapper').eq(0).addClass('mls_saving_enabled');
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
                    if(json.success)
                    {
                        if(json.mls_object=='MLS_Slide')
                        {
                            if($('.mls_slides_li.item'+json.itemId).length > 0)
                            {
                                if($('.mls_change_mode.active.rtl').length > 0)
                                    $('.mls_slides_li.item'+json.itemId).replaceWith(json.slideHtmlRTL);
                                else
                                    $('.mls_slides_li.item'+json.itemId).replaceWith(json.slideHtmlLTR);
                            }
                            else
                            {
                                if($('.mls_change_mode.active.rtl').length > 0)
                                    $('.mls_slides_ul').append(json.slideHtmlRTL);
                                else
                                    $('.mls_slides_ul').append(json.slideHtmlLTR);
                            }
                            if($('.mls_slides_li.item'+json.itemId).length > 0)
                            {
                                $('.mls_slides_li').removeClass('open');
                                $('.mls_slides_li.item'+json.itemId).addClass('open');
                            }
                            mlsDrag('.msl_layer');
                            mmSort('.mls_layers_ul');
                            if(!$('.msl_no_slides').hasClass('hidden'))
                                $('.msl_no_slides').addClass('hidden');
                        }
                        if(json.mls_object=='MLS_Layer' && json.success)
                        {
                            if(json.font && $('link[href="'+json.font+'"]').length <=0)
                                $('head').append('<link rel="stylesheet" href="'+json.font+'" type="text/css" media="all" />');
                            if($('.msl_layer.item'+json.itemId).length > 0)
                            {
                                if($('.mls_change_mode.active.rtl').length > 0)
                                {
                                    if(json.layerHtmlRTL)
                                        $('.msl_layer.item'+json.itemId).replaceWith(json.layerHtmlRTL);
                                    else
                                        $('.msl_layer.item'+json.itemId).remove();
                                }
                                else
                                {
                                    if(json.layerHtmlLTR)
                                        $('.msl_layer.item'+json.itemId).replaceWith(json.layerHtmlLTR);
                                    else
                                        $('.msl_layer.item'+json.itemId).remove();
                                }
                            }
                            else
                            {
                                if($('.mls_slides_li.open .msl_layer_wrapper').length > 0)
                                {
                                    if($('.mls_change_mode.active.rtl').length > 0)
                                        $('.mls_slides_li.open .msl_layer_wrapper').append(json.layerHtmlRTL);
                                    else
                                        $('.mls_slides_li.open .msl_layer_wrapper').append(json.layerHtmlLTR);
                                }
                            }
                            mlsDrag('.msl_layer');
                            if(json.sortLayerHtml)
                            {
                                if($('.mls_layers_li.item'+json.itemId).length > 0)
                                    $('.mls_layers_li.item'+json.itemId).replaceWith(json.sortLayerHtml);
                                else
                                if($('.mls_slides_li.open .mls_layers_ul').length > 0)
                                    $('.mls_slides_li.open .mls_layers_ul').append(json.sortLayerHtml);
                                mmSort('.mls_layers_ul');
                            }
                        }
                        if($('.mm-alert-'+json.time).length > 0)
                            mmAlertSucccess($('.mm-alert-'+json.time+'.alert-success').html());
                        $('.mls_pop_up').addClass('hidden').parents('.mls_forms').addClass('hidden');
                        $('.mls_overlay').addClass('hidden');
                        ScaleSlider();
                    }
                    $('.defaultForm.active').removeClass('active');
                    $('.mls_save_wrapper').removeClass('mls_saving_enabled');

                },
                error: function(xhr, status, error)
                {
                    $('.defaultForm.active').removeClass('active');
                    $('.mls_save_wrapper').removeClass('mls_saving_enabled');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }

            });

        }
        return false;
    });
    $(document).on('click','.mls_close',function(){
        $(this).parent('.mls_pop_up').addClass('hidden');
        $(this).parent().parent('.mls_pop_up').addClass('hidden');
        $(this).parent().parent('.mls_forms').addClass('hidden');
        $(this).parent().parent('.mls_export_form').addClass('hidden');
        $('.mls_overlay').addClass('hidden');
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
            alert(ets_mls_invalid_file);
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
                        if(json.mls_object=='MLS_Slide')
                        {
                            $('.mls_slides_li.item'+json.itemId+' .msl_layer_wrapper').css('background-image','none');
                        }
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
    $(document).on('click','.mls_slide_edit',function(){
        if(!$(this).hasClass('active'))
        {
            $('.ets_multilayerslider').addClass('loading');
            $(this).addClass('active');
            $('.mm-alert').remove();
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).data('id-slide'),
                    request_form: 1,
                    mls_object: 'MLS_Slide',
                },
                success: function(json){
                    $('.ets_multilayerslider').removeClass('loading');
                    showSaveMessage(json.alert);
                    $('.mls_pop_up').addClass('hidden');
                    $('.mls_forms').removeClass('hidden');
                    $('.mls_slide_form').removeClass('hidden');
                    $('.mls_slide_form .mls_form').html(json.form);
                    checkFormFields();
                    $('.mls_slide_form .mls_form .mColorPickerInput').mColorPicker();
                    $('.mls_slides_li.item'+json.itemId+' .mls_slide_edit').removeClass('active');
                    $('.mls_slides_li').removeClass('open');
                    $('.mls_slides_li.item'+json.itemId).addClass('open');
                },
                error: function(xhr, status, error)
                {
                    $('.mls_slide_edit').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
    });
    $(document).on('click','.mls_slide_delete',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).data('id-slide'),
                    deleteobject: 1,
                    mls_object: 'MLS_Slide',
                },
                success: function(json){
                    if(json.success)
                    {
                        if($('.mls_slides_li.item'+json.itemId).prev('li').length > 0)
                            $('.mls_slides_li.item'+json.itemId).prev('li').addClass('open');
                        else if($('.mls_slides_li.item'+json.itemId).next('li').length > 0)
                            $('.mls_slides_li.item'+json.itemId).next('li').addClass('open');
                        $('.mls_slides_li.item'+json.itemId).remove();
                        if($('.mls_slides_li').length <= 0)
                            $('.msl_no_slides').removeClass('hidden');
                        mmAlertSucccess(json.successMsg);
                    }
                    else
                        $('.mls_slides_li.item'+json.itemId+' .mls_slide_delete').removeClass('active');
                },
                error: function(xhr, status, error)
                {
                    $('.mls_slide_delete').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    $(document).on('click','.mls_slide_duplicated',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).attr('data-id-slide'),
                    duplicatedbject: 1,
                    mls_object: 'MLS_Slide',
                    layout: $('.mls_change_mode.active.rtl').length > 0 ? 'rtl' : 'ltr',
                },
                success: function(json){
                    if(json.success)
                    {
                        if($('.mls_slides_li.item'+json.itemId).length > 0)
                            $('.mls_slides_li.item'+json.itemId).after(json.html);
                        else
                            $('.mls_slides_ul').append(json.html);
                        $('.mls_slides_li').removeClass('open');
                        $('.mls_slides_li.item'+json.newItemId).addClass('open');
                        $('.mls_slides_li.item'+json.itemId).removeClass('active');
                        mlsDrag('.msl_layer');
                        mmSort('.mls_layers_ul');
                        ScaleSlider();
                        mmAlertSucccess(json.success);
                    }
                    $('.mls_slide_duplicated').removeClass('active');
                },
                error: function(xhr, status, error)
                {
                    $('.mls_slide_duplicated').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    $(document).on('click','.mls_layer_duplicate',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).attr('data-id-layer'),
                    duplicatedbject: 1,
                    mls_object: 'MLS_Layer',
                    layout: $('.mls_change_mode.active.rtl').length > 0 ? 'rtl' : 'ltr',
                },
                success: function(json){
                    if(json.success)
                    {
                        if($('.mls_slides_li.item'+json.id_slide).length > 0)
                        {
                            $('.mls_slides_li.item'+json.id_slide+' .msl_layer_wrapper').append(json.layerHtml);
                        }
                        if($('.mls_layers_li.item'+json.itemId).length > 0)
                            $('.mls_layers_li.item'+json.itemId).after(json.layerSortHtml);
                        else
                        if($('.mls_slides_li.item'+json.id_slide).length)
                            $('.mls_slides_li.item'+json.id_slide+' .mls_layers_ul').append(json.layerSortHtml);
                        $('.mls_layers_li.item'+json.itemId).removeClass('active');
                        mlsDrag('.msl_layer');
                        mmSort('.mls_layers_ul');
                        ScaleSlider();
                        mmAlertSucccess(json.success);
                    }
                    $('.mls_layer_duplicate').removeClass('active');
                },
                error: function(xhr, status, error)
                {
                    $('.mls_layer_duplicate').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });

    //Column

    $(document).on('click','.mls_add_layer',function(){
        $('.mls_pop_up').addClass('hidden');
        $('.mls_forms').removeClass('hidden');
        $('.mls_slide_form').removeClass('hidden');
        if($('.mls_slide_form .mls_form form input[name="itemId"]').length <= 0 || $('.mls_slide_form .mls_form form input[name="mls_object"]')!='MM_Column'  || $('.mls_slide_form .mls_form form input[name="itemId"]').length > 0 && (parseInt($('.mls_slide_form .mls_form form input[name="itemId"]').val())!=0 || parseInt($('.mls_slide_form .mls_form form input[name="itemId"]').val())==0 && parseInt($('.mls_slide_form .mls_form form input[name="id_slide"]').val()))!=parseInt($(this).attr('data-id-slide')))
        {
            $('.mls_slide_form .mls_form').html($('.mls_layer_form_new').html());
            $('.mls_slide_form .mls_form form input[name="id_slide"]').val($(this).attr('data-id-slide'));
        }
        $('.mm-alert').remove();
        checkFormFields();
        return false;
    });
    $(document).on('click','.mls_layer_delete',function(){
        if(!$(this).hasClass('active'))
        {
            $(this).addClass('active');
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).data('id-layer'),
                    deleteobject: 1,
                    mls_object: 'MLS_Layer',
                },
                success: function(json){
                    if(json.success)
                    {
                        $('.mls_layers_li.item'+json.itemId).remove();
                        $('.msl_layer.item'+json.itemId).remove();
                        mmAlertSucccess(json.successMsg);
                    }
                    else
                        $('.mls_layers_li.item'+json.itemId+' .mls_layer_delete').removeClass('active');
                },
                error: function(xhr, status, error)
                {
                    $('.mls_layer_delete').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    $(document).on('click','.mls_layer_edit',function(){
        if(!$(this).hasClass('active'))
        {
            $('.ets_multilayerslider').addClass('loading');
            $(this).addClass('active');
            $('.mm-alert').remove();
            $.ajax({
                url: mmBaseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    itemId: $(this).parents('li').eq(0).data('id-layer'),
                    request_form: 1,
                    mls_object: 'MLS_Layer',
                },
                success: function(json){
                    $('.ets_multilayerslider').removeClass('loading');
                    $('.mls_pop_up').addClass('hidden');
                    $('.mls_forms').removeClass('hidden');
                    $('.mls_slide_form').removeClass('hidden');
                    $('.mls_slide_form .mls_form').html(json.form);
                    checkFormFields();
                    $('.mls_slide_form .mls_form .mColorPickerInput').mColorPicker();
                    $('.mls_layers_li.item'+json.itemId+' .mls_layer_edit').removeClass('active');
                },
                error: function(xhr, status, error)
                {
                    $('.mls_layer_edit').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
    });
    $(document).on('click','.mls_play_slider',function(){
        $('.mls_preview_slider').removeClass('hidden').addClass('loading');
        $.ajax({
            url: mmBaseAdminUrl,
            dataType: 'json',
            type: 'post',
            data: {
                loadSlider: 1,
                layout: $('.mls_change_mode.rtl.active').length > 0 ? 'rtl' : 'ltr',
            },
            success: function(json){
                if(json.success)
                {
                    $('.mls_preview_slider').removeClass('loading');
                    $('.mls_form_preview').html(json.html);
                    $('.mls_form_preview').ready(function(){
                        if($('.mls_slider').length > 0)
                        {
                            $('.mls_slider').mls_slider({
                                enableNav: parseInt($('.mls_slider').attr('data-enable-next-prev')),
                                enablePagination: parseInt($('.mls_slider').attr('data-enable-pagination')),
                                moveIn: parseInt($('.mls_slider').attr('data-move-in')),
                                moveOut: parseInt($('.mls_slider').attr('data-move-out')),
                                stand: parseInt($('.mls_slider').attr('data-stand-duration')),
                                loop: parseInt($('.mls_slider').attr('data-loop')),
                                autoPlay: parseInt($('.mls_slider').attr('data-auto-play')),
                                pauseOnHover: parseInt($('.mls_slider').attr('data-pause-on-hover')),
                                enableLoading: parseInt($('.mls_slider').attr('data-enable-loading-icon')),
                                enableRunningBar: parseInt($('.mls_slider').attr('data-enable-running-bar')),
                                startSlide: $('.mls_slides_ul > li.mls_slides_li.open').length > 0 ? ($('.mls_slides_ul > li.mls_slides_li.open').index()+1) : 1,
                            });
                        }
                    });
                }

                if ($('.mls_desktop_size').length != '' ){
                    if ($('.mls_preview_type_full').length != '' ){
                        var screenPreview = $(window).width();
                    } else {
                        var screenPreview = 1170;
                    }
                    $('.mls_form_preview').css('width',screenPreview+'px');
                }

                if ($('.mls_tablet_size').length != '' ){
                    var screenPreview = 768;
                    $('.mls_form_preview').css('width',screenPreview+'px');
                }

                if ($('.mls_mobile_size').length != '' ){
                    var screenPreview = 390;
                    $('.mls_form_preview').css('width',screenPreview+'px');
                }

                var ratio1 = (screenPreview - 23 )/$('.slide-content .msl_layer_wrapper').attr('data-width');

                var height1 = ratio1*$('.slide-content .msl_layer_wrapper').attr('data-height');
                $('.mls_form_preview .ets_multilayerslider').css('height',height1+'px');
                $('.mls_form_preview .ets_multilayerslider .mls_slider').css('transform', 'scale('+ratio1+')');




            },
            error: function(xhr, status, error)
            {
                $('.mls_preview_slider').addClass('hidden').removeClass('loading');
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    });
    $(document).on('change','.mls_form select[name="layer_type"]',function(){
        checkFormFields();
    });

    //Config
    $(document).on('click','.mls_config_save',function(){
        if(!$('.mls_config_form_content').hasClass('active'))
        {
            $('.mls_config_form_content').addClass('active');
            $(this).parents('.mls_save_wrapper').eq(0).addClass('mls_saving_enabled');
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
                    $('.ets_megaslide').attr('class','ets_megaslide '+json.layout_direction);
                    $('.mls_config_form_content').removeClass('active');
                    $('.mls_config_form_content').append(json.alert);
                    if(json.success)
                    {
                        mmAlertSucccess($('.mls_config_form_content .mm-alert').html());
                        if(json.configs)
                            $.each(json.configs,function(index, value){
                                $('.mls_slide_list').attr(index,value);
                            });
                        $('.msl_layer_wrapper').css('width',json.slider_width+'px');
                        $('.msl_layer_wrapper').css('height',json.slider_height+'px');
                        $('.mls_slide_list').removeClass('mls_slider_type_auto').removeClass('mls_slider_type_full').removeClass('mls_slider_type_boxed').addClass('mls_slider_type_'+json.slider_type);
                        $('.mls_config_form.mls_pop_up').addClass('hidden');
                        $('.mls_overlay').addClass('hidden');
                        // sang
                        $('.mls_preview_slider').removeClass('mls_preview_type_auto').removeClass('mls_preview_type_full').removeClass('mls_preview_type_boxed').addClass('mls_preview_type_'+json.slider_type);
                        ScaleSlider();
                    }
                    $('.mls_save_wrapper').removeClass('mls_saving_enabled');
                },
                error: function(xhr, status, error)
                {
                    $('.mm-alert').remove();
                    $('.mls_save_wrapper').removeClass('mls_saving_enabled');
                    $('.mls_config_form_content').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    $(document).on('click','.mls_import_slider',function(){
        if(!$('.mls_import_option_form').hasClass('active'))
        {
            $('.mls_import_option_form').addClass('active');
            var formData = new FormData($(this).parents('form').get(0));
            $('.mls_import_option_form .alert').remove();
            $.ajax({
                url: $('.mls_import_option_form').attr('action'),
                data: formData,
                type: 'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(json){
                    $('.mls_import_option_form').removeClass('active');
                    if(json.success)
                    {
                        $('.mls_export.mls_pop_up').addClass('hidden').parents('.mls_export_form').addClass('hidden');
                        mmAlertSucccess(json.success);
                        setTimeout(function(){
                            location.reload();
                        },3000);
                    }
                    else
                    {
                        $('.mls_import_option_form').append('<div class="alert alert-danger">'+json.error+'</div>');
                    }
                },
                error: function(xhr, status, error)
                {
                    $('.mls_import_option_form').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    $(document).on('click','.mls_config_button',function(){
        $('.mls_pop_up').addClass('hidden');
        $('.mls_overlay').addClass('hidden');
        $('.mls_config_form').removeClass('hidden');
        $('.mls_config_form').parents('.mls_overlay').removeClass('hidden');
        $('.mm-alert.alert-success').remove();
    });
    if($('.msl_layer').length > 0)
        mlsDrag('.msl_layer');
    if($('.mls_slides_ul > li').length > 0)
        $('.mls_slides_ul > li:first-child').addClass('open');
    $(document).on('click','.mls_layer_form_tab > li',function(){
        $('.mls_layer_form_tab > li').removeClass('active');
        $('.mls_layer_edit_form > div').hide();
        $('.mls_layer_edit_form > div.'+$(this).attr('class').trim()+'_form').show();
        $(this).addClass('active');
    });
    $(document).on('change','select[name="animation_in"],select[name="animation_out"]',function(){
        if($(this).next('.mls_sample_effect').length > 0)
        {
            var animationEffect = $(this).next('.mls_sample_effect');
            animationEffect.attr('class','active mls_sample_effect '+$(this).val()).delay($(this).attr('name')=='animation_in' ? 2000 : 1500).queue(function(){
                $(this).removeClass('active').dequeue();
            });
        }
    });
    //Sortable
    mmSort('.mls_layers_ul');
    mmSort('.mls_slides_ul');
    $('.ets_mls_fancy').fancybox();
    if($('select[name="ETS_MLS_HOOK_TO"]').val()=='customhook' && $('select[name="ETS_MLS_HOOK_TO"]').next('.help-block').length > 0)
        $('select[name="ETS_MLS_HOOK_TO"]').next('.help-block').addClass('active');
    $(document).on('change','select[name="ETS_MLS_HOOK_TO"]',function(){
        if($(this).val()=='customhook' && $(this).next('.help-block').length > 0)
            $(this).next('.help-block').addClass('active');
        else
            $(this).next('.help-block').removeClass('active');
    });
});
function mmSort(selector)
{
    $(selector).sortable({
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
                        layout: $('.mls_change_mode.active.ltr').length > 0 ? 'ltr' : 'rtl',
                    },
                    success: function(json)
                    {
                        if(!json.success)
                            $(selector).sortable('cancel');
                        else
                        {
                            if($('.mls_slides_li.item'+json.id_slide+' .left-content').length > 0 && json.slideHtml && json.id_slide)
                            {
                                $('.mls_slides_li.item'+json.id_slide+' .left-content').html(json.slideHtml);
                                mlsDrag('.msl_layer');
                            }
                        }
                        ScaleSlider();
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
                $(input).parents('.col-lg-9').eq(0).append('<div class="preview_img"><img src="'+e.target.result+'"/> <i style="font-size: 20px;" class="process-icon-delete del_preview" data-title="&#xE872;"></i></div>');
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
            $('.defaultForm.active input[name="'+name+'"]').parents('.col-lg-9').eq(0).after('<label class="control-label col-lg-3 uploaded_image_label" style="font-style: italic;">Uploaded image: </label><div class="col-lg-9 uploaded_img_wrapper"><img title="Click to see full size image" style="display: inline-block; max-width: 200px;" src="'+url+'">'+(delete_url ? '<a class="delete_url" style="display: inline-block; text-decoration: none!important;" href="'+delete_url+'"><span style="color: #666"><i style="font-size: 20px;" class="process-icon-delete"></i></span></a>' : '')+'</div>');
        }
        else
        {
            var imageWrapper = $('.defaultForm.active input[name="'+name+'"]').parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.col-lg-9');
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
        if($('.defaultForm.active').parents('.mls_pop_up').eq(0).find('.alert').length > 0)
            $('.defaultForm.active').parents('.mls_pop_up').eq(0).find('.alert').remove();
        $('.defaultForm.active').parents('.mls_pop_up').eq(0).append(alertmsg);
    }
}
function checkFormFields()
{
    if($('.mls_form select[name="layer_type"]').length > 0)
    {
        $('.mls_form .row_image, .mls_form .row_content_layer, .mls_form .row_link,.mls_form .row_font_size,.mls_form .row_text_color,.mls_form .row_font_weight,.mls_form .row_width,.mls_form .row_height,.mls_form .row_font_family,.mls_form .row_background_color,.mls_form .row_background_opacity,.mls_form .row_text_transform,.mls_form .row_text_decoration,.mls_form .row_padding,.mls_form .row_box_radius').hide();
        if($('.mls_form select[name="layer_type"]').val()=='image')
        {
            $('.mls_form .row_image,.mls_form .row_link,.mls_form .row_width,.mls_form .row_height').show();
        }
        else if($('.mls_form select[name="layer_type"]').val()=='text')
        {
            $('.mls_form .row_content_layer,.mls_form .row_font_size,.mls_form .row_text_color,.mls_form .row_font_family,.mls_form .row_font_weight,.mls_form .row_text_transform,.mls_form .row_text_decoration').show();
        }
        else if($('.mls_form select[name="layer_type"]').val()=='text_background')
        {
            $('.mls_form .row_content_layer,.mls_form .row_font_size,.mls_form .row_padding,.mls_form .row_text_color,.mls_form .row_font_family,.mls_form .row_font_weight,.mls_form .row_background_color,.mls_form .row_background_opacity,.mls_form .row_text_transform,.mls_form .row_text_decoration').show();
        }
        else if($('.mls_form select[name="layer_type"]').val()=='button')
            $('.mls_form .row_box_radius,.mls_form .row_content_layer ,.mls_form .row_link,.mls_form .row_padding,.mls_form .row_font_size,.mls_form .row_text_color,.mls_form .row_font_weight,.mls_form .row_font_family,.mls_form .row_background_color,.mls_form .row_text_transform').show();
        else if($('.mls_form select[name="layer_type"]').val()=='link')
            $('.mls_form .row_content_layer ,.mls_form .row_link,.mls_form .row_font_size,.mls_form .row_text_color,.mls_form .row_font_weight,.mls_form .row_font_family,.mls_form .row_text_transform,.mls_form .row_text_decoration').show();
        $('.layer_position_form,.layer_transition_form').hide();
    }
    if($('.mls_form .mls_layer_form_tab').length > 0)
    {
        $('.mls_layer_form_tab > li').removeClass('active');
        $('.mls_layer_form_tab .layer_content').addClass('active');
        $('.mls_layer_edit_form > div').removeClass('active');
        $('.mls_layer_edit_form .layer_content_form').addClass('active').css('display','block');
    }

}
function mmAlertSucccess(successMsg)
{
    if($('#content .ets_mls_success_alert').length <= 0)
    {
        $('#content').append('<div class="alert alert-success ets_mls_success_alert" style="display: none;"></div>');
    }
    $('#content .ets_mls_success_alert').html(successMsg);
    $('#content .ets_mls_success_alert').fadeIn().delay(5000).fadeOut();
}
function mlsUpdateLayout(layout)
{
    if(!$('.ets_multilayerslider').hasClass('updating-layout'))
    {
        $('.ets_multilayerslider').addClass('updating-layout');
        $.ajax({
            url: mmBaseAdminUrl,
            type: 'post',
            dataType: 'json',
            data: {
                updateLayout: 1,
                layout:layout,
                currentSlideId: $('.mls_slides_li.open').length > 0 ? $('.mls_slides_li.open').attr('data-id-slide') : 0,
            },
            success: function(json)
            {
                if(json.success)
                {
                    $('.mls_slide_list').html(json.html);
                    $('.mls_change_mode').removeClass('active');
                    if(json.layout=='ltr')
                    {
                        $('.mls_change_mode.ltr').addClass('active');
                        $('.mls_slide_list').addClass('ets-dir-ltr').removeClass('ets-dir-rtl');
                    }
                    else
                    {
                        $('.mls_change_mode.rtl').addClass('active');
                        $('.mls_slide_list').addClass('ets-dir-rtl').removeClass('ets-dir-ltr');
                    }
                    if($('.mls_slides_li.item'+json.currentSlideId).length > 0)
                        $('.mls_slides_li.item'+json.currentSlideId).addClass('open');
                    mlsDrag('.msl_layer');
                    mmSort('.mls_layers_ul');
                    mmSort('.mls_slides_ul');
                    if($('.msl_screen_type > div.active').length > 0)
                    {
                        var changeSlide = $('.msl_screen_type > div.active').attr('data-width');
                        if(changeSlide!='auto')
                            $('.left-content').css('width',changeSlide+'px');
                        else
                            $('.left-content').css('width','100%');
                    }
                    else
                        $('.left-content').css('width','100%');
                    ScaleSlider();
                }
                $('.ets_multilayerslider').removeClass('updating-layout');
                ScaleSlider();
            },
            error: function()
            {
                $('.ets_multilayerslider').removeClass('updating-layout');
            }
        });
    }
}
function mlsDrag(selector)
{
    var element = $(selector);
    var click = {
        x: 0,
        y: 0
    };
    element.draggable({
        cursor: "move",
        start: function(event,ui)
        {
            click.x = event.clientX;
            click.y = event.clientY;
            ui.helper.css('right','auto');
            if(!ui.helper.hasClass('active'))
            {
                $('.msl_layer').removeClass('active');
                ui.helper.addClass('active');
                $('.mls_layers_li').removeClass('active');
                $('.mls_layers_li.item'+ui.helper.attr('data-id-layer')).addClass('active');
            }
        },
        stop: function( event, ui ){
            $.ajax({
                url: mmBaseAdminUrl,
                type: 'post',
                dataType: 'json',
                data: {
                    itemId: ui.helper.attr('data-id-layer'),
                    obj: 'MLS_Layer',
                    data_top: ui.position.top,
                    data_left: ui.position.left,
                    data_right :ui.helper.parents('.msl_layer_wrapper').eq(0).width()-ui.helper.width()-ui.position.left,
                    updatePositionLayer: 1,
                    layout: $('.mls_change_mode.active.rtl').length > 0 ? 'rtl' : 'ltr',
                },
            });
            $('.msl_layer').removeClass('active');
            $('.mls_layers_li').removeClass('active');

        },
        drag: function(event, ui) {
            var original = ui.originalPosition;
            ui.position = {
                left: (event.clientX - click.x + original.left) / mlsScale,
                top:  (event.clientY - click.y + original.top ) / mlsScale
            };
        }
    });
}