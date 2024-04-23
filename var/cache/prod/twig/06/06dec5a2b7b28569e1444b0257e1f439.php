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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/extra_order_button_actions.html.twig */
class __TwigTemplate_f2eb8bf30eb453c561dc8e1dc44a82d4 extends Template
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
";
        // line 27
        if ((twig_get_attribute($this->env, $this->source, ($context["backOfficeOrderButtons"] ?? null), "isEmpty", [], "method", false, false, false, 27) != true)) {
            // line 28
            echo "
  ";
            // line 29
            $context["buttons"] = twig_get_attribute($this->env, $this->source, ($context["backOfficeOrderButtons"] ?? null), "toArray", [], "method", false, false, false, 29);
            // line 30
            echo "  ";
            if ((twig_length_filter($this->env, ($context["buttons"] ?? null)) > 2)) {
                // line 31
                echo "
    ";
                // line 32
                $context["firstButton"] = twig_first($this->env, ($context["buttons"] ?? null));
                // line 33
                echo "    <div class=\"d-inline-block ml-2\">
      <div class=\"input-group\">
        <a class=\"btn ";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["firstButton"] ?? null), "class", [], "any", false, false, false, 35), "html", null, true);
                echo "\"
        ";
                // line 36
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["firstButton"] ?? null), "properties", [], "any", false, false, false, 36));
                foreach ($context['_seq'] as $context["propertyName"] => $context["propertyContent"]) {
                    // line 37
                    echo "          ";
                    echo twig_escape_filter($this->env, $context["propertyName"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["propertyContent"], "html", null, true);
                    echo "\"
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['propertyName'], $context['propertyContent'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                echo "        >
        ";
                // line 40
                echo twig_get_attribute($this->env, $this->source, ($context["firstButton"] ?? null), "content", [], "any", false, false, false, 40);
                echo "
        </a>
      </div>
    </div>

    ";
                // line 46
                echo "    ";
                $context["buttons"] = twig_slice($this->env, ($context["buttons"] ?? null), 1, twig_length_filter($this->env, ($context["buttons"] ?? null)));
                // line 47
                echo "
    <div class=\"d-inline-block ml-2\">
      <div class=\"input-group\">
        <div class=\"dropdown\">
          <button class=\"btn btn-action dropdown-toggle\" type=\"button\" id=\"dropdownOrderActionBar\"
                  data-toggle=\"dropdown\"
                  aria-haspopup=\"true\" aria-expanded=\"false\">
            <i class=\"material-icons form-error-icon\">more_horiz</i>

            ";
                // line 56
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("More actions", [], "Admin.Global"), "html", null, true);
                echo "
          </button>

          <div class=\"dropdown-menu\" aria-labelledby=\"dropdownOrderActionBar\">
            ";
                // line 60
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["buttons"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["button"]) {
                    // line 61
                    echo "              <a class=\"dropdown-item btn ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "class", [], "any", false, false, false, 61), "html", null, true);
                    echo "\"
              ";
                    // line 62
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["button"], "properties", [], "any", false, false, false, 62));
                    foreach ($context['_seq'] as $context["propertyName"] => $context["propertyContent"]) {
                        // line 63
                        echo "                ";
                        echo twig_escape_filter($this->env, $context["propertyName"], "html", null, true);
                        echo "=\"";
                        echo twig_escape_filter($this->env, $context["propertyContent"], "html", null, true);
                        echo "\"
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['propertyName'], $context['propertyContent'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 64
                    echo ">
              ";
                    // line 65
                    echo twig_get_attribute($this->env, $this->source, $context["button"], "content", [], "any", false, false, false, 65);
                    echo "
              </a>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['button'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 68
                echo "          </div>
        </div>
      </div>
    </div>
  ";
            } else {
                // line 73
                echo "    ";
                // line 74
                echo "
    ";
                // line 75
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["buttons"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["button"]) {
                    // line 76
                    echo "      <div class=\"d-inline-block ml-2\">
        <div class=\"input-group\">
          <a class=\"btn ";
                    // line 78
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "class", [], "any", false, false, false, 78), "html", null, true);
                    echo "\"
          ";
                    // line 79
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["button"], "properties", [], "any", false, false, false, 79));
                    foreach ($context['_seq'] as $context["propertyName"] => $context["propertyContent"]) {
                        // line 80
                        echo "            ";
                        echo twig_escape_filter($this->env, $context["propertyName"], "html", null, true);
                        echo "=\"";
                        echo twig_escape_filter($this->env, $context["propertyContent"], "html", null, true);
                        echo "\"
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['propertyName'], $context['propertyContent'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 82
                    echo "          >
          ";
                    // line 83
                    echo twig_get_attribute($this->env, $this->source, $context["button"], "content", [], "any", false, false, false, 83);
                    echo "
          </a>
        </div>
      </div>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['button'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 88
                echo "  ";
            }
            // line 89
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/extra_order_button_actions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 89,  199 => 88,  188 => 83,  185 => 82,  174 => 80,  170 => 79,  166 => 78,  162 => 76,  158 => 75,  155 => 74,  153 => 73,  146 => 68,  137 => 65,  134 => 64,  123 => 63,  119 => 62,  114 => 61,  110 => 60,  103 => 56,  92 => 47,  89 => 46,  81 => 40,  78 => 39,  67 => 37,  63 => 36,  59 => 35,  55 => 33,  53 => 32,  50 => 31,  47 => 30,  45 => 29,  42 => 28,  40 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/extra_order_button_actions.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\extra_order_button_actions.html.twig");
    }
}
