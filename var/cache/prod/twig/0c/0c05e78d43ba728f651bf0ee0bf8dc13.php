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

/* @PrestaShop/Admin/Common/Grid/Blocks/table.html.twig */
class __TwigTemplate_9b5403e4503606017a6656e180079e85 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'grid_table_head' => [$this, 'block_grid_table_head'],
            'grid_table_body' => [$this, 'block_grid_table_body'],
            'grid_table_footer' => [$this, 'block_grid_table_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminGridTableBefore", ["grid" =>         // line 27
($context["grid"] ?? null), "legacy_controller" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 28
($context["app"] ?? null), "request", [], "any", false, false, false, 28), "attributes", [], "any", false, false, false, 28), "get", [0 => "_legacy_controller"], "method", false, false, false, 28), "controller" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 29
($context["app"] ?? null), "request", [], "any", false, false, false, 29), "attributes", [], "any", false, false, false, 29), "get", [0 => "_controller"], "method", false, false, false, 29)]);
        // line 31
        echo "

";
        // line 33
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 33), 'form_start', ["attr" => ["id" => (twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 33) . "_filter_form"), "class" => "table-responsive"]]);
        echo "

<table class=\"grid-table js-grid-table table ";
        // line 35
        if ($this->extensions['PrestaShopBundle\Twig\Extension\GridExtension']->isOrderingColumn(($context["grid"] ?? null))) {
            echo "grid-ordering-column";
        }
        echo " ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "attributes", [], "any", false, false, false, 35), "is_empty_state", [], "any", false, false, false, 35)) {
            echo "border-0";
        }
        echo "\"
       id=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 36), "html", null, true);
        echo "_grid_table\"
       data-query=\"";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 37), "query", [], "any", false, false, false, 37), "html", null, true);
        echo "\"
>
  <thead class=\"thead-default\">
  ";
        // line 40
        $this->displayBlock('grid_table_head', $context, $blocks);
        // line 46
        echo "  </thead>
  <tbody>
  ";
        // line 48
        $this->displayBlock('grid_table_body', $context, $blocks);
        // line 66
        echo "  </tbody>
  ";
        // line 67
        $this->displayBlock('grid_table_footer', $context, $blocks);
        // line 68
        echo "</table>

";
        // line 70
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 70), 'form_end');
        echo "

";
        // line 72
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminGridTableAfter", ["grid" =>         // line 73
($context["grid"] ?? null), "legacy_controller" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 74
($context["app"] ?? null), "request", [], "any", false, false, false, 74), "attributes", [], "any", false, false, false, 74), "get", [0 => "_legacy_controller"], "method", false, false, false, 74), "controller" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 75
($context["app"] ?? null), "request", [], "any", false, false, false, 75), "attributes", [], "any", false, false, false, 75), "get", [0 => "_controller"], "method", false, false, false, 75)]);
        // line 77
        echo "
";
    }

    // line 40
    public function block_grid_table_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        echo "    ";
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/Table/headers_row.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
    ";
        // line 42
        if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "actions", [], "any", false, false, false, 42), "bulk", [], "any", false, false, false, 42)) > 0) || (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "filter_form", [], "any", false, false, false, 42)) > 1))) {
            // line 43
            echo "      ";
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/Table/filters_row.html.twig", ["grid" => ($context["grid"] ?? null)]);
            echo "
    ";
        }
        // line 45
        echo "  ";
    }

    // line 48
    public function block_grid_table_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        echo "    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 49), "records", [], "any", false, false, false, 49))) {
            // line 50
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 50), "records", [], "any", false, false, false, 50));
            foreach ($context['_seq'] as $context["_key"] => $context["record"]) {
                // line 51
                echo "        <tr>
          ";
                // line 52
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "columns", [], "any", false, false, false, 52));
                foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                    // line 53
                    echo "            <td
              ";
                    // line 54
                    if ((twig_get_attribute($this->env, $this->source, $context["column"], "type", [], "any", false, false, false, 54) == "identifier")) {
                        echo "data-identifier=\"";
                        echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["record"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 54)] ?? null) : null), "html", null, true);
                        echo "\"";
                    }
                    // line 55
                    echo "              class=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "type", [], "any", false, false, false, 55), "html", null, true);
                    echo "-type column-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 55), "html", null, true);
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "options", [], "any", false, true, false, 55), "clickable", [], "any", true, true, false, 55) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "options", [], "any", false, false, false, 55), "clickable", [], "any", false, false, false, 55))) {
                        echo " clickable";
                    }
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "options", [], "any", false, true, false, 55), "alignment", [], "any", true, true, false, 55) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "options", [], "any", false, false, false, 55), "alignment", [], "any", false, false, false, 55))) {
                        echo " text-";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "options", [], "any", false, false, false, 55), "alignment", [], "any", false, false, false, 55), "html", null, true);
                    }
                    echo "\"
            >
              ";
                    // line 57
                    echo $this->extensions['PrestaShopBundle\Twig\Extension\GridExtension']->renderColumnContent($context["record"], $context["column"], ($context["grid"] ?? null));
                    echo "
            </td>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 60
                echo "        </tr>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['record'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "    ";
        } else {
            // line 63
            echo "      ";
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig", ["grid" => ($context["grid"] ?? null)]);
            echo "
    ";
        }
        // line 65
        echo "  ";
    }

    // line 67
    public function block_grid_table_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 67,  198 => 65,  192 => 63,  189 => 62,  182 => 60,  173 => 57,  158 => 55,  152 => 54,  149 => 53,  145 => 52,  142 => 51,  137 => 50,  134 => 49,  130 => 48,  126 => 45,  120 => 43,  118 => 42,  113 => 41,  109 => 40,  104 => 77,  102 => 75,  101 => 74,  100 => 73,  99 => 72,  94 => 70,  90 => 68,  88 => 67,  85 => 66,  83 => 48,  79 => 46,  77 => 40,  71 => 37,  67 => 36,  57 => 35,  52 => 33,  48 => 31,  46 => 29,  45 => 28,  44 => 27,  43 => 26,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/table.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Blocks\\table.html.twig");
    }
}
