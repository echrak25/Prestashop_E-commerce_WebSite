<?php
/* Smarty version 4.2.1, created on 2024-04-16 17:45:33
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\smartsupp\views\templates\admin\landing_page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661eab2dbd4f35_89870731',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1d765300b594dca7285e54ce5fe23079611b4d7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\smartsupp\\views\\templates\\admin\\landing_page.tpl',
      1 => 1694446144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./includes/features.tpl' => 1,
    'file:./includes/clients.tpl' => 1,
  ),
),false)) {
function content_661eab2dbd4f35_89870731 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    var ajax_controller_url = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ajax_controller_url']->value,'htmlall','UTF-8' ));?>
";    
<?php echo '</script'; ?>
>

<input id="smartsupp_key" type="hidden" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['smartsupp_key']->value,'htmlall','UTF-8' ));?>
">

<div id="smartsupp_create_account" class="panel">
	<header class="header">
		<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/smartsupp_logo.png" alt="Smartsupp" />
		<nav>
			<div class="header-user">
				<span class="header-user__email">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Already have an account?','mod'=>'smartsupp'),$_smarty_tpl ) );?>

				</span>
				<button id="connect_existing_account_btn2" class="btn btn--sm">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Log in','mod'=>'smartsupp'),$_smarty_tpl ) );?>

				</button>
			</div>
		</nav>
		<div class="navbar-toggle">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
	</header>

	<main class="main" role="main">
		<div class="main__left">
			<div class="main-form">
				<h1 class="main-form__h1">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create a free account','mod'=>'smartsupp'),$_smarty_tpl ) );?>

				</h1>
				<p class="main-form__top-text">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Start personal conversation with your visitors today.','mod'=>'smartsupp'),$_smarty_tpl ) );?>

				</p>
				<div class="form-horizontal">
					<div class="alerts">
						<div class="alert alert-danger js-clear"></div>
					</div>
					<input id="SMARTSUPP_EMAIL" type="email" value="" name="SMARTSUPP_EMAIL" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'E-mail:','mod'=>'smartsupp'),$_smarty_tpl ) );?>
" class="input" required>
					<input id="SMARTSUPP_PASSWORD" type="password" value="" name="SMARTSUPP_PASSWORD" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password:','mod'=>'smartsupp'),$_smarty_tpl ) );?>
" class="input" required>
					<label id="SMARTSUPP_MKT_LABEL" class="checkbox">
						<input id="SMARTSUPP_MKT" type="checkbox" value="" name="SMARTSUPP_MKT" class="checkbox__input">
						<div class="checkbox__shape"></div>
						<div class="checkbox__title checkbox__title--small">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I want to get tips on how to use Smartsupp chat to the maximum and do excellent customer care','mod'=>'smartsupp'),$_smarty_tpl ) );?>

						</div> 
					</label>
					<button id="create_account_do" class="btn btn--primary btn--arrow btn--all-width">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create a free account','mod'=>'smartsupp'),$_smarty_tpl ) );?>

					</button>
                    <p class="main-form__bottom-text">
						<span>
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I have read and agree with','mod'=>'smartsupp'),$_smarty_tpl ) );?>
 <a href="https://www.smartsupp.com/terms" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Terms','mod'=>'smartsupp'),$_smarty_tpl ) );?>
</a> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'and','mod'=>'smartsupp'),$_smarty_tpl ) );?>
 <a href="https://www.smartsupp.com/dpa" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'DPA','mod'=>'smartsupp'),$_smarty_tpl ) );?>
</a></label>
                        </span>
					</p>
				</div>
			</div>
        </div>

		<div class="main__right">
			<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/tablet-screen.png">
		</div>
	</main>

	<?php $_smarty_tpl->_subTemplateRender('file:./includes/features.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php $_smarty_tpl->_subTemplateRender('file:./includes/clients.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div><?php }
}
