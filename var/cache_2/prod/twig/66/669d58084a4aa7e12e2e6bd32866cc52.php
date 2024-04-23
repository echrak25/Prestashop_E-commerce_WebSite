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

/* @Product/ProductPage/Forms/form_related_products.html.twig */
class __TwigTemplate_c88e8a5301c7a50ae4f8032e1f4f32c9 extends Template
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
        echo "<div id=\"related-title\">
  <h2>";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Related product", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
</div>

<div id=\"related-content\" class=\"row ";
        // line 29
        echo (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 29), "value", [], "any", false, false, false, 29), "data", [], "any", false, false, false, 29)) == 0)) ? ("hide") : (""));
        echo "\">
  <div class=\"col-xl-8 col-lg-11\">
    <fieldset class=\"form-group\">
        ";
        // line 32
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
    </fieldset>
  </div>
  <div class=\"col-md-1\">
      <fieldset class=\"form-group\">
        <a class=\"btn tooltip-link delete pl-0 pr-0\" id=\"reset_related_product\"><i class=\"material-icons\">delete</i></a>
      </fieldset>
  </div>
</div>

<button type=\"button\" class=\"btn btn-outline-primary sensitive open ";
        // line 42
        echo (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 42), "value", [], "any", false, false, false, 42), "data", [], "any", false, false, false, 42)) > 0)) ? ("hide") : (""));
        echo "\" id=\"add-related-product-button\">
  <i class=\"material-icons\">add_circle</i> ";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add a related product", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
</button>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_related_products.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 43,  65 => 42,  52 => 32,  46 => 29,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_related_products.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_related_products.html.twig");
    }
}
