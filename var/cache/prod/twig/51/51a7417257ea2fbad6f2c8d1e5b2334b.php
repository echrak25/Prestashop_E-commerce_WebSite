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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/add_product_row.html.twig */
class __TwigTemplate_076e9ee171529622b206cf0b56096467 extends Template
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
<tr id=\"addProductTableRow\" class=\"add-product d-none\" data-is-order-tax-included=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "isTaxIncluded", [], "any", false, false, false, 26), "html", null, true);
        echo "\">
  <td colspan=\"2\" class=\"pr-2\">
    ";
        // line 28
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "product_id", [], "any", false, false, false, 28), 'row');
        echo "
    ";
        // line 29
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "tax_rate", [], "any", false, false, false, 29), 'row');
        echo "
    ";
        // line 30
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "search", [], "any", false, false, false, 30), 'label');
        echo "
    ";
        // line 31
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "search", [], "any", false, false, false, 31), 'widget');
        echo "
    <div class=\"dropdown\">
      <div class=\"dropdown-menu\"></div>
    </div>
    <div class=\"input-group mt-2 d-none\" id=\"addProductCombinations\">
      <div class=\"input-group-prepend\">
        <div class=\"input-group-text\">";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Combinations", [], "Admin.Global"), "html", null, true);
        echo "</div>
      </div>
      <select id=\"addProductCombinationId\" class=\"custom-select\"></select>
    </div>
  </td>
  <td class=\"pr-2\">
   <div class=\"row add-product-inputs\">
     <div class=\"col-sm-6\">
      ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "price_tax_excluded", [], "any", false, false, false, 45), 'widget');
        echo "
     </div>

     <div class=\"col-sm-6\">
      ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "price_tax_included", [], "any", false, false, false, 49), 'widget');
        echo "
     </div>
   </div>
  </td>
  <td class=\"pr-2 add-product-quantity\">
    ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "quantity", [], "any", false, false, false, 54), 'row', ["type" => "number"]);
        echo "
  </td>
  <td id=\"addProductLocation\" class=\"cellProductLocation\"></td>
  <td id=\"addProductRefunded\" class=\"cellProductRefunded\"></td>
  <td id=\"addProductAvailable\"";
        // line 58
        if ( !($context["isAvailableQuantityDisplayed"] ?? null)) {
            echo " class=\"d-none\"";
        }
        echo "></td>
  <td id=\"addProductTotalPrice\"></td>
  ";
        // line 60
        if (twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "hasInvoice", [], "method", false, false, false, 60)) {
            // line 61
            echo "    <td class=\"addProductInvoice pr-2\">
      ";
            // line 62
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "invoice", [], "any", false, false, false, 62), 'row', ["attr" => ["data-modal-title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Create a new invoice", [], "Admin.Orderscustomers.Feature"), "data-modal-apply" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Create", [], "Admin.Actions"), "data-modal-cancel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "data-modal-body" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure you want to create a new invoice?", [], "Admin.Orderscustomers.Notification"), "data-modal-edit-price-title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit the price", [], "Admin.Orderscustomers.Feature"), "data-modal-edit-price-apply" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Update", [], "Admin.Actions"), "data-modal-edit-price-cancel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "data-modal-edit-price-body" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure you want to edit this product price? It will be applied to all invoices of this order.", [], "Admin.Orderscustomers.Notification")]]);
            // line 73
            echo "
    </td>
  ";
        }
        // line 76
        echo "  <td class=\"text-right add-product-buttons\">
    <div class=\"btn-group\">
      ";
        // line 78
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "cancel", [], "any", false, false, false, 78), 'row');
        echo "
      ";
        // line 79
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "add", [], "any", false, false, false, 79), 'row');
        echo "
    </div>
  </td>
</tr>
<tr id=\"addProductNewInvoiceInfo\" class=\"d-none\">
  <td colspan=\"12\">
    <div>
      <h4>";
        // line 86
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("New invoice information", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "</h4>
      <p data-role=\"carrier-name\"><b>";
        // line 87
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Carrier", [], "Admin.Shipping.Feature"), "html", null, true);
        echo " :</b> ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "carrierName", [], "any", false, false, false, 87), "html", null, true);
        echo "</p>
      ";
        // line 88
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addProductRowForm"] ?? null), "free_shipping", [], "any", false, false, false, 88), 'row');
        echo "
    </div>
  </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/add_product_row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 88,  140 => 87,  136 => 86,  126 => 79,  122 => 78,  118 => 76,  113 => 73,  111 => 62,  108 => 61,  106 => 60,  99 => 58,  92 => 54,  84 => 49,  77 => 45,  66 => 37,  57 => 31,  53 => 30,  49 => 29,  45 => 28,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/add_product_row.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\add_product_row.html.twig");
    }
}
