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

/* @Product/ProductPage/Panels/options.html.twig */
class __TwigTemplate_a01a8e4f51f1abc8e10702caef4cec2a extends Template
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
        echo "<div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"step6\">
  <div class=\"container-fluid\">

    ";
        // line 28
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminProductsOptionsStepTop", ["id_product" => ($context["productId"] ?? null)]);
        echo "

    <h2>";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Visibility", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
    <p class=\"subtitle\">";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Where do you want your product to appear?", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>

    <div class=\"row\">
      <div class=\"col-md-4 form-group\">
        ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "visibility", [], "any", false, false, false, 35), 'errors');
        echo "
        ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "visibility", [], "any", false, false, false, 36), 'widget');
        echo "
      </div>
    </div>

    <div class=\"row\">
      <div class=\"col-md-7 form-group\">
        ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "display_options", [], "any", false, false, false, 42), 'errors');
        echo "
        <div class=\"row\">
          <div class=\"col-md-4 js-available-for-order\">
            ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "display_options", [], "any", false, false, false, 45), "available_for_order", [], "any", false, false, false, 45), 'widget');
        echo "
          </div>
          <div class=\"col-md-3 js-show-price\">
            ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "display_options", [], "any", false, false, false, 48), "show_price", [], "any", false, false, false, 48), 'widget');
        echo "
          </div>
          <div class=\"col-md-5\">
            ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "display_options", [], "any", false, false, false, 51), "online_only", [], "any", false, false, false, 51), 'widget');
        echo "
          </div>
        </div>
      </div>
    </div>
    <div class=\"row form-group\">
      <div class=\"col-md-8\">
        <label class=\"form-control-label\">";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tags", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
        ";
        // line 59
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "tags", [], "any", false, false, false, 59), 'errors');
        echo "
        ";
        // line 60
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "tags", [], "any", false, false, false, 60), 'widget');
        echo "
        <div class=\"alert expandable-alert alert-info mt-3\" role=\"alert\">
          <p class=\"alert-text\">";
        // line 62
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tags are meant to help your customers find your products via the search bar.", [], "Admin.Catalog.Help");
        echo "</p>
          <div class=\"alert-more collapse\" id=\"tagsInfo\">
            <p>
              ";
        // line 65
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Choose terms and keywords that your customers will use to search for this product and make sure you are consistent with the tags you may have already used.", [], "Admin.Catalog.Help");
        echo "<br>
              ";
        // line 66
        echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You can manage tag aliases in the [1]Search section[/1]. If you add new tags, you have to rebuild the index.", [], "Admin.Catalog.Help"), ["[1]" => (("<a href=\"" . $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminSearchConf")) . "\" target=\"_blank\">"), "[/1]" => "</a>"]);
        // line 71
        echo "
            </p>
          </div>
          <div class=\"read-more-container\">
            <button type=\"button\" class=\"read-more btn-link\" data-toggle=\"collapse\" data-target=\"#tagsInfo\" aria-expanded=\"false\" aria-controls=\"collapseDanger\">
              ";
        // line 76
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Read more", [], "Admin.Actions");
        echo "
            </button>
          </div>
        </div>
      </div>
    </div>

    <h2>";
        // line 83
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Condition & References", [], "Admin.Catalog.Feature");
        echo "</h2>

    <div class=\"row\">
      <fieldset class=\"col-md-4 form-group\">
        <label class=\"form-control-label\">
          ";
        // line 88
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "condition", [], "any", false, false, false, 88), "vars", [], "any", false, false, false, 88), "label", [], "any", false, false, false, 88), "html", null, true);
        echo "
          <span class=\"help-box\"
                data-toggle=\"popover\"
                data-content=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Not all shops sell new products. This option enables you to indicate the condition of the product. It can be required on some marketplaces.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
          </span>
        </label>
        ";
        // line 94
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "condition", [], "any", false, false, false, 94), 'errors');
        echo "
        ";
        // line 95
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "condition", [], "any", false, false, false, 95), 'widget');
        echo "
      </fieldset>
      <fieldset class=\"col-md-4 form-group\">
        <label class=\"form-control-label\">&nbsp;</label>
        ";
        // line 99
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "show_condition", [], "any", false, false, false, 99), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"row\">
      <fieldset class=\"col-md-4 form-group\">
        <label class=\"form-control-label\">
          ";
        // line 105
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "isbn", [], "any", false, false, false, 105), "vars", [], "any", false, false, false, 105), "label", [], "any", false, false, false, 105), "html", null, true);
        echo "
          <span class=\"help-box\"
                data-toggle=\"popover\"
                data-content=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ISBN is used internationally to identify books and their various editions.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
          </span>
        </label>
        ";
        // line 111
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "isbn", [], "any", false, false, false, 111), 'errors');
        echo "
        ";
        // line 112
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "isbn", [], "any", false, false, false, 112), 'widget');
        echo "
      </fieldset>
      <fieldset class=\"col-md-4 form-group\">
        <label class=\"form-control-label\">
          ";
        // line 116
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "ean13", [], "any", false, false, false, 116), "vars", [], "any", false, false, false, 116), "label", [], "any", false, false, false, 116), "html", null, true);
        echo "
          <span class=\"help-box\"
                data-toggle=\"popover\"
                data-content=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This type of product code is specific to Europe and Japan, but is widely used internationally. It is a superset of the UPC code: all products marked with an EAN will be accepted in North America.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
          </span>
        </label>
        ";
        // line 122
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "ean13", [], "any", false, false, false, 122), 'errors');
        echo "
        ";
        // line 123
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "ean13", [], "any", false, false, false, 123), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"row\">
      <fieldset class=\"col-md-4 form-group\">
        <label class=\"form-control-label\">
          ";
        // line 129
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "upc", [], "any", false, false, false, 129), "vars", [], "any", false, false, false, 129), "label", [], "any", false, false, false, 129), "html", null, true);
        echo "
          <span class=\"help-box\"
                data-toggle=\"popover\"
                data-content=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This type of product code is widely used in the United States, Canada, the United Kingdom, Australia, New Zealand and in other countries.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
          </span>
        </label>
        ";
        // line 135
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "upc", [], "any", false, false, false, 135), 'errors');
        echo "
        ";
        // line 136
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "upc", [], "any", false, false, false, 136), 'widget');
        echo "
      </fieldset>
      <fieldset class=\"col-md-4 form-group\">
        <label class=\"form-control-label\">
          ";
        // line 140
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "mpn", [], "any", false, false, false, 140), "vars", [], "any", false, false, false, 140), "label", [], "any", false, false, false, 140), "html", null, true);
        echo "
          <span class=\"help-box\"
                data-toggle=\"popover\"
                data-content=\"";
        // line 143
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MPN is used internationally to identify the Manufacturer Part Number.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
          </span>
        </label>
        ";
        // line 146
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "mpn", [], "any", false, false, false, 146), 'errors');
        echo "
        ";
        // line 147
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "mpn", [], "any", false, false, false, 147), 'widget');
        echo "
      </fieldset>
    </div>

    <div id=\"custom_fields\" class=\"mt-3\">
      <h2>";
        // line 152
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "custom_fields", [], "any", false, false, false, 152), "vars", [], "any", false, false, false, 152), "label", [], "any", false, false, false, 152), "html", null, true);
        echo "</h2>
      <p class=\"subtitle\">";
        // line 153
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Customers can personalize the product by entering some text or by providing custom image files.", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>
      ";
        // line 154
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "custom_fields", [], "any", false, false, false, 154), 'errors');
        echo "
      <ul class=\"customFieldCollection nostyle\" data-prototype=\"
        ";
        // line 156
        ob_start(function () { return ''; });
        // line 157
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_custom_fields.html.twig", ["form" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "custom_fields", [], "any", false, false, false, 157), "vars", [], "any", false, false, false, 157), "prototype", [], "any", false, false, false, 157)]);
        echo "
        ";
        $___internal_parse_1_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 156
        echo twig_escape_filter($this->env, $___internal_parse_1_);
        // line 158
        echo "\">
        ";
        // line 159
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "custom_fields", [], "any", false, false, false, 159));
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
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 160
            echo "          <li>
            ";
            // line 161
            echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_custom_fields.html.twig", ["form" => $context["field"]]);
            echo "
          </li>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 164
        echo "      </ul>
      <a href=\"#\" class=\"btn btn-outline-secondary add\" data-role=\"add-customization-field\">
        <i class=\"material-icons\">add_circle</i>
        ";
        // line 167
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add a customization field", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
      </a>
    </div>

    <div class=\"row mt-4\">
      <div class=\"col-md-8\">
        <h2>";
        // line 173
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Attached files", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
        <p class=\"subtitle\">";
        // line 174
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Select the files (instructions, documentation, recipes, etc.) your customers can directly download on this product page.", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
          <br/>
          ";
        // line 176
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Need to browse all files? Go to [1]Catalog > Files[/1]", ["[1]" => (("<a href=\"" . $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminAttachments")) . "\">"), "[/1]" => "</a>"], "Admin.Catalog.Feature");
        echo "
        </p>
        ";
        // line 178
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "attachments", [], "any", false, false, false, 178), 'widget');
        echo "
      </div>
    </div>
    <div class=\"row mt-3\">
      <div class=\"col-md-8\">
        <a class=\"btn btn-outline-secondary mb-3\" href=\"#collapsedForm\" data-toggle=\"collapse\" aria-expanded=\"false\" aria-controls=\"collapsedForm\">
          <i class=\"material-icons\">add_circle</i>
          ";
        // line 185
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Attach a new file", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
        </a>
        <fieldset class=\"form-group collapse\" id=\"collapsedForm\">
          ";
        // line 188
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "attachment_product", [], "any", false, false, false, 188), 'errors');
        echo "
          <div id=\"form_step6_attachment_product\" data-action=\"";
        // line 189
        echo twig_escape_filter($this->env, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "attachment_product", [], "any", false, false, false, 189), "vars", [], "any", false, false, false, 189), "attr", [], "any", false, false, false, 189)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["data-action"] ?? null) : null), "html", null, true);
        echo "\">
            <div class=\"form-group\">";
        // line 190
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "attachment_product", [], "any", false, false, false, 190), "file", [], "any", false, false, false, 190), 'widget');
        echo "</div>
            <div class=\"form-group\">";
        // line 191
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "attachment_product", [], "any", false, false, false, 191), "name", [], "any", false, false, false, 191), 'widget');
        echo "</div>
            <div class=\"form-group\">";
        // line 192
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "attachment_product", [], "any", false, false, false, 192), "description", [], "any", false, false, false, 192), 'widget');
        echo "</div>
            <div class=\"form-group\">
              ";
        // line 194
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "attachment_product", [], "any", false, false, false, 194), "add", [], "any", false, false, false, 194), 'widget');
        echo "
              ";
        // line 195
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "attachment_product", [], "any", false, false, false, 195), "cancel", [], "any", false, false, false, 195), 'widget');
        echo "
            </div>
          </div>
        </fieldset>
      </div>
    </div>

    <div class=\"row mt-3\">
      <div class=\"col-md-8\" id=\"supplier_collection\">
        ";
        // line 204
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_supplier_choice.html.twig", ["form" => ($context["optionsForm"] ?? null)]);
        echo "
      </div>
    </div>
    <div id=\"supplier_combination_collection\" data-url=\"";
        // line 207
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_supplier_refresh_product_supplier_combination_form", ["idProduct" => ($context["productId"] ?? null), "supplierIds" => 1]), "html", null, true);
        echo "\">
      ";
        // line 208
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_supplier_combination.html.twig", ["suppliers" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["optionsForm"] ?? null), "suppliers", [], "any", false, false, false, 208), "vars", [], "any", false, false, false, 208), "value", [], "any", false, false, false, 208), "form" => ($context["optionsForm"] ?? null)]);
        echo "
    </div>

    ";
        // line 211
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminProductsOptionsStepBottom", ["id_product" => ($context["productId"] ?? null)]);
        echo "

  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Panels/options.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  436 => 211,  430 => 208,  426 => 207,  420 => 204,  408 => 195,  404 => 194,  399 => 192,  395 => 191,  391 => 190,  387 => 189,  383 => 188,  377 => 185,  367 => 178,  362 => 176,  357 => 174,  353 => 173,  344 => 167,  339 => 164,  322 => 161,  319 => 160,  302 => 159,  299 => 158,  297 => 156,  291 => 157,  289 => 156,  284 => 154,  280 => 153,  276 => 152,  268 => 147,  264 => 146,  258 => 143,  252 => 140,  245 => 136,  241 => 135,  235 => 132,  229 => 129,  220 => 123,  216 => 122,  210 => 119,  204 => 116,  197 => 112,  193 => 111,  187 => 108,  181 => 105,  172 => 99,  165 => 95,  161 => 94,  155 => 91,  149 => 88,  141 => 83,  131 => 76,  124 => 71,  122 => 66,  118 => 65,  112 => 62,  107 => 60,  103 => 59,  99 => 58,  89 => 51,  83 => 48,  77 => 45,  71 => 42,  62 => 36,  58 => 35,  51 => 31,  47 => 30,  42 => 28,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Panels/options.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Panels\\options.html.twig");
    }
}
