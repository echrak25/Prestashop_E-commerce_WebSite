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

/* @PrestaShop/Admin/Sell/Catalog/Categories/Blocks/listing_panel_footer.html.twig */
class __TwigTemplate_0c46a937f90ca9a1649441399633aed1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 26), "query", [], "any", false, false, false, 26), "has", [0 => "id_category"], "method", false, false, false, 26) &&  !twig_get_attribute($this->env, $this->source, ($context["currentCategoryView"] ?? null), "is_home_category", [], "any", false, false, false, 26))) {
            // line 27
            echo "  ";
            if (twig_get_attribute($this->env, $this->source, ($context["currentCategoryView"] ?? null), "id_parent", [], "any", false, false, false, 27)) {
                // line 28
                echo "    ";
                $context["params"] = ["id_category" => twig_get_attribute($this->env, $this->source, ($context["currentCategoryView"] ?? null), "id_parent", [], "any", false, false, false, 28)];
                // line 29
                echo "  ";
            }
            // line 30
            echo "
  <div class=\"card-footer\">
    <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_index", ((array_key_exists("params", $context)) ? (_twig_default_filter(($context["params"] ?? null), [])) : ([]))), "html", null, true);
            echo "\" class=\"btn btn-outline-secondary\">
      <i class=\"material-icons rtl-flip\">arrow_back</i>
      ";
            // line 34
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Back to list", [], "Admin.Actions"), "html", null, true);
            echo "
    </a>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/listing_panel_footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 34,  55 => 32,  51 => 30,  48 => 29,  45 => 28,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/listing_panel_footer.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Categories\\Blocks\\listing_panel_footer.html.twig");
    }
}
