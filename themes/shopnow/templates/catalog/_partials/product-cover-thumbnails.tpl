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
{if (isset($tc_config.YBC_TC_PRODUCT_LAYOUT) && $tc_config.YBC_TC_PRODUCT_LAYOUT == 'layout2')}
<div class="images-container images-container-vertical-right">
  
  {block name='product_cover'}
    <div class="product-cover{if (isset($tc_config.YBC_TC_JQZOOM) && $tc_config.YBC_TC_JQZOOM == 1)} product-cover-zoom{/if}">
      <img class="js-qv-product-cover" src="{$product.cover.bySize.large_default.url|escape:'html':'UTF-8'}" alt="{$product.cover.legend|escape:'html':'UTF-8'}" title="{$product.cover.legend|escape:'html':'UTF-8'}" style="width:100%;" itemprop="image">
      <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
        <i class="material-icons zoom-in">zoom_in</i>
      </div>
      {block name='product_flags'}
        <ul class="product-flags">
          {foreach from=$product.flags item=flag}
            <li class="product-flag {$flag.type|escape:'html':'UTF-8'}">{$flag.label|escape:'html':'UTF-8'}</li>
          {/foreach}
        </ul>
      {/block}
    </div>
  {/block}
    {block name='product_images'}
    <div class="js-qv-mask mask">
      <ul class="product-images js-qv-product-images">
        {foreach from=$product.images item=image}
          <li class="thumb-container">
            <img
              class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
              data-image-medium-src="{$image.bySize.medium_default.url|escape:'html':'UTF-8'}"
              data-image-large-src="{$image.bySize.large_default.url|escape:'html':'UTF-8'}"
              src="{$image.bySize.home_default.url|escape:'html':'UTF-8'}"
              alt="{$image.legend|escape:'html':'UTF-8'}"
              title="{$image.legend|escape:'html':'UTF-8'}"
              width="100"
              itemprop="image"
            >
          </li>
        {/foreach}
      </ul>
    </div>
  {/block}
  
  
</div>
{literal}
<script type="text/javascript">
// <![CDATA[
setTimeout(function(){
	$('.product-images').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  vertical: true,
	  infinite: false,
	  arrows: true,
      centerPadding: '20px',
	  responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 4,
		  }
		},
		{
		  breakpoint: 992,
		  settings: {
			slidesToShow: 3,
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
			slidesToShow: 3,
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 2,
		  }
		}]
	});
	},200);	
	
// ]]>
</script>
{/literal}


{else if (isset($tc_config.YBC_TC_PRODUCT_LAYOUT) && $tc_config.YBC_TC_PRODUCT_LAYOUT == 'layout1')}
    <div class="images-container images-container-vertical-left">
      {block name='product_cover'}
        <div class="product-cover{if isset($tc_config.YBC_TC_JQUERYZOOM) && $tc_config.YBC_TC_JQUERYZOOM == 1} product-cover-zoom{/if}">
          <img class="js-qv-product-cover" src="{$product.cover.bySize.large_default.url|escape:'html':'UTF-8'}" alt="{$product.cover.legend|escape:'html':'UTF-8'}" title="{$product.cover.legend|escape:'html':'UTF-8'}" style="width:100%;" itemprop="image">
          <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
            <i class="material-icons zoom-in">zoom_in</i>
          </div>
          {block name='product_flags'}
            <ul class="product-flags">
              {foreach from=$product.flags item=flag}
                <li class="product-flag {$flag.type|escape:'html':'UTF-8'}">{$flag.label|escape:'html':'UTF-8'}</li>
              {/foreach}
            </ul>
          {/block}
        </div>
      {/block}
    
      {block name='product_images'}
        <div class="js-qv-mask mask">
          <ul class="product-images js-qv-product-images">
            {foreach from=$product.images item=image}
              <li class="thumb-container">
                <img
                  class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
                  data-image-medium-src="{$image.bySize.medium_default.url|escape:'html':'UTF-8'}"
                  data-image-large-src="{$image.bySize.large_default.url|escape:'html':'UTF-8'}"
                  src="{$image.bySize.home_default.url|escape:'html':'UTF-8'}"
                  alt="{$image.legend|escape:'html':'UTF-8'}"
                  title="{$image.legend|escape:'html':'UTF-8'}"
                  width="100"
                  itemprop="image"
                >
              </li>
            {/foreach}
          </ul>
        </div>
      {/block}
      
    </div>
    {literal}
    <script type="text/javascript">
    // <![CDATA[
    setTimeout(function(){
    	$('.product-images').slick({
    	  slidesToShow: 4,
    	  slidesToScroll: 1,
    	  vertical: true,
    	  infinite: false,
    	  arrows: true,
    	  responsive: [
    		{
    		  breakpoint: 1024,
    		  settings: {
    			slidesToShow: 4,
    		  }
    		},
    		{
    		  breakpoint: 992,
    		  settings: {
    			slidesToShow: 3,
    		  }
    		},
    		{
    		  breakpoint: 768,
    		  settings: {
    			slidesToShow: 3,
    		  }
    		},
    		{
    		  breakpoint: 480,
    		  settings: {
    			slidesToShow: 2,
    		  }
    		}]
    	});
    	},200);	
    	
    // ]]>
    </script>
    {/literal}
{else if (isset($tc_config.YBC_TC_PRODUCT_LAYOUT) && $tc_config.YBC_TC_PRODUCT_LAYOUT == 'layout4')}
    <div class="images-container images-container-img-sync">
      {block name='product_images'}
        <div class="js-qv-mask mask">
          <ul class="product-images-big js-qv-product-images">
            {foreach from=$product.images item=image}
              <li class="thumb-container{if (isset($tc_config.YBC_TC_JQZOOM) && $tc_config.YBC_TC_JQZOOM == 1)} product-cover-zoom{/if}">
                <img
                  class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
                  data-image-medium-src="{$image.bySize.medium_default.url|escape:'html':'UTF-8'}"
                  data-image-large-src="{$image.bySize.large_default.url|escape:'html':'UTF-8'}"
                  src="{$image.bySize.large_default.url|escape:'html':'UTF-8'}"
                  alt="{$image.legend|escape:'html':'UTF-8'}"
                  title="{$image.legend|escape:'html':'UTF-8'}"
                  itemprop="image"
                >
              </li>
            {/foreach}
          </ul>
          <ul class="product-images js-qv-product-images">
            {foreach from=$product.images item=image}
              <li class="thumb-container">
                <img
                  class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
                  data-image-medium-src="{$image.bySize.medium_default.url|escape:'html':'UTF-8'}"
                  data-image-large-src="{$image.bySize.large_default.url|escape:'html':'UTF-8'}"
                  src="{$image.bySize.home_default.url|escape:'html':'UTF-8'}"
                  alt="{$image.legend|escape:'html':'UTF-8'}"
                  title="{$image.legend|escape:'html':'UTF-8'}"
                  width="100"
                  itemprop="image"
                >
              </li>
            {/foreach}
          </ul>
        </div>
      {/block}
    </div>
    {literal}
    <script type="text/javascript">
    // <![CDATA[
    setTimeout(function(){
    	$('.product-images-big').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          fade: true,
          infinite: false,
          asNavFor: '.product-images'
        });
        $('.product-images').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: false,
          asNavFor: '.product-images-big',
          focusOnSelect: true,
          arrows: false,
        });
   	},500);	
    	
    // ]]>
    </script>
    {/literal}
{else}
<div class="images-container type_horizonal">
  {block name='product_cover'}
    <div class="product-cover{if isset($tc_config.YBC_TC_JQUERYZOOM) && $tc_config.YBC_TC_JQUERYZOOM == 1} product-cover-zoom{/if}">
      <img class="js-qv-product-cover" src="{$product.cover.bySize.large_default.url|escape:'html':'UTF-8'}" alt="{$product.cover.legend|escape:'html':'UTF-8'}" title="{$product.cover.legend|escape:'html':'UTF-8'}" style="width:100%;" itemprop="image">
      <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
        <i class="material-icons zoom-in">zoom_in</i>
      </div>
      {block name='product_flags'}
        <ul class="product-flags">
          {foreach from=$product.flags item=flag}
            <li class="product-flag {$flag.type|escape:'html':'UTF-8'}">{$flag.label|escape:'html':'UTF-8'}</li>
          {/foreach}
        </ul>
      {/block}
    </div>
  {/block}

  {block name='product_images'}
    <div class="js-qv-mask mask">
      <ul class="product-images js-qv-product-images">
        {foreach from=$product.images item=image}
          <li class="thumb-container">
            <img
              class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
              data-image-medium-src="{$image.bySize.medium_default.url|escape:'html':'UTF-8'}"
              data-image-large-src="{$image.bySize.large_default.url|escape:'html':'UTF-8'}"
              src="{$image.bySize.home_default.url|escape:'html':'UTF-8'}"
              alt="{$image.legend|escape:'html':'UTF-8'}"
              title="{$image.legend|escape:'html':'UTF-8'}"
              width="100"
              itemprop="image"
            >
          </li>
        {/foreach}
      </ul>
    </div>
  {/block}
  
</div>
{literal}
<script type="text/javascript">
// <![CDATA[
setTimeout(function(){
	$('.product-images').slick({
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  vertical: false,
	  infinite: false,
	  arrows: true,
	  responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 5,
		  }
		},
		{
		  breakpoint: 992,
		  settings: {
			slidesToShow: 4,
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
			slidesToShow: 4,
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 3,
		  }
		}]
	});
	},500);	
    
// ]]>
</script>
{/literal}
{/if}