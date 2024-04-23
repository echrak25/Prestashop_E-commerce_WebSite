<?php
/* Smarty version 4.2.1, created on 2024-04-14 00:05:58
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ph_scrolltotop\views\templates\admin\configure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661b0fd6179a54_39539334',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cea641b088699236e721ec8e4bfb8073977fc910' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ph_scrolltotop\\views\\templates\\admin\\configure.tpl',
      1 => 1711923159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661b0fd6179a54_39539334 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel">
	<h3><i class="icon icon-circle-arrow-up"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Amazing Scroll To Top','mod'=>'ph_scrolltotop'),$_smarty_tpl ) );?>
</h3>
	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If you have any question about our module, or if you need help with your PrestaShop store, please contact us!','mod'=>'ph_scrolltotop'),$_smarty_tpl ) );?>
<br/>
	Email: <a href="mailto:contact@prestahero.com">contact@prestahero.com</a>
	</p>
	<br />
	<p>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Or visit our website to get more modules and themes.','mod'=>'ph_scrolltotop'),$_smarty_tpl ) );?>
<br/>
		Website: <a href="https://prestahero.com/" target="_blank">prestahero.com
	</p>
</div>

<div class="panel" style="display: none">
	<h3><i class="icon icon-tags"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Documentation','mod'=>'ph_scrolltotop'),$_smarty_tpl ) );?>
</h3>
	<p>
		&raquo; <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can get a PDF documentation to configure this module','mod'=>'ph_scrolltotop'),$_smarty_tpl ) );?>
 :
		<ul>
			<li><a href="#" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'English','mod'=>'ph_scrolltotop'),$_smarty_tpl ) );?>
</a></li>
			<li><a href="#" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'French','mod'=>'ph_scrolltotop'),$_smarty_tpl ) );?>
</a></li>
		</ul>
	</p>
</div>
<?php }
}
