<?php
/* Smarty version 4.2.1, created on 2024-04-16 18:32:17
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_savemycart\views\templates\hook\fo-form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661eb6215c9773_48735510',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94cb5f0a7c78eb19dcbb8aa19a65f85eb7c55b20' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_savemycart\\views\\templates\\hook\\fo-form.tpl',
      1 => 1711922705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661eb6215c9773_48735510 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="ets_sc_overload2">
	<div class="table">
		<div class="table-cell">
			<div class="ets_sc_content">
				<span class="ets_sc_close"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</span>
				<div class="ets_sc_sendmail_form ets_sc_sendmail">
					<form id="ets_shoppingcart_email_form" method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['form_url']->value;?>
" novalidate>
						<div class="panel-heading">
							<h3 class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Send this shopping cart to friends','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</h3>
						</div>
						<div class="ets-sp-panel-msg"></div>
						<div class="panel-body">
							<div class="form-group">
								<label for="name" class="required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Recipient name','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</label>
								<input type="text" name="name" id="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="email" class="required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email address','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</label>
								<input type="text" name="email" id="email" class="form-control">
							</div>
							<?php if ((isset($_smarty_tpl->tpl_vars['idCart']->value)) && $_smarty_tpl->tpl_vars['idCart']->value) {?><input style="visibility: hidden" class="hidden" name="id_cart"  value="<?php echo $_smarty_tpl->tpl_vars['idCart']->value;?>
"><?php }?>
						</div>
						<div class="panel-footer">
							<button name="submitSend" type="submit" value="1"
							        class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Send shopping cart now','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</button>
						</div>
					</form>
				</div>
				<div class="ets_sc_sendmail_result ets_sc_sendmail">
					<h3 class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Great news, your shopping cart was successfully sent!','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</h3>
					<div class="panel-footer">
						<a href="<?php echo $_smarty_tpl->tpl_vars['product_link']->value;?>
"
						   class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Continue shopping','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</a>
						<a href="<?php echo $_smarty_tpl->tpl_vars['shopping_cart_link']->value;?>
"
						   class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Go to checkout','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }
}
