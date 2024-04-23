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
function getActions(field) {
    return prompts.filter(prompt => prompt.field === field && prompt.is_active)
        .map(prompt => ({action: prompt.action, label: prompt.label[1]}));
}

function appendAskButton($element, $id_entity, $locale)
{
    var source = $element.find('textarea').attr('id');
    // try to find .mce-tinymc, if found, set input type to tinymce
    var $inputType = 'textarea';
    if ($element.find('.mce-tinymce').length > 0 || $element.find('.supertinymcepro').length > 0) {
        $inputType = 'tinyMCE';
    }
    // detect if input type is tinymce
    if (source === undefined) {
        $inputType = 'input';
        source = $element.find('input').attr('id');
    }

    const button = `<button class="btn btn-default btn-wizardai btn-wizardai-modal" style="margin-right: 10px;" data-entity="${$id_entity}" data-source="${source}" data-input-type="${$inputType}" data-locale="${$locale}">
            <img src="/modules/wizardai/logo.png" width="24" height="24" style="margin-right: .4rem;"> ${labelAskButton}
        </button>`;
    $element.append(button);
}

function appendAction($element, $actions, $id_entity, $locale) {
    var source = $element.find('textarea').attr('id');
    // try to find .mce-tinymc, if found, set input type to tinymce
    var $inputType = 'textarea';
    if ($element.find('.mce-tinymce').length > 0) {
        $inputType = 'tinyMCE';
    }
    // detect if input type is tinymce
    if (source === undefined) {
        $inputType = 'input';
        source = $element.find('input').attr('id');
    }
    if ($actions.length === 1) {
        const action = $actions[0];
        const button = `<button class="btn btn-default btn-wizardai btn-wizardai-main" style="margin-left: 0px;" data-entity="${$id_entity}" data-source="${source}" data-input-type="${$inputType}" data-locale="${$locale}" data-action="${action.action}">
            <img src="/modules/wizardai/logo.png" width="24" height="24" style="margin-right: .4rem;"> ${action.label}
        </button>`;
        $element.append(button);
    } else if ($actions.length > 1) {
        const mainAction = $actions[0];
        const otherActions = $actions.slice(1);
        const mainButton = `<button type="button" class="btn btn-default btn-wizardai btn-wizardai-main" data-entity="${$id_entity}" data-source="${source}" data-input-type="${$inputType}" data-locale="${$locale}" data-action="${mainAction.action}">
            <img src="/modules/wizardai/logo.png" width="24" height="24" style="margin-right: .4rem;">
            ${mainAction.label}
        </button>`;
        const dropdown = `<div class="btn-group btn-group-wizardai">
            ${mainButton}
            <button type="button" class="btn btn-default btn-wizardai dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                ${otherActions.map(action => `<li><a href="#" class="dropdown-item-wizardai" data-entity="${$id_entity}" data-source="${source}" data-input-type="${$inputType}" data-locale="${$locale}" data-action="${action.action}">${action.label}</a></li>`).join('')}
            </ul>
        </div>`;
        $element.append(dropdown);
    }
}

function appendGenerateFeaturesAction($id_entity) {
    const button = `<button class="btn btn-default btn-wizardai btn-wizardai-main" style="margin-top: 0px; margin-left: 10px;" data-entity="${$id_entity}" data-input-type="features" data-action="generateFeatures">
            <img src="/modules/wizardai/logo.png" width="24" height="24" style="margin-right: .4rem;"> Generate features ( experimental )
        </button>`;
    // append after button #add_feature_button
    $('#add_feature_button').closest('.col-md-4').removeClass('col-md-4').addClass('col-md-12');
    $('#add_feature_button').after(button);
}


function createWizardAIModal() {
    var modalHtml = `
        <div class="modal fade" id="wizardai-modal-askai" tabindex="-1" role="dialog" aria-labelledby="${labelModalTitle}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="wizardai-modal-askai-label">  <img src="/modules/wizardai/logo.png" width="24" height="24" style="margin-right: .4rem; transform: rotateY(180deg); position: relative; top: -2px;"> ${labelModalTitle}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea class="form-control" id="wizardai-modal-askai-textarea" rows="8" placeholder="${labelPromptTextarea}"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-top: 0px;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">${labelModalClose}</button>
                        <button id="wizardaiModalAskAI" type="button" class="btn btn-primary">${labelModalSubmit}</button>
                    </div>
                </div>
            </div>
        </div>`;
    $("body").append(modalHtml);
}

document.addEventListener("DOMContentLoaded", function () {
    $(function () {

        // if category cms page, set tinyMCE to false
        if ($('body').hasClass('admincmscontent') && $('#cms_page_category').length > 0) {
            init();
        }

        // wait tinyMCE loaded ( to detect, wait to see if .mce-tinymce exist )
        const $interval = setInterval(function () {
            if ($('.mce-tinymce').length > 0 || $('.supertinymcepro').length > 0) {
                clearInterval($interval);
                init();
            }
        }, 1000);
    });
});

function init() {

    let entity = false;
    // look inside each name input ( or textarea ) inside .js-locale-input-group and add data attribute of first text between brackets into .js-locale-input-group
    $('.js-locale-input-group input, .js-locale-input-group textarea').each(function () {
        // get the name of the input field ( only the first content between brackets )
        if ($(this).attr('name') === undefined) {
            return;
        }
        const name = $(this).attr('name').match(/\[(.*?)\]/)[1];
        const $wrapper = $(this).closest('.js-locale-input-group');
        $wrapper.attr('data-wizardaifield', name);
    })

    createWizardAIModal();

    if ($('body').hasClass('adminproducts')) {
        entity = 'product';

        const elements = [
            {selector: '#description .tab-pane', type: 'description'},
            {selector: '#description_short .tab-pane', type: 'short_description'},
            {selector: '#form_step5_meta_description .tab-pane', type: 'meta_description'},
            {selector: '#form_step5_meta_title .tab-pane', type: 'meta_title'},
            {selector: '#product_description_description .tab-pane', type: 'short_description'},
            {selector: '#product_description_description_short .tab-pane', type: 'short_description'},
            {selector: '#product_seo_meta_description .js-locale-input', type: 'meta_title'},
            {selector: '#product_seo_meta_title .js-locale-input', type: 'meta_title'},
        ];

        let id_product = $('#form_id_product').val();

        appendGenerateFeaturesAction(id_product);

        elements.forEach(function (element) {
            const $wrapper = $(element.selector);
            $wrapper.each(function () {
                // detect if element has js-locale-input class
                let locale = '';
                if ($(this).hasClass('js-locale-input')) {
                    let classes = $(this).attr('class').split(' ');
                    // search for the last class that starts with js-locale- except js-locale-input
                    classes = classes.filter(function (item) {
                        return item.startsWith('js-locale-') && item !== 'js-locale-input';
                    });
                    let lastClass = classes[0];
                    locale = lastClass.match(/js-locale-(\w+)/)[1];
                } else {
                    locale = $(this).prop("class").match(/translation-label-(\w+)/)[1];
                }
                const actions = getActions(element.type);

                // don!t add meta_description and meta_title to appendAskButton
                if (element.type !== 'meta_description' && element.type !== 'meta_title') {
                    appendAskButton($(this), id_product, locale);
                }
                appendAction($(this), actions, id_product, locale);
            });
        });

    }

    if ($('body').hasClass('admincategories')) {
        entity = 'category';

        //const id_category = $('form[name=category]').data('id');
        const id_entity = window.location.href.match(/categories\/(\d+)/)[1];

        const elements = [
            {selector: '#category_description .tab-pane', type: 'description'},
            {selector: '[data-wizardaifield="meta_description"] .js-locale-input', type: 'meta_description'},
            {selector: '[data-wizardaifield="meta_title"] .js-locale-input', type: 'meta_title'}
        ];

        elements.forEach(function (element) {
            const $wrapper = $(element.selector);
            $wrapper.each(function () {
                // detect if element has js-locale-input class
                let locale = '';
                if ($(this).hasClass('js-locale-input')) {
                    let classes = $(this).attr('class').split(' ');
                    // search for the last class that starts with js-locale- except js-locale-input
                    classes = classes.filter(function (item) {
                        return item.startsWith('js-locale-') && item !== 'js-locale-input';
                    });
                    let lastClass = classes[0];
                    locale = lastClass.match(/js-locale-(\w+)/)[1];
                } else {
                    locale = $(this).prop("class").match(/translation-label-(\w+)/)[1];
                }
                const actions = getActions(element.type);
                if (element.type !== 'meta_description' && element.type !== 'meta_title') {
                    appendAskButton($(this), id_entity, locale);
                }
                appendAction($(this), actions, id_entity, locale);
            });
        });
    }

    if ($('#cms_page').length > 0) {
        entity = 'cms';

        //const id_entity = $('form[name=cms_page]').data('id');
        const id_entity = window.location.href.match(/cms-pages\/(\d+)/)[1];

        const elements = [
            {selector: '#cms_page_content .tab-pane', type: 'description'},
            {selector: '[data-wizardaifield="meta_description"] .js-locale-input', type: 'meta_description'},
            {selector: '[data-wizardaifield="meta_title"] .js-locale-input', type: 'meta_title'}
        ];

        elements.forEach(function (element) {
            const $wrapper = $(element.selector);
            $wrapper.each(function () {
                // detect if element has js-locale-input class
                let locale = '';
                if ($(this).hasClass('js-locale-input')) {
                    let classes = $(this).attr('class').split(' ');
                    // search for the last class that starts with js-locale- except js-locale-input
                    classes = classes.filter(function (item) {
                        return item.startsWith('js-locale-') && item !== 'js-locale-input';
                    });
                    let lastClass = classes[0];
                    locale = lastClass.match(/js-locale-(\w+)/)[1];
                } else {
                    locale = $(this).prop("class").match(/translation-label-(\w+)/)[1];
                }
                const actions = getActions(element.type);
                if (element.type !== 'meta_description' && element.type !== 'meta_title') {
                    appendAskButton($(this), id_entity, locale);
                }
                appendAction($(this), actions, id_entity, locale);
            });
        });
    }

    if ($('#cms_page_category').length > 0) {
        entity = 'cms_category';

        const id_entity = window.location.href.match(/cms-pages\/category\/(\d+)/)[1];

        const elements = [
            {selector: '[data-wizardaifield="description"] .js-locale-input', type: 'description'},
            {selector: '[data-wizardaifield="meta_description"] .js-locale-input', type: 'meta_description'},
            {selector: '[data-wizardaifield="meta_title"] .js-locale-input', type: 'meta_title'}
        ];

        elements.forEach(function (element) {
            const $wrapper = $(element.selector);
            $wrapper.each(function () {
                // detect if element has js-locale-input class
                let locale = '';
                if ($(this).hasClass('js-locale-input')) {
                    let classes = $(this).attr('class').split(' ');
                    // search for the last class that starts with js-locale- except js-locale-input
                    classes = classes.filter(function (item) {
                        return item.startsWith('js-locale-') && item !== 'js-locale-input';
                    });
                    let lastClass = classes[0];
                    locale = lastClass.match(/js-locale-(\w+)/)[1];
                } else {
                    locale = $(this).prop("class").match(/translation-label-(\w+)/)[1];
                }
                const actions = getActions(element.type);
                if (element.type !== 'meta_description' && element.type !== 'meta_title') {
                    appendAskButton($(this), id_entity, locale);
                }
                appendAction($(this), actions, id_entity, locale, element.type);
            });
        });
    }

    if ($('body').hasClass('adminmanufacturers')) {
        entity = 'manufacturer';

        const id_entity = window.location.href.match(/brands\/(\d+)/)[1];

        const elements = [
            {selector: '#manufacturer_short_description .tab-pane', type: 'short_description'},
            {selector: '#manufacturer_description .tab-pane', type: 'description'},
            {selector: '[data-wizardaifield="meta_description"] .js-locale-input', type: 'meta_description'},
            {selector: '[data-wizardaifield="meta_title"] .js-locale-input', type: 'meta_title'}
        ];

        elements.forEach(function (element) {
            const $wrapper = $(element.selector);
            $wrapper.each(function () {
                // detect if element has js-locale-input class
                let locale = '';
                if ($(this).hasClass('js-locale-input')) {
                    let classes = $(this).attr('class').split(' ');
                    // search for the last class that starts with js-locale- except js-locale-input
                    classes = classes.filter(function (item) {
                        return item.startsWith('js-locale-') && item !== 'js-locale-input';
                    });
                    let lastClass = classes[0];
                    locale = lastClass.match(/js-locale-(\w+)/)[1];
                } else {
                    locale = $(this).prop("class").match(/translation-label-(\w+)/)[1];
                }
                const actions = getActions(element.type);
                if (element.type !== 'meta_description' && element.type !== 'meta_title') {
                    appendAskButton($(this), id_entity, locale);
                }
                appendAction($(this), actions, id_entity, locale);
            });
        });
    }

    if ($('body').hasClass('adminsuppliers')) {
        entity = 'supplier';

        const id_entity = window.location.href.match(/suppliers\/(\d+)/)[1];

        const elements = [
            {selector: '#supplier_description .tab-pane', type: 'description'},
            {selector: '[data-wizardaifield="meta_description"] .js-locale-input', type: 'meta_description'},
            {selector: '[data-wizardaifield="meta_title"] .js-locale-input', type: 'meta_title'}
        ];

        elements.forEach(function (element) {
            const $wrapper = $(element.selector);
            $wrapper.each(function () {
                // detect if element has js-locale-input class
                let locale = '';
                if ($(this).hasClass('js-locale-input')) {
                    let classes = $(this).attr('class').split(' ');
                    // search for the last class that starts with js-locale- except js-locale-input
                    classes = classes.filter(function (item) {
                        return item.startsWith('js-locale-') && item !== 'js-locale-input';
                    });
                    let lastClass = classes[0];
                    locale = lastClass.match(/js-locale-(\w+)/)[1];
                } else {
                    locale = $(this).prop("class").match(/translation-label-(\w+)/)[1];
                }
                const actions = getActions(element.type);
                if (element.type !== 'meta_description' && element.type !== 'meta_title') {
                    appendAskButton($(this), id_entity, locale);
                }
                appendAction($(this), actions, id_entity, locale);
            });
        });
    }

    // not .btn-wizardai-modal
    $('.btn-wizardai:not(.btn-wizardai-modal)').each(function () {
        // get data-locale and data-action attributes
        const source = $(this).data('source');
        const locale = $(this).data('locale');
        const action = $(this).data('action');
        const id_entity = $(this).data('entity');
        const inputType = $(this).data('input-type');

        if (!$(this).hasClass('dropdown-toggle')) {
            $(this).click(function (e) {
                callWizardAPI($(this), id_entity, source, action, locale, inputType);
                e.preventDefault();
            });
        }
    });

    $('.dropdown-item-wizardai').each(function () {
        $(this).click(function (e) {
            const source = $(this).data('source');
            const locale = $(this).data('locale');
            const action = $(this).data('action');
            const id_entity = $(this).data('entity');
            const inputType = $(this).data('input-type');
            const button = $(this).closest('.btn-group-wizardai').find('.btn-wizardai-main');
            callWizardAPI(button, id_entity, source, action, locale, inputType);
            e.preventDefault();
        });
    });

    $(".btn-wizardai-modal").each(function() {
        $(this).click(function(e) {
            e.preventDefault();
            $("#wizardai-modal-askai").modal("show");
            // set data attributes to #wizardai-modal-askai button
            const source = $(this).data('source');
            const locale = $(this).data('locale');
            const id_entity = $(this).data('entity');
            const inputType = $(this).data('input-type');
            const button = $("#wizardaiModalAskAI");
            button.data('source', source);
            button.data('locale', locale);
            button.data('entity', id_entity);
            button.data('input-type', inputType);
            button.data('button', $(this));
        });
    });

    $('#wizardaiModalAskAI').click(function (e) {
        e.preventDefault();
        $("#wizardai-modal-askai").modal("hide");
        const source = $(this).data('source');
        const locale = $(this).data('locale');
        const id_entity = $(this).data('entity');
        const inputType = $(this).data('input-type');
        const button = $(this).data('button');
        callWizardAPI(button, id_entity, source, 'default', locale, inputType, $('#wizardai-modal-askai-textarea').val(), entity);
    });
}

function callWizardAPI(button, id_entity, source, action, locale, inputType, prompt = false, entity = false) {

    if (id_entity === 0 || id_entity === undefined) {
        $.growl.warning({message: 'Please save before using Wizard AI'})
        return false;
    }
    let text = '';
    if (inputType === 'tinyMCE')
    {
        text = tinyMCE.get(source).getContent();
    }
    else
    {
        text = $("#"+source).val();
    }
    // make button loading
    buttonHtmlRollback = button.html();
    buttonIsLoading(button)
    $.ajax({
        url: ajaxUrl + "&action=" + action + "&locale=" + locale + "&securityToken=" + securityToken + "&id_entity=" + id_entity,
        method: 'POST',
        data: {
            text: text,
            prompt: prompt,
            entity: entity
        },
        success: function (response) {
            response = JSON.parse(response);
            if (response.status) {
                let descriptions = response.descriptions;
                for (let lang in descriptions) {
                    if (inputType === 'tinyMCE')
                        tinyMCE.get(source).setContent(descriptions[lang]);
                    else
                        $('#'+source).val(descriptions[lang]);
                }
                $('#wizardai-modal-askai-textarea').val('');
                $.growl({message: response.message});

                if (response.features_not_found)
                {
                    // replace function string
                    alert('WizardAI suggest to create this following features in your Prestashop for this product : \n\r' + response.features_not_found.replaceAll('--', '\n\r'));
                }
            } else {
                $('#wizardai-modal-askai-textarea').val('');
                $.growl.error({message: response.error});
                console.error(response.error);
            }
            // Réactivation du bouton
            buttonIsNotLoading(button, buttonHtmlRollback);
        },
        error: function (response) {
            // Réactivation du bouton
            $('.btn-wizardai').removeAttr('disabled');
            $('#wizardai-modal-askai-textarea').val('');
            $.growl.error({message: 'An error occured'});
        }
    });
}

function buttonIsLoading(button)
{
    $('.btn-wizardai-main, .btn-wizardai.dropdown-toggle, .btn-wizardai-modal').each(function () {
        $(this).attr('disabled', 'disabled');
    });
    // get width with padding
    let originalWidth = button.outerWidth();
    let originalHeight = button.outerHeight();
    button.attr('disabled', 'disabled');
    button.html($('<div class="wizardai-loading"><div></div><div></div><div></div><div></div></div>'));
    button.css('width', originalWidth).css('height', originalHeight);
}

function buttonIsNotLoading(button, buttonHtmlRollback)
{
    $('.btn-wizardai-main, .btn-wizardai.dropdown-toggle, .btn-wizardai-modal').each(function () {
        $(this).removeAttr('disabled');
    });
    button.removeAttr('disabled');
    button.html(buttonHtmlRollback);
    button.css('width', '').css('height', '');
}
