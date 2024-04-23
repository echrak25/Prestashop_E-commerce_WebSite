{*
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
* needs, please contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2022 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
{if $tc_display_panel}
<div class="ybc-theme-panel closed">
    <div class="ybc-theme-panel-medium">
        <div class="ybc-theme-panel-btn" title="{l s='Theme Option' mod='ybc_themeconfig'}">{*l s='Setting' mod='ybc_themeconfig'*}</div>
        <div class="ybc-theme-panel-loading">
            <div class="ybc-theme-panel-loading-setting">
                <h2>
                    <img alt="{l s='Loading' mod='ybc_themeconfig'}" class="ybc-theme-panel-loading-logo" src="{$tc_modules_dir|escape:'html':'UTF-8'}img/loading.gif" />
                    <br/>
                    <span>{l s='Updating...' mod='ybc_themeconfig'}</span>
                </h2>
            </div>
        </div>
        <div class="ybc-theme-panel-wrapper">
            <h2>{l s='Theme options' mod='ybc_themeconfig'}</h2>
            <div class="ybc-theme-panel-box tc-separator"><h3>{l s='Theme color' mod='ybc_themeconfig'}</h3></div>
            <div class="ybc-theme-panel-inner">
                <div class="ybc-theme-panel-box">                    
                    <ul class="ybc-skin ybc_tc_skin ybc_select_option" id="ybc_tc_skin">
                        {if $skins}
                            {foreach from=$skins item='skin'}
                                <li style="background: {$skin.main_color|escape:'html':'UTF-8'};" {if $configs.YBC_TC_SKIN==$skin.id_option}class="active"{/if} data-val="{$skin.id_option|escape:'html':'UTF-8'}" title="{$skin.name|escape:'html':'UTF-8'}">{$skin.name|escape:'html':'UTF-8'}</li>
                            {/foreach}
                        {/if}
                    </ul>
                </div>
                {if isset($ybcDev) && $ybcDev}  
                    <div class="ybc-theme-panel-box tc-separator"><h3>{l s='Layout type' mod='ybc_themeconfig'}</h3></div>
                    <div class="ybc-theme-panel-box">                    
                        <ul id="ybc_tc_layout" class="ybc_tc_layout ybc_select_option">
                            {if $layouts}
                                {foreach from=$layouts item='layout'}
                                    <li {if $configs.YBC_TC_LAYOUT==$layout.id_option}class="active"{/if} data-val="{$layout.id_option|escape:'html':'UTF-8'}">{$layout.name|escape:'html':'UTF-8'}</li>
                                {/foreach}
                            {/if}
                        </ul>
                    </div>
                {/if}
                {if isset($float_header) && $float_header}
                    <div class="ybc-theme-panel-box tc-separator"><h3>{l s='Float header' mod='ybc_themeconfig'}</h3></div>
                    <div class="ybc-theme-panel-box">                    
                        <ul id="ybc_tc_float_header" class="ybc_tc_float_header ybc_select_option">
                            <li {if $configs.YBC_TC_FLOAT_HEADER}class="active"{/if} data-val="1">{l s='Yes' mod='ybc_themeconfig'}</li>
                            <li {if !$configs.YBC_TC_FLOAT_HEADER}class="active"{/if} data-val="0">{l s='No' mod='ybc_themeconfig'}</li>
                        </ul>
                    </div>
                {/if}
                {if isset($bgs) && $bgs}              
                    <div class="ybc-theme-panel-box tc-separator"><h3>{l s='Background image' mod='ybc_themeconfig'}</h3></div>
                    <div class="ybc-theme-panel-box tc-ul">
                        {if $bgs}
                            <ul class="ybc-theme-panel-bg-list">
                                {foreach from=$bgs item='bg'}
                                    <li><span rel='{$bg|escape:'html':'UTF-8'}' class="ybc-theme-panel-bg{if $configs.YBC_TC_BG_IMG==$bg} active{/if}" style="background: url('{$moduleDirl|escape:'html':'UTF-8'}bgs/{$bg|escape:'html':'UTF-8'}.png');"></span></li>
                                {/foreach}
                            </ul>
                        {/if}
                    </div>
                {/if}
                <div class="ybc-theme-panel-box tc-reset">
                    <span id="tc-reset">{l s='Reset to default' mod='ybc_themeconfig'}</span>
                </div>
            </div>        
        </div>       
    </div>
</div>
{/if}
<div class="tc_comparison_msg tc_comparison_success">
    <p>{l s='The product has been successfully added to comparison' mod='ybc_themeconfig'}</p>
    <a href="{$tc_comparison_link|escape:'html':'UTF-8'}" class="button">{l s='View all products' mod='ybc_themeconfig'}</a>
</div>
<div class="tc_comparison_msg tc_comparison_failed">
    <p>{l s='The product has been removed from comparison' mod='ybc_themeconfig'}</p>
</div>
<script type="text/javascript">
    var YBC_TC_FLOAT_CSS3 = {$YBC_TC_FLOAT_CSS3|escape:'html':'UTF-8'};
    var YBC_TC_AJAX_URL = '{$moduleDirl|escape:'html':'UTF-8'}ajax.php';
</script>