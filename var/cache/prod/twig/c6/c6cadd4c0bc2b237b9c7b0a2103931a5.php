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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/messages.html.twig */
class __TwigTemplate_a6fb798388d7ad67f100c85a66cb75f4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'order_message_form_rest' => [$this, 'block_order_message_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/messages.html.twig", 26)->unwrap();
        // line 27
        echo "
";
        // line 28
        $context["messagesToShow"] = 4;
        // line 29
        echo "
<div class=\"card mt-2\" data-role=\"message-card\" >
  <div class=\"card-header\">
    <div class=\"row\">
      <div class=\"col-md-6\">
        <h3 class=\"card-header-title\">
          ";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Messages", [], "Admin.Global"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "messages", [], "any", false, false, false, 35), "total", [], "any", false, false, false, 35), "html", null, true);
        echo ")
        </h3>
      </div>
      ";
        // line 38
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "messages", [], "any", false, false, false, 38), "total", [], "any", false, false, false, 38) > ($context["messagesToShow"] ?? null))) {
            // line 39
            echo "        <div class=\"col-md-6 text-right\">
          <a
            href=\"#\"
            data-toggle=\"modal\"
            data-target=\"#view_all_messages_modal\"
            class=\"d-print-none js-open-all-messages-btn\"
          >
            ";
            // line 46
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("View full conversation", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "
          </a>
        </div>
      ";
        }
        // line 50
        echo "    </div>
  </div>

  ";
        // line 53
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "messages", [], "any", false, false, false, 53), "messages", [], "any", false, false, false, 53))) {
            // line 54
            echo "    <ul class=\"list-unstyled messages-block\">
      ";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "messages", [], "any", false, false, false, 55), "messages", [], "any", false, false, false, 55), 0, ($context["messagesToShow"] ?? null))));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 56
                echo "        ";
                $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/msg_list_item.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/messages.html.twig", 56)->display($context);
                // line 57
                echo "      ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "    </ul>
  ";
        }
        // line 60
        echo "
  <div class=\"card-body d-print-none\">
    ";
        // line 62
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["orderMessageForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_send_message", ["orderId" => twig_get_attribute($this->env, $this->source,         // line 63
($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 63)])]);
        // line 64
        echo "

    ";
        // line 66
        echo twig_call_macro($macros["ps"], "macro_form_group_row", [twig_get_attribute($this->env, $this->source, ($context["orderMessageForm"] ?? null), "order_message", [], "any", false, false, false, 66), [], ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Choose your order message", [], "Admin.Orderscustomers.Feature"), "label_on_top" => true, "class" => "mb-0"]], 66, $context, $this->getSourceContext());
        // line 70
        echo "

    <div class=\"js-order-messages-container d-none\">
      <div class=\"js-message-change-warning\">";
        // line 73
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Do you want to overwrite your existing message?", [], "Admin.Orderscustomers.Notification"), "html", null, true);
        echo "</div>
      ";
        // line 74
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["orderMessageForm"] ?? null), "vars", [], "any", false, false, false, 74)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["messages"] ?? null) : null));
        foreach ($context['_seq'] as $context["id"] => $context["message"]) {
            // line 75
            echo "        <div data-id=\"";
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "\">
          ";
            // line 76
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "    </div>

    <div class=\"form-group row configure\">
      <div class=\"col-sm\">
        <a href=\"";
        // line 83
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_order_messages_index");
        echo "\" class=\"configure-link\">
          ";
        // line 84
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configure predefined messages", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
          <i class=\"material-icons rtl-flip\">arrow_right_alt</i>
        </a>
      </div>
    </div>

    ";
        // line 90
        echo twig_call_macro($macros["ps"], "macro_form_group_row", [twig_get_attribute($this->env, $this->source, ($context["orderMessageForm"] ?? null), "is_displayed_to_customer", [], "any", false, false, false, 90), ["material_design" => true]], 90, $context, $this->getSourceContext());
        echo "

    ";
        // line 92
        echo twig_call_macro($macros["ps"], "macro_form_group_row", [twig_get_attribute($this->env, $this->source, ($context["orderMessageForm"] ?? null), "message", [], "any", false, false, false, 92), ["attr" => ["cols" => 30, "rows" => 3]], ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Message", [], "Admin.Global"), "label_on_top" => true, "class" => "js-text-with-length-counter"]], 92, $context, $this->getSourceContext());
        // line 96
        echo "

    ";
        // line 98
        $this->displayBlock('order_message_form_rest', $context, $blocks);
        // line 101
        echo "
    <div class=\"text-right\">
      <button type=\"submit\" class=\"btn btn-primary\">";
        // line 103
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Send message", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "</button>
    </div>

    ";
        // line 106
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["orderMessageForm"] ?? null), 'form_end');
        echo "
  </div>
</div>

";
    }

    // line 98
    public function block_order_message_form_rest($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 99
        echo "      ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["orderMessageForm"] ?? null), 'rest');
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/messages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 99,  221 => 98,  212 => 106,  206 => 103,  202 => 101,  200 => 98,  196 => 96,  194 => 92,  189 => 90,  180 => 84,  176 => 83,  170 => 79,  161 => 76,  156 => 75,  152 => 74,  148 => 73,  143 => 70,  141 => 66,  137 => 64,  135 => 63,  134 => 62,  130 => 60,  126 => 58,  112 => 57,  109 => 56,  92 => 55,  89 => 54,  87 => 53,  82 => 50,  75 => 46,  66 => 39,  64 => 38,  56 => 35,  48 => 29,  46 => 28,  43 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/messages.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\messages.html.twig");
    }
}
