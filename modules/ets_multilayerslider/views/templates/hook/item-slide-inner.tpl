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
<div class="action">
    <span data-title="&#xE14C;" class="mls_slide_delete" title="{l s='Delete this item' mod='ets_multilayerslider'}">{l s='Delete' mod='ets_multilayerslider'}</span>
    <span data-title="&#xE14D;" class="mls_slide_duplicated" title="{l s='Duplicate this slide' mod='ets_multilayerslider'}">{l s='Duplicate' mod='ets_multilayerslider'}</span>    
    <span data-title="&#xE150;" class="mls_slide_edit">{l s='Edit' mod='ets_multilayerslider'}</span>
</div>
<div class="msl_layer_wrapper" data-width="{$sliderWidth|intval}" data-height="{$sliderHeight|intval}" style="position: relative;width:{$sliderWidth|intval}px;height:{$sliderHeight|intval}px;{if $slide.link_img} background-image: url('{$slide.link_img|escape:'html':'UTF-8'}');background-repeat: {if $slide.repeat_x&&$slide.repeat_y}repeat{elseif $slide.repeat_x}repeat-x{elseif $slide.repeat_y}repeat-y{else}no-repeat{/if};{/if}{if $slide.backgroud_color} background-color:{$slide.backgroud_color|escape:'html':'UTF-8'}; {/if}">
    {if isset($slide.layers) && $slide.layers}
        {foreach from=$slide.layers item='layer'}
            {hook h='displayMLSLayer' layer=$layer layout=$mls_layout}
        {/foreach}
    {/if}
</div>     