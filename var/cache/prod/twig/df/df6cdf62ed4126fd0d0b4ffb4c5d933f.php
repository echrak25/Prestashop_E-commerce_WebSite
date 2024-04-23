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

/* @PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/view_product_pack_modal.html.twig */
class __TwigTemplate_3ec45128adb284e74bc9b730245dbed7 extends Template
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
<div class=\"modal fade\" id=\"product-pack-modal\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog modal-lg\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"card-header\">
        <div class=\"row\">
          <div class=\"col\">
            <h3 class=\"card-header-title\">
              ";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Products in pack", [], "Admin.Global"), "html", null, true);
        echo "
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
        <table class=\"table\" id=\"product-pack-modal-table\">
          <thead>
          <tr>
            <th colspan=\"3\">";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Product", [], "Admin.Global"), "html", null, true);
        echo "</th>
            <th>";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Quantity", [], "Admin.Global"), "html", null, true);
        echo "</th>
            <th>";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Available", [], "Admin.Global"), "html", null, true);
        echo "</th>
          </tr>
          </thead>
          <tbody>
          <tr class=\"d-none\" id=\"template-pack-table-row\">
            <td>";
        // line 56
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Package item", [], "Admin.Global"), "html", null, true);
        echo "</td>
            <td class=\"cell-product-img\">
              <img alt=\"\"/>
            </td>
            <td class=\"cell-product-name\">
              <a href=\"\">
                <p class=\"mb-0 product-name\"></p>
                <p class=\"mb-0 product-reference\">
                  ";
        // line 64
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reference number:", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
                </p>
                <p class=\"mb-0 product-supplier-reference\">
                  ";
        // line 67
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Supplier reference:", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
                </p>
              </a>
            </td>
            <td class=\"cell-product-quantity\">
              <span class=\"badge badge-secondary rounded-circle\"></span>
            </td>
            <td class=\"cell-product-available-quantity\"></td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/view_product_pack_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 67,  93 => 64,  82 => 56,  74 => 51,  70 => 50,  66 => 49,  47 => 33,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/Blocks/View/Modal/view_product_pack_modal.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\Blocks\\View\\Modal\\view_product_pack_modal.html.twig");
    }
}
