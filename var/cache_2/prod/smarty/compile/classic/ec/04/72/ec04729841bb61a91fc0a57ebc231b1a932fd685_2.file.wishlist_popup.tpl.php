<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:18:39
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_wishlist_pres17\views\templates\hook\wishlist_popup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6610164faaebd7_43392238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec04729841bb61a91fc0a57ebc231b1a932fd685' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_wishlist_pres17\\views\\templates\\hook\\wishlist_popup.tpl',
      1 => 1712329878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6610164faaebd7_43392238 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="ets-wishlist-add-to" data-url="<?php echo $_smarty_tpl->tpl_vars['link_add_product_to_wishlist']->value;?>
">
    <div tabindex="-1" role="dialog" aria-modal="true" class="ets-wishlist-modal modal fade">
        <div  role="document" class="modal-dialog modal-dialog-centered">
            <div  class="modal-content">
                <div  class="modal-header">
                    <h5 class="modal-title">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to wish list','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

                    </h5> 
                    <button type="button" data-dismiss="modal" class="close" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ets_wl_id_product_current" value="" id="ets_wl_id_product_current"/>
                    <input type="hidden" name="ets_wl_id_product_attribute_current" value="" id="ets_wl_id_product_attribute_current"/>
                    
                    <div class="ets-wishlist-chooselist">
                        <ul class="ets-wishlist-list">
                            <?php if ($_smarty_tpl->tpl_vars['list_wishlists']->value) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_wishlists']->value, 'wishlist');
$_smarty_tpl->tpl_vars['wishlist']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wishlist']->value) {
$_smarty_tpl->tpl_vars['wishlist']->do_else = false;
?>
                                    <li class="item-wishlist" data-id="<?php echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['wishlist']->value['id_ets_wishlist']), ENT_QUOTES, 'UTF-8');?>
"><p><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wishlist']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</p></li>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?> 
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                <a class="ets-wishlist-add-to-new">
                    <i  class="material-icons">add_circle_outline</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create new list','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

                </a>
                </div>
            </div>
        </div>
    </div>
    <div  class="modal-backdrop fade">
    </div>
</div>
<div data-url="<?php echo $_smarty_tpl->tpl_vars['link_new_wishlist']->value;?>
" class="ets-wishlist-create">
    <div tabindex="-1" role="dialog" aria-modal="true" class="ets-wishlist-modal modal fade">
        <div  role="document" class="modal-dialog modal-dialog-centered">
            <div  class="modal-content">
                <div  class="modal-header">
                    <h5  class="modal-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create wish list','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
</h5>
                    <button  type="button" data-dismiss="modal" class="close" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
">
                        <span  aria-hidden="true">×</span>
                    </button>
                </div> 
                <div  class="modal-body">
                    <div  class="form-group form-group-lg">
                        <label  for="wishlist_name" class="form-control-label required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wish list name','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
 </label>
                        <input name="wishlist_name" id="wishlist_name" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add name','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
" class="form-control form-control-lg" type="text" />
                    </div>
                </div> 
                <div  class="modal-footer">
                    <button  type="button" data-dismiss="modal" class="modal-cancel btn btn-secondary">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
   
                    </button>
                    <button  type="button" class="btn btn-primary ets-btn-submit-new-wishlist">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create wish list','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

                    </button>
                </div>
            </div>
        </div>
    </div>
    <div  class="modal-backdrop fade"></div>
</div>
<div class="ets-wishlist-toast" data-required="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wish list name is required','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>
">
    <p class="ets-wishlist-toast-text"> </p>
</div><?php }
}
