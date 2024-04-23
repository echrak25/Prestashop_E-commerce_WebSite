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
{if $page.page_name == 'ybc_blog_free_page'}
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
{/if}