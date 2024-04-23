<?php
/* Smarty version 4.2.1, created on 2024-04-13 15:41:41
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ph_viewedproducts\views\templates\hook\admin_head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661a99a50b8149_32420351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56114c89d7283f47f6fbd371c3fc0cc5598bcb17' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ph_viewedproducts\\views\\templates\\hook\\admin_head.tpl',
      1 => 1711927836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a99a50b8149_32420351 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['jsAdmin']->value)) && $_smarty_tpl->tpl_vars['jsAdmin']->value) {?>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['jsAdmin']->value,'html','UTF-8' ));?>
" defer="defer"><?php echo '</script'; ?>
>
<?php }
}
}
