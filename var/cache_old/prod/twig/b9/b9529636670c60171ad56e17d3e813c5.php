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

/* @Modules/ps_mbo/views/templates/hook/twig/module_manager_additional_description.html.twig */
class __TwigTemplate_564643d6f9c3ba0951e219c867cda7f0 extends Template
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
        // line 19
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 19), "id", [], "any", false, false, false, 19) != "0")) {
            // line 20
            echo "  <span class=\"mbo-module-read-more-grid\">
          <a class=\"mbo-module-read-more-list-btn url\"
             id=\"see-more-";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 22), "name", [], "any", false, false, false, 22), "html", null, true);
            echo "\"
             href=\"javascript:void(0)\"
          >";
            // line 24
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Read More", [], "Modules.Mbo.Modulescatalog"), "html", null, true);
            echo "</a>
  </span>
  <script type=\"application/javascript\">
    \$('a#see-more-";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 27), "name", [], "any", false, false, false, 27), "html", null, true);
            echo "').on('click', function (event) {
      \$.get('";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mbo_module_see_more", ["moduleId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 28), "id", [], "any", false, false, false, 28)]), "html", null, true);
            echo "', (data) => {
        \$(\"#module-read-more\").html(data);
      }).then(() => {
        if (!window.renderModal && window.mboCdc) {
          window.renderModal = window.mboCdc.renderModal;
        }
        if (window.renderModal && window.shopContext) {
          window.renderModal(window.shopContext, null, ";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 35), "id", [], "any", false, false, false, 35), "html", null, true);
            echo ")
        }
      });
    })
  </script>
  <span id=\"module-read-more\"></span>
";
        }
    }

    public function getTemplateName()
    {
        return "@Modules/ps_mbo/views/templates/hook/twig/module_manager_additional_description.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 35,  58 => 28,  54 => 27,  48 => 24,  43 => 22,  39 => 20,  37 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_mbo/views/templates/hook/twig/module_manager_additional_description.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ps_mbo\\views\\templates\\hook\\twig\\module_manager_additional_description.html.twig");
    }
}
