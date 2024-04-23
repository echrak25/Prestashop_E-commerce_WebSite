<?php
/* Smarty version 4.2.1, created on 2024-04-13 15:44:01
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_savemycart\views\templates\hook\fo-head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661a9a313f49f3_82819781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f11069f47bdc1f9dcb30bfff0d841104f407c8fe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_savemycart\\views\\templates\\hook\\fo-head.tpl',
      1 => 1711922705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a9a313f49f3_82819781 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
	var ets_sc_close_title = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
';
	var customerCartLink = '<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
';
    <?php if (!empty($_smarty_tpl->tpl_vars['ETS_SC_LINK_SHOPPING_CART']->value)) {?>var ETS_SC_LINK_SHOPPING_CART='<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_SC_LINK_SHOPPING_CART']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
';<?php }
echo '</script'; ?>
>
<style>
	<?php if ((isset($_smarty_tpl->tpl_vars['ETS_SC_BUTTON_TEXT_COLOR']->value)) && (isset($_smarty_tpl->tpl_vars['ETS_SC_BUTTON_TEXT_HOVER_COLOR']->value)) && (isset($_smarty_tpl->tpl_vars['ETS_SC_BUTTON_COLOR']->value)) && (isset($_smarty_tpl->tpl_vars['ETS_SC_BUTTON_HOVER_COLOR']->value))) {?>
	#ets_sc_cart_save,
	#ets_sc_btn_share,
	#submit_cart,
	#submit_login,
	.btn.ets_sc_checkout,
	.btn.ets_sc_cancel,
	.btn.ets_sc_delete,
	.btn.ets_sc_load_this_cart,
	button[name="submitSend"]
	{
		<?php if ($_smarty_tpl->tpl_vars['ETS_SC_BUTTON_TEXT_COLOR']->value) {?> color: <?php echo $_smarty_tpl->tpl_vars['ETS_SC_BUTTON_TEXT_COLOR']->value;?>
; <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['ETS_SC_BUTTON_COLOR']->value) {?> background-color: <?php echo $_smarty_tpl->tpl_vars['ETS_SC_BUTTON_COLOR']->value;?>
; <?php }?>
	}
	#ets_sc_cart_save:hover,
	#ets_sc_btn_share:hover,
	#submit_cart:hover,
	#submit_login:hover,
	.btn.ets_sc_checkout:hover,
	.btn.ets_sc_cancel:hover,
	.btn.ets_sc_delete:hover,
	.btn.ets_sc_load_this_cart:hover,
	button[name="submitSend"]:hover
	{
	<?php if ($_smarty_tpl->tpl_vars['ETS_SC_BUTTON_TEXT_HOVER_COLOR']->value) {?> color: <?php echo $_smarty_tpl->tpl_vars['ETS_SC_BUTTON_TEXT_HOVER_COLOR']->value;?>
; <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['ETS_SC_BUTTON_HOVER_COLOR']->value) {?> background-color: <?php echo $_smarty_tpl->tpl_vars['ETS_SC_BUTTON_HOVER_COLOR']->value;?>
; <?php }?>
	}
	<?php }?>
</style><?php }
}
