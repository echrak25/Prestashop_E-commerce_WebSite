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

/* @PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig */
class __TwigTemplate_47a87bc050d2337f34bcb67d55c18560 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        // line 37
        $_trait_0 = $this->loadTemplate("bootstrap_4_horizontal_layout.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig", 37);
        if (!$_trait_0->isTraitable()) {
            throw new RuntimeError('Template "'."bootstrap_4_horizontal_layout.html.twig".'" cannot be used as a trait.', 37, $this->source);
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        // line 38
        $_trait_1 = $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig", 38);
        if (!$_trait_1->isTraitable()) {
            throw new RuntimeError('Template "'."@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig".'" cannot be used as a trait.', 38, $this->source);
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            [
                'form_start' => [$this, 'block_form_start'],
                'form_label' => [$this, 'block_form_label'],
                'form_label_class' => [$this, 'block_form_label_class'],
                'form_row' => [$this, 'block_form_row'],
                'form_group_class' => [$this, 'block_form_group_class'],
                'form_row_class' => [$this, 'block_form_row_class'],
            ]
        );
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 36
        echo "
";
        // line 39
        echo "
";
        // line 41
        echo "
";
        // line 42
        $this->displayBlock('form_start', $context, $blocks);
        // line 46
        echo "
";
        // line 48
        echo "
";
        // line 49
        $this->displayBlock('form_label', $context, $blocks);
        // line 61
        echo "
";
        // line 62
        $this->displayBlock('form_label_class', $context, $blocks);
        // line 65
        echo "
";
        // line 67
        echo "
";
        // line 68
        $this->displayBlock('form_row', $context, $blocks);
        // line 108
        echo "
";
        // line 109
        $this->displayBlock('form_group_class', $context, $blocks);
        // line 112
        echo "
";
        // line 113
        $this->displayBlock('form_row_class', $context, $blocks);
    }

    // line 42
    public function block_form_start($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 43
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 43)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 43), "")) : ("")) . " form-horizontal"))]);
        // line 44
        $this->displayParentBlock("form_start", $context, $blocks);
    }

    // line 49
    public function block_form_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 50
        ob_start(function () { return ''; });
        // line 51
        echo "    ";
        if ((($context["label"] ?? null) === null)) {
            // line 52
            echo "      <div class=\"";
            $this->displayBlock("form_label_class", $context, $blocks);
            echo "\"></div>
    ";
        } elseif ((        // line 53
($context["label"] ?? null) === false)) {
            // line 54
            echo "      ";
            // line 55
            echo "    ";
        } else {
            // line 56
            echo "      ";
            $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 56)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 56), "")) : ("")) . " ") .             $this->renderBlock("form_label_class", $context, $blocks)))]);
            // line 57
            $this->displayParentBlock("form_label", $context, $blocks);
        }
        // line 59
        echo "  ";
        $___internal_parse_0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 50
        echo twig_spaceless($___internal_parse_0_);
    }

    // line 62
    public function block_form_label_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 63
        echo "form-control-label";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 63), "attr", [], "any", false, true, false, 63), "disabled", [], "any", true, true, false, 63) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 63), "attr", [], "any", false, false, false, 63), "disabled", [], "any", false, false, false, 63))) {
            echo " disabled";
        }
    }

    // line 68
    public function block_form_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 69
        ob_start(function () { return ''; });
        // line 70
        echo "    ";
        // line 71
        echo "    ";
        if (array_key_exists("label_tag_name", $context)) {
            // line 72
            echo "      ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
            echo "
    ";
        }
        // line 74
        echo "
    ";
        // line 75
        $macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig", 75)->unwrap();
        // line 76
        echo "    ";
        $context["disabledField"] = false;
        // line 77
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 77), "attr", [], "any", false, true, false, 77), "disabled", [], "any", true, true, false, 77) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 77), "attr", [], "any", false, false, false, 77), "disabled", [], "any", false, false, false, 77))) {
            // line 78
            echo "      ";
            $context["disabledField"] = true;
            // line 79
            echo "    ";
        }
        // line 80
        echo "
    <div class=\"";
        // line 81
        $this->displayBlock("form_row_class", $context, $blocks);
        $this->displayBlock("widget_type_class", $context, $blocks);
        if ((( !($context["compound"] ?? null) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
            echo " has-error";
        }
        if ((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "visible", [], "any", true, true, false, 81) &&  !twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "visible", [], "any", false, false, false, 81))) {
            echo " d-none";
        }
        echo "\">
      ";
        // line 82
        $context["multistoreCheckboxName"] = (($context["multistore_field_prefix"] ?? null) . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 82), "name", [], "any", false, false, false, 82));
        // line 83
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, true, false, 83), ($context["multistoreCheckboxName"] ?? null), [], "any", true, true, false, 83)) {
            // line 84
            echo "        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, false, false, 84), ($context["multistoreCheckboxName"] ?? null), [], "any", false, false, false, 84), 'errors');
            echo "
        ";
            // line 85
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, false, false, 85), ($context["multistoreCheckboxName"] ?? null), [], "any", false, false, false, 85), 'widget');
            echo "
      ";
        }
        // line 87
        echo "
      ";
        // line 88
        if ( !array_key_exists("label_tag_name", $context)) {
            // line 89
            echo "        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
            echo "
      ";
        }
        // line 91
        echo "      <div class=\"";
        $this->displayBlock("form_group_class", $context, $blocks);
        if (($context["disabledField"] ?? null)) {
            echo " disabled";
        }
        echo "\">
        ";
        // line 92
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
        ";
        // line 93
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors', ["attr" => ["fieldError" => true]]);
        echo "
      </div>
      ";
        // line 95
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, true, false, 95), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 95), "name", [], "any", false, false, false, 95), [], "any", true, true, false, 95) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, false, false, 95), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 95), "name", [], "any", false, false, false, 95), [], "any", false, false, false, 95), "vars", [], "any", false, false, false, 95), "multistore_dropdown", [], "any", false, false, false, 95) != false))) {
            // line 96
            echo "        ";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "parent", [], "any", false, false, false, 96), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 96), "name", [], "any", false, false, false, 96), [], "any", false, false, false, 96), "vars", [], "any", false, false, false, 96), "multistore_dropdown", [], "any", false, false, false, 96);
            echo "
      ";
        }
        // line 99
        $this->displayBlock("form_external_link", $context, $blocks);
        // line 100
        $this->displayBlock("form_alert", $context, $blocks);
        // line 101
        echo "</div>
  ";
        $___internal_parse_1_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 69
        echo twig_spaceless($___internal_parse_1_);
        // line 103
        echo "
  ";
        // line 104
        if (($context["column_breaker"] ?? null)) {
            // line 105
            echo "    <div class=\"form-group form-column-breaker\"></div>
  ";
        }
    }

    // line 109
    public function block_form_group_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 110
        echo "col-sm input-container";
    }

    // line 113
    public function block_form_row_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 114
        echo "form-group row";
        if (twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 114)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, false, 114), "html", null, true);
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  299 => 114,  295 => 113,  291 => 110,  287 => 109,  281 => 105,  279 => 104,  276 => 103,  274 => 69,  270 => 101,  268 => 100,  266 => 99,  260 => 96,  258 => 95,  253 => 93,  249 => 92,  241 => 91,  235 => 89,  233 => 88,  230 => 87,  225 => 85,  220 => 84,  217 => 83,  215 => 82,  204 => 81,  201 => 80,  198 => 79,  195 => 78,  192 => 77,  189 => 76,  187 => 75,  184 => 74,  178 => 72,  175 => 71,  173 => 70,  171 => 69,  167 => 68,  160 => 63,  156 => 62,  152 => 50,  149 => 59,  146 => 57,  143 => 56,  140 => 55,  138 => 54,  136 => 53,  131 => 52,  128 => 51,  126 => 50,  122 => 49,  118 => 44,  116 => 43,  112 => 42,  108 => 113,  105 => 112,  103 => 109,  100 => 108,  98 => 68,  95 => 67,  92 => 65,  90 => 62,  87 => 61,  85 => 49,  82 => 48,  79 => 46,  77 => 42,  74 => 41,  71 => 39,  68 => 36,  65 => 25,  37 => 38,  30 => 37,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\TwigTemplateForm\\prestashop_ui_kit.html.twig");
    }
}
