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

/* @PrestaShop/Admin/Common/Grid/Columns/Content/identifier.html.twig */
class __TwigTemplate_9a30aadfd13c297d1f91052924602b1c extends Template
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
";
        // line 26
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 26), "with_bulk_field", [], "any", false, false, false, 26)) {
            // line 27
            echo "  <div class=\"md-checkbox d-inline-block\">
    <label>
      <input type=\"checkbox\"
             title=\"";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "name", [], "any", false, false, false, 30), "html", null, true);
            echo "\"
             class=\"js-bulk-action-checkbox\"
             name=\"";
            // line 32
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["grid"] ?? null), "id", [], "any", false, false, false, 32) . "_") . twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "id", [], "any", false, false, false, 32)), "html", null, true);
            echo "[]\"
             value=\"";
            // line 33
            echo twig_escape_filter($this->env, (($__internal_compile_0 = ($context["record"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 33), "bulk_field", [], "any", false, false, false, 33)] ?? null) : null), "html", null, true);
            echo "\"
      >
      <i class=\"md-checkbox-control\"></i>
    </label>
  </div>
";
        }
        // line 39
        echo "
";
        // line 40
        echo twig_escape_filter($this->env, (($__internal_compile_1 = ($context["record"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 40), "identifier_field", [], "any", false, false, false, 40)] ?? null) : null), "html", null, true);
        echo "

";
        // line 42
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 42), "preview", [], "any", false, false, false, 42))) {
            // line 43
            echo "  ";
            $this->loadTemplate("@PrestaShop/Admin/Common/Grid/Columns/Content/preview.html.twig", "@PrestaShop/Admin/Common/Grid/Columns/Content/identifier.html.twig", 43)->display(twig_array_merge($context, ["column" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 44
($context["column"] ?? null), "options", [], "any", false, false, false, 44), "preview", [], "any", false, false, false, 44), "record" =>             // line 45
($context["record"] ?? null)]));
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/identifier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 45,  77 => 44,  75 => 43,  73 => 42,  68 => 40,  65 => 39,  56 => 33,  52 => 32,  47 => 30,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/identifier.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Columns\\Content\\identifier.html.twig");
    }
}
