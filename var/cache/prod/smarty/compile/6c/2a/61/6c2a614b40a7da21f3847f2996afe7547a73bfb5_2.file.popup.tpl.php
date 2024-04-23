<?php
/* Smarty version 4.2.1, created on 2024-04-13 15:45:33
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_savemycart\views\templates\front\popup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661a9a8d4bfd45_24681341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c2a614b40a7da21f3847f2996afe7547a73bfb5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_savemycart\\views\\templates\\front\\popup.tpl',
      1 => 1711922705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a9a8d4bfd45_24681341 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="ets_sc_shopping_cart">
	<span class="ets_sc_close" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
"></span>

	<div class="ets_sc_form_save_cart" <?php if ((isset($_smarty_tpl->tpl_vars['openLogin']->value)) && $_smarty_tpl->tpl_vars['openLogin']->value) {?>style="display: none"<?php }?>>
		<div class="front front_login panel">
			<h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save your shopping cart?','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</h4>
			<div class="ets_sc_alert_wrapper">
				<p id="sc_modal_msg" class="alert alert-info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You have %d items in your shopping cart, do you want to save your shopping to checkout later?','sprintf'=>array($_smarty_tpl->tpl_vars['product_count']->value),'mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</p>
			</div>
			<div class="ets-sp-panel-msg ets_sc_panel_msg js-ets_sc_panel_msg"></div>
			<form action="<?php echo $_smarty_tpl->tpl_vars['link_action']->value;?>
" id="save_cart_form" method="post">
				<input type="hidden" name="id_customer" id="id_customer" value="<?php if ((isset($_smarty_tpl->tpl_vars['id_customer']->value))) {
echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['id_customer']->value), ENT_QUOTES, 'UTF-8');
}?>"/>
				<input type="hidden" name="submitCart" id="submitCart" value="1"/>
				<div class="form-group">
					<label class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cart name','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
<span>*</span></label>
					<input name="cart_name" type="text" id="cart_name" class="form-control" value="" autofocus="autofocus" tabindex="1" required />
				</div>
				<div class="form-group row-padding-top">
					<button id="submit_cart" class="submit_cart btn btn-primary" tabindex="2" name="submitCart">
                       <i class="ets_svg_icon svg_fill_white svg_fill_hover_white">
                        <svg class="w_16 h_16" width="16" height="16" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M512 1536h768v-384h-768v384zm896 0h128v-896q0-14-10-38.5t-20-34.5l-281-281q-10-10-34-20t-39-10v416q0 40-28 68t-68 28h-576q-40 0-68-28t-28-68v-416h-128v1280h128v-416q0-40 28-68t68-28h832q40 0 68 28t28 68v416zm-384-928v-320q0-13-9.5-22.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 22.5v320q0 13 9.5 22.5t22.5 9.5h192q13 0 22.5-9.5t9.5-22.5zm640 32v928q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1344q0-40 28-68t68-28h928q40 0 88 20t76 48l280 280q28 28 48 76t20 88z"/></svg>
                       </i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save cart','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>

                    </button>
										<a class="ets_sc_checkout btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['link_checkout']->value;?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Checkout now','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</a>
				</div>
			</form>
		</div>
	</div>
	<div class="ets_sc_form_login" style="display: none;">
		<div class="front front_login panel">
			<p class="sc_pls_login"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Oops! You have not logged in. Please log in to complete saving your cart','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</p>
			<h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Login','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</h4>
			<div class="ets-sp-panel-msg ets_sc_panel_msg js-ets_sc_panel_msg"></div>
			<form action="<?php echo $_smarty_tpl->tpl_vars['link_action']->value;?>
" id="login_form" method="post">
				<input id="submitLogin" name="submitLogin" type="hidden" value="1">
				<div class="form-group">
					<label class="control-label required" for="email2"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email address','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</label>
					<input name="email2" type="email" id="email2" class="form-control" value="" autofocus="autofocus" autocomplete="email" tabindex="1" placeholder="test@example.com" />
				</div>
				<div class="form-group">
					<label class="control-label required" for="passwd2"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</label>
					<input name="passwd2" type="password" id="passwd2" class="form-control" value="" tabindex="2" autocomplete="password" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
" />
				</div>
				<div class="form-group row-padding-top">
					<button id="submit_login" name="submitLogin" type="submit" tabindex="3" class="btn btn-primary btn-lg btn-block ladda-button" data-style="slide-up" data-spinner-color="white" >
						<span class="ladda-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Log in and save cart','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</span>
					</button>
				</div>
				<div class="form-group text-center">
					<a target="_blank" href="<?php if ((isset($_smarty_tpl->tpl_vars['link_register']->value)) && $_smarty_tpl->tpl_vars['link_register']->value) {
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_register']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
?create_account=1<?php } else { ?>#<?php }?>" class="ets_sc_create_account">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do not have account? Register now','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>

					</a>
				</div>
			</form>
		</div>
	</div>
	<div class="ets_sc_form_create" style="display: none;">
		<div class="front front_create panel">
			<h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Register','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</h4>
			<form action="<?php echo $_smarty_tpl->tpl_vars['link_action']->value;?>
" id="create_form" method="post">
				<input id="submitCreate" name="submitCreate" type="hidden" value="1">
				<div class="form-group">
					<label class="control-label" for="firstname3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'First name','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</label>
					<input name="firstname3" type="text" id="firstname3" class="form-control" value="" autofocus="autofocus" tabindex="1" />
				</div>
				<div class="form-group">
					<label class="control-label" for="lastname3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Last name','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</label>
					<input name="lastname3" type="text" id="lastname3" class="form-control" value="" autofocus="autofocus" tabindex="2" />
				</div>
				<div class="form-group">
					<label class="control-label" for="email3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email address','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</label>
					<input name="email3" type="email" id="email3" class="form-control" value="" autofocus="autofocus" autocomplete="email" tabindex="3" placeholder="test@example.com" />
				</div>
				<div class="form-group">
					<label class="control-label" for="passwd3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</label>
					<input name="passwd3" type="password" id="passwd3" class="form-control" value="" tabindex="4" autocomplete="password" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
"/>
				</div>
				<div class="form-group row-padding-top">
					<button id="submit_create" name="submitCreate" type="submit" tabindex="5" class="btn btn-primary btn-lg btn-block ladda-button" data-style="slide-up" data-spinner-color="white" >
						<span class="ladda-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Register and save cart','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</div><?php }
}
