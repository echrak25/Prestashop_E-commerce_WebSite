<?php
/* Smarty version 4.2.1, created on 2024-04-13 21:14:59
  from 'C:\xampp\htdocs\CozyHome\prestashop\pdf\invoice.shipping-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661ae7c315ce09_12451841',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8310ae802285d92add89bf07f2feaed42c9bfc8f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\pdf\\invoice.shipping-tab.tpl',
      1 => 1711726351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661ae7c315ce09_12451841 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="shipping-tab" width="100%">
	<tr>
		<td class="shipping center small grey bold" width="44%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</td>
		<td class="shipping center small white" width="56%"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
	</tr>
</table>
<?php }
}
