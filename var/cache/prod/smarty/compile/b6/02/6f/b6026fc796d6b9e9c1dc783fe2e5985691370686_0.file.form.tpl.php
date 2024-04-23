<?php
/* Smarty version 4.2.1, created on 2024-04-14 00:05:58
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ph_scrolltotop\views\templates\admin\_configure\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661b0fd62ceeb9_78944163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6026fc796d6b9e9c1dc783fe2e5985691370686' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ph_scrolltotop\\views\\templates\\admin\\_configure\\helpers\\form\\form.tpl',
      1 => 1711923159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661b0fd62ceeb9_78944163 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_678706863661b0fd62c0649_64446939', "input");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_631417973661b0fd62c9f58_44714704', "footer");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1018601947661b0fd62cc092_82066777', "other_fieldsets");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "input"} */
class Block_678706863661b0fd62c0649_64446939 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input' => 
  array (
    0 => 'Block_678706863661b0fd62c0649_64446939',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'ets_touch_spin') {?>
        <div class="input-pixel">
            <div class="bootstrap-touchspin col-lg-2">
                <input type="number" style="width: 100%"
                       name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
"
                       class="input-group form-control" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']],'html','UTF-8' ));?>
" min="0"/>
            </div>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_BUTTON_ICON') {?>
        <div class="dummyfile input-group col-lg-3">
            <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

            <span class="input-group-btn ph_browse_icon">
                <button type="button" name="submitAddBrowseIcon" class="btn btn-default">
                    <i class="icon-search"></i>&nbsp;<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Browse icon','mod'=>'ph_scrolltotop'),$_smarty_tpl ) );?>

                </button>
            </span>
        </div>
    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }
}
}
/* {/block "input"} */
/* {block "footer"} */
class Block_631417973661b0fd62c9f58_44714704 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_631417973661b0fd62c9f58_44714704',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="panel-footer">
        <span class="btn btn-default pull-left ets_reset" >
                <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['baseImageUrl']->value,'html','UTF-8' ));?>
loader.gif" style="display: none"/>
                <i class="process-icon-refresh"></i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reset','mod'=>'ph_scrolltotop'),$_smarty_tpl ) );?>

        </span>
        <div class="scroll-to-top-save">
            <button type="submit" value="1"	class="btn btn-default pull-right ets_save">
                <i class="process-icon-save"></i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'ph_scrolltotop'),$_smarty_tpl ) );?>

            </button>
        </div>
    </div>
<?php
}
}
/* {/block "footer"} */
/* {block "other_fieldsets"} */
class Block_1018601947661b0fd62cc092_82066777 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'other_fieldsets' => 
  array (
    0 => 'Block_1018601947661b0fd62cc092_82066777',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        var baseAdminUrl = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['baseAdminUrl']->value,'quotes','UTF-8' ));?>
";
        var imageName = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['imageName']->value,'quotes','UTF-8' ));?>
";
        var imagePath = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['imagePath']->value,'quotes','UTF-8' ));?>
";
        var delete_url = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['delete_url']->value,'quotes','UTF-8' ));?>
";
    <?php echo '</script'; ?>
>
    <div class="scroll_loading_icon hidden"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['baseImageUrl']->value,'html','UTF-8' ));?>
ajax-loader.gif" /></div>
    <div class="scroll_forms scroll_popup_overlay hidden">
        <div class="scroll_icon_form_new hidden"><?php echo $_smarty_tpl->tpl_vars['iconForm']->value;?>
</div>
    </div>
<?php
}
}
/* {/block "other_fieldsets"} */
}
