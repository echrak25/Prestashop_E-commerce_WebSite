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

/* @PrestaShop/Admin/Sell/Order/Order/view.html.twig */
class __TwigTemplate_f504eb75cb7b8a21605fd46661006eca extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 31
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        $context["use_regular_h1_structure"] = false;
        // line 27
        ob_start(function () { return ''; });
        // line 28
        echo "  ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/header.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 28)->display($context);
        $context["layoutTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 108
        $context["js_translatable"] = twig_array_merge(["The product was successfully added." => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The product was successfully added.", [], "Admin.Notifications.Success"), "The product was successfully removed." => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The product was successfully removed.", [], "Admin.Notifications.Success"), "[1] products were successfully added." => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("[1] products were successfully added.", [], "Admin.Notifications.Success"), "[1] products were successfully removed." => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("[1] products were successfully removed.", [], "Admin.Notifications.Success")],         // line 113
($context["js_translatable"] ?? null));
        // line 31
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 31);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 33
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "  <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("themes/new-theme/public/orders" . ($context["rtl_suffix"] ?? null)) . ".css")), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\">
";
    }

    // line 37
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "  <div id=\"order-view-page\" data-order-title=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Order", [], "Admin.Global"), "html", null, true);
        echo " #";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 38), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "reference", [], "any", false, false, false, 38), "html", null, true);
        echo "\">
    <div class=\"d-print-none\">
      ";
        // line 40
        $context["displayAdminOrderTopHookContent"] = $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminOrderTop", ["id_order" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 40)]);
        // line 41
        echo "      ";
        if ((($context["displayAdminOrderTopHookContent"] ?? null) != "")) {
            // line 42
            echo "        ";
            echo ($context["displayAdminOrderTopHookContent"] ?? null);
            echo "
      ";
        }
        // line 44
        echo "      <div class=\"order-actions\">
        ";
        // line 45
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/order_actions.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 45)->display($context);
        // line 46
        echo "      </div>
    </div>

    <div class=\"d-none d-print-block mb-4\">
      ";
        // line 50
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/print_order_statistics.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 50)->display($context);
        // line 51
        echo "    </div>

    <div id=\"orderProductsModificationPosition\" class=\"d-none mb-4\"></div>

    <div class=\"d-none d-print-block mb-4\">
      ";
        // line 56
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/print_title.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 56)->display($context);
        // line 57
        echo "    </div>

    <div class=\"product-row row\">
      <div class=\"col-md-4 left-column\">
        ";
        // line 61
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/customer.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 61)->display($context);
        // line 62
        echo "        ";
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminOrderSide", ["id_order" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 62)]);
        echo "
        ";
        // line 63
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/messages.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 63)->display($context);
        // line 64
        echo "        ";
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminOrderSideBottom", ["id_order" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 64)]);
        echo "
      </div>

      <div class=\"col-md-8 d-print-block right-column\">
        <div id=\"orderProductsOriginalPosition\">
          ";
        // line 69
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/products.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 69)->display($context);
        // line 70
        echo "        </div>
        ";
        // line 71
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 71)->display($context);
        // line 72
        echo "        ";
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminOrderMain", ["id_order" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 72)]);
        echo "
        ";
        // line 73
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/payments.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 73)->display($context);
        // line 74
        echo "        ";
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminOrderMainBottom", ["id_order" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 74)]);
        echo "
      </div>
    </div>

    ";
        // line 78
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "sources", [], "any", false, false, false, 78), "sources", [], "any", false, false, false, 78))) {
            // line 79
            echo "      <div class=\"product-row\">
        <div class=\"left-column\">
          ";
            // line 81
            $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/sources.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 81)->display($context);
            // line 82
            echo "        </div>
      </div>
    ";
        }
        // line 85
        echo "
    ";
        // line 86
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "linkedOrders", [], "any", false, false, false, 86), "linkedOrders", [], "any", false, false, false, 86))) {
            // line 87
            echo "      ";
            $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/linked_orders.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 87)->display($context);
            // line 88
            echo "    ";
        }
        // line 89
        echo "
    ";
        // line 90
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminOrder", ["id_order" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 90)]);
        echo "

    ";
        // line 92
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/add_order_discount_modal.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 92)->display($context);
        // line 93
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/update_shipping_modal.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 93)->display($context);
        // line 94
        echo "    ";
        if (( !(null === twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 94)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "customer", [], "any", false, false, false, 94), "id", [], "any", false, false, false, 94) != 0))) {
            // line 95
            echo "      ";
            $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/update_customer_address_modal.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 95)->display($context);
            // line 96
            echo "    ";
        }
        // line 97
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/view_all_messages_modal.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 97)->display($context);
        // line 98
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/view_product_pack_modal.html.twig", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", 98)->display($context);
        // line 99
        echo "  </div>
";
    }

    // line 102
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 103
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/order_view.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 105,  225 => 103,  221 => 102,  216 => 99,  213 => 98,  210 => 97,  207 => 96,  204 => 95,  201 => 94,  198 => 93,  196 => 92,  191 => 90,  188 => 89,  185 => 88,  182 => 87,  180 => 86,  177 => 85,  172 => 82,  170 => 81,  166 => 79,  164 => 78,  156 => 74,  154 => 73,  149 => 72,  147 => 71,  144 => 70,  142 => 69,  133 => 64,  131 => 63,  126 => 62,  124 => 61,  118 => 57,  116 => 56,  109 => 51,  107 => 50,  101 => 46,  99 => 45,  96 => 44,  90 => 42,  87 => 41,  85 => 40,  75 => 38,  71 => 37,  64 => 34,  60 => 33,  55 => 31,  53 => 113,  52 => 108,  48 => 28,  46 => 27,  44 => 26,  37 => 31,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/view.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\view.html.twig");
    }
}
