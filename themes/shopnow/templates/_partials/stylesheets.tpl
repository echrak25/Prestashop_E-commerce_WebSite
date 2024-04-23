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
{foreach $stylesheets.external as $stylesheet}
  <link rel="stylesheet" href="{$stylesheet.uri|escape:'html':'UTF-8'}" type="text/css" media="{$stylesheet.media|escape:'html':'UTF-8'}" />
{/foreach}

{*
<link rel="stylesheet" href="{$urls.css_url|escape:'html':'UTF-8'}owl/owl.carousel.css" type="text/css" media="all" />
<link rel="stylesheet" href="{$urls.css_url|escape:'html':'UTF-8'}owl/owl.theme.css" type="text/css" media="all" />*}
<link rel="stylesheet" href="{$urls.css_url|escape:'html':'UTF-8'}ionicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="{$urls.css_url|escape:'html':'UTF-8'}font-elegant.css" type="text/css" media="all" />

  
{if isset($tc_config.YBC_TC_FONT1_DATA) && $tc_config.YBC_TC_FONT1_DATA != ''}
    <link rel="stylesheet" href="{$tc_config.YBC_TC_FONT1_DATA|escape:'html':'UTF-8'}" media="all" />
{/if}
{if isset($tc_config.YBC_TC_FONT2_DATA) && $tc_config.YBC_TC_FONT2_DATA != ''}
    <link rel="stylesheet" href="{$tc_config.YBC_TC_FONT2_DATA|escape:'html':'UTF-8'}" media="all" />
{/if}
{if isset($tc_config.YBC_TC_FONT3_DATA) && $tc_config.YBC_TC_FONT3_DATA != ''}
    <link rel="stylesheet" href="{$tc_config.YBC_TC_FONT3_DATA|escape:'html':'UTF-8'}" media="all" />
{/if}
{foreach $stylesheets.inline as $stylesheet}
  <style>
    {$stylesheet.content|escape:'html':'UTF-8'}
  </style>
{/foreach}
