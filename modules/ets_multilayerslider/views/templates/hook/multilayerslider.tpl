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
    var width_slider = {$mls_width|intval};
    var height_slider = {$mls_height|intval};
</script>
{if isset($mls_slides) && $mls_slides}
<div class="ets_multilayerslider {if $mls_configs.ETS_MLS_SLIDER_TYPE=='full'}hidden{/if}">
    <div class="mls_slides">
    <div data-max-slide-time="{$mls_max_slide_time|intval}" class="mls_slider {if $mls_configs.ETS_MLS_ENABLE_LOADING_ICON}loading{/if} {if isset($mls_configs.ETS_MLS_SLIDER_TYPE)}mls_slider_type_{strtolower($mls_configs.ETS_MLS_SLIDER_TYPE)|escape:'html':'UTF-8'}{/if} mls_layout_{$mls_layout|escape:'html':'UTF-8'}" style="width: {$mls_width|intval}px; height: {$mls_height|intval}px; {if $mls_configs.ETS_MLS_SLIDER_BACKGROUND}background-color: {$mls_configs.ETS_MLS_SLIDER_BACKGROUND|escape:'html':'UTF-8'};{/if}" {hook h='displayMLSConfigs'}>
        <div class="mls_slider_running" style="{if $mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR}background-color: {$mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR|escape:'html':'UTF-8'};{else}#000000;{/if}"></div>                    
        <ul class="mls_slides_front">
            {assign var='ik' value=0}
            {foreach from=$mls_slides item='slide'}
                {assign var='ik' value=$ik+1}
                <li data-slide-background-image="{$slide.link_img|escape:'html':'UTF-8'}" data-slide-order="{$ik|intval}" data-max-layer-in="{$slide.max_layer_in|intval}" data-max-layer-out="{$slide.max_layer_out|intval}" data-animation-in="{$slide.animation_in|escape:'html':'UTF-8'}" data-animation-out="{$slide.animation_out|escape:'html':'UTF-8'}" data-id-slide="{$slide.id_slide|intval}" class="mls_slide_front {if isset($slide.custom_class) && $slide.custom_class}{$slide.custom_class|escape:'html':'UTF-8'}{/if} item_{$ik|intval} mls_slide_{$slide.id_slide|intval}" style="{if $slide.link_img|escape:'html':'UTF-8'} {if !$mls_configs.ETS_MLS_ENABLE_LOADING_ICON || $mls_configs.ETS_MLS_ENABLE_LOADING_ICON && $ik>1}background-image: url('{$slide.link_img|escape:'html':'UTF-8'}');{/if}background-repeat: {if $slide.repeat_x&&$slide.repeat_y}repeat{elseif $slide.repeat_x}repeat-x{elseif $slide.repeat_y}repeat-y{else}no-repeat{/if};{/if}{if $slide.backgroud_color} background-color:{$slide.backgroud_color|escape:'html':'UTF-8'}; {/if} position: relative;">
                    {if isset($slide.layers) && $slide.layers}                        
                        {foreach from=$slide.layers item='layer'}
                            {if $layer.layer_type=='image' && $layer.image || $layer.layer_type!='image'&&$layer.content_layer}
                                <div class="msl_layer_front {if isset($layer.custom_class) && $layer.custom_class}{$layer.custom_class|escape:'html':'UTF-8'}{/if} msl_layer_{$layer.id_layer|intval} layer_layout_{$mls_layout|escape:'html':'UTF-8'} mls_layer_type_front_{$layer.layer_type|escape:'html':'UTF-8'}" style="position: absolute; {if $mls_layout=='rtl' && $mls_multilayout}right:{$layer.right|escape:'html':'UTF-8'}px; top:{$layer.top_right|escape:'html':'UTF-8'}px; left: auto;{else}left:{$layer.left|escape:'html':'UTF-8'}px; top:{$layer.top|escape:'html':'UTF-8'}px; right: auto;{/if} float:left; bottom: auto; z-index: {$layer.sort_order|intval};" data-top="{$layer.top|escape:'html':'UTF-8'}" data-id-layer="{$layer.id_layer|intval}" 
                                    data-animation-in="{$layer.animation_in|escape:'html':'UTF-8'}" 
                                    data-animation-out="{$layer.animation_out|escape:'html':'UTF-8'}" 
                                    data-move-in="{$layer.move_in|escape:'html':'UTF-8'}" 
                                    data-move-out="{$layer.move_out|escape:'html':'UTF-8'}" 
                                    data-delay-in="{$layer.start_delay|escape:'html':'UTF-8'}"
                                    data-delay-out="{$layer.stand_duration|escape:'html':'UTF-8'}">
                                    {if $layer.layer_type=='image'}
                                        {if $layer.link}<a href="{$layer.link|escape:'html':'UTF-8'}">{/if}<img class="spot" src="{$layer.link_image|escape:'html':'UTF-8'}" style="{if $layer.width}width: {$layer.width|floatval}px;{/if}{if $layer.height}height: {$layer.height|floatval}px;{/if}" alt="" />{if $layer.link}</a>{/if}
                                    {elseif $layer.layer_type=='text' || $layer.layer_type=='link'}
                                        {if $layer.link && $layer.layer_type=='link'}<a href="{$layer.link|escape:'html':'UTF-8'}">{/if}<span style="
                                            {if $layer.font_size}font-size:{$layer.font_size|escape:'html':'UTF-8'}px{/if};
                                            {if $layer.text_color}color:{$layer.text_color|escape:'html':'UTF-8'};{/if}
                                            {if $layer.font_family}font-family:{$layer.font_family|escape:'html':'UTF-8'};{/if}
                                            {if $layer.font_weight}font-weight:{$layer.font_weight|escape:'html':'UTF-8'};{/if}
                                            {if $layer.text_decoration}text-decoration:{$layer.text_decoration|escape:'html':'UTF-8'};{/if}
                                            {if $layer.text_transform}text-transform:{$layer.text_transform|escape:'html':'UTF-8'};{/if}
                                        ">{$layer.content_layer nofilter}</span>{if $layer.link && $layer.layer_type=='link'}</a>{/if}
                                    {elseif $layer.layer_type=='text_background'}
                                        <span style="
                                            {if $layer.font_size}font-size:{$layer.font_size|escape:'html':'UTF-8'}px{/if};
                                            {if $layer.text_color}color:{$layer.text_color|escape:'html':'UTF-8'};{/if}
                                            {if $layer.font_family}font-family:'{$layer.font_family|escape:'html':'UTF-8'}';{/if}
                                            {if $layer.font_weight}font-weight:{$layer.font_weight|escape:'html':'UTF-8'};{/if}
                                            {if $layer.background_color}background-color:{$layer.background_color|escape:'html':'UTF-8'};{/if}
                                            {if $layer.text_decoration}text-decoration:{$layer.text_decoration|escape:'html':'UTF-8'};{/if}
                                            {if $layer.text_transform}text-transform:{$layer.text_transform|escape:'html':'UTF-8'};{/if}
                                            {if $layer.padding}padding:{$layer.padding|escape:'html':'UTF-8'};{/if}
                                        ">{$layer.content_layer nofilter}</span>
                                    {elseif $layer.layer_type=='button'}
                                        {if $layer.link}<a href="{$layer.link|escape:'html':'UTF-8'}">{/if}<span style="
                                            {if $layer.font_size}font-size:{$layer.font_size|escape:'html':'UTF-8'}px{/if};
                                            {if $layer.text_color}color:{$layer.text_color|escape:'html':'UTF-8'};{/if}
                                            {if $layer.font_family}font-family:'{$layer.font_family|escape:'html':'UTF-8'}';{/if}
                                            {if $layer.font_weight}font-weight:{$layer.font_weight|escape:'html':'UTF-8'};{/if}
                                            {if $layer.background_color}background-color:{$layer.background_color|escape:'html':'UTF-8'};{/if}
                                            {if $layer.text_decoration}text-decoration:{$layer.text_decoration|escape:'html':'UTF-8'};{/if}
                                            {if $layer.padding}padding:{$layer.padding|escape:'html':'UTF-8'};{/if}
                                            {if $layer.box_radius}border-radius:{$layer.box_radius|intval}px;{/if}
                                        ">{$layer.content_layer nofilter}</span>{if $layer.link|escape:'html':'UTF-8'}</a>{/if}
                                    {/if}
                                </div>
                            {/if}
                        {/foreach}                        
                    {/if}
                </li>
            {/foreach}
        </ul>
        {if $mls_configs.ETS_MLS_ENABLE_LOADING_ICON}
            <div class="mls_loading_icon" style="{if $mls_configs.ETS_MLS_SLIDER_BACKGROUND}background-color: {$mls_configs.ETS_MLS_SLIDER_BACKGROUND|escape:'html':'UTF-8'};{else}#000000;{/if}"><img src="{$mls_img_base_dir|escape:'html':'UTF-8'}ajax-loader.gif" alt=""/></div>
        {/if}
        {if $mls_configs.ETS_MLS_ENABLE_NEXT_PREV}
            <div class="mls_nav">
                <div class="mls_prev" style="{if $mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR}background-color: {$mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR|escape:'html':'UTF-8'};{/if}">
                {l s='Prev' mod='ets_multilayerslider'}</div>
                <div class="mls_next" style="{if $mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR}background-color: {$mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR|escape:'html':'UTF-8'};{/if}">
                {l s='Next' mod='ets_multilayerslider'}</div>
            </div>
        {/if}
        {if $mls_configs.ETS_MLS_ENABLE_PAGINATION}
            <div class="mls_pagination">
                {assign var='ik' value=0}
                {foreach from=$mls_slides item='slide'}
                    {assign var='ik' value=$ik+1}
                    <div class="mls_pag_button mls_pag_{$ik|intval}" style="background-color: {if isset($mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR) && $mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR}{$mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR|escape:'html':'UTF-8'};{/if} {if isset($mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR) && $mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR}border-color:{$mls_configs.ETS_MLS_SLIDER_BUTTON_COLOR|escape:'html':'UTF-8'};{/if}" data-slide-order="{$ik|intval}" data-id-slide="{$slide.id_slide|intval}">{$ik|intval}</div>
                {/foreach}
            </div>
        {/if}
    </div>
    </div>
    </div>
{/if}
{if !$mls_slides && $mls_backend_load}
    <div class="alert alert-warning">{l s='No active slides available' mod='ets_multilayerslider'}</div>
{/if}