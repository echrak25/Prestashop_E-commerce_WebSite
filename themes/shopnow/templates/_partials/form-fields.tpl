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
{if $field.type == 'hidden'}

  <input type="hidden" name="{$field.name|escape:'html':'UTF-8'}" value="{$field.value|escape:'html':'UTF-8'}">

{else}

  <div class="form-group row {if !empty($field.errors)}has-error{/if}">
    <label class="col-md-3 form-control-label{if $field.required} required{/if}">
      {if $field.type !== 'checkbox'}
        {$field.label|escape:'html':'UTF-8'}
      {/if}
    </label>
    <div class="col-md-6{if ($field.type === 'radio-buttons')} form-control-valign{/if}">

      {if $field.type === 'select'}

        <select class="form-control form-control-select" name="{$field.name|escape:'html':'UTF-8'}" {if $field.required}required{/if}>
          <option value disabled selected>{l s='-- please choose --' d='Shop.Forms.Labels'}</option>
          {foreach from=$field.availableValues item="label" key="value"}
            <option value="{$value|escape:'html':'UTF-8'}" {if $value eq $field.value} selected {/if}>{$label|escape:'html':'UTF-8'}</option>
          {/foreach}
        </select>

      {elseif $field.type === 'countrySelect'}

        <select
          class="form-control form-control-select js-country"
          name="{$field.name|escape:'html':'UTF-8'}"
          {if $field.required}required{/if}
        >
          <option value disabled selected>{l s='-- please choose --' d='Shop.Forms.Labels'}</option>
          {foreach from=$field.availableValues item="label" key="value"}
            <option value="{$value|escape:'html':'UTF-8'}" {if $value eq $field.value} selected {/if}>{$label|escape:'html':'UTF-8'}</option>
          {/foreach}
        </select>

      {elseif $field.type === 'radio-buttons'}

        {foreach from=$field.availableValues item="label" key="value"}
          <label class="radio-inline">
            <span class="custom-radio">
              <input
                name="{$field.name|escape:'html':'UTF-8'}"
                type="radio"
                value="{$value|escape:'html':'UTF-8'}"
                {if $field.required}required{/if}
                {if $value eq $field.value} checked {/if}
              >
              <span></span>
            </span>
            {$label|escape:'html':'UTF-8'}
          </label>
        {/foreach}

      {elseif $field.type === 'checkbox'}

        <span class="custom-checkbox">
          <input name="{$field.name|escape:'html':'UTF-8'}" type="checkbox" value="1" {if $field.value}checked="checked"{/if} {if $field.required}required{/if}>
          <span><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
          <label>{$field.label nofilter}</label >
        </span>

      {elseif $field.type === 'date'}

        <input class="form-control" type="date" value="{$field.value|escape:'html':'UTF-8'}" placeholder="{if isset($field.availableValues.placeholder)}{$field.availableValues.placeholder|escape:'html':'UTF-8'}{/if}">
        {if isset($field.availableValues.comment)}
          <span class="form-control-comment">
            {$field.availableValues.comment|escape:'html':'UTF-8'}
          </span>
        {/if}

      {elseif $field.type === 'birthday'}

        <div class="js-parent-focus">
          {html_select_date
          field_order=DMY
          time={$field.value|escape:'html':'UTF-8'}
          field_array={$field.name|escape:'html':'UTF-8'}
          prefix=false
          reverse_years=true
          field_separator='<br>'
          day_extra='class="form-control form-control-select"'
          month_extra='class="form-control form-control-select"'
          year_extra='class="form-control form-control-select"'
          day_empty={l s='-- day --' d='Shop.Forms.Labels'}
          month_empty={l s='-- month --' d='Shop.Forms.Labels'}
          year_empty={l s='-- year --' d='Shop.Forms.Labels'}
          start_year={'Y'|date|escape:'html':'UTF-8'}-100 end_year={'Y'|date|escape:'html':'UTF-8'}
          }
        </div>

      {elseif $field.type === 'password'}

        <div class="input-group js-parent-focus">
          <input
            class="form-control js-child-focus js-visible-password"
            name="{$field.name|escape:'html':'UTF-8'}"
            type="password"
            value=""
            pattern=".{literal}{{/literal}5,{literal}}{/literal}"
            {if $field.required}required{/if}
          >
          <span class="input-group-btn">
            <button
              class="btn"
              type="button"
              data-action="show-password"
              data-text-show="{l s='Show' d='Shop.Theme.Actions'}"
              data-text-hide="{l s='Hide' d='Shop.Theme.Actions'}"
            >
              {l s='Show' d='Shop.Theme.Actions'}
            </button>
          </span>
        </div>
      {else}

        <input
          class="form-control"
          name="{$field.name|escape:'html':'UTF-8'}"
          type="{$field.type|escape:'html':'UTF-8'}"
          value="{$field.value|escape:'html':'UTF-8'}"
          {if isset($field.availableValues.placeholder)}placeholder="{$field.availableValues.placeholder|escape:'html':'UTF-8'}"{/if}
          {if $field.maxLength}maxlength="{$field.maxLength|escape:'html':'UTF-8'}"{/if}
          {if $field.required}required{/if}
        >
        {if isset($field.availableValues.comment)}
          <span class="form-control-comment">
            {$field.availableValues.comment|escape:'html':'UTF-8'}
          </span>
        {/if}

      {/if}

      {include file='_partials/form-errors.tpl' errors=$field.errors}

    </div>

    <div class="col-md-3 form-control-comment">
      {if (!$field.required && !in_array($field.type, ['radio-buttons', 'checkbox']))}
       {l s='Optional' d='Shop.Forms.Labels'}
      {/if}
    </div>
  </div>

{/if}
