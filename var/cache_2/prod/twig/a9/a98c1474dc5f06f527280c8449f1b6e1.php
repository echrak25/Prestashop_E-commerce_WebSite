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

/* @Product/ProductPage/Blocks/footer.html.twig */
class __TwigTemplate_1a9f6bc71fb6af869d5bffb873f30f87 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'product_footer' => [$this, 'block_product_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        $this->displayBlock('product_footer', $context, $blocks);
    }

    public function block_product_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "  <div class=\"product-footer justify-content-md-center\">
    <div class=\"col-md-5 col-xl-4\">
      <a
        href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_unit_action", ["action" => "delete", "id" => ($context["productId"] ?? null)]), "html", null, true);
        echo "\"
        class=\"tooltip-link btn btn-lg delete\"
        data-toggle=\"pstooltip\"
        id=\"product_form_delete_btn\"
        title=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Permanently delete this product.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\"
        data-placement=\"left\"
        data-original-title=\"Delete\"
      >
        <i class=\"material-icons\">delete</i>
      </a>
      <a
        href=\"\"
        data-seo-url=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["seo_link"] ?? null), "html", null, true);
        echo "\"
        data-redirect=\"";
        // line 42
        echo twig_escape_filter($this->env, ($context["preview_link"] ?? null), "html", null, true);
        echo "\"
        data-url-deactive=\"";
        // line 43
        echo twig_escape_filter($this->env, ($context["preview_link_deactivate"] ?? null), "html", null, true);
        echo "\"
        target=\"_blank\"
        class=\"btn btn-secondary preview\"
        data-toggle=\"pstooltip\"
        id=\"product_form_preview_btn\"
        title=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("See how your product sheet will look online: ALT+SHIFT+V", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\"
      >
        ";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Preview", [], "Admin.Actions"), "html", null, true);
        echo "
      </a>
      ";
        // line 52
        if (($context["editable"] ?? null)) {
            // line 53
            echo "        <h2 class=\"for-switch online-title\" ";
            if ( !($context["is_active"] ?? null)) {
                echo "style=\"display:none;\"";
            }
            echo " data-toggle=\"pstooltip\"
          title=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enable or disable the product on your shop: ALT+SHIFT+O", [], "Admin.Catalog.Help"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Online", [], "Admin.Global"), "html", null, true);
            echo "</h2>
        <h2 class=\"for-switch offline-title\" ";
            // line 55
            if (($context["is_active"] ?? null)) {
                echo "style=\"display:none;\"";
            }
            echo " data-toggle=\"pstooltip\"
          title=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enable or disable the product on your shop: ALT+SHIFT+O", [], "Admin.Catalog.Help"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Offline", [], "Admin.Global"), "html", null, true);
            echo "</h2>
        <input
          class=\"switch-input-lg\"
          id=\"form_step1_active\"
          data-toggle=\"switch\"
          type=\"checkbox\"
          name=\"form[step1][active]\"
          value=\"1\"
          ";
            // line 64
            echo ((($context["is_active"] ?? null)) ? ("checked=\"checked\"") : (""));
            echo "
        />
      ";
        }
        // line 67
        echo "    </div>
    <div class=\"col-sm-5 col-md-7 col-xl-8 text-right\">
      <input
        id=\"submit\"
        type=\"submit\"
        class=\"btn btn-primary save uppercase ml-3\"
        value=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "\"
        data-toggle=\"pstooltip\"
        title=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save the product and stay on the current page: ALT+SHIFT+S", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\"
      />
      ";
        // line 77
        if (($context["is_shop_context"] ?? null)) {
            // line 78
            echo "        <button
          type=\"button\"
          class=\"btn btn-outline-secondary btn-submit hidden-xs uppercase duplicate ml-3\"
          id=\"product_form_save_duplicate_btn\"
          data-redirect=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_unit_action", ["action" => "duplicate", "id" => ($context["productId"] ?? null)]), "html", null, true);
            echo "\"
          data-toggle=\"pstooltip\"
          title=\"";
            // line 84
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save and duplicate this product, then go to the new product: ALT+SHIFT+D", [], "Admin.Catalog.Help"), "html", null, true);
            echo "\"
        >
          ";
            // line 86
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Duplicate", [], "Admin.Actions");
            echo "
        </button>
      ";
        }
        // line 89
        echo "      <button
        type=\"button\"
        class=\"btn btn-outline-secondary btn-submit hidden-xs uppercase go-catalog ml-3\"
        id=\"product_form_save_go_to_catalog_btn\"
        data-redirect=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_catalog", ["offset" => "last", "limit" => "last"]), "html", null, true);
        echo "\"
        data-toggle=\"pstooltip\"
        title=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save and go back to the catalog: ALT+SHIFT+Q", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\"
      >
        ";
        // line 97
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Go to catalog", [], "Admin.Catalog.Feature");
        echo "
      </button>
      <button
        type=\"button\"
        class=\"btn btn-outline-secondary btn-submit hidden-xs uppercase new-product ml-3\"
        id=\"product_form_save_new_btn\"
        data-redirect=\"";
        // line 103
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_new");
        echo "\"
        data-toggle=\"pstooltip\"
        title=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save and create a new product: ALT+SHIFT+P", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\"
      >
        ";
        // line 107
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add new product", [], "Admin.Catalog.Feature");
        echo "
      </button>
      <div class=\"js-spinner spinner hide btn-primary-reverse onclick mr-1 btn\"></div>
      <div class=\"btn-group hide dropdown\">
        <button
          class=\"btn btn-primary js-btn-save ml-3\"
          type=\"submit\"
        >
          <span>";
        // line 115
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</span>
        </button><button
                   class=\"btn btn-primary dropdown-toggle dropdown-toggle-split\"
                   type=\"button\"
                   id=\"dropdownMenu\"
                   data-toggle=\"dropdown\"
                   aria-expanded=\"false\"
                 >
          <span class=\"sr-only\">Toggle dropdown</span>
        </button>
        <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu\">
          ";
        // line 126
        if (($context["is_shop_context"] ?? null)) {
            // line 127
            echo "            <a
              class=\"dropdown-item duplicate js-btn-save\"
              href=\"";
            // line 129
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_unit_action", ["action" => "duplicate", "id" => ($context["productId"] ?? null)]), "html", null, true);
            echo "\"
            >
              ";
            // line 131
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Duplicate", [], "Admin.Actions");
            echo "
            </a>
          ";
        }
        // line 134
        echo "          <a
            class=\"dropdown-item go-catalog js-btn-save\"
            href=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_catalog", ["offset" => "last", "limit" => "last"]), "html", null, true);
        echo "\"
          >
            ";
        // line 138
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Go to catalog", [], "Admin.Catalog.Feature");
        echo "
          </a>
          <a
            class=\"dropdown-item new-product js-btn-save\"
            href=\"";
        // line 142
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_new");
        echo "\"
          >
            ";
        // line 144
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add new product", [], "Admin.Catalog.Feature");
        echo "
          </a>
        </div>
      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Blocks/footer.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  274 => 144,  269 => 142,  262 => 138,  257 => 136,  253 => 134,  247 => 131,  242 => 129,  238 => 127,  236 => 126,  222 => 115,  211 => 107,  206 => 105,  201 => 103,  192 => 97,  187 => 95,  182 => 93,  176 => 89,  170 => 86,  165 => 84,  160 => 82,  154 => 78,  152 => 77,  147 => 75,  142 => 73,  134 => 67,  128 => 64,  115 => 56,  109 => 55,  103 => 54,  96 => 53,  94 => 52,  89 => 50,  84 => 48,  76 => 43,  72 => 42,  68 => 41,  57 => 33,  50 => 29,  45 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Blocks/footer.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Blocks\\footer.html.twig");
    }
}
