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

/* @PrestaShop/Admin/Helpers/range_inputs.html.twig */
class __TwigTemplate_69e88d1612e9571ddd4973221c8d8dbe extends Template
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
        // line 26
        echo "<script>
    \$(document).ready(function() {
        var sliderInput = \$('#";
        // line 28
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "');
        var minInput = \$('#";
        // line 29
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "_min');
        var maxInput = \$('#";
        // line 30
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "_max');

        // parse and fix init value
        var value = sliderInput.attr('sql');
        if (value != '') {
            value = value.replace('BETWEEN ', '');
            value = value.replace(' AND ', ',');
            value = value.replace('<=', '";
        // line 37
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ",');
            value = value.replace('>=', '";
        // line 38
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ",');
            value = value.split(',');
            value[0] = Number(value[0]);
            value[1] = Number(value[1]);
        } else {
            value = [";
        // line 43
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo "];
        }
        value = value.sort(function sortNumber(a,b) {
            return a - b;
        });

        // Init inputs
        if (value[0] > ";
        // line 50
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ")
            minInput.val(value[0]);
        if (value[1] < ";
        // line 52
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ")
            maxInput.val(value[1]);

        // Change events
        var inputFlasher = function(input) {
            // animate input to highlight it (like a pulsate effect on jqueryUI)
            \$(input).stop().delay(100)
                    .fadeIn(100).fadeOut(100)
                    .queue(function() { \$(this).css(\"background-color\", \"#FF5555\").dequeue(); })
                    .fadeIn(160).fadeOut(160).fadeIn(160).fadeOut(160).fadeIn(160)
                    .animate({ backgroundColor: \"#FFFFFF\"}, 800);
        };
        var updater = function(srcElement) {
            var isMinModified = (srcElement.attr('id') == minInput.attr('id'));

            // retrieve values, replace ',' by '.', cast them into numbers (float/int)
            var newValues = [(minInput.val()!='')?Number(minInput.val().replace(',', '.')):";
        // line 68
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ", (maxInput.val()!='')?Number(maxInput.val().replace(',', '.')):";
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo "];

            // if newValues are out of bounds, or not valid, fix the element.
            if (isMinModified && !(newValues[0] >= ";
        // line 71
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo " && newValues[0] <= ";
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ")) {
                newValues[0] = ";
        // line 72
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ";
                minInput.val('');
                inputFlasher(minInput);
            }
            if (!isMinModified && !(newValues[1] >= ";
        // line 76
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo " && newValues[1] <= ";
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ")) {
                newValues[1] = ";
        // line 77
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ";
                maxInput.val('');
                inputFlasher(maxInput);
            }

            // if newValues are not ordered, fix the opposite input.
            if (isMinModified && newValues[0] > newValues[1]) {
                newValues[1] = newValues[0];
                maxInput.val(newValues[0]);
                inputFlasher(maxInput);
            }
            if (!isMinModified && newValues[0] > newValues[1]) {
                newValues[0] = newValues[1];
                minInput.val(newValues[0]);
                inputFlasher(minInput);
            }

            if (newValues[0] == ";
        // line 94
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo " && newValues[1] == ";
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ") {
                sliderInput.attr('sql', '');
            } else if (newValues[0] == ";
        // line 96
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ") {
                sliderInput.attr('sql', '<='+newValues[1]);
            } else if (newValues[1] == ";
        // line 98
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ") {
                sliderInput.attr('sql', '>='+newValues[0]);
            } else {
                sliderInput.attr('sql', 'BETWEEN ' + newValues[0] + ' AND ' + newValues[1]);
            }

            ";
        // line 104
        if (array_key_exists("on_change_func_name", $context)) {
            // line 105
            echo "            var afterUpdate = function() {
                ";
            // line 106
            echo ($context["on_change_func_name"] ?? null);
            echo "
            };
            afterUpdate();
            ";
        }
        // line 110
        echo "        }
        minInput.on('change', function(event) {
            updater(\$(event.srcElement));
        });
        maxInput.on('change', function(event) {
            updater(\$(event.srcElement));
        });
    });
</script>
<div id=\"";
        // line 119
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "_div\">
    <input type=\"hidden\" id=\"";
        // line 120
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "\" value=\"\" sql=\"";
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "\" />
    <div>
        <input class=\"form-control form-min-max\" type=\"text\" id=\"";
        // line 122
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "_min\" value=\"\" placeholder=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("minLabel", $context)) ? (_twig_default_filter(($context["minLabel"] ?? null), "Min")) : ("Min")), "html", null, true);
        echo "\" ";
        if (((array_key_exists("disabled", $context)) ? (_twig_default_filter(($context["disabled"] ?? null), false)) : (false))) {
            echo "disabled";
        }
        echo " aria-label=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%inputId% Minimum Input", ["%inputId%" => ($context["input_name"] ?? null)], "Admin.Global"), "html", null, true);
        echo "\" />
    </div>
    <div>
        <input class=\"form-control form-min-max\" type=\"text\" id=\"";
        // line 125
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "_max\" value=\"\" placeholder=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("maxLabel", $context)) ? (_twig_default_filter(($context["maxLabel"] ?? null), "Max")) : ("Max")), "html", null, true);
        echo "\" ";
        if (((array_key_exists("disabled", $context)) ? (_twig_default_filter(($context["disabled"] ?? null), false)) : (false))) {
            echo "disabled";
        }
        echo " aria-label=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%inputId% Maximum Input", ["%inputId%" => ($context["input_name"] ?? null)], "Admin.Global"), "html", null, true);
        echo "\" />
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Helpers/range_inputs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 125,  211 => 122,  202 => 120,  198 => 119,  187 => 110,  180 => 106,  177 => 105,  175 => 104,  166 => 98,  161 => 96,  154 => 94,  134 => 77,  128 => 76,  121 => 72,  115 => 71,  107 => 68,  88 => 52,  83 => 50,  71 => 43,  63 => 38,  59 => 37,  49 => 30,  45 => 29,  41 => 28,  37 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Helpers/range_inputs.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Helpers\\range_inputs.html.twig");
    }
}
