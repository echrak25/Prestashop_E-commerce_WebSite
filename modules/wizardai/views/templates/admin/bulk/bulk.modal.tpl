{**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 *}
<div <div x-data="modalBulk()" class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
    <div class="relative flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">{l s='Bulk Generation Initiation' mod='wizardai'}</h2>
        <!-- Bouton pour fermer la modal -->
        <button @click="isOpenModal = false" class="absolute top-0 right-0 m-4 p-2 z-50 cursor-pointer text-black bg-white border-1 hover:bg-gray-100 focus:outline-none rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
            <i class="material-icons">close</i>
        </button>
    </div>

    <!-- Contenu de la modal -->
    <div>
        <div class="mb-4">
            <div class="mt-2">
                <div class="mb-4">
                    <label class="text-sm font-semibold">{l s='Select Shop' mod='wizardai'} :</label>
                    <div x-data="{
    radioGroupSelectedValue: 1,
}" class="grid grid-cols-2 gap-2 space-y-3">
                        <template x-for="(option, index) in shopRadioGroupOptions" :key="index">
                            <label @click="id_shop = option.value" class="flex items-center p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-50 border-neutral-200/70">
                                <input type="radio" name="id_shop" :value="option.value" class="text-gray-900 translate-y-px focus:ring-gray-700 mt-0" :checked="radioGroupSelectedValue === option.value"/>
                                <span class="relative flex flex-col align-center text-left space-y-1.5 leading-none">
                                    <span x-text="option.title" class="text-sm font-semibold"></span>
                                </span>
                            </label>
                        </template>
                    </div>
                </div>
        </div>
        <div class="mb-4">
                <label class="text-sm font-semibold">{l s='Select Generation Type' mod='wizardai'} :</label>
                <div x-data="{
    radioGroupSelectedValue: 'products',
    radioGroupOptions: [
        {
            title: 'Products',
            value: 'products'
        },
        {
            title: 'Categories',
            value: 'categories'
        }
    ]
}" class="grid grid-cols-2 gap-2 space-y-3">
                    <template x-for="(option, index) in radioGroupOptions" :key="index">
                        <label @click="generateType = option.value" class="flex items-center p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-50 border-neutral-200/70">
                            <input type="radio" name="generate_type" :value="option.value" class="text-gray-900 translate-y-px focus:ring-gray-700 mt-0" :checked="radioGroupSelectedValue === option.value"/>
                            <span class="relative flex flex-col align-center text-left space-y-1.5 leading-none">
                                <span x-text="option.title" class="text-sm font-semibold"></span>
                            </span>
                        </label>
                    </template>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold">{l s='Generation Scope' mod='wizardai'} :</label>
            <div x-data="{
    radioGroupSelectedValue: 'all',
    radioGroupOptions: [
        {
            title: 'All Active',
            value: 'all'
        },
        {
            title: 'All Active & Disabled',
            value: 'all_with_disabled'
        }
    ]
}" class="grid grid-cols-2 gap-2 space-y-3">
                <template x-for="(option, index) in radioGroupOptions" :key="index">
                    <label @click="generateScope = option.value" class="flex items-center p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-50 border-neutral-200/70">
                        <input type="radio" name="generate_scope" :value="option.value" class="text-gray-900 translate-y-px focus:ring-gray-700 mt-0" :checked="radioGroupSelectedValue === option.value"/>
                        <span class="relative flex flex-col align-center text-left space-y-1.5 leading-none">
                <span x-text="option.title" class="text-sm font-semibold"></span>
            </span>
                    </label>
                </template>
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold">{l s='Filter Options' mod='wizardai'} :</label>
            <div x-data="{
    radioGroupSelectedValue: 'generate_all_fields',
    radioGroupOptions: [
        {
            title: 'None',
            value: 'generate_all_fields'
        },
        {
            title: 'Only empty fields',
            value: 'generate_only_empty_fields'
        },
        {
            title: 'Only plain text',
            value: 'generate_only_plain_text'
        }
    ]
}" class="grid grid-cols-3 gap-2 space-y-3">
                <template x-for="(option, index) in radioGroupOptions" :key="index">
                    <label @click="generateFilter = option.value" class="flex items-center p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-50 border-neutral-200/70">
                        <input type="radio" name="generate_filter" :value="option.value" class="text-gray-900 translate-y-px focus:ring-gray-700 mt-0" :checked="radioGroupSelectedValue === option.value"/>
                        <span class="relative flex flex-col align-center text-left space-y-1.5 leading-none">
                            <span x-text="option.title" class="text-sm font-semibold"></span>
                        </span>
                    </label>
                </template>
            </div>
        </div>

        <div class="flex justify-between mt-4">
            <span></span>
            <button @click="startBulkGeneration" :disabled="isLoading" :class="{ 'cursor-not-allowed opacity-50': isLoading }" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none disabled:bg-blue-300">
                <span :class="{ 'hidden': isLoading }">{l s='Start Generation' mod='wizardai'}</span>
                <span x-show="isLoading" :class="{ 'inline-flex': isLoading, 'hidden': !isLoading}" class="flex items-center" x-cloak>
                   <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Loading...
                </span>
            </button>

        </div>
    </div>
</div>
{literal}
    <script>
        function modalBulk() {
            return {
                isLoading: false,
                generateType: 'products',
                generateScope: 'all',
                generateFilter: 'generate_all_fields',
                id_shop: 1,
                shopRadioGroupOptions: shopRadioGroupOptions,
                startBulkGeneration() {
                    this.isLoading = true;
                    const formData = new FormData();
                    formData.append('action', 'BulkGeneration');
                    formData.append('generate_type', this.generateType);
                    formData.append('generate_scope', this.generateScope);
                    formData.append('generate_filter', this.generateFilter);
                    formData.append('id_shop', this.id_shop);
                    formData.append('securityToken', securityToken); // Assurez-vous que ceci est défini

                    const ajaxUrlBulkGeneration = ajaxUrl + "&action=BulkGeneration&securityToken=" + securityToken;

                    $.ajax({
                        url: ajaxUrlBulkGeneration,
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: (response) => {
                            this.$dispatch('add-to-queue', {taskCounts: response});
                            $.growl.notice({title: "WizardAI", message: "Bulk generation started successfully"})
                            this.$dispatch('close-modal');
                            this.isLoading = false;
                            // Traitez la réponse ici
                        },
                        error: (jqXHR, textStatus, errorThrown) => {
                            $.growl.error({title: "WizardAI", message: "Bulk generation started successfully"})
                            this.isLoading = false;
                        }
                    });
                }
            }
        }
    </script>
{/literal}
