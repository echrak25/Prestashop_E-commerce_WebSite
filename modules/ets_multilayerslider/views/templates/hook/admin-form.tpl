{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<script type="text/javascript">
    var mmBaseAdminUrl = '{$mmBaseAdminUrl|escape:'quotes':'UTF-8'}';
    var mmCloseTxt = '{l s='Close' mod='ets_multilayerslider'}';
    var mmOpenTxt = '{l s='Open' mod='ets_multilayerslider'}';
    var mmDeleteTxt = '{l s='Delete' mod='ets_multilayerslider'}';
    var mmDuplicatedTxt='{l s='Duplicated' mod='ets_multilayerslider'}';
    var mmEditTxt = '{l s='Edit' mod='ets_multilayerslider'}';
    var mmDeleteTitleTxt = '{l s='Delete this item' mod='ets_multilayerslider'}';
    var mmAddMenuTxt = '{l s='Add new slide' mod='ets_multilayerslider'}';
    var mmEditMenuTxt = '{l s='Edit slide' mod='ets_multilayerslider'}';
    var mmAddLayerTxt = '{l s='Add new layer' mod='ets_multilayerslider'}';
    var mmEditLayerTxt = '{l s='Edit layer' mod='ets_multilayerslider'}';
    var mmDeleteLayerTxt = '{l s='Delete this layer' mod='ets_multilayerslider'}';
    var mmDeleteBlockTxt = '{l s='Delete this block' mod='ets_multilayerslider'}';
    var mmEditBlockTxt = '{l s='Edit this block' mod='ets_multilayerslider'}';
    var mmAddBlockTxt = '{l s='Add new block' mod='ets_multilayerslider'}';
    var ets_mls_invalid_file = '{l s='Image is invalid' mod='ets_multilayerslider'}';
    var layertitle ='{l s='Layers' mod='ets_multilayerslider'}';
    var url_base_img ='{$url_base_img|escape:'quotes':'UTF-8'}';
    var width_slider ={$width_slider|intval};
    var height_slider ={$height_slider|intval};
    var id_lang ={$id_lang|intval};
</script>
<div class="ets_multilayerslider_wrapper {$layoutDirection|escape:'html':'UTF-8'}-wrapper mls_desktop_size {if $multiLayoutExist}multi-layout{/if} mls-layout-{$mls_layout|escape:'html':'UTF-8'}">
    <div class="ets_multilayerslider">
        <div class="mls_slides_actions">
            <div data-title="&#xE8B8;" class="mls_config_button btn btn-default">{l s='Settings' mod='ets_multilayerslider'}</div>
            <div class="mls_export_button btn btn-default">
                <i class="fa fa-exchange" data-title="&#xE8D4;"></i>
                {l mod='ets_multilayerslider' s='Import/Export'}
            </div>
            {if $multiLayoutExist}
                <div class="mls_change_mode_dir">
                    <div data-title="&#xE236;" class="mls_change_mode ltr {if $layoutDirection=='ets-dir-ltr'}active{/if}">{l s='LTR' mod='ets_multilayerslider'}</div>
                    <div data-title="&#xE237;" class="mls_change_mode rtl {if $layoutDirection=='ets-dir-rtl'}active{/if}">{l s='RTL' mod='ets_multilayerslider'}</div>                    
                </div>
            {/if}            
            
            <div class="msl_screen_type">
                <div data-title="&#xE30B;" class="active msl_screen_desktop" data-size="desktop" data-width="auto">{l s='Desktop' mod='ets_multilayerslider'}</div>
                <div data-title="&#xE331;" class="msl_screen_tablet" data-size="tablet" data-zoom="0.615" data-width="768">{l s='Tablet' mod='ets_multilayerslider'}</div>
                <div data-title="&#xE325;" class="msl_screen_mobile" data-size="mobile" data-zoom="0.282051" data-width="320">{l s='Mobile' mod='ets_multilayerslider'}</div>
            </div>
            <div class="mls_players">
                <div data-title="&#xE039;" class="mls_play_slider btn btn-default">{l s='Play slider' mod='ets_multilayerslider'}</div>
            </div>
            
            
        </div>
        <div class="mls_slides">
            <div class="mls_slide_list {if isset($mls_configs.ETS_MLS_SLIDER_TYPE)}mls_slider_type_{strtolower($mls_configs.ETS_MLS_SLIDER_TYPE)|escape:'html':'UTF-8'}{/if} {$layoutDirection|escape:'html':'UTF-8'}" {hook h='displayMLSConfigs'}>
                {hook h='displayMLSSlider' layout=$mls_layout}
            </div>
            <div data-title="&#xE147;" class="mls_add_slide btn btn-default">{l s='Add slide' mod='ets_multilayerslider'}</div>
        </div>
    </div>
    <div class="mls_forms mls_overlay hidden">
        <div class="mls_slide_form hidden mls_pop_up">
            <div data-title="&#xE14C;" class="mls_close">{l s='Close' mod='ets_multilayerslider'}</div>
            <div class="mls_form"></div>
        </div>
        <div class="mls_slide_form_new hidden">{$slideForm nofilter}</div>
        <div class="mls_layer_form_new hidden">{$layerForm nofilter}</div>
    </div>
    <div class="mls_overlay hidden">
        <div class="mls_config_form hidden mls_pop_up">
            <div data-title="&#xE14C;" class="mls_close">{l s='Close' mod='ets_multilayerslider'}</div>
            <div class="mls_config_form_content"><div class="mls_close"></div>{$configForm nofilter}</div>
        </div>
    </div>
    <div class="mls_preview_slider hidden mls_pop_up {if isset($mls_configs.ETS_MLS_SLIDER_TYPE)}mls_preview_type_{strtolower($mls_configs.ETS_MLS_SLIDER_TYPE)|escape:'html':'UTF-8'}{/if}">
        <div data-title="&#xE14C;" class="mls_close">{l s='Close' mod='ets_multilayerslider'}</div>
        <div class="mls_preview_loading">
            <img src="{$url_base_img|escape:'html':'UTF-8'}../ajax-loader.gif" />
        </div>
        <div class="mls_form_preview">
            <div data-title="&#xE14C;" class="mls_close">{l s='Close' mod='ets_multilayerslider'}</div>
        </div>
    </div>
    <div class="mls_export_form mls_overlay hidden">
        <div data-title="&#xE14C;" class="mls_close">{*l s='Close' mod='ets_multilayerslider'*}</div>
        <div class="mls_export mls_pop_up">
            <div data-title="&#xE14C;" class="mls_close">{l s='Close' mod='ets_multilayerslider'}</div>
            <div class="mls_export_form_content">
                
                <div class="mls_export_option">
                    <div class="panel-heading">
                        {l s='Export slider content' mod='ets_multilayerslider'}
                    </div>
                    <a class="btn btn-default mls_export_slider" href="{$mmBaseAdminUrl|escape:'html':'UTF-8'}&exportSlider=1" target="_blank">
                    <i class="fa fa-download" data-title="&#xE2C4;"></i>{l s='Export slider' mod='ets_multilayerslider'}</a>
                    <p class="mls_export_option_note">{l s='Export all slider data including slider images, text, custom CSS and configuration' mod='ets_multilayerslider'}</p>
                </div>
                <div class="mls_import_option">
                    <div class="panel-heading">
                        {l s='Import slider data' mod='ets_multilayerslider'}
                    </div>
                    <form action="{$mmBaseAdminUrl|escape:'html':'UTF-8'}" method="post" enctype="multipart/form-data" class="mls_import_option_form">
                        <div class="mls_import_option_updata">
                            <label for="sliderdata">{l s='Data package' mod='ets_multilayerslider'}</label>
                            <input id="image" type="file" name="sliderdata" id="sliderdata" />
                        </div>
                        <div class="mls_import_option_clean">
                            <input type="checkbox" value="1" id="importoverride" checked="checked" name="importoverride" />
                            <label for="importoverride">{l s='Clear all slides before importing' mod='ets_multilayerslider'}</label>
                        </div>
                        <div class="mls_import_option_button">
                            <input type="hidden" name="importslider" value="1" />
                            <div class="mls_import_slider_loading"><img src="{$url_base_img|escape:'html':'UTF-8'}../loader.gif" />{l s='Importing data' mod='ets_multilayerslider'}</div>
                            <div class="mls_import_slider_submit">
                                <i class="fa fa-compress" data-title="&#xE864;"></i>
                                <input type="submit" value="{l s='Import slider' mod='ets_multilayerslider'}" class="btn btn-default mls_import_slider"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>