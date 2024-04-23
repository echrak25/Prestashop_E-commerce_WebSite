<?php
/* Smarty version 4.2.1, created on 2024-04-13 15:46:13
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_savemycart\views\templates\hook\fo-shopping-cart-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661a9ab52a32c6_39428771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e155aaec104198ad92f633e249d5e29efd133a69' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_savemycart\\views\\templates\\hook\\fo-shopping-cart-list.tpl',
      1 => 1711922705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a9ab52a32c6_39428771 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="shopping-cart-list ets_aban_listsavecart">
	<h6><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Here are the shopping carts you have saved','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</h6>
	<?php if (!empty($_smarty_tpl->tpl_vars['msg_success']->value)) {?><ul class="ets_sc_messages alert alert-success">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msg_success']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
			<li><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['msg']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul><?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['carts']->value)) {?>
		<table class="table table-striped table-bordered table-labeled">
			<thead class="thead-default">
			<tr>
				<th class="text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cart ID','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</th>
				<th class="text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cart name','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</th>
				<th class="text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product(s)','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</th>
				<th class="text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total cost','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</th>
				<th class="text-center ets_aban_action"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Action','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</th>
			</tr>
			</thead>
			<tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carts']->value, 'cart');
$_smarty_tpl->tpl_vars['cart']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cart']->value) {
$_smarty_tpl->tpl_vars['cart']->do_else = false;
?>
				<tr>
					<th class="sc_id text-center size_1" scope="row"><?php echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['cart']->value['id_cart']), ENT_QUOTES, 'UTF-8');?>
</th>
					<td class="sc_product_name text-center size_2"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cart']->value['cart_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</td>
					<td class="sc_products_list text-xs-left size_3">
						<?php if (!empty($_smarty_tpl->tpl_vars['cart']->value['products'])) {?><ul class="ets_sc_products"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value['products'], 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['link'];?>
" title="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" alt="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" /></a></li>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }?>
					</td>
					<td class="sc_price text-center size_2"><span class="badge-info"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cart']->value['total'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span></td>
					<td class="sc_action text-center ets_aban_action size_2" cart-actions">
						<a class="ets_sc_view_shopping_cart btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['cart']->value['view_url'];?>
" data-tooltip="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
" data-tooltip-pos="top">
                            <i class="ets_svg_icon ets_svg_fill_gray ets_svg_fill_hover_blue">
								<svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1088 800v64q0 13-9.5 22.5t-22.5 9.5h-224v224q0 13-9.5 22.5t-22.5 9.5h-64q-13 0-22.5-9.5t-9.5-22.5v-224h-224q-13 0-22.5-9.5t-9.5-22.5v-64q0-13 9.5-22.5t22.5-9.5h224v-224q0-13 9.5-22.5t22.5-9.5h64q13 0 22.5 9.5t9.5 22.5v224h224q13 0 22.5 9.5t9.5 22.5zm128 32q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 53-37.5 90.5t-90.5 37.5q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"/></svg>
							</i>
                        </a>
						<a href="<?php echo $_smarty_tpl->tpl_vars['cart']->value['load_cart_url'];?>
" class="ets_sc_checkout_cart btn-primary" id="submit_load_cart" name="submitLoadCart" data-tooltip="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Checkout','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
" data-tooltip-pos="top">
                            <i class="ets_svg_icon ets_svg_fill_gray ets_svg_fill_hover_blue">
                                <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M704 1536q0 52-38 90t-90 38-90-38-38-90 38-90 90-38 90 38 38 90zm896 0q0 52-38 90t-90 38-90-38-38-90 38-90 90-38 90 38 38 90zm128-1088v512q0 24-16.5 42.5t-40.5 21.5l-1044 122q13 60 13 70 0 16-24 64h920q26 0 45 19t19 45-19 45-45 19h-1024q-26 0-45-19t-19-45q0-11 8-31.5t16-36 21.5-40 15.5-29.5l-177-823h-204q-26 0-45-19t-19-45 19-45 45-19h256q16 0 28.5 6.5t19.5 15.5 13 24.5 8 26 5.5 29.5 4.5 26h1201q26 0 45 19t19 45z"/></svg>
                            </i>
                        </a>
					<?php if ((isset($_smarty_tpl->tpl_vars['isShareable']->value)) && $_smarty_tpl->tpl_vars['isShareable']->value) {?>
						<a id="submit_share_card" class="ets_sc_share_cart btn-primary" data-id-cart = "<?php echo $_smarty_tpl->tpl_vars['cart']->value['id_cart'];?>
" data-tooltip="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Share to friend','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
" style="cursor: pointer;" data-tooltip-pos="top">
							<i class="ets_svg_icon ets_svg_fill_gray ets_svg_fill_hover_blue">
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z" class=""></path></svg>
							</i>
						</a>
					<?php }?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['cart']->value['delete_url'];?>
" class="ets_sc_delete_cart btn-primary" data-confirm="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this item?','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
" data-tooltip="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
" data-tooltip-pos="top">
							<i class="ets_svg_icon ets_svg_fill_gray ets_svg_fill_hover_blue">
								<svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M704 736v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm128 724v-948h-896v948q0 22 7 40.5t14.5 27 10.5 8.5h832q3 0 10.5-8.5t14.5-27 7-40.5zm-672-1076h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z"/></svg>
							</i>
						</a>
					</td>
				</tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</tbody>
		</table>
    <?php } else { ?><p class="ets_sc_no_cart"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No shopping cart available.','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>
</p><?php }?>
</div><?php }
}
