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

/* @PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig */
class __TwigTemplate_fc7ce91f746687fa3083afa1fa2fae41 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        // line 45
        $_trait_0 = $this->loadTemplate("bootstrap_base_layout.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", 45);
        if (!$_trait_0->isTraitable()) {
            throw new RuntimeError('Template "'."bootstrap_base_layout.html.twig".'" cannot be used as a trait.', 45, $this->source);
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        if (!isset($_trait_0_blocks["radio_widget"])) {
            throw new RuntimeError('Block "radio_widget" is not defined in trait "bootstrap_base_layout.html.twig".', 45, $this->source);
        }

        $_trait_0_blocks["base_radio_widget"] = $_trait_0_blocks["radio_widget"]; unset($_trait_0_blocks["radio_widget"]);

        if (!isset($_trait_0_blocks["checkbox_widget"])) {
            throw new RuntimeError('Block "checkbox_widget" is not defined in trait "bootstrap_base_layout.html.twig".', 45, $this->source);
        }

        $_trait_0_blocks["base_checkbox_widget"] = $_trait_0_blocks["checkbox_widget"]; unset($_trait_0_blocks["checkbox_widget"]);

        // line 48
        $_trait_1 = $this->loadTemplate("bootstrap_4_layout.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", 48);
        if (!$_trait_1->isTraitable()) {
            throw new RuntimeError('Template "'."bootstrap_4_layout.html.twig".'" cannot be used as a trait.', 48, $this->source);
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        // line 49
        $_trait_2 = $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/typeahead.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", 49);
        if (!$_trait_2->isTraitable()) {
            throw new RuntimeError('Template "'."@PrestaShop/Admin/TwigTemplateForm/typeahead.html.twig".'" cannot be used as a trait.', 49, $this->source);
        }
        $_trait_2_blocks = $_trait_2->getBlocks();

        // line 50
        $_trait_3 = $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/entity_search_input.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", 50);
        if (!$_trait_3->isTraitable()) {
            throw new RuntimeError('Template "'."@PrestaShop/Admin/TwigTemplateForm/entity_search_input.html.twig".'" cannot be used as a trait.', 50, $this->source);
        }
        $_trait_3_blocks = $_trait_3->getBlocks();

        // line 51
        $_trait_4 = $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/material.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", 51);
        if (!$_trait_4->isTraitable()) {
            throw new RuntimeError('Template "'."@PrestaShop/Admin/TwigTemplateForm/material.html.twig".'" cannot be used as a trait.', 51, $this->source);
        }
        $_trait_4_blocks = $_trait_4->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks,
            $_trait_2_blocks,
            $_trait_3_blocks,
            $_trait_4_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            [
                'form_start' => [$this, 'block_form_start'],
                'form_widget' => [$this, 'block_form_widget'],
                'form_widget_simple' => [$this, 'block_form_widget_simple'],
                'ip_address_text_widget' => [$this, 'block_ip_address_text_widget'],
                'form_row' => [$this, 'block_form_row'],
                'form_modify_all_shops' => [$this, 'block_form_modify_all_shops'],
                'form_disabling_switch' => [$this, 'block_form_disabling_switch'],
                'widget_type_class' => [$this, 'block_widget_type_class'],
                'form_label' => [$this, 'block_form_label'],
                'textarea_widget' => [$this, 'block_textarea_widget'],
                'money_widget' => [$this, 'block_money_widget'],
                'percent_widget' => [$this, 'block_percent_widget'],
                'datetime_widget' => [$this, 'block_datetime_widget'],
                'url_widget' => [$this, 'block_url_widget'],
                'date_widget' => [$this, 'block_date_widget'],
                'time_widget' => [$this, 'block_time_widget'],
                'email_widget' => [$this, 'block_email_widget'],
                'button_widget' => [$this, 'block_button_widget'],
                'icon_button_widget' => [$this, 'block_icon_button_widget'],
                'choice_widget' => [$this, 'block_choice_widget'],
                'choice_widget_collapsed' => [$this, 'block_choice_widget_collapsed'],
                'choice_widget_expanded' => [$this, 'block_choice_widget_expanded'],
                'choice_tree_widget' => [$this, 'block_choice_tree_widget'],
                'choice_tree_item_widget' => [$this, 'block_choice_tree_item_widget'],
                'translatefields_widget' => [$this, 'block_translatefields_widget'],
                'translate_fields_widget' => [$this, 'block_translate_fields_widget'],
                'translate_text_widget' => [$this, 'block_translate_text_widget'],
                'translate_textarea_widget' => [$this, 'block_translate_textarea_widget'],
                'date_picker_widget' => [$this, 'block_date_picker_widget'],
                'date_range_widget' => [$this, 'block_date_range_widget'],
                'search_and_reset_widget' => [$this, 'block_search_and_reset_widget'],
                'switch_widget' => [$this, 'block_switch_widget'],
                'row_attributes' => [$this, 'block_row_attributes'],
                '_form_step6_attachments_widget' => [$this, 'block__form_step6_attachments_widget'],
                'choice_label' => [$this, 'block_choice_label'],
                'checkbox_label' => [$this, 'block_checkbox_label'],
                'radio_label' => [$this, 'block_radio_label'],
                'checkbox_radio_label' => [$this, 'block_checkbox_radio_label'],
                'radio_widget' => [$this, 'block_radio_widget'],
                'checkbox_widget' => [$this, 'block_checkbox_widget'],
                'form_errors' => [$this, 'block_form_errors'],
                'form_errors_field' => [$this, 'block_form_errors_field'],
                'form_errors_other' => [$this, 'block_form_errors_other'],
                'material_choice_table_widget' => [$this, 'block_material_choice_table_widget'],
                'material_multiple_choice_table_widget' => [$this, 'block_material_multiple_choice_table_widget'],
                'translatable_fields_with_tabs' => [$this, 'block_translatable_fields_with_tabs'],
                'translatable_fields_with_dropdown' => [$this, 'block_translatable_fields_with_dropdown'],
                'translatable_widget' => [$this, 'block_translatable_widget'],
                'birthday_widget' => [$this, 'block_birthday_widget'],
                'file_widget' => [$this, 'block_file_widget'],
                'shop_restriction_checkbox_widget' => [$this, 'block_shop_restriction_checkbox_widget'],
                'generatable_text_widget' => [$this, 'block_generatable_text_widget'],
                'text_with_recommended_length_widget' => [$this, 'block_text_with_recommended_length_widget'],
                'text_with_length_counter_widget' => [$this, 'block_text_with_length_counter_widget'],
                'integer_min_max_filter_widget' => [$this, 'block_integer_min_max_filter_widget'],
                'number_min_max_filter_widget' => [$this, 'block_number_min_max_filter_widget'],
                'number_widget' => [$this, 'block_number_widget'],
                'integer_widget' => [$this, 'block_integer_widget'],
                'form_unit' => [$this, 'block_form_unit'],
                'form_unit_prepend' => [$this, 'block_form_unit_prepend'],
                'form_help' => [$this, 'block_form_help'],
                'form_prepend_external_link' => [$this, 'block_form_prepend_external_link'],
                'form_append_external_link' => [$this, 'block_form_append_external_link'],
                'form_external_link' => [$this, 'block_form_external_link'],
                'form_external_link_attributes' => [$this, 'block_form_external_link_attributes'],
                'custom_content_widget' => [$this, 'block_custom_content_widget'],
                'text_widget' => [$this, 'block_text_widget'],
                'form_prepend_alert' => [$this, 'block_form_prepend_alert'],
                'form_append_alert' => [$this, 'block_form_append_alert'],
                'form_alert' => [$this, 'block_form_alert'],
                'unavailable_widget' => [$this, 'block_unavailable_widget'],
                'text_preview_widget' => [$this, 'block_text_preview_widget'],
                'image_preview_widget' => [$this, 'block_image_preview_widget'],
                'delta_quantity_widget' => [$this, 'block_delta_quantity_widget'],
                'delta_quantity_quantity_widget' => [$this, 'block_delta_quantity_quantity_widget'],
                'delta_quantity_delta_row' => [$this, 'block_delta_quantity_delta_row'],
                'delta_quantity_delta_widget' => [$this, 'block_delta_quantity_delta_widget'],
                'submittable_input_widget' => [$this, 'block_submittable_input_widget'],
                'submittable_input_button_widget' => [$this, 'block_submittable_input_button_widget'],
                'submittable_delta_quantity_delta_widget' => [$this, 'block_submittable_delta_quantity_delta_widget'],
                'navigation_tab_widget' => [$this, 'block_navigation_tab_widget'],
                'accordion_widget' => [$this, 'block_accordion_widget'],
                'button_collection_widget' => [$this, 'block_button_collection_widget'],
                'price_reduction_widget' => [$this, 'block_price_reduction_widget'],
            ]
        );
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 34
        echo "
";
        // line 46
        echo "
";
        // line 52
        echo "
";
        // line 54
        echo "
";
        // line 56
        echo "
";
        // line 57
        $this->displayBlock('form_start', $context, $blocks);
        // line 67
        $this->displayBlock('form_widget', $context, $blocks);
        // line 75
        $this->displayBlock('form_widget_simple', $context, $blocks);
        // line 80
        $this->displayBlock('ip_address_text_widget', $context, $blocks);
        // line 89
        echo "
";
        // line 91
        echo "
";
        // line 92
        $this->displayBlock('form_row', $context, $blocks);
        // line 110
        echo "
";
        // line 115
        $this->displayBlock('form_modify_all_shops', $context, $blocks);
        // line 122
        echo "
";
        // line 123
        $this->displayBlock('form_disabling_switch', $context, $blocks);
        // line 130
        echo "
";
        // line 131
        $this->displayBlock('widget_type_class', $context, $blocks);
        // line 150
        echo "
";
        // line 153
        $this->displayBlock('form_label', $context, $blocks);
        // line 198
        echo "
";
        // line 199
        $this->displayBlock('textarea_widget', $context, $blocks);
        // line 205
        echo "
";
        // line 206
        $this->displayBlock('money_widget', $context, $blocks);
        // line 224
        echo "
";
        // line 225
        $this->displayBlock('percent_widget', $context, $blocks);
        // line 233
        echo "
";
        // line 234
        $this->displayBlock('datetime_widget', $context, $blocks);
        // line 248
        $this->displayBlock('url_widget', $context, $blocks);
        // line 254
        $this->displayBlock('date_widget', $context, $blocks);
        // line 272
        echo "
";
        // line 273
        $this->displayBlock('time_widget', $context, $blocks);
        // line 288
        $this->displayBlock('email_widget', $context, $blocks);
        // line 294
        $this->displayBlock('button_widget', $context, $blocks);
        // line 298
        echo "
";
        // line 299
        $this->displayBlock('icon_button_widget', $context, $blocks);
        // line 317
        echo "
";
        // line 318
        $this->displayBlock('choice_widget', $context, $blocks);
        // line 322
        echo "
";
        // line 323
        $this->displayBlock('choice_widget_collapsed', $context, $blocks);
        // line 327
        echo "
";
        // line 328
        $this->displayBlock('choice_widget_expanded', $context, $blocks);
        // line 351
        echo "
";
        // line 352
        $this->displayBlock('choice_tree_widget', $context, $blocks);
        // line 362
        echo "
";
        // line 363
        $this->displayBlock('choice_tree_item_widget', $context, $blocks);
        // line 401
        echo "
";
        // line 402
        $this->displayBlock('translatefields_widget', $context, $blocks);
        // line 427
        echo "
";
        // line 428
        $this->displayBlock('translate_fields_widget', $context, $blocks);
        // line 434
        echo "
";
        // line 435
        $this->displayBlock('translate_text_widget', $context, $blocks);
        // line 471
        echo "
";
        // line 472
        $this->displayBlock('translate_textarea_widget', $context, $blocks);
        // line 513
        echo "
";
        // line 514
        $this->displayBlock('date_picker_widget', $context, $blocks);
        // line 528
        echo "
";
        // line 529
        $this->displayBlock('date_range_widget', $context, $blocks);
        // line 545
        echo "
";
        // line 546
        $this->displayBlock('search_and_reset_widget', $context, $blocks);
        // line 571
        echo "
";
        // line 572
        $this->displayBlock('switch_widget', $context, $blocks);
        // line 596
        $this->displayBlock('row_attributes', $context, $blocks);
        // line 604
        $this->displayBlock('_form_step6_attachments_widget', $context, $blocks);
        // line 633
        echo "
";
        // line 635
        echo "
";
        // line 636
        $this->displayBlock('choice_label', $context, $blocks);
        // line 641
        echo "
";
        // line 642
        $this->displayBlock('checkbox_label', $context, $blocks);
        // line 645
        echo "
";
        // line 646
        $this->displayBlock('radio_label', $context, $blocks);
        // line 649
        echo "
";
        // line 650
        $this->displayBlock('checkbox_radio_label', $context, $blocks);
        // line 682
        echo "
";
        // line 683
        $this->displayBlock('radio_widget', $context, $blocks);
        // line 697
        echo "
";
        // line 698
        $this->displayBlock('checkbox_widget', $context, $blocks);
        // line 705
        echo "
";
        // line 707
        echo "
";
        // line 708
        $this->displayBlock('form_errors', $context, $blocks);
        // line 715
        echo "
";
        // line 716
        $this->displayBlock('form_errors_field', $context, $blocks);
        // line 782
        echo "
";
        // line 783
        $this->displayBlock('form_errors_other', $context, $blocks);
        // line 802
        echo "
";
        // line 804
        echo "
";
        // line 805
        $this->displayBlock('material_choice_table_widget', $context, $blocks);
        // line 841
        echo "
";
        // line 842
        $this->displayBlock('material_multiple_choice_table_widget', $context, $blocks);
        // line 894
        echo "
";
        // line 896
        $this->displayBlock('translatable_fields_with_tabs', $context, $blocks);
        // line 919
        echo "
";
        // line 920
        $this->displayBlock('translatable_fields_with_dropdown', $context, $blocks);
        // line 956
        echo "
";
        // line 957
        $this->displayBlock('translatable_widget', $context, $blocks);
        // line 965
        echo "
";
        // line 966
        $this->displayBlock('birthday_widget', $context, $blocks);
        // line 990
        echo "
";
        // line 991
        $this->displayBlock('file_widget', $context, $blocks);
        // line 1023
        echo "
";
        // line 1024
        $this->displayBlock('shop_restriction_checkbox_widget', $context, $blocks);
        // line 1040
        echo "
";
        // line 1041
        $this->displayBlock('generatable_text_widget', $context, $blocks);
        // line 1060
        echo "
";
        // line 1061
        $this->displayBlock('text_with_recommended_length_widget', $context, $blocks);
        // line 1086
        echo "
";
        // line 1087
        $this->displayBlock('text_with_length_counter_widget', $context, $blocks);
        // line 1115
        echo "
";
        // line 1116
        $this->displayBlock('integer_min_max_filter_widget', $context, $blocks);
        // line 1120
        echo "
";
        // line 1121
        $this->displayBlock('number_min_max_filter_widget', $context, $blocks);
        // line 1126
        $this->displayBlock('number_widget', $context, $blocks);
        // line 1136
        $this->displayBlock('integer_widget', $context, $blocks);
        // line 1146
        $this->displayBlock('form_unit', $context, $blocks);
        // line 1153
        echo "
";
        // line 1154
        $this->displayBlock('form_unit_prepend', $context, $blocks);
        // line 1161
        echo "
";
        // line 1162
        $this->displayBlock('form_help', $context, $blocks);
        // line 1171
        echo "
";
        // line 1172
        $this->displayBlock('form_prepend_external_link', $context, $blocks);
        // line 1177
        echo "
";
        // line 1178
        $this->displayBlock('form_append_external_link', $context, $blocks);
        // line 1183
        echo "
";
        // line 1184
        $this->displayBlock('form_external_link', $context, $blocks);
        // line 1197
        $this->displayBlock('form_external_link_attributes', $context, $blocks);
        // line 1211
        $this->displayBlock('custom_content_widget', $context, $blocks);
        // line 1214
        echo "
";
        // line 1215
        $this->displayBlock('text_widget', $context, $blocks);
        // line 1232
        $this->displayBlock('form_prepend_alert', $context, $blocks);
        // line 1238
        $this->displayBlock('form_append_alert', $context, $blocks);
        // line 1244
        $this->displayBlock('form_alert', $context, $blocks);
        // line 1277
        $this->displayBlock('unavailable_widget', $context, $blocks);
        // line 1284
        echo "
";
        // line 1285
        $this->displayBlock('text_preview_widget', $context, $blocks);
        // line 1303
        echo "
";
        // line 1304
        $this->displayBlock('image_preview_widget', $context, $blocks);
        // line 1309
        echo "
";
        // line 1310
        $this->displayBlock('delta_quantity_widget', $context, $blocks);
        // line 1318
        echo "
";
        // line 1319
        $this->displayBlock('delta_quantity_quantity_widget', $context, $blocks);
        // line 1330
        echo "
";
        // line 1331
        $this->displayBlock('delta_quantity_delta_row', $context, $blocks);
        // line 1347
        echo "
";
        // line 1348
        $this->displayBlock('delta_quantity_delta_widget', $context, $blocks);
        // line 1353
        echo "
";
        // line 1354
        $this->displayBlock('submittable_input_widget', $context, $blocks);
        // line 1367
        echo "
";
        // line 1368
        $this->displayBlock('submittable_input_button_widget', $context, $blocks);
        // line 1373
        echo "
";
        // line 1374
        $this->displayBlock('submittable_delta_quantity_delta_widget', $context, $blocks);
        // line 1388
        $this->displayBlock('navigation_tab_widget', $context, $blocks);
        // line 1439
        $this->displayBlock('accordion_widget', $context, $blocks);
        // line 1479
        $this->displayBlock('button_collection_widget', $context, $blocks);
        // line 1496
        $this->displayBlock('price_reduction_widget', $context, $blocks);
    }

    // line 57
    public function block_form_start($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 58
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-alerts-success" => twig_length_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 58), "alerts", [], "any", false, true, false, 58), "success", [], "any", true, true, false, 58)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 58), "alerts", [], "any", false, true, false, 58), "success", [], "any", false, false, false, 58), [])) : ([])))]);
        // line 59
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-alerts-info" => twig_length_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 59), "alerts", [], "any", false, true, false, 59), "info", [], "any", true, true, false, 59)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 59), "alerts", [], "any", false, true, false, 59), "info", [], "any", false, false, false, 59), [])) : ([])))]);
        // line 60
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-alerts-warning" => twig_length_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 60), "alerts", [], "any", false, true, false, 60), "warning", [], "any", true, true, false, 60)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 60), "alerts", [], "any", false, true, false, 60), "warning", [], "any", false, false, false, 60), [])) : ([])))]);
        // line 61
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-alerts-error" => twig_length_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 61), "alerts", [], "any", false, true, false, 61), "error", [], "any", true, true, false, 61)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 61), "alerts", [], "any", false, true, false, 61), "error", [], "any", false, false, false, 61), [])) : ([])))]);
        // line 62
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-form-submitted" => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 62), "submitted", [], "any", false, false, false, 62)) ? (1) : (0))]);
        // line 63
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-form-valid" => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 63), "valid", [], "any", false, false, false, 63)) ? (1) : (0))]);
        // line 64
        echo "  ";
        $this->displayParentBlock("form_start", $context, $blocks);
        echo "
";
    }

    // line 67
    public function block_form_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 68
        if (array_key_exists("columns_number", $context)) {
            // line 69
            echo "    ";
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 69)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 69), "")) : ("")) . " form-columns-") . ($context["columns_number"] ?? null)))]);
            // line 70
            echo "  ";
        }
        // line 71
        echo "  ";
        $this->displayParentBlock("form_widget", $context, $blocks);
        // line 72
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 75
    public function block_form_widget_simple($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 76
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
        echo "
  ";
        // line 77
        $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/form_max_length.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", 77)->display(twig_array_merge($context, ["attr" => ($context["attr"] ?? null)]));
    }

    // line 80
    public function block_ip_address_text_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 81
        echo "  <div class=\"input-group\">";
        // line 82
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 83
        echo "<button type=\"button\" class=\"btn btn-outline-primary add_ip_button\" data-ip=\"";
        echo twig_escape_filter($this->env, ($context["currentIp"] ?? null), "html", null, true);
        echo "\">
      <i class=\"material-icons\">add_circle</i> ";
        // line 84
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add my IP", [], "Admin.Actions"), "html", null, true);
        echo "
    </button>
  </div>
  ";
        // line 87
        $this->displayBlock("form_help", $context, $blocks);
        echo "
";
    }

    // line 92
    public function block_form_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 93
        echo "<div class=\"form-group";
        $this->displayBlock("widget_type_class", $context, $blocks);
        if ((( !($context["compound"] ?? null) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
            echo " has-error";
        }
        if (twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 93)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, false, 93), "html", null, true);
        }
        echo "\">";
        // line 94
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
        // line 95
        $this->displayBlock("form_prepend_alert", $context, $blocks);
        // line 96
        $this->displayBlock("form_prepend_external_link", $context, $blocks);
        // line 98
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 99
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 100
        $this->displayBlock("form_modify_all_shops", $context, $blocks);
        // line 102
        $this->displayBlock("form_append_alert", $context, $blocks);
        // line 103
        $this->displayBlock("form_append_external_link", $context, $blocks);
        // line 104
        echo "</div>

  ";
        // line 106
        if (($context["column_breaker"] ?? null)) {
            // line 107
            echo "  <div class=\"form-group form-column-breaker\"></div>
  ";
        }
    }

    // line 115
    public function block_form_modify_all_shops($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 116
        echo "  ";
        $context["overrideCheckboxName"] = (($context["modify_all_shops_prefix"] ?? null) . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 116), "name", [], "any", false, false, false, 116));
        // line 117
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, true, false, 117), ($context["overrideCheckboxName"] ?? null), [], "any", true, true, false, 117)) {
            // line 118
            echo "    ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, false, false, 118), ($context["overrideCheckboxName"] ?? null), [], "any", false, false, false, 118), 'errors');
            echo "
    ";
            // line 119
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, false, false, 119), ($context["overrideCheckboxName"] ?? null), [], "any", false, false, false, 119), 'widget');
            echo "
  ";
        }
    }

    // line 123
    public function block_form_disabling_switch($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 124
        echo "  ";
        $context["disablingSwitchName"] = (($context["disabling_switch_prefix"] ?? null) . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 124), "name", [], "any", false, false, false, 124));
        // line 125
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, true, false, 125), ($context["disablingSwitchName"] ?? null), [], "any", true, true, false, 125)) {
            // line 126
            echo "    ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, false, false, 126), ($context["disablingSwitchName"] ?? null), [], "any", false, false, false, 126), 'errors');
            echo "
    ";
            // line 127
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, false, false, 127), ($context["disablingSwitchName"] ?? null), [], "any", false, false, false, 127), 'widget');
            echo "
  ";
        }
    }

    // line 131
    public function block_widget_type_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 132
        if (( !($context["compound"] ?? null) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 132), "block_prefixes", [], "any", false, false, false, 132)) > 2))) {
            // line 133
            echo " ";
            ob_start(function () { return ''; });
            // line 134
            echo "
    ";
            // line 135
            $context["index"] = (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 135), "block_prefixes", [], "any", false, false, false, 135)) - 2);
            // line 136
            echo "    ";
            $context["widgetType"] = (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 136), "block_prefixes", [], "any", false, false, false, 136)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[($context["index"] ?? null)] ?? null) : null);
            // line 137
            echo "    ";
            if ((($context["widgetType"] ?? null) == "choice")) {
                // line 138
                echo "      ";
                if ( !($context["expanded"] ?? null)) {
                    // line 139
                    echo "        ";
                    $context["widgetType"] = "select";
                    // line 140
                    echo "      ";
                } elseif (($context["multiple"] ?? null)) {
                    // line 141
                    echo "        ";
                    $context["widgetType"] = "checboxes";
                    // line 142
                    echo "      ";
                } else {
                    // line 143
                    echo "        ";
                    $context["widgetType"] = "radio";
                    // line 144
                    echo "      ";
                }
                // line 145
                echo "    ";
            }
            // line 146
            echo "    ";
            echo twig_escape_filter($this->env, ($context["widgetType"] ?? null), "html", null, true);
            echo "-widget
";
            $___internal_parse_2_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 133
            echo twig_spaceless($___internal_parse_2_);
        }
    }

    // line 153
    public function block_form_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 154
        if ( !(($context["label"] ?? null) === false)) {
            // line 155
            if ( !($context["compound"] ?? null)) {
                // line 156
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["for" => ($context["id"] ?? null)]);
            }
            // line 158
            echo "    ";
            if (($context["required"] ?? null)) {
                // line 159
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 159)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 159), "")) : ("")) . " required"))]);
            }
            // line 161
            echo "    ";
            if (twig_test_empty(($context["label"] ?? null))) {
                // line 162
                if ( !twig_test_empty(($context["label_format"] ?? null))) {
                    // line 163
                    $context["label"] = twig_replace_filter(($context["label_format"] ?? null), ["%name%" =>                     // line 164
($context["name"] ?? null), "%id%" =>                     // line 165
($context["id"] ?? null)]);
                } else {
                    // line 168
                    $context["label"] = $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize(($context["name"] ?? null));
                }
            }
            // line 172
            $context["labelTag"] = ((array_key_exists("label_tag_name", $context)) ? (_twig_default_filter(($context["label_tag_name"] ?? null), "label")) : ("label"));
            // line 173
            echo "    <";
            echo twig_escape_filter($this->env, ($context["labelTag"] ?? null), "html", null, true);
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
            echo ">
    ";
            // line 174
            if (($context["required"] ?? null)) {
                // line 175
                echo "      <span class=\"text-danger\">*</span>
    ";
            }
            // line 177
            echo "    ";
            echo (((($context["translation_domain"] ?? null) === false)) ? (($context["label"] ?? null)) : (($context["label"] ?? null)));
            echo "
    ";
            // line 178
            if (twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "tooltip", [], "array", true, true, false, 178)) {
                // line 179
                echo "      ";
                $context["placement"] = ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "tooltip_placement", [], "array", true, true, false, 179)) ? ((($__internal_compile_1 = ($context["label_attr"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["tooltip_placement"] ?? null) : null)) : ("top"));
                // line 180
                echo "      <i class=\"icon-question\" data-toggle=\"pstooltip\" data-placement=\"";
                echo twig_escape_filter($this->env, ($context["placement"] ?? null), "html", null, true);
                echo "\"
         title=\"";
                // line 181
                echo twig_escape_filter($this->env, (($__internal_compile_2 = ($context["label_attr"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["tooltip"] ?? null) : null), "html", null, true);
                echo "\"></i>
    ";
            }
            // line 183
            echo "
    ";
            // line 184
            if ((array_key_exists("label_help_box", $context) || twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "popover", [], "array", true, true, false, 184))) {
                // line 185
                echo "      ";
                $context["content"] = ((array_key_exists("label_help_box", $context)) ? (($context["label_help_box"] ?? null)) : ((($__internal_compile_3 = ($context["label_attr"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["popover"] ?? null) : null)));
                // line 186
                echo "      ";
                $context["placement"] = ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "popover_placement", [], "array", true, true, false, 186)) ? ((($__internal_compile_4 = ($context["label_attr"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["popover_placement"] ?? null) : null)) : ("top"));
                // line 187
                echo "      ";
                $this->loadTemplate("@Common/HelpBox/helpbox.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", 187)->display(twig_array_merge($context, ["placement" => ($context["placement"] ?? null), "content" => ($context["content"] ?? null)]));
                // line 188
                echo "    ";
            }
            // line 189
            $this->displayBlock("form_disabling_switch", $context, $blocks);
            // line 190
            echo "</";
            echo twig_escape_filter($this->env, ($context["labelTag"] ?? null), "html", null, true);
            echo ">";
        }
        // line 192
        if (array_key_exists("label_subtitle", $context)) {
            // line 193
            echo "    <p class=\"subtitle\">";
            echo ($context["label_subtitle"] ?? null);
            echo "</p>
  ";
        }
    }

    // line 199
    public function block_textarea_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 200
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 200)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 200), "")) : ("")) . " form-control"))]);
        // line 201
        $this->displayParentBlock("textarea_widget", $context, $blocks);
        // line 202
        $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/form_max_length.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", 202)->display(twig_array_merge($context, ["attr" => ($context["attr"] ?? null)]));
        // line 203
        echo "  ";
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 206
    public function block_money_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 207
        echo "<div class=\"input-group money-type\">
    ";
        // line 208
        $context["prepend"] = ("{{" == twig_slice($this->env, ($context["money_pattern"] ?? null), 0, 2));
        // line 209
        echo "    ";
        if ( !($context["prepend"] ?? null)) {
            // line 210
            echo "      <div class=\"input-group-prepend\">
        <span class=\"input-group-text\">";
            // line 211
            echo twig_escape_filter($this->env, twig_replace_filter(($context["money_pattern"] ?? null), ["{{ widget }}" => ""]), "html", null, true);
            echo "</span>
      </div>
    ";
        }
        // line 214
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 215
        if (($context["prepend"] ?? null)) {
            // line 216
            echo "      <div class=\"input-group-append\">
        <span class=\"input-group-text\">";
            // line 217
            echo twig_escape_filter($this->env, twig_replace_filter(($context["money_pattern"] ?? null), ["{{ widget }}" => ""]), "html", null, true);
            echo "</span>
      </div>
    ";
        }
        // line 220
        echo "  </div>

  ";
        // line 222
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 225
    public function block_percent_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 226
        echo "<div class=\"input-group\">";
        // line 227
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 228
        echo "<div class=\"input-group-append\">
      <span class=\"input-group-text\">%</span>
    </div>
  </div>";
    }

    // line 234
    public function block_datetime_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 235
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 236
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 238
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 238)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 238), "")) : ("")) . " form-inline"))]);
            // line 239
            echo "<div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 240
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, false, 240), 'errors');
            // line 241
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "time", [], "any", false, false, false, 241), 'errors');
            // line 242
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, false, 242), 'widget', ["datetime" => true]);
            // line 243
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "time", [], "any", false, false, false, 243), 'widget', ["datetime" => true]);
            // line 244
            echo "</div>";
        }
    }

    // line 248
    public function block_url_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 249
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "url")) : ("url"));
        // line 250
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
  ";
        // line 251
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 254
    public function block_date_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 255
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 256
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 258
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 258)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 258), "")) : ("")) . " form-inline"))]);
            // line 259
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 260
                echo "<div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">";
            }
            // line 262
            echo twig_replace_filter(($context["date_pattern"] ?? null), ["{{ year }}" =>             // line 263
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "year", [], "any", false, false, false, 263), 'widget'), "{{ month }}" =>             // line 264
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "month", [], "any", false, false, false, 264), 'widget'), "{{ day }}" =>             // line 265
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "day", [], "any", false, false, false, 265), 'widget')]);
            // line 267
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 268
                echo "</div>";
            }
        }
    }

    // line 273
    public function block_time_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 274
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 275
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 277
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 277)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 277), "")) : ("")) . " form-inline"))]);
            // line 278
            if (( !array_key_exists("datetime", $context) || (false == ($context["datetime"] ?? null)))) {
                // line 279
                echo "<div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">";
            }
            // line 281
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "hour", [], "any", false, false, false, 281), 'widget');
            echo ":";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "minute", [], "any", false, false, false, 281), 'widget');
            if (($context["with_seconds"] ?? null)) {
                echo ":";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "second", [], "any", false, false, false, 281), 'widget');
            }
            // line 282
            echo "    ";
            if (( !array_key_exists("datetime", $context) || (false == ($context["datetime"] ?? null)))) {
                // line 283
                echo "</div>";
            }
        }
    }

    // line 288
    public function block_email_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 289
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "email")) : ("email"));
        // line 290
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
  ";
        // line 291
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 294
    public function block_button_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 295
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 295)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 295), "btn-default")) : ("btn-default")) . " btn"))]);
        // line 296
        $this->displayParentBlock("button_widget", $context, $blocks);
    }

    // line 299
    public function block_icon_button_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 300
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 300)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 300), "btn-default")) : ("btn-default")) . " btn"))]);
        // line 301
        echo "  ";
        if ((($context["button_type"] ?? null) == "link")) {
            // line 302
            echo "    ";
            $context["buttonTag"] = "a";
            // line 303
            echo "    ";
            // line 304
            echo "    ";
            if (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "disabled", [], "any", true, true, false, 304)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "disabled", [], "any", false, false, false, 304), false)) : (false))) {
                // line 305
                echo "      ";
                $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 305) . " disabled"))]);
                // line 306
                echo "    ";
            }
            // line 307
            echo "  ";
        } else {
            // line 308
            echo "    ";
            $context["buttonTag"] = "button";
            // line 309
            echo "    ";
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["type" => "button"]);
            // line 310
            echo "  ";
        }
        // line 311
        echo "
  <";
        // line 312
        echo twig_escape_filter($this->env, ($context["buttonTag"] ?? null), "html", null, true);
        echo " ";
        $this->displayBlock("button_attributes", $context, $blocks);
        echo ">
    <i class=\"material-icons\">";
        // line 313
        echo twig_escape_filter($this->env, ($context["button_icon"] ?? null), "html", null, true);
        echo "</i>
    ";
        // line 314
        echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
        echo "
  </";
        // line 315
        echo twig_escape_filter($this->env, ($context["buttonTag"] ?? null), "html", null, true);
        echo ">";
    }

    // line 318
    public function block_choice_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 319
        $this->displayParentBlock("choice_widget", $context, $blocks);
        // line 320
        $this->displayBlock("form_help", $context, $blocks);
        echo "
";
    }

    // line 323
    public function block_choice_widget_collapsed($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 324
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 324)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 324), "")) : ("")) . " custom-select"))]);
        // line 325
        $this->displayParentBlock("choice_widget_collapsed", $context, $blocks);
    }

    // line 328
    public function block_choice_widget_expanded($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 329
        if (twig_in_filter("-inline", ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 329)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 329), "")) : ("")))) {
            // line 330
            echo "<div class=\"control-group\">";
            // line 331
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 332
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', ["parent_label_class" => ((twig_get_attribute($this->env, $this->source,                 // line 333
($context["label_attr"] ?? null), "class", [], "any", true, true, false, 333)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 333), "")) : ("")), "translation_domain" =>                 // line 334
($context["choice_translation_domain"] ?? null), "valid" =>                 // line 335
($context["valid"] ?? null)]);
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 338
            echo "</div>";
        } else {
            // line 340
            echo "<div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 341
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 342
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', ["parent_label_class" => ((twig_get_attribute($this->env, $this->source,                 // line 343
($context["label_attr"] ?? null), "class", [], "any", true, true, false, 343)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 343), "")) : ("")), "translation_domain" =>                 // line 344
($context["choice_translation_domain"] ?? null), "valid" =>                 // line 345
($context["valid"] ?? null)]);
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 348
            echo "</div>";
        }
    }

    // line 352
    public function block_choice_tree_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 353
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo " class=\"category-tree-overflow\">
    <ul class=\"category-tree\">
      <li class=\"form-control-label text-right main-category\">";
        // line 355
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Main category", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</li>";
        // line 356
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
            // line 357
            echo "        ";
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
        // line 359
        echo "</ul>
  </div>";
    }

    // line 363
    public function block_choice_tree_item_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 364
        echo "<li>
    ";
        // line 365
        $context["checked"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 365), "submitted_values", [], "any", true, true, false, 365) && twig_get_attribute($this->env, $this->source, ($context["submitted_values"] ?? null), twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "id_category", [], "any", false, false, false, 365), [], "array", true, true, false, 365))) ? ("checked=\"checked\"") : (""));
        // line 366
        echo "    ";
        if (($context["multiple"] ?? null)) {
            // line 367
            echo "<div class=\"checkbox\">
        <label>
          <input type=\"checkbox\" name=\"";
            // line 369
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 369), "full_name", [], "any", false, false, false, 369), "html", null, true);
            echo "[tree][]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "id_category", [], "any", false, false, false, 369), "html", null, true);
            echo "\" class=\"category\" ";
            echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
            echo ">
          ";
            // line 370
            if ((twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "active", [], "any", true, true, false, 370) && (twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "active", [], "any", false, false, false, 370) == 0))) {
                // line 371
                echo "            <i>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "name", [], "any", false, false, false, 371), "html", null, true);
                echo "</i>";
            } else {
                // line 373
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "name", [], "any", false, false, false, 373), "html", null, true);
                echo "
          ";
            }
            // line 375
            echo "          ";
            if (array_key_exists("defaultCategory", $context)) {
                // line 376
                echo "            <input type=\"radio\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "id_category", [], "any", false, false, false, 376), "html", null, true);
                echo "\" name=\"ignore\" class=\"default-category\" />
          ";
            }
            // line 378
            echo "        </label>
      </div>";
        } else {
            // line 381
            echo "<div class=\"radio\">
        <label>
          <input type=\"radio\" name=\"form[";
            // line 383
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 383), "id", [], "any", false, false, false, 383), "html", null, true);
            echo "][tree]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "id_category", [], "any", false, false, false, 383), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
            echo " class=\"category\">
          ";
            // line 384
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "name", [], "any", false, false, false, 384), "html", null, true);
            echo "
          ";
            // line 385
            if (array_key_exists("defaultCategory", $context)) {
                // line 386
                echo "            <input type=\"radio\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "id_category", [], "any", false, false, false, 386), "html", null, true);
                echo "\" name=\"ignore\" class=\"default-category\" />
          ";
            }
            // line 388
            echo "        </label>
      </div>";
        }
        // line 391
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "children", [], "any", true, true, false, 391)) {
            // line 392
            echo "      <ul>
        ";
            // line 393
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["child"] ?? null), "children", [], "any", false, false, false, 393));
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
                // line 394
                echo "          ";
                $context["child"] = $context["item"];
                // line 395
                echo "          ";
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
            // line 397
            echo "</ul>
    ";
        }
        // line 399
        echo "  </li>";
    }

    // line 402
    public function block_translatefields_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 403
        echo "  ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
  <div class=\"translations tabbable\" id=\"";
        // line 404
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 404), "id", [], "any", false, false, false, 404), "html", null, true);
        echo "\" tabindex=\"1\">
    ";
        // line 405
        if (((($context["hideTabs"] ?? null) == false) && (twig_length_filter($this->env, ($context["form"] ?? null)) > 1))) {
            // line 406
            echo "      <ul class=\"translationsLocales nav nav-pills\">
        ";
            // line 407
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
                // line 408
                echo "          <li class=\"nav-item\">
            <a href=\"#\" data-locale=\"";
                // line 409
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 409), "label", [], "any", false, false, false, 409), "html", null, true);
                echo "\" class=\"";
                if ((twig_get_attribute($this->env, $this->source, ($context["defaultLocale"] ?? null), "id_lang", [], "any", false, false, false, 409) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 409), "name", [], "any", false, false, false, 409))) {
                    echo "active";
                }
                echo " nav-link\" data-toggle=\"tab\" data-target=\".translationsFields-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 409), "id", [], "any", false, false, false, 409), "html", null, true);
                echo "\">
              ";
                // line 410
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 410), "label", [], "any", false, false, false, 410)), "html", null, true);
                echo "
            </a>
          </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 414
            echo "      </ul>
    ";
        }
        // line 416
        echo "
    <div class=\"translationsFields tab-content\">
      ";
        // line 418
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
            // line 419
            echo "        <div data-locale=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 419), "label", [], "any", false, false, false, 419), "html", null, true);
            echo "\" class=\"translationsFields-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 419), "id", [], "any", false, false, false, 419), "html", null, true);
            echo " tab-pane translation-field ";
            if (((($context["hideTabs"] ?? null) == false) && (twig_length_filter($this->env, ($context["form"] ?? null)) > 1))) {
                echo "panel panel-default";
            }
            echo " ";
            if ((twig_get_attribute($this->env, $this->source, ($context["defaultLocale"] ?? null), "id_lang", [], "any", false, false, false, 419) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 419), "name", [], "any", false, false, false, 419))) {
                echo "show active";
            }
            echo " ";
            if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 419), "valid", [], "any", false, false, false, 419)) {
                echo "field-error";
            }
            echo " translation-label-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 419), "label", [], "any", false, false, false, 419), "html", null, true);
            echo "\">
          ";
            // line 420
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["translationsFields"], 'errors');
            echo "
          ";
            // line 421
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["translationsFields"], 'widget');
            echo "
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 424
        echo "    </div>
  </div>
";
    }

    // line 428
    public function block_translate_fields_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 429
        if (( !array_key_exists("type", $context) || ("file" != ($context["type"] ?? null)))) {
            // line 430
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 430)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 430), "")) : ("")) . " form-control"))]);
        }
        // line 432
        $this->displayParentBlock("translate_fields_widget", $context, $blocks);
    }

    // line 435
    public function block_translate_text_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 436
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
  <div class=\"input-group locale-input-group js-locale-input-group\">
    ";
        // line 438
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
        foreach ($context['_seq'] as $context["_key"] => $context["translateField"]) {
            // line 439
            echo "      ";
            $context["classes"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, true, false, 439), "attr", [], "any", false, true, false, 439), "class", [], "any", true, true, false, 439)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, true, false, 439), "attr", [], "any", false, true, false, 439), "class", [], "any", false, false, false, 439), "")) : ("")) . " js-locale-input");
            // line 440
            echo "      ";
            $context["classes"] = ((($context["classes"] ?? null) . " js-locale-") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, false, false, 440), "label", [], "any", false, false, false, 440));
            // line 441
            echo "
      ";
            // line 442
            if ((twig_get_attribute($this->env, $this->source, ($context["default_locale"] ?? null), "id_lang", [], "any", false, false, false, 442) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, false, false, 442), "name", [], "any", false, false, false, 442))) {
                // line 443
                echo "        ";
                $context["classes"] = (($context["classes"] ?? null) . " d-none");
                // line 444
                echo "      ";
            }
            // line 446
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter(($context["classes"] ?? null))]);
            // line 447
            $this->displayBlock("form_widget", $context, $blocks);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translateField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 449
        echo "
    ";
        // line 450
        if ( !($context["hide_locales"] ?? null)) {
            // line 451
            echo "      <div class=\"dropdown\">
        <button class=\"btn btn-outline-secondary dropdown-toggle js-locale-btn\"
                type=\"button\"
                data-toggle=\"dropdown\"
                aria-haspopup=\"true\"
                aria-expanded=\"false\"
                id=\"";
            // line 457
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 457), "id", [], "any", false, false, false, 457), "html", null, true);
            echo "\"
        >
          ";
            // line 459
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 459), "default_locale", [], "any", false, false, false, 459), "iso_code", [], "any", false, false, false, 459), "html", null, true);
            echo "
        </button>

        <div class=\"dropdown-menu locale-dropdown-menu\" aria-labelledby=\"";
            // line 462
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 462), "id", [], "any", false, false, false, 462), "html", null, true);
            echo "\">
          ";
            // line 463
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locales"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["locale"]) {
                // line 464
                echo "            <span class=\"dropdown-item js-locale-item\" data-locale=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "iso_code", [], "any", false, false, false, 464), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "name", [], "any", false, false, false, 464), "html", null, true);
                echo "</span>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['locale'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 466
            echo "        </div>
      </div>
    ";
        }
        // line 469
        echo "  </div>";
    }

    // line 472
    public function block_translate_textarea_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 473
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
  <div class=\"input-group locale-input-group js-locale-input-group\">
    ";
        // line 475
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["textarea"]) {
            // line 476
            echo "      ";
            $context["classes"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["textarea"], "vars", [], "any", false, true, false, 476), "attr", [], "any", false, true, false, 476), "class", [], "any", true, true, false, 476)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["textarea"], "vars", [], "any", false, true, false, 476), "attr", [], "any", false, true, false, 476), "class", [], "any", false, false, false, 476), "")) : ("")) . " js-locale-input");
            // line 477
            echo "      ";
            $context["classes"] = ((($context["classes"] ?? null) . " js-locale-") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["textarea"], "vars", [], "any", false, false, false, 477), "label", [], "any", false, false, false, 477));
            // line 478
            echo "
      ";
            // line 479
            if ((twig_get_attribute($this->env, $this->source, ($context["default_locale"] ?? null), "id_lang", [], "any", false, false, false, 479) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["textarea"], "vars", [], "any", false, false, false, 479), "name", [], "any", false, false, false, 479))) {
                // line 480
                echo "        ";
                $context["classes"] = (($context["classes"] ?? null) . " d-none");
                // line 481
                echo "      ";
            }
            // line 482
            echo "
      <div class=\"";
            // line 483
            echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
            echo "\">
        ";
            // line 484
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["textarea"], 'widget', ["attr" => ["class" => twig_trim_filter(($context["classes"] ?? null))]]);
            echo "
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['textarea'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 487
        echo "
    ";
        // line 488
        if (($context["show_locale_select"] ?? null)) {
            // line 489
            echo "      <div class=\"dropdown\">
        <button class=\"btn btn-outline-secondary dropdown-toggle js-locale-btn\"
                type=\"button\"
                data-toggle=\"dropdown\"
                aria-haspopup=\"true\"
                aria-expanded=\"false\"
                id=\"";
            // line 495
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 495), "id", [], "any", false, false, false, 495), "html", null, true);
            echo "\"
        >
          ";
            // line 497
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 497), "default_locale", [], "any", false, false, false, 497), "iso_code", [], "any", false, false, false, 497), "html", null, true);
            echo "
        </button>

        <div class=\"dropdown-menu locale-dropdown-menu\" aria-labelledby=\"";
            // line 500
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 500), "id", [], "any", false, false, false, 500), "html", null, true);
            echo "\">
          ";
            // line 501
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locales"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["locale"]) {
                // line 502
                echo "            <span class=\"dropdown-item js-locale-item\"
                  data-locale=\"";
                // line 503
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "iso_code", [], "any", false, false, false, 503), "html", null, true);
                echo "\"
            >
              ";
                // line 505
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "name", [], "any", false, false, false, 505), "html", null, true);
                echo "
            </span>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['locale'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 508
            echo "        </div>
      </div>
    ";
        }
        // line 511
        echo "  </div>";
    }

    // line 514
    public function block_date_picker_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 515
        echo "  ";
        ob_start(function () { return ''; });
        // line 516
        echo "    ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 516)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 516), "")) : ("")) . " form-control datepicker"))]);
        // line 517
        echo "    <div class=\"input-group datepicker\">
      <input type=\"text\" data-format=\"";
        // line 518
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
        // line 525
        $this->displayBlock("form_help", $context, $blocks);
        echo "
  ";
        $___internal_parse_3_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 515
        echo twig_spaceless($___internal_parse_3_);
    }

    // line 529
    public function block_date_range_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 530
        echo "  ";
        ob_start(function () { return ''; });
        // line 531
        echo "    <div class=\"input-group date-range row\">
      <div class=\"col col-md-4\">
        ";
        // line 533
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "from", [], "any", false, false, false, 533), 'row');
        echo "
      </div>
      <div class=\"col col-md-4\">
        ";
        // line 536
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "to", [], "any", false, false, false, 536), 'row');
        echo "
        ";
        // line 537
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "unlimited", [], "any", true, true, false, 537)) {
            // line 538
            echo "          ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "unlimited", [], "any", false, false, false, 538), 'widget');
            echo "
          ";
            // line 539
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "unlimited", [], "any", false, false, false, 539), 'errors');
            echo "
        ";
        }
        // line 541
        echo "      </div>
    </div>
  ";
        $___internal_parse_4_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 530
        echo twig_spaceless($___internal_parse_4_);
    }

    // line 546
    public function block_search_and_reset_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 547
        echo "  ";
        ob_start(function () { return ''; });
        // line 548
        echo "    <button type=\"submit\"
            class=\"btn btn-primary grid-search-button d-block\"
            title=\"";
        // line 550
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search", [], "Admin.Actions"), "html", null, true);
        echo "\"
            name=\"";
        // line 551
        echo twig_escape_filter($this->env, ($context["full_name"] ?? null), "html", null, true);
        echo "[search]\"
    >
      <i class=\"material-icons\">search</i>
      ";
        // line 554
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search", [], "Admin.Actions"), "html", null, true);
        echo "
    </button>
    ";
        // line 556
        if (($context["show_reset_button"] ?? null)) {
            // line 557
            echo "      <div class=\"js-grid-reset-button\">
        <button type=\"reset\"
                name=\"";
            // line 559
            echo twig_escape_filter($this->env, ($context["full_name"] ?? null), "html", null, true);
            echo "[reset]\"
                class=\"btn btn-link js-reset-search btn d-block grid-reset-button\"
                data-url=\"";
            // line 561
            echo twig_escape_filter($this->env, ($context["reset_url"] ?? null), "html", null, true);
            echo "\"
                data-redirect=\"";
            // line 562
            echo twig_escape_filter($this->env, ($context["redirect_url"] ?? null), "html", null, true);
            echo "\"
        >
          <i class=\"material-icons\">clear</i>
          ";
            // line 565
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reset", [], "Admin.Actions"), "html", null, true);
            echo "
        </button>
      </div>
    ";
        }
        // line 569
        echo "  ";
        $___internal_parse_5_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 547
        echo twig_spaceless($___internal_parse_5_);
    }

    // line 572
    public function block_switch_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 573
        echo "  ";
        ob_start(function () { return ''; });
        // line 574
        echo "  ";
        $context["rowAttributes"] = ((array_key_exists("row_attr", $context)) ? (_twig_default_filter(($context["row_attr"] ?? null), [])) : ([]));
        // line 575
        echo "  <div class=\"input-group ";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["rowAttributes"] ?? null), "class", [], "any", true, true, false, 575)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["rowAttributes"] ?? null), "class", [], "any", false, false, false, 575), "")) : ("")), "html", null, true);
        echo "\" ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rowAttributes"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["rowAttr"]) {
            echo " ";
            if (($context["key"] != "class")) {
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["rowAttr"], "html", null, true);
                echo "\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['rowAttr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ">
    <span class=\"ps-switch\" id=\"";
        // line 576
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 576), "id", [], "any", false, false, false, 576), "html", null, true);
        echo "\">
        ";
        // line 577
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
            // line 578
            echo "          ";
            $context["inputId"] = ((($context["id"] ?? null) . "_") . twig_get_attribute($this->env, $this->source, $context["choice"], "value", [], "any", false, false, false, 578));
            // line 579
            echo "          <input id=\"";
            echo twig_escape_filter($this->env, ($context["inputId"] ?? null), "html", null, true);
            echo "\"
            ";
            // line 580
            $this->displayBlock("attributes", $context, $blocks);
            echo "
            name=\"";
            // line 581
            echo twig_escape_filter($this->env, ($context["full_name"] ?? null), "html", null, true);
            echo "\"
            value=\"";
            // line 582
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["choice"], "value", [], "any", false, false, false, 582), "html", null, true);
            echo "\"
            ";
            // line 583
            if (Symfony\Bridge\Twig\Extension\twig_is_selected_choice($context["choice"], ($context["value"] ?? null))) {
                echo "checked=\"\"";
            }
            // line 584
            echo "            ";
            if (($context["disabled"] ?? null)) {
                echo "disabled=\"\"";
            }
            // line 585
            echo "            type=\"radio\"
          >
          ";
            // line 587
            if (($context["show_choices"] ?? null)) {
                echo "<label for=\"";
                echo twig_escape_filter($this->env, ($context["inputId"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["choice"], "label", [], "any", false, false, false, 587), [], ($context["choice_translation_domain"] ?? null)), "html", null, true);
                echo "</label>";
            }
            // line 588
            echo "        ";
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
        // line 589
        echo "        <span class=\"slide-button\"></span>
    </span>
  </div>
  ";
        $___internal_parse_6_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 573
        echo twig_spaceless($___internal_parse_6_);
        // line 593
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 596
    public function block_row_attributes($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 597
        $context["rowAttributes"] = ((array_key_exists("row_attr", $context)) ? (_twig_default_filter(($context["row_attr"] ?? null), [])) : ([]));
        // line 598
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rowAttributes"] ?? null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            // line 599
            echo " ";
            // line 600
            echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
            echo "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 604
    public function block__form_step6_attachments_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 605
        echo "  <div class=\"js-options-no-attachments ";
        echo (((twig_length_filter($this->env, ($context["form"] ?? null)) > 0)) ? ("hide") : (""));
        echo "\">
    <small>";
        // line 606
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("There is no attachment yet.", [], "Admin.Catalog.Notification"), "html", null, true);
        echo "</small>
  </div>
  <div id=\"product-attachments\" class=\"panel panel-default\">
    <div class=\"panel-body js-options-with-attachments ";
        // line 609
        echo (((twig_length_filter($this->env, ($context["form"] ?? null)) == 0)) ? ("hide") : (""));
        echo "\">
      <div>
        <table id=\"product-attachment-file\" class=\"table\">
          <thead class=\"thead-default\">
          <tr>
            <th class=\"col-md-3\">";
        // line 614
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Title", [], "Admin.Global"), "html", null, true);
        echo "</th>
            <th class=\"col-md-6\">";
        // line 615
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("File name", [], "Admin.Global"), "html", null, true);
        echo "</th>
            <th class=\"col-md-2\">";
        // line 616
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Type", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
          </tr>
          </thead>
          <tbody>";
        // line 620
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
            // line 621
            echo "            <tr>
              <td class=\"col-md-3\">";
            // line 622
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget');
            echo "</td>
              <td class=\"col-md-6 file-name\"><span>";
            // line 623
            echo twig_escape_filter($this->env, (($__internal_compile_5 = (($__internal_compile_6 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 623), "attr", [], "any", false, false, false, 623), "data", [], "any", false, false, false, 623)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 623)] ?? null) : null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["file_name"] ?? null) : null), "html", null, true);
            echo "</span></td>
              <td class=\"col-md-2\">";
            // line 624
            echo twig_escape_filter($this->env, (($__internal_compile_7 = (($__internal_compile_8 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 624), "attr", [], "any", false, false, false, 624), "data", [], "any", false, false, false, 624)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 624)] ?? null) : null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["mime"] ?? null) : null), "html", null, true);
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
        // line 627
        echo "</tbody>
        </table>
      </div>
    </div>
  </div>
";
    }

    // line 636
    public function block_choice_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 638
        $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter(twig_replace_filter(((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 638)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 638), "")) : ("")), ["checkbox-inline" => "", "radio-inline" => ""]))]);
        // line 639
        $this->displayBlock("form_label", $context, $blocks);
    }

    // line 642
    public function block_checkbox_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 643
        $this->displayBlock("checkbox_radio_label", $context, $blocks);
    }

    // line 646
    public function block_radio_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 647
        $this->displayBlock("checkbox_radio_label", $context, $blocks);
    }

    // line 650
    public function block_checkbox_radio_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 651
        echo "  ";
        // line 652
        echo "  ";
        if (array_key_exists("widget", $context)) {
            // line 653
            echo "    ";
            if (($context["required"] ?? null)) {
                // line 654
                echo "      ";
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 654)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 654), "")) : ("")) . " required"))]);
                // line 655
                echo "    ";
            }
            // line 656
            echo "    ";
            if (array_key_exists("parent_label_class", $context)) {
                // line 657
                echo "      ";
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 657)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 657), "")) : ("")) . " ") . ($context["parent_label_class"] ?? null)))]);
                // line 658
                echo "    ";
            }
            // line 659
            echo "    ";
            if (( !(($context["label"] ?? null) === false) && twig_test_empty(($context["label"] ?? null)))) {
                // line 660
                echo "      ";
                $context["label"] = $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize(($context["name"] ?? null));
                // line 661
                echo "    ";
            }
            // line 662
            echo "
    ";
            // line 663
            if (((($__internal_compile_9 = ($context["block_prefixes"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[2] ?? null) : null) == "radio")) {
                // line 664
                echo "      <label class=\"form-check-label\"";
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
                // line 665
                echo ($context["widget"] ?? null);
                // line 667
                echo "<i class=\"form-check-round\"></i>";
                // line 669
                echo (( !(($context["label"] ?? null) === false)) ? ((((($context["translation_domain"] ?? null) === false)) ? (($context["label"] ?? null)) : (($context["label"] ?? null)))) : (""));
                // line 670
                echo "</label>
    ";
            } else {
                // line 672
                echo "      <div class=\"md-checkbox md-checkbox-inline\">
        <label";
                // line 673
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
                // line 674
                echo ($context["widget"] ?? null);
                // line 675
                echo "<i class=\"md-checkbox-control\"></i>";
                // line 676
                echo (( !(($context["label"] ?? null) === false)) ? ((((($context["translation_domain"] ?? null) === false)) ? (($context["label"] ?? null)) : (($context["label"] ?? null)))) : (""));
                // line 677
                echo "</label>
      </div>
    ";
            }
            // line 680
            echo "  ";
        }
    }

    // line 683
    public function block_radio_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 684
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter(($context["parent_label_class"] ?? null), ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 684)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 684), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 684)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 684), "")) : (""))));
        // line 685
        if (twig_in_filter("radio-custom", ($context["parent_label_class"] ?? null))) {
            // line 686
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 686)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 686), "")) : ("")) . " custom-control-input"))]);
            // line 687
            echo "<div class=\"custom-control custom-radio";
            echo ((twig_in_filter("radio-inline", ($context["parent_label_class"] ?? null))) ? (" custom-control-inline") : (""));
            echo "\">";
            // line 688
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" =>             $this->renderBlock("base_radio_widget", $context, $blocks)]);
            // line 689
            echo "</div>";
        } else {
            // line 691
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 691)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 691), "")) : ("")) . " form-check-input"))]);
            // line 692
            echo "<div class=\"form-check form-check-radio form-radio";
            echo ((twig_in_filter("radio-inline", ($context["parent_label_class"] ?? null))) ? (" form-check-inline") : (""));
            echo "\">";
            // line 693
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" =>             $this->renderBlock("base_radio_widget", $context, $blocks)]);
            // line 694
            echo "</div>";
        }
    }

    // line 698
    public function block_checkbox_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 699
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter(($context["parent_label_class"] ?? null), ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 699)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 699), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 699)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 699), "")) : (""))));
        // line 700
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 700)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 700), "")) : ("")) . " form-check-input"))]);
        // line 701
        echo "<div class=\"form-check form-check-radio form-checkbox";
        if (twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "container_class", [], "any", true, true, false, 701)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "container_class", [], "any", false, false, false, 701), "html", null, true);
        }
        echo "\">";
        // line 702
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" =>         $this->renderBlock("base_checkbox_widget", $context, $blocks)]);
        // line 703
        echo "</div>";
    }

    // line 708
    public function block_form_errors($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 709
        if ((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "fieldError", [], "array", true, true, false, 709) && ((($__internal_compile_10 = ($context["attr"] ?? null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["fieldError"] ?? null) : null) == true))) {
            // line 710
            echo "    ";
            $this->displayBlock("form_errors_field", $context, $blocks);
            echo "
  ";
        } else {
            // line 712
            echo "    ";
            $this->displayBlock("form_errors_other", $context, $blocks);
            echo "
  ";
        }
    }

    // line 716
    public function block_form_errors_field($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 717
        echo "  ";
        if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
            // line 719
            if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 1)) {
                // line 721
                $context["popoverContainer"] = ("popover-error-container-" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 721), "id", [], "any", false, false, false, 721));
                // line 722
                echo "      <div class=\"";
                echo twig_escape_filter($this->env, ($context["popoverContainer"] ?? null), "html", null, true);
                echo "\"></div>

      ";
                // line 724
                ob_start(function () { return ''; });
                // line 725
                echo "        <div class=\"popover-error-list\">
          <ul>";
                // line 727
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 728
                    echo "<li class=\"text-danger\"> ";
                    echo twig_escape_filter($this->env, (((null === twig_get_attribute($this->env, $this->source,                     // line 729
$context["error"], "messagePluralization", [], "any", false, false, false, 729))) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source,                     // line 730
$context["error"], "messageTemplate", [], "any", false, false, false, 730), twig_get_attribute($this->env, $this->source, $context["error"], "messageParameters", [], "any", false, false, false, 730), "form_error")) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->transchoice(twig_get_attribute($this->env, $this->source,                     // line 731
$context["error"], "messageTemplate", [], "any", false, false, false, 731), twig_get_attribute($this->env, $this->source, $context["error"], "messagePluralization", [], "any", false, false, false, 731), twig_get_attribute($this->env, $this->source, $context["error"], "messageParameters", [], "any", false, false, false, 731), "form_error"))), "html", null, true);
                    // line 732
                    echo "
              </li>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 735
                echo "          </ul>
        </div>
      ";
                $context["popoverErrorContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 738
                echo "
      <template class=\"js-popover-error-content\" data-id=\"";
                // line 739
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 739), "id", [], "any", false, false, false, 739), "html", null, true);
                echo "\">
        ";
                // line 740
                echo twig_escape_filter($this->env, ($context["popoverErrorContent"] ?? null), "html", null, true);
                echo "
      </template>

      ";
                // line 743
                ob_start(function () { return ''; });
                // line 744
                echo "        <span
          data-toggle=\"form-popover-error\"
          data-id=\"";
                // line 746
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 746), "id", [], "any", false, false, false, 746), "html", null, true);
                echo "\"
          data-placement=\"bottom\"
          data-template='<div class=\"popover form-popover-error\" role=\"tooltip\"><h3 class=\"popover-header\"></h3><div class=\"popover-body\"></div></div>'
          data-trigger=\"hover\"
          data-container=\".";
                // line 750
                echo twig_escape_filter($this->env, ($context["popoverContainer"] ?? null), "html", null, true);
                echo "\"
        >
          <i class=\"material-icons form-error-icon\">error_outline</i> <u> ";
                // line 752
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->transchoice("%count% errors", twig_length_filter($this->env, ($context["errors"] ?? null)), [], "Admin.Global"), "html", null, true);
                echo "</u>
        </span>
      ";
                $context["errorPopover"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 755
                echo "
      <div class=\"invalid-feedback-container\">
        <div class=\"text-danger\">
          ";
                // line 758
                echo twig_escape_filter($this->env, ($context["errorPopover"] ?? null), "html", null, true);
                echo "
        </div>
      </div>

      ";
            } else {
                // line 764
                echo "<div class=\"d-inline-block text-danger align-top\">
        <i class=\"material-icons form-error-icon\">error_outline</i>
      </div>
      <div class=\"d-inline-block\">
        ";
                // line 768
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 769
                    echo "          <div class=\"text-danger\">
            <p> ";
                    // line 770
                    echo twig_escape_filter($this->env, (((null === twig_get_attribute($this->env, $this->source,                     // line 771
$context["error"], "messagePluralization", [], "any", false, false, false, 771))) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source,                     // line 772
$context["error"], "messageTemplate", [], "any", false, false, false, 772), twig_get_attribute($this->env, $this->source, $context["error"], "messageParameters", [], "any", false, false, false, 772), "form_error")) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->transchoice(twig_get_attribute($this->env, $this->source,                     // line 773
$context["error"], "messageTemplate", [], "any", false, false, false, 773), twig_get_attribute($this->env, $this->source, $context["error"], "messagePluralization", [], "any", false, false, false, 773), twig_get_attribute($this->env, $this->source, $context["error"], "messageParameters", [], "any", false, false, false, 773), "form_error"))), "html", null, true);
                    // line 774
                    echo "
            </p>
          </div>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 778
                echo "</div>";
            }
        }
    }

    // line 783
    public function block_form_errors_other($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 784
        echo "  ";
        if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
            // line 785
            echo "<div class=\"alert alert-danger d-print-none\" role=\"alert\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\"><i class=\"material-icons\">close</i></span>
      </button>
      <div class=\"alert-text\">
        ";
            // line 790
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 791
                echo "            <p> ";
                echo twig_escape_filter($this->env, (((null === twig_get_attribute($this->env, $this->source,                 // line 792
$context["error"], "messagePluralization", [], "any", false, false, false, 792))) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source,                 // line 793
$context["error"], "messageTemplate", [], "any", false, false, false, 793), twig_get_attribute($this->env, $this->source, $context["error"], "messageParameters", [], "any", false, false, false, 793), "form_error")) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->transchoice(twig_get_attribute($this->env, $this->source,                 // line 794
$context["error"], "messageTemplate", [], "any", false, false, false, 794), twig_get_attribute($this->env, $this->source, $context["error"], "messagePluralization", [], "any", false, false, false, 794), twig_get_attribute($this->env, $this->source, $context["error"], "messageParameters", [], "any", false, false, false, 794), "form_error"))), "html", null, true);
                // line 795
                echo "
            </p>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 798
            echo "</div>
    </div>
  ";
        }
    }

    // line 805
    public function block_material_choice_table_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 806
        echo "  ";
        ob_start(function () { return ''; });
        // line 807
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
        // line 817
        if (($context["isCheckSelectAll"] ?? null)) {
            // line 818
            echo "                    checked
                  ";
        }
        // line 820
        echo "                >
                <i class=\"md-checkbox-control\"></i>
                ";
        // line 822
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Select all", [], "Admin.Actions"), "html", null, true);
        echo "
              </label>
            </div>
          </th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 829
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 830
            echo "          <tr>
            <td>
              ";
            // line 832
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', ["material_design" => true]);
            echo "
            </td>
          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 836
        echo "        </tbody>
      </table>
    </div>
  ";
        $___internal_parse_7_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 806
        echo twig_spaceless($___internal_parse_7_);
    }

    // line 842
    public function block_material_multiple_choice_table_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 843
        echo "  ";
        ob_start(function () { return ''; });
        // line 844
        echo "    <div class=\"choice-table";
        if (($context["headers_fixed"] ?? null)) {
            echo "-headers-fixed";
        }
        echo " table-responsive\">
      <table class=\"table\">
        <thead>
        <tr>
          <th>";
        // line 848
        echo twig_escape_filter($this->env, ($context["table_label"] ?? null), "html", null, true);
        echo "</th>
          ";
        // line 849
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
            // line 850
            echo "            <th class=\"text-center\">
              ";
            // line 851
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child_choice"], "vars", [], "any", false, false, false, 851), "multiple", [], "any", false, false, false, 851) && !twig_in_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child_choice"], "vars", [], "any", false, false, false, 851), "name", [], "any", false, false, false, 851), ($context["headers_to_disable"] ?? null)))) {
                // line 852
                echo "                <a href=\"#\"
                   class=\"js-multiple-choice-table-select-column\"
                   data-column-num=\"";
                // line 854
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 854) + 1), "html", null, true);
                echo "\"
                   data-column-checked=\"false\"
                >
                  ";
                // line 857
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child_choice"], "vars", [], "any", false, false, false, 857), "label", [], "any", false, false, false, 857), "html", null, true);
                echo "
                </a>
              ";
            } else {
                // line 860
                echo "                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child_choice"], "vars", [], "any", false, false, false, 860), "label", [], "any", false, false, false, 860), "html", null, true);
                echo "
              ";
            }
            // line 862
            echo "            </th>
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
        // line 864
        echo "        </tr>
        </thead>
        <tbody>
        ";
        // line 867
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["choices"] ?? null));
        foreach ($context['_seq'] as $context["choice_name"] => $context["choice_value"]) {
            // line 868
            echo "          <tr>
            <td>
              ";
            // line 870
            echo twig_escape_filter($this->env, $context["choice_name"], "html", null, true);
            echo "
            </td>
            ";
            // line 872
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["child_choice_name"] => $context["child_choice"]) {
                // line 873
                echo "              <td class=\"text-center\">
                ";
                // line 874
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["child_choice_entry_index_mapping"] ?? null), $context["choice_value"], [], "array", false, true, false, 874), $context["child_choice_name"], [], "array", true, true, false, 874)) {
                    // line 875
                    echo "                  ";
                    $context["entry_index"] = (($__internal_compile_11 = (($__internal_compile_12 = ($context["child_choice_entry_index_mapping"] ?? null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12[$context["choice_value"]] ?? null) : null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[$context["child_choice_name"]] ?? null) : null);
                    // line 876
                    echo "
                  ";
                    // line 877
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child_choice"], "vars", [], "any", false, false, false, 877), "multiple", [], "any", false, false, false, 877)) {
                        // line 878
                        echo "                    ";
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_13 = $context["child_choice"]) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13[($context["entry_index"] ?? null)] ?? null) : null), 'widget', ["material_design" => true]);
                        echo "
                  ";
                    } else {
                        // line 880
                        echo "                    ";
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_14 = $context["child_choice"]) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14[($context["entry_index"] ?? null)] ?? null) : null), 'widget');
                        echo "
                  ";
                    }
                    // line 882
                    echo "                ";
                } else {
                    // line 883
                    echo "                  --
                ";
                }
                // line 885
                echo "              </td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['child_choice_name'], $context['child_choice'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 887
            echo "          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['choice_name'], $context['choice_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 889
        echo "        </tbody>
      </table>
    </div>
  ";
        $___internal_parse_8_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 843
        echo twig_spaceless($___internal_parse_8_);
    }

    // line 896
    public function block_translatable_fields_with_tabs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 897
        echo "  <div class=\"translations tabbable\" id=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 897), "id", [], "any", false, false, false, 897), "html", null, true);
        echo "\" tabindex=\"1\">
    ";
        // line 898
        if (((($context["hide_locales"] ?? null) == false) && (twig_length_filter($this->env, ($context["form"] ?? null)) > 1))) {
            // line 899
            echo "      <ul class=\"translationsLocales nav nav-pills\">
        ";
            // line 900
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
                // line 901
                echo "          <li class=\"nav-item\">
            <a href=\"#\" data-locale=\"";
                // line 902
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 902), "label", [], "any", false, false, false, 902), "html", null, true);
                echo "\" class=\"";
                if ((twig_get_attribute($this->env, $this->source, ($context["default_locale"] ?? null), "id_lang", [], "any", false, false, false, 902) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 902), "name", [], "any", false, false, false, 902))) {
                    echo "active";
                }
                echo " nav-link\" data-toggle=\"tab\" data-target=\".translationsFields-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 902), "id", [], "any", false, false, false, 902), "html", null, true);
                echo "\">
              ";
                // line 903
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 903), "label", [], "any", false, false, false, 903)), "html", null, true);
                echo "
            </a>
          </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 907
            echo "      </ul>
    ";
        }
        // line 909
        echo "
    <div class=\"translationsFields tab-content\">
      ";
        // line 911
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
            // line 912
            echo "        <div data-locale=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 912), "label", [], "any", false, false, false, 912), "html", null, true);
            echo "\" class=\"translationsFields-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 912), "id", [], "any", false, false, false, 912), "html", null, true);
            echo " tab-pane translation-field ";
            if (((($context["hide_locales"] ?? null) == false) && (twig_length_filter($this->env, ($context["form"] ?? null)) > 1))) {
                echo "panel panel-default";
            }
            echo " ";
            if ((twig_get_attribute($this->env, $this->source, ($context["default_locale"] ?? null), "id_lang", [], "any", false, false, false, 912) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 912), "name", [], "any", false, false, false, 912))) {
                echo "show active";
            }
            echo " ";
            if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 912), "valid", [], "any", false, false, false, 912)) {
                echo "field-error";
            }
            echo " translation-label-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translationsFields"], "vars", [], "any", false, false, false, 912), "label", [], "any", false, false, false, 912), "html", null, true);
            echo "\">
          ";
            // line 913
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["translationsFields"], 'widget');
            echo "
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 916
        echo "    </div>
  </div>
";
    }

    // line 920
    public function block_translatable_fields_with_dropdown($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 921
        $context["formClass"] = twig_trim_filter((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 921), "attr", [], "any", false, true, false, 921), "class", [], "any", true, true, false, 921)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 921), "attr", [], "any", false, true, false, 921), "class", [], "any", false, false, false, 921), "")) : ("")) . " input-group locale-input-group js-locale-input-group d-flex"));
        // line 922
        echo "    <div class=\"";
        echo twig_escape_filter($this->env, ($context["formClass"] ?? null), "html", null, true);
        echo "\" id=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 922), "id", [], "any", false, false, false, 922), "html", null, true);
        echo "\" tabindex=\"1\">
      ";
        // line 923
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["translateField"]) {
            // line 924
            echo "        ";
            $context["classes"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, true, false, 924), "attr", [], "any", false, true, false, 924), "class", [], "any", true, true, false, 924)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, true, false, 924), "attr", [], "any", false, true, false, 924), "class", [], "any", false, false, false, 924), "")) : ("")) . " js-locale-input");
            // line 925
            echo "        ";
            $context["classes"] = ((($context["classes"] ?? null) . " js-locale-") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, false, false, 925), "label", [], "any", false, false, false, 925));
            // line 926
            echo "        ";
            if ((twig_get_attribute($this->env, $this->source, ($context["default_locale"] ?? null), "id_lang", [], "any", false, false, false, 926) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, false, false, 926), "name", [], "any", false, false, false, 926))) {
                // line 927
                echo "          ";
                $context["classes"] = (($context["classes"] ?? null) . " d-none");
                // line 928
                echo "        ";
            }
            // line 929
            echo "        <div data-lang-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["translateField"], "vars", [], "any", false, false, false, 929), "name", [], "any", false, false, false, 929), "html", null, true);
            echo "\" class=\"";
            echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
            echo "\" style=\"flex-grow: 1;\">
          ";
            // line 930
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["translateField"], 'widget');
            echo "
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translateField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 933
        echo "      ";
        if ( !($context["hide_locales"] ?? null)) {
            // line 934
            echo "        <div class=\"dropdown\">
          <button class=\"btn btn-outline-secondary dropdown-toggle js-locale-btn\"
                  type=\"button\"
                  data-toggle=\"dropdown\"
            ";
            // line 938
            if (array_key_exists("change_form_language_url", $context)) {
                // line 939
                echo "              data-change-language-url=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 939), "change_form_language_url", [], "any", false, false, false, 939), "html", null, true);
                echo "\"
            ";
            }
            // line 941
            echo "                  aria-haspopup=\"true\"
                  aria-expanded=\"false\"
                  id=\"";
            // line 943
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 943), "id", [], "any", false, false, false, 943), "html", null, true);
            echo "_dropdown\"
          >
            ";
            // line 945
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 945), "default_locale", [], "any", false, false, false, 945), "iso_code", [], "any", false, false, false, 945), "html", null, true);
            echo "
          </button>
          <div class=\"dropdown-menu locale-dropdown-menu\" aria-labelledby=\"";
            // line 947
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 947), "id", [], "any", false, false, false, 947), "html", null, true);
            echo "_dropdown\">
            ";
            // line 948
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locales"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["locale"]) {
                // line 949
                echo "              <span class=\"dropdown-item js-locale-item\" data-locale=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "iso_code", [], "any", false, false, false, 949), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["locale"], "name", [], "any", false, false, false, 949), "html", null, true);
                echo "</span>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['locale'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 951
            echo "          </div>
        </div>
      ";
        }
        // line 954
        echo "    </div>";
    }

    // line 957
    public function block_translatable_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 958
        if (($context["use_tabs"] ?? null)) {
            // line 959
            echo "    ";
            $this->displayBlock("translatable_fields_with_tabs", $context, $blocks);
            echo "
  ";
        } else {
            // line 961
            echo "    ";
            $this->displayBlock("translatable_fields_with_dropdown", $context, $blocks);
            echo "
  ";
        }
        // line 963
        echo "  ";
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 966
    public function block_birthday_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 967
        echo "  ";
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 968
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 970
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 970)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 970), "")) : ("")) . " form-inline"))]);
            // line 971
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 972
                echo "<div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">";
            }
            // line 974
            echo "
    ";
            // line 975
            $context["yearWidget"] = (("<div class=\"col pl-0 birthday-select-container\">" . $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "year", [], "any", false, false, false, 975), 'widget')) . "</div>");
            // line 976
            echo "    ";
            $context["monthWidget"] = (("<div class=\"col birthday-select-container\">" . $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "month", [], "any", false, false, false, 976), 'widget')) . "</div>");
            // line 977
            echo "    ";
            $context["dayWidget"] = (("<div class=\"col pr-0 birthday-select-container\">" . $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "day", [], "any", false, false, false, 977), 'widget')) . "</div>");
            // line 979
            echo twig_replace_filter(($context["date_pattern"] ?? null), ["{{ year }}" =>             // line 980
($context["yearWidget"] ?? null), "{{ month }}" =>             // line 981
($context["monthWidget"] ?? null), "{{ day }}" =>             // line 982
($context["dayWidget"] ?? null)]);
            // line 985
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 986
                echo "</div>";
            }
        }
    }

    // line 991
    public function block_file_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 992
        echo "  <style>
    .custom-file-label:after {
      content: \"";
        // line 994
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Browse", [], "Admin.Actions"), "html", null, true);
        echo "\";
    }
  </style>
  <div class=\"custom-file\">
    ";
        // line 998
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source,         // line 999
($context["attr"] ?? null), "class", [], "any", true, true, false, 999)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 999), "")) : ("")) . " custom-file-input")), "data-multiple-files-text" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%count% file(s)", [], "Admin.Global"), "data-locale" => $this->extensions['PrestaShopBundle\Twig\ContextIsoCodeProviderExtension']->getIsoCode()]);
        // line 1004
        if ((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "disabled", [], "any", true, true, false, 1004) && twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "disabled", [], "any", false, false, false, 1004))) {
            // line 1005
            echo "      ";
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => (twig_get_attribute($this->env, $this->source,             // line 1006
($context["attr"] ?? null), "class", [], "any", false, false, false, 1006) . " disabled")]);
            // line 1008
            echo "    ";
        }
        // line 1009
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 1011
        echo "<label class=\"custom-file-label\" for=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1011), "id", [], "any", false, false, false, 1011), "html", null, true);
        echo "\">
      ";
        // line 1012
        $context["attributes"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1012), "attr", [], "any", false, false, false, 1012);
        // line 1013
        echo "      ";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "placeholder", [], "any", true, true, false, 1013)) ? (twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "placeholder", [], "any", false, false, false, 1013)) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Choose file(s)", [], "Admin.Actions"))), "html", null, true);
        echo "
    </label>
  </div>";
        // line 1016
        $this->displayBlock("form_help", $context, $blocks);
        // line 1017
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1017), "download_url", [], "any", false, false, false, 1017)) {
            // line 1018
            echo "    <a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1018), "download_url", [], "any", false, false, false, 1018), "html", null, true);
            echo "\">
      ";
            // line 1019
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Download file", [], "Admin.Actions"), "html", null, true);
            echo "
    </a>
  ";
        }
    }

    // line 1024
    public function block_shop_restriction_checkbox_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1025
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1025), "attr", [], "any", false, false, false, 1025), "is_allowed_to_display", [], "any", false, false, false, 1025)) {
            // line 1026
            echo "    <div class=\"md-checkbox md-checkbox-inline\">
      <label>
        ";
            // line 1028
            $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "checkbox")) : ("checkbox"));
            // line 1029
            echo "        <input
          class=\"js-multi-store-restriction-checkbox\"
          type=\"";
            // line 1031
            echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
            echo "\"
          ";
            // line 1032
            $this->displayBlock("widget_attributes", $context, $blocks);
            echo "
          value=\"";
            // line 1033
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\"
        >
        <i class=\"md-checkbox-control\"></i>
      </label>
    </div>
  ";
        }
    }

    // line 1041
    public function block_generatable_text_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1042
        echo "  <div class=\"input-group\">
    ";
        // line 1043
        if (($context["compound"] ?? null)) {
            // line 1044
            $this->displayBlock("form_widget_compound", $context, $blocks);
        } else {
            // line 1046
            $this->displayBlock("form_widget_simple", $context, $blocks);
        }
        // line 1048
        echo "    <span class=\"input-group-btn ml-1\">
      <button class=\"btn btn-outline-secondary js-generator-btn\"
              type=\"button\"
              data-target-input-id=\"";
        // line 1051
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\"
              data-generated-value-length=\"";
        // line 1052
        echo twig_escape_filter($this->env, ($context["generated_value_length"] ?? null), "html", null, true);
        echo "\"
      >
        ";
        // line 1054
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Generate", [], "Admin.Actions"), "html", null, true);
        echo "
      </button>
   </span>
  </div>
  ";
        // line 1058
        $this->displayBlock("form_help", $context, $blocks);
        echo "
";
    }

    // line 1061
    public function block_text_with_recommended_length_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1062
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-recommended-length-counter" => (("#" .         // line 1063
($context["id"] ?? null)) . "_recommended_length_counter"), "class" => "js-recommended-length-input"]);
        // line 1067
        if ((($context["input_type"] ?? null) == "textarea")) {
            // line 1068
            $this->displayBlock("textarea_widget", $context, $blocks);
        } else {
            // line 1070
            $this->displayBlock("form_widget_simple", $context, $blocks);
        }
        // line 1072
        echo "
  <small class=\"form-text text-muted text-right\"
         id=\"";
        // line 1074
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "_recommended_length_counter\"
  >
    <em>
      ";
        // line 1077
        echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("[1][/1] of [2][/2] characters used (recommended)", [], "Admin.Catalog.Feature"), ["[1]" => ("<span class=\"js-current-length\">" . twig_length_filter($this->env,         // line 1078
($context["value"] ?? null))), "[/1]" => "</span>", "[2]" => ("<span>" .         // line 1080
($context["recommended_length"] ?? null)), "[/2]" => "</span>"]);
        // line 1082
        echo "
    </em>
  </small>
";
    }

    // line 1087
    public function block_text_with_length_counter_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1088
        echo "  <div class=\"input-group js-text-with-length-counter\">
    ";
        // line 1089
        $context["current_length"] = (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1089), "max_length", [], "any", false, false, false, 1089) - twig_length_filter($this->env, ($context["value"] ?? null)));
        // line 1090
        echo "
    ";
        // line 1091
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1091), "position", [], "any", false, false, false, 1091) == "before")) {
            // line 1092
            echo "      <div class=\"input-group-prepend\">
        <span class=\"input-group-text js-countable-text\">";
            // line 1093
            echo twig_escape_filter($this->env, ($context["current_length"] ?? null), "html", null, true);
            echo "</span>
      </div>
    ";
        }
        // line 1096
        echo "
    ";
        // line 1097
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["data-max-length" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1097), "max_length", [], "any", false, false, false, 1097), "maxlength" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1097), "max_length", [], "any", false, false, false, 1097), "class" => "js-countable-input"]);
        // line 1098
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ($context["input_attr"] ?? null));
        // line 1100
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1100), "input", [], "any", false, false, false, 1100) == "input")) {
            // line 1101
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 1102
($context["form"] ?? null), "vars", [], "any", false, false, false, 1102), "input", [], "any", false, false, false, 1102) == "textarea")) {
            // line 1103
            $this->displayBlock("textarea_widget", $context, $blocks);
        } else {
            // line 1105
            $this->displayBlock("form_widget", $context, $blocks);
        }
        // line 1107
        echo "
    ";
        // line 1108
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1108), "position", [], "any", false, false, false, 1108) == "after")) {
            // line 1109
            echo "      <div class=\"input-group-append\">
        <span class=\"input-group-text js-countable-text\">";
            // line 1110
            echo twig_escape_filter($this->env, ($context["current_length"] ?? null), "html", null, true);
            echo "</span>
      </div>
    ";
        }
        // line 1113
        echo "  </div>
";
    }

    // line 1116
    public function block_integer_min_max_filter_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1117
        echo "  ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_15 = ($context["form"] ?? null)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15["min_field"] ?? null) : null), 'widget', ["attr" => ["class" => "min-field"]]);
        echo "
  ";
        // line 1118
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_16 = ($context["form"] ?? null)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16["max_field"] ?? null) : null), 'widget', ["attr" => ["class" => "max-field"]]);
        echo "
";
    }

    // line 1121
    public function block_number_min_max_filter_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1122
        echo "  ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_17 = ($context["form"] ?? null)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["min_field"] ?? null) : null), 'widget', ["attr" => ["class" => "min-field"]]);
        echo "
  ";
        // line 1123
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_18 = ($context["form"] ?? null)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18["max_field"] ?? null) : null), 'widget', ["attr" => ["class" => "max-field"]]);
        echo "
";
    }

    // line 1126
    public function block_number_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1127
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "text")) : ("text"));
        // line 1128
        echo "<div class=\"input-group\">";
        // line 1129
        $this->displayBlock("form_unit_prepend", $context, $blocks);
        // line 1130
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 1131
        $this->displayBlock("form_unit", $context, $blocks);
        // line 1132
        echo "</div>
  ";
        // line 1133
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 1136
    public function block_integer_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1137
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "number")) : ("number"));
        // line 1138
        echo "<div class=\"input-group\">";
        // line 1139
        $this->displayBlock("form_unit_prepend", $context, $blocks);
        // line 1140
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 1141
        $this->displayBlock("form_unit", $context, $blocks);
        // line 1142
        echo "</div>
  ";
        // line 1143
        $this->displayBlock("form_help", $context, $blocks);
    }

    // line 1146
    public function block_form_unit($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1147
        echo "  ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 1147), "unit", [], "any", true, true, false, 1147) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1147), "prepend_unit", [], "any", false, false, false, 1147))) {
            // line 1148
            echo "    <div class=\"input-group-append\">
      <span class=\"input-group-text\">";
            // line 1149
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1149), "unit", [], "any", false, false, false, 1149), "html", null, true);
            echo "</span>
    </div>
  ";
        }
    }

    // line 1154
    public function block_form_unit_prepend($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1155
        echo "  ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 1155), "unit", [], "any", true, true, false, 1155) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1155), "prepend_unit", [], "any", false, false, false, 1155))) {
            // line 1156
            echo "    <div class=\"input-group-prepend\">
      <span class=\"input-group-text\">";
            // line 1157
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1157), "unit", [], "any", false, false, false, 1157), "html", null, true);
            echo "</span>
    </div>
  ";
        }
    }

    // line 1162
    public function block_form_help($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1163
        echo "  ";
        if ( !(null === ($context["help"] ?? null))) {
            // line 1164
            $context["help_attr"] = twig_array_merge(($context["help_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["help_attr"] ?? null), "class", [], "any", true, true, false, 1164)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["help_attr"] ?? null), "class", [], "any", false, false, false, 1164), "")) : ("")) . " form-text"))]);
            // line 1165
            echo "<small id=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "_help\"";
            $__internal_compile_19 = $context;
            $__internal_compile_20 = ["attr" => ($context["help_attr"] ?? null)];
            if (!twig_test_iterable($__internal_compile_20)) {
                throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 1165, $this->getSourceContext());
            }
            $__internal_compile_20 = twig_to_array($__internal_compile_20);
            $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_20));
            $this->displayBlock("attributes", $context, $blocks);
            $context = $__internal_compile_19;
            echo ">";
            echo ($context["help"] ?? null);
            echo "</small>
  ";
        }
        // line 1167
        echo "  ";
        if (array_key_exists("warning", $context)) {
            // line 1168
            echo "    ";
            echo twig_escape_filter($this->env, ($context["warning"] ?? null), "html", null, true);
            echo "
  ";
        }
    }

    // line 1172
    public function block_form_prepend_external_link($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1173
        echo "  ";
        if ((array_key_exists("external_link", $context) && (twig_get_attribute($this->env, $this->source, ($context["external_link"] ?? null), "position", [], "any", false, false, false, 1173) == "prepend"))) {
            // line 1174
            $this->displayBlock("form_external_link", $context, $blocks);
        }
    }

    // line 1178
    public function block_form_append_external_link($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1179
        echo "  ";
        if ((array_key_exists("external_link", $context) && (twig_get_attribute($this->env, $this->source, ($context["external_link"] ?? null), "position", [], "any", false, false, false, 1179) == "append"))) {
            // line 1180
            $this->displayBlock("form_external_link", $context, $blocks);
        }
    }

    // line 1184
    public function block_form_external_link($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1185
        echo "  ";
        if (array_key_exists("external_link", $context)) {
            // line 1186
            ob_start(function () { return ''; });
            // line 1187
            echo "<a ";
            $this->displayBlock("form_external_link_attributes", $context, $blocks);
            echo ">
        <i class=\"material-icons\">open_in_new</i>";
            $context["openingTag"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 1191
            echo "<div class=\"small font-secondary";
            if ((twig_get_attribute($this->env, $this->source, ($context["external_link"] ?? null), "align", [], "any", false, false, false, 1191) === "right")) {
                echo " text-right";
            }
            echo "\">
      ";
            // line 1192
            echo twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["external_link"] ?? null), "text", [], "any", false, false, false, 1192), ["[1]" => ($context["openingTag"] ?? null), "[/1]" => "</a>"]);
            echo "
    </div>
  ";
        }
    }

    // line 1197
    public function block_form_external_link_attributes($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1198
        $context["external_link_attr"] = twig_array_merge(twig_get_attribute($this->env, $this->source, ($context["external_link"] ?? null), "attr", [], "any", false, false, false, 1198), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["external_link"] ?? null), "attr", [], "any", false, true, false, 1198), "class", [], "any", true, true, false, 1198)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["external_link"] ?? null), "attr", [], "any", false, true, false, 1198), "class", [], "any", false, false, false, 1198), "")) : ("")) . " btn btn-link px-0 align-right"))]);
        // line 1199
        echo "
  ";
        // line 1200
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["external_link_attr"] ?? null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            // line 1201
            echo "    ";
            if (!twig_in_filter($context["attrname"], [0 => "href", 1 => "class"])) {
                // line 1202
                echo "      ";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"
    ";
            }
            // line 1204
            echo "  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1205
        echo "
  target=\"_blank\"
  href=\"";
        // line 1207
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["external_link"] ?? null), "href", [], "any", false, false, false, 1207), "html", null, true);
        echo "\"
  class=\"";
        // line 1208
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["external_link_attr"] ?? null), "class", [], "any", false, false, false, 1208), "html", null, true);
        echo "\"";
    }

    // line 1211
    public function block_custom_content_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1212
        echo "  ";
        $this->loadTemplate(($context["template"] ?? null), "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", 1212)->display(twig_array_merge($context, ($context["data"] ?? null)));
    }

    // line 1215
    public function block_text_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1216
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["aria-label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%inputId% input", ["%inputId%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1216), "id", [], "any", false, false, false, 1216)], "Admin.Global")]);
        // line 1217
        if ( !(null === ($context["data_list"] ?? null))) {
            // line 1218
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["list" => (($context["id"] ?? null) . "_datalist")]);
        }
        // line 1220
        echo "
  ";
        // line 1221
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget', ["attr" => ($context["attr"] ?? null)]);
        echo "

  ";
        // line 1223
        if ( !(null === ($context["data_list"] ?? null))) {
            // line 1224
            echo "    <datalist id=\"";
            echo twig_escape_filter($this->env, (($context["id"] ?? null) . "_datalist"), "html", null, true);
            echo "\">
      ";
            // line 1225
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["data_list"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 1226
                echo "        <option value=\"";
                echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                echo "\"></option>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1228
            echo "    </datalist>
  ";
        }
    }

    // line 1232
    public function block_form_prepend_alert($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1233
        if ((array_key_exists("alert_position", $context) && (($context["alert_position"] ?? null) == "prepend"))) {
            // line 1234
            $this->displayBlock("form_alert", $context, $blocks);
        }
    }

    // line 1238
    public function block_form_append_alert($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1239
        if ((array_key_exists("alert_position", $context) && (($context["alert_position"] ?? null) == "append"))) {
            // line 1240
            $this->displayBlock("form_alert", $context, $blocks);
        }
    }

    // line 1244
    public function block_form_alert($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1245
        if (array_key_exists("alert_message", $context)) {
            // line 1246
            echo "    <div class=\"alert alert-";
            echo twig_escape_filter($this->env, ($context["alert_type"] ?? null), "html", null, true);
            if (array_key_exists("alert_title", $context)) {
                echo " expandable-alert";
            }
            echo "\" role=\"alert\">
    ";
            // line 1247
            if (array_key_exists("alert_title", $context)) {
                // line 1248
                echo "      <p class=\"alert-text\">
        ";
                // line 1249
                echo ($context["alert_title"] ?? null);
                echo "
      </p>
    ";
            } else {
                // line 1252
                echo "      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["alert_message"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 1253
                    echo "        <p class=\"alert-text\">
          ";
                    // line 1254
                    echo $context["message"];
                    echo "
        </p>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 1257
                echo "    ";
            }
            // line 1258
            echo "
    ";
            // line 1259
            if (array_key_exists("alert_title", $context)) {
                // line 1260
                echo "      <div class=\"alert-more collapse\" id=\"expandable_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1260), "id", [], "any", false, false, false, 1260), "html", null, true);
                echo "\" style=\"\">
        ";
                // line 1261
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["alert_message"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 1262
                    echo "          <p>
            ";
                    // line 1263
                    echo $context["message"];
                    echo "
          </p>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 1266
                echo "      </div>
      <div class=\"read-more-container\">
         <button type=\"button\" class=\"read-more btn-link\" data-toggle=\"collapse\" data-target=\"#expandable_";
                // line 1268
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1268), "id", [], "any", false, false, false, 1268), "html", null, true);
                echo "\" aria-expanded=\"true\" aria-controls=\"collapseDanger\">
            ";
                // line 1269
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Read more", [], "Admin.Actions"), "html", null, true);
                echo "
          </button>
       </div>
    ";
            }
            // line 1273
            echo "  </div>
  ";
        }
    }

    // line 1277
    public function block_unavailable_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1278
        echo "  <div class=\"alert alert-unavailable\" role=\"alert\">
    <p class=\"alert-text\">
      ";
        // line 1280
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Not available yet", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
    </p>
  </div>
";
    }

    // line 1285
    public function block_text_preview_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1286
        echo "  ";
        // line 1287
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 1288
        echo "<span class=\"label ";
        echo twig_escape_filter($this->env, ($context["preview_class"] ?? null), "html", null, true);
        echo "\">
    ";
        // line 1290
        echo "    ";
        if (array_key_exists("prefix", $context)) {
            // line 1291
            echo "      ";
            echo ($context["prefix"] ?? null);
            echo "
    ";
        }
        // line 1293
        echo "
    ";
        // line 1295
        echo "    ";
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html");
        echo "

    ";
        // line 1298
        echo "    ";
        if (array_key_exists("suffix", $context)) {
            // line 1299
            echo "      ";
            echo ($context["suffix"] ?? null);
            echo "
    ";
        }
        // line 1301
        echo "  </span>
";
    }

    // line 1304
    public function block_image_preview_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1305
        echo "  ";
        // line 1306
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 1307
        echo "<img src=\"";
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_trim_filter(("Image preview for " . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1307), "name", [], "any", false, false, false, 1307))), "html", null, true);
        echo "\" class=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1307), "image_class", [], "any", false, false, false, 1307), "html", null, true);
        echo "\" />
";
    }

    // line 1310
    public function block_delta_quantity_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1311
        echo "  ";
        $context["quantity"] = ((twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "quantity", [], "any", true, true, false, 1311)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "quantity", [], "any", false, false, false, 1311), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "quantity", [], "any", false, false, false, 1311), "vars", [], "any", false, false, false, 1311), "value", [], "any", false, false, false, 1311))) : (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "quantity", [], "any", false, false, false, 1311), "vars", [], "any", false, false, false, 1311), "value", [], "any", false, false, false, 1311)));
        // line 1312
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 1312)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 1312), "")) : ("")) . " delta-quantity")), "data-initial-quantity" => ($context["quantity"] ?? null)]);
        // line 1313
        echo "  <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
    ";
        // line 1314
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "quantity", [], "any", false, false, false, 1314), 'widget', ["value" => ($context["quantity"] ?? null)]);
        echo "
    ";
        // line 1315
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "delta", [], "any", false, false, false, 1315), 'row');
        echo "
  </div>
";
    }

    // line 1319
    public function block_delta_quantity_quantity_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1320
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 1320)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 1320), "")) : ("")) . " delta-quantity-quantity"))]);
        // line 1321
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">";
        // line 1322
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 1323
        echo "<span class=\"initial-quantity\">";
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "</span>
    <span class=\"quantity-update\">
      <i class=\"material-icons\">trending_flat</i>
      <span class=\"new-quantity\">";
        // line 1326
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "</span>
    </span>
  </div>
";
    }

    // line 1331
    public function block_delta_quantity_delta_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1332
        echo "  <div class=\"form-group";
        $this->displayBlock("widget_type_class", $context, $blocks);
        if ((( !($context["compound"] ?? null) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
            echo " has-error";
        }
        if (twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 1332)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, false, 1332), "html", null, true);
        }
        echo "\">
    <div class=\"delta-quantity-delta-container\">";
        // line 1334
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
        // line 1335
        $this->displayBlock("form_prepend_alert", $context, $blocks);
        // line 1336
        $this->displayBlock("form_prepend_external_link", $context, $blocks);
        // line 1338
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 1340
        $this->displayBlock("form_append_alert", $context, $blocks);
        // line 1341
        $this->displayBlock("form_append_external_link", $context, $blocks);
        // line 1342
        echo "</div>";
        // line 1343
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 1344
        $this->displayBlock("form_modify_all_shops", $context, $blocks);
        // line 1345
        echo "</div>
";
    }

    // line 1348
    public function block_delta_quantity_delta_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1349
        $context["type"] = "number";
        // line 1350
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 1350)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 1350), "")) : ("")) . " delta-quantity-delta"))]);
        // line 1351
        $this->displayBlock("form_widget_simple", $context, $blocks);
    }

    // line 1354
    public function block_submittable_input_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1355
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 1355)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 1355), "")) : ("")) . " ps-submittable-input-wrapper"))]);
        // line 1356
        echo "<div ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">";
        // line 1357
        $context["typeAttr"] = twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1357), "type_attr", [], "any", false, false, false, 1357), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 1358
($context["form"] ?? null), "vars", [], "any", false, true, false, 1358), "type_attr", [], "any", false, true, false, 1358), "class", [], "any", true, true, false, 1358)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 1358), "type_attr", [], "any", false, true, false, 1358), "class", [], "any", false, false, false, 1358), "")) : ("")) . " submittable-input")), "data-initial-value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 1359
($context["form"] ?? null), "value", [], "any", false, false, false, 1359), "vars", [], "any", false, false, false, 1359), "value", [], "any", false, false, false, 1359), "value" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 1360
($context["form"] ?? null), "value", [], "any", false, false, false, 1360), "vars", [], "any", false, false, false, 1360), "value", [], "any", false, false, false, 1360)]);
        // line 1363
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "value", [], "any", false, false, false, 1363), 'widget', ["attr" => ($context["typeAttr"] ?? null)]);
        // line 1364
        $this->displayBlock("submittable_input_button_widget", $context, $blocks);
        // line 1365
        echo "</div>
";
    }

    // line 1368
    public function block_submittable_input_button_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1369
        echo "  <button type=\"button\" class=\"check-button d-none\">
    <i class=\"material-icons\">check</i>
  </button>
";
    }

    // line 1374
    public function block_submittable_delta_quantity_delta_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1375
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 1375)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 1375), "")) : ("")) . " delta-quantity-delta ps-submittable-input-wrapper"))]);
        // line 1376
        echo "<div ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">";
        // line 1377
        $context["attr"] = twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1377), "attr", [], "any", false, false, false, 1377), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 1378
($context["form"] ?? null), "vars", [], "any", false, true, false, 1378), "attr", [], "any", false, true, false, 1378), "class", [], "any", true, true, false, 1378)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 1378), "attr", [], "any", false, true, false, 1378), "class", [], "any", false, false, false, 1378), "")) : ("")) . " submittable-input")), "data-initial-value" =>         // line 1379
($context["value"] ?? null), "value" =>         // line 1380
($context["value"] ?? null)]);
        // line 1383
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget', ["attr" => ($context["attr"] ?? null)]);
        // line 1384
        $this->displayBlock("submittable_input_button_widget", $context, $blocks);
        // line 1385
        echo "</div>
";
    }

    // line 1388
    public function block_navigation_tab_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1389
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 1389)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 1389), "")) : ("")) . " navigation-tab-widget"))]);
        // line 1390
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
  <div id=\"";
        // line 1391
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1391), "id", [], "any", false, false, false, 1391), "html", null, true);
        echo "-tabs\" class=\"tabs js-tabs\">
    <div class=\"arrow d-xl-none js-arrow left-arrow float-left\">
      <i class=\"material-icons rtl-flip hide\">chevron_left</i>
    </div>

    <ul class=\"nav nav-tabs js-nav-tabs\" id=\"form-nav\" role=\"tablist\">
    ";
        // line 1397
        $context["firstRenderedChild"] = true;
        // line 1398
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "children", [], "any", false, false, false, 1398));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 1399
            echo "      ";
            if ((( !twig_get_attribute($this->env, $this->source, $context["child"], "rendered", [], "any", false, false, false, 1399) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1399), "name", [], "any", false, false, false, 1399) != "_toolbar_buttons")) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1399), "name", [], "any", false, false, false, 1399) != "_token"))) {
                // line 1400
                echo "      <li id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1400), "id", [], "any", false, false, false, 1400), "html", null, true);
                echo "-tab-nav\" class=\"nav-item";
                if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1400), "valid", [], "any", false, false, false, 1400)) {
                    echo " has-error";
                }
                echo "\">
        <a href=\"#";
                // line 1401
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1401), "id", [], "any", false, false, false, 1401), "html", null, true);
                echo "-tab\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link";
                if (($context["firstRenderedChild"] ?? null)) {
                    echo " active";
                }
                echo "\">
          ";
                // line 1402
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1402), "label", [], "any", false, false, false, 1402), "html", null, true);
                echo "
        </a>
      </li>
      ";
                // line 1405
                $context["firstRenderedChild"] = false;
                // line 1406
                echo "      ";
            }
            // line 1407
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1408
        echo "    </ul>

    <div class=\"arrow d-xl-none js-arrow right-arrow visible float-right\">
      <i class=\"material-icons rtl-flip hide\">chevron_right</i>
    </div>

    ";
        // line 1414
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "offsetExists", [0 => "_toolbar_buttons"], "method", false, false, false, 1414)) {
            // line 1415
            echo "    <div class=\"navigation-tab-widget-toolbar toolbar text-md-right\">
      ";
            // line 1416
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "_toolbar_buttons", [], "any", false, false, false, 1416), 'widget');
            echo "
    </div>
    ";
        }
        // line 1419
        echo "  </div>

  <div id=\"";
        // line 1421
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1421), "id", [], "any", false, false, false, 1421), "html", null, true);
        echo "-tabs-content\" class=\"tab-content\">
    ";
        // line 1422
        $context["firstRenderedChild"] = true;
        // line 1423
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "children", [], "any", false, false, false, 1423));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 1424
            echo "      ";
            if (( !twig_get_attribute($this->env, $this->source, $context["child"], "rendered", [], "any", false, false, false, 1424) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1424), "name", [], "any", false, false, false, 1424) != "_token"))) {
                // line 1425
                echo "      <div role=\"tabpanel\" class=\"form-contenttab tab-pane container-fluid";
                if (($context["firstRenderedChild"] ?? null)) {
                    echo " active";
                }
                echo "\" id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1425), "id", [], "any", false, false, false, 1425), "html", null, true);
                echo "-tab\">
        ";
                // line 1426
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, true, false, 1426), "label_tab", [], "any", true, true, false, 1426)) {
                    // line 1427
                    echo "          ";
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'label', (twig_test_empty($_label_ = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1427), "label_tab", [], "any", false, false, false, 1427)) ? [] : ["label" => $_label_]));
                    echo "
        ";
                }
                // line 1429
                echo "        ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget');
                echo "
        ";
                // line 1430
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'errors');
                echo "
      </div>
      ";
                // line 1432
                $context["firstRenderedChild"] = false;
                // line 1433
                echo "      ";
            }
            // line 1434
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1435
        echo "  </div>
</div>
";
    }

    // line 1439
    public function block_accordion_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1440
        echo "<div class=\"accordion accordion-form\" id=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1440), "id", [], "any", false, false, false, 1440), "html", null, true);
        echo "\">
    ";
        // line 1441
        $context["firstChild"] = true;
        // line 1442
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 1443
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1443), "compound", [], "any", false, false, false, 1443)) {
                // line 1444
                echo "      ";
                $context["hasError"] = (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1444), "valid", [], "any", false, false, false, 1444) != true);
                // line 1445
                echo "      ";
                $context["isExpanded"] = ((($context["firstChild"] ?? null) && ($context["expand_first"] ?? null)) || (($context["hasError"] ?? null) && ($context["expand_on_error"] ?? null)));
                // line 1446
                echo "      <div class=\"card\">
        <div class=\"card-header\" id=\"";
                // line 1447
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1447), "id", [], "any", false, false, false, 1447), "html", null, true);
                echo "_accordion_header\">
          <h2 class=\"mb-0\">
            <button
              class=\"accordion-form-button ";
                // line 1450
                if (($context["hasError"] ?? null)) {
                    echo " has-error ";
                }
                echo " btn btn-block text-left";
                if ( !($context["isExpanded"] ?? null)) {
                    echo " collapsed";
                }
                echo "\"
              type=\"button\"
              data-toggle=\"collapse\"
              data-target=\"#";
                // line 1453
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1453), "id", [], "any", false, false, false, 1453), "html", null, true);
                echo "_accordion\"
              aria-expanded=\"";
                // line 1454
                if (($context["isExpanded"] ?? null)) {
                    echo "true";
                } else {
                    echo "false";
                }
                echo "\"
              aria-controls=\"";
                // line 1455
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1455), "id", [], "any", false, false, false, 1455), "html", null, true);
                echo "_accordion\">
              ";
                // line 1456
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1456), "label", [], "any", false, false, false, 1456), "html", null, true);
                echo "
              <i class=\"material-icons\"></i>
            </button>
          </h2>
        </div>

        <div id=\"";
                // line 1462
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1462), "id", [], "any", false, false, false, 1462), "html", null, true);
                echo "_accordion\" class=\"collapse";
                if (($context["isExpanded"] ?? null)) {
                    echo " show";
                }
                echo "\" aria-labelledby=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1462), "id", [], "any", false, false, false, 1462), "html", null, true);
                echo "_accordion_header\" ";
                if (($context["display_one"] ?? null)) {
                    echo "data-parent=\"#";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 1462), "id", [], "any", false, false, false, 1462), "html", null, true);
                    echo "\"";
                }
                echo ">
          <div class=\"card-body\">
            ";
                // line 1464
                $context["childAttr"] = ["class" => "accordion-sub-form"];
                // line 1465
                echo "            ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', ["attr" => ($context["childAttr"] ?? null)]);
                echo "
            ";
                // line 1466
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'errors');
                echo "
          </div>
        </div>
      </div>
      ";
                // line 1470
                $context["firstChild"] = false;
                // line 1471
                echo "      ";
            }
            // line 1472
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1473
        echo "
    ";
        // line 1475
        echo "    ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'rest');
        echo "
  </div>";
    }

    // line 1479
    public function block_button_collection_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1480
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source,         // line 1481
($context["attr"] ?? null), "class", [], "any", true, true, false, 1481)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 1481), "")) : ("")) . " form-group btn-collection btn-toolbar")), "role" => "group", "style" => ("justify-content: " .         // line 1483
($context["justify_content"] ?? null))]);
        // line 1485
        echo "<div ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">
    ";
        // line 1486
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["button_groups"] ?? null));
        foreach ($context['_seq'] as $context["group"] => $context["buttons"]) {
            // line 1487
            echo "      <div class=\"btn-group group-";
            echo twig_escape_filter($this->env, $context["group"], "html", null, true);
            echo "\">
        ";
            // line 1488
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["buttons"]);
            foreach ($context['_seq'] as $context["_key"] => $context["button"]) {
                // line 1489
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), $context["button"], [], "any", false, false, false, 1489), 'widget');
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['button'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1491
            echo "      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['group'], $context['buttons'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1493
        echo "  </div>
";
    }

    // line 1496
    public function block_price_reduction_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1497
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 1497)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 1497), "")) : ("")) . " reduction-widget row"))]);
        // line 1498
        echo "  <div ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">
    ";
        // line 1499
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "children", [], "any", false, false, false, 1499));
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
            // line 1500
            echo "      ";
            $__internal_compile_21 = $context;
            $__internal_compile_22 = ["row_attr" => twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, false, false, 1500), "row_attr", [], "any", false, false, false, 1500), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, true, false, 1500), "row_attr", [], "any", false, true, false, 1500), "class", [], "any", true, true, false, 1500)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", [], "any", false, true, false, 1500), "row_attr", [], "any", false, true, false, 1500), "class", [], "any", false, false, false, 1500), "")) : ("")) . " col col-md-3"))])];
            if (!twig_test_iterable($__internal_compile_22)) {
                throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 1500, $this->getSourceContext());
            }
            $__internal_compile_22 = twig_to_array($__internal_compile_22);
            $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_22));
            // line 1501
            echo "      <div ";
            $this->displayBlock("row_attributes", $context, $blocks);
            echo ">
      ";
            $context = $__internal_compile_21;
            // line 1503
            echo "        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget');
            echo "
        ";
            // line 1504
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'errors');
            echo "
      </div>
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
        // line 1507
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  4226 => 1507,  4209 => 1504,  4204 => 1503,  4198 => 1501,  4189 => 1500,  4172 => 1499,  4167 => 1498,  4165 => 1497,  4161 => 1496,  4156 => 1493,  4149 => 1491,  4143 => 1489,  4139 => 1488,  4134 => 1487,  4130 => 1486,  4125 => 1485,  4123 => 1483,  4122 => 1481,  4121 => 1480,  4117 => 1479,  4110 => 1475,  4107 => 1473,  4101 => 1472,  4098 => 1471,  4096 => 1470,  4089 => 1466,  4084 => 1465,  4082 => 1464,  4065 => 1462,  4056 => 1456,  4052 => 1455,  4044 => 1454,  4040 => 1453,  4028 => 1450,  4022 => 1447,  4019 => 1446,  4016 => 1445,  4013 => 1444,  4010 => 1443,  4005 => 1442,  4003 => 1441,  3998 => 1440,  3994 => 1439,  3988 => 1435,  3982 => 1434,  3979 => 1433,  3977 => 1432,  3972 => 1430,  3967 => 1429,  3961 => 1427,  3959 => 1426,  3950 => 1425,  3947 => 1424,  3942 => 1423,  3940 => 1422,  3936 => 1421,  3932 => 1419,  3926 => 1416,  3923 => 1415,  3921 => 1414,  3913 => 1408,  3907 => 1407,  3904 => 1406,  3902 => 1405,  3896 => 1402,  3888 => 1401,  3879 => 1400,  3876 => 1399,  3871 => 1398,  3869 => 1397,  3860 => 1391,  3855 => 1390,  3853 => 1389,  3849 => 1388,  3844 => 1385,  3842 => 1384,  3840 => 1383,  3838 => 1380,  3837 => 1379,  3836 => 1378,  3835 => 1377,  3831 => 1376,  3829 => 1375,  3825 => 1374,  3818 => 1369,  3814 => 1368,  3809 => 1365,  3807 => 1364,  3805 => 1363,  3803 => 1360,  3802 => 1359,  3801 => 1358,  3800 => 1357,  3796 => 1356,  3794 => 1355,  3790 => 1354,  3786 => 1351,  3784 => 1350,  3782 => 1349,  3778 => 1348,  3773 => 1345,  3771 => 1344,  3769 => 1343,  3767 => 1342,  3765 => 1341,  3763 => 1340,  3761 => 1338,  3759 => 1336,  3757 => 1335,  3755 => 1334,  3743 => 1332,  3739 => 1331,  3731 => 1326,  3724 => 1323,  3722 => 1322,  3718 => 1321,  3716 => 1320,  3712 => 1319,  3705 => 1315,  3701 => 1314,  3696 => 1313,  3693 => 1312,  3690 => 1311,  3686 => 1310,  3675 => 1307,  3673 => 1306,  3671 => 1305,  3667 => 1304,  3662 => 1301,  3656 => 1299,  3653 => 1298,  3647 => 1295,  3644 => 1293,  3638 => 1291,  3635 => 1290,  3630 => 1288,  3628 => 1287,  3626 => 1286,  3622 => 1285,  3614 => 1280,  3610 => 1278,  3606 => 1277,  3600 => 1273,  3593 => 1269,  3589 => 1268,  3585 => 1266,  3576 => 1263,  3573 => 1262,  3569 => 1261,  3564 => 1260,  3562 => 1259,  3559 => 1258,  3556 => 1257,  3547 => 1254,  3544 => 1253,  3539 => 1252,  3533 => 1249,  3530 => 1248,  3528 => 1247,  3520 => 1246,  3518 => 1245,  3514 => 1244,  3509 => 1240,  3507 => 1239,  3503 => 1238,  3498 => 1234,  3496 => 1233,  3492 => 1232,  3486 => 1228,  3477 => 1226,  3473 => 1225,  3468 => 1224,  3466 => 1223,  3461 => 1221,  3458 => 1220,  3455 => 1218,  3453 => 1217,  3451 => 1216,  3447 => 1215,  3442 => 1212,  3438 => 1211,  3433 => 1208,  3429 => 1207,  3425 => 1205,  3419 => 1204,  3411 => 1202,  3408 => 1201,  3404 => 1200,  3401 => 1199,  3399 => 1198,  3395 => 1197,  3387 => 1192,  3380 => 1191,  3374 => 1187,  3372 => 1186,  3369 => 1185,  3365 => 1184,  3360 => 1180,  3357 => 1179,  3353 => 1178,  3348 => 1174,  3345 => 1173,  3341 => 1172,  3333 => 1168,  3330 => 1167,  3312 => 1165,  3310 => 1164,  3307 => 1163,  3303 => 1162,  3295 => 1157,  3292 => 1156,  3289 => 1155,  3285 => 1154,  3277 => 1149,  3274 => 1148,  3271 => 1147,  3267 => 1146,  3263 => 1143,  3260 => 1142,  3258 => 1141,  3256 => 1140,  3254 => 1139,  3252 => 1138,  3250 => 1137,  3246 => 1136,  3242 => 1133,  3239 => 1132,  3237 => 1131,  3235 => 1130,  3233 => 1129,  3231 => 1128,  3229 => 1127,  3225 => 1126,  3219 => 1123,  3214 => 1122,  3210 => 1121,  3204 => 1118,  3199 => 1117,  3195 => 1116,  3190 => 1113,  3184 => 1110,  3181 => 1109,  3179 => 1108,  3176 => 1107,  3173 => 1105,  3170 => 1103,  3168 => 1102,  3166 => 1101,  3164 => 1100,  3162 => 1098,  3160 => 1097,  3157 => 1096,  3151 => 1093,  3148 => 1092,  3146 => 1091,  3143 => 1090,  3141 => 1089,  3138 => 1088,  3134 => 1087,  3127 => 1082,  3125 => 1080,  3124 => 1078,  3123 => 1077,  3117 => 1074,  3113 => 1072,  3110 => 1070,  3107 => 1068,  3105 => 1067,  3103 => 1063,  3101 => 1062,  3097 => 1061,  3091 => 1058,  3084 => 1054,  3079 => 1052,  3075 => 1051,  3070 => 1048,  3067 => 1046,  3064 => 1044,  3062 => 1043,  3059 => 1042,  3055 => 1041,  3044 => 1033,  3040 => 1032,  3036 => 1031,  3032 => 1029,  3030 => 1028,  3026 => 1026,  3023 => 1025,  3019 => 1024,  3011 => 1019,  3006 => 1018,  3004 => 1017,  3002 => 1016,  2996 => 1013,  2994 => 1012,  2989 => 1011,  2987 => 1009,  2984 => 1008,  2982 => 1006,  2980 => 1005,  2978 => 1004,  2976 => 999,  2975 => 998,  2968 => 994,  2964 => 992,  2960 => 991,  2954 => 986,  2952 => 985,  2950 => 982,  2949 => 981,  2948 => 980,  2947 => 979,  2944 => 977,  2941 => 976,  2939 => 975,  2936 => 974,  2931 => 972,  2929 => 971,  2927 => 970,  2924 => 968,  2921 => 967,  2917 => 966,  2912 => 963,  2906 => 961,  2900 => 959,  2898 => 958,  2894 => 957,  2890 => 954,  2885 => 951,  2874 => 949,  2870 => 948,  2866 => 947,  2861 => 945,  2856 => 943,  2852 => 941,  2846 => 939,  2844 => 938,  2838 => 934,  2835 => 933,  2826 => 930,  2819 => 929,  2816 => 928,  2813 => 927,  2810 => 926,  2807 => 925,  2804 => 924,  2800 => 923,  2793 => 922,  2791 => 921,  2787 => 920,  2781 => 916,  2772 => 913,  2751 => 912,  2747 => 911,  2743 => 909,  2739 => 907,  2729 => 903,  2719 => 902,  2716 => 901,  2712 => 900,  2709 => 899,  2707 => 898,  2702 => 897,  2698 => 896,  2694 => 843,  2688 => 889,  2681 => 887,  2674 => 885,  2670 => 883,  2667 => 882,  2661 => 880,  2655 => 878,  2653 => 877,  2650 => 876,  2647 => 875,  2645 => 874,  2642 => 873,  2638 => 872,  2633 => 870,  2629 => 868,  2625 => 867,  2620 => 864,  2605 => 862,  2599 => 860,  2593 => 857,  2587 => 854,  2583 => 852,  2581 => 851,  2578 => 850,  2561 => 849,  2557 => 848,  2547 => 844,  2544 => 843,  2540 => 842,  2536 => 806,  2530 => 836,  2520 => 832,  2516 => 830,  2512 => 829,  2502 => 822,  2498 => 820,  2494 => 818,  2492 => 817,  2480 => 807,  2477 => 806,  2473 => 805,  2466 => 798,  2459 => 795,  2457 => 794,  2456 => 793,  2455 => 792,  2453 => 791,  2449 => 790,  2442 => 785,  2439 => 784,  2435 => 783,  2429 => 778,  2421 => 774,  2419 => 773,  2418 => 772,  2417 => 771,  2416 => 770,  2413 => 769,  2409 => 768,  2403 => 764,  2395 => 758,  2390 => 755,  2384 => 752,  2379 => 750,  2372 => 746,  2368 => 744,  2366 => 743,  2360 => 740,  2356 => 739,  2353 => 738,  2348 => 735,  2340 => 732,  2338 => 731,  2337 => 730,  2336 => 729,  2334 => 728,  2330 => 727,  2327 => 725,  2325 => 724,  2319 => 722,  2317 => 721,  2315 => 719,  2312 => 717,  2308 => 716,  2300 => 712,  2294 => 710,  2292 => 709,  2288 => 708,  2284 => 703,  2282 => 702,  2275 => 701,  2273 => 700,  2271 => 699,  2267 => 698,  2262 => 694,  2260 => 693,  2256 => 692,  2254 => 691,  2251 => 689,  2249 => 688,  2245 => 687,  2243 => 686,  2241 => 685,  2239 => 684,  2235 => 683,  2230 => 680,  2225 => 677,  2223 => 676,  2221 => 675,  2219 => 674,  2205 => 673,  2202 => 672,  2198 => 670,  2196 => 669,  2194 => 667,  2192 => 665,  2177 => 664,  2175 => 663,  2172 => 662,  2169 => 661,  2166 => 660,  2163 => 659,  2160 => 658,  2157 => 657,  2154 => 656,  2151 => 655,  2148 => 654,  2145 => 653,  2142 => 652,  2140 => 651,  2136 => 650,  2132 => 647,  2128 => 646,  2124 => 643,  2120 => 642,  2116 => 639,  2114 => 638,  2110 => 636,  2101 => 627,  2084 => 624,  2080 => 623,  2076 => 622,  2073 => 621,  2056 => 620,  2050 => 616,  2046 => 615,  2042 => 614,  2034 => 609,  2028 => 606,  2023 => 605,  2019 => 604,  2008 => 600,  2006 => 599,  2002 => 598,  2000 => 597,  1996 => 596,  1992 => 593,  1990 => 573,  1984 => 589,  1970 => 588,  1962 => 587,  1958 => 585,  1953 => 584,  1949 => 583,  1945 => 582,  1941 => 581,  1937 => 580,  1932 => 579,  1929 => 578,  1912 => 577,  1908 => 576,  1888 => 575,  1885 => 574,  1882 => 573,  1878 => 572,  1874 => 547,  1871 => 569,  1864 => 565,  1858 => 562,  1854 => 561,  1849 => 559,  1845 => 557,  1843 => 556,  1838 => 554,  1832 => 551,  1828 => 550,  1824 => 548,  1821 => 547,  1817 => 546,  1813 => 530,  1808 => 541,  1803 => 539,  1798 => 538,  1796 => 537,  1792 => 536,  1786 => 533,  1782 => 531,  1779 => 530,  1775 => 529,  1771 => 515,  1766 => 525,  1748 => 518,  1745 => 517,  1742 => 516,  1739 => 515,  1735 => 514,  1731 => 511,  1726 => 508,  1717 => 505,  1712 => 503,  1709 => 502,  1705 => 501,  1701 => 500,  1695 => 497,  1690 => 495,  1682 => 489,  1680 => 488,  1677 => 487,  1668 => 484,  1664 => 483,  1661 => 482,  1658 => 481,  1655 => 480,  1653 => 479,  1650 => 478,  1647 => 477,  1644 => 476,  1640 => 475,  1635 => 473,  1631 => 472,  1627 => 469,  1622 => 466,  1611 => 464,  1607 => 463,  1603 => 462,  1597 => 459,  1592 => 457,  1584 => 451,  1582 => 450,  1579 => 449,  1563 => 447,  1561 => 446,  1558 => 444,  1555 => 443,  1553 => 442,  1550 => 441,  1547 => 440,  1544 => 439,  1527 => 438,  1522 => 436,  1518 => 435,  1514 => 432,  1511 => 430,  1509 => 429,  1505 => 428,  1499 => 424,  1490 => 421,  1486 => 420,  1465 => 419,  1461 => 418,  1457 => 416,  1453 => 414,  1443 => 410,  1433 => 409,  1430 => 408,  1426 => 407,  1423 => 406,  1421 => 405,  1417 => 404,  1412 => 403,  1408 => 402,  1404 => 399,  1400 => 397,  1383 => 395,  1380 => 394,  1363 => 393,  1360 => 392,  1357 => 391,  1353 => 388,  1347 => 386,  1345 => 385,  1341 => 384,  1333 => 383,  1329 => 381,  1325 => 378,  1319 => 376,  1316 => 375,  1311 => 373,  1306 => 371,  1304 => 370,  1296 => 369,  1292 => 367,  1289 => 366,  1287 => 365,  1284 => 364,  1280 => 363,  1275 => 359,  1258 => 357,  1241 => 356,  1238 => 355,  1232 => 353,  1228 => 352,  1223 => 348,  1217 => 345,  1216 => 344,  1215 => 343,  1214 => 342,  1210 => 341,  1206 => 340,  1203 => 338,  1197 => 335,  1196 => 334,  1195 => 333,  1194 => 332,  1190 => 331,  1188 => 330,  1186 => 329,  1182 => 328,  1178 => 325,  1176 => 324,  1172 => 323,  1166 => 320,  1164 => 319,  1160 => 318,  1155 => 315,  1151 => 314,  1147 => 313,  1141 => 312,  1138 => 311,  1135 => 310,  1132 => 309,  1129 => 308,  1126 => 307,  1123 => 306,  1120 => 305,  1117 => 304,  1115 => 303,  1112 => 302,  1109 => 301,  1107 => 300,  1103 => 299,  1099 => 296,  1097 => 295,  1093 => 294,  1089 => 291,  1085 => 290,  1083 => 289,  1079 => 288,  1073 => 283,  1070 => 282,  1062 => 281,  1057 => 279,  1055 => 278,  1053 => 277,  1050 => 275,  1048 => 274,  1044 => 273,  1038 => 268,  1036 => 267,  1034 => 265,  1033 => 264,  1032 => 263,  1031 => 262,  1026 => 260,  1024 => 259,  1022 => 258,  1019 => 256,  1017 => 255,  1013 => 254,  1009 => 251,  1005 => 250,  1003 => 249,  999 => 248,  994 => 244,  992 => 243,  990 => 242,  988 => 241,  986 => 240,  982 => 239,  980 => 238,  977 => 236,  975 => 235,  971 => 234,  964 => 228,  962 => 227,  960 => 226,  956 => 225,  952 => 222,  948 => 220,  942 => 217,  939 => 216,  937 => 215,  935 => 214,  929 => 211,  926 => 210,  923 => 209,  921 => 208,  918 => 207,  914 => 206,  909 => 203,  907 => 202,  905 => 201,  903 => 200,  899 => 199,  891 => 193,  889 => 192,  884 => 190,  882 => 189,  879 => 188,  876 => 187,  873 => 186,  870 => 185,  868 => 184,  865 => 183,  860 => 181,  855 => 180,  852 => 179,  850 => 178,  845 => 177,  841 => 175,  839 => 174,  822 => 173,  820 => 172,  816 => 168,  813 => 165,  812 => 164,  811 => 163,  809 => 162,  806 => 161,  803 => 159,  800 => 158,  797 => 156,  795 => 155,  793 => 154,  789 => 153,  784 => 133,  778 => 146,  775 => 145,  772 => 144,  769 => 143,  766 => 142,  763 => 141,  760 => 140,  757 => 139,  754 => 138,  751 => 137,  748 => 136,  746 => 135,  743 => 134,  740 => 133,  738 => 132,  734 => 131,  727 => 127,  722 => 126,  719 => 125,  716 => 124,  712 => 123,  705 => 119,  700 => 118,  697 => 117,  694 => 116,  690 => 115,  684 => 107,  682 => 106,  678 => 104,  676 => 103,  674 => 102,  672 => 100,  670 => 99,  668 => 98,  666 => 96,  664 => 95,  662 => 94,  651 => 93,  647 => 92,  641 => 87,  635 => 84,  630 => 83,  628 => 82,  626 => 81,  622 => 80,  618 => 77,  614 => 76,  610 => 75,  606 => 72,  603 => 71,  600 => 70,  597 => 69,  595 => 68,  591 => 67,  584 => 64,  581 => 63,  578 => 62,  575 => 61,  572 => 60,  569 => 59,  566 => 58,  562 => 57,  558 => 1496,  556 => 1479,  554 => 1439,  552 => 1388,  550 => 1374,  547 => 1373,  545 => 1368,  542 => 1367,  540 => 1354,  537 => 1353,  535 => 1348,  532 => 1347,  530 => 1331,  527 => 1330,  525 => 1319,  522 => 1318,  520 => 1310,  517 => 1309,  515 => 1304,  512 => 1303,  510 => 1285,  507 => 1284,  505 => 1277,  503 => 1244,  501 => 1238,  499 => 1232,  497 => 1215,  494 => 1214,  492 => 1211,  490 => 1197,  488 => 1184,  485 => 1183,  483 => 1178,  480 => 1177,  478 => 1172,  475 => 1171,  473 => 1162,  470 => 1161,  468 => 1154,  465 => 1153,  463 => 1146,  461 => 1136,  459 => 1126,  457 => 1121,  454 => 1120,  452 => 1116,  449 => 1115,  447 => 1087,  444 => 1086,  442 => 1061,  439 => 1060,  437 => 1041,  434 => 1040,  432 => 1024,  429 => 1023,  427 => 991,  424 => 990,  422 => 966,  419 => 965,  417 => 957,  414 => 956,  412 => 920,  409 => 919,  407 => 896,  404 => 894,  402 => 842,  399 => 841,  397 => 805,  394 => 804,  391 => 802,  389 => 783,  386 => 782,  384 => 716,  381 => 715,  379 => 708,  376 => 707,  373 => 705,  371 => 698,  368 => 697,  366 => 683,  363 => 682,  361 => 650,  358 => 649,  356 => 646,  353 => 645,  351 => 642,  348 => 641,  346 => 636,  343 => 635,  340 => 633,  338 => 604,  336 => 596,  334 => 572,  331 => 571,  329 => 546,  326 => 545,  324 => 529,  321 => 528,  319 => 514,  316 => 513,  314 => 472,  311 => 471,  309 => 435,  306 => 434,  304 => 428,  301 => 427,  299 => 402,  296 => 401,  294 => 363,  291 => 362,  289 => 352,  286 => 351,  284 => 328,  281 => 327,  279 => 323,  276 => 322,  274 => 318,  271 => 317,  269 => 299,  266 => 298,  264 => 294,  262 => 288,  260 => 273,  257 => 272,  255 => 254,  253 => 248,  251 => 234,  248 => 233,  246 => 225,  243 => 224,  241 => 206,  238 => 205,  236 => 199,  233 => 198,  231 => 153,  228 => 150,  226 => 131,  223 => 130,  221 => 123,  218 => 122,  216 => 115,  213 => 110,  211 => 92,  208 => 91,  205 => 89,  203 => 80,  201 => 75,  199 => 67,  197 => 57,  194 => 56,  191 => 54,  188 => 52,  185 => 46,  182 => 34,  179 => 25,  70 => 51,  63 => 50,  56 => 49,  49 => 48,  30 => 45,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\TwigTemplateForm\\prestashop_ui_kit_base.html.twig");
    }
}
