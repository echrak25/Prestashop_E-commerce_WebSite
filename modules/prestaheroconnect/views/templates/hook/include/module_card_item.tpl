
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
<div class="module-card-item{if isset($item.support_module) && $item.support_module} support_module{/if}" data-module="{$item.name|escape:'html':'UTF-8'}"
     data-product-id="{$item.id_product|escape:'html':'UTF-8'}"
     data-can-download="{if !$item.is_installed && $item.to_buy}1{else}0{/if}"
     data-display-name="{$item.displayName|escape:'html':'UTF-8'}"
     data-can-install-from-server="{if !$item.price_number}1{else}0{/if}"
     data-uri="{$item.uri|escape:'quotes':'UTF-8'}" 
>
    {if isset($item.is_must_have) && $item.is_must_have}
        <span class="module-must-have">{l s='Must-have' mod='prestaheroconnect'}</span>
    {/if}
    <div class="item-wrapper">
        <div class="module-img"{if !$item.logo} style="background-color: {$item.img_color|escape:'html':'UTF-8'}"{/if}>
            <a href="{if isset($item.uri)}{$item.uri|escape:'quotes':'UTF-8'}&utm_medium=logo{/if}" target="_blank">
            {if $item.logo}
                <img src="{$item.logo|escape:'quotes':'UTF-8'}" alt="{$item.name|escape:'html':'UTF-8'}" />
            {else}
                <div class="img-fancy" style="background-color: {$item.img_color|escape:'html':'UTF-8'}">
                    {$item.first_char|escape:'html':'UTF-8'}
                </div>
            {/if}
            </a>
        </div>
        <h3 class="module-name">{$item.displayName|escape:'html':'UTF-8'}</h3>
        <div class="module-entry-data">
            {if $item.old_version}
                <span class="old_version" data-arow="→">v{$item.old_version|escape:'html':'UTF-8'} </span>
            {/if}
            {if $item.version}
                <span>v{$item.version|escape:'html':'UTF-8'}</span>
            {/if}
            {if $item.author}
                -
                <span>{l s='by' mod='prestaheroconnect'}</span>
                <span>{$item.author|escape:'html':'UTF-8'}</span>
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
            {if $item.avg_rating!=0}
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
            <div class="module-footer footer-action-module js-ph-con-group-btn-action"
                 data-module="{$item.name|escape:'html':'UTF-8'}"
                 data-install-link="{$item.actions.install|escape:'quotes':'UTF-8'}"
                 data-delete-link="{$item.actions.delete|escape:'quotes':'UTF-8'}"
            >
                {if $item.is_installed}
                    <div class="btn-group module-actions">
                        {if !$item.is_enabled}
                            <form class="" method="post"
                                  action="{$item.actions.enable|escape:'quotes':'UTF-8'}">
                                <button type="submit" class="btn dropdown-item module_action_menu_enable"
                                        data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-enable">
                                    {l s='Enable' mod='prestaheroconnect'}
                                </button>
                            </form>
                        {else}
                            {if $item.to_upgrade || $item.upgrade_from_server}
                                {if $item.upgrade_from_server}
                                    <form class="form_upgrade_from_ph" method="post"
                                          action="{$item.actions.upgrade_ph|escape:'quotes':'UTF-8'}">
                                        <button type="submit"
                                                class="btn btn-primary-reverse btn-outline-primary module_action_menu_upgrade upgrade_from_ph"
                                                data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-upgrade">
                                            {l s='Upgrade' mod='prestaheroconnect'}
                                        </button>
                                    </form>
                                {else}
                                    <form class="" method="post" action="{$item.actions.upgrade|escape:'quotes':'UTF-8'}">
                                        <button type="submit"
                                                class="btn btn-primary-reverse btn-outline-primary module_action_menu_upgrade"
                                                data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-upgrade">
                                            {l s='Upgrade' mod='prestaheroconnect'}
                                        </button>
                                    </form>
                                {/if}
                            {else}
                                {if $item.is_configurable}
                                    <a class="btn btn-primary-reverse btn-outline-primary"
                                       href="{$item.actions.configure|escape:'quotes':'UTF-8'}">
                                        {l s='Configure' mod='prestaheroconnect'}
                                    </a>
                                {else}
                                    <form class="" method="post"
                                          action="{$item.actions.disable|escape:'quotes':'UTF-8'}">
                                        <button type="submit" class="btn dropdown-item module_action_menu_disable"
                                                data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-disable">
                                            {l s='Disable' mod='prestaheroconnect'}
                                        </button>
                                    </form>
                                {/if}
                            {/if}

                        {/if}

                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            {if ($item.to_upgrade || $item.upgrade_from_server || !$item.is_enabled) && $item.is_configurable}
                                <li>
                                    <a class="dropdown-item" href="{$item.actions.configure|escape:'quotes':'UTF-8'}">
                                        {l s='Configure' mod='prestaheroconnect'}
                                    </a>
                                </li>
                            {/if}
                            {if $is17}
                                <li>
                                    <form class="" method="post"
                                          action="{$item.actions.uninstall|escape:'quotes':'UTF-8'}">
                                        <button type="submit" class="dropdown-item module_action_menu_uninstall"
                                                data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-uninstall">
                                            {l s='Uninstall' mod='prestaheroconnect'}
                                        </button>
                                    </form>
                                </li>
                            {/if}
                            {if $item.is_enabled}
                                {if $item.to_upgrade || $item.upgrade_from_server || $item.is_configurable}
                                    <li>
                                        <form class="" method="post"
                                              action="{$item.actions.disable|escape:'quotes':'UTF-8'}">
                                            <button type="submit" class="dropdown-item module_action_menu_disable"
                                                    data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-disable">
                                                {l s='Disable' mod='prestaheroconnect'}
                                            </button>
                                        </form>
                                    </li>
                                {/if}
                            {else}
                                {if $item.is_enabled && ($item.to_upgrade || $item.upgrade_from_server || $item.is_configurable)}
                                    <li>
                                        <form class="" method="post"
                                              action="{$item.actions.enable|escape:'quotes':'UTF-8'}">
                                            <button type="submit" class="dropdown-item module_action_menu_enable"
                                                    data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-enable">
                                                {l s='Enable' mod='prestaheroconnect'}
                                            </button>
                                        </form>
                                    </li>
                                {/if}
                            {/if}
                            {if $item.is_enabled}
                                {if $item.is_enabled_mobile}
                                    <li>
                                        <form class="" method="post"
                                              action="{$item.actions.disable_mobile|escape:'quotes':'UTF-8'}">
                                            <button type="submit"
                                                    class="dropdown-item module_action_menu_disable_mobile"
                                                    data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-disable_mobile">
                                                {if !$is17}{l s='Disable on mobiles' mod='prestaheroconnect'}{else}{l s='Disable mobile' mod='prestaheroconnect'}{/if}
                                            </button>
                                        </form>
                                    </li>
                                {else}
                                    <li>
                                        <form class="" method="post"
                                              action="{$item.actions.enable_mobile|escape:'quotes':'UTF-8'}">
                                            <button type="submit" class="dropdown-item module_action_menu_enable_mobile"
                                                    data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-enable_mobile">
                                                {if !$is17}{l s='Display on mobiles' mod='prestaheroconnect'}{else}{l s='Enable mobile' mod='prestaheroconnect'}{/if}
                                            </button>
                                        </form>
                                    </li>
                                {/if}
                                {if !$is17}
                                    {if $item.is_enabled_tablet}
                                        <li>
                                            <form class="" method="post"
                                                  action="{$item.actions.disable_tablet|escape:'quotes':'UTF-8'}">
                                                <button type="submit"
                                                        class="dropdown-item module_action_menu_disable_tablet"
                                                        data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-disable_tablet">
                                                    {l s='Disable on tablets' mod='prestaheroconnect'}
                                                </button>
                                            </form>
                                        </li>
                                    {else}
                                        <li>
                                            <form class="" method="post"
                                                  action="{$item.actions.enable_mobile|escape:'quotes':'UTF-8'}">
                                                <button type="submit"
                                                        class="dropdown-item module_action_menu_enable_mobile"
                                                        data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-enable_mobile">
                                                    {l s='Display on tablets' mod='prestaheroconnect'}
                                                </button>
                                            </form>
                                        </li>
                                    {/if}
                                    {if $item.is_enabled_desktop}
                                        <li>
                                            <form class="" method="post"
                                                  action="{$item.actions.disable_desktop|escape:'quotes':'UTF-8'}">
                                                <button type="submit"
                                                        class="dropdown-item module_action_menu_disable_desktop"
                                                        data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-disable_desktop">
                                                    {l s='Disable on computers' mod='prestaheroconnect'}
                                                </button>
                                            </form>
                                        </li>
                                    {else}
                                        <li>
                                            <form class="" method="post"
                                                  action="{$item.actions.enable_desktop|escape:'quotes':'UTF-8'}">
                                                <button type="submit"
                                                        class="dropdown-item module_action_menu_disable_desktop"
                                                        data-confirm_modal="">
                                                    {l s='Display on desktop' mod='prestaheroconnect'}
                                                </button>
                                            </form>
                                        </li>
                                    {/if}
                                {/if}
                                {if !$is17}
                                    <li>
                                        <form class="" method="post"
                                              action="{$item.actions.uninstall|escape:'quotes':'UTF-8'}">
                                            <button type="submit" class="dropdown-item module_action_menu_uninstall"
                                                    data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-uninstall">
                                                {l s='Uninstall' mod='prestaheroconnect'}
                                            </button>
                                        </form>
                                    </li>
                                {/if}
                                <li>
                                    <form class="" method="post" action="{$item.actions.reset|escape:'quotes':'UTF-8'}">
                                        <button type="submit" class="dropdown-item module_action_menu_reset"
                                                data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-reset">
                                            {l s='Reset' mod='prestaheroconnect'}
                                        </button>
                                    </form>
                                </li>
                            {/if}
                            {if !$is17}
                                <li>
                                    <form class="" method="post"
                                          action="{$item.actions.delete|escape:'quotes':'UTF-8'}">
                                        <button type="submit" class="dropdown-item module_action_menu_delete"
                                                data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-delete">
                                            {l s='Delete' mod='prestaheroconnect'}
                                        </button>
                                    </form>
                                </li>
                            {/if}
                        </ul>
                    </div>
                {else}
                    {if $item.to_buy}
                        {if !$item.price_number}
                            {if isset($item.support_module) && $item.support_module}
                                <button type="submit"
                                        class="btn btn-primary-reverse btn-outline-primary support_module module_action_menu_install js-btn-buy-module"
                                        data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-install">
                                    {l s='Install' mod='prestaheroconnect'}
                                </button>
                            {else}
                                <a href="#" data-module="{$item.name|escape:'html':'UTF-8'}"
                                   data-product-id="{if isset($item.id_product)}{$item.id_product|escape:'html':'UTF-8'}{/if}"
                                   class="btn btn-default js-ph-con-install-module-from-server">{l s='Install from PrestaHero' mod='prestaheroconnect'}</a>
                            {/if}
                        {else}
                            <a href="{$item.uri|escape:'quotes':'UTF-8'}&utm_medium=buynow" target="_blank"
                               class="btn btn-default js-btn-buy-module">{l s='Buy now' mod='prestaheroconnect'}</a>
                        {/if}

                    {else}
                        <div class="btn-group module-actions">
                            <form class="" method="post" action="{$item.actions.install|escape:'quotes':'UTF-8'}">
                                <button type="submit"
                                        class="btn btn-primary-reverse btn-outline-primary module_action_menu_install"
                                        data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-install">
                                    {l s='Install' mod='prestaheroconnect'}
                                </button>
                            </form>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <form class="" method="post"
                                          action="{$item.actions.delete|escape:'quotes':'UTF-8'}">
                                        <button type="submit" class="dropdown-item module_action_menu_delete"
                                                data-confirm_modal="module-modal-confirm-{$item.name|escape:'html':'UTF-8'}-delete">
                                            {l s='Delete' mod='prestaheroconnect'}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    {/if}
                {/if}
            </div>
            {if isset($item.support_module) && $item.support_module}
                <div class="ph-con-support-module-overload">
                    <div class="table">
                        <div class="table-cell">
                            <div class="ph-con-wrapper">
                                <span class="ph-con-close-popup"></span>
                                <div class="ph_con_support_module">
                                    <h3 class="title-block">{l s='Install module' mod='prestaheroconnect'}</h3>
                                    <div class="ph_con_support_module_des">Choose a method to install your selected module.</div>
                                    {$item.support_module|replace:'@productId@':$item.id_product|replace:'@moduleName@':$item.name nofilter}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
        </div>

    </div>
    {foreach $actionConfirm as $action}
        {include './modal_confirm_action.tpl' action=$action module=$item}
    {/foreach}
</div>