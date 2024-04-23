$(document).ready(function(){  
    $('.ets_clock').each(function(){
        var id_ets_product = $(this).data('id-product');
        var date_to = $(this).data('date-to');
        if(date_to != "" && parseInt(id_ets_product) >0){
            $(this).countdown(date_to).on('update.countdown', function(event) {
              var d = (event.offset.totalDays > 1 ? event.offset.totalDays+' <span class="number">'+days+'</span> ':event.offset.totalDays+' <span class="number">'+day+'</span>');
              var h = (event.offset.hours > 1 ? event.offset.hours+' <span class="number">'+hrs+'</span> ':event.offset.hours+' <span class="number">'+hr+'</span>');
              var m = (event.offset.minutes > 1 ? event.offset.minutes+' <span class="number">'+mins+'</span> ':event.offset.minutes+' <span class="number">'+min+'</span>');
              var s = (event.offset.seconds > 1 ? event.offset.seconds+' <span class="number">'+secs+'</span> ':event.offset.seconds+' <span class="number">'+sec+'</span>');
              var $this = $(this).html(event.strftime(''
                + '<span class = "ybc_cd_item">'+d+'</span> '
                + '<span class = "ybc_cd_item">'+h+'</span> '
                + '<span class = "ybc_cd_item">'+m+'</span> '
                + '<span class = "ybc_cd_item">'+s+'</span> '));
            });
            $(this).addClass('active');
        }
    });
    
    var $owl = $('.ets-product-specific');
    $owl.owlCarousel({
        items : 1,
        responsive : {
                // breakpoint from 0 up
                0 : {
                    items : 1
                },
                // breakpoint from 480 up
                480 : {
                    items : 1,
                    margin: 30,
                },
                // breakpoint from 768 up
                768 : {
                    items : 1
                }
            },
        nav : true,  
        loop: $(".ets-product-specific .product-miniature").length > 1,
        rewindNav : false,
        dots : false, 
        margin: 0,        
        navText: ['', ''],  
        callbacks: true,
    });
});