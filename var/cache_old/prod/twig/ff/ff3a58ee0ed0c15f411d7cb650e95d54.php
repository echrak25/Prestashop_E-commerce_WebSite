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

/* @PrestaShop/Admin/Common/Grid/grid_panel.html.twig */
class __TwigTemplate_0e93478b82c70a10428e8b82d9f215c2 extends Template
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
        // line 19
        $context["displayName"] = true;
        // line 20
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "view_options", [], "any", false, true, false, 20), "display_name", [], "any", true, true, false, 20)) {
            // line 21
            echo "    ";
            $context["displayName"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "view_options", [], "any", false, false, false, 21), "display_name", [], "any", false, false, false, 21);
        }
        // line 23
        echo "
<div class=\"card js-grid-panel\" id=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 24), "html", null, true);
        echo "_grid_panel\" data-hook-name=\"";
        echo twig_escape_filter($this->env, twig_first($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "name", [], "any", false, false, false, 24), " ")), "html", null, true);
        echo "\">
  ";
        // line 25
        $this->displayBlock('grid_panel_header', $context, $blocks);
        // line 39
        echo "
  ";
        // line 40
        $this->displayBlock('grid_panel_body', $context, $blocks);
        // line 47
        echo "
  ";
        // line 48
        $this->displayBlock('grid_panel_footer', $context, $blocks);
        // line 49
        echo "</div>

";
        // line 51
        $this->displayBlock('grid_panel_extra_content', $context, $blocks);
    }

    // line 25
    public function block_grid_panel_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "      ";
        if ( !(($context["displayName"] ?? null) === false)) {
            // line 27
            echo "          <div class=\"card-header js-grid-header\">
            <h3 class=\"d-inline-block card-header-title\">
              ";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "name", [], "any", false, false, false, 29), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 29), "records_total", [], "any", false, false, false, 29), "html", null, true);
            echo ")
            </h3>
            ";
            // line 31
            $this->displayBlock('grid_actions_block', $context, $blocks);
            // line 36
            echo "          </div>
      ";
        }
        // line 38
        echo "  ";
    }

    // line 31
    public function block_grid_actions_block($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "              <div class=\"d-inline-block float-right\">
                ";
        // line 33
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/grid_actions.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
              </div>
            ";
    }

    // line 40
    public function block_grid_panel_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        echo "    <div class=\"card-body\">
      ";
        // line 42
        $this->displayBlock('grid_view_block', $context, $blocks);
        // line 45
        echo "    </div>
  ";
    }

    // line 42
    public function block_grid_view_block($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 43
        echo "        ";
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/grid.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
      ";
    }

    // line 48
    public function block_grid_panel_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 51
    public function block_grid_panel_extra_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 51,  147 => 48,  140 => 43,  136 => 42,  131 => 45,  129 => 42,  126 => 41,  122 => 40,  115 => 33,  112 => 32,  108 => 31,  104 => 38,  100 => 36,  98 => 31,  91 => 29,  87 => 27,  84 => 26,  80 => 25,  76 => 51,  72 => 49,  70 => 48,  67 => 47,  65 => 40,  62 => 39,  60 => 25,  54 => 24,  51 => 23,  47 => 21,  45 => 20,  43 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ps_linklist\\views\\PrestaShop\\Admin\\Common\\Grid\\grid_panel.html.twig");
    }
}
