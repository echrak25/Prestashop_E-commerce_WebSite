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

//display a success/error/notice message
function showSuccessMessage(msg) {
    $.growl.notice({title: "", message: msg});
}

function showErrorMessage(msg) {
    $.growl.error({title: "", message: msg});
}

var ets_sc_fn = {
    saveCart: function () {
        if ($('#ets_sc_cart_save.active').length > 0 && ETS_SC_LINK_SHOPPING_CART) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: ETS_SC_LINK_SHOPPING_CART,
                data: 'init',
                success: function (json) {
                    $('#ets_sc_cart_save.active').removeClass('active');
                    if (json) {
                        if ($('body .ets_sc_shopping_cart_overload').length <= 0) {
                            $('body').prepend('<div class="ets_sc_shopping_cart_overload ets_sc_overload"><div class="ets_sc_wrapper"></div></div>');
                        }
                        if (json.html)
                            $('body .ets_sc_shopping_cart_overload').addClass('active').find('.ets_sc_wrapper').html(json.html);
                        if (json.isLogged){
                            $('.ets_sc_form_save_cart').fadeIn();
                            $('.ets_sc_form_login').fadeOut();
                        }else {
                            $('.ets_sc_form_login').fadeIn();
                            $('.ets_sc_form_save_cart').fadeOut();
                        }
                    }
                },
                error: function () {
                    console.log('failed');
                    $('#ets_sc_cart_save.active').removeClass('active');
                }
            });
        }
    },
    exitPopupSaveCart: function (notReDisplay) {
        var notReDisplay = notReDisplay || true;
        $('.ets_sc_shopping_cart_overload.active,.ets_sc_overload2.active').removeClass('active');
        if (notReDisplay && ETS_SC_LINK_SHOPPING_CART) {
            $('#save_cart_form .bootstrap').remove();
            $.ajax({
                type: 'post',
                url: ETS_SC_LINK_SHOPPING_CART,
                dataType: 'json',
                data: 'ajax=1&offCart',
                success: function () {

                },
                error: function () {

                }
            });
        }
    },
    exitPopupCart: function () {
        $('.ets_sc_display_shopping_cart_overload.active').removeClass('active');
    },
    openSharePopup:function ($this,context) {
        if ($('.ets_sc_overload2').length > 0) {
            $('.ets_sc_overload2, .ets_sc_sendmail_form').addClass('active');
            $('.ets_sc_sendmail_result.active').removeClass('active');
        } else {
            var btn = $this;
            if (!btn.hasClass('active')) {
                btn.addClass('active');
                $.ajax({
                    url: ETS_SC_LINK_SHOPPING_CART,
                    data: context ? `&shopping_cart_form=1&id_cart=${btn.data('idCart')}` :'&shopping_cart_form=1',
                    type: 'POST',
                    dataType: 'json',
                    success: function (json) {
                        btn.removeClass('active');
                        if (json) {
                            if (json.errors) {
                                showErrorMessage(json.errors);
                            } else {
                                if (json.form_html) {
                                    context ? $('.shopping-cart-list.ets_aban_listsavecart table').after(json.form_html):btn.after(json.form_html);
                                    $('.ets_sc_overload2, .ets_sc_sendmail_form').addClass('active');
                                    $('.ets_sc_sendmail_result.active').removeClass('active');
                                }
                            }
                        }
                    }
                });
            }
        }
    },
};

$(document).ready(function () {
    if ($('#module-ets_savemycart-submit .alert.alert-danger').length){
        $('#content.page-content.card').hide();
    }
    $(document).on('click', '#ets_sc_btn_share', function (e) {
        ets_sc_fn.openSharePopup($(this));
    });
    $(document).on('click','#submit_share_card',function (e) {
        ets_sc_fn.openSharePopup($(this),'customerPage');
    });
    var xhr;
    $(document).ajaxComplete(function (event, xhr, settings) {
        var form_shopping_cart = $('#ets_shoppingcart_email_form');
        if (xhr)
            xhr.abort();
        if (ETS_SC_LINK_SHOPPING_CART && settings.url && $('body[id=cart]').length > 0 && form_shopping_cart.length > 0) {
            if (/(\?|\&)update=(.+)(\?|\&)op=down\&?/.test(settings.url) || /(\?|\&)delete=(.+)(\?|\&)id_product=\d+\&?/.test(settings.url)) {
                xhr = $.ajax({
                    url: ETS_SC_LINK_SHOPPING_CART,
                    type: 'post',
                    data: 'check_cart=1',
                    dataType: 'json',
                    success: function (json) {
                        if (json) {
                            if (json.product_count <= 0) {
                                $('#ets_sc_cart_save, .ets_shoppingcart_email').hide();
                            }
                        }
                    }
                });
            }
        }
    });
    $(document).on('click', 'button[name=submitSend]', function (e) {
        e.preventDefault();

        var btn = $(this);
        if (!btn.hasClass('active')) {
            btn.addClass('active');
            var form = btn.parents('form');
            if (form.attr('action') !== '') {
                var formData = new FormData(btn.parents('form').get(0));
                formData.append('ajax', 1);
                formData.append('submitSend', 1);
                $('.ets-sp-panel-msg .alert-danger, .ets-sp-panel-msg .alert-success, .ets-sp-panel-msg .alert-success').remove();
                $.ajax({
                    url: form.attr('action'),
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (json) {
                        btn.removeClass('active');
                        if (json) {
                            if (json.errors) {
                                $('.ets-sp-panel-msg').append('<p class="alert alert-danger">' + json.errors + '</p>');
                            } else {
                                if (json.ok) {
                                    showSuccessMessage(json.msg);
                                    $('.ets_sc_sendmail_form.active').removeClass('active');
                                    $('.ets_sc_overload:not(.active), .ets_sc_sendmail_result:not(.active)').addClass('active');
                                    $('#ets_shoppingcart_email_form #name').val('');
                                    $('#ets_shoppingcart_email_form #email').val('');
                                }
                            }
                        }
                    },
                    error: function () {
                        btn.removeClass('active');
                    }
                });
            }
        }
    });
    $(document).on('click', '#ets_sc_cart_save', function (ev) {
        ev.preventDefault();
        if (!$(this).hasClass('active')) {
            $(this).addClass('active');
            ets_sc_fn.saveCart();
        }
    });
    $(document).on('click', '.ets_sc_shopping_cart_overload .ets_sc_close,.ets_sc_overload2 .ets_sc_close', function (ev) {
        ev.preventDefault();
        ets_sc_fn.exitPopupSaveCart();
    });
    $(document).on('click', '.ets_sc_form_login button[id=submit_login]', function (ev) {
        ev.preventDefault();
        var btn = $(this), form = $('#login_form');
        if (!btn.hasClass('active') && form.attr('action')) {
            btn.addClass('active');
            var formData = new FormData(form.get(0));
            formData.append('ajax', 1);
            $('#save_cart_form .bootstrap').remove();
            $.ajax({
                type: 'post',
                url: form.attr('action'),
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function (json) {
                    console.log('json: ', json)
                    btn.removeClass('active');
                    if (json) {
                        if (json.errors) {
                            $('.ets_sc_shopping_cart .js-ets_sc_panel_msg').html(json.errors);
                        } else if (json.isLogged) {
                            if ($('body .ets_sc_shopping_cart_overload').length <= 0) {
                                $('body').prepend('<div class="ets_sc_shopping_cart_overload ets_sc_overload"><div class="ets_sc_wrapper"></div></div>');
                            }
                            if (json.html)
                                $('body .ets_sc_shopping_cart_overload').addClass('active').find('.ets_sc_wrapper').html(json.html);
                            $('.ets_sc_form_save_cart').fadeIn();
                            $('.ets_sc_form_login').fadeOut();
                        }
                    }
                },
                error: function () {
                    btn.removeClass('active');
                }
            });
        }
    });

    $(document).on('click', '.ets_sc_shopping_cart_overload button[id=submit_cart]', function (ev) {
        ev.preventDefault();
        var btn = $(this), form = $('#save_cart_form');
        if (!btn.hasClass('active') && form.attr('action')) {
            btn.addClass('active');
            var formData = new FormData(form.get(0));
            formData.append('ajax', 1);
            $('#save_cart_form .bootstrap').remove();
            $.ajax({
                type: 'post',
                url: form.attr('action'),
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function (json) {
                    btn.removeClass('active');
                    if (json) {
                        if (json.not_logged && parseInt($('#id_customer').val()) <= 0) {
                            $('.ets_sc_form_login').fadeIn();
                            $('.ets_sc_form_save_cart').fadeOut();
                        } else if (json.errors) {
                            form.prepend(json.errors);
                        } else {
                            if (json.msg)
                                showSuccessMessage(json.msg);
                            $('#ets_sc_cart_save').remove();
                            $('#sc_modal_msg').hide();
                            scInitAlert('Cart saved successfully. The popup will close in 5 seconds.',true);
                            $('#cart_name').attr('disabled',true);
                            $('#submit_cart').attr('disabled',true);
                            setTimeout(function () {
                                ets_sc_fn.exitPopupSaveCart(false);
                                location.reload();
                            },5000);
                        }
                    }
                },
                error: function () {
                    btn.removeClass('active');
                }
            });
        }
    });
    $(document).on('click', '.ets_sc_delete_cart, .ets_sc_delete', function (ev) {
        var btn = $(this);
        if (!confirm(btn.data('confirm'))) {
            ev.preventDefault();
        }
    });
    $(document).on('click', '.ets_sc_load_this_cart', function (ev) {
        ev.preventDefault();
        var btn = $(this);
        if (!btn.hasClass('active') && btn.attr('href') !== '') {
            btn.addClass('active');
            $.ajax({
                type: 'POST',
                url: btn.attr('href'),
                dataType: 'json',
                data: 'ajax=1',
                success: function (json) {
                    btn.removeClass('active');
                    if (json) {
                        if (json.errors)
                            $('body .ets_sc_display_shopping_cart_overload').prepend(json.errors);
                        else
                            window.location.href = json.link_checkout;
                    }
                },
                error: function () {
                    btn.removeClass('active');
                }
            });
        }
    });
    $(document).on('click', '.ets_sc_display_shopping_cart_overload .ets_sc_close, .ets_sc_display_shopping_cart_overload .ets_sc_cancel', function (ev) {
        ev.preventDefault();
        ets_sc_fn.exitPopupCart();
    });
    $(document).on('click', '.ets_sc_view_shopping_cart', function (ev) {
        ev.preventDefault();
        var btn = $(this);
        if (!btn.hasClass('active') && btn.attr('href') !== '') {
            btn.addClass('active');
            $.ajax({
                type: 'POST',
                url: btn.attr('href'),
                dataType: 'json',
                data: 'ajax=1',
                success: function (json) {
                    btn.removeClass('active');
                    if (json) {
                        if ($('body .ets_sc_display_shopping_cart_overload').length <= 0) {
                            $('body').prepend('<div class="ets_sc_display_shopping_cart_overload ets_sc_popup ets_sc_overload"><div class="ets_table"><div class="ets_tablecell"><div class="ets_sc_container"><div class="ets_sc_close" title="' + ets_sc_close_title + '"></div><div class="ets_sc_wrapper"></div></div></div></div></div>');
                        }
                        $('body .ets_sc_display_shopping_cart_overload').addClass('active').find('.ets_sc_wrapper').html(json.html);
                    }
                },
                error: function () {
                    btn.removeClass('active');
                }
            });
        }
    });
    $(document).on('click', '.ets_sc_close', function (e) {
        e.preventDefault();
        $('.ets_sc_overload.active').removeClass('active');
    });
});

function scInitAlert(msg,status){
    if ($('.ets_sc_alert_wrapper .ets_message_alert').length > 0) {
        $('.ets_sc_alert_wrapper .ets_message_alert').remove();
        console.log('1');
    }
    if (status){
        $('.ets_sc_alert_wrapper').append('<div class="alert alert-success ets_message_alert" style="display: none;"></div>');
        $('.ets_sc_alert_wrapper .ets_message_alert').html(`<p>${msg} <a href="${customerCartLink}">View saved cart?</a></p>`);
        console.log('2');
    }else {
        $('.ets_sc_alert_wrapper').append('<div class="alert alert-warning ets_message_alert" style="display: none;"></div>');
        $('.ets_sc_alert_wrapper .ets_message_alert').html(msg);
        console.log('3');
    }
    $('.ets_sc_alert_wrapper .ets_message_alert').fadeIn().delay(5000).fadeOut();
}