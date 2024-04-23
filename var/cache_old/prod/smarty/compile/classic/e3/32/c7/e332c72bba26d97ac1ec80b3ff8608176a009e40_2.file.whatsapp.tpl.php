<?php
/* Smarty version 4.2.1, created on 2024-04-03 22:30:47
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_whatsapp\views\templates\hook\whatsapp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_660dca872b81c7_69993537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e332c72bba26d97ac1ec80b3ff8608176a009e40' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_whatsapp\\views\\templates\\hook\\whatsapp.tpl',
      1 => 1711800448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dca872b81c7_69993537 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['ETS_WA_NUMBER_PHONE']->value) {?>
    
        <style>
            .ets_wa_whatsapp_block.right_center{
                right:<?php if ($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_RIGHT']->value) {
echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_RIGHT']->value), ENT_QUOTES, 'UTF-8');?>
px<?php } else { ?>0<?php }?>;
                bottom:50%;
            }
            .ets_wa_whatsapp_block.right_bottom{
                right:<?php if ($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_RIGHT']->value) {
echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_RIGHT']->value), ENT_QUOTES, 'UTF-8');?>
px<?php } else { ?>0<?php }?>;
                bottom:<?php if ($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_BOTTOM']->value) {
echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_BOTTOM']->value), ENT_QUOTES, 'UTF-8');?>
px<?php } else { ?>0<?php }?>;
            }
            .ets_wa_whatsapp_block.left_center{
                left:<?php if ($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_LEFT']->value) {
echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_LEFT']->value), ENT_QUOTES, 'UTF-8');?>
px<?php } else { ?>0<?php }?>;
                bottom:50%;
            }
            .ets_wa_whatsapp_block.left_bottom{
                left:<?php if ($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_LEFT']->value) {
echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_LEFT']->value), ENT_QUOTES, 'UTF-8');?>
px<?php } else { ?>0<?php }?>;
                bottom:<?php if ($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_BOTTOM']->value) {
echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['ETS_WA_ADJUST_BOTTOM']->value), ENT_QUOTES, 'UTF-8');?>
px<?php } else { ?>0<?php }?>;
            }
        </style>
    
    <div class="ets_wa_whatsapp_block <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_WA_DISPLAY_POSITION']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
        <a target="_blank" data-mobile-href="https://api.whatsapp.com/send?phone=<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_WA_COUNTRY']->value->call_prefix,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_WA_NUMBER_PHONE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['ETS_WA_SEND_CURRENT_URL']->value) {?>&text=<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_WA_SEND_CURRENT_URL']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>" href="https://web.whatsapp.com/send?phone=<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_WA_COUNTRY']->value->call_prefix,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_WA_NUMBER_PHONE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['ETS_WA_SEND_CURRENT_URL']->value) {?>&text=<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_WA_SEND_CURRENT_URL']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>">
            <img src="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_MODULE_DIR_') ? constant('_MODULE_DIR_') : null))."ets_whatsapp/views/img/whatsapp.png"),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
        </a>
        <?php if ($_smarty_tpl->tpl_vars['ETS_WA_DISPLAY_TITLE']->value) {?>
            <p class="ets_wa_title"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_WA_DISPLAY_TITLE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</p>
        <?php }?>
    </div>
<?php }
}
}
