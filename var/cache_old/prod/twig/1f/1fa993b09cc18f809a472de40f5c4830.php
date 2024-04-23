<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__37c8658e2d4f036776bf8647056c0428 */
class __TwigTemplate_b6c6a15b885798d0d3c902b4d18a70e4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'extra_stylesheets' => [$this, 'block_extra_stylesheets'],
            'content_header' => [$this, 'block_content_header'],
            'content' => [$this, 'block_content'],
            'content_footer' => [$this, 'block_content_footer'],
            'sidebar_right' => [$this, 'block_sidebar_right'],
            'javascripts' => [$this, 'block_javascripts'],
            'extra_javascripts' => [$this, 'block_extra_javascripts'],
            'translate_javascripts' => [$this, 'block_translate_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/CozyHome/prestashop/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/CozyHome/prestashop/img/app_icon.png\" />

<title>Gestionnaire de modules • CozyHOME</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminModulesManage';
    var iso_user = 'fr';
    var lang_is_rtl = '0';
    var full_language_code = 'fr';
    var full_cldr_language_code = 'fr-FR';
    var country_iso_code = 'TN';
    var _PS_VERSION_ = '8.0.3';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'Une nouvelle commande a été passée sur votre boutique.';
    var order_number_msg = 'Numéro de commande : ';
    var total_msg = 'Total : ';
    var from_msg = 'Du ';
    var see_order_msg = 'Afficher cette commande';
    var new_customer_msg = 'Un nouveau client s\\'est inscrit sur votre boutique';
    var customer_name_msg = 'Nom du client : ';
    var new_msg = 'Un nouveau message a été posté sur votre boutique.';
    var see_msg = 'Lire le message';
    var token = '86411ba8780360de97cc8efe5dcf4694';
    var token_admin_orders = tokenAdminOrders = '4652871f274f95282056be8107ef30eb';
    var token_admin_customers = '4d2b1272e8723d04ba7a92f6dbf63021';
    var token_admin_customer_threads = tokenAdminCustomerThreads = 'f7ed205350fb5915a3cc9c1cda6621a1';
    var currentIndex = 'index.php?controller=AdminModulesManage';
    var employee_token = 'f41db94da74d70ca6d7e80827251aeb3';
    var choose_language_translate = 'Choisissez la langue :';
    var default_language = '1';
    var admin_modules_link = '/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/modules/manage?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c';
    var admin_notification_get_";
        // line 42
        echo "link = '/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/common/notifications?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c';
    var admin_notification_push_link = adminNotificationPushLink = '/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/common/notifications/ack?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c';
    var tab_modules_list = '';
    var update_success_msg = 'Mise à jour réussie';
    var search_product_msg = 'Rechercher un produit';
  </script>



<link
      rel=\"preload\"
      href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/themes/new-theme/public/703cf8f274fbb265d49c6262825780e1.preload.woff2\"
      as=\"font\"
      crossorigin
    >
      <link href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/CozyHome/prestashop/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/CozyHome/prestashop/js/jquery/plugins/fancybox/jquery.fancybox.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/CozyHome/prestashop/modules/blockwishlist/public/backoffice.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/CozyHome/prestashop/modules/ps_mbo/views/css/module-catalog.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/CozyHome/prestashop/modules/ps_mbo/views/css/connection-toolbar.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/CozyHome/prestashop/modules/ps_mbo/views/css/cdc-error-templating.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/CozyHome/prestashop/modules/prestaheroconnect/views/css/global.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/CozyHome/prestashop/modules/ets_trackingcustomer/views/css/admin_all.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var baseAdminDir = \"\\/CozyH";
        // line 69
        echo "ome\\/prestashop\\/admin871u6nvcqilnwlsmsvm\\/\";
var baseDir = \"\\/CozyHome\\/prestashop\\/\";
var changeFormLanguageUrl = \"\\/CozyHome\\/prestashop\\/admin871u6nvcqilnwlsmsvm\\/index.php\\/configure\\/advanced\\/employees\\/change-form-language?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\";
var currency = {\"iso_code\":\"TND\",\"sign\":\"TND\",\"name\":\"Dinar tunisien\",\"format\":null};
var currency_specifications = {\"symbol\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"currencyCode\":\"TND\",\"currencySymbol\":\"TND\",\"numberSymbols\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.00\\u00a0\\u00a4\",\"negativePattern\":\"-#,##0.00\\u00a0\\u00a4\",\"maxFractionDigits\":3,\"minFractionDigits\":3,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var number_specifications = {\"symbol\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"numberSymbols\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.###\",\"negativePattern\":\"-#,##0.###\",\"maxFractionDigits\":3,\"minFractionDigits\":0,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var prestashop = {\"debug\":false};
var show_new_customers = \"1\";
var show_new_messages = \"1\";
var show_new_orders = \"1\";
</script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/js/jquery/plugins/fancybox/jquery.fancybox.js\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/js/admin.js?v=8.0.3\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/themes/new-theme/public/cldr.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/js/tools.js?v=8.0.3\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestas";
        // line 86
        echo "hop/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/themes/default/js/vendor/nv.d3.min.js\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/modules/ps_emailalerts/js/admin/ps_emailalerts.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/growl/jquery.growl.js?v=4.10.3\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/modules/ps_mbo/views/js/connection-toolbar.js\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/modules/ps_mbo/views/js/cdc-error-templating.js\"></script>
<script type=\"text/javascript\" src=\"https://assets.prestashop3.com/dst/mbo/v1/mbo-cdc.umd.js\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/modules/ps_mbo/views/js/recommended-modules.js?v=4.10.3\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/modules/ps_faviconnotificationbo/views/js/favico.js\"></script>
<script type=\"text/javascript\" src=\"/CozyHome/prestashop/modules/ps_faviconnotificationbo/views/js/ps_faviconnotificationbo.js\"></script>

  <script>
  if (undefined !== ps_faviconnotificationbo) {
    ps_faviconnotificationbo.initialize({
      backgroundColor: '#DF0067',
      textColor: '#FFFFFF',
      notificationGetUrl: '/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/common/notifications?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c',
      CHECKBOX_ORDER: 1,
      CHECKBOX_CUSTOMER: 1,
      CHECKBOX_MESSAGE: 1,
      timer: 120000, // Refresh every 2 minutes
    });
  }
</script>
<script type=\"text/javascript\">
    var PH_CON_TRANS = {\"install\":\"Installer\",\"delete\":\"Effacer\",\"email_required\":\"Le champ email est obligatoire\",\"password_required\":\"Le champ du mot de passe est obligatoire\",\"account_invalid\":\"L'e-mail ou le mot de passe n'est pas valide\",\"logout\":\"Se d\\u00e9connecter\",\"install_from_server\":\"Installer depuis serveur\",\"refresh_and_clear_cache\":\"Actualiser et vider le cache\",\"view_my_prestahe";
        // line 111
        echo "ro\":\"Profil de PrestaHero\",\"contact_prestahero\":\"Contacter PrestaHero\",\"connect_to_prestahero\":\"Connectez-vous \\u00e0 PrestaHero\",\"upgrade\":\"Mettre \\u00e0 niveau\",\"install_prestahero\":\"Installer depuis PrestaHero\",\"install_from_prestahero\":\"Installer depuis PrestaHero\",\"buy_now\":\"Acheter\",\"purchased\":\"Achet\\u00e9s\",\"confirm_delete_module\":\"Voulez-vous supprimer cet \\u00e9l\\u00e9ment?\",\"txt_modulelist\":\"Modules et th\\u00e8mes PrestaHero\",\"txt_modules_to_upgrade\":\"Nombre de modules \\u00e0 mettre \\u00e0 niveau\"};
    var PH_CON_LINKS = {\"my_account\":\"https:\\/\\/prestahero.com\\/fr\\/mon-compte\",\"contact\":\"https:\\/\\/prestahero.com\\/fr\\/support-tickets\"};
    var PH_CON_LOGO = '/CozyHome/prestashop/modules/prestaheroconnect/views/img/prestahero-logo.png';
    var PH_CON_MODULE_LIST_URL = 'https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminPhConListModules&token=a43ffa1ec6ea407aa1eb878b41f9f2a0';
    var PH_CON_ACCOUNT_NAME = \"E.Echrak\";
    var PH_CON_LINK_LOGOUT = \"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminModules&token=f1aeae82dfbb912014a07030a2fa6b62&configure=prestaheroconnect&logoutPhAccount=1\";
    var PH_CON_LINK_AJAX_MODULE = \"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminModules&token=f1aeae82dfbb912014a07030a2fa6b62&configure=prestaheroconnect\";
    var PH_CON_CONTROLLER = \"AdminModulesManage\";
    var PH_CON_IS17 = 1;
    var PH_CON_MSG_ACTION = \"\";
    var PH_CON_IS_OLD_ACTION = 0;
    var PH_CON_IS_LOGGED = 1;
    var PH_CON_RELOAD_UPGRADE_COUNT = 1;
    var PH_CON_UPGRADE_COUNT = 0;
</script>

<script src=\"/CozyHome/prestashop/modules/prestaheroconnect/views/js/global.js\" defer=\"defer\"></script>
<script src=\"/CozyHome/prestashop/modules/prestaheroconnect/views/js/admin.js\" defer=\"defer\"></script>


";
        // line 131
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>";
        echo "

<body
  class=\"lang-fr adminmodulesmanage\"
  data-base-url=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php\"  data-token=\"WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\">

  <header id=\"header\" class=\"d-print-none\">

    <nav id=\"header_infos\" class=\"main-header\">
      <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

            <i class=\"material-icons js-mobile-menu\">menu</i>
      <a id=\"header_logo\" class=\"logo float-left\" href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminDashboard&amp;token=a262cbcc09f52e8e423b6e0f1ae9069c\"></a>
      <span id=\"shop_version\">8.0.3</span>

      <div class=\"component\" id=\"quick-access-container\">
        <div class=\"dropdown quick-accesses\">
  <button class=\"btn btn-link btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"quick_select\">
    Accès rapide
  </button>
  <div class=\"dropdown-menu\">
          <a class=\"dropdown-item quick-row-link\"
         href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/orders?token=78c7ea47136f00c62b852830a6e656f6\"
                 data-item=\"Commandes\"
      >Commandes</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=9fa469bb9aedc556d90181481f9c784d\"
                 data-item=\"Évaluation du catalogue\"
      >Évaluation du catalogue</a>
          <a class=\"dropdown-item quick-row-link active\"
         href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/modules/manage?token=78c7ea47136f00c62b852830a6e656f6\"
                 data-item=\"Modules installés\"
      >Modules installés</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminC";
        // line 165
        echo "artRules&amp;addcart_rule&amp;token=51fd86df95637ff23e09b170153bb5b0\"
                 data-item=\"Nouveau bon de réduction\"
      >Nouveau bon de réduction</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/catalog/products/new?token=78c7ea47136f00c62b852830a6e656f6\"
                 data-item=\"Nouveau produit\"
      >Nouveau produit</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/catalog/categories/new?token=78c7ea47136f00c62b852830a6e656f6\"
                 data-item=\"Nouvelle catégorie\"
      >Nouvelle catégorie</a>
        <div class=\"dropdown-divider\"></div>
          <a id=\"quick-remove-link\"
        class=\"dropdown-item js-quick-link\"
        href=\"#\"
        data-method=\"remove\"
        data-quicklink-id=\"5\"
        data-rand=\"152\"
        data-icon=\"icon-AdminModulesSf\"
        data-url=\"index.php/improve/modules/manage\"
        data-post-link=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminQuickAccesses&token=89eb320d942935493152927a6ddfc8a7\"
        data-prompt-text=\"Veuillez nommer ce raccourci :\"
        data-link=\"Modules - Liste\"
      >
        <i class=\"material-icons\">remove_circle_outline</i>
        Supprimer de l'accès rapide
      </a>
        <a id=\"quick-manage-link\" class=\"dropdown-item\" href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminQuickAccesses&token=89eb320d942935493152927a6ddfc8a7\">
      <i class=\"material-icons\">settings</i>
      Gérez vos accès rapides
    </a>
  </div>
</div>
      </div>
      <div class=\"component component-search\" id=\"header-search-container\">
        <div class=\"component-search-body\">
          <div class=\"component-search-top\">
            <form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form ";
        // line 203
        echo "collapsed\"
      method=\"post\"
      action=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminSearch&amp;token=16ce538c176c5d12286cafd77ac0f399\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input type=\"text\" class=\"form-control js-form-search\" id=\"bo_query\" name=\"bo_query\" value=\"\" placeholder=\"Rechercher (ex. : référence produit, nom du client, etc.)\" aria-label=\"Barre de recherche\">
    <div class=\"input-group-append\">
      <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        Partout
      </button>
      <div class=\"dropdown-menu js-items-list\">
        <a class=\"dropdown-item\" data-item=\"Partout\" href=\"#\" data-value=\"0\" data-placeholder=\"Que souhaitez-vous trouver ?\" data-icon=\"icon-search\"><i class=\"material-icons\">search</i> Partout</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" data-item=\"Catalogue\" href=\"#\" data-value=\"1\" data-placeholder=\"Nom du produit, référence, etc.\" data-icon=\"icon-book\"><i class=\"material-icons\">store_mall_directory</i> Catalogue</a>
        <a class=\"dropdown-item\" data-item=\"Clients par nom\" href=\"#\" data-value=\"2\" data-placeholder=\"Nom\" data-icon=\"icon-group\"><i class=\"material-icons\">group</i> Clients par nom</a>
        <a class=\"dropdown-item\" data-item=\"Clients par adresse IP\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.89\" data-icon=\"icon-desktop\"><i class=\"material-icons\">desktop_mac</i> Clients par adresse IP</a>
        <a class=\"dropdown-item\" data-item=\"Commandes\" href=\"#\" data-value=\"3\" data-placeholder=\"ID commande\" data-icon=\"icon-credit-card\"><i class=\"material-icons\">shopping_basket</i> Commandes</a>
        <a class=\"dropdown-item\" data-item=\"Factures\" href=\"#\" data-value=\"4\" data-placeholder=\"Numéro de facture\" data-icon=\"icon-book\">";
        // line 221
        echo "<i class=\"material-icons\">book</i> Factures</a>
        <a class=\"dropdown-item\" data-item=\"Paniers\" href=\"#\" data-value=\"5\" data-placeholder=\"ID panier\" data-icon=\"icon-shopping-cart\"><i class=\"material-icons\">shopping_cart</i> Paniers</a>
        <a class=\"dropdown-item\" data-item=\"Modules\" href=\"#\" data-value=\"7\" data-placeholder=\"Nom du module\" data-icon=\"icon-puzzle-piece\"><i class=\"material-icons\">extension</i> Modules</a>
      </div>
      <button class=\"btn btn-primary\" type=\"submit\"><span class=\"d-none\">RECHERCHE</span><i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
    \$('#bo_query').one('click', function() {
    \$(this).closest('form').removeClass('collapsed');
  });
});
</script>
            <button class=\"component-search-cancel d-none\">Annuler</button>
          </div>

          <div class=\"component-search-quickaccess d-none\">
  <p class=\"component-search-title\">Accès rapide</p>
      <a class=\"dropdown-item quick-row-link\"
       href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/orders?token=78c7ea47136f00c62b852830a6e656f6\"
             data-item=\"Commandes\"
    >Commandes</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=9fa469bb9aedc556d90181481f9c784d\"
             data-item=\"Évaluation du catalogue\"
    >Évaluation du catalogue</a>
      <a class=\"dropdown-item quick-row-link active\"
       href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/modules/manage?token=78c7ea47136f00c62b852830a6e656f6\"
             data-item=\"Modules installés\"
    >Modules installés</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminCartRules&amp;addcart_rule&amp;tok";
        // line 255
        echo "en=51fd86df95637ff23e09b170153bb5b0\"
             data-item=\"Nouveau bon de réduction\"
    >Nouveau bon de réduction</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/catalog/products/new?token=78c7ea47136f00c62b852830a6e656f6\"
             data-item=\"Nouveau produit\"
    >Nouveau produit</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/catalog/categories/new?token=78c7ea47136f00c62b852830a6e656f6\"
             data-item=\"Nouvelle catégorie\"
    >Nouvelle catégorie</a>
    <div class=\"dropdown-divider\"></div>
      <a id=\"quick-remove-link\"
      class=\"dropdown-item js-quick-link\"
      href=\"#\"
      data-method=\"remove\"
      data-quicklink-id=\"5\"
      data-rand=\"72\"
      data-icon=\"icon-AdminModulesSf\"
      data-url=\"index.php/improve/modules/manage\"
      data-post-link=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminQuickAccesses&token=89eb320d942935493152927a6ddfc8a7\"
      data-prompt-text=\"Veuillez nommer ce raccourci :\"
      data-link=\"Modules - Liste\"
    >
      <i class=\"material-icons\">remove_circle_outline</i>
      Supprimer de l'accès rapide
    </a>
    <a id=\"quick-manage-link\" class=\"dropdown-item\" href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminQuickAccesses&token=89eb320d942935493152927a6ddfc8a7\">
    <i class=\"material-icons\">settings</i>
    Gérez vos accès rapides
  </a>
</div>
        </div>

        <div class=\"component-search-background d-none\"></div>
      </div>

      
      
      <div class=\"header-right\">
                  <div class=\"component\" id=\"header-shop-list-container\">
              <div class=\"shop-list\">
    <a class=\"link\" id=\"header_shopname\" href=\"https://localhost/CozyHome/prestashop/\" target= \"_blank\">
      <i class=\"material-icons\">visi";
        // line 298
        echo "bility</i>
      <span>Voir ma boutique</span>
    </a>
  </div>
          </div>
                          <div class=\"component header-right-component\" id=\"header-notifications-container\">
            <div id=\"notif\" class=\"notification-center dropdown dropdown-clickable\">
  <button class=\"btn notification js-notification dropdown-toggle\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">notifications_none</i>
    <span id=\"notifications-total\" class=\"count hide\">0</span>
  </button>
  <div class=\"dropdown-menu dropdown-menu-right js-notifs_dropdown\">
    <div class=\"notifications\">
      <ul class=\"nav nav-tabs\" role=\"tablist\">
                          <li class=\"nav-item\">
            <a
              class=\"nav-link active\"
              id=\"orders-tab\"
              data-toggle=\"tab\"
              data-type=\"order\"
              href=\"#orders-notifications\"
              role=\"tab\"
            >
              Commandes<span id=\"_nb_new_orders_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"customers-tab\"
              data-toggle=\"tab\"
              data-type=\"customer\"
              href=\"#customers-notifications\"
              role=\"tab\"
            >
              Clients<span id=\"_nb_new_customers_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"messages-tab\"
              data-toggle=\"tab\"
              data-type=\"customer_message\"
              href=\"#messages-notifications\"
              role=\"tab\"
            >
              Messages<span id=\"_nb_new_messages_\"></span>
            </a>
          </li>
                        </ul>

      <!-- Tab panes -->
      <div class=\"tab-content\">
                          <div class=\"tab-pane active empty\" id=\"orders-notifications\" role=\"tabpanel\">
            <p class=\"no-no";
        // line 353
        echo "tification\">
              Pas de nouvelle commande pour le moment :(<br>
              Avez-vous consulté vos &lt;strong&gt;&lt;a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminCarts&amp;action=filterOnlyAbandonedCarts&amp;token=2fff89b1945dd243cf7150521cd24034\"&gt;paniers abandonnés&lt;/a&gt;&lt;/strong&gt; ?&lt;br&gt; Votre prochaine commande s'y trouve peut-être !
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"customers-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Aucun nouveau client pour l'instant :(<br>
              Êtes-vous actifs sur les réseaux sociaux en ce moment ?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"messages-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Pas de nouveau message pour l'instant.<br>
              On dirait que vos clients sont satisfaits :)
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                        </div>
    </div>
  </div>
</div>

  <script type=\"text/html\" id=\"order-notification-template\">
    <a class=\"notif\" href='order_url'>
      #_id_order_ -
      de <strong>_customer_name_</strong> (_iso_code_)_carrier_
      <strong class=\"float-sm-right\">_total_paid_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"customer-notification-template\">
    <a class=\"notif\" href='customer_url'>
      #_id_customer_ - <strong>_customer_name_</strong>_company_ - enregistré le <strong>_date_add_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"message-notification-template\">
    <a class=\"notif\" href='message_url'>
    <span class=\"message-notification-status _status_\">
      <i class=\"material-icons\">fiber_manual_r";
        // line 395
        echo "ecord</i> _status_
    </span>
      - <strong>_customer_name_</strong> (_company_) - <i class=\"material-icons\">access_time</i> _date_add_
    </a>
  </script>
          </div>
        
        <div class=\"component\" id=\"header-employee-container\">
          <div class=\"dropdown employee-dropdown\">
  <div class=\"rounded-circle person\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">account_circle</i>
  </div>
  <div class=\"dropdown-menu dropdown-menu-right\">
    <div class=\"employee-wrapper-avatar\">
      <div class=\"employee-top\">
        <span class=\"employee-avatar\"><img class=\"avatar rounded-circle\" src=\"https://localhost/CozyHome/prestashop/img/pr/default.jpg\" alt=\"Echrak\" /></span>
        <span class=\"employee_profile\">Ravi de vous revoir Echrak</span>
      </div>

      <a class=\"dropdown-item employee-link profile-link\" href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/employees/1/edit?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\">
      <i class=\"material-icons\">edit</i>
      <span>Votre profil</span>
    </a>
    </div>

    <p class=\"divider\"></p>

                  <a class=\"dropdown-item ps_mbo\" href=\"https://www.prestashop.com/fr/formation?utm_source=back-office&utm_medium=menu&utm_content=download8_0&utm_campaign=training-fr&utm_mbo_source=menu-user-back-office\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">school</i> Formation
        </a>
                          <a class=\"dropdown-item ps_mbo\" href=\"https://www.prestashop.com/fr/experts?utm_source=back-office&utm_medium=menu&utm_content=download8_0&utm_campaign=expert-fr&utm_mbo_source=menu-user-back-office\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">person_pin_circle</i> Trouver un expert
        </a>
                          <a class=\"dropdown-item ps_mbo\" href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/modules/mbo/modules/catalog/?utm_mbo_source";
        // line 428
        echo "=menu-user-back-office&_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c&utm_source=back-office&utm_medium=menu&utm_content=download8_0&utm_campaign=addons-fr&utm_mbo_source=menu-user-back-office\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">extension</i> Marketplace Prestashop
        </a>
                          <a class=\"dropdown-item ps_mbo\" href=\"https://help-center.prestashop.com/fr?utm_source=back-office&utm_medium=menu&utm_content=download8_0&utm_campaign=help-center-fr&utm_mbo_source=menu-user-back-office\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">help</i> Centre d'assistance
        </a>
                          <a class=\"dropdown-item \" href=\"https://accounts.distribution.prestashop.net?utm_source=localhost&utm_medium=back-office&utm_campaign=ps_accounts&utm_content=headeremployeedropdownlink\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">open_in_new</i> Gérer votre compte PrestaShop
        </a>
                  <p class=\"divider\"></p>
            
    <a class=\"dropdown-item employee-link text-center\" id=\"header_logout\" href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminLogin&amp;logout=1&amp;token=75e3ddcba19cb429a17f8cddae61d917\">
      <i class=\"material-icons d-lg-none\">power_settings_new</i>
      <span>Déconnexion</span>
    </a>
  </div>
</div>
        </div>
              </div>
    </nav>
  </header>

  <nav class=\"nav-bar d-none d-print-none d-md-block\">
  <span class=\"menu-collapse\" data-toggle-url=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/employees/toggle-navigation?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\">
    <i class=\"material-icons rtl-flip\">chevron_left</i>
    <i class=\"material-icons rtl-flip\">chevron_left</i>
  </span>

  <div class=\"nav-bar-overflow\">
      <div class=\"logo-container\">
          <a id=\"h";
        // line 458
        echo "eader_logo\" class=\"logo float-left\" href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminDashboard&amp;token=a262cbcc09f52e8e423b6e0f1ae9069c\"></a>
          <span id=\"shop_version\" class=\"header-version\">8.0.3</span>
      </div>

      <ul class=\"main-menu\">
              
                    
                    
          
            <li class=\"link-levelone\" data-submenu=\"1\" id=\"tab-AdminDashboard\">
              <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminDashboard&amp;token=a262cbcc09f52e8e423b6e0f1ae9069c\" class=\"link\" >
                <i class=\"material-icons\">trending_up</i> <span>Tableau de bord</span>
              </a>
            </li>

          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"2\" id=\"tab-SELL\">
                <span class=\"title\">Vendre</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"3\" id=\"subtab-AdminParentOrders\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/orders/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\">
                      <i class=\"material-icons mi-shopping_basket\">shopping_basket</i>
                      <span>
                      Commandes
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                              ";
        // line 497
        echo "                        
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"4\" id=\"subtab-AdminOrders\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/orders/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Commandes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"5\" id=\"subtab-AdminInvoices\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/orders/invoices/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Factures
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"6\" id=\"subtab-AdminSlip\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/orders/credit-slips/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Avoirs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"7\" id=\"subtab-AdminDeliverySlip\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/orders/delivery-slips/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7b";
        // line 525
        echo "ZbmgkSkYwwU8c\" class=\"link\"> Bons de livraison
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"8\" id=\"subtab-AdminCarts\">
                                <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminCarts&amp;token=2fff89b1945dd243cf7150521cd24034\" class=\"link\"> Paniers
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"9\" id=\"subtab-AdminCatalog\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/catalog/products?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\">
                      <i class=\"material-icons mi-store\">store</i>
                      <span>
                      Catalogue
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"10\" id=\"subtab-Admin";
        // line 557
        echo "Products\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/catalog/products?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Produits
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"11\" id=\"subtab-AdminCategories\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/catalog/categories?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Catégories
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"12\" id=\"subtab-AdminTracking\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/catalog/monitoring/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Suivi
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"13\" id=\"subtab-AdminParentAttributesGroups\">
                                <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminAttributesGroups&amp;token=f2694a191e344d14d9c5a8a191a35dd0\" class=\"link\"> Attributs &amp; caractéristiques
                                </a>
                              </li>

                       ";
        // line 586
        echo "                                                           
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"16\" id=\"subtab-AdminParentManufacturers\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/catalog/brands/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Marques et fournisseurs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"19\" id=\"subtab-AdminAttachments\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/attachments/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Fichiers
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"20\" id=\"subtab-AdminParentCartRules\">
                                <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminCartRules&amp;token=51fd86df95637ff23e09b170153bb5b0\" class=\"link\"> Réductions
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"23\" id=\"subtab-AdminStockManagement\">
                                <a href=\"/CozyHome/prestashop";
        // line 614
        echo "/admin871u6nvcqilnwlsmsvm/index.php/sell/stocks/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Stock
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"24\" id=\"subtab-AdminParentCustomer\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/customers/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\">
                      <i class=\"material-icons mi-account_circle\">account_circle</i>
                      <span>
                      Clients
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"25\" id=\"subtab-AdminCustomers\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/customers/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Clients
                                </a>
                              </li>

                                                                                  
                              
                                                            
       ";
        // line 646
        echo "                       <li class=\"link-leveltwo\" data-submenu=\"26\" id=\"subtab-AdminAddresses\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/addresses/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Adresses
                                </a>
                              </li>

                                                                                                                                                                                              
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"132\" id=\"subtab-AdminTrackingCustomerSession\">
                                <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminTrackingCustomerSession&amp;token=84e8878c399a078754a4608f48946236\" class=\"link\"> Séances clients
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"28\" id=\"subtab-AdminParentCustomerThreads\">
                    <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminCustomerThreads&amp;token=f7ed205350fb5915a3cc9c1cda6621a1\" class=\"link\">
                      <i class=\"material-icons mi-chat\">chat</i>
                      <span>
                      SAV
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                ";
        // line 673
        echo "                            </i>
                                            </a>
                                              <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"29\" id=\"subtab-AdminCustomerThreads\">
                                <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminCustomerThreads&amp;token=f7ed205350fb5915a3cc9c1cda6621a1\" class=\"link\"> SAV
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"30\" id=\"subtab-AdminOrderMessage\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/sell/customer-service/order-messages/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Messages prédéfinis
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"31\" id=\"subtab-AdminReturn\">
                                <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminReturn&amp;token=3cbef4b796ee40e50ba9447d066947fc\" class=\"link\"> Retours produits
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
               ";
        // line 702
        echo "                               
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"32\" id=\"subtab-AdminStats\">
                    <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminStats&amp;token=9fa469bb9aedc556d90181481f9c784d\" class=\"link\">
                      <i class=\"material-icons mi-assessment\">assessment</i>
                      <span>
                      Statistiques
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title link-active\" data-submenu=\"37\" id=\"tab-IMPROVE\">
                <span class=\"title\">Personnaliser</span>
            </li>

                              
                  
                                                      
                                                          
                  <li class=\"link-levelone has_submenu link-active open ul-open\" data-submenu=\"38\" id=\"subtab-AdminParentModulesSf\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/modules/mbo/modules/catalog/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      Modules
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                        ";
        // line 738
        echo "            keyboard_arrow_up
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-38\" class=\"submenu panel-collapse\">
                                                                                                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"149\" id=\"subtab-AdminPsMboModuleParent\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/modules/mbo/modules/catalog/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Marketplace
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo link-active\" data-submenu=\"39\" id=\"subtab-AdminModulesSf\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/modules/manage?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Gestionnaire de modules 
                                </a>
                              </li>

                                                                                                                                    </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"43\" id=\"subtab-AdminParentThemes\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/design/themes/?_t";
        // line 765
        echo "oken=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\">
                      <i class=\"material-icons mi-desktop_mac\">desktop_mac</i>
                      <span>
                      Apparence
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"126\" id=\"subtab-AdminThemesParent\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/design/themes/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Thème et logo
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"153\" id=\"subtab-AdminPsMboTheme\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/modules/mbo/themes/catalog/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Catalogue de thèmes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"45\" id=\"subtab-AdminParentMailThe";
        // line 794
        echo "me\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/design/mail_theme/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Thème d&#039;e-mail
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"47\" id=\"subtab-AdminCmsContent\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/design/cms-pages/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Pages
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"48\" id=\"subtab-AdminModulesPositions\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/design/modules/positions/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Positions
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"49\" id=\"subtab-AdminImages\">
                                <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminImages&amp;token=a7d395f9b9276710c02fce6fb2bf32f5\" class=\"link\"> Images
                                </a>
                              </li>

                                                ";
        // line 823
        echo "                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"117\" id=\"subtab-AdminLinkWidget\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/modules/link-widget/list?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Liste de liens
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"50\" id=\"subtab-AdminParentShipping\">
                    <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminCarriers&amp;token=f5d0cc168ed06cbce024920d5bd7e60b\" class=\"link\">
                      <i class=\"material-icons mi-local_shipping\">local_shipping</i>
                      <span>
                      Livraison
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-50\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"51\" id=\"subtab-AdminCarriers\">
                                <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.p";
        // line 852
        echo "hp?controller=AdminCarriers&amp;token=f5d0cc168ed06cbce024920d5bd7e60b\" class=\"link\"> Transporteurs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"52\" id=\"subtab-AdminShipping\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/shipping/preferences/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Préférences
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"53\" id=\"subtab-AdminParentPayment\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/payment/payment_methods?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\">
                      <i class=\"material-icons mi-payment\">payment</i>
                      <span>
                      Paiement
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-53\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
       ";
        // line 884
        echo "                       <li class=\"link-leveltwo\" data-submenu=\"54\" id=\"subtab-AdminPayment\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/payment/payment_methods?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Moyens de paiement
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"55\" id=\"subtab-AdminPaymentPreferences\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/payment/preferences?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Préférences
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"56\" id=\"subtab-AdminInternational\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/international/localization/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\">
                      <i class=\"material-icons mi-language\">language</i>
                      <span>
                      International
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                           ";
        // line 913
        echo "                   <ul id=\"collapse-56\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"57\" id=\"subtab-AdminParentLocalization\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/international/localization/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Localisation
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"62\" id=\"subtab-AdminParentCountries\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/international/zones/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Zones géographiques
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"66\" id=\"subtab-AdminParentTaxes\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/international/taxes/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Taxes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"69\" id=\"subtab-Adm";
        // line 941
        echo "inTranslations\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/international/translations/settings?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Traductions
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"70\" id=\"tab-CONFIGURE\">
                <span class=\"title\">Configurer</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"71\" id=\"subtab-ShopParameters\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/shop/preferences/preferences?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\">
                      <i class=\"material-icons mi-settings\">settings</i>
                      <span>
                      Paramètres de la boutique
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-71\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"72\" id=\"subtab-AdminParentPreferences\">
                     ";
        // line 977
        echo "           <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/shop/preferences/preferences?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Paramètres généraux
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"75\" id=\"subtab-AdminParentOrderPreferences\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/shop/order-preferences/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Commandes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"78\" id=\"subtab-AdminPPreferences\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/shop/product-preferences/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Produits
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"79\" id=\"subtab-AdminParentCustomerPreferences\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/shop/customer-preferences/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Clients
                                </a>
                              </li>

              ";
        // line 1005
        echo "                                                                    
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"83\" id=\"subtab-AdminParentStores\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/shop/contacts/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Contact
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"86\" id=\"subtab-AdminParentMeta\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/shop/seo-urls/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Trafic et SEO
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"89\" id=\"subtab-AdminParentSearchConf\">
                                <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminSearchConf&amp;token=7d80d5fab237d245fb5cd7466219f5e0\" class=\"link\"> Rechercher
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"92";
        // line 1035
        echo "\" id=\"subtab-AdminAdvancedParameters\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/system-information/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\">
                      <i class=\"material-icons mi-settings_applications\">settings_applications</i>
                      <span>
                      Paramètres avancés
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-92\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"93\" id=\"subtab-AdminInformation\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/system-information/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Informations
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"94\" id=\"subtab-AdminPerformance\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/performance/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Performances
                                </a>
                              </li>

                                                                          ";
        // line 1062
        echo "        
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"95\" id=\"subtab-AdminAdminPreferences\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/administration/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Administration
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"96\" id=\"subtab-AdminEmails\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/emails/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> E-mail
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"97\" id=\"subtab-AdminImport\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/import/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Importer
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"98\" id=\"subtab-AdminParentEmployees\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/employees/?_";
        // line 1090
        echo "token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Équipe
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"102\" id=\"subtab-AdminParentRequestSql\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/sql-requests/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Base de données
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"105\" id=\"subtab-AdminLogs\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/logs/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Logs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"106\" id=\"subtab-AdminWebservice\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/webservice-keys/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Webservice
                                </a>
                              </li>

                                                                                                                                                                                  ";
        // line 1118
        echo "            
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"109\" id=\"subtab-AdminFeatureFlag\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/feature-flags/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Fonctionnalités nouvelles et expérimentales
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"110\" id=\"subtab-AdminParentSecurity\">
                                <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/configure/advanced/security/?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" class=\"link\"> Sécurité
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"115\" id=\"tab-DEFAULT\">
                <span class=\"title\">Détails</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"134\" id=\"subtab-AdminSelfUpgrade\">
                    <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminSelfUpgrade&amp;token=8f7ae3ea3348bbf313493c044d5a32f7\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                ";
        // line 1153
        echo "      <span>
                      1-Click Upgrade
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"129\" id=\"tab-AdminPhConRoot\">
                <span class=\"title\">PrestaHero</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"130\" id=\"subtab-AdminPhConListModules\">
                    <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminPhConListModules&amp;token=a43ffa1ec6ea407aa1eb878b41f9f2a0\" class=\"link\">
                      <i class=\"material-icons mi-ph-con-sidebar-icon-list-module\">ph-con-sidebar-icon-list-module</i>
                      <span>
                      Modules PrestaHero
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"143\" id=\"tab-AdminPayplug\">
                <span class=\"title\">Payplug</span>
            </li>

              ";
        // line 1196
        echo "                
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"144\" id=\"subtab-AdminPayPlugInstallment\">
                    <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminPayPlugInstallment&amp;token=54a50c5955d5367e6ef613d0e18ad02b\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      Paiements en plusieurs fois
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                              
          
                  </ul>
  </div>
  
</nav>


<div class=\"header-toolbar d-print-none\">
    
  <div class=\"container-fluid\">

    
      <nav aria-label=\"Breadcrumb\">
        <ol class=\"breadcrumb\">
                      <li class=\"breadcrumb-item\">Gestionnaire de modules </li>
          
                      <li class=\"breadcrumb-item active\">
              <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/modules/manage?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" aria-current=\"page\">Modules</a>
            </li>
                  </ol>
      </nav>
    

    <div class=\"title-row\">
      
          <h1 class=\"title\">
            Gestionnaire de modules          </h1>
      

      
        <div class=\"toolbar-icons\">
          <div class=\"wrapper\">
            
                                                          <a
                  class=\"btn btn-primary pointer\"                  id=\"page-header-desc-configuration-add_module\"
                  href=\"#\"                  tit";
        // line 1247
        echo "le=\"Installer un module\"                  data-toggle=\"pstooltip\"
                  data-placement=\"bottom\"                >
                  <i class=\"material-icons\">cloud_upload</i>                  Installer un module
                </a>
                                      
            
                              <a class=\"btn btn-outline-secondary btn-help btn-sidebar\" href=\"#\"
                   title=\"Aide\"
                   data-toggle=\"sidebar\"
                   data-target=\"#right-sidebar\"
                   data-url=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/common/sidebar/https%253A%252F%252Fhelp.prestashop-project.org%252Ffr%252Fdoc%252FAdminModules%253Fversion%253D8.0.3%2526country%253Dfr/Aide?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\"
                   id=\"product_form_open_help\"
                >
                  Aide
                </a>
                                    </div>
        </div>

      
    </div>
  </div>

  
      <div class=\"page-head-tabs\" id=\"head_tabs\">
      <ul class=\"nav nav-pills\">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <li class=\"nav-item\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/modules/manage?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" id=\"subtab-Adm";
        // line 1273
        echo "inModulesManage\" class=\"nav-link tab active current\" data-submenu=\"40\">
                      Modules
                      <span class=\"notification-container\">
                        <span class=\"notification-counter\"></span>
                      </span>
                    </a>
                  </li>
                                                                <li class=\"nav-item\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/modules/alerts?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" id=\"subtab-AdminModulesNotifications\" class=\"nav-link tab \" data-submenu=\"41\">
                      Alertes
                      <span class=\"notification-container\">
                        <span class=\"notification-counter\"></span>
                      </span>
                    </a>
                  </li>
                                                                <li class=\"nav-item\">
                    <a href=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/improve/modules/updates?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\" id=\"subtab-AdminModulesUpdates\" class=\"nav-link tab \" data-submenu=\"42\">
                      Mises à jour
                      <span class=\"notification-container\">
                        <span class=\"notification-counter\"></span>
                      </span>
                    </a>
                  </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         ";
        // line 1296
        echo "                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 </ul>
    </div>
  
  <div class=\"btn-floating\">
    <button class=\"btn btn-primary collapsed\" data-toggle=\"collapse\" data-target=\".btn-floating-container\" aria-expanded=\"false\">
      <i class=\"material-icons\">add</i>
    </button>
    <div class=\"btn-floating-container collapse\">
      <div class=\"btn-floating-menu\">
        
                              <a
              class=\"btn btn-floating-item   pointer\"              id=\"page-header-desc-floating-configuration-add_module\"
              href=\"#\"              title=\"Installer un module\"              data-toggle=\"pstooltip\"
              data-placement=\"bottom\"            >
              Installer un module
              <i class=\"material-icons\">cloud_upload</i>            </a>
                  
                              <a class=\"btn btn-floating-item btn-help btn-sidebar\" href=\"#\"
               title=\"Aide\"
               data-toggle=\"sidebar\"
               data-target=\"#right-sidebar\"
               data-url=\"/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php/common/sidebar/https%253A%252F%252Fhelp.prestashop-project.org%252Ffr%252Fdoc%252FAdminModules%253Fversion%253D8.0.3%2526country%253Dfr/Aide?_token=WmDdYyFj8BxDb6IGWwfgAoVibVyb7bZbmgkSkYwwU8c\"
            >
              Aide
            </a>
                        </div>
    </div>
  </div>
  
</div>

<div id=\"main-div\">
          
      <div class=\"content-div  with-tabs\">

        

                                                  ";
        // line 1333
        echo "      
        <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>
<div id=\"content-message-box\"></div>


  ";
        // line 1338
        $this->displayBlock('content_header', $context, $blocks);
        $this->displayBlock('content', $context, $blocks);
        $this->displayBlock('content_footer', $context, $blocks);
        $this->displayBlock('sidebar_right', $context, $blocks);
        echo "

        

      </div>
    </div>

  <div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>Oh non !</h1>
  <p class=\"mt-3\">
    La version mobile de cette page n'est pas encore disponible.
  </p>
  <p class=\"mt-2\">
    Cette page n'est pas encore disponible sur mobile, merci de la consulter sur ordinateur.
  </p>
  <p class=\"mt-2\">
    Merci.
  </p>
  <a href=\"https://localhost/CozyHome/prestashop/admin871u6nvcqilnwlsmsvm/index.php?controller=AdminDashboard&amp;token=a262cbcc09f52e8e423b6e0f1ae9069c\" class=\"btn btn-primary py-1 mt-3\">
    <i class=\"material-icons rtl-flip\">arrow_back</i>
    Précédent
  </a>
</div>
  <div class=\"mobile-layer\"></div>

      <div id=\"footer\" class=\"bootstrap\">
    
</div>
  

      <div class=\"bootstrap\">
      
    </div>
  
";
        // line 1372
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>";
        echo "
</html>";
    }

    // line 131
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_extra_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 1338
    public function block_content_header($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_content_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_sidebar_right($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 1372
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_extra_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_translate_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "__string_template__37c8658e2d4f036776bf8647056c0428";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1553 => 1372,  1532 => 1338,  1521 => 131,  1512 => 1372,  1472 => 1338,  1465 => 1333,  1426 => 1296,  1401 => 1273,  1373 => 1247,  1320 => 1196,  1275 => 1153,  1238 => 1118,  1208 => 1090,  1178 => 1062,  1149 => 1035,  1117 => 1005,  1087 => 977,  1049 => 941,  1019 => 913,  988 => 884,  954 => 852,  923 => 823,  892 => 794,  861 => 765,  832 => 738,  794 => 702,  763 => 673,  734 => 646,  700 => 614,  670 => 586,  639 => 557,  605 => 525,  575 => 497,  534 => 458,  502 => 428,  467 => 395,  423 => 353,  366 => 298,  321 => 255,  285 => 221,  265 => 203,  225 => 165,  186 => 131,  164 => 111,  137 => 86,  118 => 69,  89 => 42,  46 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__37c8658e2d4f036776bf8647056c0428", "");
    }
}
