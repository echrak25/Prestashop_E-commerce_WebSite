{*
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
*}
<div class="ets_customer_popup">
    <div class="popup_content table">
        <div class="popup_content_tablecell">
            <div class="popup_content_wrap" style="position: relative">
                <span class="close_popup" title="Close">+</span>
                <div id="block-form-popup-dublicate">
                    <form id="form_arrange" class="defaultForm form-horizontal" action="" method="post" enctype="multipart/form-data" novalidate="">
                        <div class="panel" id="fieldset_0">											
                            <div class="panel-heading">{l s='Customize session list' mod='ets_trackingcustomer'}</div>
                            <div class="form-wrapper">
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            {foreach from=$title_fields key='key' item='field'}
                                                {if isset($field.beggin) && $field.beggin}
                                                    <div class="list-group">
                                                        <div class="group-title">{$field.group|escape:'html':'UTF-8'} </div>
                                                        <span class="open_close_list list_open">{l s='Open/Close' mod='ets_trackingcustomer'}</span>
                                                        <div class="list-group-content row" style="display: block;">
                                                            {if isset($field.all) && $field.all}
                                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                                                    <label class="label_all_arrange_list_customer">
                                                                        <input type="checkbox" class="all_arrange_list_customer"/>
                                                                        <i class="md-checkbox-control"></i>
                                                                        {l s='All' mod='ets_trackingcustomer'}
                                                                    </label>
                                                                </div>
                                                            {/if}
                                                {/if}
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                                    <label for="list_{$key|escape:'html':'UTF-8'}" class="{if isset($field.required) && $field.required} disabled required{/if}" >
                                                        <input class="arrange_list_customer" type="checkbox" value="{$key|escape:'html':'UTF-8'}" id="list_{$key|escape:'html':'UTF-8'}" name="listCustomers[]"{if isset($field.required) && $field.required} checked="checked" disabled="disabled"{else}{if in_array($key,$list_fields)} checked="checked"{/if}{/if} data-title="{$field.title|escape:'html':'UTF-8'}"/>
                                                        <i class="md-checkbox-control"></i>
                                                        {$field.title|escape:'html':'UTF-8'}
                                                    </label>
                                                </div>
                                                {if isset($field.end) && $field.end}
                                                    </div>
                                                </div>
                                                {/if}
                                            {/foreach}
                                        </div> 
                                    </div>
                                    <div class="col-lg-4">
                                        {*
                                        <div class="form_view_select_header">
                                            <label>{l s='View' mod='ets_trackingcustomer'} </label>
                                            <div id="form_view_selected">
                                                <select name="id_view_selected" id="id_view_selected">
                                                    {if $list_views}
                                                        {foreach from=$list_views item='view'}
                                                            <option data-fields="{$view.fields|escape:'html':'UTF-8'}" value="{$view.id_ets_tc_view|intval}"{if $id_view_selected==$view.id_ets_tc_view} selected="selected"{/if}>{$view.name|escape:'html':'UTF-8'}</option>
                                                        {/foreach}
                                                    {/if}
                                                </select>
                                            </div>
                                        </div>
                                        *}
                                        <ul id="list-customer-fields">
                                            {if $list_fields}
                                                {foreach from=$list_fields item='field'}
                                                    {if isset($title_fields.$field) || isset($title_fields.$field.required) }
                                                        <li class="field_{$field|escape:'html':'UTF-8'}">
                                                            <label class="ets1">
                                                            <input type="hidden" name="listFieldCustomers[]" value="{$field|escape:'html':'UTF-8'}"/>{assign var='title_field' value= $title_fields.$field}{$title_field.title|escape:'html':'UTF-8'}
                                                            </label>
                                                            {if !isset($title_fields.$field.required)}
                                                                <span class="close_field" data-field="{$field|escape:'html':'UTF-8'}">{l s='Close' mod='ets_trackingcustomer'}</span>
                                                            {/if}
                                                        </li>
                                                    {/if}
                                                {/foreach}
                                            {/if}
                                        </ul>
                                        
                                        <div class="ets_group_btn_save_view">
                                            <button class="btn btn-default clear_all_session_fields" type="button">
                                                {l s='Clear selected' mod='ets_trackingcustomer'}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-default pull-left" name="btnSubmitRessetToDefaultList">
                                    <i class="process-icon-repeat fa fa-repeat"></i>{l s='Reset to default' mod='ets_trackingcustomer'}
                                </button>
                    			<button type="submit" value="1" id="module_form_submit_btn" name="btnSubmitArrangeListCustomer" class="btn btn-default pull-right">
                    				<i class="process-icon-save"></i> {l s='Save' mod='ets_trackingcustomer'}
                    			</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var $myFields = $("#list-customer-fields");
        $myFields.sortable({
            opacity: 0.6,
            cursor: "move",
            update: function () {
            },
            stop: function (event, ui) {
            }
        });
        $myFields.hover(
            function () {
                $(this).css("cursor", "move");
            },
            function () {
                $(this).css("cursor", "auto");
            }
        ); 
        {literal}
        $('.all_arrange_list_customer').each(function(){
            var $list_group = $(this).closest('.list-group');
            if($list_group.find('input.arrange_list_customer:checked').length == $list_group.find('input.arrange_list_customer').length)
            {
                $(this).attr('checked','checked');
            }
        });
        {/literal}
    });
</script>