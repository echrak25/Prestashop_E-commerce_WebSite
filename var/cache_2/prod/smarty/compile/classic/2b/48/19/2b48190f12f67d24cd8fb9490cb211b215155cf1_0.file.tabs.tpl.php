<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:18:10
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_wishlist_pres17\views\templates\hook\tabs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6610163223de38_13745741',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b48190f12f67d24cd8fb9490cb211b215155cf1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_wishlist_pres17\\views\\templates\\hook\\tabs.tpl',
      1 => 1712329878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6610163223de38_13745741 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="ets_wlp_tabs">
    <li class="tab tab_settings<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'settings') {?> active<?php }?>">
        <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_config']->value,'html','UTF-8' ));?>
&current_tab=settings">
             <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Settings','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

        </a>
    </li>
    <li class="tab tab_settings<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'statistics') {?> active<?php }?>">
        <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_config']->value,'html','UTF-8' ));?>
&current_tab=statistics">
             <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Statistics','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

        </a>
    </li>
</ul>
<div class="ets_wlp_tabs_height"></div><?php }
}
