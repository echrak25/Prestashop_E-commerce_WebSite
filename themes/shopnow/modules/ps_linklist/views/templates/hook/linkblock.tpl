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
<div class="links">
  <div class="row">
  {foreach $linkBlocks as $linkBlock}
    <div class="wrapper">
      <h3 class="h3 title-footer-block hidden-sm-down">{$linkBlock.title|escape:'html':'UTF-8'}</h3>
      {assign var=_expand_id value=10|mt_rand:100000}
      <div class="title clearfix hidden-md-up" data-target="#footer_sub_menu_{$_expand_id|escape:'html':'UTF-8'}" data-toggle="collapse">
        <span class="h3">{$linkBlock.title|escape:'html':'UTF-8'}</span>
        <span class="pull-xs-right">
          <span class="navbar-toggler collapse-icons">
            <i class="material-icons add">expand_more</i>
            <i class="material-icons remove">expand_less</i>
          </span>
        </span>
      </div>
      <ul id="footer_sub_menu_{$_expand_id|escape:'html':'UTF-8'}" class="collapse">
        {foreach $linkBlock.links as $link}
          <li>
            <a id="{$link.id|escape:'html':'UTF-8'}-{$linkBlock.id|escape:'html':'UTF-8'}" class="{$link.class|escape:'html':'UTF-8'}" href="{$link.url|escape:'html':'UTF-8'}" title="{$link.description|escape:'html':'UTF-8'}"> {$link.title|escape:'html':'UTF-8'}
            </a>
          </li>
        {/foreach}
      </ul>
    </div>
  {/foreach}
  </div>
</div>
