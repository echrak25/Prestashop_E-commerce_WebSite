<?php
/* Smarty version 4.2.1, created on 2024-04-16 17:45:33
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\smartsupp\views\templates\admin\includes\features.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661eab2dc015d7_19168727',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d2ed9b3fc91fdfeab0201b0738223ff5b50af21' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\smartsupp\\views\\templates\\admin\\includes\\features.tpl',
      1 => 1694446144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661eab2dc015d7_19168727 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>

/**
 * NOTICE OF LICENSE
 *
 * Smartsupp live chat - official plugin. Smartsupp is free live chat with visitor recording. 
 * The plugin enables you to create a free account or sign in with existing one. Pre-integrated 
 * customer info with WooCommerce (you will see names and emails of signed in webshop visitors).
 * Optional API for advanced chat box modifications.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 *  @author    Smartsupp
 *  @copyright 2021 Smartsupp.com
 *  @license   GPL-2.0+
**/ 
<?php echo '?>'; ?>


<section class="features">
	<div class="features__container">
		<div class="features__item">
			<span class="features__header">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'MULTICHANNEL','mod'=>'smartsupp'),$_smarty_tpl ) );?>

			</span>
			<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/multichannel.png" />
			<h2 class="features__item-title">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Respond to customer\'s chats and emails from one place','mod'=>'smartsupp'),$_smarty_tpl ) );?>

			</h2>
		</div>
		<div class="features__item">
			<span class="features__header">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'CHAT BOT','mod'=>'smartsupp'),$_smarty_tpl ) );?>

			</span>
			<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/multichannel.png" />
			<h2 class="features__item-title">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Engage your visitors with automated chat bot','mod'=>'smartsupp'),$_smarty_tpl ) );?>

			</h2>
		</div>
		<div class="features__item">
			<span class="features__header">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'MOBILE APP','mod'=>'smartsupp'),$_smarty_tpl ) );?>

			</span>
			<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/multichannel.png" />
			<h2 class="features__item-title">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Chat with customers on the go with app for iOS & Android','mod'=>'smartsupp'),$_smarty_tpl ) );?>

			</h2>
		</div>
	</div>
	<div class="features__all">
		<a href="https://smartsupp.com" target="_blank" class="btn btn--link btn--arrow">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Explore All Features on our website','mod'=>'smartsupp'),$_smarty_tpl ) );?>

		</a>
	</div>
</section><?php }
}
