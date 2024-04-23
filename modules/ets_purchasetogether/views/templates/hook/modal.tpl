
<div id="blockcart-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title h6 text-xs-center" id="myModalLabel">{*<i class="material-icons">&#xE876;</i>*}<i class="material-icons">&#xE8CC;</i>{l s='Product successfully added to your shopping cart' d='Shop.Theme.Checkout'}</h4>
      </div>
      <div class="modal-body ets_purchase_modal">
        <div class="row">
          <div class="col-md-5 divide-right">
            {foreach from=$products item=product}
                <div class="row">
                  <div class="col-md-5 col-xs-5 product-image-modal">
                    <img class="product-image" src="{$product.product.cover.medium.url|escape:'html':'UTF-8'}" alt="{$product.product.cover.legend|escape:'html':'UTF-8'}" title="{$product.product.cover.legend|escape:'html':'UTF-8'}" itemprop="image">
                  </div>
                  <div class="col-md-7 col-xs-7 product-content-modal">
                    <h6 class="h6 product-name">{$product.product.name|escape:'html':'UTF-8'}</h6>
                    <p>{$product.product.price|escape:'html':'UTF-8'}</p>
                    {hook h='displayProductPriceBlock' product=$product.product type="unit_price"}
                    {foreach from=$product.product.attributes item="property_value" key="property"}
                      <span><strong>{$property_value.group|escape:'html':'UTF-8'}</strong>: {$property_value.name|escape:'html':'UTF-8'}</span><br>
                    {/foreach}
                    {*<p><strong>{l s='Quantity:' d='Shop.Theme.Checkout'}</strong>&nbsp;{$product.cart_quantity|escape:'html':'UTF-8'}</p>*}
                    {if isset($product.errors) && $product.errors}
                        {foreach from=$product.errors item=error}
                            <p><span class="bg-danger text-white">{$error|escape:'html':'UTF-8'}</span></p>
                        {/foreach}
                    {*else}
                        <p><span class="bg-success text-white">{l s='Product successfully added to your shopping cart.' d='Shop.Theme.ItemSuccess'}</span></p>
                    *}
                    {/if}
                  </div>
                </div>
            {/foreach}
          </div>
          <div class="col-md-7">
            <div class="cart-content">
              {if $cart.products_count > 1}
                <p class="cart-products-count">{l s='There are %products_count% items in your cart.' sprintf=['%products_count%' => $cart.products_count] d='Shop.Theme.Checkout'}</p>
              {else}
                <p class="cart-products-count">{l s='There is %product_count% item in your cart.' sprintf=['%product_count%' =>$cart.products_count] d='Shop.Theme.Checkout'}</p>
              {/if}
              <p><strong>{l s='Total products:' d='Shop.Theme.Checkout'}</strong>&nbsp;{$cart.subtotals.products.value|escape:'html':'UTF-8'}</p>
              <p><strong>{l s='Total shipping:' d='Shop.Theme.Checkout'}</strong>&nbsp;{$cart.subtotals.shipping.value|escape:'html':'UTF-8'} {hook h='displayCheckoutSubtotalDetails' subtotal=$cart.subtotals.shipping}</p>
              {if $cart.subtotals.tax}
              	<p><strong>{$cart.subtotals.tax.label|escape:'html':'UTF-8'}</strong>&nbsp;{$cart.subtotals.tax.value|escape:'html':'UTF-8'}</p>
              {/if}
              <p><strong>{l s='Total:' d='Shop.Theme.Checkout'}</strong>&nbsp;{$cart.totals.total.value|escape:'html':'UTF-8'} {$cart.labels.tax_short|escape:'html':'UTF-8'}</p>
              <div class="cart-content-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{l s='Continue shopping' d='Shop.Theme.Actions'}</button>
                <a href="{$cart_url|escape:'html':'UTF-8'}" class="btn btn-primary"><i class="material-icons">&#xE876;</i>{l s='proceed to checkout' d='Shop.Theme.Actions'}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
