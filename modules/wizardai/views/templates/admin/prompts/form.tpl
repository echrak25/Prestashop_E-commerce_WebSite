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
{if isset($form.data.id_wizard_prompt)}
<div class="alert alert-warning">
    {l s='Please note: Modifying the prompt may lead to error or alter result of generation. Do not alter it unless you are certain about the changes you are making.' mod='wizardai'}
</div>
{/if}
<div class="h-screen max-w-screen"
     x-data="{
    form: form.data,
    instructions: JSON.parse(form.data.content) ?? [''],
    creditCostPerInstruction: {$creditCostPerInstruction|escape:'htmlall':'UTF-8'}, // Coût par instruction
    id_character: form.data.id_character, // ID du personnage
    countActiveLanguages: {$active_languages|escape:'htmlall':'UTF-8'}, // Nombre de langues activées
    translateResultChecked: {if $translate_result == 1}true{else}false{/if}, // Traduire le résultats
    addInstruction() {
        this.instructions.push('');
        this.$nextTick(() => {
            initializeCodeMirrorEditors();
        });
    },
    removeInstruction(index) {
        if (index > 0) {
            this.instructions.splice(index, 1);
        }
    },
    updateTranslateResultChecked() {
            this.translateResultChecked = !this.$refs.translateResultCheckbox.checked;
    },
    get totalCreditCost() {
            let cost = this.instructions.length * parseInt(this.creditCostPerInstruction);
             if (this.translateResultChecked) {
                cost = cost + this.countActiveLanguages;
            }
            return cost;
        }
    }
"
     @model-selected.window="creditCostPerInstruction = $event.detail.creditCost"
    >
    <form action="{$form.action.url|escape:'htmlall':'UTF-8'}" method="post" enctype="multipart/form-data">
        <input name="isWizardAISubmit" type="hidden" value="{$isWizardAISubmit|escape:'htmlall':'UTF-8'}">
        {if isset($form.data.id_wizard_prompt)}
            <input type="hidden" name="id_wizard_prompt" value="{$form.data.id_wizard_prompt|escape:'htmlall':'UTF-8'}">
        {/if}
        <input type="hidden" name="submitTemplate" value="1">
        <div class="grid grid-cols-3 gap-4">
            <!-- Section de l'éditeur de prompt -->
            <div class="col-span-2 p-4 bg-white shadow-md rounded-lg">
                <h2 class="text-2xl font-semibold mt-0 my-5">Prompt</h2>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md" x-model="form.name">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Character <span class="text-xs">(prompt system, how AI should behave)</span></label>
                    <div>
                        {include file="../_partials/select-character.tpl"
                        name="id_character"
                        xmodel="id_character"
                        selectedItem=$selectedCharacter
                        selectableItems=$selectableCharacters
                        defaultText={l s="Select a character" mod="wizardai"}
                        }
                    </div>
                </div>
                <div>
                    <template x-for="(instruction, index) in instructions" :key="index">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Instruction <span class="text-xs">(Base instructions for WizardAI, <strong>write only in english</strong>.)</span></label>
                            <div class="w-full block relative rounded overflow-hidden">
                                <textarea x-model="instructions[index]" name="content[]" rows="5" class="wizardai-prompteditor mt-1 p-2 w-full border rounded-md"></textarea>
                            </div>
                            <button x-show="instructions.length > 1" @click.prevent="removeInstruction(index)" type="button" class="mr-2 ml-auto align-self-end items-center justify-center px-2 py-1 text-xs font-medium tracking-wide text-red-600 transition-colors duration-100 bg-white border-2 border-red-600 rounded-md hover:text-white hover:bg-red-600">
                                Remove Instruction
                            </button>
                        </div>
                    </template>

                    <button  @click.prevent="addInstruction" type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-blue-500 transition-colors duration-100 rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-blue-100 bg-blue-50 hover:text-blue-600 hover:bg-blue-100">
                        {l s='Add Instruction' mod='wizardai'}
                    </button>
                </div>
            </div>
            <!-- Section des informations sur le prompt -->
            <div class="col-span-1 grid grid-cols-1 gap-4 content-start">
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <h2 class="text-2xl font-semibold mt-0 my-5">Field</h2>

                    <div class="mb-4">
                        <label for="label" class="block text-sm font-medium text-gray-700">Label of prompt</label>
                        {include file="../_partials/input-text-multilang.tpl" name="label" languages=$languages values=$form.data.label}
                    </div>

                    <div x-data="{ entity: '', field: '' }">
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Section</label>
                            {include file="../_partials/select.tpl"
                            name="entity"
                            xmodel="entity"
                            selectedItem=$selectedEntity
                            selectableItems=$selectedEntities
                            defaultText={l s="Select a section" mod="wizardai"}
                            }
                        </div>

                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Target field</label>

                            <div x-show="entity === 'product'">
                                {include file="../_partials/select.tpl"
                                name="field_product"
                                xmodel="field"
                                selectedItem=$selectedFieldProduct
                                selectableItems=$selectedFieldsProduct
                                defaultText={l s="Select a field" mod="wizardai"}
                                }
                            </div>
                            <div x-show="entity === 'category'">
                                {include file="../_partials/select.tpl"
                                name="field_category"
                                xmodel="field"
                                selectedItem=$selectedFieldCategory
                                selectableItems=$selectedFieldsCategory
                                defaultText={l s="Select a field" mod="wizardai"}
                                }
                            </div>
                            <div x-show="entity === 'manufacturer'">
                                {include file="../_partials/select.tpl"
                                name="field_manufacturer"
                                xmodel="field"
                                selectedItem=$selectedFieldManufacturer
                                selectableItems=$selectedFieldsManufacturer
                                defaultText={l s="Select a field" mod="wizardai"}
                                }
                            </div>
                            <div x-show="entity === 'supplier'">
                                {include file="../_partials/select.tpl"
                                name="field_supplier"
                                xmodel="field"
                                selectedItem=$selectedFieldSupplier
                                selectableItems=$selectedFieldsSupplier
                                defaultText={l s="Select a field" mod="wizardai"}
                                }
                            </div>
                            <div x-show="entity === 'cms'">
                                {include file="../_partials/select.tpl"
                                name="field_cms"
                                xmodel="field"
                                selectedItem=$selectedFieldCms
                                selectableItems=$selectedFieldsCms
                                defaultText={l s="Select a field" mod="wizardai"}
                                }
                            </div>
                            <div x-show="entity  === 'cms_category'">
                                {include file="../_partials/select.tpl"
                                name="field_cms_category"
                                xmodel="field"
                                selectedItem=$selectedFieldCms_category
                                selectableItems=$selectedFieldsCms_category
                                defaultText={l s="Select a field" mod="wizardai"}
                                }
                            </div>
                            <input type="hidden" name="field" :value="field">
                        </div>

                        <div class="mb-4">
                            {include file="../_partials/tree.tpl"
                            name='Categories'
                            objects=$categories
                            }
                        </div>
                    </div>

                </div>
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <h2 class="text-2xl font-semibold mt-0 my-5">AI</h2>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Model</label>
                        {include file="../_partials/select-model.tpl"
                        name="model"
                        xmodel="model"
                        selectedItem=$selectedModel
                        selectableItems=$selectableModel
                        defaultText={l s="Select a model" mod="wizardai" }
                        }
                    </div>

                    <div class="mb-4">
                        {include file='../_partials/range-slider.tpl' label='Temperature' description='Randomness of text outputs' name='temperature' min=0 max=2 step=0.1 default_value=$temperature}
                    </div>

                    <div class="mb-4">
                        {include file='../_partials/range-slider.tpl' label='Top P' description='Balance between diversity & quality' name='top_p' min=0 max=1 step=0.1 default_value=$top_p}
                    </div>

                    <div class="mb-4">
                        {include file='../_partials/range-slider.tpl' label='Repeat Penalty' description='How much to penalize tokens based on how frequently they occur in the text so far.' name='repeat_penalty' min=0 max=2 step=0.1 default_value=$repeat_penalty}
                    </div>
                </div>
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <h2 class="text-2xl font-semibold mt-0 my-5">Options</h2>

                    <div class="mb-4">
                        <div x-data="{ switchOn: form.translate_result }" class="flex items-center justify-start space-x-2 mb-2">
                            <input x-ref="translateResultCheckbox" id="thisId" type="checkbox" name="translate_result" class="hidden" :checked="switchOn">

                            <button
                                    x-ref="switchButton"
                                    type="button"
                                    @click="switchOn = !switchOn; updateTranslateResultChecked()"
                                    :class="switchOn ? 'bg-gray-600' : 'bg-neutral-200'"
                                    class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-10"
                                    x-cloak>
                                <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'" class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
                            </button>

                            <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('switch')"
                                   :class="{ 'text-gray-900': switchOn, 'text-gray-400': ! switchOn }"
                                   class="text-sm select-none"
                                   x-cloak>
                                {l s='Translate to all langages' mod='wizardai'}
                            </label>
                        </div>
                        <p>{l s='Translate result of prompt in each langages activated inside your Prestashop, this option increases the credit cost for each activated language.' mod='wizardai'}</p>
                    </div>

                    <div class="mb-4">
                        <div x-data="{ switchOn: form.add_to_cron }" class="flex items-center justify-start space-x-2 mb-2">
                            <input id="thisId" type="checkbox" name="add_to_cron" class="hidden" :checked="switchOn">

                            <button
                                    x-ref="switchButton"
                                    type="button"
                                    @click="switchOn = ! switchOn"
                                    :class="switchOn ? 'bg-gray-600' : 'bg-neutral-200'"
                                    class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-10"
                                    x-cloak>
                                <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'" class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
                            </button>

                            <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('switch')"
                                   :class="{ 'text-gray-900': switchOn, 'text-gray-400': ! switchOn }"
                                   class="text-sm select-none"
                                   x-cloak>
                                {l s='Add to Bulk Task Management' mod='wizardai'}
                            </label>
                        </div>
                        <p>{l s='When you request mass generation, add this prompt to the task list.' mod='wizardai'}</p>
                    </div>
                </div>
            </div>
            <div class="w-full col-span-3 p-4 bg-white shadow-md rounded-lg flex justify-between">
                <div class="flex items-center">
                    <span class="text-bold"><strong>Credit cost per request : <span x-text="totalCreditCost"></span></strong></span>
                </div>
                <div class="inline-flex items-center justify-center px-4 py-2 gap-5">
                    <div>
                        <div x-data="{ switchOn: form.is_active }" class="flex items-center justify-start space-x-2">
                            <input id="thisId" type="checkbox" name="is_active" class="hidden" :checked="switchOn">

                            <button
                                    x-ref="switchButton"
                                    type="button"
                                    @click="switchOn = ! switchOn"
                                    :class="switchOn ? 'bg-gray-600' : 'bg-neutral-200'"
                                    class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-10"
                                    x-cloak>
                                <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'" class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
                            </button>

                            <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('switch')"
                                   :class="{ 'text-gray-900': switchOn, 'text-gray-400': ! switchOn }"
                                   class="text-sm select-none"
                                   x-cloak>
                                {l s='Active' mod='wizardai'}
                            </label>
                        </div>
                    </div>
                    <button type="submit" name="submitTemplate" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-green-600 rounded-md hover:bg-green-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-700 focus:shadow-outline focus:outline-none">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
