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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/sources.html.twig */
class __TwigTemplate_b988c97e2bff55c1eed8c3ae901d541f extends Template
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
        // line 26
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "sources", [], "any", false, false, false, 26), "sources", [], "any", false, false, false, 26))) {
            // line 27
            echo "    <div class=\"card mt-2 d-print-none\">
      <div class=\"card-header\">
        <div class=\"row\">
          <div class=\"col-md-6\">
            <i class=\"material-icons\">public</i>
            ";
            // line 32
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sources", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
            <span class=\"badge badge-primary rounded\">";
            // line 33
            echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "sources", [], "any", false, false, false, 33), "sources", [], "any", false, false, false, 33)), "html", null, true);
            echo "</span>
          </div>

          <ul id=\"order-sources-list\">
            ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "sources", [], "any", false, false, false, 37), "sources", [], "any", false, false, false, 37));
            foreach ($context['_seq'] as $context["_key"] => $context["source"]) {
                // line 38
                echo "              <li>
                ";
                // line 39
                echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\LocalizationExtension']->dateFormatFull(twig_get_attribute($this->env, $this->source, $context["source"], "addedAt", [], "any", false, false, false, 39)), "html", null, true);
                echo "
                <br/>
                <b>";
                // line 41
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("From", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "</b>
                ";
                // line 42
                if ((twig_get_attribute($this->env, $this->source, $context["source"], "httpReferer", [], "any", false, false, false, 42) != "")) {
                    // line 43
                    echo "                  <a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["source"], "httpReferer", [], "any", false, false, false, 43), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["source"], "httpReferer", [], "any", false, false, false, 43), "html", null, true);
                    echo "</a>
                ";
                } else {
                    // line 45
                    echo "                  -
                ";
                }
                // line 47
                echo "                <br/>
                <b>";
                // line 48
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("To", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "</b>
                <a href=\"http://";
                // line 49
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["source"], "requestUri", [], "any", false, false, false, 49), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["source"], "requestUri", [], "any", false, false, false, 49), 0, 100), "html", null, true);
                echo "</a>
                <br/>
                ";
                // line 51
                if ((twig_get_attribute($this->env, $this->source, $context["source"], "keywords", [], "any", false, false, false, 51) != "")) {
                    // line 52
                    echo "                  <b>";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Keywords", [], "Admin.Global"), "html", null, true);
                    echo "</b>
                  <br/>
                  ";
                    // line 54
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["source"], "keywords", [], "any", false, false, false, 54), "html", null, true);
                    echo "
                ";
                }
                // line 56
                echo "                <br/>
              </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['source'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "          </ul>
        </div>
      </div>
    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/sources.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 59,  117 => 56,  112 => 54,  106 => 52,  104 => 51,  97 => 49,  93 => 48,  90 => 47,  86 => 45,  78 => 43,  76 => 42,  72 => 41,  67 => 39,  64 => 38,  60 => 37,  53 => 33,  49 => 32,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/sources.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\sources.html.twig");
    }
}
