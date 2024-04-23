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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/edit_product_row.html.twig */
class __TwigTemplate_f43880cc384838f6678656fc0416bf05 extends Template
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
<tr id=\"editProductTableRowTemplate\" class=\"d-none editProductRow\">
  <td class=\"cellProductImg\"></td>
  <td class=\"cellProductName\"></td>
  <td class=\"cellProductTaxes pr-5\">
    ";
        // line 30
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["editProductRowForm"] ?? null), "price_tax_excluded", [], "any", false, false, false, 30), 'row', ["attr" => ["data-modal-edit-price-title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit the price", [], "Admin.Orderscustomers.Feature"), "data-modal-edit-price-apply" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit", [], "Admin.Actions"), "data-modal-edit-price-cancel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "data-modal-edit-price-body" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure you want to edit this product price? It will be applied to all identical products in this order.", [], "Admin.Orderscustomers.Notification")]]);
        // line 37
        echo "
    ";
        // line 38
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["editProductRowForm"] ?? null), "price_tax_included", [], "any", false, false, false, 38), 'row');
        echo "
  </td>
  <td class=\"cellProductQuantity pr-5\">
    ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["editProductRowForm"] ?? null), "quantity", [], "any", false, false, false, 41), 'row', ["type" => "number"]);
        echo "
  </td>
  <td class=\"editProductLocation cellProductLocation\"></td>
  <td class=\"editProductRefunded cellProductRefunded\"></td>
  <td class=\"editProductAvailable";
        // line 45
        if ( !($context["isAvailableQuantityDisplayed"] ?? null)) {
            echo " d-none";
        }
        echo "\"></td>
  <td class=\"editProductTotalPrice\"></td>
  ";
        // line 47
        if (twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "hasInvoice", [], "method", false, false, false, 47)) {
            // line 48
            echo "    <td class=\"cellProductInvoice\">
      ";
            // line 49
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["editProductRowForm"] ?? null), "invoice", [], "any", false, false, false, 49), 'row', ["attr" => ["data-modal-edit-price-title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit the price", [], "Admin.Orderscustomers.Feature"), "data-modal-edit-price-apply" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit", [], "Admin.Actions"), "data-modal-edit-price-cancel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "data-modal-edit-price-body" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure you want to edit this product price? It will be applied to all invoices of this order.", [], "Admin.Orderscustomers.Notification")]]);
            // line 56
            echo "
    </td>
  ";
        }
        // line 59
        echo "  <td class=\"editProductActions text-right\">
    <div class=\"editProductActions-container btn-group\">
      ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["editProductRowForm"] ?? null), "cancel", [], "any", false, false, false, 61), 'row');
        echo "
      ";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["editProductRowForm"] ?? null), "save", [], "any", false, false, false, 62), 'row');
        echo "
    </div>
  </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/edit_product_row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 62,  85 => 61,  81 => 59,  76 => 56,  74 => 49,  71 => 48,  69 => 47,  62 => 45,  55 => 41,  49 => 38,  46 => 37,  44 => 30,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/edit_product_row.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\edit_product_row.html.twig");
    }
}
