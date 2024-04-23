{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if isset($block) && $block && $block.enabled}    
    <div class="ets_mm_block mm_block_type_{strtolower($block.block_type)|escape:'html':'UTF-8'} {if !$block.display_title}mm_hide_title{/if}">
        <h4>{if $block.title_link}<a href="{$block.title_link|escape:'html':'UTF-8'}">{/if}{$block.title|escape:'html':'UTF-8'}{if $block.title_link}</a>{/if}</h4>
        <div class="ets_mm_block_content">        
            {if $block.block_type=='CATEGORY'}
                {if isset($block.categoriesHtml)}{$block.categoriesHtml nofilter}{/if}
            {elseif $block.block_type=='MNFT'}
                {if isset($block.manufacturers) && $block.manufacturers}
                    <ul>
                        {foreach from=$block.manufacturers item='manufacturer'}
                            <li><a href="{$manufacturer.link|escape:'html':'UTF-8'}">{$manufacturer.label|escape:'html':'UTF-8'}</a></li>
                        {/foreach}
                    </ul>
                {/if}
            {elseif $block.block_type=='CMS'}
                {if isset($block.cmss) && $block.cmss}
                    <ul>
                        {foreach from=$block.cmss item='cms'}
                            <li><a href="{$cms.link|escape:'html':'UTF-8'}">{$cms.label|escape:'html':'UTF-8'}</a></li>
                        {/foreach}
                    </ul>
                {/if}
            {elseif $block.block_type=='IMAGE'}
                {if isset($block.image) && $block.image}{if $block.image_link}<a href="{$block.image_link|escape:'html':'UTF-8'}">{/if}<img src="{$block.image|escape:'html':'UTF-8'}" alt="{$block.title|escape:'html':'UTF-8'}" />{if $block.image_link}</a>{/if}{/if}
            {elseif $block.block_type=='PRODUCT'}
                {if isset($block.productsHtml)}{$block.productsHtml nofilter}{/if}
            {else}
                {$block.content nofilter}
            {/if}
        </div>
    </div>
{/if}