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

/* @PrestaShop/Admin/Module/Includes/grid_manage_empty.html.twig */
class __TwigTemplate_6b755b4a410fb405038f30b9e2e3cd6a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'catalog_category_empty' => [$this, 'block_catalog_category_empty'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('catalog_category_empty', $context, $blocks);
    }

    public function block_catalog_category_empty($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "  <div class=\"modules-list module-list-empty\" data-name=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "refMenu", [], "any", false, false, false, 27), "html", null, true);
        echo "\">
    <p>
      ";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You do not have module in « %categoryName% ».", ["%categoryName%" => twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "name", [], "any", false, false, false, 29)], "Admin.Modules.Feature"), "html", null, true);
        echo "<br/>
      ";
        // line 30
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayEmptyModuleCategoryExtraMessage", ["category_name" => twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "name", [], "any", false, false, false, 30)]);
        echo "
    </p>
  </div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Module/Includes/grid_manage_empty.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  58 => 30,  54 => 29,  48 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/grid_manage_empty.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Module\\Includes\\grid_manage_empty.html.twig");
    }
}
