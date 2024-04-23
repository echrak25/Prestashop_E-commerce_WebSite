<?php
/**
 * Smartsupp Live Chat integration module.
 *
 * @package   Smartsupp
 * @author    Smartsupp <vladimir@smartsupp.com>
 * @link      http://www.smartsupp.com
 * @copyright 2016 Smartsupp.com
 * @license   GPL-2.0+
 *
 * Plugin Name:       Smartsupp Live Chat
 * Plugin URI:        http://www.smartsupp.com
 * Description:       Adds Smartsupp Live Chat code to PrestaShop.
 * Version:           2.2.0
 * Author:            Smartsupp
 * Author URI:        http://www.smartsupp.com
 * Text Domain:       smartsupp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace Smartsupp\LiveChat\Utility;

class VersionUtility
{
    public static function isPsVersionGreaterThan($version)
    {
        return version_compare(_PS_VERSION_, $version, '>');
    }

    public static function isPsVersionGreaterOrEqualTo($version)
    {
        return version_compare(_PS_VERSION_, $version, '>=');
    }
}