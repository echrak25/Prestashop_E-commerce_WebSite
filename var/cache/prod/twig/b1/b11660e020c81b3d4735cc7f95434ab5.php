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

/* @PrestaShop/Admin/Sell/Order/Invoices/Blocks/invoice_options.html.twig */
class __TwigTemplate_6b76e3ab658421c64a80fa14d5780cd5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'invoice_options' => [$this, 'block_invoice_options'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 27
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Sell/Order/Invoices/Blocks/invoice_options.html.twig", 27)->unwrap();
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('invoice_options', $context, $blocks);
    }

    public function block_invoice_options($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["invoiceOptionsForm"] ?? null), 'form_start', ["method" => "POST", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_order_invoices_process"), "attr" => ["id" => "form-invoices-options"]]);
        echo "
  <div class=\"card\">
    <h3 class=\"card-header\">
      <i class=\"material-icons\">settings</i>
      ";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice options", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
    </h3>
    <div class=\"card-body\">
      <div class=\"form-wrapper\">
        <div class=\"form-group row\">
          ";
        // line 39
        echo twig_call_macro($macros["ps"], "macro_label_with_help", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enable invoices", [], "Admin.Orderscustomers.Feature"), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("If enabled, your customers will receive an invoice for the purchase.", [], "Admin.Orderscustomers.Help")], 39, $context, $this->getSourceContext());
        echo "
          <div class=\"col-sm\">
            ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "enable_invoices", [], "any", false, false, false, 41), 'errors');
        echo "
            ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "enable_invoices", [], "any", false, false, false, 42), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          ";
        // line 46
        echo twig_call_macro($macros["ps"], "macro_label_with_help", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enable tax breakdown", [], "Admin.Orderscustomers.Feature"), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("If required, show the total amount per rate of the corresponding tax.", [], "Admin.Orderscustomers.Help")], 46, $context, $this->getSourceContext());
        echo "
          <div class=\"col-sm\">
            ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "enable_tax_breakdown", [], "any", false, false, false, 48), 'errors');
        echo "
            ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "enable_tax_breakdown", [], "any", false, false, false, 49), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          ";
        // line 53
        echo twig_call_macro($macros["ps"], "macro_label_with_help", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enable product image", [], "Admin.Orderscustomers.Feature"), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Adds an image in front of the product name on the invoice", [], "Admin.Orderscustomers.Help")], 53, $context, $this->getSourceContext());
        echo "
          <div class=\"col-sm\">
            ";
        // line 55
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "enable_product_images", [], "any", false, false, false, 55), 'errors');
        echo "
            ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "enable_product_images", [], "any", false, false, false, 56), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          ";
        // line 60
        echo twig_call_macro($macros["ps"], "macro_label_with_help", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice prefix", [], "Admin.Orderscustomers.Feature"), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Freely definable prefix for invoice number (e.g. #IN00001).", [], "Admin.Orderscustomers.Help")], 60, $context, $this->getSourceContext());
        echo "
          <div class=\"col-sm\">
            ";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "invoice_prefix", [], "any", false, false, false, 62), 'errors');
        echo "
            ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "invoice_prefix", [], "any", false, false, false, 63), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          <label class=\"form-control-label\">
            ";
        // line 68
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add current year to invoice number", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
          </label>
          <div class=\"col-sm\">
            ";
        // line 71
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "add_current_year", [], "any", false, false, false, 71), 'errors');
        echo "
            ";
        // line 72
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "add_current_year", [], "any", false, false, false, 72), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          <label class=\"form-control-label\">
            ";
        // line 77
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reset sequential invoice number at the beginning of the year", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
          </label>
          <div class=\"col-sm\">
            ";
        // line 80
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "reset_number_annually", [], "any", false, false, false, 80), 'errors');
        echo "
            ";
        // line 81
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "reset_number_annually", [], "any", false, false, false, 81), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          <label class=\"form-control-label\">
            ";
        // line 86
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Position of the year date", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
          </label>
          <div class=\"col-sm\">
            ";
        // line 89
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "year_position", [], "any", false, false, false, 89), 'errors');
        echo "
            ";
        // line 90
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "year_position", [], "any", false, false, false, 90), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          ";
        // line 94
        echo twig_call_macro($macros["ps"], "macro_label_with_help", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice number", [], "Admin.Orderscustomers.Feature"), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The next invoice will begin with this number, and then increase with each additional invoice. Set to 0 if you want to keep the current number (which is #%number%).", ["%number%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "vars", [], "any", false, false, false, 94), "next_invoice_number", [], "any", false, false, false, 94)], "Admin.Orderscustomers.Help")], 94, $context, $this->getSourceContext());
        echo "
          <div class=\"col-sm\">
            ";
        // line 96
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "invoice_number", [], "any", false, false, false, 96), 'errors');
        echo "
            ";
        // line 97
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "invoice_number", [], "any", false, false, false, 97), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          ";
        // line 101
        echo twig_call_macro($macros["ps"], "macro_label_with_help", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Legal free text", [], "Admin.Orderscustomers.Feature"), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Use this field to show additional information on the invoice, below the payment methods summary (like specific legal information).", [], "Admin.Orderscustomers.Help")], 101, $context, $this->getSourceContext());
        echo "
          <div class=\"col-sm\">
            ";
        // line 103
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "legal_free_text", [], "any", false, false, false, 103), 'errors');
        echo "
            ";
        // line 104
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "legal_free_text", [], "any", false, false, false, 104), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          ";
        // line 108
        echo twig_call_macro($macros["ps"], "macro_label_with_help", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Footer text", [], "Admin.Orderscustomers.Feature"), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This text will appear at the bottom of the invoice, below your company details.", [], "Admin.Orderscustomers.Help")], 108, $context, $this->getSourceContext());
        echo "
          <div class=\"col-sm\">
            ";
        // line 110
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "footer_text", [], "any", false, false, false, 110), 'errors');
        echo "
            ";
        // line 111
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "footer_text", [], "any", false, false, false, 111), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          ";
        // line 115
        echo twig_call_macro($macros["ps"], "macro_label_with_help", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice model", [], "Admin.Orderscustomers.Feature"), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Choose an invoice model.", [], "Admin.Orderscustomers.Help")], 115, $context, $this->getSourceContext());
        echo "
          <div class=\"col-sm\">
            ";
        // line 117
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "invoice_model", [], "any", false, false, false, 117), 'errors');
        echo "
            ";
        // line 118
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "invoice_model", [], "any", false, false, false, 118), 'widget');
        echo "
          </div>
        </div>
        <div class=\"form-group row\">
          ";
        // line 122
        echo twig_call_macro($macros["ps"], "macro_label_with_help", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Use the disk as cache for PDF invoices", [], "Admin.Orderscustomers.Feature"), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Saves memory but slows down the PDF generation.", [], "Admin.Orderscustomers.Help")], 122, $context, $this->getSourceContext());
        echo "
          <div class=\"col-sm\">
            ";
        // line 124
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "use_disk_cache", [], "any", false, false, false, 124), 'errors');
        echo "
            ";
        // line 125
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["invoiceOptionsForm"] ?? null), "use_disk_cache", [], "any", false, false, false, 125), 'widget');
        echo "
          </div>
        </div>
        ";
        // line 128
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["invoiceOptionsForm"] ?? null), 'rest');
        echo "
      </div>
    </div>
    <div class=\"card-footer\">
      <div class=\"d-flex justify-content-end\">
        <button class=\"btn btn-primary\" id=\"save-invoices-options-button\">";
        // line 133
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
      </div>
    </div>
  </div>
  ";
        // line 137
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["invoiceOptionsForm"] ?? null), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Invoices/Blocks/invoice_options.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  281 => 137,  274 => 133,  266 => 128,  260 => 125,  256 => 124,  251 => 122,  244 => 118,  240 => 117,  235 => 115,  228 => 111,  224 => 110,  219 => 108,  212 => 104,  208 => 103,  203 => 101,  196 => 97,  192 => 96,  187 => 94,  180 => 90,  176 => 89,  170 => 86,  162 => 81,  158 => 80,  152 => 77,  144 => 72,  140 => 71,  134 => 68,  126 => 63,  122 => 62,  117 => 60,  110 => 56,  106 => 55,  101 => 53,  94 => 49,  90 => 48,  85 => 46,  78 => 42,  74 => 41,  69 => 39,  61 => 34,  53 => 30,  46 => 29,  43 => 28,  41 => 27,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Invoices/Blocks/invoice_options.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Invoices\\Blocks\\invoice_options.html.twig");
    }
}
