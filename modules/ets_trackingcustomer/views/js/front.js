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
    $(document).on('click','.ph-md-btn-download',function(){
       var id_product = $(this).parents('tr').data('product'); 
       $.ajax({
            url: ets_tc_link_ajax,
            data: 'addActionSessionCustomer=1&action=download_module&id_product='+id_product,
            type: 'post',
            dataType: 'json',
            success: function(){
            }
        });
    });
    $(document).on('click','.ets-czf-link-prd',function(){
        $.ajax({
            url: ets_tc_link_ajax,
            data: 'addActionSessionCustomer=1&action=view_demo&id_product='+$('input[name="id_product"]').val(),
            type: 'post',
            dataType: 'json',
            success: function(){
            }
        }); 
    });
    $(document).on('click','body#product .product-cover,body#product .product-images .js-thumb,body#product .product-images .js-modal-thumb',function(){
        $.ajax({
            url: ets_tc_link_ajax,
            data: 'addActionSessionCustomer=1&action=view_image&id_product='+$('input[name="id_product"]').val(),
            type: 'post',
            dataType: 'json',
            success: function(){
            }
        }); 
    });
    $(document).on('click','.remove-from-cart',function(){
        var id_product = $(this).data('id-product');
        var id_product_attribute = $(this).data('id-product-attribute');
        $.ajax({
            url: ets_tc_link_ajax,
            data: 'addActionSessionCustomer=1&action=delete_product&id_product='+id_product+'&id_product_attribute='+id_product_attribute,
            type: 'post',
            dataType: 'json',
            success: function(){
            }
        });
    });
});