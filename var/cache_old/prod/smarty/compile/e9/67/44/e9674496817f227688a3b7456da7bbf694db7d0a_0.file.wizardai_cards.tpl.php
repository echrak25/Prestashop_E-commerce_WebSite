<?php
/* Smarty version 4.2.1, created on 2024-04-03 19:53:04
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\wizardai\views\templates\admin\wizardai_cards.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_660da5909cd3e3_36022480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9674496817f227688a3b7456da7bbf694db7d0a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\wizardai\\views\\templates\\admin\\wizardai_cards.tpl',
      1 => 1707926954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660da5909cd3e3_36022480 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="grid grid-cols-4 w-full gap-4">
    <div class="wizardai-card">
        <h5 class="text-xl font-bold leading-none tracking-tight text-neutral-900 mt-0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remaining credits','mod'=>'wizardai'),$_smarty_tpl ) );?>
</h5>
        <div id="loaderCredits" class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status">
            <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
        <p id="textCredits" class="hidden text-xl mb-0 text-neutral-500"></p>
    </div>

    <div class="wizardai-card">
        <h5 class="text-xl font-bold leading-none tracking-tight text-neutral-900 mt-0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Requirement','mod'=>'wizardai'),$_smarty_tpl ) );?>
</h5>
        <div>
        <p class="text-lg mb-0 text-neutral-500 flex items-center">
            <?php if ($_smarty_tpl->tpl_vars['is_ssl']->value) {?>
                <i class="material-icons wizardai-icons-round wizardai-icon-check" style="font-size: 1rem;">check</i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'SSL Enabled','mod'=>'wizardai'),$_smarty_tpl ) );?>

            <?php } else { ?>
                <i class="material-icons wizardai-icons-round wizardai-icon-cancel text-center" style="font-size: 1rem;">&#10006;</i>
                 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'SSL Not Enabled','mod'=>'wizardai'),$_smarty_tpl ) );?>

            <?php }?>
        </p>
        <?php if (!$_smarty_tpl->tpl_vars['is_ssl']->value) {?>
            <p class="mb-0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You need to enable SSL to use bulk task generation','mod'=>'wizardai'),$_smarty_tpl ) );?>
</p>
        <?php }?>
        </div>
    </div>

    <div class="wizardai-card">
        <h5 class="text-xl font-bold leading-none tracking-tight text-neutral-900 mt-0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Announcements','mod'=>'wizardai'),$_smarty_tpl ) );?>
</h5>
        <p id="announcements" class="text-sm mb-0 text-neutral-500 flex items-center"></p>
    </div>

    <div class="wizardai-card">
        <h5 class="text-xl font-bold leading-none tracking-tight text-neutral-900 mt-0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Report a bug','mod'=>'wizardai'),$_smarty_tpl ) );?>
</h5>
        <div>
            <p class="text-sm mb-0 text-neutral-500 flex items-center">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Contact us on','mod'=>'wizardai'),$_smarty_tpl ) );?>
 <a class="ml-1" href="https://addons.prestashop.com/en/contact-us?id_product=90521" target="_blank">Prestashop Addons</a>
            </p>
        </div>
    </div>
</div>

<div id="nocredits" class="hidden mt-4">
    <div class="flex items-center p-4 border border-red-500 bg-red-100" style="width: 100%">
        <i class="material-icons wizardai-icons-round wizardai-icon-cancel text-center" style="font-size: 1rem; line-height: 12px;">&#10006;</i>
        <p class="text-red-400 font-bold mb-0"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Unfortunately, you have run out of credits. Wait until next month or contact us on ','mod'=>'wizardai'),$_smarty_tpl ) );?>
 <a href="https://addons.prestashop.com/en/contact-us?id_product=90521" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Prestashop Addons','mod'=>'wizardai'),$_smarty_tpl ) );?>
</a> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'to obtain more credits and continue using our services.','mod'=>'wizardai'),$_smarty_tpl ) );?>
</p>
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

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
<br>
<?php }
}
