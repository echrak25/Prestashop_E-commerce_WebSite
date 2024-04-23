<?php
/* Smarty version 4.2.1, created on 2024-04-16 17:45:33
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\smartsupp\views\templates\admin\includes\clients.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661eab2dc285a9_43345665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbfc2fe635ec213e5a60517a63962b8033a54789' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\smartsupp\\views\\templates\\admin\\includes\\clients.tpl',
      1 => 1694446144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661eab2dc285a9_43345665 (Smarty_Internal_Template $_smarty_tpl) {
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


<section class="clients">
	<div class="clients__container">
		<div class="clients__pretitle">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'POPULAR CHAT SOLUTION OF EUROPEAN WEBSHOPS AND WEBSITES','mod'=>'smartsupp'),$_smarty_tpl ) );?>

		</div>
		<h2 class="clients__title">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Join the 469 000 companies and freelancers relying on Smartsupp','mod'=>'smartsupp'),$_smarty_tpl ) );?>

		</h2>
		<div class="clients__logos">
			<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/insportline.png" />
			<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/redfox.png" />
			<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/motorgarten.png" />
			<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8' ));?>
views/img/travelking.png" />
		</div>
	</div>
</section><?php }
}
