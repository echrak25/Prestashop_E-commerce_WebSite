<?php
/* Smarty version 4.2.1, created on 2024-04-16 22:41:49
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_trackingcustomer\views\templates\hook\list_helper.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661ef09d6bfb35_47612529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bb1289167b32c3c20b5e838dec147a8efee53a5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\templates\\hook\\list_helper.tpl',
      1 => 1711800445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661ef09d6bfb35_47612529 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
var text_update_position='<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Successfully updated','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
';
<?php echo '</script'; ?>
>
<div class="panel ets_tc-panel<?php if ((isset($_smarty_tpl->tpl_vars['class']->value))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['class']->value,'html','UTF-8' ));
}?>">
    <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>

        <?php if ((isset($_smarty_tpl->tpl_vars['totalRecords']->value)) && $_smarty_tpl->tpl_vars['totalRecords']->value > 0) {?><span class="badge"><?php echo intval($_smarty_tpl->tpl_vars['totalRecords']->value);?>
</span><?php }?>
        <span class="panel-heading-action">
            <?php if ((isset($_smarty_tpl->tpl_vars['show_add_new']->value)) && $_smarty_tpl->tpl_vars['show_add_new']->value) {?>            
                <a class="list-toolbar-btn add_new_link" href="<?php if ((isset($_smarty_tpl->tpl_vars['link_new']->value))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_new']->value,'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));
}?>">
                    <span data-placement="top" data-html="true" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
" class="label-tooltip" data-toggle="tooltip" title="">
        				 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                    </span>
                </a>            
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['custom_list']->value)) && $_smarty_tpl->tpl_vars['custom_list']->value) {?>
                <a id="desc-customer-arrange2" class="list-toolbar-btn custom_session_list" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
" >
    				<i class="ets_icon">
                        <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M384 1408q0 80-56 136t-136 56-136-56-56-136 56-136 136-56 136 56 56 136zm0-512q0 80-56 136t-136 56-136-56-56-136 56-136 136-56 136 56 56 136zm1408 416v192q0 13-9.5 22.5t-22.5 9.5h-1216q-13 0-22.5-9.5t-9.5-22.5v-192q0-13 9.5-22.5t22.5-9.5h1216q13 0 22.5 9.5t9.5 22.5zm-1408-928q0 80-56 136t-136 56-136-56-56-136 56-136 136-56 136 56 56 136zm1408 416v192q0 13-9.5 22.5t-22.5 9.5h-1216q-13 0-22.5-9.5t-9.5-22.5v-192q0-13 9.5-22.5t22.5-9.5h1216q13 0 22.5 9.5t9.5 22.5zm0-512v192q0 13-9.5 22.5t-22.5 9.5h-1216q-13 0-22.5-9.5t-9.5-22.5v-192q0-13 9.5-22.5t22.5-9.5h1216q13 0 22.5 9.5t9.5 22.5z"/></svg>
                    </i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customize session list','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                </a>
            <?php }?>
        </span>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['fields_list']->value) {?>
        <form method="post" action="<?php if ((isset($_smarty_tpl->tpl_vars['postIndex']->value))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['postIndex']->value,'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));
}?>">
            <?php if ((isset($_smarty_tpl->tpl_vars['bulk_action_html']->value))) {?>
                <?php echo $_smarty_tpl->tpl_vars['bulk_action_html']->value;?>

            <?php }?>
            <div class="table-responsive clearfix">
                <table class="table configuration list-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
">
                    <thead>
                        <tr class="nodrag nodrop">
                            <?php $_smarty_tpl->_assignInScope('i', 1);?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_list']->value, 'field', false, 'index');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>
                                <th class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));
if ((isset($_smarty_tpl->tpl_vars['field']->value['class']))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['class'],'html','UTF-8' ));
}?>" <?php if ($_smarty_tpl->tpl_vars['show_action']->value && !$_smarty_tpl->tpl_vars['actions']->value && count($_smarty_tpl->tpl_vars['fields_list']->value) == $_smarty_tpl->tpl_vars['i']->value) {?>colspan="2"<?php }?>>
                                    <span class="title_box">
                                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['title'],'html','UTF-8' ));?>

                                        <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['sort'])) && $_smarty_tpl->tpl_vars['field']->value['sort']) {?>
                                            <span class="soft">
                                            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&sort=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
&sort_type=desc<?php echo $_smarty_tpl->tpl_vars['filter_params']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['sort']->value)) && $_smarty_tpl->tpl_vars['sort']->value == $_smarty_tpl->tpl_vars['index']->value && (isset($_smarty_tpl->tpl_vars['sort_type']->value)) && $_smarty_tpl->tpl_vars['sort_type']->value == 'desc') {?> class="active"<?php }?>><i class="icon-caret-down"></i></a>
                                            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&sort=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
&sort_type=asc<?php echo $_smarty_tpl->tpl_vars['filter_params']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['sort']->value)) && $_smarty_tpl->tpl_vars['sort']->value == $_smarty_tpl->tpl_vars['index']->value && (isset($_smarty_tpl->tpl_vars['sort_type']->value)) && $_smarty_tpl->tpl_vars['sort_type']->value == 'asc') {?> class="active"<?php }?>><i class="icon-caret-up"></i></a>
                                            </span>
                                            <?php }?>
                                    </span>
                                </th>  
                                <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>                          
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php if ($_smarty_tpl->tpl_vars['show_action']->value && $_smarty_tpl->tpl_vars['actions']->value) {?>
                                <th class="table_action" style="text-align: right;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Action','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</th>
                            <?php }?>
                        </tr>
                        <?php if ($_smarty_tpl->tpl_vars['show_toolbar']->value) {?>
                            <tr class="nodrag nodrop filter row_hover">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_list']->value, 'field', false, 'index');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>
                                    <th class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));
if ((isset($_smarty_tpl->tpl_vars['field']->value['class']))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['class'],'html','UTF-8' ));
}?>">
                                        <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['filter'])) && $_smarty_tpl->tpl_vars['field']->value['filter']) {?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'text') {?>
                                                <input class="filter" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
" type="text" <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['width']))) {?>style="width: <?php echo intval($_smarty_tpl->tpl_vars['field']->value['width']);?>
px;"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['active']))) {?>value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active'],'html','UTF-8' ));?>
"<?php }?>/>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'select' || $_smarty_tpl->tpl_vars['field']->value['type'] == 'active') {?>
                                                <select  <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['width']))) {?>style="width: <?php echo intval($_smarty_tpl->tpl_vars['field']->value['width']);?>
px;"<?php }?>  name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
">
                                                    <option value=""> -- </option>
                                                    <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['filter_list']['list'])) && $_smarty_tpl->tpl_vars['field']->value['filter_list']['list']) {?>
                                                        <?php $_smarty_tpl->_assignInScope('id_option', $_smarty_tpl->tpl_vars['field']->value['filter_list']['id_option']);?>
                                                        <?php $_smarty_tpl->_assignInScope('value', $_smarty_tpl->tpl_vars['field']->value['filter_list']['value']);?>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value['filter_list']['list'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                                                            <option <?php if (($_smarty_tpl->tpl_vars['field']->value['active'] !== '' && $_smarty_tpl->tpl_vars['field']->value['active'] == $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['id_option']->value]) || ($_smarty_tpl->tpl_vars['field']->value['active'] == '' && $_smarty_tpl->tpl_vars['index']->value == 'has_post' && $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['id_option']->value] == 1)) {?> selected="selected"<?php }?> value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['id_option']->value],'html','UTF-8' ));?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['value']->value],'html','UTF-8' ));?>
</option>
                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    <?php }?>
                                                </select>                                            
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'int') {?>
                                                <label for="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min"><input type="text" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Min','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active']['min'],'html','UTF-8' ));?>
" /></label>
                                                <label for="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max"><input type="text" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Max','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active']['max'],'html','UTF-8' ));?>
" /></label>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'date') {?>
                                                <fieldset class="form-group"> 
                                                    <div class="input-group ets_tc_datepicker">
                                                        <input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min" autocomplete="off" class="form-control" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active']['min'],'html','UTF-8' ));?>
" type="text" autocomplete="off" />
                                                        <div class="input-group-append input-group-addon">
                                                            <div class="input-group-text">
                                                                <i class="ets_icon_svg">
                                                                    <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M192 1664h288v-288h-288v288zm352 0h320v-288h-320v288zm-352-352h288v-320h-288v320zm352 0h320v-320h-320v320zm-352-384h288v-288h-288v288zm736 736h320v-288h-320v288zm-384-736h320v-288h-320v288zm768 736h288v-288h-288v288zm-384-352h320v-320h-320v320zm-352-864v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm736 864h288v-320h-288v320zm-384-384h320v-288h-320v288zm384 0h288v-288h-288v288zm32-480v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm384-64v1280q0 52-38 90t-90 38h-1408q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h128v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h384v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h128q52 0 90 38t38 90z"/></svg>
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group"> 
                                                    <div class="input-group ets_tc_datepicker">
                                                        <input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max" autocomplete="off" class="form-control" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active']['max'],'html','UTF-8' ));?>
" type="text" autocomplete="off" />
                                                        <div class="input-group-append input-group-addon">
                                                            <div class="input-group-text">
                                                                <i class="ets_icon_svg">
                                                                    <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M192 1664h288v-288h-288v288zm352 0h320v-288h-320v288zm-352-352h288v-320h-288v320zm352 0h320v-320h-320v320zm-352-384h288v-288h-288v288zm736 736h320v-288h-320v288zm-384-736h320v-288h-320v288zm768 736h288v-288h-288v288zm-384-352h320v-320h-320v320zm-352-864v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm736 864h288v-320h-288v320zm-384-384h320v-288h-320v288zm384 0h288v-288h-288v288zm32-480v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm384-64v1280q0 52-38 90t-90 38h-1408q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h128v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h384v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h128q52 0 90 38t38 90z"/></svg>
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            <?php }?>
                                        <?php } elseif (($_smarty_tpl->tpl_vars['field']->value['type'] == 'text' && (isset($_smarty_tpl->tpl_vars['index']->value)) && $_smarty_tpl->tpl_vars['index']->value == 'input_box')) {?>
                                            <div class="md-checkbox">
                                                <label>
                                                    <input id="bulk_action_select_all" onclick="$('table').find('td input:checkbox').prop('checked', $(this).prop('checked')); ets_tc_updateBulkMenu();" value="" type="checkbox">
                                                    <i class="md-checkbox-control"></i>
                                                </label>
                                            </div>
                                        <?php } else { ?>
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' -- ','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                                        <?php }?>
                                    </th>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php if ($_smarty_tpl->tpl_vars['show_action']->value) {?>
                                    <th class="actions">
                                        <span class="pull-right flex">
                                            <input type="hidden" name="post_filter" value="yes" />
                                            <?php if ($_smarty_tpl->tpl_vars['show_reset']->value) {?>
                                                <a  class="btn btn-warning"  href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
"><i class="icon-eraser"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reset','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</a> &nbsp;
                                            <?php }?>
                                            <button class="btn btn-default" name="ets_tc_submit_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" id="ets_tc_submit_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" type="submit">
                                                <i class="icon-search"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Filter','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                                            </button>
                                            <?php if ((isset($_smarty_tpl->tpl_vars['show_export']->value)) && $_smarty_tpl->tpl_vars['show_export']->value) {?>
                                                <button class="btn btn-default" name="ets_tc_export_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" id="ets_tc_export_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" type="submit">
                                                    <i class="icon-download"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Export','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                                                </button>
                                            <?php }?>
                                        </span>
                                    </th>
                                <?php }?>
                            </tr>
                        <?php }?>
                    </thead>
                    <tbody id="list-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
">
                        <?php if ($_smarty_tpl->tpl_vars['field_values']->value) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field_values']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                            <tr <?php if ((isset($_smarty_tpl->tpl_vars['row']->value['read'])) && !$_smarty_tpl->tpl_vars['row']->value['read']) {?>class="no-read"<?php }?> data-id="<?php echo intval($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value]);?>
">
                                <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_list']->value, 'field', false, 'key');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>                             
                                    <td class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
 <?php if ((isset($_smarty_tpl->tpl_vars['sort']->value)) && $_smarty_tpl->tpl_vars['sort']->value == $_smarty_tpl->tpl_vars['key']->value && (isset($_smarty_tpl->tpl_vars['sort_type']->value)) && $_smarty_tpl->tpl_vars['sort_type']->value == 'asc' && (isset($_smarty_tpl->tpl_vars['field']->value['update_position'])) && $_smarty_tpl->tpl_vars['field']->value['update_position']) {?>pointer dragHandle center<?php }
if ((isset($_smarty_tpl->tpl_vars['field']->value['class']))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['class'],'html','UTF-8' ));
}?>" <?php if ($_smarty_tpl->tpl_vars['show_action']->value && !$_smarty_tpl->tpl_vars['actions']->value && count($_smarty_tpl->tpl_vars['fields_list']->value) == $_smarty_tpl->tpl_vars['i']->value) {?>colspan="2"<?php }?> >
                                        <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['rating_field'])) && $_smarty_tpl->tpl_vars['field']->value['rating_field']) {?>
                                            <?php if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value] > 0) {?>
                                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]+1 - (1) : 1-((int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                                    <div class="star star_on"></div>
                                                <?php }
}
?>
                                                <?php if ((int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value] < 5) {?>
                                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - ((int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]+1) : (int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]+1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = (int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]+1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                                        <div class="star"></div>
                                                    <?php }
}
?>
                                                <?php }?>
                                            <?php } else { ?>
                                            
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' -- ','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                                            <?php }?>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] != 'active') {?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'date') {?>
                                                <?php if (!$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
                                                --
                                                <?php } else { ?>
                                                    <?php if ($_smarty_tpl->tpl_vars['key']->value != 'date_from' && $_smarty_tpl->tpl_vars['key']->value != 'date_to') {?>
                                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value],'full'=>1),$_smarty_tpl ) );?>

                                                    <?php } else { ?>
                                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value],'full'=>0),$_smarty_tpl ) );?>

                                                    <?php }?>
                                                <?php }?>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] == 'checkbox') {?>
                                                <input type="checkbox" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_boxs[]" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_boxs" />
                                            <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] == 'input_number') {?>
                                                <?php $_smarty_tpl->_assignInScope('field_input', $_smarty_tpl->tpl_vars['field']->value['field']);?>
                                                <div class="qty edit_quantity" data-v-599c0dc5="">
                                                    <div class="ps-number edit-qty hover-buttons" data-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
">
                                                        <input class="form-control <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_input']->value,'html','UTF-8' ));?>
" type="number" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_input']->value,'html','UTF-8' ));?>
[<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
]" value="" placeholder="0" />
                                                        <div class="ps-number-spinner d-flex">
                                                            <span class="ps-number-up"></span>
                                                            <span class="ps-number-down"></span>
                                                        </div>
                                                    </div>
                                                    <button class="check-button" disabled="disabled"><i class="fa fa-check icon icon-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['update_position'])) && $_smarty_tpl->tpl_vars['field']->value['update_position']) {?>
                                                    <div class="dragGroup">
                                                    <span class="positions">
                                                <?php }?>
                                                <?php if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value] !== '' && !is_array($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])) {
if ((isset($_smarty_tpl->tpl_vars['field']->value['strip_tag'])) && !$_smarty_tpl->tpl_vars['field']->value['strip_tag']) {
echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value];
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( strip_tags($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]),120,'...' )),'html','UTF-8' ));
}
} else { ?>--<?php }?>
                                                <?php if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])) && is_array($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]) && (isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['image_field'])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['image_field']) {?>
                                                    <a class="ets_tc_fancy" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['img_url'],'html','UTF-8' ));?>
"><img style="<?php if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['height'])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['height']) {?>max-height: <?php echo intval($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['height']);?>
px;<?php }
if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['width'])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['width']) {?>max-width: <?php echo intval($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['width']);?>
px;<?php }?>" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['img_url'],'html','UTF-8' ));?>
" /></a>
                                                <?php }?> 
                                                <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['update_position'])) && $_smarty_tpl->tpl_vars['field']->value['update_position']) {?>
                                                    </div>
                                                    </span>
                                                <?php }?>  
                                            <?php }?>                                     
                                        <?php } else { ?>
                                            <?php if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
                                                <?php if ((!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit'])) {?>
                                                    <a name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
"  href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&change_enabled=0&field=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
" class="list-action field-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
 list-action-enable action-enabled list-item-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" data-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" title="<?php if ($_smarty_tpl->tpl_vars['key']->value == 'reported') {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to unreport','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to disable','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );
}?>">
                                                        <i class="fa fa-check icon icon-check"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <span class="list-action-enable action-enabled" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
">
                                                        <i class="fa fa-check icon icon-check"></i>
                                                    </span>
                                                <?php }?>
                                            <?php } else { ?>
                                                <?php if ((!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit'])) {?>
                                                    <a name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&change_enabled=1&field=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
" class="list-action field-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
 list-action-enable action-disabled  list-item-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" data-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" title="<?php if ($_smarty_tpl->tpl_vars['key']->value == 'reported') {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to mark as reported','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to enable','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );
}?>">
                                                        <i class="fa fa-remove icon icon-remove"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <span class="list-action-enable action-disabled" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
">
                                                        <i class="fa fa-remove icon icon-remove"></i>
                                                    </span>
                                                <?php }?>
                                            <?php }?>
                                        <?php }?>
                                    </td>
                                    <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php if ($_smarty_tpl->tpl_vars['show_action']->value) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['actions']->value) {?>  
                                        <td class="text-right">                            
                                            <div class="btn-group-action">
                                                <div class="btn-group pull-right">
                                                        <?php if ($_smarty_tpl->tpl_vars['actions']->value[0] == 'view') {?>
                                                            <?php if ((isset($_smarty_tpl->tpl_vars['row']->value['child_view_url'])) && $_smarty_tpl->tpl_vars['row']->value['child_view_url']) {?>
                                                                <a class="btn btn-default link_view" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['child_view_url'],'html','UTF-8' ));?>
" <?php if ((isset($_smarty_tpl->tpl_vars['view_new_tab']->value)) && $_smarty_tpl->tpl_vars['view_new_tab']->value) {?> target="_blank" <?php }?>><i class="icon icon-search-plus fa fa-search-plus"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</a>
                                                            <?php } elseif (!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit']) {?>
                                                                <a class="btn btn-default link_edit" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&edit<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
=1&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" ><i class="icon icon-pencil fa fa-pencil"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</a>
                                                            <?php }?>
                                                        <?php }?>
                                                        <?php if ($_smarty_tpl->tpl_vars['actions']->value[0] == 'delete') {?>
                                                            <a class="btn btn-default" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this item?','mod'=>'ets_trackingcustomer','js'=>1),$_smarty_tpl ) );?>
');" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&del=yes"><i class="icon icon-trash fa fa-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</a>
                                                        <?php }?>
                                                        <?php if (count($_smarty_tpl->tpl_vars['actions']->value) >= 2 && (!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit'] || in_array('action',$_smarty_tpl->tpl_vars['actions']->value) || ((isset($_smarty_tpl->tpl_vars['row']->value['action_delete'])) && $_smarty_tpl->tpl_vars['row']->value['action_delete']))) {?>
                                                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                                                <i class="icon-caret-down"></i>&nbsp;
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['actions']->value, 'action', false, 'key');
$_smarty_tpl->tpl_vars['action']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->do_else = false;
?>
                                                                    <?php if ($_smarty_tpl->tpl_vars['key']->value != 0) {?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'delete') {?>
                                                                            <li><a class="btn btn-default" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this item?','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
');" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&del=yes<?php if ((isset($_smarty_tpl->tpl_vars['row']->value['type']))) {?>&type=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['type'],'html','UTF-8' ));
}?>"><i class="fa fa-trash icon icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</a></li>
                                                                        <?php }?>
                                                                        
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'delete_all') {?>
                                                                            <li><a class="btn btn-default" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this shop and all of its data?','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
');" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&delall=yes<?php if ((isset($_smarty_tpl->tpl_vars['row']->value['type']))) {?>&type=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['type'],'html','UTF-8' ));
}?>"><i class="fa fa-trash icon icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete all','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</a></li>
                                                                        <?php }?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'view') {?>
                                                                            <?php if ((isset($_smarty_tpl->tpl_vars['row']->value['child_view_url'])) && $_smarty_tpl->tpl_vars['row']->value['child_view_url']) {?>
                                                                                <li><a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['child_view_url'],'html','UTF-8' ));?>
"><i class="fa fa-search-plus icon icon-search-plus"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</a></li>
                                                                            <?php } else { ?>
                                                                                <li><a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
"><i class="fa fa-pencil icon icon-pencil"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</a></li>
                                                                            <?php }?>
                                                                        <?php }?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>
                                                                            <li><a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&edit<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
=1&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
"><i class="fa fa-pencil icon icon-pencil"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</a></li>
                                                                        <?php }?>
                                                                    <?php }?>
                                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                            </ul>
                                                        <?php }?>
                                                </div>
                                            </div>
                                        </td>
                                    <?php }?>
                                <?php }?>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>  
                        <?php if (!$_smarty_tpl->tpl_vars['field_values']->value) {?>
                            <tr class="no-record not_items_found"> <td colspan="100%"><p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No data available','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</p></td></tr>
                        <?php }?>                
                    </tbody>
                </table>
            </div>
            <?php if ((isset($_smarty_tpl->tpl_vars['show_bulk_action']->value)) && $_smarty_tpl->tpl_vars['show_bulk_action']->value) {?>
                <div id="catalog-actions" class="col order-first">
                    <div class="d-inline-block">
                        <div class="btn-group dropdown bulk-catalog">
                            <button id="product_bulk_menu" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="color:black;">
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Bulk actions','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                                <i class="icon-caret-up"></i>
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" name="submitSelectAll" type="button" style="border:none;background:none" >
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select all','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                                </button>
                                <button class="dropdown-item" name="submitUnSelectAll" type="button" style="border:none;background:none">
                                    <i class="fa fa-remove" aria-hidden="true"></i>
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Unselect all','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                                </button>
                                <button class="dropdown-item" name="submitBulkDelete" type="submit" style="border:none;background:none" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete selected item?','mod'=>'ets_trackingcustomer','js'=>1),$_smarty_tpl ) );?>
');">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete selected','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['paggination']->value) {?>
                <div class="ets_tc_paggination" style="margin-top: 10px;">
                    <?php echo $_smarty_tpl->tpl_vars['paggination']->value;?>

                </div>
            <?php }?>
        </form>
    <?php }?>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    function ets_tc_updateBulkMenu()
    {
        $('tbody input[type="checkbox"]').parent().removeClass('checked');
        $('tbody input[type="checkbox"]:checked').parent().addClass('checked');
    }
    $(document).ready(function(){
       $(document).on('click','tbody input[type="checkbox"]',function(){
            ets_tc_updateBulkMenu();
        }); 
    });
    $(document).on('change','.paginator_select_limit',function(e){
        $(this).parents('form').submit();
    });
    $(document).on('click','button[name="submitSelectAll"]',function(){
        $('table').find('td input:checkbox').prop('checked', true);
    });
    $(document).on('click','button[name="submitUnSelectAll"]',function(){
        $('table').find('td input:checkbox').prop('checked', false);
    });
<?php echo '</script'; ?>
>

<?php }
}
