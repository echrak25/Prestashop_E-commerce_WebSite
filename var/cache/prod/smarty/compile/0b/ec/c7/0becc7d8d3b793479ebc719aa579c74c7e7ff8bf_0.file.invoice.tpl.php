<?php
/* Smarty version 4.2.1, created on 2024-04-16 18:00:11
  from 'C:\xampp\htdocs\CozyHome\prestashop\pdf\invoice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661eae9be26977_48182848',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0becc7d8d3b793479ebc719aa579c74c7e7ff8bf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\pdf\\invoice.tpl',
      1 => 1711726351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661eae9be26977_48182848 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['style_tab']->value;?>



<table width="100%" id="body" border="0" cellpadding="0" cellspacing="0" style="margin:0;">
	<!-- Invoicing -->
	<tr>
		<td colspan="12">

			<?php echo $_smarty_tpl->tpl_vars['addresses_tab']->value;?>


		</td>
	</tr>

	<tr>
		<td colspan="12" height="30">&nbsp;</td>
	</tr>

	<!-- TVA Info -->
	<tr>
		<td colspan="12">

			<?php echo $_smarty_tpl->tpl_vars['summary_tab']->value;?>


		</td>
	</tr>

	<tr>
		<td colspan="12" height="20">&nbsp;</td>
	</tr>

	<!-- Product -->
	<tr>
		<td colspan="12">

			<?php echo $_smarty_tpl->tpl_vars['product_tab']->value;?>


		</td>
	</tr>

	<tr>
		<td colspan="12" height="10">&nbsp;</td>
	</tr>

	<!-- TVA -->
	<tr>
		<!-- Code TVA -->
		<td colspan="6" class="left">

			<?php echo $_smarty_tpl->tpl_vars['tax_tab']->value;?>


		</td>
		<td colspan="1">&nbsp;</td>
		<!-- Calcule TVA -->
		<td colspan="5" rowspan="5" class="right">

			<?php echo $_smarty_tpl->tpl_vars['total_tab']->value;?>


		</td>
	</tr>

	<?php echo $_smarty_tpl->tpl_vars['note_tab']->value;?>


	<tr>
		<td colspan="12" height="10">&nbsp;</td>
	</tr>

	<tr>
		<td colspan="6" class="left">

			<?php echo $_smarty_tpl->tpl_vars['payment_tab']->value;?>


		</td>
		<td colspan="1">&nbsp;</td>
	</tr>

	<tr>
		<td colspan="6" class="left">

			<?php echo $_smarty_tpl->tpl_vars['shipping_tab']->value;?>


		</td>
		<td colspan="1">&nbsp;</td>
	</tr>

	<tr>
		<td colspan="12" height="10">&nbsp;</td>
	</tr>

	<tr>
		<td colspan="7" class="left small">

			<table>
				<tr>
					<td>
						<p><?php echo nl2br(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['legal_free_text']->value,'html','UTF-8' )));?>
</p>
					</td>
				</tr>
			</table>

		</td>
	</tr>

	<!-- Hook -->
	<?php if ((isset($_smarty_tpl->tpl_vars['HOOK_DISPLAY_PDF']->value))) {?>
	<tr>
		<td colspan="12" height="30">&nbsp;</td>
	</tr>

	<tr>
		<td colspan="12">
			<?php echo $_smarty_tpl->tpl_vars['HOOK_DISPLAY_PDF']->value;?>

		</td>
	</tr>
	<?php }?>

</table>
<?php }
}
