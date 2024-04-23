<?php
/* Smarty version 4.2.1, created on 2024-04-13 15:45:28
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_savemycart\views\templates\hook\fo-shopping-cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661a9a8877e194_82679241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '099d3276c2b20c363dd689bc7a84cda9d9d299ea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_savemycart\\views\\templates\\hook\\fo-shopping-cart.tpl',
      1 => 1711922705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a9a8877e194_82679241 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="clearfix"></div>
<button id="ets_sc_cart_save" name="saveCart" type="button" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save my cart','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</button><?php }
}
