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
<select name="id_view_selected" id="id_view_selected">
    {if $list_views}
        {foreach from=$list_views item='view'}
            <option data-fields="{$view.fields|escape:'html':'UTF-8'}" value="{$view.id_ets_tc_view|intval}"{if $id_view_selected==$view.id_ets_tc_view} selected="selected"{/if}>{$view.name|escape:'html':'UTF-8'}</option>
        {/foreach}
    {/if}
</select>