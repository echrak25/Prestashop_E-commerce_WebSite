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
var ets_tc_link_customer_session ='{$ets_tc_link_customer_session|escape:'html':'UTF-8'}';
var Customer_session_text = '{l s='Customer sessions' mod='ets_trackingcustomer' js=1}';
$(document).ready(function(){
    if(ets_tc_link_customer_session && $('a.btn-help.btn-sidebar').length)
    {
        $('a.btn-help.btn-sidebar').before('<a class="btn btn-outline-secondary ets_tc_customer_session" href="'+ets_tc_link_customer_session+'" title="'+Customer_session_text+'" data-url="'+ets_tc_link_customer_session+'"> '+Customer_session_text+' </a>')
    }
});
</script>