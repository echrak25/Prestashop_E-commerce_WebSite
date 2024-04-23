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
<div x-data="{
                selectOpen: false,
                selectedItem: '{$languages[0].iso_code|escape:'javascript':'UTF-8'}',
                selectableItems: [
                    {foreach from=$languages item=lang}
                    {
                        title: '{$lang.name|escape:'javascript':'UTF-8'}',
                        iso_code: '{$lang.iso_code|capitalize|escape:'javascript':'UTF-8'}',
                        value: '{$lang.iso_code|escape:'javascript':'UTF-8'}',
                        disabled: false
                    },
                    {/foreach}
                ],
                selectableItemActive: '{$languages[0].iso_code|escape:'javascript':'UTF-8'}',
                selectDropdownPosition: 'bottom',
                selectableItemIsActive(item) {
                    return this.selectableItemActive === item.value;
                }
            }"
     x-init="
                $watch('selectOpen', function(){
                    if(!selectedItem){
                        selectableItemActive=selectableItems[0].value;
                    } else {
                        selectableItemActive=selectedItem;
                    }
                });
                $watch('selectedItem', function(newVal){
                    currentLang = newVal;
                });
            "
     @keydown.escape="if(selectOpen){ selectOpen=false; }"
     class="relative w-20 ml-4">

    <button x-ref="selectButton" @click.prevent="selectOpen=!selectOpen"
            :class="{ 'focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400' : !selectOpen, 'bg-neutral-200': selectOpen, 'hover:bg-neutral-100': !selectOpen }"
            class="relative min-h-[38px] flex items-center justify-between w-full py-2 pl-3 pr-10 text-left bg-white border rounded-md shadow-sm cursor-default border-neutral-200/70 focus:outline-none  text-sm">
        <span x-text="selectedItem ? selectableItems.find(item => item.value === selectedItem).iso_code : 'Select language'" class="truncate">{l s='Select language' mod='wizardai'}</span>
        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-gray-400"><path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd"></path></svg>
                                    </span>
    </button>

    <ul x-show="selectOpen"
        x-ref="selectableItemsList"
        @click.away="selectOpen = false"
        x-transition:enter="transition ease-out duration-50"
        x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100"
        :class="{ 'bottom-0 mb-10' : selectDropdownPosition == 'top', 'top-0 mt-10' : selectDropdownPosition == 'bottom' }"
        class="absolute w-full py-1 mt-1 overflow-auto text-sm bg-white rounded-md shadow-md max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
        x-cloak>

        <template x-for="item in selectableItems" :key="item.value">
            <li
                    @click="selectedItem=item.value; selectOpen=false; $refs.selectButton.focus();"
                    :class="{ 'bg-neutral-100 text-gray-900 hover:bg-neutral-50 active:bg-neutral-200' : selectableItemIsActive(item), 'hover:bg-neutral-50 active:bg-neutral-100': !selectableItemIsActive(item) }"
                    class="relative flex items-center h-full py-2 pl-8 text-gray-700 cursor-default select-none">
                <span class="block font-medium truncate" x-text="item.iso_code"></span>
            </li>
        </template>

    </ul>
</div>
