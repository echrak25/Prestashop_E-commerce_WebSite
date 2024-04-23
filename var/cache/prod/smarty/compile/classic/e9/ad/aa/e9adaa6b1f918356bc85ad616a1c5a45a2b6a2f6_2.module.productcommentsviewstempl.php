<?php
/* Smarty version 4.2.1, created on 2024-04-13 15:44:51
  from 'module:productcommentsviewstempl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661a9a63c8b975_87533516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9adaa6b1f918356bc85ad616a1c5a45a2b6a2f6' => 
    array (
      0 => 'module:productcommentsviewstempl',
      1 => 1711814407,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'module:productcomments/views/templates/hook/average-grade-stars.tpl' => 1,
  ),
),false)) {
function content_661a9a63c8b975_87533516 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['nb_comments']->value != 0 || $_smarty_tpl->tpl_vars['post_allowed']->value) {?>
<div class="product-comments-additional-info">
  <?php if ($_smarty_tpl->tpl_vars['nb_comments']->value == 0) {?>
    <?php if ($_smarty_tpl->tpl_vars['post_allowed']->value) {?>
      <button class="btn btn-comment post-product-comment">
        <i class="material-icons shopping-cart" data-icon="edit"></i>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write your review','d'=>'Modules.Productcomments.Shop'),$_smarty_tpl ) );?>

      </button>
    <?php }?>
  <?php } else { ?>
    <?php $_smarty_tpl->_subTemplateRender('module:productcomments/views/templates/hook/average-grade-stars.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('grade'=>$_smarty_tpl->tpl_vars['average_grade']->value), 0, false);
?>
    <div class="additional-links">
      <a class="link-comment" href="#product-comments-list-header">
        <i class="material-icons shopping-cart" data-icon="chat"></i>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read user reviews','d'=>'Modules.Productcomments.Shop'),$_smarty_tpl ) );?>
 (<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['nb_comments']->value, ENT_QUOTES, 'UTF-8');?>
)
      </a>
      <?php if ($_smarty_tpl->tpl_vars['post_allowed']->value) {?>
        <a class="link-comment post-product-comment" href="#product-comments-list-header">
          <i class="material-icons shopping-cart" data-icon="edit"></i>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write your review','d'=>'Modules.Productcomments.Shop'),$_smarty_tpl ) );?>

        </a>
      <?php }?>
    </div>
  <?php }?>
</div>
<?php }
}
}
