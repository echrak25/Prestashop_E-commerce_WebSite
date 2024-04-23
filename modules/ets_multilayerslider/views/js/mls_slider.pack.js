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
(function($) {
    var MLS_Slider = function(element, options){
        var settings = $.extend({}, $.fn.mls_slider.defaults, options);
        var slider = $(element);        
        var currentSlide = slider.find('li.mls_slide_front.active').eq(0);        
        var playSlide = function(ik)
        {
            if($('li.mls_slide_front.item_'+ik).length > 0 && !$('li.mls_slide_front.item_'+ik).hasClass('active'))
            {                
                if($('li.mls_slide_front.active').length > 0)
                {
                    moveOut($('li.mls_slide_front.active'),function(){
                        moveIn($('li.mls_slide_front.item_'+ik),function(){});
                    });
                }
                else
                {
                    moveIn($('li.mls_slide_front.item_'+ik),function(){});
                }
                slider.addClass('mls_running');
            }
        } 
        var moveIn = function(slide,moveInCallBack)
        {            
            slider.addClass('mls_moving_in');
            $('.mls_pag_button').removeClass('active');
            $('.mls_pag_button[data-slide-order="'+slide.attr('data-slide-order')+'"]').addClass('active');   
            slide.css('animation-duration',settings.moveIn+'ms');
            slide.css('transition-duration',settings.moveIn+'ms');
            slide.removeClass(slide.attr('data-animation-out')).addClass(slide.attr('data-animation-in')).addClass('active').delay(settings.moveIn).queue(function(){ 
                if(slide.find('.msl_layer_front').length > 0)
                {
                    slide.find('.msl_layer_front').each(function(){
                        $(this).delay($(this).attr('data-delay-in')).queue(function(){
                            $(this).css('animation-duration',$(this).attr('data-move-in')+'ms');
                            $(this).removeClass($(this).attr('data-animation-out')).addClass($(this).attr('data-animation-in')).addClass('active').dequeue();  
                        })                    
                    });
                }
                $(this).dequeue();
            }).delay(slide.attr('data-max-layer-in')).queue(function(){
                moveInCallBack.call(this);
                slider.removeClass('mls_running');
                slider.removeClass('mls_moving_in'); 
                $(this).dequeue();
            });
            if(settings.enableRunningBar && $('.mls_slider_running').length > 0)
            { 
                $('.mls_slider_running').eq(0).css('animation-duration',(parseInt(settings.moveIn) + parseInt(slide.attr('data-max-layer-in')))+'ms')
            }
            return slide;   
        }
        var moveOut = function (slide,moveOutCallback)
        {
            slide.find('.msl_layer_front').each(function(){ 
                $(this).delay($(this).attr('data-delay-out')).queue(function(){
                    $(this).css('animation-duration',$(this).attr('data-move-out')+'ms');  
                    $(this).removeClass($(this).attr('data-animation-in')).addClass($(this).attr('data-animation-out')).delay($(this).attr('data-move-out')-100).queue(function(){
                        $(this).removeClass('active').dequeue();
                    }).dequeue();
                });
            });
            slide.delay(slide.attr('data-max-layer-out')).queue(function(){                
                moveOutCallback.call(this);  
                slide.css('animation-duration',settings.moveOut+'ms');
                slide.css('transition-duration',settings.moveOut+'ms');
                $(this).removeClass($(this).attr('data-animation-in')).addClass($(this).attr('data-animation-out')).delay(settings.moveOut).queue(function(){
                    $(this).removeClass('active').dequeue();                                      
                }).dequeue();
            });
        }
        
        var play = function()
        {            
            clearInterval($.fn.mls_slider.itervalTimer);
            $.fn.mls_slider.itervalTimer = 0;
            if(!settings.enablePagination && $('.mls_pagination').length > 0)
                $('.mls_pagination').remove();
            if(!settings.enableNav && $('.mls_nav').length > 0)
                $('.mls_nav').remove();
            if(!settings.enableRunningBar && $('.mls_slider_running').length > 0)
                $('.mls_slider_running').remove();                            
            if($('.mls_slide_front.item_'+settings.startSlide).length > 0)
            {
                playSlide(settings.startSlide);
                if(settings.autoPlay)
                    autoPlay();
            }
            else if($('.mls_slide_front').length > 0)
            {
                playSlide(1);
                if(settings.autoPlay)
                    autoPlay();
            }                
            $('.mls_pag_button').click(function(){ 
                if(!$(this).hasClass('active') && !slider.hasClass('mls_running'))
                {
                    playSlide($(this).attr('data-slide-order'));
                    if(settings.autoPlay)
                    {
                        clearInterval($.fn.mls_slider.itervalTimer);
                        autoPlay();
                    }                    
                }                    
            });
            $('.mls_next').click(function(){
                if(!slider.hasClass('mls_running'))
                {
                    if($('.mls_slide_front.active').length > 0 && $('.mls_slide_front.active').next('li.mls_slide_front').length > 0)
                    {
                        playSlide($('.mls_slide_front.active').next('li.mls_slide_front').attr('data-slide-order'));
                        if(settings.autoPlay)
                        {                            
                            clearInterval($.fn.mls_slider.itervalTimer);
                            autoPlay();
                        }
                    }
                    else if($('.mls_slide_front').length > 1 && settings.loop)
                    {
                        playSlide(1);
                        if(settings.autoPlay)
                        {
                            clearInterval($.fn.mls_slider.itervalTimer);
                            autoPlay();
                        }
                    }                            
                }
            });
            $('.mls_prev').click(function(){
                if(!slider.hasClass('mls_running'))
                {
                    if($('.mls_slide_front.active').length > 0 && $('.mls_slide_front.active').prev('li.mls_slide_front').length > 0)
                    {
                        playSlide($('.mls_slide_front.active').prev('li.mls_slide_front').attr('data-slide-order'));
                        if(settings.autoPlay)
                        {
                            clearInterval($.fn.mls_slider.itervalTimer);
                            autoPlay();
                        }
                    }
                    else if($('.mls_slide_front').length > 1 && settings.loop)
                    {
                        playSlide($('.mls_slide_front').length);
                        if(settings.autoPlay)
                        {
                            clearInterval($.fn.mls_slider.itervalTimer);
                            autoPlay();
                        }
                    }
                            
                }
            });
            if(settings.pauseOnHover && settings.autoPlay)
            {
                slider.hover(function(){                    
                    clearInterval($.fn.mls_slider.itervalTimer);   
                    $.fn.mls_slider.itervalTimer='';                                    
                },function(){
                    if($.fn.mls_slider.itervalTimer==='')
                        autoPlay();
                });
            }
            
        }
        var autoPlay = function()
        { 
            $.fn.mls_slider.itervalTimer = setInterval(function(){
                if($('.mls_slide_front.active').length > 0 && $('.mls_slide_front.active').next('li.mls_slide_front').length > 0)
                {
                    playSlide($('.mls_slide_front.active').next('li.mls_slide_front').attr('data-slide-order'));
                }
                else if($('.mls_slide_front').length > 1 && settings.loop)
                        playSlide(1);                
            },parseInt(settings.stand)+parseInt(slider.attr('data-max-slide-time'))+1000);            
        }
        //Play slider
        var backgroundLoaded = false;
        var layerImagesLoaded = false;        
        if(settings.enableLoading)
        { 
            !slider.hasClass('loading')
                slider.addClass('loading');
            if($('.mls_slides_front > li').length > 0)
            {
                var firstSlideBackground = $('.mls_slides_front > li:first-child').attr('data-slide-background-image');
                if(firstSlideBackground!='')
                {
                    $('<img/>').attr('src', firstSlideBackground).load(function() {
                       $(this).remove(); 
                       $('.mls_slides_front > li:first-child').css('background-image', 'url("'+firstSlideBackground+'")');
                       backgroundLoaded = true;
                       if(layerImagesLoaded && slider.hasClass('loading'))
                       {
                            slider.removeClass('loading');
                            play();
                       }                
                       return false;              
                    });
                }
                else
                    backgroundLoaded = true;            
                if($('.mls_slides_front > li:first-child').find('img').length > 0)
                {
                    var images = $('.mls_slides_front > li:first-child img');
                    var elemsCount = images.length;
                    var loadedCount = 0;                        
                    images.load(function (){                            
                        loadedCount++;          
                        if (loadedCount == elemsCount) {
                            layerImagesLoaded = true;
                            if(backgroundLoaded && slider.hasClass('loading'))
                            {
                                slider.removeClass('loading');
                                play();
                                return false;
                            }                          
                        }                            
                    });
                }
                else
                    layerImagesLoaded = true;
                if(backgroundLoaded && layerImagesLoaded)
                {
                    if(slider.hasClass('loading'))
                        slider.removeClass('loading');
                    play();
                }
            }
            setTimeout(function(){
               if(slider.hasClass('loading'))
               {
                    slider.removeClass('loading');
                    play();
               }                        
            },5000);            
        }
        else 
        {
            if(slider.hasClass('loading'))
                slider.removeClass('loading');
            play();
        }
    }
    $.fn.mls_slider = function(options) {
        var mlsslider = new MLS_Slider(this, options);        
        return this;
    };    
    //Default settings
    $.fn.mls_slider.defaults = {
        enableNav: true,
        enablePagination: true,
        enableLoading: true,
        enableRunningBar: true,        
        moveIn: 2000,
        moveOut: 2000,
        stand: 5000,
        loop: true,
        autoPlay: true,
        pauseOnHover: true,
        startSlide: 1,
    }; 
    $.fn.mls_slider.itervalTimer = 0;    
})(jQuery);