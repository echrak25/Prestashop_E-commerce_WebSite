<?php
/**
 * Smartsupp Live Chat integration module.
 *
 * @author    Smartsupp <vladimir@smartsupp.com>
 * @copyright 2016 Smartsupp.com
 * @license   GPL-2.0+
 * @package   Smartsupp
 * @link      http://www.smartsupp.com
 *
 * Plugin Name:       Smartsupp Live Chat
 * Plugin URI:        http://www.smartsupp.com
 * Description:       Adds Smartsupp Live Chat code to PrestaShop.
 * Version:           2.2.0
 * Text Domain:       smartsupp
 * Author:            Smartsupp
 * Author URI:        http://www.smartsupp.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

use Smartsupp\LiveChat\Utility\VersionUtility;

/**
 * @param Module $module
 *
 * @return bool
 */
function upgrade_module_2_2_0($module)
{
    if (VersionUtility::isPsVersionGreaterThan('1.6')) {
        $module->registerHook('displayBackOfficeHeader');
        $module->unregisterHook('backOfficeHeader');
    }

    return true;
}
