<span class="product-quantity">{$product.quantity|escape:'html':'UTF-8'}</span>
<span class="product-name">{$product.name|escape:'html':'UTF-8'}</span>
<span class="product-price">{$product.price|escape:'html':'UTF-8'}</span>
<a  class="remove-from-cart"
    rel="nofollow"
    href="{$product.remove_from_cart_url|escape:'html':'UTF-8'}"
    data-link-action="remove-from-cart"
    title="{l s='remove from cart' d='Shop.Theme.Actions'}"
>
    {l s='Remove' d='Shop.Theme.Actions'}
</a>
{if $product.customizations|count}
    <div class="customizations">
        <ul>
            {foreach from=$product.customizations item='customization'}
                <li>
                    <span class="product-quantity">{$customization.quantity|escape:'html':'UTF-8'}</span>
                    <a href="{$customization.remove_from_cart_url|escape:'html':'UTF-8'}" title="{l s='remove from cart' d='Shop.Theme.Actions'}" class="remove-from-cart" rel="nofollow">{l s='Remove' d='Shop.Theme.Actions'}</a>
                    <ul>
                        {foreach from=$customization.fields item='field'}
                            <li>
                                <span>{$field.label|escape:'html':'UTF-8'}</span>
                                {if $field.type == 'text'}
                                    <span>{$field.text nofilter}</span>
                                {else if $field.type == 'image'}
                                    <img src="{$field.image.small.url|escape:'html':'UTF-8'}">
                                {/if}
                            </li>
                        {/foreach}
                    </ul>
                </li>
            {/foreach}
        </ul>
    </div>
{/if}
