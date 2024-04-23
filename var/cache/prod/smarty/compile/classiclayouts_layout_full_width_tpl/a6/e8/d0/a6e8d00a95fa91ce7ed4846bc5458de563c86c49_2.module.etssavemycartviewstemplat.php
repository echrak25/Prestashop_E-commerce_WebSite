<?php
/* Smarty version 4.2.1, created on 2024-04-13 15:46:13
  from 'module:etssavemycartviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661a9ab5194f17_46862987',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6e8d00a95fa91ce7ed4846bc5458de563c86c49' => 
    array (
      0 => 'module:etssavemycartviewstemplat',
      1 => 1711922705,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'file:customer/_partials/my-account-links.tpl' => 1,
  ),
),false)) {
function content_661a9ab5194f17_46862987 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1970655918661a9ab517f043_33990049', 'page_title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1031689162661a9ab518c488_39066121', "page_content");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1610034484661a9ab518fa32_78439505', 'page_footer');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_title'} */
class Block_1970655918661a9ab517f043_33990049 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_title' => 
  array (
    0 => 'Block_1970655918661a9ab517f043_33990049',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My shopping carts','mod'=>'ets_savemycart'),$_smarty_tpl ) );?>

<?php
}
}
/* {/block 'page_title'} */
/* {block "page_content"} */
class Block_1031689162661a9ab518c488_39066121 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_1031689162661a9ab518c488_39066121',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displaySaveMyCart','carts'=>$_smarty_tpl->tpl_vars['carts']->value),$_smarty_tpl ) );?>

<?php
}
}
/* {/block "page_content"} */
/* {block 'my_account_links'} */
class Block_1156100760661a9ab518fe20_32430619 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php $_smarty_tpl->_subTemplateRender('file:customer/_partials/my-account-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php
}
}
/* {/block 'my_account_links'} */
/* {block 'page_footer'} */
class Block_1610034484661a9ab518fa32_78439505 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_footer' => 
  array (
    0 => 'Block_1610034484661a9ab518fa32_78439505',
  ),
  'my_account_links' => 
  array (
    0 => 'Block_1156100760661a9ab518fe20_32430619',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1156100760661a9ab518fe20_32430619', 'my_account_links', $this->tplIndex);
?>

<?php
}
}
/* {/block 'page_footer'} */
}
