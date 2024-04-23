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

/* @PrestaShop/Admin/Product/CatalogPage/Lists/list.html.twig */
class __TwigTemplate_dace595786d2ece7dfeeee83db6b5383 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'product_catalog_form_table_row' => [$this, 'block_product_catalog_form_table_row'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "<tbody
    ";
        // line 26
        if (($context["activate_drag_and_drop"] ?? null)) {
            echo "class=\"sortable\"";
        }
        // line 27
        echo "    last_sql=\"";
        echo twig_escape_filter($this->env, ($context["last_sql_query"] ?? null), "html_attr");
        echo "\"
>
    ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 30
            echo "    ";
            $this->displayBlock('product_catalog_form_table_row', $context, $blocks);
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 142
            echo "<tr><td colspan=\"11\">
        ";
            // line 143
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("There is no result for this search. Update your filters to view other products.", [], "Admin.Catalog.Notification"), "html", null, true);
            echo "
    </td></tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 30
    public function block_product_catalog_form_table_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "    <tr data-uniturl=\"";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "unit_action_url", [], "any", true, true, false, 31)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "unit_action_url", [], "any", false, false, false, 31), "#")) : ("#")), "html", null, true);
        echo "\" data-product-id=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 31), "html", null, true);
        echo "\">
        <td class=\"checkbox-column form-group\">
            <div class=\"md-checkbox md-checkbox-inline\">
                <label>
                    <input type=\"checkbox\" id=\"bulk_action_selected_products-";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 35), "html", null, true);
        echo "\" name=\"bulk_action_selected_products[]\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 35), "html", null, true);
        echo "\">
                    <i class=\"md-checkbox-control\"></i>
                </label>
            </div>
        </td>
        <td>
            <label class=\"form-check-label\" for=\"bulk_action_selected_products-";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 41), "html", null, true);
        echo "\">
                ";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 42), "html", null, true);
        echo "
            </label>
        </td>
        <td>
            <a href=\"";
        // line 46
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", true, true, false, 46)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", false, false, false, 46), "")) : ("")), "html", null, true);
        echo "#tab-step1\">";
        echo twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "image", [], "any", false, false, false, 46);
        echo "</a>
        </td>
        <td>
            <a href=\"";
        // line 49
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", true, true, false, 49)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", false, false, false, 49), "")) : ("")), "html", null, true);
        echo "#tab-step1\">";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", [], "any", true, true, false, 49)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", [], "any", false, false, false, 49), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("N/A", [], "Admin.Global"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("N/A", [], "Admin.Global"))), "html", null, true);
        echo "</a>
        </td>
        <td>
            ";
        // line 52
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "reference", [], "any", true, true, false, 52)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "reference", [], "any", false, false, false, 52), "")) : ("")), "html", null, true);
        echo "
        </td>
        <td>
            ";
        // line 55
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name_category", [], "any", true, true, false, 55)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name_category", [], "any", false, false, false, 55), "")) : ("")), "html", null, true);
        echo "
        </td>
        <td class=\"text-center\">
            <a href=\"";
        // line 58
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", true, true, false, 58)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", false, false, false, 58), "")) : ("")), "html", null, true);
        echo "#tab-step2\">";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "price", [], "any", true, true, false, 58)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "price", [], "any", false, false, false, 58), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("N/A", [], "Admin.Global"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("N/A", [], "Admin.Global"))), "html", null, true);
        echo "</a>
        </td>
        <td class=\"text-center\">
            <a href=\"";
        // line 61
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", true, true, false, 61)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", false, false, false, 61), "")) : ("")), "html", null, true);
        echo "#tab-step2\">";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "price_final", [], "any", true, true, false, 61)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "price_final", [], "any", false, false, false, 61), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("N/A", [], "Admin.Global"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("N/A", [], "Admin.Global"))), "html", null, true);
        echo "</a>
        </td>

        ";
        // line 64
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 65
            echo "            <td class=\"product-sav-quantity text-center\" data-product-quantity-value=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "sav_quantity", [], "any", true, true, false, 65)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "sav_quantity", [], "any", false, false, false, 65), "")) : ("")), "html", null, true);
            echo "\">
                <a href=\"";
            // line 66
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", true, true, false, 66)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", false, false, false, 66), "")) : ("")), "html", null, true);
            echo "#tab-step3\">
                    ";
            // line 67
            if ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "sav_quantity", [], "any", true, true, false, 67) && (twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "sav_quantity", [], "any", false, false, false, 67) > 0))) {
                // line 68
                echo "                        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "sav_quantity", [], "any", false, false, false, 68), "html", null, true);
                echo "
                    ";
            } else {
                // line 70
                echo "                        ";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "sav_quantity", [], "any", true, true, false, 70)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "sav_quantity", [], "any", false, false, false, 70), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("N/A", [], "Admin.Global"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("N/A", [], "Admin.Global"))), "html", null, true);
                echo "
                    ";
            }
            // line 72
            echo "                </a>
            </td>
        ";
        } else {
            // line 75
            echo "            <td></td>
        ";
        }
        // line 77
        echo "        <td class=\"text-center\">

          <div
            class=\"ps-switch ps-switch-sm ps-switch-nolabel ps-switch-center\"
            onclick=\"unitProductAction(this, ";
        // line 81
        if ((((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "active", [], "any", true, true, false, 81)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "active", [], "any", false, false, false, 81), 0)) : (0)) == 0)) {
            echo "'activate'";
        } else {
            echo "'deactivate'";
        }
        echo ");\"
          >
          <input type=\"radio\" name=\"input-";
        // line 83
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 83), "html", null, true);
        echo "\" id=\"input-false-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 83), "html", null, true);
        echo "\" value=\"0\" ";
        if ((((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "active", [], "any", true, true, false, 83)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "active", [], "any", false, false, false, 83), 0)) : (0)) == 0)) {
            echo "checked";
        }
        echo " aria-label=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Disable %product_name% input", ["%product_name%" => twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", [], "any", false, false, false, 83)], "Admin.Global"), "html", null, true);
        echo "\">
              <label for=\"input-false-";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 84), "html", null, true);
        echo "\">Off</label>
              <input type=\"radio\" name=\"input-";
        // line 85
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 85), "html", null, true);
        echo "\" id=\"input-true-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 85), "html", null, true);
        echo "\" value=\"1\" ";
        if ((((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "active", [], "any", true, true, false, 85)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "active", [], "any", false, false, false, 85), 0)) : (0)) != 0)) {
            echo "checked";
        }
        echo " aria-label=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enable %product_name% input", ["%product_name%" => twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", [], "any", false, false, false, 85)], "Admin.Global"), "html", null, true);
        echo "\">
              <label for=\"input-true-";
        // line 86
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 86), "html", null, true);
        echo "\">On</label>
              <span class=\"slide-button\"></span>
            </div>
      </td>
      ";
        // line 90
        if (twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "position", [], "any", true, true, false, 90)) {
            // line 91
            echo "          <td ";
            if (($context["activate_drag_and_drop"] ?? null)) {
                echo "class=\"placeholder\"";
            }
            echo " style=\"cursor: pointer; cursor: hand;\">
              ";
            // line 92
            if (($context["activate_drag_and_drop"] ?? null)) {
                // line 93
                echo "                  <big><big>⇅</big></big>
              ";
            }
            // line 95
            echo "              <span class=\"position\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "position", [], "any", false, false, false, 95), "html", null, true);
            echo "</span>
              <input type=\"hidden\" name=\"mass_edit_action_sorted_products[]\" value=\"";
            // line 96
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id_product", [], "any", false, false, false, 96), "html", null, true);
            echo "\" />
              <input type=\"hidden\" name=\"mass_edit_action_sorted_positions[]\" value=\"";
            // line 97
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "position", [], "any", false, false, false, 97), "html", null, true);
            echo "\" />
          </td>
      ";
        }
        // line 100
        echo "      <td class=\"text-right\">
          <div class=\"btn-group-action\">

                ";
        // line 103
        $context["buttons_action"] = [0 => ["href" => ((twig_get_attribute($this->env, $this->source,         // line 105
($context["product"] ?? null), "preview_url", [], "any", true, true, false, 105)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "preview_url", [], "any", false, false, false, 105), "#")) : ("#")), "target" => "_blank", "icon" => "remove_red_eye", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Preview", [], "Admin.Actions")]];
        // line 111
        echo "
                ";
        // line 112
        $context["buttons_action"] = twig_array_merge(($context["buttons_action"] ?? null), [0 => ["onclick" => "unitProductAction(this, 'duplicate');", "icon" => "content_copy", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Duplicate", [], "Admin.Actions")]]);
        // line 119
        echo "
                ";
        // line 120
        $context["buttons_action"] = twig_array_merge(($context["buttons_action"] ?? null), [0 => ["onclick" => "unitProductAction(this, 'delete');", "icon" => "delete", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete", [], "Admin.Actions")]]);
        // line 127
        echo "
                ";
        // line 128
        $this->loadTemplate("@Product/CatalogPage/Forms/form_edit_dropdown.html.twig", "@PrestaShop/Admin/Product/CatalogPage/Lists/list.html.twig", 128)->display(twig_array_merge($context, ["button_id" => (("product_list_id_" . twig_get_attribute($this->env, $this->source,         // line 129
($context["product"] ?? null), "id_product", [], "any", false, false, false, 129)) . "_menu"), "default_item" => ["href" => ((twig_get_attribute($this->env, $this->source,         // line 131
($context["product"] ?? null), "url", [], "any", true, true, false, 131)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "url", [], "any", false, false, false, 131), "#")) : ("#")), "icon" => "mode_edit"], "right" => true, "items" =>         // line 135
($context["buttons_action"] ?? null)]));
        // line 137
        echo "            </div>
        </td>
    </tr>
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/CatalogPage/Lists/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  317 => 137,  315 => 135,  314 => 131,  313 => 129,  312 => 128,  309 => 127,  307 => 120,  304 => 119,  302 => 112,  299 => 111,  297 => 105,  296 => 103,  291 => 100,  285 => 97,  281 => 96,  276 => 95,  272 => 93,  270 => 92,  263 => 91,  261 => 90,  254 => 86,  242 => 85,  238 => 84,  226 => 83,  217 => 81,  211 => 77,  207 => 75,  202 => 72,  196 => 70,  190 => 68,  188 => 67,  184 => 66,  179 => 65,  177 => 64,  169 => 61,  161 => 58,  155 => 55,  149 => 52,  141 => 49,  133 => 46,  126 => 42,  122 => 41,  111 => 35,  101 => 31,  97 => 30,  86 => 143,  83 => 142,  69 => 30,  51 => 29,  45 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Product/CatalogPage/Lists/list.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\Lists\\list.html.twig");
    }
}
