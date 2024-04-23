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
    countChar();
    if ($('.ets_remove_element').length) {
        $('.ets_remove_element').parents().closest('.form-group').remove();
    }
    $('#ETS_ATC_ICON_STYLE_ICON').select2({
        templateResult: function (idioma) {
            var $span = $("<span class='ets_select2_option'>"+ icons[idioma.id] + "<p> " + idioma.text+"</p>" +"</span>");
            return $span;
        },
        templateSelection: function (idioma) {
            var $span = $("<span class='ets_select2_option'>"+ icons[idioma.id] + "<p> " + idioma.text+"</p>" +"</span>");
            return $span;
        },
        minimumResultsForSearch: 20,
    });
    $('#ETS_ATC_BUTTON_ICON').select2({
        templateResult: function (idioma) {
            var icon=$(idioma.element).data('icon');
            var svg = (icon === 'none') ? '':icons[icon];
            var text = (icon === 'none') ? idioma.text:'';
            var $span = $('<span>'+text+'</span>'+svg);
            return $span;
        },
        templateSelection: function (idioma) {
            var icon=$(idioma.element).data('icon');
            var svg = (icon === 'none') ? '':icons[icon];
            var text = (icon === 'none') ? idioma.text:'';
            var $span = $('<span>'+text+'</span>'+svg);
            return $span;
        },
        minimumResultsForSearch: 20,
    });
    $('.ets_atc_reset').parents().closest('.form-group').find('label').css('visibility','hidden');
    initFormElements($('input[name="ETS_ATC_DISPLAY_TYPE"]:checked').val());
    if ($('.atc_browse_icon button').length) {
        let val = $('select[name="ETS_ATC_ICON_STYLE_ICON"]').val();
        $('.atc_browse_icon button').html(icons[val]);
    }
    $(document).on('change','input[name="ETS_ATC_DISPLAY_TYPE"]',function () {
        initFormElements($(this).val(),true);
    });
    $(document).on('change','select[name="ETS_ATC_ICON_STYLE_ICON"]',function () {
        if ($('.atc_browse_icon button').length) {
            $('.atc_browse_icon button').html(icons[$(this).val()]);
        }
    });
    $(document).on('click','.ets-button-type-select',function (e){
            e.stopPropagation();
            if ($('.ets_style_selector').hasClass('hide')) {
                $('.ets_style_selector').removeClass('hide');
            }else {
                $('.ets_style_selector').addClass('hide');
            }
    });
    $(document).on('click','#content',function (){
        if (!$('.ets_style_selector').hasClass('hide')) {
            $('.ets_style_selector').addClass('hide');
        }
    });
    $(document).on('click','.ets-item',function (e) {
        e.stopPropagation();
        let $this = $(this);

        $('input[name="ETS_ATC_BUTTON_LABEL"]').val($this.data('value'));
        $('.ets-button-type-select span').html($this.data('label'));

        $('.ets_style_selector').addClass('hide');
    });
    $(".ets_lable_input input.atc-button").on('change keyup paste', function () {
        countChar();
    });
    $(document).on('click','.ets_atc_alert.success .close',function () {
        $('.ets_atc_alert').addClass('hidden');
    });
    $(document).on('click','.ets_atc_reset',function (e) {
        e.preventDefault();
        $.ajax({
            url: baseAdminUrl,
            dataType: 'json',
            type: 'post',
            data: {
                reset_config: 1,
                config_type:$('input[name="ETS_ATC_DISPLAY_TYPE"]:checked').val(),
            },
            success: function (json) {
                $('.ets_reset').removeClass('active');
                if (json.success) {
                    initAlertSuccess(json.success);
                    setTimeout(function () {
                        $(location).attr('href', baseAdminUrl);
                    }, 3000);
                }
            },
            error: function (xhr, status, error) {
                $('.ets_reset').removeClass('active');
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    });
});
function initAlertSuccess(msg){
    if ($('.ets_atc_alert').length <=0) {
        $('.form-wrapper').prepend('<div class="ets_atc_alert success">' +
            '        <div class="bootstrap">\n' +
            '            <div class="module_confirmation conf confirm alert alert-success">\n' +
            '                <button type="button" class="close" data-dismiss="alert">×</button>\n' +
            '                <p class="ets_atc_message"></p>\n' +
            '            </div>\n' +
            '        </div>' +
            '</div>');
    }
    $('.ets_atc_alert .ets_atc_message').html(msg);
    $('#content .ets_success_message_alert').fadeIn().delay(5000).fadeOut();
}
function initFormElements(value,toggle = false) {
    var iconFields = $('.atc-icon').parents('.form-group');
    var buttonFields = $('.atc-button').parents('.form-group');
    if (value == 1) {
            buttonFields.each(function () {
                $(this).hide();
            });
            if (toggle) {
                iconFields.each(function () {
                    $(this).show();
                });
            }
    }else {
            iconFields.each(function () {
                $(this).hide();
            });
        if (toggle) {
            buttonFields.each(function () {
                $(this).show();
            });
        }
    }
}
function countChar() {
    var chars = $('.ets_lable_input input.atc-button').val().length;
    var remaining = 20 -chars;
    if (remaining >= 0) {
        $('.ets_lable_input input.atc-button').removeClass('error');
        $('.ets_act_label').next('.help-block').hide();
        $('#charCount').html(remaining+'/20');
    }else  {
        $('.ets_lable_input input.atc-button').addClass('error');
        $('.ets_act_label').next('.help-block').addClass('error').addClass('row');
        $('.ets_act_label').next('.help-block').show();
    }

}