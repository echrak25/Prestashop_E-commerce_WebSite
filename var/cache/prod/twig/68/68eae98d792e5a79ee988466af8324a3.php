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

/* @PrestaShop/Admin/Sell/Customer/index.html.twig */
class __TwigTemplate_bc82a8f3be39381f4ecf313873f72458 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'employee_helper_card' => [$this, 'block_employee_helper_card'],
            'customers_kpis' => [$this, 'block_customers_kpis'],
            'customers_listing' => [$this, 'block_customers_listing'],
            'customer_required_fields_form' => [$this, 'block_customer_required_fields_form'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 35
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 22
        $context["enableSidebar"] = true;
        // line 23
        $context["layoutTitle"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Manage your Customers", [], "Admin.Orderscustomers.Feature");
        // line 25
        if (($context["isSingleShopContext"] ?? null)) {
            // line 26
            $context["layoutHeaderToolbarBtn"] = ["add" => ["href" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_customers_create"), "desc" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add new customer", [], "Admin.Orderscustomers.Feature"), "icon" => "add_circle_outline"]];
        }
        // line 35
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 35);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 37
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "  ";
        $this->displayBlock('employee_helper_card', $context, $blocks);
        // line 45
        echo "
  ";
        // line 46
        $this->displayBlock('customers_kpis', $context, $blocks);
        // line 60
        echo "
  ";
        // line 61
        $this->displayBlock('customers_listing', $context, $blocks);
        // line 84
        echo "
  ";
        // line 85
        $this->displayBlock('customer_required_fields_form', $context, $blocks);
    }

    // line 38
    public function block_employee_helper_card($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 39
        echo "    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 41
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/showcase_card.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 41)->display($context);
        // line 42
        echo "      </div>
    </div>
  ";
    }

    // line 46
    public function block_customers_kpis($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 47
        echo "    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"card\">
          <div class=\"\">
            ";
        // line 51
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin\\Common:renderKpiRow", ["kpiRow" =>         // line 53
($context["customersKpi"] ?? null)]));
        // line 54
        echo "
          </div>
        </div>
      </div>
    </div>
  ";
    }

    // line 61
    public function block_customers_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 62
        echo "    ";
        if ( !($context["isSingleShopContext"] ?? null)) {
            // line 63
            echo "      <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"alert alert-info\" role=\"alert\">
            <p class=\"alert-text\">
              ";
            // line 67
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You have to select a shop if you want to create a customer.", [], "Admin.Orderscustomers.Notification"), "html", null, true);
            echo "
            </p>
          </div>
        </div>
      </div>
    ";
        }
        // line 73
        echo "
    <div class=\"row\">
      <div class=\"col-12\">
        ";
        // line 76
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/index.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 76, "363183320")->display(twig_array_merge($context, ["grid" => ($context["customerGrid"] ?? null)]));
        // line 81
        echo "      </div>
    </div>
  ";
    }

    // line 85
    public function block_customer_required_fields_form($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 86
        echo "    <div class=\"row\">
      <div class=\"col-md-12\">
        <p>
          <button class=\"btn btn-primary\"
                  type=\"button\"
                  data-toggle=\"collapse\"
                  data-target=\"#customerRequiredFieldsContainer\"
                  aria-expanded=\"false\"
                  aria-controls=\"customerRequiredFieldsContainer\"
          >
            <i class=\"material-icons\">add_circle</i>
            ";
        // line 97
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Set required fields for this section", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
          </button>
        </p>
      </div>

      <div class=\"col-md-12\">
        ";
        // line 103
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/Index/required_fields.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 103)->display($context);
        // line 104
        echo "      </div>
    </div>
  ";
    }

    // line 109
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 110
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  ";
        // line 112
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/javascript.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 112)->display($context);
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 112,  196 => 110,  192 => 109,  186 => 104,  184 => 103,  175 => 97,  162 => 86,  158 => 85,  152 => 81,  150 => 76,  145 => 73,  136 => 67,  130 => 63,  127 => 62,  123 => 61,  114 => 54,  112 => 53,  111 => 51,  105 => 47,  101 => 46,  95 => 42,  93 => 41,  89 => 39,  85 => 38,  81 => 85,  78 => 84,  76 => 61,  73 => 60,  71 => 46,  68 => 45,  65 => 38,  61 => 37,  56 => 35,  53 => 26,  51 => 25,  49 => 23,  47 => 22,  40 => 35,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Customer/index.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\PrestaShop\\Admin\\Sell\\Customer\\index.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Customer/index.html.twig */
class __TwigTemplate_bc82a8f3be39381f4ecf313873f72458___363183320 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'grid_panel_extra_content' => [$this, 'block_grid_panel_extra_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 76
        return "@PrestaShop/Admin/Common/Grid/grid_panel_customer.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel_customer.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 76);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 77
    public function block_grid_panel_extra_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 78
        echo "            ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Customer/Blocks/delete_modal.html.twig", "@PrestaShop/Admin/Sell/Customer/index.html.twig", 78)->display($context);
        // line 79
        echo "          ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  265 => 79,  262 => 78,  258 => 77,  247 => 76,  202 => 112,  196 => 110,  192 => 109,  186 => 104,  184 => 103,  175 => 97,  162 => 86,  158 => 85,  152 => 81,  150 => 76,  145 => 73,  136 => 67,  130 => 63,  127 => 62,  123 => 61,  114 => 54,  112 => 53,  111 => 51,  105 => 47,  101 => 46,  95 => 42,  93 => 41,  89 => 39,  85 => 38,  81 => 85,  78 => 84,  76 => 61,  73 => 60,  71 => 46,  68 => 45,  65 => 38,  61 => 37,  56 => 35,  53 => 26,  51 => 25,  49 => 23,  47 => 22,  40 => 35,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Customer/index.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\PrestaShop\\Admin\\Sell\\Customer\\index.html.twig");
    }
}
