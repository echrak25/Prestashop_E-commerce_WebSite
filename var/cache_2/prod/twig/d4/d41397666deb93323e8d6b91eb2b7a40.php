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

/* @PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig */
class __TwigTemplate_d8f33b0aaa5ccfd0d65dfe794b282164 extends Template
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
<tr class=\"empty_row\">
  <td colspan=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "columns", [], "any", false, false, false, 27)), "html", null, true);
        echo "\" ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "attributes", [], "any", false, false, false, 27), "is_empty_state", [], "any", false, false, false, 27)) {
            echo "class=\"border-0\"";
        }
        echo ">
    ";
        // line 28
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "attributes", [], "any", false, false, false, 28), "is_empty_state", [], "any", false, false, false, 28)) {
            // line 29
            echo "      ";
            $this->loadTemplate([0 => (("@PrestaShop/Admin/Common/Grid/Blocks/EmptyState/" . twig_get_attribute($this->env, $this->source,             // line 30
($context["grid"] ?? null), "id", [], "any", false, false, false, 30)) . ".html.twig"), 1 => "@PrestaShop/Admin/Common/Grid/Blocks/EmptyState/_default.html.twig"], "@PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig", 29)->display(twig_array_merge($context, ["grid" =>             // line 32
($context["grid"] ?? null)]));
            // line 34
            echo "    ";
        } else {
            // line 35
            echo "      ";
            $this->loadTemplate("@PrestaShop/Admin/Common/Grid/Blocks/EmptyState/_default.html.twig", "@PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig", 35)->display(twig_array_merge($context, ["grid" => ($context["grid"] ?? null)]));
            // line 36
            echo "    ";
        }
        // line 37
        echo "  </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 37,  62 => 36,  59 => 35,  56 => 34,  54 => 32,  53 => 30,  51 => 29,  49 => 28,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Blocks\\Table\\empty_row.html.twig");
    }
}
