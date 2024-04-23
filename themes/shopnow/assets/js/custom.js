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
var _0x7035=["\x61\x74\x63\x5F\x73\x70\x69\x6E\x6E\x65\x72","\x61\x64\x64\x43\x6C\x61\x73\x73","\x61\x75\x74\x6F\x72\x65\x6E\x65\x77","\x68\x74\x6D\x6C","\x69","\x66\x69\x6E\x64","\x64\x61\x74\x61\x2D\x69\x64\x2D\x70\x72\x6F\x64\x75\x63\x74\x2D\x61\x74\x74\x72\x69\x62\x75\x74\x65","\x61\x74\x74\x72","\x70\x61\x72\x65\x6E\x74","\x76\x61\x6C","\x2E\x61\x74\x63\x5F\x71\x74\x79","\x64\x61\x74\x61\x2D\x69\x64\x2D\x70\x72\x6F\x64\x75\x63\x74","\x50\x4F\x53\x54","\x6E\x6F\x2D\x63\x61\x63\x68\x65","\x63\x61\x72\x74","\x70\x61\x67\x65\x73","\x75\x72\x6C\x73","\x3F\x72\x61\x6E\x64\x3D","\x67\x65\x74\x54\x69\x6D\x65","\x6A\x73\x6F\x6E","\x61\x63\x74\x69\x6F\x6E\x3D\x75\x70\x64\x61\x74\x65\x26\x61\x64\x64\x3D\x31\x26\x61\x6A\x61\x78\x3D\x74\x72\x75\x65\x26\x71\x74\x79\x3D","\x31","\x26\x69\x64\x5F\x70\x72\x6F\x64\x75\x63\x74\x3D","\x26\x74\x6F\x6B\x65\x6E\x3D","\x73\x74\x61\x74\x69\x63\x5F\x74\x6F\x6B\x65\x6E","\x26\x69\x70\x61\x3D","","\x26\x69\x64\x5F\x63\x75\x73\x74\x6F\x6D\x69\x7A\x61\x74\x69\x6F\x6E\x3D","\x75\x6E\x64\x65\x66\x69\x6E\x65\x64","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x61\x64\x64\x5F\x73\x68\x6F\x70\x70\x69\x6E\x67\x5F\x63\x61\x72\x74","\x75\x70\x64\x61\x74\x65\x43\x61\x72\x74","\x61\x64\x64\x2D\x74\x6F\x2D\x63\x61\x72\x74","\x65\x6D\x69\x74","\x61\x6A\x61\x78"];
var mypresta_productListCart = {
    add: function (_0x4bd3x2) {
        _0x4bd3x2[_0x7035[5]](_0x7035[4])[_0x7035[3]](_0x7035[2])[_0x7035[1]](_0x7035[0]);
        idCombination = _0x4bd3x2[_0x7035[8]]()[_0x7035[8]]()[_0x7035[8]]()[_0x7035[8]]()[_0x7035[8]]()[_0x7035[7]](_0x7035[6]);
        quantity = _0x4bd3x2[_0x7035[8]]()[_0x7035[5]](_0x7035[10])[_0x7035[9]]();
        idProduct = _0x4bd3x2[_0x7035[8]]()[_0x7035[8]]()[_0x7035[8]]()[_0x7035[8]]()[_0x7035[8]]()[_0x7035[7]](_0x7035[11]);
        $[_0x7035[34]]({
            type: _0x7035[12],
            headers: {"\x63\x61\x63\x68\x65\x2D\x63\x6F\x6E\x74\x72\x6F\x6C": _0x7035[13]},
            url: prestashop[_0x7035[16]][_0x7035[15]][_0x7035[14]] + _0x7035[17] + new Date()[_0x7035[18]](),
            async: true,
            cache: false,
            dataType: _0x7035[19],
            data: _0x7035[20] + ((quantity && quantity != null) ? quantity : _0x7035[21]) + _0x7035[22] + idProduct + _0x7035[23] + prestashop[_0x7035[24]] + ((parseInt(idCombination) && idCombination != null) ? _0x7035[25] + parseInt(idCombination) : _0x7035[26] + _0x7035[27] + ((typeof customizationId !== _0x7035[28]) ? customizationId : 0)),
            success: function (_0x4bd3x3, _0x4bd3x4, _0x4bd3x5) {
                _0x4bd3x2[_0x7035[5]](_0x7035[4])[_0x7035[3]](_0x7035[30])[_0x7035[29]](_0x7035[0]);
                prestashop[_0x7035[33]](_0x7035[31], {
                    reason: {
                        idProduct: idProduct,
                        idProductAttribute: idCombination,
                        linkAction: _0x7035[32]
                    },
                    resp:_0x7035
                })
            }
        })
    }
}

$(document).ready(function(){   
   
    bindGrid();
    wcInitImageZoom(); 
   $(document).on('click','.input-color',function(e) {
        restartElevateZoom();
    });
	$(document).on('click','.js-qv-mask img.thumb',function(e) {
        setTimeout(function(){
            restartElevateZoom();
        }, 500);
    });
    
    setInterval(function(){ 
        if ( $('.zoomImg').length == 0 ){
            restartElevateZoom();
        }
    }, 2000);
    
    $(document).on('click','.product-cover .layer',function(e){
        setTimeout(function(){
          $('.product-images').slick('refresh');
        }, 1000);
    });
    
    $(document).on('change','input[name="payment-option"]',function () {
        if ($('input[name="conditions_to_approve[terms-and-conditions]"]').is(':checked'))
        {
            $('#payment-confirmation button').removeAttr('disabled');
        }
    })
    $(document).on('click','input[name="conditions_to_approve[terms-and-conditions]"]',function () {
        console.log('click');
        if($(this).is(':checked') && ('input[name="payment-option"]:checked').length){
            $('#payment-confirmation button').removeAttr('disabled');
        }else {
            $('#payment-confirmation button').attr('disabled',true);
        }
    });
    $(document).on('click','.show_on_mobile',function(){
       $(this).next().toggleClass('open'); 
    });
    
    
    $(document).on('click','.block-categories-title',function(e){
        if ($(window).width() > 767)
        $(this).next().slideToggle(100);
        
   });
   $(window).resize(function(){
        if ($(window).width() > 1199 && $('.category-top-menu-pos').length != '' ){
            $('#index .category-top-menu-pos').slideDown(100);
        } else if ($(window).width() < 1200){
            $('.category-top-menu-pos').slideUp(100);
        }
   });
   $(document).on('click','.view_more_cat',function(e){
        $(this).parent().find('.hidden_product').addClass('show');
        $(this).removeClass('show');
        $(this).next().addClass('show');
        
   });
   
   $(document).on('click','.view_less_cat',function(e){
        $(this).parent().find('.hidden_product').removeClass('show');
        $(this).removeClass('show');
        $(this).prev().addClass('show');
        
   });
   
   $('body:not(#index) .category-top-menu-pos').addClass('not_index');
   
   var length_cat = $('.category-top-menu-list > li').length;
   if (length_cat > 10){
        $('.view_more_cat').addClass('show');
   }
   
   
    $(function() {
        var sticky_navigation_offset_top = 300;                
        var sticky_navigation = function(){
            var scroll_top = $(window).scrollTop(); 
            if (scroll_top > sticky_navigation_offset_top) {
                $('.scroll_top').addClass('show_scroll');
            } else {
                $('.scroll_top').removeClass('show_scroll');
            }  
        };
        
        sticky_navigation();
         
        $(window).scroll(function() {
             sticky_navigation();
        });
    });
    $(document).on('click', '.scroll_top',function(e) {
         $("html, body").animate({ scrollTop: 0 }, "slow");
         return false;
    });
    if ( $('.featured-products .products').length != ''){
        $('.featured-products .products').owlCarousel({
            items : 4,
            responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items : 1
                    },
                    // breakpoint from 480 up
                    480 : {
                        items : 2
                    },
                    // breakpoint from 768 up
                    768 : {
                        items : 3
                    },
                    992 : {
                        items : 3
                    },
                    1200 : {
                        items : 4
                    }
                },
            nav : true,
            rewindNav : false,
            margin:30,
            dots : false,         
            navText: ['', ''],  
            callbacks: true,
        });
    }
    
    
    
    
    
    
    $('#left-column .block .title_block, #left-column .block .products-section-title').on('click',function(){
        if ($(window).width() < 768){
            $(this).toggleClass('open').next().toggleClass('show_mobile');
        }
    });
    
    
    
    
    $('#menu-icon').on('click',function(){
        if ($(window).width() <= 767){
            var wrapper = $('.mm_menus_ul');
            if($(this).hasClass('closed'))
            {
                var btnObj = $(this); 
                btnObj.removeClass('closed');
                btnObj.addClass('opened');
                //btnObj.text('-');
                wrapper.stop(true,true).addClass('active');
                if ( $('.transition_slide.transition_default').length != '' ){
                    wrapper.stop(true,true).show();
                }
            }
            else
            {
                var btnObj = $(this); 
                btnObj.removeClass('opened');
                btnObj.addClass('closed');
                //btnObj.text('+');           
                wrapper.stop(true,true).removeClass('active');
                if ( $('.transition_slide.transition_default').length != '' ){
                    wrapper.stop(true,true).hide();
                }
            }   
         }     
    });
    
    if ( $('.categoryproducts_content').length != ''){
        $('.categoryproducts_content').owlCarousel({
            items : 4,
            responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items : 1
                    },
                    // breakpoint from 480 up
                    480 : {
                        items : 2
                    },
                    // breakpoint from 768 up
                    768 : {
                        items : 3
                    },
                    992 : {
                        items : 4
                    }
                },
            nav : true,
            rewindNav : false,
            margin:30,
            dots : false,         
            navText: ['', ''],  
            callbacks: true,
        });
    }
    
    
    
    $('.caption_content h2').each(function(){ 
        var $p = $(this); 
        $p.html($p.html().replace(/^(\w+)/, '<strong>$1</strong>')); 
    });
    
    
    $('.search-widget form input[type="text"]').focus(function(){
        if ($(window).width() <= 767)
        $(this).parent().addClass('form_focus');
    });
    $('.search-widget form input[type="text"]').blur(function(){
        if ($(window).width() <= 767)
        $(this).parent().removeClass('form_focus');
    });
    
    
    dropDown();

    if ($('.page-home .home_block_col').length == 1){
        $('.page-home .home_block_col:last-child').addClass('last-block');
        $('.page-home .home_block_col').addClass('full_width');
        
        $('.home_block_col.full_width .products').owlCarousel({
                items : 3,
                responsive : {
                        // breakpoint from 0 up
                        0 : {
                            items : 1
                        },
                        480 : {
                            items : 2
                        },
                        992 : {
                            items : 3
                        },
                    },
                nav : true,
                rewindNav : false,
                margin:20,
                dots : false,         
                navText: ['', ''],  
                callbacks: true,
                autoPlay: true,
            });
    }
    if ($('.page-home .home_block_col').length == 2){
        $('.page-home .home_block_col').addClass('half_width');
        
        $('.home_block_col .products').owlCarousel({
            items : 1,
            responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items : 1
                    },
                },
            nav : true,
            rewindNav : false,
            margin:20,
            dots : false,         
            navText: ['', ''],  
            callbacks: true,
            autoPlay: true,
        });
    }
    if ($('.page-home .home_block_col').length == 3){        
        $( '.page-home .home_block_col' ).eq(2).addClass('last-block');
        $('.page-home .home_block_col').addClass('normal');
        $('.home_block_col:not(.last-block) .products').owlCarousel({
            items : 1,
            responsive : {
                    0 : {
                        items : 1
                    },
                },
            nav : true,
            rewindNav : false,
            margin:20,
            dots : false,         
            navText: ['', ''],  
            callbacks: true,
            autoPlay: true,
        });
        
        $('.home_block_col.last-block .products').owlCarousel({
            items : 1,
            responsive : {
                    0 : {
                        items : 1
                    },
                    768 : {
                        items : 2
                    },
                    992 : {
                        items : 1
                    },
                },
            nav : true,
            rewindNav : false,
            margin:20,
            dots : false,         
            navText: ['', ''],  
            callbacks: true,
            autoPlay: true,
        });
    }
    autoHideNavSlide();
    autoHideNavThumbProduct();
    
    $(window).resize(function(){
        autoHideNavSlide();
        autoHideNavThumbProduct();
    })
});




function autoHideNavSlide(){
    var countItemManu = $('.products .product-miniature').length;
    
    
    if ($(window).width() > 991){
        if (countItemManu <= 4){
            $('.products .owl-nav').addClass('hidden');
        } else {
            $('.products .owl-nav').removeClass('hidden');
        }
    }
    if ($(window).width() < 992 && $(window).width() > 767){
        if (countItemManu <= 3){
            $('.products .owl-nav').addClass('hidden');
        } else {
            $('.products .owl-nav').removeClass('hidden');
        }
    }
    if ( $(window).width() < 768){
        if (countItemManu <= 2){
            $('.products .owl-nav').addClass('hidden');
        } else {
            $('.products .owl-nav').removeClass('hidden');
        }
    }
    
}

function autoHideNavThumbProduct(){
    var countItemTProduct = $('.product_thumb_horizontal .js-qv-mask .thumb-container').length;
    
    
    if ($(window).width() > 991){
        if (countItemTProduct <= 5){
            $('.product_thumb_horizontal .js-qv-mask .owl-nav').addClass('hidden');
        } else {
            $('.product_thumb_horizontal .js-qv-mask .owl-nav').removeClass('hidden');
        }
    }
    if ($(window).width() < 992 && $(window).width() > 767){
        if (countItemTProduct <= 4){
            $('.product_thumb_horizontal .js-qv-mask .owl-nav').addClass('hidden');
        } else {
            $('.product_thumb_horizontal .js-qv-mask .owl-nav').removeClass('hidden');
        }
    }
    if ( $(window).width() < 768 && $(window).width() >= 480){
        if (countItemTProduct <= 4){
            $('.product_thumb_horizontal .js-qv-mask .owl-nav').addClass('hidden');
        } else {
            $('.product_thumb_horizontal .js-qv-mask .owl-nav').removeClass('hidden');
        }
    }
    if ( $(window).width() < 480){
        if (countItemTProduct <= 3){
            $('.product_thumb_horizontal .js-qv-mask .owl-nav').addClass('hidden');
        } else {
            $('.product_thumb_horizontal .js-qv-mask .owl-nav').removeClass('hidden');
        }
    }
    
}


function dropDown()
{
	elementClick = '.search_icon_toogle';
	elementSlide =  '#search_widget form';
	activeClass = 'active';

	$(elementClick).on('click', function(e){
		e.stopPropagation();
		var subUl = $(this).next(elementSlide);
		if(subUl.is(':not(.active)'))
		{
			subUl.addClass(activeClass);
			$(this).addClass(activeClass);
		}
		else
		{
			subUl.removeClass(activeClass);
			$(this).removeClass(activeClass);
		}
		$(elementClick).not(this).next(elementSlide).removeClass(activeClass);
		$(elementClick).not(this).removeClass(activeClass);
		e.preventDefault();
	});

	$(elementSlide).on('click', function(e){
		e.stopPropagation();
	});

	$(document).on('click', function(e){
		e.stopPropagation();
		var elementHide = $(elementClick).next(elementSlide);
		$(elementHide).removeClass('active');
		$(elementClick).removeClass('active');
	});
}


function bindGrid()
{
    var display_product= getCookie('display_product');
    if(display_product=='list')
        display('list');
    
	$(document).on('click','#grid',function(e){
		e.preventDefault();
		display('grid');
	});

	$(document).on('click','#list',function(e){
		e.preventDefault();
		display('list');
	});
}

function display(view)
{
	if (view == 'list')
	{
	   if ($('body#prices-drop').length != '' ){
    		$('body#prices-drop .products').removeClass('grid').addClass('list row');
    		$('body#prices-drop .products .product-miniature').addClass('type_list_full_width');
    		$('body#prices-drop .products .product-miniature').each(function(index, element) {
    			$('body#prices-drop .image_item_product').addClass('col-sm-4 col-ms-4 col-xs-12');
                $('body#prices-drop .product-description').addClass('col-sm-8 col-ms-8 col-xs-12');
                $('body#prices-drop .product-flags').addClass('col-sm-4 col-ms-4 col-xs-12');
                //var highlighted_informations= $(this).find('.highlighted-informations').html();
              //$(this).find('.highlighted-informations').remove();
              //$(this).find('.product-description').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
    		});
        }
        
        if ($('body#new-products').length != '' ){
            $('body#new-products .products').removeClass('grid').addClass('list row');
    		$('body#new-products .products .product-miniature').addClass('type_list_full_width');
    		$('body#new-products .products .product-miniature').each(function(index, element) {
    			$('body#new-products .image_item_product').addClass('col-sm-4 col-ms-4 col-xs-12');
                $('body#new-products .product-description').addClass('col-sm-8 col-ms-8 col-xs-12');
                $('body#new-products .product-flags').addClass('col-sm-4 col-ms-4 col-xs-12');
                //var highlighted_informations= $(this).find('.highlighted-informations').html();
              //$(this).find('.highlighted-informations').remove();
              //$(this).find('.product-description').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
    		});
        }
        
        if ($('body#supplier').length != '' ){
            $('body#supplier .products').removeClass('grid').addClass('list row');
    		$('body#supplier .products .product-miniature').addClass('type_list_full_width');
    		$('body#supplier .products .product-miniature').each(function(index, element) {
    			$('body#supplier .image_item_product').addClass('col-sm-3 col-ms-4 col-xs-12');
                $('body#supplier .product-description').addClass('col-sm-9 col-ms-8 col-xs-12');
                $('body#supplier .product-flags').addClass('col-sm-3 col-ms-4 col-xs-12');
                //var highlighted_informations= $(this).find('.highlighted-informations').html();
              //$(this).find('.highlighted-informations').remove();
              //$(this).find('.product-description').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
    		});
        }
        
        if ($('body#manufacturer').length != '' ){
            $('body#manufacturer .products').removeClass('grid').addClass('list row');
    		$('body#manufacturer .products .product-miniature').addClass('type_list_full_width');
    		$('body#manufacturer .products .product-miniature').each(function(index, element) {
    			$('body#manufacturer .image_item_product').addClass('col-sm-3 col-ms-4 col-xs-12');
                $('body#manufacturer .product-description').addClass('col-sm-9 col-ms-8 col-xs-12');
                $('body#manufacturer .product-flags').addClass('col-sm-3 col-ms-4 col-xs-12');
                //var highlighted_informations= $(this).find('.highlighted-informations').html();
              //$(this).find('.highlighted-informations').remove();
              //$(this).find('.product-description').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
    		});
        }
        
        if ($('body#best-sales').length != '' ){
            $('body#best-sales .products').removeClass('grid').addClass('list row');
    		$('body#best-sales .products .product-miniature').addClass('type_list_full_width');
    		$('body#best-sales .products .product-miniature').each(function(index, element) {
    			$('body#best-sales .image_item_product').addClass('col-sm-4 col-ms-4 col-xs-12');
                $('body#best-sales .product-description').addClass('col-sm-8 col-ms-8 col-xs-12');
                $('body#best-sales .product-flags').addClass('col-sm-4 col-ms-4 col-xs-12');
                //var highlighted_informations= $(this).find('.highlighted-informations').html();
             // $(this).find('.highlighted-informations').remove();
              //$(this).find('.product-description').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
    		});
        }
        if ($('body#category').length != '' ){
            $('body#category .products').removeClass('grid').addClass('list row');
    		$('body#category .products .product-miniature').addClass('type_list_full_width');
            $('body#category .image_item_product').addClass('col-sm-4 col-ms-4 col-xs-12');
            $('body#category .product-description').addClass('col-sm-8 col-ms-8 col-xs-12');
            $('body#category .product-flags').addClass('col-sm-4 col-ms-4 col-xs-12');
            $('body#category .products .product-miniature').find('.image_item_product .highlighted-informations').detach().appendTo('.product-description');
    		$('body#category .products .product-miniature').each(function(index, element){
    		  //v/ar highlighted_informations= $(element).find('.highlighted-informations').html();
              //$(element).find('.highlighted-informations').remove();
              //$(element).find('.product-description').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
    		});
        }
        
        if ($('body#search').length != '' ){
            $('body#search .products').removeClass('grid').addClass('list row');
    		$('body#search .products .product-miniature').addClass('type_list_full_width');
            $('body#search .image_item_product').addClass('col-sm-3 col-ms-4 col-xs-12');
            $('body#search .product-description').addClass('col-sm-9 col-ms-8 col-xs-12');
            $('body#search .product-flags').addClass('col-sm-3 col-ms-4 col-xs-12');
            $('body#search .products .product-miniature').find('.image_item_product .highlighted-informations').detach().appendTo('.product-description');
    		$('body#search .products .product-miniature').each(function(index, element){
    		  //var highlighted_informations= $(element).find('.highlighted-informations').html();
              //$(element).find('.highlighted-informations').remove();
              //$(element).find('.product-description').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
    		});
        }
        
        
        
		$('.display').find('li#list').addClass('active');
		$('.display').find('li#grid').removeAttr('class');
        
        
        
        setCookie('display_product','list',1);
	}
	else
	{
		$('body#prices-drop .products').removeClass('list').addClass('grid row');
		$('body#prices-drop .products .product-miniature').removeClass('type_list_full_width');
		$('body#prices-drop .products .product-miniature').each(function(index, element) {
			$('body#prices-drop .image_item_product').removeClass('col-sm-4 col-ms-4 col-xs-12');
            $('body#prices-drop .product-description').removeClass('col-sm-8 col-ms-4 col-xs-12');
            $('body#prices-drop .product-flags').removeClass('col-sm-4 col-ms-4 col-xs-12');
            //var highlighted_informations= $(this).find('.highlighted-informations').html();
              //$(this).find('.highlighted-informations').remove();
              //$(this).find('.image_item_product').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
		});
        
        $('body#new-products .products').removeClass('list').addClass('grid row');
		$('body#new-products .products .product-miniature').removeClass('type_list_full_width');
		$('body#new-products .products .product-miniature').each(function(index, element) {
			$('body#new-products .image_item_product').removeClass('col-sm-4 col-ms-4 col-xs-12');
            $('body#new-products .product-description').removeClass('col-sm-8 col-ms-4 col-xs-12');
            $('body#new-products .product-flags').removeClass('col-sm-4 col-ms-4 col-xs-12');
            //var highlighted_informations= $(this).find('.highlighted-informations').html();
              //$(this).find('.highlighted-informations').remove();
              //$(this).find('.image_item_product').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
		});
        
        $('body#best-sales .products').removeClass('list').addClass('grid row');
		$('body#best-sales .products .product-miniature').removeClass('type_list_full_width');
		$('body#best-sales .products .product-miniature').each(function(index, element) {
			$('body#best-sales .image_item_product').removeClass('col-sm-4 col-ms-4 col-xs-12');
            $('body#best-sales .product-description').removeClass('col-sm-8 col-ms-4 col-xs-12');
            $('body#best-sales .product-flags').removeClass('col-sm-4 col-ms-4 col-xs-12');
            //var highlighted_informations= $(this).find('.highlighted-informations').html();
             // $(this).find('.highlighted-informations').remove();
              //$(this).find('.image_item_product').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
		});
        
        $('body#category .products').removeClass('list').addClass('grid row');
		$('body#category .products .product-miniature').removeClass('type_list_full_width');
		$('body#category .products .product-miniature').each(function(index, element) {
			$('body#category .image_item_product').removeClass('col-sm-4 col-ms-4 col-xs-12');
            $('body#category .product-description').removeClass('col-sm-8 col-ms-4 col-xs-12');
            $('body#category .product-flags').removeClass('col-sm-4 col-ms-4 col-xs-12');
            //var highlighted_informations= $(this).find('.highlighted-informations').html();
            //  $(this).find('.highlighted-informations').remove();
             // $(this).find('.image_item_product').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
		});
        
        $('body#supplier .products').removeClass('list').addClass('grid row');
		$('body#supplier .products .product-miniature').removeClass('type_list_full_width');
		$('body#supplier .products .product-miniature').each(function(index, element) {
			$('body#supplier .image_item_product').removeClass('col-sm-3 col-ms-4 col-xs-12');
            $('body#supplier .product-description').removeClass('col-sm-9 col-ms-4 col-xs-12');
            $('body#supplier .product-flags').removeClass('col-sm-3 col-ms-4 col-xs-12');
            //var highlighted_informations= $(this).find('.highlighted-informations').html();
             // $(this).find('.highlighted-informations').remove();
             // $(this).find('.image_item_product').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
		});
        
        $('body#manufacturer .products').removeClass('list').addClass('grid row');
		$('body#manufacturer .products .product-miniature').removeClass('type_list_full_width');
		$('body#manufacturer .products .product-miniature').each(function(index, element) {
			$('body#manufacturer .image_item_product').removeClass('col-sm-3 col-ms-4 col-xs-12');
            $('body#manufacturer .product-description').removeClass('col-sm-9 col-ms-4 col-xs-12');
            $('body#manufacturer .product-flags').removeClass('col-sm-3 col-ms-4 col-xs-12');
            //var highlighted_informations= $(this).find('.highlighted-informations').html();
              //$(this).find('.highlighted-informations').remove();
              //$(this).find('.image_item_product').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
		});
        
        $('body#search .products').removeClass('list').addClass('grid row');
		$('body#search .products .product-miniature').removeClass('type_list_full_width');
		$('body#search .products .product-miniature').each(function(index, element) {
			$('body#search .image_item_product').removeClass('col-sm-3 col-ms-4 col-xs-12');
            $('body#search .product-description').removeClass('col-sm-9 col-ms-4 col-xs-12');
            $('body#search .product-flags').removeClass('col-sm-3 col-ms-4 col-xs-12');
            //var highlighted_informations= $(this).find('.highlighted-informations').html();
              //$(this).find('.highlighted-informations').remove();
              //$(this).find('.image_item_product').append('<div class="highlighted-informations">'+highlighted_informations+'<div>');
		});
        
        
		$('.display').find('li#grid').addClass('active');
		$('.display').find('li#list').removeAttr('class');
        setCookie('display_product','grid',1);
		
        
        
	}
}
function wcInitImageZoom(){
    if ( $( 'div:not(.quickview) .product-cover.product-cover-zoom' ).length > 0 ) {
        var img = $( 'div:not(.quickview) .product-cover.product-cover-zoom' ), img_src = $( 'div:not(.quickview) .product-cover.product-cover-zoom' ).data( 'src' );
        img.zoom({
        touch: false,
        url: img_src
    });
    }
} 
function restartElevateZoom(){
	$(".zoomImg").remove();
	wcInitImageZoom();
}   

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}  