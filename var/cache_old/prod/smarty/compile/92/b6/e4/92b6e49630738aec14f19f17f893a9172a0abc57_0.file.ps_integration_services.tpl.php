<?php
/* Smarty version 4.2.1, created on 2024-04-03 19:53:04
  from 'C:\xampp\htdocs\CozyHome\prestashop\modules\wizardai\views\templates\admin\ps_integration_services.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_660da5909e6c04_24948113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92b6e49630738aec14f19f17f893a9172a0abc57' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CozyHome\\prestashop\\modules\\wizardai\\views\\templates\\admin\\ps_integration_services.tpl',
      1 => 1707236044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660da5909e6c04_24948113 (Smarty_Internal_Template $_smarty_tpl) {
?><prestashop-accounts></prestashop-accounts>
<br>
<div id="prestashop-cloudsync"></div>

<div id="ps-billing"></div>
<div id="ps-modal"></div>
<div id="ps-billing-invoice"></div>

<?php echo '<script'; ?>
 src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['urlAccountsCdn']->value,'htmlall','UTF-8' ));?>
" rel=preload><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['urlCloudsync']->value,'htmlall','UTF-8' ));?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['urlBilling']->value,'htmlall','UTF-8' ));?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    window?.psaccountsVue?.init();

    if(window.psaccountsVue.isOnboardingCompleted() != true)
    {
        document.getElementById("module-config").style.opacity = "0.5";
    }

    // Cloud Sync
    const cdc = window.cloudSyncSharingConsent;

    cdc.init('#prestashop-cloudsync');
    cdc.on('OnboardingCompleted', (isCompleted) => {
        console.log('OnboardingCompleted', isCompleted);

    });
    cdc.isOnboardingCompleted((isCompleted) => {
        console.log('Onboarding is already Completed', isCompleted);
    });


    window.psBilling.initialize(window.psBillingContext.context, '#ps-billing', '#ps-modal', (type, data) => {
        // Event hook listener
        switch (type) {
            case window.psBilling.EVENT_HOOK_TYPE.BILLING_INITIALIZED:
                console.log('Billing initialized', data);
                break;
            case window.psBilling.EVENT_HOOK_TYPE.SUBSCRIPTION_UPDATED:
                console.log('Sub updated', data);
                break;
            case window.psBilling.EVENT_HOOK_TYPE.SUBSCRIPTION_CANCELLED:
                console.log('Sub cancelled', data);
                break;
        }
    });

    window.psBilling.initializeInvoiceList(
        window.psBillingContext.context,
        "#ps-billing-invoice"
    );
<?php echo '</script'; ?>
>

<br>
<?php }
}
