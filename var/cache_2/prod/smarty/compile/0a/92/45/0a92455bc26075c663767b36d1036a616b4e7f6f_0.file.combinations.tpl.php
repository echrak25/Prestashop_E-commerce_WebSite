<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:05:22
  from 'C:\xampp\htdocs\CozyHome\prestashop\override\controllers\admin\templates\cart_rules\combinations.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661013321bb164_83996264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a92455bc26075c663767b36d1036a616b4e7f6f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\override\\controllers\\admin\\templates\\cart_rules\\combinations.tpl',
      1 => 1711905891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661013321bb164_83996264 (Smarty_Internal_Template $_smarty_tpl) {
echo Module::getInstanceByName('etsdiscountcombinations')->displayFormCombination($_smarty_tpl->tpl_vars['cart_rules']->value);?>

<div class="form-group rule_combination manual" style="">
    <label class="control-label col-lg-3">&nbsp; </label>
    <div class="col-lg-9">
        <?php if ((count($_smarty_tpl->tpl_vars['cart_rules']->value['unselected']))+(count($_smarty_tpl->tpl_vars['cart_rules']->value['selected'])) > 0) {?>
        	<p class="checkbox" style="opacity:0">
        		<label>
        			<input type="checkbox" id="cart_rule_restriction" name="cart_rule_restriction" value="1" <?php if (count($_smarty_tpl->tpl_vars['cart_rules']->value['unselected'])) {?>checked="checked"<?php }?> />
        			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Compatibility with other cart rules','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>

        		</label>
        	</p>
        	<div id="cart_rule_restriction_div" style="margin-top: -40px;">
        		<br />
        		<table  class="table">
        			<tr>
        				<td>
        					<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Non-combinable cart rules','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
</p>
        					<select id="cart_rule_select_1" class="jscroll" multiple="">
        					</select>
        					<a class="jscroll-next btn btn-default btn-block clearfix" href=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Next','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
</a>
        					<a id="cart_rule_select_add" class="btn btn-default btn-block clearfix"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
 <i class="icon-arrow-right"></i></a>
        				</td>
        				<td>
        					<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Combinable cart rules','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
</p>
        					<select name="cart_rule_select[]" class="jscroll" id="cart_rule_select_2" multiple>
        					</select>
        					<a class="jscroll-next btn btn-default btn-block clearfix" href=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Next','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
</a>
        					<a id="cart_rule_select_remove" class="btn btn-default btn-block clearfix" ><i class="icon-arrow-left"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
</a>
        				</td>
        			</tr>
        		</table>
        	</div>
        <?php }?>
    </div>
</div><?php }
}
