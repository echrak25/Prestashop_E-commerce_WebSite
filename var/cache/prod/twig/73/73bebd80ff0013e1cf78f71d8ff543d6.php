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

/* @PrestaShop/Admin/Sell/Order/CreditSlip/index.html.twig */
class __TwigTemplate_8c26252e6d6f6194c7b2ac0028c5a7d3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'credit_slips_listing' => [$this, 'block_credit_slips_listing'],
            'credit_slips_print_pdf' => [$this, 'block_credit_slips_print_pdf'],
            'credit_slips_options' => [$this, 'block_credit_slips_options'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Sell/Order/CreditSlip/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "  ";
        $this->displayBlock('credit_slips_listing', $context, $blocks);
        // line 32
        echo "
  ";
        // line 33
        $this->displayBlock('credit_slips_print_pdf', $context, $blocks);
        // line 36
        echo "
  ";
        // line 37
        $this->displayBlock('credit_slips_options', $context, $blocks);
    }

    // line 29
    public function block_credit_slips_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Order/CreditSlip/index.html.twig", 30)->display(twig_array_merge($context, ["grid" => ($context["creditSlipGrid"] ?? null)]));
        // line 31
        echo "  ";
    }

    // line 33
    public function block_credit_slips_print_pdf($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/CreditSlip/Blocks/pdf_by_date.html.twig", "@PrestaShop/Admin/Sell/Order/CreditSlip/index.html.twig", 34)->display($context);
        // line 35
        echo "  ";
    }

    // line 37
    public function block_credit_slips_options($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/CreditSlip/Blocks/credit_slip_options.html.twig", "@PrestaShop/Admin/Sell/Order/CreditSlip/index.html.twig", 38)->display($context);
        // line 39
        echo "  ";
    }

    // line 42
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 43
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/credit_slip.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/CreditSlip/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 46,  112 => 45,  106 => 43,  102 => 42,  98 => 39,  95 => 38,  91 => 37,  87 => 35,  84 => 34,  80 => 33,  76 => 31,  73 => 30,  69 => 29,  65 => 37,  62 => 36,  60 => 33,  57 => 32,  54 => 29,  50 => 28,  39 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/CreditSlip/index.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\CreditSlip\\index.html.twig");
    }
}
