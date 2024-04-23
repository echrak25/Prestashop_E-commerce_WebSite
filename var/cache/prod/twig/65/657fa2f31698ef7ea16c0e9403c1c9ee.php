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

/* @PrestaShop/Admin/Exception/error.html.twig */
class __TwigTemplate_1de55364d29053b58da415f66ed68f0a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("::base.html.twig", "@PrestaShop/Admin/Exception/error.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "  <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("themes/new-theme/public/theme" . ($context["rtl_suffix"] ?? null)) . ".css")), "html", null, true);
        echo "\"/>
";
    }

    // line 32
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "  ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Oops... looks like an unexpected error occurred", [], "Admin.Notifications.Error"), "html", null, true);
        echo "
";
    }

    // line 36
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 37
        echo "  <div class=\"container\">
    <div class=\"mt-5\">
      <div class=\"card\">
        <div class=\"card-body text-center\">
          <img class=\"img-responsive\" 
               src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/img/error/500.svg"), "html", null, true);
        echo "\" 
               alt=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Oops... looks like an unexpected error occurred", [], "Admin.Notifications.Error"), "html", null, true);
        echo "\">

          <div class=\"mt-3\">
            <p class=\"error-header\">
              ";
        // line 47
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Oops... looks like an unexpected error occurred", [], "Admin.Notifications.Error"), "html", null, true);
        echo "
            </p>

            ";
        // line 50
        if (($context["exception"] ?? null)) {
            // line 51
            echo "              <div class=\"mx-auto\">
                <p class=\"mb-0\">";
            // line 52
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["exception"] ?? null), "message", [], "any", false, false, false, 52), "html", null, true);
            echo "</p>
                <p class=\"mb-0\">[";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["exception"] ?? null), "class", [], "any", false, false, false, 53), "html", null, true);
            echo "
                  ";
            // line 54
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["exception"] ?? null), "code", [], "any", false, false, false, 54), "html", null, true);
            echo "]</p>
              </div>
            ";
        }
        // line 57
        echo "
            <div class=\"mt-4\">
              <form action=\"";
        // line 59
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_errors_enable_debug_mode");
        echo "\" method=\"post\" class=\"d-inline\">
                <input type=\"hidden\" name=\"_redirect_url\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 60), "requestUri", [], "any", false, false, false, 60), "html", null, true);
        echo "\">

                <button class=\"btn btn-outline-secondary\" type=\"submit\">
                  ";
        // line 63
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enable debug mode", [], "Admin.Actions"), "html", null, true);
        echo "
                </button>
              </form>
              <button class=\"btn btn-primary js-go-back-btn ml-3\" type=\"button\">
                ";
        // line 67
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Back to previous page", [], "Admin.Actions"), "html", null, true);
        echo "
              </button>
            </div>

            <p class=\"mt-3\">
              <a href=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getFunction('documentation_link')->getCallable()("debug_mode"), "html", null, true);
        echo "\" target=\"_blank\">
                ";
        // line 73
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Learn more about debug mode", [], "Admin.Actions"), "html", null, true);
        echo "
                <i class=\"material-icons rtl-flip\">arrow_right_alt</i>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
";
    }

    // line 84
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 85
        echo "  <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/error.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Exception/error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 85,  165 => 84,  151 => 73,  147 => 72,  139 => 67,  132 => 63,  126 => 60,  122 => 59,  118 => 57,  112 => 54,  108 => 53,  104 => 52,  101 => 51,  99 => 50,  93 => 47,  86 => 43,  82 => 42,  75 => 37,  71 => 36,  64 => 33,  60 => 32,  53 => 29,  49 => 28,  38 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Exception/error.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Exception\\error.html.twig");
    }
}
