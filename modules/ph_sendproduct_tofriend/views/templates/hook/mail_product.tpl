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

{if isset($message) && !empty($message)}
    <p>With message: <i>{$message nofilter}<i></p>
{/if}
<div class="product" style="display: flex; flex-direction: row; width: 100%; border: 1px solid #e7e7e7">
    <div class="col-md-3">
        <img class="product-image" style="max-width: 150px" src="{$product_image_link|escape:'html':'UTF-8'}" alt="{$product_name|escape:'html':'UTF-8'}">
    </div>
    <div class="col-md-6">
        <h6 class="h6 product-name" style="font-size: 15px">{$product_name|escape:'html':'UTF-8'}</h6>
        <p style="color: #03a9f4;" class="product-price">{$product_price|escape:'html':'UTF-8'}</p>
    </div>
</div>