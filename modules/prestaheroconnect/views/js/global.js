/*
* 2007-2024 PrestaHero
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
                                                                  * needs please, contact us for extra customization service at an affordable price
*
*  @author PrestaHero <etssoft.jsc@gmail.com>
*  @copyright  2007-2024 PrestaHero
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of PrestaHero
*/

var phConGlobal = {
    trans: function(key){
        if(typeof PH_CON_TRANS[key] !== 'undefined'){
            return PH_CON_TRANS[key];
        }
        return key;
    },
    getAlertErrors: function (errors) {
        var html = '';
        if(typeof errors !== 'string' && errors.length){
            html += '<ul>';
            $.each(errors, function (i, el) {
                html += '<li>'+el+'</li>';
            });
            html += '</ul>';
        }
        else{
            html += errors;
        }
        return '<div class="alert alert-danger">'+html+'</div>';
    },
    renderBtnPhAccount: function (email, hasLi) {
        hasLi = hasLi || false;
        var btn = '<div class="ph-con-account-info">' +
            '<span class="ph-con-total-module-upgrade"><img title="PrestaHero" src="'+PH_CON_LOGO+'"/></span>' +
            '<div class="dropdown">' +
            '<button id="btnPhAccount" class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="hero_icon"></i>' +
            email+
            ' <span class="caret"></span>' +
            '</button>' +
            '<ul class="dropdown-menu" aria-labelledby="btnPhAccount">' +
            '<li>' +
            '<a href="'+PH_CON_MODULE_LIST_URL+'"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512"><path d="M239.1 6.3l-208 78c-18.7 7-31.1 25-31.1 45v225.1c0 18.2 10.3 34.8 26.5 42.9l208 104c13.5 6.8 29.4 6.8 42.9 0l208-104c16.3-8.1 26.5-24.8 26.5-42.9V129.3c0-20-12.4-37.9-31.1-44.9l-208-78C262 2.2 250 2.2 239.1 6.3zM256 68.4l192 72v1.1l-192 78-192-78v-1.1l192-72zm32 356V275.5l160-65v133.9l-160 80z"/></svg> '+phConGlobal.trans('txt_modulelist')+'</a>' +
            '</li>' +
            '<li>' +
            '<a href="'+PH_CON_LINKS.contact+'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512"><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg> '+phConGlobal.trans('contact_prestahero')+'</a>' +
            '</li>' +
            '<li>' +
            '<a href="'+PH_CON_LINKS.my_account+'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg> '+phConGlobal.trans('view_my_prestahero')+'</a>' +
            '</li>' +
            '<li>' +
            '<a href="'+PH_CON_LINK_LOGOUT+'"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512"><path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/></svg> '+phConGlobal.trans('logout')+'</a>' +
            '</li>' +
            '</ul>' +
            '</div>' +
            '</div>';
        if(hasLi){
            return '<li>'+btn+'</li>';
        }
        return btn;
    },
    renderBtnLogin: function(hasLi){
        var btn =  '<span class="header-top-btn ph-con-login-addons js-ph-con-login-addons ph-con-total-module-upgrade" title="'+phConGlobal.trans('connect_to_prestahero')+'"><img src="'+PH_CON_LOGO+'"/></span>';
        if(hasLi){
            return '<li>'+btn+'</li>';
        }
        return btn;
    },
    getModalLogin: function(btn, errorMessage){
        errorMessage = errorMessage || '';
        if($('#phConLoginAddons').length){
            $('#phConLoginAddons').find('.errors').html('');
            $('#phConLoginAddons').modal({backdrop: 'static', keyboard: false});
            return false;
        }
        btn = btn || null;
        $.ajax({
            url: PH_CON_LINK_AJAX_MODULE,
            type: 'GET',
            dataType: 'json',
            data: {
                phConGetModalLogin: 1,
            },
            beforeSend: function () {
                if(btn){
                    btn.addClass('loading');
                    btn.prop('disabled', true);
                }
            },
            success: function (res) {
                if(res.success){
                    if(!$('#phConLoginAddons').length){
                        var boxAppend = 'body';
                        if($('#content.bootstrap').length){
                            boxAppend = '#content.bootstrap';
                        }
                        $(boxAppend).append(res.html);
                        $('#phConLoginAddons').modal({backdrop: 'static', keyboard: false});
                        if(errorMessage){
                            $('#phConLoginAddons .errors').html(phConGlobal.getAlertErrors(errorMessage));
                        }
                    }
                }
            },
            complete: function () {
                if(btn){
                    btn.removeClass('loading');
                    btn.prop('disabled', false);
                }
            }
        });
    },
    getNbModuleToUpgrade: function () {
        if(PH_CON_RELOAD_UPGRADE_COUNT)
            $.ajax({
                url: PH_CON_LINK_AJAX_MODULE,
                type: 'get',
                dataType: 'json',
                data: {phConGetNbModuleToUpgrade: 1},
                success: function (res) {
                    if(res.success){
                        if(parseInt(res.nb_upgrade) > 0){
                            $('#subtab-AdminPhConListModules a').append('<span class="ph-api-num-upgrade-sidebar" title="'+phConGlobal.trans('txt_modules_to_upgrade')+'">'+res.nb_upgrade+'</span>');
                            $('.ph-con-total-module-upgrade').append('<span title="'+phConGlobal.trans('txt_modules_to_upgrade')+'">'+res.nb_upgrade+'</span>');
                        }
                    }
                },
            });
        else if(PH_CON_UPGRADE_COUNT > 0)
        {
            $('#subtab-AdminPhConListModules a').append('<span class="ph-api-num-upgrade-sidebar">'+PH_CON_UPGRADE_COUNT+'</span>');
            $('.ph-con-total-module-upgrade').append('<span>'+PH_CON_UPGRADE_COUNT+'</span>');
        }
    },
    renderListItem: function (title, link, icon, suffixId) {
        return '<li class="' + (PH_CON_IS17 ? 'link-levelone maintab' : '') + '" id="subtab-AdminPhConListModules-' + suffixId + '">' +
            '<a href="' + link + '" class="' + (PH_CON_IS17 ? 'link title' : '') + '" target="_blank">' +
            (PH_CON_IS17 ? '<i class="material-icons mi-' + icon + '"></i>' : '') +
            '<span>' + title + '</span>' +
            '</a>' +
            '</li>';
    }
};

$(document).ready(function () {
    if(PH_CON_ACCOUNT_NAME){
        if($('#header-list').length)
            $('#header-list').before(phConGlobal.renderBtnPhAccount(PH_CON_ACCOUNT_NAME));
        else if($('#header-shop-list-container').length){
            $('#header-shop-list-container').before(phConGlobal.renderBtnPhAccount(PH_CON_ACCOUNT_NAME));
        }
        else{
            $('ul#header_employee_box').prepend(phConGlobal.renderBtnPhAccount(PH_CON_ACCOUNT_NAME, true));
        }
    }
    else{
        if($('#header-list').length)
            $('#header-list').before(phConGlobal.renderBtnLogin());
        else if($('#header-shop-list-container').length)
            $('#header-shop-list-container').before(phConGlobal.renderBtnLogin());
        else
            $('ul#header_employee_box').prepend(phConGlobal.renderBtnLogin(true));
    }

    $('#subtab-AdminPhConListModules').after(phConGlobal.renderListItem(phConGlobal.trans('view_my_prestahero'), PH_CON_LINKS.my_account, 'ph-con-icon-my-account', 'my-account'));
    $('#subtab-AdminPhConListModules').after(phConGlobal.renderListItem(phConGlobal.trans('contact_prestahero'), PH_CON_LINKS.contact, 'ph-con-icon-contact', 'contact'));

    phConGlobal.getNbModuleToUpgrade();
    $(document).on('click', '.js-ph-con-login-addons', function () {
        phConGlobal.getModalLogin($(this));
        return false;
    });

    $(document).on('click', '.js-ph-con-submit-account-addons', function () {
        var form = $(this).closest('form');
        var email = form.find('input[name=ph_email]').val();
        var password = form.find('input[name=ph_password]').val();
        var rememberMe = 0;
        if(form.find('input[name=remember_me]').is(':checked')){
            rememberMe = 1;
        }
        var errors = [];
        if(!email){
            errors.push(phConGlobal.trans('email_required'));
        }
        if(!password){
            errors.push(phConGlobal.trans('password_required'));
        }
        if(errors.length){
            form.find('.errors').html(phConGlobal.getAlertErrors(errors));
            return false;
        }
        var $this = $(this);
        $.ajax({
            url: PH_CON_LINK_AJAX_MODULE,
            type: 'POST',
            data: {
                phConCheckAccount: 1,
                email: email,
                password: password,
                rememberMe: rememberMe
            },
            dataType: 'json',
            beforeSend: function () {
                $this.addClass('loading');
                $this.prop('disabled', true);
            },
            success: function(res){
                if(res.success) {
                    window.location.href=res.link_redirect;
                    showSuccessMessage(res.message);
                }
                else {
                    var errors = res.errors || res.message;
                    form.find('.errors').html(phConGlobal.getAlertErrors(errors));
                }
            },
            complete: function () {
                $this.removeClass('loading');
                $this.prop('disabled', false);
            }
        });

        return false;
    });
});