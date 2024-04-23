<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:07:37
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ph_scrolltotop\views\templates\hook\back-to-top.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661013b98ea0a4_06353091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0660a87d59a51007a0b0ff9ddc791d3279b02375' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ph_scrolltotop\\views\\templates\\hook\\back-to-top.tpl',
      1 => 1711923159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661013b98ea0a4_06353091 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['ETS_SCROLLTOTOP_LIVE_MODE']->value) {?>
    <div class="back-to-top">
        <a href="#">
            <?php if ($_smarty_tpl->tpl_vars['ETS_BUTTON_ICON_SELECT']->value == 'icon') {?>
            <span class="back-icon">
            <i class="<?php if ($_smarty_tpl->tpl_vars['ETS_BUTTON_ICON']->value) {?>fa <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BUTTON_ICON']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>fa fa-arrow-circle-up<?php }?>" aria-hidden="true"></i>
      <?php } else { ?>
        <span class="back-icon"
              style="
                      background-image: url(<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_CUSTOM_ICON']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
);
                      background-repeat: no-repeat;
                      background-position: center;
                      background-size: cover;
                      width: 40px;
                      height: 40px;
                      ">
      <?php }?>
        </span>
        </a>
    </div>
<?php }
}
}
