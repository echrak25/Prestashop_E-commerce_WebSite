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

/* @Common/HelpBox/helpbox.html.twig */
class __TwigTemplate_f741160b7a472f953ea12e40f4eb90c0 extends Template
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
        // line 25
        echo "
 <span
   class=\"help-box";
        // line 27
        if (array_key_exists("classes", $context)) {
            echo " ";
            echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
        }
        echo "\"
   data-toggle=\"popover\"
   data-trigger=\"hover\"
   data-html=\"true\"
   ";
        // line 31
        if (array_key_exists("content", $context)) {
            // line 32
            echo "     data-content=\"";
            echo twig_escape_filter($this->env, ($context["content"] ?? null), "html", null, true);
            echo "\"
   ";
        }
        // line 34
        echo "
   ";
        // line 35
        if (array_key_exists("placement", $context)) {
            // line 36
            echo "     data-placement=\"";
            echo twig_escape_filter($this->env, ($context["placement"] ?? null), "html", null, true);
            echo "\"
   ";
        }
        // line 38
        echo "
   ";
        // line 39
        if (array_key_exists("title", $context)) {
            // line 40
            echo "     data-title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\"
   ";
        }
        // line 42
        echo " >
 </span>
";
    }

    public function getTemplateName()
    {
        return "@Common/HelpBox/helpbox.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 42,  75 => 40,  73 => 39,  70 => 38,  64 => 36,  62 => 35,  59 => 34,  53 => 32,  51 => 31,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Common/HelpBox/helpbox.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\HelpBox\\helpbox.html.twig");
    }
}
