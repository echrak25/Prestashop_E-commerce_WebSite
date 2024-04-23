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

/* @PrestaShop/Admin/macros.html.twig */
class __TwigTemplate_c1912a5885dbcf96898c77851b77fcd2 extends Template
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
        // line 28
        echo "
";
        // line 32
        echo "
";
        // line 38
        echo "
";
        // line 50
        echo "
";
        // line 58
        echo "
";
        // line 71
        echo "
";
        // line 88
        echo "
";
        // line 96
        echo "
";
        // line 126
        echo "
";
        // line 241
        echo "
 ";
        // line 288
        echo "
";
        // line 307
        echo "
";
    }

    // line 25
    public function macro_form_label_tooltip($__name__ = null, $__tooltip__ = null, $__placement__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "tooltip" => $__tooltip__,
            "placement" => $__placement__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 26
            echo "    ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["name"] ?? null), 'label', ["label_attr" => ["tooltip" => ($context["tooltip"] ?? null), "tooltip_placement" => ((array_key_exists("placement", $context)) ? (_twig_default_filter(($context["placement"] ?? null), "top")) : ("top"))]]);
            echo "
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 29
    public function macro_check($__variable__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "variable" => $__variable__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 30
            echo "  ";
            (((array_key_exists("variable", $context) && (twig_length_filter($this->env, ($context["variable"] ?? null)) > 0))) ? (print (twig_escape_filter($this->env, ($context["variable"] ?? null), "html", null, true))) : (print (false)));
            echo "
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 33
    public function macro_tooltip($__text__ = null, $__icon__ = null, $__position__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "text" => $__text__,
            "icon" => $__icon__,
            "position" => $__position__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 34
            echo "  <span data-toggle=\"pstooltip\" class=\"label-tooltip\" data-original-title=\"";
            echo twig_escape_filter($this->env, ($context["text"] ?? null), "html", null, true);
            echo "\" data-html=\"true\" data-placement=\"";
            echo twig_escape_filter($this->env, ((array_key_exists("position", $context)) ? (_twig_default_filter(($context["position"] ?? null), "top")) : ("top")), "html", null, true);
            echo "\">
    <i class=\"material-icons\">";
            // line 35
            echo twig_escape_filter($this->env, ($context["icon"] ?? null), "html", null, true);
            echo "</i>
  </span>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 39
    public function macro_infotip($__text__ = null, $__use_raw__ = false, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "text" => $__text__,
            "use_raw" => $__use_raw__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 40
            echo "<div class=\"alert alert-info\" role=\"alert\">
  <p class=\"alert-text\">
    ";
            // line 42
            if (($context["use_raw"] ?? null)) {
                // line 43
                echo "      ";
                echo ($context["text"] ?? null);
                echo "
    ";
            } else {
                // line 45
                echo "      ";
                echo twig_escape_filter($this->env, ($context["text"] ?? null), "html", null, true);
                echo "
    ";
            }
            // line 47
            echo "  </p>
</div>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 51
    public function macro_warningtip($__text__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "text" => $__text__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 52
            echo "<div class=\"alert alert-warning\" role=\"alert\">
  <p class=\"alert-text\">
    ";
            // line 54
            echo twig_escape_filter($this->env, ($context["text"] ?? null), "html", null, true);
            echo "
  </p>
</div>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 59
    public function macro_label_with_help($__label__ = null, $__help__ = null, $__class__ = "", $__for__ = "", $__isRequired__ = false, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "label" => $__label__,
            "help" => $__help__,
            "class" => $__class__,
            "for" => $__for__,
            "isRequired" => $__isRequired__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 60
            echo "<label";
            if ( !twig_test_empty(($context["for"] ?? null))) {
                echo " for=\"";
                echo twig_escape_filter($this->env, ($context["for"] ?? null), "html", null, true);
                echo "\"";
            }
            echo " class=\"form-control-label ";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\">
  ";
            // line 61
            if (($context["isRequired"] ?? null)) {
                // line 62
                echo "    <span class=\"text-danger\">*</span>
  ";
            }
            // line 64
            echo "
  ";
            // line 65
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "
  ";
            // line 66
            echo twig_include($this->env, $context, "@Common/HelpBox/helpbox.html.twig", ["content" => ($context["help"] ?? null)]);
            echo "
</label>

<p class=\"sr-only\">";
            // line 69
            echo twig_escape_filter($this->env, ($context["help"] ?? null), "html", null, true);
            echo "</p>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 73
    public function macro_sortable_column_header($__title__ = null, $__sortColumnName__ = null, $__orderBy__ = null, $__sortOrder__ = null, $__prefix__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "title" => $__title__,
            "sortColumnName" => $__sortColumnName__,
            "orderBy" => $__orderBy__,
            "sortOrder" => $__sortOrder__,
            "prefix" => $__prefix__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 74
            echo "  ";
            list($context["sortOrder"], $context["orderBy"], $context["prefix"]) =             [((array_key_exists("sortOrder", $context)) ? (_twig_default_filter(($context["sortOrder"] ?? null), "")) : ("")), ((array_key_exists("orderBy", $context)) ? (_twig_default_filter(($context["orderBy"] ?? null))) : ("")), ((array_key_exists("prefix", $context)) ? (_twig_default_filter(($context["prefix"] ?? null), "")) : (""))];
            // line 75
            echo "  <div
      class=\"ps-sortable-column\"
      data-sort-col-name=\"";
            // line 77
            echo twig_escape_filter($this->env, ($context["sortColumnName"] ?? null), "html", null, true);
            echo "\"
      data-sort-prefix=\"";
            // line 78
            echo twig_escape_filter($this->env, ($context["prefix"] ?? null), "html", null, true);
            echo "\"
      ";
            // line 79
            if ((($context["orderBy"] ?? null) == ($context["sortColumnName"] ?? null))) {
                // line 80
                echo "        data-sort-is-current=\"true\"
        data-sort-direction=\"";
                // line 81
                echo (((($context["sortOrder"] ?? null) == "desc")) ? ("desc") : ("asc"));
                echo "\"
      ";
            }
            // line 83
            echo "    >
      <span role=\"columnheader\">";
            // line 84
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "</span>
      <span role=\"button\" class=\"ps-sort\" aria-label=\"";
            // line 85
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sort by", [], "Admin.Actions"), "html", null, true);
            echo "\"></span>
  </div>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 90
    public function macro_import_file_sample($__label__ = null, $__filename__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "label" => $__label__,
            "filename" => $__filename__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 91
            echo "    <a id=\"download-sample-";
            echo twig_escape_filter($this->env, ($context["filename"] ?? null), "html", null, true);
            echo "-file-link\" class=\"list-group-item list-group-item-action\"
       href=\"";
            // line 92
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_import_sample_download", ["sampleName" => ($context["filename"] ?? null)]), "html", null, true);
            echo "\">
        ";
            // line 93
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["label"] ?? null), [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "
    </a>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 106
    public function macro_form_widget_with_error($__form__ = null, $__vars__ = null, $__extraVars__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "vars" => $__vars__,
            "extraVars" => $__extraVars__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 107
            echo "  ";
            $macros["self"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/macros.html.twig", 107)->unwrap();
            // line 108
            echo "
  ";
            // line 109
            $context["vars"] = ((array_key_exists("vars", $context)) ? (_twig_default_filter(($context["vars"] ?? null), [])) : ([]));
            // line 110
            echo "  ";
            $context["extraVars"] = ((array_key_exists("extraVars", $context)) ? (_twig_default_filter(($context["extraVars"] ?? null), [])) : ([]));
            // line 111
            echo "  ";
            $context["attr"] = ((twig_get_attribute($this->env, $this->source, ($context["vars"] ?? null), "attr", [], "any", true, true, false, 111)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["vars"] ?? null), "attr", [], "any", false, false, false, 111), [])) : ([]));
            // line 112
            echo "  ";
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => ((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 112)) ? (twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 112)) : (""))]);
            // line 113
            echo "  ";
            $context["vars"] = twig_array_merge(($context["vars"] ?? null), ["attr" => ($context["attr"] ?? null)]);
            // line 114
            echo "
  ";
            // line 115
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget', ($context["vars"] ?? null));
            echo "

  ";
            // line 117
            if ((twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "help", [], "any", true, true, false, 117) && twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "help", [], "any", false, false, false, 117))) {
                // line 118
                echo "      <small class=\"form-text\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "help", [], "any", false, false, false, 118), "html", null, true);
                echo "</small>
    ";
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 119
($context["form"] ?? null), "vars", [], "any", false, true, false, 119), "help", [], "any", true, true, false, 119) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 119), "help", [], "any", false, false, false, 119))) {
                // line 120
                echo "      <small class=\"form-text\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 120), "help", [], "any", false, false, false, 120), "html", null, true);
                echo "</small>
  ";
            }
            // line 122
            echo "
  ";
            // line 123
            echo twig_call_macro($macros["self"], "macro_form_error_with_popover", [($context["form"] ?? null)], 123, $context, $this->getSourceContext());
            echo "

";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 136
    public function macro_form_error_with_popover($__form__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 137
            echo "  ";
            $context["errors"] = [];
            // line 138
            echo "
  ";
            // line 139
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 139), "valid", [], "any", true, true, false, 139) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 139), "valid", [], "any", false, false, false, 139))) {
                // line 140
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 140), "errors", [], "any", false, false, false, 140));
                foreach ($context['_seq'] as $context["_key"] => $context["parentError"]) {
                    // line 141
                    echo "      ";
                    $context["errors"] = twig_array_merge(($context["errors"] ?? null), [0 => twig_get_attribute($this->env, $this->source, $context["parentError"], "message", [], "any", false, false, false, 141)]);
                    // line 142
                    echo "    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parentError'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 143
                echo "
    ";
                // line 145
                echo "  ";
            }
            // line 146
            echo "
  ";
            // line 147
            if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
                // line 148
                echo "    ";
                // line 149
                echo "    ";
                $context["errorPopover"] = null;
                // line 150
                echo "
    ";
                // line 151
                if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 1)) {
                    // line 152
                    echo "      ";
                    $context["popoverContainer"] = ("popover-error-container-" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 152), "id", [], "any", false, false, false, 152));
                    // line 153
                    echo "      <div class=\"";
                    echo twig_escape_filter($this->env, ($context["popoverContainer"] ?? null), "html", null, true);
                    echo "\"></div>


      ";
                    // line 156
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 156), "errors_by_locale", [], "any", true, true, false, 156)) {
                        // line 157
                        echo "          ";
                        $context["popoverErrors"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 157), "errors_by_locale", [], "any", false, false, false, 157);
                        // line 158
                        echo "
          ";
                        // line 160
                        echo "          ";
                        $context["translatableErrors"] = [];
                        // line 161
                        echo "          ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["popoverErrors"] ?? null));
                        foreach ($context['_seq'] as $context["_key"] => $context["translatableError"]) {
                            // line 162
                            echo "            ";
                            $context["translatableErrors"] = twig_array_merge(($context["translatableErrors"] ?? null), [0 => twig_get_attribute($this->env, $this->source, $context["translatableError"], "error_message", [], "any", false, false, false, 162)]);
                            // line 163
                            echo "          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translatableError'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 164
                        echo "
          ";
                        // line 166
                        echo "          ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
                        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                            // line 167
                            echo "            ";
                            if (!twig_in_filter($context["error"], ($context["translatableErrors"] ?? null))) {
                                // line 168
                                echo "              ";
                                $context["popoverErrors"] = twig_array_merge(($context["popoverErrors"] ?? null), [0 => $context["error"]]);
                                // line 169
                                echo "            ";
                            }
                            // line 170
                            echo "          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 171
                        echo "
        ";
                    } else {
                        // line 173
                        echo "          ";
                        $context["popoverErrors"] = ($context["errors"] ?? null);
                        // line 174
                        echo "      ";
                    }
                    // line 175
                    echo "
      ";
                    // line 176
                    $context["errorMessages"] = [];
                    // line 177
                    echo "      ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["popoverErrors"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["popoverError"]) {
                        // line 178
                        echo "        ";
                        $context["errorMessage"] = $context["popoverError"];
                        // line 179
                        echo "
        ";
                        // line 180
                        if ((twig_get_attribute($this->env, $this->source, $context["popoverError"], "error_message", [], "any", true, true, false, 180) && twig_get_attribute($this->env, $this->source, $context["popoverError"], "locale_name", [], "any", true, true, false, 180))) {
                            // line 181
                            echo "          ";
                            $context["errorMessage"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%error_message% - Language: %language_name%", ["%error_message%" => twig_get_attribute($this->env, $this->source, $context["popoverError"], "error_message", [], "any", false, false, false, 181), "%language_name%" => twig_get_attribute($this->env, $this->source, $context["popoverError"], "locale_name", [], "any", false, false, false, 181)], "Admin.Notifications.Error");
                            // line 182
                            echo "        ";
                        }
                        // line 183
                        echo "
        ";
                        // line 184
                        $context["errorMessages"] = twig_array_merge(($context["errorMessages"] ?? null), [0 => ($context["errorMessage"] ?? null)]);
                        // line 185
                        echo "      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['popoverError'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 186
                    echo "
      ";
                    // line 187
                    ob_start(function () { return ''; });
                    // line 188
                    echo "        <div class=\"popover-error-list\">
          <ul>
            ";
                    // line 190
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["errorMessages"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["popoverError"]) {
                        // line 191
                        echo "              <li class=\"text-danger\">
                ";
                        // line 192
                        echo twig_escape_filter($this->env, $context["popoverError"], "html", null, true);
                        echo "
              </li>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['popoverError'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 195
                    echo "          </ul>
        </div>
      ";
                    $context["popoverErrorContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                    // line 198
                    echo "
      <template class=\"js-popover-error-content\" data-id=\"";
                    // line 199
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 199), "id", [], "any", false, false, false, 199), "html", null, true);
                    echo "\">
        ";
                    // line 200
                    echo twig_escape_filter($this->env, ($context["popoverErrorContent"] ?? null), "html", null, true);
                    echo "
      </template>

      ";
                    // line 203
                    ob_start(function () { return ''; });
                    // line 204
                    echo "        <span
          data-toggle=\"form-popover-error\"
          data-id=\"";
                    // line 206
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 206), "id", [], "any", false, false, false, 206), "html", null, true);
                    echo "\"
          data-placement=\"bottom\"
          data-template='<div class=\"popover form-popover-error\" role=\"tooltip\"><h3 class=\"popover-header\"></h3><div class=\"popover-body\"></div></div>'
          data-trigger=\"hover\"
          data-container=\".";
                    // line 210
                    echo twig_escape_filter($this->env, ($context["popoverContainer"] ?? null), "html", null, true);
                    echo "\"
        >
          <i class=\"material-icons form-error-icon\">error_outline</i> <u>";
                    // line 212
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%count% errors", ["%count%" => twig_length_filter($this->env, ($context["popoverErrors"] ?? null))], "Admin.Global"), "html", null, true);
                    echo "</u>
        </span>
      ";
                    $context["errorPopover"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                    // line 215
                    echo "
    ";
                } elseif (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 216
($context["form"] ?? null), "vars", [], "any", false, true, false, 216), "error_by_locale", [], "any", true, true, false, 216)) {
                    // line 217
                    echo "      ";
                    $context["errorByLocale"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%error_message% - Language: %language_name%", ["%error_message%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 217), "error_by_locale", [], "any", false, false, false, 217), "error_message", [], "any", false, false, false, 217), "%language_name%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 217), "error_by_locale", [], "any", false, false, false, 217), "locale_name", [], "any", false, false, false, 217)], "Admin.Notifications.Error");
                    // line 218
                    echo "      ";
                    $context["errors"] = [0 => ($context["errorByLocale"] ?? null)];
                    // line 219
                    echo "    ";
                }
                // line 220
                echo "
    <div class=\"invalid-feedback-container\">
      ";
                // line 222
                if ( !(null === ($context["errorPopover"] ?? null))) {
                    // line 223
                    echo "        <div class=\"text-danger\">
          ";
                    // line 224
                    echo twig_escape_filter($this->env, ($context["errorPopover"] ?? null), "html", null, true);
                    echo "
        </div>
      ";
                } else {
                    // line 227
                    echo "        <div class=\"d-inline-block text-danger align-top\">
          <i class=\"material-icons form-error-icon\">error_outline</i>
        </div>
        <div class=\"d-inline-block\">
          ";
                    // line 231
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 232
                        echo "            <div class=\"text-danger\">
              ";
                        // line 233
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "
            </div>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 236
                    echo "        </div>
      ";
                }
                // line 238
                echo "    </div>
  ";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 248
    public function macro_form_group_row($__form__ = null, $__vars__ = null, $__extraVars__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "vars" => $__vars__,
            "extraVars" => $__extraVars__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 249
            echo "  ";
            $macros["self"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/macros.html.twig", 249)->unwrap();
            // line 250
            echo "
  ";
            // line 251
            $context["class"] = ((twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "class", [], "any", true, true, false, 251)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "class", [], "any", false, false, false, 251), "")) : (""));
            // line 252
            echo "  ";
            $context["inputType"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 252), "block_prefixes", [], "any", false, true, false, 252), 1, [], "any", true, true, false, 252)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 252), "block_prefixes", [], "any", false, true, false, 252), 1, [], "any", false, false, false, 252), "text")) : ("text"));
            // line 253
            echo "  ";
            $context["rowAttributes"] = ((twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "row_attr", [], "any", true, true, false, 253)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "row_attr", [], "any", false, false, false, 253), [])) : ([]));
            // line 254
            echo "  <div class=\"form-group row type-";
            echo twig_escape_filter($this->env, ($context["inputType"] ?? null), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rowAttributes"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["rowAttr"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["rowAttr"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['rowAttr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
    ";
            // line 255
            $context["extraVars"] = ((array_key_exists("extraVars", $context)) ? (_twig_default_filter(($context["extraVars"] ?? null), [])) : ([]));
            // line 256
            echo "
    ";
            // line 258
            echo "    ";
            $context["labelOnTop"] = false;
            // line 259
            echo "
    ";
            // line 260
            if (twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "label_on_top", [], "any", true, true, false, 260)) {
                // line 261
                echo "      ";
                $context["labelOnTop"] = twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "label_on_top", [], "any", false, false, false, 261);
                // line 262
                echo "    ";
            }
            // line 263
            echo "
    ";
            // line 264
            if (twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "label", [], "any", true, true, false, 264)) {
                // line 265
                echo "      ";
                $context["isRequired"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 265), "required", [], "any", true, true, false, 265)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 265), "required", [], "any", false, false, false, 265), false)) : (false));
                // line 266
                echo "
      ";
                // line 267
                if (twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "required", [], "any", true, true, false, 267)) {
                    // line 268
                    echo "        ";
                    $context["isRequired"] = twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "required", [], "any", false, false, false, 268);
                    // line 269
                    echo "      ";
                }
                // line 270
                echo "
      <label for=\"";
                // line 271
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 271), "id", [], "any", false, false, false, 271), "html", null, true);
                echo "\" class=\"form-control-label ";
                echo ((($context["labelOnTop"] ?? null)) ? ("label-on-top col-12") : (""));
                echo "\">
        ";
                // line 272
                if (($context["isRequired"] ?? null)) {
                    // line 273
                    echo "          <span class=\"text-danger\">*</span>
        ";
                }
                // line 275
                echo "        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "label", [], "any", false, false, false, 275), "html", null, true);
                echo "

        ";
                // line 277
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 277), "label_attr", [], "any", true, true, false, 277) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 277), "label_attr", [], "any", false, false, false, 277)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 277), "label_attr", [], "any", false, true, false, 277), "popover", [], "array", true, true, false, 277))) {
                    // line 278
                    echo "          ";
                    echo twig_include($this->env, $context, "@Common/HelpBox/helpbox.html.twig", ["content" => (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 278), "label_attr", [], "any", false, false, false, 278)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["popover"] ?? null) : null)]);
                    echo "
        ";
                }
                // line 280
                echo "      </label>
    ";
            }
            // line 282
            echo "
    <div class=\"";
            // line 283
            echo ((($context["labelOnTop"] ?? null)) ? ("col-12") : ("col-sm"));
            echo "\">
      ";
            // line 284
            echo twig_call_macro($macros["self"], "macro_form_widget_with_error", [($context["form"] ?? null), ($context["vars"] ?? null), ($context["extraVars"] ?? null)], 284, $context, $this->getSourceContext());
            echo "
    </div>
  </div>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 289
    public function macro_multistore_switch($__form__ = null, $__extraVars__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "extraVars" => $__extraVars__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 290
            echo "  ";
            $macros["self"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/macros.html.twig", 290)->unwrap();
            // line 291
            echo "  ";
            if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "shop_restriction_switch", [], "any", true, true, false, 291)) {
                // line 292
                echo "    ";
                ob_start(function () { return ''; });
                // line 293
                echo "      <strong>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Check / Uncheck all", [], "Admin.Actions"), "html", null, true);
                echo "</strong> <br>
      ";
                // line 294
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You are editing this page for a specific shop or group. Click \"%yes_label%\" to check all fields, \"%no_label%\" to uncheck all.", ["%yes_label%" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Yes", [], "Admin.Global"), "%no_label%" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("No", [], "Admin.Global")], "Admin.Design.Help"), "html", null, true);
                echo " <br>
      ";
                // line 295
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("If you check a field, change its value, and save, the multistore behavior will not apply to this shop (or group), for this particular parameter.", [], "Admin.Design.Help"), "html", null, true);
                echo "
    ";
                $context["defaultLabel"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 297
                echo "
    ";
                // line 298
                if ( !twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "help", [], "any", true, true, false, 298)) {
                    // line 299
                    echo "      ";
                    $context["extraVars"] = twig_array_merge(($context["extraVars"] ?? null), ["help" => ($context["defaultLabel"] ?? null)]);
                    // line 300
                    echo "    ";
                }
                // line 301
                echo "
    ";
                // line 302
                $context["vars"] = ["attr" => ["class" => "js-multi-store-restriction-switch"]];
                // line 303
                echo "
    ";
                // line 304
                echo twig_call_macro($macros["self"], "macro_form_group_row", [twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "shop_restriction_switch", [], "any", false, false, false, 304), ($context["vars"] ?? null), ($context["extraVars"] ?? null)], 304, $context, $this->getSourceContext());
                echo "
  ";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 308
    public function macro_language_dependant_select($__form__ = null, $__vars__ = null, $__extraVars__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "vars" => $__vars__,
            "extraVars" => $__extraVars__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 309
            echo "  ";
            $macros["self"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/macros.html.twig", 309)->unwrap();
            // line 310
            echo "
  ";
            // line 311
            $context["class"] = ((twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "class", [], "any", true, true, false, 311)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "class", [], "any", false, false, false, 311), "")) : (""));
            // line 312
            echo "  ";
            $context["inputType"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 312), "block_prefixes", [], "any", false, true, false, 312), 1, [], "any", true, true, false, 312)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 312), "block_prefixes", [], "any", false, true, false, 312), 1, [], "any", false, false, false, 312), "text")) : ("text"));
            // line 313
            echo "  ";
            $context["rowAttributes"] = ((twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "row_attr", [], "any", true, true, false, 313)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "row_attr", [], "any", false, false, false, 313), [])) : ([]));
            // line 314
            echo "  ";
            $context["attr"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 314), "attr", [], "any", false, false, false, 314);
            // line 315
            echo "  ";
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 315)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 315), "")) : ("")) . " language_dependant_select"))]);
            // line 316
            echo "  <div class=\"form-group row type-";
            echo twig_escape_filter($this->env, ($context["inputType"] ?? null), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rowAttributes"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["rowAttr"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["rowAttr"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['rowAttr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
  ";
            // line 317
            $context["extraVars"] = ((array_key_exists("extraVars", $context)) ? (_twig_default_filter(($context["extraVars"] ?? null), [])) : ([]));
            // line 318
            echo "
  ";
            // line 320
            echo "  ";
            $context["labelOnTop"] = false;
            // line 321
            echo "
  ";
            // line 322
            if (twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "label_on_top", [], "any", true, true, false, 322)) {
                // line 323
                echo "    ";
                $context["labelOnTop"] = twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "label_on_top", [], "any", false, false, false, 323);
                // line 324
                echo "  ";
            }
            // line 325
            echo "
  ";
            // line 326
            if (twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "label", [], "any", true, true, false, 326)) {
                // line 327
                echo "    ";
                $context["isRequired"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 327), "required", [], "any", true, true, false, 327)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 327), "required", [], "any", false, false, false, 327), false)) : (false));
                // line 328
                echo "
    ";
                // line 329
                if (twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "required", [], "any", true, true, false, 329)) {
                    // line 330
                    echo "      ";
                    $context["isRequired"] = twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "required", [], "any", false, false, false, 330);
                    // line 331
                    echo "    ";
                }
                // line 332
                echo "
    <label for=\"";
                // line 333
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 333), "id", [], "any", false, false, false, 333), "html", null, true);
                echo "\" class=\"form-control-label ";
                echo ((($context["labelOnTop"] ?? null)) ? ("label-on-top col-12") : (""));
                echo "\">
      ";
                // line 334
                if (($context["isRequired"] ?? null)) {
                    // line 335
                    echo "        <span class=\"text-danger\">*</span>
      ";
                }
                // line 337
                echo "      ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "label", [], "any", false, false, false, 337), "html", null, true);
                echo "
    </label>
  ";
            }
            // line 340
            echo "
  <div class=\"";
            // line 341
            echo "col-sm-5";
            echo "\">
    ";
            // line 342
            echo twig_call_macro($macros["self"], "macro_form_widget_with_error", [($context["form"] ?? null), ["attr" => ($context["attr"] ?? null)], ($context["extraVars"] ?? null)], 342, $context, $this->getSourceContext());
            echo "
  </div>
  ";
            // line 344
            if ((twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "languages", [], "any", true, true, false, 344) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "languages", [], "any", false, false, false, 344)))) {
                // line 345
                echo "  <div class=\"";
                echo "col-sm-3";
                echo "\">
    <select name=\"";
                // line 346
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 346), "id", [], "any", false, false, false, 346) . "_language"), "html", null, true);
                echo "\" class=\"custom-select language_dependant_select_language\">
    ";
                // line 347
                if (twig_test_iterable(twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "languages", [], "any", false, false, false, 347))) {
                    // line 348
                    echo "      ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["extraVars"] ?? null), "languages", [], "any", false, false, false, 348));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 349
                        echo "        <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["language"], "id", [], "any", false, false, false, 349), "html", null, true);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["language"], "value", [], "any", false, false, false, 349);
                        echo "</option>
      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 351
                    echo "    ";
                }
                // line 352
                echo "    </select>
  </div>
  ";
            }
            // line 355
            echo "  </div>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1125 => 355,  1120 => 352,  1117 => 351,  1106 => 349,  1101 => 348,  1099 => 347,  1095 => 346,  1090 => 345,  1088 => 344,  1083 => 342,  1079 => 341,  1076 => 340,  1069 => 337,  1065 => 335,  1063 => 334,  1057 => 333,  1054 => 332,  1051 => 331,  1048 => 330,  1046 => 329,  1043 => 328,  1040 => 327,  1038 => 326,  1035 => 325,  1032 => 324,  1029 => 323,  1027 => 322,  1024 => 321,  1021 => 320,  1018 => 318,  1016 => 317,  996 => 316,  993 => 315,  990 => 314,  987 => 313,  984 => 312,  982 => 311,  979 => 310,  976 => 309,  961 => 308,  949 => 304,  946 => 303,  944 => 302,  941 => 301,  938 => 300,  935 => 299,  933 => 298,  930 => 297,  925 => 295,  921 => 294,  916 => 293,  913 => 292,  910 => 291,  907 => 290,  893 => 289,  880 => 284,  876 => 283,  873 => 282,  869 => 280,  863 => 278,  861 => 277,  855 => 275,  851 => 273,  849 => 272,  843 => 271,  840 => 270,  837 => 269,  834 => 268,  832 => 267,  829 => 266,  826 => 265,  824 => 264,  821 => 263,  818 => 262,  815 => 261,  813 => 260,  810 => 259,  807 => 258,  804 => 256,  802 => 255,  782 => 254,  779 => 253,  776 => 252,  774 => 251,  771 => 250,  768 => 249,  753 => 248,  742 => 238,  738 => 236,  729 => 233,  726 => 232,  722 => 231,  716 => 227,  710 => 224,  707 => 223,  705 => 222,  701 => 220,  698 => 219,  695 => 218,  692 => 217,  690 => 216,  687 => 215,  681 => 212,  676 => 210,  669 => 206,  665 => 204,  663 => 203,  657 => 200,  653 => 199,  650 => 198,  645 => 195,  636 => 192,  633 => 191,  629 => 190,  625 => 188,  623 => 187,  620 => 186,  614 => 185,  612 => 184,  609 => 183,  606 => 182,  603 => 181,  601 => 180,  598 => 179,  595 => 178,  590 => 177,  588 => 176,  585 => 175,  582 => 174,  579 => 173,  575 => 171,  569 => 170,  566 => 169,  563 => 168,  560 => 167,  555 => 166,  552 => 164,  546 => 163,  543 => 162,  538 => 161,  535 => 160,  532 => 158,  529 => 157,  527 => 156,  520 => 153,  517 => 152,  515 => 151,  512 => 150,  509 => 149,  507 => 148,  505 => 147,  502 => 146,  499 => 145,  496 => 143,  490 => 142,  487 => 141,  482 => 140,  480 => 139,  477 => 138,  474 => 137,  461 => 136,  449 => 123,  446 => 122,  440 => 120,  438 => 119,  433 => 118,  431 => 117,  426 => 115,  423 => 114,  420 => 113,  417 => 112,  414 => 111,  411 => 110,  409 => 109,  406 => 108,  403 => 107,  388 => 106,  376 => 93,  372 => 92,  367 => 91,  353 => 90,  341 => 85,  337 => 84,  334 => 83,  329 => 81,  326 => 80,  324 => 79,  320 => 78,  316 => 77,  312 => 75,  309 => 74,  292 => 73,  281 => 69,  275 => 66,  271 => 65,  268 => 64,  264 => 62,  262 => 61,  251 => 60,  234 => 59,  221 => 54,  217 => 52,  204 => 51,  193 => 47,  187 => 45,  181 => 43,  179 => 42,  175 => 40,  161 => 39,  149 => 35,  142 => 34,  127 => 33,  115 => 30,  102 => 29,  90 => 26,  75 => 25,  70 => 307,  67 => 288,  64 => 241,  61 => 126,  58 => 96,  55 => 88,  52 => 71,  49 => 58,  46 => 50,  43 => 38,  40 => 32,  37 => 28,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/macros.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\macros.html.twig");
    }
}
