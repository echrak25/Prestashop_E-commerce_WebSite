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

/* @Product/ProductPage/Blocks/tabs.html.twig */
class __TwigTemplate_4260a2cb5f3830d77fb6e90e6a883e23 extends Template
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
        echo "<div class=\"tabs js-tabs\">
  <div class=\"arrow d-xl-none js-arrow left-arrow float-left\">
    <i class=\"material-icons rtl-flip hide\">chevron_left</i>
  </div>

  <ul class=\"nav nav-tabs js-nav-tabs\" id=\"form-nav\" role=\"tablist\">
    <li id=\"tab_step1\" class=\"nav-item\"><a href=\"#step1\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link active\">";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Basic settings", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
    <li id=\"tab_step3\" class=\"nav-item\"><a href=\"#step3\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Quantities", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
    <li id=\"tab_step4\" class=\"nav-item\"><a href=\"#step4\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Shipping", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
    <li id=\"tab_step2\" class=\"nav-item\"><a href=\"#step2\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pricing", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
    <li id=\"tab_step5\" class=\"nav-item\"><a href=\"#step5\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("SEO", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
    <li id=\"tab_step6\" class=\"nav-item\"><a href=\"#step6\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Options", [], "Admin.Global"), "html", null, true);
        echo "</a></li>
    ";
        // line 37
        if ( !twig_test_empty($this->extensions['PrestaShopBundle\Twig\HookExtension']->hooksArrayContent(($context["hooks"] ?? null)))) {
            // line 38
            echo "      <li id=\"tab_hooks\" class=\"nav-item\"><a href=\"#hooks\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Modules", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</a></li>
    ";
        }
        // line 40
        echo "  </ul>
  <div class=\"arrow d-xl-none js-arrow right-arrow visible float-right\">
    <i class=\"material-icons rtl-flip hide\">chevron_right</i>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Blocks/tabs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 40,  71 => 38,  69 => 37,  65 => 36,  61 => 35,  57 => 34,  53 => 33,  49 => 32,  45 => 31,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Blocks/tabs.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Blocks\\tabs.html.twig");
    }
}
