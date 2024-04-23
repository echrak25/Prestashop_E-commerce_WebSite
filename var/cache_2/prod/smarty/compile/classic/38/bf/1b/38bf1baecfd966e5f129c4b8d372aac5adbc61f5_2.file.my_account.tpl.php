<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:08:38
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\payplug\views\templates\hook\customer\my_account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661013f668f618_41452518',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38bf1baecfd966e5f129c4b8d372aac5adbc61f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\payplug\\views\\templates\\hook\\customer\\my_account.tpl',
      1 => 1711542288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661013f668f618_41452518 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- MODULE Payplug -->
<?php if ($_smarty_tpl->tpl_vars['version']->value < 1.7) {?>
    <li>
        <a href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['payplug_cards_url']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Saved cards','mod'=>'payplug'),$_smarty_tpl ) );?>
">
            <i class="icon-credit-card"></i>
            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Saved cards','mod'=>'payplug'),$_smarty_tpl ) );?>
</span>
        </a>
    </li>
<?php } else { ?>
    <a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="savedcards-link" href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['payplug_cards_url']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
          <span class="link-item">
            <i class="material-icons">&#xE870;</i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Saved cards','mod'=>'payplug'),$_smarty_tpl ) );?>

          </span>
    </a>
<?php }?>
<!-- END : MODULE Payplug -->
<?php }
}
