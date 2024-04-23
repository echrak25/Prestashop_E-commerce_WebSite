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

/* @PrestaShop/Admin/Common/Grid/Columns/Content/link.html.twig */
class __TwigTemplate_b28239e6884f2d94f92ae75319535443 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'link' => [$this, 'block_link'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 26), "color_template_field", [], "any", false, false, false, 26)) && twig_get_attribute($this->env, $this->source, ($context["record"] ?? null), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 26), "color_template_field", [], "any", false, false, false, 26), [], "array", true, true, false, 26))) {
            // line 27
            echo "  ";
            $context["color"] = (($__internal_compile_0 = ($context["record"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 27), "color_template_field", [], "any", false, false, false, 27)] ?? null) : null);
        } else {
            // line 29
            echo "  ";
            $context["color"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 29), "color_template", [], "any", false, false, false, 29);
        }
        // line 31
        $context["class"] = ("text-" . ($context["color"] ?? null));
        // line 32
        echo "
";
        // line 33
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 33), "button_template", [], "any", false, false, false, 33)) {
            // line 34
            echo "  ";
            $context["style"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 34), "button_template", [], "any", false, false, false, 34);
            // line 35
            echo "  ";
            if ((($context["style"] ?? null) == "normal")) {
                // line 36
                echo "    ";
                $context["class"] = ("btn btn-" . ($context["color"] ?? null));
                // line 37
                echo "  ";
            } elseif ((($context["style"] ?? null) == "outline")) {
                // line 38
                echo "    ";
                $context["class"] = ("btn btn-outline-" . ($context["color"] ?? null));
                // line 39
                echo "  ";
            }
        }
        // line 41
        echo "
";
        // line 42
        $this->displayBlock('link', $context, $blocks);
    }

    public function block_link($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 43
        echo "<a
  class=\"";
        // line 44
        echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
        echo " text-nowrap\"
  href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 45), "route", [], "any", false, false, false, 45), [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 45), "route_param_name", [], "any", false, false, false, 45) => (($__internal_compile_1 = ($context["record"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 45), "route_param_field", [], "any", false, false, false, 45)] ?? null) : null), "_fragment" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 45), "route_fragment", [], "any", false, false, false, 45)]), "html", null, true);
        echo "\"
  ";
        // line 46
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, true, false, 46), "target", [], "any", true, true, false, 46)) {
            // line 47
            echo "    target=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 47), "target", [], "any", false, false, false, 47), "html", null, true);
            echo "\"
  ";
        }
        // line 49
        echo ">
  ";
        // line 50
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, true, false, 50), "icon", [], "any", true, true, false, 50) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 50), "icon", [], "any", false, false, false, 50)))) {
            // line 51
            echo "    <i class=\"material-icons\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 51), "icon", [], "any", false, false, false, 51), "html", null, true);
            echo "</i>
  ";
        }
        // line 53
        echo "  ";
        echo twig_escape_filter($this->env, (($__internal_compile_2 = ($context["record"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 53), "field", [], "any", false, false, false, 53)] ?? null) : null), "html", null, true);
        echo "
</a>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/link.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 53,  111 => 51,  109 => 50,  106 => 49,  100 => 47,  98 => 46,  94 => 45,  90 => 44,  87 => 43,  80 => 42,  77 => 41,  73 => 39,  70 => 38,  67 => 37,  64 => 36,  61 => 35,  58 => 34,  56 => 33,  53 => 32,  51 => 31,  47 => 29,  43 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/link.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Columns\\Content\\link.html.twig");
    }
}
