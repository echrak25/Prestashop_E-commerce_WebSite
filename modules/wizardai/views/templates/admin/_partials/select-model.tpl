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
<script>
    let {$name|escape:'javascript':'UTF-8'}SelectedItem = {$selectedItem}
    let {$name|escape:'javascript':'UTF-8'}SelectableItems = {$selectableItems}
</script>
<div x-data="{
        selectOpen: false,
        selectedItem: {$name|escape:'javascript':'UTF-8'}SelectedItem,  // Pass the selected item as a Smarty variable
        selectableItems: {$name|escape:'javascript':'UTF-8'}SelectableItems,  // Pass the selectable items as a JSON-encoded Smarty variable
        selectableItemActive: null,
        selectId: $id('select'),
        selectKeydownValue: '',
        selectKeydownTimeout: 1000,
        selectKeydownClearTimeout: null,
        selectDropdownPosition: 'bottom',
        selectableItemIsActive(item) {
            return this.selectableItemActive && this.selectableItemActive.value == item.value;
        },
        selectableItemActiveNext(){
            let index = this.selectableItems.indexOf(this.selectableItemActive);
            if(index < this.selectableItems.length-1){
                this.selectableItemActive = this.selectableItems[index+1];
                this.selectScrollToActiveItem();
            }
        },
        selectableItemActivePrevious(){
            let index = this.selectableItems.indexOf(this.selectableItemActive);
            if(index > 0){
                this.selectableItemActive = this.selectableItems[index-1];
                this.selectScrollToActiveItem();
            }
        },
        selectScrollToActiveItem(){
            if(this.selectableItemActive){
                activeElement = document.getElementById(this.selectableItemActive.value + '-' + this.selectId)
                newScrollPos = (activeElement.offsetTop + activeElement.offsetHeight) - this.$refs.selectableItemsList.offsetHeight;
                if(newScrollPos > 0){
                    this.$refs.selectableItemsList.scrollTop = newScrollPos;
                } else {
                    this.$refs.selectableItemsList.scrollTop = 0;
                }
            }
        },
        selectKeydown(event){
            if (event.keyCode >= 65 && event.keyCode <= 90) {

                this.selectKeydownValue += event.key;
                selectedItemBestMatch = this.selectItemsFindBestMatch();
                if(selectedItemBestMatch){
                    if(this.selectOpen){
                        this.selectableItemActive = selectedItemBestMatch;
                        this.selectScrollToActiveItem();
                    } else {
                        this.selectedItem = this.selectableItemActive = selectedItemBestMatch;
                    }
                }

                if(this.selectKeydownValue != ''){
                    clearTimeout(this.selectKeydownClearTimeout);
                    this.selectKeydownClearTimeout = setTimeout(() => {
                        this.selectKeydownValue = '';
                    }, this.selectKeydownTimeout);
                }
            }
        },
        selectItemsFindBestMatch(){
            typedValue = this.selectKeydownValue.toLowerCase();
            var bestMatch = null;
            var bestMatchIndex = -1;
            for (var i = 0; i < this.selectableItems.length; i++) {
                var title = this.selectableItems[i].title.toLowerCase();
                var index = title.indexOf(typedValue);
                if (index > -1 && (bestMatchIndex == -1 || index < bestMatchIndex) && !this.selectableItems[i].disabled) {
                    bestMatch = this.selectableItems[i];
                    bestMatchIndex = index;
                }
            }
            return bestMatch;
        },
        selectPositionUpdate(){
            selectDropdownBottomPos = this.$refs.selectButton.getBoundingClientRect().top + this.$refs.selectButton.offsetHeight + parseInt(window.getComputedStyle(this.$refs.selectableItemsList).maxHeight);
            if(window.innerHeight < selectDropdownBottomPos){
                this.selectDropdownPosition = 'top';
            } else {
                this.selectDropdownPosition = 'bottom';
            }
        }
    }"
     x-init="
        $watch('selectOpen', function(){
            if(!selectedItem){
                selectableItemActive=selectableItems[0];
            } else {
                selectableItemActive=selectedItem;
            }
            setTimeout(function(){
                selectScrollToActiveItem();
            }, 10);
            selectPositionUpdate();
            window.addEventListener('resize', (event) => { selectPositionUpdate(); });
        });
    "
     @keydown.escape="if(selectOpen){ selectOpen=false; }"
     @keydown.down="if(selectOpen){ selectableItemActiveNext(); } else { selectOpen=true; } event.preventDefault();"
     @keydown.up="if(selectOpen){ selectableItemActivePrevious(); } else { selectOpen=true; } event.preventDefault();"
     @keydown.enter="selectedItem=selectableItemActive; selectOpen=false;"
     @keydown="selectKeydown($event);"
     class="relative w-full">

    <button  x-ref="selectButton" @click.prevent="selectOpen=!selectOpen"
             :class="{ 'focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400' : !selectOpen }"
             class="relative min-h-[38px] flex items-center justify-between w-full py-2 pl-3 pr-10 text-left bg-white border rounded-md shadow-sm cursor-default border-neutral-200/70 focus:outline-none  text-sm">
        <span x-text="selectedItem.title ? selectedItem.title : '{$defaultText|escape:'javascript':'UTF-8'}'" class="truncate">{$defaultText|escape:'htmlall':'UTF-8'}</span>
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
                    @click="selectedItem = item; selectOpen = false; $refs.selectButton.focus(); $refs.modelInput._x_model.set(selectedItem.value); $dispatch('model-selected', { creditCost: selectedItem.credit_cost_model })"
                    :id="item.value + '-' + selectId"
                    :data-disabled="item.disabled"
                    :class="{ 'bg-neutral-100 text-gray-900' : selectableItemIsActive(item), '' : !selectableItemIsActive(item) }"
                    @mousemove="selectableItemActive=item"
                    class="x-option relative flex items-center h-full py-2 pl-8 text-gray-700 cursor-default select-none data-[disabled]:opacity-50 data-[disabled]:pointer-events-none">
                <svg x-show="selectedItem.value==item.value" class="absolute left-0 w-4 h-4 ml-2 stroke-current text-neutral-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <span class="block font-medium truncate" x-text="item.title"></span>
            </li>
        </template>

    </ul>

    {if !empty($xmodel)}
        <input type="hidden" x-ref="modelInput" name="{$name|escape:'htmlall':'UTF-8'}" x-model="{$xmodel|escape:'htmlall':'UTF-8'}" x-init="{$xmodel|escape:'javascript':'UTF-8'} = selectedItem.value" :value="selectedItem.value">
    {else}
        <input type="hidden" name="{$name|escape:'htmlall':'UTF-8'}" :value="selectedItem.value">
    {/if}

</div>
