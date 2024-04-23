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
<script type="text/javascript" src="{$ets_ttn_module_dir|escape:'html':'UTF-8'}views/js/rating.js"></script>
<script type="text/javascript" src="{$ets_ttn_module_dir|escape:'html':'UTF-8'}views/js/admin.js"></script>
<script type="text/javascript">
    {if isset($ets_link_search_product)}
        var ets_link_search_product ='{$ets_link_search_product nofilter}';
    {/if}
    var comfirm_delete_image_text = '{l s='Do you want to delete this image?' mod='ets_testimonial' js=1}';
    var confirm_delete_all_review ='{l s='Do you want to delete all selected reviews' mod='ets_testimonial' js=1}';
    var confirm_duplicate_all_review ='{l s='Do you want to duplicate all selected reviews' mod='ets_testimonial' js=1}';
</script>