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
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">

{block name='head_seo'}
  <title>{block name='head_seo_title'}{$page.meta.title|escape:'html':'UTF-8'}{/block}</title>
  <meta name="description" content="{block name='head_seo_description'}{$page.meta.description|escape:'html':'UTF-8'}{/block}">
  <meta name="keywords" content="{block name='head_seo_keywords'}{$page.meta.keywords|escape:'html':'UTF-8'}{/block}">
  {if $page.meta.robots !== 'index'}
    <meta name="robots" content="{$page.meta.robots|escape:'html':'UTF-8'}">
  {/if}
  {if $page.canonical}
    <link rel="canonical" href="{$page.canonical|escape:'html':'UTF-8'}">
  {/if}
{/block}

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/vnd.microsoft.icon" href="{$shop.favicon|escape:'html':'UTF-8'}?{$shop.favicon_update_time|escape:'html':'UTF-8'}">
<link rel="shortcut icon" type="image/x-icon" href="{$shop.favicon|escape:'html':'UTF-8'}?{$shop.favicon_update_time|escape:'html':'UTF-8'}" />


{block name='stylesheets'}
  {include file="_partials/stylesheets.tpl" stylesheets=$stylesheets}
{/block}

{block name='javascript_head'}
  {include file="_partials/javascript.tpl" javascript=$javascript.head vars=$js_custom_vars}
{/block}

{block name='hook_header'}
  {$HOOK_HEADER nofilter}
{/block}
