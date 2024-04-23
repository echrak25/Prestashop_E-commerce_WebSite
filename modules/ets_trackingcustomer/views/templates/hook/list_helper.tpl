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
<script type="text/javascript">
var text_update_position='{l s='Successfully updated' mod='ets_trackingcustomer'}';
</script>
<div class="panel ets_tc-panel{if isset($class)} {$class|escape:'html':'UTF-8'}{/if}">
    <div class="panel-heading">{$title nofilter}
        {if isset($totalRecords) && $totalRecords>0}<span class="badge">{$totalRecords|intval}</span>{/if}
        <span class="panel-heading-action">
            {if isset($show_add_new) && $show_add_new}            
                <a class="list-toolbar-btn add_new_link" href="{if isset($link_new)}{$link_new|escape:'html':'UTF-8'}{else}{$currentIndex|escape:'html':'UTF-8'}{/if}">
                    <span data-placement="top" data-html="true" data-original-title="{l s='Add new' mod='ets_trackingcustomer'}" class="label-tooltip" data-toggle="tooltip" title="">
        				 {l s='Add new' mod='ets_trackingcustomer'}
                    </span>
                </a>            
            {/if}
            {if isset($custom_list) && $custom_list}
                <a id="desc-customer-arrange2" class="list-toolbar-btn custom_session_list" href="{$currentIndex|escape:'html':'UTF-8'}" >
    				<i class="ets_icon">
                        <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M384 1408q0 80-56 136t-136 56-136-56-56-136 56-136 136-56 136 56 56 136zm0-512q0 80-56 136t-136 56-136-56-56-136 56-136 136-56 136 56 56 136zm1408 416v192q0 13-9.5 22.5t-22.5 9.5h-1216q-13 0-22.5-9.5t-9.5-22.5v-192q0-13 9.5-22.5t22.5-9.5h1216q13 0 22.5 9.5t9.5 22.5zm-1408-928q0 80-56 136t-136 56-136-56-56-136 56-136 136-56 136 56 56 136zm1408 416v192q0 13-9.5 22.5t-22.5 9.5h-1216q-13 0-22.5-9.5t-9.5-22.5v-192q0-13 9.5-22.5t22.5-9.5h1216q13 0 22.5 9.5t9.5 22.5zm0-512v192q0 13-9.5 22.5t-22.5 9.5h-1216q-13 0-22.5-9.5t-9.5-22.5v-192q0-13 9.5-22.5t22.5-9.5h1216q13 0 22.5 9.5t9.5 22.5z"/></svg>
                    </i> {l s='Customize session list' mod='ets_trackingcustomer'}
                </a>
            {/if}
        </span>
    </div>
    {if $fields_list}
        <form method="post" action="{if isset($postIndex)}{$postIndex|escape:'html':'UTF-8'}{else}{$currentIndex|escape:'html':'UTF-8'}{/if}">
            {if isset($bulk_action_html)}
                {$bulk_action_html nofilter}
            {/if}
            <div class="table-responsive clearfix">
                <table class="table configuration list-{$name|escape:'html':'UTF-8'}">
                    <thead>
                        <tr class="nodrag nodrop">
                            {assign var ='i' value=1}
                            {foreach from=$fields_list item='field' key='index'}
                                <th class="{$index|escape:'html':'UTF-8'}{if isset($field.class)} {$field.class|escape:'html':'UTF-8'}{/if}" {if $show_action && !$actions && count($fields_list)==$i}colspan="2"{/if}>
                                    <span class="title_box">
                                        {$field.title|escape:'html':'UTF-8'}
                                        {if isset($field.sort) && $field.sort}
                                            <span class="soft">
                                            <a href="{$currentIndex|escape:'html':'UTF-8'}&sort={$index|escape:'html':'UTF-8'}&sort_type=desc{$filter_params nofilter}" {if isset($sort)&& $sort==$index && isset($sort_type) && $sort_type=='desc'} class="active"{/if}><i class="icon-caret-down"></i></a>
                                            <a href="{$currentIndex|escape:'html':'UTF-8'}&sort={$index|escape:'html':'UTF-8'}&sort_type=asc{$filter_params nofilter}" {if isset($sort)&& $sort==$index && isset($sort_type) && $sort_type=='asc'} class="active"{/if}><i class="icon-caret-up"></i></a>
                                            </span>
                                            {/if}
                                    </span>
                                </th>  
                                {assign var ='i' value=$i+1}                          
                            {/foreach}
                            {if $show_action && $actions}
                                <th class="table_action" style="text-align: right;">{l s='Action' mod='ets_trackingcustomer'}</th>
                            {/if}
                        </tr>
                        {if $show_toolbar}
                            <tr class="nodrag nodrop filter row_hover">
                                {foreach from=$fields_list item='field' key='index'}
                                    <th class="{$index|escape:'html':'UTF-8'}{if isset($field.class)} {$field.class|escape:'html':'UTF-8'}{/if}">
                                        {if isset($field.filter) && $field.filter}
                                            {if $field.type=='text'}
                                                <input class="filter" name="{$index|escape:'html':'UTF-8'}" type="text" {if isset($field.width)}style="width: {$field.width|intval}px;"{/if} {if isset($field.active)}value="{$field.active|escape:'html':'UTF-8'}"{/if}/>
                                            {/if}
                                            {if $field.type=='select' || $field.type=='active'}
                                                <select  {if isset($field.width)}style="width: {$field.width|intval}px;"{/if}  name="{$index|escape:'html':'UTF-8'}">
                                                    <option value=""> -- </option>
                                                    {if isset($field.filter_list.list) && $field.filter_list.list}
                                                        {assign var='id_option' value=$field.filter_list.id_option}
                                                        {assign var='value' value=$field.filter_list.value}
                                                        {foreach from=$field.filter_list.list item='option'}
                                                            <option {if ($field.active!=='' && $field.active==$option.$id_option) || ($field.active=='' && $index=='has_post' && $option.$id_option==1 )} selected="selected"{/if} value="{$option.$id_option|escape:'html':'UTF-8'}">{$option.$value|escape:'html':'UTF-8'}</option>
                                                        {/foreach}
                                                    {/if}
                                                </select>                                            
                                            {/if}
                                            {if $field.type=='int'}
                                                <label for="{$index|escape:'html':'UTF-8'}_min"><input type="text" placeholder="{l s='Min' mod='ets_trackingcustomer'}" name="{$index|escape:'html':'UTF-8'}_min" value="{$field.active.min|escape:'html':'UTF-8'}" /></label>
                                                <label for="{$index|escape:'html':'UTF-8'}_max"><input type="text" placeholder="{l s='Max' mod='ets_trackingcustomer'}" name="{$index|escape:'html':'UTF-8'}_max" value="{$field.active.max|escape:'html':'UTF-8'}" /></label>
                                            {/if}
                                            {if $field.type=='date'}
                                                <fieldset class="form-group"> 
                                                    <div class="input-group ets_tc_datepicker">
                                                        <input id="{$index|escape:'html':'UTF-8'}_min" autocomplete="off" class="form-control" name="{$index|escape:'html':'UTF-8'}_min" placeholder="{l s='From' mod='ets_trackingcustomer'}" value="{$field.active.min|escape:'html':'UTF-8'}" type="text" autocomplete="off" />
                                                        <div class="input-group-append input-group-addon">
                                                            <div class="input-group-text">
                                                                <i class="ets_icon_svg">
                                                                    <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M192 1664h288v-288h-288v288zm352 0h320v-288h-320v288zm-352-352h288v-320h-288v320zm352 0h320v-320h-320v320zm-352-384h288v-288h-288v288zm736 736h320v-288h-320v288zm-384-736h320v-288h-320v288zm768 736h288v-288h-288v288zm-384-352h320v-320h-320v320zm-352-864v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm736 864h288v-320h-288v320zm-384-384h320v-288h-320v288zm384 0h288v-288h-288v288zm32-480v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm384-64v1280q0 52-38 90t-90 38h-1408q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h128v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h384v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h128q52 0 90 38t38 90z"/></svg>
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group"> 
                                                    <div class="input-group ets_tc_datepicker">
                                                        <input id="{$index|escape:'html':'UTF-8'}_max" autocomplete="off" class="form-control" name="{$index|escape:'html':'UTF-8'}_max" placeholder="{l s='To' mod='ets_trackingcustomer'}" value="{$field.active.max|escape:'html':'UTF-8'}" type="text" autocomplete="off" />
                                                        <div class="input-group-append input-group-addon">
                                                            <div class="input-group-text">
                                                                <i class="ets_icon_svg">
                                                                    <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M192 1664h288v-288h-288v288zm352 0h320v-288h-320v288zm-352-352h288v-320h-288v320zm352 0h320v-320h-320v320zm-352-384h288v-288h-288v288zm736 736h320v-288h-320v288zm-384-736h320v-288h-320v288zm768 736h288v-288h-288v288zm-384-352h320v-320h-320v320zm-352-864v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm736 864h288v-320h-288v320zm-384-384h320v-288h-320v288zm384 0h288v-288h-288v288zm32-480v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm384-64v1280q0 52-38 90t-90 38h-1408q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h128v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h384v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h128q52 0 90 38t38 90z"/></svg>
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            {/if}
                                        {elseif ( $field.type == 'text' && isset($index) && $index == 'input_box') }
                                            <div class="md-checkbox">
                                                <label>
                                                    <input id="bulk_action_select_all" onclick="$('table').find('td input:checkbox').prop('checked', $(this).prop('checked')); ets_tc_updateBulkMenu();" value="" type="checkbox">
                                                    <i class="md-checkbox-control"></i>
                                                </label>
                                            </div>
                                        {else}
                                            {l s=' -- ' mod='ets_trackingcustomer'}
                                        {/if}
                                    </th>
                                {/foreach}
                                {if $show_action}
                                    <th class="actions">
                                        <span class="pull-right flex">
                                            <input type="hidden" name="post_filter" value="yes" />
                                            {if $show_reset}
                                                <a  class="btn btn-warning"  href="{$currentIndex|escape:'html':'UTF-8'}"><i class="icon-eraser"></i> {l s='Reset' mod='ets_trackingcustomer'}</a> &nbsp;
                                            {/if}
                                            <button class="btn btn-default" name="ets_tc_submit_{$name|escape:'html':'UTF-8'}" id="ets_tc_submit_{$name|escape:'html':'UTF-8'}" type="submit">
                                                <i class="icon-search"></i> {l s='Filter' mod='ets_trackingcustomer'}
                                            </button>
                                            {if isset($show_export) && $show_export}
                                                <button class="btn btn-default" name="ets_tc_export_{$name|escape:'html':'UTF-8'}" id="ets_tc_export_{$name|escape:'html':'UTF-8'}" type="submit">
                                                    <i class="icon-download"></i> {l s='Export' mod='ets_trackingcustomer'}
                                                </button>
                                            {/if}
                                        </span>
                                    </th>
                                {/if}
                            </tr>
                        {/if}
                    </thead>
                    <tbody id="list-{$name|escape:'html':'UTF-8'}">
                        {if $field_values}
                        {foreach from=$field_values item='row'}
                            <tr {if isset($row.read) && !$row.read}class="no-read"{/if} data-id="{$row.$identifier|intval}">
                                {assign var='i' value=1}
                                {foreach from=$fields_list item='field' key='key'}                             
                                    <td class="{$key|escape:'html':'UTF-8'} {if isset($sort)&& $sort==$key && isset($sort_type) && $sort_type=='asc' && isset($field.update_position) && $field.update_position}pointer dragHandle center{/if}{if isset($field.class)} {$field.class|escape:'html':'UTF-8'}{/if}" {if $show_action && !$actions && count($fields_list)==$i}colspan="2"{/if} >
                                        {if isset($field.rating_field) && $field.rating_field}
                                            {if isset($row.$key) && $row.$key > 0}
                                                {for $i=1 to (int)$row.$key}
                                                    <div class="star star_on"></div>
                                                {/for}
                                                {if (int)$row.$key < 5}
                                                    {for $i=(int)$row.$key+1 to 5}
                                                        <div class="star"></div>
                                                    {/for}
                                                {/if}
                                            {else}
                                            
                                                {l s=' -- ' mod='ets_trackingcustomer'}
                                            {/if}
                                        {elseif $field.type != 'active'}
                                            {if $field.type=='date'}
                                                {if !$row.$key}
                                                --
                                                {else}
                                                    {if $key!='date_from' && $key!='date_to'}
                                                        {dateFormat date=$row.$key full=1}
                                                    {else}
                                                        {dateFormat date=$row.$key full=0}
                                                    {/if}
                                                {/if}
                                            {elseif $field.type=='checkbox'}
                                                <input type="checkbox" name="{$name|escape:'html':'UTF-8'}_boxs[]" value="{$row.$identifier|escape:'html':'UTF-8'}" class="{$name|escape:'html':'UTF-8'}_boxs" />
                                            {elseif $field.type=='input_number'}
                                                {assign var='field_input' value=$field.field}
                                                <div class="qty edit_quantity" data-v-599c0dc5="">
                                                    <div class="ps-number edit-qty hover-buttons" data-{$identifier|escape:'html':'UTF-8'}="{$row.$identifier|escape:'html':'UTF-8'}">
                                                        <input class="form-control {$name|escape:'html':'UTF-8'}_{$field_input|escape:'html':'UTF-8'}" type="number" name="{$name|escape:'html':'UTF-8'}_{$field_input|escape:'html':'UTF-8'}[{$row.$identifier|escape:'html':'UTF-8'}]" value="" placeholder="0" />
                                                        <div class="ps-number-spinner d-flex">
                                                            <span class="ps-number-up"></span>
                                                            <span class="ps-number-down"></span>
                                                        </div>
                                                    </div>
                                                    <button class="check-button" disabled="disabled"><i class="fa fa-check icon icon-check"></i></button>
                                                </div>
                                            {else}
                                                {if isset($field.update_position) && $field.update_position}
                                                    <div class="dragGroup">
                                                    <span class="positions">
                                                {/if}
                                                {if isset($row.$key) && $row.$key!=='' && !is_array($row.$key)}{if isset($field.strip_tag) && !$field.strip_tag}{$row.$key nofilter}{else}{$row.$key|strip_tags:'UTF-8'|truncate:120:'...'|escape:'html':'UTF-8'}{/if}{else}--{/if}
                                                {if isset($row.$key) && is_array($row.$key) && isset($row.$key.image_field) && $row.$key.image_field}
                                                    <a class="ets_tc_fancy" href="{$row.$key.img_url|escape:'html':'UTF-8'}"><img style="{if isset($row.$key.height) && $row.$key.height}max-height: {$row.$key.height|intval}px;{/if}{if isset($row.$key.width) && $row.$key.width}max-width: {$row.$key.width|intval}px;{/if}" src="{$row.$key.img_url|escape:'html':'UTF-8'}" /></a>
                                                {/if} 
                                                {if isset($field.update_position) && $field.update_position}
                                                    </div>
                                                    </span>
                                                {/if}  
                                            {/if}                                     
                                        {else}
                                            {if isset($row.$key) && $row.$key}
                                                {if (!isset($row.action_edit) || $row.action_edit)}
                                                    <a name="{$name|escape:'html':'UTF-8'}"  href="{$currentIndex|escape:'html':'UTF-8'}&{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}&change_enabled=0&field={$key|escape:'html':'UTF-8'}" class="list-action field-{$key|escape:'html':'UTF-8'} list-action-enable action-enabled list-item-{$row.$identifier|escape:'html':'UTF-8'}" data-id="{$row.$identifier|escape:'html':'UTF-8'}" title="{if $key=='reported'}{l s='Click to unreport' mod='ets_trackingcustomer'}{else}{l s='Click to disable' mod='ets_trackingcustomer'}{/if}">
                                                        <i class="fa fa-check icon icon-check"></i>
                                                    </a>
                                                {else}
                                                    <span class="list-action-enable action-enabled" title="{l s='Yes' mod='ets_trackingcustomer'}">
                                                        <i class="fa fa-check icon icon-check"></i>
                                                    </span>
                                                {/if}
                                            {else}
                                                {if (!isset($row.action_edit) || $row.action_edit)}
                                                    <a name="{$name|escape:'html':'UTF-8'}" href="{$currentIndex|escape:'html':'UTF-8'}&{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}&change_enabled=1&field={$key|escape:'html':'UTF-8'}" class="list-action field-{$key|escape:'html':'UTF-8'} list-action-enable action-disabled  list-item-{$row.$identifier|escape:'html':'UTF-8'}" data-id="{$row.$identifier|escape:'html':'UTF-8'}" title="{if $key=='reported'}{l s='Click to mark as reported' mod='ets_trackingcustomer'}{else}{l s='Click to enable' mod='ets_trackingcustomer'}{/if}">
                                                        <i class="fa fa-remove icon icon-remove"></i>
                                                    </a>
                                                {else}
                                                    <span class="list-action-enable action-disabled" title="{l s='No' mod='ets_trackingcustomer'}">
                                                        <i class="fa fa-remove icon icon-remove"></i>
                                                    </span>
                                                {/if}
                                            {/if}
                                        {/if}
                                    </td>
                                    {assign var='i' value=$i+1}
                                {/foreach}
                                {if $show_action}
                                    {if $actions}  
                                        <td class="text-right">                            
                                            <div class="btn-group-action">
                                                <div class="btn-group pull-right">
                                                        {if $actions[0]=='view'}
                                                            {if isset($row.child_view_url) && $row.child_view_url}
                                                                <a class="btn btn-default link_view" href="{$row.child_view_url|escape:'html':'UTF-8'}" {if isset($view_new_tab) && $view_new_tab} target="_blank" {/if}><i class="icon icon-search-plus fa fa-search-plus"></i> {l s='View' mod='ets_trackingcustomer'}</a>
                                                            {elseif !isset($row.action_edit) || $row.action_edit}
                                                                <a class="btn btn-default link_edit" href="{$currentIndex|escape:'html':'UTF-8'}&edit{$name|escape:'html':'UTF-8'}=1&{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}" ><i class="icon icon-pencil fa fa-pencil"></i> {l s='Edit' mod='ets_trackingcustomer'}</a>
                                                            {/if}
                                                        {/if}
                                                        {if $actions[0]=='delete'}
                                                            <a class="btn btn-default" onclick="return confirm('{l s='Do you want to delete this item?' mod='ets_trackingcustomer' js=1}');" href="{$currentIndex|escape:'html':'UTF-8'}&{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}&del=yes"><i class="icon icon-trash fa fa-trash"></i> {l s='Delete' mod='ets_trackingcustomer'}</a>
                                                        {/if}
                                                        {if $actions|count >=2 && (!isset($row.action_edit) || $row.action_edit || in_array('action',$actions) || (isset($row.action_delete) &&$row.action_delete) )}
                                                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                                                <i class="icon-caret-down"></i>&nbsp;
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                {foreach from=$actions item='action' key='key'}
                                                                    {if $key!=0}
                                                                        {if $action=='delete'}
                                                                            <li><a class="btn btn-default" onclick="return confirm('{l s='Do you want to delete this item?' mod='ets_trackingcustomer'}');" href="{$currentIndex|escape:'html':'UTF-8'}&{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}&del=yes{if isset($row.type)}&type={$row.type|escape:'html':'UTF-8'}{/if}"><i class="fa fa-trash icon icon-trash"></i> {l s='Delete' mod='ets_trackingcustomer'}</a></li>
                                                                        {/if}
                                                                        
                                                                        {if $action=='delete_all'}
                                                                            <li><a class="btn btn-default" onclick="return confirm('{l s='Do you want to delete this shop and all of its data?' mod='ets_trackingcustomer'}');" href="{$currentIndex|escape:'html':'UTF-8'}&{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}&delall=yes{if isset($row.type)}&type={$row.type|escape:'html':'UTF-8'}{/if}"><i class="fa fa-trash icon icon-trash"></i> {l s='Delete all' mod='ets_trackingcustomer'}</a></li>
                                                                        {/if}
                                                                        {if $action=='view'}
                                                                            {if isset($row.child_view_url) && $row.child_view_url}
                                                                                <li><a class="btn btn-default" href="{$row.child_view_url|escape:'html':'UTF-8'}"><i class="fa fa-search-plus icon icon-search-plus"></i> {l s='View' mod='ets_trackingcustomer'}</a></li>
                                                                            {else}
                                                                                <li><a class="btn btn-default" href="{$currentIndex|escape:'html':'UTF-8'}&{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}"><i class="fa fa-pencil icon icon-pencil"></i> {l s='Edit' mod='ets_trackingcustomer'}</a></li>
                                                                            {/if}
                                                                        {/if}
                                                                        {if $action =='edit'}
                                                                            <li><a class="btn btn-default" href="{$currentIndex|escape:'html':'UTF-8'}&edit{$name|escape:'html':'UTF-8'}=1&{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}"><i class="fa fa-pencil icon icon-pencil"></i> {l s='Edit' mod='ets_trackingcustomer'}</a></li>
                                                                        {/if}
                                                                    {/if}
                                                                {/foreach}
                                                            </ul>
                                                        {/if}
                                                </div>
                                            </div>
                                        </td>
                                    {/if}
                                {/if}
                            </tr>
                        {/foreach}
                        {/if}  
                        {if !$field_values}
                            <tr class="no-record not_items_found"> <td colspan="100%"><p>{l s='No data available' mod='ets_trackingcustomer'}</p></td></tr>
                        {/if}                
                    </tbody>
                </table>
            </div>
            {if isset($show_bulk_action) && $show_bulk_action}
                <div id="catalog-actions" class="col order-first">
                    <div class="d-inline-block">
                        <div class="btn-group dropdown bulk-catalog">
                            <button id="product_bulk_menu" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="color:black;">
                                {l s='Bulk actions' mod='ets_trackingcustomer'}
                                <i class="icon-caret-up"></i>
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" name="submitSelectAll" type="button" style="border:none;background:none" >
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    {l s='Select all' mod='ets_trackingcustomer'}
                                </button>
                                <button class="dropdown-item" name="submitUnSelectAll" type="button" style="border:none;background:none">
                                    <i class="fa fa-remove" aria-hidden="true"></i>
                                    {l s='Unselect all' mod='ets_trackingcustomer'}
                                </button>
                                <button class="dropdown-item" name="submitBulkDelete" type="submit" style="border:none;background:none" onclick="return confirm('{l s='Do you want to delete selected item?' mod='ets_trackingcustomer' js=1}');">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    {l s='Delete selected' mod='ets_trackingcustomer'}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            {if $paggination}
                <div class="ets_tc_paggination" style="margin-top: 10px;">
                    {$paggination nofilter}
                </div>
            {/if}
        </form>
    {/if}
</div>
<script type="text/javascript">
    function ets_tc_updateBulkMenu()
    {
        $('tbody input[type="checkbox"]').parent().removeClass('checked');
        $('tbody input[type="checkbox"]:checked').parent().addClass('checked');
    }
    $(document).ready(function(){
       $(document).on('click','tbody input[type="checkbox"]',function(){
            ets_tc_updateBulkMenu();
        }); 
    });
    $(document).on('change','.paginator_select_limit',function(e){
        $(this).parents('form').submit();
    });
    $(document).on('click','button[name="submitSelectAll"]',function(){
        $('table').find('td input:checkbox').prop('checked', true);
    });
    $(document).on('click','button[name="submitUnSelectAll"]',function(){
        $('table').find('td input:checkbox').prop('checked', false);
    });
</script>

