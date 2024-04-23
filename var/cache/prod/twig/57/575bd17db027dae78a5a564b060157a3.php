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

/* @Product/CatalogPage/Forms/form_edit_dropdown.html.twig */
class __TwigTemplate_e7236d2fde8318d19c19f6b3e6fe0115 extends Template
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
        echo twig_escape_filter($this->env, ((array_key_exists("div_style", $context)) ? (_twig_default_filter(($context["div_style"] ?? null), "btn-group")) : ("btn-group")), "html", null, true);
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
      class=\"btn tooltip-link product-edit\"
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
  <button class=\"btn btn-link dropdown-toggle dropdown-toggle-split product-edit no-rotate\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
    ";
        // line 45
        echo twig_escape_filter($this->env, ((array_key_exists("menu_label", $context)) ? (_twig_default_filter(($context["menu_label"] ?? null), "")) : ("")), "html", null, true);
        echo "
  </button>

  <div class=\"dropdown-menu";
        // line 48
        if (($context["right"] ?? null)) {
            echo " dropdown-menu-right";
        }
        echo "\" x-placement=\"bottom-start\" >
    ";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 50
            echo "      ";
            if ((twig_get_attribute($this->env, $this->source, $context["entry"], "divider", [], "any", true, true, false, 50) && (twig_get_attribute($this->env, $this->source, $context["entry"], "divider", [], "any", false, false, false, 50) == true))) {
                // line 51
                echo "        <div class=\"dropdown-divider\"></div>
      ";
            } else {
                // line 53
                echo "        <a
          class=\"dropdown-item product-edit\" href=\"";
                // line 54
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["entry"], "href", [], "any", true, true, false, 54)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["entry"], "href", [], "any", false, false, false, 54), "#")) : ("#")), "html", null, true);
                echo "\"
          ";
                // line 55
                if (twig_get_attribute($this->env, $this->source, $context["entry"], "onclick", [], "any", true, true, false, 55)) {
                    echo "onclick=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "onclick", [], "any", false, false, false, 55), "html", null, true);
                    echo "\"";
                }
                // line 56
                echo "          ";
                if (twig_get_attribute($this->env, $this->source, $context["entry"], "target", [], "any", true, true, false, 56)) {
                    echo "target=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "target", [], "any", false, false, false, 56), "html", null, true);
                    echo "\"";
                }
                // line 57
                echo "        >
          ";
                // line 58
                if (twig_get_attribute($this->env, $this->source, $context["entry"], "icon", [], "any", false, false, false, 58)) {
                    // line 59
                    echo "            <i class=\"material-icons\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "icon", [], "any", false, false, false, 59), "html", null, true);
                    echo "</i>
          ";
                }
                // line 61
                echo "          ";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["entry"], "label", [], "any", true, true, false, 61)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["entry"], "label", [], "any", false, false, false, 61), "")) : ("")), "html", null, true);
                echo "
        </a>
      ";
            }
            // line 64
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/CatalogPage/Forms/form_edit_dropdown.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 65,  150 => 64,  143 => 61,  137 => 59,  135 => 58,  132 => 57,  125 => 56,  119 => 55,  115 => 54,  112 => 53,  108 => 51,  105 => 50,  101 => 49,  95 => 48,  89 => 45,  85 => 43,  78 => 40,  72 => 38,  70 => 37,  67 => 36,  63 => 35,  58 => 33,  54 => 32,  51 => 31,  49 => 30,  44 => 28,  41 => 27,  39 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/CatalogPage/Forms/form_edit_dropdown.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\Forms\\form_edit_dropdown.html.twig");
    }
}
