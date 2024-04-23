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

/* @PrestaShop/Admin/Sell/Order/Invoices/Blocks/generate_by_status.html.twig */
class __TwigTemplate_b11b145225619779457693403bf23bc0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'invoices_generate_by_status' => [$this, 'block_invoices_generate_by_status'],
            '_form_order_states_entry_label' => [$this, 'block__form_order_states_entry_label'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 27
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Sell/Order/Invoices/Blocks/generate_by_status.html.twig", 27)->unwrap();
        // line 28
        echo "
";
        // line 29
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["generateByStatusForm"] ?? null), [0 => $this->getTemplateName()], true);
        // line 30
        echo "
";
        // line 31
        $this->displayBlock('invoices_generate_by_status', $context, $blocks);
        // line 60
        echo "
";
        // line 61
        $this->displayBlock('_form_order_states_entry_label', $context, $blocks);
    }

    // line 31
    public function block_invoices_generate_by_status($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "  <div id=\"by-status-block\">
    ";
        // line 33
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["generateByStatusForm"] ?? null), 'form_start', ["method" => "POST", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_order_invoices_generate_by_status"), "attr" => ["id" => "form-generate-invoices-by-status"]]);
        echo "
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">schedule</i>
        ";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("By order status", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-body\">
        <div class=\"form-wrapper\">
          <div class=\"form-group row\">
            ";
        // line 42
        echo twig_call_macro($macros["ps"], "macro_label_with_help", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Order statuses", [], "Admin.Orderscustomers.Feature"), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You can also export orders which have not been charged yet.", [], "Admin.Orderscustomers.Help")], 42, $context, $this->getSourceContext());
        echo "
            <div class=\"col-sm\">
              ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["generateByStatusForm"] ?? null), "order_states", [], "any", false, false, false, 44), 'errors');
        echo "
              ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["generateByStatusForm"] ?? null), "order_states", [], "any", false, false, false, 45), 'widget');
        echo "
            </div>
          </div>
        </div>
        ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["generateByStatusForm"] ?? null), 'rest');
        echo "
      </div>
      <div class=\"card-footer\">
        <div class=\"d-flex justify-content-end\">
          <button class=\"btn btn-primary\" id=\"generate-pdf-by-status-button\">";
        // line 53
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Generate PDF file by status", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "</button>
        </div>
      </div>
    </div>
    ";
        // line 57
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["generateByStatusForm"] ?? null), 'form_end');
        echo "
  </div>
";
    }

    // line 61
    public function block__form_order_states_entry_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 62
        echo "  ";
        // line 63
        echo "  ";
        if (array_key_exists("widget", $context)) {
            // line 64
            echo "    ";
            if (array_key_exists("parent_label_class", $context)) {
                // line 65
                echo "      ";
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 65)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 65), "")) : ("")) . " ") . ($context["parent_label_class"] ?? null)))]);
                // line 66
                echo "    ";
            }
            // line 67
            echo "    <div class=\"md-checkbox\">
      <label";
            // line 68
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["label_attr"] ?? null));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">";
            // line 69
            echo ($context["widget"] ?? null);
            // line 70
            echo "<i class=\"md-checkbox-control\"></i>
        ";
            // line 71
            $context["badgeType"] = (((($context["orders_count"] ?? null) > 0)) ? ("success") : ("danger"));
            // line 72
            echo "        <span class=\"badge badge-";
            echo twig_escape_filter($this->env, ($context["badgeType"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ($context["orders_count"] ?? null), "html", null, true);
            echo "</span>
        <span class=\"status-name\">";
            // line 74
            echo (( !(($context["label"] ?? null) === false)) ? (($context["label"] ?? null)) : (""));
            // line 75
            echo "</span>
      </label>
    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Invoices/Blocks/generate_by_status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 75,  169 => 74,  162 => 72,  160 => 71,  157 => 70,  155 => 69,  141 => 68,  138 => 67,  135 => 66,  132 => 65,  129 => 64,  126 => 63,  124 => 62,  120 => 61,  113 => 57,  106 => 53,  99 => 49,  92 => 45,  88 => 44,  83 => 42,  75 => 37,  68 => 33,  65 => 32,  61 => 31,  57 => 61,  54 => 60,  52 => 31,  49 => 30,  47 => 29,  44 => 28,  42 => 27,  39 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Invoices/Blocks/generate_by_status.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Invoices\\Blocks\\generate_by_status.html.twig");
    }
}
