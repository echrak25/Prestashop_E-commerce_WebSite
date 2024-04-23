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
    ets_dc_cart_rule.displayForm();
    $(document).on('click','input[name="ETS_DC_CART_RULE_COMBINATION"]',function(){
        ets_dc_cart_rule.displayForm();
    });
    ets_dc_cart_rule.search_rule();
    $(document).on('click','.dc_rule_item .dc_block_item_close',function(){
        var $ul = $(this).parents('ul.dc_rules');
        var ids = '';
        $(this).parent().remove();
        if($ul.find('.dc_rule_item').length)
        {
            $ul.find('.dc_rule_item').each(function(){
                ids += $(this).attr('data-id')+',';
                
            });
        }
        $ul.prev('.dc_ids_rule').val(ids.trim(',')); 
    });
    $(document).on('click','#cart_rule_select_remove',function(){
        $('#cart_rule_select_2 option:selected').remove().appendTo('#cart_rule_select_1');
    });
    $(document).on('click','#cart_rule_select_add',function(){
        $('#cart_rule_select_1 option:selected').remove().appendTo('#cart_rule_select_2');
    });
    $('#configuration_form').submit(function(){
        if($('#cart_rule_select_1 option').length)
        {
            $('#cart_rule_select_1 option').each(function (i) {
                $(this).prop('selected', true);
            });
        }
        
    });
});
var ets_dc_cart_rule = {
    displayForm: function(){
        if($('input[name="ETS_DC_CART_RULE_COMBINATION"]').length)
        {
            $('.rule_combination.form-group').hide();
            $('.rule_combination.form-group.'+$('input[name="ETS_DC_CART_RULE_COMBINATION"]:checked').val()).show();
        }
    },
    search_rule : function(){
        if ($('.dc_search_rule').length > 0 && typeof dc_link_search_rule !== "undefined")
        {
            var dc_rule_autocomplete = $('.dc_search_rule');
            dc_rule_autocomplete.autocomplete(dc_link_search_rule, {
                resultsClass: "dc_results",
                minChars: 1,
                delay: 300,
                appendTo: '.dc_search_rule_form',
                autoFill: false,
                max: 20,
                matchContains: false,
                mustMatch: false,
                scroll: true,
                cacheLength: 100,
                scrollHeight: 180,
                formatItem: function (item) {
                    return '<span data-item-id="'+item[0]+'" class="dc_item_title">' +item[1]+ (item[2] ? ' - '+item[2]:'') +'</span>';
                },
            }).result(function (event, data, formatted) {
                if (data)
                {
                    ets_dc_cart_rule.addRule(data);
                }
            });
        }
    },
    addRule: function(data){
        var input_name = 'ETS_DC_SPECIFIC_RULE_COBINATION';
        if ($('#block_search_'+input_name).length > 0 && $('#block_search_'+input_name+' .dc_rule_item[data-id="'+data[0]+'"]').length==0)
        {
            if ($('#block_search_'+input_name+' .dc_rule_loading.active').length <=0)
            {
                $('#block_search_'+input_name+' .dc_rule_loading').addClass('active');
                var row_html ='<li class="dc_rule_item " data-id="'+data[0]+'">';
                    row_html +='<div class="dc_rule_info"><span class="rule_name">'+data[1]+(data[2] ? ' - '+data[2]:'')+'</span></div>';
                    row_html +='<div class="dc_block_item_close" title="'+Delete_text+'">';
                    row_html += '<i class="ets_svg_fill_lightgray"><svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z"> </svg></i>';    
                    row_html +='</div>';
                row_html +='</li>';
                $('#block_search_'+input_name+' .dc_rule_loading.active').before(row_html);
                $('#block_search_'+input_name+' .dc_rule_loading').removeClass('active');
                $('.dc_search_rule').val('');
                if (!$('input[name="'+input_name+'"]').val()) 
                {
                    $('input[name="'+input_name+'"]').val(data[0]);
                } 
                else 
                {
                    if ($('input[name="'+input_name+'"]').val().split(',').indexOf(data[0]) == -1) 
                    {
                        $('input[name="'+input_name+'"]').val($('input[name="'+input_name+'"]').val() + ',' + data[0]);

                    } 
                    else 
                    {
                        showErrorMessage(data[2].toString() + ' has been tagged.');
                    }
                }
            }
        }
        $('.dc_search_rule').val('');
    }
}