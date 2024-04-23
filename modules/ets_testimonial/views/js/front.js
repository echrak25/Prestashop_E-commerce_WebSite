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
    $('.ets-ttn-list-reviews-slide').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3,
        slidesToScroll:3,
        autoplay: ETS_TTN_AUTOPLAY_SLIDESHOW,
        autoplaySpeed: ETS_TTN_TIME_SPEED_SLIDESHOW,
        dots: true,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 3,
                    slidesToScroll:3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    arrows: true,
                    centerMode: false,
                    centerPadding: '0px',
                    slidesToShow: 2,
                    slidesToScroll:2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1
                }
            }
        ]
    });
});
$(document).on('hooksLoaded',function(){
    $('.ets-ttn-list-reviews-slide:not(.slick-slider)').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3,
        slidesToScroll:3,
        autoplay: ETS_TTN_AUTOPLAY_SLIDESHOW,
        autoplaySpeed: ETS_TTN_TIME_SPEED_SLIDESHOW,
        dots: true,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 3,
                    slidesToScroll:3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    arrows: true,
                    centerMode: false,
                    centerPadding: '0px',
                    slidesToShow: 2,
                    slidesToScroll:2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1
                }
            }
        ]
    });
});