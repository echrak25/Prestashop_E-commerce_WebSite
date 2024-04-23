<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:20:28
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_wishlist_pres17\views\templates\hook\displayCustomerAccount.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661016bc305e85_51172959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '228e3f75fb8604294c4138f74aa0dd3a85a2ba21' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_wishlist_pres17\\views\\templates\\hook\\displayCustomerAccount.tpl',
      1 => 1712329878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661016bc305e85_51172959 (Smarty_Internal_Template $_smarty_tpl) {
?><a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="wishlist-link" href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['list_wishlist_url']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
  <span class="link-item">
    <i class="material-icons">favorite</i>
    <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title_wishlist_page']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

  </span>
</a><?php }
}
