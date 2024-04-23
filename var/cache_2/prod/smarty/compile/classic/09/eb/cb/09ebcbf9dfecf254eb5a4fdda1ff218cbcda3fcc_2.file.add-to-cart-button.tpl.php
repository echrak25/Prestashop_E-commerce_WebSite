<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:07:37
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_addtocart_fromlist\views\templates\hook\add-to-cart-button.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661013b969e891_33400041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09ebcbf9dfecf254eb5a4fdda1ff218cbcda3fcc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_addtocart_fromlist\\views\\templates\\hook\\add-to-cart-button.tpl',
      1 => 1711811824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661013b969e891_33400041 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="atc_div <?php if ($_smarty_tpl->tpl_vars['ETS_ATC_DISPLAY_TYPE']->value) {?>add-to-cart-icon <?php } else { ?>add-to-cart-button <?php }?>">
    <input name="qty" type="hidden" class="form-control ets_atc_qty" value="1" onfocus="if(this.value == '1') this.value = '';" onblur="if(this.value == '') this.value = '1';"/>
    <button id="ets_addToCart" class="btn btn-primary">
        <?php if ($_smarty_tpl->tpl_vars['ETS_ATC_DISPLAY_TYPE']->value) {?>
        <?php echo $_smarty_tpl->tpl_vars['icons']->value[$_smarty_tpl->tpl_vars['ETS_ATC_ICON_STYLE_ICON']->value];?>

        <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['ETS_ATC_BUTTON_ICON']->value == '1') {?>
                    <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_ATC_BUTTON_LABEL']->value[$_smarty_tpl->tpl_vars['id_language']->value],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

            <?php } elseif ($_smarty_tpl->tpl_vars['ETS_ATC_BUTTON_ICON']->value == '2') {?>
                    <?php echo $_smarty_tpl->tpl_vars['icons']->value['fa-cart-plus'];?>

                <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_ATC_BUTTON_LABEL']->value[$_smarty_tpl->tpl_vars['id_language']->value],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

            <?php } elseif ($_smarty_tpl->tpl_vars['ETS_ATC_BUTTON_ICON']->value == '3') {?>
                <?php echo $_smarty_tpl->tpl_vars['icons']->value['fa-opencart'];?>

                <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_ATC_BUTTON_LABEL']->value[$_smarty_tpl->tpl_vars['id_language']->value],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

            <?php } elseif ($_smarty_tpl->tpl_vars['ETS_ATC_BUTTON_ICON']->value == '4') {?>
                <?php echo $_smarty_tpl->tpl_vars['icons']->value['fa-shopping-bag'];?>

                <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_ATC_BUTTON_LABEL']->value[$_smarty_tpl->tpl_vars['id_language']->value],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

            <?php }?>
        <?php }?>
    </button>

</div><?php }
}
