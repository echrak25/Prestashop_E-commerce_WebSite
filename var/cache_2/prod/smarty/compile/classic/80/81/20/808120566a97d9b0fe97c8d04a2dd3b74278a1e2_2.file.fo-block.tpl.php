<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:08:38
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_savemycart\views\templates\hook\fo-block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661013f6672ec4_43521981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '808120566a97d9b0fe97c8d04a2dd3b74278a1e2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_savemycart\\views\\templates\\hook\\fo-block.tpl',
      1 => 1711922705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661013f6672ec4_43521981 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="<?php if ($_smarty_tpl->tpl_vars['is17']->value) {?>col-lg-4 col-md-6 col-sm-6 col-xs-12 <?php }?>ets_sc_shopping_cart">
  <a class="" id="shopping-cart-link" href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
    <span class="link-item">
      <i class="material-icons shopping-cart">shopping_cart</i>
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My shopping carts','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>

    </span>
  </a>
</li><?php }
}
