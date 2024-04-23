<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:25:39
  from 'C:\xampp\htdocs\CozyHome\prestashop\override\controllers\admin\templates\cart_rules\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661017f326aad3_57208922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6b71bd32b4802ebd0951fd4f842e157e58e361a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\override\\controllers\\admin\\templates\\cart_rules\\form.tpl',
      1 => 1711905891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:controllers/cart_rules/informations.tpl' => 1,
    'file:cart_rules/conditions.tpl' => 1,
    'file:controllers/cart_rules/actions.tpl' => 1,
    'file:cart_rules/combinations.tpl' => 1,
    'file:footer_toolbar.tpl' => 1,
  ),
),false)) {
function content_661017f326aad3_57208922 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel">
	<h3><i class="icon-tag"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cart rule','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
</h3>
	<div class="productTabs">
		<ul class="tab nav nav-tabs">
			<li class="tab-row">
				<a class="tab-page" id="cart_rule_link_informations" href="javascript:displayCartRuleTab('informations');"><i class="icon-info"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Information','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
</a>
			</li>
			<li class="tab-row">
				<a class="tab-page" id="cart_rule_link_conditions" href="javascript:displayCartRuleTab('conditions');"><i class="icon-random"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Conditions','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
</a>
			</li>
			<li class="tab-row">
				<a class="tab-page" id="cart_rule_link_actions" href="javascript:displayCartRuleTab('actions');"><i class="icon-wrench"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Actions','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
</a>
			</li>
            <li class="tab-row">
				<a class="tab-page" id="cart_rule_link_combinations" href="javascript:displayCartRuleTab('combinations');"><i class="icon-compress"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Combinations','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
</a>
			</li>
		</ul>
	</div>
	<form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentToken']->value,'html','UTF-8' ));?>
&amp;addcart_rule" id="cart_rule_form" class="form-horizontal" method="post">
		<?php if ($_smarty_tpl->tpl_vars['currentObject']->value->id) {?><input type="hidden" name="id_cart_rule" value="<?php echo intval($_smarty_tpl->tpl_vars['currentObject']->value->id);?>
" /><?php }?>
		<input type="hidden" id="currentFormTab" name="currentFormTab" value="informations" />
		<div id="cart_rule_informations" class="panel cart_rule_tab">
			<?php $_smarty_tpl->_subTemplateRender('file:controllers/cart_rules/informations.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
		<div id="cart_rule_conditions" class="panel cart_rule_tab">
			<?php $_smarty_tpl->_subTemplateRender('file:cart_rules/conditions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
		<div id="cart_rule_actions" class="panel cart_rule_tab">
			<?php $_smarty_tpl->_subTemplateRender('file:controllers/cart_rules/actions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
        <div id="cart_rule_combinations" class="panel cart_rule_tab">
			<?php $_smarty_tpl->_subTemplateRender('file:cart_rules/combinations.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
		<button type="submit" class="btn btn-default pull-right" name="submitAddcart_rule" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['table']->value,'html','UTF-8' ));?>
_form_submit_btn"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>

		</button>
		<!--<input type="submit" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save and stay','mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
" class="button" name="submitAddcart_ruleAndStay" id="" />-->
	</form>

	<?php echo '<script'; ?>
 type="text/javascript">
		var product_rule_groups_counter = <?php if ((isset($_smarty_tpl->tpl_vars['product_rule_groups_counter']->value))) {
echo intval($_smarty_tpl->tpl_vars['product_rule_groups_counter']->value);
} else { ?>0<?php }?>;
		var product_rule_counters = new Array();
		var currentToken = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentToken']->value,'html','UTF-8' ));?>
';
		var currentFormTab = '<?php if ((isset($_POST['currentFormTab']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_POST['currentFormTab'],'html','UTF-8' ));
} else { ?>informations<?php }?>';
		var currentText = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Now','js'=>1,'mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
';
		var closeText = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Done','js'=>1,'mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
';
		var timeOnlyTitle = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose Time','js'=>1,'mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
';
		var timeText = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Time','js'=>1,'mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
';
		var hourText = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hour','js'=>1,'mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
';
		var minuteText = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Minute','js'=>1,'mod'=>'etsdiscountcombinations'),$_smarty_tpl ) );?>
';

		var languages = new Array();
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language', false, 'k');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
			languages[<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['k']->value,'html','UTF-8' ));?>
] = {
				id_lang: <?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
,
				iso_code: '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8' ));?>
',
				name: '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['name'],'html','UTF-8' ));?>
'
			};
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		displayFlags(languages, <?php echo intval($_smarty_tpl->tpl_vars['id_lang_default']->value);?>
);

    <?php if ((isset($_smarty_tpl->tpl_vars['refresh_cart']->value))) {?>
      if (typeof window.parent.order_create !== "undefined") {
        window.parent.order_create.refreshCart();
      }
      window.parent.$.fancybox.close();
    <?php }?>

  <?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="themes/default/template/controllers/cart_rules/form.js"><?php echo '</script'; ?>
>
	<?php $_smarty_tpl->_subTemplateRender("file:footer_toolbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php }
}
