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

<div class="ph-con-list-modules">
    <div class="container">
        <div class="ph-con-header-des">
            {if $phLogo}
            <a href="https://prestahero.com/{$requestLang|escape:'quotes':'UTF-8'}/?utm_medium=prestaheroconnect" target="_blank"><img src="{$phLogo|escape:'quotes':'UTF-8'}" class="ph-con-logo-lg"/></a>
            {/if}
            <div class="desc">{$phDesc nofilter}</div>
        </div>
        {if $alertNoConnect}
            {$alertNoConnect nofilter}
        {/if}
        {if $notificationType && $notificationContent}
            <div class="ph-con-notification">
                <div class="alert alert-{$notificationType|escape:'html':'UTF-8'}">
                    {$notificationContent nofilter}
                </div>
            </div>
        {/if}
        {if $phModules}
        <div class="ph-con-list-tabs">
            <ul class="list-tabs">
                <li class="active">
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="all">{l s='All modules' mod='prestaheroconnect'}
                        <span class="nb_module_all">({$moduleCounter.all|escape:'html':'UTF-8'})</span></a>
                </li>
                {if $moduleCounter.to_upgrade}
                <li>
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="to_upgrade">{l s='To upgrade' mod='prestaheroconnect'}
                        (<span class="nb_module_upgrade">{$moduleCounter.to_upgrade|escape:'html':'UTF-8'}</span>)</a>
                </li>
                {/if}
                {if $moduleCounter.must_have}
                <li>
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="must_have">{l s='Must-have' mod='prestaheroconnect'}
                        (<span class="nb_module_must_have">{$moduleCounter.must_have|escape:'html':'UTF-8'}</span>)</a>
                </li>
                {/if}

                {if $moduleCounter.installed}
                <li>
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="installed">{l s='Installed' mod='prestaheroconnect'}
                        (<span class="nb_module_installed">{$moduleCounter.installed|escape:'html':'UTF-8'}</span>)</a>
                </li>
                {/if}
                {if $moduleCounter.free}
                <li>
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="free">{l s='Free modules' mod='prestaheroconnect'}
                        (<span class="nb_module_free">{$moduleCounter.free|escape:'html':'UTF-8'}</span>)</a>
                </li>
                {/if}
                {if $moduleCounter.theme}
                    <li>
                        <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                           data-tab="theme">{l s='Themes' mod='prestaheroconnect'}
                            (<span class="nb_theme_all">{$moduleCounter.theme|escape:'html':'UTF-8'}</span>)</a>
                    </li>
                {/if}
                {if $moduleCounter.downloaded}
                    <li>
                        <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                           data-tab="downloaded">{l s='Downloaded' mod='prestaheroconnect'}
                            (<span class="nb_module_downloaded">{$moduleCounter.downloaded|escape:'html':'UTF-8'}</span>)</a>
                    </li>
                {/if}
                <li class="hide">
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="purchased">{l s='Purchased' mod='prestaheroconnect'}
                        (<span class="nb_module_purchased">0</span>)</a>
                </li>
            </ul>
            <div class="ph-con-list-search">
                <div class="ph-con-list-search-form">
                    <input type="text" id="ph-con-box-search-module" placeholder="{l s='Search for modules or themes' mod='prestaheroconnect'}"/>
                    <button class="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        {/if}
    </div>
    <div class="wrapper-content">
        
            <div class="container ph-con-list-content-modules" data-active="all">
            {if $phModules}
                <div class="row">
                
                    {foreach $phModules as $item}
                        {if isset($item['is_module']) && $item['is_module']|intval > 0}
                        <div class="col-lg-3 col-md-4 col-xs-6 ph-con-list-modules-item{if $item.is_must_have} must_have{/if}{if !$item.to_buy} downloaded{/if}{if $item.is_installed && ($item.to_upgrade || $item.upgrade_from_server)} to_upgrade{/if}
                            {if !$item.price_number} free{/if}
                            {if $item.is_installed} installed{/if}
                        ">
                            {include './include/module_card_item.tpl' item=$item}
                        </div>
                        {else}
                            <div class="col-lg-3 col-md-4 col-xs-6 ph-con-list-modules-item ph-con-list-themes-item theme">
                                {include './include/theme_card_item.tpl' item=$item}
                            </div>
                        {/if}
                    {/foreach}
                    <div class="alert alert-warning hide ph-con-not-found-item">{l s='No items found' mod='prestaheroconnect'}</div>
                    
                </div>
                {else}
                    <div class="alert alert-info ">{l s='No module available' mod='prestaheroconnect'}</div>
            {/if}
            </div>
        
            
    </div>
</div>
