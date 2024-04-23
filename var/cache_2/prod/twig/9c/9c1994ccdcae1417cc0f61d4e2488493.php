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

/* @Product/ProductPage/Panels/essentials.html.twig */
class __TwigTemplate_ddf29ec8a8cedf6e9156b4654539ffe3 extends Template
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
        echo "<div role=\"tabpanel\" class=\"form-contenttab tab-pane active\" id=\"step1\">
  <div class=\"container-fluid\">
    <div
      class=\"row\">

      ";
        // line 31
        echo "      <div class=\"col-md-9 left-column\">

        <div id=\"js_form_step1_inputPackItems\">
          ";
        // line 34
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formPackItems"] ?? null), 'errors');
        echo "
          ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formPackItems"] ?? null), 'widget');
        echo "
        </div>

        <div id=\"product-images-container\" class=\"mb-4\">
          <div id=\"product-images-dropzone\" class=\"panel dropzone ui-sortable col-md-12\" 
               url-upload=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_image_upload", ["idProduct" => ($context["productId"] ?? null)]), "html", null, true);
        echo "\" 
               url-position=\"";
        // line 41
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_image_positions");
        echo "\" 
               data-max-size=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_LIMIT_UPLOAD_IMAGE_VALUE"), "html", null, true);
        echo "\">
            <div id=\"product-images-dropzone-error\" class=\"text-danger\"></div>
            <div class=\"dz-default dz-message openfilemanager\">
              <i class=\"material-icons\">add_a_photo</i><br/>
              ";
        // line 46
        echo twig_escape_filter($this->env, (($__internal_compile_0 = ($context["js_translatable"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["Drop images here"] ?? null) : null), "html", null, true);
        echo "<br/>
              <a>";
        // line 47
        echo twig_escape_filter($this->env, (($__internal_compile_1 = ($context["js_translatable"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["or select files"] ?? null) : null), "html", null, true);
        echo "</a><br/>
              <small>
                ";
        // line 49
        echo twig_escape_filter($this->env, (($__internal_compile_2 = ($context["js_translatable"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["files recommandations"] ?? null) : null), "html", null, true);
        echo "<br/>
                ";
        // line 50
        echo twig_escape_filter($this->env, (($__internal_compile_3 = ($context["js_translatable"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["files recommandations2"] ?? null) : null), "html", null, true);
        echo "
              </small>
            </div>
            ";
        // line 53
        if (array_key_exists("images", $context)) {
            // line 54
            echo "              ";
            if (($context["editable"] ?? null)) {
                // line 55
                echo "                <div class=\"dz-preview disabled openfilemanager\">
                  <div>
                    <span>+</span>
                  </div>
                </div>
              ";
            }
            // line 61
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["images"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 62
                echo "                <div class=\"dz-preview dz-processing dz-image-preview dz-complete ui-sortable-handle\" data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["image"], "id", [], "any", false, false, false, 62), "html", null, true);
                echo "\" 
                     url-delete=\"";
                // line 63
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_image_delete", ["idImage" => twig_get_attribute($this->env, $this->source, $context["image"], "id", [], "any", false, false, false, 63)]), "html", null, true);
                echo "\" 
                     url-update=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_image_form", ["idImage" => twig_get_attribute($this->env, $this->source, $context["image"], "id", [], "any", false, false, false, 64)]), "html", null, true);
                echo "\">
                  <div class=\"dz-image bg\" style=\"background-image: url('";
                // line 65
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["image"], "base_image_url", [], "any", false, false, false, 65), "html", null, true);
                echo "-home_default.";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["image"], "format", [], "any", false, false, false, 65), "html", null, true);
                echo "');\"></div>
                  <div class=\"dz-details\">
                    <div class=\"dz-size\">
                      <span data-dz-size=\"\"></span>
                    </div>
                    <div class=\"dz-filename\">
                      <span data-dz-name=\"\"></span>
                    </div>
                  </div>
                  <div class=\"dz-progress\">
                    <span class=\"dz-upload\" data-dz-uploadprogress=\"\" style=\"width: 100%;\"></span>
                  </div>
                  <div class=\"dz-error-message\">
                    <span data-dz-errormessage=\"\"></span>
                  </div>
                  <div class=\"dz-success-mark\"></div>
                  <div class=\"dz-error-mark\"></div>
                  ";
                // line 82
                if (twig_get_attribute($this->env, $this->source, $context["image"], "cover", [], "any", false, false, false, 82)) {
                    // line 83
                    echo "                    <div class=\"iscover\">";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cover", [], "Admin.Catalog.Feature"), "html", null, true);
                    echo "</div>
                  ";
                }
                // line 85
                echo "                </div>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "            ";
        }
        // line 88
        echo "          </div>
          <div id=\"product-images-form-container\" class=\"col-md-4\">
            <div id=\"product-images-form\"></div>
          </div>
          <div class=\"dropzone-expander text-sm-center col-md-12\">
            <span class=\"expand\">";
        // line 93
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("View all images", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</span>
            <span class=\"compress\">";
        // line 94
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("View less", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</span>
          </div>

        </div>

        <div class=\"summary-description-container\">
          <h2>";
        // line 100
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Summary", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
          <div id=\"description_short\" class=\"mb-3\">
            ";
        // line 102
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formShortDescription"] ?? null), 'widget');
        echo "
          </div>

          <h2>";
        // line 105
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Description", [], "Admin.Global"), "html", null, true);
        echo "</h2>
          <div id=\"description\" class=\"mb-3\">
            ";
        // line 107
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formDescription"] ?? null), 'widget');
        echo "
          </div>
        </div>

        ";
        // line 111
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminProductsMainStepLeftColumnMiddle", ["id_product" => ($context["productId"] ?? null)]);
        echo "

        <div id=\"features\" class=\"mb-3\">
          <div id=\"features-content\" class=\"content ";
        // line 114
        echo (((twig_length_filter($this->env, ($context["formFeatures"] ?? null)) == 0)) ? ("hide") : (""));
        echo "\">
            <h2>";
        // line 115
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Features", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
            ";
        // line 116
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formFeatures"] ?? null), 'errors');
        echo "
            <div class=\"feature-collection nostyle\" data-prototype=\"";
        // line 117
        ob_start(function () { return ''; });
        echo " ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_feature.html.twig", ["form" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formFeatures"] ?? null), "vars", [], "any", false, false, false, 117), "prototype", [], "any", false, false, false, 117)]);
        echo " ";
        $___internal_parse_13_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        echo twig_escape_filter($this->env, $___internal_parse_13_);
        echo "\">
              ";
        // line 118
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["formFeatures"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["feature"]) {
            // line 119
            echo "                ";
            echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_feature.html.twig", ["form" => $context["feature"]]);
            echo "
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feature'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo "            </div>
          </div>
          <div class=\"row\">
            <div class=\"col-md-4\">
              <button type=\"button\" class=\"btn btn-outline-primary sensitive add\" id=\"add_feature_button\">
                <i class=\"material-icons\">add_circle</i>
                ";
        // line 127
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add a feature", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</button>
            </div>
          </div>
        </div>

        <div id=\"manufacturer\" class=\"mb-3\">
          ";
        // line 133
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_manufacturer.html.twig", ["form" => ($context["formManufacturer"] ?? null)]);
        echo "
        </div>

        <div id=\"related-product\" class=\"mb-3\">
          ";
        // line 137
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_related_products.html.twig", ["form" => ($context["formRelatedProducts"] ?? null)]);
        echo "
        </div>

        ";
        // line 140
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminProductsMainStepLeftColumnBottom", ["id_product" => ($context["productId"] ?? null)]);
        echo "

      </div>

      ";
        // line 145
        echo "      <div class=\"col-md-3 right-column\">

        ";
        // line 147
        if (($context["is_combination_active"] ?? null)) {
            // line 148
            echo "          <div class=\"form-group mb-3\" id=\"show_variations_selector\">
            <h2>
              ";
            // line 150
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Combinations", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "
              <span class=\"help-box\" 
                    data-toggle=\"popover\" 
                    data-content=\"";
            // line 153
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Combinations are the different variations of a product, with attributes like its size, weight or color taking different values. Does your product require combinations?", [], "Admin.Catalog.Help"), "html", null, true);
            echo "\">
              </span>
            </h2>
            <div class=\"radio\">
              <label>
                <input type=\"radio\" name=\"show_variations\" value=\"0\" ";
            // line 158
            if ( !($context["has_combinations"] ?? null)) {
                echo " checked=\"checked\" ";
            }
            echo ">
                ";
            // line 159
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Simple product", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "
              </label>
            </div>
            <div class=\"radio\">
              <label>
                <input type=\"radio\" name=\"show_variations\" value=\"1\" ";
            // line 164
            if (($context["has_combinations"] ?? null)) {
                echo " checked=\"checked\" ";
            }
            echo ">
                ";
            // line 165
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Product with combinations", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "
              </label>
              <div id=\"product_type_combinations_shortcut\">
                <span
                  class=\"small font-secondary\">
                  ";
            // line 171
            echo "                  ";
            echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Advanced settings in [1][2]Combinations[/1]", [], "Admin.Catalog.Help"), ["[1]" => "<a href=\"#tab-step3\" onclick=\"\$('a[href=\\'#step3\\']').click();\" class=\"btn sensitive px-0\">", "[/1]" => "</a>", "[2]" => "<i class=\"material-icons\">open_in_new</i>"]);
            echo "
                </span>
              </div>
            </div>
          </div>
        ";
        }
        // line 177
        echo "
        <div class=\"form-group mb-4\">
          <h2>
            ";
        // line 180
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reference", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
            <span class=\"help-box\" 
                  data-toggle=\"popover\" 
                  data-content=\"";
        // line 183
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Your reference code for this product. Allowed special characters: .-_#.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
            </span>
          </h2>
          ";
        // line 186
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formReference"] ?? null), 'errors');
        echo "
          <div class=\"row\">
            <div class=\"col-lg-12\" id=\"product_reference_field\">
              ";
        // line 189
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formReference"] ?? null), 'widget');
        echo "
            </div>
          </div>
        </div>

        ";
        // line 194
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 195
            echo "          <div class=\"form-group mb-4\" id=\"product_qty_0_shortcut_div\">
            <h2>
              ";
            // line 197
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Quantity", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "
              <span class=\"help-box\" 
                    data-toggle=\"popover\" 
                    data-content=\"";
            // line 200
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("How many products should be available for sale?", [], "Admin.Catalog.Help"), "html", null, true);
            echo "\">
              </span>
            </h2>
            ";
            // line 203
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formQuantityShortcut"] ?? null), 'errors');
            echo "
            <div class=\"row\">
              <div class=\"col-xl-6 col-lg-12\">
                ";
            // line 206
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formQuantityShortcut"] ?? null), 'widget');
            echo "
              </div>
            </div>
            <span
              class=\"small font-secondary\">
              ";
            // line 212
            echo "              ";
            echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Advanced settings in [1][2]Quantities[/1]", [], "Admin.Catalog.Help"), ["[1]" => "<a href=\"#tab-step3\" onclick=\"\$('a[href=\\'#step3\\']').click();\" class=\"btn sensitive px-0\">", "[/1]" => "</a>", "[2]" => "<i class=\"material-icons\">open_in_new</i>"]);
            echo "
            </span>
          </div>
        ";
        }
        // line 216
        echo "
        <div class=\"form-group mb-4\">
          <h2>
            ";
        // line 219
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Price", [], "Admin.Global"), "html", null, true);
        echo "
            <span class=\"help-box\" 
                  data-toggle=\"popover\" 
                  data-content=\"";
        // line 222
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This is the retail price at which you intend to sell this product to your customers. The tax included price will change according to the tax rule you select.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
            </span>
          </h2>
          <div class=\"row\">
            <div class=\"col-md-6\">
              <label class=\"form-control-label\">";
        // line 227
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tax excluded", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
              ";
        // line 228
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formPriceShortcut"] ?? null), 'widget');
        echo "
              ";
        // line 229
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formPriceShortcut"] ?? null), 'errors');
        echo "
            </div>
            <div class=\"col-md-6 col-offset-md-1\">
              <label class=\"form-control-label\">";
        // line 232
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tax included", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
              ";
        // line 233
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formPriceShortcutTTC"] ?? null), 'widget');
        echo "
              ";
        // line 234
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formPriceShortcutTTC"] ?? null), 'errors');
        echo "
            </div>
            <div class=\"col-md-12 mt-1\">
              <label class=\"form-control-label\">";
        // line 237
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tax rule", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
              ";
        // line 238
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin/Common:renderField", ["formName" => "step2", "formType" => "PrestaShopBundle\\Form\\Admin\\Product\\ProductPrice", "fieldName" => "id_tax_rules_group", "fieldData" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 243
($context["form"] ?? null), "step2", [], "any", false, false, false, 243), "id_tax_rules_group", [], "any", false, false, false, 243), "vars", [], "any", false, false, false, 243), "value", [], "any", false, false, false, 243)]));
        // line 247
        echo "
            </div>
            <div class=\"col-md-12\">
              <span
                class=\"small font-secondary\">
                ";
        // line 253
        echo "                ";
        echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Advanced settings in [1][2]Pricing[/1]", [], "Admin.Catalog.Help"), ["[1]" => "<a href=\"#tab-step2\" onclick=\"\$('a[href=\\'#step2\\']').click();\" class=\"btn sensitive px-0\">", "[/1]" => "</a>", "[2]" => "<i class=\"material-icons\">open_in_new</i>"]);
        echo "
              </span>
            </div>
          </div>
          <div class=\"row hide\">
            <div class=\"col-md-12\">
              <label>";
        // line 259
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tax rule", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
            </div>
            <div class=\"clearfix\"></div>
            <div class=\"col-md-11\" id=\"tax_rule_shortcut\"></div>
            <a href=\"#\" onclick=\"\$(this).parent().hide()\">&times;</a>
          </div>
        </div>

        <div class=\"form-group mb-4\" id=\"categories\">
          ";
        // line 268
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_categories.html.twig", ["form" => ($context["formCategories"] ?? null), "productId" => ($context["productId"] ?? null)]);
        echo "
        </div>

        ";
        // line 271
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminProductsMainStepRightColumnBottom", ["id_product" => ($context["productId"] ?? null)]);
        echo "

      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Panels/essentials.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  529 => 271,  523 => 268,  511 => 259,  501 => 253,  494 => 247,  492 => 243,  491 => 238,  487 => 237,  481 => 234,  477 => 233,  473 => 232,  467 => 229,  463 => 228,  459 => 227,  451 => 222,  445 => 219,  440 => 216,  432 => 212,  424 => 206,  418 => 203,  412 => 200,  406 => 197,  402 => 195,  400 => 194,  392 => 189,  386 => 186,  380 => 183,  374 => 180,  369 => 177,  359 => 171,  351 => 165,  345 => 164,  337 => 159,  331 => 158,  323 => 153,  317 => 150,  313 => 148,  311 => 147,  307 => 145,  300 => 140,  294 => 137,  287 => 133,  278 => 127,  270 => 121,  253 => 119,  236 => 118,  227 => 117,  223 => 116,  219 => 115,  215 => 114,  209 => 111,  202 => 107,  197 => 105,  191 => 102,  186 => 100,  177 => 94,  173 => 93,  166 => 88,  163 => 87,  156 => 85,  150 => 83,  148 => 82,  126 => 65,  122 => 64,  118 => 63,  113 => 62,  108 => 61,  100 => 55,  97 => 54,  95 => 53,  89 => 50,  85 => 49,  80 => 47,  76 => 46,  69 => 42,  65 => 41,  61 => 40,  53 => 35,  49 => 34,  44 => 31,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Panels/essentials.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Panels\\essentials.html.twig");
    }
}
