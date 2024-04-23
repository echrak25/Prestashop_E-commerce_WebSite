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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/merchandise_returns.html.twig */
class __TwigTemplate_9fa85b1f9b129bd88c6a0ff2031cd33a extends Template
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
        if ( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "virtual", [], "any", false, false, false, 26)) {
            // line 27
            echo "  ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "returns", [], "any", false, false, false, 27), "orderReturns", [], "any", false, false, false, 27))) {
                // line 28
                echo "    <table class=\"table\" data-role=\"merchandise-returns-grid-table\">
      <thead>
      <tr>
        <th>";
                // line 31
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Date", [], "Admin.Global"), "html", null, true);
                echo "</th>
        <th>";
                // line 32
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Type", [], "Admin.Global"), "html", null, true);
                echo "</th>
        <th>";
                // line 33
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "Admin.Global"), "html", null, true);
                echo "</th>
        <th>";
                // line 34
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Number", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "</th>
      </tr>
      </thead>
      <tbody>
      ";
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "returns", [], "any", false, false, false, 38), "orderReturns", [], "any", false, false, false, 38));
                foreach ($context['_seq'] as $context["_key"] => $context["return"]) {
                    // line 39
                    echo "        <tr>
          <td data-role=\"merchandise-return-date\">";
                    // line 40
                    echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\LocalizationExtension']->dateFormatFull(twig_get_attribute($this->env, $this->source, $context["return"], "date", [], "any", false, false, false, 40)), "html", null, true);
                    echo "</td>
          <td data-role=\"merchandise-return-type\">";
                    // line 41
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["return"], "type", [], "any", false, false, false, 41), "html", null, true);
                    echo "</td>
          <td data-role=\"merchandise-return-state\">";
                    // line 42
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["return"], "stateName", [], "any", false, false, false, 42), "html", null, true);
                    echo "</td>
          <td data-role=\"merchandise-return-id\">
            <a class=\"d-print-none\" href=\"";
                    // line 44
                    echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminReturn", true, ["id_order_return" => twig_get_attribute($this->env, $this->source, $context["return"], "idOrderReturn", [], "any", false, false, false, 44), "updateorder_return" => "", "back" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 44), "uri", [], "any", false, false, false, 44)]), "html", null, true);
                    echo "\">
                ";
                    // line 45
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["return"], "orderReturnNumber", [], "any", false, false, false, 45), "html", null, true);
                    echo "
            </a>
          </td>
        </tr>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['return'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 50
                echo "      </tbody>
    </table>
  ";
            } else {
                // line 53
                echo "    <p class=\"text-center mb-0\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("No merchandise returned yet", [], "Admin.Orderscustomers.Notification"), "html", null, true);
                echo "</p>
  ";
            }
            // line 55
            echo "
  ";
            // line 56
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shipping", [], "any", false, false, false, 56), "carrierModuleInfo", [], "any", false, false, false, 56)) {
                // line 57
                echo "    ";
                echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shipping", [], "any", false, false, false, 57), "carrierModuleInfo", [], "any", false, false, false, 57);
                echo "
  ";
            }
        } else {
            // line 60
            echo "  <p class=\"text-center mb-0\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Merchandise returns are not applicable for virtual orders", [], "Admin.Orderscustomers.Notification"), "html", null, true);
            echo "</p>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/merchandise_returns.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 60,  120 => 57,  118 => 56,  115 => 55,  109 => 53,  104 => 50,  93 => 45,  89 => 44,  84 => 42,  80 => 41,  76 => 40,  73 => 39,  69 => 38,  62 => 34,  58 => 33,  54 => 32,  50 => 31,  45 => 28,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/merchandise_returns.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\merchandise_returns.html.twig");
    }
}
