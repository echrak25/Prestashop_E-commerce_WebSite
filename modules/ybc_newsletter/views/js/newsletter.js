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

    setTimeout(function(){
        $('.ybc-newsletter-popup').addClass('active'); 
        $('.ybc_nlt_content').addClass(YBC_NEWSLETTER_POPUP_TYPE_SHOW);
    }, parseInt(YBC_NEWSLETTER_POPUP_DELAY) > 1000 ? parseInt(YBC_NEWSLETTER_POPUP_DELAY) : 2000);
    
    if($('.ybc-newsletter-popup').length > 0)
    {
        $('.ybc-newsletter-popup').fadeIn();
    }
    $('.ynp-submit').click(function(){        
        var npemail = $(this).prev('.ynp-email-input').val();
        var npaction = $('.ynp-form').attr('action');
        $('.ynp-alert').remove();
        $('.ynp-loading-div').show();
        var ybcmailForm = $(this).parents('.ybc-mail-wrapper');
        $.ajax({
            url : npaction,
            type : 'post',
            dataType : 'json',
            data : {
                npemail : npemail
            },
            success: function(json){
                if(!json['thank_you'])
                    $('.ybc-newsletter-popup').fadeOut();
                else
                {
                    $('.ynp-loading-div').hide();
                    if(json['success'])
                    {
                        ybcmailForm.find('.ynp-form').after('<div class="ynp-alert alert alert-success">'+json['success']+'</div>');
                        $('.ynp-form-popup').hide(); 
                        $('.img_bg').hide();
                        $('.ynp-div-l3').addClass('ybc_form_success');                    
                        $('.ynp-email-input').val('');
                    }
                    else
                    {
                        ybcmailForm.find('.ynp-input-row').after('<div class="ynp-alert alert alert-danger">'+json['error']+'</div>');                    
                    }
                }               
                
            },
            error: function(){
                $('.ynp-loading-div').hide();
            }
        });
        return false;
    });
    $('.ynp-close').click(function(){
        var npemail = $('#ynp-email-input').val();
        var npaction = $('.ynp-form').attr('action');
        if($('#ynp-input-dont-show').is(':checked')|| YBC_NEWSLETTER_CLOSE_PERMANAL)
        {
            $.ajax({
                url : npaction,
                type : 'post',                
                data : {
                    donotshowagain : $('#ynp-input-dont-show').is(':checked') ? 1 : 0,
                    close: 1,
                }
            });
        }
        $('.ybc-newsletter-popup').hide();
    });
    $(document).keyup(function(e) {      
      if (e.keyCode === 27 && $('.ynp-form').length>0 && $('.ynp-close').length>0  )
      {
        $('.ynp-close').click();
      }
    });
    $(document).mouseup(function (e)
    {
        var container = $(".ybc_nlt_content");
        if (!container.is(e.target) && container.has(e.target).length === 0&& $('.ynp-form').length>0 && $('.ynp-close').length>0 )
        {
            $('.ynp-close').click();
        }
    });
    $(document).on('click', '.ynp-alert.alert-danger, .ybc-newsletter-home .alert-success', function(){
        $(this).remove();
    });
});