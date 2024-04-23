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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/customer.html.twig */
class __TwigTemplate_82afda3ece456c658d5bff1387ab4b58 extends Template
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
<div id=\"customerCard\" class=\"customer card\">
  <div class=\"card-header\">
    <h3 class=\"card-header-title\">
      ";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Customer", [], "Admin.Global"), "html", null, true);
        echo "
    </h3>
  </div>

  <div class=\"card-body\">
    <div id=\"customerInfo\" class=\"info-block\">
      <div class=\"row\">
        ";
        // line 36
        if (( !(null === twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 36)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 36), "id", [], "any", false, false, false, 36) != 0))) {
            // line 37
            echo "          <div class=\"col-xxl-7\">
            <h2 class=\"mb-0\">
              <i class=\"material-icons\">account_box</i>

              ";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 41), "gender", [], "any", false, false, false, 41), "html", null, true);
            echo "
              ";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 42), "firstName", [], "any", false, false, false, 42), "html", null, true);
            echo "
              ";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 43), "lastName", [], "any", false, false, false, 43), "html", null, true);
            echo "

              <strong class=\"text-muted ml-2\">#";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 45), "id", [], "any", false, false, false, 45), "html", null, true);
            echo "</strong>
            </h2>

          </div>
          <div id=\"viewFullDetails\" class=\"col-xxl-5 text-xxl-right\">
            <a class=\"d-print-none\" href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_customers_view", ["customerId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 50), "id", [], "any", false, false, false, 50)]), "html", null, true);
            echo "\">
              ";
            // line 51
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("View full details", [], "Admin.Actions"), "html", null, true);
            echo "
            </a>
          </div>
        ";
        } else {
            // line 55
            echo "          <div class=\"col\">
            <h2 class=\"mb-0\">";
            // line 56
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deleted customer", [], "Admin.Global"), "html", null, true);
            echo "</h2>
          </div>
        ";
        }
        // line 59
        echo "      </div>

      ";
        // line 61
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 61), "groups", [], "any", false, false, false, 61)) {
            // line 62
            echo "        <div class=\"customer-groups mt-2\">
          ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 63), "groups", [], "any", false, false, false, 63));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 64
                echo "            <span class=\"badge\">";
                echo twig_escape_filter($this->env, $context["group"], "html", null, true);
                echo "</span>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "        </div>
      ";
        }
        // line 68
        echo "
    </div>
    ";
        // line 70
        if (( !(null === twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 70)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 70), "id", [], "any", false, false, false, 70) != 0))) {
            // line 71
            echo "      <div class=\"row mt-3\">
        <div id=\"customerEmail\" class=\"col-xxl-6\">
          <p class=\"mb-1\">
            <strong>";
            // line 74
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Email:", [], "Admin.Global"), "html", null, true);
            echo "</strong>
          </p>
          <p>
            <a href=\"mailto:";
            // line 77
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 77), "email", [], "any", false, false, false, 77), "html", null, true);
            echo "\">
              ";
            // line 78
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 78), "email", [], "any", false, false, false, 78), "html", null, true);
            echo "
            </a>
          </p>

          ";
            // line 82
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 82), "isGuest", [], "any", false, false, false, 82) === false)) {
                // line 83
                echo "            <p class=\"mb-1\">
              <strong>";
                // line 84
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Account registered:", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "</strong>
            </p>
            <p>";
                // line 86
                echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\LocalizationExtension']->dateFormatFull(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 86), "accountRegistrationDate", [], "any", false, false, false, 86)), "html", null, true);
                echo "</p>
          ";
            }
            // line 88
            echo "
          ";
            // line 89
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 89), "siret", [], "any", false, false, false, 89))) {
                // line 90
                echo "            <p class=\"mb-1\">
              <strong>";
                // line 91
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("SIRET", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "</strong>
            </p>
            <p>";
                // line 93
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 93), "siret", [], "any", false, false, false, 93), "html", null, true);
                echo "</p>
          ";
            }
            // line 95
            echo "
          ";
            // line 96
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 96), "ape", [], "any", false, false, false, 96))) {
                // line 97
                echo "            <p class=\"mb-1 d-block d-md-none\">
              <strong>";
                // line 98
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("APE", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "</strong>
            </p>
            <p class=\"d-block d-md-none\">";
                // line 100
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 100), "ape", [], "any", false, false, false, 100), "html", null, true);
                echo "</p>
          ";
            }
            // line 102
            echo "        </div>
        <div id=\"validatedOrders\" class=\"col-xxl-6\">
          <p class=\"mb-1\">
            <strong>";
            // line 105
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Validated orders placed:", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "</strong>
          </p>
          <p>
            <span class=\"badge rounded badge-dark\">";
            // line 108
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 108), "validOrdersPlaced", [], "any", false, false, false, 108), "html", null, true);
            echo "</span>
          </p>

          ";
            // line 111
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 111), "isGuest", [], "any", false, false, false, 111) === false)) {
                // line 112
                echo "            <p class=\"mb-1\">
              <strong>";
                // line 113
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Total spent since registration:", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "</strong>
            </p>
            <p>
              <span class=\"badge rounded badge-dark\">";
                // line 116
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 116), "totalSpentSinceRegistration", [], "any", false, false, false, 116), "html", null, true);
                echo "</span>
            </p>
          ";
            }
            // line 119
            echo "
          ";
            // line 120
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 120), "ape", [], "any", false, false, false, 120))) {
                // line 121
                echo "            <p class=\"mb-1 d-none d-md-block\">
              <strong>";
                // line 122
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("APE", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "</strong>
            </p>
            <p class=\"d-none d-md-block\">";
                // line 124
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 124), "ape", [], "any", false, false, false, 124), "html", null, true);
                echo "</p>
          ";
            }
            // line 126
            echo "        </div>
      </div>
    ";
        }
        // line 129
        echo "    <div class=\"info-block mt-2\">
      <div class=\"row\">
        ";
        // line 131
        if ((twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "virtual", [], "any", false, false, false, 131) === false)) {
            // line 132
            echo "          <div id=\"addressShipping\" class=\"info-block-col col-xl-6\">
            <div class=\"row justify-content-between no-gutters\">
              <strong>";
            // line 134
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Shipping address", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "</strong>
              ";
            // line 135
            if (( !(null === twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 135)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 135), "id", [], "any", false, false, false, 135) != 0))) {
                // line 136
                echo "                <a class=\"tooltip-link d-print-none\" href=\"#\" data-toggle=\"dropdown\">
                  <i class=\"material-icons\">more_vert</i>
                </a>

                <div class=\"dropdown-menu dropdown-menu-right\">
                  <a class=\"dropdown-item\" id=\"js-delivery-address-edit-btn\"
                     href=\"";
                // line 142
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_order_addresses_edit", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 142), "addressType" => "delivery", "liteDisplaying" => 1, "submitFormAjax" => 1]), "html", null, true);
                echo "\"
                  >
                    ";
                // line 144
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit existing address", [], "Admin.Actions"), "html", null, true);
                echo "
                  </a>

                  <a href=\"#\"
                     class=\"dropdown-item js-update-customer-address-modal-btn\"
                     data-toggle=\"modal\"
                     data-target=\"#updateCustomerAddressModal\"
                     data-address-type=\"shipping\"
                  >
                    ";
                // line 153
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Select another address", [], "Admin.Actions"), "html", null, true);
                echo "
                  </a>
                </div>
              ";
            }
            // line 157
            echo "            </div>

            ";
            // line 159
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shippingAddressFormatted", [], "any", false, false, false, 159), "
"));
            foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
                // line 160
                echo "              <p class=\"mb-0\">";
                echo twig_escape_filter($this->env, $context["line"], "html", null, true);
                echo "</p>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 162
            echo "          </div>
        ";
        }
        // line 164
        echo "        <div id=\"addressInvoice\" class=\"info-block-col ";
        if (twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "virtual", [], "any", false, false, false, 164)) {
            echo "col-md-12";
        } else {
            echo "col-xl-6";
        }
        echo "\">
          <div class=\"row justify-content-between no-gutters\">
            <strong>";
        // line 166
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice address", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "</strong>

            ";
        // line 168
        if (( !(null === twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 168)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 168), "id", [], "any", false, false, false, 168) != 0))) {
            // line 169
            echo "              <a class=\"tooltip-link d-print-none\" href=\"#\" data-toggle=\"dropdown\">
                <i class=\"material-icons\">more_vert</i>
              </a>

              <div class=\"dropdown-menu dropdown-menu-right\">
                <a class=\"dropdown-item\" id=\"js-invoice-address-edit-btn\"
                   href=\"";
            // line 175
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_order_addresses_edit", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 175), "addressType" => "invoice", "liteDisplaying" => 1, "submitFormAjax" => 1]), "html", null, true);
            echo "\"
                >
                  ";
            // line 177
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit existing address", [], "Admin.Actions"), "html", null, true);
            echo "
                </a>

                <a href=\"#\"
                   class=\"dropdown-item js-update-customer-address-modal-btn\"
                   data-toggle=\"modal\"
                   data-target=\"#updateCustomerAddressModal\"
                   data-address-type=\"invoice\"
                >
                  ";
            // line 186
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Select another address", [], "Admin.Actions"), "html", null, true);
            echo "
                </a>
              </div>
            ";
        }
        // line 190
        echo "          </div>

          ";
        // line 192
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "invoiceAddressFormatted", [], "any", false, false, false, 192), "
"));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 193
            echo "            <p class=\"mb-0\">";
            echo twig_escape_filter($this->env, $context["line"], "html", null, true);
            echo "</p>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 195
        echo "        </div>
      </div>
    </div>

    ";
        // line 199
        if ((( !(null === twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 199)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 199), "id", [], "any", false, false, false, 199) != 0)) &&  !(null === ($context["privateNoteForm"] ?? null)))) {
            // line 200
            echo "      <div id=\"privateNote\" class=\"mt-2 info-block\">
        <div class=\"row\">
          ";
            // line 202
            $context["isPrivateNoteOpen"] =  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 202), "privateNote", [], "any", false, false, false, 202));
            // line 203
            echo "
          <div class=\"col-md-6\">
            <h3 class=\"mb-0";
            // line 205
            echo (( !($context["isPrivateNoteOpen"] ?? null)) ? (" d-print-none") : (""));
            echo "\">
              ";
            // line 206
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Private note", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
            </h3>
          </div>
          <div class=\"col-md-6 text-right d-print-none\">
            <a href=\"#\"
               class=\"float-right tooltip-link js-private-note-toggle-btn ";
            // line 211
            if (($context["isPrivateNoteOpen"] ?? null)) {
                echo "is-opened";
            }
            echo "\"
            >
              ";
            // line 213
            if (($context["isPrivateNoteOpen"] ?? null)) {
                // line 214
                echo "                <i class=\"material-icons\">remove</i>
              ";
            } else {
                // line 216
                echo "                <i class=\"material-icons\">add</i>
              ";
            }
            // line 218
            echo "            </a>
          </div>

          <div class=\"col-md-12 mt-3 js-private-note-block ";
            // line 221
            if ( !($context["isPrivateNoteOpen"] ?? null)) {
                echo "d-none";
            }
            echo "\">
            ";
            // line 222
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["privateNoteForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_customers_set_private_note", ["customerId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 224
($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 224), "id", [], "any", false, false, false, 224), "back" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_view", ["orderId" => twig_get_attribute($this->env, $this->source,             // line 225
($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 225)])])]);
            // line 227
            echo "

              ";
            // line 229
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["privateNoteForm"] ?? null), "note", [], "any", false, false, false, 229), 'widget');
            echo "
              <div class=\"d-none\">
                ";
            // line 231
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["privateNoteForm"] ?? null), 'rest');
            echo "
              </div>

              <div class=\"mt-2 text-right\">
                <button type=\"submit\"
                        class=\"btn btn-primary btn-sm js-private-note-btn\"
                        ";
            // line 237
            if (twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 237), "privateNote", [], "any", false, false, false, 237))) {
                echo "disabled";
            }
            // line 238
            echo "                >
                  ";
            // line 239
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
            echo "
                </button>
              </div>
            ";
            // line 242
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["privateNoteForm"] ?? null), 'form_end');
            echo "
          </div>
        </div>
      </div>
    ";
        }
        // line 247
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/customer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  502 => 247,  494 => 242,  488 => 239,  485 => 238,  481 => 237,  472 => 231,  467 => 229,  463 => 227,  461 => 225,  460 => 224,  459 => 222,  453 => 221,  448 => 218,  444 => 216,  440 => 214,  438 => 213,  431 => 211,  423 => 206,  419 => 205,  415 => 203,  413 => 202,  409 => 200,  407 => 199,  401 => 195,  392 => 193,  387 => 192,  383 => 190,  376 => 186,  364 => 177,  359 => 175,  351 => 169,  349 => 168,  344 => 166,  334 => 164,  330 => 162,  321 => 160,  316 => 159,  312 => 157,  305 => 153,  293 => 144,  288 => 142,  280 => 136,  278 => 135,  274 => 134,  270 => 132,  268 => 131,  264 => 129,  259 => 126,  254 => 124,  249 => 122,  246 => 121,  244 => 120,  241 => 119,  235 => 116,  229 => 113,  226 => 112,  224 => 111,  218 => 108,  212 => 105,  207 => 102,  202 => 100,  197 => 98,  194 => 97,  192 => 96,  189 => 95,  184 => 93,  179 => 91,  176 => 90,  174 => 89,  171 => 88,  166 => 86,  161 => 84,  158 => 83,  156 => 82,  149 => 78,  145 => 77,  139 => 74,  134 => 71,  132 => 70,  128 => 68,  124 => 66,  115 => 64,  111 => 63,  108 => 62,  106 => 61,  102 => 59,  96 => 56,  93 => 55,  86 => 51,  82 => 50,  74 => 45,  69 => 43,  65 => 42,  61 => 41,  55 => 37,  53 => 36,  43 => 29,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/customer.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\customer.html.twig");
    }
}
