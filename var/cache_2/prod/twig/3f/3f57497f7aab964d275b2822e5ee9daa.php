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

/* @PrestaShop/Admin/TwigTemplateForm/translatable_choice.html.twig */
class __TwigTemplate_1b44ed3599e20ebf54759087eec78ce3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'translatable_choice_widget' => [$this, 'block_translatable_choice_widget'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        $this->displayBlock('translatable_choice_widget', $context, $blocks);
    }

    public function block_translatable_choice_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "  ";
        $macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/TwigTemplateForm/translatable_choice.html.twig", 26)->unwrap();
        // line 27
        echo "
  ";
        // line 28
        $context["class"] = ((twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "class", [], "any", true, true, false, 28)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "class", [], "any", false, false, false, 28), "")) : (""));
        // line 29
        echo "  ";
        $context["rowAttributes"] = ((twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "row_attr", [], "any", true, true, false, 29)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "row_attr", [], "any", false, false, false, 29), [])) : ([]));
        // line 30
        echo "  ";
        $context["attr"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 30), "attr", [], "any", false, false, false, 30);
        // line 31
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 31)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 31), "")) : ("")) . " custom-select translatable_choice"))]);
        // line 32
        echo "  <div class=\"form-group row type-choice ";
        echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
        echo "\" ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rowAttributes"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["rowAttr"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, $context["rowAttr"], "html", null, true);
            echo "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['rowAttr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ">
  ";
        // line 33
        $context["extraVars"] = ((array_key_exists("extraVars", $context)) ? (_twig_default_filter(($context["extraVars"] ?? null), [])) : ([]));
        // line 34
        echo "
  ";
        // line 36
        echo "  ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 36), "choices", [], "any", false, false, false, 36));
        foreach ($context['_seq'] as $context["language"] => $context["choices"]) {
            // line 37
            echo "    <div class=\"col-sm-6\" ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 37), "default_locale", [], "any", true, true, false, 37) &&  !(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 37), "default_locale", [], "any", false, false, false, 37) === $context["language"]))) {
                echo "style=\"display: none\"";
            }
            echo ">
      <select class=\"";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 38), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 38), "id", [], "any", false, false, false, 38) . "_") . $context["language"]), "html", null, true);
            echo "\" data-language=\"";
            echo twig_escape_filter($this->env, $context["language"], "html", null, true);
            echo "\">
        ";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["choices"]);
            foreach ($context['_seq'] as $context["choiceValue"] => $context["choiceLabel"]) {
                // line 40
                echo "          <option value=\"";
                echo twig_escape_filter($this->env, $context["choiceValue"], "html", null, true);
                echo "\"
            ";
                // line 41
                if (((array_key_exists("value", $context) && twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), $context["language"], [], "array", true, true, false, 41)) && ($context["choiceValue"] === (($__internal_compile_0 = ($context["value"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["language"]] ?? null) : null)))) {
                    echo " selected=\"selected\"";
                }
                // line 42
                echo "             ";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 42), "row_attr", [], "any", false, true, false, 42), $context["language"], [], "array", false, true, false, 42), $context["choiceValue"], [], "array", true, true, false, 42) && twig_test_iterable((($__internal_compile_1 = (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 42), "row_attr", [], "any", false, false, false, 42)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[$context["language"]] ?? null) : null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[$context["choiceValue"]] ?? null) : null)))) {
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_compile_3 = (($__internal_compile_4 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 42), "row_attr", [], "any", false, false, false, 42)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[$context["language"]] ?? null) : null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[$context["choiceValue"]] ?? null) : null));
                    foreach ($context['_seq'] as $context["optionKey"] => $context["optionAttr"]) {
                        echo " ";
                        echo twig_escape_filter($this->env, $context["optionKey"], "html", null, true);
                        echo "=\"";
                        echo twig_escape_filter($this->env, $context["optionAttr"], "html", null, true);
                        echo "\"";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['optionKey'], $context['optionAttr'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                echo ">";
                echo twig_escape_filter($this->env, ((( !array_key_exists("choice_translation_domain", $context) || (($context["choice_translation_domain"] ?? null) === false))) ? ($context["choiceLabel"]) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans($context["choiceLabel"], [], ($context["choice_translation_domain"] ?? null)))), "html", null, true);
                echo "</option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['choiceValue'], $context['choiceLabel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "      </select>
      <input type=\"hidden\" id=\"";
            // line 45
            echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 45), "id", [], "any", false, false, false, 45) . "_") . $context["language"]) . "_value"), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 45), "full_name", [], "any", false, false, false, 45) . "[") . $context["language"]) . "]"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, twig_first($this->env, $context["choices"]), "html", null, true);
            echo "\" />
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['language'], $context['choices'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "
  ";
        // line 50
        echo "  ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 50), "locales", [], "any", true, true, false, 50) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 50), "locales", [], "any", false, false, false, 50)))) {
            // line 51
            echo "    <div class=\"col-sm-3\">
      <select name=\"";
            // line 52
            echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 52), "id", [], "any", false, false, false, 52) . "_language"), "html", null, true);
            echo "\" class=\"custom-select translatable_choice_language\">
        ";
            // line 53
            if (twig_test_iterable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 53), "locales", [], "any", false, false, false, 53))) {
                // line 54
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 54), "locales", [], "any", false, false, false, 54));
                foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                    // line 55
                    echo "            <option value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "id_lang", [], "any", false, false, false, 55), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["language"], "iso_code", [], "any", false, false, false, 55) . " - ") . twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 55)), "html", null, true);
                    echo "</option>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 57
                echo "        ";
            }
            // line 58
            echo "      </select>
    </div>
  ";
        }
        // line 61
        echo "
  ";
        // line 63
        echo "  ";
        if (array_key_exists("button", $context)) {
            // line 64
            echo "    <div class=\"col-sm-3\">
      <button type=\"button\" ";
            // line 65
            if (twig_get_attribute($this->env, $this->source, ($context["button"] ?? null), "id", [], "any", true, true, false, 65)) {
                echo "id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["button"] ?? null), "id", [], "any", false, false, false, 65), "html", null, true);
                echo "\"";
            }
            echo " class=\"btn ";
            if (twig_get_attribute($this->env, $this->source, ($context["button"] ?? null), "class", [], "any", true, true, false, 65)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["button"] ?? null), "class", [], "any", false, false, false, 65), "html", null, true);
            } else {
                echo "btn-default";
            }
            echo "\" ";
            if (twig_get_attribute($this->env, $this->source, ($context["button"] ?? null), "action", [], "any", true, true, false, 65)) {
                echo " onclick=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["button"] ?? null), "action", [], "any", false, false, false, 65), "html", null, true);
                echo "\"";
            }
            echo ">
        ";
            // line 66
            if (twig_get_attribute($this->env, $this->source, ($context["button"] ?? null), "icon", [], "any", true, true, false, 66)) {
                echo "<i class=\"material-icons\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["button"] ?? null), "icon", [], "any", false, false, false, 66), "html", null, true);
                echo "</i>";
            }
            // line 67
            echo "        ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["button"] ?? null), "label", [], "any", false, false, false, 67), "html", null, true);
            echo "
      </button>
    </div>
  ";
        }
        // line 71
        echo "  </div>";
        // line 73
        $this->displayBlock("form_help", $context, $blocks);
        // line 74
        $this->displayBlock("form_hint", $context, $blocks);
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/TwigTemplateForm/translatable_choice.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  244 => 74,  242 => 73,  240 => 71,  232 => 67,  226 => 66,  206 => 65,  203 => 64,  200 => 63,  197 => 61,  192 => 58,  189 => 57,  178 => 55,  173 => 54,  171 => 53,  167 => 52,  164 => 51,  161 => 50,  158 => 48,  145 => 45,  142 => 44,  118 => 42,  114 => 41,  109 => 40,  105 => 39,  97 => 38,  90 => 37,  85 => 36,  82 => 34,  80 => 33,  62 => 32,  59 => 31,  56 => 30,  53 => 29,  51 => 28,  48 => 27,  45 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/TwigTemplateForm/translatable_choice.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\TwigTemplateForm\\translatable_choice.html.twig");
    }
}
