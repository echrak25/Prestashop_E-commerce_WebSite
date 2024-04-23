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

/* @Product/ProductPage/Forms/form_seo.html.twig */
class __TwigTemplate_0d003cb8d68ec7ba448b5a105f148d66 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'product_catalog_tool_serp' => [$this, 'block_product_catalog_tool_serp'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
<h2>";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search Engine Optimization", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
<p class=\"subtitle\">";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Improve your ranking and how your product page will appear in search engines results.", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>

";
        // line 29
        $this->displayBlock('product_catalog_tool_serp', $context, $blocks);
        // line 34
        echo "
<div class=\"row\">
  <div class=\"col-md-9\">
    <fieldset class=\"form-group\">
      ";
        // line 38
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "meta_title", [], "any", false, false, false, 38), 'label');
        echo "
      ";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "meta_title", [], "any", false, false, false, 39), 'errors');
        echo "
      ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "meta_title", [], "any", false, false, false, 40), 'widget');
        echo "
    </fieldset>
  </div>
</div>

<div class=\"row\">
  <div class=\"col-md-9\">
    <fieldset class=\"form-group\">
      ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "meta_description", [], "any", false, false, false, 48), 'label');
        echo "
      ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "meta_description", [], "any", false, false, false, 49), 'errors');
        echo "
      ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "meta_description", [], "any", false, false, false, 50), 'widget');
        echo "
    </fieldset>
  </div>
</div>
<fieldset class=\"form-group\">
  <label class=\"form-control-label\">
    ";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "link_rewrite", [], "any", false, false, false, 56), "vars", [], "any", false, false, false, 56), "label", [], "any", false, false, false, 56), "html", null, true);
        echo "
    <span class=\"help-box\" 
          data-toggle=\"popover\"
          data-content=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This is the human-readable URL, as generated from the product's name. You can change it if you want.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" >
    </span>
  </label>
  ";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "link_rewrite", [], "any", false, false, false, 62), 'errors');
        echo "
  <div class=\"row\">
    <div class=\"col-md-7\">
      ";
        // line 65
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "link_rewrite", [], "any", false, false, false, 65), 'widget');
        echo "
    </div>
    <div class=\"col-md-2\">
      <button type=\"button\" class=\"btn btn-block btn-outline-secondary\" id=\"seo-url-regenerate\">";
        // line 68
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reset URL", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</button>
    </div>
  </div>
</fieldset>

<div class=\"row\">
  <div class=\"col-md-9\">
    <div class=\"alert alert-info\" role=\"alert\">
      <p class=\"alert-text\">
        ";
        // line 77
        if (($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_REWRITING_SETTINGS") == 0)) {
            // line 78
            echo "          <strong>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Friendly URLs are currently disabled.", [], "Admin.Catalog.Notification"), "html", null, true);
            echo "</strong>
          ";
            // line 79
            echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("To enable it, go to [1]SEO and URLs[/1]", [], "Admin.Catalog.Notification"), ["[1]" => (("<a href=\"" . $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminMeta")) . "#meta_fieldset_general\">"), "[/1]" => "</a>"]);
            echo "
        ";
        } else {
            // line 81
            echo "          <strong>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Friendly URLs are currently enabled.", [], "Admin.Catalog.Notification"), "html", null, true);
            echo "</strong>
          ";
            // line 82
            echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("To disable it, go to [1]SEO and URLs[/1]", [], "Admin.Catalog.Notification"), ["[1]" => (("<a href=\"" . $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminMeta")) . "#meta_fieldset_general\">"), "[/1]" => "</a>"]);
            echo "
        ";
        }
        // line 84
        echo "      </p>
      <p class=\"alert-text\">
        ";
        // line 86
        if (($this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getConfiguration("PS_FORCE_FRIENDLY_PRODUCT") == 1)) {
            // line 87
            echo "          <strong>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("The \"Force update of friendly URL\" option is currently enabled.", [], "Admin.Catalog.Notification"), "html", null, true);
            echo "</strong>
          ";
            // line 89
            echo "          ";
            echo twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("To disable it, go to [1]Product Settings[/1]", [], "Admin.Catalog.Notification"), ["[1]" => (("<a href=\"" . $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminPPreferences")) . "#configuration_fieldset_products\">"), "[/1]" => "</a>"]);
            echo "
        ";
        }
        // line 91
        echo "      </p>
    </div>
  </div>
</div>

<h2 class=\"mt-4\">
  ";
        // line 97
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Redirection page", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
  <span class=\"help-box\" 
        data-toggle=\"popover\"
        data-content=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("When your product is disabled, choose to which page you’d like to redirect the customers visiting its page by typing the product or category name.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" >
  </span>
</h2>

<div class=\"row\">

  <div class=\"col-md-4\">
    <fieldset class=\"form-group\">
      <label class=\"form-control-label\">";
        // line 108
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "redirect_type", [], "any", false, false, false, 108), "vars", [], "any", false, false, false, 108), "label", [], "any", false, false, false, 108), "html", null, true);
        echo "</label>
      ";
        // line 109
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "redirect_type", [], "any", false, false, false, 109), 'errors');
        echo "
      ";
        // line 110
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "redirect_type", [], "any", false, false, false, 110), 'widget');
        echo "
    </fieldset>
  </div>

  <div class=\"col-md-5\" id=\"id-product-redirected\">
    <fieldset class=\"form-group\">
      <label class=\"form-control-label\">";
        // line 116
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "id_type_redirected", [], "any", false, false, false, 116), "vars", [], "any", false, false, false, 116), "label", [], "any", false, false, false, 116), "html", null, true);
        echo "</label>
      ";
        // line 117
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "id_type_redirected", [], "any", false, false, false, 117), 'errors');
        echo "
      ";
        // line 118
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["seoForm"] ?? null), "id_type_redirected", [], "any", false, false, false, 118), 'widget');
        echo "
    </fieldset>

  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-9\">
    <div class=\"alert alert-info\" role=\"alert\">
      <p class=\"alert-text\">
        ";
        // line 127
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("No redirection (404) = Do not redirect anywhere and display a 404 \"Not Found\" page.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "<br>
        ";
        // line 128
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("No redirection (410) = Do not redirect anywhere and display a 410 \"Gone\" page.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "<br>
        ";
        // line 129
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Permanent redirection (301) = Permanently display another product or category instead.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "<br>
        ";
        // line 130
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Temporary redirection (302) = Temporarily display another product or category instead.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "
      </p>
    </div>
  </div>
</div>

";
        // line 136
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["seoForm"] ?? null), 'rest');
        echo "

";
        // line 138
        echo $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminProductsSeoStepBottom", ["id_product" => ($context["productId"] ?? null)]);
        echo "
";
    }

    // line 29
    public function block_product_catalog_tool_serp($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo "  <p>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Here is a preview of your search engine result, play with it!", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>
  ";
        // line 32
        echo "  <div id=\"serp-app\"></div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_seo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  272 => 32,  267 => 30,  263 => 29,  257 => 138,  252 => 136,  243 => 130,  239 => 129,  235 => 128,  231 => 127,  219 => 118,  215 => 117,  211 => 116,  202 => 110,  198 => 109,  194 => 108,  183 => 100,  177 => 97,  169 => 91,  163 => 89,  158 => 87,  156 => 86,  152 => 84,  147 => 82,  142 => 81,  137 => 79,  132 => 78,  130 => 77,  118 => 68,  112 => 65,  106 => 62,  100 => 59,  94 => 56,  85 => 50,  81 => 49,  77 => 48,  66 => 40,  62 => 39,  58 => 38,  52 => 34,  50 => 29,  45 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_seo.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_seo.html.twig");
    }
}
