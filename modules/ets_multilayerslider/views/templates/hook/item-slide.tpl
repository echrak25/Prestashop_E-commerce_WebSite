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
{if isset($slide) && $slide}    
    <li class="mls_slides_li item{$slide.id_slide|intval} {if !$slide.enabled}mls_disabled{/if}" data-id-slide="{$slide.id_slide|intval}" data-obj="slide">
         <span class="title-silde" ><span>{if $slide.title}{$slide.title|escape:'html':'UTF-8'}{else}{$slide.id_slide|intval}{/if}</span></span>
         <div class="slide-content">
             <div class="left-block col-lg-9" >
                <div class="left-content">
                    {hook h='displayMLSSlideInner' slide=$slide layout=$mls_layout}               
                </div>
             </div>
             <div class="right-block col-lg-3">
                <h2 data-title="&#xE3C4;">{l s='Layers' mod='ets_multilayerslider'}</h2>
                <div data-title="&#xE145;" class="mls_add_layer btn btn-default" data-id-slide="{$slide.id_slide|intval}">{l s='Add new layer' mod='ets_multilayerslider'}</div>
                <ul id="layers_slide{$slide.id_slide|intval}" class="mls_layers_ul">
                    {if isset($slide.layers) && $slide.layers}
                        {foreach from=$slide.layers item='layer'}
                            {hook h='displayMLSLayerSort' layer=$layer}
                        {/foreach}
                    {/if}
                </ul>
             </div>
         </div>
    </li>
{/if}