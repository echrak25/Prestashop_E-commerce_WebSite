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

// Fonction pour décocher toutes les cases et masquer les catégories
function hideAndUncheckCategories() {
    // Décocher toutes les cases
    uncheckAllAssociatedCategories($('#id_category'));
    // Masquer les catégories
    $('#id_category').closest('.form-group').hide();
}

function showCategories()
{
    $('#id_category').closest('.form-group').show();
}

function characterImageComponent(defaults) {
    return {
        imageUrl: defaults.imageUrl || null,
        loading: false,
        character_name: defaults.character_name || '',
        character_function: defaults.character_function || '',

        generatePortrait() {
            // Définir l'état de chargement
            this.loading = true;
            if (this.character_name === '') {
                alert('Please enter a name');
                this.loading = false;
                return;
            }
            if (this.character_function === '') {
                alert('Please enter a function');
                this.loading = false;
                return;
            }

            // Préparez les paramètres de la requête AJAX
            const params = {
                ajax: true,
                action: 'generatePortrait',
                ps_account_id: wizardai_ps_account_id,
                name: this.character_name,
                function: this.character_function,
                securityToken: securityToken,
            };

            // Exécutez la requête AJAX
            $.ajax({
                url: ajaxUrl,
                data: params,
                type: 'POST',
                success: (data) => {
                    data = JSON.parse(data);
                    this.imageUrl = data.response;
                    this.loading = false;
                },
                error: (jqXHR, textStatus, errorThrown) => {
                    console.error("Erreur lors de la génération du portrait:", errorThrown);
                    this.loading = false;
                }
            });
        }
    }
}

document.addEventListener('alpine:init', () => {
    if (typeof imageList !== 'undefined') {
        Alpine.store('gallery', {
            images: imageList,
            isLoading: false,
            aspectRatio: 1,
            addImage(image) {
                // to push image, image must be first in array
                this.images.unshift(image);
            },
            setSqueletteSize(aspectRatio) {
                this.aspectRatio = aspectRatio;
            },
            toggleLoading() {
                this.isLoading = !this.isLoading;
            }
        });
    }
});

function generateImageComponent() {
    return {
        imageUrl: null,
        loading: false,
        prompt: '',
        aspect: '1:1',
        steps: 25,
        guidance: '7.5',
        async generateImage() {

            let credits = await this.getCurrentCredits();

            if (credits < 1) {
                $.growl.error({message: 'You don\'t have enough credits to generate an image.'});
                return;
            }

            if (this.prompt == '' || this.prompt == null) {
                $.growl.warning({message: 'Please enter a prompt'});
                return;
            }

            // Définir l'état de chargement
            this.loading = true;
            this.updateSqueletteSize();
            // Vérifier les paramètres requis
            if (this.prompt === '') {
                alert('Please enter a prompt');
                this.loading = false;
                return;
            }
            Alpine.store('gallery').toggleLoading();
            // Préparer les paramètres de la requête AJAX
            const params = {
                ajax: true,
                action: 'generateImage',
                securityToken: securityToken,
                ps_account_id: wizardai_ps_account_id,
                prompt: this.prompt,
                aspect: this.aspect,
                steps: this.steps,
                guidance: this.guidance,
            };

            // Effectuer la requête AJAX
            $.ajax({
                url: ajaxUrl,
                data: params,
                type: 'POST',
                success: (data) => {
                    // Vérifier si la réponse contient une URL d'image valide
                    // convert data into array
                    data = JSON.parse(data);
                    Alpine.store('gallery').addImage(JSON.parse(data.response));
                    Alpine.store('gallery').toggleLoading();
                    this.loading = false;
                },
                error: (jqXHR, textStatus, errorThrown) => {
                    console.error('Erreur lors de la génération de l\'image:', errorThrown);
                    this.loading = false;
                }
            });
        },
        updateSqueletteSize() {
            let aspectRatio

            switch (this.aspect) {
                case '16:9':
                    aspectRatio = "16 / 9";
                    break;
                case '3:2':
                    aspectRatio = "3 / 2";
                    break;
                case '5:4':
                    aspectRatio = "5 / 4";
                    break;
                case '1:1':
                    aspectRatio = "1";
                    break;
                case '4:5':
                    aspectRatio = "4 / 5";
                    break;
                case '2:3':
                    aspectRatio = "2 / 3";
                    break;
                case '7:9':
                    aspectRatio = "7 / 9";
                    break;
                case '9:16':
                    aspectRatio = "9 / 16";
                    break;
            }
            Alpine.store('gallery').setSqueletteSize(aspectRatio);
        },
        getCurrentCredits()
        {
            // Assurez-vous que psToken est disponible dans cette portée. Sinon, vous devez le passer de manière appropriée.
            const headers = new Headers({
                'Authorization': 'Basic ' + psToken
            });
            return fetch("https://wizardai.gekkode.com/api/v1/" + contextPsAccounts.shops[0].shops[0].uuid + "/credits", { headers: headers })
                .then(response => response.json())
                .then(data => {
                    return data.credits;
                })
                .catch(error => {
                    console.error("Erreur lors de la récupération des crédits:", error);
                });
        }
    }
}

function galleryComponent() {
    return {
        images: Alpine.store('gallery').images,
        isOpen: false,
        imageWidthSqueletteScreen: Alpine.store('gallery').imageWidthSqueletteScreen,
        imageHeightSqueletteScreen: Alpine.store('gallery').imageHeightSqueletteScreen,
        selectedIndex: null,
        addImageToGallery(image) {
            this.images.push(image);
        },
        aspectRatioSqueletteScreen: () => Alpine.store('gallery').aspectRatio,
        isLoading: () => Alpine.store('gallery').isLoading,
        openModal(index) {
            this.isOpen = true;
            this.selectedIndex = index;
        },
        closeModal() {
            this.isOpen = false;
            this.selectedIndex = null;
        },
        deleteImage(index) {
            const imageToDelete = this.images[index];
            const imageId = imageToDelete.id_wizard_image; // Assurez-vous que vous avez une propriété unique pour chaque image, comme un ID
            const that = this;

            // Envoyer une requête AJAX pour supprimer l'image
            $.ajax({
                url: ajaxUrl, // Remplacez ajaxUrl par l'URL de votre script PHP
                type: 'POST',
                data: {
                    ajax: true,
                    action: 'deleteImage',
                    id_wizardai_image: imageId,
                    securityToken: securityToken,
                },
                success: function(response) {
                    // Supprimer l'image de la liste d'images AlpineJS
                    that.images.splice(index, 1);
                    // close modal if that.images is empty
                    if (that.images.length === 0) {
                        that.closeModal();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Erreur lors de la suppression de l\'image :', errorThrown);
                }
            });
        },
        get selectedImage() {
            if (this.selectedIndex !== null) {
                return this.images[this.selectedIndex];
            }
            return {};
        }
    }
}

function checkboxTreeComponent(name, objects) {
    return {
        name: name,
        objects: objects,
        selectedObjects: [],
        expandedObjects: {},

        init() {
            this.objects.forEach(object => {
                this.expandedObjects[object.id] = false;
            });
        },

        toggle(objectId) {
            this.expandedObjects[objectId] = !this.expandedObjects[objectId];
        },

        isExpanded(objectId) {
            return this.expandedObjects[objectId] || false;
        },

        renderObject(object) {
            let childrenHtml = object.children.map(child => this.renderObject(child)).join('');

            // Utilisation d'une expression ternaire pour gérer l'attribut checked
            let checkedAttribute = object.checked ? 'checked' : '';
            console.log(object);
            return `
                <div>
                    <div class="inline-flex items-center gap-2">
                        <label for="${this.name}[${object.id}]" class="inline-flex items-center gap-2">
                            <input type="checkbox" id="${this.name}[${object.id}]" name="${this.name}[]" value="${object.id}" class="m-0" ${checkedAttribute}>
                            <span>${object.name}</span>
                        </label>
                        <button x-show="${object.children.length}" @click.prevent="toggle(${object.id})" class="icon-button" style="margin-top: -3px;">
                            <i :class="isExpanded(${object.id}) ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
                        </button>
                    </div>
                    <div x-show="isExpanded(${object.id})" class="ml-4">
                        ${childrenHtml}
                    </div>
                </div>
            `;
        }
    };
}
