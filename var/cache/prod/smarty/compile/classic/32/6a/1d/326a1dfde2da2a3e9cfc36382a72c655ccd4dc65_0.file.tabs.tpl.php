<?php
/* Smarty version 4.2.1, created on 2024-04-16 22:41:06
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_trackingcustomer\views\templates\hook\tabs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661ef072b34cd5_50327936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '326a1dfde2da2a3e9cfc36382a72c655ccd4dc65' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\templates\\hook\\tabs.tpl',
      1 => 1711800445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661ef072b34cd5_50327936 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="ets_tc_tabs">
    <li class="tab tab_analystic<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'analystic') {?> active<?php }?>">
        <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_config']->value,'html','UTF-8' ));?>
&current_tab=analystic">
            <img src="../modules/ets_trackingcustomer/views/img/customer_analystic_icon.png" /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Analytics','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

        </a>
    </li>
    <li class="tab tab_customer_session<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'customer_session') {?> active<?php }?>">
        <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminTrackingCustomerSession'),'html','UTF-8' ));?>
&current_tab=customer_session">
            <img src="../modules/ets_trackingcustomer/views/img/customer_session_icon.png" /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customer sessions','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

        </a>
    </li>
    <li class="tab tab_products<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'products') {?> active<?php }?>">
        <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_config']->value,'html','UTF-8' ));?>
&current_tab=products">
            <img src="../modules/ets_trackingcustomer/views/img/viewed-products.png" /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Products viewed','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

        </a>
    </li>
    <li class="tab tab_settings<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'settings') {?> active<?php }?>">
        <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_config']->value,'html','UTF-8' ));?>
&current_tab=settings">
            <img src="../modules/ets_trackingcustomer/views/img/settings_icon.png" /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Settings','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

        </a>
    </li>
</ul>
<div class="ets_tc_tabs_height"></div><?php }
}
