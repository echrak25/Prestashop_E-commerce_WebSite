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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/history.html.twig */
class __TwigTemplate_3fbc9d0438cf481c3f8029884d05843c extends Template
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
<table class=\"table\" data-role=\"history-grid-table\">
  <tbody>
    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "history", [], "any", false, false, false, 28), "statuses", [], "any", false, false, false, 28));
        foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
            // line 29
            echo "    <tr>
      <td data-role=\"status-column\">
        <span class=\"badge rounded badge-print-light\"
              style=\"background-color: ";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["status"], "color", [], "any", false, false, false, 32), "html", null, true);
            echo "; color: ";
            echo (($this->env->getFunction('is_color_bright')->getCallable()(twig_get_attribute($this->env, $this->source, $context["status"], "color", [], "any", false, false, false, 32))) ? ("black") : ("white"));
            echo ";\"
        >
          ";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["status"], "name", [], "any", false, false, false, 34), "html", null, true);
            echo "
        </span>
      </td>
      <td class=\"text-right\" data-role=\"employee-column\">
        ";
            // line 38
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["status"], "employeeLastName", [], "any", false, false, false, 38))) {
                // line 39
                echo "          ";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["status"], "employeeFirstName", [], "any", false, false, false, 39) . " ") . twig_get_attribute($this->env, $this->source, $context["status"], "employeeLastName", [], "any", false, false, false, 39)), "html", null, true);
                echo "
        ";
            }
            // line 41
            echo "      </td>
      <td class=\"text-right\" data-role=\"date-column\">
        ";
            // line 43
            echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\LocalizationExtension']->dateFormatFull(twig_get_attribute($this->env, $this->source, $context["status"], "createdAt", [], "any", false, false, false, 43)), "html", null, true);
            echo "
      </td>
      <td class=\"text-right\">
        ";
            // line 46
            if (twig_get_attribute($this->env, $this->source, $context["status"], "withEmail", [], "any", false, false, false, 46)) {
                // line 47
                echo "          <form method=\"post\" 
                action=\"";
                // line 48
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_resend_email", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 48), "orderHistoryId" => twig_get_attribute($this->env, $this->source, $context["status"], "orderHistoryId", [], "any", false, false, false, 48), "orderStatusId" => twig_get_attribute($this->env, $this->source, $context["status"], "orderStatusId", [], "any", false, false, false, 48)]), "html", null, true);
                echo "\">
            <button class=\"btn btn-link pt-0 pb-0\">
              ";
                // line 50
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Resend email", [], "Admin.Orderscustomers.Feature"), "html", null, true);
                echo "
            </button>
          </form>
        ";
            }
            // line 54
            echo "      </td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "  </tbody>
</table>

<div class=\"d-flex justify-content-end\">
  ";
        // line 61
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["updateOrderStatusForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_update_status", ["orderId" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 61)]), "attr" => ["class" => "card-details-form"]]);
        echo "
    <div class=\"form-group card-details-actions\">
      ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["updateOrderStatusForm"] ?? null), "new_order_status_id", [], "any", false, false, false, 63), 'widget');
        echo "

      <button class=\"btn btn-primary update-status mt-3 mt-md-0 ml-0 ml-md-3\">
        ";
        // line 66
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Update status", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
      </button>
    </div>

    <div class=\"d-none\">
      ";
        // line 71
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["updateOrderStatusForm"] ?? null), 'rest');
        echo "
    </div>
  ";
        // line 73
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["updateOrderStatusForm"] ?? null), 'form_end');
        echo "
</div>

";
        // line 76
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/internal_note.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/history.html.twig", 76)->display($context);
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/history.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 76,  138 => 73,  133 => 71,  125 => 66,  119 => 63,  114 => 61,  108 => 57,  100 => 54,  93 => 50,  88 => 48,  85 => 47,  83 => 46,  77 => 43,  73 => 41,  67 => 39,  65 => 38,  58 => 34,  51 => 32,  46 => 29,  42 => 28,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/history.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\history.html.twig");
    }
}
