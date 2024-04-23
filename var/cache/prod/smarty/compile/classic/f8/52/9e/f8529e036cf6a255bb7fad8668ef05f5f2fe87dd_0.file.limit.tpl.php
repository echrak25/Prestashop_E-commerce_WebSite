<?php
/* Smarty version 4.2.1, created on 2024-04-16 22:41:49
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_trackingcustomer\views\templates\hook\limit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661ef09d60c0f9_90819957',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8529e036cf6a255bb7fad8668ef05f5f2fe87dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\templates\\hook\\limit.tpl',
      1 => 1711800445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661ef09d60c0f9_90819957 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="limit results">
    <label class="" for="paginator_select_limit"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Items per page:','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</label>
    <div>
        <select id="paginator_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pageName']->value,'html','UTF-8' ));?>
_select_limit" class="pagination-link custom-select paginator_select_limit" name="paginator_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pageName']->value,'html','UTF-8' ));?>
_select_limit" >
            <option value="20" <?php if ($_smarty_tpl->tpl_vars['limit']->value == 20) {?> selected="selected"<?php }?>>20</option>
            <option value="50" <?php if ($_smarty_tpl->tpl_vars['limit']->value == 50) {?> selected="selected"<?php }?>>50</option>
            <option value="100" <?php if ($_smarty_tpl->tpl_vars['limit']->value == 100) {?> selected="selected"<?php }?>>100</option>
            <option value="300" <?php if ($_smarty_tpl->tpl_vars['limit']->value == 300) {?> selected="selected"<?php }?>>300</option>
            <option value="1000" <?php if ($_smarty_tpl->tpl_vars['limit']->value == 1000) {?> selected="selected"<?php }?>>1000</option>
            <option value="3000" <?php if ($_smarty_tpl->tpl_vars['limit']->value == 3000) {?> selected="selected"<?php }?>>3000</option>
        </select>
    </div>
</div><?php }
}
