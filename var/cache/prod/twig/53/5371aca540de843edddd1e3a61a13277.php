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

/* @PrestaShop/Admin/Common/Grid/Blocks/bulk_actions.html.twig */
class __TwigTemplate_aec1bd245f12ab6496a454f2200248e9 extends Template
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
        $this->loadTemplate("@!PrestaShop/Admin/Common/Grid/Blocks/bulk_actions.html.twig", "@PrestaShop/Admin/Common/Grid/Blocks/bulk_actions.html.twig", 21)->display($context);
        // line 22
        if ((array_key_exists("ets_tc_list_views", $context) &&  !(null === ($context["ets_tc_list_views"] ?? null)))) {
            // line 23
            echo "  <div class=\"d-inline-block d-inline-block dropdown dropdown-clickable mr-2 ml-2\">
    <div id=\"form_view_selected2\">
      <label>View</label>
        <select name=\"id_view_selected2\" id=\"id_view_selected2\" >
            ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["ets_tc_list_views"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["view"]) {
                // line 28
                echo "                <option data-fields=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["view"], "fields", [], "any", false, false, false, 28), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["view"], "id_ets_tc_view", [], "any", false, false, false, 28), "html", null, true);
                echo "\"";
                if ((twig_get_attribute($this->env, $this->source, $context["view"], "id_ets_tc_view", [], "any", false, false, false, 28) == ($context["ets_tc_id_view_selected"] ?? null))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["view"], "name", [], "any", false, false, false, 28), "html", null, true);
                echo "</option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['view'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "        </select>
    </div>
  </div>
";
        }
        // line 34
        if (array_key_exists("link_customer_manager", $context)) {
            // line 35
            echo "    <div class=\"d-inline-block\">
        <a id=\"desc-customer-arrange2\" class=\"btn btn-default btn-outline-secondary ml-2\" href=\"";
            // line 36
            echo twig_escape_filter($this->env, ($context["link_customer_manager"] ?? null), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, ($context["ets_tc_custom_column_text"] ?? null), "html", null, true);
            echo " </a>
    </div>
";
        }
        // line 39
        if (array_key_exists("ets_expc_link_exportcustomer_manager", $context)) {
            // line 40
            echo "    <div class=\"d-inline-block\">
        <a id=\"desc-customer-export\" class=\"btn btn-default btn-outline-secondary ml-2\" href=\"";
            // line 41
            echo twig_escape_filter($this->env, ($context["ets_expc_link_exportcustomer_manager"] ?? null), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, ($context["ets_expc_custom_export_text"] ?? null), "html", null, true);
            echo " </a>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/bulk_actions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 41,  89 => 40,  87 => 39,  79 => 36,  76 => 35,  74 => 34,  68 => 30,  51 => 28,  47 => 27,  41 => 23,  39 => 22,  37 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/bulk_actions.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\PrestaShop\\Admin\\Common\\Grid\\Blocks\\bulk_actions.html.twig");
    }
}
