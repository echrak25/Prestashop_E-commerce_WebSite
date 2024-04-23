<?php
/* Smarty version 4.2.1, created on 2024-04-16 22:41:06
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\ets_trackingcustomer\views\templates\hook\analystic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_661ef072dc8d69_17825747',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '640bdc0b47e503f3e157e97f8042594b05fe9ee6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\ets_trackingcustomer\\views\\templates\\hook\\analystic.tpl',
      1 => 1711800445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661ef072dc8d69_17825747 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ets_tc_module_dir']->value,'html','UTF-8' ));?>
views/js/chart.min.js"><?php echo '</script'; ?>
>
<div class="tc_analytic_wapper">
    <div class="row">
        <ul class="tc_admin_filter_session">
            <li class="tc_filter filter_day" data-filter="day"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Day','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</li>
            <li class="tc_filter filter_day_1" data-filter="day_1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Day-1','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</li>
            <li class="tc_filter filter_month active" data-filter="month"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Month','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</li>
            <li class="tc_filter filter_month_1" data-filter="month_1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Month-1','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</li>
            <li class="tc_filter filter_from_to" data-filter="from_to">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="input-group">
                        <span class="input-group-addon"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</span>
                            <input id="filter_from_date" class="datetimepicker input-medium" name="filter_from_date" value="" type="text" autocomplete="off" />
                            <span class="input-group-addon">
                                <i class="icon-calendar-empty"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="input-group">
                        <span class="input-group-addon"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</span>
                            <input id="filter_to_date" class="datetimepicker input-medium" name="filter_to_date" value="" type="text" autocomplete="off" />
                            <span class="input-group-addon">
                                <i class="icon-calendar-empty"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-default" name="btnFilterAnalytic"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Filter','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 tc_chart_session_traffic">
            <div class="card chart_session_traffic">
                <h3 class="card-header"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Session traffic','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</h3>
                <div class="card-body">
                    <canvas  id="chartSessionTraffic" style="height: 300px; width: 100%;"></canvas >
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card top-visit-page">
                <h3 class="card-header"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Top visit pages','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</h3>
                <span class="panel-heading-action">
                    <select class="form-control" name="filter_visit_page_by_customer" data-filter='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['filter_action']->value,'html','UTF-8' ));?>
'>
                        <option  value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All users','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <?php if (Module::isEnabled('ets_free_downloads')) {?>
                            <option  value="is_verified"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Verified customers','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <?php }?>
                        <option  value="is_registered"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Registered customers','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <option  value="is_visitors"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Visitors','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <option  value="place_order"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Place order','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                    </select>
                </span>
                <div class="card-body">
                    <?php echo $_smarty_tpl->tpl_vars['top_visit_page']->value;?>

                </div>
            </div>
            <div class="card top-action">
                <h3 class="card-header">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Top actions','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                </h3>
                <span class="panel-heading-action ">
                    <select class="form-control" name="filter_actions" data-filter='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['filter_action']->value,'html','UTF-8' ));?>
'>
                        <option  value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All users','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <?php if (Module::isEnabled('ets_free_downloads')) {?>
                            <option  value="is_verified"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Verified customers','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <?php }?>
                        <option  value="is_registered"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Registered customers','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <option  value="is_visitors"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Visitors','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <option  value="place_order"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Place order','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                    </select>
                </span>
                <div class="card-body">
                    <?php echo $_smarty_tpl->tpl_vars['top_action']->value;?>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card top-customer">
                <h3 class="card-header">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Top customers by actions','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>

                </h3>
                <span class="panel-heading-action">
                    <select class="form-control" name="filter_customer_by_action" data-filter='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['filter_action']->value,'html','UTF-8' ));?>
'>
                        <option  value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All actions','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <?php echo $_smarty_tpl->tpl_vars['select_list_actions']->value;?>

                    </select>
                    <select class="form-control" name="filter_customer" data-filter='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['filter_action']->value,'html','UTF-8' ));?>
'>
                        <option  value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All users','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <?php if (Module::isEnabled('ets_free_downloads')) {?>
                            <option  value="is_verified"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Verified customers','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <?php }?>
                        <option  value="is_registered"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Registered customers','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <option  value="is_visitors"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Visitors','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <option  value="place_order"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Place order','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                    </select>
                </span>
                <div class="card-body">
                    <?php echo $_smarty_tpl->tpl_vars['top_customer_by_action']->value;?>

                </div>
            </div>
            <div class="card top-customer-insight">
                <h3 class="card-header"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customer insights','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</h3>
                <span class="panel-heading-action">
                    <select class="form-control" name="filter_insights" data-filter='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['filter_action']->value,'html','UTF-8' ));?>
'>
                        <option  value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All users','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <?php if (Module::isEnabled('ets_free_downloads')) {?>
                            <option  value="is_verified"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Verified customers','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <?php }?>
                        <option  value="is_registered"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Registered customers','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <option  value="is_visitors"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Visitors','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                        <option  value="place_order"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Place order','mod'=>'ets_trackingcustomer'),$_smarty_tpl ) );?>
</option>
                    </select>
                </span>
                <div class="card-body">
                    <?php echo $_smarty_tpl->tpl_vars['top_insight']->value;?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>
$(document).ready(function(){
   $('.datetimepicker').datetimepicker({
				prevText: '',
				nextText: '',
				dateFormat: 'yy-mm-dd',
				currentText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Now','mod'=>'ets_trackingcustomer','js'=>1),$_smarty_tpl ) );?>
',
				closeText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Done','mod'=>'ets_trackingcustomer','js'=>1),$_smarty_tpl ) );?>
',
				ampm: false,
				amNames: ['AM', 'A'],
				pmNames: ['PM', 'P'],
				timeFormat: 'hh:mm:ss tt',
				timeSuffix: '',
				timeOnlyTitle: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose Time','mod'=>'ets_trackingcustomer','js'=>1),$_smarty_tpl ) );?>
',
				timeText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Time','mod'=>'ets_trackingcustomer','js'=>1),$_smarty_tpl ) );?>
',
				hourText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hour','mod'=>'ets_trackingcustomer','js'=>1),$_smarty_tpl ) );?>
',
				minuteText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Minute','mod'=>'ets_trackingcustomer','js'=>1),$_smarty_tpl ) );?>
',
                changeMonth:true,
                changeYear:true
			}); 
});
var session_datasets =<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( $_smarty_tpl->tpl_vars['session_datasets']->value ));?>
;
var chart_labels=[<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chart_labels']->value, 'data');
$_smarty_tpl->tpl_vars['data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->do_else = false;
?>'<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['data']->value,'html','UTF-8' ));?>
',<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>];
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ets_tc_module_dir']->value,'html','UTF-8' ));?>
views/js/analytic.js"><?php echo '</script'; ?>
><?php }
}
