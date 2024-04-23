<?php
/* Smarty version 4.2.1, created on 2024-04-03 21:25:05
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\blockreassurance\views\templates\hook\displayBlockWhite.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_660dbb210299d5_10794637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0dadbac4986b3a8f8e77d509ed8f5120735ad935' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\blockreassurance\\views\\templates\\hook\\displayBlockWhite.tpl',
      1 => 1699433672,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dbb210299d5_10794637 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="blockreassurance col-sm-12">
    <?php $_smarty_tpl->_assignInScope('numCols', count($_smarty_tpl->tpl_vars['blocks']->value));?>
    <?php $_smarty_tpl->_assignInScope('numColsRemaining_md', ($_smarty_tpl->tpl_vars['numCols']->value%4));?>
    <?php $_smarty_tpl->_assignInScope('numColsRemaining_sm', ($_smarty_tpl->tpl_vars['numCols']->value%2));?>
    <div class="row">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['blocks']->value, 'block', false, 'key', 'blocks', array (
  'index' => true,
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['block']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_blocks']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_blocks']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_blocks']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_blocks']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_blocks']->value['total'];
?>
        <?php $_smarty_tpl->_assignInScope('idxCol', ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_blocks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_blocks']->value['index'] : null)+1));?>
        <?php $_smarty_tpl->_assignInScope('sizeCol_md', 3);?>
        <?php $_smarty_tpl->_assignInScope('offsetCol_md', "offset-md-0");?>
        <?php $_smarty_tpl->_assignInScope('sizeCol_sm', 6);?>
        <?php $_smarty_tpl->_assignInScope('offsetCol_sm', "offset-sm-0");?>
        <?php if ($_smarty_tpl->tpl_vars['idxCol']->value > ($_smarty_tpl->tpl_vars['numCols']->value-$_smarty_tpl->tpl_vars['numColsRemaining_md']->value)) {?>
            <?php if ($_smarty_tpl->tpl_vars['numColsRemaining_md']->value == 2) {?>
                <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_blocks']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_blocks']->value['last'] : null)) {?>
                    <?php $_smarty_tpl->_assignInScope('offsetCol_md', "offset-md-3");?>
                <?php }?>
            <?php } else { ?>
                <?php $_smarty_tpl->_assignInScope('sizeCol_md', (12/$_smarty_tpl->tpl_vars['numColsRemaining_md']->value));?>
            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['idxCol']->value > ($_smarty_tpl->tpl_vars['numCols']->value-$_smarty_tpl->tpl_vars['numColsRemaining_sm']->value)) {?>
            <?php if ($_smarty_tpl->tpl_vars['numColsRemaining_md']->value == 1) {?>
                <?php $_smarty_tpl->_assignInScope('offsetCol_sm', "offset-sm-3");?>
            <?php } else { ?>
                <?php $_smarty_tpl->_assignInScope('sizeCol_sm', (12/$_smarty_tpl->tpl_vars['numColsRemaining_md']->value));?>
            <?php }?>
        <?php }?>
        <div class="col-md-<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['sizeCol_md']->value, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['offsetCol_md']->value, ENT_QUOTES, 'UTF-8');?>
 col-sm-<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['sizeCol_sm']->value, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['offsetCol_sm']->value, ENT_QUOTES, 'UTF-8');?>
 col-xs-12"
            <?php if ($_smarty_tpl->tpl_vars['block']->value['type_link'] !== $_smarty_tpl->tpl_vars['LINK_TYPE_NONE']->value && !empty($_smarty_tpl->tpl_vars['block']->value['link'])) {?> style="cursor:pointer;" onclick="window.open('<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['block']->value['link'], ENT_QUOTES, 'UTF-8');?>
')"<?php }?>>
            <div class="block-icon">
                <?php if ($_smarty_tpl->tpl_vars['block']->value['icon'] != 'undefined') {?>
                    <?php if ($_smarty_tpl->tpl_vars['block']->value['custom_icon']) {?>
                      <img <?php if ($_smarty_tpl->tpl_vars['block']->value['is_svg']) {?>class="svg invisible" <?php }?>src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['block']->value['custom_icon'], ENT_QUOTES, 'UTF-8');?>
">
                    <?php } elseif ($_smarty_tpl->tpl_vars['block']->value['icon']) {?>
                      <img class="svg invisible" src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['block']->value['icon'], ENT_QUOTES, 'UTF-8');?>
">
                    <?php }?>
                <?php }?>
            </div>
            <div class="block-title" style="color:<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['textColor']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['block']->value['title'], ENT_QUOTES, 'UTF-8');?>
</div>
            <p style="color:<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['textColor']->value, ENT_QUOTES, 'UTF-8');?>
;"><?php echo $_smarty_tpl->tpl_vars['block']->value['description'];?>
</p>
        </div>
      <?php if ($_smarty_tpl->tpl_vars['idxCol']->value%4 == 0) {?></div><div class="row"><?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</div>
<?php }
}
