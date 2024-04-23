<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:11:08
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\prestaheroconnect\views\templates\hook\list_modules.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6610148c533a72_60773124',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '534b351b0626c504cd64ff3fe3fc7ca603548988' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\prestaheroconnect\\views\\templates\\hook\\list_modules.tpl',
      1 => 1709129664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./include/module_card_item.tpl' => 1,
    'file:./include/theme_card_item.tpl' => 1,
  ),
),false)) {
function content_6610148c533a72_60773124 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="ph-con-list-modules">
    <div class="container">
        <div class="ph-con-header-des">
            <?php if ($_smarty_tpl->tpl_vars['phLogo']->value) {?>
            <a href="https://prestahero.com/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['requestLang']->value,'quotes','UTF-8' ));?>
/?utm_medium=prestaheroconnect" target="_blank"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['phLogo']->value,'quotes','UTF-8' ));?>
" class="ph-con-logo-lg"/></a>
            <?php }?>
            <div class="desc"><?php echo $_smarty_tpl->tpl_vars['phDesc']->value;?>
</div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['alertNoConnect']->value) {?>
            <?php echo $_smarty_tpl->tpl_vars['alertNoConnect']->value;?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['notificationType']->value && $_smarty_tpl->tpl_vars['notificationContent']->value) {?>
            <div class="ph-con-notification">
                <div class="alert alert-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['notificationType']->value,'html','UTF-8' ));?>
">
                    <?php echo $_smarty_tpl->tpl_vars['notificationContent']->value;?>

                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['phModules']->value) {?>
        <div class="ph-con-list-tabs">
            <ul class="list-tabs">
                <li class="active">
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="all"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All modules','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        <span class="nb_module_all">(<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moduleCounter']->value['all'],'html','UTF-8' ));?>
)</span></a>
                </li>
                <?php if ($_smarty_tpl->tpl_vars['moduleCounter']->value['to_upgrade']) {?>
                <li>
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="to_upgrade"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To upgrade','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        (<span class="nb_module_upgrade"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moduleCounter']->value['to_upgrade'],'html','UTF-8' ));?>
</span>)</a>
                </li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['moduleCounter']->value['must_have']) {?>
                <li>
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="must_have"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Must-have','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        (<span class="nb_module_must_have"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moduleCounter']->value['must_have'],'html','UTF-8' ));?>
</span>)</a>
                </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['moduleCounter']->value['installed']) {?>
                <li>
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="installed"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Installed','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        (<span class="nb_module_installed"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moduleCounter']->value['installed'],'html','UTF-8' ));?>
</span>)</a>
                </li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['moduleCounter']->value['free']) {?>
                <li>
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="free"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Free modules','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        (<span class="nb_module_free"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moduleCounter']->value['free'],'html','UTF-8' ));?>
</span>)</a>
                </li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['moduleCounter']->value['theme']) {?>
                    <li>
                        <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                           data-tab="theme"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Themes','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                            (<span class="nb_theme_all"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moduleCounter']->value['theme'],'html','UTF-8' ));?>
</span>)</a>
                    </li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['moduleCounter']->value['downloaded']) {?>
                    <li>
                        <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                           data-tab="downloaded"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Downloaded','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                            (<span class="nb_module_downloaded"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moduleCounter']->value['downloaded'],'html','UTF-8' ));?>
</span>)</a>
                    </li>
                <?php }?>
                <li class="hide">
                    <a href="javascript:void(0)" class="tab-item js-ph-con-tab-item"
                       data-tab="purchased"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Purchased','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                        (<span class="nb_module_purchased">0</span>)</a>
                </li>
            </ul>
            <div class="ph-con-list-search">
                <div class="ph-con-list-search-form">
                    <input type="text" id="ph-con-box-search-module" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search for modules or themes','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
"/>
                    <button class="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <div class="wrapper-content">
        
            <div class="container ph-con-list-content-modules" data-active="all">
            <?php if ($_smarty_tpl->tpl_vars['phModules']->value) {?>
                <div class="row">
                
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['phModules']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['is_module'])) && intval($_smarty_tpl->tpl_vars['item']->value['is_module']) > 0) {?>
                        <div class="col-lg-3 col-md-4 col-xs-6 ph-con-list-modules-item<?php if ($_smarty_tpl->tpl_vars['item']->value['is_must_have']) {?> must_have<?php }
if (!$_smarty_tpl->tpl_vars['item']->value['to_buy']) {?> downloaded<?php }
if ($_smarty_tpl->tpl_vars['item']->value['is_installed'] && ($_smarty_tpl->tpl_vars['item']->value['to_upgrade'] || $_smarty_tpl->tpl_vars['item']->value['upgrade_from_server'])) {?> to_upgrade<?php }?>
                            <?php if (!$_smarty_tpl->tpl_vars['item']->value['price_number']) {?> free<?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['is_installed']) {?> installed<?php }?>
                        ">
                            <?php $_smarty_tpl->_subTemplateRender('file:./include/module_card_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('item'=>$_smarty_tpl->tpl_vars['item']->value), 0, true);
?>
                        </div>
                        <?php } else { ?>
                            <div class="col-lg-3 col-md-4 col-xs-6 ph-con-list-modules-item ph-con-list-themes-item theme">
                                <?php $_smarty_tpl->_subTemplateRender('file:./include/theme_card_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('item'=>$_smarty_tpl->tpl_vars['item']->value), 0, true);
?>
                            </div>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <div class="alert alert-warning hide ph-con-not-found-item"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No items found','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</div>
                    
                </div>
                <?php } else { ?>
                    <div class="alert alert-info "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No module available','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</div>
            <?php }?>
            </div>
        
            
    </div>
</div>
<?php }
}
