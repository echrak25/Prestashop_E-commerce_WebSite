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

/* @Product/ProductPage/Forms/form_combinations.html.twig */
class __TwigTemplate_c657fcc863a447e58a023c13f8ba0960 extends Template
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
        echo "<div class=\"row\" id=\"combinations\">
  <div class=\"col-md-9\">
    <h2>
      ";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Manage your product combinations", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
      <span
        class=\"help-box\"
        data-toggle=\"popover\"
        data-content=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Combinations are the different variations of a product, with attributes like its size, weight or color taking different values. To create a combination, you need to create your product attributes first. Go to Catalog > Attributes & Features for this!", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\"
      ></span>
    </h2>
    <div id=\"attributes-generator\">
      <div class=\"alert alert-info\" role=\"alert\">
        <p class=\"alert-text\">
          ";
        // line 38
        echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("To add combinations, you first need to create proper attributes and values in [1]%attributes_and_features_label%[/1]. <br> When done, you may enter the wanted attributes (like \"size\" or \"color\") and their respective values (\"XS\", \"red\", \"all\", etc.) in the field below; or simply select them from the right column. Then click on \"%generate_label%\": it will automatically create all the combinations for you!", ["%attributes_and_features_label%" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Attributes & Features", [], "Admin.Navigation.Menu"), "%generate_label%" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Generate", [], "Admin.Actions")], "Admin.Catalog.Help"), ["[1]" => (("<a class=\"alert-link\" href=\"" . $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminAttributesGroups")) . "\" target=\"_blank\">"), "[/1]" => "</a>"]);
        echo "
        </p>
      </div>
      <div class=\"row\">
        <div class=\"col-xl-10 col-lg-9\">
          <fieldset class=\"form-group\">
            ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attributes", [], "any", false, false, false, 44), 'errors');
        echo "
            ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attributes", [], "any", false, false, false, 45), 'widget');
        echo "
          </fieldset>
        </div>
        <div class=\"col-xl-2 col-lg-3\">
          <button class=\"btn btn-outline-primary\" id=\"create-combinations\">
            Generate
          </button>
        </div>
      </div>
    </div>

    <div id=\"combinations-bulk-form\">
      <p
        class=\"form-control bulk-action\"
        data-toggle=\"collapse\"
        href=\"#bulk-combinations-container\"
        aria-expanded=\"false\"
        aria-controls=\"bulk-combinations-container\"
      >
        ";
        // line 65
        echo "        <strong>";
        echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bulk actions ([1]/[2] combination(s) selected)", [], "Admin.Catalog.Feature"), ["[1]" => "<span class=\"js-bulk-combinations\">0</span>", "[2]" => (("<span id=\"js-bulk-combinations-total\">" . ($context["combinations_count"] ?? null)) . "</span>")]);
        echo "</strong>
        <i class=\"material-icons float-right\">keyboard_arrow_down</i>
      </p>
      <div class=\"collapse js-collapse\" id=\"bulk-combinations-container\">
        <div class=\"border p-3\">
          ";
        // line 70
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_combinations_bulk.html.twig", ["form" => ($context["form_combination_bulk"] ?? null)]);
        echo "
        </div>
      </div>
    </div>

    <div class=\"combinations-list\">
      <table class=\"table\">
        <thead class=\"thead-default\" id=\"combinations_thead\" ";
        // line 77
        if ( !($context["has_combinations"] ?? null)) {
            echo "style=\"display: none;\"";
        }
        echo ">
          <tr>
            <th>
              <input type=\"checkbox\" id=\"toggle-all-combinations\" >
            </th>
            <th></th>
            <th>";
        // line 83
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Combinations", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
            <th>";
        // line 84
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Impact on price (tax excl.)", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
            <th>";
        // line 85
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Final price (tax excl.)", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
            ";
        // line 86
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 87
            echo "                <th>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Quantity", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
            ";
        }
        // line 89
        echo "            <th colspan=\"3\" class=\"text-sm-right\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Default combination", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
          </tr>
        </thead>
        <tbody class=\"js-combinations-list panel-group accordion\" id=\"accordion_combinations\" data-action-delete-all=\"";
        // line 92
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_delete_all_attributes", ["idProduct" => 1]);
        echo "\" data-weight-unit=\"";
        echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_WEIGHT_UNIT"), "html", null, true);
        echo "\" data-action-refresh-images=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_get_form_images_combination", ["idProduct" => 1]);
        echo "\"  data-id-product= ";
        echo twig_escape_filter($this->env, ($context["id_product"] ?? null), "html", null, true);
        echo " data-ids-product-attribute=\"";
        echo twig_escape_filter($this->env, ($context["ids_product_attribute"] ?? null), "html", null, true);
        echo "\" data-combinations-url=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_combination_generate_form", ["combinationIds" => ":numbers"]);
        echo "\">
          ";
        // line 93
        if (($context["has_combinations"] ?? null)) {
            // line 94
            echo "            <tr class=\"combination loading timeline-wrapper\" id=\"loading-attribute\">
              <td class=\"timeline-item\" width=\"1%\">
              </td>
              <td class=\"timeline-item img\">
                <div class=\"animated-background\"></div>
              </td>
              <td>
                <div class=\"animated-background\"></div>
              </td>
              <td class=\"attribute-price\">
                <div class=\"animated-background\"></div>
              </td>
              <td class=\"attribute-finalprice\">
                <div class=\"animated-background\"></div>
              </td>
              ";
            // line 109
            if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
                // line 110
                echo "                <td class=\"attribute-quantity\">
                  <div class=\"animated-background\"></div>
                </td>
              ";
            }
            // line 114
            echo "              <td colspan=\"6\"></td>
            </tr>
          ";
        }
        // line 117
        echo "        </tbody>
      </table>
    </div>
  </div>

  <div id=\"attributes-list\" class=\"col-md-3\">
    ";
        // line 123
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attribute_groups"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
            // line 124
            echo "      <div class=\"attribute-group\">
        <a
          class=\"attribute-group-name ";
            // line 126
            if (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 126) > 3) || ($context["has_combinations"] ?? null))) {
                echo " collapsed ";
            }
            echo "\"
          data-toggle=\"collapse\"
          href=\"#attribute-group-";
            // line 128
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute_group"], "id", [], "any", false, false, false, 128), "html", null, true);
            echo "\"
          aria-expanded=\"";
            // line 129
            if (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 129) <= 3) ||  !($context["has_combinations"] ?? null))) {
                echo "true";
            } else {
                echo "false";
            }
            echo "\"
        >
          ";
            // line 131
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute_group"], "name", [], "any", false, false, false, 131), "html", null, true);
            echo "
        </a>
        <div class=\"collapse ";
            // line 133
            if (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 133) <= 3) &&  !($context["has_combinations"] ?? null))) {
                echo " show ";
            }
            echo " attributes \" id=\"attribute-group-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute_group"], "id", [], "any", false, false, false, 133), "html", null, true);
            echo "\">
          <div class=\"attributes-overflow ";
            // line 134
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute_group"], "attributes", [], "any", false, false, false, 134)) > 7)) {
                echo " two-columns ";
            }
            echo "\">
            ";
            // line 135
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["attribute_group"], "attributes", [], "any", false, false, false, 135));
            foreach ($context['_seq'] as $context["_key"] => $context["attribute"]) {
                // line 136
                echo "              <div class=\"attribute\">
                <input
                  class=\"js-attribute-checkbox\"
                  id=\"attribute-";
                // line 139
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute"], "id", [], "any", false, false, false, 139), "html", null, true);
                echo "\"
                  data-label=\"";
                // line 140
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute_group"], "name", [], "any", false, false, false, 140), "html", null, true);
                echo " : ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute"], "name", [], "any", false, false, false, 140), "html", null, true);
                echo "\"
                  data-value=\"";
                // line 141
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute"], "id", [], "any", false, false, false, 141), "html", null, true);
                echo "\"
                  data-group-id=\"";
                // line 142
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute_group"], "id", [], "any", false, false, false, 142), "html", null, true);
                echo "\"
                  type=\"checkbox\"
                >
                <label class=\"attribute-label\" for=\"attribute-";
                // line 145
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute"], "id", [], "any", false, false, false, 145), "html", null, true);
                echo "\">
                  <span
                    class=\"pretty-checkbox ";
                // line 147
                if ((twig_test_empty(twig_get_attribute($this->env, $this->source, $context["attribute"], "color", [], "any", false, false, false, 147)) && twig_test_empty(twig_get_attribute($this->env, $this->source, $context["attribute"], "texture", [], "any", false, false, false, 147)))) {
                    echo " not-color ";
                }
                echo "\"
                    ";
                // line 148
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["attribute"], "texture", [], "any", false, false, false, 148))) {
                    echo " style=\"content: url(";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute"], "texture", [], "any", false, false, false, 148), "html", null, true);
                    echo ")\"
                    ";
                } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source,                 // line 149
$context["attribute"], "color", [], "any", false, false, false, 149))) {
                    echo " style=\"background-color: ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute"], "color", [], "any", false, false, false, 149), "html", null, true);
                    echo "\"
                    ";
                }
                // line 151
                echo "                  >
                  </span>
                  ";
                // line 153
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attribute"], "name", [], "any", false, false, false, 153), "html", null, true);
                echo "
                </label>
              </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 157
            echo "          </div>
        </div>
      </div>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        echo "  </div>
</div>

<div class=\"form-group\">
  <div class=\"row\">

    <div class=\"col-md-12\">
      <h2>";
        // line 168
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Availability preferences", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
    </div>
    ";
        // line 170
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 171
            echo "      <div class=\"col-md-12\">
        <label class=\"form-control-label\">";
            // line 172
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Behavior when out of stock", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</label>
        ";
            // line 173
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "out_of_stock", [], "any", false, false, false, 173), 'errors');
            echo "
        ";
            // line 174
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "out_of_stock", [], "any", false, false, false, 174), 'widget');
            echo "
      </div>

      <div class=\"col-md-4\">
        <label class=\"form-control-label\">";
            // line 178
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_now", [], "any", false, false, false, 178), "vars", [], "any", false, false, false, 178), "label", [], "any", false, false, false, 178), "html", null, true);
            echo "</label>
        ";
            // line 179
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_now", [], "any", false, false, false, 179), 'errors');
            echo "
        ";
            // line 180
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_now", [], "any", false, false, false, 180), 'widget');
            echo "
      </div>

      <div class=\"col-md-4 \">
        <label class=\"form-control-label\">";
            // line 184
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_later", [], "any", false, false, false, 184), "vars", [], "any", false, false, false, 184), "label", [], "any", false, false, false, 184), "html", null, true);
            echo "</label>
        ";
            // line 185
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_later", [], "any", false, false, false, 185), 'errors');
            echo "
        ";
            // line 186
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_later", [], "any", false, false, false, 186), 'widget');
            echo "
      </div>
    ";
        } else {
            // line 189
            echo "      <div class=\"col-md-12\">
        <h3>";
            // line 190
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Stock management is disabled", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</h3>
      </div>
    ";
        }
        // line 193
        echo "
    ";
        // line 194
        if ( !($context["has_combinations"] ?? null)) {
            // line 195
            echo "    <div class=\"col-md-4 \">
      <label class=\"form-control-label\">";
            // line 196
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_date", [], "any", false, false, false, 196), "vars", [], "any", false, false, false, 196), "label", [], "any", false, false, false, 196), "html", null, true);
            echo "</label>
      ";
            // line 197
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_date", [], "any", false, false, false, 197), 'errors');
            echo "
      ";
            // line 198
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_date", [], "any", false, false, false, 198), 'widget');
            echo "
    </div>
    ";
        }
        // line 201
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_combinations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  442 => 201,  436 => 198,  432 => 197,  428 => 196,  425 => 195,  423 => 194,  420 => 193,  414 => 190,  411 => 189,  405 => 186,  401 => 185,  397 => 184,  390 => 180,  386 => 179,  382 => 178,  375 => 174,  371 => 173,  367 => 172,  364 => 171,  362 => 170,  357 => 168,  348 => 161,  331 => 157,  321 => 153,  317 => 151,  310 => 149,  304 => 148,  298 => 147,  293 => 145,  287 => 142,  283 => 141,  277 => 140,  273 => 139,  268 => 136,  264 => 135,  258 => 134,  250 => 133,  245 => 131,  236 => 129,  232 => 128,  225 => 126,  221 => 124,  204 => 123,  196 => 117,  191 => 114,  185 => 110,  183 => 109,  166 => 94,  164 => 93,  150 => 92,  143 => 89,  137 => 87,  135 => 86,  131 => 85,  127 => 84,  123 => 83,  112 => 77,  102 => 70,  93 => 65,  71 => 45,  67 => 44,  58 => 38,  49 => 32,  42 => 28,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_combinations.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_combinations.html.twig");
    }
}
