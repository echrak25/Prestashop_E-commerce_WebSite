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

var phConAdmin = {
    modulesToUpgrade: null,
    renderBtnInstall: function (moduleName, linkInstall, linkDelete) {
        return '<div class="btn-group module-actions">' +
                '<form class="" method="post" action="'+linkInstall+'">' +
                    '<button type="submit" class="btn btn-primary-reverse btn-outline-primary module_action_menu_install"' +
                        'data-confirm_modal="module-modal-confirm-'+moduleName+'-install">' +phConGlobal.trans('install')+'</button>' +
                '</form>' +
                '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                    '<span class="caret"></span>' +
                    '<span class="sr-only">Toggle Dropdown</span>' +
                '</button>' +
                '<ul class="dropdown-menu">' +
                    '<li>' +
                        '<form class="" method="post" action="'+linkDelete+'">' +
                            '<button type="submit" class="dropdown-item module_action_menu_delete" data-confirm_modal="module-modal-confirm-'+moduleName+'-delete">' + phConGlobal.trans('delete')+
                            '</button>' +
                        '</form>' +
                    '</li>' +
                '</ul>' +
            '</div>';
    },
    renderBtnRefreshListModule: function () {
        return '<button type="button" class="btn btn-default ph-con-refresh-list-module js-ph-con-refresh-list-module" title="' + phConGlobal.trans('refresh_and_clear_cache') + '"><i class=" fa fa-refresh"></i></button>';
    },
    actionModule: function (btn, linkAction, inPresModule, deleteModule) {
        inPresModule = inPresModule || false;
        deleteModule = deleteModule || false;
        var data = {};
        if (deleteModule) {
            data["actionParams[deletion]"] = true;
        }
        var boxItem = $(btn).closest('.ph-con-list-modules-item');
        $.ajax({
            url: linkAction,
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function () {
                $(btn).prop('disabled', true);
                $(btn).addClass('loading');
                $(btn).closest('.btn-group.module-actions').addClass('loading');
            },
            success: function (res) {
                Object.keys(res).forEach(function (key) {
                    var response = res[key];
                    if (response.status) {
                        if (typeof response.action_menu_html !== 'undefined') {
                            if ($(btn).closest('.btn-group.module-actions').length)
                                $(btn).closest('.btn-group.module-actions').replaceWith(response.action_menu_html);
                            else {
                                $(btn).closest('.js-ph-con-group-btn-action').html(response.action_menu_html);
                            }
                        } else if (typeof response.deleted_module !== 'undefined') {
                            if ($(btn).closest('.btn-group.module-actions').length) {
                                var canInstall = $(btn).closest('.module-card-item').attr('data-can-install-from-server') || 0;
                                if (canInstall == 1) {
                                    var moduleName = $(btn).closest('.module-card-item').attr('data-module') || '';
                                    var idProduct = $(btn).closest('.module-card-item').attr('data-product-id') || '';
                                    $(btn).closest('.btn-group.module-actions').replaceWith(phConAdmin.renderBtnInstallFromServer(moduleName, idProduct,false));
                                } else {
                                    var moduleUri = $(btn).closest('.module-card-item').attr('data-uri') || '';
                                    $(btn).closest('.btn-group.module-actions').replaceWith(phConAdmin.renderBtnBuyNow(moduleUri));
                                }

                            }
                        } else {
                            if ($(btn).hasClass('module_action_menu_uninstall')) {
                                var moduleName = $(btn).closest('.js-ph-con-group-btn-action').attr('data-module') || '';
                                var linkInstall = $(btn).closest('.js-ph-con-group-btn-action').attr('data-install-link') || '';
                                var linkDelete = $(btn).closest('.js-ph-con-group-btn-action').attr('data-delete-link') || '';
                                if (moduleName && linkInstall) {
                                    if (deleteModule) {
                                        var idProduct = $(btn).closest('.module-card-item').attr('data-product-id');
                                        var moduleName = $(btn).closest('.module-card-item').attr('data-module');
                                        var canDownload = $(btn).closest('.module-card-item').attr('data-can-install-from-server') || 0;
                                        if (canDownload) {
                                            $(btn).closest('.js-ph-con-group-btn-action').html(phConAdmin.renderBtnInstallFromServer(moduleName, idProduct,$(btn).closest('.module-card-item').hasClass('support_module') && !$(btn).closest('.ph-con-list-modules-item').hasClass('purchased')));
                                        } else {
                                            var moduleUri = $(btn).closest('.module-card-item').attr('data-uri') || '';
                                            $(btn).closest('.js-ph-con-group-btn-action').html(phConAdmin.renderBtnBuyNow(moduleUri));
                                        }
                                    } else {
                                        $(btn).closest('.js-ph-con-group-btn-action').html(phConAdmin.renderBtnInstall(moduleName, linkInstall, linkDelete));
                                    }
                                }
                            } else {
                                if (typeof response.link_upgrade !== 'undefined' && response.link_upgrade) {
                                    if (!PH_CON_IS_OLD_ACTION)
                                        phConAdmin.actionModule(btn, response.link_upgrade, inPresModule);
                                    else
                                        window.location.href = response.link_upgrade;
                                }
                            }
                        }
                        if (typeof response.link_upgrade === 'undefined' || !response.link_upgrade) {
                            showSuccessMessage(response.msg);
                            phConAdmin.updateNbAnalysis(btn, deleteModule, boxItem);
                            $(btn).prop('disabled', false);
                            $(btn).removeClass('loading');
                            $(btn).closest('.btn-group.module-actions').removeClass('loading');
                            if (inPresModule) {
                                $(btn).remove();
                            }
                        }
                    } else {
                        var removeBtn = false;
                        if ((typeof response.isLogged !== 'undefined' && !response.isLogged) || (typeof response.token_expired !== 'undefined' && response.token_expired)) {
                            phConGlobal.getModalLogin($(btn), response.msg);
                        } else{
                            removeBtn = true;
                            showErrorMessage(response.msg);
                        }

                        $(btn).prop('disabled', false);
                        $(btn).removeClass('loading');
                        $(btn).closest('.btn-group.module-actions').removeClass('loading');
                        if (inPresModule && removeBtn) {
                            $(btn).remove();
                        }
                    }
                });
            },
            error: function () {

            },
            complete: function (res) {
                if(!res || !res.responseJSON){
                    return false;
                }
                if (typeof res.responseJSON == 'object') {
                    Object.keys(res.responseJSON).forEach(function (key) {
                        if (typeof res.responseJSON[key].link_upgrade === 'undefined' || !res.responseJSON[key].link_upgrade) {
                            $(btn).prop('disabled', false);
                            $(btn).removeClass('loading');
                            $(btn).closest('.btn-group.module-actions').removeClass('loading');
                        }
                    });
                }
            }
        })
    },

    renderBtnInstallFromServer: function (moduleName, idProduct,support_module) {
        if(support_module)
            return '<button class="btn btn-primary-reverse btn-outline-primary support_module module_action_menu_install js-btn-buy-module" type="submit" data-confirm_modal="module-modal-confirm-ets_faq-install"> '+ phConGlobal.trans('install') +' </button>';
        else
            return '<a href="#" data-module="' + moduleName + '" data-product-id="' + idProduct + '" class="btn btn-default js-ph-con-install-module-from-server">' + phConGlobal.trans('install_from_prestahero') + '</a>';
    },

    renderBtnBuyNow: function (urlBuyNow) {
        return '<a href="' + urlBuyNow + '"  target="_blank" class="btn btn-default js-btn-buy-module">' + phConGlobal.trans('buy_now') + '</a>';
    },

    updateNbAnalysis: function (btn, isDeletedModule, boxItem) {
        isDeletedModule = isDeletedModule || '';
        var tabActive = $('.ph-con-list-content-modules').attr('data-active') || '';
        var boxItem = boxItem || $(btn).closest('.ph-con-list-modules-item');
        if ($(btn).hasClass('module_action_menu_upgrade')) {
            var nbUpgrade = $('.ph-con-list-modules').find('.nb_module_upgrade').text() || 0;
            if (nbUpgrade) {
                var newNbUpgrade = parseInt(nbUpgrade) - 1;
                $('.ph-con-list-modules').find('.nb_module_upgrade').text(newNbUpgrade);
                if (newNbUpgrade > 0) {
                    $('.ph-api-num-upgrade-sidebar').text(newNbUpgrade);
                    $('.ph-con-total-module-upgrade>span').text(newNbUpgrade);
                } else {
                    $('.ph-api-num-upgrade-sidebar').remove();
                    $('.ph-con-total-module-upgrade>span').remove();
                }
                if (tabActive !== 'to_upgrade') {
                    if (newNbUpgrade == 0)
                        $('.ph-con-list-modules .js-ph-con-tab-item[data-tab="to_upgrade"]').parent().addClass('hide');
                    boxItem.removeClass('to_upgrade');
                }
            }
        } else if ($(btn).hasClass('module_action_menu_install') || $(btn).hasClass('js-ph-con-install-module-from-server')) {

            var nbInstalled = $('.ph-con-list-modules').find('.nb_module_installed').text() || 0;
            if (nbInstalled) {
                $('.ph-con-list-modules').find('.nb_module_installed').text(parseInt(nbInstalled) + 1);
            }
            if ($(btn).hasClass('js-ph-con-install-module-from-server')) {
                var nbDownloaded = $('.ph-con-list-modules').find('.nb_module_downloaded').text() || 0;
                if (nbDownloaded) {
                    $('.ph-con-list-modules').find('.nb_module_downloaded').text(parseInt(nbDownloaded) + 1);
                }
                boxItem.addClass('downloaded');
            }
            if (tabActive !== 'installed') {
                $('.ph-con-list-modules .js-ph-con-tab-item[data-tab="installed"]').parent().removeClass('hide');
                boxItem.addClass('installed');
            }
        } else if ($(btn).hasClass('module_action_menu_uninstall')) {
            var nbInstalled = $('.ph-con-list-modules').find('.nb_module_installed').text() || 0;
            if (nbInstalled) {
                $('.ph-con-list-modules').find('.nb_module_installed').text(parseInt(nbInstalled) - 1);
                if (tabActive !== 'installed' && parseInt(nbInstalled) - 1 == 0) {
                    $('.ph-con-list-modules .js-ph-con-tab-item[data-tab="installed"]').parent().addClass('hide');
                }
            }
            if (isDeletedModule) {
                var nbDownloaded = $('.ph-con-list-modules').find('.nb_module_downloaded').text() || 0;
                if (nbDownloaded) {
                    $('.ph-con-list-modules').find('.nb_module_downloaded').text(parseInt(nbDownloaded) - 1);
                }
                if (tabActive !== 'downloaded' && parseInt(nbInstalled) - 1 == 0) {
                    $('.ph-con-list-modules .js-ph-con-tab-item[data-tab="downloaded"]').parent().addClass('hide');
                }
            }
            if (tabActive !== 'installed') {
                boxItem.removeClass('installed');
            }
        }
    },

    checkModulePaid: function () {
        $.ajax({
            url: PH_CON_LINK_AJAX_MODULE,
            type: 'GET',
            dataType: 'json',
            data: {
                phConCheckModulePaid: 1,
            },
            success: function (res) {
                if (!res) {
                    return false;
                }
                if (res.success) {
                    var modules = res.modules;
                    if (modules.length) {
                        $('.js-ph-con-tab-item[data-tab="purchased"]').parent('li').removeClass('hide');
                        $('.js-ph-con-tab-item[data-tab="purchased"]').find('.nb_module_purchased').text(modules.length);
                    }
                    $.each(modules, function (i, el) {
                        $('.ph-con-list-modules .module-card-item[data-module="' + el.name + '"]').find('.js-btn-buy-module').replaceWith('<a href="#" data-module="' + el.name + '" class="btn btn-default js-ph-con-install-module-from-server" data-product-id="' + el.id_product + '">' + phConGlobal.trans('install_from_prestahero') + '</a>');
                        if (!$('.ph-con-list-modules .module-card-item[data-module="' + el.name + '"] .module-img .already-downloaded').length) {
                            $('.ph-con-list-modules .module-card-item[data-module="' + el.name + '"]').find('.module-img').append('<span class="already-downloaded" title="' + phConGlobal.trans('purchased') + '"></span>');
                        }
                        $('.ph-con-list-modules .module-card-item[data-module="' + el.name + '"]').attr('data-can-install-from-server', 1);
                        $('.ph-con-list-modules .module-card-item[data-module="' + el.name + '"]').parent('.ph-con-list-modules-item').addClass('purchased');
                    });
                }
            },
            error: function (xhr) {

            }
        });
    },
    delay: function (callback, ms) {
        var timer = 0;
        return function () {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                callback.apply(context, args);
            }, ms || 0);
        };
    },
    renderBtnUpgrade: function (moduleName, actionLink) {
        var btn = '<a href="javascript:void(0)" class="btn btn-primary-reverse btn-outline-primary module_action_menu_upgrade js-ph-con-btn-upgrade-module" data-action="' + actionLink + '" data-confirm_modal="module-modal-confirm-' + moduleName + '-upgrade"><i class="fa fa-upload"></i> ' +
            phConGlobal.trans('upgrade') +
            '</a>';
        return btn;
    },
    checkModuleUpgradeFromPrestahero: function () {
        if(!phConAdmin.modulesToUpgrade){
            $.ajax({
                url: PH_CON_LINK_AJAX_MODULE,
                type: 'POST',
                dataType: 'json',
                data: {
                    phConCheckUpgrade: 1
                },
                success: function (res) {
                    if (res.success) {
                        var modules = res.modules || [];
                        phConAdmin.modulesToUpgrade = modules;
                        $.each(modules, function (i, module) {
                            if (!$('.module-item.module-item-list[data-tech-name="' + module.name + '"]').find('.js-ph-con-btn-upgrade-module').length) {
                                $('.module-item.module-item-list[data-tech-name="' + module.name + '"]').find('.module-actions').before(phConAdmin.renderBtnUpgrade(module.name, module.link_upgrade));
                                $('.module-item.module-item-list[data-tech-name="' + module.name + '"]').find('.module-actions').parent().addClass('ph-con-parent-module-upgrade');
                            }
                        });
                    }
                }
            });
        }
        else{
            var modules = phConAdmin.modulesToUpgrade || [];
            $.each(modules, function (i, module) {
                if (!$('.module-item.module-item-list[data-tech-name="' + module.name + '"]').find('.js-ph-con-btn-upgrade-module').length) {
                    $('.module-item.module-item-list[data-tech-name="' + module.name + '"]').find('.module-actions').before(phConAdmin.renderBtnUpgrade(module.name, module.link_upgrade));
                    $('.module-item.module-item-list[data-tech-name="' + module.name + '"]').find('.module-actions').parent().addClass('ph-con-parent-module-upgrade');
                }
            });
        }
    },
};

$(document).ready(function () {
    if (PH_CON_CONTROLLER == 'AdminPhConListModules' && PH_CON_IS_LOGGED) {
        if (PH_CON_MSG_ACTION) {
            showSuccessMessage(PH_CON_MSG_ACTION);
        }
        phConAdmin.checkModulePaid();
    }
    if (PH_CON_CONTROLLER == 'AdminPhConListModules') {
        $('h1.page-title').after(phConAdmin.renderBtnRefreshListModule());
        $('h2.page-title').after(phConAdmin.renderBtnRefreshListModule());
    }

    if (PH_CON_CONTROLLER == 'AdminModulesManage') {
        phConAdmin.checkModuleUpgradeFromPrestahero();
        $(document).on('click', '.btn-link.see-more', function () {
            phConAdmin.checkModuleUpgradeFromPrestahero();
        });

        $(document).on('keyup', '.pstaggerAddTagInput', phConAdmin.delay(function (e) {
            if($(this).is(':hidden')){
                phConAdmin.checkModuleUpgradeFromPrestahero();
            }
        }, 500));
    }

    $(document).on('click', '.support_module.module_action_menu_install', function () {
        $(this).parent().next('.ph-con-support-module-overload').addClass('ph-con-active');
    });

    $(document).on('click', '.ph-con-close-popup', function () {
        $('.ph-con-support-module-overload').removeClass('ph-con-active');
    });

    $(document).on('submit', '.js-ph-con-group-btn-action form', function () {
        if ($(this).find('button[type=submit]').hasClass('module_action_menu_delete') && !confirm(phConGlobal.trans('confirm_delete_module'))) {
            return false;
        }
        var linkAction = $(this).attr('action');
        if ($(this).closest('.module-actions').hasClass('loading')) {
            return false;
        }
        var confirmModal = $(this).find('button[type=submit]').attr('data-confirm_modal') || '';
        if (confirmModal && $('#' + confirmModal).length) {
            $('#' + confirmModal).modal({backdrop: 'static', keyboard: false});
            $('#' + confirmModal).modal('show');
            return false;
        }
        if (linkAction) {
            if (!PH_CON_IS_OLD_ACTION || $(this).hasClass('form_upgrade_from_ph'))
                phConAdmin.actionModule($(this).find('button[type=submit]')[0], linkAction);
            else
                window.location.href = linkAction;
        }
        return false;
    });

    $(document).on('click', '.js-ph-con-accept-action', function (e) {
        e.preventDefault();
        var action = $(this).attr('data-action') || '';
        var moduleName = $(this).attr('data-tech-name') || '';
        var modalId = $(this).closest('.modal').attr('id');
        if (!action || !moduleName) {
            return;
        }
        var linkAction = $('button[data-confirm_modal=' + modalId + ']').closest('form').attr('action') || '';
        if (linkAction) {
            if (!PH_CON_IS_OLD_ACTION) {
                var deleteModule = false;
                if (action == 'uninstall' && $(this).closest('.modal').find('input[name="delete_module"]').is(':checked')) {
                    deleteModule = true;
                }
                phConAdmin.actionModule($('button[data-confirm_modal=' + modalId + ']')[0], linkAction, false, deleteModule);
            } else {
                window.location.href = linkAction;
            }
        }
        return false;
    });

    $(document).on('click', '.js-ph-con-install-module-from-server', function () {
        var $this = $(this);
        var self = this;
        if ($this.hasClass('loading')) {
            return false;
        }
        $.ajax({
            url: PH_CON_LINK_AJAX_MODULE,
            type: 'POST',
            dataType: 'json',
            data: {
                phConInstallModuleFromServer: 1,
                moduleName: $this.attr('data-module') || '',
                idProduct: $this.attr('data-product-id') || '',
            },
            beforeSend: function () {
                $this.addClass('loading');
                $this.prop('disabled', true);
            },
            success: function (res) {
                if (res.success) {
                    var linkInstall = res.link_install || '';
                    if (linkInstall) {
                        if (!PH_CON_IS_OLD_ACTION)
                            phConAdmin.actionModule(self, linkInstall);
                        else
                            window.location.href = linkInstall;
                    }
                } else {
                    $this.prop('disabled', false);
                    $this.removeClass('loading');
                    showErrorMessage(res.message || 'Has error');
                }
            },
            complete: function () {
                //
            }
        });
        return false;
    });

    $(document).on('click', '.js-ph-con-refresh-list-module', function () {
        var $this = $(this);
        $.ajax({
            url: PH_CON_LINK_AJAX_MODULE,
            type: 'POST',
            dataType: 'json',
            data: {
                phConRefreshListModule: 1
            },
            beforeSend: function () {
                $this.prop('disabled', true);
                $this.addClass('loading');
            },
            success: function (res) {
                if (res.success) {
                    showSuccessMessage(res.message);
                    window.location.reload();
                } else {
                    showErrorMessage(res.message);
                }
            },
            complete: function () {
                $this.prop('disabled', false);
                $this.removeClass('loading');
            }
        });
        return false;
    });

    $(document).on('click', '.js-ph-con-tab-item', function () {
        var tabActive = $(this).attr('data-tab');
        $(this).closest('.ph-con-list-tabs').find('ul.list-tabs>li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.ph-con-list-content-modules').attr('data-active', tabActive);
        if($('.ph-con-list-content-modules .ph-con-list-modules-item:not(:hidden)').length==0)
            $('.ph-con-not-found-item').removeClass('hide');
        else
            $('.ph-con-not-found-item').addClass('hide');
    });

    $('#ph-con-box-search-module').keyup(phConAdmin.delay(function () {
        var textSearch = this.value;
        if (textSearch) {
            textSearch = textSearch.toLowerCase();
            $('.ph-con-list-content-modules').find('.ph-con-list-modules-item>.module-card-item').each(function () {
                var moduleName = $(this).attr('data-module') || '';
                var moduleDisplayName = $(this).attr('data-display-name') || '';
                var wordsSearch = textSearch.split(/\s+/g);
                var $this = $(this);
                $.each(wordsSearch, function (i, word) {
                    if ((moduleName && moduleName.toLowerCase().indexOf(word) !== -1) || (moduleDisplayName && moduleDisplayName.toLowerCase().indexOf(word) !== -1)) {
                        $this.parent('.ph-con-list-modules-item').removeClass('hide');
                    } else {
                        $this.parent('.ph-con-list-modules-item').addClass('hide');
                    }
                });

            });
        } else {
            $('.ph-con-list-content-modules').find('.ph-con-list-modules-item').removeClass('hide');
        }
        if($('.ph-con-list-content-modules .ph-con-list-modules-item:not(:hidden)').length==0)
            $('.ph-con-not-found-item').removeClass('hide');
        else
            $('.ph-con-not-found-item').addClass('hide');
    }, 200));

    $(document).on('click', '.js-ph-con-btn-upgrade-module', function () {
        var linkAction = $(this).attr('data-action') || '';
        phConAdmin.actionModule(this, linkAction, 1);
        return false;
    });
});
