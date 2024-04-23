/**
 * 2007-2023 ETS-Soft
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
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2023 ETS-Soft
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */
$(document).ready(function () {
    initContent();
    initTouchSpinInput();
    $(document).on('click', '.ets_reset', function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active');
            $.ajax({
                url: baseAdminUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    reset_config: 1,
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
        }
        return false;
    });
    $('input[type="radio"][name="ETS_BUTTON_POSITION"]').change(function () {
        let pRight = $('input[name="ETS_FLOATING_BY_RIGHT"]').closest('.form-group');
        let pLeft = $('input[name="ETS_FLOATING_BY_LEFT"]').closest('.form-group');
        if (this.value == '0') {
            pLeft.slideUp();
            pRight.slideDown();
            pRight.show();
            pLeft.hide();
        } else if (this.value == '1') {

            pRight.slideUp();
            pLeft.slideDown();
            pLeft.show();
            pRight.hide();
        }
    });
    $('select[name="ETS_BUTTON_ICON_SELECT"]').change(function () {
        let pIcon = $('input[name="ETS_BUTTON_ICON"]').closest('.form-group');
        let pCustom = $('input[name="ETS_CUSTOM_ICON"]').closest('.form-group').parent('div').parent('.form-group');
        if (this.value == 'custom') {
            pIcon.slideUp();
            pCustom.slideDown();
            pCustom.show();
            pIcon.hide();
        } else {
            pCustom.slideUp();
            pIcon.slideDown();
            pIcon.show();
            pCustom.hide();
        }
    });
    $(document).on('click', 'button[name="submitAddBrowseIcon"]', function () {
        if ($('.scroll_forms.scroll_popup_overlay').length > 0 && $('.scroll_forms.scroll_popup_overlay').hasClass('hidden') && $('.scroll_icon_form_new').length > 0) {
            $('.scroll_forms.scroll_popup_overlay').removeClass('hidden');
            $('.scroll_icon_form_new').removeClass('hidden')
        }
    });
    $(document).on('click', '.scroll_modal_close', function () {
        if ($('.scroll_forms.scroll_popup_overlay').length > 0 && !$('.scroll_forms.scroll_popup_overlay').hasClass('hidden') && $('.scroll_icon_form_new').length > 0) {
            $('.scroll_forms.scroll_popup_overlay').addClass('hidden');
            $('.scroll_icon_form_new').addClass('hidden')
        }
    });
    $(document).on('click', '#awesome-icon .ets_scroll_icon', function () {
        if ($('.dummyfile > input.ets_browse_icon').length > 0) {
            $('.dummyfile > input.ets_browse_icon').val($(this).data('icon'));
            $('.scroll_modal_close').click();
            $('.dummyfile > input.ets_browse_icon').focus();
        }
    });
    $(document).on('change', 'input[type="file"]', function () {
        let fileExtension = ['jpeg', 'jpg', 'png','svg','gif'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            $(this).val('');
            if ($(this).next('.dummyfile').length > 0) {
                $(this).next('.dummyfile').eq(0).find('input[type="text"]').val('');
            }
            if ($(this).parents('.col-lg-5').eq(0).find('.preview_img').length > 0){
                $(this).parents('.col-lg-5').eq(0).find('.preview_img').eq(0).remove();
            }
            if ($(this).parents('.col-lg-5').eq(0).next('.uploaded_img_wrapper').length > 0) {
                $(this).parents('.col-lg-5').eq(0).next('.uploaded_img_wrapper').removeClass('hidden');
                $('.dummyfile input[type="text"]').not('.ets_browse_icon').val(imageName);
            }
            alert('Invalid input file type!');
        }
        else {
            readImageUrl(this);
        }
    });
    $(document).on('click', '.del_preview', function () {
        $('input[type="file"]').val('');
        $('.dummyfile input').not('.ets_browse_icon').val('');
        if ($(this).parents('.col-lg-5').eq(0).next('.uploaded_img_wrapper').length > 0) {
            $(this).parents('.col-lg-5').eq(0).next('.uploaded_img_wrapper').removeClass('hidden');
            $('.dummyfile input[type="text"]').not('.ets_browse_icon').val(imageName);
        }
        $(this).parents('.preview_img').remove();
    });
    loadPreviewImage();
    $(document).on('click','.delete_url.delete_uploaded_image',function (e) {
        e.preventDefault();
        var $this=$(this);
        if (imageName && delete_url) {
            $.ajax({
                url: delete_url,
                type: 'post',
                dataType: 'json',
                data: {
                    imageName:imageName,
                },
                success:function (json) {
                    if (json.success){
                        $this.parents('.uploaded_img_wrapper').remove();
                        $('.defaultForm input[type="file"]').val('');
                        $('.dummyfile input[type="text"]').not('.ets_browse_icon').val('');
                    }else {

                    }
                },
                error: function(xhr, status, error)
                {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            })
        }
    });
    $(document).mouseup(function (e)
    {
        let popup = $('.scroll_icon_form_new');
        if ($('.scroll_forms.scroll_popup_overlay').length > 0
            && !$('.scroll_forms.scroll_popup_overlay').hasClass('hidden')
            && $('.scroll_icon_form_new').length > 0
            && !$('.scroll_icon_form_new').is(e.target)
            && !popup.is(e.target)
            && popup.has(e.target).length === 0
        ) {
            $('.scroll_forms.scroll_popup_overlay').addClass('hidden');
            $('.scroll_icon_form_new').addClass('hidden')
        }
    });
})
function initContent(){
    //Float position input
    let radPosVal = $('input[name="ETS_BUTTON_POSITION"]:checked').val();
    let inputFloatLeft = $('input[name="ETS_FLOATING_BY_LEFT"]').closest('.form-group');
    let inputFloatRight = $('input[name="ETS_FLOATING_BY_RIGHT"]').closest('.form-group');
    // Icon input
    let optBtnIconVal = $('select[name="ETS_BUTTON_ICON_SELECT"]').val();
    let btnIcon = $('input[name="ETS_BUTTON_ICON"]').closest('.form-group');
    let btnCustom = $('input[name="ETS_CUSTOM_ICON"]').closest('.form-group').parent('div').parent('.form-group');
    if (radPosVal == '1'){
        inputFloatLeft.show();
        inputFloatRight.hide()
    }else {
        inputFloatRight.show();
        inputFloatLeft.hide()
    }
    if (optBtnIconVal == 'custom'){
        btnIcon.hide();
        btnCustom.show();
    }else {
        btnCustom.hide();
        btnIcon.show();
    }
}
function initAlertSuccess(msg){
    if ($('#content .ets_success_message_alert').length <=0) {
        $('#content').append('<div class="alert alert-success ets_success_message_alert" style="display: none;"></div>');
    }
    $('#content .ets_success_message_alert').html(msg);
    $('#content .ets_success_message_alert').fadeIn().delay(5000).fadeOut();
}
function initTouchSpinInput(){
    $(".input-pixel input[type='number']").TouchSpin({
        verticalbuttons: true,
        min: 0,
        step: 1,
        decimals: 0,
        boostat: 5,
        maxboostedstep: 10,
        postfix: 'px'
    });
}
function readImageUrl(input) {
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e){
            if(($(input).parents('.col-lg-5').eq(0).find('.preview_img').length <=0)){
                $(input).parents('.col-lg-5').eq(0).append('<div class="preview_img"><img src="'+e.target.result+'"/> <i style="font-size: 20px;" class="process-icon-delete del_preview"></i></div>');
            }else {
                $('.preview_img').remove();
                $(input).parents('.col-lg-5').eq(0).append('<div class="preview_img"><img src="'+e.target.result+'"/> <i style="font-size: 20px;" class="process-icon-delete del_preview"></i></div>');
            }
            if($(input).parents('.col-lg-5').eq(0).next('.uploaded_img_wrapper').length > 0)
            {
                $(input).parents('.col-lg-5').eq(0).next('.uploaded_img_wrapper').addClass('hidden');
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function loadPreviewImage(){
    if (imageName && imagePath) {
        if($('.defaultForm input[type="file"]').length > 0 && $('.defaultForm input[type="file"]').parents('.col-lg-5').length > 0 && !$('.defaultForm input[type="file"]').val()){

            if($('.defaultForm input[type="file"]').parents('.col-lg-5').eq(0).find('.preview_img').length > 0)
                $('.defaultForm input[type="file"]').parents('.col-lg-5').eq(0).find('.preview_img').eq(0).remove();
            if($('.defaultForm input[type="file"]').parents('.col-lg-5').eq(0).next('.uploaded_image_label').length<=0)
            {
                $('.defaultForm input[type="file"]').parents('.col-lg-5').eq(0)
                    .after(
                        '<div class="col-lg-9 uploaded_img_wrapper">' +
                        '<label class="control-label col-lg-3 uploaded_image_label" ' +
                        'style="font-style: italic;">Uploaded image: ' +
                        '</label>' +
                        '<a class="ybc_fancy" href="'+imagePath+'" target="_blank">' +
                        '<img title="Click to see full size image" style="display: inline-block;" src="'+imagePath+'">' +
                        '</a>'+(delete_url ? '<a class="delete_url delete_uploaded_image" style="display: inline-block; text-decoration: none!important;">' +
                            '<span style="color: #666"><i style="font-size: 20px;" class="process-icon-delete">' +
                            '</i></span></a>' : '')+'</div>');
            }
            else
            {
                var imageWrapper = $('.defaultForm input[type="file"]').parents('.col-lg-5').eq(0).next('.uploaded_image_label').next('.col-lg-9');
                imageWrapper.find('a.img_fancy').eq(0).attr('href',imagePath);
                imageWrapper.find('a.img_fancy img').eq(0).attr('src',imagePath);
                if(imageWrapper.find('a.delete_url').length > 0)
                    imageWrapper.find('a.delete_url').eq(0).attr('href',delete_url);
                $('.defaultForm input[type="file"]').parents('.col-lg-5').eq(0).next('.uploaded_image_label').removeClass('hidden');
                $('.defaultForm input[type="file"]').parents('.col-lg-5').eq(0).next('.uploaded_image_label').next('.uploaded_img_wrapper').removeClass('hidden');
            }
            $('.dummyfile input[type="text"]').not('.ets_browse_icon').val(imageName);
            $('.defaultForm input[type="file"]').val('');
        }
    }
}