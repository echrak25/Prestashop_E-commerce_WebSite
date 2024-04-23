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
<script type="text/javascript">
$(function(){
	$('a[href=#idTab5]').click(function(){
		$('*[id^="idTab"]').addClass('block_hidden_only_for_screen');
		$('div#idTab5').removeClass('block_hidden_only_for_screen');

		$('ul#more_info_tabs a[href^="#idTab"]').removeClass('selected');
		$('a[href="#idTab5"]').addClass('selected');
	});
});
</script>
 {if (!$content_only && (($nbComments == 0 && $too_early == false && ($logged || $allow_guests)) || ($nbComments != 0)))}
<div id="product_comments_block_extra">
	{if $nbComments != 0}
	<div class="comments_note">
		<span>{l s='Average grade' mod='productcomments'}&nbsp</span>
		<div class="star_content clearfix">
		{section name="i" start=0 loop=5 step=1}
			{if $averageTotal le $smarty.section.i.index}
				<div class="star"></div>
			{else}
				<div class="star star_on"></div>
			{/if}
		{/section}
		</div>
	</div>
	{/if}

	<div class="comments_advices">
		{if $nbComments != 0}
		<a href="#idTab5">{l s='Read user reviews' mod='productcomments'} ({$nbComments|escape:'html':'UTF-8'})</a><br/>
		{/if}
		{if ($too_early == false AND ($logged OR $allow_guests))}
		<a class="open-comment-form" href="#new_comment_form">{l s='Write your review' mod='productcomments'}</a>
		{/if}
	</div>
</div>
{/if}
<!--  /Module ProductComments -->
