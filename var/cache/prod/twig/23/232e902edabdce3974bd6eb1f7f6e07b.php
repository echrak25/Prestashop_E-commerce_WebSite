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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/update_customer_address_modal.html.twig */
class __TwigTemplate_dcf686fdffc1f444d7cd382d78bf7d53 extends Template
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
        if ( !(null === ($context["changeOrderAddressForm"] ?? null))) {
            // line 27
            echo "  <div class=\"modal fade\" id=\"updateCustomerAddressModal\">
      <div class=\"modal-dialog\" role=\"document\">
        ";
            // line 29
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["changeOrderAddressForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_change_customer_address", ["orderId" => twig_get_attribute($this->env, $this->source,             // line 30
($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 30), "customerId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 30), "id", [], "any", false, false, false, 30)])]);
            echo "
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <h5 class=\"modal-title\">
                ";
            // line 34
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Select another address", [], "Admin.Actions"), "html", null, true);
            echo "
              </h5>

              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Close", [], "Admin.Actions"), "html", null, true);
            echo "\">
                <span aria-hidden=\"true\">×</span>
              </button>
            </div>

            <div class=\"modal-body\">
              <div class=\"form-group m-0\">
                ";
            // line 44
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["changeOrderAddressForm"] ?? null), "new_address_id", [], "any", false, false, false, 44), 'widget');
            echo "
              </div>
            </div>

            ";
            // line 48
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["changeOrderAddressForm"] ?? null), "address_type", [], "any", false, false, false, 48), 'widget');
            echo "

            <div class=\"modal-footer\">
              <button id=\"change-address-cancel-button\" type=\"button\" class=\"btn btn-outline-secondary\" data-dismiss=\"modal\">
                ";
            // line 52
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "html", null, true);
            echo "
              </button>

              <button id=\"change-address-submit-button\" type=\"submit\" class=\"btn btn-primary\">
                ";
            // line 56
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Select", [], "Admin.Actions"), "html", null, true);
            echo "
              </button>
            </div>
          </div>
        ";
            // line 60
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["changeOrderAddressForm"] ?? null), 'form_end');
            echo "
      </div>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/update_customer_address_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 60,  91 => 56,  84 => 52,  77 => 48,  70 => 44,  60 => 37,  54 => 34,  47 => 30,  46 => 29,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/update_customer_address_modal.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\Modal\\update_customer_address_modal.html.twig");
    }
}
