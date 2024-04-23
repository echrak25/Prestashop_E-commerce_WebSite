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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/order_actions.html.twig */
class __TwigTemplate_c0ffb52c975f3984fdd66d58eb7c1e17 extends Template
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
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["updateOrderStatusActionBarForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_update_status", ["orderId" => twig_get_attribute($this->env, $this->source,         // line 27
($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 27)]), "attr" => ["id" => "update_order_status_action_form"]]);
        // line 31
        echo "

  <div class=\"input-group\">
    ";
        // line 34
        $context["backgroundColor"] = "#ffffff";
        // line 35
        echo "    ";
        $context["isBright"] = true;
        // line 36
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["updateOrderStatusActionBarForm"] ?? null), "new_order_status_id", [], "any", false, false, false, 36), "vars", [], "any", false, false, false, 36), "choices", [], "any", false, false, false, 36));
        foreach ($context['_seq'] as $context["_key"] => $context["choice"]) {
            // line 37
            echo "      ";
            if ((twig_get_attribute($this->env, $this->source, $context["choice"], "value", [], "any", false, false, false, 37) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["updateOrderStatusActionBarForm"] ?? null), "new_order_status_id", [], "any", false, false, false, 37), "vars", [], "any", false, false, false, 37), "data", [], "any", false, false, false, 37))) {
                // line 38
                echo "        ";
                $context["backgroundColor"] = (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, $context["choice"], "attr", [], "any", false, false, false, 38)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["data-background-color"] ?? null) : null);
                // line 39
                echo "        ";
                $context["isBright"] = (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, $context["choice"], "attr", [], "any", false, false, false, 39)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["data-is-bright"] ?? null) : null);
                // line 40
                echo "      ";
            }
            // line 41
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['choice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "    <div class=\"select-status";
        if (($context["isBright"] ?? null)) {
            echo " is-bright";
        }
        echo "\" id=\"update_order_status_action_input_wrapper\" style=\"background-color:";
        echo twig_escape_filter($this->env, ($context["backgroundColor"] ?? null), "html", null, true);
        echo ";\">
        ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["updateOrderStatusActionBarForm"] ?? null), "new_order_status_id", [], "any", false, false, false, 43), 'widget', ["attr" => ["class" => "select-status-colored"], "id" => "update_order_status_action_input"]);
        // line 48
        echo "
    </div>

    <button class=\"btn btn-action ml-2\"
            id=\"update_order_status_action_btn\"
            disabled
            data-order-status-id=\"";
        // line 54
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "history", [], "any", false, false, false, 54), "currentOrderStatusId", [], "any", false, false, false, 54), "html", null, true);
        echo "\"
    >
      ";
        // line 56
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Update status", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
    </button>
  </div>

  <div class=\"d-none\">
    ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["updateOrderStatusActionBarForm"] ?? null), 'rest');
        echo "
  </div>
  ";
        // line 63
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["updateOrderStatusActionBarForm"] ?? null), 'form_end');
        echo "

  ";
        // line 65
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "documents", [], "any", false, false, false, 65), "canGenerateInvoice", [], "any", false, false, false, 65)) {
            // line 66
            echo "    <form class=\"order-actions-invoice\">
      <div class=\"input-group\">
        <a href=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_generate_invoice_pdf", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 68)]), "html", null, true);
            echo "\"
           class=\"btn btn-action\" data-role=\"view-invoice\">
          <i class=\"material-icons\">receipt</i>
          ";
            // line 71
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("View invoice", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
        </a>
      </div>
    </form>
  ";
        }
        // line 76
        echo "
  <form class=\"order-actions-print\">
    <div class=\"input-group\">
      <button type=\"button\" class=\"btn btn-action js-print-order-view-page\">
        <i class=\"material-icons\" aria-hidden=\"true\">print</i>
        ";
        // line 81
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Print order", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
      </button>
    </div>
  </form>

  ";
        // line 86
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "documents", [], "any", false, false, false, 86), "canGenerateDeliverySlip", [], "any", false, false, false, 86)) {
            // line 87
            echo "    <form class=\"order-actions-delivery\">
      <div class=\"input-group\">
        <a href=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_generate_delivery_slip_pdf", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 89)]), "html", null, true);
            echo "\"
           class=\"btn btn-action\" data-role=\"view-delivery-slip\">
          <i class=\"material-icons\">local_shipping</i>
          ";
            // line 92
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("View delivery slip", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
        </a>
      </div>
    </form>
  ";
        }
        // line 97
        echo "
  ";
        // line 98
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/extra_order_button_actions.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/order_actions.html.twig", 98)->display($context);
        // line 99
        echo "
  ";
        // line 100
        if (($context["merchandiseReturnEnabled"] ?? null)) {
            // line 101
            echo "    ";
            if (twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "isDelivered", [], "method", false, false, false, 101)) {
                // line 102
                echo "      <button class=\"btn btn-action return-product-display\" type=\"button\"";
                if ( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "isRefundable", [], "method", false, false, false, 102)) {
                    echo " disabled";
                }
                echo ">
        <i class=\"material-icons\">swap_horiz</i>
        ";
                // line 104
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Return products", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "
      </button>
    ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 106
($context["orderForViewing"] ?? null), "hasBeenPaid", [], "method", false, false, false, 106) || twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "hasPayments", [], "method", false, false, false, 106))) {
                // line 107
                echo "      <button class=\"btn btn-action standard-refund-display\" type=\"button\"";
                if ( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "isRefundable", [], "method", false, false, false, 107)) {
                    echo " disabled";
                }
                echo ">
        <i class=\"material-icons\">swap_horiz</i>
        ";
                // line 109
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Standard refund", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "
      </button>
    ";
            } else {
                // line 112
                echo "      <button class=\"btn btn-action cancel-product-display\" type=\"button\">
        ";
                // line 113
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel products", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "
      </button>
    ";
            }
            // line 116
            echo "  ";
        }
        // line 117
        echo "
  ";
        // line 118
        if ((twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "hasBeenPaid", [], "method", false, false, false, 118) || twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "hasPayments", [], "method", false, false, false, 118))) {
            // line 119
            echo "      <button class=\"btn btn-action partial-refund-display\" type=\"button\"";
            if ( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "isRefundable", [], "method", false, false, false, 119)) {
                echo " disabled";
            }
            echo ">
        <i class=\"material-icons\">swap_horiz</i>
        ";
            // line 121
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Partial refund", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
      </button>
  ";
        }
        // line 124
        echo "
  ";
        // line 125
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/order_navigation.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/order_actions.html.twig", 125)->display($context);
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/order_actions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  249 => 125,  246 => 124,  240 => 121,  232 => 119,  230 => 118,  227 => 117,  224 => 116,  218 => 113,  215 => 112,  209 => 109,  201 => 107,  199 => 106,  194 => 104,  186 => 102,  183 => 101,  181 => 100,  178 => 99,  176 => 98,  173 => 97,  165 => 92,  159 => 89,  155 => 87,  153 => 86,  145 => 81,  138 => 76,  130 => 71,  124 => 68,  120 => 66,  118 => 65,  113 => 63,  108 => 61,  100 => 56,  95 => 54,  87 => 48,  85 => 43,  76 => 42,  70 => 41,  67 => 40,  64 => 39,  61 => 38,  58 => 37,  53 => 36,  50 => 35,  48 => 34,  43 => 31,  41 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/order_actions.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\order_actions.html.twig");
    }
}
