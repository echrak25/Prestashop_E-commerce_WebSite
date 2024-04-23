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
<section class="product-customization">
  {if !$configuration.is_catalog}
    <div class="card card-block">
      <h3 class="h4 card-title">{l s='Product customization' d='Shop.Theme.Catalog'}</h3>
      {l s='Don\'t forget to save your customization to be able to add to cart' d='Shop.Forms.Help'}
      <form method="post" action="{$product.url|escape:'html':'UTF-8'}" enctype="multipart/form-data">
        <ul class="clearfix">
          {foreach from=$customizations.fields item="field"}
            <li class="product-customization-item">
              <label> {$field.label|escape:'html':'UTF-8'}</label>
              {if $field.type == 'text'}
                <label>{$field.text|escape:'html':'UTF-8'}</label>
                <textarea placeholder="{l s='Your message here' d='Shop.Forms.Help'}" class="product-message" maxlength="250" {if $field.required} required {/if} name="{$field.input_name|escape:'html':'UTF-8'}"></textarea>
                <small class="pull-xs-right">{l s='250 char. max' d='Shop.Forms.Help'}</small>
              {elseif $field.type == 'image'}
                {if $field.is_customized}
                  <br>
                  <img src="{$field.image.small.url|escape:'html':'UTF-8'}">
                  <a class="remove-image" href="{$field.remove_image_url|escape:'html':'UTF-8'}" rel="nofollow">{l s='Remove Image' d='Shop.Theme.Actions'}</a>
                {/if}
                <span class="custom-file">
                  <span class="js-file-name">{l s='No selected file' d='Shop.Forms.Help'}</span>
                  <input class="file-input js-file-input" {if $field.required} required {/if} type="file" name="{$field.input_name|escape:'html':'UTF-8'}">
                  <button class="btn btn-primary">{l s='Choose file' d='Shop.Theme.Actions'}</button>
                </span>
                <small class="pull-xs-right">{l s='.png .jpg .gif' d='Shop.Forms.Help'}</small>
              {/if}
            </li>
          {/foreach}
        </ul>
        <div class="clearfix">
          <button class="btn btn-primary pull-xs-right" type="submit" name="submitCustomizedData">{l s='Save Customization' d='Shop.Theme.Actions'}</button>
        </div>
      </form>
    </div>
  {/if}
</section>
