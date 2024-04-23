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
{if !isset($select) ||  $select}
<select name="customer[last_action]" class="custom-select" id="customer_last_action">
    <option value="">{l s='Search action' mod='ets_trackingcustomer'}</option>
{/if}
    {foreach from=$actions item='action'}
        <option value="{$action.active|escape:'html':'UTF-8'}"{if isset($last_action_selected) && $last_action_selected==$action.active} selected="selected"{/if}>{$action.title|escape:'html':'UTF-8'}</option>
    {/foreach}
{if !isset($select) ||  $select}
</select>
{/if}