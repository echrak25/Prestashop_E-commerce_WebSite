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

/* @Modules/blockwishlist/views/templates/admin/statistics.html.twig */
class __TwigTemplate_d87afafe58edb806610cf8a3db8b71e9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 19
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@Modules/blockwishlist/views/templates/admin/statistics.html.twig", 19);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 21
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 22
        echo "  ";
        if ((($context["shopId"] ?? null) === null)) {
            // line 23
            echo "    <div class=\"alert medium-alert alert-warning\" role=\"alert\">
      <p class=\"alert-text\">
        ";
            // line 25
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You need to choose a specific shop to display the top 10 most added products", [], "Modules.Blockwishlist.Admin"), "html", null, true);
            echo "
      </p>
    </div>
  ";
        }
        // line 29
        echo "
  <div class=\"row justify-content-center wishlist-stats\">
    <div class=\"col-xl-10\">
      <div class=\"card\">
        <h3 class=\"card-header\">
          <i class=\"material-icons\">star</i> ";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Top 10 most added products", [], "Modules.Blockwishlist.Admin"), "html", null, true);
        echo "
        </h3>

        <div class=\"card-body\">
          <div class=\"card-text\">
            <div class=\"row wishlist-stats-topbar\">
              <div class=\"btn-group\">
                <button class=\"btn btn-default active\" data-tab=\"1\">Day</button>
                <button class=\"btn btn-default\" data-tab=\"2\">Month</button>
                <button class=\"btn btn-default\" data-tab=\"3\">Year</button>
                <button class=\"btn btn-default\" data-tab=\"4\">All time</button>
              </div>

              <button class=\"btn btn-default refresh js-refresh\">
                <i class=\"material-icons\">history</i> ";
        // line 48
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Refresh", [], "Modules.Blockwishlist.Admin"), "html", null, true);
        echo "
              </button>
            </div>

            <div class=\"wishlist-tab active\" data-tab=\"1\">
              ";
        // line 53
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid.html.twig", "@Modules/blockwishlist/views/templates/admin/statistics.html.twig", 53)->display(twig_array_merge($context, ["grid" => ($context["allTimeStatisticsGrid"] ?? null)]));
        // line 54
        echo "            </div>

            <div class=\"wishlist-tab\" data-tab=\"2\">
              ";
        // line 57
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid.html.twig", "@Modules/blockwishlist/views/templates/admin/statistics.html.twig", 57)->display(twig_array_merge($context, ["grid" => ($context["currentYearStatisticsGrid"] ?? null)]));
        // line 58
        echo "            </div>

            <div class=\"wishlist-tab\" data-tab=\"3\">
              ";
        // line 61
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid.html.twig", "@Modules/blockwishlist/views/templates/admin/statistics.html.twig", 61)->display(twig_array_merge($context, ["grid" => ($context["currentMonthStatisticsGrid"] ?? null)]));
        // line 62
        echo "            </div>

            <div class=\"wishlist-tab\" data-tab=\"4\">
              ";
        // line 65
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid.html.twig", "@Modules/blockwishlist/views/templates/admin/statistics.html.twig", 65)->display(twig_array_merge($context, ["grid" => ($context["currentDayStatisticsGrid"] ?? null)]));
        // line 66
        echo "            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
";
    }

    // line 74
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 75
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script>
    var blockwishlistModule = {
      'resetCacheUrl': '";
        // line 79
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("blockwishlist_statistics_reset"), "js"), "html", null, true);
        echo "',
    };
  </script>
  <script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("../modules/blockwishlist/public/backoffice.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@Modules/blockwishlist/views/templates/admin/statistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 82,  142 => 79,  134 => 75,  130 => 74,  120 => 66,  118 => 65,  113 => 62,  111 => 61,  106 => 58,  104 => 57,  99 => 54,  97 => 53,  89 => 48,  72 => 34,  65 => 29,  58 => 25,  54 => 23,  51 => 22,  47 => 21,  36 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/blockwishlist/views/templates/admin/statistics.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\blockwishlist\\views\\templates\\admin\\statistics.html.twig");
    }
}
