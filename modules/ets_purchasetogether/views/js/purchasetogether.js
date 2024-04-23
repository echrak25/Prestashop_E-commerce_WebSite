$(document).ready(function(){
    pc_ets_getInfomations();
    $('input[name="purchase_together[]"]').click(function(){
        if(parseInt(ETS_PT_DISPLAY_TYPE) == 1){
            if(PC_ETS_VER_17 >0){
                if($(this).is(':checked'))
                    $('.ets-product-specific .product-miniature[data-id-product="'+$(this).data('id')+'"][data-id-product-attribute="'+$(this).data('attribute')+'"]').addClass('actived');
                else
                    $('.ets-product-specific .product-miniature[data-id-product="'+$(this).data('id')+'"][data-id-product-attribute="'+$(this).data('attribute')+'"]').removeClass('actived');
            }else{
                if($(this).is(':checked'))
                    $('.ets-list-purchase-together .ajax_block_product[data-id-product="'+$(this).data('id')+'"][data-id-product-attribute="'+$(this).data('attribute')+'"]').addClass('actived');
                else
                    $('.ets-list-purchase-together .ajax_block_product[data-id-product="'+$(this).data('id')+'"][data-id-product-attribute="'+$(this).data('attribute')+'"]').removeClass('actived');
            }
            findLastItem();
        }
    });
});

function findLastItem()
{
    if(PC_ETS_VER_17 > 0){
         $('.ets-product-specific .product-miniature').removeClass('last');
         $('.ets-product-specific .product-miniature.actived').last().addClass('last');
    }else{
        $('.ets-list-purchase-together .ajax_block_product').removeClass('last');
        $('.ets-list-purchase-together .ajax_block_product.actived').last().addClass('last');
    }
}

function pc_ets_getInfomations()
{
    if(PC_ETS_VER_17 <= 0)
    {
        if($('#idCombination').attr('value') != '')
        {
            findCombination();
            var id_product_attribute = $('#idCombination').attr('value');
            /*update name product attribute*/
            if($('.this-product .attribute_small').length >0 && pc_ets_attribute_small.length >0 && pc_ets_attribute_small[id_product_attribute])
                $('.this-product .attribute_small').html(pc_ets_attribute_small[id_product_attribute]);
            
            /*images if display type is 2*/
            if(parseInt(ETS_PT_DISPLAY_TYPE) != 1 && $('.this-product .product_img_link img').length >0 && pc_ets_image.length >0 && pc_ets_image[id_product_attribute]){
                $('.this-product .product_img_link img').attr('src',pc_ets_image[id_product_attribute]);
            }
            
            /*update prices*/
            if($('.this-product .price.product-price').length >0 && pc_ets_price.length >0 && pc_ets_price[id_product_attribute])
                $('.this-product .price.product-price').html(pc_ets_price[id_product_attribute]);
                
            if($('.this-product .old-price.product-price').length > 0 && pc_ets_old_price.length >0 && pc_ets_old_price[id_product_attribute]){
                $('.this-product .old-price.product-price').show();
                $('.this-product .old-price.product-price').html(pc_ets_old_price[id_product_attribute]);
            }else
                $('.this-product .old-price.product-price').hide();
                
            if($('.this-product .price-percent-reduction').length >0 && pc_ets_reduction.length >0 && pc_ets_reduction[id_product_attribute]){
                $('.this-product .price-percent-reduction').show();
                $('.this-product .price-percent-reduction').html(pc_ets_reduction[id_product_attribute]);
            }else
                $('.this-product .price-percent-reduction').hide();
        }
        else
        {
            if($('.this-product .attribute_small').length >0 && pc_ets_attribute_small.length >0 && pc_ets_attribute_small[0])
                $('.this-product .attribute_small').html(pc_ets_attribute_small[0]);
            /*images if display type is 2*/
            if(parseInt(ETS_PT_DISPLAY_TYPE) != 1 && $('.this-product .product_img_link img').length >0 && pc_ets_image.length >0 && pc_ets_image[0]){
                $('.this-product .product_img_link img').attr('src',pc_ets_image[0]);
            }
            /*update prices*/
            if($('.this-product .price.product-price').length >0 && pc_ets_price.length >0 && pc_ets_price[0])
                $('.this-product .price.product-price').html(pc_ets_price[0]);
                
            if($('.this-product .old-price.product-price').length > 0 && pc_ets_old_price.length >0 && pc_ets_old_price[0]){
                $('.this-product .old-price.product-price').show();
                $('.this-product .old-price.product-price').html(pc_ets_old_price[0]);
            }else
                $('.this-product .old-price.product-price').hide();
                
            if($('.this-product .price-percent-reduction').length >0 && pc_ets_reduction.length >0 && pc_ets_reduction[0]){
                $('.this-product .price-percent-reduction').show();
                $('.this-product .price-percent-reduction').html(pc_ets_reduction[0]);
            }else
                $('.this-product .price-percent-reduction').hide();            
        }
    }
}

$(document).on('change','#attributes .attribute_select', function(){
    pc_ets_getInfomations();
});

$(document).on('click', '#attributes .attribute_radio', function(e){
    pc_ets_getInfomations();
});
$(document).on('click', '.color_pick', function(e){
    pc_ets_getInfomations();
});
$(document).on('click', '.btn-continue', function(e){
    e.preventDefault();
    $('#layer_cart_purchase').fadeOut(500);
});

$(document).on('click','.layer_cart_purchase_content .cross',function(e){
    e.preventDefault();
    $('#layer_cart_purchase').fadeOut(500);
});

$(document).on('click','.ets_ajax_add_to_cart_button', function(e){
    e.preventDefault();
    /*check cart*/
    var $this = $(this);
    /*each list product*/
    var productIds = [];
    
    if(PC_ETS_VER_17 <= 0){
        if(!$('input[name="product_current"]').hasClass('disabled') && $('input[name="product_current"]').is(':checked'))
            productIds.push({'id_product':$('#product_page_product_id').val(),'id_product_attribute':$('#idCombination').val(),'qty':$('#quantity_wanted').val(),'currProduct':1});
    }
    
    $('input[name="purchase_together[]"]').each(function(){
        if(!$(this).hasClass('disabled') && $(this).is(':checked')){ 
            productIds.push({'id_product':$(this).data('id'),'id_product_attribute':$(this).data('attribute'),'qty':$(this).data('qty'), 'currProduct':0});
        }
    });
    
    var query = '';
    if(PC_ETS_VER_17 >0){
        query = $('#add-to-cart-or-refresh').serialize()+'&add=1&ajax=true&productIds='+JSON.stringify(productIds);
    }else{
        query = 'add=1&ajax=true&token=' + PC_ETS_STATIC_TOKEN + '&productIds='+JSON.stringify(productIds);
    } 
    /*ajax add to cart*/
    if(!$this.hasClass('active'))
    {
        $.ajax({
    		type: 'POST',
    		headers: { "cache-control": "no-cache" },
    		url: $this.attr('href') + '?rand=' + new Date().getTime(),
    		async: true,
    		cache: false,
    		dataType : "json",
            data: query,
            beforeSend: function(){$this.addClass('active');},
            success: function(jsonData)
            {
                /*ajax success if redirect true then page cart*/
                if(parseInt(ETS_PT_REDIRECT_TO_SHOPPING_CART_PAGE) >0){
                    window.location.href = PC_ETS_REDIRECT_URL;
                    return false;
                }
                
                /*run*/    
                if(PC_ETS_VER_17 <= 0)
                {
                    if(!jsonData.hasError){
                        if(jsonData.redirect_cart){
                            window.top.location.href = jsonData.redirect_cart;
                        }else{
                            ajaxCart.updateCart(jsonData);
                            $('#product_list').html(jsonData.renderHtml);
                            $('#layer_cart_purchase').fadeIn(500);
                        }
                        
                    }else{
                        var errors = '';
            			for (error in jsonData.errors)
            				//IE6 bug fix
            				if (error != 'indexOf')
            					errors += $('<div />').html(jsonData.errors[error]).text() + "\n";
            			alert(errors);
                    }
                }
                else
                {
                    prestashop.blockcart = prestashop.blockcart || {};
                    var showModal = prestashop.blockcart.showModal || function (modal) {
                        var $body = $('body');
                        $body.append(modal);
                        $body.one('click', '#blockcart-modal', function (event) {
                            if (event.target.id === 'blockcart-modal') {
                                $(event.target).remove();
                            }
                        });
                    };
                    $('.blockcart').replaceWith($(jsonData.preview).find('.blockcart'));
                    if (jsonData.modal) {
                        showModal(jsonData.modal);
                    }
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown){
                alert("Impossible to add the product to the cart.\n\ntextStatus: '" + textStatus + "'\nerrorThrown: '" + errorThrown + "'\nresponseText:\n" + XMLHttpRequest.responseText);
            },
            complete : function(){$this.removeClass('active');}
        }); 
    }  
});