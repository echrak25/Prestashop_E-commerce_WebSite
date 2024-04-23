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

/* @PrestaShop/Admin/Helpers/bootstrap_popup.html.twig */
class __TwigTemplate_083950e7ecb4af72b7a3c962adb0790c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "<div class=\"modal fade\" id=\"";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\" tabindex=\"-1\">
    <div class=\"modal-dialog ";
        // line 26
        if (array_key_exists("class", $context)) {
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
        }
        echo "\">
        <div class=\"modal-content\">
            ";
        // line 28
        $this->displayBlock('header', $context, $blocks);
        // line 36
        echo "
            ";
        // line 37
        $this->displayBlock('content', $context, $blocks);
        // line 39
        echo "
            ";
        // line 40
        if (array_key_exists("progressbar", $context)) {
            // line 41
            echo "                <div class=\"modal-body\" id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["progressbar"] ?? null), "id", [], "any", false, false, false, 41), "html", null, true);
            echo "\">
                    <div class=\"float-right progress-details-text\" default-value=\"";
            // line 42
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["progressbar"] ?? null), "label", [], "any", true, true, false, 42)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["progressbar"] ?? null), "label", [], "any", false, false, false, 42), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Processing...", [], "Admin.Global"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Processing...", [], "Admin.Global"))), "html", null, true);
            echo "\">
                        ";
            // line 43
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["progressbar"] ?? null), "label", [], "any", true, true, false, 43)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["progressbar"] ?? null), "label", [], "any", false, false, false, 43), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Processing...", [], "Admin.Global"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Processing...", [], "Admin.Global"))), "html", null, true);
            echo "
                    </div>
                    <div class=\"progress\" style=\"width: 100%\">
                        <div class=\"progress-bar progress-bar-striped\" role=\"progressbar\" style=\"width: 0%\">
                            <span>0 %</span>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 52
        echo "
            ";
        // line 53
        $this->displayBlock('footer', $context, $blocks);
        // line 77
        echo "        </div>
    </div>
</div>
<script>
    \$(document).ready(function() {
        var closable = ";
        // line 82
        if ((array_key_exists("closable", $context) && (($context["closable"] ?? null) == true))) {
            echo "true";
        } else {
            echo "false";
        }
        echo ";
        \$('#";
        // line 83
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "').modal({
            backdrop: (closable ? true : 'static'),
            keyboard: closable,
            closable: closable,
            show: false
        });
    });
</script>
";
    }

    // line 28
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "                ";
        if (array_key_exists("title", $context)) {
            // line 30
            echo "                    <div class=\"modal-header\">
                        <h4 class=\"modal-title\">";
            // line 31
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "</h4>
                        ";
            // line 32
            if ((array_key_exists("closable", $context) && (($context["closable"] ?? null) == true))) {
                echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
            }
            // line 33
            echo "                    </div>
                ";
        }
        // line 35
        echo "            ";
    }

    // line 37
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "            ";
    }

    // line 53
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 54
        echo "                ";
        if (array_key_exists("actions", $context)) {
            // line 55
            echo "                    <div class=\"modal-footer\">
                        ";
            // line 56
            if ((array_key_exists("closable", $context) && (($context["closable"] ?? null) == true))) {
                // line 57
                echo "                            <button type=\"button\" class=\"btn btn-outline-secondary btn-lg\" data-dismiss=\"modal\">
                              ";
                // line 58
                if (array_key_exists("closeLabel", $context)) {
                    // line 59
                    echo "                                ";
                    echo twig_escape_filter($this->env, ($context["closeLabel"] ?? null), "html", null, true);
                    echo "
                              ";
                } else {
                    // line 61
                    echo "                                ";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Close", [], "Admin.Actions"), "html", null, true);
                    echo "
                              ";
                }
                // line 63
                echo "                            </button>
                        ";
            }
            // line 65
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["actions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 66
                echo "                            ";
                if ((twig_get_attribute($this->env, $this->source, $context["action"], "type", [], "any", true, true, false, 66) && (twig_get_attribute($this->env, $this->source, $context["action"], "type", [], "any", false, false, false, 66) == "link"))) {
                    // line 67
                    echo "                                <a href=\"";
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["action"], "href", [], "any", true, true, false, 67)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["action"], "href", [], "any", false, false, false, 67), "#")) : ("#")), "html", null, true);
                    echo "\" class=\"";
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["action"], "class", [], "any", true, true, false, 67)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["action"], "class", [], "any", false, false, false, 67), "btn")) : ("btn")), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["action"], "label", [], "any", true, true, false, 67)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["action"], "label", [], "any", false, false, false, 67), "Label is missing")) : ("Label is missing")), "html", null, true);
                    echo "</a>
                            ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 68
$context["action"], "type", [], "any", true, true, false, 68) && (twig_get_attribute($this->env, $this->source, $context["action"], "type", [], "any", false, false, false, 68) == "button"))) {
                    // line 69
                    echo "                                <button type=\"button\" value=\"";
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["action"], "value", [], "any", true, true, false, 69)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["action"], "value", [], "any", false, false, false, 69), "")) : ("")), "html", null, true);
                    echo "\" class=\"";
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["action"], "class", [], "any", true, true, false, 69)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["action"], "class", [], "any", false, false, false, 69), "btn")) : ("btn")), "html", null, true);
                    echo "\">
                                    ";
                    // line 70
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["action"], "label", [], "any", true, true, false, 70)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["action"], "label", [], "any", false, false, false, 70), "Label is missing")) : ("Label is missing")), "html", null, true);
                    echo "
                                </button>
                            ";
                }
                // line 73
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "                    </div>
                ";
        }
        // line 76
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 76,  223 => 74,  217 => 73,  211 => 70,  204 => 69,  202 => 68,  193 => 67,  190 => 66,  185 => 65,  181 => 63,  175 => 61,  169 => 59,  167 => 58,  164 => 57,  162 => 56,  159 => 55,  156 => 54,  152 => 53,  148 => 38,  144 => 37,  140 => 35,  136 => 33,  132 => 32,  128 => 31,  125 => 30,  122 => 29,  118 => 28,  105 => 83,  97 => 82,  90 => 77,  88 => 53,  85 => 52,  73 => 43,  69 => 42,  64 => 41,  62 => 40,  59 => 39,  57 => 37,  54 => 36,  52 => 28,  45 => 26,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Helpers\\bootstrap_popup.html.twig");
    }
}
