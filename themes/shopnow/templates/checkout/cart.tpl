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
{extends file=$layout}


{block name='content'}

  <div id="main">
    <div class="cart-grid">

      <!-- Left Block: cart product informations & shpping -->
      <div class="cart-grid-body col-xs-12 col-lg-8">

        <!-- cart products detailed -->
        <div class="card cart-container">
          <div class="card-block">
            <h1 class="h1">{l s='Shopping Cart' d='Shop.Theme.Checkout'}</h1>
          </div>
          
          {block name='cart_overview'}
            {include file='checkout/_partials/cart-detailed.tpl' cart=$cart}
          {/block}
        </div>

        {block name='continue_shopping'}
          <a class="label" href="{$urls.pages.index|escape:'html':'UTF-8'}">
            <i class="material-icons">chevron_left</i>{l s='Continue shopping' d='Shop.Theme.Actions'}
          </a>
        {/block}

        <!-- shipping informations -->
        <div>
          {hook h='displayShoppingCartFooter'}
        </div>
      </div>

      <!-- Right Block: cart subtotal & cart total -->
      <div class="cart-grid-right col-xs-12 col-lg-4">
            {block name='cart_summary'}
              <div class="card cart-summary">
    
                {hook h='displayShoppingCart'}
    
                {block name='cart_totals'}
                  {include file='checkout/_partials/cart-detailed-totals.tpl' cart=$cart}
                {/block}
    
                {block name='cart_actions'}
                  {include file='checkout/_partials/cart-detailed-actions.tpl' cart=$cart}
                {/block}
    
              </div>
            {/block}
    
            {block name='display_reassurance'}
              {hook h='displayReassurance'}
            {/block}
      </div>

    </div>
  </div>
{/block}
