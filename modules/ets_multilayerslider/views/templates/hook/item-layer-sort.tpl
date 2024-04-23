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
{if isset($layer) && $layer}
    <li data-id-layer="{$layer.id_layer|intval}" class="mls_layers_li item{$layer.id_layer|intval}" data-obj="layer">
        {if $layer.layer_type=='image'}
            <img src="{$layer.link_image|escape:'html':'UTF-8'}" width="40px" />
        {elseif $layer.content_layer|strip_tags|trim|escape:'html':'UTF-8'}
            {$layer.content_layer|strip_tags|truncate:25:"..."|escape:'html':'UTF-8'}
        {else}
            #{$layer.id_layer|intval}
        {/if}
        <span data-title="&#xE14D;" class="mls_layer_duplicate" title="{l s='Duplicate this layer' mod='ets_multilayerslider'}">{l s='Duplicate' mod='ets_multilayerslider'}</span>
        <span data-title="&#xE872;" class="mls_layer_delete" title="{l s='Delete this layer' mod='ets_multilayerslider'}">{l s='Delete' mod='ets_multilayerslider'}</span>
        <span data-title="&#xE150;" class="mls_layer_edit" title="{l s='Edit this layer' mod='ets_multilayerslider'}">{l s='Edit' mod='ets_multilayerslider'}</span>
    </li>
{/if}