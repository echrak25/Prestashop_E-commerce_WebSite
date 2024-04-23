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
    setTimeout(function(){
        if($('input.color').length)
        {
            $('input.color').each(function(){
               if($(this).val()=='' || $(this).val()=='#ffffff')
               {
                    $(this).css('background-color','#ffffff');
                    $(this).css('color','black');
               }
               else
               {
                    $(this).css('background-color',$(this).val());
                    $(this).css('color','white');
               }
            });
        } 
    },1000);
    $(document).on('click','.ets-cb-reset-color',function(){
        $('input.color').val('#ffffff');
        $('input.color').css('background-color','#ffffff');
        $('input.color').css('color','black');

        $('input[name="ETS_CB_COOKIE_BANNER_BORDER"]').val('#9e9e9e');
        $('input[name="ETS_CB_COOKIE_BANNER_BORDER"]').css('background-color','#9e9e9e');
        $('input[name="ETS_CB_COOKIE_BANNER_BORDER"]').css('color','black');

        $('input[name="ETS_CB_COOKIE_BUTTON_COLOR"]').val('#ffffff');
        $('input[name="ETS_CB_COOKIE_BUTTON_COLOR"]').css('background-color','#ffffff');
        $('input[name="ETS_CB_COOKIE_BUTTON_COLOR"]').css('color','black');

        $('input[name="ETS_CB_COOKIE_BOTTON_BORDER"]').val('#00b1c9');
        $('input[name="ETS_CB_COOKIE_BOTTON_BORDER"]').css('background-color','#00b1c9');
        $('input[name="ETS_CB_COOKIE_BOTTON_BORDER"]').css('color','#ffffff');

        $('input[name="ETS_CB_COOKIE_BT_BACKGROUND"]').val('#00b1c9');
        $('input[name="ETS_CB_COOKIE_BT_BACKGROUND"]').css('background-color','#00b1c9');
        $('input[name="ETS_CB_COOKIE_BT_BACKGROUND"]').css('color','white');

        $('input[name="ETS_CB_COOKIE_BT_HOVER_COLOR"]').val('#ffffff');
        $('input[name="ETS_CB_COOKIE_BT_HOVER_COLOR"]').css('background-color','white');
        $('input[name="ETS_CB_COOKIE_BT_HOVER_COLOR"]').css('color','black');

        $('input[name="ETS_CB_COOKIE_BT_BG_HOVER"]').val('#2592A9');
        $('input[name="ETS_CB_COOKIE_BT_BG_HOVER"]').css('background-color','#2592A9');
        $('input[name="ETS_CB_COOKIE_BT_BG_HOVER"]').css('color','white');

        $('input[name="ETS_CB_COOKIE_BT_BORDER_HOVER"]').val('#2592A9');
        $('input[name="ETS_CB_COOKIE_BT_BORDER_HOVER"]').css('background-color','#2592A9');
        $('input[name="ETS_CB_COOKIE_BT_BORDER_HOVER"]').css('color','white');

        return false;
    });
});