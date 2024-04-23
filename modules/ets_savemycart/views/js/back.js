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
    $(document).on('click', '#ets_sc_reset', function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active');
            $.ajax({
                url: baseAdminUrl,
                type: 'post',
                dataType: 'json',
                data: {
                    'reset_config': 1,
                },
                success: function (json) {
                    $('#ets_sc_reset').removeClass('active');
                    if (json.success) {
                        initAlertSuccess(json.success);
                        setTimeout(function () {
                            $(location).attr('href', baseAdminUrl);
                        }, 3000);
                    }
                },
                error: function (xhr, status, error) {
                    $('#ets_sc_reset').removeClass('active');
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
    })
})
function initAlertSuccess(msg){
    if ($('#content .ets_success_message_alert').length <=0) {
        $('#content').append('<div class="alert alert-success ets_success_message_alert" style="display: none;"></div>');
    }
    $('#content .ets_success_message_alert').html(msg);
    $('#content .ets_success_message_alert').fadeIn().delay(5000).fadeOut();
}