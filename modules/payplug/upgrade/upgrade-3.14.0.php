<?php
/**
 * 2013 - 2024 Payplug SAS.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0).
 * It is available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to contact@payplug.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Payplug module to newer
 * versions in the future.
 *
 * @author    Payplug SAS
 * @copyright 2013 - 2024 Payplug SAS
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * International Registered Trademark & Property of Payplug SAS
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_3_14_0()
{
    $flag = true;

    // Update PayPlug configuration variable `show` to `enable`
    $flag = $flag && Configuration::updateValue(
        'PAYPLUG_ENABLE',
        Configuration::get('PAYPLUG_SHOW')
    );
    $flag = $flag && Configuration::DeleteByName('PAYPLUG_SHOW');

    $embedded_mode = Configuration::get('PAYPLUG_EMBEDDED_MODE');
    if ('redirected' == $embedded_mode) {
        $flag = $flag && Configuration::updateValue(
            'PAYPLUG_EMBEDDED_MODE',
            'redirect'
        );
    }

    return $flag;
}
