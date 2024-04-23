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

/* @!PrestaShop/Admin/Common/Grid/grid_panel.html.twig */
class __TwigTemplate_295429015c15c4335590ab49af9dd557 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'grid_panel_header' => [$this, 'block_grid_panel_header'],
            'grid_actions_block' => [$this, 'block_grid_actions_block'],
            'grid_panel_body' => [$this, 'block_grid_panel_body'],
            'grid_view_block' => [$this, 'block_grid_view_block'],
            'grid_panel_footer' => [$this, 'block_grid_panel_footer'],
            'grid_panel_extra_content' => [$this, 'block_grid_panel_extra_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        $context["displayName"] = true;
        // line 26
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "view_options", [], "any", false, true, false, 26), "display_name", [], "any", true, true, false, 26)) {
            // line 27
            echo "    ";
            $context["displayName"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "view_options", [], "any", false, false, false, 27), "display_name", [], "any", false, false, false, 27);
        }
        // line 29
        echo "
<div class=\"card js-grid-panel\" id=\"";
        // line 30
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 30), "html", null, true);
        echo "_grid_panel\">
  ";
        // line 31
        $this->displayBlock('grid_panel_header', $context, $blocks);
        // line 47
        echo "
  ";
        // line 48
        $this->displayBlock('grid_panel_body', $context, $blocks);
        // line 55
        echo "
  ";
        // line 56
        $this->displayBlock('grid_panel_footer', $context, $blocks);
        // line 57
        echo "</div>

";
        // line 59
        $this->displayBlock('grid_panel_extra_content', $context, $blocks);
    }

    // line 31
    public function block_grid_panel_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "    ";
        if (( !(($context["displayName"] ?? null) === false) || (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "actions", [], "any", false, false, false, 32), "grid", [], "any", false, false, false, 32)) > 0))) {
            // line 33
            echo "    <div class=\"card-header js-grid-header\">
      ";
            // line 34
            if ( !(($context["displayName"] ?? null) === false)) {
                // line 35
                echo "        <h3 class=\"d-inline-block card-header-title\">
          ";
                // line 36
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "name", [], "any", false, false, false, 36), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 36), "records_total", [], "any", false, false, false, 36), "html", null, true);
                echo ")
        </h3>
      ";
            }
            // line 39
            echo "      ";
            $this->displayBlock('grid_actions_block', $context, $blocks);
            // line 44
            echo "    </div>
    ";
        }
        // line 46
        echo "  ";
    }

    // line 39
    public function block_grid_actions_block($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 40
        echo "        <div class=\"d-inline-block float-right\">
          ";
        // line 41
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/grid_actions.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
        </div>
      ";
    }

    // line 48
    public function block_grid_panel_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        echo "    <div class=\"card-body\">
      ";
        // line 50
        $this->displayBlock('grid_view_block', $context, $blocks);
        // line 53
        echo "    </div>
  ";
    }

    // line 50
    public function block_grid_view_block($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 51
        echo "        ";
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/grid.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
      ";
    }

    // line 56
    public function block_grid_panel_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 59
    public function block_grid_panel_extra_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "@!PrestaShop/Admin/Common/Grid/grid_panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 59,  151 => 56,  144 => 51,  140 => 50,  135 => 53,  133 => 50,  130 => 49,  126 => 48,  119 => 41,  116 => 40,  112 => 39,  108 => 46,  104 => 44,  101 => 39,  93 => 36,  90 => 35,  88 => 34,  85 => 33,  82 => 32,  78 => 31,  74 => 59,  70 => 57,  68 => 56,  65 => 55,  63 => 48,  60 => 47,  58 => 31,  54 => 30,  51 => 29,  47 => 27,  45 => 26,  43 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@!PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\grid_panel.html.twig");
    }
}
