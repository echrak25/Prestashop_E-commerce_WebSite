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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/add_order_discount_modal.html.twig */
class __TwigTemplate_e5d85b58fde189db693cfb809c362449 extends Template
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
<div class=\"modal fade\" id=\"addOrderDiscountModal\" tabindex=\"-1\" role=\"dialog\">
    <div class=\"modal-dialog\" role=\"document\">
      ";
        // line 28
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["addOrderCartRuleForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_add_cart_rule", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 28)])]);
        echo "
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\">
              ";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add new cart rule", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
            </h5>
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Close", [], "Admin.Actions"), "html", null, true);
        echo "\">
              <span aria-hidden=\"true\">×</span>
            </button>
          </div>
          <div class=\"modal-body\">

            <div class=\"form-group\">
              <label class=\"form-control-label\" for=\"";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["addOrderCartRuleForm"] ?? null), "name", [], "any", false, false, false, 41), "vars", [], "any", false, false, false, 41), "id", [], "any", false, false, false, 41), "html", null, true);
        echo "\">
                ";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Name", [], "Admin.Global"), "html", null, true);
        echo "
              </label>
              ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addOrderCartRuleForm"] ?? null), "name", [], "any", false, false, false, 44), 'widget');
        echo "
            </div>

            <div class=\"row\">
              <div class=\"col\">
                <div class=\"form-group\">
                  <label class=\"form-control-label\" for=\"";
        // line 50
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["addOrderCartRuleForm"] ?? null), "type", [], "any", false, false, false, 50), "vars", [], "any", false, false, false, 50), "id", [], "any", false, false, false, 50), "html", null, true);
        echo "\">
                    ";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Type", [], "Admin.Global"), "html", null, true);
        echo "
                  </label>
                  ";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addOrderCartRuleForm"] ?? null), "type", [], "any", false, false, false, 53), 'widget');
        echo "
                </div>
              </div>
              <div class=\"col\">
                <div class=\"form-group mb-0\">
                  <label class=\"form-control-label\" for=\"";
        // line 58
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["addOrderCartRuleForm"] ?? null), "value", [], "any", false, false, false, 58), "vars", [], "any", false, false, false, 58), "id", [], "any", false, false, false, 58), "html", null, true);
        echo "\">
                    ";
        // line 59
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Value", [], "Admin.Global"), "html", null, true);
        echo "
                  </label>

                  <div class=\"input-group\">
                    <div class=\"input-group-prepend\">
                      <div class=\"input-group-text\" id=\"add_order_cart_rule_value_unit\" data-currency-symbol=\"";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderCurrency"] ?? null), "symbol", [], "any", false, false, false, 64), "html", null, true);
        echo "\">%</div>
                    </div>
                    ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addOrderCartRuleForm"] ?? null), "value", [], "any", false, false, false, 66), 'widget');
        echo "
                  </div>
                  <small class=\"text-muted js-cart-rule-value-help d-none\">
                    ";
        // line 69
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This value must include taxes.", [], "Admin.Orderscustomers.Notification"), "html", null, true);
        echo "
                  </small>
                </div>
              </div>
            </div>

            <div class=\"form-group ";
        // line 75
        if ( !twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "hasInvoice", [], "any", false, false, false, 75)) {
            echo "d-none";
        }
        echo "\">
              <label class=\"form-control-label\" for=\"";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["addOrderCartRuleForm"] ?? null), "invoice_id", [], "any", false, false, false, 76), "vars", [], "any", false, false, false, 76), "id", [], "any", false, false, false, 76), "html", null, true);
        echo "\">
                ";
        // line 77
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Invoice", [], "Admin.Global"), "html", null, true);
        echo "
              </label>
              ";
        // line 79
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["addOrderCartRuleForm"] ?? null), "invoice_id", [], "any", false, false, false, 79), 'widget', ["attr" => ["disabled" =>  !twig_get_attribute($this->env, $this->source,         // line 80
($context["orderForViewing"] ?? null), "hasInvoice", [], "any", false, false, false, 80)]]);
        // line 81
        echo "
            </div>
            
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-outline-secondary\" data-dismiss=\"modal\">
              ";
        // line 87
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "
            </button>
            <button type=\"submit\" class=\"btn btn-primary\" id=\"add_order_cart_rule_submit\">
              ";
        // line 90
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add", [], "Admin.Actions"), "html", null, true);
        echo "
            </button>
          </div>
        </div>
      ";
        // line 94
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["addOrderCartRuleForm"] ?? null), 'form_end');
        echo "
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/add_order_discount_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 94,  163 => 90,  157 => 87,  149 => 81,  147 => 80,  146 => 79,  141 => 77,  137 => 76,  131 => 75,  122 => 69,  116 => 66,  111 => 64,  103 => 59,  99 => 58,  91 => 53,  86 => 51,  82 => 50,  73 => 44,  68 => 42,  64 => 41,  54 => 34,  49 => 32,  42 => 28,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/add_order_discount_modal.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\Modal\\add_order_discount_modal.html.twig");
    }
}
