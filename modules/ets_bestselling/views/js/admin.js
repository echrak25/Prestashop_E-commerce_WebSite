/**
 * 2007-2022 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 wesite only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses. 
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 * 
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 *  @author ETS-Soft <etssoft.jsc@gmail.com>
 *  @copyright  2007-2022 ETS-Soft
 *  @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

$(document).ready(function(){
    ets_bestselling.displayTab();
    ets_bestselling.displayForm();
    $('.sidebar-positions .title-position').on('click',function(){
        var tab = $(this).data('tab');
        $('input[name="current_tab"]').val(tab);
        if(!$('.sidebar-positions .sidebar-position.'+tab).hasClass('active'))
        {
            $('.sidebar-positions .sidebar-position').removeClass('active');
            $('.sidebar-positions .sidebar-position.'+tab).addClass('active');
            ets_bestselling.displayTab();
        }
    });
    $(document).on('click','input[name="ETS_BS_DISPLAY_TYPE_IN_HOME"],input[name="ETS_BS_DISPLAY_TYPE_IN_LEFT"],input[name="ETS_BS_DISPLAY_TYPE_IN_RIGHT"],input[name="ETS_BS_DISPLAY_TYPE_IN_PRODUCT"]',function(){
        ets_bestselling.displayForm();
    });
});
ets_bestselling = {
    displayTab : function (){
        var curentTab = $('.sidebar-positions >li.active .title-position').data('tab');
        $('.form-group.position').hide();
        $('.form-group.position.'+curentTab).show();
    },
    displayForm: function(){
        if($('input[name="ETS_BS_DISPLAY_TYPE_IN_HOME"]:checked').val()=='slide')
            $('.row_ETS_BS_AUTO_PLAY_HOME').show();
        else
            $('.row_ETS_BS_AUTO_PLAY_HOME').hide();
        if($('input[name="ETS_BS_DISPLAY_TYPE_IN_LEFT"]:checked').val()=='slide')
            $('.row_ETS_BS_AUTO_PLAY_LEFT').show();
        else
            $('.row_ETS_BS_AUTO_PLAY_LEFT').hide();
        if($('input[name="ETS_BS_DISPLAY_TYPE_IN_RIGHT"]:checked').val()=='slide')
            $('.row_ETS_BS_AUTO_PLAY_RIGHT').show();
        else
            $('.row_ETS_BS_AUTO_PLAY_RIGHT').hide();
        if($('input[name="ETS_BS_DISPLAY_TYPE_IN_PRODUCT"]:checked').val()=='slide')
            $('.row_ETS_BS_AUTO_PLAY_PRODUCT').show();
        else
            $('.row_ETS_BS_AUTO_PLAY_PRODUCT').hide();
    }
}