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

/* @PrestaShop/Admin/Common/Grid/Columns/Content/badge.html.twig */
class __TwigTemplate_dc8465153db73dafd8e0e9d1ff34ca99 extends Template
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
<div class=\"text-right\">
";
        // line 27
        if (( !twig_test_empty((($__internal_compile_0 = ($context["record"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 27), "field", [], "any", false, false, false, 27)] ?? null) : null)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 27), "badge_type", [], "any", false, false, false, 27)))) {
            // line 28
            echo "  <span class=\"badge rounded badge-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 28), "badge_type", [], "any", false, false, false, 28), "html", null, true);
            echo "\">
    ";
            // line 29
            echo twig_escape_filter($this->env, (($__internal_compile_1 = ($context["record"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 29), "field", [], "any", false, false, false, 29)] ?? null) : null), "html", null, true);
            echo "
  </span>
";
        } elseif ((( !twig_test_empty((($__internal_compile_2 =         // line 31
($context["record"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 31), "field", [], "any", false, false, false, 31)] ?? null) : null)) && twig_in_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 31), "color_field", [], "any", false, false, false, 31), twig_get_array_keys_filter(($context["record"] ?? null)))) &&  !twig_test_empty((($__internal_compile_3 = ($context["record"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 31), "color_field", [], "any", false, false, false, 31)] ?? null) : null)))) {
            // line 32
            echo "  ";
            $context["textColor"] = (($this->env->getFunction('is_color_bright')->getCallable()((($__internal_compile_4 = ($context["record"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 32), "color_field", [], "any", false, false, false, 32)] ?? null) : null))) ? ("#383838") : ("white"));
            // line 33
            echo "  <span class=\"badge rounded\" style=\"background-color: ";
            echo twig_escape_filter($this->env, (($__internal_compile_5 = ($context["record"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 33), "color_field", [], "any", false, false, false, 33)] ?? null) : null), "html", null, true);
            echo "; color: ";
            echo twig_escape_filter($this->env, ($context["textColor"] ?? null), "html", null, true);
            echo "\">
    ";
            // line 34
            echo twig_escape_filter($this->env, (($__internal_compile_6 = ($context["record"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 34), "field", [], "any", false, false, false, 34)] ?? null) : null), "html", null, true);
            echo "
  </span>
";
        } elseif ( !twig_test_empty((($__internal_compile_7 =         // line 36
($context["record"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 36), "field", [], "any", false, false, false, 36)] ?? null) : null))) {
            // line 37
            echo "  ";
            echo twig_escape_filter($this->env, (($__internal_compile_8 = ($context["record"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 37), "field", [], "any", false, false, false, 37)] ?? null) : null), "html", null, true);
            echo "
";
        } else {
            // line 39
            echo "  ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 39), "empty_value", [], "any", false, false, false, 39), "html", null, true);
            echo "
";
        }
        // line 41
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/badge.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 41,  78 => 39,  72 => 37,  70 => 36,  65 => 34,  58 => 33,  55 => 32,  53 => 31,  48 => 29,  43 => 28,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/badge.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Columns\\Content\\badge.html.twig");
    }
}
