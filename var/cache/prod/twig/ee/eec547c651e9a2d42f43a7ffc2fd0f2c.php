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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/header.html.twig */
class __TwigTemplate_d164b2b096b78d0ec7d9d47f316818a2 extends Template
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
<div class=\"title-content\">
  <h1 class=\"d-inline\">
    <strong class=\"text-muted\" data-role=\"order-id\">#";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 28), "html", null, true);
        echo "</strong>
    <strong data-role=\"order-reference\">";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "reference", [], "any", false, false, false, 29), "html", null, true);
        echo "</strong>
  </h1>

  <p class=\"lead d-inline\">
    ";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("from", [], "Admin.Global"), "html", null, true);
        echo "

    ";
        // line 35
        if (( !(null === twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 35)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 35), "id", [], "any", false, false, false, 35) != 0))) {
            // line 36
            echo "      ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 36), "firstName", [], "any", false, false, false, 36), "html", null, true);
            echo "
      ";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 37), "lastName", [], "any", false, false, false, 37), "html", null, true);
            echo "
    ";
        } else {
            // line 39
            echo "      ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deleted customer", [], "Admin.Global"), "html", null, true);
            echo "
    ";
        }
        // line 41
        echo "  </p>

  <span class=\"badge rounded badge-dark ml-2 mr-2 font-size-100\">
    ";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 44), "totalAmountFormatted", [], "any", false, false, false, 44), "html", null, true);
        echo "
  </span>

  <p class=\"lead d-inline\">
    ";
        // line 48
        echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\LocalizationExtension']->dateFormatLite(twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "createdAt", [], "any", false, false, false, 48)), "html", null, true);
        echo "
    <span class=\"text-muted\">
      ";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("at", [], "Admin.Global"), "html", null, true);
        echo "

      ";
        // line 52
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "createdAt", [], "any", false, false, false, 52), "H:i:s"), "html", null, true);
        echo "
    </span>
  </p>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 52,  93 => 50,  88 => 48,  81 => 44,  76 => 41,  70 => 39,  65 => 37,  60 => 36,  58 => 35,  53 => 33,  46 => 29,  42 => 28,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/header.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\header.html.twig");
    }
}
