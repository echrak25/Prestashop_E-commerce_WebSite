{**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 *}
<prestashop-accounts></prestashop-accounts>
<br>
<div id="prestashop-cloudsync"></div>

<div id="ps-billing"></div>
<div id="ps-modal"></div>
<div id="ps-billing-invoice"></div>

<script src="{$urlAccountsCdn|escape:'htmlall':'UTF-8'}" rel=preload></script>
<script src="{$urlCloudsync|escape:'htmlall':'UTF-8'}"></script>
<script src="{$urlBilling|escape:'htmlall':'UTF-8'}"></script>
<script>
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
</script>

<br>
