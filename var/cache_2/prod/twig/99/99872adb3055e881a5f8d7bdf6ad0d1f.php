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

/* @PrestaShop/Admin/Sell/Order/CreditSlip/Blocks/pdf_by_date.html.twig */
class __TwigTemplate_44f07bf9c97afc18075244e526594431 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'credit_slip_pdf_by_date_form' => [$this, 'block_credit_slip_pdf_by_date_form'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["pdfByDateForm"] ?? null), [0 => "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig"], true);
        // line 28
        echo "
";
        // line 29
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["pdfByDateForm"] ?? null), 'form_start', ["method" => "GET", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_admin_credit_slips_pdf_by_date"), "attr" => ["id" => "form-generate-credit-slips-by-date"]]);
        // line 33
        echo "
<div class=\"card\">
  <h3 class=\"card-header\">
    <i class=\"material-icons\">date_range</i> ";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("By date", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
  </h3>

  <div class=\"card-body\">
    <div class=\"form-wrapper\">
      ";
        // line 41
        $this->displayBlock('credit_slip_pdf_by_date_form', $context, $blocks);
        // line 44
        echo "    </div>
  </div>

  <div class=\"card-footer\">
    <div class=\"d-flex justify-content-end\">
      <button class=\"btn btn-primary\" id=\"generate-credit-slip-by-date\">
        ";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Generate PDF file by date", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
      </button>
    </div>
  </div>
</div>
";
        // line 55
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["pdfByDateForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 41
    public function block_credit_slip_pdf_by_date_form($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 42
        echo "        ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["pdfByDateForm"] ?? null), 'widget');
        echo "
      ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/CreditSlip/Blocks/pdf_by_date.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 42,  85 => 41,  79 => 55,  71 => 50,  63 => 44,  61 => 41,  53 => 36,  48 => 33,  46 => 29,  43 => 28,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/CreditSlip/Blocks/pdf_by_date.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\CreditSlip\\Blocks\\pdf_by_date.html.twig");
    }
}
