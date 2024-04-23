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

/* @PrestaShop/Admin/Common/Grid/Columns/Content/toggle.html.twig */
class __TwigTemplate_a7be21164fd7064e1575a6f46d0327e8 extends Template
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
        $context["id_property_name"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 25), "primary_field", [], "any", false, false, false, 25);
        // line 26
        $context["id_primary_key"] = (($__internal_compile_0 = ($context["record"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[($context["id_property_name"] ?? null)] ?? null) : null);
        // line 27
        $context["record_id"] = (($__internal_compile_1 = ($context["record"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[($context["id_property_name"] ?? null)] ?? null) : null);
        // line 28
        echo "
";
        // line 29
        $context["isValid"] = ((($__internal_compile_2 = ($context["record"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "id", [], "any", false, false, false, 29)] ?? null) : null) == 1);
        // line 30
        echo "
<div class=\"text-center\">
  <div 
    class=\"ps-switch ps-switch-sm ps-switch-nolabel ps-switch-center ps-togglable-row\"
    data-toggle-url=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 34), "route", [], "any", false, false, false, 34), [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 34), "route_param_name", [], "any", false, false, false, 34) => ($context["id_primary_key"] ?? null)]), "html", null, true);
        echo "\"
  >
  <input type=\"radio\" name=\"input-";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 36), "route", [], "any", false, false, false, 36), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, ($context["id_primary_key"] ?? null), "html", null, true);
        echo "\" 
         id=\"input-false-";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 37), "route", [], "any", false, false, false, 37), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, ($context["id_primary_key"] ?? null), "html", null, true);
        echo "\" 
         value=\"0\" ";
        // line 38
        if ( !($context["isValid"] ?? null)) {
            echo "checked";
        }
        echo ">
      <label for=\"input-false-";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 39), "route", [], "any", false, false, false, 39), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, ($context["id_primary_key"] ?? null), "html", null, true);
        echo "\">Off</label>
      <input type=\"radio\" name=\"input-";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 40), "route", [], "any", false, false, false, 40), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, ($context["id_primary_key"] ?? null), "html", null, true);
        echo "\" 
             id=\"input-true-";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 41), "route", [], "any", false, false, false, 41), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, ($context["id_primary_key"] ?? null), "html", null, true);
        echo "\" 
             value=\"1\" ";
        // line 42
        if (($context["isValid"] ?? null)) {
            echo "checked";
        }
        echo ">
      <label for=\"input-true-";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 43), "route", [], "any", false, false, false, 43), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, ($context["id_primary_key"] ?? null), "html", null, true);
        echo "\">On</label>
      <span class=\"slide-button\"></span>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/toggle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 43,  95 => 42,  89 => 41,  83 => 40,  77 => 39,  71 => 38,  65 => 37,  59 => 36,  54 => 34,  48 => 30,  46 => 29,  43 => 28,  41 => 27,  39 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/toggle.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Columns\\Content\\toggle.html.twig");
    }
}
