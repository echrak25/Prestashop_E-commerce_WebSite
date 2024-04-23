<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:16:19
  from 'module:etsmostpopularviewstempla' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661015c303ed96_98779862',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '922b4de7d884443b0597a9a843fb3228e3071015' => 
    array (
      0 => 'module:etsmostpopularviewstempla',
      1 => 1711923254,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/product.tpl' => 1,
  ),
),false)) {
function content_661015c303ed96_98779862 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['blockName']->value == 'home' || $_smarty_tpl->tpl_vars['blockName']->value == 'product') {?>
    <?php $_smarty_tpl->_assignInScope('nbItemsPerLine', 3);?>
	<?php $_smarty_tpl->_assignInScope('nbItemsPerLineTablet', 4);?>
	<?php $_smarty_tpl->_assignInScope('nbItemsPerLineMobile', 6);
} else { ?>
    <?php $_smarty_tpl->_assignInScope('nbItemsPerLine', 12);?>
	<?php $_smarty_tpl->_assignInScope('nbItemsPerLineTablet', 12);?>
	<?php $_smarty_tpl->_assignInScope('nbItemsPerLineMobile', 4);
}
echo '<script'; ?>
 type="text/javascript">
    <?php if ($_smarty_tpl->tpl_vars['blockName']->value == 'home' || $_smarty_tpl->tpl_vars['blockName']->value == 'product') {?>
        var ets_mostp_nbItemsPerLine =4;
        var ets_mostp_nbItemsPerLineTablet =3;
        var ets_mostp_nbItemsPerLineMobile=2;
    <?php } else { ?>
        var ets_mostp_nbItemsPerLine =1;
        var ets_mostp_nbItemsPerLineTablet =1;
        var ets_mostp_nbItemsPerLineMobile=1;
    <?php }
echo '</script'; ?>
>
<section class="most_products_list_section featured-products clearfix mt-3<?php if ($_smarty_tpl->tpl_vars['blockName']->value == 'left' || $_smarty_tpl->tpl_vars['blockName']->value == 'right') {?> block left_right<?php }?>">
    <h2 class="h2 products-section-title text-uppercase">
        <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['block_title']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

    </h2>
    <div class="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blockName']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 products product_list most_products_list_wrapper layout-<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ets_mostp_display_type']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 ets_mostp_desktop_<?php echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['nbItemsPerLine']->value), ENT_QUOTES, 'UTF-8');?>
 ets_mostp_tablet_<?php echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['nbItemsPerLineTablet']->value), ENT_QUOTES, 'UTF-8');?>
 ets_mostp_mobile_<?php echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['nbItemsPerLineMobile']->value), ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['slide_auto_play']->value) {?> auto<?php }?> ">
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
    <a href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['allFeaturedProductsLink']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="float-xs-left float-md-right all_most_products"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All products','mod'=>'ets_mostpopular'),$_smarty_tpl ) );?>
 <i class="material-icons">&#xE315;</i></a>
</section>
<?php }
}
