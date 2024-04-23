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

/* @Product/ProductPage/Forms/form_edit_specific_price_modal.html.twig */
class __TwigTemplate_86a3816aec51365138fc932df8e91ade extends Template
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
        echo "<div class=\"modal fade\" id=\"edit-specific-price-modal\" tabindex=\"1\" role=\"dialog\" aria-hidden=\"true\">

  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">

      <div class=\"modal-header\">
        <h5 class=\"modal-title\">
          ";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit a specific price", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
        </h5>
        <button type=\"button\" class=\"close\" id=\"form_modal_close\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>

      <div id=\"edit-specific-price-modal-form\" class=\"modal-body\" data-action=\"";
        // line 39
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_specific_price_update");
        echo "\" data-specific-price-id=\"0\">
      </div>
    </div>
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_edit_specific_price_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 39,  46 => 32,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_edit_specific_price_modal.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_edit_specific_price_modal.html.twig");
    }
}
