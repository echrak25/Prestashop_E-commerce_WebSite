<?php
/* Smarty version 4.2.1, created on 2024-04-03 22:02:45
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\smartsupp\views\templates\admin\configuration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_660dc3f5909440_63156768',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef08f93aeb75be3dec4b4aeab5fba1192b309926' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\smartsupp\\views\\templates\\admin\\configuration.tpl',
      1 => 1694446144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dc3f5909440_63156768 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="smartsupp_configuration" class="panel">
	<header class="header">
		<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/smartsupp_logo.png" alt="Smartsupp" />
		<nav>
			<div class="header-user">
				<img class="header-user__avatar" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/avatar-grey.png" alt="avatar" />
				<span class="header-user__email">
					<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['smartsupp_email']->value,'htmlall','UTF-8' ));?>

				</span>
				<button id="deactivate_chat_do" class="btn btn--sm">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Deactivate chat','mod'=>'smartsupp'),$_smarty_tpl ) );?>

				</button>
			</div>
		</nav>
	</header>

	<main class="main" role="main">
		<div class="main__left">
			<div class="main-all-set">
				<h1 class="main-all-set__h1">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All set and running','mod'=>'smartsupp'),$_smarty_tpl ) );?>

				</h1>
				<p class="main-all-set__text">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Congratulations! Smartsupp live chat is already visible on your website.','mod'=>'smartsupp'),$_smarty_tpl ) );?>

				</p>
				<a href="https://dashboard.smartsupp.com/?utm_source=Prestashop&utm_medium=integration&utm_campaign=link" target="_blank" class="btn btn--primary btn--arrow">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Chat with your visitors','mod'=>'smartsupp'),$_smarty_tpl ) );?>

				</a>
				<p class="main-all-set__bottom-text">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'or','mod'=>'smartsupp'),$_smarty_tpl ) );?>
 <a href="https://app.smartsupp.com/app/settings/chatbox/text?utm_source=Prestashop&utm_medium=integration&utm_campaign=link" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Set up','mod'=>'smartsupp'),$_smarty_tpl ) );?>
</a> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'chat box design first','mod'=>'smartsupp'),$_smarty_tpl ) );?>

				</p>
			</div>
		</div>

		<div class="main__right">
			<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/all-done.png">
		</div>
	</main>

</div>
<?php }
}
