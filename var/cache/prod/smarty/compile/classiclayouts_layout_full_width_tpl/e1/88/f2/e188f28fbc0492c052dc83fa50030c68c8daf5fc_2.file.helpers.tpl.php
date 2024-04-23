<?php
/* Smarty version 4.2.1, created on 2024-04-13 15:44:02
  from 'C:\xampp\htdocs\CozyHome\prestashop\themes\classic\templates\_partials\helpers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661a9a326f00d3_20096321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e188f28fbc0492c052dc83fa50030c68c8daf5fc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\themes\\classic\\templates\\_partials\\helpers.tpl',
      1 => 1711726146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a9a326f00d3_20096321 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'renderLogo' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\var\\cache\\prod\\smarty\\compile\\classiclayouts_layout_full_width_tpl\\e1\\88\\f2\\e188f28fbc0492c052dc83fa50030c68c8daf5fc_2.file.helpers.tpl.php',
    'uid' => 'e188f28fbc0492c052dc83fa50030c68c8daf5fc',
    'call_name' => 'smarty_template_function_renderLogo_1972298101661a9a326e58e3_84075892',
  ),
));
?> 

<?php }
/* smarty_template_function_renderLogo_1972298101661a9a326e58e3_84075892 */
if (!function_exists('smarty_template_function_renderLogo_1972298101661a9a326e58e3_84075892')) {
function smarty_template_function_renderLogo_1972298101661a9a326e58e3_84075892(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

  <a href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
">
    <img
      class="logo img-fluid"
      src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['src'], ENT_QUOTES, 'UTF-8');?>
"
      alt="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
      width="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['width'], ENT_QUOTES, 'UTF-8');?>
"
      height="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['height'], ENT_QUOTES, 'UTF-8');?>
">
  </a>
<?php
}}
/*/ smarty_template_function_renderLogo_1972298101661a9a326e58e3_84075892 */
}
