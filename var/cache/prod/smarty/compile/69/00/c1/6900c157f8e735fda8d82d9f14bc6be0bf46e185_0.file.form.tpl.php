<?php
/* Smarty version 4.2.1, created on 2024-04-13 16:23:00
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\productcomments\views\templates\admin\_configure\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661aa354cd77c4_77453607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6900c157f8e735fda8d82d9f14bc6be0bf46e185' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\productcomments\\views\\templates\\admin\\_configure\\helpers\\form\\form.tpl',
      1 => 1711814407,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661aa354cd77c4_77453607 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_47847667661aa354ca7090_81051327', "input");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "input"} */
class Block_47847667661aa354ca7090_81051327 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input' => 
  array (
    0 => 'Block_47847667661aa354ca7090_81051327',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'products') {?>
		<table id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
">
			<tr>
				<th></th>
				<th>ID</th>
				<th width="80%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product Name','d'=>'Modules.Productcomments.Admin'),$_smarty_tpl ) );?>
</th>
			</tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'], 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
				<tr>
					<td>
						<input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_product'];?>
" 
						<?php if ((isset($_smarty_tpl->tpl_vars['value']->value['selected'])) && $_smarty_tpl->tpl_vars['value']->value['selected'] == 1) {?> checked <?php }?> />
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value['id_product'];?>
</td>
					<td width="80%"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
				</tr>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</table>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'switch' && addcslashes((defined('_PS_VERSION_') ? constant('_PS_VERSION_') : null),'\'') < '1.6') {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'], 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
			<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value']->value['value'],'html','UTF-8' ));?>
"
					<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == $_smarty_tpl->tpl_vars['value']->value['value']) {?>checked="checked"<?php }?>
					<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['disabled'])) && $_smarty_tpl->tpl_vars['input']->value['disabled']) {?>disabled="disabled"<?php }?> />
			<label class="t" for="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
			 <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['is_bool'])) && $_smarty_tpl->tpl_vars['input']->value['is_bool'] == true) {?>
				<?php if ($_smarty_tpl->tpl_vars['value']->value['value'] == 1) {?>
					<img src="../img/admin/enabled.gif" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
" />
				<?php } else { ?>
					<img src="../img/admin/disabled.gif" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>
" />
				<?php }?>
			 <?php } else { ?>
				<?php echo $_smarty_tpl->tpl_vars['value']->value['label'];?>

			 <?php }?>
			</label>
			<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['br'])) && $_smarty_tpl->tpl_vars['input']->value['br']) {?><br /><?php }?>
			<?php if ((isset($_smarty_tpl->tpl_vars['value']->value['p'])) && $_smarty_tpl->tpl_vars['value']->value['p']) {?><p><?php echo $_smarty_tpl->tpl_vars['value']->value['p'];?>
</p><?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php } else { ?>
		<?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }?>

<?php
}
}
/* {/block "input"} */
}
