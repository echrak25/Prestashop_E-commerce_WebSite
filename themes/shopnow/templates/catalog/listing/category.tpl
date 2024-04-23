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
{extends file='catalog/listing/product-list.tpl'}

{block name='product_list_header'}
    
    {if isset($tc_config.YBC_TC_LISTING_NAME_CAT) && $tc_config.YBC_TC_LISTING_NAME_CAT == 1}
        <h1 class="h1 title_category">{$category.name|escape:'html':'UTF-8'}</h1>
    {/if}
    {if isset($tc_config.YBC_TC_LISTING_IMAGE_BLOCK) && $tc_config.YBC_TC_LISTING_IMAGE_BLOCK == 1 || isset($tc_config.YBC_TC_LISTING_DESCRIPTION) && $tc_config.YBC_TC_LISTING_DESCRIPTION == 1}    
        <div class="block-category card card-block">
            {if $tc_config.YBC_TC_LISTING_IMAGE_BLOCK == 1}
                <div class="category-cover">
                  <img src="{$category.image.large.url|escape:'html':'UTF-8'}" alt="{$category.image.legend|escape:'html':'UTF-8'}">
                </div>
            {/if}
           {if $tc_config.YBC_TC_LISTING_DESCRIPTION == 1} 
          {if $category.description}
            <div id="category-description" class="text-muted">{$category.description nofilter}</div>
          {/if}
          {/if}
        </div>
    {/if}
{/block}
