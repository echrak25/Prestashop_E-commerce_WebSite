<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:19:09
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ph_viewedproducts\views\templates\hook\viewed_products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6610166d939997_16563475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98648d428596036eeeb281f3274be33fa7fbd374' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ph_viewedproducts\\views\\templates\\hook\\viewed_products.tpl',
      1 => 1711927836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6610166d939997_16563475 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if ((isset($_smarty_tpl->tpl_vars['products']->value)) && $_smarty_tpl->tpl_vars['products']->value) {?>
    <section
            class="ph-viewed-products featured-products clearfix <?php if ((isset($_smarty_tpl->tpl_vars['hook']->value)) && $_smarty_tpl->tpl_vars['hook']->value) {?>ph_display_list<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['hook']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>">
        <h2 class="viewed_title"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</h2>
        <div class="products row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6249632276610166d931737_39372464', 'product_miniature_item');
?>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <div class="clearfix"></div>
    </section>
<?php }
}
/* {block 'product_thumbnail'} */
class Block_3340091076610166d9334f0_51014991 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                                <?php if ($_smarty_tpl->tpl_vars['product']->value['cover']) {?>
                                    <a href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['url'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                                       class="thumbnail product-thumbnail">
                                        <img src="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                                             alt="<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['cover']['legend'])) {
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['cover']['legend'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],30,'...' )),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>"
                                             data-full-size-image-url="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['cover']['large']['url'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                                        />
                                    </a>
                                <?php } else { ?>
                                    <a href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['url'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                                       class="thumbnail product-thumbnail">
                                        <img src="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['urls']->value['no_picture_image']['bySize']['home_default']['url'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"/>
                                    </a>
                                <?php }?>
                            <?php
}
}
/* {/block 'product_thumbnail'} */
/* {block 'product_miniature_item'} */
class Block_6249632276610166d931737_39372464 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_miniature_item' => 
  array (
    0 => 'Block_6249632276610166d931737_39372464',
  ),
  'product_thumbnail' => 
  array (
    0 => 'Block_3340091076610166d9334f0_51014991',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <article class="product-miniature-viewed" title="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                             data-id-product="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['id_product'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
                             data-id-product-attribute="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" itemscope
                             itemtype="http://schema.org/Product">
                        <div class="thumbnail-container-viewed">
                            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3340091076610166d9334f0_51014991', 'product_thumbnail', $this->tplIndex);
?>

                        </div>
                    </article>
                <?php
}
}
/* {/block 'product_miniature_item'} */
}
