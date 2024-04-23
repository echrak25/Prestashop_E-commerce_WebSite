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
const $loading = $('<div class="wizardai-loading"><div></div><div></div><div></div><div></div></div>');

function getActions(field) {
    return prompts.filter(prompt => prompt.field === field && prompt.is_active)
        .map(prompt => ({action: prompt.action, label: prompt.label[1]}));
}

function createWizardAIModal() {
    var modalHtml = `
        <div class="modal micromodal-slide" id="wizardai-modal-askai" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="wizardai-modal-askai-title">
                    <header class="modal__header">
                        <h2 class="modal__title" id="wizardai-modal-askai-title">
                            <img src="/modules/wizardai/logo.png" width="24" height="24" style="margin-right: .4rem; transform: rotateY(180deg); position: relative; top: -2px;"> 
                            ${labelModalTitle}
                        </h2>
                        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>
                    <main class="modal__content" id="wizardai-modal-askai-content">
                        <div class="form-group">
                            <textarea class="form-control" id="wizardai-modal-askai-textarea" rows="8" placeholder="${labelPromptTextarea}"></textarea>
                        </div>
                    </main>
                    <footer class="modal__footer">
                        <button type="button" class="modal__btn" data-micromodal-close>${labelModalClose}</button>
                        <button id="wizardaiModalAskAI" type="button" class="modal__btn modal__btn-primary">${labelModalSubmit}</button>
                    </footer>
                </div>
            </div>
        </div>`;
    $("body").append(modalHtml);
    MicroModal.init();
}

$(function () {
    init();
});

function init() {
    createWizardAIModal();
    // .elementor-button with data-event="wizardai:[action]", [action] is the action to call ex : wizardai:ask

    buttonHtmlRollback = $('#wizardaiModalAskAI').html();

    $(document).on('click', '.elementor-button[data-event^="wizardai:"]', function (e) {
        e.preventDefault();
        const _this = $(this);
        // get action from data-event
        const action = _this.data('event').split(':')[1];

        // open modal
        MicroModal.show("wizardai-modal-askai");
        // set data attributes to #wizardai-modal-askai button

        // if .wizardaisource has .elementor-control-html
        if ($('.wizardai-source').hasClass('elementor-control-html'))  {
            $('.wizardai-source').find('input, textarea').attr('id', 'wizardai-textarea');;
        }
        const source = $('.wizardai-source').find('input, textarea').attr('id');
        const button = $("#wizardaiModalAskAI");
        button.data('source', source);
        button.data('action', action);
    });

    $('#wizardaiModalAskAI').click(function (e) {
        e.preventDefault();
        buttonIsLoading($(this));
        const source = $(this).data('source');
        const action = $(this).data('action');
        let type = null;
        // if source has class elementor-wp-editor then it's a tinyMCE editor
        if ($('#'+source).hasClass('elementor-wp-editor')) {
            type = 'tinyMCE';
        }
        if ($('#'+source).hasClass('ace_text-input')) {
            type = 'ace';
        }
        callWizardAPI(source, $('#wizardai-modal-askai-textarea').val(), 'creativeelements:'+action, type);
    });
}

function callWizardAPI(source, prompt, action, type = null) {

    let text = '';
    if (type === 'tinyMCE')
    {
        text = tinyMCE.get(source).getContent();
    }
    else if (type === 'ace') {
        let editorAceElement = $('#'+source).closest('.elementor-code-editor')
        let aceEditor = ace.edit(editorAceElement[0]); // Assuming 'source' is the id of your Ace editor div
        text = aceEditor.getValue();
    }
    else
    {
        text = $("#"+source).val();
    }

    if (action === 'creativeelements:image')
    {
        const params = {
            ajax: true,
            action: 'Image',
            securityToken: securityToken,
            ps_account_id: wizardai_ps_account_id,
            prompt: prompt,
            aspect: '1.1',
            steps: 25,
            guidance: 7.5,
        };


        // Effectuer la requête AJAX
        $.ajax({
            url: ajaxWizardAIUrl,
            data: params,
            type: 'POST',
            success: (data) => {
                data = JSON.parse(data);
                if (data.status) {
                    elementor.getPanelView().currentPageView.model.setSetting('image', {
                        id: 'custom-id', // Mettre un ID personnalisé ou obtenir l'ID réel de l'image si disponible
                        url: data.response
                    });
                    elementor.getPanelView().currentPageView.model.createRemoteRenderRequest();
                    $('#wizardai-modal-askai-textarea').val('');
                    //$.growl({message: 'Wizard AI has been applied'});
                } else {
                    $('#wizardai-modal-askai-textarea').val('');
                    //$.growl.error({message: response.error});
                    alert(response.error);
                    console.error(response.error);
                }
                // Réactivation du bouton
                buttonIsNotLoading($('#wizardaiModalAskAI'), buttonHtmlRollback);
                MicroModal.close("wizardai-modal-askai");
            },
            error: (jqXHR, textStatus, errorThrown) => {
                // Réactivation du bouton
                MicroModal.close("wizardai-modal-askai");
                buttonIsNotLoading($('#wizardaiModalAskAI'), buttonHtmlRollback);
                $('#wizardai-modal-askai-textarea').val('');
                //$.growl.error({message: 'An error occured'});
                alert('An error occured');
            }
        });
    }
    else {
        // make button loading
        switch (action) {
            case 'creativeelements:heading':
                action = 'Heading';
                break;
            case 'creativeelements:text-editor':
                action = 'TextEditor';
                break;
            case 'creativeelements:html':
                action = 'Html';
                break;
        }

        const params = {
            ajax: true,
            action: action,
            securityToken: securityToken,
            ps_account_id: wizardai_ps_account_id,
            prompt: prompt
        };

        $.ajax({
            url: ajaxWizardAIUrl,
            data: params,
            type: 'POST',
            success: function (data) {
                data = JSON.parse(data);
                if (data.status) {
                    let descriptions = data.response;
                    if (type === 'tinyMCE')
                        tinyMCE.get(source).setContent(descriptions);
                    else if (type === 'ace') {
                        let editorAceElement = $('#' + source).closest('.elementor-code-editor')
                        let aceEditor = ace.edit(editorAceElement[0]); // Assuming 'source' is the id of your Ace editor div
                        aceEditor.setValue(descriptions);
                    } else
                        $('#' + source).val(descriptions);
                    $('#wizardai-modal-askai-textarea').val('');
                    //$.growl({message: 'Wizard AI has been applied'});
                } else {
                    $('#wizardai-modal-askai-textarea').val('');
                    //$.growl.error({message: response.error});
                    alert(data.error);
                    console.error(data.error);
                }
                // Réactivation du bouton
                buttonIsNotLoading($('#wizardaiModalAskAI'), buttonHtmlRollback);
                MicroModal.close("wizardai-modal-askai");
            },
            error: function (response) {
                // Réactivation du bouton
                MicroModal.close("wizardai-modal-askai");
                buttonIsNotLoading($('#wizardaiModalAskAI'), buttonHtmlRollback);
                $('#wizardai-modal-askai-textarea').val('');
                //$.growl.error({message: 'An error occured'});
                alert('An error occured');
            }
        });
    }
}

function buttonIsLoading(button)
{
    // get width with padding
    let originalWidth = button.outerWidth();
    let originalHeight = button.outerHeight();
    button.attr('disabled', 'disabled');
    button.html($loading);
    button.css('width', originalWidth).css('height', originalHeight);
}

function buttonIsNotLoading(button, buttonHtmlRollback)
{
    button.removeAttr('disabled');
    button.html(buttonHtmlRollback);
    button.css('width', '').css('height', '');
}
