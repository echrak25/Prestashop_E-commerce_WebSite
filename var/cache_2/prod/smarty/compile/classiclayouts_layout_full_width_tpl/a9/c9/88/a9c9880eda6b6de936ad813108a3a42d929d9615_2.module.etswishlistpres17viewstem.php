<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:20:31
  from 'module:etswishlistpres17viewstem' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661016bfcbda64_42806354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9c9880eda6b6de936ad813108a3a42d929d9615' => 
    array (
      0 => 'module:etswishlistpres17viewstem',
      1 => 1712329878,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661016bfcbda64_42806354 (Smarty_Internal_Template $_smarty_tpl) {
?><div data-url="<?php echo $_smarty_tpl->tpl_vars['renameUrl']->value;?>
" class="ets-wishlist-rename">
    <div  tabindex="-1" role="dialog" aria-modal="true" class="ets-wishlist-modal modal fade">
        <div  role="document" class="modal-dialog modal-dialog-centered">
            <div  class="modal-content">
                <div  class="modal-header">
                    <h5  class="modal-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Rename wish list','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</h5>
                    <button  type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span  aria-hidden="true">×</span></button>
                </div> 
                <div  class="modal-body">
                    <div  class="form-group form-group-lg">
                        <input id="id_wishlist_edit" name="id_wishlist_edit" value="" type="hidden" />
                        <label for="wishlist_name_edit" class="form-control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wish list name','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</label>
                        <input name="wishlist_name_edit" id="wishlist_name_edit" class="form-control form-control-lg" type="text" />
                    </div>
                </div>
                <div  class="modal-footer">
                    <button  type="button" data-dismiss="modal" class="modal-cancel btn btn-secondary">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

                    </button> 
                    <button  type="button" class="btn btn-primary btn-submit-rename-wishlist">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Rename wish list','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

                    </button>
                </div>
            </div>
        </div>
    </div>
    <div  class="modal-backdrop fade"></div>
</div><?php }
}
