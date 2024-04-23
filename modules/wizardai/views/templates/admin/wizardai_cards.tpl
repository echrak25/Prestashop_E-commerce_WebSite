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
<div class="grid grid-cols-4 w-full gap-4">
    <div class="wizardai-card">
        <h5 class="text-xl font-bold leading-none tracking-tight text-neutral-900 mt-0">{l s='Remaining credits' mod='wizardai'}</h5>
        <div id="loaderCredits" class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status">
            <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
        <p id="textCredits" class="hidden text-xl mb-0 text-neutral-500"></p>
    </div>

    <div class="wizardai-card">
        <h5 class="text-xl font-bold leading-none tracking-tight text-neutral-900 mt-0">{l s='Requirement' mod='wizardai'}</h5>
        <div>
        <p class="text-lg mb-0 text-neutral-500 flex items-center">
            {if $is_ssl}
                <i class="material-icons wizardai-icons-round wizardai-icon-check" style="font-size: 1rem;">check</i>
                {l s='SSL Enabled' mod='wizardai'}
            {else}
                <i class="material-icons wizardai-icons-round wizardai-icon-cancel text-center" style="font-size: 1rem;">&#10006;</i>
                 {l s='SSL Not Enabled' mod='wizardai'}
            {/if}
        </p>
        {if !$is_ssl}
            <p class="mb-0">{l s='You need to enable SSL to use bulk task generation' mod='wizardai'}</p>
        {/if}
        </div>
    </div>

    <div class="wizardai-card">
        <h5 class="text-xl font-bold leading-none tracking-tight text-neutral-900 mt-0">{l s='Announcements' mod='wizardai'}</h5>
        <p id="announcements" class="text-sm mb-0 text-neutral-500 flex items-center"></p>
    </div>

    <div class="wizardai-card">
        <h5 class="text-xl font-bold leading-none tracking-tight text-neutral-900 mt-0">{l s='Report a bug' mod='wizardai'}</h5>
        <div>
            <p class="text-sm mb-0 text-neutral-500 flex items-center">
                {l s='Contact us on' mod='wizardai'} <a class="ml-1" href="https://addons.prestashop.com/en/contact-us?id_product=90521" target="_blank">Prestashop Addons</a>
            </p>
        </div>
    </div>
</div>

<div id="nocredits" class="hidden mt-4">
    <div class="flex items-center p-4 border border-red-500 bg-red-100" style="width: 100%">
        <i class="material-icons wizardai-icons-round wizardai-icon-cancel text-center" style="font-size: 1rem; line-height: 12px;">&#10006;</i>
        <p class="text-red-400 font-bold mb-0"> {l s='Unfortunately, you have run out of credits. Wait until next month or contact us on ' mod='wizardai'} <a href="https://addons.prestashop.com/en/contact-us?id_product=90521" target="_blank">{l s='Prestashop Addons' mod='wizardai'}</a> {l s='to obtain more credits and continue using our services.' mod='wizardai'}</p>
    </div>
</div>

<!-- La Modal -->
<div id="announcementModal" class="wizardai-modal" style="display:none;">
    <!-- Contenu de la modal -->
    <div class="wizardai-modal-content">
        <span class="close">&times;</span>
        <p id="modalTitleAnnoncements" class="text-lg font-bold"></p>
        <div id="modalBody"></div>
    </div>
</div>

<script>
    function fetchCredits() {
        fetch("https://wizardai.gekkode.com/api/v1/" + contextPsAccounts.shops[0].shops[0].uuid + "/credits",
            {
                headers:  {
                    'Authorization': 'Basic '+psToken
                },
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById("textCredits").textContent = data.credits;
                document.getElementById("loaderCredits").classList.add("hidden");
                document.getElementById("textCredits").classList.remove("hidden");
                if (data.credits <= 0) {
                    document.getElementById("nocredits").classList.remove("hidden");
                }
            })
            .catch(error => {
                console.error("Erreur lors de la récupération des crédits:", error);
            });
    }

    function fetchAnnouncements() {
        fetch("https://wizardai.gekkode.com/api/v1/announcements", {
            headers:
                {
                    'Authorization': 'Basic '+psToken
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const notificationElement = document.getElementById("announcements");
                if (typeof data.announcements === "string") {
                    notificationElement.textContent = data.announcements;
                } else {
                    notificationElement.textContent = data.announcements.title;
                    // Ajoute une classe pour indiquer qu'il s'agit d'un lien (si nécessaire)
                    notificationElement.classList.add("wizardai-link");
                    // Ajoute l'écouteur d'événements
                    notificationElement.addEventListener('click', function() {
                        // Affiche une popup avec le détail de l'annonce
                        showAnnouncementDetails(data.announcements);
                    });
                }
            })
            .catch(error => {
                console.error("Erreur lors de la récupération des annonces:", error);
            });
    }

    document.addEventListener("DOMContentLoaded", function() {
        fetchCredits();
        fetchAnnouncements();
        setInterval(fetchCredits, 60000);
    });

    function showAnnouncementDetails(announcements) {
        // Récupère la modal et le paragraphe où le contenu sera affiché
        var modal = document.getElementById("announcementModal");
        var modalBody = document.getElementById("modalBody");
        var modalTitleAnnoncements = document.getElementById("modalTitleAnnoncements");

        // Met à jour le contenu de la modal
        modalTitleAnnoncements.innerHTML = announcements.title;
        modalBody.innerHTML = announcements.body;

        // Affiche la modal
        modal.style.display = "block";

        // Obtient l'élément qui ferme la modal
        var span = document.getElementsByClassName("close")[0];

        // Lorsque l'utilisateur clique sur (x), ferme la modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Lorsque l'utilisateur clique n'importe où en dehors de la modal, elle se ferme
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
</script>
<br>
