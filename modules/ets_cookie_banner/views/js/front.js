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
    $(document).on('click','.ets-cb-btn-ok',function(){
        var link_ajax = $(this).attr('href');
        $('.ets_cookie_banber_block').remove();
        $.ajax({
            url: link_ajax,
            data: 'submitEtscbSaveCookie=1',
            type: 'post',
            dataType: 'json',                
            success: function(json){ 
            
            }
        });
        return false; 
    });
    $(document).on('click','.close_cookie',function(e){
        $('.ets_cookie_banber_block').remove();
    });
    $(document).on('click','.ets-cb-btn-not-ok',function(e){
        $('.ets_cookie_banber_block').remove();
        if($(this).attr('href')!='#')
        {
            window.location.href = (this).attr('href');
        }
    });
});