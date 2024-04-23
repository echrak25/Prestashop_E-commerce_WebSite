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

/* @Product/ProductPage/Forms/form_combinations_bulk.html.twig */
class __TwigTemplate_1db69778aea903e67bfe1aade32af539 extends Template
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
        echo "<div class=\"row\" id=\"bulk-combinations-container-fields\">
  ";
        // line 26
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 27
            echo "    <div class=\"col-lg-4 col-md-3 col-sm-6\">
      <label class=\"form-control-label\">";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "quantity", [], "any", false, false, false, 28), "vars", [], "any", false, false, false, 28), "label", [], "any", false, false, false, 28), "html", null, true);
            echo "</label>
      ";
            // line 29
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "quantity", [], "any", false, false, false, 29), 'errors');
            echo "
      ";
            // line 30
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "quantity", [], "any", false, false, false, 30), 'widget');
            echo "
    </div>
  ";
        }
        // line 33
        echo "
  <div class=\"col-lg-4 col-md-3 col-sm-6\">
    <label class=\"form-control-label\">";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "cost_price", [], "any", false, false, false, 35), "vars", [], "any", false, false, false, 35), "label", [], "any", false, false, false, 35), "html", null, true);
        echo "</label>
    ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "cost_price", [], "any", false, false, false, 36), 'errors');
        echo "
    ";
        // line 37
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "cost_price", [], "any", false, false, false, 37), 'widget');
        echo "
  </div>

  <div class=\"col-lg-4 col-md-3 col-sm-6\">
    <label class=\"form-control-label\">";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "impact_on_weight", [], "any", false, false, false, 41), "vars", [], "any", false, false, false, 41), "label", [], "any", false, false, false, 41), "html", null, true);
        echo "</label>
    ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "impact_on_weight", [], "any", false, false, false, 42), 'errors');
        echo "
    ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "impact_on_weight", [], "any", false, false, false, 43), 'widget');
        echo "
  </div>

  <div class=\"col-lg-4 col-md-3 col-sm-6\">
    <label class=\"form-control-label\">";
        // line 47
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "impact_on_price_te", [], "any", false, false, false, 47), "vars", [], "any", false, false, false, 47), "label", [], "any", false, false, false, 47), "html", null, true);
        echo "</label>
    ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "impact_on_price_te", [], "any", false, false, false, 48), 'errors');
        echo "
    ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "impact_on_price_te", [], "any", false, false, false, 49), 'widget');
        echo "
  </div>

  <div class=\"col-lg-4 col-md-3 col-sm-6\">
    <label class=\"form-control-label\">";
        // line 53
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "impact_on_price_ti", [], "any", false, false, false, 53), "vars", [], "any", false, false, false, 53), "label", [], "any", false, false, false, 53), "html", null, true);
        echo "</label>
    ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "impact_on_price_ti", [], "any", false, false, false, 54), 'errors');
        echo "
    ";
        // line 55
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "impact_on_price_ti", [], "any", false, false, false, 55), 'widget');
        echo "
  </div>

  <div class=\"col-lg-4 col-md-3 col-sm-6\">
    <label class=\"form-control-label\">";
        // line 59
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date_availability", [], "any", false, false, false, 59), "vars", [], "any", false, false, false, 59), "label", [], "any", false, false, false, 59), "html", null, true);
        echo "</label>
    ";
        // line 60
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date_availability", [], "any", false, false, false, 60), 'errors');
        echo "
    ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date_availability", [], "any", false, false, false, 61), 'widget');
        echo "
  </div>

  <div class=\"col-lg-4 col-md-3 col-sm-6\">
    <label class=\"form-control-label\">";
        // line 65
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "reference", [], "any", false, false, false, 65), "vars", [], "any", false, false, false, 65), "label", [], "any", false, false, false, 65), "html", null, true);
        echo "</label>
    ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "reference", [], "any", false, false, false, 66), 'errors');
        echo "
    ";
        // line 67
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "reference", [], "any", false, false, false, 67), 'widget');
        echo "
  </div>

  <div class=\"col-lg-4 col-md-3 col-sm-6\">
    <label class=\"form-control-label\">";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "minimal_quantity", [], "any", false, false, false, 71), "vars", [], "any", false, false, false, 71), "label", [], "any", false, false, false, 71), "html", null, true);
        echo "</label>
    ";
        // line 72
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "minimal_quantity", [], "any", false, false, false, 72), 'errors');
        echo "
    ";
        // line 73
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "minimal_quantity", [], "any", false, false, false, 73), 'widget');
        echo "
  </div>

  <div class=\"col-lg-4 col-md-3 col-sm-6\">
    <label class=\"form-control-label\">";
        // line 77
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "low_stock_threshold", [], "any", false, false, false, 77), "vars", [], "any", false, false, false, 77), "label", [], "any", false, false, false, 77), "html", null, true);
        echo "
      <span class=\"help-box\" 
            data-toggle=\"popover\" 
            data-content=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You can increase or decrease low stock levels in bulk. You cannot disable them in bulk: you have to do it on a per-combination basis.", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "\" >
      </span>
    </label>
    ";
        // line 83
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "low_stock_threshold", [], "any", false, false, false, 83), 'errors');
        echo "
    ";
        // line 84
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "low_stock_threshold", [], "any", false, false, false, 84), 'widget');
        echo "
  </div>

  <div class=\"col-lg-4 col-md-3 col-sm-6 widget-checkbox-inline\">
    <div class=\"widget-checkbox-inline\">
      ";
        // line 89
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "low_stock_alert", [], "any", false, false, false, 89), 'errors');
        echo "
      ";
        // line 90
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "low_stock_alert", [], "any", false, false, false, 90), 'widget');
        echo "
      <span class=\"help-box\" 
            data-toggle=\"popover\" 
            data-content=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The email will be sent to all the users who have the right to run the stock page. To modify the permissions, go to Advanced Parameters > Team", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "\" >
      </span>
    </div>
  </div>
</div>
<div class=\"row justify-content-end mt-3\">
    <button id=\"delete-combinations\" class=\"btn btn-outline-secondary mr-3\" data=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_delete_attribute", ["idProduct" => ($context["id_product"] ?? null)]), "html", null, true);
        echo "\">
      <i class=\"material-icons\">delete</i>
      ";
        // line 101
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete combinations", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
    </button>
    <button id=\"apply-on-combinations\" class=\"btn btn-outline-primary mr-3\">
      ";
        // line 104
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Apply", [], "Admin.Actions"), "html", null, true);
        echo "
    </button>
  ";
        // line 106
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_combinations_bulk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 106,  222 => 104,  216 => 101,  211 => 99,  202 => 93,  196 => 90,  192 => 89,  184 => 84,  180 => 83,  174 => 80,  168 => 77,  161 => 73,  157 => 72,  153 => 71,  146 => 67,  142 => 66,  138 => 65,  131 => 61,  127 => 60,  123 => 59,  116 => 55,  112 => 54,  108 => 53,  101 => 49,  97 => 48,  93 => 47,  86 => 43,  82 => 42,  78 => 41,  71 => 37,  67 => 36,  63 => 35,  59 => 33,  53 => 30,  49 => 29,  45 => 28,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_combinations_bulk.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_combinations_bulk.html.twig");
    }
}
