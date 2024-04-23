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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/order_navigation.html.twig */
class __TwigTemplate_ac0201fc7dc399a2eb43b484259bc321 extends Template
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
<div class=\"order-navigation\">
  <div class=\"order-navigation-left\">
      <a
        href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_view", ["orderId" => ($context["previousOrderId"] ?? null)]), "html", null, true);
        echo "\"
        role=\"button\"
        class=\"btn btn-action ";
        // line 31
        if ( !($context["previousOrderId"] ?? null)) {
            echo " disabled ";
        }
        echo "\"
       >
        <span class=\"material-icons rtl-flip\">arrow_back</span>
      </a>
  </div>

  <div class=\"order-navigation-right\">
      <a
        href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_view", ["orderId" => ($context["nextOrderId"] ?? null)]), "html", null, true);
        echo "\"
        role=\"button\"
        class=\"btn btn-action ";
        // line 41
        if ( !($context["nextOrderId"] ?? null)) {
            echo " disabled ";
        }
        echo "\"
      >
        <span class=\"material-icons rtl-flip\">arrow_forward</span>
      </a>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/order_navigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 41,  61 => 39,  48 => 31,  43 => 29,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/order_navigation.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\order_navigation.html.twig");
    }
}
