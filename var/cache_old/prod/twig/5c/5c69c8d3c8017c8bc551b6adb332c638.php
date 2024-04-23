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

/* @PrestaShop/Admin/Common/Grid/Columns/Content/choice.html.twig */
class __TwigTemplate_54e429904e3308e3818b3555fd6cff0f extends Template
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
        $context["choices"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 26), "choice_provider", [], "any", false, false, false, 26), "getChoices", [0 => ($context["record"] ?? null)], "method", false, false, false, 26);
        // line 27
        $context["selectedChoice"] = (($__internal_compile_0 = ($context["record"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 27), "field", [], "any", false, false, false, 27)] ?? null) : null);
        // line 28
        $context["selectedChoiceName"] = "";
        // line 29
        $context["routeParams"] = $this->extensions['PrestaShopBundle\Twig\DataFormatterExtension']->arrayPluck(($context["record"] ?? null), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 29), "record_route_params", [], "any", false, false, false, 29));
        // line 30
        echo "
";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["choices"] ?? null));
        foreach ($context['_seq'] as $context["name"] => $context["value"]) {
            // line 32
            echo "  ";
            if (($context["value"] == ($context["selectedChoice"] ?? null))) {
                // line 33
                echo "    ";
                $context["selectedChoiceName"] = $context["name"];
                // line 34
                echo "  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
";
        // line 37
        $context["classes"] = "btn btn-secondary dropdown-toggle dropdown-toggle-split rounded";
        // line 38
        echo "
";
        // line 39
        if ( !twig_test_empty(($context["choices"] ?? null))) {
            // line 40
            echo "  <div class=\"dropdown\">
    <button
      ";
            // line 42
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 42), "color_field", [], "any", false, false, false, 42)) {
                // line 43
                echo "        ";
                $context["textColor"] = (($this->env->getFunction('is_color_bright')->getCallable()((($__internal_compile_1 = ($context["record"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 43), "color_field", [], "any", false, false, false, 43)] ?? null) : null))) ? ("#383838") : ("white"));
                // line 44
                echo "        style=\"background-color: ";
                echo twig_escape_filter($this->env, (($__internal_compile_2 = ($context["record"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 44), "color_field", [], "any", false, false, false, 44)] ?? null) : null), "html", null, true);
                echo "; color: ";
                echo twig_escape_filter($this->env, ($context["textColor"] ?? null), "html", null, true);
                echo ";\"
        ";
                // line 45
                $context["classes"] = (($context["classes"] ?? null) . " coloured");
                // line 46
                echo "      ";
            }
            // line 47
            echo "      class=\"";
            echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
            echo "\"
      type=\"button\"
      data-toggle=\"dropdown\"
      aria-haspopup=\"true\"
      aria-expanded=\"false\"
      data-flip=\"false\"
    >
      ";
            // line 54
            echo twig_escape_filter($this->env, ($context["selectedChoiceName"] ?? null), "html", null, true);
            echo "
    </button>
    <div
      class=\"dropdown-menu js-choice-options\"
      data-url=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 58), "route", [], "any", false, false, false, 58), ($context["routeParams"] ?? null)), "html", null, true);
            echo "\"
    >
      ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_array_filter($this->env, ($context["choices"] ?? null), function ($__value__) use ($context, $macros) { $context["value"] = $__value__; return ($context["value"] != ($context["selectedChoice"] ?? null)); }));
            foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                // line 61
                echo "        <button class=\"js-dropdown-item dropdown-item\" data-value=\"";
                echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</button>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "    </div>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/choice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 63,  126 => 61,  122 => 60,  117 => 58,  110 => 54,  99 => 47,  96 => 46,  94 => 45,  87 => 44,  84 => 43,  82 => 42,  78 => 40,  76 => 39,  73 => 38,  71 => 37,  68 => 36,  61 => 34,  58 => 33,  55 => 32,  51 => 31,  48 => 30,  46 => 29,  44 => 28,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/choice.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Columns\\Content\\choice.html.twig");
    }
}
