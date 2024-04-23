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

/* @PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig */
class __TwigTemplate_3e7cf8bc057c9370be856c2217d41d89 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'manufacturers_listing' => [$this, 'block_manufacturers_listing'],
            'manufacturers_address_listing' => [$this, 'block_manufacturers_address_listing'],
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
        // line 28
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig", 28)->unwrap();
        // line 30
        $context["layoutHeaderToolbarBtn"] = ["add_manufacturer" => ["href" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_manufacturers_create"), "desc" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add new brand", [], "Admin.Catalog.Feature"), "icon" => "add_circle_outline"], "add_manufacturer_address" => ["href" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_manufacturer_addresses_create"), "desc" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add new brand address", [], "Admin.Catalog.Feature"), "icon" => "add_circle_outline"]];
        // line 26
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 44
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 45
        echo "  ";
        $this->displayBlock('manufacturers_listing', $context, $blocks);
        // line 49
        echo "
  ";
        // line 50
        $this->displayBlock('manufacturers_address_listing', $context, $blocks);
    }

    // line 45
    public function block_manufacturers_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "    ";
        echo twig_call_macro($macros["ps"], "macro_infotip", [($context["settingsTipMessage"] ?? null), true], 46, $context, $this->getSourceContext());
        echo "
    ";
        // line 47
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig", 47)->display(twig_array_merge($context, ["grid" => ($context["manufacturerGrid"] ?? null)]));
        // line 48
        echo "  ";
    }

    // line 50
    public function block_manufacturers_address_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 51
        echo "    ";
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig", 51)->display(twig_array_merge($context, ["grid" => ($context["manufacturerAddressGrid"] ?? null)]));
        // line 52
        echo "  ";
    }

    // line 55
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 56
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/manufacturer.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 59,  104 => 58,  98 => 56,  94 => 55,  90 => 52,  87 => 51,  83 => 50,  79 => 48,  77 => 47,  72 => 46,  68 => 45,  64 => 50,  61 => 49,  58 => 45,  54 => 44,  49 => 26,  47 => 30,  45 => 28,  38 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Catalog\\Manufacturer\\index.html.twig");
    }
}
