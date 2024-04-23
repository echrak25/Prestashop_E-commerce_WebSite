/**
  * 2013 - 2024 PayPlug SAS
  *
  * NOTICE OF LICENSE
  *
  * This source file is subject to the Open Software License (OSL 3.0).
  * It is available through the world-wide-web at this URL:
  * https://opensource.org/licenses/osl-3.0.php
  * If you are unable to obtain it through the world-wide-web, please send an email
  * to contact@window[module_name+'Module'].com so we can send you a copy immediately.
  *
  * DISCLAIMER
  *
  * Do not edit or add to this file if you wish to upgrade PayPlug module to newer
  * versions in the future.
  *
  *  @author    PayPlug SAS
  *  @copyright 2013 - 2024 PayPlug SAS
  *  @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
  *  International Registered Trademark & Property of PayPlug SAS
  */
  
/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
class Configuration {
    props = {
        'container': 'payplugConfiguration',
        'query': null,
        'data': {}
    };

    initialize() {
        configuration.handleEvents();
    }

    handleEvents() {
        const {container} = configuration.props;
        $(document)
            .on('click', '.' + container + ' button[name=saveConfiguration]', this.submit)
            .on('click', '.' + container + ' button[name=closePopin]', this.closePopin);
        $(window)
            .on('checkConfiguration', configuration.checkConfiguration);
    }

    get() {
        const $container = $('.' + configuration.props.container);
        const $input = $container.find('input');
        const $select = $container.find('select');
        let data = {};

        $input.map((key,item) => {
            var $item = $(item),
                name = $item.attr('name'),
                type = $item.attr('type'),
                value = $item.val();

            if(typeof name != 'undefined' && name) {
                switch (type) {
                    case 'radio' :
                        if ($item.prop('checked')) {
                            if (isNaN(value)) {
                                data[name] = $item.val();
                            } else {
                                data[name] = value;
                            }
                        }
                        break;
                    case 'checkbox' :
                        data[name] = $item.prop('checked') ? 1 : 0;
                        break;
                    default :
                        data[name] = value;
                        break;
                }
            }
        });

        $select.map((key,item) => {
            var $item = $(item);
            data[$item.attr('name')] = parseInt($item.val());
        });

        return data;
    }

    closePopin(event) {
        const $container = $('.' + configuration.props.container);
        $container.find('input[name=modalTriggered]').prop('checked', false);
    }

    closeAlert() {
        $('.payplugUIAlert').filter('.-error').remove();
    }

    isValidConfiguration() {
        const $container = $('.' + configuration.props.container);
        const $input = $container.find('input');
        const $select = $container.find('select');
        let hasError = false;

        $input.map((key,item) => {
            var $item = $(item);
            if ($item.is('.-error') || $item.parents().is('.-error')) {
                hasError = true;
            }
        });
        $select.map((key,item) => {
            var $item = $(item);
            if ($item.is('.-error') || $item.parents().is('.-error')) {
                hasError = true;
            }
        });

        return !hasError;
    }

    checkConfiguration() {
        const $container = $('.' + configuration.props.container);
        const isValid = configuration.isValidConfiguration();
        if (isValid) {
            $container.find('button[name="saveConfiguration"]')
                .removeClass('-disabled')
                .removeAttr('disabled');
        } else {
            $container.find('button[name="saveConfiguration"]')
                .addClass('-disabled')
                .attr('disabled', 'disabled');
        }
    }

    showError() {
        const $container = $('.' + configuration.props.container);
        const $button = $('button[name=saveConfiguration]');
        const queryData = {
            _ajax: 1,
            modal: 1,
            type: 'error',
            errorMessage: ''
        };

        // get Error form other block...
        // ... from Oney
        // ... from Installment
        // ... from Deferred

        if (configuration.props.query != null) {
            configuration.props.query.abort();
            configuration.props.query = null;
        }

        configuration.props.query = $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            dataType: 'json',
            data: queryData,
            beforeSend: () => {
                $button.addClass('-disabled').attr('disabled', 'disabled');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                alert('An error occurred while trying to checking your premium status. ' +
                    'Maybe you clicked too fast before scripts are fully loaded ' +
                    'or maybe you have a different back-office url than expected.' +
                    'You will find more explanation in JS console.');
                console.log(jqXHR, textStatus, errorThrown);
                $button.removeClass('-disabled').removeAttr('disabled');
            },
            success: (result) => {
                $button.removeClass('-disabled').removeAttr('disabled');
                if (result.modal) {
                    if ($('.payplugUIModal').length) {
                        $('.payplugUIModal').replaceWith(result.modal);
                    } else {
                        $container.append(result.modal);
                    }
                    $container.find('input[name=modalTriggered]').trigger('click');
                }
            }
        });
    }

    submit(event) {
        event.preventDefault();
        event.stopPropagation();

        configuration.closeAlert();

        if (!configuration.isValidConfiguration()) {
            return configuration.showError();
        }

        const currentConfiguration = configuration.get();
        const queryData = {
            _ajax: 1,
            save: 1,
            ...currentConfiguration
        };
        const $container = $('.' + configuration.props.container);
        const $button = $(this);

        if (configuration.props.query != null) {
            configuration.props.query.abort();
            configuration.props.query = null;
        }

        configuration.props.query = $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            dataType: 'json',
            data: queryData,
            beforeSend: () => {
                $button.addClass('-disabled').attr('disabled', 'disabled');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                alert('An error occurred while trying to checking your premium status. ' +
                    'Maybe you clicked too fast before scripts are fully loaded ' +
                    'or maybe you have a different back-office url than expected.' +
                    'You will find more explanation in JS console.');
                console.log(jqXHR, textStatus, errorThrown);
                $button.removeClass('-disabled').removeAttr('disabled');
            },
            success: (result) => {
                $button.removeClass('-disabled').removeAttr('disabled');
                if (result.modal) {
                    if ($('.payplugUIModal').length) {
                        $('.payplugUIModal').replaceWith(result.modal);
                    } else {
                        $container.append(result.modal);
                    }
                    $container.find('input[name=modalTriggered]').trigger('click');
                }
            }
        });
    }
}

const configuration = new Configuration();
$(document).ready(configuration.initialize);
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
class Deferred {
    props = {
        'container': 'payplugConfiguration',
        'idOrderState': null,
        'query': null,
    };


    initialize() {
        deferred.handleEvents();
    }

    handleEvents() {
        $(document)
            .on('ready', deferred.setIdOrderState)
            .on('change', 'input[name="payplug_deferred"]', deferred.toggleDeferredState)
            .on('change', '.payplugUISelect.-deferred input', deferred.handleDeferredState);
    }

    setIdOrderState() {
        const $container = $('.' + deferred.props.container);
        deferred.props.idOrderState = $container.find('input[name="payplug_deferred_state"]:checked').val();
    }

    handleDeferredState() {
        const oldOrderState = deferred.props.idOrderState;
        deferred.setIdOrderState();

        if (!parseInt(deferred.props.idOrderState)) {
            deferred.removeDisplayOrderStatusAlert();
        } else if (parseInt(oldOrderState) != parseInt(deferred.props.idOrderState)) {
            deferred.displayOrderStatusAlert();
        }
    }

    toggleDeferredState(event) {
        const $input = $(event.target),
            $select = $('.payplugUISelect.-deferred');

        if ($input.prop('checked')) {
            $select.removeClass('-disabled')
                .find('._current').attr('tabindex', '1');
        } else {
            $select.addClass('-disabled')
                .find('._current').removeAttr('tabindex');
        }
    }

    removeDisplayOrderStatusAlert() {
        const $content = $('._standardAdvancedOption.-deferred').find('._content'),
            $alert = $content.find('.payplugUITextAlert');
        if ($alert.length) {
            $alert.remove();
        }
    }

    displayOrderStatusAlert() {
        const queryData = {
            _ajax: 1,
            alert: 1,
            type: 'orderState',
            idOrderState: deferred.props.idOrderState
        };

        if (deferred.props.query != null) {
            deferred.props.query.abort();
            deferred.props.query = null;
        }
        deferred.props.query = $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            dataType: 'json',
            data: queryData,
            error: function (jqXHR, textStatus, errorThrown) {
                if (errorThrown != 'abort') {
                    alert('An error occurred while trying to checking your premium status. ' +
                        'Maybe you clicked too fast before scripts are fully loaded ' +
                        'or maybe you have a different back-office url than expected.' +
                        'You will find more explanation in JS console.');
                    console.log(jqXHR, textStatus, errorThrown);
                }
            },
            success: function (result) {
                if (typeof result.alert != 'undefined' && result.alert) {
                    deferred.removeDisplayOrderStatusAlert();
                    const $content = $('._advancedOption.-deferred').find('._content');
                    if($('._advancedOption.-deferred').find('.payplugUITextAlert.-warning').length) {
                        $('._advancedOption.-deferred').find('.payplugUITextAlert.-warning').remove();
                    }
                    $content.append(result.alert);
                }
            }
        });
    }
}

const deferred = new Deferred();
deferred.initialize();
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
class Description {
    props = {
        'container': 'payplugConfiguration',
        'query': null,
        'data': {}
    };

    initialize() {
        description.handleEvents();
    }

    handleEvents() {
        const {container} = description.props;
        $(document)
            .on('change', '.' + container + ' input[name=payplug_enable]', this.triggerShow);
    }

    triggerShow(event) {
        const $selected = $(event.target),
            show = parseInt($selected.val());

        if (show) {
            $('.payplugUiBlock').removeClass('-disabled');
        } else {
            $('.payplugUiBlock').addClass('-disabled');
        }

        $('.bannerBlock, .descriptionBlock').removeClass('-disabled');
    }
}

const description = new Description();
description.initialize();
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
class General {
    props = {
        'container': 'payplugConfiguration',
        'query': null
    };

    initialize() {
        general.handleEvents();
    }

    handleEvents() {
        const {container} = general.props;
        $(document)
            .on('click', '.' + container + ' button[name=showLogin]', general.showLogin)
            .on('click', '.' + container + ' button[name=hideLogin]', general.hideLogin)
            .on('click', '.' + container + ' button[name=login]', general.login)
            .on('click', '.' + container + ' input[name=payplug_sandbox]', general.handleSandbox)
            .on('click', '.' + container + ' button[name=logout]', general.logout)
            .on('click', '.' + container + ' button[name=closePopin]', general.closePopin)
            .on('click', '.' + container + ' .alertLiveButton', general.handleAlertLiveButton)
            .on('click', '.' + container + ' button[name=submitSandbox]', general.submitSandbox)
            .on('click', '.' + container + ' button[name=validateLive]', general.validateLive)
            .on('click', '.' + container + ' input[name=modalTriggered]', general.handleModal)
            .on('click', '.' + container + ' input[name=alertTriggered]', general.closeAlert)
    }

    handleAlertLiveButton(event) {
        event.preventDefault();
        event.stopPropagation();

        const $sandbox = $('input[name="payplug_sandbox"][value="0"]');
        if ($sandbox.data('notallowed')) {
            return general.checkOnboarding();
        } else {
            return $sandbox.trigger('click');
        }
    }

    handleModal(event) {
        const $checkbox = $(event.target);
        const $modal = $('.payplugUIModal');
        if (!$checkbox.prop('checked') && $modal.find('button[name=validateLive]').length) {
            return general.setSandboxAllowed();
        }
    }

    checkOnboarding() {
        const $container = $('.' + general.props.container),
            queryData = {
                _ajax: 1,
                log: 1,
                checkOnboarding: 1
            };

        if (general.props.query != null) {
            general.props.query.abort();
            general.props.query = null;
        }

        general.props.query = $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            dataType: 'json',
            data: queryData,
            success: (result) => {
                if (result.content) {
                    general.reloadFromContent(result.content);
                } else {
                    if (result.modal) {
                        if ($('.payplugUIModal').length) {
                            $container.find('.payplugUIModal').remove();
                        }
                        $container.append(result.modal);
                        $container.find('input[name=modalTriggered]').trigger('click');

                        // hide applepay & bancontact feature
                        $('.paymentOption.-bancontact, .paymentOption.-applepay').hide();
                    }
                }
            }
        });
    }

    submitSandbox(event) {
        event.preventDefault();
        event.stopPropagation();
        const queryData = {
            _ajax: 1,
            log: 1,
            submitSandbox: 1,
            payplug_password: $('input[name="password"]').val(),
        };
        const $container = $('.' + general.props.container);
        const $button = $(this);

        if ($button.is('-disabled')) {
            return;
        }

        if (general.props.query != null) {
            general.props.query.abort();
            general.props.query = null;
        }
        general.props.query = $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            dataType: 'json',
            data: queryData,
            beforeSend: () => {
                $button.addClass('-disabled').attr('disabled', 'disabled');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                $button.removeClass('-disabled').removeAttr('disabled');
            },
            success: (result) => {
                if (result.content) {
                    general.reloadFromContent(result.content);
                } else {
                    $button.removeClass('-disabled').removeAttr('disabled');
                    if (result.modal) {
                        if ($('.payplugUIModal').length) {
                            $container.find('.payplugUIModal').remove();
                        }
                        $container.append(result.modal);
                        $container.find('input[name=modalTriggered]').trigger('click');
                    }
                }
            }
        });

    }

    closePopin(event) {
        const $container = $('.' + general.props.container);
        $container.find('input[name=modalTriggered]').prop('checked', false);
    }

    closeAlert(event) {
        event.preventDefault();
        event.stopPropagation();
        const $icon = $(this);
        $icon.closest('.payplugUIAlert').remove();
    }

    hideLogin(event) {
        event.preventDefault();
        event.stopPropagation();
        $('.generalBlock.-subscribe').removeClass('-hide');
        $('.generalBlock.-login').addClass('-hide');
    }

    showLogin(event) {
        event.preventDefault();
        event.stopPropagation();
        $('.generalBlock.-subscribe').addClass('-hide');
        $('.generalBlock.-login').removeClass('-hide');
    }

    login(event) {
        event.preventDefault();
        event.stopPropagation();

        const queryData = {
            _ajax: 1,
            log: 1,
            submitAccount: 1,
            payplug_email: $('input[name="userEmail"]').val(),
            payplug_password: $('input[name="userPassword"]').val(),
        };
        const $container = $('.' + general.props.container);
        const $button = $(this);

        if ($button.is('-disabled')) {
            return;
        }

        if (general.props.query != null) {
            general.props.query.abort();
            general.props.query = null;
        }

        general.props.query = $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            dataType: 'json',
            data: queryData,
            beforeSend: () => {
                $button.addClass('-disabled').attr('disabled', 'disabled');
            },
            error: (jqXHR, textStatus, errorThrown) => {
                alert('An error occurred while trying to checking your premium status. ' +
                    'Maybe you clicked too fast before scripts are fully loaded ' +
                    'or maybe you have a different back-office url than expected.' +
                    'You will find more explanation in JS console.');
                console.log(jqXHR, textStatus, errorThrown);
                $button.removeClass('-disabled').removeAttr('disabled');
            },
            success: (result) => {
                if (result.content) {
                    general.reloadFromContent(result.content);
                } else {
                    $button.removeClass('-disabled').removeAttr('disabled');
                    if (result.modal) {
                        if ($('.payplugUIModal').length) {
                            $('.payplugUIModal').replaceWith(result.modal);
                        } else {
                            $container.append(result.modal);
                        }
                        $container.find('input[name=modalTriggered]').trigger('click');
                    }
                }
            }
        });
    }

    logout(event) {
        event.preventDefault();
        event.stopPropagation();

        const queryData = {
            _ajax: 1,
            submitDisconnect: 1
        };
        const $button = $(this);
        if ($button.is('-disabled')) {
            return;
        }

        if (general.props.query != null) {
            general.props.query.abort();
            general.props.query = null;
        }

        general.props.query = $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            dataType: 'json',
            data: queryData,
            beforeSend: function () {
                $button.addClass('-disabled').attr('disabled', 'disabled');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (errorThrown != 'abort') {
                    alert('An error occurred while trying to checking your premium status. ' +
                        'Maybe you clicked too fast before scripts are fully loaded ' +
                        'or maybe you have a different back-office url than expected.' +
                        'You will find more explanation in JS console.');
                    console.log(jqXHR, textStatus, errorThrown);
                    $button.addClass('-disabled').attr('disabled', 'disabled');
                }
            },
            success: function (result) {
                if (result.content) {
                    general.reloadFromContent(result.content);
                } else {
                    $button.removeClass('-disabled').removeAttr('disabled');
                }
            }
        });
    }

    validateLive(event) {
        event.preventDefault();
        event.stopPropagation();

        // close the modal
        const $container = $('.' + general.props.container);
        $container.find('input[name=modalTriggered]').trigger('click');

        general.setSandboxAllowed();
    }

    setSandboxAllowed() {
        // set sandbox value
        const $sandBoxLive = $('input[name="payplug_sandbox"][value="0"]');
        $sandBoxLive.data("notallowed", 0).trigger('click');

        // remove alert block
        $('.onboardingAlert').remove();
    }

    handleSandbox(event) {
        const $sandbox = $(event.currentTarget);
        const sandBoxValue = parseInt($sandbox.val());

        if (!sandBoxValue && $sandbox.data('notallowed')) {
            event.preventDefault();
            event.stopPropagation();
            return general.checkOnboarding();
        }

        return general.toggleDescription(event);
    }

    reloadFromContent(content) {
        $('.payplugConfiguration').replaceWith(content);
        $(window).trigger('reloadEvent');
    }

    toggleDescription(event) {
        const $sandbox = $(event.currentTarget);
        const sandBoxValue = parseInt($sandbox.val());
        $('._sandboxDescription').removeClass('-hide');
        if (sandBoxValue) {
            $('._sandboxDescription.-live').addClass('-hide');
        } else {
            $('._sandboxDescription.-test').addClass('-hide');
        }
    }
}

const general = new General();
$(document).ready(general.initialize);
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
class Installments {
    props = {
        'limits': {
            min: 4,
            max: 20000,
        },
        'query': null,
    };

    initialize() {
        installments.handleEvents();
    }

    handleEvents() {
        $(document)
            .on('focusout', 'input[name="payplug_inst_min_amount"]', installments.checkAmount)
            .on('change', 'input[name="payplug_inst"]', installments.handleInstallment);
    }

    checkAmount() {
        var amount = $('input[name="payplug_inst_min_amount"]').val(),
            minAmountErrorSpan = $('.installmentError');

        if (installments.props.limits.min > amount || amount > installments.props.limits.max || isNaN(amount)) {
            $('.installmentMinAmount').addClass('-error');
            minAmountErrorSpan.text(errorInstallmentAmount);
            minAmountErrorSpan.show();
            $('.installmentErrorIcon').show();
        } else {
            $('.installmentMinAmount').removeClass('-error');
            minAmountErrorSpan.hide();
            $('.installmentErrorIcon').hide();
        }

        $(window).trigger('checkConfiguration');
    }

    handleInstallment(event) {
        const $input = $(event.target),
            $select = $('.payplugUISelect.installmentMode'),
            $inputMode = $('.payplugUIInput.installmentMinAmount').find('input');

        $(window).trigger('resetThresholders');

        if ($input.prop('checked')) {
            $select.removeClass('-disabled')
                .find('._current').attr('tabindex', '1');
            $inputMode.prop('disabled', false)
                .parents('.payplugUIInput')
                .removeClass('-disabled');
        } else {
            $select.addClass('-disabled')
                .find('._current').removeAttr('tabindex');
            $inputMode.prop('disabled', true)
                .parents('.payplugUIInput')
                .addClass('-disabled');
        }
    }
}

const installments = new Installments();
installments.initialize();
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
class PaymentMethod {
    props = {
        'container': 'paymentMethodBlock',
        'query': null,
        'data': {}
    };

    initialize() {
        paymentMethod.handleEvents();
        paymentMethod.handleReloadContent();
    }

    handleEvents() {
        $(document)
            .on('click', 'input[name=payplug_sandbox]', paymentMethod.handleSandbox)
            .on('change', '.paymentMethod_switch input', paymentMethod.handlePaymentOption)
            .on('change', 'input[name="payplug_one_click"]', paymentMethod.handleOneClickPermission)
            .on('change', 'input[name="payplug_deferred"]', paymentMethod.handleDeferredPermission)
            .on('change', 'input[name="payplug_inst"]', paymentMethod.handleInstallmentPermission);
        $(window)
            .on('reloadEvent', paymentMethod.handleReloadContent)
            .on('resetThresholders', paymentMethod.resetThresholders);
    }

    handleReloadContent() {
        if(!paymentMethod.isLogged()) {
            return;
        }

        paymentMethod.handleSandbox();
        paymentMethod.checkPaymentOptionInformation();
    }

    handleDeferredPermission(event) {
        const $input = $(event.target),
            $switch = $input.parents('._switch').eq(0),
            $sandbox = $('input[name=payplug_sandbox]:checked');

        if (!parseInt($sandbox.val())) {
            event.preventDefault();
            event.stopPropagation();
            paymentMethod.checkPremium($switch);
        }
    }

    handleInstallmentPermission(event) {
        const $input = $(event.target),
            $switch = $input.parents('._switch').eq(0),
            $sandbox = $('input[name=payplug_sandbox]:checked');

        if (!parseInt($sandbox.val())) {
            event.preventDefault();
            event.stopPropagation();
            paymentMethod.checkPremium($switch);
        }
    }

    handleOneClickPermission(event) {
        const $switch = $(event.target).parents('._switch').eq(0),
            $sandbox = $('input[name=payplug_sandbox]:checked'),
            isSandBox = parseInt($sandbox.val());

        if (!isSandBox) {
            event.preventDefault();
            event.stopPropagation();
            paymentMethod.checkPremium($switch);
        }
    }

    checkPaymentOptionInformation() {
        const $paymentOptions = $('.paymentMethod');

        $paymentOptions.map((k, v) => {
            const $switch = $(v).find('.paymentMethod_switch');
            paymentMethod.tooglePaymentOptionInformation($switch);
        })
    }

    handlePaymentOption(event) {
        const $switch = $(event.target).parents('.paymentMethod_switch');
        const $sandbox = $('input[name=payplug_sandbox]:checked');
        const isSandBox = parseInt($sandbox.val());

        var payment_method = $switch.find('._switch').data('e2e-name');
        if (payment_method == 'paymentMethod_oney' || payment_method == 'paymentMethod_standard') {
            paymentMethod.resetThresholders();
        }

        if (!isSandBox && $switch.is('.-premium')) {
            event.preventDefault();
            event.stopPropagation();
            paymentMethod.checkPremium($switch);
        } else if (isSandBox && payment_method == 'paymentMethod_oney'){
            event.preventDefault();
            event.stopPropagation();
            paymentMethod.checkPremium($switch);
        } else {
            paymentMethod.checkPaymentOptionInformation();
        }
    }

    resetThresholders() {
        var thresholdersInputs = {
            installmentMinAmountInput : {
                element : $('input[data-e2e-name="installmentMinAmount"]'),
                amount : inst_min_amount
            },
            oneyThresholdMinInput : {
                element : $('input[data-e2e-name="oneyThresholdMin"]'),
                amount : oney_min_amounts
            },
            oneyThresholdMaxInput : {
                element : $('input[data-e2e-name="oneyThresholdMax"]'),
                amount : oney_max_amounts
            }
        };

        $.each(thresholdersInputs, function(index) {
            if (thresholdersInputs[index].element.parent().hasClass('-error') === true) {
                thresholdersInputs[index].element.val(thresholdersInputs[index].amount);
                thresholdersInputs[index].element.focusin();
                thresholdersInputs[index].element.focusout();
            }
        });

        $(window).trigger('checkConfiguration');
    }

    tooglePaymentOptionInformation($switch) {
        if (!$switch.length) {
            return;
        }
        const $paymentOption = $switch.parents('.paymentMethod'),
            checked = $switch.find('input').prop('checked');

        if (checked) {
            $paymentOption.find('._additionnal').addClass('-show');
        } else {
            $paymentOption.find('._additionnal').removeClass('-show');
        }
    }

    checkPremium($switch) {
        const $sandbox = $('input[name=payplug_sandbox]:checked');
        const checked = $switch.find('input').prop('checked');
        if (!checked) {
            paymentMethod.checkPaymentOptionInformation();
            return;
        }

        if (typeof $switch.find('input').attr('disabled') != 'undefined') {
            return;
        }

        $('.paymentMethod_switch').each(function() {
            if ($(this).find('input').attr('name') != $switch.find('input').attr('name') && checked === true) {
                $(this).find('input').attr('disabled', 'disabled');
            }
        });

        const paymentMethodName = $switch.find('input').attr('name');
        paymentMethod.getPermissions($sandbox, true, paymentMethodName);
    }

    handlePaymentMethod(paymentMethodName) {
        const $container = $('.' + paymentMethod.props.container);
        const $input = $('input[name=' + paymentMethodName + ']');
        const $switch = $input.parents('.payplugUISwitch');

        $input.prop('checked', false).trigger('change');
        paymentMethod.tooglePaymentOptionInformation($switch);

        const queryData = {
            _ajax: 1,
            popin: 1,
            permissionsModal: 1,
            type: paymentMethod.getPremiumName(paymentMethodName)
        };
        if (paymentMethod.props.query != null) {
            paymentMethod.props.query.abort();
            paymentMethod.props.query = null;
        }
        paymentMethod.props.query = $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            dataType: 'json',
            data: queryData,
            error: function (jqXHR, textStatus, errorThrown) {
                if (errorThrown != 'abort') {
                    alert('An error occurred while trying to checking your premium status. ' +
                        'Maybe you clicked too fast before scripts are fully loaded ' +
                        'or maybe you have a different back-office url than expected.' +
                        'You will find more explanation in JS console.');
                    console.log(jqXHR, textStatus, errorThrown);
                }
            },
            success: function (result) {
                if (result.content) {
                    if ($('.payplugUIModal').length) {
                        $('.payplugUIModal').replaceWith(result.content);
                    } else {
                        $container.append(result.content);
                    }
                    $container.find('input[name=modalTriggered]').trigger('click');
                }
                paymentMethod.checkPaymentOptionInformation();
            }
        });
    }

    handleSandbox() {
        const $sandbox = $('input[name=payplug_sandbox]:checked');
        const sandBoxValue = parseInt($sandbox.val());

        if ($sandbox.data('notallowed')) {
            return;
        }

        paymentMethod.getPermissions(sandBoxValue, false);
        paymentMethod.togglePaymentOption(sandBoxValue);
        }

    getPermissions(sandBoxValue, switchToggle, paymentMethodName = '') {
        const queryData = {
            _ajax: 1,
            checkPremium: 1
        };

        if (paymentMethod.props.query != null) {
            paymentMethod.props.query.abort();
            paymentMethod.props.query = null;
        }

        paymentMethod.props.query = $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            dataType: 'json',
            data: queryData,
            error: function (jqXHR, textStatus, errorThrown) {
                if (errorThrown !== 'abort') {
                    alert('An error occurred while trying to checking your premium status. ' +
                        'Maybe you clicked too fast before scripts are fully loaded ' +
                        'or maybe you have a different back-office url than expected.' +
                        'You will find more explanation in JS console.');
                    console.log(jqXHR, textStatus, errorThrown);
                }
                $('.paymentMethod_switch input').removeAttr('disabled');
            },
            success: function (result) {
                if (typeof result != 'undefined') {
                    if (switchToggle) {
                        if (typeof result[paymentMethodName] != 'undefined' && !result[paymentMethodName]) {
                            const $sandbox = $('input[name=payplug_sandbox]:checked');
                            if (parseInt($sandbox.val())) {
                                if (result['is_oney_spain'] || result['is_oney_belgium']) {
                                    paymentMethod.handlePaymentMethod(paymentMethodName);

                                } else {
                                    paymentMethod.checkPaymentOptionInformation();
                                }
                            } else {
                                paymentMethod.handlePaymentMethod(paymentMethodName);
                            }
                        } else if ('payplug_applepay' == paymentMethodName && !result['applepay_allowed_domains']) {
                            paymentMethod.handlePaymentMethod(paymentMethodName);
                        }
                        else {
                            paymentMethod.checkPaymentOptionInformation();
                        }
                        $('.paymentMethod_switch input').removeAttr('disabled');
                        return result;
                    } else {
                        paymentMethod.paymentMethodToggle(result, sandBoxValue);
                    }
                }
            }
        });
    }


    paymentMethodToggle(permissions, sandBoxValue) {
        if (!sandBoxValue) {
            $.map(permissions, function (value, index) {
                if (index !== 'payplug_sandbox' && !value) {
                    $('input[name=' + index + ']:checked').trigger('click');
                }
            });
        }

    }

    togglePaymentOption(hide) {
        const $container = $('.' + paymentMethod.props.container),
            $paymentMethods = $container.find('.paymentMethod');
        if ($paymentMethods.length) {
            $paymentMethods.map((i,e) => {
                let $paymentMethod = $(e);
                if (!$paymentMethod.is('.-useSandbox')) {
                    if (hide) {
                        $paymentMethod.addClass('-sandbox');
                    } else {
                        $paymentMethod.removeClass('-sandbox');
                    }
                }
            });
        }
    }

    getPremiumName(paymentMethodName) {
        switch (paymentMethodName) {
            case 'payplug_oney' :
                var checkpremium = 'oneyPremium';
                break;
            case 'payplug_bancontact' :
                var checkpremium = 'bancontactPremium';
                break;
            case 'payplug_applepay' :
                var checkpremium = 'applepayPremium';
                break;
            case 'payplug_amex' :
                var checkpremium = 'amexPremium';
                break;
            default :
                var checkpremium = 'premium';
                break;
        }
        return checkpremium;
    }

    isLogged(){
        return $('.generalBlock.-logged').length > 0;
    }
}

const paymentMethod = new PaymentMethod();
$(document).ready(paymentMethod.initialize);
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
class State {
    props = {
        'container': 'stateBlock',
        'query': null
    };

    initialize() {
        state.handleEvents();
    }

    handleEvents() {
        const {container} = state.props;
        $(document)
            .on('click', '.' + container + ' button[name=stateButton]', state.checkState)
    }

    checkState() {
        const queryData = {
            _ajax: 1,
            log: 1,
            checkState: 1
        };

        if (state.props.query != null) {
            state.props.query.abort();
            state.props.query = null;
        }

        state.props.query = $.ajax({
            type: 'POST',
            url: admin_ajax_url,
            dataType: 'json',
            data: queryData,
            success: (result) => {
                if (result.content) {
                    $('._stateAlert').removeClass('-showAlert');
                } else {
                    $('._stateAlert').addClass('-showAlert');
                }
            }
        });
    }
}

const state = new State();
$(document).ready(state.initialize);
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
class Thresholds {

    props = {
        'container': 'advancedPaylater',
        'limits': {
            min: (typeof oney_min_amounts == 'undefined') ? 0 : oney_min_amounts,
            max: (typeof oney_max_amounts == 'undefined') ? 0 : oney_max_amounts,
        },
        'query': null,
    };

    initialize() {
        this.handleEvents();
    }

    handleEvents() {
        $(document)
            .on('focusout', 'input[name="payplug_oney_custom_min_amounts"]', this.checkMin)
            .on('focusout', 'input[name="payplug_oney_custom_max_amounts"]', this.checkMax);
    }

    checkMin() {
        var val_min = $('input[name="payplug_oney_custom_min_amounts"]').val(),
            val_max = $('input[name="payplug_oney_custom_max_amounts"]').val(),
            thresholdsErrorSpan = $('.thresholdError');

        if ($('._statement').hasClass('-right')) {
            $('._statement').removeClass('-right');
        }
        if (thresholds.props.limits.min > val_min || isNaN(val_min)) {
            $('.minThreshold').addClass('-error');
            thresholdsErrorSpan.text(errorOneyThresholds.replace(/\\(.)/mg, "$1"));
            thresholdsErrorSpan.show();
            $('.thresholdErrorIcon').show();
        } else if (parseFloat(val_max) < val_min) {
            $('.minThreshold').addClass('-error');
            thresholdsErrorSpan.text(errorOneyMin.replace(/\\(.)/mg, "$1"));
            thresholdsErrorSpan.show();
            $('.thresholdErrorIcon').show();
        } else {
            $('.minThreshold').removeClass('-error');
            thresholdsErrorSpan.hide();
            $('.thresholdErrorIcon').hide();
            thresholds.checkMax();
        }

        $(window).trigger('checkConfiguration');
    }


    checkMax() {
        var val_min = $('input[name="payplug_oney_custom_min_amounts"]').val(),
            val_max = $('input[name="payplug_oney_custom_max_amounts"]').val(),
            thresholdsErrorSpan = $('.thresholdError');

        if (thresholds.props.limits.max < val_max || isNaN(val_max)) {
            $('._statement').addClass('-right');
            $('.maxThreshold').addClass('-error');
            thresholdsErrorSpan.text(errorOneyThresholds.replace(/\\(.)/mg, "$1"));
            thresholdsErrorSpan.show();
            $('.thresholdErrorIcon').show();
        } else if (parseFloat(val_min) > val_max) {
            $('._statement').addClass('-right');
            $('.maxThreshold').addClass('-error');
            thresholdsErrorSpan.text(errorOneyMax.replace(/\\(.)/mg, "$1"));
            thresholdsErrorSpan.show();
            $('.thresholdErrorIcon').show();
        } else if (val_max < thresholds.props.limits.min) {
            $('._statement').addClass('-right');
            $('.maxThreshold').addClass('-error');
            thresholdsErrorSpan.text(errorOneyThresholds.replace(/\\(.)/mg, "$1"));
            thresholdsErrorSpan.show();
            $('.thresholdErrorIcon').show();
        } else {
            $('._statement').removeClass('-right');
            $('.maxThreshold').removeClass('-error');
            thresholdsErrorSpan.hide();
            $('.thresholdErrorIcon').hide();
        }

        $(window).trigger('checkConfiguration');
    }
}

const thresholds = new Thresholds();
thresholds.initialize();
})();

/******/ })()
;