<?php
/* Smarty version 4.2.1, created on 2024-04-03 22:06:03
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\prestaheroconnect\views\templates\hook\include\theme_card_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_660dc4bb567ea7_73434916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04e9c3665a589622d22e6b485043c0568e41c5b7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\prestaheroconnect\\views\\templates\\hook\\include\\theme_card_item.tpl',
      1 => 1709129664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dc4bb567ea7_73434916 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['item']->value['image'])) && $_smarty_tpl->tpl_vars['item']->value['image']) {?>
    <a class="module_themeimage" href="<?php if ((isset($_smarty_tpl->tpl_vars['item']->value['uri']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['uri'],'quotes','UTF-8' ));?>
&utm_medium=image<?php }?>" target="_blank">
        <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['image'],'html','UTF-8' ));?>
" />
    </a>
<?php }?>
<div class="module-card-item theme-card-item" data-theme="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
" data-product-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['id_product'],'html','UTF-8' ));?>
"
     data-display-name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['display_name'],'html','UTF-8' ));?>
" data-uri="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['uri'],'quotes','UTF-8' ));?>
">
    <div class="item-wrapper">
        <div class="module-img"<?php if (!$_smarty_tpl->tpl_vars['item']->value['logo']) {?> style="background-color: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['img_color'],'html','UTF-8' ));?>
"<?php }?>>
            <a href="<?php if ((isset($_smarty_tpl->tpl_vars['item']->value['uri']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['uri'],'quotes','UTF-8' ));?>
&utm_medium=logo<?php }?>" target="_blank">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['logo']) {?>
                <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['logo'],'quotes','UTF-8' ));?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
">
            <?php } else { ?>
                <div class="img-fancy" style="background-color: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['img_color'],'html','UTF-8' ));?>
">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['first_char'],'html','UTF-8' ));?>

                </div>
            <?php }?>
            </a>
        </div>
        <h3 class="module-name"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['display_name'],'html','UTF-8' ));?>
</h3>
        <div class="module-entry-data">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['version']) {?>
                <span>v<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['version'],'html','UTF-8' ));?>
</span>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['manufacturer_name']) {?>
                -
                <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'by','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</span>
                <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['manufacturer_name'],'html','UTF-8' ));?>
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
            <div class="module-footer footer-action-module js-ph-con-group-btn-action" data-theme="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'html','UTF-8' ));?>
">
                <?php if ($_smarty_tpl->tpl_vars['item']->value['is_installed'] && !$_smarty_tpl->tpl_vars['item']->value['to_upgrade']) {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['store_url'];?>
" target="_blank" class="btn btn-default js-btn-view-store"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View store','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</a>
                <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['to_upgrade']) {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['uri'];?>
" target="_blank" class="btn btn-default js-btn-view-store"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upgrade theme','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</a>
                <?php } else { ?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['uri'];?>
&utm_medium=buynow" target="_blank" class="btn btn-default js-btn-buy-module"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download from PrestaHero','mod'=>'prestaheroconnect'),$_smarty_tpl ) );?>
</a>
                <?php }?>
            </div>
        </div>
    </div>
</div><?php }
}
