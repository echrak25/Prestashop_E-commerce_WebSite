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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/product.html.twig */
class __TwigTemplate_7eb4d94bedfd7490f492ea1c508e852b extends Template
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
        $context["rowIsDisplayed"] = ((array_key_exists("productIndex", $context) && array_key_exists("paginationNum", $context)) && (($context["productIndex"] ?? null) > ($context["paginationNum"] ?? null)));
        // line 27
        echo "<tr id=\"orderProduct_";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "orderDetailId", [], "any", false, false, false, 27), "html", null, true);
        echo "\" class=\"cellProduct";
        if (($context["rowIsDisplayed"] ?? null)) {
            echo " d-none d-print-table-row";
        }
        echo "\">
  <td class=\"cellProductImg\">
    ";
        // line 29
        if (twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "imagePath", [], "any", false, false, false, 29)) {
            // line 30
            echo "      <img src=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "imagePath", [], "any", false, false, false, 30), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", [], "any", false, false, false, 30), "html", null, true);
            echo "\" />
    ";
        }
        // line 32
        echo "  </td>
  <td class=\"cellProductName\">
    <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_form", ["id" => twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id", [], "any", false, false, false, 34)]), "html", null, true);
        echo "\">
      <p class=\"mb-0 productName\">";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", [], "any", false, false, false, 35), "html", null, true);
        echo "</p>
      ";
        // line 36
        if (twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "reference", [], "any", false, false, false, 36)) {
            // line 37
            echo "        <p class=\"mb-0 productReference\">
          ";
            // line 38
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reference number:", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
          ";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "reference", [], "any", false, false, false, 39), "html", null, true);
            echo "
        </p>
      ";
        }
        // line 42
        echo "      ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "supplierReference", [], "any", false, false, false, 42))) {
            // line 43
            echo "        <p class=\"mb-0 productSupplierReference\">
          ";
            // line 44
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Supplier reference:", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
          ";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "supplierReference", [], "any", false, false, false, 45), "html", null, true);
            echo "
        </p>
      ";
        }
        // line 48
        echo "    </a>
    ";
        // line 49
        if (((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "type", [], "any", false, false, false, 49) == twig_constant("PrestaShop\\PrestaShop\\Core\\Domain\\Order\\QueryResult\\OrderProductForViewing::TYPE_PACK")) && (null === twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "customizations", [], "any", false, false, false, 49)))) {
            // line 50
            echo "      <span class=\"btn-product-pack-modal d-print-none\" data-toggle=\"modal\" data-target=\"#product-pack-modal\" data-pack-items=\"";
            echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "packItems", [], "any", false, false, false, 50)), "html", null, true);
            echo "\">
        <strong>";
            // line 51
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("View pack content", [], "Admin.Actions"), "html", null, true);
            echo "</strong>
      </span>
    ";
        }
        // line 54
        echo "  </td>
  <td class=\"cellProductUnitPrice\">";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "unitPrice", [], "any", false, false, false, 55), "html", null, true);
        echo "</td>
  <td class=\"cellProductQuantity text-center\">
    ";
        // line 57
        if ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "quantity", [], "any", false, false, false, 57) > 1)) {
            // line 58
            echo "      <span class=\"badge badge-secondary rounded-circle\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "quantity", [], "any", false, false, false, 58), "html", null, true);
            echo "</span>
    ";
        } else {
            // line 60
            echo "      ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "quantity", [], "any", false, false, false, 60), "html", null, true);
            echo "
    ";
        }
        // line 62
        echo "
    <div class=\"d-none js-product-quantity\">
      <input type=\"text\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "quantity", [], "any", false, false, false, 64), "html", null, true);
        echo "\" class=\"form-control\">
    </div>
  </td>
  <td class=\"cellProductLocation";
        // line 67
        if ( !($context["isColumnLocationDisplayed"] ?? null)) {
            echo " d-none";
        }
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "location", [], "any", false, false, false, 67), "html", null, true);
        echo "</td>
  <td class=\"cellProductRefunded";
        // line 68
        if ( !($context["isColumnRefundedDisplayed"] ?? null)) {
            echo " d-none";
        }
        echo "\">
    ";
        // line 69
        if ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "quantityRefunded", [], "any", false, false, false, 69) > 0)) {
            // line 70
            echo "      ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "quantityRefunded", [], "any", false, false, false, 70), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "amountRefunded", [], "any", false, false, false, 70), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Refunded", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo ")
    ";
        }
        // line 72
        echo "  </td>
  <td class=\"cellProductAvailableQuantity text-center";
        // line 73
        if ( !($context["isAvailableQuantityDisplayed"] ?? null)) {
            echo " d-none";
        }
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "availableQuantity", [], "any", false, false, false, 73), "html", null, true);
        echo "</td>
  <td class=\"cellProductTotalPrice\">";
        // line 74
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "totalPrice", [], "any", false, false, false, 74), "html", null, true);
        echo "</td>
  ";
        // line 75
        if (twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "hasInvoice", [], "method", false, false, false, 75)) {
            // line 76
            echo "    <td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "orderInvoiceNumber", [], "any", false, false, false, 76), "html", null, true);
            echo "</td>
  ";
        }
        // line 78
        echo "  ";
        if ( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "delivered", [], "any", false, false, false, 78)) {
            // line 79
            echo "    <td class=\"text-right cellProductActions\">
      <button
        type=\"button\"
        class=\"btn tooltip-link js-order-product-edit-btn\"
        data-toggle=\"pstooltip\"
        data-placement=\"top\"
        data-original-title=\"";
            // line 85
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit", [], "Admin.Actions"), "html", null, true);
            echo "\"
        data-order-detail-id=\"";
            // line 86
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "orderDetailId", [], "any", false, false, false, 86), "html", null, true);
            echo "\"
        data-product-id=\"";
            // line 87
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id", [], "any", false, false, false, 87), "html", null, true);
            echo "\"
        data-combination-id=\"";
            // line 88
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "combinationId", [], "any", false, false, false, 88), "html", null, true);
            echo "\"
        data-product-quantity=\"";
            // line 89
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "quantity", [], "any", false, false, false, 89), "html", null, true);
            echo "\"
        data-product-price-tax-incl=\"";
            // line 90
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "unitPriceTaxInclRaw", [], "any", false, false, false, 90), "html", null, true);
            echo "\"
        data-product-price-tax-excl=\"";
            // line 91
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "unitPriceTaxExclRaw", [], "any", false, false, false, 91), "html", null, true);
            echo "\"
        data-tax-rate=\"";
            // line 92
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "taxRate", [], "any", false, false, false, 92), "html", null, true);
            echo "\"
        data-location=\"";
            // line 93
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "location", [], "any", false, false, false, 93), "html", null, true);
            echo "\"
        data-available-quantity=\"";
            // line 94
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "availableQuantity", [], "any", false, false, false, 94), "html", null, true);
            echo "\"
        data-available-out-of-stock=\"";
            // line 95
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "availableOutOfStock", [], "any", false, false, false, 95), "html", null, true);
            echo "\"
        data-order-invoice-id=\"";
            // line 96
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "orderInvoiceId", [], "any", false, false, false, 96), "html", null, true);
            echo "\"
        data-is-order-tax-included=\"";
            // line 97
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "isTaxIncluded", [], "any", false, false, false, 97), "html", null, true);
            echo "\">
        <i class=\"material-icons\">edit</i>
      </button>
      <button
        type=\"button\"
        class=\"btn tooltip-link js-order-product-delete-btn\"
        data-toggle=\"pstooltip\"
        data-placement=\"top\"
        data-order-id=\"";
            // line 105
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 105), "html", null, true);
            echo "\"
        data-order-detail-id=\"";
            // line 106
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "orderDetailId", [], "any", false, false, false, 106), "html", null, true);
            echo "\"
        data-delete-message=\"";
            // line 107
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure?", [], "Admin.Notifications.Warning"), "html", null, true);
            echo "\"
        data-original-title=\"";
            // line 108
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete", [], "Admin.Actions"), "html", null, true);
            echo "\">
        <i class=\"material-icons\">delete</i>
      </button>
    </td>
  ";
        }
        // line 113
        echo "  <td class=\"text-right cancel-product-element\">
    <div class=\"cancel-product-cell cancel-product-element";
        // line 114
        if ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "refundable", [], "any", false, false, false, 114) == false)) {
            echo " hidden";
        }
        echo "\">
      <div class=\"cancel-product-cell-elements\">
        <div class=\"cancel-product-selector form-group\">
          ";
        // line 117
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_0 = ($context["cancelProductForm"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[("selected_" . twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "orderDetailId", [], "any", false, false, false, 117))] ?? null) : null), 'widget');
        echo "
        </div>
        <div class=\"cancel-product-quantity form-group\">
          ";
        // line 120
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_1 = ($context["cancelProductForm"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[("quantity_" . twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "orderDetailId", [], "any", false, false, false, 120))] ?? null) : null), 'label');
        echo "
          <div class=\"input-group\">
            ";
        // line 122
        $context["quantityInputOptions"] = ["attr" => ["data-product-price-tax-incl" => twig_get_attribute($this->env, $this->source,         // line 124
($context["product"] ?? null), "unitPriceTaxInclRaw", [], "any", false, false, false, 124), "data-product-price-tax-excl" => twig_get_attribute($this->env, $this->source,         // line 125
($context["product"] ?? null), "unitPriceTaxExclRaw", [], "any", false, false, false, 125), "data-amount-refundable" => twig_get_attribute($this->env, $this->source,         // line 126
($context["product"] ?? null), "amountRefundableRaw", [], "any", false, false, false, 126), "data-quantity-refundable" => twig_get_attribute($this->env, $this->source,         // line 127
($context["product"] ?? null), "quantityRefundable", [], "any", false, false, false, 127)]];
        // line 130
        echo "            ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_2 = ($context["cancelProductForm"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[("quantity_" . twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "orderDetailId", [], "any", false, false, false, 130))] ?? null) : null), 'widget', ($context["quantityInputOptions"] ?? null));
        echo "
          </div>
        </div>
        <div class=\"cancel-product-amount form-group\">
          ";
        // line 134
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_3 = ($context["cancelProductForm"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[("amount_" . twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "orderDetailId", [], "any", false, false, false, 134))] ?? null) : null), 'label');
        echo "
          <div class=\"input-group\">
            ";
        // line 136
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_4 = ($context["cancelProductForm"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[("amount_" . twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "orderDetailId", [], "any", false, false, false, 136))] ?? null) : null), 'widget');
        echo "
            <div class=\"input-group-append\"><div class=\"input-group-text\">";
        // line 137
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderCurrency"] ?? null), "symbol", [], "any", false, false, false, 137), "html", null, true);
        echo "</div></div>
            <small class=\"max-refund text-left\">
              ";
        // line 139
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("(Max %amount_refundable% %tax_method%)", ["%amount_refundable%" => twig_get_attribute($this->env, $this->source,         // line 140
($context["product"] ?? null), "amountRefundable", [], "any", false, false, false, 140), "%tax_method%" => twig_get_attribute($this->env, $this->source,         // line 141
($context["orderForViewing"] ?? null), "taxMethod", [], "any", false, false, false, 141)], "Admin.Orderscustomers.Help");
        // line 142
        echo "
            </small>
          </div>
        </div>
      </div>
    </div>
  </td>
</tr>
";
        // line 150
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "customizations", [], "any", false, false, false, 150))) {
            // line 151
            echo "  <tr class=\"order-product-customization";
            if (($context["rowIsDisplayed"] ?? null)) {
                echo " d-none";
            }
            echo "\">
    <td class=\"border-top-0\"></td>
    ";
            // line 153
            $context["colspan"] = 8;
            // line 154
            echo "    ";
            $context["colspan"] = ((twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "hasInvoice", [], "method", false, false, false, 154)) ? ((($context["colspan"] ?? null) + 1)) : (($context["colspan"] ?? null)));
            // line 155
            echo "    ";
            $context["colspan"] = (( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "delivered", [], "any", false, false, false, 155)) ? ((($context["colspan"] ?? null) + 1)) : (($context["colspan"] ?? null)));
            // line 156
            echo "    <td colspan=\"";
            echo twig_escape_filter($this->env, ($context["colspan"] ?? null), "html", null, true);
            echo "\" class=\"border-top-0 text-muted\">
      ";
            // line 157
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "customizations", [], "any", false, false, false, 157), "fileCustomizations", [], "any", false, false, false, 157)) {
                // line 158
                echo "        <div class=\"d-flex flex-row flex-wrap\">
          ";
                // line 159
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "customizations", [], "any", false, false, false, 159), "fileCustomizations", [], "any", false, false, false, 159));
                foreach ($context['_seq'] as $context["_key"] => $context["customization"]) {
                    // line 160
                    echo "              <div class=\"mr-4\">
                <p><strong>";
                    // line 161
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customization"], "name", [], "any", false, false, false, 161), "html", null, true);
                    echo "</strong></p>
                <p>
                  <a href=\"";
                    // line 163
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_display_customization_image", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 163), "value" => twig_get_attribute($this->env, $this->source, $context["customization"], "value", [], "any", false, false, false, 163)]), "html", null, true);
                    echo "\" download>
                    <img src=\"";
                    // line 164
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customization"], "image", [], "any", false, false, false, 164), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customization"], "name", [], "any", false, false, false, 164), "html", null, true);
                    echo "\">
                  </a>
                </p>
              </div>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customization'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 169
                echo "        </div>
      ";
            }
            // line 171
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "customizations", [], "any", false, false, false, 171), "textCustomizations", [], "any", false, false, false, 171));
            foreach ($context['_seq'] as $context["_key"] => $context["customization"]) {
                // line 172
                echo "        <p><strong>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customization"], "name", [], "any", false, false, false, 172), "html", null, true);
                echo " :</strong> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customization"], "value", [], "any", false, false, false, 172), "html", null, true);
                echo "</p>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customization'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 174
            echo "      ";
            if ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "type", [], "any", false, false, false, 174) == twig_constant("PrestaShop\\PrestaShop\\Core\\Domain\\Order\\QueryResult\\OrderProductForViewing::TYPE_PACK"))) {
                // line 175
                echo "        <div class=\"btn-product-pack-modal mb-3 d-print-none\" data-toggle=\"modal\" data-target=\"#product-pack-modal\" data-pack-items=\"";
                echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "packItems", [], "any", false, false, false, 175)), "html", null, true);
                echo "\">
          <strong>";
                // line 176
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("View pack content", [], "Admin.Actions"), "html", null, true);
                echo "</strong>
        </div>
      ";
            }
            // line 179
            echo "    </td>
  </tr>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  447 => 179,  441 => 176,  436 => 175,  433 => 174,  422 => 172,  417 => 171,  413 => 169,  400 => 164,  396 => 163,  391 => 161,  388 => 160,  384 => 159,  381 => 158,  379 => 157,  374 => 156,  371 => 155,  368 => 154,  366 => 153,  358 => 151,  356 => 150,  346 => 142,  344 => 141,  343 => 140,  342 => 139,  337 => 137,  333 => 136,  328 => 134,  320 => 130,  318 => 127,  317 => 126,  316 => 125,  315 => 124,  314 => 122,  309 => 120,  303 => 117,  295 => 114,  292 => 113,  284 => 108,  280 => 107,  276 => 106,  272 => 105,  261 => 97,  257 => 96,  253 => 95,  249 => 94,  245 => 93,  241 => 92,  237 => 91,  233 => 90,  229 => 89,  225 => 88,  221 => 87,  217 => 86,  213 => 85,  205 => 79,  202 => 78,  196 => 76,  194 => 75,  190 => 74,  182 => 73,  179 => 72,  169 => 70,  167 => 69,  161 => 68,  153 => 67,  147 => 64,  143 => 62,  137 => 60,  131 => 58,  129 => 57,  124 => 55,  121 => 54,  115 => 51,  110 => 50,  108 => 49,  105 => 48,  99 => 45,  95 => 44,  92 => 43,  89 => 42,  83 => 39,  79 => 38,  76 => 37,  74 => 36,  70 => 35,  66 => 34,  62 => 32,  54 => 30,  52 => 29,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/product.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\product.html.twig");
    }
}
