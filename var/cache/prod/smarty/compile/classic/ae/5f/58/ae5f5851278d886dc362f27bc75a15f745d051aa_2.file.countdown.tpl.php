<?php
/* Smarty version 4.2.1, created on 2024-04-16 18:31:04
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_countdown\views\templates\hook\countdown.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661eb5d81b9b90_62757076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae5f5851278d886dc362f27bc75a15f745d051aa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_countdown\\views\\templates\\hook\\countdown.tpl',
      1 => 1711887046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661eb5d81b9b90_62757076 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="ets_cd_block">
    <?php if ($_smarty_tpl->tpl_vars['ETS_CD_TITLE_COUNT_DOWN']->value) {?>
        <div class="title-click"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_CD_TITLE_COUNT_DOWN']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</div>
    <?php }?>
    <div class="ets-cd-countdown alignment-center <?php if ($_smarty_tpl->tpl_vars['ETS_CD_DISPLAY_TYPE']->value) {
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_CD_DISPLAY_TYPE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>normal<?php }?>" data-datetime="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['to_specific_prices']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" data-text_color="<?php if ($_smarty_tpl->tpl_vars['ETS_CD_TIME_UNIT_COLOR']->value) {
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_CD_TIME_UNIT_COLOR']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>#ffffff<?php }?>" data-box_color="<?php if ($_smarty_tpl->tpl_vars['ETS_CD_BACKGROUND_COLOR']->value) {
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_CD_BACKGROUND_COLOR']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>#0000000<?php }?>" data-animate-type="<?php if ($_smarty_tpl->tpl_vars['ETS_CD_DISPLAY_TYPE']->value) {
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_CD_DISPLAY_TYPE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>normal<?php }?>" data-trans-days="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Days','mod'=>'ets_countdown'),$_smarty_tpl ) );?>
" data-trans-hours="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hours','mod'=>'ets_countdown'),$_smarty_tpl ) );?>
"  data-trans-minutes="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Minutes','mod'=>'ets_countdown'),$_smarty_tpl ) );?>
" data-trans-seconds="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Seconds','mod'=>'ets_countdown'),$_smarty_tpl ) );?>
">
        <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['to_specific_prices']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

    </div>
</div>
<?php }
}
