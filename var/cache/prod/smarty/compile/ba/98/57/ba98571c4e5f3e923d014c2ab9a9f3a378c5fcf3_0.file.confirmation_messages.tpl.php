<?php
/* Smarty version 4.2.1, created on 2024-04-13 15:41:41
  from 'C:\xampp\htdocs\CozyHome\prestashop\admin871u6nvcqilnwlsmsvm\themes\new-theme\template\components\layout\confirmation_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661a99a5357585_23286541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba98571c4e5f3e923d014c2ab9a9f3a378c5fcf3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\admin871u6nvcqilnwlsmsvm\\themes\\new-theme\\template\\components\\layout\\confirmation_messages.tpl',
      1 => 1711726217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a99a5357585_23286541 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['confirmations']->value)) && count($_smarty_tpl->tpl_vars['confirmations']->value) && $_smarty_tpl->tpl_vars['confirmations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-success" style="display:block;">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['confirmations']->value, 'conf');
$_smarty_tpl->tpl_vars['conf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['conf']->value) {
$_smarty_tpl->tpl_vars['conf']->do_else = false;
?>
        <?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>
<?php }
}
}
