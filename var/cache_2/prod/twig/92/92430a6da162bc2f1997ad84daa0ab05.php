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

/* @PrestaShop/Admin/Helpers/dropdown_menu.html.twig */
class __TwigTemplate_33352ee630317dba284a48c0b5163c47 extends Template
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
        $context["buttonType"] = ((array_key_exists("buttonType", $context)) ? (_twig_default_filter(($context["buttonType"] ?? null), "primary")) : ("primary"));
        // line 26
        $context["right"] = ((array_key_exists("right", $context)) ? (_twig_default_filter(($context["right"] ?? null), false)) : (false));
        // line 27
        echo "
<div class=\"";
        // line 28
        echo twig_escape_filter($this->env, ((array_key_exists("div_style", $context)) ? (_twig_default_filter(($context["div_style"] ?? null), "btn-group dropdown")) : ("btn-group dropdown")), "html", null, true);
        echo "\">

  ";
        // line 30
        if (array_key_exists("default_item", $context)) {
            // line 31
            echo "    <a
      href=\"";
            // line 32
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "href", [], "any", true, true, false, 32)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "href", [], "any", false, false, false, 32), "#")) : ("#")), "html", null, true);
            echo "\"
      title=\"";
            // line 33
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "title", [], "any", true, true, false, 33)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "title", [], "any", false, false, false, 33), ((twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "label", [], "any", true, true, false, 33)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "label", [], "any", false, false, false, 33), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "label", [], "any", true, true, false, 33)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "label", [], "any", false, false, false, 33), "")) : ("")))), "html", null, true);
            echo "\"
      class=\"btn btn-";
            // line 34
            echo twig_escape_filter($this->env, ($context["buttonType"] ?? null), "html", null, true);
            echo "\"
      ";
            // line 35
            if ((array_key_exists("disabled", $context) && (($context["disabled"] ?? null) == true))) {
                echo "disabled=\"disabled\"";
            }
            // line 36
            echo "    >
      ";
            // line 37
            if (twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "icon", [], "any", false, false, false, 37)) {
                // line 38
                echo "        <i class=\"material-icons\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "icon", [], "any", false, false, false, 38), "html", null, true);
                echo "</i>
      ";
            }
            // line 40
            echo "      ";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "label", [], "any", true, true, false, 40)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["default_item"] ?? null), "label", [], "any", false, false, false, 40), "")) : ("")), "html", null, true);
            echo "
    </a>
  ";
        }
        // line 43
        echo "
  <button
    ";
        // line 45
        if (($context["button_id"] ?? null)) {
            echo "id=\"";
            echo twig_escape_filter($this->env, ($context["button_id"] ?? null), "html", null, true);
            echo "\"";
        }
        // line 46
        echo "    class=\"btn btn-";
        echo twig_escape_filter($this->env, ($context["buttonType"] ?? null), "html", null, true);
        echo " dropdown-toggle\"
    ";
        // line 47
        if ((array_key_exists("disabled", $context) && (($context["disabled"] ?? null) == true))) {
            echo "disabled=\"disabled\"";
        }
        // line 48
        echo "    data-toggle=\"dropdown\"
  >
    ";
        // line 50
        echo twig_escape_filter($this->env, ((array_key_exists("menu_label", $context)) ? (_twig_default_filter(($context["menu_label"] ?? null), "")) : ("")), "html", null, true);
        echo "
    <i class=\"";
        // line 51
        echo twig_escape_filter($this->env, ((array_key_exists("menu_icon", $context)) ? (_twig_default_filter(($context["menu_icon"] ?? null), "icon-caret-down")) : ("icon-caret-down")), "html", null, true);
        echo "\"></i>
  </button>

  <div class=\"dropdown-menu";
        // line 54
        if (($context["right"] ?? null)) {
            echo " dropdown-menu-right";
        }
        echo "\">
    ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 56
            echo "      ";
            if ((twig_get_attribute($this->env, $this->source, $context["entry"], "divider", [], "any", true, true, false, 56) && (twig_get_attribute($this->env, $this->source, $context["entry"], "divider", [], "any", false, false, false, 56) == true))) {
                // line 57
                echo "        <div class=\"dropdown-divider\"></div>
      ";
            } else {
                // line 59
                echo "        <a
          class=\"dropdown-item\" href=\"";
                // line 60
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["entry"], "href", [], "any", true, true, false, 60)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["entry"], "href", [], "any", false, false, false, 60), "#")) : ("#")), "html", null, true);
                echo "\"
          ";
                // line 61
                if (twig_get_attribute($this->env, $this->source, $context["entry"], "onclick", [], "any", true, true, false, 61)) {
                    echo "onclick=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "onclick", [], "any", false, false, false, 61), "html", null, true);
                    echo "\"";
                }
                // line 62
                echo "          ";
                if (twig_get_attribute($this->env, $this->source, $context["entry"], "target", [], "any", true, true, false, 62)) {
                    echo "target=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "target", [], "any", false, false, false, 62), "html", null, true);
                    echo "\"";
                }
                // line 63
                echo "        >
          ";
                // line 64
                if (twig_get_attribute($this->env, $this->source, $context["entry"], "icon", [], "any", false, false, false, 64)) {
                    // line 65
                    echo "            <i class=\"material-icons\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "icon", [], "any", false, false, false, 65), "html", null, true);
                    echo "</i>
          ";
                }
                // line 67
                echo "          ";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["entry"], "label", [], "any", true, true, false, 67)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["entry"], "label", [], "any", false, false, false, 67), "")) : ("")), "html", null, true);
                echo "
        </a>
      ";
            }
            // line 70
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Helpers/dropdown_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 71,  176 => 70,  169 => 67,  163 => 65,  161 => 64,  158 => 63,  151 => 62,  145 => 61,  141 => 60,  138 => 59,  134 => 57,  131 => 56,  127 => 55,  121 => 54,  115 => 51,  111 => 50,  107 => 48,  103 => 47,  98 => 46,  92 => 45,  88 => 43,  81 => 40,  75 => 38,  73 => 37,  70 => 36,  66 => 35,  62 => 34,  58 => 33,  54 => 32,  51 => 31,  49 => 30,  44 => 28,  41 => 27,  39 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Helpers/dropdown_menu.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Helpers\\dropdown_menu.html.twig");
    }
}
