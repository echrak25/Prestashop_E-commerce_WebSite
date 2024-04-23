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

/* @PrestaShop/Admin/Product/ProductPage/product.html.twig */
class __TwigTemplate_6d5adb10d76e63f12a92dc3c6a198881 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'content' => [$this, 'block_content'],
            'product_header' => [$this, 'block_product_header'],
            'product_tabs_container' => [$this, 'block_product_tabs_container'],
            'product_panel_essentials' => [$this, 'block_product_panel_essentials'],
            'product_panel_combinations' => [$this, 'block_product_panel_combinations'],
            'product_panel_shipping' => [$this, 'block_product_panel_shipping'],
            'product_panel_pricing' => [$this, 'block_product_panel_pricing'],
            'product_panel_seo' => [$this, 'block_product_panel_seo'],
            'product_panel_options' => [$this, 'block_product_panel_options'],
            'product_panel_modules' => [$this, 'block_product_panel_modules'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 311
        $context["js_translatable"] = twig_array_merge(["Are you sure to disable variations ? they will all be deleted" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This will delete all the combinations. Do you wish to proceed?", [], "Admin.Catalog.Notification")],         // line 313
($context["js_translatable"] ?? null));
        // line 315
        $context["js_translatable"] = twig_array_merge(["Form update success" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Settings updated.", [], "Admin.Notifications.Success"), "Form update errors" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Unable to update settings.", [], "Admin.Notifications.Error"), "Delete" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete", [], "Admin.Actions"), "ToLargeFile" => twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The file is too large. Maximum size allowed is: [1] MB. The file you are trying to upload is [2] MB.", [], "Admin.Notifications.Error"), ["[1]" => "{{maxFilesize}}", "[2]" => "{{filesize}}"]), "Drop images here" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Drop images here", [], "Admin.Catalog.Feature"), "or select files" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("or select files", [], "Admin.Catalog.Feature"), "files recommandations" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Recommended size 800 x 800px for default theme.", [], "Admin.Catalog.Feature"), "files recommandations2" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("JPG, GIF, PNG or WebP format.", [], "Admin.Catalog.Feature"), "Cover" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cover", [], "Admin.Catalog.Feature"), "Are you sure you want to delete this item?" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure you want to delete this item?", [], "Admin.Notifications.Warning"), "Quantities" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Quantities", [], "Admin.Catalog.Feature"), "Combinations" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Combinations", [], "Admin.Catalog.Feature"), "Virtual product" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Virtual product", [], "Admin.Catalog.Feature"), "tax incl." => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tax incl.", [], "Admin.Catalog.Feature"), "tax excl." => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tax excl.", [], "Admin.Catalog.Feature"), "You can't create pack product with variations. Are you sure to disable variations ? they will all be deleted." => (($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("A pack of products can't have combinations.", [], "Admin.Catalog.Notification") . " ") . (($__internal_compile_0 =         // line 331
($context["js_translatable"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["Are you sure to disable variations ? they will all be deleted"] ?? null) : null)), "You can't create virtual product with variations. Are you sure to disable variations ? they will all be deleted." => (($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("A virtual product can't have combinations.", [], "Admin.Catalog.Notification") . " ") . (($__internal_compile_1 =         // line 332
($context["js_translatable"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["Are you sure to disable variations ? they will all be deleted"] ?? null) : null)), "Are you sure you want to delete the selected item(s)?" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure you want to delete the selected item(s)?", [], "Admin.Global")],         // line 334
($context["js_translatable"] ?? null));
        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Product/ProductPage/product.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "  <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("themes/new-theme/public/product" . ($context["rtl_suffix"] ?? null)) . ".css")), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\">
";
    }

    // line 31
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "  ";
        $context["hooks"] = $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHooksArray("displayAdminProductsExtra", ["id_product" => ($context["id_product"] ?? null)]);
        // line 33
        echo "  <div class=\"header-toolbar d-print-none\">
    ";
        // line 34
        echo $this->extensions['PrestaShopBundle\Twig\Extension\MultistoreHeaderExtension']->getMultistoreHeader();
        echo "
  </div>
  <form name=\"form\" id=\"form\" method=\"post\" class=\"form-horizontal product-page row justify-content-md-center\" novalidate=\"novalidate\">

    ";
        // line 38
        if ( !($context["editable"] ?? null)) {
            echo " <fieldset disabled id=\"field-disabled\"> ";
        }
        // line 39
        echo "    ";
        // line 40
        echo "    ";
        $this->displayBlock('product_header', $context, $blocks);
        // line 52
        echo "
    <div class=\"col-md-10\">
      <div id=\"form_bubbling_errors\">
        ";
        // line 55
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
      </div>
    </div>

    <div id=\"form-loading\" class=\"col-xxl-10\">
      ";
        // line 61
        echo "      ";
        $this->displayBlock('product_tabs_container', $context, $blocks);
        // line 64
        echo "      <div id=\"form_content\" class=\"tab-content\">

        ";
        // line 67
        echo "        ";
        $this->displayBlock('product_panel_essentials', $context, $blocks);
        // line 88
        echo "
        ";
        // line 90
        echo "        ";
        $this->displayBlock('product_panel_combinations', $context, $blocks);
        // line 112
        echo "
        ";
        // line 114
        echo "        ";
        $this->displayBlock('product_panel_shipping', $context, $blocks);
        // line 129
        echo "
        ";
        // line 131
        echo "        ";
        $this->displayBlock('product_panel_pricing', $context, $blocks);
        // line 138
        echo "
        ";
        // line 140
        echo "        ";
        $this->displayBlock('product_panel_seo', $context, $blocks);
        // line 146
        echo "
        ";
        // line 148
        echo "        ";
        $this->displayBlock('product_panel_options', $context, $blocks);
        // line 154
        echo "
        ";
        // line 156
        echo "        ";
        $this->displayBlock('product_panel_modules', $context, $blocks);
        // line 230
        echo "      </div>

      ";
        // line 232
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id_product", [], "any", false, false, false, 232), 'widget');
        echo "
      ";
        // line 233
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "_token", [], "any", false, false, false, 233), 'widget');
        echo "

    </div>
    ";
        // line 237
        echo "    ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Blocks/footer.html.twig", ["preview_link" =>         // line 238
($context["preview_link"] ?? null), "preview_link_deactivate" =>         // line 239
($context["preview_link_deactivate"] ?? null), "is_shop_context" =>         // line 240
($context["is_shop_context"] ?? null), "editable" =>         // line 241
($context["editable"] ?? null), "is_active" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 242
($context["form"] ?? null), "step1", [], "any", false, false, false, 242), "vars", [], "any", false, false, false, 242), "value", [], "any", false, false, false, 242), "active", [], "any", false, false, false, 242), "productId" =>         // line 243
($context["id_product"] ?? null)]);
        // line 244
        echo "
    ";
        // line 245
        if ( !($context["editable"] ?? null)) {
            echo " </fieldset> ";
        }
        // line 246
        echo "  </form>


  ";
        // line 249
        $this->loadTemplate("@PrestaShop/Admin/Product/ProductPage/product.html.twig", "@PrestaShop/Admin/Product/ProductPage/product.html.twig", 249, "15254368")->display(twig_array_merge($context, ["id" => "confirmation_modal", "title" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Warning", [], "Admin.Notifications.Warning"), "closable" => false, "actions" => [0 => ["type" => "button", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("No", [], "Admin.Global"), "class" => "btn btn-outline-secondary btn-lg cancel"], 1 => ["type" => "button", "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Yes", [], "Admin.Global"), "class" => "btn btn-primary btn-lg continue"]]]));
        // line 270
        echo "
";
    }

    // line 40
    public function block_product_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        echo "      ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Blocks/header.html.twig", ["formName" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 42
($context["form"] ?? null), "step1", [], "any", false, false, false, 42), "name", [], "any", false, false, false, 42), "formType" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 43
($context["form"] ?? null), "step1", [], "any", false, false, false, 43), "type_product", [], "any", false, false, false, 43), "is_multishop_context" =>         // line 44
($context["is_multishop_context"] ?? null), "languages" =>         // line 45
($context["languages"] ?? null), "help_link" =>         // line 46
($context["help_link"] ?? null), "stats_link" =>         // line 47
($context["stats_link"] ?? null), "isCreationMode" =>         // line 48
($context["isCreationMode"] ?? null)]);
        // line 50
        echo "
    ";
    }

    // line 61
    public function block_product_tabs_container($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 62
        echo "        ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Blocks/tabs.html.twig", ["hooks" => ($context["hooks"] ?? null)]);
        echo "
      ";
    }

    // line 67
    public function block_product_panel_essentials($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 68
        echo "          ";
        $context["formQuantityShortcut"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "step1", [], "any", false, true, false, 68), "qty_0_shortcut", [], "any", true, true, false, 68)) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "step1", [], "any", false, false, false, 68), "qty_0_shortcut", [], "any", false, false, false, 68)) : (null));
        // line 69
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Panels/essentials.html.twig", ["formPackItems" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 70
($context["form"] ?? null), "step1", [], "any", false, false, false, 70), "inputPackItems", [], "any", false, false, false, 70), "productId" =>         // line 71
($context["id_product"] ?? null), "images" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 72
($context["form"] ?? null), "step1", [], "any", false, false, false, 72), "vars", [], "any", false, false, false, 72), "value", [], "any", false, false, false, 72), "images", [], "any", false, false, false, 72), "formShortDescription" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 73
($context["form"] ?? null), "step1", [], "any", false, false, false, 73), "description_short", [], "any", false, false, false, 73), "formDescription" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 74
($context["form"] ?? null), "step1", [], "any", false, false, false, 74), "description", [], "any", false, false, false, 74), "formFeatures" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 75
($context["form"] ?? null), "step1", [], "any", false, false, false, 75), "features", [], "any", false, false, false, 75), "formManufacturer" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 76
($context["form"] ?? null), "step1", [], "any", false, false, false, 76), "id_manufacturer", [], "any", false, false, false, 76), "formRelatedProducts" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 77
($context["form"] ?? null), "step1", [], "any", false, false, false, 77), "related_products", [], "any", false, false, false, 77), "is_combination_active" =>         // line 78
($context["is_combination_active"] ?? null), "has_combinations" =>         // line 79
($context["has_combinations"] ?? null), "formReference" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 80
($context["form"] ?? null), "step6", [], "any", false, false, false, 80), "reference", [], "any", false, false, false, 80), "formQuantityShortcut" =>         // line 81
($context["formQuantityShortcut"] ?? null), "formPriceShortcut" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 82
($context["form"] ?? null), "step1", [], "any", false, false, false, 82), "price_shortcut", [], "any", false, false, false, 82), "formPriceShortcutTTC" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 83
($context["form"] ?? null), "step1", [], "any", false, false, false, 83), "price_ttc_shortcut", [], "any", false, false, false, 83), "formCategories" => twig_get_attribute($this->env, $this->source,         // line 84
($context["form"] ?? null), "step1", [], "any", false, false, false, 84)]);
        // line 86
        echo "
        ";
    }

    // line 90
    public function block_product_panel_combinations($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 91
        echo "          ";
        $context["formStockQuantity"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "step3", [], "any", false, true, false, 91), "qty_0", [], "any", true, true, false, 91)) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "step3", [], "any", false, false, false, 91), "qty_0", [], "any", false, false, false, 91)) : (null));
        // line 92
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Panels/combinations.html.twig", ["formDependsOnStocks" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 93
($context["form"] ?? null), "step3", [], "any", false, false, false, 93), "depends_on_stock", [], "any", false, false, false, 93), "productId" =>         // line 94
($context["id_product"] ?? null), "formStockQuantity" =>         // line 95
($context["formStockQuantity"] ?? null), "formStockMinimalQuantity" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 96
($context["form"] ?? null), "step3", [], "any", false, false, false, 96), "minimal_quantity", [], "any", false, false, false, 96), "formLowStockThreshold" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 97
($context["form"] ?? null), "step3", [], "any", false, false, false, 97), "low_stock_threshold", [], "any", false, false, false, 97), "formLocation" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 98
($context["form"] ?? null), "step3", [], "any", false, false, false, 98), "location", [], "any", false, false, false, 98), "formLowStockAlert" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 99
($context["form"] ?? null), "step3", [], "any", false, false, false, 99), "low_stock_alert", [], "any", false, false, false, 99), "formVirtualProduct" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 100
($context["form"] ?? null), "step3", [], "any", false, false, false, 100), "virtual_product", [], "any", false, false, false, 100), "asm_globally_activated" =>         // line 101
($context["asm_globally_activated"] ?? null), "formType" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 102
($context["form"] ?? null), "step1", [], "any", false, false, false, 102), "type_product", [], "any", false, false, false, 102), "formAdvancedStockManagement" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 103
($context["form"] ?? null), "step3", [], "any", false, false, false, 103), "advanced_stock_management", [], "any", false, false, false, 103), "formPackStockType" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 104
($context["form"] ?? null), "step3", [], "any", false, false, false, 104), "pack_stock_type", [], "any", false, false, false, 104), "formStep3" => twig_get_attribute($this->env, $this->source,         // line 105
($context["form"] ?? null), "step3", [], "any", false, false, false, 105), "formCombinations" =>         // line 106
($context["formCombinations"] ?? null), "has_combinations" =>         // line 107
($context["has_combinations"] ?? null), "max_upload_size" =>         // line 108
($context["max_upload_size"] ?? null)]);
        // line 110
        echo "
        ";
    }

    // line 114
    public function block_product_panel_shipping($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 115
        echo "          <div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"step4\">
                <div class=\"container-fluid\">
                  <div class=\"row\">
                    ";
        // line 118
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_shipping.html.twig", ["form" => twig_get_attribute($this->env, $this->source,         // line 119
($context["form"] ?? null), "step4", [], "any", false, false, false, 119), "asm_globally_activated" =>         // line 120
($context["asm_globally_activated"] ?? null), "isNotVirtual" => (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 121
($context["form"] ?? null), "step1", [], "any", false, false, false, 121), "type_product", [], "any", false, false, false, 121), "vars", [], "any", false, false, false, 121), "value", [], "any", false, false, false, 121) != "2"), "isChecked" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 122
($context["form"] ?? null), "step3", [], "any", false, false, false, 122), "advanced_stock_management", [], "any", false, false, false, 122), "vars", [], "any", false, false, false, 122), "checked", [], "any", false, false, false, 122), "warehouses" =>         // line 123
($context["warehouses"] ?? null)]);
        // line 124
        echo "
                  </div>
                </div>
          </div>
        ";
    }

    // line 131
    public function block_product_panel_pricing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 132
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Panels/pricing.html.twig", ["pricingForm" => twig_get_attribute($this->env, $this->source,         // line 133
($context["form"] ?? null), "step2", [], "any", false, false, false, 133), "is_multishop_context" =>         // line 134
($context["is_multishop_context"] ?? null), "productId" =>         // line 135
($context["id_product"] ?? null)]);
        // line 136
        echo "
        ";
    }

    // line 140
    public function block_product_panel_seo($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 141
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Panels/seo.html.twig", ["seoForm" => twig_get_attribute($this->env, $this->source,         // line 142
($context["form"] ?? null), "step5", [], "any", false, false, false, 142), "productId" =>         // line 143
($context["id_product"] ?? null)]);
        // line 144
        echo "
        ";
    }

    // line 148
    public function block_product_panel_options($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 149
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Panels/options.html.twig", ["optionsForm" => twig_get_attribute($this->env, $this->source,         // line 150
($context["form"] ?? null), "step6", [], "any", false, false, false, 150), "productId" =>         // line 151
($context["id_product"] ?? null)]);
        // line 152
        echo "
        ";
    }

    // line 156
    public function block_product_panel_modules($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 157
        echo "          ";
        if ( !twig_test_empty($this->extensions['PrestaShopBundle\Twig\HookExtension']->hooksArrayContent(($context["hooks"] ?? null)))) {
            // line 158
            echo "            <div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"hooks\">
              <div class=\"container-fluid\">
                <div class=\"row module-selection\" style=\"display: none;\">
                  <div class=\"col-lg-7\">
                    ";
            // line 162
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 163
                echo "                      <div class=\"module-render-container module-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 163), "name", [], "any", false, false, false, 163), "html", null, true);
                echo "\">
                        <div>
                          <img class=\"top-logo\" src=\"";
                // line 165
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 165), "img", [], "any", false, false, false, 165), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 165), "displayName", [], "any", false, false, false, 165), "html", null, true);
                echo "\">
                          <h2 class=\"text-ellipsis module-name-grid\">";
                // line 166
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 166), "displayName", [], "any", false, false, false, 166), "html", null, true);
                echo "</h2>
                          <div class=\"text-ellipsis small-text module-version\">";
                // line 167
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 167), "version", [], "any", false, false, false, 167), "html", null, true);
                echo " by ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 167), "author", [], "any", false, false, false, 167), "html", null, true);
                echo "</div>
                        </div>
                        <div class=\"small no-padding\">
                          ";
                // line 170
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 170), "description", [], "any", false, false, false, 170), "html", null, true);
                echo "
                        </div>
                      </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 174
            echo "                  </div>
                  <div class=\"col-lg-5\">
                    <h2>";
            // line 176
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Module to configure", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</h2>
                    <select class=\"modules-list-select\" data-toggle=\"select2\">
                      ";
            // line 178
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 179
                echo "                        <option value=\"module-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 179), "name", [], "any", false, false, false, 179), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 179), "displayName", [], "any", false, false, false, 179), "html", null, true);
                echo "</option>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 181
            echo "                    </select>
                  </div>
                </div>

                <div class=\"module-render-container all-modules\">
                  <div>
                    <h2>";
            // line 187
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Choose a module to configure", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</h2>
                    <p>";
            // line 188
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("These modules are relative to the product page of your shop.", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "<br />
                    ";
            // line 189
            echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("To manage all your modules go to the [1]Installed module page[/1]", [], "Admin.Catalog.Feature"), ["[1]" => (("<a href=\"" . $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_module_manage")) . "\">"), "[/1]" => "</a>"]);
            echo "</p>
                  </div>
                  <div class=\"row\">
                    ";
            // line 192
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 193
                echo "                      <div class=\"col-lg-6 col-xl-4\">
                        <div class=\"module-item-wrapper-grid\">
                          <div class=\"module-item-heading-grid\">
                            <img class=\"module-logo-thumb-grid\" src=\"";
                // line 196
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 196), "img", [], "any", false, false, false, 196), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 196), "displayName", [], "any", false, false, false, 196), "html", null, true);
                echo "\">
                            <h3 class=\"text-ellipsis module-name-grid\">
                              ";
                // line 198
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 198), "displayName", [], "any", false, false, false, 198), "html", null, true);
                echo "
                            </h3>
                            <div class=\"text-ellipsis small-text module-version-author-grid\">
                              ";
                // line 201
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 201), "version", [], "any", false, false, false, 201), "html", null, true);
                echo " by ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 201), "author", [], "any", false, false, false, 201), "html", null, true);
                echo "
                            </div>
                          </div>
                          <div class=\"module-quick-description-grid small no-padding\">
                            ";
                // line 205
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 205), "description", [], "any", false, false, false, 205), "html", null, true);
                echo "
                          </div>
                          <div class=\"module-container\">
                            <div class=\"module-quick-action-grid clearfix\">
                              <button class=\"modules-list-button btn btn-outline-primary pull-xs-right\" data-target=\"module-";
                // line 209
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 209), "html", null, true);
                echo "\">
                                ";
                // line 210
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configure", [], "Admin.Actions"), "html", null, true);
                echo "
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 217
            echo "                  </div>
                </div>

                ";
            // line 220
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 221
                echo "                  <div id=\"module_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 221), "html", null, true);
                echo "\" class=\"module-render-container module-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["module"], "attributes", [], "any", false, false, false, 221), "name", [], "any", false, false, false, 221), "html", null, true);
                echo "\" style=\"display: none;\">
                    <div>";
                // line 222
                echo twig_get_attribute($this->env, $this->source, $context["module"], "content", [], "any", false, false, false, 222);
                echo "</div>
                  </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 225
            echo "
              </div>
            </div>
          ";
        }
        // line 229
        echo "        ";
    }

    // line 273
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 274
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 276
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/catalog_product.bundle.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 277
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/product/product-manufacturer.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 278
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/product/product-related.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 279
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/product/product-category-tags.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 280
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/product/default-category.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 281
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/product/product-combinations.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 282
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/category-tree.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 283
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/modal-confirmation.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 284
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/product_page.bundle.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 285
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/product/form.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 286
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("../js/tiny_mce/tiny_mce.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 287
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("../js/admin/tinymce.inc.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 288
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("../js/admin/tinymce_loader.js"), "html", null, true);
        echo "\"></script>

  <script>
      \$(function() {
        var editable = '";
        // line 292
        echo twig_escape_filter($this->env, ($context["editable"] ?? null), "html", null, true);
        echo "';

        if (editable !== '1'){
          \$('#field-disabled').find(\"select\").each(function() {
            \$(this).removeClass('select2-hidden-accessible');
          });
          \$('#field-disabled').find(\"span.select2\").each(function() {
            \$(this).hide();
          });
          \$('#field-disabled').find(\"a.pstaggerClosingCross\").each(function() {
            \$(this).attr(\"disabled\", \"disabled\").on(\"click\", function() {
              return false;
            });
          });
        }
      });
  </script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/ProductPage/product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  614 => 292,  607 => 288,  603 => 287,  599 => 286,  595 => 285,  591 => 284,  587 => 283,  583 => 282,  579 => 281,  575 => 280,  571 => 279,  567 => 278,  563 => 277,  559 => 276,  553 => 274,  549 => 273,  545 => 229,  539 => 225,  530 => 222,  523 => 221,  519 => 220,  514 => 217,  501 => 210,  497 => 209,  490 => 205,  481 => 201,  475 => 198,  468 => 196,  463 => 193,  459 => 192,  453 => 189,  449 => 188,  445 => 187,  437 => 181,  426 => 179,  422 => 178,  417 => 176,  413 => 174,  403 => 170,  395 => 167,  391 => 166,  385 => 165,  379 => 163,  375 => 162,  369 => 158,  366 => 157,  362 => 156,  357 => 152,  355 => 151,  354 => 150,  352 => 149,  348 => 148,  343 => 144,  341 => 143,  340 => 142,  338 => 141,  334 => 140,  329 => 136,  327 => 135,  326 => 134,  325 => 133,  323 => 132,  319 => 131,  311 => 124,  309 => 123,  308 => 122,  307 => 121,  306 => 120,  305 => 119,  304 => 118,  299 => 115,  295 => 114,  290 => 110,  288 => 108,  287 => 107,  286 => 106,  285 => 105,  284 => 104,  283 => 103,  282 => 102,  281 => 101,  280 => 100,  279 => 99,  278 => 98,  277 => 97,  276 => 96,  275 => 95,  274 => 94,  273 => 93,  271 => 92,  268 => 91,  264 => 90,  259 => 86,  257 => 84,  256 => 83,  255 => 82,  254 => 81,  253 => 80,  252 => 79,  251 => 78,  250 => 77,  249 => 76,  248 => 75,  247 => 74,  246 => 73,  245 => 72,  244 => 71,  243 => 70,  241 => 69,  238 => 68,  234 => 67,  227 => 62,  223 => 61,  218 => 50,  216 => 48,  215 => 47,  214 => 46,  213 => 45,  212 => 44,  211 => 43,  210 => 42,  208 => 41,  204 => 40,  199 => 270,  197 => 249,  192 => 246,  188 => 245,  185 => 244,  183 => 243,  182 => 242,  181 => 241,  180 => 240,  179 => 239,  178 => 238,  176 => 237,  170 => 233,  166 => 232,  162 => 230,  159 => 156,  156 => 154,  153 => 148,  150 => 146,  147 => 140,  144 => 138,  141 => 131,  138 => 129,  135 => 114,  132 => 112,  129 => 90,  126 => 88,  123 => 67,  119 => 64,  116 => 61,  108 => 55,  103 => 52,  100 => 40,  98 => 39,  94 => 38,  87 => 34,  84 => 33,  81 => 32,  77 => 31,  70 => 28,  66 => 27,  61 => 25,  59 => 334,  58 => 332,  57 => 331,  56 => 315,  54 => 313,  53 => 311,  46 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Product/ProductPage/product.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\product.html.twig");
    }
}


/* @PrestaShop/Admin/Product/ProductPage/product.html.twig */
class __TwigTemplate_6d5adb10d76e63f12a92dc3c6a198881___15254368 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 249
        return "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig", "@PrestaShop/Admin/Product/ProductPage/product.html.twig", 249);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 266
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 267
        echo "      <div class=\"modal-body\"></div>
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/ProductPage/product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  692 => 267,  688 => 266,  677 => 249,  614 => 292,  607 => 288,  603 => 287,  599 => 286,  595 => 285,  591 => 284,  587 => 283,  583 => 282,  579 => 281,  575 => 280,  571 => 279,  567 => 278,  563 => 277,  559 => 276,  553 => 274,  549 => 273,  545 => 229,  539 => 225,  530 => 222,  523 => 221,  519 => 220,  514 => 217,  501 => 210,  497 => 209,  490 => 205,  481 => 201,  475 => 198,  468 => 196,  463 => 193,  459 => 192,  453 => 189,  449 => 188,  445 => 187,  437 => 181,  426 => 179,  422 => 178,  417 => 176,  413 => 174,  403 => 170,  395 => 167,  391 => 166,  385 => 165,  379 => 163,  375 => 162,  369 => 158,  366 => 157,  362 => 156,  357 => 152,  355 => 151,  354 => 150,  352 => 149,  348 => 148,  343 => 144,  341 => 143,  340 => 142,  338 => 141,  334 => 140,  329 => 136,  327 => 135,  326 => 134,  325 => 133,  323 => 132,  319 => 131,  311 => 124,  309 => 123,  308 => 122,  307 => 121,  306 => 120,  305 => 119,  304 => 118,  299 => 115,  295 => 114,  290 => 110,  288 => 108,  287 => 107,  286 => 106,  285 => 105,  284 => 104,  283 => 103,  282 => 102,  281 => 101,  280 => 100,  279 => 99,  278 => 98,  277 => 97,  276 => 96,  275 => 95,  274 => 94,  273 => 93,  271 => 92,  268 => 91,  264 => 90,  259 => 86,  257 => 84,  256 => 83,  255 => 82,  254 => 81,  253 => 80,  252 => 79,  251 => 78,  250 => 77,  249 => 76,  248 => 75,  247 => 74,  246 => 73,  245 => 72,  244 => 71,  243 => 70,  241 => 69,  238 => 68,  234 => 67,  227 => 62,  223 => 61,  218 => 50,  216 => 48,  215 => 47,  214 => 46,  213 => 45,  212 => 44,  211 => 43,  210 => 42,  208 => 41,  204 => 40,  199 => 270,  197 => 249,  192 => 246,  188 => 245,  185 => 244,  183 => 243,  182 => 242,  181 => 241,  180 => 240,  179 => 239,  178 => 238,  176 => 237,  170 => 233,  166 => 232,  162 => 230,  159 => 156,  156 => 154,  153 => 148,  150 => 146,  147 => 140,  144 => 138,  141 => 131,  138 => 129,  135 => 114,  132 => 112,  129 => 90,  126 => 88,  123 => 67,  119 => 64,  116 => 61,  108 => 55,  103 => 52,  100 => 40,  98 => 39,  94 => 38,  87 => 34,  84 => 33,  81 => 32,  77 => 31,  70 => 28,  66 => 27,  61 => 25,  59 => 334,  58 => 332,  57 => 331,  56 => 315,  54 => 313,  53 => 311,  46 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Product/ProductPage/product.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\product.html.twig");
    }
}
