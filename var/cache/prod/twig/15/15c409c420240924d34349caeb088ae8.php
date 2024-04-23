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

/* @Product/ProductPage/Forms/form_supplier_choice.html.twig */
class __TwigTemplate_b116d03d2a8d9b9effbfd53b0b54954f extends Template
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
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "suppliers", [], "any", false, false, false, 25)) > 0)) {
            // line 26
            echo "  <div id=\"form_step6_suppliers_custom_fields\">
    <h2>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "suppliers", [], "any", false, false, false, 27), "vars", [], "any", false, false, false, 27), "label", [], "any", false, false, false, 27), "html", null, true);
            echo "</h2>
    <div class=\"mb-1\">
      <div class=\"alert expandable-alert alert-info\" role=\"alert\">
        <button type=\"button\" class=\"read-more btn-link\" data-toggle=\"collapse\" data-target=\"#suppliersInfo\" aria-expanded=\"false\" aria-controls=\"collapseDanger\">
          ";
            // line 31
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Read more", [], "Admin.Actions");
            echo "
        </button>
        <p class=\"alert-text\">
          ";
            // line 34
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This interface allows you to specify the suppliers of the current product and its combinations, if any.", [], "Admin.Catalog.Help");
            echo "<br>
          ";
            // line 35
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You can specify supplier references according to previously associated suppliers.", [], "Admin.Catalog.Help");
            echo "
        </p>
        <div class=\"alert-more collapse\" id=\"suppliersInfo\">
          <p>
            ";
            // line 39
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("When using the advanced stock management tool (see Shop Parameters > Products settings), the values you define (price, references) will be used in supply orders.", [], "Admin.Catalog.Help");
            echo "
          </p>
        </div>
      </div>
    </div>

    <div class=\"panel panel-default\">
      <div class=\"panel-body\">
        <div>
          ";
            // line 48
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "suppliers", [], "any", false, false, false, 48), 'errors');
            echo "
          <table class=\"table\" id=\"form_step6_suppliers\">
            <thead class=\"thead-default\">
              <tr>
                <th width=\"70%\">";
            // line 52
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Choose the suppliers associated with this product", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
                <th width=\"30%\">";
            // line 53
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Default supplier", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
              </tr>
            </thead>
            <tbody>
              ";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "suppliers", [], "any", false, false, false, 57));
            foreach ($context['_seq'] as $context["key"] => $context["supplier"]) {
                // line 58
                echo "                <tr>
                  <td>";
                // line 59
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["supplier"], 'widget');
                echo "</td>
                  <td>";
                // line 60
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "default_supplier", [], "any", false, false, false, 60)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["key"]] ?? null) : null), 'widget');
                echo "</td>
                </tr>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['supplier'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_supplier_choice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 63,  107 => 60,  103 => 59,  100 => 58,  96 => 57,  89 => 53,  85 => 52,  78 => 48,  66 => 39,  59 => 35,  55 => 34,  49 => 31,  42 => 27,  39 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_supplier_choice.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_supplier_choice.html.twig");
    }
}
