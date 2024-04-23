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
 *  @author ETS-Soft <etssoft.jsc@gmail.com>
 *  @copyright  2007-2022 ETS-Soft
 *  @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */
import $ from 'jquery';

export default class ProductMinitature {
  init(){
    $('.js-product-miniature').each((index, element) => {
      const FLAG_MARGIN = 10;
      let $percent = $(element).find('.discount-percentage');
      let $onsale =  $(element).find('.on-sale');
      let $new = $(element).find('.new');
      if($percent.length){
        $new.css('top', $percent.height() * 2 + FLAG_MARGIN);
        $percent.css('top',-$(element).find('.thumbnail-container').height() + $(element).find('.product-description').height() + FLAG_MARGIN);
      }
      if($onsale.length){
        $percent.css('top', parseFloat($percent.css('top')) + $onsale.height() + FLAG_MARGIN);
        $new.css('top', ($percent.height() * 2 + $onsale.height()) + FLAG_MARGIN * 2);
      }
      if($(element).find('.color').length > 5){
        let count = 0;
        $(element).find('.color').each((index, element) =>{
          if(index > 4){
            $(element).hide();
            count ++;
          }
        });
        $(element).find('.js-count').append(`+${count}`);
      }
    });
  }
}
