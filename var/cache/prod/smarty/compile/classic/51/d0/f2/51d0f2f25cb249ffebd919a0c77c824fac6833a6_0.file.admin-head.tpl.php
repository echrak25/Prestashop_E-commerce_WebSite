<?php
/* Smarty version 4.2.1, created on 2024-04-13 21:13:41
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_trackingcustomer\views\templates\hook\admin-head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661ae775758b88_91207347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51d0f2f25cb249ffebd919a0c77c824fac6833a6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\templates\\hook\\admin-head.tpl',
      1 => 1711800445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661ae775758b88_91207347 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['ets_tc_link_view_session']->value)) && $_smarty_tpl->tpl_vars['ets_tc_link_view_session']->value) {?>
    <?php echo '<script'; ?>
 type="text/javascript">
        var ets_tc_link_view_session = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ets_tc_link_view_session']->value,'html','UTF-8' ));?>
';
        var View_session_text = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View session','mod'=>'ets_trackingcustomer','js'=>1),$_smarty_tpl ) );?>
';
    <?php echo '</script'; ?>
>
<?php }
}
}
