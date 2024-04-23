/**
 * Copyright ETS Software Technology Co., Ltd
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
 */
$(document).ready(function(){
    $(document).on('click','.ph_social_link_tabs_configs .social_tab',function(){
        if(!$(this).hasClass('active'))
        {
            $('.ph_social_link_tabs_configs .social_tab').removeClass('active');
            $(this).addClass('active');
            $('.social_tab_content').removeClass('active');
            $('.social_tab_content_'+$(this).data('tab-id')).addClass('active');
        }
    });
    $(document).on('change','#PH_SL_BUTTON_BORDER',function(){
        var border_old = $('.ph_social_preview_wrapper').attr('data-button-border');
        $('.ph_social_preview_wrapper').removeClass('button_border_'+border_old);
        $('.ph_social_preview_wrapper').attr('data-button-border',$(this).val());
        $('.ph_social_preview_wrapper').addClass('button_border_'+$(this).val());
    });
    $(document).on('change','#PH_SL_BUTTON_SIZE',function(){
        var size_old = $('.ph_social_preview_wrapper').attr('data-button-size');
        $('.ph_social_preview_wrapper').removeClass('button_size_'+size_old);
        $('.ph_social_preview_wrapper').attr('data-button-size',$(this).val());
        $('.ph_social_preview_wrapper').addClass('button_size_'+$(this).val());
    });
    $(document).on('click','#PH_SL_HIDE_ON_MOBILE',function(){
        if($(this).val()==1)
            $('.ph_social_preview_wrapper').addClass('hide_mobile');
        else
            $('.ph_social_preview_wrapper').removeClass('hide_mobile');
    });
    $(document).on('keyup','input[name^=PH_SL_LINK_TITLE]',function(){
        $('.ph_social_link_title').html($(this).val());
    });
    $(document).on('click','.row_link_title .dropdown-menu a',function(){
        setTimeout(function(){
            $('.row_link_title .translatable-field').each(function(){
               if ($(this).is(':visible')) {
                    var title_link = $(this).find('input[type="text"]').val();
                    $('.ph_social_link_title').html(title_link);
               }
            });
             
        },300);
        
    });
    $(document).on('click','.ph-list-socials .item-social input[type="checkbox"]',function(){
        if($(this).is(':checked'))
        {
            $('.ph_social_preview_wrapper .ph_social_item.'+$(this).data('social')).removeClass('hide');
        }
        else
        {
            $('.ph_social_preview_wrapper .ph_social_item.'+$(this).data('social')).addClass('hide');
        }
    });
    $(document).on('focus','.social_link',function(){
        $(this).parents('.item-social').removeClass('ok').removeClass('error');
    });
    $(document).on('change blur','.social_link',function(){
        var $this = $(this);
        if($this.val()!='')
        {
            if(ph_social_link_validate_isLink($this.val()))
                $this.parents('.item-social').addClass('ok').removeClass('error');
            else
            {
                $this.parents('.item-social').removeClass('ok').addClass('error');
                $this.next('.error_link').html(ph_link_is_not_valid_text);
            }
        }
        else
        {
            if($this.parents('.item-social').find('input[type="checkbox"]').is(':checked'))
            {
                $this.parents('.item-social').removeClass('ok').addClass('error');
                $this.next('.error_link').html(ph_link_is_required_text);
            }
            else
                $this.parents('.item-social').removeClass('ok').removeClass('error');
        }
        if($('.item-social.error').length)
            $('button[name="btnSubmit"]').attr('disabled','disabled');
        else
            $('button[name="btnSubmit"]').removeAttr('disabled');
    });
    $(document).on('change','.item-social input[type="checkbox"]',function(){
        if($(this).is(':checked'))
        {
            $(this).parents('.item-social').find('input[type="text"]').removeAttr('disabled');
            if($(this).parents('.item-social').find('input[type="text"]').val()=='')
            {
                $(this).parents('.item-social').removeClass('ok').addClass('error');
            }
        }
        else
        {
            $(this).parents('.item-social').find('input[type="text"]').attr('disabled','disabled');
            $(this).parents('.item-social').removeClass('ok').removeClass('error');
        }
        if($('.item-social.error').length)
            $('button[name="btnSubmit"]').attr('disabled','disabled');
        else
            $('button[name="btnSubmit"]').removeAttr('disabled');
        $(this).parents('.item-social').find('input[type="text"]').focus();
    });
});
function ph_social_link_validate_isLink(s)
{
    if(s=='#')
        return true;
    if(s.indexOf('http')===0)
        reg = /(http|https)\:\/\/[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/;
    else
        reg = /^[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/;
    return reg.test(s);
}