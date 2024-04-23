{*
* Copyright ETS Software Technology Co., Ltd
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
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
*}

{extends file="helpers/form/form.tpl"}
{block name="input"}
    {if $input.type == 'button'}
        <span id="ets_sc_reset" value="1" class="btn btn-default ets_reset">
            <i class="process-icon-reset" style="font-size: 12px; height: 11px"></i>
            <span style="font-size: 12px;">{l s='Reset color' mod='ets_savemycart'}</span>
        </span>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
{block name="other_fieldsets"}
    <script>
        var baseAdminUrl = "{$baseAdminUrl|escape:'quotes':'UTF-8'}";
    </script>
{/block}






