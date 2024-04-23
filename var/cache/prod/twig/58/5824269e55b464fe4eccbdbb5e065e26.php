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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/products.html.twig */
class __TwigTemplate_82d27c7a6a8dc1ed4fb5f0064b15f709 extends Template
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
        $context["isColumnLocationDisplayed"] = false;
        // line 27
        $context["isColumnRefundedDisplayed"] = false;
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "products", [], "any", false, false, false, 28), "products", [], "any", false, false, false, 28), 0, ($context["paginationNum"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 29
            echo "  ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "location", [], "any", false, false, false, 29))) {
                // line 30
                echo "    ";
                $context["isColumnLocationDisplayed"] = true;
                // line 31
                echo "  ";
            }
            // line 32
            echo "  ";
            if ((twig_get_attribute($this->env, $this->source, $context["product"], "quantityRefunded", [], "any", false, false, false, 32) > 0)) {
                // line 33
                echo "    ";
                $context["isColumnRefundedDisplayed"] = true;
                // line 34
                echo "  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
<div class=\"card\" id=\"orderProductsPanel\">
  <div class=\"card-header\">
    <h3 class=\"card-header-title\">
      ";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Products", [], "Admin.Global"), "html", null, true);
        echo " (<span id=\"orderProductsPanelCount\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "products", [], "any", false, false, false, 40), "products", [], "any", false, false, false, 40)), "html", null, true);
        echo "</span>)
    </h3>
  </div>

  <div class=\"card-body\">
    <div class=\"spinner-order-products-container\" id=\"orderProductsLoading\">
      <div class=\"spinner spinner-primary\"></div>
    </div>

    ";
        // line 49
        $context["formOptions"] = ["attr" => ["data-order-id" => twig_get_attribute($this->env, $this->source,         // line 51
($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 51), "data-is-delivered" => twig_get_attribute($this->env, $this->source,         // line 52
($context["orderForViewing"] ?? null), "isDelivered", [], "any", false, false, false, 52), "data-is-tax-included" => twig_get_attribute($this->env, $this->source,         // line 53
($context["orderForViewing"] ?? null), "isTaxIncluded", [], "any", false, false, false, 53), "data-discounts-amount" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 54
($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 54), "discountsAmountRaw", [], "any", false, false, false, 54), "data-price-specification" => json_encode(        // line 55
($context["priceSpecification"] ?? null))]];
        // line 58
        echo "    ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["cancelProductForm"] ?? null), 'form_start', ($context["formOptions"] ?? null));
        echo "

    ";
        // line 61
        echo "    <table class=\"table\" id=\"orderProductsTable\" data-currency-precision=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderCurrency"] ?? null), "precision", [], "any", false, false, false, 61), "html", null, true);
        echo "\">
      <thead>
        <tr>
          <th>
            <p>";
        // line 65
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Product", [], "Admin.Global"), "html", null, true);
        echo "</p>
          </th>
          <th></th>
          <th>
            <p class=\"mb-0\">";
        // line 69
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Price per unit", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</p>
            <small class=\"text-muted\">";
        // line 70
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "taxMethod", [], "any", false, false, false, 70), "html", null, true);
        echo "</small>
          </th>
          <th>
            <p>";
        // line 73
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Quantity", [], "Admin.Global"), "html", null, true);
        echo "</p>
          </th>
          <th class=\"cellProductLocation";
        // line 75
        if ( !($context["isColumnLocationDisplayed"] ?? null)) {
            echo " d-none";
        }
        echo "\">
            <p>";
        // line 76
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Stock location", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "</p>
          </th>
          <th class=\"cellProductRefunded";
        // line 78
        if ( !($context["isColumnRefundedDisplayed"] ?? null)) {
            echo " d-none";
        }
        echo "\">
            <p>";
        // line 79
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Refunded", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "</p>
          </th>
          <th ";
        // line 81
        if ( !($context["isAvailableQuantityDisplayed"] ?? null)) {
            echo " class=\"d-none\" ";
        }
        echo ">
            <p>";
        // line 82
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Available", [], "Admin.Global"), "html", null, true);
        echo "</p>
          </th>
          <th>
            <p class=\"mb-0\">";
        // line 85
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Total", [], "Admin.Global"), "html", null, true);
        echo "</p>
            <small class=\"text-muted\">";
        // line 86
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "taxMethod", [], "any", false, false, false, 86), "html", null, true);
        echo "</small>
          </th>
          ";
        // line 88
        if (twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "hasInvoice", [], "method", false, false, false, 88)) {
            // line 89
            echo "            <th>
              <p>";
            // line 90
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice", [], "Admin.Global"), "html", null, true);
            echo "</p>
            </th>
          ";
        }
        // line 93
        echo "          ";
        if ( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "delivered", [], "any", false, false, false, 93)) {
            // line 94
            echo "            <th class=\"text-right product_actions d-print-none\">
              <p>";
            // line 95
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actions", [], "Admin.Global"), "html", null, true);
            echo "</p>
            </th>
          ";
        }
        // line 98
        echo "          <th class=\"text-center cancel-product-element\">
            <p>";
        // line 99
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Partial refund", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "</p>
          </th>
        </tr>
      </thead>
      <tbody>
        ";
        // line 104
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/product_list.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/products.html.twig", 104)->display($context);
        // line 105
        echo "        ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/add_product_row.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/products.html.twig", 105)->display($context);
        // line 106
        echo "        ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/edit_product_row.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/products.html.twig", 106)->display($context);
        // line 107
        echo "      </tbody>
    </table>


    ";
        // line 112
        echo "    <div class=\"row mb-3\">
      <div class=\"col-xl-6 d-print-none order-product-pagination\">
        <div class=\"form-group\">
          <label for=\"paginator_select_page_limit\" class=\"col-form-label ml-3\">";
        // line 115
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Items per page:", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
          <select id=\"orderProductsTablePaginationNumberSelector\" class=\"pagination-link custom-select\">
            ";
        // line 117
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["paginationNumOptions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["numPageOption"]) {
            // line 118
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, $context["numPageOption"], "html", null, true);
            echo "\" ";
            if (($context["numPageOption"] == ($context["paginationNum"] ?? null))) {
                echo " selected ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $context["numPageOption"], "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['numPageOption'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        echo "          </select>
        </div>

        ";
        // line 123
        $context["numPages"] = twig_round(max((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "products", [], "any", false, false, false, 123), "products", [], "any", false, false, false, 123)) / ($context["paginationNum"] ?? null)), 1), 0, "ceil");
        // line 124
        echo "        <nav aria-label=\"Products Navigation\"";
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "products", [], "any", false, false, false, 124), "products", [], "any", false, false, false, 124)) <= ($context["paginationNum"] ?? null))) {
            echo " class=\"d-none\"";
        }
        echo " id=\"orderProductsNavPagination\">
          <ul class=\"pagination\" id=\"orderProductsTablePagination\" data-num-per-page=\"";
        // line 125
        echo twig_escape_filter($this->env, ($context["paginationNum"] ?? null), "html", null, true);
        echo "\" data-num-pages=\"";
        echo twig_escape_filter($this->env, ($context["numPages"] ?? null), "html", null, true);
        echo "\">
            <li class=\"page-item disabled\" id=\"orderProductsTablePaginationPrev\">
              <a class=\"page-link\" href=\"javascript:void(0);\" aria-label=\"Previous\">
                <span aria-hidden=\"true\">&laquo;</span>
                <span class=\"sr-only\">Previous</span>
              </a>
            </li>
            ";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, ($context["numPages"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["numPage"]) {
            // line 133
            echo "              <li class=\"page-item";
            if (($context["numPage"] == 1)) {
                echo " active";
            }
            echo "\">
                <span class=\"page-link\" data-order-id=\"";
            // line 134
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 134), "html", null, true);
            echo "\" data-page=\"";
            echo twig_escape_filter($this->env, $context["numPage"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["numPage"], "html", null, true);
            echo "</span>
              </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['numPage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo "            <li class=\"page-item d-none\">
              <span class=\"page-link\" data-order-id=\"";
        // line 138
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 138), "html", null, true);
        echo "\" data-page=\"\"></span>
            </li>
            <li class=\"page-item\" id=\"orderProductsTablePaginationNext\">
              <a class=\"page-link\" href=\"javascript:void(0);\" aria-label=\"Next\">
                <span aria-hidden=\"true\">&raquo;</span>
                <span class=\"sr-only\">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>

      <div class=\"col-xl-6 text-xl-right discount-action\">
        ";
        // line 151
        if ( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "delivered", [], "any", false, false, false, 151)) {
            // line 152
            echo "          <button type=\"button\" class=\"btn btn-outline-secondary js-product-action-btn mr-3\" id=\"addProductBtn\">
            <i class=\"material-icons\">add_circle_outline</i>
            ";
            // line 154
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add a product", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
          </button>
        ";
        }
        // line 157
        echo "        <button type=\"button\" class=\"btn btn-outline-secondary js-product-action-btn\" data-toggle=\"modal\" data-target=\"#addOrderDiscountModal\">
          <i class=\"material-icons\">confirmation_number</i>
          ";
        // line 159
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add a discount", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
        </button>
      </div>

    </div>

    ";
        // line 166
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/discount_list.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/products.html.twig", 166)->display(twig_array_merge($context, ["discounts" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 167
($context["orderForViewing"] ?? null), "discounts", [], "any", false, false, false, 167), "discounts", [], "any", false, false, false, 167), "orderId" => twig_get_attribute($this->env, $this->source,         // line 168
($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 168)]));
        // line 170
        echo "

    ";
        // line 173
        echo "
    <div class=\"info-block\">
      <div class=\"row\">

        <div class=\"col-sm text-center\">
          <p class=\"text-muted mb-0\">
            <strong>";
        // line 179
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Products", [], "Admin.Global"), "html", null, true);
        echo "</strong>
          </p>
          <strong id=\"orderProductsTotal\">";
        // line 181
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 181), "productsPriceFormatted", [], "any", false, false, false, 181), "html", null, true);
        echo "</strong>
        </div>

        <div id=\"order-discounts-total-container\" class=\"col-sm text-center";
        // line 184
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 184), "discountsAmountRaw", [], "any", false, false, false, 184), "greaterThan", [0 => $this->extensions['PrestaShopBundle\Twig\Extension\NumberExtension']->createNumber(0)], "method", false, false, false, 184)) {
            echo " d-none";
        }
        echo "\">
          <p class=\"text-muted mb-0\">
            <strong>";
        // line 186
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Discounts", [], "Admin.Global"), "html", null, true);
        echo "</strong>
          </p>
          <strong id=\"orderDiscountsTotal\">-";
        // line 188
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 188), "discountsAmountFormatted", [], "any", false, false, false, 188), "html", null, true);
        echo "</strong>
        </div>

        ";
        // line 191
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 191), "wrappingPriceRaw", [], "any", false, false, false, 191), "greaterThan", [0 => $this->extensions['PrestaShopBundle\Twig\Extension\NumberExtension']->createNumber(0)], "method", false, false, false, 191)) {
            // line 192
            echo "          <div class=\"col-sm text-center\">
            <p class=\"text-muted mb-0\">
              <strong>";
            // line 194
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wrapping", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "</strong>
            </p>
            <strong id=\"orderWrappingTotal\">";
            // line 196
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 196), "wrappingPriceFormatted", [], "any", false, false, false, 196), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 199
        echo "
        <div id=\"order-shipping-total-container\" class=\"col-sm text-center";
        // line 200
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 200), "shippingPriceRaw", [], "any", false, false, false, 200), "greaterThan", [0 => $this->extensions['PrestaShopBundle\Twig\Extension\NumberExtension']->createNumber(0)], "method", false, false, false, 200)) {
            echo " d-none";
        }
        echo "\">
          <p class=\"text-muted mb-0\">
            <strong>";
        // line 202
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Shipping", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</strong>
          </p>
          <div class=\"shipping-price\">
            <strong id=\"orderShippingTotal\">";
        // line 205
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 205), "shippingPriceFormatted", [], "any", false, false, false, 205), "html", null, true);
        echo "</strong>
            <div class=\"cancel-product-element shipping-refund-amount";
        // line 206
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 206), "shippingRefundableAmountRaw", [], "any", false, false, false, 206), "lowerOrEqualThan", [0 => $this->extensions['PrestaShopBundle\Twig\Extension\NumberExtension']->createNumber(0)], "method", false, false, false, 206)) {
            echo " hidden";
        }
        echo "\">
              <div class=\"input-group\">
                ";
        // line 208
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["cancelProductForm"] ?? null), "shipping_amount", [], "any", false, false, false, 208), 'widget');
        echo "
                <div class=\"input-group-append\">
                  <div class=\"input-group-text\">";
        // line 210
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderCurrency"] ?? null), "symbol", [], "any", false, false, false, 210), "html", null, true);
        echo "</div>
                </div>
              </div>
              <p class=\"text-center\">(max
                ";
        // line 214
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 214), "shippingRefundableAmountFormatted", [], "any", false, false, false, 214), "html", null, true);
        echo "
                tax included)</p>
            </div>
          </div>
        </div>

        ";
        // line 220
        if ( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "taxIncluded", [], "any", false, false, false, 220)) {
            // line 221
            echo "          <div class=\"col-sm text-center\">
            <p class=\"text-muted mb-0\">
              <strong>";
            // line 223
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Taxes", [], "Admin.Global"), "html", null, true);
            echo "</strong>
            </p>
            <strong id=\"orderTaxesTotal\">";
            // line 225
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 225), "taxesAmountFormatted", [], "any", false, false, false, 225), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 228
        echo "
        <div class=\"col-sm text-center\">
          <p class=\"text-muted mb-0\">
            <strong>";
        // line 231
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Total", [], "Admin.Global"), "html", null, true);
        echo "</strong>
          </p>
          <span class=\"badge rounded badge-dark font-size-100\" id=\"orderTotal\">";
        // line 233
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 233), "totalAmountFormatted", [], "any", false, false, false, 233), "html", null, true);
        echo "</span>
        </div>

      </div>
    </div>

    ";
        // line 240
        echo "    <p class=\"mb-0 mt-1 text-center text-muted\">
      <small>
        ";
        // line 242
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("For this customer group, prices are displayed as: [1]%tax_method%[/1]", ["%tax_method%" => twig_get_attribute($this->env, $this->source,         // line 243
($context["orderForViewing"] ?? null), "taxMethod", [], "any", false, false, false, 243), "[1]" => "<strong>", "[/1]" => "</strong>"], "Admin.Orderscustomers.Notification");
        // line 246
        echo ".

        ";
        // line 248
        if ( !$this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_ORDER_RETURN")) {
            // line 249
            echo "          <strong>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Merchandise returns are disabled", [], "Admin.Orderscustomers.Notification"), "html", null, true);
            echo "</strong>
        ";
        }
        // line 251
        echo "      </small>
    </p>

    ";
        // line 255
        echo "    <div class=\"cancel-product-element refund-checkboxes-container\">
      <div class=\"cancel-product-element form-group restock-products\">
        ";
        // line 257
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["cancelProductForm"] ?? null), "restock", [], "any", false, false, false, 257), 'widget');
        echo "
      </div>
      <div class=\"cancel-product-element form-group refund-credit-slip\">
        ";
        // line 260
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["cancelProductForm"] ?? null), "credit_slip", [], "any", false, false, false, 260), 'widget');
        echo "
      </div>
      <div class=\"cancel-product-element form-group refund-voucher\">
        ";
        // line 263
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["cancelProductForm"] ?? null), "voucher", [], "any", false, false, false, 263), 'widget');
        echo "
      </div>
      <div class=\"cancel-product-element shipping-refund";
        // line 265
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 265), "shippingRefundableAmountRaw", [], "any", false, false, false, 265), "lowerOrEqualThan", [0 => $this->extensions['PrestaShopBundle\Twig\Extension\NumberExtension']->createNumber(0)], "method", false, false, false, 265)) {
            echo " hidden";
        }
        echo "\">
        <div class=\"form-group\">
          ";
        // line 267
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["cancelProductForm"] ?? null), "shipping", [], "any", false, false, false, 267), 'widget');
        echo "
          <small class=\"shipping-refund-amount\">(";
        // line 268
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 268), "shippingRefundableAmountFormatted", [], "any", false, false, false, 268), "html", null, true);
        echo ")</small>
        </div>
      </div>
      <div class=\"cancel-product-element form-group voucher-refund-type";
        // line 271
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 271), "discountsAmountRaw", [], "any", false, false, false, 271), "lowerOrEqualThan", [0 => $this->extensions['PrestaShopBundle\Twig\Extension\NumberExtension']->createNumber(0)], "method", false, false, false, 271)) {
            echo " hidden";
        }
        echo "\">
        ";
        // line 272
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This order has been partially paid by voucher. Choose the amount you want to refund:", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
        ";
        // line 273
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["cancelProductForm"] ?? null), "voucher_refund_type", [], "any", false, false, false, 273), 'widget');
        echo "
        <div class=\"voucher-refund-type-negative-error\">
          ";
        // line 275
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Error. You cannot refund a negative amount.", [], "Admin.Orderscustomers.Notification"), "html", null, true);
        echo "
        </div>
      </div>
    </div>
    <div class=\"cancel-product-element form-submit text-right\">
      ";
        // line 280
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["cancelProductForm"] ?? null), "cancel", [], "any", false, false, false, 280), 'widget');
        echo "
      ";
        // line 281
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["cancelProductForm"] ?? null), "save", [], "any", false, false, false, 281), 'widget');
        echo "
    </div>

    ";
        // line 284
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["cancelProductForm"] ?? null), 'form_end');
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/products.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  589 => 284,  583 => 281,  579 => 280,  571 => 275,  566 => 273,  562 => 272,  556 => 271,  550 => 268,  546 => 267,  539 => 265,  534 => 263,  528 => 260,  522 => 257,  518 => 255,  513 => 251,  507 => 249,  505 => 248,  501 => 246,  499 => 243,  498 => 242,  494 => 240,  485 => 233,  480 => 231,  475 => 228,  469 => 225,  464 => 223,  460 => 221,  458 => 220,  449 => 214,  442 => 210,  437 => 208,  430 => 206,  426 => 205,  420 => 202,  413 => 200,  410 => 199,  404 => 196,  399 => 194,  395 => 192,  393 => 191,  387 => 188,  382 => 186,  375 => 184,  369 => 181,  364 => 179,  356 => 173,  352 => 170,  350 => 168,  349 => 167,  347 => 166,  338 => 159,  334 => 157,  328 => 154,  324 => 152,  322 => 151,  306 => 138,  303 => 137,  290 => 134,  283 => 133,  279 => 132,  267 => 125,  260 => 124,  258 => 123,  253 => 120,  238 => 118,  234 => 117,  229 => 115,  224 => 112,  218 => 107,  215 => 106,  212 => 105,  210 => 104,  202 => 99,  199 => 98,  193 => 95,  190 => 94,  187 => 93,  181 => 90,  178 => 89,  176 => 88,  171 => 86,  167 => 85,  161 => 82,  155 => 81,  150 => 79,  144 => 78,  139 => 76,  133 => 75,  128 => 73,  122 => 70,  118 => 69,  111 => 65,  103 => 61,  97 => 58,  95 => 55,  94 => 54,  93 => 53,  92 => 52,  91 => 51,  90 => 49,  76 => 40,  70 => 36,  63 => 34,  60 => 33,  57 => 32,  54 => 31,  51 => 30,  48 => 29,  44 => 28,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/products.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\products.html.twig");
    }
}
