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
var Ets_ImageHover = {
    inArray: function (item, items) {
        var length = items.length;
        for(var i = 0; i < length; i++) {
            if(items[i] == item) return true;
        }
        return false;
    },
    ets_run_v17: function(){
        if($('article.product-miniature').length >0){
            var temps = [], ids = '', item = 0;
            $('article.product-miniature').each(function(){
                item = parseInt($(this).data('id-product'));
                if(item > 0 && !Ets_ImageHover.inArray(item, temps))
                    temps.push(item);
            });
            for(var i = 0; i < temps.length; i++)
                (i != temps.length - 1)? ids += temps[i] + ',' : ids += temps[i];
            if(ids !=''){
                $.ajax({
                    url : baseAjax,
                    data : 'ids=' + ids,
                    type : 'get',
                    dataType: 'json',
                    success : function(json){
                        if(json){                            
                            $.each(json,function(i,image){
                                if($('.product-miniature[data-id-product="'+i+'"] a.product-thumbnail img').length > 0){
                                    $('.product-miniature[data-id-product="'+i+'"] a.product-thumbnail img').after(image);
                                }
                            });
                        }
                    }
                });
            }
        }
    },
    ets_run_v16: function(){
        if($('.ajax_add_to_cart_button').length >0){
            var temps = [], ids = '', item = 0;
            $('.ajax_add_to_cart_button').each(function(){
                item = parseInt($(this).data('id-product'));
                if(item > 0 && !Ets_ImageHover.inArray(item, temps))
                    temps.push(item);
            });
            for(var i = 0; i < temps.length; i++)
                (i != temps.length - 1)? ids += temps[i] + ',' : ids += temps[i];
            if(ids !=''){
                $.ajax({
                    url : baseAjax,
                    data : 'ids=' + ids,
                    type : 'get',
                    dataType: 'json',
                    success : function(json){
                        if(json){
                            $.each(json,function(i,image){
                                /*product list*/
                                if($('.ajax_add_to_cart_button[data-id-product="'+i+'"]').closest('.ajax_block_product').find('a.product_img_link img').length >0)
                                    $('.ajax_add_to_cart_button[data-id-product="'+i+'"]').closest('.ajax_block_product').find('a.product_img_link img').after(image);
                                /*module products category*/
                                if($('.ajax_add_to_cart_button[data-id-product="'+i+'"]').closest('li.product-box').find('a.product-image img').length >0)
                                    $('.ajax_add_to_cart_button[data-id-product="'+i+'"]').closest('li.product-box').find('a.product-image img').after(image);
                            });
                        }
                    }
                });
            }
        }
    },
    ets_run_v15: function(){
        if($('.ajax_add_to_cart_button').length >0){
            var temps = [], ids = '', item = 0;
            $('.ajax_add_to_cart_button').each(function(){
                item = parseInt($(this).attr('rel').replace('ajax_id_product_',''));
                if(item > 0 && !Ets_ImageHover.inArray(item, temps))
                    temps.push(item);
            });
            for(var i = 0; i < temps.length; i++)
                (i != temps.length - 1)? ids += temps[i] + ',' : ids += temps[i];
            if(ids !=''){
                $.ajax({
                    url : baseAjax,
                    data : 'ids=' + ids,
                    type : 'get',
                    dataType: 'json',
                    global: false,
                    success : function(json){
                        if(json){                        
                            $.each(json,function(i,image){
                                /*home product*/
                                if($('.ajax_add_to_cart_button[rel="ajax_id_product_'+i+'"]').closest('.ajax_block_product').find('a.product_image img').length >0 && !$('.accessories_block').length)
                                    $('.ajax_add_to_cart_button[rel="ajax_id_product_'+i+'"]').closest('.ajax_block_product').find('a.product_image img').after(image);
                                 /*product list*/
                                if($('.ajax_add_to_cart_button[rel="ajax_id_product_'+i+'"]').closest('.ajax_block_product').find('a.product_img_link img').length >0)
                                    $('.ajax_add_to_cart_button[rel="ajax_id_product_'+i+'"]').closest('.ajax_block_product').find('a.product_img_link img').after(image);
                            });
                        }
                    }
                });
            }
        }
    }    
}
$(document).ready(function(){
    /*ver 1.7*/
    if(_PI_VER_17_ >0)
    {
        Ets_ImageHover.ets_run_v17();
        $(document).ajaxStop(function(){
            if($('a.product-thumbnail img').length < 2*$('a.product-thumbnail').length){
                Ets_ImageHover.ets_run_v17();
            }
        });
    }
    
    /*ver 1.6*/
    if(_PI_VER_17_ < 1 && _PI_VER_16_ >0)
    {
        Ets_ImageHover.ets_run_v16();
        $(document).ajaxStop(function(){
            if(($('a.product_img_link img').length < 2*$('a.product_img_link').length) || ($('a.product-image img').length < 2*$('a.product-image').length)){
                Ets_ImageHover.ets_run_v16();
            }
        });
    }
    /*ver 1.5*/
    if(_PI_VER_16_ < 1)
    {
        Ets_ImageHover.ets_run_v15();
        $(document).ajaxStop(function(){
            if(($('a.product_image img').length < 2*$('a.product_image').length) || ($('a.product_img_link img').length < 2*$('a.product_img_link').length)){
                Ets_ImageHover.ets_run_v15();
            }
        });
    }
});