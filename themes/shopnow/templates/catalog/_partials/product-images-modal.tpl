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
<div class="modal fade js-product-images-modal{if (isset($tc_config.YBC_TC_PRODUCT_LAYOUT) && $tc_config.YBC_TC_PRODUCT_LAYOUT == 'layout2')} images-thumb-right{else if (isset($tc_config.YBC_TC_PRODUCT_LAYOUT) && $tc_config.YBC_TC_PRODUCT_LAYOUT == 'layout1')} images-thumb-left{else} images-thumb-horizona{/if} images_thumb_slider" id="product-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-product-thumb-cover">
        {assign var=imagesCount value=$product.images|count}
        <figure>
          <img class="js-modal-product-cover product-cover-modal" width="{$product.cover.large.width|escape:'html':'UTF-8'}" src="{$product.cover.large.url|escape:'html':'UTF-8'}" alt="{$product.cover.legend|escape:'html':'UTF-8'}" title="{$product.cover.legend|escape:'html':'UTF-8'}" itemprop="image">
        </figure>
        <aside id="thumbnails" class="thumbnails js-thumbnails text-xs-center">
          {block name='product_images'}
            <div class="js-modal-mask mask {if $imagesCount <= 5} nomargin {/if}">
              <ul class="product-images js-modal-product-images">
                {foreach from=$product.images item=image}
                  <li class="thumb-container">
                    <img data-image-large-src="{$image.large.url|escape:'html':'UTF-8'}" class="thumb js-modal-thumb" src="{$image.medium.url|escape:'html':'UTF-8'}" alt="{$image.legend|escape:'html':'UTF-8'}" title="{$image.legend|escape:'html':'UTF-8'}" width="{$image.medium.width|escape:'html':'UTF-8'}" itemprop="image">
                  </li>
                {/foreach}
              </ul>
            </div>
          {/block}
          {*if $imagesCount > 5}
            <div class="arrows js-modal-arrows">
              <i class="material-icons material-icons-arrow_drop_up arrow-up js-modal-arrow-up"></i>
              <i class="material-icons material-icons-arrow_drop_down arrow-down js-modal-arrow-down"></i>
            </div>
          {/if*}
        </aside>
        </div>
        <div class="image-caption">
          {block name='product_description_short'}
            <div id="product-description-short" itemprop="description">{$product.description_short nofilter}</div>
          {/block}
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{*<script type="text/javascript">
    $(document).ready(function(){
       setTimeout(function(){
           if ($('.images_thumb_slider').length != '' )
           {
               $('.images_thumb_slider .product-images').owlCarousel({
                items : 4,
                responsive : {
                        // breakpoint from 0 up
                        0 : {
                            items : 3,
                            margin:10,
                        },
                        // breakpoint from 480 up
                        480 : {
                            items : 4,
                            margin:10,
                        },
                        // breakpoint from 768 up
                        768 : {
                            items : 4
                        },
                        992 : {
                            items : 4
                        }
                    },
                nav : true,  
                loop: false,
                rewindNav : false,
                margin:20,
                dots : false,         
                navText: ['', ''],  
                callbacks: true,
            }); 
          };
   	},500);	
});
</script>    *}
