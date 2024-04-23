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

/* @Twig/form_max_length.html.twig */
class __TwigTemplate_a3f19e556f4284961b454dc8eba51dbe extends Template
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
        if (twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "counter", [], "any", true, true, false, 25)) {
            // line 26
            echo "  ";
            $context["isRecommandedType"] = (twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "counter_type", [], "any", true, true, false, 26) && (twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "counter_type", [], "any", false, false, false, 26) == "recommended"));
            // line 27
            echo "  <small class=\"form-text text-muted text-right maxLength ";
            echo (( !($context["isRecommandedType"] ?? null)) ? ("maxType") : (""));
            echo "\">
      <em>
        ";
            // line 29
            if (($context["isRecommandedType"] ?? null)) {
                // line 30
                echo "          ";
                echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("[1][/1] of [2][/2] characters used (recommended)", [], "Admin.Catalog.Feature"), ["[1]" => "<span class=\"currentLength\">", "[/1]" => "</span>", "[2]" => ("<span class=\"currentTotalMax\">" . twig_get_attribute($this->env, $this->source,                 // line 33
($context["attr"] ?? null), "counter", [], "any", false, false, false, 33)), "[/2]" => "</span>"]);
                // line 35
                echo "
        ";
            } else {
                // line 37
                echo "          ";
                echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("[1][/1] of [2][/2] characters allowed", [], "Admin.Catalog.Feature"), ["[1]" => "<span class=\"currentLength\">", "[/1]" => "</span>", "[2]" => ("<span class=\"currentTotalMax\">" . twig_get_attribute($this->env, $this->source,                 // line 40
($context["attr"] ?? null), "counter", [], "any", false, false, false, 40)), "[/2]" => "</span>"]);
                // line 42
                echo "
        ";
            }
            // line 44
            echo "      </em>
  </small>
";
        }
    }

    public function getTemplateName()
    {
        return "@Twig/form_max_length.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 44,  62 => 42,  60 => 40,  58 => 37,  54 => 35,  52 => 33,  50 => 30,  48 => 29,  42 => 27,  39 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Twig/form_max_length.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\TwigTemplateForm\\form_max_length.html.twig");
    }
}
