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

/* @PrestaShop/Admin/Sell/Catalog/Categories/Blocks/breadcrumb.html.twig */
class __TwigTemplate_be5a499a3464a7b1ae215e0e649e58ff extends Template
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
<div class=\"card\">
  <div class=\"card-body\">
    <nav>
      <ol class=\"breadcrumb\">
        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["currentCategoryView"] ?? null), "breadcrumb_tree", [], "any", false, false, false, 30));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 31
            echo "          ";
            $context["isRootCategory"] = (twig_get_attribute($this->env, $this->source, $context["category"], "id_parent", [], "any", false, false, false, 31) == 0);
            // line 32
            echo "          <li class=\"breadcrumb-item\">
            ";
            // line 33
            if ((($context["isRootCategory"] ?? null) && ($context["isSingleShopContext"] ?? null))) {
                // line 34
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["category"], "id_category", [], "any", false, false, false, 34) == twig_get_attribute($this->env, $this->source, ($context["currentCategoryView"] ?? null), "id", [], "any", false, false, false, 34))) {
                    // line 35
                    echo "                <span>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 35), "html", null, true);
                    echo "</span>
              ";
                } else {
                    // line 37
                    echo "                <a href=\"";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_index");
                    echo "\">
                  ";
                    // line 38
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 38), "html", null, true);
                    echo "
                </a>
              ";
                }
                // line 41
                echo "            ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["category"], "id_category", [], "any", false, false, false, 41) == twig_get_attribute($this->env, $this->source, ($context["currentCategoryView"] ?? null), "id", [], "any", false, false, false, 41))) {
                // line 42
                echo "              <span>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 42), "html", null, true);
                echo "</span>
                ";
                // line 43
                if ( !($context["isRootCategory"] ?? null)) {
                    // line 44
                    echo "                  <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_edit", ["categoryId" => twig_get_attribute($this->env, $this->source, $context["category"], "id_category", [], "any", false, false, false, 44)]), "html", null, true);
                    echo "\">
                    <i style=\"font-size: 16px;\" class=\"material-icons\">edit</i>
                    ";
                    // line 46
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit", [], "Admin.Actions"), "html", null, true);
                    echo "
                  </a>
                ";
                }
                // line 49
                echo "            ";
            } else {
                // line 50
                echo "              <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categories_index", ["categoryId" => twig_get_attribute($this->env, $this->source, $context["category"], "id_category", [], "any", false, false, false, 50)]), "html", null, true);
                echo "\">
                ";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 51), "html", null, true);
                echo "
              </a>
            ";
            }
            // line 54
            echo "          </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "      </ol>
    </nav>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/breadcrumb.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 56,  112 => 54,  106 => 51,  101 => 50,  98 => 49,  92 => 46,  86 => 44,  84 => 43,  79 => 42,  76 => 41,  70 => 38,  65 => 37,  59 => 35,  56 => 34,  54 => 33,  51 => 32,  48 => 31,  44 => 30,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Categories/Blocks/breadcrumb.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Categories\\Blocks\\breadcrumb.html.twig");
    }
}
