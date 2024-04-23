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

/* @PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig */
class __TwigTemplate_3d924ee75d014c8a8bb86dfa3575d66d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'category_showcase_card' => [$this, 'block_category_showcase_card'],
            'categories_kpis' => [$this, 'block_categories_kpis'],
            'categories_breadcrumb' => [$this, 'block_categories_breadcrumb'],
            'categories_listing' => [$this, 'block_categories_listing'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        if ( !twig_get_attribute($this->env, $this->source, ($context["currentCategoryView"] ?? null), "is_home_category", [], "any", false, false, false, 28)) {
            // line 29
            $context["layoutTitle"] = twig_get_attribute($this->env, $this->source, ($context["currentCategoryView"] ?? null), "name", [], "any", false, false, false, 29);
        }
        // line 26
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 32
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "  ";
        $this->displayBlock('category_showcase_card', $context, $blocks);
        // line 36
        echo "
  ";
        // line 37
        $this->displayBlock('categories_kpis', $context, $blocks);
        // line 43
        echo "
  ";
        // line 44
        $this->displayBlock('categories_breadcrumb', $context, $blocks);
        // line 47
        echo "
  ";
        // line 48
        $this->displayBlock('categories_listing', $context, $blocks);
    }

    // line 33
    public function block_category_showcase_card($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/showcase_card.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig", 34)->display($context);
        // line 35
        echo "  ";
    }

    // line 37
    public function block_categories_kpis($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin\\Common:renderKpiRow", ["kpiRow" =>         // line 40
($context["categoriesKpi"] ?? null)]));
        // line 41
        echo "
  ";
    }

    // line 44
    public function block_categories_breadcrumb($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 45
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/breadcrumb.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig", 45)->display($context);
        // line 46
        echo "  ";
    }

    // line 48
    public function block_categories_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig", 49, "160119534")->display(twig_array_merge($context, ["grid" => ($context["categoriesGrid"] ?? null)]));
        // line 58
        echo "  ";
    }

    // line 61
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 62
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/category.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 65,  137 => 64,  131 => 62,  127 => 61,  123 => 58,  120 => 49,  116 => 48,  112 => 46,  109 => 45,  105 => 44,  100 => 41,  98 => 40,  96 => 38,  92 => 37,  88 => 35,  85 => 34,  81 => 33,  77 => 48,  74 => 47,  72 => 44,  69 => 43,  67 => 37,  64 => 36,  61 => 33,  57 => 32,  52 => 26,  49 => 29,  47 => 28,  40 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Categories\\index.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig */
class __TwigTemplate_3d924ee75d014c8a8bb86dfa3575d66d___160119534 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'grid_panel_footer' => [$this, 'block_grid_panel_footer'],
            'grid_panel_extra_content' => [$this, 'block_grid_panel_extra_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 49
        return "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig", 49);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 50
    public function block_grid_panel_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 51
        echo "        ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/listing_panel_footer.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig", 51)->display($context);
        // line 52
        echo "      ";
    }

    // line 54
    public function block_grid_panel_extra_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 55
        echo "        ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/delete_categories_modal.html.twig", "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig", 55)->display($context);
        // line 56
        echo "      ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 56,  215 => 55,  211 => 54,  207 => 52,  204 => 51,  200 => 50,  189 => 49,  141 => 65,  137 => 64,  131 => 62,  127 => 61,  123 => 58,  120 => 49,  116 => 48,  112 => 46,  109 => 45,  105 => 44,  100 => 41,  98 => 40,  96 => 38,  92 => 37,  88 => 35,  85 => 34,  81 => 33,  77 => 48,  74 => 47,  72 => 44,  69 => 43,  67 => 37,  64 => 36,  61 => 33,  57 => 32,  52 => 26,  49 => 29,  47 => 28,  40 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Categories/index.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Categories\\index.html.twig");
    }
}
