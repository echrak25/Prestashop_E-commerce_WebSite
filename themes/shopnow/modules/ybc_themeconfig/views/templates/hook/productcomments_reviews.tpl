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
{if isset($nbComments) && $nbComments > 0}
	<div class="comments_note" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
		<div class="star_content clearfix">
			{section name="i" start=0 loop=5 step=1}
				{if $averageTotal le $smarty.section.i.index}
					<div class="star"></div>
				{else}
					<div class="star star_on"></div>
				{/if}
			{/section}
            <meta itemprop="worstRating" content = "0" />
            <meta itemprop="ratingValue" content = "{if isset($ratings.avg)}{$ratings.avg|round:1|escape:'html':'UTF-8'}{else}{$averageTotal|round:1|escape:'html':'UTF-8'}{/if}" />
            <meta itemprop="bestRating" content = "5" />
		</div>
		<span class="nb-comments"><span itemprop="reviewCount">{$nbComments|escape:'html':'UTF-8'}</span> {l s='Review(s)' mod='ybc_themeconfig'}</span>
	</div>
{else}
    <div class="comments_note" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
		<div class="star_content clearfix">
			{section name="i" start=0 loop=5 step=1}
				{if $averageTotal le $smarty.section.i.index}
					<div class="star"></div>
				{else}
					<div class="star star_on"></div>
				{/if}
			{/section}            
		</div>
		<span class="nb-comments"><span itemprop="reviewCount">0</span> {l s='No reviews' mod='ybc_themeconfig'}</span>
	</div>
{/if}
