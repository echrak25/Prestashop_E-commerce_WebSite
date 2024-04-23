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

/* @Product/ProductPage/Forms/form_supplier_combination.html.twig */
class __TwigTemplate_387c40a497bc677e9ab6a5e980bdaa7b extends Template
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
        if ((twig_length_filter($this->env, ($context["suppliers"] ?? null)) > 0)) {
            // line 26
            echo "  <h4>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Supplier reference(s)", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</h4>
  <div class=\"alert alert-info\" role=\"alert\">
    <p class=\"alert-text\">
      ";
            // line 29
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You can specify product reference(s) for each associated supplier. Click \"%save_label%\" after changing selected suppliers to display the associated product references.", ["%save_label%" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions")], "Admin.Catalog.Help");
            echo "
    </p>
  </div>
";
        }
        // line 33
        echo "
";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["suppliers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["supplierId"]) {
            // line 35
            echo "  ";
            $context["collectionName"] = ("supplier_combination_" . $context["supplierId"]);
            // line 36
            echo "  <div class=\"panel panel-default\">
    <div class=\"panel-heading\">
      <strong>";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = ($context["form"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[($context["collectionName"] ?? null)] ?? null) : null), "vars", [], "any", false, false, false, 38), "label", [], "any", false, false, false, 38), "html", null, true);
            echo "</strong>
    </div>
    <div class=\"panel-body\" id=\"supplier_combination_";
            // line 40
            echo twig_escape_filter($this->env, $context["supplierId"], "html", null, true);
            echo "\">
      <div>
        ";
            // line 42
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_1 = ($context["form"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[($context["collectionName"] ?? null)] ?? null) : null), 'errors');
            echo "
        <table class=\"table\">
          <thead class=\"thead-default\">
            <tr>
              <th width=\"30%\">";
            // line 46
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Product name", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
              <th width=\"30%\">";
            // line 47
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Supplier reference", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
              <th width=\"20%\">";
            // line 48
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cost price (tax excl.)", [], "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
              <th width=\"20%\">";
            // line 49
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Currency", [], "Admin.Global"), "html", null, true);
            echo "</th>
            </tr>
          </thead>
          <tbody>
            ";
            // line 53
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((($__internal_compile_2 = ($context["form"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[($context["collectionName"] ?? null)] ?? null) : null));
            foreach ($context['_seq'] as $context["_key"] => $context["supplier_combination"]) {
                // line 54
                echo "              <tr>
                <td>";
                // line 55
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["supplier_combination"], "vars", [], "any", false, false, false, 55), "value", [], "any", false, false, false, 55), "label", [], "any", false, false, false, 55), "html", null, true);
                echo "</td>
                <td>";
                // line 56
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["supplier_combination"], "supplier_reference", [], "any", false, false, false, 56), 'widget');
                echo "</td>
                <td>";
                // line 57
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["supplier_combination"], "product_price", [], "any", false, false, false, 57), 'widget');
                echo "</td>
                <td>
                  ";
                // line 59
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["supplier_combination"], "product_price_currency", [], "any", false, false, false, 59), 'widget');
                echo "
                  ";
                // line 60
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["supplier_combination"], "id_product_attribute", [], "any", false, false, false, 60), 'widget');
                echo "
                  ";
                // line 61
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["supplier_combination"], "supplier_id", [], "any", false, false, false, 61), 'widget');
                echo "
                </td>
              </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supplier_combination'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "          </tbody>
        </table>
      </div>
    </div>
  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supplierId'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_supplier_combination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 65,  131 => 61,  127 => 60,  123 => 59,  118 => 57,  114 => 56,  110 => 55,  107 => 54,  103 => 53,  96 => 49,  92 => 48,  88 => 47,  84 => 46,  77 => 42,  72 => 40,  67 => 38,  63 => 36,  60 => 35,  56 => 34,  53 => 33,  46 => 29,  39 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_supplier_combination.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_supplier_combination.html.twig");
    }
}
