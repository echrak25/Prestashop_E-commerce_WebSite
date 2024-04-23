<?php
/* Smarty version 4.2.1, created on 2024-04-05 16:16:19
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_testimonial\views\templates\hook\home_reviews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661015c31906f8_99186123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4ace728aa3b046e1dda757fb99728e9c7398cf0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_testimonial\\views\\templates\\hook\\home_reviews.tpl',
      1 => 1689693710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661015c31906f8_99186123 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2114952622661015c316fe34_04971541';
if ($_smarty_tpl->tpl_vars['reviews']->value) {?>
    <div class="ets-ttn-home-reviews" <?php if ($_smarty_tpl->tpl_vars['ETS_TTN_BACKGROUND']->value) {?> style="background-image: url('<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('__PS_BASE_URI__') ? constant('__PS_BASE_URI__') : null))."img/ets_testimonial/".((string)(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_TTN_BACKGROUND']->value,'html','UTF-8' ))))), ENT_QUOTES, 'UTF-8');?>
')"<?php }?>>
        <h4 class="ets-ttn-follow-title align_<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_TTN_VARTICAL_TITLE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" <?php if ((isset($_smarty_tpl->tpl_vars['ETS_TTN_COLOR_TITLE']->value)) && $_smarty_tpl->tpl_vars['ETS_TTN_COLOR_TITLE']->value) {?>style="color:<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_TTN_COLOR_TITLE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
            <?php if ($_smarty_tpl->tpl_vars['ETS_TTN_TITLE']->value) {?>
                <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_TTN_TITLE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
<br />
            <?php }?>
        </h4>
    	<div id="ets-ttn-page_home_reviews" class="ets-ttn-list-reviews-slide total_items<?php echo htmlspecialchars((string) count($_smarty_tpl->tpl_vars['reviews']->value), ENT_QUOTES, 'UTF-8');?>
">
            <?php $_smarty_tpl->_assignInScope('count', 0);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reviews']->value, 'review');
$_smarty_tpl->tpl_vars['review']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['review']->value) {
$_smarty_tpl->tpl_vars['review']->do_else = false;
?>
                <div class="review-item">
                    <div class="ets-ttn-review-item">
                        <?php if ($_smarty_tpl->tpl_vars['review']->value['license'] || $_smarty_tpl->tpl_vars['review']->value['id_product'] || $_smarty_tpl->tpl_vars['review']->value['additional']) {?>
                            <div class="<?php if (($_smarty_tpl->tpl_vars['review']->value['license'] && $_smarty_tpl->tpl_vars['review']->value['id_product'])) {?> has_clicense_idproduct<?php } elseif ($_smarty_tpl->tpl_vars['review']->value['id_product'] || $_smarty_tpl->tpl_vars['review']->value['additional']) {?> has_id_product<?php } elseif (($_smarty_tpl->tpl_vars['review']->value['license'])) {?> has_license<?php }?>">
                                <?php if ($_smarty_tpl->tpl_vars['review']->value['license']) {?>
                                    <div class="license"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['review']->value['license'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['review']->value['id_product']) {?>
                                    <div class="product">
                                        <?php if ($_smarty_tpl->tpl_vars['review']->value['additional']) {?>
                                            <span class="additional">
                                                <img class="" src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_PS_TESTIMONIAL_IMG_') ? constant('_PS_TESTIMONIAL_IMG_') : null))."additional/".((string)(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['review']->value['additional'],'htmlall','UTF-8' ))))), ENT_QUOTES, 'UTF-8');?>
" />
                                            </span>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['review']->value['image']) {?>
                                            <span class="additional">
                                                <img class="" src="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['review']->value['image'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
                                            </span>    
                                        <?php }?>
                                        <div class="product-name"><a href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['review']->value['link_product'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['review']->value['product_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</a></div>
                                    </div>
                                <?php } elseif ($_smarty_tpl->tpl_vars['review']->value['additional']) {?>
                                    <div class="product">
                                        <span class="additional">
                                            <img class="" src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_PS_TESTIMONIAL_IMG_') ? constant('_PS_TESTIMONIAL_IMG_') : null))."additional/".((string)(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['review']->value['additional'],'htmlall','UTF-8' ))))), ENT_QUOTES, 'UTF-8');?>
" />
                                        </span>
                                    </div>
                                <?php }?>
                            </div>
                        <?php }?>
                        <div class="review-item-info">
                            <div class="review_avatar"
                                style="<?php if ($_smarty_tpl->tpl_vars['review']->value['avatar']) {?>
                                    background-image:url(<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_PS_TESTIMONIAL_IMG_') ? constant('_PS_TESTIMONIAL_IMG_') : null))."avatars/".((string)(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['review']->value['avatar'],'htmlall','UTF-8' ))))), ENT_QUOTES, 'UTF-8');?>
);
                                <?php } else { ?>
                                    background-image:url(<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_default_img']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
);
                                <?php }?>">
                            </div>
                            <div title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Average rating','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
" class="rate-review">
                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['review']->value['rate']+1 - (1) : 1-($_smarty_tpl->tpl_vars['review']->value['rate'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                    <?php if ($_smarty_tpl->tpl_vars['i']->value <= $_smarty_tpl->tpl_vars['review']->value['rate']) {?>
                                        <div class="star star_on">
                                            <svg width="23" height="23" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"/></svg>
                                        </div>
                                    <?php } else { ?>
                                        <div class="star star_pos star_on_<?php echo htmlspecialchars((string) 10-($_smarty_tpl->tpl_vars['i']->value-$_smarty_tpl->tpl_vars['review']->value['rate'])*intval(10), ENT_QUOTES, 'UTF-8');?>
">
                                            <svg width="23" height="23" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"/></svg>
                                        </div>
                                    <?php }?>
                                <?php }
}
?>
                                <?php if (Ceil($_smarty_tpl->tpl_vars['review']->value['rate']) < 5) {?>
                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (ceil($_smarty_tpl->tpl_vars['review']->value['rate'])+1) : ceil($_smarty_tpl->tpl_vars['review']->value['rate'])+1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = ceil($_smarty_tpl->tpl_vars['review']->value['rate'])+1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                        <div class="star">
                                            <svg width="23" height="23" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1201 1004l306-297-422-62-189-382-189 382-422 62 306 297-73 421 378-199 377 199zm527-357q0 22-26 48l-363 354 86 500q1 7 1 20 0 50-41 50-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"/></svg>
                                        </div>
                                    <?php }
}
?>
                                <?php }?>
                                <?php if (Ceil($_smarty_tpl->tpl_vars['review']->value['rate']) != $_smarty_tpl->tpl_vars['review']->value['rate']) {?>
                                    <div class="star">
                                        <svg width="23" height="23" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1201 1004l306-297-422-62-189-382-189 382-422 62 306 297-73 421 378-199 377 199zm527-357q0 22-26 48l-363 354 86 500q1 7 1 20 0 50-41 50-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"/></svg>
                                    </div>
                                <?php }?>                                      
                            </div>
                            <div class="testimonial_des">
                                <?php echo nl2br($_smarty_tpl->tpl_vars['review']->value['testimonial']);?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['ETS_TTN_COLOR_BUTTON']->value)) && $_smarty_tpl->tpl_vars['ETS_TTN_COLOR_BUTTON']->value) {?>
        
        <style type="text/css">
            .ets-ttn-list-reviews-slide .slick-dots button{
                border-color: <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_TTN_COLOR_BUTTON']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important;
            }
            .ets-ttn-list-reviews-slide .slick-dots li.slick-active button{
                background-color: <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_TTN_COLOR_BUTTON']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 !important
            }
        </style>
        
        <?php }?>
    </div>
<?php }
}
}
