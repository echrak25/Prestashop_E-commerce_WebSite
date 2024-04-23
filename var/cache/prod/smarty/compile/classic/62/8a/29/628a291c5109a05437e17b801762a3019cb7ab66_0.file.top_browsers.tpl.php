<?php
/* Smarty version 4.2.1, created on 2024-04-16 22:41:06
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_trackingcustomer\views\templates\hook\top_browsers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661ef072d773c9_99283388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '628a291c5109a05437e17b801762a3019cb7ab66' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\templates\\hook\\top_browsers.tpl',
      1 => 1711800445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661ef072d773c9_99283388 (Smarty_Internal_Template $_smarty_tpl) {
?><h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Browsers','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</h3>
<table class="table">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Browser','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
            <th class="text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Times','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($_smarty_tpl->tpl_vars['browsers']->value) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['browsers']->value, 'browser', false, 'key');
$_smarty_tpl->tpl_vars['browser']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['browser']->value) {
$_smarty_tpl->tpl_vars['browser']->do_else = false;
?>
                <tr>
                    <?php $_smarty_tpl->_assignInScope('stt', $_smarty_tpl->tpl_vars['key']->value+1);?>
                    <td><?php echo intval($_smarty_tpl->tpl_vars['stt']->value);?>
</td>
                    <td>
                        <img class="icon-browser <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( strtolower($_smarty_tpl->tpl_vars['browser']->value['browser']),'html','UTF-8' ));?>
" src="../modules/ets_trackingcustomer/views/img/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( strtolower(str_replace(' ','_',$_smarty_tpl->tpl_vars['browser']->value['browser'])),'html','UTF-8' ));?>
.png" />
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['browser']->value['browser'],'html','UTF-8' ));?>

                    </td>
                    <td class="text-center"><?php echo intval($_smarty_tpl->tpl_vars['browser']->value['total_view']);?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
            <tr>
                <td colspan="100%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No data available','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</td>
            </tr>
        <?php }?>
    </tbody>
</table>
<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Countries','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</h3>
<table class="table">
    <thead>
        <tr>
            <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'ID','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
            <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Country','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
            <th class="text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Times','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($_smarty_tpl->tpl_vars['countries']->value) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country', false, 'key');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
                <tr>
                    <td><?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
</td>
                    <td>
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['country']->value['name'],'html','UTF-8' ));?>

                    </td>
                    <td class="text-center"><?php echo intval($_smarty_tpl->tpl_vars['country']->value['total_view']);?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
            <tr>
                <td colspan="100%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No data available','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</td>
            </tr>
        <?php }?>
    </tbody>
</table>
<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Languages','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</h3>
<table class="table">
    <thead>
        <tr>
            <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'ID','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
            <th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Language','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
            <th class="text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Times','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($_smarty_tpl->tpl_vars['languages']->value) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language', false, 'key');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
                <tr>
                    <td><?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
</td>
                    <td>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('__PS_BASE_URI__') ? constant('__PS_BASE_URI__') : null))."img/l/".((string)(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['id_lang'],'htmlall','UTF-8' )))));?>
.jpg" /> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['name'],'html','UTF-8' ));?>

                    </td>
                    <td class="text-center"><?php echo intval($_smarty_tpl->tpl_vars['language']->value['total_view']);?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
            <tr>
                <td colspan="100%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No data available','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</td>
            </tr>
        <?php }?>
    </tbody>
</table>
<?php }
}
