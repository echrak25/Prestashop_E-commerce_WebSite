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

/* @PrestaShop/Admin/Common/Kpi/kpi_row.html.twig */
class __TwigTemplate_8e36534973636e30991079a66fb149de extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'kpi_row' => [$this, 'block_kpi_row'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "    ";
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('kpi_row', $context, $blocks);
        // line 45
        echo "
";
    }

    // line 26
    public function block_kpi_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "  <div class=\"card card-kpis\">

    <div class=\"kpi-row\">
      ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["kpiRow"] ?? null), "kpis", [], "any", false, false, false, 30));
        foreach ($context['_seq'] as $context["_key"] => $context["kpi"]) {
            // line 31
            echo "        ";
            echo $context["kpi"];
            echo "
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['kpi'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "    </div>

    ";
        // line 35
        if (twig_get_attribute($this->env, $this->source, ($context["kpiRow"] ?? null), "allowRefresh", [], "any", false, false, false, 35)) {
            // line 36
            echo "    <div class=\"kpi-refresh\">
      <button class=\"refresh-kpis btn btn-primary\" type=\"button\">
        <i class=\"material-icons\">refresh</i>
      </button>
    </div>
    ";
        }
        // line 42
        echo "
  </div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Kpi/kpi_row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  86 => 42,  78 => 36,  76 => 35,  72 => 33,  63 => 31,  59 => 30,  54 => 27,  50 => 26,  45 => 45,  43 => 26,  40 => 25,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Kpi/kpi_row.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Kpi\\kpi_row.html.twig");
    }
}
