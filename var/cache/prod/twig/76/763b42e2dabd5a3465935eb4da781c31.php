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

/* @PrestaShop/Admin/Common/Grid/Blocks/pagination.html.twig */
class __TwigTemplate_d8655b0795545ea7b0f0391598693521 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'grid_pagination' => [$this, 'block_grid_pagination'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('grid_pagination', $context, $blocks);
    }

    public function block_grid_pagination($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "  ";
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 27), "records_total", [], "any", false, false, false, 27) > 10) || twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "pagination", [], "any", false, false, false, 27), "offset", [], "any", false, false, false, 27))) {
            // line 28
            echo "    ";
            $context["route_params"] = [];
            // line 29
            echo "
    ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 30), "attributes", [], "any", false, false, false, 30), "get", [0 => "_route_params"], "method", false, false, false, 30));
            foreach ($context['_seq'] as $context["param_name"] => $context["param_value"]) {
                // line 31
                echo "      ";
                $context["route_params"] = twig_array_merge(($context["route_params"] ?? null), [$context["param_name"] => $context["param_value"]]);
                // line 32
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['param_name'], $context['param_value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "
    ";
            // line 34
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin\\Common:pagination", ["limit" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 35
($context["grid"] ?? null), "pagination", [], "any", false, false, false, 35), "limit", [], "any", false, false, false, 35), "offset" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 36
($context["grid"] ?? null), "pagination", [], "any", false, false, false, 36), "offset", [], "any", false, false, false, 36), "total" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 37
($context["grid"] ?? null), "data", [], "any", false, false, false, 37), "records_total", [], "any", false, false, false, 37), "prefix" => twig_get_attribute($this->env, $this->source,             // line 38
($context["grid"] ?? null), "form_prefix", [], "any", false, false, false, 38), "caller_route" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 39
($context["app"] ?? null), "request", [], "any", false, false, false, 39), "attributes", [], "any", false, false, false, 39), "get", [0 => "_route"], "method", false, false, false, 39), "caller_parameters" =>             // line 40
($context["route_params"] ?? null), "view" => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 41
($context["grid"] ?? null), "view_options", [], "any", false, true, false, 41), "pagination_view", [], "any", true, true, false, 41)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "view_options", [], "any", false, true, false, 41), "pagination_view", [], "any", false, false, false, 41), "full")) : ("full"))]));
            // line 42
            echo "
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/pagination.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  82 => 42,  80 => 41,  79 => 40,  78 => 39,  77 => 38,  76 => 37,  75 => 36,  74 => 35,  73 => 34,  70 => 33,  64 => 32,  61 => 31,  57 => 30,  54 => 29,  51 => 28,  48 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/pagination.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Blocks\\pagination.html.twig");
    }
}
