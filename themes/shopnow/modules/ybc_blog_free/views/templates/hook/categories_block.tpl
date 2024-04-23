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
{if $categories}
    <div class="block ybc_block_categories {$blog_config.YBC_BLOG_FREE_RTL_CLASS|escape:'html':'UTF-8'}">
        <h4 class="title_blog title_block">{l s='Blog categories' mod='ybc_blog_free'}</h4>    
        <div class="content_block block_content">
            <ul>
                {foreach from=$categories item='cat'}
                    <li {if $cat.id_category==$active}class="active"{/if}>
                        <a href="{$cat.link|escape:'html':'UTF-8'}">{$cat.title|escape:'html':'UTF-8'}</a>
                    </li>
                {/foreach}
            </ul>
        </div>    
    </div>
{/if}