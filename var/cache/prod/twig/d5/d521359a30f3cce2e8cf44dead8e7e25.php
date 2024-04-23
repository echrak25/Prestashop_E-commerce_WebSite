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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/documents.html.twig */
class __TwigTemplate_615c3a97621879b9283b0ed5b4240451 extends Template
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
<table id=\"documents-grid-table\" class=\"table mb-3";
        // line 26
        if (twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "documents", [], "any", false, false, false, 26), "documents", [], "any", false, false, false, 26))) {
            echo " table-empty";
        }
        echo "\">
  <thead>
  <tr>
    <th>
      ";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Date", [], "Admin.Global"), "html", null, true);
        echo "
    </th>
    <th>
      ";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Document", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
    </th>
    <th>
      ";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Number", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
    </th>
    <th>
      ";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Amount", [], "Admin.Global"), "html", null, true);
        echo "
    </th>
    <th class=\"text-right d-print-none\">
      ";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actions", [], "Admin.Global"), "html", null, true);
        echo "
    </th>
  </tr>
  </thead>
  <tbody>
  ";
        // line 47
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "documents", [], "any", false, false, false, 47), "documents", [], "any", false, false, false, 47))) {
            // line 48
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "documents", [], "any", false, false, false, 48), "documents", [], "any", false, false, false, 48));
            foreach ($context['_seq'] as $context["_key"] => $context["document"]) {
                // line 49
                echo "      <tr>
        <td class=\"documents-table-column-date\">
          ";
                // line 51
                echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\LocalizationExtension']->dateFormatLite(twig_get_attribute($this->env, $this->source, $context["document"], "createdAt", [], "any", false, false, false, 51)), "html", null, true);
                echo "
        </td>
        <td class=\"documents-table-column-type\">
          ";
                // line 54
                if ((twig_get_attribute($this->env, $this->source, $context["document"], "type", [], "any", false, false, false, 54) == "invoice")) {
                    // line 55
                    echo "            ";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice", [], "Admin.Global"), "html", null, true);
                    echo "
          ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 56
$context["document"], "type", [], "any", false, false, false, 56) == "credit_slip")) {
                    // line 57
                    echo "            ";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Credit slip", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                    echo "
          ";
                } else {
                    // line 59
                    echo "            ";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delivery slip", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                    echo "
          ";
                }
                // line 61
                echo "        </td>
        <td class=\"documents-table-column-download-link\">
          ";
                // line 63
                if ((twig_get_attribute($this->env, $this->source, $context["document"], "type", [], "any", false, false, false, 63) == "invoice")) {
                    // line 64
                    echo "            <a target=\"_blank\" rel=\"noopener noreferrer nofollow\"
               href=\"";
                    // line 65
                    echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminPdf", true, ["submitAction" => "generateInvoicePDF", "id_order_invoice" => twig_get_attribute($this->env, $this->source, $context["document"], "id", [], "any", false, false, false, 65)]), "html", null, true);
                    echo "\"
            >
              ";
                    // line 67
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["document"], "referenceNumber", [], "any", false, false, false, 67), "html", null, true);
                    echo "
            </a>
          ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 69
$context["document"], "type", [], "any", false, false, false, 69) == "delivery_slip")) {
                    // line 70
                    echo "            <a target=\"_blank\" rel=\"noopener noreferrer nofollow\"
               href=\"";
                    // line 71
                    echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminPdf", true, ["submitAction" => "generateDeliverySlipPDF", "id_order_invoice" => twig_get_attribute($this->env, $this->source, $context["document"], "id", [], "any", false, false, false, 71)]), "html", null, true);
                    echo "\"
            >
              ";
                    // line 73
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["document"], "referenceNumber", [], "any", false, false, false, 73), "html", null, true);
                    echo "
            </a>
          ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 75
$context["document"], "type", [], "any", false, false, false, 75) == "credit_slip")) {
                    // line 76
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminPdf", true, ["submitAction" => "generateOrderSlipPDF", "id_order_slip" => twig_get_attribute($this->env, $this->source, $context["document"], "id", [], "any", false, false, false, 76)]), "html", null, true);
                    echo "\">
              ";
                    // line 77
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["document"], "referenceNumber", [], "any", false, false, false, 77), "html", null, true);
                    echo "
            </a>
          ";
                }
                // line 80
                echo "        </td>
        <td class=\"documents-table-column-amount\">
          ";
                // line 82
                if (twig_get_attribute($this->env, $this->source, $context["document"], "amount", [], "any", false, false, false, 82)) {
                    // line 83
                    echo "            <p class=\"mb-0\">
              ";
                    // line 84
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["document"], "amount", [], "any", false, false, false, 84), "html", null, true);
                    echo "

              ";
                    // line 86
                    if (twig_get_attribute($this->env, $this->source, $context["document"], "amountMismatch", [], "any", false, false, false, 86)) {
                        // line 87
                        echo "                (";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["document"], "amountMismatch", [], "any", false, false, false, 87), "html", null, true);
                        echo ")
              ";
                    }
                    // line 89
                    echo "            </p>
          ";
                } else {
                    // line 91
                    echo "            --
          ";
                }
                // line 93
                echo "        </td>
        <td class=\"text-right documents-table-column-actions\">
          ";
                // line 95
                if ((twig_get_attribute($this->env, $this->source, $context["document"], "type", [], "any", false, false, false, 95) == "invoice")) {
                    // line 96
                    echo "            ";
                    if ((twig_get_attribute($this->env, $this->source, $context["document"], "isAddPaymentAllowed", [], "any", false, false, false, 96) && twig_get_attribute($this->env, $this->source, $context["document"], "amount", [], "any", false, false, false, 96))) {
                        // line 97
                        echo "              <button href=\"#\" class=\"js-enter-payment-btn btn btn-primary btn-sm\" data-payment-amount=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["document"], "numericalAmount", [], "any", false, false, false, 97), "html", null, true);
                        echo "\">
                ";
                        // line 98
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enter payment", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                        echo "
              </button>
            ";
                    }
                    // line 101
                    echo "            ";
                    if (twig_test_empty(twig_get_attribute($this->env, $this->source, $context["document"], "note", [], "any", false, false, false, 101))) {
                        // line 102
                        echo "              <button href=\"#\" class=\"js-open-invoice-note-btn btn btn-primary btn-sm\">
                ";
                        // line 103
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add note", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                        echo "
              </button>
            ";
                    } else {
                        // line 106
                        echo "              <button href=\"#\" class=\"js-open-invoice-note-btn btn btn-primary btn-sm btn-edit\">
                ";
                        // line 107
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit note", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                        echo "
              </button>
            ";
                    }
                    // line 110
                    echo "          ";
                }
                // line 111
                echo "        </td>
      </tr>
      ";
                // line 113
                if ((twig_get_attribute($this->env, $this->source, $context["document"], "type", [], "any", false, false, false, 113) == "invoice")) {
                    // line 114
                    echo "        <tr class=\"d-none\">
          <td colspan=\"5\">
            <form action=\"";
                    // line 116
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_update_invoice_note", ["orderId" => twig_get_attribute($this->env, $this->source,                     // line 117
($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 117), "orderInvoiceId" => twig_get_attribute($this->env, $this->source,                     // line 118
$context["document"], "id", [], "any", false, false, false, 118)]), "html", null, true);
                    // line 119
                    echo "\" method=\"post\">
              <div class=\"input-group\">
                <input type=\"text\" class=\"form-control invoice-note\" name=\"invoice_note\" value=\"";
                    // line 121
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["document"], "note", [], "any", false, false, false, 121), "html", null, true);
                    echo "\">
                <button class=\"btn btn-secondary ml-2 btn-sm js-cancel-invoice-note-btn\" type=\"button\">
                  ";
                    // line 123
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "html", null, true);
                    echo "
                </button>
                <button class=\"btn btn-primary ml-2 btn-sm js-save-invoice-note-btn\" type=\"submit\">
                  ";
                    // line 126
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
                    echo "
                </button>
              </div>
            </form>
          </td>
        </tr>
      ";
                }
                // line 133
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['document'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 134
            echo "  ";
        } else {
            // line 135
            echo "    <tr>
      <td colspan=\"5\" class=\"text-center alert-available\">
        ";
            // line 137
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("There is no available document", [], "Admin.Orderscustomers.Notification"), "html", null, true);
            echo "
      </td>
    </tr>
  ";
        }
        // line 141
        echo "  </tbody>
</table>

";
        // line 144
        if ((twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "documents", [], "any", false, false, false, 144), "documents", [], "any", false, false, false, 144)) && twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "invoiceManagementIsEnabled", [], "any", false, false, false, 144))) {
            // line 145
            echo "  <form action=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_generate_invoice", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 145)]), "html", null, true);
            echo "\" method=\"POST\">
    <button class=\"btn btn-primary\">
      <i class=\"material-icons\">autorenew</i>
      ";
            // line 148
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Generate invoice", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
    </button>
  </form>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/documents.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  313 => 148,  306 => 145,  304 => 144,  299 => 141,  292 => 137,  288 => 135,  285 => 134,  279 => 133,  269 => 126,  263 => 123,  258 => 121,  254 => 119,  252 => 118,  251 => 117,  250 => 116,  246 => 114,  244 => 113,  240 => 111,  237 => 110,  231 => 107,  228 => 106,  222 => 103,  219 => 102,  216 => 101,  210 => 98,  205 => 97,  202 => 96,  200 => 95,  196 => 93,  192 => 91,  188 => 89,  182 => 87,  180 => 86,  175 => 84,  172 => 83,  170 => 82,  166 => 80,  160 => 77,  155 => 76,  153 => 75,  148 => 73,  143 => 71,  140 => 70,  138 => 69,  133 => 67,  128 => 65,  125 => 64,  123 => 63,  119 => 61,  113 => 59,  107 => 57,  105 => 56,  100 => 55,  98 => 54,  92 => 51,  88 => 49,  83 => 48,  81 => 47,  73 => 42,  67 => 39,  61 => 36,  55 => 33,  49 => 30,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/documents.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\documents.html.twig");
    }
}
