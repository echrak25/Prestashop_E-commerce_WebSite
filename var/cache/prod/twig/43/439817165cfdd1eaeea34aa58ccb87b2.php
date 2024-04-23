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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/shipping.html.twig */
class __TwigTemplate_56443b09305a44365743fa4d962716dc extends Template
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
            echo "
    ";
            // line 28
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shipping", [], "any", false, false, false, 28), "giftMessage", [], "any", false, false, false, 28)) {
                // line 29
                echo "      <div>
        <label>
          ";
                // line 31
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gift message:", [], "Admin.Global"), "html", null, true);
                echo "
        </label>
        <div id=\"gift-message\">
           ";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shipping", [], "any", false, false, false, 34), "giftMessage", [], "any", false, false, false, 34), "html", null, true);
                echo "
        </div>
      </div>
    ";
            }
            // line 38
            echo "
    <table class=\"table\" id=\"shipping-grid-table\">
    <thead>
      <tr>
        <th>";
            // line 42
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Date", [], "Admin.Global"), "html", null, true);
            echo "</th>
        <th>&nbsp;</th>
        <th>";
            // line 44
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Carrier", [], "Admin.Shipping.Feature"), "html", null, true);
            echo "</th>
        <th>";
            // line 45
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Weight", [], "Admin.Global"), "html", null, true);
            echo "</th>
        <th>";
            // line 46
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Shipping cost", [], "Admin.Shipping.Feature"), "html", null, true);
            echo "</th>
        <th>";
            // line 47
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tracking number", [], "Admin.Shipping.Feature"), "html", null, true);
            echo "</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      ";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shipping", [], "any", false, false, false, 52), "carriers", [], "any", false, false, false, 52));
            foreach ($context['_seq'] as $context["_key"] => $context["carrier"]) {
                // line 53
                echo "        <tr>
          <td class=\"date\">";
                // line 54
                echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\LocalizationExtension']->dateFormatLite(twig_get_attribute($this->env, $this->source, $context["carrier"], "date", [], "any", false, false, false, 54)), "html", null, true);
                echo "</td>
          <td>&nbsp;</td>
          <td class=\"carrier-name\">";
                // line 56
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["carrier"], "name", [], "any", false, false, false, 56), "html", null, true);
                echo "</td>
          <td class=\"carrier-weight\">";
                // line 57
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["carrier"], "weight", [], "any", false, false, false, 57), "html", null, true);
                echo "</td>
          <td class=\"carrier-price\">";
                // line 58
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["carrier"], "price", [], "any", false, false, false, 58), "html", null, true);
                echo "</td>
          <td class=\"carrier-tracking-number\">
            ";
                // line 60
                if (twig_get_attribute($this->env, $this->source, $context["carrier"], "trackingNumber", [], "any", false, false, false, 60)) {
                    // line 61
                    echo "              ";
                    if (twig_get_attribute($this->env, $this->source, $context["carrier"], "trackingUrl", [], "any", false, false, false, 61)) {
                        // line 62
                        echo "                <a href=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["carrier"], "trackingUrl", [], "any", false, false, false, 62), "html", null, true);
                        echo "\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["carrier"], "trackingNumber", [], "any", false, false, false, 62), "html", null, true);
                        echo "</a>
              ";
                    } else {
                        // line 64
                        echo "                ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["carrier"], "trackingNumber", [], "any", false, false, false, 64), "html", null, true);
                        echo "
              ";
                    }
                    // line 66
                    echo "            ";
                }
                // line 67
                echo "          </td>
          <td class=\"text-right\">
            ";
                // line 69
                if (twig_get_attribute($this->env, $this->source, $context["carrier"], "canEdit", [], "any", false, false, false, 69)) {
                    // line 70
                    echo "              <a href=\"#\"
                 class=\"js-update-shipping-btn d-print-none\"
                 data-toggle=\"modal\"
                 data-target=\"#updateOrderShippingModal\"
                 data-order-carrier-id=\"";
                    // line 74
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["carrier"], "orderCarrierId", [], "any", false, false, false, 74), "html", null, true);
                    echo "\"
                 data-order-tracking-number=\"";
                    // line 75
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["carrier"], "trackingNumber", [], "any", false, false, false, 75), "html", null, true);
                    echo "\"
              >
                ";
                    // line 77
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit", [], "Admin.Actions"), "html", null, true);
                    echo "
              </a>
            ";
                }
                // line 80
                echo "          </td>
        </tr>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carrier'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            echo "    </tbody>
  </table>

  ";
            // line 86
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shipping", [], "any", false, false, false, 86), "carrierModuleInfo", [], "any", false, false, false, 86)) {
                // line 87
                echo "    ";
                echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shipping", [], "any", false, false, false, 87), "carrierModuleInfo", [], "any", false, false, false, 87);
                echo "
  ";
            }
        } else {
            // line 90
            echo "  <p class=\"text-center mb-0\">
    ";
            // line 91
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Shipping does not apply to virtual orders", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
  </p>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/shipping.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 91,  191 => 90,  184 => 87,  182 => 86,  177 => 83,  169 => 80,  163 => 77,  158 => 75,  154 => 74,  148 => 70,  146 => 69,  142 => 67,  139 => 66,  133 => 64,  125 => 62,  122 => 61,  120 => 60,  115 => 58,  111 => 57,  107 => 56,  102 => 54,  99 => 53,  95 => 52,  87 => 47,  83 => 46,  79 => 45,  75 => 44,  70 => 42,  64 => 38,  57 => 34,  51 => 31,  47 => 29,  45 => 28,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/shipping.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\shipping.html.twig");
    }
}
