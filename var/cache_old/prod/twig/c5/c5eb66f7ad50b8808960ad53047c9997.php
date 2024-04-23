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

/* @PrestaShop/Admin/Sell/Catalog/Categories/Blocks/cover_image.html.twig */
class __TwigTemplate_da9c0c9e84aa695525ae16051f346246 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'category_cover_image' => [$this, 'block_category_cover_image'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('category_cover_image', $context, $blocks);
    }

    public function block_category_cover_image($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "  ";
        if ((array_key_exists("coverImage", $context) &&  !(null === ($context["coverImage"] ?? null)))) {
            // line 28
            echo "    <div>
      <form action=\"\">
        <figure class=\"figure\">
          <img src=\"";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coverImage"] ?? null), "path", [], "any", false, false, false, 31), "html", null, true);
            echo "\" class=\"figure-img img-fluid img-thumbnail\">
          <figcaption class=\"figure-caption\">
            <p>";
            // line 33
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("File size", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coverImage"] ?? null), "size", [], "any", false, false, false, 33), "html", null, true);
            echo "</p>
            <button class=\"btn btn-outline-danger btn-sm js-form-submit-btn\"
                    data-form-submit-url=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_delete_cover_image", ["categoryId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 35), "get", [0 => "categoryId"], "method", false, false, false, 35)]), "html", null, true);
            echo "\"
                    data-form-csrf-token=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("delete-cover-image"), "html", null, true);
            echo "\"
                    type=\"button\"
            >
              <i class=\"material-icons\">
                delete_forever
              </i>
              ";
            // line 42
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete", [], "Admin.Actions"), "html", null, true);
            echo "
            </button>
          </figcaption>
        </figure>
      </form>
    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/cover_image.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  81 => 42,  72 => 36,  68 => 35,  61 => 33,  56 => 31,  51 => 28,  48 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/cover_image.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Categories\\Blocks\\cover_image.html.twig");
    }
}
