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
<div x-data="dragDrop()">
    <div class="w-full bg-white border rounded-lg shadow-sm p-4 mb-4 border-neutral-200/60">
        <h2 class="text-4xl font-bold mt-0 mb-0 p-4">{l s='Remove' mod='wizardai'} <span class="text-blue-500">{l s='Background' mod='wizardai'}</span> </h2>
        <div class="flex gap-4 p-4">
            <!-- Zone de Drop à gauche -->
            <div class="flex flex-col justify-center w-2/3 border-2 border-dashed border-gray-300 p-6 text-center"
                 style="height: 350px;"
                 @dragover.prevent="dragOver"
                 @drop.prevent="handleDrop"
            >
                <button
                        @click="$refs.fileInput.click()"
                        class="mx-auto mb-1 inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none"
                >
                    {l s='CHOOSE A PHOTO' mod='wizardai'}
                </button>
                <input type="file" multiple @change="handleFiles" class="hidden" x-ref="fileInput">
                <span class="text-gray-700 text-sm">{l s='or Drag and Drop images' mod='wizardai'}</span>
            </div>

            <!-- Liste des Images à droite -->
            <div class="flex flex-col w-1/3 border shadow-sm rounded-lg">
                <div class="flex justify-between items-center py-2 px-3 border-b-2">
                    <h2 class="text-lg m-0">{l s='Images List' mod='wizardai'}</h2>
                    <!-- Afficher le coût total ici -->
                    {literal}<span class="rounded-full px-2.5 py-0.5 text-white text-xs font-semibold bg-black" x-text="`${files.length} credit(s)`"></span>{/literal}
                </div>
                <div class="flex-1 p-4 overflow-y-auto max-h-60">
                    <template x-for="file in files" :key="file.name">
                        <div class="flex items-center justify-between p-2 bg-gray-100 rounded-lg mb-2">
                            <div class="flex items-center">
                                <img :src="file.preview" class="h-12 w-12 object-cover mr-2" alt="">
                                <span x-text="file.name" class="text-sm"></span>
                            </div>
                            <button @click="removeFile(file)" class="text-xs text-red-500 hover:underline">
                                <i class="icon-trash mr-4"></i>
                            </button>
                        </div>
                    </template>
                </div>
                <!-- Cette div contenant les boutons est maintenant poussée vers le bas -->
                <div x-show="files.length > 0" class="mt-auto justify-end space-x-2">
                    <div class="mt-auto flex justify-end space-x-2 pb-4 px-4">
                        <button @click="clearFiles" class="py-1 px-3 inline-flex items-center justify-center text-sm font-medium tracking-wide text-red-500 transition-colors duration-100 rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-red-100 bg-red-50 hover:text-red-600 hover:bg-red-100">
                            {l s='Clear' mod='wizardai'}
                        </button>
                        <button
                                @click="processAllFiles"
                                class="py-1 px-3 inline-flex items-center justify-center text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:shadow-outline focus:outline-none">
                            {l s='Remove background' mod='wizardai'}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-white border rounded-lg shadow-sm p-4 border-neutral-200/60">
        <h2 class="text-3xl font-bold mt-0 mb-2 p-4">Library</h2>
        <div class="flex flex-wrap p-4 gap-2 overflow-x-auto">
            <!-- Dynamically add images here -->
            <template x-for="(imageUrl, index) in removedBackgroundImages" :key="index">
                <div class="flex flex-col items-center p-2 border-2 border-gray-300 rounded-lg cursor-pointer">
                    <div class="checkerboard-background p-4 w-24 h-24 flex items-center justify-center rounded-lg" {literal}@click="showModal({public_path: imageUrl}, index)"{/literal}>
                        <img :src="imageUrl" alt="Background Removed Image" class="max-w-full max-h-full">
                    </div>
                </div>
            </template>
            <!-- Squelettes de chargement -->
            <div class="flex gap-2">
                <template x-for="i in fileCount" :key="i">
                    <div class="relative p-2 border-2 border-gray-300 rounded-lg">
                        <!-- Vous pouvez personnaliser le squelette ici -->
                        <div class="loading-background w-24 h-24"></div>
                    </div>
                </template>
            </div>
            <!-- Repeat the above block for each image -->
            <div x-show="isOpen" class="fixed inset-0 z-9000 flex flex-col items-center justify-center hidden" @click.self="closeModal()" :class="{ 'hidden': !isOpen }" x-cloak>
                <div class="bg-black bg-opacity-75 w-full h-full absolute inset-0" @click.prevent="closeModal"></div>

                <div class="relative flex flex-col bg-white p-0 rounded-lg max-w-3xl w-full z-50">

                    <!-- Bouton de fermeture -->
                    <button @click.prevent="closeModal"
                            class="absolute top-0 right-0 m-4 p-2 z-50 cursor-pointer text-black bg-white border-1 hover:bg-gray-100 focus:outline-none rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="material-icons">close</i>
                    </button>

                    <!-- Bouton Download -->
                    <a :href="selectedOption" download
                       class="absolute top-0 left-0 m-4 p-2 cursor-pointer items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-blue-600  w-10 h-10 rounded-full hover:bg-blue-700 hover:no-underline focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:shadow-outline focus:outline-none z-50"
                       {literal}:class="{'inline-flex': selectedOption, 'hidden': !selectedOption}"{/literal}>
                        <i class="material-icons">cloud_download</i>
                    </a>

                    <div :class="{ 'loading-background': loading }" class="checkerboard-background p-3 flex justify-center">
                        <img :src="selectedImage.public_path" class="max-w-full max-image-h-modal object-cover z-10 p-0 rounded-tl-lg rounded-bl-lg">
                    </div>
                    <div class="flex flex-col justify-between flex-1 p-2">
                        <div>
                            <template x-if="!isAddingBackground">
                                <div class="flex p-1 justify-between">
                                    <div>
                                        <button @click="showAddBackground" type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-green-600 transition-colors duration-100 bg-white border-2 border-green-600 rounded-md hover:text-white hover:bg-green-600">
                                            <i class="material-icons mr-2">add</i> {l s='Add Background' mod='wizardai'} <span class="rounded-full px-2.5 py-0.5 text-white text-xs font-semibold bg-black ml-2">{l s='2 credits' mod='wizardai'}</span>
                                        </button>
                                    </div>
                                    <div class="flex gap-2 justify-end">
                                        <button @click="deleteBackgroundImage(selectedIndex)" type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-red-600 transition-colors duration-100 bg-white border-2 border-red-600 rounded-md hover:text-white hover:bg-red-600">
                                            <i class="material-icons mr-2">delete</i> {l s='Delete' mod='wizardai'}
                                        </button>
                                        <a :href="selectedImage.public_path" download type="button" class="hover:no-underline inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:shadow-outline focus:outline-none">
                                            <i class="material-icons mr-2">cloud_download</i> {l s='Download' mod='wizardai'}
                                        </a>
                                    </div>
                                </div>
                            </template>

                            <template x-if="isAddingBackground">
                                <div class="flex p-1 gap-2 justify-between">
                                    <button @click="resetPopup" type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
                                        Back
                                    </button>
                                    <div class="relative w-full">
                                        <input
                                                type="text"
                                                id="Search"
                                                placeholder="What do you want ?"
                                                class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm"
                                                x-model="backgroundInput"
                                                @keyup.enter="submitBackground"
                                                x-bind:disabled="loading"
                                        />

                                        <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                                            <button @click="submitBackground()" type="button" class="text-gray-600 hover:text-gray-700">
                                              <span class="sr-only">{l s='Add Background' mod='wizardai'}</span>
                                              <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" x="0" y="0" viewBox="0 0 467.374 467.374" :style="'fill: ' + (backgroundInput.length > 0 ? '#3182CE' : '#bbcdd2') + ';'" xml:space="preserve"><g><path d="M459.657 82.222c0-5.136-1.704-9.419-5.133-12.843l-56.531-56.531c-3.425-3.427-7.706-5.14-12.847-5.14-5.144 0-9.421 1.713-12.847 5.14L5.14 380.005C1.709 383.434 0 387.719 0 392.858c0 5.141 1.709 9.418 5.14 12.847l56.529 56.527c3.431 3.429 7.708 5.141 12.85 5.141 5.137 0 9.419-1.704 12.847-5.141l367.162-367.16c3.425-3.43 5.129-7.708 5.129-12.85zm-127.619 83.655-30.546-30.55 83.651-83.654 30.546 30.549-83.651 83.655zM65.384 73.087l8.564-27.978 27.977-8.564-27.977-8.566L65.384.001l-8.566 27.978-27.978 8.566 27.978 8.564zM139.61 108.494l17.133 55.961 17.133-55.961 55.959-17.133-55.959-17.131-17.133-55.961L139.61 74.23 83.651 91.361zM439.392 210.7l-8.563-27.977-8.562 27.977-27.98 8.565 27.98 8.565 8.562 27.975 8.563-27.975 27.982-8.565zM248.106 73.087l8.566-27.978 27.976-8.564-27.976-8.566L248.106.001l-8.562 27.978-27.98 8.566 27.98 8.564z" opacity="1"></path></g></svg>
                                            </button>
                                          </span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center gap-5 p-4 mt-2 z-50">
                    <template x-for="(option, index) in backgroundOptions" :key="index">
                        <img :src="option" @click="selectBackgroundImage(option)" class="h-20 w-20 object-cover mr-2 cursor-pointer rounded-lg transition transform scale-100 hover:scale-110" alt="Background option">
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
{literal}
<script>
    function dragDrop() {
        return {
            files: [],
            fileCount: 0,
            loading: false,
            removedBackgroundImages: [],
            isOpen: false,
            selectedImage: {
                public_path: ''
            },
            originalImageUrl: null,
            selectedImageSource: null,
            selectedIndex: null,
            isAddingBackground: false,
            backgroundInput: '',
            backgroundOptions: [],
            selectedOption: null,
            isProcessing: true,
            dragOver(event) {
                event.preventDefault();
            },
            resetPopup() {
                this.isAddingBackground = false;
                this.selectedOption = null;
                this.backgroundInput = '';
                this.backgroundOptions = [];
                if (this.originalImageUrl) {
                    this.selectedImage.public_path = this.originalImageUrl;
                }
            },
            handleDrop(event) {
                const files = event.dataTransfer.files;
                this.addFiles(files);
            },
            handleFiles(event) {
                this.addFiles(event.target.files);
            },
            addFiles(files) {
                for (const file of files) {
                    file.preview = URL.createObjectURL(file);
                    this.files.push(file);
                }
            },
            removeFile(fileToRemove) {
                this.files = this.files.filter(file => file !== fileToRemove);
                URL.revokeObjectURL(fileToRemove.preview);
            },
            clearFiles() {
                this.files.forEach(file => URL.revokeObjectURL(file.preview));
                this.files = [];
            },
            async processAllFiles() {
                // Enregistrer le nombre de fichiers et vider la liste
                this.fileCount = this.files.length;

                let credits = await this.getCurrentCredits();
                if (credits < this.fileCount) {
                    $.growl.error({message: "You don't have enough credits to process all images"});
                    return;
                }

                this.isProcessing = true;

                // Traitement pour chaque fichier
                for (let index = 0; index < this.fileCount; index++) {
                    this.removeBackground(index);
                }
                this.files = [];
                // N'oubliez pas de réinitialiser isProcessing sur false après le traitement
            },
            removeBackground(index) {
                const file = this.files[index];
                const formData = new FormData();
                formData.append('image', file);
                formData.append('ajax', true);
                formData.append('action', 'RemoveBackground');
                formData.append('ps_account_id', wizardai_ps_account_id); // Make sure this is defined
                //formData.append('token', ajaxWizardAIToken); // Make sure this is defined
                formData.append('securityToken', securityToken); // Make sure this is defined
                const ajaxUrlRemoveBackground = ajaxUrl+"&action=RemoveBackground&securityToken="+securityToken;
                // Set loading state for the specific file

                // AJAX request
                $.ajax({
                    url: ajaxUrlRemoveBackground,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: (data) => {
                        // Assuming the response is the URL of the processed image
                        this.isProcessing = false;
                        let that = this;
                        setTimeout(function() {
                            that.getRemovedBackgroundImages();
                        }, 15000);
                    },
                    error: (jqXHR, textStatus, errorThrown) => {
                        this.isProcessing = false;
                        console.error("Error during background removal:", errorThrown);
                    }
                });
            },
            getRemovedBackgroundImages() {
                // Assuming the server endpoint expects a GET request to retrieve images
                const ajaxUrlGetImages = ajaxUrl + "&action=RemovedBackground&securityToken=" + securityToken;
                this.loading = true; // Assuming you have a loading property to show a loader

                $.ajax({
                    url: ajaxUrlGetImages,
                    type: 'GET',
                    success: (response) => {
                        // Parse the JSON response
                        const result = JSON.parse(response);
                        if(result.status === "success" && result.type === "array") {
                            this.removedBackgroundImages = result.response.map(image => image); // Update the path as necessary
                        } else {
                            // Handle any errors or different statuses here
                            console.error('Failed to retrieve images:', result);
                        }
                        this.loading = false;
                        this.fileCount = 0;
                    },
                    error: (jqXHR, textStatus, errorThrown) => {
                        console.error("Error retrieving images:", errorThrown);
                        this.loading = false;
                        this.fileCount = 0;
                    }
                });
            },
            showModal(image, index) {
                this.selectedImage = image;
                this.originalImageUrl = image.public_path;
                this.selectedImageSource = { ...image };
                this.selectedIndex = index;
                this.isOpen = true;
            },
            closeModal() {
                this.isOpen = false;
                this.resetPopup();
            },
            showAddBackground() {
                this.isAddingBackground = true;
            },
            hideAddBackground() {
                this.isAddingBackground = false;
            },
            submitBackground() {
                // Assurez-vous que l'URL de l'image et d'autres données nécessaires sont disponibles
                if (!this.selectedImageSource || !this.selectedImageSource.public_path) {
                    console.error("No source image selected");
                    return;
                }

                let formData = new FormData();
                formData.append('image', this.selectedImageSource.public_path);
                formData.append('prompt', this.backgroundInput);
                formData.append('ajax', true);
                formData.append('action', 'AddBackground');
                formData.append('ps_account_id', wizardai_ps_account_id); // Make sure this is defined
                formData.append('securityToken', securityToken); // Make sure this is defined

                const ajaxUrlAddBackground = ajaxUrl + "&action=AddBackground&securityToken=" + securityToken;
                this.loading = true;

                $.ajax({
                    url: ajaxUrlAddBackground,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: (data) => {
                        this.loading = false;
                        data = JSON.parse(data);
                        if (data.status === "error") {
                            $.growl.error({message: data.response});
                            return;
                        }
                        this.backgroundOptions = data.response; // Stocker les options de fond
                    },
                    error: (jqXHR, textStatus, errorThrown) => {
                        console.error("Error during background addition:", errorThrown);
                        this.loading = false;
                    }
                });
            },
            selectBackgroundImage(imageUrl) {
                this.selectedImage.public_path = imageUrl;
                this.selectedOption = imageUrl;
            },
            deleteBackgroundImage(imageIndex) {
                const image = this.removedBackgroundImages[imageIndex];
                if (!image) {
                    console.error("No image to delete");
                    return;
                }

                const formData = new FormData();
                formData.append('image_path', image);
                formData.append('ajax', true);
                formData.append('action', 'DeleteRemoveBackground');
                formData.append('securityToken', securityToken); // Assurez-vous que ceci est défini

                const ajaxUrlDeleteBackground = ajaxUrl + "&action=RemoveBackground&securityToken=" + securityToken;
                $.growl({ title: "WizardAI", message: "Image will be deleted"});
                this.closeModal();
                $.ajax({
                    url: ajaxUrlDeleteBackground,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: (response) => {
                        console.log("Image deleted successfully", response);
                        $.growl.notice({ title: "WizardAI", message: "Image deleted successfully"});
                        // Mettre à jour l'interface utilisateur en conséquence
                        this.removedBackgroundImages.splice(imageIndex, 1);
                    },
                    error: (jqXHR, textStatus, errorThrown) => {
                        console.error("Error deleting image:", errorThrown);
                    }
                });
            },
            getCurrentCredits()
            {
                return fetch("https://wizardai.gekkode.com/api/v1/" + contextPsAccounts.shops[0].shops[0].uuid + "/credits")
                    .then(response => response.json())
                    .then(data => {
                        return data.credits;
                    })
                    .catch(error => {
                        console.error("Erreur lors de la récupération des crédits:", error);
                    });
            },
            init() {
                this.getRemovedBackgroundImages();
            }
        }
    }
</script>
{/literal}
