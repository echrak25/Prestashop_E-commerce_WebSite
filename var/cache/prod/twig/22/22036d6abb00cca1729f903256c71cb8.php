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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/internal_note.html.twig */
class __TwigTemplate_2427996a507dd47f494c2a5c1667c7ec extends Template
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
        echo "<div class=\"mt-2 info-block\">
  <div class=\"row\">
    ";
        // line 27
        $context["isNoteOpen"] =  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "note", [], "any", false, false, false, 27));
        // line 28
        echo "
    <div class=\"col-md-6\">
      <h3 class=\"mb-0";
        // line 30
        echo (( !($context["isNoteOpen"] ?? null)) ? (" d-print-none") : (""));
        echo "\">
        ";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Order note", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
      </h3>
    </div>

    <div class=\"col-md-6 text-right d-print-none\">
      <a href=\"#\"
         class=\"float-right tooltip-link js-order-notes-toggle-btn";
        // line 37
        if (($context["isNoteOpen"] ?? null)) {
            echo " is-opened";
        }
        echo "\"
      >
        <i class=\"material-icons\">";
        // line 39
        if (($context["isNoteOpen"] ?? null)) {
            echo "remove";
        } else {
            echo "add";
        }
        echo "</i>
      </a>
    </div>

    <div class=\"col-md-12 mt-3 js-order-notes-block";
        // line 43
        if ( !($context["isNoteOpen"] ?? null)) {
            echo " d-none";
        }
        echo "\">
      ";
        // line 44
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["internalNoteForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_set_internal_note", ["orderId" => twig_get_attribute($this->env, $this->source,         // line 45
($context["orderForViewing"] ?? null), "getId", [], "method", false, false, false, 45)])]);
        // line 46
        echo "
      ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["internalNoteForm"] ?? null), "note", [], "any", false, false, false, 47), 'widget');
        echo "
      <div class=\"d-none\">
        ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["internalNoteForm"] ?? null), 'rest');
        echo "
      </div>

      <div class=\"mt-2 text-right\">
        <button type=\"submit\"
                class=\"btn btn-primary btn-sm js-order-notes-btn\"
                ";
        // line 55
        if (twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "note", [], "any", false, false, false, 55))) {
            echo "disabled";
        }
        // line 56
        echo "        >
          ";
        // line 57
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
        </button>
      </div>
      ";
        // line 60
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["internalNoteForm"] ?? null), 'form_end');
        echo "
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/internal_note.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 60,  111 => 57,  108 => 56,  104 => 55,  95 => 49,  90 => 47,  87 => 46,  85 => 45,  84 => 44,  78 => 43,  67 => 39,  60 => 37,  51 => 31,  47 => 30,  43 => 28,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/internal_note.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\internal_note.html.twig");
    }
}
