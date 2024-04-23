
$(document).ready(function(){
    var xhr = 0;
    $(document).on('keyup focus','#product_autocomplete_input_ets',function(){
        var search = $(this).val();
        var Ids=$('#inputPurchaseTogether').val();
        Ids=Ids?Ids.substring(0,Ids.length-1):-1;
        if(search.length > 0)
        {
            if(xhr!=0)
                xhr.abort();
            $('.item_ets').html('');
            xhr = $.ajax({
                url: $('#product-purchasetogether').data('url-ajax'),
                data:{
                    q: search,
                    limit: 20,
                    timestamp: $.now(),
                    excludeIds:Ids,
                    id_product: parseInt($('input[name="id_product"]').val())>0?parseInt($('input[name="id_product"]').val()):0
                },
                dataType: 'json',
                type: 'post',
                success: function(json){
                    if(json)
                    {
						$('.item_ets').show();
                        $.each(json,function(index,item){
                            $('.item_ets').append('<li data-id-product="'+item.id_product+'" data-id-product-attribute="'+(item.id_product_attribute?item.id_product_attribute:0)+'">'+(item.image?'<img style="width:50px;" src="'+item.image+'"/>':'')+'&nbsp;'+item.id_product+' - '+item.name+(item.ref ? ' ('+item.ref+') ' : '')+'</li>');
                        });
                    }
					else
						$('.item_ets').hide();
                }
            });
        }
        else
            $('.item_ets').hide();
    });
    
    $(document).on('click','.item_ets li',function(e){
        e.preventDefault();
	    var item_current = $(this);
        var id_product = item_current.data('id-product');
        var id_product_attribute = item_current.data('id-product-attribute');
        var includeIds = $('#inputPurchaseTogether').val();
        var flag = true;
		$('#product_autocomplete_input_ets').val($(this).text());
		$('.delPurchaseTogether').each(function(){
			if($(this).data('id-product') == id_product && $(this).data('id-product-attribute') == id_product_attribute){
				flag = false;
				return;
			}
		});
		if(flag && parseInt($('input[name="id_product"]').val()) >0){
		  $.ajax({
                url: $('#product-purchasetogether').data('url-ajax')+'&add=1',
                data:{
                    id_product: $('input[name="id_product"]').val(),
                    id_product_related: $(this).data('id-product'),
                    id_product_attribute: $(this).data('id-product-attribute')
                },
                dataType: 'json',
                type: 'post',
                success: function(json){
                    if(!json.hasError){
                        $('#inputPurchaseTogether').val(includeIds + item_current.data('id-product')+'-'+item_current.data('id-product-attribute') + ',');
                        $('#divPurchaseTogether').append('<div class="form-control-static"><button type="button" data-id-product="'+item_current.data('id-product')+'" data-id-product-attribute="'+item_current.data('id-product-attribute')+'" class="btn btn-default delPurchaseTogether" name="'+item_current.data('id-product')+'"><span class="purchase_icon_close"></span></button><img width="80px" height="auto" src="'+item_current.children('img').attr('src')+'"/><span class="productName">'+item_current.text()+'</span></div>');
                        $('#product_autocomplete_input_ets').val('');
                        $('.item_ets').hide();
                        showSuccessMessage('Purchased together product is added successfully!');
                    }else{
                        showErrorMessage('Purchased together product is add error!');
                    }
                }
		  });
		}else{
		  showErrorMessage('Id product is null!');
		}
    });
    
    $(document).on('click','.delPurchaseTogether',function(e){
        e.preventDefault();
        var includeIds = $('#inputPurchaseTogether').val().split(',');
        var exitIds = '';
        if(includeIds){
            for (var i = 0; i < includeIds.length-1; i++){
                var productIds = includeIds[i].split('-');
                  if(productIds[0] != $(this).data('id-product') && productIds[1] != $(this).data('id-product-attribute'))
                        exitIds+=includeIds[i]+',';
            }
        }

        if(exitIds)
            $('#inputPurchaseTogether').val(exitIds);
        
        var current_item =  $(this);
        if(parseInt($('input[name="id_product"]').val()) >0){
          $.ajax({
                url: $('#product-purchasetogether').data('url-ajax')+'&del=1',
                data:{
                    id_product: parseInt($('input[name="id_product"]').val()),
                    id_product_related: current_item.data('id-product'),
                    id_product_attribute: current_item.data('id-product-attribute'),
                },
                dataType: 'json',
                type: 'post',
                success: function(json){
                    if(!json.hasError){
                        current_item.parent().remove();
                        showSuccessMessage('Deleted purchased together product successfully !');
                    }else{
                        showErrorMessage('Product purchased together not exits!');
                    }
                }
          });            
        }else
            showErrorMessage('Id product is null!');
    });
    
    $('#ETS_PT_EXCLUDE_CURRENT_PRODUCT').click(function(e)
    {
        if($(this).is(':checked'))
            $('#ETS_PT_REQUIRE_CURRENT_PRODUCT_off').closest('div.form-group').hide(300);
        else
            $('#ETS_PT_REQUIRE_CURRENT_PRODUCT_off').closest('div.form-group').show(300);
    });
    
    if($('#ETS_PT_EXCLUDE_CURRENT_PRODUCT').is(':checked'))
    {
        $('#ETS_PT_REQUIRE_CURRENT_PRODUCT_off').closest('div.form-group').hide(300);
    }
    else
    {
        $('#ETS_PT_REQUIRE_CURRENT_PRODUCT_off').closest('div.form-group').show(300);
    }
    
    $('li.ets-purchase-type-show img').click(function(e){
        e.preventDefault();
        if(!$(this).parent().children('input').is(':checked'))
            $(this).parent().children('input').prop('checked', true);
    });
    
});
