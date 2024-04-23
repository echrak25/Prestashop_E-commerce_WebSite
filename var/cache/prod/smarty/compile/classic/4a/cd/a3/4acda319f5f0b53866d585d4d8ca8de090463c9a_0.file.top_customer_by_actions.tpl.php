<?php
/* Smarty version 4.2.1, created on 2024-04-16 22:41:06
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_trackingcustomer\views\templates\hook\top_customer_by_actions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661ef072d1e494_27348920',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4acda319f5f0b53866d585d4d8ca8de090463c9a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\templates\\hook\\top_customer_by_actions.tpl',
      1 => 1711800445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661ef072d1e494_27348920 (Smarty_Internal_Template $_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
<table class="table tc-top-customer-by-actions">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customer','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
            <th class="text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total actions','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
        </tr>
    </thead>
    <tbody>
<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['top_customers']->value) {?>
            <?php $_smarty_tpl->_assignInScope('stt', ($_smarty_tpl->tpl_vars['current_page']->value-1)*20+1);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['top_customers']->value, 'customer', false, 'key');
$_smarty_tpl->tpl_vars['customer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['customer']->value) {
$_smarty_tpl->tpl_vars['customer']->do_else = false;
?>
                <tr>
                    <td><?php echo intval($_smarty_tpl->tpl_vars['stt']->value);?>
</td>
                    <td><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminTrackingCustomerSession'),'html','UTF-8' ));
if ($_smarty_tpl->tpl_vars['customer']->value['id']) {?>&current_tab=customer_session&viewSession=1&id_session=<?php echo intval($_smarty_tpl->tpl_vars['customer']->value['id']);
} else { ?>&current_tab=customer_session&id_customer=<?php echo intval($_smarty_tpl->tpl_vars['customer']->value['id_customer']);
}?>"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer']->value['customer_name'],'html','UTF-8' ));?>
</a></td>
                    <td class="text-center"><?php echo intval($_smarty_tpl->tpl_vars['customer']->value['total_action']);?>
</td>
                </tr>
                <?php $_smarty_tpl->_assignInScope('stt', $_smarty_tpl->tpl_vars['stt']->value+1);?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php if ($_smarty_tpl->tpl_vars['load_more']->value) {?>
                <tr>
                    <td colspan="100%">
                        <a class="tbn-load-more-top-customer-by-action" href="#" data-filter='<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
' data-page="<?php echo intval($_smarty_tpl->tpl_vars['page_next']->value);?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Load more','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</a>
                    </td>
                </tr>
            <?php }?>
        <?php } else { ?>
            <tr>
                <td colspan="100%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No data available','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</td>
            </tr>
        <?php }
if (!$_smarty_tpl->tpl_vars['ajax']->value) {?>
    </tbody>
</table>
<?php }
}
}
