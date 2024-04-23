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
   if($('input.color').length)
   {
        setTimeout(function(){
            $('input.color').each(function(){
                if($(this).val()=='')
                {
                    $(this).css('background-color','#ffffff');
                    $(this).css('color','black');
                }
                else
                {
                    $(this).css('background-color',$(this).val());
                }     
            });
        },300);
        
    } 
    if($('input[name="ETS_WL_ENABLE_PRODUCT_LIST"]:checked').val()==1 || $('input[name="ETS_WL_ENABLE_PRODUCT_PAGE"]:checked').val()==1)
    {
        $('.form-group.button_all_position').show();
    }
    else
    {
        $('.form-group.button_all_position').hide();
    }
    if($('input[name="ETS_WL_ENABLE_PRODUCT_LIST"]:checked').val()==1)
    {
        $('.form-group.button_product_list').show();
    }
    else
        $('.form-group.button_product_list').hide();
    $(document).on('click','input[name="ETS_WL_ENABLE_PRODUCT_LIST"],input[name="ETS_WL_ENABLE_PRODUCT_PAGE"]',function(){
        if($('input[name="ETS_WL_ENABLE_PRODUCT_LIST"]:checked').val()==1 || $('input[name="ETS_WL_ENABLE_PRODUCT_PAGE"]:checked').val()==1)
        {
            $('.form-group.button_all_position').show();
        }
        else
        {
            $('.form-group.button_all_position').hide();
        }
        if($('input[name="ETS_WL_ENABLE_PRODUCT_LIST"]:checked').val()==1)
        {
            $('.form-group.button_product_list').show();
        }
        else
            $('.form-group.button_product_list').hide();
    });
    ets_wishlist.displayTab();
    ets_wishlist.displayForm();
    $('.sidebar-positions .title-position').on('click',function(){
        var tab = $(this).data('tab');
        $('input[name="current_tab"]').val(tab);
        if(!$('.sidebar-positions .sidebar-position.'+tab).hasClass('active'))
        {
            $('.sidebar-positions .sidebar-position').removeClass('active');
            $('.sidebar-positions .sidebar-position.'+tab).addClass('active');
            ets_wishlist.displayTab();
        }
    });
    $(document).on('click','input[name="ETS_WLP_DISPLAY_TYPE_IN_LEFT"],input[name="ETS_WLP_DISPLAY_TYPE_IN_RIGHT"],input[name="ETS_WLP_DISPLAY_TYPE_IN_SHIPPING"]',function(){
        ets_wishlist.displayForm();
    });
    
});
ets_wishlist = {
    displayTab : function (){
        var curentTab = $('.sidebar-positions >li.active .title-position').data('tab');
        $('.form-group.position').hide();
        $('.form-group.position.'+curentTab).show();
    },
    displayForm: function(){
        if($('input[name="ETS_WLP_DISPLAY_TYPE_IN_LEFT"]:checked').val()=='slide')
            $('.row_ETS_WLP_AUTO_PLAY_LEFT').show();
        else
            $('.row_ETS_WLP_AUTO_PLAY_LEFT').hide();
        if($('input[name="ETS_WLP_DISPLAY_TYPE_IN_RIGHT"]:checked').val()=='slide')
            $('.row_ETS_WLP_AUTO_PLAY_RIGHT').show();
        else
            $('.row_ETS_WLP_AUTO_PLAY_RIGHT').hide();
        if($('input[name="ETS_WLP_DISPLAY_TYPE_IN_SHIPPING"]:checked').val()=='slide')
            $('.row_ETS_WLP_AUTO_PLAY_SHIPPING').show();
        else
            $('.row_ETS_WLP_AUTO_PLAY_SHIPPING').hide();
    }
}