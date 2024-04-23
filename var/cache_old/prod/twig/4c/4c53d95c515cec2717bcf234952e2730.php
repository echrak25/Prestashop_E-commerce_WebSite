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

/* @Modules/ps_mbo/views/templates/hook/twig/module_manager_empty_category.html.twig */
class __TwigTemplate_8c39a46603ad20de43f65a489806c4c6 extends Template
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
        // line 19
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Discover the best-selling modules of this category in the %link% page.", ["%link%" => (((("<a href=\"" . ($context["categoryLink"] ?? null)) . "\">") . ($context["categoryName"] ?? null)) . "</a>")], "Modules.Mbo.Modulescatalog");
    }

    public function getTemplateName()
    {
        return "@Modules/ps_mbo/views/templates/hook/twig/module_manager_empty_category.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_mbo/views/templates/hook/twig/module_manager_empty_category.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ps_mbo\\views\\templates\\hook\\twig\\module_manager_empty_category.html.twig");
    }
}
