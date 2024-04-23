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

/* @PrestaShop/Admin/Common/Grid/Blocks/Table/filters_row.html.twig */
class __TwigTemplate_02bdb4447cf4eb3c702cce3167e80776 extends Template
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
        // line 21
        echo "
<tr class=\"column-filters ";
        // line 22
        if (((0 == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 22), "records_total", [], "any", false, false, false, 22)) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "filters", [], "any", false, false, false, 22)))) {
            echo "d-none";
        }
        echo "\">
  ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "columns", [], "any", false, false, false, 23));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 24
            echo "    <td>
      ";
            // line 25
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 25) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "actions", [], "any", false, false, false, 25), "bulk", [], "any", false, false, false, 25)) > 0))) {
                // line 26
                echo "        ";
                echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/bulk_actions_select_all.html.twig", ["grid" => ($context["grid"] ?? null)]);
                echo "
      ";
            }
            // line 28
            echo "
      ";
            // line 29
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 29)) > 1)) {
                // line 30
                echo "        ";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "column_filters", [], "any", false, true, false, 30), twig_get_attribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 30), [], "array", true, true, false, 30)) {
                    // line 31
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "column_filters", [], "any", false, false, false, 31)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 31)] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["filter_name"]) {
                        // line 32
                        echo "            ";
                        if (($context["filter_name"] == "last_action")) {
                            // line 33
                            echo "                ";
                            echo ($context["ets_tc_select_action"] ?? null);
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_1 = twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 33)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[$context["filter_name"]] ?? null) : null), 'widget');
                            echo "
            ";
                        } else {
                            // line 35
                            echo "                ";
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 35)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[$context["filter_name"]] ?? null) : null), 'widget');
                            echo "
            ";
                        }
                        // line 37
                        echo "          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter_name'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 38
                    echo "        ";
                }
                // line 39
                echo "      ";
            }
            // line 40
            echo "    </td>
  ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "</tr>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/Table/filters_row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 42,  115 => 40,  112 => 39,  109 => 38,  103 => 37,  97 => 35,  90 => 33,  87 => 32,  82 => 31,  79 => 30,  77 => 29,  74 => 28,  68 => 26,  66 => 25,  63 => 24,  46 => 23,  40 => 22,  37 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/Table/filters_row.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\PrestaShop\\Admin\\Common\\Grid\\Blocks\\Table\\filters_row.html.twig");
    }
}
