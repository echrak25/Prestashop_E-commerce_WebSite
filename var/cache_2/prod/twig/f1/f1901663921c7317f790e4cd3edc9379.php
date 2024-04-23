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

/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig */
class __TwigTemplate_83ddc04f4f1f6c641274ce7a02d88ea1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'logo_card' => [$this, 'block_logo_card'],
            'card_title' => [$this, 'block_card_title'],
            'card_content' => [$this, 'block_card_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('logo_card', $context, $blocks);
    }

    public function block_logo_card($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "  <div class=\"card logo-card\">
    <div class=\"card-body\">
      <div class=\"logo-card-title text-left\">
        ";
        // line 30
        $this->displayBlock('card_title', $context, $blocks);
        // line 32
        echo "      </div>
      ";
        // line 33
        $this->displayBlock('card_content', $context, $blocks);
        // line 35
        echo "    </div>
  </div>
";
    }

    // line 30
    public function block_card_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "        ";
    }

    // line 33
    public function block_card_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "      ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  80 => 34,  76 => 33,  72 => 31,  68 => 30,  62 => 35,  60 => 33,  57 => 32,  55 => 30,  50 => 27,  43 => 26,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/logo_card.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\Theme\\Blocks\\Partials\\logo_card.html.twig");
    }
}
