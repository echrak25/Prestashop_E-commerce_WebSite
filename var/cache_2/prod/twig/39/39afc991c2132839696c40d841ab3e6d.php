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

/* @PrestaShop/Admin/Common/Grid/Blocks/table_customer.html.twig */
class __TwigTemplate_dc41fcc6583608c733b8c4c5a9a70b55 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'grid_table_body' => [$this, 'block_grid_table_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@!PrestaShop/Admin/Common/Grid/Blocks/table.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@!PrestaShop/Admin/Common/Grid/Blocks/table.html.twig", "@PrestaShop/Admin/Common/Grid/Blocks/table_customer.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_grid_table_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 3), "records", [], "any", false, false, false, 3))) {
            // line 4
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "data", [], "any", false, false, false, 4), "records", [], "any", false, false, false, 4));
            foreach ($context['_seq'] as $context["_key"] => $context["record"]) {
                // line 5
                echo "        <tr>
          ";
                // line 6
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "columns", [], "any", false, false, false, 6));
                foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                    // line 7
                    echo "                <td class=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "type", [], "any", false, false, false, 7), "html", null, true);
                    echo "-type column-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 7), "html", null, true);
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "options", [], "any", false, true, false, 7), "clickable", [], "any", true, true, false, 7) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "options", [], "any", false, false, false, 7), "clickable", [], "any", false, false, false, 7))) {
                        echo " clickable";
                    }
                    echo "\">
                  ";
                    // line 8
                    if ((twig_get_attribute($this->env, $this->source, $context["column"], "id", [], "any", false, false, false, 8) == "id_last_order")) {
                        // line 9
                        echo "                        ";
                        echo twig_get_attribute($this->env, $this->source, ($context["module_ets_trackingcustomer"] ?? null), "printOrderProducts", [0 => 0, 1 => $context["record"]], "method", false, false, false, 9);
                        echo "
                  ";
                    } elseif ((twig_get_attribute($this->env, $this->source,                     // line 10
$context["column"], "id", [], "any", false, false, false, 10) == "id_last_order_domain")) {
                        // line 11
                        echo "                        ";
                        echo twig_get_attribute($this->env, $this->source, ($context["module_ets_trackingcustomer"] ?? null), "printShopDomains", [0 => 0, 1 => $context["record"]], "method", false, false, false, 11);
                        echo "
                  ";
                    } else {
                        // line 13
                        echo "                        ";
                        echo $this->extensions['PrestaShopBundle\Twig\Extension\GridExtension']->renderColumnContent($context["record"], $context["column"], ($context["grid"] ?? null));
                        echo "
                  ";
                    }
                    // line 15
                    echo "                </td>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 17
                echo "        </tr>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['record'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "    ";
        } else {
            // line 20
            echo "      ";
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig", ["grid" => ($context["grid"] ?? null)]);
            echo "
    ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/table_customer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 20,  110 => 19,  103 => 17,  96 => 15,  90 => 13,  84 => 11,  82 => 10,  77 => 9,  75 => 8,  65 => 7,  61 => 6,  58 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/table_customer.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\PrestaShop\\Admin\\Common\\Grid\\Blocks\\table_customer.html.twig");
    }
}
