{*
* 2007-2024 PrestaHero
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
* needs please, contact us for extra customization service at an affordable price
*
*  @author PrestaHero <etssoft.jsc@gmail.com>
*  @copyright  2007-2024 PrestaHero
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of PrestaHero
*}
<script type="text/javascript">
    var PH_CON_TRANS = {$transJs|@json_encode nofilter};
    var PH_CON_LINKS = {$phLinks|@json_encode nofilter};
    var PH_CON_LOGO = '{$phLogoIcon nofilter}';
    var PH_CON_MODULE_LIST_URL = '{$linkModuleList nofilter}';
    var PH_CON_ACCOUNT_NAME = "{$accountName|escape:'html':'UTF-8'}";
    var PH_CON_LINK_LOGOUT = "{$linkLogoutPhAccount|escape:'quotes':'UTF-8'}";
    var PH_CON_LINK_AJAX_MODULE = "{$linkAjaxModule|escape:'quotes':'UTF-8'}";
    var PH_CON_CONTROLLER = "{$controllerName|escape:'html':'UTF-8'}";
    var PH_CON_IS17 = {if $is17}1{else}0{/if};
    var PH_CON_MSG_ACTION = "{$msgAction|escape:'html':'UTF-8'}";
    var PH_CON_IS_OLD_ACTION = {if $isOldAction}1{else}0{/if};
    var PH_CON_IS_LOGGED = {if $isLogged}1{else}0{/if};
    var PH_CON_RELOAD_UPGRADE_COUNT = {if $reloadUpgradeCount}1{else}0{/if};
    var PH_CON_UPGRADE_COUNT = {$upgradeCount|intval};
</script>

<script src="{$globalJs|escape:'quotes':'UTF-8'}" defer="defer"></script>
{if $linkAdminJs}
<script src="{$linkAdminJs|escape:'quotes':'UTF-8'}" defer="defer"></script>
{/if}