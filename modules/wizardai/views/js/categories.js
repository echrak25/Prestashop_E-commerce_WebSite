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
        $(function () {
            let bulkActionElement = '<a class="dropdown-item" href="#" onclick="bulkGenerateAction(this, \'generateBulkCategoriesContentWithSubCategories\');">\n' +
                '                     <img src="/modules/wizardai/logo.png" width="18" height="18" style="margin-right: .4rem; position: relative; top:-1px;">\n' +
                '                    Generate content with sub-categories\n' +
                '        </a>';

            $('.js-bulk-actions-btn').next().prepend(bulkActionElement);
        });
        $(function () {
            let bulkActionElement = '<a class="dropdown-item" href="#" onclick="bulkGenerateAction(this, \'generateBulkCategoriesContent\');">\n' +
                '                     <img src="/modules/wizardai/logo.png" width="18" height="18" style="margin-right: .4rem; position: relative; top:-1px;">\n' +
                '                    Generate content\n' +
                '        </a>';

            $('.js-bulk-actions-btn').next().prepend(bulkActionElement);
        });
    } else {
        // If jQuery is not loaded, wait for 100ms and try again
        setTimeout(WizardAI, 100);
    }
}

function bulkGenerateAction(element, action) {
    const form = $('#category_filter_form');

    const items = $('input:checked[name="category_id_category[]"]', form);

    if (items.length === 0) {
        return false;
    }

    let categories = [];
    for(let i = 0; i < items.length; i++) {
        categories.push(items[i].value);
    }

    /*if (cron_enabled == '0') {
        $.growl.warning({message: 'You need to enable cron task in WizardAI to use this action.'});
        return false;
    }*/
    $.growl.notice({message: 'Categories content generation are been added in cron task of WizardAI. They will be generated in few minutes.'});

    $.ajax({
        url: ajaxUrl + "&action=" + action + "&securityToken=" + securityToken,
        method: 'POST',
        data: {
            categories: categories,
            context_shop_id: context_shop_id
        },
        error: function (response) {
            if (response.status === 503)
            {
                $.growl.error({message: 'Prestashop is in maintenance mode'});
                return false;
            }
            $.growl.error({message: 'An error occured'});
        }
    });
    return false;
}

WizardAI();
