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
<div class="product-variants">
  {foreach from=$groups key=id_attribute_group item=group}
    <div class="clearfix product-variants-item">
      <span class="control-label">{$group.name|escape:'html':'UTF-8'}</span>
      {if $group.group_type == 'select'}
        <select
          id="group_{$id_attribute_group|escape:'html':'UTF-8'}"
          data-product-attribute="{$id_attribute_group|escape:'html':'UTF-8'}"
          name="group[{$id_attribute_group|escape:'html':'UTF-8'}]">
          {foreach from=$group.attributes key=id_attribute item=group_attribute}
            <option value="{$id_attribute|escape:'html':'UTF-8'}" title="{$group_attribute.name|escape:'html':'UTF-8'}"{if $group_attribute.selected} selected="selected"{/if}>{$group_attribute.name|escape:'html':'UTF-8'}</option>
          {/foreach}
        </select>
      {elseif $group.group_type == 'color'}
        <ul id="group_{$id_attribute_group|escape:'html':'UTF-8'}">
          {foreach from=$group.attributes key=id_attribute item=group_attribute}
            <li class="pull-xs-left input-container">
              <input class="input-color" type="radio" data-product-attribute="{$id_attribute_group|escape:'html':'UTF-8'}" name="group[{$id_attribute_group|escape:'html':'UTF-8'}]" value="{$id_attribute|escape:'html':'UTF-8'}"{if $group_attribute.selected} checked="checked"{/if}>
              <span
                {if $group_attribute.html_color_code}class="color color_{$group_attribute.name|escape:'html':'UTF-8'}" style="background-color: {$group_attribute.html_color_code|escape:'html':'UTF-8'}" {/if}
                {if $group_attribute.texture}class="color texture" style="background-image: url({$group_attribute.texture|escape:'html':'UTF-8'})" {/if}
              ><span class="sr-only">{$group_attribute.name|escape:'html':'UTF-8'}</span></span>
            </li>
          {/foreach}
        </ul>
      {elseif $group.group_type == 'radio'}
        <ul id="group_{$id_attribute_group|escape:'html':'UTF-8'}">
          {foreach from=$group.attributes key=id_attribute item=group_attribute}
            <li class="input-container pull-xs-left">
              <input class="input-radio" type="radio" data-product-attribute="{$id_attribute_group|escape:'html':'UTF-8'}" name="group[{$id_attribute_group|escape:'html':'UTF-8'}]" value="{$id_attribute|escape:'html':'UTF-8'}"{if $group_attribute.selected} checked="checked"{/if}>
              <span class="radio-label">{$group_attribute.name|escape:'html':'UTF-8'}</span>
            </li>
          {/foreach}
        </ul>
      {/if}
    </div>
  {/foreach}
</div>
