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

/* @Product/CatalogPage/Blocks/filters.html.twig */
class __TwigTemplate_d04a8d54900451968ba0b4922a32f386 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'product_catalog_filter_by_categories' => [$this, 'block_product_catalog_filter_by_categories'],
            'product_catalog_filter_bulk_actions' => [$this, 'block_product_catalog_filter_bulk_actions'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "<div id=\"catalog-actions\">
      ";
        // line 26
        $this->displayBlock('product_catalog_filter_by_categories', $context, $blocks);
        // line 83
        echo "
      ";
        // line 84
        $this->displayBlock('product_catalog_filter_bulk_actions', $context, $blocks);
        // line 136
        echo "</div>
";
    }

    // line 26
    public function block_product_catalog_filter_by_categories($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "        <div id=\"product_catalog_category_tree_filter\" class=\"d-inline-block dropdown dropdown-clickable mr-2 mb-2\">
          <button
                  class=\"btn btn-outline-secondary dropdown-toggle\"
                  type=\"button\"
                  data-toggle=\"dropdown\"
                  aria-haspopup=\"true\"
                  aria-expanded=\"false\"
          >
              ";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Filter by categories", [], "Admin.Actions"), "html", null, true);
        echo "
              ";
        // line 36
        if ((array_key_exists("selected_category", $context) &&  !(null === ($context["selected_category"] ?? null)))) {
            // line 37
            echo "                  (";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["selected_category"] ?? null), "getName", [], "method", false, false, false, 37), "html", null, true);
            echo ")
              ";
        }
        // line 39
        echo "          </button>
          <div id=\"tree-categories\" class=\"dropdown-menu\">
            <div class=\"categories-tree-actions\">
              <a
                href=\"#\"
                name=\"product_catalog_category_tree_filter_expand\"
                onclick=\"productCategoryFilterExpand(\$('div#product_catalog_category_tree_filter'), this);\"
                id=\"product_catalog_category_tree_filter_expand\"
              >
                <i class=\"material-icons\">expand_more</i>
                  ";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Expand", [], "Admin.Actions"), "html", null, true);
        echo "
              </a>
              <a
                href=\"#\"
                name=\"product_catalog_category_tree_filter_collapse\"
                onclick=\"productCategoryFilterCollapse(\$('div#product_catalog_category_tree_filter'), this);\"
                id=\"product_catalog_category_tree_filter_collapse\"
              >
                <i class=\"material-icons\">expand_less</i>
                  ";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Collapse", [], "Admin.Actions"), "html", null, true);
        echo "
              </a>
              <a
                href=\"#\"
                name=\"product_catalog_category_tree_filter_reset\"
                onclick=\"productCategoryFilterReset(\$('div#product_catalog_category_tree_filter'));\"
                id=\"product_catalog_category_tree_filter_reset\"
              >
                <i class=\"material-icons\">radio_button_unchecked</i>
                  ";
        // line 67
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Unselect", [], "Admin.Actions"), "html", null, true);
        echo "
              </a>
            </div>
              ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["categories"] ?? null), 'widget');
        echo "
          </div>
          ";
        // line 72
        if ((array_key_exists("selected_category", $context) &&  !(null === ($context["selected_category"] ?? null)))) {
            // line 73
            echo "            <button
              class=\"btn btn-link\"
              type=\"reset\"
              name=\"categories_filter_reset\"
              onclick=\"productCategoryFilterReset(\$('div#product_catalog_category_tree_filter'));\">
              <i class=\"material-icons\">clear</i> ";
            // line 78
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Clear filter", [], "Admin.Actions"), "html", null, true);
            echo "
            </button>
          ";
        }
        // line 81
        echo "        </div>
      ";
    }

    // line 84
    public function block_product_catalog_filter_bulk_actions($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 85
        echo "        <div
            class=\"d-inline-block mb-2\"
            bulkurl=\"";
        // line 87
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_bulk_action", ["action" => "activate_all"]);
        echo "\"
            massediturl=\"";
        // line 88
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_mass_edit_action", ["action" => "sort"]);
        echo "\"
            redirecturl=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_catalog", ["limit" => ($context["limit"] ?? null), "offset" => ($context["offset"] ?? null), "orderBy" => ($context["orderBy"] ?? null), "sortOrder" => ($context["sortOrder"] ?? null)]), "html", null, true);
        echo "\"
            redirecturlnextpage=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_catalog", ["limit" => ($context["limit"] ?? null), "offset" => (($context["offset"] ?? null) + ($context["limit"] ?? null)), "orderBy" => ($context["orderBy"] ?? null), "sortOrder" => ($context["sortOrder"] ?? null)]), "html", null, true);
        echo "\"
        >
          ";
        // line 92
        $context["buttons_action"] = [0 => ["onclick" => "bulkProductAction(this, 'activate_all');", "icon" => "radio_button_checked", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Activate selection", [], "Admin.Actions")], 1 => ["onclick" => "bulkProductAction(this, 'deactivate_all');", "icon" => "radio_button_unchecked", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deactivate selection", [], "Admin.Actions")]];
        // line 103
        echo "
          ";
        // line 104
        $context["buttons_action"] = twig_array_merge(($context["buttons_action"] ?? null), [0 => ["divider" => true], 1 => ["onclick" => "bulkProductAction(this, 'duplicate_all');", "icon" => "content_copy", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Duplicate selection", [], "Admin.Actions")]]);
        // line 113
        echo "

          ";
        // line 115
        $context["buttons_action"] = twig_array_merge(($context["buttons_action"] ?? null), [0 => ["divider" => true], 1 => ["onclick" => "bulkProductAction(this, 'delete_all');", "icon" => "delete", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete selection", [], "Admin.Actions")]]);
        // line 124
        echo "
          ";
        // line 125
        $this->loadTemplate("@PrestaShop/Admin/Helpers/dropdown_menu.html.twig", "@Product/CatalogPage/Blocks/filters.html.twig", 125)->display(twig_array_merge($context, ["div_style" => "btn-group dropdown bulk-catalog", "button_id" => "product_bulk_menu", "disabled" => true, "menu_label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bulk actions", [], "Admin.Global"), "buttonType" => "outline-secondary", "menu_icon" => "icon-caret-up", "items" =>         // line 132
($context["buttons_action"] ?? null)]));
        // line 134
        echo "        </div>
      ";
    }

    public function getTemplateName()
    {
        return "@Product/CatalogPage/Blocks/filters.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  191 => 134,  189 => 132,  188 => 125,  185 => 124,  183 => 115,  179 => 113,  177 => 104,  174 => 103,  172 => 92,  167 => 90,  163 => 89,  159 => 88,  155 => 87,  151 => 85,  147 => 84,  142 => 81,  136 => 78,  129 => 73,  127 => 72,  122 => 70,  116 => 67,  104 => 58,  92 => 49,  80 => 39,  74 => 37,  72 => 36,  68 => 35,  58 => 27,  54 => 26,  49 => 136,  47 => 84,  44 => 83,  42 => 26,  39 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/CatalogPage/Blocks/filters.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\Blocks\\filters.html.twig");
    }
}
