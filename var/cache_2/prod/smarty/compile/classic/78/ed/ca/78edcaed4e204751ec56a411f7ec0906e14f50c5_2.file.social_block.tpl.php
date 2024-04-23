<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:07:37
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ph_social_links\views\templates\hook\social_block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661013b9905b69_89260693',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78edcaed4e204751ec56a411f7ec0906e14f50c5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ph_social_links\\views\\templates\\hook\\social_block.tpl',
      1 => 1694507832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661013b9905b69_89260693 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="ph-social-link-block <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ph_position']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 button_size_<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['PH_SL_BUTTON_SIZE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 button_border_<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['PH_SL_BUTTON_BORDER']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 button_type_flat_icon <?php if ($_smarty_tpl->tpl_vars['PH_SL_HIDE_ON_MOBILE']->value) {?> hide_mobile<?php }?>" >
    <h4 class="ph_social_link_title"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['PH_SL_LINK_TITLE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</h4>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['socials']->value, 'social', false, 'key');
$_smarty_tpl->tpl_vars['social']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['social']->value) {
$_smarty_tpl->tpl_vars['social']->do_else = false;
?>
            <?php if ((isset($_smarty_tpl->tpl_vars['socials_link_enabled']->value[$_smarty_tpl->tpl_vars['key']->value])) && $_smarty_tpl->tpl_vars['socials_link_enabled']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
                <li class="ph_social_item <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( strtolower($_smarty_tpl->tpl_vars['key']->value),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                    <a title="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['social']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['socials_link_value']->value[$_smarty_tpl->tpl_vars['key']->value],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" target="_blank">
                        <i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['social']->value['svg'],'html','UTF-8' ));?>
</i>
                        <span class="tooltip_title"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['social']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>
                    </a>
                </li>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
</div><?php }
}
