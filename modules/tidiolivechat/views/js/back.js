/**
* 2007-2021 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2021 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*
* Don't forget to prefix your containers with your own identifier
* to avoid any conflicts with others containers.
*/

jQuery(function ($) {
    const projectCanBeIntegrated = (project) => ['none', 'prestashop'].includes(project.platform);
    const moduleStatusIntegrated = 'integrated';
    const moduleStatusNonIntegrated = 'nonintegrated';

    const TidioPrestashop = {
        apiUrl: apiUrl,
        panelUrl: panelUrl,
        forgotPasswordUrl: panelUrl + '/forgot-password',
        moduleStatus: moduleStatus,
        validationErrorMessages: validationErrorMessages,
        buttonTexts: buttonTexts,
        init: function() {
            document.getElementById('open-panel-link').setAttribute('href', this.panelUrl);
            document.getElementById('forgot-password-link').setAttribute('href', this.forgotPasswordUrl);

            if (this.moduleStatus === moduleStatusIntegrated) {
                $('#after-install-text').show();
            }
            if (this.moduleStatus === moduleStatusNonIntegrated) {
                this.error = $('.error');
                this.form = $('#tidio-start');
                this.form.show();
                const emailField = this.form.find('#email');
                emailField.val('');
                this.form.off().submit(this.onStartSubmit.bind(this));
            }
        },
        onStartSubmit: function() {
            const emailField = this.form.find('#email');
            if (emailField.val() === '') {
                this.showError(this.validationErrorMessages.canNotBeEmpty);
                return false;
            }
            if (emailField.is(':invalid')) {
                this.showError(this.validationErrorMessages.emailIsInvalid);
                return false;
            }
            this.hideError();

            this.checkIfEmailRegistered(emailField.val());
            return false;
        },
        showError: function(message) {
            this.error.prev().hide();
            this.error.text(message).show();
        },
        hideError: function() {
            this.error.hide();
            this.error.prev().show()
        },
        showLoginForm: function(emailValue) {
            this.form = $('#tidio-login');
            this.form.show();
            const emailField = this.form.find('#email');
            emailField.val(emailValue);
            const passwordField = this.form.find('#password');
            passwordField.val('');
            this.form.off().submit(this.onLoginSubmit.bind(this));
        },
        showNewEmailForm: function() {
            this.form = $('#tidio-new-email');
            this.form.show();
            const emailField = this.form.find('#email');
            emailField.val('');
            this.form.off().submit(this.onStartSubmit.bind(this));
        },
        onLoginSubmit: function() {
            const emailField = this.form.find('#email');
            const passwordField = this.form.find('#password');
            if (emailField.val() === '') {
                this.showError(this.validationErrorMessages.emailCanNotBeEmpty);
                return false;
            }
            if (emailField.is(':invalid')) {
                this.showError(this.validationErrorMessages.emailIsInvalid);
                return false;
            }
            if (passwordField.val() === '') {
                this.showError(this.validationErrorMessages.passwordCanNotBeEmpty);
                return false;
            }
            this.hideError();

            const email = emailField.val();
            const password = passwordField.val();

            this.getAccountDetails(email, password);
            return false;
        },
        onProjectSubmit: function() {
            this.submitButton = this.form.find('button:not(.btn-link)');
            this.disableSubmitButton();
            const details = $('#select-tidio-project option:selected').data('details');
            this.integrateProject(details.apiToken, details.publicKey);
            return false;
        },
        checkIfEmailRegistered: function(email) {
            this.submitButton = this.form.find('button');
            this.disableSubmitButton();
            const requestUrl = `${TidioPrestashop.apiUrl}&action=isEmailRegistered&email=${encodeURIComponent(email)}`;

            $.get(requestUrl)
                .done(function(data) {
                    if (data.isEmailRegistered) {
                        this.form.hide();
                        this.showLoginForm(email);
                    } else {
                        this.registerAccount(email);
                    }
                    this.enableSubmitButton(this.buttonTexts.letsGo);
                }.bind(this))
                .fail(function(error) {
                    this.showError(error.responseJSON.error);
                    this.enableSubmitButton(this.buttonTexts.letsGo);
                }.bind(this));
        },
        getAccountDetails: function(email, password) {
            this.submitButton = this.form.find('button:not(.btn-link)');
            this.disableSubmitButton();

            const params = `&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`;
            const requestUrl = `${TidioPrestashop.apiUrl}&action=getAccountDetails${params}`;

            $.get(requestUrl)
                .done(function(data) {
                    const projects = data.projects;
                    if (projects.length === 1) {
                        const project = projects[0];
                        if (projectCanBeIntegrated(project)) {
                            this.integrateProject(data.apiToken, project.publicKey);
                        } else {
                            this.form.hide();
                            this.showNewEmailForm();
                            this.enableSubmitButton(this.buttonTexts.integrateWithTidio);
                        }
                    }
                    if (projects.length > 1) {
                        const hasProjectToIntegrate = !!projects.find(project => projectCanBeIntegrated(project));
                        if (!hasProjectToIntegrate) {
                            this.form.hide();
                            this.enableSubmitButton(this.buttonTexts.integrateWithTidio);
                            this.showNewEmailForm();
                        } else {
                            this.form.hide();
                            this.enableSubmitButton(this.buttonTexts.integrateWithTidio);
                            this.form = $('#tidio-project');
                            this.form.show();
                            this.renderProjects(projects, data.apiToken);
                            this.form.off().submit(this.onProjectSubmit.bind(this));
                            const startOver = $('#start-over');
                            startOver.click(this.startOver.bind(this));
                        }
                    }
                }.bind(this))
                .fail(function(error) {
                    this.showError(error.responseJSON.error);
                    this.enableSubmitButton(this.buttonTexts.integrateWithTidio);
                }.bind(this));
        },
        registerAccount: function(email) {
            const params = `&email=${encodeURIComponent(email)}`;
            const requestUrl = `${TidioPrestashop.apiUrl}&action=register${params}`;

            $.post(requestUrl).done(function(data) {
                const redirectUrl = decodeURIComponent(data.redirectUrl);
                window.open(redirectUrl, '_blank');
                this.form.hide();
                $('#after-install-text').show();
            }.bind(this))
            .fail(function(error) {
                this.showError(error.responseJSON.error);
            }.bind(this));
        },
        integrateProject: function(apiToken, publicKey) {
            this.submitButton = this.form.find('button:not(.btn-link)');
            const params = `&apiToken=${apiToken}&publicKey=${publicKey}`;
            const requestUrl = `${TidioPrestashop.apiUrl}&action=integrateProject${params}`;

            $.post(requestUrl).done(function() {
                this.form.hide();
                this.enableSubmitButton(this.buttonTexts.integrateWithTidio);
                $('#after-install-text').show();
            }.bind(this)).fail(function(error) {
                this.showError(error.responseJSON.error);
                this.enableSubmitButton(this.buttonTexts.integrateWithTidio);
            }.bind(this));
        },
        renderProjects: function(projects, apiToken) {
            const selectProject = $('#select-tidio-project');
            const defaultOption = selectProject.children()[0];
            selectProject.children().remove();
            selectProject.append(defaultOption);
            projects.forEach(project => {
                const disabled = !projectCanBeIntegrated(project);
                const option = $(`<option value=${project.name} ${disabled ? 'disabled' : ''}>${project.name}</option>`);
                const details = {
                    apiToken,
                    publicKey: project.publicKey
                }
                option.data('details', details);
                selectProject.append(option);
            });
            this.renderCustomSelect(projects);
        },
        startOver: function() {
            this.deleteCustomSelect();
            this.form.hide();
            this.init();
        },
        renderCustomSelect: function(projects) {
            const customSelectDiv = document.getElementById('tidio-custom-select');
            const selectElement = document.getElementById('select-tidio-project');
            const submitButton = this.form.find('button');

            // create a new div that will act as the selected item
            const selectedItem = document.createElement('div');
            selectedItem.setAttribute('class', 'select-selected disabled');
            selectedItem.innerHTML = selectElement.options[selectElement.selectedIndex].innerHTML;
            customSelectDiv.appendChild(selectedItem);

            // create a new div that will contain the option list
            const options = document.createElement('div');
            options.setAttribute('class', 'select-items select-hide');

            // for each option (each project) create a new div that will act as an option item
            projects.forEach((project, index) => {
                const option = document.createElement('div');
                option.innerHTML = project.name;

                // if project can be integrated - add event listener, if not - add class to show that user can't choose it
                if (projectCanBeIntegrated(project)) {
                    option.addEventListener('click', function () {
                        // when an item is clicked, update the original select box and the selected item
                        selectElement.selectedIndex = index + 1; // the first element in options list is a placeholder, so we have to add 1 to project index
                        selectedItem.innerHTML = this.innerHTML;
                        const previouslySelected = this.parentElement.getElementsByClassName('same-as-selected')[0];
                        previouslySelected?.removeAttribute('class', 'same-as-selected');
                        this.setAttribute('class', 'same-as-selected');
                        selectedItem.click();
                    });
                } else {
                    option.setAttribute('class', 'disabled');
                }

                options.appendChild(option);
            });
            customSelectDiv.appendChild(options);

            selectedItem.addEventListener('click', function (event) {
                event.stopPropagation();
                event.preventDefault();
                this.nextSibling.classList.toggle('select-hide');
                this.classList.toggle('select-arrow-active');
                if (selectElement.selectedIndex !== 0) {
                    this.classList.remove('disabled');
                    submitButton.prop('disabled', false);
                }
            })

        },
        deleteCustomSelect: function() {
            const selectElement = document.getElementById('select-tidio-project');
            selectElement.selectedIndex = 0;

            const selectSelected = this.form.find('.custom-select .select-selected');
            if (selectSelected.length) {
                selectSelected.off().remove();
            }
            const selectItems = this.form.find('.custom-select .select-items');
            if (selectItems.length) {
                selectItems.off().remove();
            }
        },
        disableSubmitButton: function() {
            this.submitButton.prop('disabled', true).text(this.buttonTexts.loading);
        },
        enableSubmitButton: function(buttonText) {
            this.submitButton.prop('disabled', false).text(buttonText);
        }
    }

    TidioPrestashop.init();
})
