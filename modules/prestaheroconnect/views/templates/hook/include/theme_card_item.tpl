{*
* 2007-2024 PrestaHero
*
* NOTICE OF LICENSE
*
* This file is not open source! Each license that you purchased is only available for 1 website only.
* If you want to use this file on more websites (or projects), you need to purchase additional licenses.
* You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please, contact us for extra customization service at an affordable price
*
*  @author PrestaHero <etssoft.jsc@gmail.com>
*  @copyright  2007-2024 PrestaHero
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of PrestaHero
*}
{if isset($item.image) && $item.image}
    <a class="module_themeimage" href="{if isset($item.uri)}{$item.uri|escape:'quotes':'UTF-8'}&utm_medium=image{/if}" target="_blank">
        <img src="{$item.image|escape:'html':'UTF-8'}" />
    </a>
{/if}
<div class="module-card-item theme-card-item" data-theme="{$item.name|escape:'html':'UTF-8'}" data-product-id="{$item.id_product|escape:'html':'UTF-8'}"
     data-display-name="{$item.display_name|escape:'html':'UTF-8'}" data-uri="{$item.uri|escape:'quotes':'UTF-8'}">
    <div class="item-wrapper">
        <div class="module-img"{if !$item.logo} style="background-color: {$item.img_color|escape:'html':'UTF-8'}"{/if}>
            <a href="{if isset($item.uri)}{$item.uri|escape:'quotes':'UTF-8'}&utm_medium=logo{/if}" target="_blank">
            {if $item.logo}
                <img src="{$item.logo|escape:'quotes':'UTF-8'}" alt="{$item.name|escape:'html':'UTF-8'}">
            {else}
                <div class="img-fancy" style="background-color: {$item.img_color|escape:'html':'UTF-8'}">
                    {$item.first_char|escape:'html':'UTF-8'}
                </div>
            {/if}
            </a>
        </div>
        <h3 class="module-name">{$item.display_name|escape:'html':'UTF-8'}</h3>
        <div class="module-entry-data">
            {if $item.version}
                <span>v{$item.version|escape:'html':'UTF-8'}</span>
            {/if}
            {if $item.manufacturer_name}
                -
                <span>{l s='by' mod='prestaheroconnect'}</span>
                <span>{$item.manufacturer_name|escape:'html':'UTF-8'}</span>
            {/if}
        </div>
        <div class="module-desc">
            <span>{$item.description|escape:'html':'UTF-8'}</span>
            <div class="extra-action">
                <a href="{if isset($item.uri)}{$item.uri|escape:'quotes':'UTF-8'}&utm_medium=readmore{/if}" target="_blank"
                   class="module-read-more">{l s='Read more' mod='prestaheroconnect'}</a>
            </div>
        </div>

        <div class="module-badges">
        </div>
        <div class="module-pos-bottom">
            <div class="module-compliancy">
                {if (isset($item.min_ps_version) && $item.min_ps_version) || (isset($item.max_ps_version) && $item.max_ps_version)}
                    <i class="ets_connect_ps_icon"></i>
                    {l s='Compatible with: ' mod='prestaheroconnect'}
                    {if isset($item.compatibility) && $item.compatibility}
                        <span>{$item.compatibility|escape:'html':'UTF-8'}</span>
                    {else}
                        {if isset($item.min_ps_version) && $item.min_ps_version}
                            <span>{$item.min_ps_version|escape:'html':'UTF-8'}</span>
                        {elseif isset($item.max_ps_version) && $item.max_ps_version}
                            <span>{$item.max_ps_version|escape:'html':'UTF-8'}</span>
                        {/if}
                        {if isset($item.max_ps_version) && $item.max_ps_version}
                            {if isset($item.min_ps_version) && $item.min_ps_version}
                                {l s='to' mod='prestaheroconnect'}
                                <span>{$item.max_ps_version|escape:'html':'UTF-8'}</span>
                            {else}
                                {l s='and lower' mod='prestaheroconnect'}
                            {/if}
                        {else}
                            {if isset($item.min_ps_version) && $item.min_ps_version}
                                {l s='and higher' mod='prestaheroconnect'}
                            {/if}
                        {/if}
                    {/if}
                {else}
                    <span><i class="ets_connect_ps_icon"></i> {l s='Compatible with: 1.4.x to 1.7.x' mod='prestaheroconnect'}</span>
                {/if}
            </div>
            <div class="module-line"></div>
            {if  $item.avg_rating!=0}
                <div class="module-rating">
                    <div class="avg-rating">
                        <span class="rating-star" data-avg-rating="{$item.avg_rating|escape:'html':'UTF-8'}"></span>
                    </div>
                    <div class="total-rating">({$item.total_rating|escape:'html':'UTF-8'})</div>
                </div>
            {/if}
            {if isset($item.price)}
                <div class="module-price-wrapper">
                    {if $item.reduction && $item.price_number > 0}
                        {if $item.price_without_reduction}
                            <div class="module-price-without-reduction">{$item.price_without_reduction|escape:'html':'UTF-8'}</div>
                        {/if}
                        {if $item.reduction}
                            <div class="module-price-reduction">{$item.reduction|escape:'html':'UTF-8'}</div>
                        {/if}
                    {/if}
                    {if $item.price_number > 0}
                        <div class="module-price">{$item.price|escape:'html':'UTF-8'}</div>
                    {else}
                        <div class="module-price">{l s='Free Download' mod='prestaheroconnect'}</div>
                    {/if}
                </div>
            {/if}
            <div class="module-footer footer-action-module js-ph-con-group-btn-action" data-theme="{$item.name|escape:'html':'UTF-8'}">
                {if $item.is_installed && !$item.to_upgrade}
                    <a href="{$item.store_url nofilter}" target="_blank" class="btn btn-default js-btn-view-store">{l s='View store' mod='prestaheroconnect'}</a>
                {elseif $item.to_upgrade}
                    <a href="{$item.uri nofilter}" target="_blank" class="btn btn-default js-btn-view-store">{l s='Upgrade theme' mod='prestaheroconnect'}</a>
                {else}
                    <a href="{$item.uri nofilter}&utm_medium=buynow" target="_blank" class="btn btn-default js-btn-buy-module">{l s='Download from PrestaHero' mod='prestaheroconnect'}</a>
                {/if}
            </div>
        </div>
    </div>
</div>