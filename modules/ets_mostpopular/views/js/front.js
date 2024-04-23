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
    if($('.most_products_list_wrapper.layout-slide:not(.slick-slider):not(.product_list_16)').length >0)
    {
        $('.most_products_list_wrapper.layout-slide:not(.slick-slider):not(.product_list_16)').each(function(){
            var this_slick = $(this);
            var count_products = this_slick.find('.product-miniature').length;
            $(this).slick({
                  slidesToShow: count_products && count_products <  ets_mostp_nbItemsPerLine ? count_products :ets_mostp_nbItemsPerLine,
                  slidesToScroll: 1,
                  arrows: true,
                  autoplay:this_slick.hasClass('auto'),
                  responsive: [
                      {
                          breakpoint: 1199,
                          settings: {
                              slidesToShow: count_products && count_products <  ets_mostp_nbItemsPerLine ? count_products :ets_mostp_nbItemsPerLine
                          }
                      },
                      {
                          breakpoint: 992,
                          settings: {
                              slidesToShow: count_products && count_products <  ets_mostp_nbItemsPerLineTablet ? count_products :ets_mostp_nbItemsPerLineTablet
                          }
                      },
                      {
                          breakpoint: 768,
                          settings: {
                              slidesToShow: count_products && count_products <  ets_mostp_nbItemsPerLineMobile ? count_products :ets_mostp_nbItemsPerLineMobile
                          }
                      },
                      {
                          breakpoint: 480,
                          settings: {
                            slidesToShow: count_products && count_products <  ets_mostp_nbItemsPerLineMobile ? count_products :ets_mostp_nbItemsPerLineMobile
                          }
                      }
                   ]
            });
        });
   }
});