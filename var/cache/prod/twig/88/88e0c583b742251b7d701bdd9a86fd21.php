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

/* @Product/ProductPage/Panels/combinations.html.twig */
class __TwigTemplate_2f91a517a0c5e9f0f0c026e2b9c5310a extends Template
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
        echo "<div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"step3\">
  <div class=\"container-fluid\">

    <div id=\"quantities\" style=\"";
        // line 28
        if ((($context["has_combinations"] ?? null) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formDependsOnStocks"] ?? null), "vars", [], "any", false, false, false, 28), "value", [], "any", false, false, false, 28) != "0"))) {
            echo "display: none;";
        }
        echo "\">
      <h2>";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Quantities", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
      <fieldset class=\"form-group\">
        <div class=\"row\">
          ";
        // line 32
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 33
            echo "            <div class=\"col-md-4\">
              <label class=\"form-control-label\">";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formStockQuantity"] ?? null), "vars", [], "any", false, false, false, 34), "label", [], "any", false, false, false, 34), "html", null, true);
            echo "</label>
              ";
            // line 35
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formStockQuantity"] ?? null), 'errors');
            echo "
              ";
            // line 36
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formStockQuantity"] ?? null), 'widget');
            echo "
            </div>
          ";
        }
        // line 39
        echo "          <div class=\"col-md-4\">
            <label class=\"form-control-label\">
              ";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formStockMinimalQuantity"] ?? null), "vars", [], "any", false, false, false, 41), "label", [], "any", false, false, false, 41), "html", null, true);
        echo "
              <span class=\"help-box\" data-toggle=\"popover\"
                data-content=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The minimum quantity required to buy this product (set to 1 to disable this feature). E.g.: if set to 3, customers will be able to purchase the product only if they take at least 3 in quantity.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
            </label>
            ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formStockMinimalQuantity"] ?? null), 'errors');
        echo "
            ";
        // line 46
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formStockMinimalQuantity"] ?? null), 'widget');
        echo "
          </div>
        </div>
      </fieldset>

      <h2>";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Stock", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
      <fieldset class=\"form-group\">
        <div class=\"row\">
          <div class=\"col-md-4\">
            <label class=\"form-control-label\">";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formLocation"] ?? null), "vars", [], "any", false, false, false, 55), "label", [], "any", false, false, false, 55), "html", null, true);
        echo "</label>
            ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formLocation"] ?? null), 'errors');
        echo "
            ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formLocation"] ?? null), 'widget');
        echo "
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-md-4\">
            <label class=\"form-control-label\">";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formLowStockThreshold"] ?? null), "vars", [], "any", false, false, false, 62), "label", [], "any", false, false, false, 62), "html", null, true);
        echo "</label>
            ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formLowStockThreshold"] ?? null), 'errors');
        echo "
            ";
        // line 64
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formLowStockThreshold"] ?? null), 'widget');
        echo "
          </div>
          <div class=\"col-md-8\">
            <label class=\"form-control-label\">&nbsp;</label>
            <div class=\"widget-checkbox-inline\">
              ";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formLowStockAlert"] ?? null), 'errors');
        echo "
              ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formLowStockAlert"] ?? null), 'widget');
        echo "
              <span class=\"help-box\" 
                    data-toggle=\"popover\" 
                    data-html=\"true\" 
                    data-content=\"";
        // line 74
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The email will be sent to all the users who have the right to run the stock page. To modify the permissions, go to [1]Advanced Parameters > Team[/1]", ["[1]" => (("<a href=&quot;" . $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminEmployees")) . "&quot;>"), "[/1]" => "</a>"], "Admin.Catalog.Help");
        echo "\">
              </span>
            </div>
          </div>
        </div>
      </fieldset>
    </div>

    <div id=\"virtual_product\" 
         data-action=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_virtual_save_action", ["idProduct" => ($context["productId"] ?? null)]), "html", null, true);
        echo "\" 
         data-action-remove=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_virtual_remove_action", ["idProduct" => ($context["productId"] ?? null)]), "html", null, true);
        echo "\">
        
      <h2>";
        // line 86
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "vars", [], "any", false, false, false, 86), "label", [], "any", false, false, false, 86), "html", null, true);
        echo "</h2>
      <fieldset class=\"form-group\">
        ";
        // line 88
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "is_virtual_file", [], "any", false, false, false, 88), 'widget');
        echo "
      </fieldset>

      <div class=\"row\">
        <div class=\"col-md-8\">
          <div id=\"virtual_product_content\" class=\"bg-light p-3\">
            <div class=\"row\">
              ";
        // line 95
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formVirtualProduct"] ?? null), 'errors');
        echo "
              <div class=\"col-md-12\">
                <fieldset class=\"form-group\">
                  <label class=\"form-control-label\">
                    ";
        // line 99
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "file", [], "any", false, false, false, 99), "vars", [], "any", false, false, false, 99), "label", [], "any", false, false, false, 99), "html", null, true);
        echo "
                    <span class=\"help-box\" data-toggle=\"popover\"
                      data-content=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload a file from your computer (%maxUploadSize% max.)", ["%maxUploadSize%" => ($context["max_upload_size"] ?? null)], "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                  </label>
                  <div id=\"form_step3_virtual_product_file_input\" class=\"";
        // line 103
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "vars", [], "any", false, true, false, 103), "value", [], "any", false, true, false, 103), "filename", [], "any", true, true, false, 103)) ? ("hide") : ("show"));
        echo "\">
                    ";
        // line 104
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "file", [], "any", false, false, false, 104), 'widget');
        echo "
                  </div>
                  <div id=\"form_step3_virtual_product_file_details\" class=\"";
        // line 106
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "vars", [], "any", false, true, false, 106), "value", [], "any", false, true, false, 106), "filename", [], "any", true, true, false, 106)) ? ("show") : ("hide"));
        echo "\">
                    <a href=\"";
        // line 107
        ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "vars", [], "any", false, true, false, 107), "value", [], "any", false, true, false, 107), "file_download_link", [], "any", true, true, false, 107)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "vars", [], "any", false, false, false, 107), "value", [], "any", false, false, false, 107), "file_download_link", [], "any", false, false, false, 107), "html", null, true))) : (print ("")));
        echo "\" class=\"btn btn-default btn-sm download\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Download file", [], "Admin.Actions"), "html", null, true);
        echo "</a>
                    <a href=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_virtual_remove_file_action", ["idProduct" => ($context["productId"] ?? null)]), "html", null, true);
        echo "\" class=\"btn btn-danger btn-sm delete\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete this file", [], "Admin.Actions"), "html", null, true);
        echo "</a>
                  </div>
                </fieldset>
              </div>
              <div class=\"col-md-6\">
                <fieldset class=\"form-group\">
                  <label class=\"form-control-label\">
                    ";
        // line 115
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "name", [], "any", false, false, false, 115), "vars", [], "any", false, false, false, 115), "label", [], "any", false, false, false, 115), "html", null, true);
        echo "
                    <span class=\"help-box\" data-toggle=\"popover\"
                      data-content=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The full filename with its extension (e.g. Book.pdf)", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                  </label>
                  ";
        // line 119
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "name", [], "any", false, false, false, 119), 'errors');
        echo "
                  ";
        // line 120
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "name", [], "any", false, false, false, 120), 'widget');
        echo "
                </fieldset>
              </div>
              <div class=\"col-md-6\">
                <fieldset class=\"form-group\">
                  <label class=\"form-control-label\">
                    ";
        // line 126
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "nb_downloadable", [], "any", false, false, false, 126), "vars", [], "any", false, false, false, 126), "label", [], "any", false, false, false, 126), "html", null, true);
        echo "
                    <span class=\"help-box\" data-toggle=\"popover\"
                      data-content=\"";
        // line 128
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Number of downloads allowed per customer. Set to 0 for unlimited downloads.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                  </label>
                  ";
        // line 130
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "nb_downloadable", [], "any", false, false, false, 130), 'errors');
        echo "
                  ";
        // line 131
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "nb_downloadable", [], "any", false, false, false, 131), 'widget');
        echo "
                </fieldset>
              </div>
              <div class=\"col-md-6\">
                <fieldset class=\"form-group\">
                  <label class=\"form-control-label\">
                    ";
        // line 137
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "expiration_date", [], "any", false, false, false, 137), "vars", [], "any", false, false, false, 137), "label", [], "any", false, false, false, 137), "html", null, true);
        echo "
                    <span class=\"help-box\" data-toggle=\"popover\"
                      data-content=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("If set, the file will not be downloadable after this date. Leave blank if you do not wish to attach an expiration date.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                  </label>
                  ";
        // line 141
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "expiration_date", [], "any", false, false, false, 141), 'errors');
        echo "
                  ";
        // line 142
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "expiration_date", [], "any", false, false, false, 142), 'widget');
        echo "
                </fieldset>
              </div>
              <div class=\"col-md-6\">
                <fieldset class=\"form-group\">
                  <label class=\"form-control-label\">
                    ";
        // line 148
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "nb_days", [], "any", false, false, false, 148), "vars", [], "any", false, false, false, 148), "label", [], "any", false, false, false, 148), "html", null, true);
        echo "
                    <span class=\"help-box\" data-toggle=\"popover\"
                      data-content=\"";
        // line 150
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Number of days this file can be accessed by customers. Set to zero for unlimited access.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                  </label>
                  ";
        // line 152
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "nb_days", [], "any", false, false, false, 152), 'errors');
        echo "
                  ";
        // line 153
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "nb_days", [], "any", false, false, false, 153), 'widget');
        echo "
                </fieldset>
              </div>
              <div class=\"col-md-12\">
                ";
        // line 157
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formVirtualProduct"] ?? null), "save", [], "any", false, false, false, 157), 'widget');
        echo "
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    ";
        // line 166
        if ((($context["asm_globally_activated"] ?? null) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formType"] ?? null), "vars", [], "any", false, false, false, 166), "value", [], "any", false, false, false, 166) != "2"))) {
            // line 167
            echo "      <div class=\"form-group\" id=\"asm_quantity_management\">
        <label class=\"col-sm-2 control-label\" for=\"form_step3_advanced_stock_management\"></label>
        <div class=\"col-sm-10\">
          ";
            // line 170
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formAdvancedStockManagement"] ?? null), 'errors');
            echo "
          ";
            // line 171
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formAdvancedStockManagement"] ?? null), 'widget');
            echo "
          ";
            // line 172
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "step1", [], "any", false, false, false, 172), "type_product", [], "any", false, false, false, 172), "vars", [], "any", false, false, false, 172), "value", [], "any", false, false, false, 172) == "1")) {
                // line 173
                echo "            ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("When enabling advanced stock management for a pack, please make sure it is also enabled for its product(s) – if you choose to decrement product quantities.", [], "Admin.Catalog.Notification"), "html", null, true);
                echo "
          ";
            }
            // line 175
            echo "        </div>
      </div>
      <div class=\"form-group\" id=\"depends_on_stock_div\" style=\"";
            // line 177
            if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formAdvancedStockManagement"] ?? null), "vars", [], "any", false, false, false, 177), "checked", [], "any", false, false, false, 177)) {
                echo "display: none;";
            }
            echo "\">
        <label class=\"col-sm-2 control-label\" for=\"form_step3_depends_on_stock\"></label>
        <div class=\"col-sm-10\">
          ";
            // line 180
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formDependsOnStocks"] ?? null), 'errors');
            echo "
          ";
            // line 181
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formDependsOnStocks"] ?? null), 'widget');
            echo "
        </div>
      </div>
    ";
        }
        // line 185
        echo "    ";
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 186
            echo "      <div id=\"pack_stock_type\">
        <h2>";
            // line 187
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["formPackStockType"] ?? null), "vars", [], "any", false, false, false, 187), "label", [], "any", false, false, false, 187), "html", null, true);
            echo "</h2>
        <div class=\"row\">
          <div class=\"col-md-4\">
            <fieldset class=\"form-group\">
              ";
            // line 191
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formPackStockType"] ?? null), 'errors');
            echo "
              ";
            // line 192
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formPackStockType"] ?? null), 'widget');
            echo "
            </fieldset>
          </div>
        </div>
      </div>
    ";
        }
        // line 198
        echo "    ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_combinations.html.twig", ["form" => ($context["formStep3"] ?? null), "form_combination_bulk" => ($context["formCombinations"] ?? null)]);
        echo "

    ";
        // line 200
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminProductsQuantitiesStepBottom", ["id_product" => ($context["productId"] ?? null)]);
        echo "

  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Panels/combinations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  413 => 200,  407 => 198,  398 => 192,  394 => 191,  387 => 187,  384 => 186,  381 => 185,  374 => 181,  370 => 180,  362 => 177,  358 => 175,  352 => 173,  350 => 172,  346 => 171,  342 => 170,  337 => 167,  335 => 166,  323 => 157,  316 => 153,  312 => 152,  307 => 150,  302 => 148,  293 => 142,  289 => 141,  284 => 139,  279 => 137,  270 => 131,  266 => 130,  261 => 128,  256 => 126,  247 => 120,  243 => 119,  238 => 117,  233 => 115,  221 => 108,  215 => 107,  211 => 106,  206 => 104,  202 => 103,  197 => 101,  192 => 99,  185 => 95,  175 => 88,  170 => 86,  165 => 84,  161 => 83,  149 => 74,  142 => 70,  138 => 69,  130 => 64,  126 => 63,  122 => 62,  114 => 57,  110 => 56,  106 => 55,  99 => 51,  91 => 46,  87 => 45,  82 => 43,  77 => 41,  73 => 39,  67 => 36,  63 => 35,  59 => 34,  56 => 33,  54 => 32,  48 => 29,  42 => 28,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Panels/combinations.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Panels\\combinations.html.twig");
    }
}
