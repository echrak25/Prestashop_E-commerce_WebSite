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

/* @PrestaShop/Admin/TwigTemplateForm/bootstrap_4_layout.html.twig */
class __TwigTemplate_c669e238afd9cefc17cb534fb971e920 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        // line 25
        $_trait_0 = $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/form_div_layout.html.twig", "@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_layout.html.twig", 25);
        if (!$_trait_0->isTraitable()) {
            throw new RuntimeError('Template "'."@PrestaShop/Admin/TwigTemplateForm/form_div_layout.html.twig".'" cannot be used as a trait.', 25, $this->source);
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        // line 26
        $_trait_1 = $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/typeahead.html.twig", "@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_layout.html.twig", 26);
        if (!$_trait_1->isTraitable()) {
            throw new RuntimeError('Template "'."@PrestaShop/Admin/TwigTemplateForm/typeahead.html.twig".'" cannot be used as a trait.', 26, $this->source);
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        // line 27
        $_trait_2 = $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/material.html.twig", "@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_layout.html.twig", 27);
        if (!$_trait_2->isTraitable()) {
            throw new RuntimeError('Template "'."@PrestaShop/Admin/TwigTemplateForm/material.html.twig".'" cannot be used as a trait.', 27, $this->source);
        }
        $_trait_2_blocks = $_trait_2->getBlocks();

        // line 28
        $_trait_3 = $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/translatable_choice.html.twig", "@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_layout.html.twig", 28);
        if (!$_trait_3->isTraitable()) {
            throw new RuntimeError('Template "'."@PrestaShop/Admin/TwigTemplateForm/translatable_choice.html.twig".'" cannot be used as a trait.', 28, $this->source);
        }
        $_trait_3_blocks = $_trait_3->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks,
            $_trait_2_blocks,
            $_trait_3_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            [
                'form_widget_simple' => [$this, 'block_form_widget_simple'],
                'textarea_widget' => [$this, 'block_textarea_widget'],
                'button_widget' => [$this, 'block_button_widget'],
                'money_widget' => [$this, 'block_money_widget'],
                'percent_widget' => [$this, 'block_percent_widget'],
                'datetime_widget' => [$this, 'block_datetime_widget'],
                'date_widget' => [$this, 'block_date_widget'],
                'time_widget' => [$this, 'block_time_widget'],
                'choice_widget_collapsed' => [$this, 'block_choice_widget_collapsed'],
                'choice_widget_expanded' => [$this, 'block_choice_widget_expanded'],
                'checkbox_widget' => [$this, 'block_checkbox_widget'],
                'radio_widget' => [$this, 'block_radio_widget'],
                'choice_tree_widget' => [$this, 'block_choice_tree_widget'],
                'choice_tree_item_widget' => [$this, 'block_choice_tree_item_widget'],
                'translatefields_widget' => [$this, 'block_translatefields_widget'],
                'translate_fields_widget' => [$this, 'block_translate_fields_widget'],
                'translate_text_widget' => [$this, 'block_translate_text_widget'],
                'translate_textarea_widget' => [$this, 'block_translate_textarea_widget'],
                'date_picker_widget' => [$this, 'block_date_picker_widget'],
                'date_range_widget' => [$this, 'block_date_range_widget'],
                'color_picker_widget' => [$this, 'block_color_picker_widget'],
                'search_and_reset_widget' => [$this, 'block_search_and_reset_widget'],
                'switch_widget' => [$this, 'block_switch_widget'],
                '_form_step6_attachments_widget' => [$this, 'block__form_step6_attachments_widget'],
                'form_label' => [$this, 'block_form_label'],
                'choice_label' => [$this, 'block_choice_label'],
                'checkbox_label' => [$this, 'block_checkbox_label'],
                'radio_label' => [$this, 'block_radio_label'],
                'checkbox_radio_label' => [$this, 'block_checkbox_radio_label'],
                'form_row' => [$this, 'block_form_row'],
                'button_row' => [$this, 'block_button_row'],
                'choice_row' => [$this, 'block_choice_row'],
                'date_row' => [$this, 'block_date_row'],
                'time_row' => [$this, 'block_time_row'],
                'datetime_row' => [$this, 'block_datetime_row'],
                'checkbox_row' => [$this, 'block_checkbox_row'],
                'radio_row' => [$this, 'block_radio_row'],
                'form_errors' => [$this, 'block_form_errors'],
                'material_choice_table_widget' => [$this, 'block_material_choice_table_widget'],
                'material_multiple_choice_table_widget' => [$this, 'block_material_multiple_choice_table_widget'],
                'translatable_widget' => [$this, 'block_translatable_widget'],
                'birthday_widget' => [$this, 'block_birthday_widget'],
                'file_widget' => [$this, 'block_file_widget'],
                'shop_restriction_checkbox_widget' => [$this, 'block_shop_restriction_checkbox_widget'],
                'generatable_text_widget' => [$this, 'block_generatable_text_widget'],
                'text_with_recommended_length_widget' => [$this, 'block_text_with_recommended_length_widget'],
                'integer_min_max_filter_widget' => [$this, 'block_integer_min_max_filter_widget'],
                'number_min_max_filter_widget' => [$this, 'block_number_min_max_filter_widget'],
                'form_help' => [$this, 'block_form_help'],
                'form_hint' => [$this, 'block_form_hint'],
                'custom_content_widget' => [$this, 'block_custom_content_widget'],
                'text_widget' => [$this, 'block_text_widget'],
            ]
        );
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "
";
        // line 31
        echo "
";
        // line 32
        $this->displayBlock('form_widget_simple', $context, $blocks);
        // line 38
        echo "
";
        // line 39
        $this->displayBlock('textarea_widget', $context, $blocks);
        // line 43
        echo "
";
        // line 44
        $this->displayBlock('button_widget', $context, $blocks);
        // line 48
        echo "
";
        // line 49
        $this->displayBlock('money_widget', $context, $blocks);
        // line 65
        echo "
";
        // line 66
        $this->displayBlock('percent_widget', $context, $blocks);
        // line 74
        echo "
";
        // line 75
        $this->displayBlock('datetime_widget', $context, $blocks);
        // line 88
        echo "
";
        // line 89
        $this->displayBlock('date_widget', $context, $blocks);
        // line 107
        echo "
";
        // line 108
        $this->displayBlock('time_widget', $context, $blocks);
        // line 122
        echo "
";
        // line 123
        $this->displayBlock('choice_widget_collapsed', $context, $blocks);
        // line 128
        echo "
";
        // line 129
        $this->displayBlock('choice_widget_expanded', $context, $blocks);
        // line 150
        echo "
";
        // line 151
        $this->displayBlock('checkbox_widget', $context, $blocks);
        // line 161
        echo "
";
        // line 162
        $this->displayBlock('radio_widget', $context, $blocks);
        // line 172
        echo "
";
        // line 173
        $this->displayBlock('choice_tree_widget', $context, $blocks);
        // line 183
        echo "
";
        // line 184
        $this->displayBlock('choice_tree_item_widget', $context, $blocks);
        // line 222
        echo "
";
        // line 223
        $this->displayBlock('translatefields_widget', $context, $blocks);
        // line 248
        echo "
";
        // line 249
        $this->displayBlock('translate_fields_widget', $context, $blocks);
        // line 255
        echo "
";
        // line 256
        $this->displayBlock('translate_text_widget', $context, $blocks);
        // line 293
        echo "
";
        // line 294
        $this->displayBlock('translate_textarea_widget', $context, $blocks);
        // line 335
        echo "
";
        // line 336
        $this->displayBlock('date_picker_widget', $context, $blocks);
        // line 350
        echo "
";
        // line 351
        $this->displayBlock('date_range_widget', $context, $blocks);
        // line 359
        echo "
";
        // line 360
        $this->displayBlock('color_picker_widget', $context, $blocks);
        // line 368
        echo "
";
        // line 369
        $this->displayBlock('search_and_reset_widget', $context, $blocks);
        // line 394
        echo "
";
        // line 395
        $this->displayBlock('switch_widget', $context, $blocks);
        // line 415
        echo "
";
        // line 416
        $this->displayBlock('_form_step6_attachments_widget', $context, $blocks);
        // line 445
        echo "
";
        // line 447
        echo "
";
        // line 448
        $this->displayBlock('form_label', $context, $blocks);
        // line 451
        echo "
";
        // line 452
        $this->displayBlock('choice_label', $context, $blocks);
        // line 457
        echo "
";
        // line 458
        $this->displayBlock('checkbox_label', $context, $blocks);
        // line 461
        echo "
";
        // line 462
        $this->displayBlock('radio_label', $context, $blocks);
        // line 465
        echo "
";
        // line 466
        $this->displayBlock('checkbox_radio_label', $context, $blocks);
        // line 495
        echo "
";
        // line 497
        echo "
";
        // line 498
        $this->displayBlock('form_row', $context, $blocks);
        // line 505
        echo "
";
        // line 506
        $this->displayBlock('button_row', $context, $blocks);
        // line 511
        echo "
";
        // line 512
        $this->displayBlock('choice_row', $context, $blocks);
        // line 516
        echo "
";
        // line 517
        $this->displayBlock('date_row', $context, $blocks);
        // line 521
        echo "
";
        // line 522
        $this->displayBlock('time_row', $context, $blocks);
        // line 526
        echo "
";
        // line 527
        $this->displayBlock('datetime_row', $context, $blocks);
        // line 531
        echo "
";
        // line 532
        $this->displayBlock('checkbox_row', $context, $blocks);
        // line 538
        echo "
";
        // line 539
        $this->displayBlock('radio_row', $context, $blocks);
        // line 545
        echo "
";
        // line 547
        echo "
";
        // line 548
        $this->displayBlock('form_errors', $context, $blocks);
        // line 577
        echo "

";
        // line 580
        echo "
";
        // line 581
        $this->displayBlock('material_choice_table_widget', $context, $blocks);
        // line 617
        echo "
";
        // line 618
        $this->displayBlock('material_multiple_choice_table_widget', $context, $blocks);
        // line 670
        echo "
";
        // line 671
        $this->displayBlock('translatable_widget', $context, $blocks);
        // line 707
        echo "
";
        // line 708
        $this->displayBlock('birthday_widget', $context, $blocks);
        // line 732
        echo "
";
        // line 733
        $this->displayBlock('file_widget', $context, $blocks);
        // line 760
        echo "
";
        // line 761
        $this->displayBlock('shop_restriction_checkbox_widget', $context, $blocks);
        // line 777
        echo "
";
        // line 778
        $this->displayBlock('generatable_text_widget', $context, $blocks);
        // line 792
        echo "
";
        // line 793
        $this->displayBlock('text_with_recommended_length_widget', $context, $blocks);
        // line 818
        echo "
";
        // line 819
        $this->displayBlock('integer_min_max_filter_widget', $context, $blocks);
        // line 823
        echo "
";
        // line 824
        $this->displayBlock('number_min_max_filter_widget', $context, $blocks);
        // line 828
        echo "
";
        // line 829
        $this->displayBlock('form_help', $context, $blocks);
        // line 834
        echo "
";
        // line 835
        $this->displayBlock('form_hint', $context, $blocks);
        // line 842
        echo "
";
        // line 843
        $this->displayBlock('custom_content_widget', $context, $blocks);
        // line 846
        echo "
";
        // line 847
        $this->displayBlock('text_widget', $context, $blocks);
    }

    // line 32
    public function block_form_widget_simple($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        if (( !array_key_exists("type", $context) || ("file" != ($context["type"] ?? null)))) {
            // line 34
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 34)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 34), "")) : ("")) . " form-control"))]);
        }
        // line 36
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
    }

    // line 39
    public function block_textarea_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 40
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 40)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 40), "")) : ("")) . " form-control"))]);
        // line 41
        $this->displayParentBlock("textarea_widget", $context, $blocks);
    }

    // line 44
    public function block_button_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 45
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 45)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 45), "btn-default")) : ("btn-default")) . " btn"))]);
        // line 46
        $this->displayParentBlock("button_widget", $context, $blocks);
    }

    // line 49
    public function block_money_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 50
        echo "<div class=\"input-group money-type\">
        ";
        // line 51
        $context["prepend"] = ("{{" == twig_slice($this->env, ($context["money_pattern"] ?? null), 0, 2));
        // line 52
        echo "        ";
        if ( !($context["prepend"] ?? null)) {
            // line 53
            echo "            <div class=\"input-group-prepend\">
                <span class=\"input-group-text\">";
            // line 54
            echo twig_escape_filter($this->env, twig_replace_filter(($context["money_pattern"] ?? null), ["{{ widget }}" => ""]), "html", null, true);
            echo "</span>
            </div>
        ";
        }
        // line 57
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 58
        if (($context["prepend"] ?? null)) {
            // line 59
            echo "            <div class=\"input-group-append\">
                <span class=\"input-group-text\">";
            // line 60
            echo twig_escape_filter($this->env, twig_replace_filter(($context["money_pattern"] ?? null), ["{{ widget }}" => ""]), "html", null, true);
            echo "</span>
            </div>
        ";
        }
        // line 63
        echo "    </div>";
    }

    // line 66
    public function block_percent_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 67
        echo "<div class=\"input-group\">";
        // line 68
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 69
        echo "<div class=\"input-group-append\">
            <span class=\"input-group-text\">%</span>
        </div>
    </div>";
    }

    // line 75
    public function block_datetime_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 76
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 77
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 79
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 79)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 79), "")) : ("")) . " form-inline"))]);
            // line 80
            echo "<div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 81
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, false, 81), 'errors');
            // line 82
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "time", [], "any", false, false, false, 82), 'errors');
            // line 83
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, false, 83), 'widget', ["datetime" => true]);
            // line 84
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "time", [], "any", false, false, false, 84), 'widget', ["datetime" => true]);
            // line 85
            echo "</div>";
        }
    }

    // line 89
    public function block_date_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 90
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 91
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 93
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 93)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 93), "")) : ("")) . " form-inline"))]);
            // line 94
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 95
                echo "<div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">";
            }
            // line 97
            echo twig_replace_filter(($context["date_pattern"] ?? null), ["{{ year }}" =>             // line 98
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "year", [], "any", false, false, false, 98), 'widget'), "{{ month }}" =>             // line 99
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "month", [], "any", false, false, false, 99), 'widget'), "{{ day }}" =>             // line 100
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "day", [], "any", false, false, false, 100), 'widget')]);
            // line 102
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 103
                echo "</div>";
            }
        }
    }

    // line 108
    public function block_time_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 109
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 110
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 112
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 112)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 112), "")) : ("")) . " form-inline"))]);
            // line 113
            if (( !array_key_exists("datetime", $context) || (false == ($context["datetime"] ?? null)))) {
                // line 114
                echo "<div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">";
            }
            // line 116
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "hour", [], "any", false, false, false, 116), 'widget');
            echo ":";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "minute", [], "any", false, false, false, 116), 'widget');
            if (($context["with_seconds"] ?? null)) {
                echo ":";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "second", [], "any", false, false, false, 116), 'widget');
            }
            // line 117
            echo "        ";
            if (( !array_key_exists("datetime", $context) || (false == ($context["datetime"] ?? null)))) {
                // line 118
                echo "</div>";
            }
        }
    }

    // line 123
    public function block_choice_widget_collapsed($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 124
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 124)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 124), "")) : ("")) . " custom-select"))]);
        // line 125
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["aria-label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%inputId% input", ["%inputId%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 125), "id", [], "any", false, false, false, 125)], "Admin.Global")]);
        // line 126
        $this->displayParentBlock("choice_widget_collapsed", $context, $blocks);
    }

    // line 129
    public function block_choice_widget_expanded($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 130
        if (twig_in_filter("-inline", ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 130)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 130), "")) : ("")))) {
            // line 131
            echo "<div class=\"control-group\">";
            // line 132
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 133
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', ["parent_label_class" => ((twig_get_attribute($this->env, $this->source,                 // line 134
($context["label_attr"] ?? null), "class", [], "any", true, true, false, 134)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 134), "")) : ("")), "translation_domain" =>                 // line 135
($context["choice_translation_domain"] ?? null)]);
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 138
            echo "</div>";
        } else {
            // line 140
            echo "<div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 141
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 142
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', ["parent_label_class" => ((twig_get_attribute($this->env, $this->source,                 // line 143
($context["label_attr"] ?? null), "class", [], "any", true, true, false, 143)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 143), "")) : ("")), "translation_domain" =>                 // line 144
($context["choice_translation_domain"] ?? null)]);
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 147
            echo "</div>";
        }
    }

    // line 151
    public function block_checkbox_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 152
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter(($context["parent_label_class"] ?? null), "")) : (""));
        // line 153
        if (twig_in_filter("checkbox-inline", ($context["parent_label_class"] ?? null))) {
            // line 154
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)]);
        } else {
            // line 156
            echo "<div class=\"checkbox\">";
            // line 157
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)]);
            // line 158
            echo "</div>";
        }
    }

    // line 162
    public function block_radio_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 163
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter(($context["parent_label_class"] ?? null), "")) : (""));
        // line 164
        if (twig_in_filter("radio-inline", ($context["parent_label_class"] ?? null))) {
            // line 165
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("radio_widget", $context, $blocks)]);
        } else {
            // line 167
            echo "<div class=\"radio form-check form-check-radio\">";
            // line 168
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("radio_widget", $context, $blocks)]);
            // line 169
            echo "</div>";
        }
    }

    // line 173
    public function block_choice_tree_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 174
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo " class=\"category-tree-overflow\">
        <ul class=\"category-tree\">
            <li class=\"form-control-label text-right main-category\">";
        // line 176
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Main category", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</li>";
        // line 177
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["choices"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 178
            echo "            ";
            $this->displayBlock("choice_tree_item_widget", $context, $blocks);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 180
        echo "</ul>
    </div>";
    }

    // line 184
    public function block_choice_tree_item_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 185
        echo "<li";
        if ((array_key_exists("defaultHidden", $context) && (($context["defaultHidden"] ?? null) === true))) {
            echo " class=\"more\"";
        }
        echo ">
        ";
        // line 186
        $context["checked"] = (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 186), "submitted_values", [], "any", true, true, false, 186) && twig_get_attribute($this->env, $this->source, ($context["submitted_values"] ?? null), twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "id_category", [], "any", false, false, false, 186), [], "array", true, true, false, 186));
        // line 187
        echo "        ";
        if (($context["multiple"] ?? null)) {
            // line 188
            echo "<div class=\"checkbox\">
                <label>
                    <input type=\"checkbox\" name=\"";
            // line 190
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 190), "full_name", [], "any", false, false, false, 190), "html", null, true);
            echo "[tree][]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "id_category", [], "any", false, false, false, 190), "html", null, true);
            echo "\"";
            if (($context["checked"] ?? null)) {
                echo " checked=\"checked\"";
            }
            echo " class=\"category\">
                    ";
            // line 191
            if ((twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "active", [], "any", true, true, false, 191) && (twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "active", [], "any", false, false, false, 191) == 0))) {
                // line 192
                echo "                        <i>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "name", [], "any", false, false, false, 192), "html", null, true);
                echo "</i>";
            } else {
                // line 194
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "name", [], "any", false, false, false, 194), "html", null, true);
                echo "
                    ";
            }
            // line 196
            echo "                    ";
            if (array_key_exists("defaultCategory", $context)) {
                // line 197
                echo "                        <input type=\"radio\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "id_category", [], "any", false, false, false, 197), "html", null, true);
                echo "\" name=\"ignore\" class=\"default-category\" />
                    ";
            }
            // line 199
            echo "                </label>
            </div>";
        } else {
            // line 202
            echo "<div class=\"radio\">
              <label>
                <input type=\"radio\" name=\"form[";
            // line 204
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 204), "id", [], "any", false, false, false, 204), "html", null, true);
            echo "][tree]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "id_category", [], "any", false, false, false, 204), "html", null, true);
            echo "\"";
            if (($context["checked"] ?? null)) {
                echo " checked=\"checked\"";
            }
            echo " class=\"category\"";
            if (($context["required"] ?? null)) {
                echo " required";
            }
            echo ">
                    ";
            // line 205
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "name", [], "any", false, false, false, 205), "html", null, true);
            echo "
                    ";
            // line 206
            if (array_key_exists("defaultCategory", $context)) {
                // line 207
                echo "                        <input type=\"radio\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "id_category", [], "any", false, false, false, 207), "html", null, true);
                echo "\" name=\"ignore\" class=\"default-category\" />
                    ";
            }
            // line 209
            echo "                </label>
            </div>";
        }
        // line 212
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "children", [], "any", true, true, false, 212)) {
            // line 213
            echo "            <ul";
            if ((array_key_exists("defaultHidden", $context) && (($context["defaultHidden"] ?? null) === true))) {
                echo " style=\"display: none;\"";
            }
            echo ">
                ";
            // line 214
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "children", [], "any", false, false, false, 214));
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
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 215
                echo "                    ";
                $context["child"] = $context["item"];
                // line 216
                echo "                    ";
                $this->displayBlock("choice_tree_item_widget", $context, $blocks);
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 218
            echo "</ul>
        ";
        }
        // line 220
        echo "    </li>";
    }

    // line 223
    public function block_translatefields_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 224
        echo "    ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
    <div class=\"translations tabbable\" id=\"";
        // line 225
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 225), "id", [], "any", false, false, false, 225), "html", null, true);
        echo "\">
        ";
        // line 226
        if (((($context["hideTabs"] ?? null) == false) && (twig_length_filter($this->env, ($context["form"] ?? null)) > 1))) {
            // line 227
            echo "        <ul class=\"translationsLocales nav nav-pills\">
            ";
            // line 228
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
                // line 229
                echo "                <li class=\"nav-item\">
                    <a href=\"#\" data-locale=\"";
                // line 230
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 230), "label", [], "any", false, false, false, 230), "html", null, true);
                echo "\" class=\"";
                if ((twig_get_attribute($this->env, $this->source, ($context["defaultLocale"] ?? null), "id_lang", [], "any", false, false, false, 230) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 230), "name", [], "any", false, false, false, 230))) {
                    echo "active";
                }
                echo " nav-link\" data-toggle=\"tab\" data-target=\".translationsFields-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 230), "id", [], "any", false, false, false, 230), "html", null, true);
                echo "\">
                        ";
                // line 231
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 231), "label", [], "any", false, false, false, 231)), "html", null, true);
                echo "
                    </a>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 235
            echo "        </ul>
        ";
        }
        // line 237
        echo "
        <div class=\"translationsFields tab-content\">
            ";
        // line 239
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
            // line 240
            echo "                <div data-locale=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 240), "label", [], "any", false, false, false, 240), "html", null, true);
            echo "\" class=\"translationsFields-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 240), "id", [], "any", false, false, false, 240), "html", null, true);
            echo " tab-pane translation-field ";
            if (((($context["hideTabs"] ?? null) == false) && (twig_length_filter($this->env, ($context["form"] ?? null)) > 1))) {
                echo "panel panel-default";
            }
            echo " ";
            if ((twig_get_attribute($this->env, $this->source, ($context["defaultLocale"] ?? null), "id_lang", [], "any", false, false, false, 240) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 240), "name", [], "any", false, false, false, 240))) {
                echo "show active";
            }
            echo " ";
            if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 240), "valid", [], "any", false, false, false, 240)) {
                echo "field-error";
            }
            echo " translation-label-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 240), "label", [], "any", false, false, false, 240), "html", null, true);
            echo "\">
                    ";
            // line 241
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["translationsFields"], 'errors');
            echo "
                    ";
            // line 242
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["translationsFields"], 'widget');
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 245
        echo "        </div>
    </div>
";
    }

    // line 249
    public function block_translate_fields_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 250
        if (( !array_key_exists("type", $context) || ("file" != ($context["type"] ?? null)))) {
            // line 251
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 251)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 251), "")) : ("")) . " form-control"))]);
        }
        // line 253
        $this->displayParentBlock("translate_fields_widget", $context, $blocks);
    }

    // line 256
    public function block_translate_text_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 257
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
    <div class=\"input-group locale-input-group js-locale-input-group\">
        ";
        // line 259
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["translateField"]) {
            // line 260
            echo "            ";
            $context["classes"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, true, false, 260), "attr", [], "any", false, true, false, 260), "class", [], "any", true, true, false, 260)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, true, false, 260), "attr", [], "any", false, true, false, 260), "class", [], "any", false, false, false, 260), "")) : ("")) . " js-locale-input");
            // line 261
            echo "            ";
            $context["classes"] = ((($context["classes"] ?? null) . " js-locale-") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, false, false, 261), "label", [], "any", false, false, false, 261));
            // line 262
            echo "
            ";
            // line 263
            if ((twig_get_attribute($this->env, $this->source, ($context["default_locale"] ?? null), "id_lang", [], "any", false, false, false, 263) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, false, false, 263), "name", [], "any", false, false, false, 263))) {
                // line 264
                echo "                ";
                $context["classes"] = (($context["classes"] ?? null) . " d-none");
                // line 265
                echo "            ";
            }
            // line 266
            echo "
            ";
            // line 267
            $context["attr"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, false, false, 267), "attr", [], "any", false, false, false, 267);
            // line 268
            echo "
            ";
            // line 269
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["translateField"], 'widget', ["attr" => ["class" => twig_trim_filter(($context["classes"] ?? null))]]);
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translateField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 271
        echo "
        ";
        // line 272
        if ( !($context["hide_locales"] ?? null)) {
            // line 273
            echo "        <div class=\"dropdown\">
            <button class=\"btn btn-outline-secondary dropdown-toggle js-locale-btn\"
                    type=\"button\"
                    data-toggle=\"dropdown\"
                    aria-haspopup=\"true\"
                    aria-expanded=\"false\"
                    id=\"";
            // line 279
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 279), "id", [], "any", false, false, false, 279), "html", null, true);
            echo "\"
            >
                ";
            // line 281
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 281), "default_locale", [], "any", false, false, false, 281), "iso_code", [], "any", false, false, false, 281), "html", null, true);
            echo "
            </button>

            <div class=\"dropdown-menu locale-dropdown-menu\" aria-labelledby=\"";
            // line 284
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 284), "id", [], "any", false, false, false, 284), "html", null, true);
            echo "\">
                ";
            // line 285
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locales"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["locale"]) {
                // line 286
                echo "                    <span class=\"dropdown-item js-locale-item\" data-locale=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "iso_code", [], "any", false, false, false, 286), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "name", [], "any", false, false, false, 286), "html", null, true);
                echo "</span>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['locale'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 288
            echo "            </div>
        </div>
        ";
        }
        // line 291
        echo "    </div>";
    }

    // line 294
    public function block_translate_textarea_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 295
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
  <div class=\"input-group locale-input-group js-locale-input-group\">
    ";
        // line 297
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["textarea"]) {
            // line 298
            echo "      ";
            $context["classes"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["textarea"], "vars", [], "any", false, true, false, 298), "attr", [], "any", false, true, false, 298), "class", [], "any", true, true, false, 298)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["textarea"], "vars", [], "any", false, true, false, 298), "attr", [], "any", false, true, false, 298), "class", [], "any", false, false, false, 298), "")) : ("")) . " js-locale-input");
            // line 299
            echo "      ";
            $context["classes"] = ((($context["classes"] ?? null) . " js-locale-") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["textarea"], "vars", [], "any", false, false, false, 299), "label", [], "any", false, false, false, 299));
            // line 300
            echo "
      ";
            // line 301
            if ((twig_get_attribute($this->env, $this->source, ($context["default_locale"] ?? null), "id_lang", [], "any", false, false, false, 301) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["textarea"], "vars", [], "any", false, false, false, 301), "name", [], "any", false, false, false, 301))) {
                // line 302
                echo "        ";
                $context["classes"] = (($context["classes"] ?? null) . " d-none");
                // line 303
                echo "      ";
            }
            // line 304
            echo "
      <div class=\"";
            // line 305
            echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
            echo "\">
        ";
            // line 306
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["textarea"], 'widget', ["attr" => ["class" => twig_trim_filter(($context["classes"] ?? null))]]);
            echo "
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['textarea'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 309
        echo "
    ";
        // line 310
        if (($context["show_locale_select"] ?? null)) {
            // line 311
            echo "      <div class=\"dropdown\">
        <button class=\"btn btn-outline-secondary dropdown-toggle js-locale-btn\"
                type=\"button\"
                data-toggle=\"dropdown\"
                aria-haspopup=\"true\"
                aria-expanded=\"false\"
                id=\"";
            // line 317
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 317), "id", [], "any", false, false, false, 317), "html", null, true);
            echo "\"
        >
          ";
            // line 319
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 319), "default_locale", [], "any", false, false, false, 319), "iso_code", [], "any", false, false, false, 319), "html", null, true);
            echo "
        </button>

        <div class=\"dropdown-menu locale-dropdown-menu\" aria-labelledby=\"";
            // line 322
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 322), "id", [], "any", false, false, false, 322), "html", null, true);
            echo "\">
          ";
            // line 323
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locales"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["locale"]) {
                // line 324
                echo "            <span class=\"dropdown-item js-locale-item\"
                  data-locale=\"";
                // line 325
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "iso_code", [], "any", false, false, false, 325), "html", null, true);
                echo "\"
            >
              ";
                // line 327
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "name", [], "any", false, false, false, 327), "html", null, true);
                echo "
            </span>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['locale'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 330
            echo "        </div>
      </div>
    ";
        }
        // line 333
        echo "  </div>";
    }

    // line 336
    public function block_date_picker_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 337
        echo "  ";
        ob_start(function () { return ''; });
        // line 338
        echo "    ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 338)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 338), "")) : ("")) . " datepicker form-control"))]);
        // line 339
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["aria-label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%inputId% input", ["%inputId%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 339), "id", [], "any", false, false, false, 339)], "Admin.Global")]);
        // line 340
        echo "<div class=\"input-group datepicker\">
      <input type=\"text\" data-format=\"";
        // line 341
        echo twig_escape_filter($this->env, ($context["date_format"] ?? null), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ( !twig_test_empty(($context["value"] ?? null))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\" ";
        }
        echo "/>
      <div class=\"input-group-append\">
        <div class=\"input-group-text\">
          <i class=\"material-icons\">date_range</i>
        </div>
      </div>
    </div>
  ";
        $___internal_parse_4_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 337
        echo twig_spaceless($___internal_parse_4_);
    }

    // line 351
    public function block_date_range_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 352
        echo "  ";
        ob_start(function () { return ''; });
        // line 353
        echo "    ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "from", [], "any", false, false, false, 353), 'widget');
        echo "
    ";
        // line 354
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "from", [], "any", false, false, false, 354), 'errors');
        echo "
    ";
        // line 355
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "to", [], "any", false, false, false, 355), 'widget');
        echo "
    ";
        // line 356
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "to", [], "any", false, false, false, 356), 'errors');
        echo "
  ";
        $___internal_parse_5_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 352
        echo twig_spaceless($___internal_parse_5_);
    }

    // line 360
    public function block_color_picker_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 361
        echo "  ";
        ob_start(function () { return ''; });
        // line 362
        echo "    ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 362)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 362), "")) : ("")) . " form-control colorpicker"))]);
        // line 363
        echo "    <div class=\"input-group colorpicker\">
      <input type=\"text\" ";
        // line 364
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ( !twig_test_empty(($context["value"] ?? null))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\" ";
        }
        echo "/>
    </div>
  ";
        $___internal_parse_6_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 361
        echo twig_spaceless($___internal_parse_6_);
    }

    // line 369
    public function block_search_and_reset_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 370
        echo "    ";
        ob_start(function () { return ''; });
        // line 371
        echo "        <button type=\"submit\"
                class=\"btn btn-primary grid-search-button d-block\"
                title=\"";
        // line 373
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search", [], "Admin.Actions"), "html", null, true);
        echo "\"
                name=\"";
        // line 374
        echo twig_escape_filter($this->env, ($context["full_name"] ?? null), "html", null, true);
        echo "[search]\"
        >
          <i class=\"material-icons\">search</i>
          ";
        // line 377
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search", [], "Admin.Actions"), "html", null, true);
        echo "
        </button>
      ";
        // line 379
        if (($context["show_reset_button"] ?? null)) {
            // line 380
            echo "          <div class=\"js-grid-reset-button\">
            <button type=\"reset\"
                    name=\"";
            // line 382
            echo twig_escape_filter($this->env, ($context["full_name"] ?? null), "html", null, true);
            echo "[reset]\"
                    class=\"btn btn-link js-reset-search btn d-block grid-reset-button\"
                    data-url=\"";
            // line 384
            echo twig_escape_filter($this->env, ($context["reset_url"] ?? null), "html", null, true);
            echo "\"
                    data-redirect=\"";
            // line 385
            echo twig_escape_filter($this->env, ($context["redirect_url"] ?? null), "html", null, true);
            echo "\"
            >
              <i class=\"material-icons\">clear</i>
              ";
            // line 388
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reset", [], "Admin.Actions"), "html", null, true);
            echo "
            </button>
          </div>
      ";
        }
        // line 392
        echo "    ";
        $___internal_parse_7_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 370
        echo twig_spaceless($___internal_parse_7_);
    }

    // line 395
    public function block_switch_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 396
        echo "    ";
        ob_start(function () { return ''; });
        // line 397
        echo "    <span class=\"ps-switch\">
        ";
        // line 398
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["choices"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["choice"]) {
            // line 399
            echo "            ";
            $context["inputId"] = ((($context["id"] ?? null) . "_") . twig_get_attribute($this->env, $this->source, $context["choice"], "value", [], "any", false, false, false, 399));
            // line 400
            echo "            <input id=\"";
            echo twig_escape_filter($this->env, ($context["inputId"] ?? null), "html", null, true);
            echo "\"
                ";
            // line 401
            $this->displayBlock("attributes", $context, $blocks);
            echo "
                name=\"";
            // line 402
            echo twig_escape_filter($this->env, ($context["full_name"] ?? null), "html", null, true);
            echo "\"
                value=\"";
            // line 403
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["choice"], "value", [], "any", false, false, false, 403), "html", null, true);
            echo "\"
                ";
            // line 404
            if (Symfony\Bridge\Twig\Extension\twig_is_selected_choice($context["choice"], ($context["value"] ?? null))) {
                echo "checked=\"\"";
            }
            // line 405
            echo "                ";
            if (($context["disabled"] ?? null)) {
                echo "disabled=\"\"";
            }
            // line 406
            echo "                type=\"radio\"
                aria-label=\"";
            // line 407
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["choice"], "label", [], "any", false, false, false, 407), [], ($context["choice_translation_domain"] ?? null)), "html", null, true);
            echo "\"
                >
            <label for=\"";
            // line 409
            echo twig_escape_filter($this->env, ($context["inputId"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["choice"], "label", [], "any", false, false, false, 409), [], ($context["choice_translation_domain"] ?? null)), "html", null, true);
            echo "</label>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['choice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 411
        echo "        <span class=\"slide-button\"></span>
    </span>
    ";
        $___internal_parse_8_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 396
        echo twig_spaceless($___internal_parse_8_);
    }

    // line 416
    public function block__form_step6_attachments_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 417
        echo "    <div class=\"js-options-no-attachments ";
        echo (((twig_length_filter($this->env, ($context["form"] ?? null)) > 0)) ? ("hide") : (""));
        echo "\">
        <small>";
        // line 418
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("There is no attachment yet.", [], "Admin.Catalog.Notification"), "html", null, true);
        echo "</small>
    </div>
    <div id=\"product-attachments\" class=\"panel panel-default\">
      <div class=\"panel-body js-options-with-attachments ";
        // line 421
        echo (((twig_length_filter($this->env, ($context["form"] ?? null)) == 0)) ? ("hide") : (""));
        echo "\">
        <div>
          <table id=\"product-attachment-file\" class=\"table\">
            <thead class=\"thead-default\">
              <tr>
                <th class=\"col-md-3\">";
        // line 426
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Title", [], "Admin.Global"), "html", null, true);
        echo "</th>
                <th class=\"col-md-6\">";
        // line 427
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("File name", [], "Admin.Global"), "html", null, true);
        echo "</th>
                <th class=\"col-md-2\">";
        // line 428
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Type", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
              </tr>
            </thead>
            <tbody>";
        // line 432
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 433
            echo "              <tr>
                <td class=\"col-md-3\">";
            // line 434
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget');
            echo "</td>
                <td class=\"col-md-6 file-name\"><span>";
            // line 435
            echo twig_escape_filter($this->env, (($__internal_compile_0 = (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 435), "attr", [], "any", false, false, false, 435), "data", [], "any", false, false, false, 435)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 435)] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["file_name"] ?? null) : null), "html", null, true);
            echo "</span></td>
                <td class=\"col-md-2\">";
            // line 436
            echo twig_escape_filter($this->env, (($__internal_compile_2 = (($__internal_compile_3 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 436), "attr", [], "any", false, false, false, 436), "data", [], "any", false, false, false, 436)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 436)] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["mime"] ?? null) : null), "html", null, true);
            echo "</td>
              </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 439
        echo "</tbody>
          </table>
        </div>
      </div>
    </div>
";
    }

    // line 448
    public function block_form_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 449
        $this->displayParentBlock("form_label", $context, $blocks);
    }

    // line 452
    public function block_choice_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 454
        $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter(twig_replace_filter(((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 454)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 454), "")) : ("")), ["checkbox-inline" => "", "radio-inline" => ""]))]);
        // line 455
        $this->displayBlock("form_label", $context, $blocks);
    }

    // line 458
    public function block_checkbox_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 459
        $this->displayBlock("checkbox_radio_label", $context, $blocks);
    }

    // line 462
    public function block_radio_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 463
        $this->displayBlock("checkbox_radio_label", $context, $blocks);
    }

    // line 466
    public function block_checkbox_radio_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 467
        echo "    ";
        // line 468
        echo "    ";
        if (array_key_exists("widget", $context)) {
            // line 469
            echo "      ";
            if (($context["required"] ?? null)) {
                // line 470
                echo "        ";
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 470)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 470), "")) : ("")) . " required"))]);
                // line 471
                echo "      ";
            }
            // line 472
            echo "      ";
            if (array_key_exists("parent_label_class", $context)) {
                // line 473
                echo "          ";
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 473)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 473), "")) : ("")) . " ") . ($context["parent_label_class"] ?? null)))]);
                // line 474
                echo "      ";
            }
            // line 475
            echo "      ";
            if (( !(($context["label"] ?? null) === false) && twig_test_empty(($context["label"] ?? null)))) {
                // line 476
                echo "          ";
                $context["label"] = $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize(($context["name"] ?? null));
                // line 477
                echo "      ";
            }
            // line 478
            echo "
      ";
            // line 479
            if ((array_key_exists("material_design", $context) || twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "material_design", [], "any", true, true, false, 479))) {
                // line 480
                echo "        <div class=\"md-checkbox md-checkbox-inline\">
          <label";
                // line 481
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["label_attr"] ?? null));
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    echo " ";
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                    echo "\"";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo ">";
                // line 482
                echo ($context["widget"] ?? null);
                // line 483
                echo "<i class=\"md-checkbox-control\"></i>";
                // line 484
                echo (( !(($context["label"] ?? null) === false)) ? ((((($context["translation_domain"] ?? null) === false)) ? (($context["label"] ?? null)) : (($context["label"] ?? null)))) : (""));
                // line 485
                echo "</label>
        </div>
      ";
            } else {
                // line 488
                echo "      <label";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["label_attr"] ?? null));
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    echo " ";
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                    if (($context["attrname"] === "class")) {
                        echo " form-check-label";
                    }
                    echo "\"";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                if ((twig_length_filter($this->env, ($context["label_attr"] ?? null)) <= 0)) {
                    echo " class=\"form-check-label\"";
                }
                echo ">";
                // line 489
                echo ($context["widget"] ?? null);
                // line 490
                echo (( !(($context["label"] ?? null) === false)) ? ((((($context["translation_domain"] ?? null) === false)) ? (($context["label"] ?? null)) : (($context["label"] ?? null)))) : (""));
                // line 491
                echo "</label>
      ";
            }
            // line 493
            echo "    ";
        }
    }

    // line 498
    public function block_form_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 499
        echo "<div class=\"form-group";
        if ((( !($context["compound"] ?? null) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
            echo " has-error";
        }
        echo "\">";
        // line 500
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
        // line 501
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 502
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 503
        echo "</div>";
    }

    // line 506
    public function block_button_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 507
        echo "<div class=\"form-group\">";
        // line 508
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 509
        echo "</div>";
    }

    // line 512
    public function block_choice_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 513
        $context["force_error"] = true;
        // line 514
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 517
    public function block_date_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 518
        $context["force_error"] = true;
        // line 519
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 522
    public function block_time_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 523
        $context["force_error"] = true;
        // line 524
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 527
    public function block_datetime_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 528
        $context["force_error"] = true;
        // line 529
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 532
    public function block_checkbox_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 533
        echo "<div class=\"form-group";
        if ( !($context["valid"] ?? null)) {
            echo " has-error";
        }
        echo "\">";
        // line 534
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 535
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 536
        echo "</div>";
    }

    // line 539
    public function block_radio_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 540
        echo "<div class=\"form-group";
        if ( !($context["valid"] ?? null)) {
            echo " has-error";
        }
        echo "\">";
        // line 541
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 542
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 543
        echo "</div>";
    }

    // line 548
    public function block_form_errors($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 549
        if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
            // line 550
            echo "<div class=\"alert alert-danger\">";
            // line 551
            if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 1)) {
                // line 552
                echo "<ul class=\"alert-text\">";
                // line 553
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 554
                    echo "<li> ";
                    echo twig_escape_filter($this->env, (((null === twig_get_attribute($this->env, $this->source,                     // line 555
$context["error"], "messagePluralization", [], "any", false, false, false, 555))) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source,                     // line 556
$context["error"], "messageTemplate", [], "any", false, false, false, 556), twig_get_attribute($this->env, $this->source, $context["error"], "messageParameters", [], "any", false, false, false, 556), "form_error")) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->transchoice(twig_get_attribute($this->env, $this->source,                     // line 557
$context["error"], "messageTemplate", [], "any", false, false, false, 557), twig_get_attribute($this->env, $this->source, $context["error"], "messagePluralization", [], "any", false, false, false, 557), twig_get_attribute($this->env, $this->source, $context["error"], "messageParameters", [], "any", false, false, false, 557), "form_error"))), "html", null, true);
                    // line 558
                    echo "
                    </li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 561
                echo "</ul>";
            } else {
                // line 563
                echo "<div class=\"alert-text\">";
                // line 564
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 565
                    echo "<p> ";
                    echo twig_escape_filter($this->env, (((null === twig_get_attribute($this->env, $this->source,                     // line 566
$context["error"], "messagePluralization", [], "any", false, false, false, 566))) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source,                     // line 567
$context["error"], "messageTemplate", [], "any", false, false, false, 567), twig_get_attribute($this->env, $this->source, $context["error"], "messageParameters", [], "any", false, false, false, 567), "form_error")) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->transchoice(twig_get_attribute($this->env, $this->source,                     // line 568
$context["error"], "messageTemplate", [], "any", false, false, false, 568), twig_get_attribute($this->env, $this->source, $context["error"], "messagePluralization", [], "any", false, false, false, 568), twig_get_attribute($this->env, $this->source, $context["error"], "messageParameters", [], "any", false, false, false, 568), "form_error"))), "html", null, true);
                    // line 569
                    echo "
                </p>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 572
                echo "</div>";
            }
            // line 574
            echo "</div>";
        }
    }

    // line 581
    public function block_material_choice_table_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 582
        echo "  ";
        ob_start(function () { return ''; });
        // line 583
        echo "    <div class=\"choice-table\">
      <table class=\"table table-bordered mb-0\">
        <thead>
          <tr>
            <th class=\"checkbox\">
              <div class=\"md-checkbox\">
                <label>
                  <input
                    type=\"checkbox\"
                    class=\"js-choice-table-select-all\"
                    ";
        // line 593
        if (($context["isCheckSelectAll"] ?? null)) {
            // line 594
            echo "                      checked
                    ";
        }
        // line 596
        echo "                  >
                  <i class=\"md-checkbox-control\"></i>
                  ";
        // line 598
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Select all", [], "Admin.Actions"), "html", null, true);
        echo "
                </label>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
        ";
        // line 605
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 606
            echo "          <tr>
            <td>
              ";
            // line 608
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', ["material_design" => true]);
            echo "
            </td>
          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 612
        echo "        </tbody>
      </table>
    </div>
  ";
        $___internal_parse_9_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 582
        echo twig_spaceless($___internal_parse_9_);
    }

    // line 618
    public function block_material_multiple_choice_table_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 619
        echo "  ";
        ob_start(function () { return ''; });
        // line 620
        echo "    <div class=\"choice-table";
        if (($context["headers_fixed"] ?? null)) {
            echo "-headers-fixed";
        }
        echo " table-responsive\">
      <table class=\"table\">
        <thead>
          <tr>
            <th>";
        // line 624
        echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
        echo "</th>
            ";
        // line 625
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child_choice"]) {
            // line 626
            echo "              <th class=\"text-center\">
                ";
            // line 627
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child_choice"], "vars", [], "any", false, false, false, 627), "multiple", [], "any", false, false, false, 627) && !twig_in_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child_choice"], "vars", [], "any", false, false, false, 627), "name", [], "any", false, false, false, 627), ($context["headers_to_disable"] ?? null)))) {
                // line 628
                echo "                  <a href=\"#\"
                     class=\"js-multiple-choice-table-select-column\"
                     data-column-num=\"";
                // line 630
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 630) + 1), "html", null, true);
                echo "\"
                     data-column-checked=\"false\"
                  >
                    ";
                // line 633
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child_choice"], "vars", [], "any", false, false, false, 633), "label", [], "any", false, false, false, 633), "html", null, true);
                echo "
                  </a>
                ";
            } else {
                // line 636
                echo "                  ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child_choice"], "vars", [], "any", false, false, false, 636), "label", [], "any", false, false, false, 636), "html", null, true);
                echo "
                ";
            }
            // line 638
            echo "              </th>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child_choice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 640
        echo "          </tr>
        </thead>
        <tbody>
        ";
        // line 643
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["choices"] ?? null));
        foreach ($context['_seq'] as $context["choice_name"] => $context["choice_value"]) {
            // line 644
            echo "          <tr>
            <td>
              ";
            // line 646
            echo twig_escape_filter($this->env, $context["choice_name"], "html", null, true);
            echo "
            </td>
            ";
            // line 648
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["child_choice_name"] => $context["child_choice"]) {
                // line 649
                echo "              <td class=\"text-center\">
                ";
                // line 650
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["child_choice_entry_index_mapping"] ?? null), $context["choice_value"], [], "array", false, true, false, 650), $context["child_choice_name"], [], "array", true, true, false, 650)) {
                    // line 651
                    echo "                  ";
                    $context["entry_index"] = (($__internal_compile_4 = (($__internal_compile_5 = ($context["child_choice_entry_index_mapping"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[$context["choice_value"]] ?? null) : null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[$context["child_choice_name"]] ?? null) : null);
                    // line 652
                    echo "
                  ";
                    // line 653
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child_choice"], "vars", [], "any", false, false, false, 653), "multiple", [], "any", false, false, false, 653)) {
                        // line 654
                        echo "                    ";
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_6 = $context["child_choice"]) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[($context["entry_index"] ?? null)] ?? null) : null), 'widget', ["material_design" => true]);
                        echo "
                  ";
                    } else {
                        // line 656
                        echo "                    ";
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_7 = $context["child_choice"]) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[($context["entry_index"] ?? null)] ?? null) : null), 'widget');
                        echo "
                  ";
                    }
                    // line 658
                    echo "                ";
                } else {
                    // line 659
                    echo "                  --
                ";
                }
                // line 661
                echo "              </td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['child_choice_name'], $context['child_choice'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 663
            echo "          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['choice_name'], $context['choice_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 665
        echo "        </tbody>
      </table>
    </div>
  ";
        $___internal_parse_10_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 619
        echo twig_spaceless($___internal_parse_10_);
    }

    // line 671
    public function block_translatable_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 672
        $context["formClass"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 672), "attr", [], "any", false, true, false, 672), "class", [], "any", true, true, false, 672)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 672), "attr", [], "any", false, true, false, 672), "class", [], "any", false, false, false, 672), "")) : ("")) . twig_trim_filter(" input-group locale-input-group js-locale-input-group d-flex"));
        // line 673
        echo "  <div class=\"";
        echo twig_escape_filter($this->env, ($context["formClass"] ?? null), "html", null, true);
        echo "\">
    ";
        // line 674
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["translateField"]) {
            // line 675
            echo "      ";
            $context["classes"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, true, false, 675), "attr", [], "any", false, true, false, 675), "class", [], "any", true, true, false, 675)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, true, false, 675), "attr", [], "any", false, true, false, 675), "class", [], "any", false, false, false, 675), "")) : ("")) . " js-locale-input");
            // line 676
            echo "      ";
            $context["classes"] = ((($context["classes"] ?? null) . " js-locale-") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, false, false, 676), "label", [], "any", false, false, false, 676));
            // line 677
            echo "      ";
            if ((twig_get_attribute($this->env, $this->source, ($context["default_locale"] ?? null), "id_lang", [], "any", false, false, false, 677) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, false, false, 677), "name", [], "any", false, false, false, 677))) {
                // line 678
                echo "        ";
                $context["classes"] = (($context["classes"] ?? null) . " d-none");
                // line 679
                echo "      ";
            }
            // line 680
            echo "      <div class=\"";
            echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
            echo "\" style=\"flex-grow: 1;\">
        ";
            // line 681
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["translateField"], 'widget');
            echo "
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translateField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 684
        echo "    ";
        if ( !($context["hide_locales"] ?? null)) {
            // line 685
            echo "      <div class=\"dropdown\">
        <button class=\"btn btn-outline-secondary dropdown-toggle js-locale-btn\"
                type=\"button\"
                data-toggle=\"dropdown\"
                ";
            // line 689
            if (array_key_exists("change_form_language_url", $context)) {
                // line 690
                echo "                  data-change-language-url=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 690), "change_form_language_url", [], "any", false, false, false, 690), "html", null, true);
                echo "\"
                ";
            }
            // line 692
            echo "                aria-haspopup=\"true\"
                aria-expanded=\"false\"
                id=\"";
            // line 694
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 694), "id", [], "any", false, false, false, 694), "html", null, true);
            echo "_dropdown\"
        >
          ";
            // line 696
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 696), "default_locale", [], "any", false, false, false, 696), "iso_code", [], "any", false, false, false, 696), "html", null, true);
            echo "
        </button>
        <div class=\"dropdown-menu locale-dropdown-menu\" aria-labelledby=\"";
            // line 698
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 698), "id", [], "any", false, false, false, 698), "html", null, true);
            echo "_dropdown\">
          ";
            // line 699
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locales"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["locale"]) {
                // line 700
                echo "            <span class=\"dropdown-item js-locale-item\" data-locale=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "iso_code", [], "any", false, false, false, 700), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "name", [], "any", false, false, false, 700), "html", null, true);
                echo "</span>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['locale'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 702
            echo "        </div>
      </div>
    ";
        }
        // line 705
        echo "  </div>";
    }

    // line 708
    public function block_birthday_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 709
        echo "  ";
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 710
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 712
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 712)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 712), "")) : ("")) . " form-inline"))]);
            // line 713
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 714
                echo "<div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">";
            }
            // line 716
            echo "
    ";
            // line 717
            $context["yearWidget"] = (("<div class=\"col pl-0\">" . $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "year", [], "any", false, false, false, 717), 'widget')) . "</div>");
            // line 718
            echo "    ";
            $context["monthWidget"] = (("<div class=\"col\">" . $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "month", [], "any", false, false, false, 718), 'widget')) . "</div>");
            // line 719
            echo "    ";
            $context["dayWidget"] = (("<div class=\"col pr-0\">" . $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "day", [], "any", false, false, false, 719), 'widget')) . "</div>");
            // line 721
            echo twig_replace_filter(($context["date_pattern"] ?? null), ["{{ year }}" =>             // line 722
($context["yearWidget"] ?? null), "{{ month }}" =>             // line 723
($context["monthWidget"] ?? null), "{{ day }}" =>             // line 724
($context["dayWidget"] ?? null)]);
            // line 727
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 728
                echo "</div>";
            }
        }
    }

    // line 733
    public function block_file_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 734
        echo "  <style>
    .custom-file-label:after {
      content: \"";
        // line 736
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Browse", [], "Admin.Actions"), "html", null, true);
        echo "\";
    }
  </style>
  <div class=\"custom-file\">
    ";
        // line 740
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source,         // line 741
($context["attr"] ?? null), "class", [], "any", true, true, false, 741)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 741), "")) : ("")) . " custom-file-input")), "data-multiple-files-text" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%count% file(s)", [], "Admin.Global"), "data-locale" => $this->extensions['PrestaShopBundle\Twig\ContextIsoCodeProviderExtension']->getIsoCode()]);
        // line 746
        if ((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "disabled", [], "any", true, true, false, 746) && twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "disabled", [], "any", false, false, false, 746))) {
            // line 747
            echo "      ";
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => (twig_get_attribute($this->env, $this->source,             // line 748
($context["attr"] ?? null), "class", [], "any", false, false, false, 748) . " disabled")]);
            // line 750
            echo "    ";
        }
        // line 751
        echo "
    ";
        // line 752
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget', ["attr" => ($context["attr"] ?? null)]);
        echo "

    <label class=\"custom-file-label\" for=\"";
        // line 754
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 754), "id", [], "any", false, false, false, 754), "html", null, true);
        echo "\">
      ";
        // line 755
        $context["attributes"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 755), "attr", [], "any", false, false, false, 755);
        // line 756
        echo "      ";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "placeholder", [], "any", true, true, false, 756)) ? (twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "placeholder", [], "any", false, false, false, 756)) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Choose file(s)", [], "Admin.Actions"))), "html", null, true);
        echo "
    </label>
  </div>
";
    }

    // line 761
    public function block_shop_restriction_checkbox_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 762
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 762), "attr", [], "any", false, false, false, 762), "is_allowed_to_display", [], "any", false, false, false, 762)) {
            // line 763
            echo "    <div class=\"md-checkbox md-checkbox-inline\">
      <label>
        ";
            // line 765
            $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "checkbox")) : ("checkbox"));
            // line 766
            echo "        <input
          class=\"js-multi-store-restriction-checkbox\"
          type=\"";
            // line 768
            echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
            echo "\"
          ";
            // line 769
            $this->displayBlock("widget_attributes", $context, $blocks);
            echo "
          value=\"";
            // line 770
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\"
        >
        <i class=\"md-checkbox-control\"></i>
      </label>
    </div>
  ";
        }
    }

    // line 778
    public function block_generatable_text_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 779
        echo "  <div class=\"input-group\">";
        // line 780
        $this->displayBlock("form_widget", $context, $blocks);
        // line 781
        echo "<span class=\"input-group-btn ml-1\">
      <button class=\"btn btn-outline-secondary js-generator-btn\"
              type=\"button\"
              data-target-input-id=\"";
        // line 784
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\"
              data-generated-value-length=\"";
        // line 785
        echo twig_escape_filter($this->env, ($context["generated_value_length"] ?? null), "html", null, true);
        echo "\"
      >
        ";
        // line 787
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Generate", [], "Admin.Actions"), "html", null, true);
        echo "
      </button>
   </span>
  </div>
";
    }

    // line 793
    public function block_text_with_recommended_length_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 794
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-recommended-length-counter" => (("#" .         // line 795
($context["id"] ?? null)) . "_recommended_length_counter"), "class" => "js-recommended-length-input"]);
        // line 799
        if ((($context["input_type"] ?? null) == "textarea")) {
            // line 800
            $this->displayBlock("textarea_widget", $context, $blocks);
        } else {
            // line 802
            $this->displayBlock("form_widget_simple", $context, $blocks);
        }
        // line 804
        echo "
  <small class=\"form-text text-muted text-right\"
         id=\"";
        // line 806
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "_recommended_length_counter\"
  >
    <em>
      ";
        // line 809
        echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("[1][/1] of [2][/2] characters used (recommended)", [], "Admin.Catalog.Feature"), ["[1]" => ("<span class=\"js-current-length\">" . twig_length_filter($this->env,         // line 810
($context["value"] ?? null))), "[/1]" => "</span>", "[2]" => ("<span>" .         // line 812
($context["recommended_length"] ?? null)), "[/2]" => "</span>"]);
        // line 814
        echo "
    </em>
  </small>
";
    }

    // line 819
    public function block_integer_min_max_filter_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 820
        echo "  ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_8 = ($context["form"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["min_field"] ?? null) : null), 'widget', ["attr" => ["class" => "min-field"]]);
        echo "
  ";
        // line 821
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_9 = ($context["form"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["max_field"] ?? null) : null), 'widget', ["attr" => ["class" => "max-field"]]);
        echo "
";
    }

    // line 824
    public function block_number_min_max_filter_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 825
        echo "  ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_10 = ($context["form"] ?? null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["min_field"] ?? null) : null), 'widget', ["attr" => ["class" => "min-field"]]);
        echo "
  ";
        // line 826
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_11 = ($context["form"] ?? null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11["max_field"] ?? null) : null), 'widget', ["attr" => ["class" => "max-field"]]);
        echo "
";
    }

    // line 829
    public function block_form_help($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 830
        echo "  ";
        if (($context["help"] ?? null)) {
            // line 831
            echo "    <small class=\"form-text\">";
            echo twig_escape_filter($this->env, ($context["help"] ?? null), "html", null, true);
            echo "</small>
  ";
        }
    }

    // line 835
    public function block_form_hint($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 836
        echo "  ";
        if (($context["hint"] ?? null)) {
            // line 837
            echo "    <div class=\"hint-box\">
      <div class=\"alert alert-info\">";
            // line 838
            echo ($context["hint"] ?? null);
            echo "</div>
    </div>
  ";
        }
    }

    // line 843
    public function block_custom_content_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 844
        echo "  ";
        $this->loadTemplate(($context["template"] ?? null), "@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_layout.html.twig", 844)->display(twig_array_merge($context, ($context["data"] ?? null)));
    }

    // line 847
    public function block_text_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 848
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["aria-label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%inputId% input", ["%inputId%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 848), "id", [], "any", false, false, false, 848)], "Admin.Global")]);
        // line 849
        if ( !(null === ($context["data_list"] ?? null))) {
            // line 850
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["list" => (($context["id"] ?? null) . "_datalist")]);
        }
        // line 852
        echo "
  ";
        // line 853
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget', ["attr" => ($context["attr"] ?? null)]);
        echo "

  ";
        // line 855
        if ( !(null === ($context["data_list"] ?? null))) {
            // line 856
            echo "    <datalist id=\"";
            echo twig_escape_filter($this->env, (($context["id"] ?? null) . "_datalist"), "html", null, true);
            echo "\">
      ";
            // line 857
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["data_list"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 858
                echo "        <option value=\"";
                echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                echo "\"></option>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 860
            echo "    </datalist>
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  2468 => 860,  2459 => 858,  2455 => 857,  2450 => 856,  2448 => 855,  2443 => 853,  2440 => 852,  2437 => 850,  2435 => 849,  2433 => 848,  2429 => 847,  2424 => 844,  2420 => 843,  2412 => 838,  2409 => 837,  2406 => 836,  2402 => 835,  2394 => 831,  2391 => 830,  2387 => 829,  2381 => 826,  2376 => 825,  2372 => 824,  2366 => 821,  2361 => 820,  2357 => 819,  2350 => 814,  2348 => 812,  2347 => 810,  2346 => 809,  2340 => 806,  2336 => 804,  2333 => 802,  2330 => 800,  2328 => 799,  2326 => 795,  2324 => 794,  2320 => 793,  2311 => 787,  2306 => 785,  2302 => 784,  2297 => 781,  2295 => 780,  2293 => 779,  2289 => 778,  2278 => 770,  2274 => 769,  2270 => 768,  2266 => 766,  2264 => 765,  2260 => 763,  2257 => 762,  2253 => 761,  2244 => 756,  2242 => 755,  2238 => 754,  2233 => 752,  2230 => 751,  2227 => 750,  2225 => 748,  2223 => 747,  2221 => 746,  2219 => 741,  2218 => 740,  2211 => 736,  2207 => 734,  2203 => 733,  2197 => 728,  2195 => 727,  2193 => 724,  2192 => 723,  2191 => 722,  2190 => 721,  2187 => 719,  2184 => 718,  2182 => 717,  2179 => 716,  2174 => 714,  2172 => 713,  2170 => 712,  2167 => 710,  2164 => 709,  2160 => 708,  2156 => 705,  2151 => 702,  2140 => 700,  2136 => 699,  2132 => 698,  2127 => 696,  2122 => 694,  2118 => 692,  2112 => 690,  2110 => 689,  2104 => 685,  2101 => 684,  2092 => 681,  2087 => 680,  2084 => 679,  2081 => 678,  2078 => 677,  2075 => 676,  2072 => 675,  2068 => 674,  2063 => 673,  2061 => 672,  2057 => 671,  2053 => 619,  2047 => 665,  2040 => 663,  2033 => 661,  2029 => 659,  2026 => 658,  2020 => 656,  2014 => 654,  2012 => 653,  2009 => 652,  2006 => 651,  2004 => 650,  2001 => 649,  1997 => 648,  1992 => 646,  1988 => 644,  1984 => 643,  1979 => 640,  1964 => 638,  1958 => 636,  1952 => 633,  1946 => 630,  1942 => 628,  1940 => 627,  1937 => 626,  1920 => 625,  1916 => 624,  1906 => 620,  1903 => 619,  1899 => 618,  1895 => 582,  1889 => 612,  1879 => 608,  1875 => 606,  1871 => 605,  1861 => 598,  1857 => 596,  1853 => 594,  1851 => 593,  1839 => 583,  1836 => 582,  1832 => 581,  1827 => 574,  1824 => 572,  1817 => 569,  1815 => 568,  1814 => 567,  1813 => 566,  1811 => 565,  1807 => 564,  1805 => 563,  1802 => 561,  1795 => 558,  1793 => 557,  1792 => 556,  1791 => 555,  1789 => 554,  1785 => 553,  1783 => 552,  1781 => 551,  1779 => 550,  1777 => 549,  1773 => 548,  1769 => 543,  1767 => 542,  1765 => 541,  1759 => 540,  1755 => 539,  1751 => 536,  1749 => 535,  1747 => 534,  1741 => 533,  1737 => 532,  1733 => 529,  1731 => 528,  1727 => 527,  1723 => 524,  1721 => 523,  1717 => 522,  1713 => 519,  1711 => 518,  1707 => 517,  1703 => 514,  1701 => 513,  1697 => 512,  1693 => 509,  1691 => 508,  1689 => 507,  1685 => 506,  1681 => 503,  1679 => 502,  1677 => 501,  1675 => 500,  1669 => 499,  1665 => 498,  1660 => 493,  1656 => 491,  1654 => 490,  1652 => 489,  1631 => 488,  1626 => 485,  1624 => 484,  1622 => 483,  1620 => 482,  1606 => 481,  1603 => 480,  1601 => 479,  1598 => 478,  1595 => 477,  1592 => 476,  1589 => 475,  1586 => 474,  1583 => 473,  1580 => 472,  1577 => 471,  1574 => 470,  1571 => 469,  1568 => 468,  1566 => 467,  1562 => 466,  1558 => 463,  1554 => 462,  1550 => 459,  1546 => 458,  1542 => 455,  1540 => 454,  1536 => 452,  1532 => 449,  1528 => 448,  1519 => 439,  1502 => 436,  1498 => 435,  1494 => 434,  1491 => 433,  1474 => 432,  1468 => 428,  1464 => 427,  1460 => 426,  1452 => 421,  1446 => 418,  1441 => 417,  1437 => 416,  1433 => 396,  1428 => 411,  1410 => 409,  1405 => 407,  1402 => 406,  1397 => 405,  1393 => 404,  1389 => 403,  1385 => 402,  1381 => 401,  1376 => 400,  1373 => 399,  1356 => 398,  1353 => 397,  1350 => 396,  1346 => 395,  1342 => 370,  1339 => 392,  1332 => 388,  1326 => 385,  1322 => 384,  1317 => 382,  1313 => 380,  1311 => 379,  1306 => 377,  1300 => 374,  1296 => 373,  1292 => 371,  1289 => 370,  1285 => 369,  1281 => 361,  1269 => 364,  1266 => 363,  1263 => 362,  1260 => 361,  1256 => 360,  1252 => 352,  1247 => 356,  1243 => 355,  1239 => 354,  1234 => 353,  1231 => 352,  1227 => 351,  1223 => 337,  1204 => 341,  1201 => 340,  1199 => 339,  1196 => 338,  1193 => 337,  1189 => 336,  1185 => 333,  1180 => 330,  1171 => 327,  1166 => 325,  1163 => 324,  1159 => 323,  1155 => 322,  1149 => 319,  1144 => 317,  1136 => 311,  1134 => 310,  1131 => 309,  1122 => 306,  1118 => 305,  1115 => 304,  1112 => 303,  1109 => 302,  1107 => 301,  1104 => 300,  1101 => 299,  1098 => 298,  1094 => 297,  1089 => 295,  1085 => 294,  1081 => 291,  1076 => 288,  1065 => 286,  1061 => 285,  1057 => 284,  1051 => 281,  1046 => 279,  1038 => 273,  1036 => 272,  1033 => 271,  1025 => 269,  1022 => 268,  1020 => 267,  1017 => 266,  1014 => 265,  1011 => 264,  1009 => 263,  1006 => 262,  1003 => 261,  1000 => 260,  996 => 259,  991 => 257,  987 => 256,  983 => 253,  980 => 251,  978 => 250,  974 => 249,  968 => 245,  959 => 242,  955 => 241,  934 => 240,  930 => 239,  926 => 237,  922 => 235,  912 => 231,  902 => 230,  899 => 229,  895 => 228,  892 => 227,  890 => 226,  886 => 225,  881 => 224,  877 => 223,  873 => 220,  869 => 218,  852 => 216,  849 => 215,  832 => 214,  825 => 213,  822 => 212,  818 => 209,  812 => 207,  810 => 206,  806 => 205,  792 => 204,  788 => 202,  784 => 199,  778 => 197,  775 => 196,  770 => 194,  765 => 192,  763 => 191,  753 => 190,  749 => 188,  746 => 187,  744 => 186,  737 => 185,  733 => 184,  728 => 180,  711 => 178,  694 => 177,  691 => 176,  685 => 174,  681 => 173,  676 => 169,  674 => 168,  672 => 167,  669 => 165,  667 => 164,  665 => 163,  661 => 162,  656 => 158,  654 => 157,  652 => 156,  649 => 154,  647 => 153,  645 => 152,  641 => 151,  636 => 147,  630 => 144,  629 => 143,  628 => 142,  624 => 141,  620 => 140,  617 => 138,  611 => 135,  610 => 134,  609 => 133,  605 => 132,  603 => 131,  601 => 130,  597 => 129,  593 => 126,  591 => 125,  589 => 124,  585 => 123,  579 => 118,  576 => 117,  568 => 116,  563 => 114,  561 => 113,  559 => 112,  556 => 110,  554 => 109,  550 => 108,  544 => 103,  542 => 102,  540 => 100,  539 => 99,  538 => 98,  537 => 97,  532 => 95,  530 => 94,  528 => 93,  525 => 91,  523 => 90,  519 => 89,  514 => 85,  512 => 84,  510 => 83,  508 => 82,  506 => 81,  502 => 80,  500 => 79,  497 => 77,  495 => 76,  491 => 75,  484 => 69,  482 => 68,  480 => 67,  476 => 66,  472 => 63,  466 => 60,  463 => 59,  461 => 58,  459 => 57,  453 => 54,  450 => 53,  447 => 52,  445 => 51,  442 => 50,  438 => 49,  434 => 46,  432 => 45,  428 => 44,  424 => 41,  422 => 40,  418 => 39,  414 => 36,  411 => 34,  409 => 33,  405 => 32,  401 => 847,  398 => 846,  396 => 843,  393 => 842,  391 => 835,  388 => 834,  386 => 829,  383 => 828,  381 => 824,  378 => 823,  376 => 819,  373 => 818,  371 => 793,  368 => 792,  366 => 778,  363 => 777,  361 => 761,  358 => 760,  356 => 733,  353 => 732,  351 => 708,  348 => 707,  346 => 671,  343 => 670,  341 => 618,  338 => 617,  336 => 581,  333 => 580,  329 => 577,  327 => 548,  324 => 547,  321 => 545,  319 => 539,  316 => 538,  314 => 532,  311 => 531,  309 => 527,  306 => 526,  304 => 522,  301 => 521,  299 => 517,  296 => 516,  294 => 512,  291 => 511,  289 => 506,  286 => 505,  284 => 498,  281 => 497,  278 => 495,  276 => 466,  273 => 465,  271 => 462,  268 => 461,  266 => 458,  263 => 457,  261 => 452,  258 => 451,  256 => 448,  253 => 447,  250 => 445,  248 => 416,  245 => 415,  243 => 395,  240 => 394,  238 => 369,  235 => 368,  233 => 360,  230 => 359,  228 => 351,  225 => 350,  223 => 336,  220 => 335,  218 => 294,  215 => 293,  213 => 256,  210 => 255,  208 => 249,  205 => 248,  203 => 223,  200 => 222,  198 => 184,  195 => 183,  193 => 173,  190 => 172,  188 => 162,  185 => 161,  183 => 151,  180 => 150,  178 => 129,  175 => 128,  173 => 123,  170 => 122,  168 => 108,  165 => 107,  163 => 89,  160 => 88,  158 => 75,  155 => 74,  153 => 66,  150 => 65,  148 => 49,  145 => 48,  143 => 44,  140 => 43,  138 => 39,  135 => 38,  133 => 32,  130 => 31,  127 => 29,  51 => 28,  44 => 27,  37 => 26,  30 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/TwigTemplateForm/bootstrap_4_layout.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\TwigTemplateForm\\bootstrap_4_layout.html.twig");
    }
}
