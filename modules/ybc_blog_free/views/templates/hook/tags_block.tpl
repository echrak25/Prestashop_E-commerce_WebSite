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