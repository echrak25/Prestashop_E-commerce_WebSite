<?php
/* Smarty version 4.2.1, created on 2024-04-03 22:06:03
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\prestaheroconnect\views\templates\hook\include\modal_confirm_action.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_660dc4bb4efc19_66706590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83ad7b1cdb90a2b7d0acff45ed99eb84e6cfaf15' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\prestaheroconnect\\views\\templates\\hook\\include\\modal_confirm_action.tpl',
      1 => 1709129664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dc4bb4efc19_66706590 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module']->value['name'],'html','UTF-8' ));?>
-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value,'html','UTF-8' ));?>
" class="modal modal-vcenter fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title module-modal-title">
                    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'reset') {?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reset module?','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'uninstall') {?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Uninstall module?','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'disable') {?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disable module?','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                    <?php } else { ?>

                    <?php }?>
                </h4>
            </div>
            <div class="modal-body row">
                <div class="col-md-12">
                    <p>
                    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'reset') {?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You\'re about to reset','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module']->value['displayName'],'html','UTF-8' ));?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'module','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        <br/>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This will restore the defaults settings.','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        <span class="italic red">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This action cannot be undone.','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        </span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'uninstall') {?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You\'re about to uninstall','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module']->value['displayName'],'html','UTF-8' ));?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'module','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        <br/>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This will definitely disable the module and delete all its files.','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        <span class="italic red">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This action cannot be undone.','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        </span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'disable') {?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You\'re about to disable','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module']->value['displayName'],'html','UTF-8' ));?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'module','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        <br/>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your current settings will be saved, but the module will no longer be active.','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                    <?php } else { ?>

                    <?php }?>
                    </p>
                    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'uninstall' && $_smarty_tpl->tpl_vars['is17']->value) {?>
                    <div class="checkbox ph-con-checkbox-delete-module-popup">
                        <label>
                            <input type="checkbox" value="1" name="delete_module">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Optional: Delete module folder after uninstall.','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        </label>
                    </div>
                    <?php }?>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
">
                <a class="btn btn-primary js-ph-con-accept-action" href="javascript:void(0)" data-dismiss="modal"
                   data-tech-name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module']->value['name'],'html','UTF-8' ));?>
" data-action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value,'html','UTF-8' ));?>
">
                    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'reset') {?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes, reset it?','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'uninstall') {?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes, uninstall it?','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'disable') {?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes, disable it?','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                    <?php } else { ?>

                    <?php }?>
                </a>
            </div>
        </div>
    </div>
</div><?php }
}
