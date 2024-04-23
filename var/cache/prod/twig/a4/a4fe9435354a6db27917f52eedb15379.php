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

/* @PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig */
class __TwigTemplate_bf3d80a4ddebb6628b5d83f2aa41f773 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'customer_form' => [$this, 'block_customer_form'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["customerForm"] ?? null), [0 => "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig"], true);
        // line 26
        echo "
";
        // line 27
        $context["allowedNameChars"] = "0-9!<>,;?=+()@#\"°{}_\$%:";
        // line 28
        $context["isGuest"] = ((array_key_exists("isGuest", $context)) ? (_twig_default_filter(($context["isGuest"] ?? null), false)) : (false));
        // line 29
        echo "
";
        // line 30
        $this->displayBlock('customer_form', $context, $blocks);
    }

    public function block_customer_form($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["customerForm"] ?? null), 'form_start');
        echo "
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">person</i>
        ";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Customer", [], "Admin.Global"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-body\">
        <div class=\"form-wrapper\">
          ";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["customerForm"] ?? null), 'widget');
        echo "
        </div>
      </div>
      <div class=\"card-footer\">
        ";
        // line 43
        if ((array_key_exists("displayInIframe", $context) && (($context["displayInIframe"] ?? null) == true))) {
            // line 44
            echo "          <a href=\"javascript:window.parent.\$.fancybox.close();\" class=\"btn btn-outline-secondary\">
        ";
        } else {
            // line 46
            echo "          <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\PathWithBackUrlExtension']->getPathWithBackUrl("admin_customers_index"), "html", null, true);
            echo "\" class=\"btn btn-outline-secondary\">
        ";
        }
        // line 48
        echo "          ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "
        </a>
        <button class=\"btn btn-primary float-right\" id=\"save-button\">
          ";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
        </button>
      </div>
    </div>
  ";
        // line 55
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["customerForm"] ?? null), 'form_end');
        echo "

  ";
        // line 57
        $this->loadTemplate("@PrestaShop/Admin/Helpers/password_feedback.html.twig", "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig", 57)->display($context);
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 57,  105 => 55,  98 => 51,  91 => 48,  85 => 46,  81 => 44,  79 => 43,  72 => 39,  65 => 35,  57 => 31,  50 => 30,  47 => 29,  45 => 28,  43 => 27,  40 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Customer\\Blocks\\form.html.twig");
    }
}
