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

/* @PrestaShop/Admin/Sell/Address/index.html.twig */
class __TwigTemplate_e6671e8db86abc30b88fc76b19ba9364 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'addresses_listing' => [$this, 'block_addresses_listing'],
            'address_required_fields_form' => [$this, 'block_address_required_fields_form'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Sell/Address/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "  ";
        $this->displayBlock('addresses_listing', $context, $blocks);
        // line 32
        echo "
  ";
        // line 33
        $this->displayBlock('address_required_fields_form', $context, $blocks);
    }

    // line 29
    public function block_addresses_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Address/index.html.twig", 30)->display(twig_array_merge($context, ["grid" => ($context["addressGrid"] ?? null)]));
        // line 31
        echo "  ";
    }

    // line 33
    public function block_address_required_fields_form($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "    <p>
      <button class=\"btn btn-primary\" type=\"button\" data-toggle=\"collapse\" data-target=\"#addressRequiredFieldsContainer\" aria-expanded=\"false\" aria-controls=\"addressRequiredFieldsContainer\">
        <i class=\"material-icons\">add_circle</i>
        ";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Set required fields for this section", [], "Admin.Orderscustomers.Feature"), "html", null, true);
        echo "
      </button>
    </p>

    ";
        // line 41
        $this->loadTemplate("@PrestaShop/Admin/Sell/Address/Blocks/required_fields.html.twig", "@PrestaShop/Admin/Sell/Address/index.html.twig", 41)->display($context);
        // line 42
        echo "  ";
    }

    // line 45
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/address.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Address/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 49,  106 => 48,  100 => 46,  96 => 45,  92 => 42,  90 => 41,  83 => 37,  78 => 34,  74 => 33,  70 => 31,  67 => 30,  63 => 29,  59 => 33,  56 => 32,  53 => 29,  49 => 28,  38 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Address/index.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Address\\index.html.twig");
    }
}
