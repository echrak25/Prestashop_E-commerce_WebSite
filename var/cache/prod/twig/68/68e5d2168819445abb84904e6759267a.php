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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/print_order_statistics.html.twig */
class __TwigTemplate_543156579f89cf8c425dae265d124b84 extends Template
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
        echo "<div class=\"card\">
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-sm\">
        <p>
          <strong>";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Date", [], "Admin.Global"), "html", null, true);
        echo "</strong>
        </p>
        <strong>";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\LocalizationExtension']->dateFormatFull(twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "createdAt", [], "any", false, false, false, 32)), "html", null, true);
        echo "</strong>
      </div>
      <div class=\"col-sm\">
        <p>
          <strong>";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Total", [], "Admin.Global"), "html", null, true);
        echo "</strong>
        </p>
        <p>
          <span class=\"badge rounded font-size-100\">
            ";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "prices", [], "any", false, false, false, 40), "totalAmountFormatted", [], "any", false, false, false, 40), "html", null, true);
        echo "
          </span>
        </p>
      </div>
      <div class=\"col-sm\">
        <p>
          <strong>
            ";
        // line 47
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Message", [], "Admin.Global"), "html", null, true);
        echo "
          </strong>
        </p>
        <strong>
          ";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "messages", [], "any", false, false, false, 51), "total", [], "any", false, false, false, 51), "html", null, true);
        echo "
        </strong>
      </div>
      <div class=\"col-sm\">
        <p>
          <strong>
            ";
        // line 57
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Products", [], "Admin.Global"), "html", null, true);
        echo "
          </strong>
        </p>
        <strong>
          ";
        // line 61
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "products", [], "any", false, false, false, 61), "products", [], "any", false, false, false, 61)), "html", null, true);
        echo "
        </strong>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/print_order_statistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 61,  89 => 57,  80 => 51,  73 => 47,  63 => 40,  56 => 36,  49 => 32,  44 => 30,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/print_order_statistics.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\print_order_statistics.html.twig");
    }
}
