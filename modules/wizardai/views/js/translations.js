/**
 * NOTICE OF LICENSE
 *
 * This file is licenced under the Software License Agreement.
 * With the purchase or the installation of the software in your application
 * you accept the licence agreement.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 *  @author    Gekkode
 *  @copyright 2023 (c) Gekkode
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
function WizardAI() {
    if (window.jQuery) {

        const $loading = $('<div class="wizardai-loading"><div></div><div></div><div></div><div></div></div>');

        function getActions(field) {
            return prompts.filter(prompt => prompt.field === field && prompt.is_active)
                .map(prompt => ({action: prompt.action, label: prompt.label[1]}));
        }

        function appendTranslateButton($element)
        {
            const button = `<button class="btn btn-default btn-wizardai pull-right" style="margin-right: 10px;">
            <img src="/modules/wizardai/logo.png" width="24" height="24" style="margin-right: .4rem;"> ${labelTranslateButton}
        </button>`;
            $element.append(button);
        }

        $(function () {

            // if category cms page, set tinyMCE to false
            if ($('body').hasClass('admintranslations')) {
                init();
            }

        });

        function init() {

            const $wrapper = $('.panel-footer');
            $wrapper.each(function () {
                // doesn't add button if .panel input
                let inputFound = false;
                if ($(this).closest('.panel').find('textarea, input[type=text]').length > 0) {
                    inputFound = true;
                }
                if (inputFound) {
                    appendTranslateButton($(this));
                }
            });

            $('.btn-wizardai').click(function (e) {
                e.preventDefault();

                let list = [];
                $(this).closest('.panel').find('input, textarea').each(function () {
                    let text = $(this).closest('tr').find('td:first-child').text();
                    list.push(text);
                });
                callWizardAPI($(this), list);
            });


            setInterval(function () {
                if ($('.translations-wrapper').length === 0) {
                    let interval = setInterval(function () {
                        if ($('.translations-wrapper').length > 0) {
                            clearInterval(interval);
                            if ($('.translations-wrapper').find('.btn-wizardai').length === 0) {
                                let wrapperButton = $('.translations-wrapper').find('.col-sm-12.mb-2')
                                appendTranslateButton(wrapperButton);
                                $('.btn-wizardai').click(function (e) {
                                    e.preventDefault();

                                    let list = [];
                                    $(this).closest('form').find('input, textarea').each(function () {
                                        let text = $(this).closest('.form-group').find('label').text();
                                        list.push(text);
                                    });
                                    callWizardAPI($(this), list);
                                });
                            }
                        }
                    }, 100);
                }
            }, 1000);
        }

        function callWizardAPI(button, list) {
            // make button loading
            buttonHtmlRollback = button.html();
            buttonIsLoading(button)
            $.ajax({
                url: ajaxUrl + "&action=TranslateList&locale=" + lang + "&securityToken=" + securityToken,
                method: 'POST',
                data: {
                    ps_account_id: wizardai_ps_account_id,
                    securityToken: securityToken,
                    list: list,
                    locale: lang
                },
                success: function (response) {
                    try {
                        response = JSON.parse(response);
                        if (response.status) {
                            if (response.list.length === 0) {
                                $.growl({message: 'Nothing to translate'});
                                buttonIsNotLoading(button, buttonHtmlRollback);
                                return;
                            }
                            Object.entries(response.list).forEach(([key, value]) => {
                                $('input, textarea').each(function () {
                                    if ($(this).closest('tr').find('td:first-child').text() === key) {
                                        $(this).val(value);
                                    }
                                    if ($(this).closest('.form-group').find('label').text() === key) {
                                        // trick to trigger event
                                        let input = $(this)[0];
                                        input.value = value;
                                        input.dispatchEvent(new Event("input"));
                                    }
                                });
                            });
                            $.growl.notice({title: 'WizardAI', message: 'Translation done'});
                        } else {
                            if (response.status === 503)
                            {
                                $.growl.error({message: 'Prestashop is in maintenance mode'});
                                return false;
                            }
                            $.growl.error({message: response.error});
                            console.error(response.error);
                        }
                        // Réactivation du bouton
                        buttonIsNotLoading(button, buttonHtmlRollback);
                    } catch (exception)
                    {
                        // Réactivation du bouton
                        buttonIsNotLoading(button, buttonHtmlRollback);
                        $.growl.error({message: response.response});
                    }
                },
                error: function (response) {
                    // Réactivation du bouton
                    $('.btn-wizardai').removeAttr('disabled');
                    $.growl.error({message: response.response});
                }
            });
        }

        function buttonIsLoading(button)
        {
            $('.btn-wizardai').each(function () {
                $(this).attr('disabled', 'disabled');
            });
            // get width with padding
            let originalWidth = button.outerWidth();
            let originalHeight = button.outerHeight();
            button.attr('disabled', 'disabled');
            button.html($loading);
            button.css('width', originalWidth).css('height', originalHeight);
        }

        function buttonIsNotLoading(button, buttonHtmlRollback)
        {
            $('.btn-wizardai').each(function () {
                $(this).removeAttr('disabled');
            });
            button.removeAttr('disabled');
            button.html(buttonHtmlRollback);
            button.css('width', '').css('height', '');
        }
    } else {
        // If jQuery is not loaded, wait for 100ms and try again
        setTimeout(WizardAI, 100);
    }
}

WizardAI();
