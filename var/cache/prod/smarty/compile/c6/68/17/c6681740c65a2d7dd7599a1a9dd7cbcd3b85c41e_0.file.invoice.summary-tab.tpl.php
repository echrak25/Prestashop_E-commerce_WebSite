<?php
/* Smarty version 4.2.1, created on 2024-04-16 18:00:11
  from 'C:\xampp\htdocs\CozyHome\prestashop\pdf\invoice.summary-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661eae9bc46f72_03847604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6681740c65a2d7dd7599a1a9dd7cbcd3b85c41e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\pdf\\invoice.summary-tab.tpl',
      1 => 1711726351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661eae9bc46f72_03847604 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="summary-tab" width="100%">
	<tr>
		<th class="header small" valign="middle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoice Number','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<th class="header small" valign="middle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoice Date','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<th class="header small" valign="middle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order Reference','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<th class="header small" valign="middle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order date','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<?php if ($_smarty_tpl->tpl_vars['addresses']->value['invoice']->vat_number) {?>
			<th class="header small" valign="middle"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'VAT Number','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<?php }?>
	</tr>
	<tr>
		<td class="center small white"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'html','UTF-8' ));?>
</td>
		<td class="center small white"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['order']->value->invoice_date,'full'=>0),$_smarty_tpl ) );?>
</td>
		<td class="center small white"><?php echo $_smarty_tpl->tpl_vars['order']->value->getUniqReference();?>
</td>
		<td class="center small white"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['order']->value->date_add,'full'=>0),$_smarty_tpl ) );?>
</td>
		<?php if ($_smarty_tpl->tpl_vars['addresses']->value['invoice']->vat_number) {?>
			<td class="center small white">
				<?php echo $_smarty_tpl->tpl_vars['addresses']->value['invoice']->vat_number;?>

			</td>
		<?php }?>
	</tr>
</table>
<?php }
}
