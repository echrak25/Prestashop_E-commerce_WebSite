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
<div id="module-modal-confirm-{$module.name|escape:'html':'UTF-8'}-{$action|escape:'html':'UTF-8'}" class="modal modal-vcenter fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title module-modal-title">
                    {if $action == 'reset'}
                        {l s='Reset module?' mod='prestaheroconnect'}
                    {elseif $action == 'uninstall'}
                        {l s='Uninstall module?' mod='prestaheroconnect'}
                    {elseif $action == 'disable'}
                        {l s='Disable module?' mod='prestaheroconnect'}
                    {else}

                    {/if}
                </h4>
            </div>
            <div class="modal-body row">
                <div class="col-md-12">
                    <p>
                    {if $action == 'reset'}
                        {l s='You\'re about to reset' mod='prestaheroconnect'} {$module.displayName|escape:'html':'UTF-8'} {l s='module' mod='prestaheroconnect'}
                        <br/>
                        {l s='This will restore the defaults settings.' mod='prestaheroconnect'}
                        <span class="italic red">
                            {l s='This action cannot be undone.' mod='prestaheroconnect'}
                        </span>
                    {elseif $action == 'uninstall'}
                        {l s='You\'re about to uninstall' mod='prestaheroconnect'} {$module.displayName|escape:'html':'UTF-8'} {l s='module' mod='prestaheroconnect'}
                        <br/>
                        {l s='This will definitely disable the module and delete all its files.' mod='prestaheroconnect'}
                        <span class="italic red">
                            {l s='This action cannot be undone.' mod='prestaheroconnect'}
                        </span>
                    {elseif $action == 'disable'}
                        {l s='You\'re about to disable' mod='prestaheroconnect'} {$module.displayName|escape:'html':'UTF-8'} {l s='module' mod='prestaheroconnect'}
                        <br/>
                        {l s='Your current settings will be saved, but the module will no longer be active.' mod='prestaheroconnect'}
                    {else}

                    {/if}
                    </p>
                    {if $action == 'uninstall' && $is17}
                    <div class="checkbox ph-con-checkbox-delete-module-popup">
                        <label>
                            <input type="checkbox" value="1" name="delete_module">
                            {l s='Optional: Delete module folder after uninstall.' mod='prestaheroconnect'}
                        </label>
                    </div>
                    {/if}
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="{l s='Cancel' mod='prestaheroconnect'}">
                <a class="btn btn-primary js-ph-con-accept-action" href="javascript:void(0)" data-dismiss="modal"
                   data-tech-name="{$module.name|escape:'html':'UTF-8'}" data-action="{$action|escape:'html':'UTF-8'}">
                    {if $action == 'reset'}
                        {l s='Yes, reset it?' mod='prestaheroconnect'}
                    {elseif $action == 'uninstall'}
                        {l s='Yes, uninstall it?' mod='prestaheroconnect'}
                    {elseif $action == 'disable'}
                        {l s='Yes, disable it?' mod='prestaheroconnect'}
                    {else}

                    {/if}
                </a>
            </div>
        </div>
    </div>
</div>