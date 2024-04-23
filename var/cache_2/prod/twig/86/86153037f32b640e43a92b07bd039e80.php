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

/* @Product/CatalogPage/Forms/form_products.html.twig */
class __TwigTemplate_aa332973311e5e131cfa94fe177e0681 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'product_catalog_form_table' => [$this, 'block_product_catalog_form_table'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "<form
  name=\"product_catalog_list\"
  id=\"product_catalog_list\"
  method=\"post\"
  action=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_catalog", ["limit" => ($context["limit"] ?? null), "orderBy" => ($context["orderBy"] ?? null), "sortOrder" => ($context["sortOrder"] ?? null)]), "html", null, true);
        echo "\"
  orderingurl=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_catalog", ["offset" => 0, "limit" => 300, "orderBy" => "position_ordering", "sortOrder" => ($context["sortOrder"] ?? null)]), "html", null, true);
        echo "\"
  newproducturl=\"";
        // line 31
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_new");
        echo "\"
>

  <input type=\"hidden\" name=\"filter_category\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, ((array_key_exists("filter_category", $context)) ? (_twig_default_filter(($context["filter_category"] ?? null), "")) : ("")), "html", null, true);
        echo "\" />

      ";
        // line 36
        $this->displayBlock('product_catalog_form_table', $context, $blocks);
        // line 57
        echo "
  ";
        // line 58
        if ((($context["product_count_filtered"] ?? null) > 20)) {
            // line 59
            echo "        ";
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin\\Common:pagination", ["limit" =>             // line 60
($context["limit"] ?? null), "offset" =>             // line 61
($context["offset"] ?? null), "total" =>             // line 62
($context["product_count_filtered"] ?? null), "caller_route" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 63
($context["app"] ?? null), "request", [], "any", false, false, false, 63), "attributes", [], "any", false, false, false, 63), "get", [0 => "_route"], "method", false, false, false, 63), "caller_parameters" =>             // line 64
($context["pagination_parameters"] ?? null), "limit_choices" =>             // line 65
($context["pagination_limit_choices"] ?? null)]));
            // line 66
            echo "
  ";
        }
        // line 68
        echo "</form>
";
    }

    // line 36
    public function block_product_catalog_form_table($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 37
        echo "        ";
        echo twig_include($this->env, $context, "@Product/CatalogPage/Lists/products_table.html.twig", ["limit" =>         // line 38
($context["limit"] ?? null), "orderBy" =>         // line 39
($context["orderBy"] ?? null), "offset" =>         // line 40
($context["offset"] ?? null), "sortOrder" =>         // line 41
($context["sortOrder"] ?? null), "filter_category" =>         // line 42
($context["filter_category"] ?? null), "filter_column_id_product" =>         // line 43
($context["filter_column_id_product"] ?? null), "filter_column_name" =>         // line 44
($context["filter_column_name"] ?? null), "filter_column_reference" =>         // line 45
($context["filter_column_reference"] ?? null), "filter_column_name_category" =>         // line 46
($context["filter_column_name_category"] ?? null), "filter_column_price" =>         // line 47
($context["filter_column_price"] ?? null), "filter_column_sav_quantity" =>         // line 48
($context["filter_column_sav_quantity"] ?? null), "filter_column_active" =>         // line 49
($context["filter_column_active"] ?? null), "has_category_filter" =>         // line 50
($context["has_category_filter"] ?? null), "activate_drag_and_drop" =>         // line 51
($context["activate_drag_and_drop"] ?? null), "products" =>         // line 52
($context["products"] ?? null), "last_sql" =>         // line 53
($context["last_sql"] ?? null)]);
        // line 55
        echo "
      ";
    }

    public function getTemplateName()
    {
        return "@Product/CatalogPage/Forms/form_products.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 55,  109 => 53,  108 => 52,  107 => 51,  106 => 50,  105 => 49,  104 => 48,  103 => 47,  102 => 46,  101 => 45,  100 => 44,  99 => 43,  98 => 42,  97 => 41,  96 => 40,  95 => 39,  94 => 38,  92 => 37,  88 => 36,  83 => 68,  79 => 66,  77 => 65,  76 => 64,  75 => 63,  74 => 62,  73 => 61,  72 => 60,  70 => 59,  68 => 58,  65 => 57,  63 => 36,  58 => 34,  52 => 31,  48 => 30,  44 => 29,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/CatalogPage/Forms/form_products.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\Forms\\form_products.html.twig");
    }
}
