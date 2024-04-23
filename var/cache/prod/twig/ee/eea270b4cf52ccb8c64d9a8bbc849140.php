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

/* @Product/ProductPage/Forms/form_specific_price.html.twig */
class __TwigTemplate_20c0466fd3b2611f0a388b9cf430df8f extends Template
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
        if ( !array_key_exists("is_modal", $context)) {
            // line 26
            echo "  ";
            $context["is_modal"] = false;
        }
        // line 28
        echo "
";
        // line 29
        if ((($context["is_modal"] ?? null) == false)) {
            // line 30
            echo "  ";
            $context["column_default_md_3"] = "col-md-3";
            // line 31
            echo "  ";
            $context["column_default_md_2"] = "col-md-2";
            // line 32
            echo "  ";
            $context["column_default_xl_3"] = "col-xl-3";
        } else {
            // line 34
            echo "  ";
            $context["column_default_md_3"] = "col-md-9";
            // line 35
            echo "  ";
            $context["column_default_md_2"] = "col-md-4";
            // line 36
            echo "  ";
            $context["column_default_xl_3"] = "col-xl-4";
        }
        // line 38
        echo "
<div class=\"card card-body\">
  <h4><b>";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Specific price conditions", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</b></h4>
  ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "

  ";
        // line 43
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_shop", [], "any", false, true, false, 43), "vars", [], "any", false, true, false, 43), "choices", [], "any", true, true, false, 43)) {
            // line 44
            echo "  <div class=\"row\">
    <div class=\"col-md-4\">
      <fieldset class=\"form-group\">
        <label>";
            // line 47
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Shop", [], "Admin.Global"), "html", null, true);
            echo "</label>
        ";
            // line 48
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_shop", [], "any", false, false, false, 48), 'errors');
            echo "
        ";
            // line 49
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_shop", [], "any", false, false, false, 49), 'widget');
            echo "
      </fieldset>
    </div>
  </div>
  ";
        } else {
            // line 54
            echo "      ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_shop", [], "any", false, false, false, 54), 'widget');
            echo "
  ";
        }
        // line 56
        echo "
  <div class=\"row\">
    <div class=\"";
        // line 58
        echo twig_escape_filter($this->env, ($context["column_default_md_3"] ?? null), "html", null, true);
        echo "\">
      <fieldset class=\"form-group\">
        <label>";
        // line 60
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("For", [], "Admin.Global"), "html", null, true);
        echo "</label>
        ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_currency", [], "any", false, false, false, 61), 'errors');
        echo "
        ";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_currency", [], "any", false, false, false, 62), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"";
        // line 65
        echo twig_escape_filter($this->env, ($context["column_default_md_3"] ?? null), "html", null, true);
        echo "\">
      <fieldset class=\"form-group\">
        <label>&nbsp;</label>
        ";
        // line 68
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_country", [], "any", false, false, false, 68), 'errors');
        echo "
        ";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_country", [], "any", false, false, false, 69), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"";
        // line 72
        echo twig_escape_filter($this->env, ($context["column_default_md_3"] ?? null), "html", null, true);
        echo "\">
      <fieldset class=\"form-group\">
        <label>&nbsp;</label>
        ";
        // line 75
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_group", [], "any", false, false, false, 75), 'errors');
        echo "
        ";
        // line 76
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_group", [], "any", false, false, false, 76), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"col-md-6\">
      <fieldset class=\"form-group\">
        <label>";
        // line 81
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Customer", [], "Admin.Global"), "html", null, true);
        echo "</label>
        ";
        // line 82
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_customer", [], "any", false, false, false, 82), 'errors');
        echo "
        ";
        // line 83
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_customer", [], "any", false, false, false, 83), 'widget');
        echo "
      </fieldset>
    </div>
  </div>
  <div class=\"row\">
    <div id=\"specific-price-combination-selector\" class=\"col-md-6 ";
        // line 88
        echo ((($context["has_combinations"] ?? null)) ? ("") : ("hide"));
        echo "\">
      <fieldset class=\"form-group\">
        <label>";
        // line 90
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_product_attribute", [], "any", false, false, false, 90), "vars", [], "any", false, false, false, 90), "label", [], "any", false, false, false, 90), "html", null, true);
        echo "</label>
        ";
        // line 91
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_product_attribute", [], "any", false, false, false, 91), 'errors');
        echo "
        ";
        // line 92
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_id_product_attribute", [], "any", false, false, false, 92), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"clearfix\"></div>
    <div class=\"";
        // line 96
        echo twig_escape_filter($this->env, ($context["column_default_md_3"] ?? null), "html", null, true);
        echo "\">
      <fieldset class=\"form-group\">
        <label>";
        // line 98
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_from", [], "any", false, false, false, 98), "vars", [], "any", false, false, false, 98), "label", [], "any", false, false, false, 98), "html", null, true);
        echo "</label>
        ";
        // line 99
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_from", [], "any", false, false, false, 99), 'errors');
        echo "
        ";
        // line 100
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_from", [], "any", false, false, false, 100), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"";
        // line 103
        echo twig_escape_filter($this->env, ($context["column_default_md_3"] ?? null), "html", null, true);
        echo "\">
      <fieldset class=\"form-group\">
        <label>";
        // line 105
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("to", [], "Admin.Global");
        echo "</label>
        ";
        // line 106
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_to", [], "any", false, false, false, 106), 'errors');
        echo "
        ";
        // line 107
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_to", [], "any", false, false, false, 107), 'widget');
        echo "
      </fieldset>
    </div>
  ";
        // line 110
        if ((($context["is_modal"] ?? null) == true)) {
            // line 111
            echo "  </div>
  <div class=\"row\">
  ";
        }
        // line 114
        echo "    <div class=\"";
        echo twig_escape_filter($this->env, ($context["column_default_md_2"] ?? null), "html", null, true);
        echo "\">
      <fieldset class=\"form-group\">
        <label>";
        // line 116
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_from_quantity", [], "any", false, false, false, 116), "vars", [], "any", false, false, false, 116), "label", [], "any", false, false, false, 116), "html", null, true);
        echo "</label>
        ";
        // line 117
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_from_quantity", [], "any", false, false, false, 117), 'errors');
        echo "
        ";
        // line 118
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_from_quantity", [], "any", false, false, false, 118), 'widget');
        echo "
      </fieldset>
    </div>
  </div>
  <br>

  <h4><b>";
        // line 124
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Impact on price", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</b></h4>
  <div class=\"row\">
    <div class=\"";
        // line 126
        echo twig_escape_filter($this->env, ($context["column_default_md_3"] ?? null), "html", null, true);
        echo "\">
      <fieldset class=\"form-group\">
        <label>";
        // line 128
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_price", [], "any", false, false, false, 128), "vars", [], "any", false, false, false, 128), "label", [], "any", false, false, false, 128), "html", null, true);
        echo "</label>
        ";
        // line 129
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_price", [], "any", false, false, false, 129), 'errors');
        echo "
        ";
        // line 130
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_price", [], "any", false, false, false, 130), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"";
        // line 133
        echo twig_escape_filter($this->env, ($context["column_default_md_3"] ?? null), "html", null, true);
        echo "\">
      <fieldset class=\"form-group\">
        <label>&nbsp;</label>
        ";
        // line 136
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "leave_bprice", [], "any", false, false, false, 136), 'errors');
        echo "
        ";
        // line 137
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "leave_bprice", [], "any", false, false, false, 137), 'widget');
        echo "
      </fieldset>
    </div>
  </div>
  <div class=\"row\">
    <div class=\"";
        // line 142
        echo twig_escape_filter($this->env, ($context["column_default_xl_3"] ?? null), "html", null, true);
        echo " col-lg-4\">
      <fieldset class=\"form-group\">
        <label>";
        // line 144
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Apply a discount of", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
        ";
        // line 145
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_reduction", [], "any", false, false, false, 145), 'errors');
        echo "
        ";
        // line 146
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_reduction", [], "any", false, false, false, 146), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"";
        // line 149
        echo twig_escape_filter($this->env, ($context["column_default_xl_3"] ?? null), "html", null, true);
        echo " col-lg-3\">
      <fieldset class=\"form-group\">
        <label>&nbsp;</label>
        ";
        // line 152
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_reduction_type", [], "any", false, false, false, 152), 'errors');
        echo "
        ";
        // line 153
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_reduction_type", [], "any", false, false, false, 153), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"";
        // line 156
        echo twig_escape_filter($this->env, ($context["column_default_xl_3"] ?? null), "html", null, true);
        echo " col-lg-3\">
      <fieldset class=\"form-group\">
        <label>&nbsp;</label>
        ";
        // line 159
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_reduction_tax", [], "any", false, false, false, 159), 'errors');
        echo "
        ";
        // line 160
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sp_reduction_tax", [], "any", false, false, false, 160), 'widget');
        echo "
      </fieldset>
    </div>
  </div>
  <div class=\"col-md-12 text-sm-right\">
    ";
        // line 165
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "cancel", [], "any", false, false, false, 165), 'widget');
        echo "
    ";
        // line 166
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "save", [], "any", false, false, false, 166), 'widget');
        echo "
  </div>
  <div class=\"clearfix\"></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_specific_price.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  370 => 166,  366 => 165,  358 => 160,  354 => 159,  348 => 156,  342 => 153,  338 => 152,  332 => 149,  326 => 146,  322 => 145,  318 => 144,  313 => 142,  305 => 137,  301 => 136,  295 => 133,  289 => 130,  285 => 129,  281 => 128,  276 => 126,  271 => 124,  262 => 118,  258 => 117,  254 => 116,  248 => 114,  243 => 111,  241 => 110,  235 => 107,  231 => 106,  227 => 105,  222 => 103,  216 => 100,  212 => 99,  208 => 98,  203 => 96,  196 => 92,  192 => 91,  188 => 90,  183 => 88,  175 => 83,  171 => 82,  167 => 81,  159 => 76,  155 => 75,  149 => 72,  143 => 69,  139 => 68,  133 => 65,  127 => 62,  123 => 61,  119 => 60,  114 => 58,  110 => 56,  104 => 54,  96 => 49,  92 => 48,  88 => 47,  83 => 44,  81 => 43,  76 => 41,  72 => 40,  68 => 38,  64 => 36,  61 => 35,  58 => 34,  54 => 32,  51 => 31,  48 => 30,  46 => 29,  43 => 28,  39 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_specific_price.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_specific_price.html.twig");
    }
}
