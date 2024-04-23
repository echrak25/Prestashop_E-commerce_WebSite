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

/* @Product/ProductPage/Forms/form_shipping.html.twig */
class __TwigTemplate_99b48350879f6b54603449d5c0dc12dd extends Template
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
<div class=\"col-md-12 pb-1\">
  <h2>";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Package dimension", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
  <p class=\"subtitle\">";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Adjust your shipping costs by filling in the product dimensions.", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>
</div>

<div class=\"col-xl-2 col-lg-3\">
  <div class=\"form-group\">
    <label class=\"form-control-label\">";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "width", [], "any", false, false, false, 33), "vars", [], "any", false, false, false, 33), "label", [], "any", false, false, false, 33), "html", null, true);
        echo "</label>
    ";
        // line 34
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "width", [], "any", false, false, false, 34), 'errors');
        echo "
    <div class=\"input-group\">
      ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "width", [], "any", false, false, false, 36), 'widget');
        echo "
    </div>
  </div>
</div>
<div class=\"col-xl-2 col-lg-3\">
  <div class=\"form-group\">
    <label class=\"form-control-label\">";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "height", [], "any", false, false, false, 42), "vars", [], "any", false, false, false, 42), "label", [], "any", false, false, false, 42), "html", null, true);
        echo "</label>
    ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "height", [], "any", false, false, false, 43), 'errors');
        echo "
    <div class=\"input-group\">
      ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "height", [], "any", false, false, false, 45), 'widget');
        echo "
    </div>
  </div>
</div>
<div class=\"col-xl-2 col-lg-3\">
  <div class=\"form-group\">
    <label class=\"form-control-label\">";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "depth", [], "any", false, false, false, 51), "vars", [], "any", false, false, false, 51), "label", [], "any", false, false, false, 51), "html", null, true);
        echo "</label>
    ";
        // line 52
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "depth", [], "any", false, false, false, 52), 'errors');
        echo "
    <div class=\"input-group\">
      ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "depth", [], "any", false, false, false, 54), 'widget');
        echo "
    </div>
  </div>
</div>
<div class=\"col-xl-2 col-lg-3\">
  <div class=\"form-group\">
    <label class=\"form-control-label\">";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "weight", [], "any", false, false, false, 60), "vars", [], "any", false, false, false, 60), "label", [], "any", false, false, false, 60), "html", null, true);
        echo "</label>
    ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "weight", [], "any", false, false, false, 61), 'errors');
        echo "
    <div class=\"input-group\">
      ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "weight", [], "any", false, false, false, 63), 'widget');
        echo "
    </div>
  </div>
</div>

<div class=\"col-md-12\">
  <div class=\"form-group\">
    <h2>
      ";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "additional_delivery_times", [], "any", false, false, false, 71), "vars", [], "any", false, false, false, 71), "label", [], "any", false, false, false, 71), "html", null, true);
        echo "
      <span class=\"help-box\"
            data-toggle=\"popover\"
            data-content=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Display delivery time for a product is advised for merchants selling in Europe to comply with the local laws.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" >
      </span>
    </h2>
    <div class=\"row\">
       <div class=\"col-md-12\" ";
        // line 78
        if (        $this->hasBlock("widget_container_attributes", $context, $blocks)) {
            echo " ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo " ";
        }
        echo ">
          ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "additional_delivery_times", [], "any", false, false, false, 79));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 80
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 80), "value", [], "any", false, false, false, 80) == 1)) {
                // line 81
                echo "              <div class=\"widget-radio-inline\">
                ";
                // line 82
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget');
                echo "
                <a href=\"";
                // line 83
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_preferences");
                echo "\" class=\"btn sensitive px-0\" target=_blank><i class=\"material-icons\">open_in_new</i> ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("edit", [], "Admin.Catalog.Help"), "html", null, true);
                echo "</a>
              </div>
            ";
            } else {
                // line 86
                echo "              ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget');
                echo "
            ";
            }
            // line 88
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        echo "        </div>
     </div>
  </div>
</div>

<div class=\"col-xl-6 col-lg-6\">
  <div class=\"form-group\">
    <label class=\"form-control-label\">";
        // line 96
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "delivery_in_stock", [], "any", false, false, false, 96), "vars", [], "any", false, false, false, 96), "label", [], "any", false, false, false, 96), "html", null, true);
        echo "</label>
    ";
        // line 97
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "delivery_in_stock", [], "any", false, false, false, 97), 'errors');
        echo "
    ";
        // line 98
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "delivery_in_stock", [], "any", false, false, false, 98), 'widget');
        echo "
    <p class=\"subtitle italic\">";
        // line 99
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Leave empty to disable.", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>
  </div>
</div>
<div class=\"col-xl-6 col-lg-6\">
  <div class=\"form-group\">
    <label class=\"form-control-label\">";
        // line 104
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "delivery_out_stock", [], "any", false, false, false, 104), "vars", [], "any", false, false, false, 104), "label", [], "any", false, false, false, 104), "html", null, true);
        echo "</label>
    ";
        // line 105
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "delivery_out_stock", [], "any", false, false, false, 105), 'errors');
        echo "
    ";
        // line 106
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "delivery_out_stock", [], "any", false, false, false, 106), 'widget');
        echo "
    <p class=\"subtitle italic\">";
        // line 107
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Leave empty to disable.", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>
  </div>
</div>

<div class=\"col-md-12\">
  <div class=\"form-group\">
    <h2>
      ";
        // line 114
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "additional_shipping_cost", [], "any", false, false, false, 114), "vars", [], "any", false, false, false, 114), "label", [], "any", false, false, false, 114), "html", null, true);
        echo "
      <span class=\"help-box\"
            data-toggle=\"popover\"
            data-content=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("If a carrier has a tax, it will be added to the shipping fees. Does not apply to free shipping.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" >
      </span>
    </h2>
    <label class=\"form-control-label\">";
        // line 120
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Additional shipping costs", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
    <div class=\"row\">
      <div class=\"col-md-2\">
        ";
        // line 123
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "additional_shipping_cost", [], "any", false, false, false, 123), 'widget');
        echo "
      </div>
    </div>
  </div>
</div>

<div class=\"col-md-12\">
  <div class=\"form-group\">
    <h2>";
        // line 131
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "selectedCarriers", [], "any", false, false, false, 131), "vars", [], "any", false, false, false, 131), "label", [], "any", false, false, false, 131), "html", null, true);
        echo "</h2>
    ";
        // line 132
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "selectedCarriers", [], "any", false, false, false, 132), 'widget');
        echo "
  </div>
</div>

<div class=\"col-md-12\">
  <div class=\"alert alert-warning\" role=\"alert\">
    <p class=\"alert-text\">
        ";
        // line 139
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("If no carrier is selected then all the carriers will be available for customers orders.", [], "Admin.Catalog.Notification");
        echo "
    </p>
  </div>
</div>

<div class=\"col-md-12\">
  <div id=\"warehouse_combination_collection\" class=\"col-md-12 form-group\" data-url=\"";
        // line 145
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_warehouse_refresh_product_warehouse_combination_form");
        echo "\">
    ";
        // line 146
        if (((($context["asm_globally_activated"] ?? null) && ($context["isNotVirtual"] ?? null)) && ($context["isChecked"] ?? null))) {
            // line 147
            echo "      ";
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Product/ProductPage/Forms/form_warehouse_combination.html.twig", ["warehouses" => ($context["warehouses"] ?? null), "form" => ($context["form"] ?? null)]);
            echo "
    ";
        }
        // line 149
        echo "  </div>
</div>

";
        // line 152
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminProductsShippingStepBottom", ["id_product" => ($context["id_product"] ?? null)]);
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_shipping.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  302 => 152,  297 => 149,  291 => 147,  289 => 146,  285 => 145,  276 => 139,  266 => 132,  262 => 131,  251 => 123,  245 => 120,  239 => 117,  233 => 114,  223 => 107,  219 => 106,  215 => 105,  211 => 104,  203 => 99,  199 => 98,  195 => 97,  191 => 96,  182 => 89,  176 => 88,  170 => 86,  162 => 83,  158 => 82,  155 => 81,  152 => 80,  148 => 79,  140 => 78,  133 => 74,  127 => 71,  116 => 63,  111 => 61,  107 => 60,  98 => 54,  93 => 52,  89 => 51,  80 => 45,  75 => 43,  71 => 42,  62 => 36,  57 => 34,  53 => 33,  45 => 28,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_shipping.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_shipping.html.twig");
    }
}
