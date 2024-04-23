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

/* @Product/ProductPage/Blocks/header.html.twig */
class __TwigTemplate_43f579be564ac89a3e2f0d32c7538f93 extends Template
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
        echo "<div class=\"product-header col-md-12\">
  <div class=\"row justify-content-md-center\">
    ";
        // line 27
        if (($context["is_multishop_context"] ?? null)) {
            // line 28
            echo "      <div class=\"col-xxl-10\">
        <div class=\"alert alert-warning\" role=\"alert\">
          <p class=\"alert-text\">";
            // line 30
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You are in a multistore context: any modification will impact all your shops, or each shop of the active group.", [], "Admin.Catalog.Notification"), "html", null, true);
            echo "</p>
        </div>
      </div>
    ";
        }
        // line 34
        echo "
    <div class=\"col-xxl-10\">
      <div class=\"row\">
        <div class=\"col-md-7 big-input ";
        // line 37
        echo ((($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_FORCE_FRIENDLY_PRODUCT") == 1)) ? ("friendly-url-force-update") : (""));
        echo "\" id=\"form_step1_names\">
          ";
        // line 38
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formName"] ?? null), 'widget');
        echo "
        </div>
        <div class=\"col-sm-7 col-md-2 form_step1_type_product\">
          ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formType"] ?? null), 'widget');
        echo "
          <span class=\"help-box pull-xs-right\" data-toggle=\"popover\" 
          data-content=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Is the product a pack (a combination of at least two existing products), a virtual product (downloadable file, service, etc.), or simply a standard, physical product?", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\"></span>
        </div>
        <div class=\"col-sm-2 col-md-1 form_switch_language\">
          <div class=\"";
        // line 46
        echo (((twig_length_filter($this->env, ($context["languages"] ?? null)) == 1)) ? ("hide") : (""));
        echo "\">
            <select id=\"form_switch_language\" class=\"custom-select\">
              ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 49
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "iso_code", [], "any", false, false, false, 49), "html", null, true);
            echo "\" ";
            if ((($context["default_language_iso"] ?? null) == twig_get_attribute($this->env, $this->source, $context["language"], "iso_code", [], "any", false, false, false, 49))) {
                echo " 
                        selected=\"selected\" ";
            }
            // line 50
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "iso_code", [], "any", false, false, false, 50), "html", null, true);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "            </select>
          </div>
        </div>
        <div class=\"toolbar col-sm-3 col-md-2 text-md-right\">
          <a class=\"toolbar-button btn-sales\" href=\"";
        // line 56
        echo twig_escape_filter($this->env, ($context["stats_link"] ?? null), "html", null, true);
        echo "\" target=\"_blank\" title=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sales", [], "Admin.Global"), "html", null, true);
        echo "\" id=\"product_form_go_to_sales\">
            <i class=\"material-icons\">assessment</i>
            <span class=\"title\">";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sales", [], "Admin.Global"), "html", null, true);
        echo "</span>
          </a>

          <a class=\"toolbar-button btn-quicknav btn-sidebar\" href=\"#\" title=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Quick navigation", [], "Admin.Global"), "html", null, true);
        echo "\" 
             data-toggle=\"sidebar\" data-target=\"#right-sidebar\" 
             data-url=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_list", ["limit" => "last", "offset" => "last", "view" => "quicknav"]), "html", null, true);
        echo "\" id=\"product_form_open_quicknav\">
            <i class=\"material-icons\">list</i>
            <span class=\"title\">";
        // line 65
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Product list", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</span>
          </a>

          <a class=\"toolbar-button btn-help btn-sidebar\" href=\"#\" title=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Help", [], "Admin.Global"), "html", null, true);
        echo "\" 
             data-toggle=\"sidebar\" data-target=\"#right-sidebar\" 
             data-url=\"";
        // line 70
        echo twig_escape_filter($this->env, ($context["help_link"] ?? null), "html", null, true);
        echo "\" id=\"product_form_open_help\">
            <i class=\"material-icons\">help</i>
            <span class=\"title\">";
        // line 72
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Help", [], "Admin.Global"), "html", null, true);
        echo "</span>
          </a>
        </div>
      </div>
      ";
        // line 76
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formName"] ?? null), 'errors');
        echo "
      ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formType"] ?? null), 'errors');
        echo "
    </div>
  </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Blocks/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 77,  158 => 76,  151 => 72,  146 => 70,  141 => 68,  135 => 65,  130 => 63,  125 => 61,  119 => 58,  112 => 56,  106 => 52,  97 => 50,  89 => 49,  85 => 48,  80 => 46,  74 => 43,  69 => 41,  63 => 38,  59 => 37,  54 => 34,  47 => 30,  43 => 28,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Blocks/header.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Blocks\\header.html.twig");
    }
}
