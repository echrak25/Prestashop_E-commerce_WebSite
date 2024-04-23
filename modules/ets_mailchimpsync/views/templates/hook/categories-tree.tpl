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
{if isset($categories) && $categories}
    {foreach from=$categories item='category'}
        {if $category.id_category!=$rootCategoryId}<option {if $selectedCategoryId==$category.id_category}selected="selected"{/if} value="{$category.id_category|intval}">{if $categoryLevel}{for $ik=1 to (int)$categoryLevel}- {/for}{/if}{$category.name|escape:'html':'UTF-8'}</option>{/if}
        {if isset($category.sub) && $category.sub}{$category.sub nofilter}{/if}
    {/foreach}
{/if}