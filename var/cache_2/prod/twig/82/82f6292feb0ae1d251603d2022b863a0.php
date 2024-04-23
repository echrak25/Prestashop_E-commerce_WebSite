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

/* @PrestaShop/Admin/Common/Grid/Actions/Row/link.html.twig */
class __TwigTemplate_05b513510590473dad8dd92cab8471df extends Template
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
        $context["class"] = "btn tooltip-link js-link-row-action";
        // line 23
        echo "
";
        // line 24
        if (twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "class", [], "any", true, true, false, 24)) {
            // line 25
            echo "  ";
            $context["class"] = ((($context["class"] ?? null) . " ") . twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "class", [], "any", false, false, false, 25));
        }
        // line 27
        echo "
  ";
        // line 28
        $context["route_params"] = [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 28), "route_param_name", [], "any", false, false, false, 28) => (($__internal_compile_0 = ($context["record"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 28), "route_param_field", [], "any", false, false, false, 28)] ?? null) : null)];
        // line 29
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, true, false, 29), "extra_route_params", [], "any", true, true, false, 29)) {
            // line 30
            echo "      ";
            $context["extra_route_params"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 30), "extra_route_params", [], "any", false, false, false, 30);
            // line 31
            echo "    
      ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extra_route_params"] ?? null));
            foreach ($context['_seq'] as $context["name"] => $context["field"]) {
                // line 33
                echo "        ";
                $context["route_params"] = twig_array_merge(($context["route_params"] ?? null), [$context["name"] => (((twig_get_attribute($this->env, $this->source, ($context["record"] ?? null), $context["field"], [], "array", true, true, false, 33) &&  !(null === (($__internal_compile_1 = ($context["record"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[$context["field"]] ?? null) : null)))) ? ((($__internal_compile_2 = ($context["record"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[$context["field"]] ?? null) : null)) : ($context["field"]))]);
                // line 34
                echo "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "  ";
        }
        // line 36
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 36), "route", [], "any", false, false, false, 36) == "admin_orders_edit")) {
            // line 37
            echo "    ";
            $context["url_link"] = "#";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 38
($context["action"] ?? null), "options", [], "any", false, false, false, 38), "route", [], "any", false, false, false, 38) == "admin_orders_delete")) {
            // line 39
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_delete"] ?? null) . "&id_order=") . twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "orderId", [], "any", false, false, false, 39));
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 40
($context["action"] ?? null), "options", [], "any", false, false, false, 40), "route", [], "any", false, false, false, 40) == "admin_orders_duplicate")) {
            // line 41
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_duplicate"] ?? null) . "&id_order=") . twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "orderId", [], "any", false, false, false, 41));
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 42
($context["action"] ?? null), "options", [], "any", false, false, false, 42), "route", [], "any", false, false, false, 42) == "admin_orders_restore")) {
            // line 43
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_restoreorder"] ?? null) . "&id_order=") . twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "orderId", [], "any", false, false, false, 43));
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 44
($context["action"] ?? null), "options", [], "any", false, false, false, 44), "route", [], "any", false, false, false, 44) == "admin_orders_print_label_delivery")) {
            // line 45
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_print_label_delivery"] ?? null) . "&id_order=") . twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "orderId", [], "any", false, false, false, 45));
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 46
($context["action"] ?? null), "options", [], "any", false, false, false, 46), "route", [], "any", false, false, false, 46) == "admin_orders_login_as_customer")) {
            // line 47
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_login_as_customer"] ?? null) . "&id_order=") . twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "orderId", [], "any", false, false, false, 47));
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 48
($context["action"] ?? null), "options", [], "any", false, false, false, 48), "route", [], "any", false, false, false, 48) == "admin_customers_login_as_customer")) {
            // line 49
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_login_as_customer"] ?? null) . "&id_customer=") . twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "customerId", [], "any", false, false, false, 49));
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 50
($context["action"] ?? null), "options", [], "any", false, false, false, 50), "route", [], "any", false, false, false, 50) == "admin_customers_activities")) {
            // line 51
            echo "    ";
            $context["url_link"] = ((($context["ets_tc_link_customer_session"] ?? null) . "&id_customer=") . twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "customerId", [], "any", false, false, false, 51));
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 52
($context["action"] ?? null), "options", [], "any", false, false, false, 52), "route", [], "any", false, false, false, 52) == "admin_customers_create_ticket_as_customer")) {
            // line 53
            echo "    ";
            $context["url_link"] = ((($context["ets_lc_link_customer_create_ticket"] ?? null) . "&id_customer=") . twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "customerId", [], "any", false, false, false, 53));
        } else {
            // line 55
            echo "    ";
            $context["url_link"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 55), "route", [], "any", false, false, false, 55), ($context["route_params"] ?? null));
        }
        // line 57
        if (((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 57), "route", [], "any", false, false, false, 57) != "admin_orders_print_label_delivery") || (twig_get_attribute($this->env, $this->source, ($context["module_ets_ordermanager"] ?? null), "checkOrderIsVirtual", [0 => twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "orderId", [], "any", false, false, false, 57)], "method", false, false, false, 57) != true)) && ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 57), "route", [], "any", false, false, false, 57) != "admin_orders_login_as_customer") || (twig_get_attribute($this->env, $this->source, ($context["module_ets_ordermanager"] ?? null), "checkOrderIsCustomer", [0 => twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "orderId", [], "any", false, false, false, 57), 1 => 0], "method", false, false, false, 57) == true))) && ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 57), "route", [], "any", false, false, false, 57) != "admin_customers_login_as_customer") || (twig_get_attribute($this->env, $this->source, ($context["module_ets_ordermanager"] ?? null), "checkOrderIsCustomer", [0 => 0, 1 => twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "customerId", [], "any", false, false, false, 57)], "method", false, false, false, 57) == true)))) {
            // line 58
            echo "    <a";
            if ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 58), "route", [], "any", false, false, false, 58) == "admin_orders_login_as_customer") || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 58), "route", [], "any", false, false, false, 58) == "admin_customers_login_as_customer")) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 58), "route", [], "any", false, false, false, 58) == "admin_customers_activities"))) {
                echo " target=\"_blank\"";
            }
            echo " class=\"";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 58), "route", [], "any", false, false, false, 58) == "admin_orders_edit")) {
                echo " edit edit_order_inline";
            }
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 58), "route", [], "any", false, false, false, 58) == "admin_orders_duplicate")) {
                echo " duplicate_order_list";
            }
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 58), "route", [], "any", false, false, false, 58) == "admin_customers_create_ticket_as_customer")) {
                echo " ets_lc_create_ticket";
            }
            echo "\"
       href=\"";
            // line 59
            echo twig_escape_filter($this->env, ($context["url_link"] ?? null), "html", null, true);
            echo "\"
       data-confirm-message=\"";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 60), "confirm_message", [], "any", false, false, false, 60), "html", null, true);
            echo "\"
      ";
            // line 61
            if (twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "tooltip_name", [], "any", false, false, false, 61)) {
                // line 62
                echo "        data-toggle=\"pstooltip\"
        data-placement=\"top\"
        data-original-title=\"";
                // line 64
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "name", [], "any", false, false, false, 64), "html", null, true);
                echo "\"
      ";
            }
            // line 66
            echo "      data-clickable-row=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, true, false, 66), "clickable_row", [], "any", true, true, false, 66)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, true, false, 66), "clickable_row", [], "any", false, false, false, 66), false)) : (false)), "html", null, true);
            echo "\"
      ";
            // line 67
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "options", [], "any", false, false, false, 67), "route", [], "any", false, false, false, 67) == "admin_customers_create_ticket_as_customer")) {
                echo " data-id_customer=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["route_params"] ?? null), "customerId", [], "any", false, false, false, 67), "html", null, true);
                echo "\"";
            }
            // line 68
            echo "    >
      ";
            // line 69
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 69))) {
                // line 70
                echo "          ";
                if ((twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 70) == "fa fa-truck")) {
                    // line 71
                    echo "              <svg width=\"14\" height=\"14\" viewBox=\"0 0 1792 1792\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M640 1408q0-52-38-90t-90-38-90 38-38 90 38 90 90 38 90-38 38-90zm-384-512h384v-256h-158q-13 0-22 9l-195 195q-9 9-9 22v30zm1280 512q0-52-38-90t-90-38-90 38-38 90 38 90 90 38 90-38 38-90zm256-1088v1024q0 15-4 26.5t-13.5 18.5-16.5 11.5-23.5 6-22.5 2-25.5 0-22.5-.5q0 106-75 181t-181 75-181-75-75-181h-384q0 106-75 181t-181 75-181-75-75-181h-64q-3 0-22.5.5t-25.5 0-22.5-2-23.5-6-16.5-11.5-13.5-18.5-4-26.5q0-26 19-45t45-19v-320q0-8-.5-35t0-38 2.5-34.5 6.5-37 14-30.5 22.5-30l198-198q19-19 50.5-32t58.5-13h160v-192q0-26 19-45t45-19h1024q26 0 45 19t19 45z\"/></svg>
          ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 72
($context["action"] ?? null), "icon", [], "any", false, false, false, 72) == "fa fa-user")) {
                    // line 73
                    echo "              <svg width=\"14\" height=\"14\" viewBox=\"0 0 1792 1792\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M1536 1399q0 109-62.5 187t-150.5 78h-854q-88 0-150.5-78t-62.5-187q0-85 8.5-160.5t31.5-152 58.5-131 94-89 134.5-34.5q131 128 313 128t313-128q76 0 134.5 34.5t94 89 58.5 131 31.5 152 8.5 160.5zm-256-887q0 159-112.5 271.5t-271.5 112.5-271.5-112.5-112.5-271.5 112.5-271.5 271.5-112.5 271.5 112.5 112.5 271.5z\"/></svg>
          ";
                } else {
                    // line 75
                    echo "              <i class=\"fa ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 75), "html", null, true);
                    echo "\"></i>
          ";
                }
                // line 77
                echo "      ";
            }
            // line 78
            echo "
      ";
            // line 79
            if ( !twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "tooltip_name", [], "any", false, false, false, 79)) {
                // line 80
                echo "        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "name", [], "any", false, false, false, 80), "html", null, true);
                echo "
      ";
            }
            // line 82
            echo "    </a>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Actions/Row/link.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 82,  212 => 80,  210 => 79,  207 => 78,  204 => 77,  198 => 75,  194 => 73,  192 => 72,  189 => 71,  186 => 70,  184 => 69,  181 => 68,  175 => 67,  170 => 66,  165 => 64,  161 => 62,  159 => 61,  155 => 60,  151 => 59,  133 => 58,  131 => 57,  127 => 55,  123 => 53,  121 => 52,  118 => 51,  116 => 50,  113 => 49,  111 => 48,  108 => 47,  106 => 46,  103 => 45,  101 => 44,  98 => 43,  96 => 42,  93 => 41,  91 => 40,  88 => 39,  86 => 38,  83 => 37,  81 => 36,  78 => 35,  72 => 34,  69 => 33,  65 => 32,  62 => 31,  59 => 30,  56 => 29,  54 => 28,  51 => 27,  47 => 25,  45 => 24,  42 => 23,  40 => 22,  37 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Actions/Row/link.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\PrestaShop\\Admin\\Common\\Grid\\Actions\\Row\\link.html.twig");
    }
}
