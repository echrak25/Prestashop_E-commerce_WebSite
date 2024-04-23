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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig */
class __TwigTemplate_6d4af6f92f2982c5f25b11a1cd5f78af extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "<div class=\"card card-details\">
  <div class=\"card-header d-none d-print-block\">
    ";
        // line 27
        $this->displayBlock('header', $context, $blocks);
        // line 29
        echo "  </div>
  <div class=\"card-body\">
    ";
        // line 31
        $this->displayBlock('body', $context, $blocks);
        // line 33
        echo "  </div>
</div>
";
    }

    // line 27
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "    ";
    }

    // line 31
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  69 => 32,  65 => 31,  61 => 28,  57 => 27,  51 => 33,  49 => 31,  45 => 29,  43 => 27,  39 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\details_card.html.twig");
    }
}
