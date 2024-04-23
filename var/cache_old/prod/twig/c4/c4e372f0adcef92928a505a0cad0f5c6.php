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

/* @PrestaShop/Admin/Sell/Catalog/Categories/Blocks/thumbnail_image.html.twig */
class __TwigTemplate_c77c177fed6facb8cd3841eecad330b1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'category_thumbnail_image' => [$this, 'block_category_thumbnail_image'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('category_thumbnail_image', $context, $blocks);
    }

    public function block_category_thumbnail_image($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "  ";
        if ((array_key_exists("thumbnailImage", $context) &&  !(null === ($context["thumbnailImage"] ?? null)))) {
            // line 28
            echo "    <div>
      <figure class=\"figure\">
        <img src=\"";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["thumbnailImage"] ?? null), "path", [], "any", false, false, false, 30), "html", null, true);
            echo "\" class=\"figure-img img-fluid img-thumbnail\">
        <figcaption class=\"figure-caption\">";
            // line 31
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("File size", [], "Admin.Advparameters.Feature"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["thumbnailImage"] ?? null), "size", [], "any", false, false, false, 31), "html", null, true);
            echo "</figcaption>
      </figure>
    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/thumbnail_image.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  59 => 31,  55 => 30,  51 => 28,  48 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/thumbnail_image.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Categories\\Blocks\\thumbnail_image.html.twig");
    }
}
