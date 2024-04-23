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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig */
class __TwigTemplate_b7ad105d8087fe1c5cb288c555770664 extends Template
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
        ob_start(function () { return ''; });
        // line 27
        echo "  ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "Admin.Global"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "history", [], "any", false, false, false, 27), "statuses", [], "any", false, false, false, 27)), "html", null, true);
        echo ")
";
        $context["statusTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 29
        echo "
";
        // line 30
        ob_start(function () { return ''; });
        // line 31
        echo "  ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Documents", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo " (<span class=\"count\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "documents", [], "any", false, false, false, 31), "documents", [], "any", false, false, false, 31)), "html", null, true);
        echo "</span>)
";
        $context["documentsTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 33
        echo "
";
        // line 34
        ob_start(function () { return ''; });
        // line 35
        echo "  ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Carriers", [], "Admin.Shipping.Feature"), "html", null, true);
        echo " (<span class=\"count\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shipping", [], "any", false, false, false, 35), "carriers", [], "any", false, false, false, 35)), "html", null, true);
        echo "</span>)
";
        $context["carriersTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 37
        echo "
";
        // line 38
        ob_start(function () { return ''; });
        // line 39
        echo "  ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Merchandise returns", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo " (<span data-role=\"count\">";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "returns", [], "any", false, false, false, 39), "orderReturns", [], "any", false, false, false, 39)), "html", null, true);
        echo "</span>)
";
        $context["merchantReturnsTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 41
        echo "
<div class=\"mt-2\">
  <ul class=\"nav nav nav-tabs d-print-none\" role=\"tablist\">
    <li class=\"nav-item\">
      <a class=\"nav-link active show\" id=\"historyTab\" data-toggle=\"tab\" href=\"#historyTabContent\" role=\"tab\" aria-controls=\"historyTabContent\" aria-expanded=\"true\" aria-selected=\"false\">
        <i class=\"material-icons\">history</i>
        ";
        // line 47
        echo twig_escape_filter($this->env, ($context["statusTitle"] ?? null), "html", null, true);
        echo "
      </a>
    </li>
    <li class=\"nav-item\">
      <a class=\"nav-link\" id=\"orderDocumentsTab\" data-toggle=\"tab\" href=\"#orderDocumentsTabContent\" role=\"tab\" aria-controls=\"orderDocumentsTabContent\" aria-expanded=\"true\" aria-selected=\"false\">
        <i class=\"material-icons\">note</i>
        ";
        // line 53
        echo twig_escape_filter($this->env, ($context["documentsTitle"] ?? null), "html", null, true);
        echo "
      </a>
    </li>
    <li class=\"nav-item\">
      <a class=\"nav-link\" id=\"orderShippingTab\" data-toggle=\"tab\" href=\"#orderShippingTabContent\" role=\"tab\" aria-controls=\"orderShippingTabContent\" aria-expanded=\"true\" aria-selected=\"false\">
        <i class=\"material-icons\">local_shipping</i>
        ";
        // line 59
        echo twig_escape_filter($this->env, ($context["carriersTitle"] ?? null), "html", null, true);
        echo "
      </a>
    </li>
    ";
        // line 62
        if (($context["merchandiseReturnEnabled"] ?? null)) {
            // line 63
            echo "      <li class=\"nav-item\">
        <a class=\"nav-link\" id=\"orderReturnsTab\" data-toggle=\"tab\" href=\"#orderReturnsTabContent\" role=\"tab\" aria-controls=\"orderReturnsTabContent\" aria-expanded=\"true\" aria-selected=\"false\">
          <i class=\"material-icons\">replay</i>
          ";
            // line 66
            echo twig_escape_filter($this->env, ($context["merchantReturnsTitle"] ?? null), "html", null, true);
            echo "
        </a>
      </li>
    ";
        }
        // line 70
        echo "  </ul>

  <div class=\"tab-content\">
    <div class=\"tab-pane d-print-block fade show active\" id=\"historyTabContent\" role=\"tabpanel\" aria-labelledby=\"historyTab\">
      ";
        // line 74
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 74, "1922655215")->display($context);
        // line 82
        echo "    </div>
    <div class=\"tab-pane d-print-block fade\" id=\"orderDocumentsTabContent\" role=\"tabpanel\" aria-labelledby=\"orderDocumentsTab\">
      ";
        // line 84
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 84, "392803495")->display($context);
        // line 92
        echo "    </div>
    <div class=\"tab-pane d-print-block fade\" id=\"orderShippingTabContent\" role=\"tabpanel\" aria-labelledby=\"orderShippingTab\">
      ";
        // line 94
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 94, "12063317")->display($context);
        // line 102
        echo "    </div>
    ";
        // line 103
        if (($context["merchandiseReturnEnabled"] ?? null)) {
            // line 104
            echo "      <div class=\"tab-pane d-print-block fade\" id=\"orderReturnsTabContent\" role=\"tabpanel\" aria-labelledby=\"orderReturnsTab\">
        ";
            // line 105
            $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 105, "35947347")->display($context);
            // line 113
            echo "      </div>
    ";
        }
        // line 115
        echo "
    ";
        // line 116
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shipping", [], "any", false, false, false, 116), "recycledPackaging", [], "any", false, false, false, 116)) {
            // line 117
            echo "      <span class=\"badge badge-success\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Recycled packaging", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "</span>
    ";
        }
        // line 119
        echo "
    ";
        // line 120
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "shipping", [], "any", false, false, false, 120), "giftWrapping", [], "any", false, false, false, 120)) {
            // line 121
            echo "      <span class=\"badge badge-success\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gift wrapping", [], "Admin.Orderscustomers.Feature"), "html", null, true);
            echo "</span>
    ";
        }
        // line 123
        echo "  </div>
</div>

";
        // line 126
        $context["displayAdminOrderTabLink"] = $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminOrderTabLink", ["id_order" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 126)]);
        // line 127
        $context["displayAdminOrderTabContent"] = $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminOrderTabContent", ["id_order" => twig_get_attribute($this->env, $this->source, ($context["orderForViewing"] ?? null), "id", [], "any", false, false, false, 127)]);
        // line 128
        if (( !twig_test_empty(($context["displayAdminOrderTabLink"] ?? null)) ||  !twig_test_empty(($context["displayAdminOrderTabContent"] ?? null)))) {
            // line 129
            echo "  <div class=\"mt-2\" id=\"order_hook_tabs\">
    <ul class=\"nav nav nav-tabs\" role=\"tablist\">
      ";
            // line 132
            echo "      ";
            echo ($context["displayAdminOrderTabLink"] ?? null);
            echo "
    </ul>

    <div class=\"tab-content\">
      ";
            // line 137
            echo "      ";
            echo ($context["displayAdminOrderTabContent"] ?? null);
            echo "
    </div>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 137,  206 => 132,  202 => 129,  200 => 128,  198 => 127,  196 => 126,  191 => 123,  185 => 121,  183 => 120,  180 => 119,  174 => 117,  172 => 116,  169 => 115,  165 => 113,  163 => 105,  160 => 104,  158 => 103,  155 => 102,  153 => 94,  149 => 92,  147 => 84,  143 => 82,  141 => 74,  135 => 70,  128 => 66,  123 => 63,  121 => 62,  115 => 59,  106 => 53,  97 => 47,  89 => 41,  81 => 39,  79 => 38,  76 => 37,  68 => 35,  66 => 34,  63 => 33,  55 => 31,  53 => 30,  50 => 29,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\details.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig */
class __TwigTemplate_b7ad105d8087fe1c5cb288c555770664___1922655215 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 74
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 74);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 75
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 76
        echo "          ";
        echo twig_escape_filter($this->env, ($context["statusTitle"] ?? null), "html", null, true);
        echo "
        ";
    }

    // line 78
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 79
        echo "          ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/history.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 79)->display($context);
        // line 80
        echo "        ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  295 => 80,  292 => 79,  288 => 78,  281 => 76,  277 => 75,  266 => 74,  214 => 137,  206 => 132,  202 => 129,  200 => 128,  198 => 127,  196 => 126,  191 => 123,  185 => 121,  183 => 120,  180 => 119,  174 => 117,  172 => 116,  169 => 115,  165 => 113,  163 => 105,  160 => 104,  158 => 103,  155 => 102,  153 => 94,  149 => 92,  147 => 84,  143 => 82,  141 => 74,  135 => 70,  128 => 66,  123 => 63,  121 => 62,  115 => 59,  106 => 53,  97 => 47,  89 => 41,  81 => 39,  79 => 38,  76 => 37,  68 => 35,  66 => 34,  63 => 33,  55 => 31,  53 => 30,  50 => 29,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\details.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig */
class __TwigTemplate_b7ad105d8087fe1c5cb288c555770664___392803495 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 84
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 84);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 85
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 86
        echo "          ";
        echo twig_escape_filter($this->env, ($context["documentsTitle"] ?? null), "html", null, true);
        echo "
        ";
    }

    // line 88
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 89
        echo "          ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/documents.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 89)->display($context);
        // line 90
        echo "        ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  370 => 90,  367 => 89,  363 => 88,  356 => 86,  352 => 85,  341 => 84,  295 => 80,  292 => 79,  288 => 78,  281 => 76,  277 => 75,  266 => 74,  214 => 137,  206 => 132,  202 => 129,  200 => 128,  198 => 127,  196 => 126,  191 => 123,  185 => 121,  183 => 120,  180 => 119,  174 => 117,  172 => 116,  169 => 115,  165 => 113,  163 => 105,  160 => 104,  158 => 103,  155 => 102,  153 => 94,  149 => 92,  147 => 84,  143 => 82,  141 => 74,  135 => 70,  128 => 66,  123 => 63,  121 => 62,  115 => 59,  106 => 53,  97 => 47,  89 => 41,  81 => 39,  79 => 38,  76 => 37,  68 => 35,  66 => 34,  63 => 33,  55 => 31,  53 => 30,  50 => 29,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\details.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig */
class __TwigTemplate_b7ad105d8087fe1c5cb288c555770664___12063317 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 94
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 94);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 95
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 96
        echo "          ";
        echo twig_escape_filter($this->env, ($context["carriersTitle"] ?? null), "html", null, true);
        echo "
        ";
    }

    // line 98
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 99
        echo "          ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/shipping.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 99)->display($context);
        // line 100
        echo "        ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  445 => 100,  442 => 99,  438 => 98,  431 => 96,  427 => 95,  416 => 94,  370 => 90,  367 => 89,  363 => 88,  356 => 86,  352 => 85,  341 => 84,  295 => 80,  292 => 79,  288 => 78,  281 => 76,  277 => 75,  266 => 74,  214 => 137,  206 => 132,  202 => 129,  200 => 128,  198 => 127,  196 => 126,  191 => 123,  185 => 121,  183 => 120,  180 => 119,  174 => 117,  172 => 116,  169 => 115,  165 => 113,  163 => 105,  160 => 104,  158 => 103,  155 => 102,  153 => 94,  149 => 92,  147 => 84,  143 => 82,  141 => 74,  135 => 70,  128 => 66,  123 => 63,  121 => 62,  115 => 59,  106 => 53,  97 => 47,  89 => 41,  81 => 39,  79 => 38,  76 => 37,  68 => 35,  66 => 34,  63 => 33,  55 => 31,  53 => 30,  50 => 29,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\details.html.twig");
    }
}


/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig */
class __TwigTemplate_b7ad105d8087fe1c5cb288c555770664___35947347 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 105
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details_card.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 105);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 106
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 107
        echo "            ";
        echo twig_escape_filter($this->env, ($context["merchantReturnsTitle"] ?? null), "html", null, true);
        echo "
          ";
    }

    // line 109
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 110
        echo "            ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/View/merchandise_returns.html.twig", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", 110)->display($context);
        // line 111
        echo "          ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  520 => 111,  517 => 110,  513 => 109,  506 => 107,  502 => 106,  491 => 105,  445 => 100,  442 => 99,  438 => 98,  431 => 96,  427 => 95,  416 => 94,  370 => 90,  367 => 89,  363 => 88,  356 => 86,  352 => 85,  341 => 84,  295 => 80,  292 => 79,  288 => 78,  281 => 76,  277 => 75,  266 => 74,  214 => 137,  206 => 132,  202 => 129,  200 => 128,  198 => 127,  196 => 126,  191 => 123,  185 => 121,  183 => 120,  180 => 119,  174 => 117,  172 => 116,  169 => 115,  165 => 113,  163 => 105,  160 => 104,  158 => 103,  155 => 102,  153 => 94,  149 => 92,  147 => 84,  143 => 82,  141 => 74,  135 => 70,  128 => 66,  123 => 63,  121 => 62,  115 => 59,  106 => 53,  97 => 47,  89 => 41,  81 => 39,  79 => 38,  76 => 37,  68 => 35,  66 => 34,  63 => 33,  55 => 31,  53 => 30,  50 => 29,  42 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/details.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\details.html.twig");
    }
}
