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

/* @!PrestaShop/Admin/Common/Grid/grid.html.twig */
class __TwigTemplate_fb2b718f3113d422c8c31fd5f43d201e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'grid_header_row' => [$this, 'block_grid_header_row'],
            'grid_bulk_actions_block' => [$this, 'block_grid_bulk_actions_block'],
            'grid_table_row' => [$this, 'block_grid_table_row'],
            'grid_footer_row' => [$this, 'block_grid_footer_row'],
            'grid_extra_content' => [$this, 'block_grid_extra_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
<div class=\"grid js-grid\" id=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 26), "html", null, true);
        echo "_grid\" data-grid-id=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 26), "html", null, true);
        echo "\">
  ";
        // line 27
        $this->displayBlock('grid_header_row', $context, $blocks);
        // line 32
        echo "
  ";
        // line 33
        $this->displayBlock('grid_table_row', $context, $blocks);
        // line 36
        echo "
  ";
        // line 37
        $this->displayBlock('grid_footer_row', $context, $blocks);
        // line 40
        echo "</div>

";
        // line 42
        $this->displayBlock('grid_extra_content', $context, $blocks);
    }

    // line 27
    public function block_grid_header_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "    ";
        $this->displayBlock('grid_bulk_actions_block', $context, $blocks);
        // line 31
        echo "  ";
    }

    // line 28
    public function block_grid_bulk_actions_block($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "      ";
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/bulk_actions.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
    ";
    }

    // line 33
    public function block_grid_table_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "    ";
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/table.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
  ";
    }

    // line 37
    public function block_grid_footer_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "    ";
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/pagination.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
  ";
    }

    // line 42
    public function block_grid_extra_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "@!PrestaShop/Admin/Common/Grid/grid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 42,  108 => 38,  104 => 37,  97 => 34,  93 => 33,  86 => 29,  82 => 28,  78 => 31,  75 => 28,  71 => 27,  67 => 42,  63 => 40,  61 => 37,  58 => 36,  56 => 33,  53 => 32,  51 => 27,  45 => 26,  42 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@!PrestaShop/Admin/Common/Grid/grid.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\grid.html.twig");
    }
}
