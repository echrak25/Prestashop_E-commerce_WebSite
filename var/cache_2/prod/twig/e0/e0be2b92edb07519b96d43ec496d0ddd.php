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

/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/rtl_configuration.html.twig */
class __TwigTemplate_6762766d70917c5ba1a0860e486edb13 extends Template
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
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/rtl_configuration.html.twig", 26)->unwrap();
        // line 27
        echo "
";
        // line 28
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["adaptThemeToRtlLanguagesForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_adapt_to_rtl_languages")]);
        echo "
<div class=\"card\">
  <h3 class=\"card-header\">
    ";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Adaptation to Right-to-Left languages", [], "Admin.Design.Feature"), "html", null, true);
        echo "
  </h3>
  <div class=\"card-body\">
    <div class=\"form-wrapper\">
      <div class=\"alert alert-info\">
        <p class=\"alert-text\">
          ";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Be careful! Please check your theme in an RTL language before generating the RTL stylesheet: your theme could be already adapted to RTL.
Once you enable the \"%generate_rtl_label%\" option, any RTL-specific file that you might have added to your theme might be deleted by the created stylesheet.", ["%generate_rtl_label%" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Generate RTL stylesheet", [], "Admin.Design.Feature")], "Admin.Design.Help"), "html", null, true);
        echo "
        </p>
      </div>

      ";
        // line 41
        echo twig_call_macro($macros["ps"], "macro_form_group_row", [twig_get_attribute($this->env, $this->source, ($context["adaptThemeToRtlLanguagesForm"] ?? null), "theme_to_adapt", [], "any", false, false, false, 41), [], ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Theme to adapt", [], "Admin.Design.Feature")]], 41, $context, $this->getSourceContext());
        // line 43
        echo "

      ";
        // line 45
        echo twig_call_macro($macros["ps"], "macro_form_group_row", [twig_get_attribute($this->env, $this->source, ($context["adaptThemeToRtlLanguagesForm"] ?? null), "generate_rtl_css", [], "any", false, false, false, 45), [], ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Generate RTL stylesheet", [], "Admin.Design.Feature")]], 45, $context, $this->getSourceContext());
        // line 47
        echo "
    </div>
  </div>

  ";
        // line 51
        if ((($context["isMultiShopFeatureUsed"] ?? null) && ($context["isSingleShopContext"] ?? null))) {
            // line 52
            echo "    <hr>
    <div class=\"card-body\">
      <div class=\"form-wrapper\">
        ";
            // line 55
            echo twig_call_macro($macros["ps"], "macro_multistore_switch", [($context["shopLogosForm"] ?? null), ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Multistore", [], "Admin.Global")]], 55, $context, $this->getSourceContext());
            // line 57
            echo "
      </div>
    </div>
  ";
        }
        // line 61
        echo "  <div class=\"card-footer\">
    <div class=\"d-flex justify-content-end\">
      <button class=\"btn btn-primary\">
        ";
        // line 64
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
      </button>
    </div>
  </div>
</div>
";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["adaptThemeToRtlLanguagesForm"] ?? null), 'rest');
        echo "
";
        // line 70
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["adaptThemeToRtlLanguagesForm"] ?? null), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/rtl_configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 70,  110 => 69,  102 => 64,  97 => 61,  91 => 57,  89 => 55,  84 => 52,  82 => 51,  76 => 47,  74 => 45,  70 => 43,  68 => 41,  60 => 37,  51 => 31,  45 => 28,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/rtl_configuration.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\Theme\\Blocks\\rtl_configuration.html.twig");
    }
}
