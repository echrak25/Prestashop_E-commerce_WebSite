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
    $(document).on('click','#sptf-open-popup',function () {

        $('.sptf-form-control.sptf-submit').attr('disabled',false);
        initPopupForm(true);
    });
    $(document).on('click','.sptf_modal_close',function (){
        initPopupForm();
    });
    $(document).on('click','.sptf-form-control.sptf-submit',function (event) {
        event.preventDefault();
        if (!$(this).hasClass('load')){
            $(this).addClass('load');
        }
        $(this).attr("disabled", true);
        $.ajax({
           type:"POST",
            url:submitLink,
            dataType: 'json',
            data: {
                'your-name':{'type':'text','val':$('input[name="your-name"]').val(),'required':1},
                'your-email':{'type':'email','val':$('input[name="your-email"]').val(),'required':1},
                'friend-name':{'type':'text','val':$('input[name="friend-name"]').val(),'required':1},
                'friend-email':{'type':'email','val':$('input[name="friend-email"]').val(),'required':1},
                'sptf-message':{'type':'text','val':$('textarea[name="sptf-message"]').val(),'required':0},
                'productId': productId
            },
            success: function (res) {
                if (res.success) {
                    if ($('input').next().length > 0){
                        $('input').next().remove('span');
                    }
                    $('.sptf-submit').removeClass('load');
                    initAlert('Send message successfully. The popup will close in 3 seconds.',true);
                    refreshFields();
                    setTimeout(initPopupForm,5000);
                }else {
                    $('.sptf-form-control.sptf-submit').attr('disabled',false);
                    $('.sptf-submit').removeClass('load');
                    if (res.errors){
                        if ($('input').next().length > 0){
                            $('input').next().remove('span');
                        }
                        for(let [key,val] of Object.entries(res.errors)){

                            $(`<span role="alert" class="sptf-not-valid-tip">${val}</span>`).insertAfter(`input[name=${key}]`);
                        };
                        initAlert('One or more fields have an error. Please check and try again.');
                    }else {
                        initAlert('Send product failed. Please check and try again or contact to admin.');
                    }

                }
            },
            error: function(xhr, status, error)
            {
                $('.sptf-submit').removeClass('load');
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
                $(this).attr("disabled", false);
            }
        });
    });
    $(document).mouseup(function (e)
    {
        let popup = $('.ets-sptf-modal.ets-sptf-form');
        if ($('.ets-sptf-modal-overlay').length > 0
            && !$('.ets-sptf-modal-overlay').hasClass('hidden')
            && $('.ets-sptf-modal.ets-sptf-form').length > 0
            && !$('.ets-sptf-modal.ets-sptf-form').is(e.target)
            && !popup.is(e.target)
            && popup.has(e.target).length === 0
        ) {
            $('.ets-sptf-modal-overlay').addClass('hidden');
            $('.ets-sptf-modal.ets-sptf-form').addClass('hidden')
        }
    });
});
function initAlert(msg,status){
    if ($('.sptf-submit-wrapper .ets_message_alert').length > 0) {
        $('.sptf-submit-wrapper .ets_message_alert').remove();
    }
    if (status){
        $('.sptf-submit-wrapper').append('<div class="alert alert-success ets_message_alert" style="display: none;"></div>');
    }else {
        $('.sptf-submit-wrapper').append('<div class="alert alert-warning ets_message_alert" style="display: none;"></div>');
    }
    $('.sptf-submit-wrapper .ets_message_alert').html(msg);
    $('.sptf-submit-wrapper .ets_message_alert').fadeIn().delay(5000).fadeOut();
}
function initPopupForm(open){
    if (open){
        if ($('.ets-sptf-modal-overlay.ets-sptf-form-container').length > 0
            && $('.ets-sptf-modal-overlay').hasClass('hidden') && $('.ets-sptf-form').length >0){
            $('.ets-sptf-modal-overlay').removeClass('hidden');
            $('.ets-sptf-form').removeClass('hidden');
        }
    }else {
        if ($('.ets-sptf-modal-overlay.ets-sptf-form-container').length > 0
            && !$('.ets-sptf-modal-overlay').hasClass('hidden') && $('.ets-sptf-form').length >0){
            $('.ets-sptf-modal-overlay').addClass('hidden');
            $('.ets-sptf-form').addClass('hidden');
        }
    }
}
function refreshFields() {
    let senderName = $('input[name="your-name"]');
    let senderEmail = $('input[name="your-email"]');
    let receiverName = $('input[name="friend-name"]');
    let receiverEmail = $('input[name="friend-email"]');
    let message = $('textarea[name="sptf-message"]');
    if (senderEmail.data('email') && senderName.data('name')){
        senderName.val(senderName.data('name'));
        senderEmail.val(senderEmail.data('email'));
    }else {
        senderEmail.val('');
        senderName.val('');
    }
    receiverEmail.val('');
    receiverName.val('');
    message.val('');
}