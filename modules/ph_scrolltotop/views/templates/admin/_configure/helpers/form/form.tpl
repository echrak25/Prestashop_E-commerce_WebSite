{*
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
* needs, please contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2023 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}

{extends file="helpers/form/form.tpl"}
{block name="input"}
    {if $input.type == 'ets_touch_spin'}
        <div class="input-pixel">
            <div class="bootstrap-touchspin col-lg-2">
                <input type="number" style="width: 100%"
                       name="{$input.name|escape:'html':'UTF-8'}"
                       class="input-group form-control" value="{$fields_value[$input.name]|escape:'html':'UTF-8'}" min="0"/>
            </div>
        </div>
    {elseif $input.name == 'ETS_BUTTON_ICON'}
        <div class="dummyfile input-group col-lg-3">
            {$smarty.block.parent}
            <span class="input-group-btn ph_browse_icon">
                <button type="button" name="submitAddBrowseIcon" class="btn btn-default">
                    <i class="icon-search"></i>&nbsp;{l s='Browse icon' mod='ph_scrolltotop'}
                </button>
            </span>
        </div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
{block name="footer"}

    <div class="panel-footer">
        <span class="btn btn-default pull-left ets_reset" >
                <img src="{$baseImageUrl|escape:'html':'UTF-8'}loader.gif" style="display: none"/>
                <i class="process-icon-refresh"></i>
                {l s='Reset' mod='ph_scrolltotop'}
        </span>
        <div class="scroll-to-top-save">
            <button type="submit" value="1"	class="btn btn-default pull-right ets_save">
                <i class="process-icon-save"></i>
                {l s='Save' mod='ph_scrolltotop'}
            </button>
        </div>
    </div>
{/block}
{block name="other_fieldsets"}
    <script>
        var baseAdminUrl = "{$baseAdminUrl|escape:'quotes':'UTF-8'}";
        var imageName = "{$imageName|escape:'quotes':'UTF-8'}";
        var imagePath = "{$imagePath|escape:'quotes':'UTF-8'}";
        var delete_url = "{$delete_url|escape:'quotes':'UTF-8'}";
    </script>
    <div class="scroll_loading_icon hidden"><img src="{$baseImageUrl|escape:'html':'UTF-8'}ajax-loader.gif" /></div>
    <div class="scroll_forms scroll_popup_overlay hidden">
        <div class="scroll_icon_form_new hidden">{$iconForm nofilter}</div>
    </div>
{/block}