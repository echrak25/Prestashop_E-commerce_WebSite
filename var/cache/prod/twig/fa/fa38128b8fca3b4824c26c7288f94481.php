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

/* @Product/ProductPage/Forms/form_categories.html.twig */
class __TwigTemplate_afd3fe636501481560d8395fec708110 extends Template
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
        echo "<h2>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Categories", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
  <span class=\"help-box\" 
        data-toggle=\"popover\"
        data-content=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Where should the product be available on your site? The main category is where the product appears by default: this is the category which is seen in the product page's URL. Disabled categories are written in italics.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" >
  </span>
</h2>
<div class=\"categories-tree js-categories-tree\">
  <fieldset class=\"form-group\">
    <div class=\"ui-widget\">
      <div class=\"search search-with-icon\">
        <input type=\"text\" id=\"ps-select-product-category\" class=\"form-control autocomplete search mb-1\" placeholder=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search categories", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\">
      </div>
      <label class=\"form-control-label text-uppercase\">";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Associated categories", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
      ";
        // line 38
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Category/categories.html.twig", ["categories" => ($context["categories"] ?? null)]);
        echo "
      ";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id_category_default", [], "any", false, false, false, 39), 'errors');
        echo "
      ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id_category_default", [], "any", false, false, false, 40), 'widget');
        echo "
      <div class=\"categories-tree-actions js-categories-tree-actions\">
        <span class=\"form-control-label\" id=\"categories-tree-expand\"><i class=\"material-icons\">expand_more</i>";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Expand", [], "Admin.Actions"), "html", null, true);
        echo "</span>
        <span class=\"form-control-label\" id=\"categories-tree-reduce\"><i class=\"material-icons\">expand_less</i>";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Collapse", [], "Admin.Actions"), "html", null, true);
        echo "</span>
      </div>
      ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "categories", [], "any", false, false, false, 45), 'widget', ["defaultCategory" => true, "defaultHidden" => true]);
        echo " ";
        // line 46
        echo "    </div>
  </fieldset>
  ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "categories", [], "any", false, false, false, 48), 'errors');
        echo "
  ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "categories", [], "any", false, false, false, 49), 'widget');
        echo " ";
        // line 50
        echo "</div>
<div id=\"add-categories\">
  <h2>
    ";
        // line 53
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Create a new category", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
    <span class=\"help-box\" 
          data-toggle=\"popover\"
          data-content=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("If you want to quickly create a new category, you can do it here. Don’t forget to then go to the Categories page to fill in the needed details (description, image, etc.).  A new category will not automatically appear in your shop's menu, please read the Help about it.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" >
    </span>
  </h2>
  <div id=\"add-categories-content\" class=\"hide\">
    <div id=\"form_step1_new_category\" data-action=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_category_simple_add_form", ["id_product" => ($context["productId"] ?? null)]), "html", null, true);
        echo "\">
      <fieldset class=\"form-group\">
        <label class=\"form-control-label\">";
        // line 62
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("New category name", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
        ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "new_category", [], "any", false, false, false, 63), 'errors');
        echo "
        ";
        // line 64
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "new_category", [], "any", false, false, false, 64), "name", [], "any", false, false, false, 64), 'widget');
        echo "
      </fieldset>

    </div>

      <fieldset class=\"form-group\">
        <label class=\"form-control-label\">";
        // line 70
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "new_category", [], "any", false, false, false, 70), "id_parent", [], "any", false, false, false, 70), "vars", [], "any", false, false, false, 70), "label", [], "any", false, false, false, 70), "html", null, true);
        echo "</label>
        ";
        // line 71
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "new_category", [], "any", false, false, false, 71), "id_parent", [], "any", false, false, false, 71), 'widget');
        echo "
      </fieldset>

      <fieldset class=\"form-group text-sm-right\">
        <button type=\"reset\" id=\"form_step1_new_category_reset\" class=\"btn btn-outline-secondary btn-sm\">";
        // line 75
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "</button>
        <button type=\"button\" id=\"form_step1_new_category_save\" class=\"btn btn-primary save btn-sm\">";
        // line 76
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Create", [], "Admin.Actions"), "html", null, true);
        echo "</button>
      </fieldset>
    </div>

  <a href=\"#\" class=\"btn btn-outline-secondary open\" id=\"add-category-button\">
    <i class=\"material-icons\">add_circle</i>
    ";
        // line 82
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Create a category", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
  </a>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 82,  154 => 76,  150 => 75,  143 => 71,  139 => 70,  130 => 64,  126 => 63,  122 => 62,  117 => 60,  110 => 56,  104 => 53,  99 => 50,  96 => 49,  92 => 48,  88 => 46,  85 => 45,  80 => 43,  76 => 42,  71 => 40,  67 => 39,  63 => 38,  59 => 37,  54 => 35,  44 => 28,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_categories.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_categories.html.twig");
    }
}
