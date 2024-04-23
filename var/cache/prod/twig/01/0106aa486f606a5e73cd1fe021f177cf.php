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

/* @PrestaShop/Admin/Common/Grid/grid_customer.html.twig */
class __TwigTemplate_11f935f4624fbefb4e064f932a4e3fd9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'grid_table_row' => [$this, 'block_grid_table_row'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@!PrestaShop/Admin/Common/Grid/grid.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@!PrestaShop/Admin/Common/Grid/grid.html.twig", "@PrestaShop/Admin/Common/Grid/grid_customer.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_grid_table_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "  <div class=\"row\">
    <div class=\"col-sm\">
      ";
        // line 5
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/table_customer.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/grid_customer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 5,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/grid_customer.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\PrestaShop\\Admin\\Common\\Grid\\grid_customer.html.twig");
    }
}
