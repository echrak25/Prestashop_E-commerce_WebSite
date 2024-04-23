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
    $('#product_autocomplete_input').autocomplete(ybc_featuredcat_ajax_url,{
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
			excludeIds : ybcGetAccessoriesIds(),
            token: mailchimp_admin_token,
		}
	});
});

function getFeaturedCatsOrders()
{
    var orderStr = 'reorder=yes';
    if($('.ybc_featuredcats_backend .ybc_fc_item').length > 0)
    {        
        var ik = 0;
        $('.ybc_featuredcats_backend .ybc_fc_item').each(function(){
            ik++;
            orderStr += '&sortcat['+$(this).attr('rel')+']='+ik;
        });
    }
    return orderStr;
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
    $divAccessories.html($divAccessories.html() + productName + ' <span onclick="ybcDelAccessory('+productId+')"; style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span><br />');
	$nameAccessories.val($nameAccessories.val() + productName + '¤');
	$inputAccessories.val($inputAccessories.val() + productId + '-');
	$('#product_autocomplete_input').val('');
	$('#product_autocomplete_input').setOptions({
		extraParams: {excludeIds : ybcGetAccessoriesIds(),token: mailchimp_admin_token}
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
        nameCut = name.value.split('*');
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
            div.innerHTML += nameCut[i] + ' <span onclick="ybcDelAccessory('+inputCut[i]+');" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span><br />';
        }
		else
			$('#selectAccessories').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
	}

	$('#product_autocomplete_input').setOptions({
		extraParams: {excludeIds : ybcGetAccessoriesIds(),token: mailchimp_admin_token}
	});
};

