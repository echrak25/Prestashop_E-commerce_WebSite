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
{if $tags}
    <div class="block ybc_block_tag {$blog_config.YBC_BLOG_FREE_RTL_CLASS|escape:'html':'UTF-8'}">
        <h4 class="title_blog title_block">{l s='Blog tags' mod='ybc_blog_free'}</h4>
            {assign var='totalTags' value=count($tags)}
            {assign var='ik' value=0}
            <div class="content_block block_content">
                <div class="blog_tag">
                    {foreach from=$tags item='tag'}
                        {assign var='ik' value=$ik+1}
                        <a class="{if $tag.viewed > 10000}tag_10000{elseif $tag.viewed > 1000}tag_1000{elseif $tag.viewed > 500}tag_500{elseif $tag.viewed > 100}tag_100{elseif $tag.viewed > 10}tag_10{elseif $tag.viewed > 5}tag_5{elseif $tag.viewed > 1}tag_1{elseif $tag.viewed <= 0}tag_0{/if} ybc-blog-tag-a" href="{$tag.link|escape:'html':'UTF-8'}">{$tag.tag|escape:'html':'UTF-8'}</a>                        
                    {/foreach}
                </div>
                <!-- Tags: 10000, 1000, 500, 100, 10, 5, 1, 0 -->
            </div>
    </div>
{/if}