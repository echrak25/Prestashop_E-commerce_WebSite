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
{if isset($form.data.id_wizard_character)}
    <div class="alert alert-warning">
        {l s='Please note: Modifying the prompt may lead to error or alter result of generation. Do not alter it unless you are certain about the changes you are making.' mod='wizardai'}
    </div>
{/if}
<div class="h-screen max-w-screen">
    <form action="{$form.action.url|escape:'htmlall':'UTF-8'}" method="post" enctype="multipart/form-data">
    <input name="isWizardAISubmit" type="hidden" value="{$isWizardAISubmit|escape:'htmlall':'UTF-8'}">
    {if isset($form.data.id_wizard_character)}
        <input type="hidden" name="id_wizard_character" value="{$form.data.id_wizard_character|escape:'htmlall':'UTF-8'}">
    {/if}
    <!-- Section de l'éditeur de prompt -->
    <div class="p-4 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-semibold mt-0 my-5">AI Character</h2>
        <div x-data="characterImageComponent({
            character_name: '{$form.data.name|escape:'javascript':'UTF-8'}',
            character_function: '{$form.data.function|escape:'javascript':'UTF-8'}',
            imageUrl: '{$form.data.image|escape:'javascript':'UTF-8'}'
        })" class="flex border-b pb-4 mb-4">
            <!-- Votre composant d'image -->
            <div class="flex items-center justify-center w-[300px] h-[300px] border-dashed border-2 relative mr-4">
                <template x-if="imageUrl">
                    <div class="w-[250px] h-[250px]">
                        <img :src="imageUrl" class="w-[250px] h-[250px]" width="250" height="250" alt="Portrait">
                    </div>
                </template>

                <!-- Effet de chargement -->
                <template x-if="loading">
                    <div
                            class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                            role="status">
                          <span
                                  class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                          >Loading...</span
                          >
                    </div>
                </template>

                <!-- Bouton "generate portrait" si aucune image -->
                <template x-if="!imageUrl && !loading">
                    <button
                            :disabled="!character_name || !character_function"
                            @click="generatePortrait"
                            {literal}:class="{'opacity-50 cursor-not-allowed': !character_name || !character_function}"{/literal}
                            class="tify-center px-4 py-2 text-sm font-medium tracking-wide transition-colors duration-100 bg-white border-2 rounded-md text-neutral-900 hover:text-white border-neutral-900 hover:bg-neutral-900 px-4 py-2"
                    >{l s='Generate Portrait' mod="wizardai"}</button>
                </template>
            </div>
            <!-- Vos champs d'entrée -->
            <div class="flex-1">
                <div class="mb-4">
                    <label for="character_name" class="block text-sm font-medium text-gray-700">{l s='Name' mod='wizardai'}</label>
                    <input x-model="character_name" type="text" id="character_name" name="character_name" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label for="character_function" class="block text-sm font-medium text-gray-700">{l s='Function' mod='wizardai'}</label>
                    <input x-model="character_function" type="text" id="character_function" name="character_function" class="mt-1 p-2 w-full border rounded-md">
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Scenario <span class="text-xs">{l s='(context, circumstances, etc.)' mod='wizardai'}</span></label>
            <div class="w-full block relative rounded overflow-hidden">
                <textarea id="editor" name="editor" rows="5" class="wizardai-prompteditor mt-1 p-2 w-full border rounded-md">{$form.data.content|escape:'htmlall':'UTF-8'}</textarea>
            </div>
        </div>
        <div class="flex justify-between">
            <div></div>
            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-green-600 rounded-md hover:bg-green-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-700 focus:shadow-outline focus:outline-none">
                Save
            </button>
        </div>
    </div>
    </form>
</div>
