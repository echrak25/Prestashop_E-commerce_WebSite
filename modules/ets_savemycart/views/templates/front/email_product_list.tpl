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
{foreach $list as $product}
    <tr>
        <td style="border:1px solid #D6D4D4;padding: 20px;color:#555454">
            <img width="60" src="{$product['image'] nofilter}" alt="{$product['name']|escape:'html':'UTF-8'}" />
        </td>
        <td style="border:1px solid #D6D4D4;padding: 20px;color:#555454">
            <strong>{$product['name']|escape:'html':'UTF-8'}</strong><br/>
            {if $product['reference']|trim != ''|escape:'html':'UTF-8'}<span style="color:#999999;font-size:8pt;">SKU: {$product['reference']|escape:'html':'UTF-8'}</span><br/>{/if}
            {if isset($product.attributes) && $product.attributes}
                {assign var='ik2' value=0}
                <span class="product_combination" style="color:#999999;font-size:8pt;">
                    {foreach from=$product.attributes item='attribute'}
                        {assign var='ik2' value=$ik2+1}
                        {$attribute.group_name|truncate:80:'...':true|escape:'html':'UTF-8'}: {$attribute.attribute_name|truncate:80:'...':true|escape:'html':'UTF-8'}
                        {if $ik2 < count($product.attributes)}, {/if}
                    {/foreach}
                </span>
            {/if}
        </td>
        <td style="border:1px solid #D6D4D4;padding: 20px;color:#555454">
            {if $product['is_available']}Yes{else}No{/if}
        </td>
        <td style="border:1px solid #D6D4D4;text-align:center;overflow: hidden;position: relative;padding: 20px;">
            <font size="2" face="Open-sans, sans-serif" color="#555454">
                {if isset($product['reduction'])}<span class="reduction" style="
                    font-weight: normal;
                    font-size: 12px;
                    padding: 5px;
                    color: white;
                    text-align: center;
                    line-height: 1;
                    background: #f14a69;
                    white-space: nowrap;
                    display: inline-block;
                    margin: 0 0 5px;"> - {$product['reduction']|escape:'html':'UTF-8'}</span>{/if}
                <div class="price">
                    <span>{$product['unit_price']|escape:'html':'UTF-8'}</span><br>
                    {if isset($product['old_price']) && isset($product['reduction'])}
                        <span class="old-price" style="text-decoration: line-through;color: #999999;">{$product['old_price']|escape:'html':'UTF-8'}</span>
                    {/if}
                </div>
            </font>
        </td>
        <td style="border:1px solid #D6D4D4;padding: 20px;color:#555454">
            {$product['quantity']|intval}
        </td>
        <td style="border:1px solid #D6D4D4;padding: 20px;color:#555454">
            <span>{$product['price']|escape:'html':'UTF-8'}</span>
        </td>
    </tr>
    {foreach $product['customization'] as $customization}
        <tr>
            <td colspan="2" style="border:1px solid #D6D4D4;color:#555454">
                <strong>{$product['name']|escape:'html':'UTF-8'}</strong><br>
                {$customization['customization_text']|escape:'html':'UTF-8'}
            </td>
            <td style="border:1px solid #D6D4D4;color:#555454">
                {$product['unit_price']|escape:'html':'UTF-8'}
            </td>
            <td style="border:1px solid #D6D4D4;color:#555454">
                {$customization['customization_quantity']|escape:'html':'UTF-8'}
            </td>
            <td style="border:1px solid #D6D4D4;color:#555454">
                {$customization['quantity']|intval}
            </td>
        </tr>
    {/foreach}
{/foreach}