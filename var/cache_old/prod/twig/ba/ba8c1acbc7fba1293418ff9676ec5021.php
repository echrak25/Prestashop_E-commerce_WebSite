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

/* @Product/CatalogPage/Blocks/tools.html.twig */
class __TwigTemplate_fa4f54a0fe76c276995979af98e44779 extends Template
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
        echo "<div class=\"catalog-tools\">
  <div class=\"dropdown\">
    <button class=\"btn btn-text dropdown-toggle tool-button\"
            id=\"catalog-tools-button\"
            data-toggle=\"dropdown\"
            aria-haspopup=\"true\"
            aria-expanded=\"false\"
            title=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Settings", [], "Admin.Global"), "html", null, true);
        echo "\"
    >
      <span class=\"sr-only\">";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Settings", [], "Admin.Global"), "html", null, true);
        echo "</span>
    </button>
    <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"catalog-tools-button\">
      ";
        // line 37
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayDashboardToolbarIcons", []);
        echo "
      <a id=\"desc-product-export\" class=\"dropdown-item\" href=\"";
        // line 38
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_export_action");
        echo "\">
        ";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Export", [], "Admin.Actions"), "html", null, true);
        echo "
      </a>
      <a id=\"desc-product-import\" class=\"dropdown-item\" href=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["import_link"] ?? null), "html", null, true);
        echo "\">
        ";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Import", [], "Admin.Actions"), "html", null, true);
        echo "
      </a>
      <a id=\"desc-product-show-sql\" class=\"dropdown-item\" href=\"javascript:void(0);\" onclick=\"showLastSqlQuery();\">
        ";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Show SQL query", [], "Admin.Actions"), "html", null, true);
        echo "
      </a>
      <a id=\"desc-product-sql-manager\" class=\"dropdown-item\" href=\"javascript:void(0);\" onclick=\"sendLastSqlQuery(createSqlQueryName());\">
        ";
        // line 48
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Export to SQL Manager", [], "Admin.Actions"), "html", null, true);
        echo "
      </a>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/CatalogPage/Blocks/tools.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 48,  80 => 45,  74 => 42,  70 => 41,  65 => 39,  61 => 38,  57 => 37,  51 => 34,  46 => 32,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/CatalogPage/Blocks/tools.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\Blocks\\tools.html.twig");
    }
}
