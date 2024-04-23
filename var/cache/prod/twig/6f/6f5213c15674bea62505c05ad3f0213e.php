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

/* @PrestaShop/Admin/Sell/Catalog/Stock/overview.html.twig */
class __TwigTemplate_f5a94d651ec58e566d4bba9d7fabf926 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
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
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Sell/Catalog/Stock/overview.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "  <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("themes/new-theme/public/stock_page" . ($context["rtl_suffix"] ?? null)) . ".css")), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\">
";
    }

    // line 31
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "    ";
        if (($context["is_shop_context"] ?? null)) {
            // line 33
            echo "        <div id=\"stock-app\"></div>
    ";
        } else {
            // line 35
            echo "        <div class=\"alert alert-danger\" role=\"alert\">
            <p class=\"alert-text\">";
            // line 36
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Note that this page is available in a single shop context only. Switch context to work on it.", [], "Admin.Notifications.Info"), "html", null, true);
            echo "</p>
        </div>
    ";
        }
    }

    // line 41
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 42
        echo "
    ";
        // line 43
        if (($context["is_shop_context"] ?? null)) {
            // line 44
            echo "        ";
            $this->displayParentBlock("javascripts", $context, $blocks);
            echo "

        ";
            // line 46
            $context["productId"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 46), "query", [], "any", false, false, false, 46), "get", [0 => "productId"], "method", false, false, false, 46)) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 46), "query", [], "any", false, false, false, 46), "get", [0 => "productId"], "method", false, false, false, 46)) : (false));
            // line 47
            echo "        <script>
            var data = {
                baseUrl: '";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 49), "getBasePath", [], "method", false, false, false, 49), "html", null, true);
            echo "',
                catalogUrl: '";
            // line 50
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("admin_product_catalog");
            echo "',
                stockUrl: '";
            // line 51
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("admin_stock_overview");
            echo "',
                stockExportUrl: '";
            // line 52
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("api_stock_list_products_export");
            echo "',
                stockImportUrl: '";
            // line 53
            echo $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminImport");
            echo "',
                apiStockUrl: '";
            // line 54
            ((($context["productId"] ?? null)) ? (print (twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("api_stock_list_product_combinations", ["productId" => ($context["productId"] ?? null)]), "html", null, true))) : (print ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("api_stock_list_products"))));
            echo "',
                apiMovementsUrl: '";
            // line 55
            ((($context["productId"] ?? null)) ? (print (twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("api_stock_product_list_movements", ["productId" => ($context["productId"] ?? null)]), "html", null, true))) : (print ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("api_stock_list_movements"))));
            echo "',
                employeesUrl: '";
            // line 56
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("api_stock_list_movements_employees");
            echo "',
                suppliersUrl: '";
            // line 57
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("api_stock_list_suppliers");
            echo "',
                categoriesUrl: '";
            // line 58
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("api_stock_list_categories");
            echo "',
                movementsTypesUrl: '";
            // line 59
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("api_stock_list_movements_types", ["grouped" => true]);
            echo "',
                translationUrl: '";
            // line 60
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("api_i18n_translations_list", ["page" => "stock"]);
            echo "',
                locale: '";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 61), "locale", [], "any", false, false, false, 61), "html", null, true);
            echo "'
            }
        </script>

        ";
            // line 65
            if (($context["webpack_server"] ?? null)) {
                // line 66
                echo "            <script src=\"http://localhost:8080/stock.bundle.js\"></script>
        ";
            } else {
                // line 68
                echo "            <script src=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/stock.bundle.js"), "html", null, true);
                echo "\"></script>
        ";
            }
            // line 70
            echo "    ";
        }
        // line 71
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Stock/overview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 71,  169 => 70,  163 => 68,  159 => 66,  157 => 65,  150 => 61,  146 => 60,  142 => 59,  138 => 58,  134 => 57,  130 => 56,  126 => 55,  122 => 54,  118 => 53,  114 => 52,  110 => 51,  106 => 50,  102 => 49,  98 => 47,  96 => 46,  90 => 44,  88 => 43,  85 => 42,  81 => 41,  73 => 36,  70 => 35,  66 => 33,  63 => 32,  59 => 31,  52 => 28,  48 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Stock/overview.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Stock\\overview.html.twig");
    }
}
