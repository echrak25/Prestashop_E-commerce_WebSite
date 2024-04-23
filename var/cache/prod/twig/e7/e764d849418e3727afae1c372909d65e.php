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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/payments_alert.html.twig */
class __TwigTemplate_99385b01e50e15c711f0c2504362a6e0 extends Template
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
        if ((twig_get_attribute($this->env, $this->source, ($context["payments"] ?? null), "amountToPay", [], "any", false, false, false, 25) && twig_get_attribute($this->env, $this->source, ($context["payments"] ?? null), "paidAmount", [], "any", false, false, false, 25))) {
            // line 26
            echo "    <div class=\"alert alert-danger mb-0 js-view-order-payments-alert\" role=\"alert\">
        <p class=\"alert-text\">
            ";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Warning", [], "Admin.Global"), "html", null, true);
            echo "
            <strong>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["payments"] ?? null), "paidAmount", [], "any", false, false, false, 29), "html", null, true);
            echo "</strong>
            ";
            // line 30
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("paid instead of", [], "Admin.Orderscustomers.Notification"), "html", null, true);
            echo "
            <strong>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["payments"] ?? null), "amountToPay", [], "any", false, false, false, 31), "html", null, true);
            echo "</strong>

            ";
            // line 33
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["linkedOrders"] ?? null), "linkedOrders", [], "any", false, false, false, 33))) {
                // line 34
                echo "                ";
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["linkedOrders"] ?? null), "linkedOrders", [], "any", false, false, false, 34)) == 1)) {
                    // line 35
                    echo "                    <br/>";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This warning also concerns order:", [], "Admin.Orderscustomers.Notification"), "html", null, true);
                    echo "
                ";
                } else {
                    // line 37
                    echo "                    <br/>";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This warning also concerns the following orders:", [], "Admin.Orderscustomers.Notification"), "html", null, true);
                    echo "
                ";
                }
                // line 39
                echo "
                ";
                // line 40
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["linkedOrders"] ?? null), "linkedOrders", [], "any", false, false, false, 40));
                foreach ($context['_seq'] as $context["_key"] => $context["linkedOrder"]) {
                    // line 41
                    echo "                    <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_view", ["orderId" => twig_get_attribute($this->env, $this->source, $context["linkedOrder"], "orderId", [], "any", false, false, false, 41)]), "html", null, true);
                    echo "\">
                        #";
                    // line 42
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["linkedOrder"], "orderId", [], "any", false, false, false, 42), "html", null, true);
                    echo "
                    </a>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['linkedOrder'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 45
                echo "            ";
            }
            // line 46
            echo "        </p>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/payments_alert.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 46,  98 => 45,  89 => 42,  84 => 41,  80 => 40,  77 => 39,  71 => 37,  65 => 35,  62 => 34,  60 => 33,  55 => 31,  51 => 30,  47 => 29,  43 => 28,  39 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/payments_alert.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\payments_alert.html.twig");
    }
}
