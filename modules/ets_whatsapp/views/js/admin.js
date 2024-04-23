/**
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
 * needs please contact us for extra customization service at an affordable price
 *
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright 2007-2022 ETS-Soft
 * @license Valid for 1 website (or project) for each purchase of license
 * International Registered Trademark & Property of ETS-Soft
 */
$(document).ready(function(){
   $(document).on('click','.ets-wa-group-number-phone .js-dropdown-item',function(){
      $('#ETS_WA_CALL_PREFIX').val($(this).data('value'));
      $('.input-group-addon.call_prefix').html('+'+$(this).data('call_prefix')); 
      $('.ets-wa-group-number-phone .dropdown-toggle').html($(this).html());
   }); 
   $(document).keyup(function(e){
        if($('.ets-wa-group-number-phone .dropdown.open').length)
        {
            $('.ets-wa-group-number-phone .js-dropdown-item').show();
            if(e.key!='')
            {
                var key_current = e.key;
                $('.ets-wa-group-number-phone .js-dropdown-item').each(function(){
                    var $this_item = $(this);
                    if($this_item.find('span').html().toLowerCase().indexOf(key_current)==0)
                    {
                        $('.js-choice-options').animate({scrollTop: $('.js-choice-options').scrollTop() + $this_item.position().top});
                        return false;
                    }
                });
            }
            return false;
        }
   });
});