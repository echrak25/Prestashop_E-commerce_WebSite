<?php
/* Smarty version 4.2.1, created on 2024-04-16 18:00:11
  from 'C:\xampp\htdocs\CozyHome\prestashop\pdf\invoice.note-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661eae9bd838c4_01030440',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09f329c1b43773cbb8b65c52c0885c83ea2f088b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\pdf\\invoice.note-tab.tpl',
      1 => 1711726350,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661eae9bd838c4_01030440 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['order_invoice']->value->note)) && $_smarty_tpl->tpl_vars['order_invoice']->value->note) {?>
	<tr>
		<td colspan="12" height="10">&nbsp;</td>
	</tr>

	<tr>
		<td colspan="6" class="left">
			<table id="note-tab" style="width: 100%">
				<tr>
					<td class="grey"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Note','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</td>
				</tr>
				<tr>
					<td class="note"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['order_invoice']->value->note,"html" ));?>
</td>
				</tr>
			</table>
		</td>
		<td colspan="1">&nbsp;</td>
	</tr>
<?php }
}
}
