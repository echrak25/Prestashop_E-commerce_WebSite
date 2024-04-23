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

/* @PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig */
class __TwigTemplate_4c7b8c59071c8652e235534d41032ae0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "  ";
        if (($context["isSingleShopContext"] ?? null)) {
            // line 30
            echo "    ";
            if ((twig_length_filter($this->env, ($context["paymentModules"] ?? null)) < 2)) {
                // line 31
                echo "      <div class=\"alert alert-info\" role=\"alert\">
        <div class=\"alert-text\">
          ";
                // line 33
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("We recommend providing at least two different payment methods. Only one payment method could be problematic if this option cannot be used by a customer because it will prevent him/her from ordering.", [], "Admin.Payment.Notification"), "html", null, true);
                echo "
        </div>
      </div>
    ";
            }
            // line 37
            echo "
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">credit_card</i>
        ";
            // line 41
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Active payment", [], "Admin.Payment.Feature"), "html", null, true);
            echo "
      </h3>
      <div class=\"card-body\">
        ";
            // line 44
            $this->loadTemplate("@PrestaShop/Admin/Improve/Payment/PaymentMethods/Blocks/payment_modules_list.html.twig", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig", 44)->display($context);
            // line 45
            echo "      </div>
    </div>
  ";
        } else {
            // line 48
            echo "    <div class=\"alert alert-info\" role=\"alert\">
      <p class=\"alert-text\">";
            // line 49
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Note that this page is available in a single shop context only. Switch context to work on it.", [], "Admin.Notifications.Info"), "html", null, true);
            echo "</p>
    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 49,  86 => 48,  81 => 45,  79 => 44,  73 => 41,  67 => 37,  60 => 33,  56 => 31,  53 => 30,  50 => 29,  46 => 28,  35 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/payment_methods.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Payment\\PaymentMethods\\payment_methods.html.twig");
    }
}
