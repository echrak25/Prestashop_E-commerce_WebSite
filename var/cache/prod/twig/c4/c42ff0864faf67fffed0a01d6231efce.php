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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/view_all_messages_modal.html.twig */
class __TwigTemplate_f5e82986af1b93fbe4a1560bf0e16a8f extends Template
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
<div class=\"modal fade\" id=\"view_all_messages_modal\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"card-header\">
        <div class=\"row\">
          <div class=\"col\">
            <h3 class=\"card-header-title\">
              ";
        // line 33
        if (( !(null === twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 33)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 33), "id", [], "any", false, false, false, 33) != 0))) {
            // line 34
            echo "                ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Message history with %name%", ["%name%" => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 34), "firstName", [], "any", false, false, false, 34) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 34), "lastName", [], "any", false, false, false, 34))], "Admin.Global"), "html", null, true);
            echo "
              ";
        } else {
            // line 36
            echo "                ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Message history", [], "Admin.Global"), "html", null, true);
            echo "
              ";
        }
        // line 38
        echo "              (";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "messages", [], "any", false, false, false, 38), "messages", [], "any", false, false, false, 38)), "html", null, true);
        echo ")
            </h3>
          </div>
          <div class=\"col\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <i class=\"material-icons\">
                close
              </i>
            </button>
          </div>
        </div>
      </div>
      <div class=\"modal-body\">
        <ul class=\"list-unstyled p-4 messages-block\" id=\"all-messages-list\">
          ";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "messages", [], "any", false, false, false, 52), "messages", [], "any", false, false, false, 52)));
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
            // line 53
            echo "            ";
            $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/msg_list_item.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/view_all_messages_modal.html.twig", 53)->display($context);
            // line 54
            echo "          ";
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
        // line 55
        echo "        </ul>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/view_all_messages_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 55,  99 => 54,  96 => 53,  79 => 52,  61 => 38,  55 => 36,  49 => 34,  47 => 33,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/view_all_messages_modal.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\Modal\\view_all_messages_modal.html.twig");
    }
}
