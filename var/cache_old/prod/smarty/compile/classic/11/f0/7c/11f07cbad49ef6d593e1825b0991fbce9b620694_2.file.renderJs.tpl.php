<?php
/* Smarty version 4.2.1, created on 2024-04-03 21:25:03
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ybc_specificprices\views\templates\hook\renderJs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_660dbb1fdb9318_11143305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11f07cbad49ef6d593e1825b0991fbce9b620694' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ybc_specificprices\\views\\templates\\hook\\renderJs.tpl',
      1 => 1711814408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dbb1fdb9318_11143305 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    var day = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'day','mod'=>'ybc_specificprices'),$_smarty_tpl ) );?>
';
    var hr = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'hour','mod'=>'ybc_specificprices'),$_smarty_tpl ) );?>
';
    var min = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'min','mod'=>'ybc_specificprices'),$_smarty_tpl ) );?>
';
    var sec = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'sec','mod'=>'ybc_specificprices'),$_smarty_tpl ) );?>
';
    var days = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'days','mod'=>'ybc_specificprices'),$_smarty_tpl ) );?>
';
    var hrs = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'hrs','mod'=>'ybc_specificprices'),$_smarty_tpl ) );?>
';
    var mins = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'mins','mod'=>'ybc_specificprices'),$_smarty_tpl ) );?>
';
    var secs = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'secs','mod'=>'ybc_specificprices'),$_smarty_tpl ) );?>
';
<?php echo '</script'; ?>
><?php }
}
