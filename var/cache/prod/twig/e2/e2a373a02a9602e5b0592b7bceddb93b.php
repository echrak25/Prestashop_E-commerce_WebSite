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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/discount_list.html.twig */
class __TwigTemplate_201b199796ea0d1c16038e92d9bfc285 extends Template
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
        echo "<div class=\"col-md-12\">
  <table class=\"table discountList";
        // line 26
        if (twig_test_empty(($context["discounts"] ?? null))) {
            echo " d-none";
        }
        echo "\">
    <thead>
    <tr>
      <th>";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Name", [], "Admin.Global"), "html", null, true);
        echo "</th>
      <th>";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Value", [], "Admin.Global"), "html", null, true);
        echo "</th>
      <th class=\"text-right d-print-none\">";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actions", [], "Admin.Global"), "html", null, true);
        echo "</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["discounts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["discount"]) {
            // line 36
            echo "      <tr>
        <td class=\"discountList-name\">";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "name", [], "any", false, false, false, 37), "html", null, true);
            echo "</td>
        <td data-role=\"discountList-value\">
          ";
            // line 39
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["discount"], "amountRaw", [], "any", false, false, false, 39), "greaterThan", [0 => $this->extensions['PrestaShopBundle\Twig\Extension\NumberExtension']->createNumber(0)], "method", false, false, false, 39)) {
                echo "-";
            }
            // line 40
            echo "          ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "amountFormatted", [], "any", false, false, false, 40), "html", null, true);
            echo "
        </td>
        <td class=\"text-right d-print-none\">
          <a class=\"delete-cart-rule btn btn-text\" href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_remove_cart_rule", ["orderId" => ($context["orderId"] ?? null), "orderCartRuleId" => twig_get_attribute($this->env, $this->source, $context["discount"], "orderCartRuleId", [], "any", false, false, false, 43)]), "html", null, true);
            echo "\">
            <i class=\"material-icons\">delete</i>
          </a>
        </td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['discount'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "    </tbody>
  </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/discount_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 49,  86 => 43,  79 => 40,  75 => 39,  70 => 37,  67 => 36,  63 => 35,  56 => 31,  52 => 30,  48 => 29,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/discount_list.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\discount_list.html.twig");
    }
}
