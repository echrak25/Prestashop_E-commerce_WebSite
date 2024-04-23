<?php
/**
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
 */

use function CE\add_action;

if (!defined('_PS_VERSION_')) {
    exit;
}
class WizardElementor
{
    public function __construct()
    {
        $this->load_dependencies();
        $this->define_widgets();
    }

    private function load_dependencies()
    {
        /**
         * The class responsible for defining all widgets
         * side of the site.
         */
        require_once dirname(__FILE__) . '/WizardElementorWidgets.php';
    }

    private function define_widgets()
    {
        $plugin_widgets = new WizardElementorWidgets();

        $plugin_widgets->register_styles();
        $this->add_action('elementor/elements/categories_registered', $plugin_widgets, 'register_category');
        $this->add_action('elementor/widgets/widgets_registered', $plugin_widgets, 'register_widgets');
    }

    public function add_action($hook, $component, $callback)
    {
        add_action($hook, [$component, $callback]);
    }
}
