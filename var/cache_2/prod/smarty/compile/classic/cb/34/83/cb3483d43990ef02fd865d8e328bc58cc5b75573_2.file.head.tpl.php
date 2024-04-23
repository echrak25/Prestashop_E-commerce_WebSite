<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:16:18
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_testimonial\views\templates\hook\head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661015c25eb9b7_90831536',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb3483d43990ef02fd865d8e328bc58cc5b75573' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_testimonial\\views\\templates\\hook\\head.tpl',
      1 => 1689693710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661015c25eb9b7_90831536 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
var ETS_TTN_AUTOPLAY_SLIDESHOW =<?php if ($_smarty_tpl->tpl_vars['ETS_TTN_AUTOPLAY_SLIDESHOW']->value) {?> true<?php } else { ?>false<?php }?>;
var ETS_TTN_TIME_SPEED_SLIDESHOW =<?php if ($_smarty_tpl->tpl_vars['ETS_TTN_TIME_SPEED_SLIDESHOW']->value) {
echo htmlspecialchars((string) intval($_smarty_tpl->tpl_vars['ETS_TTN_TIME_SPEED_SLIDESHOW']->value), ENT_QUOTES, 'UTF-8');
} else { ?>5000<?php }?>;
<?php echo '</script'; ?>
><?php }
}
