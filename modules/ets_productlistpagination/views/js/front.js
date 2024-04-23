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
* @author ETS-Soft <etssoft.jsc@gmail.com>
* @copyright 2007-2022 ETS-Soft
* @license Valid for 1 website (or project) for each purchase of license
* International Registered Trademark & Property of ETS-Soft
*/
$(document).ready(function(){
    $(document).on('click','.ets_plp_pagination .load_more',function(){
       $('body .ets_plp_pagination').append('<div class="ets_ets_plp_faceted_overlay"><div class="overlay__inner"><div class="overlay__content"><span class="spinner"></span></div></div></div>');
       var url_ajax_pagination = $(this).attr('href');
       $.ajax({
            url: url_ajax_pagination,
            type: 'post',
            dataType: 'json',
            data: {
                ajax: 1,
            },
            success: function(json)
            { 
                $('#js-product-list .products').append(json.rendered_list_products);
                $('.ets_plp_pagination').replaceWith(json.rendered_pagination_products);  
                $('.ets_ets_plp_faceted_overlay').remove();   
            }
        });
       return false; 
    });
    ets_plp_autoLoadProducts();
    $(window).scroll(function(){
         ets_plp_autoLoadProducts();
    });
});
function ets_plp_autoLoadProducts()
{
    var container = '#js-product-list';
    if ($(container).length > 0 && $(container+" .ets_plp_pagination a.load_more_auto").length > 0 && !$(container+" .ets_plp_pagination a.load_more_auto").hasClass('active') && $(window).scrollTop() + $(window).height() >= $(container).offset().top + $(container).height() ) {
          $(container+" .ets_plp_pagination a.load_more_auto").addClass('active');
          $('body .ets_plp_pagination').append('<div class="ets_ets_plp_faceted_overlay"><div class="overlay__inner"><div class="overlay__content"><span class="spinner"></span></div></div></div>');
          $.ajax({
            url: $(container+" .ets_plp_pagination a.load_more_auto").attr('href'),
            type: 'post',
            dataType: 'json',
            data: {
                ajax: 1,
            },
            success: function(json)
            { 
                $('#js-product-list .products').append(json.rendered_list_products);
                $('.ets_plp_pagination').replaceWith(json.rendered_pagination_products);  
                $('.ets_ets_plp_faceted_overlay').remove();   
                $(container+" .ets_plp_pagination a.load_more").removeClass('active');
            }
        });   
    } 
}
