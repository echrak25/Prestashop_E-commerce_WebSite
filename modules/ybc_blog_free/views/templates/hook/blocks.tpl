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
{if isset($blog_config.YBC_BLOG_FREE_SHOW_CATEGORIES_BLOCK) && $blog_config.YBC_BLOG_FREE_SHOW_CATEGORIES_BLOCK}
{hook h='blogCategoriesBlock'}
{/if}
{if isset($blog_config.YBC_BLOG_FREE_SHOW_SEARCH_BLOCK) && $blog_config.YBC_BLOG_FREE_SHOW_SEARCH_BLOCK}
{hook h='blogSearchBlock'}
{/if}
{if isset($blog_config.YBC_BLOG_FREE_SHOW_LATEST_NEWS_BLOCK) && $blog_config.YBC_BLOG_FREE_SHOW_LATEST_NEWS_BLOCK}
{hook h='blogNewsBlock'}
{/if}
{if isset($blog_config.YBC_BLOG_FREE_SHOW_POPULAR_POST_BLOCK) && $blog_config.YBC_BLOG_FREE_SHOW_POPULAR_POST_BLOCK}
{hook h='blogPopularPostsBlock'}
{/if}
{if isset($blog_config.YBC_BLOG_FREE_SHOW_FEATURED_BLOCK) && $blog_config.YBC_BLOG_FREE_SHOW_FEATURED_BLOCK}
    {hook h='blogFeaturedPostsBlock'}
{/if}
{if isset($blog_config.YBC_BLOG_FREE_SHOW_TAGS_BLOCK) && $blog_config.YBC_BLOG_FREE_SHOW_TAGS_BLOCK}
{hook h='blogTagsBlock'}
{/if}
{if isset($blog_config.YBC_BLOG_FREE_SHOW_GALLERY_BLOCK) && $blog_config.YBC_BLOG_FREE_SHOW_GALLERY_BLOCK}
{hook h='blogGalleryBlock'}
{/if}