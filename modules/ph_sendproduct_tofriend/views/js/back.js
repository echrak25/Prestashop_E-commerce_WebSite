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
$(document).ready(function () {
    initRange();
    if(ETS_PH_ADMIN_CONTROLLER == 'AdminEtsSPSendProductDetail' && $('#form-ph_sendproduct_tofriend').length){
        $('#form-ph_sendproduct_tofriend').find('.panel-heading').append('<a id="sptf-btn-back" href="'+ETS_PH_LINK+'" class="btn btn-default pull-right js-ets_sptf-back">'+btnBackTitle+'</a>');
    }
    $(document).on('click','#reset_config',function (){
        if (!$(this).hasClass('active')) {
            $('#reset_config i').hide();
            $(this).prepend(`<img src="${baseImageUrl}\loader.gif"/>`);
            $(this).addClass('active');
            $.ajax({
                url: ETS_PH_LINK,
                dataType: 'json',
                type: 'post',
                data: {
                    reset_config: 1,
                },
                success: function (json) {
                    if (json.success) {
                        initAlertSuccess(json.success);
                        setTimeout(function () {
                            $(location).attr('href', ETS_PH_LINK);
                        }, 3000);
                    }
                    $('#reset_config img').hide();
                    $('#reset_config').removeClass('active');
                    $('#reset_config i').show();
                },
                error: function (xhr, status, error) {
                    $('#reset_config').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    $(document).on('change','input[type="range"]',function(){
        var formData = new FormData($('button[name="btnSubmitImageOptimize"]').parents('form').get(0));
        formData.append('changeSubmitImageOptimize', '1');
        stop_optimized = false;
        continue_optimize = false;
    });
    $('input[type="range"]').mousemove(function(){
        ets_sp_change_range($(this));
    });
});
function initAlertSuccess(msg){
    if ($('#content .ets_success_message_alert').length <=0) {
        $('#content').prepend('<div class="alert alert-success ets_success_message_alert" style="display: none;"></div>');
    }
    $('#content .ets_success_message_alert').html(msg);
    $('#content .ets_success_message_alert').fadeIn().delay(5000).fadeOut();
}
function ets_sp_change_range($range)
{
    if($range.val()<=1)
        $range.next('.range_new').next('.input-group-unit').html($range.val()+ ($range.attr('data-unit')!='px' ? ' ':'')+$range.attr('data-unit'));
    else
    {
        $range.next('.range_new').next('.input-group-unit').html($range.val()+ ($range.attr('data-units')!='px' ? ' ':'')+$range.attr('data-units'));
    }
    var newPoint = ($range.val() - $range.attr("min")) / ($range.attr("max") - $range.attr("min"));
    var offset = -1;
    var  width = $range.width();
    var newPlace;
    if (newPoint < 0) { newPlace = 0; }
    else if (newPoint > 1) { newPlace = width; }
    else { newPlace = width * newPoint + offset; offset -= newPoint; }
    $range.next('.range_new').find('.range_new_run').css({
        width: newPlace+'px'
    });
}
function initRange() {

    let range = $('input[type="range"]');
    let currentPoint = (range.val() - range.attr("min")) / (range.attr("max") - range.attr("min"));
    var  width = range.width();
    let pos;
    if (currentPoint < 0) {pos = 0;}
    else if (currentPoint > 1) {pos = width;}
    else {
        pos = currentPoint * width - 1;
    }
    range.next('.range_new').find('.range_new_run').css({
        width: pos+'px'
    });
}