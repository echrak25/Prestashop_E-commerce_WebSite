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

/* @Product/ProductPage/Forms/form_combination.html.twig */
class __TwigTemplate_aad2ec24a8d0beba255a00de7908b13a extends Template
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
        echo "<tr class=\"combination loaded\" id=\"attribute_";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 25), "value", [], "any", false, false, false, 25), "id_product_attribute", [], "any", false, false, false, 25), "html", null, true);
        echo "\" data=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 25), "value", [], "any", false, false, false, 25), "id_product_attribute", [], "any", false, false, false, 25), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 25), "value", [], "any", false, false, false, 25), "id_product_attribute", [], "any", false, false, false, 25), "html", null, true);
        echo "\">
  <td width=\"1%\"><input class=\"js-combination\" type=\"checkbox\" data-id=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 26), "value", [], "any", false, false, false, 26), "id_product_attribute", [], "any", false, false, false, 26), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 26), "value", [], "any", false, false, false, 26), "id_product_attribute", [], "any", false, false, false, 26), "html", null, true);
        echo "\"></td>
  <td class=\"img\"><div class=\"fake-img\"></div></td>
    <td>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 28), "value", [], "any", false, false, false, 28), "name", [], "any", false, false, false, 28), "html", null, true);
        echo "</td>
    <td class=\"attribute-price\">
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <span class=\"input-group-text\">";
        // line 32
        echo twig_escape_filter($this->env, ($context["default_currency_symbol"] ?? null), "html", null, true);
        echo "</span>
            </div>
            <input type=\"text\" class=\"attribute_priceTE form-control text-sm-right\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 34), "value", [], "any", false, false, false, 34), "attribute_price", [], "any", false, false, false, 34), "html", null, true);
        echo "\">
        </div>
    </td>
    <td class=\"attribute-finalprice text-sm-right\">
      <div>
        <span class=\"final-price\" data-price=\"";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 39), "value", [], "any", false, false, false, 39), "final_price", [], "any", false, false, false, 39), "html", null, true);
        echo "\" data-uniqid=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 39), "value", [], "any", false, false, false, 39), "id_product_attribute", [], "any", false, false, false, 39), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 39), "value", [], "any", false, false, false, 39), "final_price", [], "any", false, false, false, 39), "html", null, true);
        echo "</span> ";
        echo twig_escape_filter($this->env, ($context["default_currency_symbol"] ?? null), "html", null, true);
        echo "
      </div>
      ";
        // line 41
        if (($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_USE_ECOTAX") != 0)) {
            // line 42
            echo "        ";
            $context["attributeEcotax"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 42), "value", [], "any", false, false, false, 42), "attribute_ecotax", [], "any", false, false, false, 42);
            // line 43
            echo "        ";
            if ((($context["attributeEcotax"] ?? null) == 0)) {
                // line 44
                echo "          ";
                $context["attributeEcotax"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 44), "value", [], "any", false, false, false, 44), "product_ecotax", [], "any", false, false, false, 44);
                // line 45
                echo "        ";
            }
            // line 46
            echo "        <div class=\"attribute-ecotax-preview";
            if ((($context["attributeEcotax"] ?? null) == 0)) {
                echo " d-none";
            }
            echo "\">
          ";
            // line 47
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ecotax", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "
          <span class=\"attribute-ecotax\">";
            // line 48
            echo twig_escape_filter($this->env, twig_round(($context["attributeEcotax"] ?? null), 2), "html", null, true);
            echo "</span> ";
            echo twig_escape_filter($this->env, ($context["default_currency_symbol"] ?? null), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 51
        echo "    </td>
    ";
        // line 52
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 53
            echo "      <td class=\"attribute-quantity\">
          <div>
              <input type=\"text\" value=\"";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 55), "value", [], "any", false, false, false, 55), "attribute_quantity", [], "any", false, false, false, 55), "html", null, true);
            echo "\" class=\"form-control text-sm-right\">
          </div>
      </td>
    ";
        }
        // line 59
        echo "
    <td class=\"attribute-actions\">
        <div class=\"btn-group btn-group-sm\" role=\"group\">
            <a href=\"#combination_form_";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 62), "value", [], "any", false, false, false, 62), "id_product_attribute", [], "any", false, false, false, 62), "html", null, true);
        echo "\" class=\"btn btn-open tooltip-link btn-sm\"><i class=\"material-icons\">mode_edit</i></a>
        </div>
        <div id=\"combination_form_";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 64), "value", [], "any", false, false, false, 64), "id_product_attribute", [], "any", false, false, false, 64), "html", null, true);
        echo "\" data=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 64), "value", [], "any", false, false, false, 64), "id_product_attribute", [], "any", false, false, false, 64), "html", null, true);
        echo "\" class=\"combination-form hide\">
            <div class=\"nav\">
                ";
        // line 67
        echo "                <a class=\"btn-sensitive prev\"><i class=\"material-icons rtl-flip\">keyboard_arrow_left</i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Prev. combination", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</a>
                <a class=\"next btn-sensitive\">";
        // line 68
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Next combination", [], "Admin.Catalog.Feature"), "html", null, true);
        echo " <i class=\"material-icons rtl-flip\">keyboard_arrow_right</i></a>
            </div>
            <div class=\"panel p-2\">
                <div class=\"float-left\">
                    <button type=\"button\" class=\"back-to-product btn btn-outline-secondary btn-back\"><i class=\"material-icons rtl-flip\">arrow_back</i> ";
        // line 72
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Back to product", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</button>
                </div>
                <h2 class=\"title pt-2\">
                  ";
        // line 75
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Combination details", [], "Admin.Catalog.Feature"), "html", null, true);
        echo " -
                  ";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 76), "value", [], "any", false, false, false, 76), "name", [], "any", false, false, false, 76), "html", null, true);
        echo "
                </h2>
                ";
        // line 78
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_default", [], "any", false, false, false, 78), 'widget');
        echo "
                <div class=\"row\">
                  ";
        // line 80
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 81
            echo "                    <div class=\"col-md-2\">
                      <fieldset class=\"form-group\">
                          <label class=\"form-control-label\">
                            ";
            // line 84
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_quantity", [], "any", false, false, false, 84), "vars", [], "any", false, false, false, 84), "label", [], "any", false, false, false, 84), "html", null, true);
            echo "
                          </label>
                          ";
            // line 86
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_quantity", [], "any", false, false, false, 86), 'errors');
            echo "
                          ";
            // line 87
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_quantity", [], "any", false, false, false, 87), 'widget');
            echo "
                      </fieldset>
                    </div>
                  ";
        }
        // line 91
        echo "                    <div class=\"col-md-3\">
                      <fieldset class=\"form-group\">
                          <label class=\"form-control-label\">";
        // line 93
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_date_attribute", [], "any", false, false, false, 93), "vars", [], "any", false, false, false, 93), "label", [], "any", false, false, false, 93), "html", null, true);
        echo "</label>
                          ";
        // line 94
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_date_attribute", [], "any", false, false, false, 94), 'errors');
        echo "
                          ";
        // line 95
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "available_date_attribute", [], "any", false, false, false, 95), 'widget');
        echo "
                      </fieldset>
                    </div>
                    <div class=\"col-md-2\">
                      <fieldset class=\"form-group\">
                          <label class=\"form-control-label\">
                            ";
        // line 101
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_minimal_quantity", [], "any", false, false, false, 101), "vars", [], "any", false, false, false, 101), "label", [], "any", false, false, false, 101), "html", null, true);
        echo "
                            <span class=\"help-box\"
                                  data-toggle=\"popover\"
                                  data-content=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The minimum quantity required to buy this product (set to 1 to disable this feature). E.g.: if set to 3, customers will be able to purchase the product only if they take at least 3 in quantity.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" >
                            </span>
                          </label>
                          ";
        // line 107
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_minimal_quantity", [], "any", false, false, false, 107), 'errors');
        echo "
                          ";
        // line 108
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_minimal_quantity", [], "any", false, false, false, 108), 'widget');
        echo "
                      </fieldset>
                    </div>
                    <div class=\"col-md-4\">
                      <fieldset class=\"form-group\">
                          <label class=\"form-control-label\">";
        // line 113
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_reference", [], "any", false, false, false, 113), "vars", [], "any", false, false, false, 113), "label", [], "any", false, false, false, 113), "html", null, true);
        echo "</label>
                          ";
        // line 114
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_reference", [], "any", false, false, false, 114), 'errors');
        echo "
                          ";
        // line 115
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_reference", [], "any", false, false, false, 115), 'widget');
        echo "
                      </fieldset>
                    </div>
                </div>
                <h2 class=\"title\">
                  ";
        // line 120
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Stock", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
                </h2>
                <div class=\"row\">
                  <div class=\"col-md-3\">
                    <fieldset class=\"form-group\">
                      <label class=\"form-control-label\">";
        // line 125
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_location", [], "any", false, false, false, 125), "vars", [], "any", false, false, false, 125), "label", [], "any", false, false, false, 125), "html", null, true);
        echo "</label>
                      ";
        // line 126
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_location", [], "any", false, false, false, 126), 'errors');
        echo "
                      ";
        // line 127
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_location", [], "any", false, false, false, 127), 'widget');
        echo "
                    </fieldset>
                  </div>
                  <div class=\"col-md-3\">
                    <fieldset class=\"form-group\">
                      <label class=\"form-control-label\">";
        // line 132
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_low_stock_threshold", [], "any", false, false, false, 132), "vars", [], "any", false, false, false, 132), "label", [], "any", false, false, false, 132), "html", null, true);
        echo "</label>
                      ";
        // line 133
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_low_stock_threshold", [], "any", false, false, false, 133), 'errors');
        echo "
                      ";
        // line 134
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_low_stock_threshold", [], "any", false, false, false, 134), 'widget');
        echo "
                    </fieldset>
                  </div>
                  <div class=\"col-md-9\">
                    <fieldset class=\"form-group widget-checkbox-inline\">
                      <label class=\"form-control-label\">&nbsp;</label>
                      <div class=\"widget-checkbox-inline\">
                        ";
        // line 141
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_low_stock_alert", [], "any", false, false, false, 141), 'errors');
        echo "
                        ";
        // line 142
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_low_stock_alert", [], "any", false, false, false, 142), 'widget');
        echo "
                        <span class=\"help-box\"
                              data-toggle=\"popover\"
                              data-html=\"true\"
                              data-content=\"";
        // line 146
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The email will be sent to all the users who have the right to run the stock page. To modify the permissions, go to [1]Advanced Parameters > Team[/1]", ["[1]" => (("<a href=&quot;" . $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminEmployees")) . "&quot;>"), "[/1]" => "</a>"], "Admin.Catalog.Help");
        echo "\" >
                        </span>
                      </div>
                    </fieldset>
                  </div>
                </div>
                <h2 class=\"title\">
                  ";
        // line 153
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Price and impact", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
                </h2>
                <div class=\"row\">
                    <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 158
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_wholesale_price", [], "any", false, false, false, 158), "vars", [], "any", false, false, false, 158), "label", [], "any", false, false, false, 158), "html", null, true);
        echo "</label>
                            ";
        // line 159
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_wholesale_price", [], "any", false, false, false, 159), 'errors');
        echo "
                            ";
        // line 160
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_wholesale_price", [], "any", false, false, false, 160), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">
                              ";
        // line 166
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_price", [], "any", false, false, false, 166), "vars", [], "any", false, false, false, 166), "label", [], "any", false, false, false, 166), "html", null, true);
        echo "
                              <span class=\"help-box\"
                                    data-toggle=\"popover\"
                                    data-content=\"";
        // line 169
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Does this combination have a different price? Is it cheaper or more expensive than the default retail price?", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" >
                              </span>
                            </label>
                            ";
        // line 172
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_price", [], "any", false, false, false, 172), 'errors');
        echo "
                            ";
        // line 173
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_price", [], "any", false, false, false, 173), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 178
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_priceTI", [], "any", false, false, false, 178), "vars", [], "any", false, false, false, 178), "label", [], "any", false, false, false, 178), "html", null, true);
        echo "</label>
                            ";
        // line 179
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_priceTI", [], "any", false, false, false, 179), 'errors');
        echo "
                            ";
        // line 180
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_priceTI", [], "any", false, false, false, 180), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-3\">
                      <div class=\"form-control-label vcenter\">";
        // line 184
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Final retail price (tax excl.) will be", [], "Admin.Catalog.Feature"), "html", null, true);
        echo " <span class=\"final-price\" data-price=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 184), "value", [], "any", false, false, false, 184), "final_price", [], "any", false, false, false, 184), "html", null, true);
        echo "\" data-uniqid=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 184), "value", [], "any", false, false, false, 184), "id_product_attribute", [], "any", false, false, false, 184), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 184), "value", [], "any", false, false, false, 184), "final_price", [], "any", false, false, false, 184), "html", null, true);
        echo "</span> ";
        echo twig_escape_filter($this->env, ($context["default_currency_symbol"] ?? null), "html", null, true);
        echo "</div>
                      <div class=\"form-control-label vcenter\">";
        // line 185
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Final retail price (tax incl.) will be", [], "Admin.Catalog.Feature"), "html", null, true);
        echo " <span class=\"final-price-tax-included\" data-price=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 185), "value", [], "any", false, false, false, 185), "final_price_tax_included", [], "any", false, false, false, 185), "html", null, true);
        echo "\" data-uniqid=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 185), "value", [], "any", false, false, false, 185), "id_product_attribute", [], "any", false, false, false, 185), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 185), "value", [], "any", false, false, false, 185), "final_price_tax_included", [], "any", false, false, false, 185), "html", null, true);
        echo "</span> ";
        echo twig_escape_filter($this->env, ($context["default_currency_symbol"] ?? null), "html", null, true);
        echo "</div>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-3 ";
        // line 189
        if (($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_USE_ECOTAX") != 1)) {
            echo "hide";
        }
        echo "\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 191
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_ecotax", [], "any", false, false, false, 191), "vars", [], "any", false, false, false, 191), "label", [], "any", false, false, false, 191), "html", null, true);
        echo "</label>
                            ";
        // line 192
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_ecotax", [], "any", false, false, false, 192), 'errors');
        echo "
                            ";
        // line 193
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_ecotax", [], "any", false, false, false, 193), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">
                              ";
        // line 199
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_unity", [], "any", false, false, false, 199), "vars", [], "any", false, false, false, 199), "label", [], "any", false, false, false, 199), "html", null, true);
        echo "
                              <span class=\"help-box\"
                                    data-toggle=\"popover\"
                                    data-content=\"";
        // line 202
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Does this combination have a different price per unit?", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "\" >
                              </span>
                            </label>
                            ";
        // line 205
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_unity", [], "any", false, false, false, 205), 'errors');
        echo "
                            ";
        // line 206
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_unity", [], "any", false, false, false, 206), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 211
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_weight", [], "any", false, false, false, 211), "vars", [], "any", false, false, false, 211), "label", [], "any", false, false, false, 211), "html", null, true);
        echo "</label>
                            ";
        // line 212
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_weight", [], "any", false, false, false, 212), 'errors');
        echo "
                            ";
        // line 213
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_weight", [], "any", false, false, false, 213), 'widget');
        echo "
                        </fieldset>
                    </div>
                </div>
                <h2 class=\"title\">
                  ";
        // line 218
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Specific references", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
                </h2>
                <div class=\"row\">
                    <div class=\"col-md-4\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 223
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_isbn", [], "any", false, false, false, 223), "vars", [], "any", false, false, false, 223), "label", [], "any", false, false, false, 223), "html", null, true);
        echo "</label>
                            ";
        // line 224
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_isbn", [], "any", false, false, false, 224), 'errors');
        echo "
                            ";
        // line 225
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_isbn", [], "any", false, false, false, 225), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-4\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">
                              ";
        // line 231
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_ean13", [], "any", false, false, false, 231), "vars", [], "any", false, false, false, 231), "label", [], "any", false, false, false, 231), "html", null, true);
        echo "
                              <span class=\"help-box\"
                                    data-toggle=\"popover\"
                                    data-content=\"";
        // line 234
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This type of product code is specific to Europe and Japan, but is widely used internationally. It is a superset of the UPC code: all products marked with an EAN will be accepted in North America.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" >
                              </span>
                            </label>
                            ";
        // line 237
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_ean13", [], "any", false, false, false, 237), 'errors');
        echo "
                            ";
        // line 238
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_ean13", [], "any", false, false, false, 238), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-4\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 243
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_upc", [], "any", false, false, false, 243), "vars", [], "any", false, false, false, 243), "label", [], "any", false, false, false, 243), "html", null, true);
        echo "</label>
                            ";
        // line 244
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_upc", [], "any", false, false, false, 244), 'errors');
        echo "
                            ";
        // line 245
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_upc", [], "any", false, false, false, 245), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-4\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 250
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_mpn", [], "any", false, false, false, 250), "vars", [], "any", false, false, false, 250), "label", [], "any", false, false, false, 250), "html", null, true);
        echo "</label>
                            ";
        // line 251
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_mpn", [], "any", false, false, false, 251), 'errors');
        echo "
                            ";
        // line 252
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "attribute_mpn", [], "any", false, false, false, 252), 'widget');
        echo "
                        </fieldset>
                    </div>
                </div>
                <h2 class=\"title\">
                  ";
        // line 257
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Images", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
                </h2>

                <fieldset class=\"form-group js-combination-images\">
                    <label>
                        <small class=\"form-control-label\">";
        // line 262
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id_image_attr", [], "any", false, false, false, 262), "vars", [], "any", false, false, false, 262), "label", [], "any", false, false, false, 262), "html", null, true);
        echo "</small>
                        <small class=\"form-control-label number-of-images\"></small>
                    </label>
                    ";
        // line 265
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id_image_attr", [], "any", false, false, false, 265), 'errors');
        echo "
                    ";
        // line 266
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id_image_attr", [], "any", false, false, false, 266), 'widget');
        echo "
                </fieldset>

                ";
        // line 269
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminProductsCombinationBottom", ["id_product" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 269), "value", [], "any", false, false, false, 269), "id_product", [], "any", false, false, false, 269), "id_product_attribute" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 269), "value", [], "any", false, false, false, 269), "id_product_attribute", [], "any", false, false, false, 269)]);
        echo "

                ";
        // line 271
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id_product_attribute", [], "any", false, false, false, 271), 'widget');
        echo "
            </div>
        </div>
    </td>
    <td width=\"5%\">
      <a href=\"";
        // line 276
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_delete_attribute", ["idProduct" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 276), "value", [], "any", false, false, false, 276), "id_product", [], "any", false, false, false, 276)]), "html", null, true);
        echo "\" class=\"btn tooltip-link btn-sm delete\" data=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 276), "value", [], "any", false, false, false, 276), "id_product_attribute", [], "any", false, false, false, 276), "html", null, true);
        echo "\"><i class=\"material-icons\">delete</i></a>
    </td>
    <td>
      ";
        // line 279
        $context["checked"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 279), "value", [], "any", false, false, false, 279), "attribute_default", [], "any", false, false, false, 279) == 1)) ? ("checked") : (""));
        // line 280
        echo "      <input class=\"attribute-default\" type=\"radio\" ";
        echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
        echo " data-id=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 280), "value", [], "any", false, false, false, 280), "id_product_attribute", [], "any", false, false, false, 280), "html", null, true);
        echo "\">
    </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_combination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  612 => 280,  610 => 279,  602 => 276,  594 => 271,  589 => 269,  583 => 266,  579 => 265,  573 => 262,  565 => 257,  557 => 252,  553 => 251,  549 => 250,  541 => 245,  537 => 244,  533 => 243,  525 => 238,  521 => 237,  515 => 234,  509 => 231,  500 => 225,  496 => 224,  492 => 223,  484 => 218,  476 => 213,  472 => 212,  468 => 211,  460 => 206,  456 => 205,  450 => 202,  444 => 199,  435 => 193,  431 => 192,  427 => 191,  420 => 189,  405 => 185,  393 => 184,  386 => 180,  382 => 179,  378 => 178,  370 => 173,  366 => 172,  360 => 169,  354 => 166,  345 => 160,  341 => 159,  337 => 158,  329 => 153,  319 => 146,  312 => 142,  308 => 141,  298 => 134,  294 => 133,  290 => 132,  282 => 127,  278 => 126,  274 => 125,  266 => 120,  258 => 115,  254 => 114,  250 => 113,  242 => 108,  238 => 107,  232 => 104,  226 => 101,  217 => 95,  213 => 94,  209 => 93,  205 => 91,  198 => 87,  194 => 86,  189 => 84,  184 => 81,  182 => 80,  177 => 78,  172 => 76,  168 => 75,  162 => 72,  155 => 68,  150 => 67,  143 => 64,  138 => 62,  133 => 59,  126 => 55,  122 => 53,  120 => 52,  117 => 51,  109 => 48,  105 => 47,  98 => 46,  95 => 45,  92 => 44,  89 => 43,  86 => 42,  84 => 41,  73 => 39,  65 => 34,  60 => 32,  53 => 28,  46 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_combination.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_combination.html.twig");
    }
}
