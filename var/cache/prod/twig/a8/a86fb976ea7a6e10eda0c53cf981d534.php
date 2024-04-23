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

/* @PrestaShop/Admin/Common/Grid/Columns/Content/category_position.html.twig */
class __TwigTemplate_ebe1af1cf0018c6eed5fb5e8e4a100e4 extends Template
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
<div class=\"category-position-column\">
  ";
        // line 27
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "sorting", [], "any", false, false, false, 27), "order_by", [], "any", false, false, false, 27) == "position") && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "sorting", [], "any", false, false, false, 27), "order_way", [], "any", false, false, false, 27) == "asc"))) {
            // line 28
            echo "    <div class=\"js-drag-handle js-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 28), "html", null, true);
            echo "-position text-center\"
         data-id=\"";
            // line 29
            echo twig_escape_filter($this->env, (($__internal_compile_0 = ($context["record"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 29), "id_field", [], "any", false, false, false, 29)] ?? null) : null), "html", null, true);
            echo "\"
         data-id-parent=\"";
            // line 30
            echo twig_escape_filter($this->env, (($__internal_compile_1 = ($context["record"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 30), "id_parent_field", [], "any", false, false, false, 30)] ?? null) : null), "html", null, true);
            echo "\"
         data-position=\"";
            // line 31
            echo twig_escape_filter($this->env, (($__internal_compile_2 = ($context["record"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 31), "field", [], "any", false, false, false, 31)] ?? null) : null), "html", null, true);
            echo "\"
         data-position-update-url=\"";
            // line 32
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 32), "update_route", [], "any", false, false, false, 32));
            echo "\"
         data-pagination-offset=\"";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "pagination", [], "any", false, false, false, 33), "offset", [], "any", false, false, false, 33), "html", null, true);
            echo "\"
    >
    <span class=\"js-position position\">
      ";
            // line 36
            echo twig_escape_filter($this->env, ((($__internal_compile_3 = ($context["record"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 36), "field", [], "any", false, false, false, 36)] ?? null) : null) + 1), "html", null, true);
            echo "
    </span>
    </div>
  ";
        } else {
            // line 40
            echo "    <div class=\"text-center\">
    <span class=\"position\">
      ";
            // line 42
            echo twig_escape_filter($this->env, ((($__internal_compile_4 = ($context["record"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 42), "field", [], "any", false, false, false, 42)] ?? null) : null) + 1), "html", null, true);
            echo "
    </span>
    </div>
  ";
        }
        // line 46
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/category_position.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 46,  81 => 42,  77 => 40,  70 => 36,  64 => 33,  60 => 32,  56 => 31,  52 => 30,  48 => 29,  43 => 28,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/category_position.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Columns\\Content\\category_position.html.twig");
    }
}
