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
<div id="_desktop_language_selector">
  <div class="language-selector-wrapper">
    <div class="language-selector dropdown js-dropdown">
      <span class="expand-more" data-toggle="dropdown">{$current_language.name_simple|escape:'html':'UTF-8'}</span>
      <a data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="">
        <i class="material-icons material-icons-expand_more"></i>
      </a>
      <ul class="dropdown-menu">
        {foreach from=$languages item=language}
          <li {if $language.id_lang == $current_language.id_lang} class="current" {/if}>
            <a href="{url entity='language' id=$language.id_lang}" class="dropdown-item">{$language.name_simple|escape:'html':'UTF-8'}</a>
          </li>
        {/foreach}
      </ul>
      <select class="link hidden-md-up hidden-sm-down">
        {foreach from=$languages item=language}
          <option value="{url entity='language' id=$language.id_lang}"{if $language.id_lang == $current_language.id_lang} selected="selected"{/if}>{$language.name_simple|escape:'html':'UTF-8'}</option>
        {/foreach}
      </select>
    </div>
  </div>
</div>
