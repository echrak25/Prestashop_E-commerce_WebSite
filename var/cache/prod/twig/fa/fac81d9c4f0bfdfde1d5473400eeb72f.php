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

/* @PrestaShop/Admin/TwigTemplateForm/typeahead.html.twig */
class __TwigTemplate_93379f572604a54adf4ef2845b000617 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'typeahead_product_collection_widget' => [$this, 'block_typeahead_product_collection_widget'],
            'typeahead_product_pack_collection_widget' => [$this, 'block_typeahead_product_pack_collection_widget'],
            'typeahead_customer_collection_widget' => [$this, 'block_typeahead_customer_collection_widget'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        $this->displayBlock('typeahead_product_collection_widget', $context, $blocks);
        // line 73
        echo "
";
        // line 74
        $this->displayBlock('typeahead_product_pack_collection_widget', $context, $blocks);
        // line 218
        echo "
";
        // line 219
        $this->displayBlock('typeahead_customer_collection_widget', $context, $blocks);
    }

    // line 25
    public function block_typeahead_product_collection_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "    <div
      class=\"autocomplete-search\"
      data-formid=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 28), "id", [], "any", false, false, false, 28), "html", null, true);
        echo "\"
      data-fullname=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 29), "full_name", [], "any", false, false, false, 29), "html", null, true);
        echo "\"
      data-mappingvalue=\"";
        // line 30
        echo twig_escape_filter($this->env, ($context["mapping_value"] ?? null), "html", null, true);
        echo "\"
      data-mappingname=\"";
        // line 31
        echo twig_escape_filter($this->env, ($context["mapping_name"] ?? null), "html", null, true);
        echo "\"
      data-remoteurl=\"";
        // line 32
        echo ($context["remote_url"] ?? null);
        echo "\"
      data-limit=\"";
        // line 33
        echo twig_escape_filter($this->env, ($context["limit"] ?? null), "html", null, true);
        echo "\"
    >
        <div class=\"search search-with-icon\">
          ";
        // line 37
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 37)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 37), "")) : ("")) . " form-control search typeahead ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 37), "id", [], "any", false, false, false, 37)))]);
        // line 39
        $context["full_name"] = "";
        // line 40
        echo "<input type=\"text\" placeholder=\"";
        echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "html", null, true);
        echo "\" autocomplete=\"off\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">
        </div>
        <small class=\"form-text text-muted text-right typeahead-hint\">
          ";
        // line 43
        if (($context["help"] ?? null)) {
            // line 44
            echo "            ";
            echo ($context["help"] ?? null);
            echo "
          ";
        }
        // line 46
        echo "        </small>
        <ul id=\"";
        // line 47
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 47), "id", [], "any", false, false, false, 47), "html", null, true);
        echo "-data\" class=\"typeahead-list nostyle col-sm-12 product-list\">
            ";
        // line 48
        if ((array_key_exists("collection", $context) && (twig_length_filter($this->env, ($context["collection"] ?? null)) > 0))) {
            // line 49
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["collection"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 50
                echo "                    <li class=\"media\">
                      <div class=\"media-left\">
                        <img class=\"media-object image\" src=\"";
                // line 52
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 52), "html", null, true);
                echo "\" />
                      </div>
                      <div class=\"media-body media-middle\">
                        ";
                // line 55
                echo twig_sprintf(($context["template_collection"] ?? null), twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 55));
                echo "
                      </div>
                      <input type=\"hidden\" name=\"";
                // line 57
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 57), "full_name", [], "any", false, false, false, 57), "html", null, true);
                echo "[data][]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 57), "html", null, true);
                echo "\" />
                    </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "            ";
        }
        // line 61
        echo "        </ul>

        <div class=\"invisible\" id=\"tplcollection-";
        // line 63
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 63), "id", [], "any", false, false, false, 63), "html", null, true);
        echo "\">
          ";
        // line 64
        echo ($context["template_collection"] ?? null);
        echo "
        </div>
    </div>
    <script type=\"text/javascript\">
      \$('#";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 68), "id", [], "any", false, false, false, 68), "html", null, true);
        echo "').on('focusout', function resetSearchBar() {
        \$('#";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 69), "id", [], "any", false, false, false, 69), "html", null, true);
        echo "').typeahead('val', '');
      });
    </script>
";
    }

    // line 74
    public function block_typeahead_product_pack_collection_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 75
        echo "    <h2 class=\"title-products ";
        echo (((array_key_exists("collection", $context) && (twig_length_filter($this->env, ($context["collection"] ?? null)) > 0))) ? ("") : ("hide"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("List of products for this pack", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
    <ul id=\"";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 76), "id", [], "any", false, false, false, 76), "html", null, true);
        echo "-data\" class=\"typeahead-list pack nostyle row\">
        ";
        // line 77
        if ((array_key_exists("collection", $context) && (twig_length_filter($this->env, ($context["collection"] ?? null)) > 0))) {
            // line 78
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["collection"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 79
                echo "                <li data-product=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 79), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id_product_attribute", [], "any", false, false, false, 79), "html", null, true);
                echo "\" class=\"col-xl-3 col-lg-6 mb-1\">
                    <div class=\"pack-product\">
                        <img class=\"cover\" src=\"";
                // line 81
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 81), "html", null, true);
                echo "\" /> ";
                echo twig_sprintf(($context["template_collection"] ?? null), twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 81), twig_get_attribute($this->env, $this->source, $context["item"], "ref", [], "any", false, false, false, 81), twig_get_attribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 81));
                echo "
                        <input type=\"hidden\" name=\"";
                // line 82
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 82), "full_name", [], "any", false, false, false, 82), "html", null, true);
                echo "[data][]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 82), "html", null, true);
                echo "x";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 82), "html", null, true);
                echo "x";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id_product_attribute", [], "any", false, false, false, 82), "html", null, true);
                echo "\" />
                        <input type=\"hidden\" name=\"";
                // line 83
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 83), "full_name", [], "any", false, false, false, 83), "html", null, true);
                echo "[data][]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 83), "html", null, true);
                echo "x";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 83), "html", null, true);
                echo "x";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id_product_attribute", [], "any", false, false, false, 83), "html", null, true);
                echo "\" />
                    </div>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "        ";
        }
        // line 88
        echo "    </ul>

    <h2>";
        // line 90
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 90), "label", [], "any", false, false, false, 90), "html", null, true);
        echo "</h2>

    <div class=\"row mb-2\">
        <div class=\"col-md-6\">
            <input type=\"text\" id=\"";
        // line 94
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 94), "id", [], "any", false, false, false, 94), "html", null, true);
        echo "\" class=\"form-control typeahead search ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 94), "id", [], "any", false, false, false, 94), "html", null, true);
        echo "\" placeholder=\"";
        echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "html", null, true);
        echo "\" autocomplete=\"off\" />
        </div>
        <div class=\"col-md-3\">
            <div class=\"input-group\">
                <div class=\"input-group-prepend\">
                    <span class=\"input-group-text\">×</span>
                </div>
                <input type=\"number\" id=\"";
        // line 101
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 101), "id", [], "any", false, false, false, 101), "html", null, true);
        echo "-curPackItemQty\" class=\"form-control curPackItemQty\" min=\"1\" value=\"1\">
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"input-group\">
                <button id=\"";
        // line 106
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 106), "id", [], "any", false, false, false, 106), "html", null, true);
        echo "-curPackItemAdd\" class=\"btn btn-secondary btn-block\">
                    <i class=\"material-icons\">add</i>
                    ";
        // line 108
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add", [], "Admin.Actions"), "html", null, true);
        echo "
                </button>
            </div>
        </div>
        <div class=\"clearfix\"></div>

        <script>
            \$( document ).ready(function() {
                //remove collection item
                \$(document).on( 'click', '#";
        // line 117
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 117), "id", [], "any", false, false, false, 117), "html", null, true);
        echo "-data .delete', function(e) {
                    e.preventDefault();
                    var _this = \$(this);

                    modalConfirmation.create(translate_javascripts['Are you sure you want to delete this item?'], null, {
                        onContinue: function(){
                            _this.closest('li').remove();
                            if(_this.parent().parent().length == 0){
                                \$('#js_";
        // line 125
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 125), "id", [], "any", false, false, false, 125), "html", null, true);
        echo " h4.title-products').addClass('hide');
                            }
                        }
                    }).show();
                });

                \$('#";
        // line 131
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 131), "id", [], "any", false, false, false, 131), "html", null, true);
        echo "-curPackItemAdd').click(function(e){
                    e.preventDefault();
                    if(\$(this).data('currentItem')){
                        var number = \$('#";
        // line 134
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 134), "id", [], "any", false, false, false, 134), "html", null, true);
        echo "-curPackItemQty').val();
                        var data = \$(this).data('currentItem');
                        var value = number + 'x' + data.id + 'x' + (data.id_product_attribute ? data.id_product_attribute : 0);

                        var html = '<li data-product=\"' + data.id + '-' + (data.id_product_attribute ? data.id_product_attribute : 0) + '\" class=\"col-xl-3 col-lg-6 mb-1\">';
                        html += '<div class=\"pack-product\">';
                        html += '<img class=\"cover\" src=\"' + data.image +'\" />';
                        html += sprintf('";
        // line 141
        ob_start(function () { return ''; });
        echo ($context["template_collection"] ?? null);
        $___internal_parse_11_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        echo twig_spaceless($___internal_parse_11_);
        echo "', data.";
        echo twig_escape_filter($this->env, ($context["mapping_name"] ?? null), "html", null, true);
        echo ", data.ref, number);
                        html += '<input type=\"hidden\" name=\"";
        // line 142
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 142), "full_name", [], "any", false, false, false, 142), "html", null, true);
        echo "[data][]\" value=\"' + value + '\" />';
                        html += '</div>';
                        html += '</li>';

                        \$('#";
        // line 146
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 146), "id", [], "any", false, false, false, 146), "html", null, true);
        echo "-data').append(html);
                        \$('#js_";
        // line 147
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 147), "id", [], "any", false, false, false, 147), "html", null, true);
        echo " h4.title-products').removeClass('hide');

                        \$('#";
        // line 149
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 149), "id", [], "any", false, false, false, 149), "html", null, true);
        echo "').val('');
                    }

                    \$(this).data('currentItem', null);
                    \$('#";
        // line 153
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 153), "id", [], "any", false, false, false, 153), "html", null, true);
        echo "-curPackItemQty').val(1);
                });

                //define source
                this['";
        // line 157
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 157), "id", [], "any", false, false, false, 157), "html", null, true);
        echo "_source'] = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    identify: function(obj) {
                        return obj.";
        // line 161
        echo twig_escape_filter($this->env, ($context["mapping_value"] ?? null), "html", null, true);
        echo ";
                    },
                    remote: {
                        url: '";
        // line 164
        echo ($context["remote_url"] ?? null);
        echo "',
                        cache: false,
                        wildcard: '%QUERY',
                        transform: function(response){
                            var newResponse = [];

                            if(!response){
                                return newResponse;
                            }

                            //generate excludes IDs and filter results
                            var excludeIds = [];
                            \$.each(\$('#";
        // line 176
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 176), "id", [], "any", false, false, false, 176), "html", null, true);
        echo "-data li'), function(key, val){
                                excludeIds.push(\$(val).attr('data-product'));
                            });

                            \$.each(response, function(key, item){
                                if(excludeIds.indexOf(item.id + '-' + item.id_product_attribute) === -1){
                                    newResponse.push(item);
                                }
                            });

                            return newResponse;
                        }
                    }
                });

                //define typeahead
                \$('#";
        // line 192
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 192), "id", [], "any", false, false, false, 192), "html", null, true);
        echo "').typeahead({
                    limit: 20,
                    minLength: 2,
                    highlight: true,
                    hint: false
                }, {
                    display: '";
        // line 198
        echo twig_escape_filter($this->env, ($context["mapping_name"] ?? null), "html", null, true);
        echo "',
                    source: this['";
        // line 199
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 199), "id", [], "any", false, false, false, 199), "html", null, true);
        echo "_source'],
                    limit: 30,
                    templates: {
                        suggestion: function(item){
                            return '<div>' +
                                   '<table><tr>' +
                                   '<td rowspan=\"2\"><img src=\"'+ item.image +'\" style=\"width:50px; margin-right: 7px;\" /></td>' +
                                   '<td>' + item.name + '</td></tr>' +
                                   '<tr><td>REF: ' + item.ref + '</td></tr>' +
                                   '</table></div>'
                        }
                    }
                }).bind('typeahead:select', function(ev, suggestion) {
                    \$('#";
        // line 212
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 212), "id", [], "any", false, false, false, 212), "html", null, true);
        echo "-curPackItemAdd').data('currentItem', suggestion);
                });
            });
        </script>
    </div>
";
    }

    // line 219
    public function block_typeahead_customer_collection_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 220
        echo "    ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
    <input type=\"text\" id=\"";
        // line 221
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 221), "id", [], "any", false, false, false, 221), "html", null, true);
        echo "\" class=\"form-control typeahead ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 221), "id", [], "any", false, false, false, 221), "html", null, true);
        echo "\" placeholder=\"";
        echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "html", null, true);
        echo "\" autocomplete=\"off\" />
    <ul id=\"";
        // line 222
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 222), "id", [], "any", false, false, false, 222), "html", null, true);
        echo "-data\" class=\"typeahead-list product-list nostyle col-sm-12\">
      ";
        // line 223
        if ((array_key_exists("collection", $context) && (twig_length_filter($this->env, ($context["collection"] ?? null)) > 0))) {
            // line 224
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["collection"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 225
                echo "            <li class=\"media\">
                <div class=\"media-body\">
                  ";
                // line 227
                echo twig_sprintf(($context["template_collection"] ?? null), twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 227));
                echo "
                </div>
                <input type=\"hidden\" name=\"";
                // line 229
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 229), "full_name", [], "any", false, false, false, 229), "html", null, true);
                echo "[data][]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 229), "html", null, true);
                echo "\" />
            </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 232
            echo "      ";
        }
        // line 233
        echo "    </ul>
    <script>
        \$( document ).ready(function() {
            //remove collection item
            \$(document).on( 'click', '#";
        // line 237
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 237), "id", [], "any", false, false, false, 237), "html", null, true);
        echo "-data .delete', function(e) {
                e.preventDefault();
                var _this = \$(this);

                modalConfirmation.create(translate_javascripts['Are you sure you want to delete this item?'], null, {
                    onContinue: function(){
                        _this.closest('li').remove();
                        _this.parent().parent().hide();
                        _this.parent().remove();
                    }
                }).show();
            });

            //define source
            this['";
        // line 251
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 251), "id", [], "any", false, false, false, 251), "html", null, true);
        echo "_source'] = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                identify: function(obj) {
                    return obj.";
        // line 255
        echo twig_escape_filter($this->env, ($context["mapping_value"] ?? null), "html", null, true);
        echo ";
                },
                remote: {
                    url: '";
        // line 258
        echo ($context["remote_url"] ?? null);
        echo "',
                    cache: false,
                    wildcard: '%QUERY',
                    transform: function(response){
                        if(!response){
                            return [];
                        }
                        return response;
                    }
                }
            });

            //define typeahead
            \$('#";
        // line 271
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 271), "id", [], "any", false, false, false, 271), "html", null, true);
        echo "').typeahead({
                limit: 200,
                minLength: 2,
                highlight: true,
                cache: false,
                hint: false,
            }, {
                display: '";
        // line 278
        echo twig_escape_filter($this->env, ($context["mapping_name"] ?? null), "html", null, true);
        echo "',
                source: this['";
        // line 279
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 279), "id", [], "any", false, false, false, 279), "html", null, true);
        echo "_source'],
                limit: 30,
                templates: {
                    suggestion: function(item){
                        return '<div>'+ item.";
        // line 283
        echo twig_escape_filter($this->env, ($context["mapping_name"] ?? null), "html", null, true);
        echo " +'</div>'
                    }
                }
            }).bind('typeahead:select', function(ev, suggestion) {

                //if collection length is up to limit, return
                if(";
        // line 289
        echo twig_escape_filter($this->env, ($context["limit"] ?? null), "html", null, true);
        echo " != 0 && \$('#";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 289), "id", [], "any", false, false, false, 289), "html", null, true);
        echo "-data li').length >= ";
        echo twig_escape_filter($this->env, ($context["limit"] ?? null), "html", null, true);
        echo "){
                    return;
                }

                var value = suggestion.";
        // line 293
        echo twig_escape_filter($this->env, ($context["mapping_value"] ?? null), "html", null, true);
        echo ";
                if (suggestion.id_product_attribute) {
                    value = value+','+suggestion.id_product_attribute;
                }

                var html = '<li class=\"media\">';
                html += sprintf('";
        // line 299
        ob_start(function () { return ''; });
        echo ($context["template_collection"] ?? null);
        $___internal_parse_12_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        echo twig_spaceless($___internal_parse_12_);
        echo "', suggestion.";
        echo twig_escape_filter($this->env, ($context["mapping_name"] ?? null), "html", null, true);
        echo ");
                html += '<input type=\"hidden\" name=\"";
        // line 300
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 300), "full_name", [], "any", false, false, false, 300), "html", null, true);
        echo "[data][]\" value=\"' + value + '\" />';
                html += '</li>';
                \$('#";
        // line 302
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 302), "id", [], "any", false, false, false, 302), "html", null, true);
        echo "-data').show();
                \$('#";
        // line 303
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 303), "id", [], "any", false, false, false, 303), "html", null, true);
        echo "-data').append(html);

            }).bind('typeahead:close', function(ev) {
                \$(ev.target).val('');
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/TwigTemplateForm/typeahead.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  626 => 303,  622 => 302,  617 => 300,  608 => 299,  599 => 293,  588 => 289,  579 => 283,  572 => 279,  568 => 278,  558 => 271,  542 => 258,  536 => 255,  529 => 251,  512 => 237,  506 => 233,  503 => 232,  492 => 229,  487 => 227,  483 => 225,  478 => 224,  476 => 223,  472 => 222,  464 => 221,  459 => 220,  455 => 219,  445 => 212,  429 => 199,  425 => 198,  416 => 192,  397 => 176,  382 => 164,  376 => 161,  369 => 157,  362 => 153,  355 => 149,  350 => 147,  346 => 146,  339 => 142,  330 => 141,  320 => 134,  314 => 131,  305 => 125,  294 => 117,  282 => 108,  277 => 106,  269 => 101,  255 => 94,  248 => 90,  244 => 88,  241 => 87,  225 => 83,  215 => 82,  209 => 81,  201 => 79,  196 => 78,  194 => 77,  190 => 76,  183 => 75,  179 => 74,  171 => 69,  167 => 68,  160 => 64,  156 => 63,  152 => 61,  149 => 60,  138 => 57,  133 => 55,  127 => 52,  123 => 50,  118 => 49,  116 => 48,  112 => 47,  109 => 46,  103 => 44,  101 => 43,  92 => 40,  90 => 39,  88 => 37,  82 => 33,  78 => 32,  74 => 31,  70 => 30,  66 => 29,  62 => 28,  58 => 26,  54 => 25,  50 => 219,  47 => 218,  45 => 74,  42 => 73,  40 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/TwigTemplateForm/typeahead.html.twig", "C:\\xampp\\htdocs\\CozyHome\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\TwigTemplateForm\\typeahead.html.twig");
    }
}
