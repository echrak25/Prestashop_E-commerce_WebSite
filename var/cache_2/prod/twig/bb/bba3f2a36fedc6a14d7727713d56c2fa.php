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

/* @PrestaShop/Admin/TwigTemplateForm/entity_search_input.html.twig */
class __TwigTemplate_6c42f01563fe48179ef938d41bb21d17 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'entity_search_input_widget' => [$this, 'block_entity_search_input_widget'],
            'entity_search_list_layout' => [$this, 'block_entity_search_list_layout'],
            'entity_search_table_layout' => [$this, 'block_entity_search_table_layout'],
            'entity_item_row' => [$this, 'block_entity_item_row'],
            'entity_item_list_row' => [$this, 'block_entity_item_list_row'],
            'entity_item_table_row' => [$this, 'block_entity_item_table_row'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('entity_search_input_widget', $context, $blocks);
        // line 75
        echo "
";
        // line 76
        $this->displayBlock('entity_search_list_layout', $context, $blocks);
        // line 82
        echo "
";
        // line 83
        $this->displayBlock('entity_search_table_layout', $context, $blocks);
        // line 112
        echo "
";
        // line 113
        $this->displayBlock('entity_item_row', $context, $blocks);
        // line 120
        echo "
";
        // line 121
        $this->displayBlock('entity_item_list_row', $context, $blocks);
        // line 135
        $this->displayBlock('entity_item_table_row', $context, $blocks);
    }

    // line 26
    public function block_entity_search_input_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "  ";
        // line 28
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-prototype-template" =>         // line 29
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["prototype"] ?? null), 'row'), "data-prototype-index" => twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 30
($context["prototype"] ?? null), "vars", [], "any", false, false, false, 30), "name", [], "any", false, false, false, 30), "html_attr"), "data-prototype-mapping" => json_encode(        // line 31
($context["prototype_mapping"] ?? null)), "data-identifier-field" =>         // line 32
($context["identifier_field"] ?? null), "data-filtered-identities" => json_encode(        // line 33
($context["filtered_identities"] ?? null)), "data-remove-modal" => json_encode(        // line 34
($context["remove_modal"] ?? null)), "data-remote-url" =>         // line 35
($context["remote_url"] ?? null), "data-data-limit" =>         // line 36
($context["limit"] ?? null), "data-min-length" =>         // line 37
($context["min_length"] ?? null), "data-allow-delete" => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 38
($context["form"] ?? null), "vars", [], "any", false, false, false, 38), "allow_delete", [], "any", false, false, false, 38)) ? (1) : (0)), "data-suggestion-field" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 39
($context["form"] ?? null), "vars", [], "any", false, false, false, 39), "suggestion_field", [], "any", false, false, false, 39)]);
        // line 41
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 41)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 41), "")) : ("")) . " entity-search-widget"))]);
        // line 44
        echo "  <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
    ";
        // line 46
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 46), "allow_search", [], "any", false, false, false, 46)) {
            // line 47
            echo "      <div class=\"search search-with-icon\">";
            // line 48
            $context["attr"] = twig_array_merge(($context["search_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source,             // line 49
($context["search_attr"] ?? null), "class", [], "any", true, true, false, 49)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["search_attr"] ?? null), "class", [], "any", false, false, false, 49), "")) : ("")) . " entity-search-input form-control")), "autocomplete" => "off", "placeholder" =>             // line 51
($context["placeholder"] ?? null), "type" => "text"]);
            // line 54
            $context["id"] = (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 54), "id", [], "any", false, false, false, 54) . "_search_input");
            // line 55
            echo "<input ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo " />
      </div>
    ";
        }
        // line 58
        $this->displayBlock("form_help", $context, $blocks);
        // line 60
        $context["id"] = (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 60), "id", [], "any", false, false, false, 60) . "_list");
        // line 61
        if ((($context["list_layout"] ?? null) == "table")) {
            // line 62
            $this->displayBlock("entity_search_table_layout", $context, $blocks);
        } else {
            // line 64
            $this->displayBlock("entity_search_list_layout", $context, $blocks);
        }
        // line 66
        echo "    ";
        if ( !(null === ($context["empty_state"] ?? null))) {
            // line 67
            echo "      <div class=\"alert alert-info empty-entity-list mt-2\" role=\"alert\">
        <p class=\"alert-text\">
          ";
            // line 69
            echo ($context["empty_state"] ?? null);
            echo "
        </p>
      </div>
    ";
        }
        // line 73
        echo "  </div>
";
    }

    // line 76
    public function block_entity_search_list_layout($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 77
        $context["attr"] = twig_array_merge(($context["list_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["list_attr"] ?? null), "class", [], "any", true, true, false, 77)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["list_attr"] ?? null), "class", [], "any", false, false, false, 77), "")) : ("")) . " entities-list entities-list-container"))]);
        // line 78
        echo "<ul ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">";
        // line 79
        $this->displayBlock("form_rows", $context, $blocks);
        // line 80
        echo "</ul>
";
    }

    // line 83
    public function block_entity_search_table_layout($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 84
        $context["attr"] = twig_array_merge(($context["list_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["list_attr"] ?? null), "class", [], "any", true, true, false, 84)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["list_attr"] ?? null), "class", [], "any", false, false, false, 84), "")) : ("")) . " entities-list-container"))]);
        // line 85
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
    <div class=\"row\">
      <div class=\"col-sm\">
        <table class=\"table\">
          <thead class=\"thead-default\">
            <tr>
            ";
        // line 91
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["prototype"] ?? null), "children", [], "any", false, false, false, 91));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 92
            echo "              ";
            $context["childType"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 92), "block_prefixes", [], "any", false, false, false, 92), 1, [], "any", false, false, false, 92);
            // line 93
            echo "              ";
            if ((($context["childType"] ?? null) != "hidden")) {
                // line 94
                echo "                <th>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 94), "label", [], "any", false, false, false, 94), "html", null, true);
                echo "</th>
              ";
            }
            // line 96
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "
            ";
        // line 99
        echo "            ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 99), "allow_delete", [], "any", false, false, false, 99)) {
            // line 100
            echo "              <th></th>
            ";
        }
        // line 102
        echo "            </tr>
          </thead>
          <tbody class=\"entities-list\">";
        // line 105
        $this->displayBlock("form_rows", $context, $blocks);
        // line 106
        echo "</tbody>
        </table>
      </div>
    </div>
  </div>
";
    }

    // line 113
    public function block_entity_item_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 114
        echo "  ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, false, false, 114), "vars", [], "any", false, false, false, 114), "list_layout", [], "any", false, false, false, 114) == "table")) {
            // line 115
            $this->displayBlock("entity_item_table_row", $context, $blocks);
        } else {
            // line 117
            $this->displayBlock("entity_item_list_row", $context, $blocks);
        }
    }

    // line 121
    public function block_entity_item_list_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 122
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 122)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 122), "")) : ("")) . " media entity-item"))]);
        // line 123
        echo "  <li ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
    <div class=\"media-left\">
      ";
        // line 125
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "image", [], "any", false, false, false, 125), 'widget');
        echo "
    </div>
    <div class=\"media-body media-middle\">
      ";
        // line 128
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "name", [], "any", false, false, false, 128), 'widget');
        echo "
      <i class=\"material-icons entity-item-delete\">clear</i>
    </div>
    ";
        // line 131
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id", [], "any", false, false, false, 131), 'widget');
        echo "
  </li>
";
    }

    // line 135
    public function block_entity_item_table_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 136
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 136)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 136), "")) : ("")) . " entity-item"))]);
        // line 137
        echo "  <tr ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
  ";
        // line 138
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "children", [], "any", false, false, false, 138));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 139
            echo "    ";
            $context["childType"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 139), "block_prefixes", [], "any", false, false, false, 139), 1, [], "any", false, false, false, 139);
            // line 140
            echo "    ";
            if ((($context["childType"] ?? null) == "hidden")) {
                // line 141
                echo "      ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget');
                echo "
    ";
            } else {
                // line 143
                echo "    <td>
      ";
                // line 144
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget');
                echo "
    </td>
    ";
            }
            // line 147
            echo "  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
        echo "
  ";
        // line 150
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, false, false, 150), "vars", [], "any", false, false, false, 150), "allow_delete", [], "any", false, false, false, 150)) {
            // line 151
            echo "    <td>
      <i class=\"material-icons entity-item-delete\">clear</i>
    </td>
  ";
        }
        // line 155
        echo "  </tr>";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/TwigTemplateForm/entity_search_input.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  328 => 155,  322 => 151,  319 => 150,  316 => 148,  310 => 147,  304 => 144,  301 => 143,  295 => 141,  292 => 140,  289 => 139,  285 => 138,  280 => 137,  278 => 136,  274 => 135,  267 => 131,  261 => 128,  255 => 125,  249 => 123,  246 => 122,  242 => 121,  237 => 117,  234 => 115,  231 => 114,  227 => 113,  218 => 106,  216 => 105,  212 => 102,  208 => 100,  205 => 99,  202 => 97,  196 => 96,  190 => 94,  187 => 93,  184 => 92,  180 => 91,  170 => 85,  168 => 84,  164 => 83,  159 => 80,  157 => 79,  153 => 78,  151 => 77,  147 => 76,  142 => 73,  135 => 69,  131 => 67,  128 => 66,  125 => 64,  122 => 62,  120 => 61,  118 => 60,  116 => 58,  109 => 55,  107 => 54,  105 => 51,  104 => 49,  103 => 48,  101 => 47,  98 => 46,  93 => 44,  91 => 41,  89 => 39,  88 => 38,  87 => 37,  86 => 36,  85 => 35,  84 => 34,  83 => 33,  82 => 32,  81 => 31,  80 => 30,  79 => 29,  78 => 28,  76 => 27,  72 => 26,  68 => 135,  66 => 121,  63 => 120,  61 => 113,  58 => 112,  56 => 83,  53 => 82,  51 => 76,  48 => 75,  46 => 26,  43 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/TwigTemplateForm/entity_search_input.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\TwigTemplateForm\\entity_search_input.html.twig");
    }
}
