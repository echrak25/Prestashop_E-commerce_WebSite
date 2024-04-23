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

/* @PrestaShop/Admin/Improve/Design/positions.html.twig */
class __TwigTemplate_dd89dc0d5baf7d03f731a114416c5583 extends Template
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
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/Design/positions.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "    ";
        if (($context["isSingleShopContext"] ?? null)) {
            // line 30
            echo "      <div class=\"row\">
        <div class=\"col-md-3 order-first order-md-last\">
          <div class=\"card\" id=\"modules-position-selection-panel\">
            <h3 class=\"card-header\">
              <i class=\"material-icons\">check</i>
              ";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selection", [], "Admin.Global"), "html", null, true);
            echo "</h3>
            <div class=\"card-body\">
              <p>
                <span id=\"modules-position-single-selection\">";
            // line 38
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("1 module selected", [], "Admin.Design.Feature"), "html", null, true);
            echo "</span>
                <span id=\"modules-position-multiple-selection\">
                  <span id=\"modules-position-selection-count\"></span>
                  ";
            // line 41
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("modules selected", [], "Admin.Design.Feature"), "html", null, true);
            echo "
                </span>
              </p>
              <div>
                <button class=\"btn btn-primary\">
                  <i class=\"icon-remove\"></i>
                  ";
            // line 47
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Unhook the selection", [], "Admin.Design.Feature"), "html", null, true);
            echo "</button>
              </div>
            </div>
          </div>
        </div>
        <div class=\"col-md-9 order-md-first\">
          <div class=\"card card-body\">
            <div class=\"card bg-light p-3\">
              <form id=\"position-filters\">
                <div class=\"row\">
                  <div class=\"col-lg-6 mb-2\">
                    <div class=\"row align-items-center\">
                      <label class=\"form-control-label col-md-4 text-left text-lg-center\">";
            // line 59
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Show", [], "Admin.Actions"), "html", null, true);
            echo "</label>
                      <div class=\"col-md-8\">
                        <select id=\"show-modules\" class=\"filter\">
                          <option value=\"all\">";
            // line 62
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("All modules", [], "Admin.Design.Feature"), "html", null, true);
            echo "&nbsp;</option>
                          ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["modules"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 64
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 64), "html", null, true);
                echo "\" ";
                if ((($context["selectedModule"] ?? null) == twig_get_attribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 64))) {
                    echo " selected=\"selected\" ";
                }
                echo ">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["module"], "displayName", [], "any", false, false, false, 64), "html", null, true);
                echo "</option>
                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "                        </select>
                      </div>
                    </div>
                  </div>

                  <div class=\"col-lg-6 mb-2\">
                    <div class=\"row align-items-center\">
                      <label class=\"form-control-label col-md-4 text-left text-lg-center\">";
            // line 73
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search for a hook", [], "Admin.Design.Feature"), "html", null, true);
            echo "</label>
                      <div class=\"input-group col-md-8\">
                        <div class=\"input-group-prepend\">
                          <div class=\"input-group-text\">
                            <i class=\"material-icons\">search</i>
                          </div>
                        </div>
                        <input type=\"text\" class=\"form-control\" id=\"hook-search\" name=\"hook-search\" placeholder=\"\">
                      </div>
                    </div>
                  </div>
                </div>

                <p class=\"checkbox mt-3 mb-0\">
                  <label class=\"form-control-label\" for=\"hook-position\">
                    <input type=\"checkbox\" id=\"hook-position\"/>
                    <label class=\"selectbox\" for=\"hook-position\">
                      <i class=\"material-icons done\">done</i>
                    </label>
                    ";
            // line 92
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Display non-positionable hooks", [], "Admin.Design.Feature"), "html", null, true);
            echo "
                  </label>
                </p>
              </form>
            </div>

            <form id=\"module-positions-form\" method=\"post\"
                  action=\"";
            // line 99
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_modules_positions_unhook");
            echo "\"
                  data-update-url=\"";
            // line 100
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_improve_design_positions_update");
            echo "\"
                  data-togglestatus-url=\"";
            // line 101
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_modules_positions_toggle_status");
            echo "\">
              ";
            // line 102
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
                // line 103
                echo "                <section class=\"hook-panel";
                if ( !(($__internal_compile_0 = $context["hook"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["position"] ?? null) : null)) {
                    echo " hook-position";
                }
                echo "\" ";
                if ( !(($__internal_compile_1 = $context["hook"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["position"] ?? null) : null)) {
                    echo " style=\"display:none;\" ";
                }
                echo ">
                  <a name=\"";
                // line 104
                echo twig_escape_filter($this->env, (($__internal_compile_2 = $context["hook"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["name"] ?? null) : null), "html", null, true);
                echo "\"></a>
                  <header class=\"hook-panel-header\">
                    <span class=\"hook-status\">
                      <input class=\"switch-input-md hook-switch-action\"
                             data-toggle=\"switch\"
                             data-hook-id=\"";
                // line 109
                echo twig_escape_filter($this->env, (($__internal_compile_3 = $context["hook"]) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["id_hook"] ?? null) : null), "html", null, true);
                echo "\"
                             type=\"checkbox\"
                             value=\"";
                // line 111
                echo twig_escape_filter($this->env, (($__internal_compile_4 = $context["hook"]) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["active"] ?? null) : null), "html", null, true);
                echo "\"
                             ";
                // line 112
                echo (((($__internal_compile_5 = $context["hook"]) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["active"] ?? null) : null)) ? ("checked=\"checked\"") : (""));
                echo "
                      />
                    </span>
                    <span class=\"hook-name\">";
                // line 115
                echo twig_escape_filter($this->env, (($__internal_compile_6 = $context["hook"]) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["name"] ?? null) : null), "html", null, true);
                echo "</span>
                    <label class=\"badge badge-pill float-right\">
                      ";
                // line 117
                if (((($__internal_compile_7 = $context["hook"]) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["modules_count"] ?? null) : null) && ($context["isSingleShopContext"] ?? null))) {
                    // line 118
                    echo "                        <input type=\"checkbox\" class=\"hook-checker\"
                               id=\"Ghook";
                    // line 119
                    echo twig_escape_filter($this->env, (($__internal_compile_8 = $context["hook"]) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["id_hook"] ?? null) : null), "html", null, true);
                    echo "\"
                               data-hook-id=\"";
                    // line 120
                    echo twig_escape_filter($this->env, (($__internal_compile_9 = $context["hook"]) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["id_hook"] ?? null) : null), "html", null, true);
                    echo "\"
                        />
                        <label class=\"selectbox\" for=\"Ghook";
                    // line 122
                    echo twig_escape_filter($this->env, (($__internal_compile_10 = $context["hook"]) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["id_hook"] ?? null) : null), "html", null, true);
                    echo "\">
                          <i class=\"material-icons done\">done</i>
                        </label>
                      ";
                }
                // line 126
                echo "
                      ";
                // line 127
                echo twig_escape_filter($this->env, (($__internal_compile_11 = $context["hook"]) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11["modules_count"] ?? null) : null), "html", null, true);
                echo "
                      ";
                // line 128
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(((((($__internal_compile_12 = $context["hook"]) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["modules_count"] ?? null) : null) > 1)) ? ("Modules") : ("Module")), [], "Admin.Global"), "html", null, true);
                echo "
                    </label>

                    ";
                // line 131
                if (twig_get_attribute($this->env, $this->source, $context["hook"], "description", [], "array", true, true, false, 131)) {
                    // line 132
                    echo "                      <div class=\"hook_description\">";
                    echo twig_escape_filter($this->env, (($__internal_compile_13 = $context["hook"]) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13["description"] ?? null) : null), "html", null, true);
                    echo "</div>
                    ";
                }
                // line 134
                echo "                  </header>

                  ";
                // line 136
                if ((($__internal_compile_14 = $context["hook"]) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["modules_count"] ?? null) : null)) {
                    // line 137
                    echo "                    <section class=\"module-list";
                    if ( !(($__internal_compile_15 = $context["hook"]) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15["active"] ?? null) : null)) {
                        echo "-disabled";
                    }
                    echo "\">
                      <ul class=\"list-unstyled";
                    // line 138
                    if (((($__internal_compile_16 = $context["hook"]) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16["modules_count"] ?? null) : null) > 1)) {
                        echo " sortable";
                    }
                    echo "\">
                        ";
                    // line 139
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_array_filter($this->env, (($__internal_compile_17 = $context["hook"]) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["modules"] ?? null) : null), function ($__module__) use ($context, $macros) { $context["module"] = $__module__; return twig_get_attribute($this->env, $this->source, ($context["modules"] ?? null), (($__internal_compile_18 = $context["module"]) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18["id_module"] ?? null) : null), [], "array", true, true, false, 139); }));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                        // line 140
                        echo "                          ";
                        $context["moduleInstance"] = (($__internal_compile_19 = ($context["modules"] ?? null)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19[(($__internal_compile_20 = $context["module"]) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20["id_module"] ?? null) : null)] ?? null) : null);
                        // line 141
                        echo "                          <li id=\"";
                        echo twig_escape_filter($this->env, (((($__internal_compile_21 = $context["hook"]) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21["id_hook"] ?? null) : null) . "_") . twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "id", [], "any", false, false, false, 141)), "html", null, true);
                        echo "\"
                              class=\"module-position-";
                        // line 142
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "id", [], "any", false, false, false, 142), "html", null, true);
                        echo " module-item";
                        if (((($__internal_compile_22 = $context["hook"]) && is_array($__internal_compile_22) || $__internal_compile_22 instanceof ArrayAccess ? ($__internal_compile_22["modules_count"] ?? null) : null) >= 2)) {
                            echo " draggable";
                        }
                        echo "\">

                            <div class=\"module-column-select\">
                              <i class=\"material-icons drag_indicator\">drag_indicator</i>
                              <input type=\"checkbox\" id=\"selecterbox";
                        // line 146
                        echo twig_escape_filter($this->env, (((($__internal_compile_23 = $context["hook"]) && is_array($__internal_compile_23) || $__internal_compile_23 instanceof ArrayAccess ? ($__internal_compile_23["id_hook"] ?? null) : null) . "_") . twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "id", [], "any", false, false, false, 146)), "html", null, true);
                        echo "\"
                                     data-hook-id=\"";
                        // line 147
                        echo twig_escape_filter($this->env, (($__internal_compile_24 = $context["hook"]) && is_array($__internal_compile_24) || $__internal_compile_24 instanceof ArrayAccess ? ($__internal_compile_24["id_hook"] ?? null) : null), "html", null, true);
                        echo "\"
                                     class=\"modules-position-checkbox hook";
                        // line 148
                        echo twig_escape_filter($this->env, (($__internal_compile_25 = $context["hook"]) && is_array($__internal_compile_25) || $__internal_compile_25 instanceof ArrayAccess ? ($__internal_compile_25["id_hook"] ?? null) : null), "html", null, true);
                        echo "\"
                                     name=\"unhooks[]\"
                                     value=\"";
                        // line 150
                        echo twig_escape_filter($this->env, (((($__internal_compile_26 = $context["hook"]) && is_array($__internal_compile_26) || $__internal_compile_26 instanceof ArrayAccess ? ($__internal_compile_26["id_hook"] ?? null) : null) . "_") . twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "id", [], "any", false, false, false, 150)), "html", null, true);
                        echo "\"
                              />
                              <label class=\"selectbox\" for=\"selecterbox";
                        // line 152
                        echo twig_escape_filter($this->env, (((($__internal_compile_27 = $context["hook"]) && is_array($__internal_compile_27) || $__internal_compile_27 instanceof ArrayAccess ? ($__internal_compile_27["id_hook"] ?? null) : null) . "_") . twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "id", [], "any", false, false, false, 152)), "html", null, true);
                        echo "\">
                                <i class=\"material-icons done\">done</i>
                              </label>
                            </div>

                            <div class=\"module-column-icon\">
                              <img src=\"";
                        // line 158
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("../modules/" . twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "name", [], "any", false, false, false, 158)) . "/logo.png")), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "displayName", [], "any", false, false, false, 158));
                        echo "\"/>
                            </div>

                            <div class=\"module-column-infos\">
                              <span class=\"module-name\">
                                ";
                        // line 163
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "displayName", [], "any", false, false, false, 163));
                        echo "
                                ";
                        // line 164
                        if (twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "version", [], "any", false, false, false, 164)) {
                            // line 165
                            echo "                                  <small class=\"text-muted\">&nbsp;-&nbsp;";
                            echo twig_escape_filter($this->env, twig_sprintf("v%s", twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "version", [], "any", false, false, false, 165)), "html", null, true);
                            echo "</small>
                                ";
                        }
                        // line 167
                        echo "                              </span>
                            </div>

                            <div class=\"module-column-description";
                        // line 170
                        if (( !($context["selectedModule"] ?? null) && ((($__internal_compile_28 = $context["hook"]) && is_array($__internal_compile_28) || $__internal_compile_28 instanceof ArrayAccess ? ($__internal_compile_28["modules_count"] ?? null) : null) > 1))) {
                            echo " hasColumnPosition";
                        }
                        echo " d-none d-md-table-cell\">
                              <span class=\"module-description\">";
                        // line 171
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "description", [], "any", false, false, false, 171));
                        echo "</span>
                            </div>

                            ";
                        // line 174
                        if (( !($context["selectedModule"] ?? null) && ((($__internal_compile_29 = $context["hook"]) && is_array($__internal_compile_29) || $__internal_compile_29 instanceof ArrayAccess ? ($__internal_compile_29["modules_count"] ?? null) : null) > 1))) {
                            // line 175
                            echo "                              <div class=\"btn-toolbar text-center module-column-position";
                            if (((($__internal_compile_30 = $context["hook"]) && is_array($__internal_compile_30) || $__internal_compile_30 instanceof ArrayAccess ? ($__internal_compile_30["modules_count"] ?? null) : null) >= 2)) {
                                echo " dragHandle";
                            }
                            echo "\"
                                   id=\"td_";
                            // line 176
                            echo twig_escape_filter($this->env, (((($__internal_compile_31 = $context["hook"]) && is_array($__internal_compile_31) || $__internal_compile_31 instanceof ArrayAccess ? ($__internal_compile_31["id_hook"] ?? null) : null) . "_") . twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "id", [], "any", false, false, false, 176)), "html", null, true);
                            echo "\">
                                <div class=\"btn-group\">
                                  <span class=\"index-position\">";
                            // line 178
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 178), "html", null, true);
                            echo "</span>
                                </div>
                              </div>
                            ";
                        }
                        // line 182
                        echo "
                            <div class=\"module-column-actions\">
                              <div class=\"btn-group\">
                                ";
                        // line 185
                        $context["linkParams"] = ["id_module" => twig_get_attribute($this->env, $this->source,                         // line 186
($context["moduleInstance"] ?? null), "id", [], "any", false, false, false, 186), "id_hook" => (($__internal_compile_32 =                         // line 187
$context["hook"]) && is_array($__internal_compile_32) || $__internal_compile_32 instanceof ArrayAccess ? ($__internal_compile_32["id_hook"] ?? null) : null), "editGraft" => 1];
                        // line 190
                        echo "                                ";
                        if (($context["selectedModule"] ?? null)) {
                            // line 191
                            echo "                                  ";
                            $context["linkParams"] = twig_array_merge(($context["linkParams"] ?? null), ["show_modules" => ($context["selectedModule"] ?? null)]);
                            // line 192
                            echo "                                ";
                        }
                        // line 193
                        echo "
                                <a class=\"btn tooltip-link\" href=\"";
                        // line 194
                        echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\LayoutExtension']->getAdminLink("AdminModulesPositions", true, ($context["linkParams"] ?? null)), "html", null, true);
                        echo "\"
                                   aria-label=\"";
                        // line 195
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit", [], "Admin.Actions"), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit", [], "Admin.Actions"), "html", null, true);
                        echo "\">
                                  <i class=\"material-icons\">edit</i>
                                </a>

                                <a class=\"btn tooltip-link dropdown-toggle dropdown-toggle-dots dropdown-toggle-split\"
                                   data-toggle=\"dropdown\"
                                   aria-haspopup=\"true\"
                                   aria-expanded=\"false\"
                                   data-reference=\"parent\">
                                </a>
                                <div class=\"dropdown-menu\">
                                  <a class=\"dropdown-item\" href=\"";
                        // line 206
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_modules_positions_unhook", ["moduleId" => twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "id", [], "any", false, false, false, 206), "hookId" => (($__internal_compile_33 = $context["hook"]) && is_array($__internal_compile_33) || $__internal_compile_33 instanceof ArrayAccess ? ($__internal_compile_33["id_hook"] ?? null) : null)]), "html", null, true);
                        echo "\">
                                    <i class=\"material-icons\">indeterminate_check_box</i>
                                    ";
                        // line 208
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Unhook", [], "Admin.Design.Feature"), "html", null, true);
                        echo "
                                  </a>
                                </div>
                              </div>
                            </div>

                            <div class=\"module-column-description d-block d-md-none w-100\">
                              <span class=\"module-description\">";
                        // line 215
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["moduleInstance"] ?? null), "description", [], "any", false, false, false, 215));
                        echo "</span>
                            </div>
                          </li>
                        ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 219
                    echo "                      </ul>
                    </section>
                  ";
                }
                // line 222
                echo "                </section>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 224
            echo "
              <div id=\"unhook-button-position-bottom\">
                <button type=\"submit\" class=\"btn btn-default\" name=\"unhookform\">
                  <i class=\"material-icons\">indeterminate_check_box</i>
                  ";
            // line 228
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Unhook the selection", [], "Admin.Design.Feature"), "html", null, true);
            echo "
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    ";
        } else {
            // line 236
            echo "      <p class=\"alert alert-info alert-can-move\">
        ";
            // line 237
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Note that this page is available in a single shop context only. Switch context to work on it.", [], "Admin.Notifications.Info"), "html", null, true);
            echo "
      </p>
    ";
        }
    }

    // line 242
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 243
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script src=\"";
        // line 244
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/improve_design_positions.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/positions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  529 => 244,  524 => 243,  520 => 242,  512 => 237,  509 => 236,  498 => 228,  492 => 224,  485 => 222,  480 => 219,  462 => 215,  452 => 208,  447 => 206,  431 => 195,  427 => 194,  424 => 193,  421 => 192,  418 => 191,  415 => 190,  413 => 187,  412 => 186,  411 => 185,  406 => 182,  399 => 178,  394 => 176,  387 => 175,  385 => 174,  379 => 171,  373 => 170,  368 => 167,  362 => 165,  360 => 164,  356 => 163,  346 => 158,  337 => 152,  332 => 150,  327 => 148,  323 => 147,  319 => 146,  308 => 142,  303 => 141,  300 => 140,  283 => 139,  277 => 138,  270 => 137,  268 => 136,  264 => 134,  258 => 132,  256 => 131,  250 => 128,  246 => 127,  243 => 126,  236 => 122,  231 => 120,  227 => 119,  224 => 118,  222 => 117,  217 => 115,  211 => 112,  207 => 111,  202 => 109,  194 => 104,  183 => 103,  179 => 102,  175 => 101,  171 => 100,  167 => 99,  157 => 92,  135 => 73,  126 => 66,  111 => 64,  107 => 63,  103 => 62,  97 => 59,  82 => 47,  73 => 41,  67 => 38,  61 => 35,  54 => 30,  51 => 29,  47 => 28,  36 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/positions.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\positions.html.twig");
    }
}
