<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:18:10
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_wishlist_pres17\views\templates\admin\_configure\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_66101632286e55_97256672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2999f465cef948c8d160ce178d08b2e58200b110' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_wishlist_pres17\\views\\templates\\admin\\_configure\\helpers\\form\\form.tpl',
      1 => 1712329878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66101632286e55_97256672 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_174920711666101632263909_60154552', "label");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_108797275566101632271f64_20358998', "input_row");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "label"} */
class Block_174920711666101632263909_60154552 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'label' => 
  array (
    0 => 'Block_174920711666101632263909_60154552',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['label']))) {?>
		<label class="control-label col-lg-3 <?php if (((isset($_smarty_tpl->tpl_vars['input']->value['required'])) && $_smarty_tpl->tpl_vars['input']->value['required'] && $_smarty_tpl->tpl_vars['input']->value['type'] != 'radio') || ((isset($_smarty_tpl->tpl_vars['input']->value['showRequired'])) && $_smarty_tpl->tpl_vars['input']->value['showRequired'])) {?> required<?php }?>">
			<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['hint']))) {?>
			<span class="label-tooltip" data-toggle="tooltip" data-html="true" title="<?php if (is_array($_smarty_tpl->tpl_vars['input']->value['hint'])) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['hint'], 'hint');
$_smarty_tpl->tpl_vars['hint']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['hint']->value) {
$_smarty_tpl->tpl_vars['hint']->do_else = false;
?>
							<?php if (is_array($_smarty_tpl->tpl_vars['hint']->value)) {?>
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['hint']->value['text'],'html','UTF-8' ));?>

							<?php } else { ?>
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['hint']->value,'html','UTF-8' ));?>

							<?php }?>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php } else { ?>
						<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['hint'],'html','UTF-8' ));?>

					<?php }?>">
			<?php }?>
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['label'],'html','UTF-8' ));?>

			<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['hint']))) {?>
			</span>
			<?php }?>
		</label>
	<?php }
}
}
/* {/block "label"} */
/* {block "input_row"} */
class Block_108797275566101632271f64_20358998 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_row' => 
  array (
    0 => 'Block_108797275566101632271f64_20358998',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WL_BUTTON_POSITION_TOP' || $_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WL_BUTTON_POSITION_RIGHT' || $_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WL_BUTTON_POSITION_BUTTOM' || $_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WL_BUTTON_POSITION_LEFT') {?>
        <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WL_BUTTON_POSITION_TOP') {?>
            <div class="form-group <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['form_group_class']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['form_group_class'],'html','UTF-8' ));
}?>">
                <label class="control-label col-lg-3"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Adjust position','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
 </label>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Top','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</label>
                            <div class="input-group">
                                <input id="ETS_WL_BUTTON_POSITION_TOP" class="input-medium" name="ETS_WL_BUTTON_POSITION_TOP" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value['ETS_WL_BUTTON_POSITION_TOP'],'html','UTF-8' ));?>
" type="text" />
                                <span class="input-group-addon">
                                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['suffix'],'html','UTF-8' ));?>

                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Left','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</label>
                            <div class="input-group">
                                <input id="ETS_WL_BUTTON_POSITION_LEFT" class="input-medium" name="ETS_WL_BUTTON_POSITION_LEFT" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value['ETS_WL_BUTTON_POSITION_LEFT'],'html','UTF-8' ));?>
" type="text" />
                                <span class="input-group-addon">
                                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['suffix'],'html','UTF-8' ));?>

                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Right','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</label>
                            <div class="input-group">
                                <input id="ETS_WL_BUTTON_POSITION_RIGHT" class="input-medium" name="ETS_WL_BUTTON_POSITION_RIGHT" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value['ETS_WL_BUTTON_POSITION_RIGHT'],'html','UTF-8' ));?>
" type="text" />
                                <span class="input-group-addon">
                                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['suffix'],'html','UTF-8' ));?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WLP_TILE_LEFT_BLOCK' || $_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WLP_TILE_RIGHT_BLOCK' || $_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WLP_TILE_SHIPPING_BLOCK') {?>
        <div class="form-group<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['form_group_class']))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['form_group_class'],'html','UTF-8' ));
}?>">
            <span class="title-page">
                <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WLP_TILE_LEFT_BLOCK') {?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Display wish list products on left column','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WLP_TILE_RIGHT_BLOCK') {?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Display wish list products on right column','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WLP_TILE_SHIPPING_BLOCK') {?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Display wish list products on shipping cart page','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

                <?php }?>
            </span>
        </div>
    <?php }?>
        <div class="form-group ets-form-group row_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
">
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

        </div>
        <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WL_DISPLAY_SHARE_BUTTON_ON_WISHLIST_PAGE') {?>
            <div class="ets-form-wrapper">
            <div class="ets_wlp_position_display">
                <span class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Display positions','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</span>
                <ul id="sidebar-positions" class="sidebar-positions">
                    <input type="hidden" name="current_tab" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['current_tab']->value,'html','UTF-8' ));?>
" />
                    <li id="sidebar-position-left" class="sidebar-position left_block<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'left_block') {?> active<?php }?>">
                        <div class="title-position" data-tab="left_block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Left column','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</div>
                        <label class="ets_wlp_switch <?php if ($_smarty_tpl->tpl_vars['ETS_WLP_ENABLED_IN_LEFT']->value) {?> active<?php }?>">
                            <input class="ets_wlp_position"<?php if ($_smarty_tpl->tpl_vars['ETS_WLP_ENABLED_IN_LEFT']->value) {?> checked="checked"<?php }?> value="1" name="ETS_WLP_ENABLED_IN_LEFT" type="checkbox" />
                            <span class="ets_wlp_position_label on"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'On','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</span>
                            <span class="ets_wlp_position_label off"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Off','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</span>
                        </label>
                    </li>
                    <li id="sidebar-position-right" class="sidebar-position right_block<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'right_block') {?> active<?php }?>">
                        <div class="title-position" data-tab="right_block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Right column','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</div>
                        <label class="ets_wlp_switch <?php if ($_smarty_tpl->tpl_vars['ETS_WLP_ENABLED_IN_RIGHT']->value) {?> active<?php }?>">
                            <input class="ets_wlp_position"<?php if ($_smarty_tpl->tpl_vars['ETS_WLP_ENABLED_IN_RIGHT']->value) {?> checked="checked"<?php }?> value="1" name="ETS_WLP_ENABLED_IN_RIGHT" type="checkbox" />
                            <span class="ets_wlp_position_label on"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'On','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</span>
                            <span class="ets_wlp_position_label off"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Off','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</span>
                        </label>
                    </li>
                    <li id="sidebar-position-left" class="sidebar-position shipping_block<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'shipping_block') {?> active<?php }?>">
                        <div class="title-position" data-tab="shipping_block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping cart page','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</div>
                        <label class="ets_wlp_switch <?php if ($_smarty_tpl->tpl_vars['ETS_WLP_ENABLED_IN_SHIPPING']->value) {?> active<?php }?>">
                            <input class="ets_wlp_position"<?php if ($_smarty_tpl->tpl_vars['ETS_WLP_ENABLED_IN_SHIPPING']->value) {?> checked="checked"<?php }?> value="1" name="ETS_WLP_ENABLED_IN_SHIPPING" type="checkbox" />
                            <span class="ets_wlp_position_label on"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'On','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</span>
                            <span class="ets_wlp_position_label off"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Off','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="form-wrapper">
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WLP_AUTO_PLAY_SHIPPING') {?>
            </div>
            </div>
        <?php }?>
    <?php }
}
}
/* {/block "input_row"} */
}
