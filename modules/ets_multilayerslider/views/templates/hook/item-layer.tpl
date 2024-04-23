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
{if isset($layer) && $layer && $layer.layer_type=='image' && $layer.image || $layer.layer_type!='image'&&$layer.content_layer}
    <div class="msl_layer item{$layer.id_layer|intval} layer_layout_{$mls_layout|escape:'html':'UTF-8'} mls_layer_type_{$layer.layer_type|escape:'html':'UTF-8'}" style="position: absolute; 
        {if $mls_layout=='rtl' && $mls_multilayout} 
            right:{$layer.right|escape:'html':'UTF-8'}px; top:{$layer.top_right|escape:'html':'UTF-8'}px; left: auto;
        {else}
            left:{$layer.left|escape:'html':'UTF-8'}px; top:{$layer.top|escape:'html':'UTF-8'}px; right: auto;
        {/if} float:left; bottom: auto; z-index: {$layer.sort_order|intval};" data-id-layer="{$layer.id_layer|intval}" 
        data-animation-in="{$layer.animation_in|escape:'html':'UTF-8'}" 
        data-animation-out="{$layer.animation_out|escape:'html':'UTF-8'}" 
        data-move-in="{$layer.move_in|escape:'html':'UTF-8'}" 
        data-move-out="{$layer.move_out|escape:'html':'UTF-8'}" 
        data-start-delay="{$layer.start_delay|escape:'html':'UTF-8'}" 
        data-stand-duration="{$layer.stand_duration|escape:'html':'UTF-8'}"
        data-left="{$layer.left|floatval}"
        data-right="{$layer.right|floatval}"
        data-top="{$layer.top|floatval}"
        data-top-rtl="{$layer.top_right|floatval}"
        >
        {if $layer.layer_type=='image'}
            <img class="spot" src="{$layer.link_image|escape:'html':'UTF-8'}" style="{if $layer.width}width: {$layer.width|floatval}px;{/if}{if $layer.height}height: {$layer.height|floatval}px;{/if}" />
        {elseif $layer.layer_type=='text' || $layer.layer_type=='link'}
            <span style="
                {if $layer.font_size}font-size:{$layer.font_size|escape:'html':'UTF-8'}px{/if};
                {if $layer.text_color}color:{$layer.text_color|escape:'html':'UTF-8'};{/if}
                {if $layer.font_family}font-family:{$layer.font_family|escape:'html':'UTF-8'};{/if}
                {if $layer.font_weight}font-weight:{$layer.font_weight|escape:'html':'UTF-8'};{/if}
                {if $layer.text_decoration}text-decoration:{$layer.text_decoration|escape:'html':'UTF-8'};{/if}
                {if $layer.text_transform}text-transform:{$layer.text_transform|escape:'html':'UTF-8'};{/if}
            ">{$layer.content_layer nofilter}</span>
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
            <span style="
                {if $layer.font_size}font-size:{$layer.font_size|escape:'html':'UTF-8'}px{/if};
                {if $layer.text_color}color:{$layer.text_color|escape:'html':'UTF-8'};{/if}
                {if $layer.font_family}font-family:'{$layer.font_family|escape:'html':'UTF-8'}';{/if}
                {if $layer.font_weight}font-weight:{$layer.font_weight|escape:'html':'UTF-8'};{/if}
                {if $layer.background_color}background-color:{$layer.background_color|escape:'html':'UTF-8'};{/if}
                {if $layer.text_decoration}text-decoration:{$layer.text_decoration|escape:'html':'UTF-8'};{/if}
                {if $layer.padding}padding:{$layer.padding|escape:'html':'UTF-8'};{/if}
                {if $layer.box_radius}border-radius:{$layer.box_radius|intval}px;{/if}
            ">{$layer.content_layer nofilter}</span>
        {/if}
    </div>
{/if}