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

/* @PrestaShop/Admin/Product/CatalogPage/catalog.html.twig */
class __TwigTemplate_df6aa250ff0e52fd61b22ebf5c7214bc extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'content' => [$this, 'block_content'],
            'product_catalog_filters' => [$this, 'block_product_catalog_filters'],
            'product_catalog_tools' => [$this, 'block_product_catalog_tools'],
            'product_catalog_form' => [$this, 'block_product_catalog_form'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["categories"] ?? null), [0 => "@PrestaShop/Admin/Product/Themes/categories_theme.html.twig"], true);
        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "  <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("themes/new-theme/public/product_catalog" . ($context["rtl_suffix"] ?? null)) . ".css")), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\">
";
    }

    // line 32
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/product/catalog.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/category-tree.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("../js/jquery/ui/jquery.ui.sortable.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/catalog.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 41
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 42
        echo "  <div class=\"products-catalog card\">

    ";
        // line 44
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("legacy_block_kpi", ["kpi_controller" => "AdminProductsController"]);
        echo "

    <div class=\"content card-body\">

      ";
        // line 48
        if (twig_length_filter($this->env, ($context["permission_error"] ?? null))) {
            // line 49
            echo "          <div class=\"alert alert-danger\" role=\"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">
              <span aria-hidden=\"true\"><i class=\"material-icons\">close</i></span>
            </button>
            <p class=\"alert-text\">
              ";
            // line 54
            echo twig_escape_filter($this->env, ($context["permission_error"] ?? null), "html", null, true);
            echo "
            </p>
          </div>
      ";
        }
        // line 58
        echo "
      <div class=\"d-flex\">
        ";
        // line 60
        $this->displayBlock('product_catalog_filters', $context, $blocks);
        // line 69
        echo "        ";
        $this->displayBlock('product_catalog_tools', $context, $blocks);
        // line 72
        echo "      </div>

      ";
        // line 74
        $this->displayBlock('product_catalog_form', $context, $blocks);
        // line 98
        echo "
    </div>
  </div>

  ";
        // line 103
        echo "  ";
        $this->loadTemplate("@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 103, "1583504455")->display(twig_array_merge($context, ["id" => "catalog_duplicate_all_modal", "title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Duplicating products", [], "Admin.Catalog.Notification"), "closable" => true, "progressbar" => ["id" => "catalog_duplicate_all_progression", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Duplicating...", [], "Admin.Catalog.Notification")], "actions" => []]));
        // line 122
        echo "

  ";
        // line 125
        echo "  ";
        $this->loadTemplate("@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 125, "2069541299")->display(twig_array_merge($context, ["id" => "catalog_activate_all_modal", "title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Activating products", [], "Admin.Catalog.Notification"), "closable" => true, "progressbar" => ["id" => "catalog_activate_all_progression", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Activating...", [], "Admin.Catalog.Notification")], "actions" => []]));
        // line 144
        echo "

  ";
        // line 147
        echo "  ";
        $this->loadTemplate("@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 147, "1079429609")->display(twig_array_merge($context, ["id" => "catalog_deactivate_all_modal", "title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deactivating products", [], "Admin.Catalog.Notification"), "closable" => true, "progressbar" => ["id" => "catalog_deactivate_all_progression", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deactivating...", [], "Admin.Catalog.Notification")], "actions" => []]));
        // line 166
        echo "

  ";
        // line 169
        echo "  ";
        $this->loadTemplate("@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 169, "645184544")->display(twig_array_merge($context, ["id" => "catalog_delete_all_modal", "title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deleting products", [], "Admin.Catalog.Notification"), "closable" => true, "progressbar" => ["id" => "catalog_delete_all_progression", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deleting...", [], "Admin.Catalog.Notification")], "actions" => []]));
        // line 188
        echo "

  ";
        // line 191
        echo "  ";
        $this->loadTemplate("@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 191, "145902622")->display(twig_array_merge($context, ["id" => "catalog_deletion_modal", "title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete products?", [], "Admin.Catalog.Feature"), "closable" => true, "closeLabel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "actions" => [0 => ["type" => "button", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete", [], "Admin.Actions"), "value" => "confirm", "class" => "btn btn-danger btn-lg"]]]));
        // line 209
        echo "
  ";
        // line 210
        $this->loadTemplate("@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 210, "1054179680")->display(twig_array_merge($context, ["id" => "catalog_sql_query_modal", "title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("SQL query", [], "Admin.Global"), "closable" => true, "actions" => [0 => ["type" => "button", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Export to SQL Manager", [], "Admin.Actions"), "value" => "sql_manager", "class" => "btn btn-primary btn-lg"]]]));
        // line 230
        echo "
";
    }

    // line 60
    public function block_product_catalog_filters($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 61
        echo "          ";
        echo twig_include($this->env, $context, "@Product/CatalogPage/Blocks/filters.html.twig", ["limit" =>         // line 62
($context["limit"] ?? null), "offset" =>         // line 63
($context["offset"] ?? null), "orderBy" =>         // line 64
($context["orderBy"] ?? null), "sortOrder" =>         // line 65
($context["sortOrder"] ?? null)]);
        // line 67
        echo "
        ";
    }

    // line 69
    public function block_product_catalog_tools($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 70
        echo "          ";
        echo twig_include($this->env, $context, "@Product/CatalogPage/Blocks/tools.html.twig", ["import_link" => ($context["import_link"] ?? null)]);
        echo "
        ";
    }

    // line 74
    public function block_product_catalog_form($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 75
        echo "        ";
        echo twig_include($this->env, $context, "@Product/CatalogPage/Forms/form_products.html.twig", ["limit" =>         // line 76
($context["limit"] ?? null), "orderBy" =>         // line 77
($context["orderBy"] ?? null), "offset" =>         // line 78
($context["offset"] ?? null), "sortOrder" =>         // line 79
($context["sortOrder"] ?? null), "filter_category" =>         // line 80
($context["filter_category"] ?? null), "filter_column_id_product" =>         // line 81
($context["filter_column_id_product"] ?? null), "filter_column_name" =>         // line 82
($context["filter_column_name"] ?? null), "filter_column_reference" =>         // line 83
($context["filter_column_reference"] ?? null), "filter_column_name_category" =>         // line 84
($context["filter_column_name_category"] ?? null), "filter_column_price" =>         // line 85
($context["filter_column_price"] ?? null), "filter_column_sav_quantity" =>         // line 86
($context["filter_column_sav_quantity"] ?? null), "filter_column_active" =>         // line 87
($context["filter_column_active"] ?? null), "has_category_filter" =>         // line 88
($context["has_category_filter"] ?? null), "activate_drag_and_drop" =>         // line 89
($context["activate_drag_and_drop"] ?? null), "products" =>         // line 90
($context["products"] ?? null), "last_sql" =>         // line 91
($context["last_sql"] ?? null), "product_count_filtered" =>         // line 92
($context["product_count_filtered"] ?? null), "pagination_parameters" =>         // line 93
($context["pagination_parameters"] ?? null), "pagination_limit_choices" =>         // line 94
($context["pagination_limit_choices"] ?? null)]);
        // line 96
        echo "
      ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 96,  240 => 94,  239 => 93,  238 => 92,  237 => 91,  236 => 90,  235 => 89,  234 => 88,  233 => 87,  232 => 86,  231 => 85,  230 => 84,  229 => 83,  228 => 82,  227 => 81,  226 => 80,  225 => 79,  224 => 78,  223 => 77,  222 => 76,  220 => 75,  216 => 74,  209 => 70,  205 => 69,  200 => 67,  198 => 65,  197 => 64,  196 => 63,  195 => 62,  193 => 61,  189 => 60,  184 => 230,  182 => 210,  179 => 209,  176 => 191,  172 => 188,  169 => 169,  165 => 166,  162 => 147,  158 => 144,  155 => 125,  151 => 122,  148 => 103,  142 => 98,  140 => 74,  136 => 72,  133 => 69,  131 => 60,  127 => 58,  120 => 54,  113 => 49,  111 => 48,  104 => 44,  100 => 42,  96 => 41,  90 => 38,  86 => 37,  82 => 36,  78 => 35,  74 => 34,  69 => 33,  65 => 32,  58 => 29,  54 => 28,  49 => 25,  47 => 26,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\catalog.html.twig");
    }
}


/* @PrestaShop/Admin/Product/CatalogPage/catalog.html.twig */
class __TwigTemplate_df6aa250ff0e52fd61b22ebf5c7214bc___1583504455 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 103
        return "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 103);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 113
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 114
        echo "      <div class=\"modal-body\">
        ";
        // line 115
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Duplication in progress...", [], "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_duplicate_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 117
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Duplication failed.", [], "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  311 => 117,  306 => 115,  303 => 114,  299 => 113,  288 => 103,  242 => 96,  240 => 94,  239 => 93,  238 => 92,  237 => 91,  236 => 90,  235 => 89,  234 => 88,  233 => 87,  232 => 86,  231 => 85,  230 => 84,  229 => 83,  228 => 82,  227 => 81,  226 => 80,  225 => 79,  224 => 78,  223 => 77,  222 => 76,  220 => 75,  216 => 74,  209 => 70,  205 => 69,  200 => 67,  198 => 65,  197 => 64,  196 => 63,  195 => 62,  193 => 61,  189 => 60,  184 => 230,  182 => 210,  179 => 209,  176 => 191,  172 => 188,  169 => 169,  165 => 166,  162 => 147,  158 => 144,  155 => 125,  151 => 122,  148 => 103,  142 => 98,  140 => 74,  136 => 72,  133 => 69,  131 => 60,  127 => 58,  120 => 54,  113 => 49,  111 => 48,  104 => 44,  100 => 42,  96 => 41,  90 => 38,  86 => 37,  82 => 36,  78 => 35,  74 => 34,  69 => 33,  65 => 32,  58 => 29,  54 => 28,  49 => 25,  47 => 26,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\catalog.html.twig");
    }
}


/* @PrestaShop/Admin/Product/CatalogPage/catalog.html.twig */
class __TwigTemplate_df6aa250ff0e52fd61b22ebf5c7214bc___2069541299 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 125
        return "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 125);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 135
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 136
        echo "      <div class=\"modal-body\">
        ";
        // line 137
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Activation in progress...", [], "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_activate_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 139
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Activation failed.", [], "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  383 => 139,  378 => 137,  375 => 136,  371 => 135,  360 => 125,  311 => 117,  306 => 115,  303 => 114,  299 => 113,  288 => 103,  242 => 96,  240 => 94,  239 => 93,  238 => 92,  237 => 91,  236 => 90,  235 => 89,  234 => 88,  233 => 87,  232 => 86,  231 => 85,  230 => 84,  229 => 83,  228 => 82,  227 => 81,  226 => 80,  225 => 79,  224 => 78,  223 => 77,  222 => 76,  220 => 75,  216 => 74,  209 => 70,  205 => 69,  200 => 67,  198 => 65,  197 => 64,  196 => 63,  195 => 62,  193 => 61,  189 => 60,  184 => 230,  182 => 210,  179 => 209,  176 => 191,  172 => 188,  169 => 169,  165 => 166,  162 => 147,  158 => 144,  155 => 125,  151 => 122,  148 => 103,  142 => 98,  140 => 74,  136 => 72,  133 => 69,  131 => 60,  127 => 58,  120 => 54,  113 => 49,  111 => 48,  104 => 44,  100 => 42,  96 => 41,  90 => 38,  86 => 37,  82 => 36,  78 => 35,  74 => 34,  69 => 33,  65 => 32,  58 => 29,  54 => 28,  49 => 25,  47 => 26,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\catalog.html.twig");
    }
}


/* @PrestaShop/Admin/Product/CatalogPage/catalog.html.twig */
class __TwigTemplate_df6aa250ff0e52fd61b22ebf5c7214bc___1079429609 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 147
        return "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 147);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 157
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 158
        echo "      <div class=\"modal-body\">
        ";
        // line 159
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deactivation in progress...", [], "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_deactivate_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 161
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deactivation failed.", [], "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  455 => 161,  450 => 159,  447 => 158,  443 => 157,  432 => 147,  383 => 139,  378 => 137,  375 => 136,  371 => 135,  360 => 125,  311 => 117,  306 => 115,  303 => 114,  299 => 113,  288 => 103,  242 => 96,  240 => 94,  239 => 93,  238 => 92,  237 => 91,  236 => 90,  235 => 89,  234 => 88,  233 => 87,  232 => 86,  231 => 85,  230 => 84,  229 => 83,  228 => 82,  227 => 81,  226 => 80,  225 => 79,  224 => 78,  223 => 77,  222 => 76,  220 => 75,  216 => 74,  209 => 70,  205 => 69,  200 => 67,  198 => 65,  197 => 64,  196 => 63,  195 => 62,  193 => 61,  189 => 60,  184 => 230,  182 => 210,  179 => 209,  176 => 191,  172 => 188,  169 => 169,  165 => 166,  162 => 147,  158 => 144,  155 => 125,  151 => 122,  148 => 103,  142 => 98,  140 => 74,  136 => 72,  133 => 69,  131 => 60,  127 => 58,  120 => 54,  113 => 49,  111 => 48,  104 => 44,  100 => 42,  96 => 41,  90 => 38,  86 => 37,  82 => 36,  78 => 35,  74 => 34,  69 => 33,  65 => 32,  58 => 29,  54 => 28,  49 => 25,  47 => 26,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\catalog.html.twig");
    }
}


/* @PrestaShop/Admin/Product/CatalogPage/catalog.html.twig */
class __TwigTemplate_df6aa250ff0e52fd61b22ebf5c7214bc___645184544 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 169
        return "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 169);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 179
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 180
        echo "      <div class=\"modal-body\">
        ";
        // line 181
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deletion in progress...", [], "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_delete_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 183
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deletion failed.", [], "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  527 => 183,  522 => 181,  519 => 180,  515 => 179,  504 => 169,  455 => 161,  450 => 159,  447 => 158,  443 => 157,  432 => 147,  383 => 139,  378 => 137,  375 => 136,  371 => 135,  360 => 125,  311 => 117,  306 => 115,  303 => 114,  299 => 113,  288 => 103,  242 => 96,  240 => 94,  239 => 93,  238 => 92,  237 => 91,  236 => 90,  235 => 89,  234 => 88,  233 => 87,  232 => 86,  231 => 85,  230 => 84,  229 => 83,  228 => 82,  227 => 81,  226 => 80,  225 => 79,  224 => 78,  223 => 77,  222 => 76,  220 => 75,  216 => 74,  209 => 70,  205 => 69,  200 => 67,  198 => 65,  197 => 64,  196 => 63,  195 => 62,  193 => 61,  189 => 60,  184 => 230,  182 => 210,  179 => 209,  176 => 191,  172 => 188,  169 => 169,  165 => 166,  162 => 147,  158 => 144,  155 => 125,  151 => 122,  148 => 103,  142 => 98,  140 => 74,  136 => 72,  133 => 69,  131 => 60,  127 => 58,  120 => 54,  113 => 49,  111 => 48,  104 => 44,  100 => 42,  96 => 41,  90 => 38,  86 => 37,  82 => 36,  78 => 35,  74 => 34,  69 => 33,  65 => 32,  58 => 29,  54 => 28,  49 => 25,  47 => 26,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\catalog.html.twig");
    }
}


/* @PrestaShop/Admin/Product/CatalogPage/catalog.html.twig */
class __TwigTemplate_df6aa250ff0e52fd61b22ebf5c7214bc___145902622 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 191
        return "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 191);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 203
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 204
        echo "      <div class=\"modal-body\">
        ";
        // line 205
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("These products will be deleted for good. Please confirm.", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  594 => 205,  591 => 204,  587 => 203,  576 => 191,  527 => 183,  522 => 181,  519 => 180,  515 => 179,  504 => 169,  455 => 161,  450 => 159,  447 => 158,  443 => 157,  432 => 147,  383 => 139,  378 => 137,  375 => 136,  371 => 135,  360 => 125,  311 => 117,  306 => 115,  303 => 114,  299 => 113,  288 => 103,  242 => 96,  240 => 94,  239 => 93,  238 => 92,  237 => 91,  236 => 90,  235 => 89,  234 => 88,  233 => 87,  232 => 86,  231 => 85,  230 => 84,  229 => 83,  228 => 82,  227 => 81,  226 => 80,  225 => 79,  224 => 78,  223 => 77,  222 => 76,  220 => 75,  216 => 74,  209 => 70,  205 => 69,  200 => 67,  198 => 65,  197 => 64,  196 => 63,  195 => 62,  193 => 61,  189 => 60,  184 => 230,  182 => 210,  179 => 209,  176 => 191,  172 => 188,  169 => 169,  165 => 166,  162 => 147,  158 => 144,  155 => 125,  151 => 122,  148 => 103,  142 => 98,  140 => 74,  136 => 72,  133 => 69,  131 => 60,  127 => 58,  120 => 54,  113 => 49,  111 => 48,  104 => 44,  100 => 42,  96 => 41,  90 => 38,  86 => 37,  82 => 36,  78 => 35,  74 => 34,  69 => 33,  65 => 32,  58 => 29,  54 => 28,  49 => 25,  47 => 26,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\catalog.html.twig");
    }
}


/* @PrestaShop/Admin/Product/CatalogPage/catalog.html.twig */
class __TwigTemplate_df6aa250ff0e52fd61b22ebf5c7214bc___1054179680 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 210
        return "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", 210);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 221
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 222
        echo "      <form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, ($context["sql_manager_add_link"] ?? null), "html", null, true);
        echo "\" id=\"catalog_sql_query_modal_content\">
        <div class=\"modal-body\">
          <textarea name=\"sql\" rows=\"20\" cols=\"65\"></textarea>
          <input type=\"hidden\" name=\"name\" value=\"\" />
        </div>
      </form>
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  657 => 222,  653 => 221,  642 => 210,  594 => 205,  591 => 204,  587 => 203,  576 => 191,  527 => 183,  522 => 181,  519 => 180,  515 => 179,  504 => 169,  455 => 161,  450 => 159,  447 => 158,  443 => 157,  432 => 147,  383 => 139,  378 => 137,  375 => 136,  371 => 135,  360 => 125,  311 => 117,  306 => 115,  303 => 114,  299 => 113,  288 => 103,  242 => 96,  240 => 94,  239 => 93,  238 => 92,  237 => 91,  236 => 90,  235 => 89,  234 => 88,  233 => 87,  232 => 86,  231 => 85,  230 => 84,  229 => 83,  228 => 82,  227 => 81,  226 => 80,  225 => 79,  224 => 78,  223 => 77,  222 => 76,  220 => 75,  216 => 74,  209 => 70,  205 => 69,  200 => 67,  198 => 65,  197 => 64,  196 => 63,  195 => 62,  193 => 61,  189 => 60,  184 => 230,  182 => 210,  179 => 209,  176 => 191,  172 => 188,  169 => 169,  165 => 166,  162 => 147,  158 => 144,  155 => 125,  151 => 122,  148 => 103,  142 => 98,  140 => 74,  136 => 72,  133 => 69,  131 => 60,  127 => 58,  120 => 54,  113 => 49,  111 => 48,  104 => 44,  100 => 42,  96 => 41,  90 => 38,  86 => 37,  82 => 36,  78 => 35,  74 => 34,  69 => 33,  65 => 32,  58 => 29,  54 => 28,  49 => 25,  47 => 26,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\catalog.html.twig");
    }
}
