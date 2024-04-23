<?php
/* Smarty version 4.2.1, created on 2024-04-16 18:55:52
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_trackingcustomer\views\templates\hook\session_by_cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661ebba81f70c7_97262602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c8be0397da4d15d46add76dc85905a82f2db21c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\templates\\hook\\session_by_cart.tpl',
      1 => 1711800445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661ebba81f70c7_97262602 (Smarty_Internal_Template $_smarty_tpl) {
?><a class="session" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_view_session']->value,'html','UTF-8' ));?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View session','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
">
    <i class="icon-search-plus"></i>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View session','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

</a><?php }
}
