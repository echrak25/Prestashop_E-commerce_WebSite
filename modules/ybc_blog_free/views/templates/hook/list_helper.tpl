{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div class="panel ybc-blog-panel">
    <div class="panel-heading">{$title|escape:'html':'UTF-8'}
        {if isset($totalRecords)}<span class="badge">{$totalRecords|intval}</span>{/if}
        <span class="panel-heading-action">
            {if !isset($show_add_new) || isset($show_add_new) && $show_add_new}            
                <a class="list-toolbar-btn" href="{$currentIndex|escape:'html':'UTF-8'}">
                    <span data-placement="top" data-html="true" data-original-title="{l s='Add new' mod='ybc_blog_free'}" class="label-tooltip" data-toggle="tooltip" title="">
        				<i class="process-icon-new"></i>
                    </span>
                </a>            
            {/if}
            {if isset($preview_link) && $preview_link}            
                <a target="_blank" class="list-toolbar-btn" href="{$preview_link|escape:'html':'UTF-8'}">
                    <span data-placement="top" data-html="true" data-original-title="{l s='Preview ' mod='ybc_blog_free'} ({$title|escape:'html':'UTF-8'})" class="label-tooltip" data-toggle="tooltip" title="">
        				<i style="margin-left: 5px;" class="icon-search"></i>
                    </span>
                </a>            
            {/if}
        </span>
    </div>
    {if $fields_list}
        <div class="table-responsive clearfix">
            <form method="post" action="{$currentIndex|escape:'html':'UTF-8'}&amp;list=true">
                <table class="table configuration">
                    <thead>
                        <tr class="nodrag nodrop">
                            {foreach from=$fields_list item='field' key='index'}
                                <th>
                                    <span class="title_box">
                                        {$field.title|escape:'html':'UTF-8'}
                                        {if isset($field.sort) && $field.sort}
                                            <a href="{$currentIndex|escape:'html':'UTF-8'}&amp;sort={$index|escape:'html':'UTF-8'}&amp;sort_type=asc&amp;list=true{$filter_params nofilter}"><i class="icon-caret-down"></i></a>
                                            <a href="{$currentIndex|escape:'html':'UTF-8'}&amp;sort={$index|escape:'html':'UTF-8'}&amp;sort_type=desc&amp;list=true{$filter_params nofilter}"><i class="icon-caret-up"></i></a>
                                        {/if}
                                    </span>
                                </th>                            
                            {/foreach}
                            {if $show_action}
                                <th style="text-align: center;">{l s='Action' mod='ybc_blog_free'}</th>
                            {/if}
                        </tr>
                        {if $show_toolbar}
                            <tr class="nodrag nodrop filter row_hover">
                                {foreach from=$fields_list item='field' key='index'}
                                    <th>
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
                                                            <option {if $field.active!=='' && $field.active==$option.$id_option} selected="selected" {/if} value="{$option.$id_option|escape:'html':'UTF-8'}">{$option.$value|escape:'html':'UTF-8'}</option>
                                                        {/foreach}
                                                    {/if}
                                                </select>                                            
                                            {/if}
                                        {else}
                                           {l s=' -- ' mod='ybc_blog_free'}
                                        {/if}
                                    </th>
                                {/foreach}
                                {if $show_action}
                                    <th class="actions">
                                        <span class="pull-right">
                                            <input type="hidden" name="post_filter" value="yes" />
                                            {if $show_reset}<a  class="btn btn-warning"  href="{$currentIndex|escape:'html':'UTF-8'}&amp;list=true"><i class="icon-eraser"></i> {l s='Reset' mod='ybc_blog_free'}</a> &nbsp;{/if}
                                            <button class="btn btn-default" name="ybc_submit_{$name|escape:'html':'UTF-8'}" id="ybc_submit_{$name|escape:'html':'UTF-8'}" type="submit">
            									<i class="icon-search"></i> {l s='Filter' mod='ybc_blog_free'}
            								</button>
                                        </span>
                                    </th>
                                {/if}
                            </tr>
                        {/if}
                    </thead>
                    <tbody>
                        {foreach from=$field_values item='row'}
                            <tr>
                                {foreach from=$fields_list item='field' key='key'}                                
                                    <td class="pointer">
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
                                                {l s=' -- ' mod='ybc_blog_free'}
                                            {/if}
                                        {elseif $field.type != 'active'}
                                            {if isset($row.$key) && !is_array($row.$key)}{if isset($field.strip_tag) && !$field.strip_tag}{$row.$key nofilter}{else}{$row.$key|strip_tags:'UTF-8'|truncate:120:'...'}{/if}{/if}
                                            {if isset($row.$key) && is_array($row.$key) && isset($row.$key.image_field) && $row.$key.image_field}
                                                <a class="ybc_fancy" href="{$row.$key.img_url|escape:'html':'UTF-8'}"><img style="{if isset($row.$key.height) && $row.$key.height}max-height: {$row.$key.height|intval}px;{/if}{if isset($row.$key.width) && $row.$key.width}max-width: {$row.$key.width|intval}px;{/if}" src="{$row.$key.img_url|escape:'html':'UTF-8'}" /></a>
                                            {/if}                                        
                                        {else}                                            
                                            {if isset($row.$key) && $row.$key}
                                                <a href="{$currentIndex|escape:'html':'UTF-8'}&amp;{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}&amp;change_enabled=0&amp;field={$key|escape:'html':'UTF-8'}" class="list-action field-{$key|escape:'html':'UTF-8'} list-action-enable action-enabled list-item-{$row.$identifier|escape:'html':'UTF-8'}" data-id="{$row.$identifier|escape:'html':'UTF-8'}"><i class="icon-check"></i></a>
                                            {else}
                                                <a href="{$currentIndex|escape:'html':'UTF-8'}&amp;{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}&amp;change_enabled=1&amp;field={$key|escape:'html':'UTF-8'}" class="list-action field-{$key|escape:'html':'UTF-8'} list-action-enable action-disabled  list-item-{$row.$identifier|escape:'html':'UTF-8'}" data-id="{$row.$identifier|escape:'html':'UTF-8'}"><i class="icon-remove"></i></a>
                                            {/if}
                                        {/if}
                                    </td>
                                {/foreach}
                                {if $show_action}
                                    <td class="text-right">                                
                                            <div class="btn-group-action">
                                                <div class="btn-group pull-right">
                                                    <a class="edit btn btn-default" href="{$currentIndex|escape:'html':'UTF-8'}&amp;{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}"><i class="icon-pencil"></i> {l s='Edit' mod='ybc_blog_free'}</a>
                                                    <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                						<i class="icon-caret-down"></i>&nbsp;
                                					</button>
                                                    <ul class="dropdown-menu">
                                                        {if isset($row.view_url) && $row.view_url}
                                                            <li><a target="_blank" href="{$row.view_url|escape:'html':'UTF-8'}"><i class="icon-search-plus"></i> {if isset($row.view_text) && $row.view_text} {$row.view_text|escape:'html':'UTF-8'}{else} {l s='Preview' mod='ybc_blog_free'}{/if}</a></li>
                                                            <li class="divider"></li>
                                                        {/if}
                                                        <li><a onclick="return confirm('{l s='Do you want to delete this item?' mod='ybc_blog_free'}');" href="{$currentIndex|escape:'html':'UTF-8'}&amp;{$identifier|escape:'html':'UTF-8'}={$row.$identifier|escape:'html':'UTF-8'}&del=yes"><i class="icon-trash"></i> {l s='Delete' mod='ybc_blog_free'}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                     </td>
                                {/if}
                            </tr>
                        {/foreach}                    
                    </tbody>
                </table>
                {if $paggination}
                    <div class="ybc_paggination" style="margin-top: 10px;">
                        {$paggination nofilter}
                    </div>
                {/if}
            </form>
        </div>
    {/if}
</div>