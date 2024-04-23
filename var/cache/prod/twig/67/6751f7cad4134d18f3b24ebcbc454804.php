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

/* @PrestaShop/Admin/Improve/Payment/PaymentMethods/Blocks/payment_modules_list.html.twig */
class __TwigTemplate_bf6f4d674ee47b0f31a54947c3de9188 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'payment_methods_module_list' => [$this, 'block_payment_methods_module_list'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "
";
        // line 27
        $this->displayBlock('payment_methods_module_list', $context, $blocks);
    }

    public function block_payment_methods_module_list($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "  ";
        if ((twig_length_filter($this->env, ($context["paymentModules"] ?? null)) > 0)) {
            // line 29
            echo "  <div class=\"module-item-list\">
  ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["paymentModules"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 31
                echo "    <div class=\"row module-item-wrapper-list border-bottom mb-sm-3\">
      <div class=\"col-sm-2 col-md-1 col-lg-1\">
        <div class=\"module-logo-thumb-list text-center\">
          <img src=\"";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 34), "img", [], "any", false, false, false, 34), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 34), "displayName", [], "any", false, false, false, 34), "html", null, true);
                echo "\"/>
        </div>
      </div>
      <div class=\"col-sm-6 col-md-8 col-lg-9 pl-0\">
        <p class=\"mb-0\">
          ";
                // line 39
                echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 39), "displayName", [], "any", false, false, false, 39);
                echo "
          <span class=\"text-muted\">
            ";
                // line 41
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("v%version% - by %author%", ["%version%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 41), "version", [], "any", false, false, false, 41), "%author%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 41), "author", [], "any", false, false, false, 41)], "Admin.Modules.Feature"), "html", null, true);
                echo "
          </span>
        </p>
        <p class=\"text-muted\">
          ";
                // line 45
                echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 45), "description", [], "any", false, false, false, 45);
                echo "
        </p>
      </div>
      ";
                // line 48
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 48), "is_configurable", [], "any", false, false, false, 48)) {
                    // line 49
                    echo "      <div class=\"col-sm-4 col-md-3 col-lg-2 mb-3\">
        <div class=\"text-center\">
          <a href=\"";
                    // line 51
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_module_configure_action", ["module_name" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 51), "name", [], "any", false, false, false, 51)]), "html", null, true);
                    echo "\"
             class=\"btn btn-primary-reverse btn-outline-primary light-button\"
          >
            ";
                    // line 54
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configure", [], "Admin.Global"), "html", null, true);
                    echo "
          </a>
        </div>
      </div>
      ";
                }
                // line 59
                echo "    </div>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "  </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Payment/PaymentMethods/Blocks/payment_modules_list.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  118 => 61,  111 => 59,  103 => 54,  97 => 51,  93 => 49,  91 => 48,  85 => 45,  78 => 41,  73 => 39,  63 => 34,  58 => 31,  54 => 30,  51 => 29,  48 => 28,  41 => 27,  38 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Payment/PaymentMethods/Blocks/payment_modules_list.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Payment\\PaymentMethods\\Blocks\\payment_modules_list.html.twig");
    }
}
