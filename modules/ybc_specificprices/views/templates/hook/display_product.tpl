<div class="ybc_countdown col-sm-12 col-md-6 col-lg-6">
    <div id="ybc_specificprices">
        <h3 class="h1 products-section-title text-uppercase">
            <span>{$specific_title|escape:'html':'UTF-8'}</span>
        </h3>
        <div class="ets-product-specific">
            {foreach from=$products_list item="product"}
                {block name='product_miniature'}
                    {include file='modules/ybc_specificprices/views/templates/hook/_product.tpl' product=$product}
                {/block}
            {/foreach}
        </div>
    </div>
</div>