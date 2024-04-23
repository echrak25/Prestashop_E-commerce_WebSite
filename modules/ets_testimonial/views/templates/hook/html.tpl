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
{if $html_tag}
<{$html_tag|escape:'html':'UTF-8'}
    {if $class} class="{$class|escape:'html':'UTF-8'}"{/if}
    {if $id} id="{$id|escape:'html':'UTF-8'}"{/if}
    {if $rel} rel="{$rel|escape:'html':'UTF-8'}"{/if}
    {if $type} type="{$type|escape:'html':'UTF-8'}"{/if}
    {if $data_id_product} data-id_product="{$data_id_product|escape:'html':'UTF-8'}"{/if}
    {if $value} value="{$value|escape:'html':'UTF-8'}"{/if}
    {if $href} href="{$href nofilter}"{/if}{if $html_tag=='a' && $blank} target="_blank"{/if}
    {if $html_tag=='img' && $src} src="{$src nofilter}"{/if}
    {if $name} name="{$name|escape:'html':'UTF-8'}"{/if}
    {if $attr_datas}
        {foreach from=$attr_datas item='data'}
            {$data.name|escape:'html':'UTF-8'}="{$data.value|escape:'html':'UTF-8'}"
        {/foreach}
    {/if}
    {if $html_tag=='img' || $html_tag=='br' || $html_tag=='input'} /{/if}
    
>
    {/if}{if $html_tag && $html_tag!='img' && $html_tag!='input' && $html_tag!='br' && !is_null($html_content)}{$html_content nofilter}{/if}{if $html_tag && $html_tag!='img' && $html_tag!='input' && $html_tag!='br'}</{$html_tag|escape:'html':'UTF-8'}>{/if}