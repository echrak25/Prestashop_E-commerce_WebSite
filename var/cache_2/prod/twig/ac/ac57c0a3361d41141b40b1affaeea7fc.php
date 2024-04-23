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

/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig */
class __TwigTemplate_bd3d6acf9fed4c294550c7f8786ccae5 extends Template
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
<div class=\"card-group\">
  ";
        // line 27
        $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", 27, "295166993")->display($context);
        // line 49
        echo "
  ";
        // line 50
        $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", 50, "892680667")->display($context);
        // line 123
        echo "
  ";
        // line 124
        $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", 124, "714597710")->display($context);
        // line 154
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 154,  51 => 124,  48 => 123,  46 => 50,  43 => 49,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\Theme\\Blocks\\logo_configuration.html.twig");
    }
}


/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig */
class __TwigTemplate_bd3d6acf9fed4c294550c7f8786ccae5___295166993 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'card_title' => [$this, 'block_card_title'],
            'card_content' => [$this, 'block_card_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 27
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", 28)->unwrap();
        // line 27
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", 27);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 29
    public function block_card_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo "      ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["shopLogosForm"] ?? null), "header_logo_is_restricted_to_shop", [], "any", false, false, false, 30), 'widget');
        echo " ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Header logo", [], "Admin.Design.Feature"), "html", null, true);
        echo "
    ";
    }

    // line 32
    public function block_card_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "      <p class=\"logo-card-description\">
        ";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Will appear on your main page. Recommended size for the default theme: height %height% and width %width%.", ["%height%" => "40px", "%width%" => "200px"], "Admin.Design.Help"), "html", null, true);
        echo "
      </p>

      <div class=\"text-center logo-image-container\">
        <img
          class=\"header-logo\"
          src=\"";
        // line 40
        echo twig_escape_filter($this->env, ($context["headerLogoPath"] ?? null), "html", null, true);
        echo "\"
          alt=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Header logo", [], "Admin.Design.Feature"), "html", null, true);
        echo "\"
          title=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Header logo", [], "Admin.Design.Feature"), "html", null, true);
        echo "\"
        >
      </div>

      ";
        // line 46
        echo twig_call_macro($macros["ps"], "macro_form_group_row", [twig_get_attribute($this->env, $this->source, ($context["shopLogosForm"] ?? null), "header_logo", [], "any", false, false, false, 46)], 46, $context, $this->getSourceContext());
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 46,  151 => 42,  147 => 41,  143 => 40,  134 => 34,  131 => 33,  127 => 32,  118 => 30,  114 => 29,  109 => 27,  107 => 28,  100 => 27,  53 => 154,  51 => 124,  48 => 123,  46 => 50,  43 => 49,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\Theme\\Blocks\\logo_configuration.html.twig");
    }
}


/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig */
class __TwigTemplate_bd3d6acf9fed4c294550c7f8786ccae5___892680667 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'card_title' => [$this, 'block_card_title'],
            'card_content' => [$this, 'block_card_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 50
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 51
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", 51)->unwrap();
        // line 50
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", 50);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 52
    public function block_card_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 53
        echo "      <ul class=\"nav nav-pills\" role=\"tablist\">
        <li class=\"nav-item\">
          ";
        // line 55
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["shopLogosForm"] ?? null), "mail_logo_is_restricted_to_shop", [], "any", false, false, false, 55), 'widget');
        echo "
          <a class=\"nav-link active show d-inline-block\"
             id=\"mail-tab\"
             data-toggle=\"tab\"
             href=\"#email-configuration\"
             role=\"tab\"
             aria-controls=\"home\"
             aria-expanded=\"true\"
             aria-selected=\"true\"
          >
            ";
        // line 65
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mail logo", [], "Admin.Design.Feature"), "html", null, true);
        echo "
          </a>
        </li>
        <li class=\"nav-item\">
          ";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["shopLogosForm"] ?? null), "invoice_logo_is_restricted_to_shop", [], "any", false, false, false, 69), 'widget');
        echo "
          <a class=\"nav-link d-inline-block\"
             id=\"invoice-tab\"
             data-toggle=\"tab\"
             href=\"#invoice-configuration\"
             role=\"tab\"
             aria-controls=\"home\"
             aria-expanded=\"true\"
             aria-selected=\"true\"
          >
             ";
        // line 79
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice logo", [], "Admin.Design.Feature"), "html", null, true);
        echo "
          </a>
        </li>
      </ul>
    ";
    }

    // line 84
    public function block_card_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 85
        echo "      <div class=\"tab-content\">
        <div class=\"tab-pane active show\" id=\"email-configuration\" role=\"tabpanel\" aria-labelledby=\"logo-tab\">
          <p class=\"logo-card-description description-in-tab\">
            ";
        // line 88
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Will appear on email headers. If undefined, the header logo will be used.", [], "Admin.Design.Help"), "html", null, true);
        echo "
          </p>

          <div class=\"text-center logo-image-container\">
            <img
              class=\"email-logo\"
              src=\"";
        // line 94
        echo twig_escape_filter($this->env, ($context["mailLogoPath"] ?? null), "html", null, true);
        echo "\"
              alt=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mail logo", [], "Admin.Design.Feature"), "html", null, true);
        echo "\"
              title=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mail logo", [], "Admin.Design.Feature"), "html", null, true);
        echo "\"
            >
          </div>
          <div class=\"input-in-tab\">
            ";
        // line 100
        echo twig_call_macro($macros["ps"], "macro_form_group_row", [twig_get_attribute($this->env, $this->source, ($context["shopLogosForm"] ?? null), "mail_logo", [], "any", false, false, false, 100), [], ["help" => (((($context["headerLogoPath"] ?? null) == ($context["mailLogoPath"] ?? null))) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Warning: if no email logo is available, the main logo will be used instead.", [], "Admin.Design.Notification")) : (""))]], 100, $context, $this->getSourceContext());
        echo "
          </div>
        </div>
        <div class=\"tab-pane\" id=\"invoice-configuration\" role=\"tabpanel\" aria-labelledby=\"logo-tab\">
          <p class=\"logo-card-description description-in-tab\">
            ";
        // line 105
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Will appear on invoice headers.", [], "Admin.Design.Help"), "html", null, true);
        echo "
          </p>

          <div class=\"text-center logo-image-container\">
            <img
              class=\"invoice-logo\"
              src=\"";
        // line 111
        echo twig_escape_filter($this->env, ($context["invoiceLogoPath"] ?? null), "html", null, true);
        echo "\"
              alt=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice logo", [], "Admin.Design.Feature"), "html", null, true);
        echo "\"
              title=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice logo", [], "Admin.Design.Feature"), "html", null, true);
        echo "\"
            >
          </div>
          <div class=\"input-in-tab\">
            ";
        // line 117
        echo twig_call_macro($macros["ps"], "macro_form_group_row", [twig_get_attribute($this->env, $this->source, ($context["shopLogosForm"] ?? null), "invoice_logo", [], "any", false, false, false, 117), [], ["help" => (((($context["headerLogoPath"] ?? null) == ($context["invoiceLogoPath"] ?? null))) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Warning: if no invoice logo is available, the main logo will be used instead.", [], "Admin.Design.Help")) : (""))]], 117, $context, $this->getSourceContext());
        echo "
          </div>
        </div>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  335 => 117,  328 => 113,  324 => 112,  320 => 111,  311 => 105,  303 => 100,  296 => 96,  292 => 95,  288 => 94,  279 => 88,  274 => 85,  270 => 84,  261 => 79,  248 => 69,  241 => 65,  228 => 55,  224 => 53,  220 => 52,  215 => 50,  213 => 51,  206 => 50,  158 => 46,  151 => 42,  147 => 41,  143 => 40,  134 => 34,  131 => 33,  127 => 32,  118 => 30,  114 => 29,  109 => 27,  107 => 28,  100 => 27,  53 => 154,  51 => 124,  48 => 123,  46 => 50,  43 => 49,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\Theme\\Blocks\\logo_configuration.html.twig");
    }
}


/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig */
class __TwigTemplate_bd3d6acf9fed4c294550c7f8786ccae5___714597710 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'card_title' => [$this, 'block_card_title'],
            'card_content' => [$this, 'block_card_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 124
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 125
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", 125)->unwrap();
        // line 124
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", 124);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 126
    public function block_card_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 127
        echo "      ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["shopLogosForm"] ?? null), "favicon_is_restricted_to_shop", [], "any", false, false, false, 127), 'widget');
        echo " ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Favicon", [], "Admin.Design.Feature"), "html", null, true);
        echo "
    ";
    }

    // line 129
    public function block_card_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 130
        echo "      <p class=\"logo-card-description\">
        ";
        // line 131
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("It is the small icon that appears in browser tabs, next to the title.", [], "Admin.Design.Help"), "html", null, true);
        echo "
      </p>

      <div class=\"text-center logo-image-container\">
          <img
            class=\"rounded-circle img-thumbnail favicon-logo\"
            src=\"";
        // line 137
        echo twig_escape_filter($this->env, ($context["faviconPath"] ?? null), "html", null, true);
        echo "\"
            alt=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Favicon image", [], "Admin.Design.Feature"), "html", null, true);
        echo "\"
            title=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Favicon image", [], "Admin.Design.Feature"), "html", null, true);
        echo "\"
          >
      </div>

      <div class=\"form-group row\">
        <div class=\"col-sm\">
          ";
        // line 145
        echo twig_call_macro($macros["ps"], "macro_form_widget_with_error", [twig_get_attribute($this->env, $this->source, ($context["shopLogosForm"] ?? null), "favicon", [], "any", false, false, false, 145)], 145, $context, $this->getSourceContext());
        echo "
          <small class=\"form-text\">
            ";
        // line 147
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Use our [1]favicon generator on PrestaShop Marketplace[/1] to boost your brand image!", ["[1]" => "<a href=\"https://addons.prestashop.com/create-favicon.php?pab=1\" target=\"_blank\">", "[/1]" => "</a>"], "Admin.Design.Help");
        echo "
          </small>
        </div>
      </div>

    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  451 => 147,  446 => 145,  437 => 139,  433 => 138,  429 => 137,  420 => 131,  417 => 130,  413 => 129,  404 => 127,  400 => 126,  395 => 124,  393 => 125,  386 => 124,  335 => 117,  328 => 113,  324 => 112,  320 => 111,  311 => 105,  303 => 100,  296 => 96,  292 => 95,  288 => 94,  279 => 88,  274 => 85,  270 => 84,  261 => 79,  248 => 69,  241 => 65,  228 => 55,  224 => 53,  220 => 52,  215 => 50,  213 => 51,  206 => 50,  158 => 46,  151 => 42,  147 => 41,  143 => 40,  134 => 34,  131 => 33,  127 => 32,  118 => 30,  114 => 29,  109 => 27,  107 => 28,  100 => 27,  53 => 154,  51 => 124,  48 => 123,  46 => 50,  43 => 49,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\Theme\\Blocks\\logo_configuration.html.twig");
    }
}
