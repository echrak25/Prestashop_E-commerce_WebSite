<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:16:51
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_trackingcustomer\views\templates\hook\filter_last_actions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661015e31e4b72_21739842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38e54e401089149017d06450e65c0c2609767ea3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\templates\\hook\\filter_last_actions.tpl',
      1 => 1711800445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661015e31e4b72_21739842 (Smarty_Internal_Template $_smarty_tpl) {
if (!(isset($_smarty_tpl->tpl_vars['select']->value)) || $_smarty_tpl->tpl_vars['select']->value) {?>
<select name="customer[last_action]" class="custom-select" id="customer_last_action">
    <option value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search action','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
<?php }?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['actions']->value, 'action');
$_smarty_tpl->tpl_vars['action']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->do_else = false;
?>
        <option value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value['active'],'html','UTF-8' ));?>
"<?php if ((isset($_smarty_tpl->tpl_vars['last_action_selected']->value)) && $_smarty_tpl->tpl_vars['last_action_selected']->value == $_smarty_tpl->tpl_vars['action']->value['active']) {?> selected="selected"<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value['title'],'html','UTF-8' ));?>
</option>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (!(isset($_smarty_tpl->tpl_vars['select']->value)) || $_smarty_tpl->tpl_vars['select']->value) {?>
</select>
<?php }
}
}
