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

/* @Product/ProductPage/Panels/pricing.html.twig */
class __TwigTemplate_472329800a69b31ae59d54ef53e82cf5 extends Template
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
        echo "<div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"step2\">
  <div class=\"container-fluid\">

    <h2>";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Retail price", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
      <span class=\"help-box\" 
            data-toggle=\"popover\" 
            data-content=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This is the price at which you intend to sell this product to your customers. The tax included price will change according to the tax rule you select.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
      </span>
    </h2>

    <div class=\"form-group\">
      <div class=\"row\">

        <div class=\"col-xl-2 col-lg-3\">
          <label class=\"form-control-label\">";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "price", [], "any", false, false, false, 39), "vars", [], "any", false, false, false, 39), "label", [], "any", false, false, false, 39), "html", null, true);
        echo "</label>
          ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "price", [], "any", false, false, false, 40), 'errors');
        echo "
          ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "price", [], "any", false, false, false, 41), 'widget');
        echo "
        </div>
        <div class=\"col-xl-2 col-lg-3\">
          <label class=\"form-control-label\">";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "price_ttc", [], "any", false, false, false, 44), "vars", [], "any", false, false, false, 44), "label", [], "any", false, false, false, 44), "html", null, true);
        echo "</label>
          ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "price_ttc", [], "any", false, false, false, 45), 'errors');
        echo "
          ";
        // line 46
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "price_ttc", [], "any", false, false, false, 46), 'widget');
        echo "
        </div>

        <div class=\"col-xl-4 col-lg-6 mx-auto\">
          <label class=\"form-control-label\">
            ";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "unit_price", [], "any", false, false, false, 51), "vars", [], "any", false, false, false, 51), "label", [], "any", false, false, false, 51), "html", null, true);
        echo "
            <span class=\"help-box\" 
                  data-toggle=\"popover\" 
                  data-content=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Some products can be purchased by unit (per bottle, per pound, etc.), and this is the price for one unit. For instance, if you’re selling fabrics, it would be the price per meter.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
            </span>
          </label>
          <div class=\"row\">
            <div class=\"col-md-6\">
              ";
        // line 59
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "unit_price", [], "any", false, false, false, 59), 'errors');
        echo "
              ";
        // line 60
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "unit_price", [], "any", false, false, false, 60), 'widget');
        echo "
            </div>
            <div class=\"col-md-6\">
              ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "unity", [], "any", false, false, false, 63), 'errors');
        echo "
              ";
        // line 64
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "unity", [], "any", false, false, false, 64), 'widget');
        echo "
            </div>
          </div>
        </div>
        <div class=\"col-md-2 col-md-offset-1 ";
        // line 68
        if (($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_USE_ECOTAX") != 1)) {
            echo "hide";
        }
        echo "\">
          <label class=\"form-control-label\">";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "ecotax", [], "any", false, false, false, 69), "vars", [], "any", false, false, false, 69), "label", [], "any", false, false, false, 69), "html", null, true);
        echo "</label>
          ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "ecotax", [], "any", false, false, false, 70), 'errors');
        echo "
          ";
        // line 71
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "ecotax", [], "any", false, false, false, 71), 'widget');
        echo "
        </div>
      </div>
    </div>

    <div class=\"row form-group\">
      <div class=\"col-md-4\">
        <label class=\"form-control-label\">";
        // line 78
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "id_tax_rules_group", [], "any", false, false, false, 78), "vars", [], "any", false, false, false, 78), "label", [], "any", false, false, false, 78), "html", null, true);
        echo "</label>
        ";
        // line 79
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "id_tax_rules_group", [], "any", false, false, false, 79), 'errors');
        echo "
        ";
        // line 80
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "id_tax_rules_group", [], "any", false, false, false, 80), 'widget');
        echo "
      </div>
      <div class=\"col-md-8\">
        <label class=\"form-control-label\">&nbsp;</label>
        <a class=\"form-control-static external-link\" href=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminTaxes"), "html", null, true);
        echo "\" target=\"_blank\">
          ";
        // line 85
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Manage tax rules", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
        </a>
      </div>
      <div class=\"col-md-12 pt-1\">
        ";
        // line 89
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "on_sale", [], "any", false, false, false, 89), 'widget');
        echo "
      </div>
      <div class=\"col-md-12\">
        <div class=\"row\">
          <div class=\"col-xl-5 col-lg-12\">
            <div class=\"alert alert-info mt-2\" role=\"alert\">
              <p class=\"alert-text\">
                ";
        // line 96
        echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Final retail price: [1][2][/2] tax incl.[/1] / [3][/3] tax excl.", [], "Admin.Catalog.Feature"), ["[1]" => "<strong>", "[/1]" => "</strong>", "[2]" => "<span id=\"final_retail_price_ti\">", "[/2]" => "</span>", "[3]" => "<span id=\"final_retail_price_te\">", "[/3]" => "</span>"]);
        echo "
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class=\"row mb-3\">
      <div class=\"col-md-12\">
        <h2>
          ";
        // line 107
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cost price", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
          <span class=\"help-box\" 
                data-toggle=\"popover\" 
                data-content=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The cost price is the price you paid for the product. Do not include the tax. It should be lower than the retail price: the difference between the two will be your margin.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
          </span>
        </h2>
      </div>
      <div class=\"col-xl-2 col-lg-3 form-group\">
        <label class=\"form-control-label\">";
        // line 115
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "wholesale_price", [], "any", false, false, false, 115), "vars", [], "any", false, false, false, 115), "label", [], "any", false, false, false, 115);
        echo "</label>
        ";
        // line 116
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "wholesale_price", [], "any", false, false, false, 116), 'errors');
        echo "
        ";
        // line 117
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "wholesale_price", [], "any", false, false, false, 117), 'widget');
        echo "
      </div>
    </div>

    <div class=\"row mb-3\">
      <div class=\"col-md-12\">
        <h2>
          ";
        // line 124
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Specific prices", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
          <span class=\"help-box\" 
                data-toggle=\"popover\" 
                data-content=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You can set specific prices for customers belonging to different groups, different countries, etc.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
          </span>
        </h2>
      </div>
      <div class=\"col-md-12\">
        <div id=\"specific-price\" class=\"mb-2\">
          <a id=\"js-open-create-specific-price-form\" class=\"btn btn-outline-primary mb-3\" data-toggle=\"collapse\" href=\"#specific_price_form\" aria-expanded=\"false\">
            <i class=\"material-icons\">add_circle</i>
            ";
        // line 135
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add a specific price", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
          </a>
          <div class=\"collapse\" id=\"specific_price_form\" data-action=\"";
        // line 137
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_specific_price_add");
        echo "\">
            ";
        // line 138
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_specific_price.html.twig", ["form" => twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "specific_price", [], "any", false, false, false, 138), "is_multishop_context" => ($context["is_multishop_context"] ?? null)]);
        echo "
          </div>
          <table id=\"js-specific-price-list\" class=\"table hide seo-table\" data-listing-url=\"";
        // line 140
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_specific_price_list", ["idProduct" => 1]);
        echo "\" data-action-delete=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_delete_specific_price", ["idSpecificPrice" => 1]);
        echo "\" data-action-edit=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_get_specific_price_update_form", ["idSpecificPrice" => 1]);
        echo "\">
            <thead class=\"thead-default\">
              <tr>
                <th>";
        // line 143
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ID", [], "Admin.Global"), "html", null, true);
        echo "</th>
                <th>";
        // line 144
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Rule", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
                <th>";
        // line 145
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Combination", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
                <th>";
        // line 146
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Currency", [], "Admin.Global"), "html", null, true);
        echo "</th>
                <th>";
        // line 147
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Country", [], "Admin.Global"), "html", null, true);
        echo "</th>
                <th>";
        // line 148
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Group", [], "Admin.Global"), "html", null, true);
        echo "</th>
                <th>";
        // line 149
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Customer", [], "Admin.Global"), "html", null, true);
        echo "</th>
                <th>";
        // line 150
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Fixed price", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
                <th>";
        // line 151
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Impact", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
                <th>";
        // line 152
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Period", [], "Admin.Global"), "html", null, true);
        echo "</th>
                <th>";
        // line 153
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("From", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>

    <div>
      ";
        // line 165
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_edit_specific_price_modal.html.twig");
        echo "
    </div>

    <div class=\"row\">
      <div class=\"col-md-12\">
        <h2>
          ";
        // line 171
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Priority management", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
          <span class=\"help-box\" 
                data-toggle=\"popover\" 
                data-content=\"";
        // line 174
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sometimes one customer can fit into multiple price rules. Priorities allow you to define which rules apply first.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
          </span>
        </h2>
      </div>
      <div class=\"col-md-3\">
        <fieldset class=\"form-group\">
          <label>";
        // line 180
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Priorities", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
          ";
        // line 181
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "specificPricePriority_0", [], "any", false, false, false, 181), 'errors');
        echo "
          ";
        // line 182
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "specificPricePriority_0", [], "any", false, false, false, 182), 'widget');
        echo "
        </fieldset>
      </div>
      <div class=\"col-md-3\">
        <fieldset class=\"form-group\">
          <label>&nbsp;</label>
          ";
        // line 188
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "specificPricePriority_1", [], "any", false, false, false, 188), 'errors');
        echo "
          ";
        // line 189
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "specificPricePriority_1", [], "any", false, false, false, 189), 'widget');
        echo "
        </fieldset>
      </div>
      <div class=\"col-md-3\">
        <fieldset class=\"form-group\">
          <label>&nbsp;</label>
          ";
        // line 195
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "specificPricePriority_2", [], "any", false, false, false, 195), 'errors');
        echo "
          ";
        // line 196
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "specificPricePriority_2", [], "any", false, false, false, 196), 'widget');
        echo "
        </fieldset>
      </div>
      <div class=\"col-md-3\">
        <fieldset class=\"form-group\">
          <label>&nbsp;</label>
          ";
        // line 202
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "specificPricePriority_3", [], "any", false, false, false, 202), 'errors');
        echo "
          ";
        // line 203
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "specificPricePriority_3", [], "any", false, false, false, 203), 'widget');
        echo "
        </fieldset>
      </div>
      <div class=\"col-md-12\">
        ";
        // line 207
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["pricingForm"] ?? null), "specificPricePriorityToAll", [], "any", false, false, false, 207), 'widget');
        echo "
      </div>
    </div>

    ";
        // line 211
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminProductsPriceStepBottom", ["id_product" => ($context["productId"] ?? null)]);
        echo "

  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Panels/pricing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  411 => 211,  404 => 207,  397 => 203,  393 => 202,  384 => 196,  380 => 195,  371 => 189,  367 => 188,  358 => 182,  354 => 181,  350 => 180,  341 => 174,  335 => 171,  326 => 165,  311 => 153,  307 => 152,  303 => 151,  299 => 150,  295 => 149,  291 => 148,  287 => 147,  283 => 146,  279 => 145,  275 => 144,  271 => 143,  261 => 140,  256 => 138,  252 => 137,  247 => 135,  236 => 127,  230 => 124,  220 => 117,  216 => 116,  212 => 115,  204 => 110,  198 => 107,  184 => 96,  174 => 89,  167 => 85,  163 => 84,  156 => 80,  152 => 79,  148 => 78,  138 => 71,  134 => 70,  130 => 69,  124 => 68,  117 => 64,  113 => 63,  107 => 60,  103 => 59,  95 => 54,  89 => 51,  81 => 46,  77 => 45,  73 => 44,  67 => 41,  63 => 40,  59 => 39,  48 => 31,  42 => 28,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Panels/pricing.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Panels\\pricing.html.twig");
    }
}
