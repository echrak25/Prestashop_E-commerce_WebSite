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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/payments.html.twig */
class __TwigTemplate_f3f4743fa8302654e9225af6f7c2cb7e extends Template
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
<div class=\"card mt-2\" id=\"view_order_payments_block\">
  <div class=\"card-header\">
    <h3 class=\"card-header-title\">
      ";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Payment", [], "Admin.Global"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "payments", [], "any", false, false, false, 29), "payments", [], "any", false, false, false, 29)), "html", null, true);
        echo ")
    </h3>
  </div>

  <div class=\"card-body\">
    ";
        // line 34
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/payments_alert.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/payments.html.twig", 34)->display(twig_array_merge($context, ["payments" => twig_get_attribute($this->env, $this->source,         // line 35
($context["orderForViewing"] ?? null), "payments", [], "any", false, false, false, 35), "linkedOrders" => twig_get_attribute($this->env, $this->source,         // line 36
($context["orderForViewing"] ?? null), "linkedOrders", [], "any", false, false, false, 36)]));
        // line 38
        echo "
    <table class=\"table\" data-role=\"payments-grid-table\">
      <thead>
        <tr>
          <th class=\"table-head-date\">";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Date", [], "Admin.Global"), "html", null, true);
        echo "</th>
          <th class=\"table-head-payment\">";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Payment method", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "</th>
          <th class=\"table-head-transaction\">";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transaction ID", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "</th>
          <th class=\"table-head-amount\">";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Amount", [], "Admin.Global"), "html", null, true);
        echo "</th>
          <th class=\"table-head-invoice\">";
        // line 46
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice", [], "Admin.Global"), "html", null, true);
        echo "</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "payments", [], "any", false, false, false, 51), "payments", [], "any", false, false, false, 51));
        foreach ($context['_seq'] as $context["_key"] => $context["payment"]) {
            // line 52
            echo "        <tr>
          <td data-role=\"date-column\">";
            // line 53
            echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\LocalizationExtension']->dateFormatFull(twig_get_attribute($this->env, $this->source, $context["payment"], "date", [], "any", false, false, false, 53)), "html", null, true);
            echo "</td>
          <td data-role=\"payment-method-column\">";
            // line 54
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["payment"], "paymentMethod", [], "any", false, false, false, 54), "html", null, true);
            echo "</td>
          <td data-role=\"transaction-id-column\">";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["payment"], "transactionId", [], "any", false, false, false, 55), "html", null, true);
            echo "</td>
          <td data-role=\"amount-column\">";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["payment"], "amount", [], "any", false, false, false, 56), "html", null, true);
            echo "</td>
          <td data-role=\"invoice-column\">";
            // line 57
            if (twig_get_attribute($this->env, $this->source, $context["payment"], "invoiceNumber", [], "any", false, false, false, 57)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["payment"], "invoiceNumber", [], "any", false, false, false, 57), "html", null, true);
            }
            echo "</td>
          <td class=\"text-right\">
            <button class=\"btn btn-sm btn-outline-secondary js-payment-details-btn\">
              ";
            // line 60
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Details", [], "Admin.Global"), "html", null, true);
            echo "
            </button>
          </td>
        </tr>
        <tr class=\"d-none\" data-role=\"payment-details\">
          <td colspan=\"6\">
            <p class=\"mb-0\">
              <strong>";
            // line 67
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Card number", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "</strong>
              ";
            // line 68
            if (twig_get_attribute($this->env, $this->source, $context["payment"], "cardNumber", [], "any", false, false, false, 68)) {
                // line 69
                echo "                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["payment"], "cardNumber", [], "any", false, false, false, 69), "html", null, true);
                echo "
              ";
            } else {
                // line 71
                echo "                ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Not defined", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "
              ";
            }
            // line 73
            echo "            </p>
            <p class=\"mb-0\">
              <strong>";
            // line 75
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Card type", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "</strong>&nbsp;
              ";
            // line 76
            if (twig_get_attribute($this->env, $this->source, $context["payment"], "cardBrand", [], "any", false, false, false, 76)) {
                // line 77
                echo "                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["payment"], "cardBrand", [], "any", false, false, false, 77), "html", null, true);
                echo "
              ";
            } else {
                // line 79
                echo "                ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Not defined", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "
              ";
            }
            // line 81
            echo "            </p>
            <p class=\"mb-0\">
              <strong>";
            // line 83
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Expiration date", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</strong>&nbsp;
              ";
            // line 84
            if (twig_get_attribute($this->env, $this->source, $context["payment"], "cardExpiration", [], "any", false, false, false, 84)) {
                // line 85
                echo "                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["payment"], "cardExpiration", [], "any", false, false, false, 85), "html", null, true);
                echo "
              ";
            } else {
                // line 87
                echo "                ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Not defined", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "
              ";
            }
            // line 89
            echo "            </p>
            <p class=\"mb-0\">
              <strong>";
            // line 91
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cardholder name", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "</strong>&nbsp;
              ";
            // line 92
            if (twig_get_attribute($this->env, $this->source, $context["payment"], "cardHolder", [], "any", false, false, false, 92)) {
                // line 93
                echo "                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["payment"], "cardHolder", [], "any", false, false, false, 93), "html", null, true);
                echo "
              ";
            } else {
                // line 95
                echo "                ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Not defined", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "
              ";
            }
            // line 97
            echo "            </p>
          </td>
        </tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "      <tr class=\"d-print-none\">
        ";
        // line 102
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["addOrderPaymentForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_add_payment", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 102)])]);
        echo "
          <td>
            ";
        // line 104
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addOrderPaymentForm"] ?? null), "date", [], "any", false, false, false, 104), 'widget');
        echo "
          </td>
          <td>
            ";
        // line 107
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addOrderPaymentForm"] ?? null), "payment_method", [], "any", false, false, false, 107), 'widget');
        echo "
          </td>
          <td>
            ";
        // line 110
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addOrderPaymentForm"] ?? null), "transaction_id", [], "any", false, false, false, 110), 'widget');
        echo "
          </td>
          <td>
            ";
        // line 113
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addOrderPaymentForm"] ?? null), "amount_currency", [], "any", false, false, false, 113), 'widget');
        echo "
          </td>
          <td>
            <div ";
        // line 116
        if (twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["addOrderPaymentForm"] ?? null), "id_invoice", [], "any", false, false, false, 116), "vars", [], "any", false, false, false, 116), "choices", [], "any", false, false, false, 116))) {
            echo "class=\"d-none\"";
        }
        echo ">
              ";
        // line 117
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addOrderPaymentForm"] ?? null), "id_invoice", [], "any", false, false, false, 117), 'widget');
        echo "
            </div>
          </td>
          <td>
            <button type=\"submit\" class=\"btn btn-primary btn-sm\">";
        // line 121
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add", [], "Admin.Actions"), "html", null, true);
        echo "</button>
          </td>
        ";
        // line 123
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["addOrderPaymentForm"] ?? null), 'form_end');
        echo "
      </tr>
      </tbody>
    </table>

    ";
        // line 128
        if (( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "valid", [], "any", false, false, false, 128) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["changeOrderCurrencyForm"] ?? null), "new_currency_id", [], "any", false, false, false, 128), "vars", [], "any", false, false, false, 128), "choices", [], "any", false, false, false, 128)))) {
            // line 129
            echo "      ";
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["changeOrderCurrencyForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_change_currency", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 129)])]);
            echo "
        <div class=\"form-group row d-print-none\">
          <label class=\"form-control-label\">";
            // line 131
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Change currency", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "</label>
          <div class=\"col-sm\">
            <div class=\"input-group\">
              ";
            // line 134
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["changeOrderCurrencyForm"] ?? null), "new_currency_id", [], "any", false, false, false, 134), 'widget');
            echo "
              <button class=\"btn btn-outline-secondary btn-sm ml-2\">
                ";
            // line 136
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Change", [], "Admin.Actions"), "html", null, true);
            echo "
              </button>
            </div>

            <div class=\"d-none\">
              ";
            // line 141
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["changeOrderCurrencyForm"] ?? null), 'rest');
            echo "
            </div>

            <small class=\"text-muted\">
              ";
            // line 145
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Do not forget to update your exchange rate before making this change.", [], "Admin.Orderscustomers.Help"), "html", null, true);
            echo "
            </small>
          </div>
        </div>
      ";
            // line 149
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["changeOrderCurrencyForm"] ?? null), 'form_end');
            echo "
    ";
        }
        // line 151
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/payments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  325 => 151,  320 => 149,  313 => 145,  306 => 141,  298 => 136,  293 => 134,  287 => 131,  281 => 129,  279 => 128,  271 => 123,  266 => 121,  259 => 117,  253 => 116,  247 => 113,  241 => 110,  235 => 107,  229 => 104,  224 => 102,  221 => 101,  212 => 97,  206 => 95,  200 => 93,  198 => 92,  194 => 91,  190 => 89,  184 => 87,  178 => 85,  176 => 84,  172 => 83,  168 => 81,  162 => 79,  156 => 77,  154 => 76,  150 => 75,  146 => 73,  140 => 71,  134 => 69,  132 => 68,  128 => 67,  118 => 60,  110 => 57,  106 => 56,  102 => 55,  98 => 54,  94 => 53,  91 => 52,  87 => 51,  79 => 46,  75 => 45,  71 => 44,  67 => 43,  63 => 42,  57 => 38,  55 => 36,  54 => 35,  53 => 34,  43 => 29,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/payments.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\payments.html.twig");
    }
}
