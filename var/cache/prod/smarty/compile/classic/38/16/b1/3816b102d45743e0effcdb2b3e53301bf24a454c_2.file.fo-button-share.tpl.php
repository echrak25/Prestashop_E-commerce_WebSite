<?php
/* Smarty version 4.2.1, created on 2024-04-13 15:45:28
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_savemycart\views\templates\hook\fo-button-share.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661a9a887951e4_74465984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3816b102d45743e0effcdb2b3e53301bf24a454c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_savemycart\\views\\templates\\hook\\fo-button-share.tpl',
      1 => 1711922705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a9a887951e4_74465984 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="savecart_bottom_page">
    <?php if ((isset($_smarty_tpl->tpl_vars['save_cart_html']->value)) && $_smarty_tpl->tpl_vars['save_cart_html']->value) {?>
        <?php echo $_smarty_tpl->tpl_vars['save_cart_html']->value;?>

    <?php }?>
    <?php if ((isset($_smarty_tpl->tpl_vars['isShareable']->value)) && $_smarty_tpl->tpl_vars['isShareable']->value) {?>
    <button id="ets_sc_btn_share" name="shareCart" type="button" class="btn btn-primary pull-right">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Share your shopping cart','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>

    </button>
    <?php }?>
</div><?php }
}
