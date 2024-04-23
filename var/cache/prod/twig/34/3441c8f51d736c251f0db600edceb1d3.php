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

/* @Product/CatalogPage/Lists/products_table.html.twig */
class __TwigTemplate_e727cc76821de70e4da64e8eb9fe7253 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'product_catalog_form_table_header' => [$this, 'block_product_catalog_form_table_header'],
            'product_catalog_form_table_filters' => [$this, 'block_product_catalog_form_table_filters'],
            'product_catalog_filter_select_all' => [$this, 'block_product_catalog_filter_select_all'],
            'product_catalog_form_table_items' => [$this, 'block_product_catalog_form_table_items'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@Product/CatalogPage/Lists/products_table.html.twig", 25)->unwrap();
        // line 26
        echo "<div class=\"table-responsive\">
  <table
    class=\"table product\"
    redirecturl=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_catalog", ["limit" =>         // line 30
($context["limit"] ?? null), "offset" =>         // line 31
($context["offset"] ?? null), "orderBy" =>         // line 32
($context["orderBy"] ?? null), "sortOrder" =>         // line 33
($context["sortOrder"] ?? null)]), "html", null, true);
        // line 35
        echo "\"
  >
    <thead class=\"with-filters\">
      ";
        // line 38
        $this->displayBlock('product_catalog_form_table_header', $context, $blocks);
        // line 84
        echo "
      ";
        // line 85
        $this->displayBlock('product_catalog_form_table_filters', $context, $blocks);
        // line 218
        echo "    </thead>
    ";
        // line 219
        $this->displayBlock('product_catalog_form_table_items', $context, $blocks);
        // line 229
        echo "  </table>
</div>
";
    }

    // line 38
    public function block_product_catalog_form_table_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 39
        echo "        <tr class=\"column-headers\">
          <th scope=\"col\"></th>
          <th scope=\"col\" class=\"text-center\" style=\"width: 9%\">
            ";
        // line 42
        echo twig_call_macro($macros["ps"], "macro_sortable_column_header", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ID", [], "Admin.Global"), "id_product", ($context["orderBy"] ?? null), ($context["sortOrder"] ?? null)], 42, $context, $this->getSourceContext());
        echo "
          </th>
          <th scope=\"col\">
            ";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Image", [], "Admin.Global"), "html", null, true);
        echo "
          </th>
          <th scope=\"col\">
            ";
        // line 48
        echo twig_call_macro($macros["ps"], "macro_sortable_column_header", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Name", [], "Admin.Global"), "name", ($context["orderBy"] ?? null), ($context["sortOrder"] ?? null)], 48, $context, $this->getSourceContext());
        echo "
          </th>
          <th scope=\"col\" style=\"width: 9%\">
            ";
        // line 51
        echo twig_call_macro($macros["ps"], "macro_sortable_column_header", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reference", [], "Admin.Global"), "reference", ($context["orderBy"] ?? null), ($context["sortOrder"] ?? null)], 51, $context, $this->getSourceContext());
        echo "
          </th>
          <th scope=\"col\">
            ";
        // line 54
        echo twig_call_macro($macros["ps"], "macro_sortable_column_header", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Category", [], "Admin.Catalog.Feature"), "name_category", ($context["orderBy"] ?? null), ($context["sortOrder"] ?? null)], 54, $context, $this->getSourceContext());
        echo "
          </th>
          <th scope=\"col\" class=\"text-center\" style=\"width: 9%\">
            ";
        // line 57
        echo twig_call_macro($macros["ps"], "macro_sortable_column_header", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Price (tax excl.)", [], "Admin.Catalog.Feature"), "price", ($context["orderBy"] ?? null), ($context["sortOrder"] ?? null)], 57, $context, $this->getSourceContext());
        echo "
          </th>
          <th scope=\"col\" class=\"text-center\" style=\"width: 9%\">
            ";
        // line 60
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Price (tax incl.)", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
          </th>

          ";
        // line 63
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 64
            echo "          <th scope=\"col\" class=\"text-center\" style=\"width: 9%\">
            ";
            // line 65
            echo twig_call_macro($macros["ps"], "macro_sortable_column_header", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Quantity", [], "Admin.Catalog.Feature"), "sav_quantity", ($context["orderBy"] ?? null), ($context["sortOrder"] ?? null)], 65, $context, $this->getSourceContext());
            echo "
          </th>
          ";
        } else {
            // line 68
            echo "            <th></th>
          ";
        }
        // line 70
        echo "
          <th scope=\"col\" class=\"text-center\">
            ";
        // line 72
        echo twig_call_macro($macros["ps"], "macro_sortable_column_header", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "Admin.Global"), "active", ($context["orderBy"] ?? null), ($context["sortOrder"] ?? null)], 72, $context, $this->getSourceContext());
        echo "
          </th>
          ";
        // line 74
        if ((($context["has_category_filter"] ?? null) == true)) {
            // line 75
            echo "            <th scope=\"col\">
              ";
            // line 76
            echo twig_call_macro($macros["ps"], "macro_sortable_column_header", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Position", [], "Admin.Global"), "position", ($context["orderBy"] ?? null), ($context["sortOrder"] ?? null)], 76, $context, $this->getSourceContext());
            echo "
            </th>
          ";
        }
        // line 79
        echo "          <th scope=\"col\" class=\"text-right\" style=\"width: 3rem; padding-right: 2rem\">
              ";
        // line 80
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actions", [], "Admin.Global"), "html", null, true);
        echo "
          </th>
        </tr>
      ";
    }

    // line 85
    public function block_product_catalog_form_table_filters($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 86
        echo "        ";
        $context["filters_disabled"] = ($context["activate_drag_and_drop"] ?? null);
        // line 87
        echo "        <tr class=\"column-filters\">
          <td class=\"text-center\" style=\"vertical-align: middle;\">
            ";
        // line 89
        $this->displayBlock('product_catalog_filter_select_all', $context, $blocks);
        // line 102
        echo "          </td>
          <td>
            ";
        // line 104
        $this->loadTemplate("@PrestaShop/Admin/Helpers/range_inputs.html.twig", "@Product/CatalogPage/Lists/products_table.html.twig", 104)->display(twig_array_merge($context, ["input_name" => "filter_column_id_product", "min" => "0", "max" => "1000000", "minLabel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Min", [], "Admin.Global"), "maxLabel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Max", [], "Admin.Global"), "value" =>         // line 110
($context["filter_column_id_product"] ?? null), "disabled" =>         // line 111
($context["filters_disabled"] ?? null)]));
        // line 113
        echo "          </td>
          <td>&nbsp;</td>
          <td>
            <input
              type=\"text\"
              class=\"form-control\"
              placeholder=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search name", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\"
              name=\"filter_column_name\"
              value=\"";
        // line 121
        echo twig_escape_filter($this->env, ($context["filter_column_name"] ?? null), "html", null, true);
        echo "\"
              aria-label=\"";
        // line 122
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%inputId% input", ["%inputId%" => "filter_column_name"], "Admin.Global"), "html", null, true);
        echo "\"
              ";
        // line 123
        if (($context["filters_disabled"] ?? null)) {
            echo "disabled";
        }
        // line 124
        echo "            />
          </td>
          <td>
            <input
              type=\"text\"
              class=\"form-control\"
              placeholder=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search ref.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\"
              name=\"filter_column_reference\"
              value=\"";
        // line 132
        echo twig_escape_filter($this->env, ($context["filter_column_reference"] ?? null), "html", null, true);
        echo "\"
              aria-label=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%inputId% input", ["%inputId%" => "filter_column_reference"], "Admin.Global"), "html", null, true);
        echo "\"
              ";
        // line 134
        if (($context["filters_disabled"] ?? null)) {
            echo "disabled";
        }
        // line 135
        echo "            />
          </td>
          <td>
            <input
              type=\"text\"
              class=\"form-control\"
              placeholder=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search category", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\"
              name=\"filter_column_name_category\"
              value=\"";
        // line 143
        echo twig_escape_filter($this->env, ($context["filter_column_name_category"] ?? null), "html", null, true);
        echo "\"
              aria-label=\"";
        // line 144
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%inputId% input", ["%inputId%" => "filter_column_name_category"], "Admin.Global"), "html", null, true);
        echo "\"
              ";
        // line 145
        if (($context["filters_disabled"] ?? null)) {
            echo "disabled";
        }
        // line 146
        echo "            />
          </td>
          <td class=\"text-center\">
            ";
        // line 149
        $this->loadTemplate("@PrestaShop/Admin/Helpers/range_inputs.html.twig", "@Product/CatalogPage/Lists/products_table.html.twig", 149)->display(twig_array_merge($context, ["input_name" => "filter_column_price", "min" => "0", "max" => "1000000", "minLabel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Min", [], "Admin.Global"), "maxLabel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Max", [], "Admin.Global"), "value" =>         // line 155
($context["filter_column_price"] ?? null), "disabled" =>         // line 156
($context["filters_disabled"] ?? null)]));
        // line 158
        echo "          </td>
          <td class=\"text-center\"></td>
          ";
        // line 160
        if ($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 161
            echo "          <td class=\"text-center\">
            ";
            // line 162
            $this->loadTemplate("@PrestaShop/Admin/Helpers/range_inputs.html.twig", "@Product/CatalogPage/Lists/products_table.html.twig", 162)->display(twig_array_merge($context, ["input_name" => "filter_column_sav_quantity", "min" => "-1000000", "max" => "1000000", "minLabel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Min", [], "Admin.Global"), "maxLabel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Max", [], "Admin.Global"), "value" =>             // line 168
($context["filter_column_sav_quantity"] ?? null), "disabled" =>             // line 169
($context["filters_disabled"] ?? null)]));
            // line 171
            echo "          </td>
          ";
        } else {
            // line 173
            echo "            <td></td>
          ";
        }
        // line 175
        echo "
          <td id=\"product_filter_column_active\" class=\"text-center\">
            <div class=\"form-select\">
              <select class=\"custom-select\"  name=\"filter_column_active\"";
        // line 178
        if (($context["filters_disabled"] ?? null)) {
            echo " disabled";
        }
        echo " aria-label=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%inputId% select", ["%inputId%" => "filter_column_active"], "Admin.Global"), "html", null, true);
        echo "\"
                >
                <option value=\"\"></option>
                <option value=\"1\" ";
        // line 181
        if ((array_key_exists("filter_column_active", $context) && (($context["filter_column_active"] ?? null) == "1"))) {
            echo "selected=\"selected\"";
        }
        echo ">Active</option>
                <option value=\"0\" ";
        // line 182
        if ((array_key_exists("filter_column_active", $context) && (($context["filter_column_active"] ?? null) == "0"))) {
            echo "selected=\"selected\"";
        }
        echo ">Inactive</option>
              </select>
            </div>
          </td>
          ";
        // line 186
        if ((($context["has_category_filter"] ?? null) == true)) {
            // line 187
            echo "            <td>
              ";
            // line 188
            if ( !($context["activate_drag_and_drop"] ?? null)) {
                // line 189
                echo "                <input type=\"button\" class=\"btn btn-outline-secondary\" name=\"products_filter_position_asc\" value=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reorder", [], "Admin.Actions"), "html", null, true);
                echo "\" onclick=\"productOrderPrioritiesTable();\" />
                ";
            } else {
                // line 191
                echo "                <input type=\"button\" id=\"bulk_edition_save_keep\" class=\"btn\" onclick=\"bulkProductAction(this, 'edition');\" value=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save & refresh", [], "Admin.Actions");
                echo "\" />
              ";
            }
            // line 193
            echo "            </td>
          ";
        }
        // line 195
        echo "          <td class=\"text-right\" style=\"width: 5rem\">
            <button
              type=\"submit\"
              class=\"btn btn-primary\"
              name=\"products_filter_submit\"
              title=\"";
        // line 200
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search", [], "Admin.Actions"), "html", null, true);
        echo "\"
            >
              <i class=\"material-icons\">search</i>
              ";
        // line 203
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search", [], "Admin.Actions"), "html", null, true);
        echo "
            </button>
            <button
              type=\"reset\"
              class=\"btn btn-link\"
              name=\"products_filter_reset\"
              onclick=\"productColumnFilterReset(\$(this).closest('tr.column-filters'))\"
              title=\"";
        // line 210
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reset", [], "Admin.Actions"), "html", null, true);
        echo "\"
            >
              <i class=\"material-icons\">clear</i>
              ";
        // line 213
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reset", [], "Admin.Actions"), "html", null, true);
        echo "
            </button>
          </td>
        </tr>
      ";
    }

    // line 89
    public function block_product_catalog_filter_select_all($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 90
        echo "              <div class=\"md-checkbox md-checkbox-inline\">
                <label>
                  <input
                    type=\"checkbox\"
                    id=\"bulk_action_select_all\"
                    onclick=\"\$('#product_catalog_list').find('table td.checkbox-column input:checkbox').prop('checked', \$(this).prop('checked')); updateBulkMenu();\"
                    value=\"\"
                  >
                  <i class=\"md-checkbox-control\"></i>
                </label>
              </div>
            ";
    }

    // line 219
    public function block_product_catalog_form_table_items($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 220
        echo "      ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle\\Controller\\Admin\\ProductController::listAction", ["limit" =>         // line 221
($context["limit"] ?? null), "offset" =>         // line 222
($context["offset"] ?? null), "orderBy" =>         // line 223
($context["orderBy"] ?? null), "sortOrder" =>         // line 224
($context["sortOrder"] ?? null), "products" =>         // line 225
($context["products"] ?? null), "last_sql" =>         // line 226
($context["last_sql"] ?? null)]));
        // line 227
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "@Product/CatalogPage/Lists/products_table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  423 => 227,  421 => 226,  420 => 225,  419 => 224,  418 => 223,  417 => 222,  416 => 221,  414 => 220,  410 => 219,  395 => 90,  391 => 89,  382 => 213,  376 => 210,  366 => 203,  360 => 200,  353 => 195,  349 => 193,  343 => 191,  337 => 189,  335 => 188,  332 => 187,  330 => 186,  321 => 182,  315 => 181,  305 => 178,  300 => 175,  296 => 173,  292 => 171,  290 => 169,  289 => 168,  288 => 162,  285 => 161,  283 => 160,  279 => 158,  277 => 156,  276 => 155,  275 => 149,  270 => 146,  266 => 145,  262 => 144,  258 => 143,  253 => 141,  245 => 135,  241 => 134,  237 => 133,  233 => 132,  228 => 130,  220 => 124,  216 => 123,  212 => 122,  208 => 121,  203 => 119,  195 => 113,  193 => 111,  192 => 110,  191 => 104,  187 => 102,  185 => 89,  181 => 87,  178 => 86,  174 => 85,  166 => 80,  163 => 79,  157 => 76,  154 => 75,  152 => 74,  147 => 72,  143 => 70,  139 => 68,  133 => 65,  130 => 64,  128 => 63,  122 => 60,  116 => 57,  110 => 54,  104 => 51,  98 => 48,  92 => 45,  86 => 42,  81 => 39,  77 => 38,  71 => 229,  69 => 219,  66 => 218,  64 => 85,  61 => 84,  59 => 38,  54 => 35,  52 => 33,  51 => 32,  50 => 31,  49 => 30,  48 => 29,  43 => 26,  41 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/CatalogPage/Lists/products_table.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\Lists\\products_table.html.twig");
    }
}
