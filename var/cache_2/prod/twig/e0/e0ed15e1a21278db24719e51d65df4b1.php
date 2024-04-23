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

/* @PrestaShop/Admin/Common/Grid/Actions/Grid/link.html.twig */
class __TwigTemplate_4252e617bba4b454dfe2cb6916dd2a7b extends Template
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
        // line 21
        echo "
";
        // line 22
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Common/Grid/Actions/Grid/link.html.twig", 22)->unwrap();
        // line 23
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 23), "route", [], "any", false, false, false, 23) == "admin_orders_viewtrash")) {
            // line 24
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, ($context["ets_odm_link_order_viewtrash"] ?? null), "html", null, true);
            echo "\" class=\"dropdown-item\">
      ";
            // line 25
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 25))) {
                // line 26
                echo "        <i class=\"material-icons\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 26), "html", null, true);
                echo "</i>
      ";
            }
            // line 28
            echo "      ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "name", [], "any", false, false, false, 28), "html", null, true);
            echo "
    </a>
    <a class=\"dropdown-item arrange_order_list\" href=\"";
            // line 30
            echo twig_escape_filter($this->env, ($context["ets_odm_link_order_arrange"] ?? null), "html", null, true);
            echo "\">
        <i class=\"material-icons\">storage</i>
        ";
            // line 32
            echo twig_escape_filter($this->env, ($context["Customize_order_list_text"] ?? null), "html", null, true);
            echo "
    </a>
    <a id=\"desc-order-export\" class=\"dropdown-item\" href=\"";
            // line 34
            echo twig_escape_filter($this->env, ($context["ets_odm_link_order_manager"] ?? null), "html", null, true);
            echo "\">
        <i class=\"icon-sign-out\"></i>
        ";
            // line 36
            echo twig_escape_filter($this->env, ($context["Export_orders_by_rule_text"] ?? null), "html", null, true);
            echo "
    </a>
";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 38
($context["action"] ?? null), "options", [], "any", false, false, false, 38), "route", [], "any", false, false, false, 38) == "admin_customers_storage")) {
            // line 39
            echo "    <a class=\"dropdown-item arrange_customer_list\" href=\"";
            echo twig_escape_filter($this->env, ($context["link_customer_manager"] ?? null), "html", null, true);
            echo "\">
        <i class=\"ets_svg lh_16 material-icons\">
            <svg width=\"16\" height=\"16\" viewBox=\"0 0 1792 1792\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M512 1248v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm640 512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm-640-1024v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm640 512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm640 512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm-640-1024v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm640 512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68z\"/></svg>
        </i>
        ";
            // line 43
            echo twig_escape_filter($this->env, ($context["ets_tc_custom_column_text"] ?? null), "html", null, true);
            echo "
    </a>
";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 45
($context["action"] ?? null), "options", [], "any", false, false, false, 45), "route", [], "any", false, false, false, 45) == "admin_custom_export_customers")) {
            // line 46
            echo "    <a class=\"dropdown-item arrange_export_customer_list\" href=\"";
            echo twig_escape_filter($this->env, ($context["ets_expc_link_exportcustomer_manager"] ?? null), "html", null, true);
            echo "\">
        <i class=\"material-icons\">cloud_download</i>
        ";
            // line 48
            echo twig_escape_filter($this->env, ($context["ets_expc_custom_export_text"] ?? null), "html", null, true);
            echo "
    </a>
";
        } else {
            // line 51
            echo "    ";
            $this->loadTemplate("@!PrestaShop/Admin/Common/Grid/Actions/Grid/link.html.twig", "@PrestaShop/Admin/Common/Grid/Actions/Grid/link.html.twig", 51)->display($context);
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Actions/Grid/link.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 51,  106 => 48,  100 => 46,  98 => 45,  93 => 43,  85 => 39,  83 => 38,  78 => 36,  73 => 34,  68 => 32,  63 => 30,  57 => 28,  51 => 26,  49 => 25,  44 => 24,  42 => 23,  40 => 22,  37 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Actions/Grid/link.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\PrestaShop\\Admin\\Common\\Grid\\Actions\\Grid\\link.html.twig");
    }
}
