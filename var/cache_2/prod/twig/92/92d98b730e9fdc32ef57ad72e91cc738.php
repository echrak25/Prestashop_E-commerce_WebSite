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

/* @PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig */
class __TwigTemplate_9ff18ab8b42d9586dc0bce274713f1a5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'monitoring_showcase_card' => [$this, 'block_monitoring_showcase_card'],
            'empty_categories_listing' => [$this, 'block_empty_categories_listing'],
            'no_qty_product_with_combinations_listing' => [$this, 'block_no_qty_product_with_combinations_listing'],
            'no_qty_product_without_combinations_listing' => [$this, 'block_no_qty_product_without_combinations_listing'],
            'disabled_product_listing' => [$this, 'block_disabled_product_listing'],
            'product_without_image_listing' => [$this, 'block_product_without_image_listing'],
            'product_without_description_listing' => [$this, 'block_product_without_description_listing'],
            'product_without_price_listing' => [$this, 'block_product_without_price_listing'],
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
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "  ";
        $this->displayBlock('monitoring_showcase_card', $context, $blocks);
        // line 32
        echo "
  ";
        // line 33
        $this->displayBlock('empty_categories_listing', $context, $blocks);
        // line 56
        echo "
  ";
        // line 57
        $this->displayBlock('no_qty_product_with_combinations_listing', $context, $blocks);
        // line 60
        echo "
  ";
        // line 61
        $this->displayBlock('no_qty_product_without_combinations_listing', $context, $blocks);
        // line 64
        echo "
  ";
        // line 65
        $this->displayBlock('disabled_product_listing', $context, $blocks);
        // line 68
        echo "
  ";
        // line 69
        $this->displayBlock('product_without_image_listing', $context, $blocks);
        // line 72
        echo "
  ";
        // line 73
        $this->displayBlock('product_without_description_listing', $context, $blocks);
        // line 76
        echo "
  ";
        // line 77
        $this->displayBlock('product_without_price_listing', $context, $blocks);
        // line 80
        echo "
";
    }

    // line 29
    public function block_monitoring_showcase_card($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Monitoring/Blocks/showcase_card.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 30)->display($context);
        // line 31
        echo "  ";
    }

    // line 33
    public function block_empty_categories_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 34, "1197363840")->display(twig_array_merge($context, ["grid" => ($context["emptyCategoryGrid"] ?? null)]));
        // line 55
        echo "  ";
    }

    // line 57
    public function block_no_qty_product_with_combinations_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 58
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 58)->display(twig_array_merge($context, ["grid" => ($context["noQtyProductWithCombinationGrid"] ?? null)]));
        // line 59
        echo "  ";
    }

    // line 61
    public function block_no_qty_product_without_combinations_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 62
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 62)->display(twig_array_merge($context, ["grid" => ($context["noQtyProductWithoutCombinationGrid"] ?? null)]));
        // line 63
        echo "  ";
    }

    // line 65
    public function block_disabled_product_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 66
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 66)->display(twig_array_merge($context, ["grid" => ($context["disabledProductGrid"] ?? null)]));
        // line 67
        echo "  ";
    }

    // line 69
    public function block_product_without_image_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 70
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 70)->display(twig_array_merge($context, ["grid" => ($context["productWithoutImageGrid"] ?? null)]));
        // line 71
        echo "  ";
    }

    // line 73
    public function block_product_without_description_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 74
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 74)->display(twig_array_merge($context, ["grid" => ($context["productWithoutDescriptionGrid"] ?? null)]));
        // line 75
        echo "  ";
    }

    // line 77
    public function block_product_without_price_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 78
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 78)->display(twig_array_merge($context, ["grid" => ($context["productWithoutPriceGrid"] ?? null)]));
        // line 79
        echo "  ";
    }

    // line 83
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 84
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/monitoring.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 87,  200 => 86,  194 => 84,  190 => 83,  186 => 79,  183 => 78,  179 => 77,  175 => 75,  172 => 74,  168 => 73,  164 => 71,  161 => 70,  157 => 69,  153 => 67,  150 => 66,  146 => 65,  142 => 63,  139 => 62,  135 => 61,  131 => 59,  128 => 58,  124 => 57,  120 => 55,  117 => 34,  113 => 33,  109 => 31,  106 => 30,  102 => 29,  97 => 80,  95 => 77,  92 => 76,  90 => 73,  87 => 72,  85 => 69,  82 => 68,  80 => 65,  77 => 64,  75 => 61,  72 => 60,  70 => 57,  67 => 56,  65 => 33,  62 => 32,  59 => 29,  55 => 28,  44 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Monitoring\\index.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig */
class __TwigTemplate_9ff18ab8b42d9586dc0bce274713f1a5___1197363840 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'grid_panel_body' => [$this, 'block_grid_panel_body'],
            'grid_view_block' => [$this, 'block_grid_view_block'],
            'grid_panel_extra_content' => [$this, 'block_grid_panel_extra_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 34
        return "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 34);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 36
    public function block_grid_panel_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 37
        echo "        <div class=\"card-body\">
          <div class=\"alert alert-info\">
            <div class=\"alert-text\">
              ";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("An empty category is a category that has no product directly associated to it. An empty category may however contain products through its subcategories.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "
            </div>
          </div>
          ";
        // line 43
        $this->displayBlock('grid_view_block', $context, $blocks);
        // line 46
        echo "        </div>
      ";
    }

    // line 43
    public function block_grid_view_block($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 44
        echo "            ";
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/grid.html.twig", ["grid" => ($context["emptyCategoryGrid"] ?? null)]);
        echo "
          ";
    }

    // line 49
    public function block_grid_panel_extra_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 50
        echo "        ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/delete_categories_modal.html.twig", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", 50)->display(twig_array_merge($context, ["deleteCategoriesForm" =>         // line 51
($context["deleteCategoryForm"] ?? null)]));
        // line 53
        echo "      ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  305 => 53,  303 => 51,  301 => 50,  297 => 49,  290 => 44,  286 => 43,  281 => 46,  279 => 43,  273 => 40,  268 => 37,  264 => 36,  253 => 34,  204 => 87,  200 => 86,  194 => 84,  190 => 83,  186 => 79,  183 => 78,  179 => 77,  175 => 75,  172 => 74,  168 => 73,  164 => 71,  161 => 70,  157 => 69,  153 => 67,  150 => 66,  146 => 65,  142 => 63,  139 => 62,  135 => 61,  131 => 59,  128 => 58,  124 => 57,  120 => 55,  117 => 34,  113 => 33,  109 => 31,  106 => 30,  102 => 29,  97 => 80,  95 => 77,  92 => 76,  90 => 73,  87 => 72,  85 => 69,  82 => 68,  80 => 65,  77 => 64,  75 => 61,  72 => 60,  70 => 57,  67 => 56,  65 => 33,  62 => 32,  59 => 29,  55 => 28,  44 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Monitoring/index.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Monitoring\\index.html.twig");
    }
}
