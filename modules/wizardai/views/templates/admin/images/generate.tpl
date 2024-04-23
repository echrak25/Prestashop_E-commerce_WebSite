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
<div x-data="generateImageComponent()" class="w-full bg-white border rounded-lg shadow-sm p-7 border-neutral-200/60">
    <div class="flex items-center gap-5 mt-4 mb-10">
        <h1 class="text-4xl font-bold mt-0 mb-0">{l s='Generate' mod='wizardai'} <span class="text-blue-500">{l s='Image' mod='wizardai'}</span> </h1>
        <div x-data="{
            popoverOpen: false,
            popoverArrow: true,
            popoverPosition: 'bottom',
            popoverHeight: 0,
            popoverOffset: 8,
            popoverHeightCalculate() {
                this.$refs.popover.classList.add('invisible');
                this.popoverOpen=true;
                let that=this;
                $nextTick(function(){
                    that.popoverHeight = that.$refs.popover.offsetHeight;
                    that.popoverOpen=false;
                    that.$refs.popover.classList.remove('invisible');
                    that.$refs.popoverInner.setAttribute('x-transition', '');
                    that.popoverPositionCalculate();
                });
            },
            popoverPositionCalculate(){
                if(window.innerHeight < (this.$refs.popoverButton.getBoundingClientRect().top + this.$refs.popoverButton.offsetHeight + this.popoverOffset + this.popoverHeight)){
                    this.popoverPosition = 'top';
                } else {
                    this.popoverPosition = 'bottom';
                }
            }
        }"
             x-init="
            that = this;
            window.addEventListener('resize', function(){
                popoverPositionCalculate();
            });
            $watch('popoverOpen', function(value){
                if(value){ popoverPositionCalculate(); /*document.getElementById('width').focus();*/  }
            });
        "
             class="relative">

            <button x-ref="popoverButton" @click="popoverOpen=!popoverOpen" class="flex items-center justify-center w-10 h-10 bg-white border rounded-full shadow-sm cursor-pointer hover:bg-neutral-100 focus-visible:ring-gray-400 focus-visible:ring-2 focus-visible:outline-none active:bg-white border-neutral-200/70">
                <svg class="w-4 h-4" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 3C4.67157 3 4 3.67157 4 4.5C4 5.32843 4.67157 6 5.5 6C6.32843 6 7 5.32843 7 4.5C7 3.67157 6.32843 3 5.5 3ZM3 5C3.01671 5 3.03323 4.99918 3.04952 4.99758C3.28022 6.1399 4.28967 7 5.5 7C6.71033 7 7.71978 6.1399 7.95048 4.99758C7.96677 4.99918 7.98329 5 8 5H13.5C13.7761 5 14 4.77614 14 4.5C14 4.22386 13.7761 4 13.5 4H8C7.98329 4 7.96677 4.00082 7.95048 4.00242C7.71978 2.86009 6.71033 2 5.5 2C4.28967 2 3.28022 2.86009 3.04952 4.00242C3.03323 4.00082 3.01671 4 3 4H1.5C1.22386 4 1 4.22386 1 4.5C1 4.77614 1.22386 5 1.5 5H3ZM11.9505 10.9976C11.7198 12.1399 10.7103 13 9.5 13C8.28967 13 7.28022 12.1399 7.04952 10.9976C7.03323 10.9992 7.01671 11 7 11H1.5C1.22386 11 1 10.7761 1 10.5C1 10.2239 1.22386 10 1.5 10H7C7.01671 10 7.03323 10.0008 7.04952 10.0024C7.28022 8.8601 8.28967 8 9.5 8C10.7103 8 11.7198 8.8601 11.9505 10.0024C11.9668 10.0008 11.9833 10 12 10H13.5C13.7761 10 14 10.2239 14 10.5C14 10.7761 13.7761 11 13.5 11H12C11.9833 11 11.9668 10.9992 11.9505 10.9976ZM8 10.5C8 9.67157 8.67157 9 9.5 9C10.3284 9 11 9.67157 11 10.5C11 11.3284 10.3284 12 9.5 12C8.67157 12 8 11.3284 8 10.5Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>

            <div x-ref="popover"
                 x-show="popoverOpen"
                 x-init="setTimeout(function(){ popoverHeightCalculate(); }, 100);"
                 x-trap.inert="popoverOpen"
                 @click.away="popoverOpen=false;"
                 @keydown.escape.window="popoverOpen=false"
                 :class="{ 'top-0 mt-12' : popoverPosition == 'bottom', 'bottom-0 mb-12' : popoverPosition == 'top' }"
                 class="absolute w-[300px] max-w-lg -translate-x-1/2 left-1/2 z-50" x-cloak>
                <div x-ref="popoverInner" x-show="popoverOpen" class="w-full p-4 bg-white border rounded-md shadow-sm border-neutral-200/70" style="display: none;">
                    <div x-show="popoverArrow && popoverPosition == 'bottom'" class="absolute top-0 inline-block w-5 mt-px overflow-hidden -translate-x-2 -translate-y-2.5 left-1/2"><div class="w-2.5 h-2.5 origin-bottom-left transform rotate-45 bg-white border-t border-l rounded-sm"></div></div>
                    <div class="grid gap-4">
                        <div class="space-y-2">
                            <h4 class="font-medium leading-none">{l s='Settings' mod='wizardai'}</h4>
                            <p class="text-sm text-muted-foreground">{l s='Set the settings for the generation.' mod='wizardai'}</p>
                        </div>
                        <div class="grid gap-2">
                            <div class="grid items-center grid-cols-3 gap-4">
                                <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="width">Aspect <span class="text-blue-500 text-xs text-bold ml-1">ratio</span></label>
                                <div class="col-span-2">
                                    {include file="../_partials/select.tpl"
                                    name="aspect"
                                    xmodel="aspect"
                                    selectedItem=$selectedRatio
                                    selectableItems=$selectableRatios
                                    defaultText={l s="Select a format" mod="wizardai"}
                                    }
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-3 gap-4">
                                <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="width">Steps</label>
                                <div class="col-span-2">
                                    {include file="../_partials/select.tpl"
                                    name="steps"
                                    xmodel="steps"
                                    selectedItem=$selectedStep
                                    selectableItems=$selectableSteps
                                    defaultText={l s="Select number steps" mod="wizardai"}
                                    }
                                </div>
                            </div>
                            <div class="grid items-center grid-cols-3 gap-4">
                                <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="width">Guidance</label>
                                <div class="col-span-2">
                                    {include file="../_partials/select.tpl"
                                    name="guidance"
                                    xmodel="guidance"
                                    selectedItem=$selectedGuidance
                                    selectableItems=$selectableGuidances
                                    defaultText={l s="Select a guidance" mod="wizardai"}
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative w-full mb-6">
        <input
                type="text"
                id="Search"
                placeholder="Enter your prompt here..."
                class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm"
                x-model="prompt"
                @keydown.enter="generateImage()"
                x-bind:disabled="loading"
        />

        <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
        <button @click="generateImage()" type="button" class="text-gray-600 hover:text-gray-700">
          <span class="sr-only">{l s='Generate' mod='wizardai'}</span>
          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" x="0" y="0" viewBox="0 0 467.374 467.374" :style="'fill: ' + (prompt.length > 0 ? '#3182CE' : '#bbcdd2') + ';'" xml:space="preserve"><g><path d="M459.657 82.222c0-5.136-1.704-9.419-5.133-12.843l-56.531-56.531c-3.425-3.427-7.706-5.14-12.847-5.14-5.144 0-9.421 1.713-12.847 5.14L5.14 380.005C1.709 383.434 0 387.719 0 392.858c0 5.141 1.709 9.418 5.14 12.847l56.529 56.527c3.431 3.429 7.708 5.141 12.85 5.141 5.137 0 9.419-1.704 12.847-5.141l367.162-367.16c3.425-3.43 5.129-7.708 5.129-12.85zm-127.619 83.655-30.546-30.55 83.651-83.654 30.546 30.549-83.651 83.655zM65.384 73.087l8.564-27.978 27.977-8.564-27.977-8.566L65.384.001l-8.566 27.978-27.978 8.566 27.978 8.564zM139.61 108.494l17.133 55.961 17.133-55.961 55.959-17.133-55.959-17.131-17.133-55.961L139.61 74.23 83.651 91.361zM439.392 210.7l-8.563-27.977-8.562 27.977-27.98 8.565 27.98 8.565 8.562 27.975 8.563-27.975 27.982-8.565zM248.106 73.087l8.566-27.978 27.976-8.564-27.976-8.566L248.106.001l-8.562 27.978-27.98 8.566 27.98 8.564z" opacity="1"></path></g></svg>
        </button>
      </span>
    </div>

    <div class="w-full bg-white border rounded-lg shadow-sm p-7 border-neutral-200/60" x-data="galleryComponent()">
        <!-- ... Votre code existant ... -->

        <div class="wizardai-gallery grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            <div x-show="isLoading()" :style="{ aspectRatio: aspectRatioSqueletteScreen() }" class="skeleton-screen rounded-md"></div>
            <template x-for="(image, index) in images" :key="index">
                <div class="relative">
                    <img :src="image.public_path" alt="" class="w-full h-auto rounded-md cursor-pointer" @click="openModal(index)" />
                </div>
            </template>
            <div x-show="images.length === 0" class="col-span-1 sm:col-span-2 md:col-span-3 lg:col-span-4">
                <div class="flex justify-center">
                    {include file="../_partials/robot-smile-svg.tpl"}
                </div>
                <p class="text-center text-lg text-gray-500">{l s='Ready to bring your ideas to life? Write your first prompt and watch the magic happen!' mod='wizardai'} </p>
            </div>
        </div>

        <div x-show="isOpen" class="fixed inset-0 z-9000 flex items-center justify-center max-h-modal hidden" @click.self="closeModal()" :class="{ 'hidden': !isOpen }" x-cloak>
            <div class="bg-black bg-opacity-75 w-full h-full absolute inset-0" @click="isOpen = false"></div>
            <div class="flex gap-2 bg-white p-0 rounded-lg max-w-2xl w-full z-50">
                <div>
                    <img :src="selectedImage.public_path" class="max-w-full max-image-h-modal object-cover z-10 p-0 rounded-tl-lg rounded-bl-lg">
                </div>
                <div class="flex flex-col justify-between flex-1 p-2">
                    <div>
                        <div>
                            <h4 class="font-bold">{l s='Prompt:' mod='wizardai'}</h4>
                            <p x-text="selectedImage.prompt"></p>
                        </div>
                        <div>
                            <h4 class="font-bold">{l s='Aspect ratio:' mod='wizardai'}</h4>
                            <p x-text="selectedImage.aspect_ratio"></p>
                        </div>
                        <div>
                            <h4 class="font-bold">{l s='Steps:' mod='wizardai'}</h4>
                            <p x-text="selectedImage.steps"></p>
                        </div>
                        <div>
                            <h4 class="font-bold">{l s='Guidance:' mod='wizardai'}</h4>
                            <p x-text="selectedImage.guidances"></p>
                        </div>
                    </div>
                    <div class="flex gap-2 mt-3 p-1 justify-end">
                        <button @click="deleteImage(selectedIndex)" type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-red-600 transition-colors duration-100 bg-white border-2 border-red-600 rounded-md hover:text-white hover:bg-red-600">
                            <i class="material-icons mr-2">delete</i> {l s='Delete' mod='wizardai'}
                        </button>
                        <a :href="selectedImage.public_path" download type="button" class="hover:no-underline inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:shadow-outline focus:outline-none">
                            <i class="material-icons mr-2">cloud_download</i> {l s='Download' mod='wizardai'}
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
