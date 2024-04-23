<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:11:08
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\prestaheroconnect\views\templates\hook\include\module_card_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6610148c59ed88_70867955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f032c512f4b879f4d8d53b2e12d2a6c948f593a5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\prestaheroconnect\\views\\templates\\hook\\include\\module_card_item.tpl',
      1 => 1709129664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./modal_confirm_action.tpl' => 1,
  ),
),false)) {
function content_6610148c59ed88_70867955 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\CozyHome\\prestashop\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>

<div class="module-card-item<?php if ((isset($_smarty_tpl->tpl_vars['item']->value['support_module'])) && $_smarty_tpl->tpl_vars['item']->value['support_module']) {?> support_module<?php }?>" data-module="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
"
     data-product-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id_product'],'html','UTF-8' ));?>
"
     data-can-download="<?php if (!$_smarty_tpl->tpl_vars['item']->value['is_installed'] && $_smarty_tpl->tpl_vars['item']->value['to_buy']) {?>1<?php } else { ?>0<?php }?>"
     data-display-name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['displayName'],'html','UTF-8' ));?>
"
     data-can-install-from-server="<?php if (!$_smarty_tpl->tpl_vars['item']->value['price_number']) {?>1<?php } else { ?>0<?php }?>"
     data-uri="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['uri'],'quotes','UTF-8' ));?>
" 
>
    <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['is_must_have'])) && $_smarty_tpl->tpl_vars['item']->value['is_must_have']) {?>
        <span class="module-must-have"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Must-have','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</span>
    <?php }?>
    <div class="item-wrapper">
        <div class="module-img"<?php if (!$_smarty_tpl->tpl_vars['item']->value['logo']) {?> style="background-color: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['img_color'],'html','UTF-8' ));?>
"<?php }?>>
            <a href="<?php if ((isset($_smarty_tpl->tpl_vars['item']->value['uri']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['uri'],'quotes','UTF-8' ));?>
&utm_medium=logo<?php }?>" target="_blank">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['logo']) {?>
                <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['logo'],'quotes','UTF-8' ));?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
" />
            <?php } else { ?>
                <div class="img-fancy" style="background-color: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['img_color'],'html','UTF-8' ));?>
">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['first_char'],'html','UTF-8' ));?>

                </div>
            <?php }?>
            </a>
        </div>
        <h3 class="module-name"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['displayName'],'html','UTF-8' ));?>
</h3>
        <div class="module-entry-data">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['old_version']) {?>
                <span class="old_version" data-arow="→">v<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['old_version'],'html','UTF-8' ));?>
 </span>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['version']) {?>
                <span>v<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['version'],'html','UTF-8' ));?>
</span>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['author']) {?>
                -
                <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'by','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</span>
                <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['author'],'html','UTF-8' ));?>
</span>
            <?php }?>
        </div>
        <div class="module-desc">
            <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['description'],'html','UTF-8' ));?>
</span>
            <div class="extra-action">
                <a href="<?php if ((isset($_smarty_tpl->tpl_vars['item']->value['uri']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['uri'],'quotes','UTF-8' ));?>
&utm_medium=readmore<?php }?>" target="_blank"
                   class="module-read-more"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read more','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</a>
            </div>
        </div>

        <div class="module-badges">
        </div>
        <div class="module-pos-bottom">
            <div class="module-compliancy">
                <?php if (((isset($_smarty_tpl->tpl_vars['item']->value['min_ps_version'])) && $_smarty_tpl->tpl_vars['item']->value['min_ps_version']) || ((isset($_smarty_tpl->tpl_vars['item']->value['max_ps_version'])) && $_smarty_tpl->tpl_vars['item']->value['max_ps_version'])) {?>
                    <i class="ets_connect_ps_icon"></i>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Compatible with: ','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                    <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['compatibility'])) && $_smarty_tpl->tpl_vars['item']->value['compatibility']) {?>
                        <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['compatibility'],'html','UTF-8' ));?>
</span>
                    <?php } else { ?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['min_ps_version'])) && $_smarty_tpl->tpl_vars['item']->value['min_ps_version']) {?>
                            <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['min_ps_version'],'html','UTF-8' ));?>
</span>
                        <?php } elseif ((isset($_smarty_tpl->tpl_vars['item']->value['max_ps_version'])) && $_smarty_tpl->tpl_vars['item']->value['max_ps_version']) {?>
                            <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['max_ps_version'],'html','UTF-8' ));?>
</span>
                        <?php }?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['max_ps_version'])) && $_smarty_tpl->tpl_vars['item']->value['max_ps_version']) {?>
                            <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['min_ps_version'])) && $_smarty_tpl->tpl_vars['item']->value['min_ps_version']) {?>
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'to','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['max_ps_version'],'html','UTF-8' ));?>
</span>
                            <?php } else { ?>
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'and lower','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                            <?php }?>
                        <?php } else { ?>
                            <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['min_ps_version'])) && $_smarty_tpl->tpl_vars['item']->value['min_ps_version']) {?>
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'and higher','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                            <?php }?>
                        <?php }?>
                    <?php }?>
                <?php } else { ?>
                    <span><i class="ets_connect_ps_icon"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Compatible with: 1.4.x to 1.7.x','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</span>
                <?php }?>
            </div>
            <div class="module-line"></div>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['avg_rating'] != 0) {?>
                <div class="module-rating">
                    <div class="avg-rating">
                        <span class="rating-star" data-avg-rating="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['avg_rating'],'html','UTF-8' ));?>
"></span>
                    </div>
                    <div class="total-rating">(<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['total_rating'],'html','UTF-8' ));?>
)</div>
                </div>
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['price']))) {?>
                <div class="module-price-wrapper">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['reduction'] && $_smarty_tpl->tpl_vars['item']->value['price_number'] > 0) {?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['price_without_reduction']) {?>
                            <div class="module-price-without-reduction"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['price_without_reduction'],'html','UTF-8' ));?>
</div>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['reduction']) {?>
                            <div class="module-price-reduction"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['reduction'],'html','UTF-8' ));?>
</div>
                        <?php }?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['price_number'] > 0) {?>
                        <div class="module-price"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['price'],'html','UTF-8' ));?>
</div>
                    <?php } else { ?>
                        <div class="module-price"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Free Download','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</div>
                    <?php }?>
                </div>
            <?php }?>
            <div class="module-footer footer-action-module js-ph-con-group-btn-action"
                 data-module="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
"
                 data-install-link="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['install'],'quotes','UTF-8' ));?>
"
                 data-delete-link="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['delete'],'quotes','UTF-8' ));?>
"
            >
                <?php if ($_smarty_tpl->tpl_vars['item']->value['is_installed']) {?>
                    <div class="btn-group module-actions">
                        <?php if (!$_smarty_tpl->tpl_vars['item']->value['is_enabled']) {?>
                            <form class="" method="post"
                                  action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['enable'],'quotes','UTF-8' ));?>
">
                                <button type="submit" class="btn dropdown-item module_action_menu_enable"
                                        data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-enable">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enable','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                </button>
                            </form>
                        <?php } else { ?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['to_upgrade'] || $_smarty_tpl->tpl_vars['item']->value['upgrade_from_server']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['upgrade_from_server']) {?>
                                    <form class="form_upgrade_from_ph" method="post"
                                          action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['upgrade_ph'],'quotes','UTF-8' ));?>
">
                                        <button type="submit"
                                                class="btn btn-primary-reverse btn-outline-primary module_action_menu_upgrade upgrade_from_ph"
                                                data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-upgrade">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upgrade','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                        </button>
                                    </form>
                                <?php } else { ?>
                                    <form class="" method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['upgrade'],'quotes','UTF-8' ));?>
">
                                        <button type="submit"
                                                class="btn btn-primary-reverse btn-outline-primary module_action_menu_upgrade"
                                                data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-upgrade">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upgrade','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                        </button>
                                    </form>
                                <?php }?>
                            <?php } else { ?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['is_configurable']) {?>
                                    <a class="btn btn-primary-reverse btn-outline-primary"
                                       href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['configure'],'quotes','UTF-8' ));?>
">
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configure','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                    </a>
                                <?php } else { ?>
                                    <form class="" method="post"
                                          action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['disable'],'quotes','UTF-8' ));?>
">
                                        <button type="submit" class="btn dropdown-item module_action_menu_disable"
                                                data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-disable">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disable','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                        </button>
                                    </form>
                                <?php }?>
                            <?php }?>

                        <?php }?>

                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php if (($_smarty_tpl->tpl_vars['item']->value['to_upgrade'] || $_smarty_tpl->tpl_vars['item']->value['upgrade_from_server'] || !$_smarty_tpl->tpl_vars['item']->value['is_enabled']) && $_smarty_tpl->tpl_vars['item']->value['is_configurable']) {?>
                                <li>
                                    <a class="dropdown-item" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['configure'],'quotes','UTF-8' ));?>
">
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configure','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                    </a>
                                </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['is17']->value) {?>
                                <li>
                                    <form class="" method="post"
                                          action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['uninstall'],'quotes','UTF-8' ));?>
">
                                        <button type="submit" class="dropdown-item module_action_menu_uninstall"
                                                data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-uninstall">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Uninstall','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                        </button>
                                    </form>
                                </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['is_enabled']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['to_upgrade'] || $_smarty_tpl->tpl_vars['item']->value['upgrade_from_server'] || $_smarty_tpl->tpl_vars['item']->value['is_configurable']) {?>
                                    <li>
                                        <form class="" method="post"
                                              action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['disable'],'quotes','UTF-8' ));?>
">
                                            <button type="submit" class="dropdown-item module_action_menu_disable"
                                                    data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-disable">
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disable','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                            </button>
                                        </form>
                                    </li>
                                <?php }?>
                            <?php } else { ?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['is_enabled'] && ($_smarty_tpl->tpl_vars['item']->value['to_upgrade'] || $_smarty_tpl->tpl_vars['item']->value['upgrade_from_server'] || $_smarty_tpl->tpl_vars['item']->value['is_configurable'])) {?>
                                    <li>
                                        <form class="" method="post"
                                              action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['enable'],'quotes','UTF-8' ));?>
">
                                            <button type="submit" class="dropdown-item module_action_menu_enable"
                                                    data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-enable">
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enable','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                            </button>
                                        </form>
                                    </li>
                                <?php }?>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['is_enabled']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['is_enabled_mobile']) {?>
                                    <li>
                                        <form class="" method="post"
                                              action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['disable_mobile'],'quotes','UTF-8' ));?>
">
                                            <button type="submit"
                                                    class="dropdown-item module_action_menu_disable_mobile"
                                                    data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-disable_mobile">
                                                <?php if (!$_smarty_tpl->tpl_vars['is17']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disable on mobiles','mod'=>'prestaheroconnect'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disable mobile','mod'=>'prestaheroconnect'),$_smarty_tpl ) );
}?>
                                            </button>
                                        </form>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <form class="" method="post"
                                              action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['enable_mobile'],'quotes','UTF-8' ));?>
">
                                            <button type="submit" class="dropdown-item module_action_menu_enable_mobile"
                                                    data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-enable_mobile">
                                                <?php if (!$_smarty_tpl->tpl_vars['is17']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Display on mobiles','mod'=>'prestaheroconnect'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enable mobile','mod'=>'prestaheroconnect'),$_smarty_tpl ) );
}?>
                                            </button>
                                        </form>
                                    </li>
                                <?php }?>
                                <?php if (!$_smarty_tpl->tpl_vars['is17']->value) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['is_enabled_tablet']) {?>
                                        <li>
                                            <form class="" method="post"
                                                  action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['disable_tablet'],'quotes','UTF-8' ));?>
">
                                                <button type="submit"
                                                        class="dropdown-item module_action_menu_disable_tablet"
                                                        data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-disable_tablet">
                                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disable on tablets','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                                </button>
                                            </form>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <form class="" method="post"
                                                  action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['enable_mobile'],'quotes','UTF-8' ));?>
">
                                                <button type="submit"
                                                        class="dropdown-item module_action_menu_enable_mobile"
                                                        data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-enable_mobile">
                                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Display on tablets','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                                </button>
                                            </form>
                                        </li>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['is_enabled_desktop']) {?>
                                        <li>
                                            <form class="" method="post"
                                                  action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['disable_desktop'],'quotes','UTF-8' ));?>
">
                                                <button type="submit"
                                                        class="dropdown-item module_action_menu_disable_desktop"
                                                        data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-disable_desktop">
                                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disable on computers','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                                </button>
                                            </form>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <form class="" method="post"
                                                  action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['enable_desktop'],'quotes','UTF-8' ));?>
">
                                                <button type="submit"
                                                        class="dropdown-item module_action_menu_disable_desktop"
                                                        data-confirm_modal="">
                                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Display on desktop','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                                </button>
                                            </form>
                                        </li>
                                    <?php }?>
                                <?php }?>
                                <?php if (!$_smarty_tpl->tpl_vars['is17']->value) {?>
                                    <li>
                                        <form class="" method="post"
                                              action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['uninstall'],'quotes','UTF-8' ));?>
">
                                            <button type="submit" class="dropdown-item module_action_menu_uninstall"
                                                    data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-uninstall">
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Uninstall','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                            </button>
                                        </form>
                                    </li>
                                <?php }?>
                                <li>
                                    <form class="" method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['reset'],'quotes','UTF-8' ));?>
">
                                        <button type="submit" class="dropdown-item module_action_menu_reset"
                                                data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-reset">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reset','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                        </button>
                                    </form>
                                </li>
                            <?php }?>
                            <?php if (!$_smarty_tpl->tpl_vars['is17']->value) {?>
                                <li>
                                    <form class="" method="post"
                                          action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['delete'],'quotes','UTF-8' ));?>
">
                                        <button type="submit" class="dropdown-item module_action_menu_delete"
                                                data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-delete">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                        </button>
                                    </form>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                <?php } else { ?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['to_buy']) {?>
                        <?php if (!$_smarty_tpl->tpl_vars['item']->value['price_number']) {?>
                            <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['support_module'])) && $_smarty_tpl->tpl_vars['item']->value['support_module']) {?>
                                <button type="submit"
                                        class="btn btn-primary-reverse btn-outline-primary support_module module_action_menu_install js-btn-buy-module"
                                        data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-install">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Install','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                </button>
                            <?php } else { ?>
                                <a href="#" data-module="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
"
                                   data-product-id="<?php if ((isset($_smarty_tpl->tpl_vars['item']->value['id_product']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id_product'],'html','UTF-8' ));
}?>"
                                   class="btn btn-default js-ph-con-install-module-from-server"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Install from PrestaHero','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</a>
                            <?php }?>
                        <?php } else { ?>
                            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['uri'],'quotes','UTF-8' ));?>
&utm_medium=buynow" target="_blank"
                               class="btn btn-default js-btn-buy-module"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Buy now','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</a>
                        <?php }?>

                    <?php } else { ?>
                        <div class="btn-group module-actions">
                            <form class="" method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['install'],'quotes','UTF-8' ));?>
">
                                <button type="submit"
                                        class="btn btn-primary-reverse btn-outline-primary module_action_menu_install"
                                        data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-install">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Install','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                </button>
                            </form>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <form class="" method="post"
                                          action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['actions']['delete'],'quotes','UTF-8' ));?>
">
                                        <button type="submit" class="dropdown-item module_action_menu_delete"
                                                data-confirm_modal="module-modal-confirm-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
-delete">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>

                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php }?>
                <?php }?>
            </div>
            <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['support_module'])) && $_smarty_tpl->tpl_vars['item']->value['support_module']) {?>
                <div class="ph-con-support-module-overload">
                    <div class="table">
                        <div class="table-cell">
                            <div class="ph-con-wrapper">
                                <span class="ph-con-close-popup"></span>
                                <div class="ph_con_support_module">
                                    <h3 class="title-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Install module','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</h3>
                                    <div class="ph_con_support_module_des">Choose a method to install your selected module.</div>
                                    <?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['item']->value['support_module'],'@productId@',$_smarty_tpl->tpl_vars['item']->value['id_product']),'@moduleName@',$_smarty_tpl->tpl_vars['item']->value['name']);?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>

    </div>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['actionConfirm']->value, 'action');
$_smarty_tpl->tpl_vars['action']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->do_else = false;
?>
        <?php $_smarty_tpl->_subTemplateRender('file:./modal_confirm_action.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('action'=>$_smarty_tpl->tpl_vars['action']->value,'module'=>$_smarty_tpl->tpl_vars['item']->value), 0, true);
?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}
