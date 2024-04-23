/**
* 2007-2023 ETS-Soft
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
* versions in the future. If you wish to customize PrestaShop for your
* needs please contact us for extra customization service at an affordable price
*
* @author ETS-Soft <etssoft.jsc@gmail.com>
* @copyright 2007-2023 ETS-Soft
* @license Valid for 1 website (or project) for each purchase of license
* International Registered Trademark & Property of ETS-Soft
*/
$(document).ready(function(){
    etsCDClock.flipClock.init();
    $(document ).ajaxComplete(function( event, xhr, settings ) {
        if(xhr.responseText && xhr.responseText.indexOf("product_prices")==2)
        {
            etsCDClock.flipClock.init();
        } 
    });
});
var etsCDClock = {
    coundownClock: function () {
                if ($('.ets-cd-countdown').length) {
                    $('.ets-cd-countdown').each(function () {
                        var endDate = $(this).attr('data-datetime');
                        if (endDate) {
                            var clock = '<div class="ets-cd-countdown-clock">' +
                                '<span class="ets-cd-countdown-number ets-cd-countdown-days"></span>' +
                                '<span class="ets-cd-countdown-number ets-cd-countdown-hours"></span>' +
                                '<span class="ets-cd-countdown-number ets-cd-countdown-minutes"></span>' +
                                '<span class="ets-cd-countdown-number ets-cd-countdown-seconds"></span>' +
                                '</div>';
                            $(this).html(clock);
                            $(this).removeClass('hide');
                            etsCDClock.setCountdown(this, endDate);
                        }
                    });
                }
            },
            setCountdown: function (element, endDate) {
                var countDownDate = new Date(endDate).getTime();
                var clockInterval = setInterval(function () {

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the result in the element with id="demo"
                    $(element).find('.ets-cd-countdown-days').html(days);
                    $(element).find('.ets-cd-countdown-hours').html(hours);
                    $(element).find('.ets-cd-countdown-minutes').html(minutes);
                    $(element).find('.ets-cd-countdown-seconds').html(seconds);

                    // If the count down is finished, write some text
                    if (distance < 0) {
                        clearInterval(clockInterval);
                        $(element).html('EXPIRED');
                    }
                }, 1000);
            },
            flipClock: {
                flipTo: function (digit, n) {
                    var current = digit.attr('data-num');

                    digit.attr('data-num', n);
                    digit.find('.front').attr('data-content', current);
                    digit.find('.back, .under').attr('data-content', n);
                    digit.find('.flap').css('display', 'block');
                    setTimeout(function () {
                        digit.find('.base').text(n);
                        digit.find('.flap').css('display', 'none');
                    }, 350);
                },

                jumpTo: function (digit, n) {
                    digit.attr('data-num', n);
                    digit.find('.base').text(n);

                },

                updateGroup: function (el, group, n, flip) {
                    var digit1 = $(el).find('.ten' + group);
                    var digit2 = $(el).find('.' + group);
                    n = String(n);
                    if (n.length == 1) n = '0' + n;
                    var num1 = n.substr(0, 1);
                    var num2 = n.substr(1, 1);
                    if (digit1.attr('data-num') != num1) {
                        if (flip) etsCDClock.flipClock.flipTo(digit1, num1);
                        else etsCDClock.flipClock.jumpTo(digit1, num1);
                    }
                    if (digit2.attr('data-num') != num2) {
                        if (flip) etsCDClock.flipClock.flipTo(digit2, num2);
                        else etsCDClock.flipClock.jumpTo(digit2, num2);
                    }
                },

                setTime: function (el, flip, time) {
                    var newTime = time.split(' ');
                    var myDate = newTime[0];
                    var myTime = newTime[1];
                    myDate = myDate.split("-");
                    myTime = myTime.split(':');
                    var newDate = new Date(myDate[0], myDate[1] - 1, myDate[2], myTime[0], myTime[1], myTime[2]);
                    // Get today's date and time
                    var countDownDate = newDate.getTime();
                    var now = new Date().getTime();
                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;
                    if (distance <= 0) {
                        $(el).html('');
                        return;
                    }

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    etsCDClock.flipClock.updateGroup(el, 'day', days, flip);
                    etsCDClock.flipClock.updateGroup(el, 'hour', hours, flip);
                    etsCDClock.flipClock.updateGroup(el, 'min', minutes, flip);
                    etsCDClock.flipClock.updateGroup(el, 'sec', seconds, flip);
                },
                init: function () {
                    var flipBox = '<span class="base"></span>' +
                        '<div class="flap over front"></div>' +
                        '<div class="flap over back"></div>' +
                        '<div class="flap under"></div>';

                    $('.ets-cd-countdown').each(function () {
                        $(this).removeClass('hide');
                        var endDate = $(this).attr('data-datetime');
                        var flip = $(this).attr('data-animate-type') == 'flip' ? true : false;
                        var trans = {
                            days: $(this).attr('data-trans-days'),
                            hours: $(this).attr('data-trans-hours'),
                            minutes: $(this).attr('data-trans-minutes'),
                            seconds: $(this).attr('data-trans-seconds'),
                        };
                        var clockBox = etsCDClock.flipClock.appendClock(flipBox, flip, trans);
                        $(this).html(clockBox);
                        etsCDClock.flipClock.setTime(this, flip, endDate);
                        var $this = this;
                        setInterval(function () {
                            etsCDClock.flipClock.setTime($this, flip, endDate);
                        }, 1000);
                    });
                },
                appendClock: function (flipBox, flip, trans) {
                    return '<div class="clock ' + (flip ? 'flip-clock' : 'normal-clock') + '">' +
                        '<div class="digits">' +
                        '<div class="clock-group">' +
                        '<div class="digit tenday">' + flipBox + '</div>' +
                        '<div class="digit day">' + flipBox + '</div>' +
                        '</div>' +
                        '<div class="text">' + (trans.days) + '</div>' +
                        '</div><span class="dots">:</span>' +
                        '<div class="digits">' +
                        '<div class="clock-group">' +
                        '<div class="digit tenhour">' + flipBox + '</div>' +
                        '<div class="digit hour">' + flipBox + '</div>' +
                        '</div>' +
                        '<div class="text">' + (trans.hours) + '</div>' +
                        '</div><span class="dots">:</span>' +
                        '<div class="digits">' +
                        '<div class="clock-group">' +
                        '<div class="digit tenmin">' + flipBox + '</div>' +
                        '<div class="digit min">' + flipBox + '</div>' +
                        '</div>' +
                        '<div class="text">' + (trans.minutes) + '</div>' +
                        '</div><span class="dots">:</span>' +
                        '<div class="digits">' +
                        '<div class="clock-group">' +
                        '<div class="digit tensec">' + flipBox + '</div>' +
                        '<div class="digit sec">' + flipBox + '</div>' +
                        '</div>' +
                        '<div class="text">' + (trans.seconds) + '</div>' +
                        '</div>' +
                        '</div>';
                }
            }
};