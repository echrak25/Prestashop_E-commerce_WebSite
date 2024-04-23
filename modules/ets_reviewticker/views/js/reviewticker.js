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
var etsReviewTicker = {
    setCookie: function(cname, cvalue, exdays){
        if(!ETS_RT_REMEMEBER)
            return;
        if(ETS_RT_RELATED_ONLY && $('body').attr('id')=='product' && $('input[name="id_product"]').length > 0 && parseInt($('input[name="id_product"]').val())>0)
            cname += '_product_'+parseInt($('input[name="id_product"]').val());
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 *60 * 1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    },
    getCookie: function(cname) {
        if(ETS_RT_RELATED_ONLY && $('body').attr('id')=='product' && $('input[name="id_product"]').length > 0 && parseInt($('input[name="id_product"]').val())>0)
            cname += '_product_'+parseInt($('input[name="id_product"]').val());
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++){
            var c = ca[i];
            while (c.charAt(0) == ' ')
                c = c.substring(1);
            if (c.indexOf(name) == 0)
                return c.substring(name.length, c.length);
        }
        return "";
    },    
    timer: '', 
    run: function()
    {
        if(!ETS_RT_REMEMEBER && etsReviewTicker.getCookie('ets_rt_ids')!='')
            etsReviewTicker.setCookie('ets_rt_ids','');    
        ets_rt_restart = ETS_RT_REMEMEBER && ETS_RT_REPEAT && !ets_rt_clsed && etsReviewTicker.getCookie('ets_rt_ids')!='' ? true : false;
        setTimeout(function(){
            $.ajax({
                url: ETS_RT_URL_AJAX,
                type: 'post',
                dataType: 'json',
                data: {
                    excludedIds: etsReviewTicker.getCookie('ets_rt_ids'),
                    id_product: ETS_RT_RELATED_ONLY && $('body').attr('id')=='product' && $('input[name="id_product"]').length > 0 && parseInt($('input[name="id_product"]').val())>0 ? parseInt($('input[name="id_product"]').val()) : 0,
                },
                success: function(json)
                {
                    if(json.success)
                    {
                        if($('.ets_reviewticker').length > 0)
                            $('.ets_reviewticker').remove();
                        if(json.html)
                            $('body').append(json.html);
                        if($('.ets_reviewticker > li').length > 0)
                        {                          
                            etsReviewTicker.slide();
                        }    
                        else if(ets_rt_restart)
                        {
                            etsReviewTicker.setCookie('ets_rt_ids','');
                            clearInterval(etsReviewTicker.timer);
                            if(ETS_RT_LOOP_OUT)
                                setTimeout(function(){
                                    etsReviewTicker.run();
                                },ETS_RT_LOOP_OUT);
                            else
                                etsReviewTicker.run();                            
                        }                               
                    }                 
                }
            });
        }, ETS_RT_DELAY_START);        
    },
    slide: function()
    {
        if($('.ets_reviewticker > li.done').length <= 0)
        {
            $('.ets_reviewticker').delay(50).queue(function(){
                $(this).addClass('active');
                $(this).dequeue(); 
            });
            $('.ets_reviewticker > li:first-child').addClass('active').delay(ETS_RT_TIME_LANDING).queue(function(){                               
                $('.ets_reviewticker > li.active').addClass('done');
                $('.ets_reviewticker').removeClass('active');    
                if(etsReviewTicker.getCookie('ets_rt_ids')=='' || (etsReviewTicker.getCookie('ets_rt_ids')!='' && ($.inArray($(this).attr('data-id-order-detail'), etsReviewTicker.getCookie('ets_rt_ids').split(',')) ==-1))) 
                    etsReviewTicker.setCookie('ets_rt_ids',etsReviewTicker.getCookie('ets_rt_ids')+$(this).attr('data-id-order-detail')+',');                              
                $(this).dequeue();                                                        
            });
        }                                    
        if($('.ets_reviewticker > li').length >= 1)
        {
            etsReviewTicker.timer = setInterval(function(){                                    
                if($('.ets_reviewticker > li.done').length > 0 && $('.ets_reviewticker > li.done').last().next('li').length > 0)
                {
                    $('.ets_reviewticker > li').removeClass('active');
                    $('.ets_reviewticker').addClass('active');                    
                    $('.ets_reviewticker > li.done').last().next('li').addClass('active').delay(ETS_RT_TIME_LANDING).queue(function(){
                        $('.ets_reviewticker > li.active').addClass('done');
                        $('.ets_reviewticker').removeClass('active');
                        if(etsReviewTicker.getCookie('ets_rt_ids')=='' || (etsReviewTicker.getCookie('ets_rt_ids')!='' && ($.inArray($(this).attr('data-id-order-detail'), etsReviewTicker.getCookie('ets_rt_ids').split(',')) ==-1))) 
                            etsReviewTicker.setCookie('ets_rt_ids',etsReviewTicker.getCookie('ets_rt_ids')+$(this).attr('data-id-order-detail')+',');                                                                    
                        $(this).dequeue();
                    });
                }
                else if(!ETS_RT_REPEAT)
                {                                        
                    clearInterval(etsReviewTicker.timer);
                }                                              
                else  
                {
                    if(ets_rt_restart)
                    {
                        etsReviewTicker.setCookie('ets_rt_ids','');
                        clearInterval(etsReviewTicker.timer);
                        if(ETS_RT_LOOP_OUT)
                        {
                            setTimeout(function(){
                               etsReviewTicker.run();
                            },ETS_RT_LOOP_OUT);   
                        }
                        else
                            etsReviewTicker.run();
                    }
                    else
                    {
                        etsReviewTicker.setCookie('ets_rt_ids','');
                        $('.ets_reviewticker > li').removeClass('done').removeClass('active');
                        clearInterval(etsReviewTicker.timer);
                        if(ETS_RT_LOOP_OUT > 0)
                        {
                            setTimeout(function(){
                               etsReviewTicker.slide(); 
                            },ETS_RT_LOOP_OUT);                            
                        }
                        else
                        {                            
                            etsReviewTicker.slide(); 
                        }    
                    }  
                }                                                               
            },parseInt(ETS_RT_TIME_OUT + ETS_RT_TIME_LANDING));
        }                                
        else if(ets_rt_restart)
        {
            setTimeout(function(){
                etsReviewTicker.setCookie('ets_rt_ids','');
                clearInterval(etsReviewTicker.timer);
                etsReviewTicker.run();
            },parseInt(ETS_RT_TIME_OUT + ETS_RT_TIME_LANDING + ETS_RT_LOOP_OUT));
        }
    }
}
$(document).ready(function(){
    if(ETS_RT_TIME_OUT < 0)
        ETS_RT_TIME_OUT = 10000;
    else
        ETS_RT_TIME_OUT = ETS_RT_TIME_OUT*1000;
    if(ETS_RT_TIME_LANDING < 0)
        ETS_RT_TIME_LANDING = 2000;
    else
        ETS_RT_TIME_LANDING = ETS_RT_TIME_LANDING*1000;
    if(ETS_RT_DELAY_START < 0)
        ETS_RT_DELAY_START = 0;
    else
        ETS_RT_DELAY_START = ETS_RT_DELAY_START*1000;
    if(ETS_RT_LOOP_OUT < 0)
        ETS_RT_LOOP_OUT = 0;
    else
        ETS_RT_LOOP_OUT = parseInt(ETS_RT_LOOP_OUT * 60 * 1000);
    ets_rt_restart = false;
    ets_rt_clsed = false;
    etsReviewTicker.run();
    $(document).on('click','.ets_rt_close',function(){
        $('.ets_reviewticker').remove();
        ets_rt_clsed = true;
        if(etsReviewTicker.timer!=='')
            clearInterval(etsReviewTicker.timer);
        if(ETS_RT_CLOSE_PERMANAL)
            $.ajax({
                    url: ETS_RT_URL_AJAX,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        end_alert_life_time: 1,
                    },
                    success: function(json)
                    {                                   
                    }
                });               
    });  
    if(ETS_RT_STOP_WHEN_HOVER)
    {
        $(document).on('mouseenter','.ets_reviewticker', function () {
            if(!$(this).hasClass('hovered'))
            {
                $(this).addClass('hovered');
                if(etsReviewTicker.timer!='' || etsReviewTicker.timer)
                    clearInterval(etsReviewTicker.timer);
            }        
        });
        $(document).on('mouseleave','.ets_reviewticker', function () {
            if($(this).hasClass('hovered'))
            {
                $(this).removeClass('hovered');
                etsReviewTicker.slide();
            }        
        });
    }     
});