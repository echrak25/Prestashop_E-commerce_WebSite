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

/* @PrestaShop/Admin/TwigTemplateForm/bootstrap_4_horizontal_layout.html.twig */
class __TwigTemplate_26831f0ba70756e415e14eae7994590a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        // line 25
        $_trait_0 = $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_layout.html.twig", "@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_horizontal_layout.html.twig", 25);
        if (!$_trait_0->isTraitable()) {
            throw new RuntimeError('Template "'."@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_layout.html.twig".'" cannot be used as a trait.', 25, $this->source);
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            [
                'form_start' => [$this, 'block_form_start'],
                'form_label' => [$this, 'block_form_label'],
                'form_label_class' => [$this, 'block_form_label_class'],
                'form_row' => [$this, 'block_form_row'],
                'checkbox_row' => [$this, 'block_checkbox_row'],
                'radio_row' => [$this, 'block_radio_row'],
                'checkbox_radio_row' => [$this, 'block_checkbox_radio_row'],
                'submit_row' => [$this, 'block_submit_row'],
                'form_group_class' => [$this, 'block_form_group_class'],
                'form_row_class' => [$this, 'block_form_row_class'],
                'ip_address_text_widget' => [$this, 'block_ip_address_text_widget'],
                'switch_widget' => [$this, 'block_switch_widget'],
                'text_with_length_counter_widget' => [$this, 'block_text_with_length_counter_widget'],
                'number_widget' => [$this, 'block_number_widget'],
                'integer_widget' => [$this, 'block_integer_widget'],
                'form_unit' => [$this, 'block_form_unit'],
                'form_unit_prepend' => [$this, 'block_form_unit_prepend'],
                'amount_currency_widget' => [$this, 'block_amount_currency_widget'],
            ]
        );
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        $this->displayBlock('form_start', $context, $blocks);
        // line 30
        echo "
";
        // line 32
        echo "
";
        // line 33
        $this->displayBlock('form_label', $context, $blocks);
        // line 43
        echo "
";
        // line 44
        $this->displayBlock('form_label_class', $context, $blocks);
        // line 47
        echo "
";
        // line 49
        echo "
";
        // line 50
        $this->displayBlock('form_row', $context, $blocks);
        // line 62
        echo "
";
        // line 63
        $this->displayBlock('checkbox_row', $context, $blocks);
        // line 66
        echo "
";
        // line 67
        $this->displayBlock('radio_row', $context, $blocks);
        // line 70
        echo "
";
        // line 71
        $this->displayBlock('checkbox_radio_row', $context, $blocks);
        // line 82
        echo "
";
        // line 83
        $this->displayBlock('submit_row', $context, $blocks);
        // line 93
        echo "
";
        // line 94
        $this->displayBlock('form_group_class', $context, $blocks);
        // line 97
        echo "
";
        // line 98
        $this->displayBlock('form_row_class', $context, $blocks);
        // line 101
        echo "
";
        // line 102
        $this->displayBlock('ip_address_text_widget', $context, $blocks);
        // line 110
        echo "
";
        // line 111
        $this->displayBlock('switch_widget', $context, $blocks);
        // line 116
        echo "
";
        // line 117
        $this->displayBlock('text_with_length_counter_widget', $context, $blocks);
        // line 144
        $this->displayBlock('number_widget', $context, $blocks);
        // line 154
        $this->displayBlock('integer_widget', $context, $blocks);
        // line 164
        $this->displayBlock('form_unit', $context, $blocks);
        // line 171
        echo "
";
        // line 172
        $this->displayBlock('form_unit_prepend', $context, $blocks);
        // line 179
        echo "
";
        // line 180
        $this->displayBlock('amount_currency_widget', $context, $blocks);
    }

    // line 26
    public function block_form_start($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 27)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 27), "")) : ("")) . " form-horizontal"))]);
        // line 28
        $this->displayParentBlock("form_start", $context, $blocks);
    }

    // line 33
    public function block_form_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        ob_start(function () { return ''; });
        // line 35
        echo "        ";
        if ((($context["label"] ?? null) === false)) {
            // line 36
            echo "            <div class=\"";
            $this->displayBlock("form_label_class", $context, $blocks);
            echo "\"></div>
        ";
        } else {
            // line 38
            echo "            ";
            $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 38)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 38), "")) : ("")) . " ") .             $this->renderBlock("form_label_class", $context, $blocks)))]);
            // line 39
            $this->displayParentBlock("form_label", $context, $blocks);
        }
        // line 41
        echo "    ";
        $___internal_parse_0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 34
        echo twig_spaceless($___internal_parse_0_);
    }

    // line 44
    public function block_form_label_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 45
        echo "form-control-label";
    }

    // line 50
    public function block_form_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 51
        ob_start(function () { return ''; });
        // line 52
        echo "        <div class=\"";
        $this->displayBlock("form_row_class", $context, $blocks);
        echo " ";
        if ((( !($context["compound"] ?? null) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
            echo " has-error";
        }
        echo "\">
            ";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
        echo "
            <div class=\"";
        // line 54
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">
                ";
        // line 55
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
                ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
                ";
        // line 57
        $this->displayBlock("form_help", $context, $blocks);
        echo "
            </div>
        </div>
    ";
        $___internal_parse_1_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 51
        echo twig_spaceless($___internal_parse_1_);
    }

    // line 63
    public function block_checkbox_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 64
        $this->displayBlock("checkbox_radio_row", $context, $blocks);
    }

    // line 67
    public function block_radio_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 68
        $this->displayBlock("checkbox_radio_row", $context, $blocks);
    }

    // line 71
    public function block_checkbox_radio_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 72
        ob_start(function () { return ''; });
        // line 73
        echo "        <div class=\"form-group";
        if ( !($context["valid"] ?? null)) {
            echo " has-error";
        }
        echo "\">
            <div class=\"";
        // line 74
        $this->displayBlock("form_label_class", $context, $blocks);
        echo "\"></div>
            <div class=\"";
        // line 75
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">
                ";
        // line 76
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
                ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
            </div>
        </div>
    ";
        $___internal_parse_2_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 72
        echo twig_spaceless($___internal_parse_2_);
    }

    // line 83
    public function block_submit_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 84
        ob_start(function () { return ''; });
        // line 85
        echo "        <div class=\"form-group\">
            <div class=\"";
        // line 86
        $this->displayBlock("form_label_class", $context, $blocks);
        echo "\"></div>
            <div class=\"";
        // line 87
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">
                ";
        // line 88
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
            </div>
        </div>
    ";
        $___internal_parse_3_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 84
        echo twig_spaceless($___internal_parse_3_);
    }

    // line 94
    public function block_form_group_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 95
        echo "col-sm";
    }

    // line 98
    public function block_form_row_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 99
        echo "form-group row";
    }

    // line 102
    public function block_ip_address_text_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 103
        echo "<div class=\"input-group\">";
        // line 104
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 105
        echo "<button type=\"button\" class=\"btn btn-outline-primary add_ip_button\" data-ip=\"";
        echo twig_escape_filter($this->env, ($context["currentIp"] ?? null), "html", null, true);
        echo "\">
        <i class=\"material-icons\">add_circle</i> ";
        // line 106
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add my IP", [], "Admin.Actions"), "html", null, true);
        echo "
    </button>
</div>
";
    }

    // line 111
    public function block_switch_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 112
        echo "<div class=\"input-group\">";
        // line 113
        $this->displayParentBlock("switch_widget", $context, $blocks);
        // line 114
        echo "</div>
";
    }

    // line 117
    public function block_text_with_length_counter_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 118
        echo "  <div class=\"input-group js-text-with-length-counter\">
    ";
        // line 119
        $context["current_length"] = (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 119), "max_length", [], "any", false, false, false, 119) - twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 119), "value", [], "any", false, false, false, 119)));
        // line 120
        echo "
    ";
        // line 121
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 121), "position", [], "any", false, false, false, 121) == "before")) {
            // line 122
            echo "      <div class=\"input-group-prepend\">
        <span class=\"input-group-text js-countable-text\">";
            // line 123
            echo twig_escape_filter($this->env, ($context["current_length"] ?? null), "html", null, true);
            echo "</span>
      </div>
    ";
        }
        // line 126
        echo "
    ";
        // line 127
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-max-length" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 127), "max_length", [], "any", false, false, false, 127), "maxlength" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 127), "max_length", [], "any", false, false, false, 127), "class" => "js-countable-input"]);
        // line 128
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ($context["input_attr"] ?? null));
        // line 130
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 130), "input", [], "any", false, false, false, 130) == "textarea")) {
            // line 131
            $this->displayBlock("textarea_widget", $context, $blocks);
        } else {
            // line 133
            $this->displayBlock("form_widget_simple", $context, $blocks);
        }
        // line 135
        echo "
    ";
        // line 136
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 136), "position", [], "any", false, false, false, 136) == "after")) {
            // line 137
            echo "      <div class=\"input-group-append\">
        <span class=\"input-group-text js-countable-text\">";
            // line 138
            echo twig_escape_filter($this->env, ($context["current_length"] ?? null), "html", null, true);
            echo "</span>
      </div>
    ";
        }
        // line 141
        echo "  </div>
";
    }

    // line 144
    public function block_number_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 145
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "text")) : ("text"));
        // line 146
        echo "<div class=\"input-group\">";
        // line 147
        $this->displayBlock("form_unit_prepend", $context, $blocks);
        // line 148
        echo "<div class=\"w-100\">";
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "</div>";
        // line 149
        $this->displayBlock("form_unit", $context, $blocks);
        // line 150
        echo "</div>
  ";
        // line 151
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 154
    public function block_integer_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 155
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "number")) : ("number"));
        // line 156
        echo "<div class=\"input-group\">";
        // line 157
        $this->displayBlock("form_unit_prepend", $context, $blocks);
        // line 158
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 159
        $this->displayBlock("form_unit", $context, $blocks);
        // line 160
        echo "</div>
  ";
        // line 161
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 164
    public function block_form_unit($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 165
        echo "  ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 165), "unit", [], "any", true, true, false, 165) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 165), "prepend_unit", [], "any", false, false, false, 165))) {
            // line 166
            echo "    <div class=\"input-group-append\">
      <span class=\"input-group-text\">";
            // line 167
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 167), "unit", [], "any", false, false, false, 167), "html", null, true);
            echo "</span>
    </div>
  ";
        }
    }

    // line 172
    public function block_form_unit_prepend($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 173
        echo "  ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 173), "unit", [], "any", true, true, false, 173) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 173), "prepend_unit", [], "any", false, false, false, 173))) {
            // line 174
            echo "    <div class=\"input-group-prepend\">
      <span class=\"input-group-text\">";
            // line 175
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 175), "unit", [], "any", false, false, false, 175), "html", null, true);
            echo "</span>
    </div>
  ";
        }
    }

    // line 180
    public function block_amount_currency_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 181
        echo "  <div class=\"input-group\">
    <input id=\"";
        // line 182
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "amount", [], "any", false, false, false, 182), "vars", [], "any", false, false, false, 182), "id", [], "any", false, false, false, 182), "html", null, true);
        echo "\" type=\"text\" class=\"form-control\" name=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "amount", [], "any", false, false, false, 182), "vars", [], "any", false, false, false, 182), "full_name", [], "any", false, false, false, 182), "html", null, true);
        echo "\" required>
    <div class=\"input-group-append\">
      ";
        // line 184
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "amount", [], "any", false, true, false, 184), "vars", [], "any", false, true, false, 184), "unit", [], "any", true, true, false, 184)) {
            // line 185
            echo "        <span class=\"input-group-text\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "amount", [], "any", false, false, false, 185), "vars", [], "any", false, false, false, 185), "unit", [], "any", false, false, false, 185), "html", null, true);
            echo "</span>
        ";
            // line 186
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id_currency", [], "any", false, false, false, 186), 'widget');
            echo "
      ";
        } else {
            // line 188
            echo "        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id_currency", [], "any", false, false, false, 188), 'widget', ["attr" => ["class" => "form-control"]]);
            echo "
      ";
        }
        // line 190
        echo "    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_horizontal_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  540 => 190,  534 => 188,  529 => 186,  524 => 185,  522 => 184,  515 => 182,  512 => 181,  508 => 180,  500 => 175,  497 => 174,  494 => 173,  490 => 172,  482 => 167,  479 => 166,  476 => 165,  472 => 164,  468 => 161,  465 => 160,  463 => 159,  461 => 158,  459 => 157,  457 => 156,  455 => 155,  451 => 154,  447 => 151,  444 => 150,  442 => 149,  438 => 148,  436 => 147,  434 => 146,  432 => 145,  428 => 144,  423 => 141,  417 => 138,  414 => 137,  412 => 136,  409 => 135,  406 => 133,  403 => 131,  401 => 130,  399 => 128,  397 => 127,  394 => 126,  388 => 123,  385 => 122,  383 => 121,  380 => 120,  378 => 119,  375 => 118,  371 => 117,  366 => 114,  364 => 113,  362 => 112,  358 => 111,  350 => 106,  345 => 105,  343 => 104,  341 => 103,  337 => 102,  333 => 99,  329 => 98,  325 => 95,  321 => 94,  317 => 84,  310 => 88,  306 => 87,  302 => 86,  299 => 85,  297 => 84,  293 => 83,  289 => 72,  282 => 77,  278 => 76,  274 => 75,  270 => 74,  263 => 73,  261 => 72,  257 => 71,  253 => 68,  249 => 67,  245 => 64,  241 => 63,  237 => 51,  230 => 57,  226 => 56,  222 => 55,  218 => 54,  214 => 53,  205 => 52,  203 => 51,  199 => 50,  195 => 45,  191 => 44,  187 => 34,  184 => 41,  181 => 39,  178 => 38,  172 => 36,  169 => 35,  167 => 34,  163 => 33,  159 => 28,  157 => 27,  153 => 26,  149 => 180,  146 => 179,  144 => 172,  141 => 171,  139 => 164,  137 => 154,  135 => 144,  133 => 117,  130 => 116,  128 => 111,  125 => 110,  123 => 102,  120 => 101,  118 => 98,  115 => 97,  113 => 94,  110 => 93,  108 => 83,  105 => 82,  103 => 71,  100 => 70,  98 => 67,  95 => 66,  93 => 63,  90 => 62,  88 => 50,  85 => 49,  82 => 47,  80 => 44,  77 => 43,  75 => 33,  72 => 32,  69 => 30,  67 => 26,  30 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_horizontal_layout.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\TwigTemplateForm\\bootstrap_4_horizontal_layout.html.twig");
    }
}
