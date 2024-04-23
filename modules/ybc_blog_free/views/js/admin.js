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
if(typeof PS_ALLOW_ACCENTED_CHARS_URL === 'undefined')
        PS_ALLOW_ACCENTED_CHARS_URL = false;
$(document).ready(function(){
    $('.ybc-blog-tab-general').addClass('active'); 
    $('.config_tab_general').addClass('active');
    $('.confi_tab').click(function(){
        $('.ybc-form-group').removeClass('active');
        $('.ybc-blog-tab-'+$(this).data('tab-id')).addClass('active');  
        $('.confi_tab').removeClass('active');
        $(this).addClass('active');             
    });
    $('#title_'+ybc_blog_free_default_lang).change(function(){
        if(!ybc_blog_free_is_updating)
        {
            $('#url_alias_'+ybc_blog_free_default_lang).val(str2url($(this).val(), 'UTF-8'));
        }        
        else
        if($('#url_alias_'+ybc_blog_free_default_lang).val() == '')
            $('#url_alias_'+ybc_blog_free_default_lang).val(str2url($(this).val(), 'UTF-8'));
    });
    if($('.ybc_fancy').length > 0 || true)
    {
        $('.ybc_fancy').fancybox();
    }
    $('#product_autocomplete_input').autocomplete(ybc_blog_free_ajax_url,{
		minChars: 1,
		autoFill: true,
		max:20,
		matchContains: true,
		mustMatch:true,
		scroll:false,
		cacheLength:0,
		formatItem: function(item) {
			return item[1]+' - '+item[0];
		}
	}).result(ybcAddAccessory);
    $('#product_autocomplete_input').setOptions({
		extraParams: {
			excludeIds : ybcGetAccessoriesIds()
		}
	});
    $(document).on('click','.list-action',function(){
        if(!$(this).hasClass('disabled'))
        {            
            $(this).addClass('disabled');
            $.ajax({
                url: $(this).attr('href')+'&ajax=1',
                data: {},
                type: 'post',
                dataType: 'json',                
                success: function(json){                                 
                    if(json.enabled)
                    {
                        $('.list-item-'+json.listId+'.field-'+json.field).removeClass('action-disabled').addClass('action-enabled');
                        $('.list-item-'+json.listId+'.field-'+json.field+' > i').attr('class','icon-check');
                    }                        
                    else
                    {
                        $('.list-item-'+json.listId+'.field-'+json.field).removeClass('action-enabled').addClass('action-disabled');
                        $('.list-item-'+json.listId+'.field-'+json.field+' > i').attr('class','icon-remove');
                    }
                    $('.list-item-'+json.listId+'.field-'+json.field).attr('href',json.href);
                    $('.list-item-'+json.listId+'.field-'+json.field).removeClass('disabled');                                               
                },
                error: function(error)
                {                                      
                    $('.list-item-'+json.listId+'.field-'+json.field).removeClass('disabled');
                }
            });
        }
        return false;
    });
    $(document).on('click','.delete_url',function(){
        var delLink = $(this);
        if(!$('#module_form').hasClass('disabled'))
        {
            $('#module_form').addClass('disabled');
            $.ajax({
                url: $(this).attr('href')+'&ajax=1',
                data: {},
                type: 'post',
                dataType: 'json',                
                success: function(json){
                    showSaveMessage(json.message,json.messageType);   
                    if(json.messageType!='error')
                    {
                        delLink.parents('.uploaded_img_wrapper').eq(0).prev('.uploaded_image_label').eq(0).remove();
                        delLink.parents('.uploaded_img_wrapper').eq(0).remove();
                    }                 
                    $('#module_form').removeClass('disabled');
                },
                error: function(error)
                {
                    showSaveMessage(error,'error');
                    $('#module_form').removeClass('disabled');
                }
            });
        }
        return false;
    });
    var clickedObj = $('#module_form button[type="submit"]');    
    //Process Save
    clickedObj.click(function(){
        if($(this).hasClass('submitExportBlog')|| $(this).hasClass('submitImportBlog'))
            return true;
        if(!$('#module_form').hasClass('disabled'))
        {
            if(typeof tinymce !== 'undefined' && tinymce.editors.length > 0)
            {                
                tinyMCE.triggerSave();
            }   
            if($('input.tagify').length > 0)
            {
                $('input.tagify').each(function(){
                    $(this).val($(this).tagify('serialize'));
                });
            }
            $('#module_form').addClass('disabled');
            var formData = new FormData(document.querySelector('#module_form'));
            $.ajax({
                url: $('#module_form').attr('action')+'&ajax=1',
                data: formData,
                type: 'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(json){
                    showSaveMessage(json.message,json.messageType);
                    if(json.postUrl)
                    {
                        $('#module_form').attr('action',json.postUrl);
                        history.pushState(null, null, json.postUrl);
                    }
                    if(json.images)
                    {
                       $.each(json.images,function(i,item){
                            if($('input[name="'+item.name+'"]').length > 0)
                            {
                                updatePreviewImage(item.name,item.url,item.delete_url);
                            }
                       });
                    }
                    if(json.itemId && json.itemKey)
                    {
                        if($('input[name="'+json.itemKey+'"]').length > 0)
                            $('input[name="'+json.itemKey+'"]').val(json.itemId);
                        else
                        {
                            $('#module_form').append('<input name="'+json.itemKey+'" value="'+json.itemId+'" type="hidden"/>')
                        }
                    }
                    $('#module_form').removeClass('disabled');
                },
                error: function(error)
                {
                    showSaveMessage(error,'error');
                    $('#module_form').removeClass('disabled');
                }
            });
        }
        return false;
    });
    $('input[type="file"]').change(function(){
        if($(this).attr('name')=='blogdata')
            var fileExtension =['zip'];
        else
            var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            $(this).val('');
            if($(this).next('.dummyfile').length > 0)
            {
                $(this).next('.dummyfile').eq(0).find('input[type="text"]').val('');
            }
            if($(this).parents('.col-lg-9').eq(0).find('.preview_img').length > 0)
                $(this).parents('.col-lg-9').eq(0).find('.preview_img').eq(0).remove(); 
            if($(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').length > 0)
            {
                $(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').removeClass('hidden');
                $(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.uploaded_img_wrapper').removeClass('hidden');
            }            
            alert(ybc_blog_free_invalid_file);
        }
        else
        {
            readURL(this);            
        }       
    });
});
$(document).on('click','.del_preview',function(){
    if($(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').length > 0)
    {
        $(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').removeClass('hidden');
        $(this).parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.uploaded_img_wrapper').removeClass('hidden');
    }
    $(this).parents('.col-lg-9').eq(0).find('.dummyfile input[type="text"]').val('');
    if($(this).parents('.col-lg-9').eq(0).find('input[type="file"]').length > 0)
    {
        $(this).parents('.col-lg-9').eq(0).find('input[type="file"]').eq(0).val('');
    }
      
    $(this).parents('.preview_img').remove();
});
$(document).on('click','.ybc-blog-add-new',function(){
    clearFieldVal();
    $('#module_form').attr('action',$(this).attr('href'));
    history.pushState(null, null, $(this).attr('href'));
    if($('input[name="post_key"]').length > 0 && $('input[name="post_key"]').val() && $('input[name="'+$('input[name="post_key"]').val()+'"]').length > 0)
    {
        $('input[name="'+$('input[name="post_key"]').val()+'"]').val('');
    }
    return false;
});
function clearFieldVal()
{
    $('#module_form input[type="text"],#module_form input[type="file"], #module_form textarea, .rte autoload_rte').val('');
    $('#short_description_1').val('');
    if(typeof tinymce !== 'undefined' && tinymce.editors.length > 0)
    {
        for (var i=length; i>0; i--) {
            tinyMCE.editors[i-1].setContent('');            
        };
        tinyMCE.triggerSave();
    }    
    $('#module_form #divAccessories').html('');
    $('#ajax_choose_product input').val('');
    $('#module_form .tagify-container > span, .uploaded_image_label, .uploaded_img_wrapper,.preview_img').remove();
    $('#module_form input[type="checkbox"]').attr('checked', false);
    $('input[name="sort_order"]').val('1');
    $('input[name="click_number"],input[name="likes"]').val('0');
    
}
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            if($(input).parents('.col-lg-9').eq(0).find('.preview_img').length <= 0)
            {
                $(input).parents('.col-lg-9').eq(0).append('<div class="preview_img"><img src="'+e.target.result+'"/> <i style="font-size: 20px;" class="process-icon-delete del_preview"></i></div>');
            }
            else
            {
                $(input).parents('.col-lg-9').eq(0).find('.preview_img img').eq(0).attr('src',e.target.result);
            }
            if($(input).parents('.col-lg-9').eq(0).next('.uploaded_image_label').length > 0)
            {
                $(input).parents('.col-lg-9').eq(0).next('.uploaded_image_label').addClass('hidden'); 
                $(input).parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.uploaded_img_wrapper').addClass('hidden');
            }
                                      
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function updatePreviewImage(name,url,delete_url)
{
    if($('input[name="'+name+'"]').length > 0 && $('input[name="'+name+'"]').parents('.col-lg-9').length > 0)
    {
        if($('input[name="'+name+'"]').parents('.col-lg-9').eq(0).find('.preview_img').length > 0)
           $('input[name="'+name+'"]').parents('.col-lg-9').eq(0).find('.preview_img').eq(0).remove(); 
        if($('input[name="'+name+'"]').parents('.col-lg-9').eq(0).next('.uploaded_image_label').length<=0)
        {
            $('input[name="'+name+'"]').parents('.col-lg-9').eq(0).after('<label class="control-label col-lg-3 uploaded_image_label" style="font-style: italic;">Uploaded image: </label><div class="col-lg-9 uploaded_img_wrapper"><a class="ybc_fancy" href="'+url+'"><img title="Click to see full size image" style="display: inline-block; max-width: 200px;" src="'+url+'"></a>'+(delete_url ? '<a class="delete_url" style="display: inline-block; text-decoration: none!important;" href="'+delete_url+'"><span style="color: #666"><i style="font-size: 20px;" class="process-icon-delete"></i></span></a>' : '')+'</div>');
        }
        else
        {            
            var imageWrapper = $('input[name="'+name+'"]').parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.col-lg-9');
            imageWrapper.find('a.ybc_fancy').eq(0).attr('href',url);
            imageWrapper.find('a.ybc_fancy img').eq(0).attr('src',url);
            if(imageWrapper.find('a.delete_url').length > 0)
                imageWrapper.find('a.delete_url').eq(0).attr('href',delete_url);
            $('input[name="'+name+'"]').parents('.col-lg-9').eq(0).next('.uploaded_image_label').removeClass('hidden');
            $('input[name="'+name+'"]').parents('.col-lg-9').eq(0).next('.uploaded_image_label').next('.uploaded_img_wrapper').removeClass('hidden');            
        }
        $('input[name="'+name+'"]').val('');        
    }
}
function showSaveMessage(message, type)
{
    if($('.ybc_blog_free_alert').length <= 0)
    {
        $('.form-wrapper').append('<div class="ybc_blog_free_alert hidden"></div>');
    }
    $('.ybc_blog_free_alert').addClass('hidden').removeClass('error').removeClass('success').addClass(type=='error' ? 'error' : 'success').html(message).removeClass('hidden');
    
    if(type!='error')
    {        
        setTimeout(function(){
            $('.ybc_blog_free_alert').addClass('hidden');
        },10000);
    }    
}
function ybcGetAccessoriesIds()
{
    if ($('#inputAccessories').val() === undefined)
			return '';
		return $('#inputAccessories').val().replace(/\-/g,',');
}
var ybcAddAccessory = function(event, data, formatted)
{
	if (data == null)
		return false;
	var productId = data[1];
	var productName = data[0];

	var $divAccessories = $('#divAccessories');
	var $inputAccessories = $('#inputAccessories');
	var $nameAccessories = $('#nameAccessories');

	/* delete product from select + add product line to the div, input_name, input_ids elements */
	$divAccessories.html($divAccessories.html() + '<div class="form-control-static"><button type="button" onclick="ybcDelAccessory('+productId+');" class="btn btn-default" name="' + productId + '"><i class="icon-remove text-danger"></i></button>&nbsp;'+ productName +'</div>');
	$nameAccessories.val($nameAccessories.val() + productName + '¤');
	$inputAccessories.val($inputAccessories.val() + productId + '-');
	$('#product_autocomplete_input').val('');
	$('#product_autocomplete_input').setOptions({
		extraParams: {excludeIds : ybcGetAccessoriesIds()}
	});
};

function ybcDelAccessory(id)
{
	var div = getE('divAccessories');
	var input = getE('inputAccessories');
	var name = getE('nameAccessories');

	// Cut hidden fields in array
	var inputCut = input.value.split('-');
	var nameCut = name.value.split('¤');

	if (inputCut.length != nameCut.length)
		return jAlert('Bad size');

	// Reset all hidden fields
	input.value = '';
	name.value = '';
	div.innerHTML = '';
	for (i in inputCut)
	{
		// If empty, error, next
		if (!inputCut[i] || !nameCut[i])
			continue ;

		// Add to hidden fields no selected products OR add to select field selected product
		if (inputCut[i] != id)
		{
			input.value += inputCut[i] + '-';
			name.value += nameCut[i] + '¤';
			div.innerHTML += '<div class="form-control-static"><button type="button"  onclick="ybcDelAccessory('+inputCut[i]+');"  class="btn btn-default" name="' + inputCut[i] +'"><i class="icon-remove text-danger"></i></button>&nbsp;' + nameCut[i] + '</div>';
		}
		else
			$('#selectAccessories').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
	}

	$('#product_autocomplete_input').setOptions({
		extraParams: {excludeIds : ybcGetAccessoriesIds()}
	});
};