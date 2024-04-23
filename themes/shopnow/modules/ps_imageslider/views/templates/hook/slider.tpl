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
{if $homeslider.slides}
  <div id="carousel" data-ride="carousel" class="carousel slide" data-interval="{$homeslider.speed|escape:'html':'UTF-8'}" data-wrap="{$homeslider.wrap|escape:'html':'UTF-8'}" data-pause="{$homeslider.pause|escape:'html':'UTF-8'}">
    <ul class="carousel-inner" role="listbox">
      {foreach from=$homeslider.slides item=slide name='homeslider'}
        <li class="carousel-item {if $smarty.foreach.homeslider.first}active{/if}">
          <figure>
            <img src="{$slide.image_url|escape:'html':'UTF-8'}" alt="{$slide.legend|escape}">
            {if $slide.title || $slide.description}
                  <figcaption class="caption">
                    <div class="container">
                        <div class="caption_content">
                            <h2 class="display-1 text-uppercase">{$slide.title|escape:'html':'UTF-8'}</h2>
                            <div class="caption-description">{$slide.description nofilter}</div>
                            {if $slide.url}
                                <a class="slide_link" href="{$slide.url|escape:'html':'UTF-8'}">
                                    {l s='Start shopping now' d='Shop.Theme.Catalog'}
                                </a>
                            {/if}
                        </div>
                    </div>
                  </figcaption>
            {/if}
          </figure>
        </li>
      {/foreach}
    </ul>
    <div class="direction">
      <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="icon-prev hidden-xs" aria-hidden="true">
          <i class="fa fa-angle-double-left"></i>
        </span>
        <span class="sr-only">{l s='Back' d='Shop.Theme.Catalog'}</span>
      </a>
      <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="sr-only">{l s='Next' d='Shop.Theme.Catalog'}</span>
        <span class="icon-next" aria-hidden="true">
          <i class="fa fa-angle-double-right"></i>
        </span>
      </a>
    </div>
  </div>
{/if}
