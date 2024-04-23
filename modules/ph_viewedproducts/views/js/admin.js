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
 *  @author ETS-Soft <contact@etssoft.net>
 *  @copyright  2007-2022 ETS-Soft
 *  @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

$(document).ready(function () {
    var checkedLength = $('input[name="PH_VP_HOOK_DISPLAYED[]"]:checked').length;
    var checkedAll = $('input[name="PH_VP_HOOK_DISPLAYED[]"]').length;
    $('#PH_VP_HOOK_DISPLAYED_ALL').click(function () {
        if($(this).is(':checked')){
            $('input[name="PH_VP_HOOK_DISPLAYED[]"]').prop('checked', true);
        }
        else{
            $('input[name="PH_VP_HOOK_DISPLAYED[]"]').prop('checked', false);
        }
    });

    $('input[name="PH_VP_HOOK_DISPLAYED[]"]').change(function () {
        var checkedLength = $('input[name="PH_VP_HOOK_DISPLAYED[]"]:checked').length;
        if(checkedLength == checkedAll ){
            $('#PH_VP_HOOK_DISPLAYED_ALL').prop('checked', true);
        }
        else{
            $('#PH_VP_HOOK_DISPLAYED_ALL').prop('checked', false);
        }
        if ($(this).val() == 5){
            console.log('aaaaaaaa')
            console.log($(this).is(':checked'))
            console.log($(this).closest('.checkbox').find('.checkbox-desc').length)
            if ($(this).is(':checked')) $(this).closest('.checkbox').find('.checkbox-desc').removeClass('hide');
            else  $(this).closest('.checkbox').find('.checkbox-desc').addClass('hide');
        }
    });
    if(checkedLength == checkedAll ){
        $('#PH_VP_HOOK_DISPLAYED_ALL').prop('checked', true);
    }
});