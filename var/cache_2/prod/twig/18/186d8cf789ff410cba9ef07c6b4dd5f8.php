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

/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/layouts_configuration.html.twig */
class __TwigTemplate_b3dcffd846dd2ed8875ae73d50192286 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'layouts_configuration' => [$this, 'block_layouts_configuration'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('layouts_configuration', $context, $blocks);
    }

    public function block_layouts_configuration($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "  <div class=\"col-12 layout-configuration\">
    <div class=\"inner-content\">
      <div class=\"float-left\">
        <div class=\"d-inline-block layout-logo\">
          <img src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/pages/themes/icon_layouts.png"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configure your page layouts", [], "Admin.Design.Feature"), "html", null, true);
        echo "\">
        </div>
        <div class=\"d-inline-block\">
          <span class=\"title\">";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configure your page layouts", [], "Admin.Design.Feature"), "html", null, true);
        echo "</span>
          <p class=\"mb-0 description\">";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Each page can use a different layout, choose it among the layouts bundled in your theme.", [], "Admin.Design.Feature"), "html", null, true);
        echo "</p>
        </div>
      </div>
      <div class=\"float-right\">
        <a href=\"";
        // line 39
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_theme_customize_layouts");
        echo "\"
          class=\"btn btn-tertiary choose-layouts-button\"
        >
          ";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Choose layouts", [], "Admin.Design.Feature"), "html", null, true);
        echo "
        </a>

        ";
        // line 45
        if (($context["isDevModeOn"] ?? null)) {
            // line 46
            echo "          <button class=\"btn btn-tertiary-outline js-reset-theme-layouts-btn\"
            type=\"button\"
            data-submit-url=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_reset_layouts", ["themeName" => twig_get_attribute($this->env, $this->source, ($context["currentlyUsedTheme"] ?? null), "name", [], "any", false, false, false, 48)]), "html", null, true);
            echo "\"
            data-csrf-token=\"";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("reset-theme-layouts"), "html", null, true);
            echo "\"
          >
            <i class=\"material-icons\">settings_backup_restore</i>
            ";
            // line 52
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reset to defaults", [], "Admin.Design.Feature"), "html", null, true);
            echo "
          </button>
        ";
        }
        // line 55
        echo "      </div>
      <div class=\"clearfix\"></div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/layouts_configuration.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  107 => 55,  101 => 52,  95 => 49,  91 => 48,  87 => 46,  85 => 45,  79 => 42,  73 => 39,  66 => 35,  62 => 34,  54 => 31,  48 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/layouts_configuration.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\Theme\\Blocks\\layouts_configuration.html.twig");
    }
}
