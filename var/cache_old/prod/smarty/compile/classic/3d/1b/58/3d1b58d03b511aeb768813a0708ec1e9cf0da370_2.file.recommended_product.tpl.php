<?php
/* Smarty version 4.2.1, created on 2024-04-03 22:44:01
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ph_recommendbycategories\views\templates\hook\recommended_product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_660dcda18070b6_39502217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d1b58d03b511aeb768813a0708ec1e9cf0da370' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ph_recommendbycategories\\views\\templates\\hook\\recommended_product.tpl',
      1 => 1711922134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/product.tpl' => 2,
  ),
),false)) {
function content_660dcda18070b6_39502217 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['products']->value) {?>
    <section class="ph-recommend-products featured-products clearfix">
        <?php if ((isset($_smarty_tpl->tpl_vars['title']->value)) && $_smarty_tpl->tpl_vars['title']->value) {?>
            <h2 class="recomment_title"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</h2>
        <?php }?>
        <div class="products row only_desktop <?php if ($_smarty_tpl->tpl_vars['enable_slider_on_desktop']->value) {?>slider_enabled<?php } else { ?>slider_disabled<?php }?>">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <div class="products row only_mobile <?php if ($_smarty_tpl->tpl_vars['enable_slider_on_mobile']->value) {?> slider_enabled<?php } else { ?>slider_disabled<?php }?>" >
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, 'indexItem');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['indexItem']->value => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </section>
<?php }
}
}
