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

/* @PrestaShop/Admin/Sell/Catalog/Categories/Blocks/menu_thumbnail_images.html.twig */
class __TwigTemplate_db3f3387e9de6388139fc85a4cfce322 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'category_menu_thumbnails' => [$this, 'block_category_menu_thumbnails'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('category_menu_thumbnails', $context, $blocks);
    }

    public function block_category_menu_thumbnails($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "  ";
        if ((array_key_exists("menuThumbnailImages", $context) &&  !twig_test_empty(($context["menuThumbnailImages"] ?? null)))) {
            // line 28
            echo "    <div>
      ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["menuThumbnailImages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["menuThumbnail"]) {
                // line 30
                echo "        <figure class=\"figure\">
          <img src=\"";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menuThumbnail"], "path", [], "any", false, false, false, 31), "html", null, true);
                echo "\" class=\"figure-img img-fluid img-thumbnail\">
          <figcaption class=\"figure-caption\">
            <button class=\"btn btn-outline-danger btn-sm js-form-submit-btn\"
                    data-form-submit-url=\"";
                // line 34
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_delete_menu_thumbnail", ["categoryId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["editableCategory"] ?? null), "id", [], "any", false, false, false, 34), "value", [], "any", false, false, false, 34), "menuThumbnailId" => twig_get_attribute($this->env, $this->source, $context["menuThumbnail"], "id", [], "any", false, false, false, 34)]), "html", null, true);
                echo "\"
                    data-form-csrf-token=\"";
                // line 35
                echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("delete-menu-thumbnail"), "html", null, true);
                echo "\"
            >
              <i class=\"material-icons\">
                delete_forever
              </i>
              ";
                // line 40
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete", [], "Admin.Actions"), "html", null, true);
                echo "
            </button>
          </figcaption>
        </figure>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menuThumbnail'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/menu_thumbnail_images.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  90 => 45,  79 => 40,  71 => 35,  67 => 34,  61 => 31,  58 => 30,  54 => 29,  51 => 28,  48 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/menu_thumbnail_images.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Categories\\Blocks\\menu_thumbnail_images.html.twig");
    }
}
