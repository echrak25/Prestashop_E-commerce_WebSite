/*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
$(document).ready(function(){
    if($('select[name="YBC_NEWSLETTER_PAGE[]"] option[value="all"]').is(':selected'))
        $('select[name="YBC_NEWSLETTER_PAGE[]"] option').prop('selected',true);
    $('select[name="YBC_NEWSLETTER_PAGE[]"] option').click(function(){
        if($(this).val()=='all' && !$('select[name="YBC_NEWSLETTER_PAGE[]"][value="all"]').is(':selected'))
            $('select[name="YBC_NEWSLETTER_PAGE[]"] option').prop('selected',true);
    });
    $('select[name="YBC_NEWSLETTER_TEMPLATE"]').change(function(){
        if(confirm('Do you want to load new template?'))
        {
            window.location = $('#module_form').attr('action')+'&loadteamplate='+$(this).val();
        }
        else
            return false;
    });
    $(document).on('click','.ybc_newsletter_form_tab > li',function(){
        if(!$(this).hasClass('active'))
        {
            $('.ybc_newsletter_form > div, .ybc_newsletter_form_tab > li').removeClass('active');
            $(this).addClass('active');
            $('.ybc_newsletter_form > div.ybc_newsletter_form_'+$(this).attr('data-tab')).addClass('active');
        }        
    });
    $('.ybc-templates').click(function(){       
       $.fancybox({
         'autoScale': true,
         'transitionIn': 'elastic',
         'transitionOut': 'elastic',
         'speedIn': 500,
         'speedOut': 300,
         'autoDimensions': true,
         'centerOnScroll': true,
         'href' : ybc_newsletter_module_path+'views/img/preview/'+$('#YBC_NEWSLETTER_TEMPLATE').val()+'.png',
      }); 
    });
});