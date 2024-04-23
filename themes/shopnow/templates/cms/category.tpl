{*
* 2007-2022 ETS-Soft
*
* NOTICE OF LICENSE
*
* This file is not open source! Each license that you purchased is only available for 1 wesite only.
* If you want to use this file on more websites (or projects), you need to purchase additional licenses. 
* You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
* 
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs, please contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2022 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
{extends file='page.tpl'}

{block name='page_title'}
  {$cms_category.name|escape:'html':'UTF-8'}
{/block}

{block name='page_content'}
  {block name='cms_sub_categories'}
    {if $sub_categories}
      <p>{l s='List of sub categories in %name%:' d='Shop.Theme.Actions' sprintf=['%name%' => $cms_category.name]}</p>
      <ul>
        {foreach from=$sub_categories item=sub_category}
          <li><a href="{$sub_category.link|escape:'html':'UTF-8'}">{$sub_category.name|escape:'html':'UTF-8'}</a></li>
        {/foreach}
      </ul>
    {/if}
  {/block}

  {block name='cms_sub_pages'}
    {if $cms_pages}
      <p>{l s='List of pages in %name%:' d='Shop.Theme.Actions' sprintf=['%name%' => $cms_category.name]}</p>
      <ul>
        {foreach from=$cms_pages item=cms_page}
          <li><a href="{$cms_page.link|escape:'html':'UTF-8'}">{$cms_page.meta_title|escape:'html':'UTF-8'}</a></li>
        {/foreach}
      </ul>
    {/if}
  {/block}
{/block}
