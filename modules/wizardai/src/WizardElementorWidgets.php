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
if (!defined('_PS_VERSION_')) {
    exit;
}

use CE\Plugin;
use function CE\__;
use function CE\wp_enqueue_style;
use function CE\wp_register_style;

require_once _CE_PATH_ . 'classes/assets/CEAssetManager.php';

class WizardElementorWidgets
{
    /**
     * Include Widgets files
     *
     * Load widgets files
     *
     * @since 1.2.0
     */
    private function include_widgets_files()
    {
        require_once __DIR__ . '/widgets/heading.php';
        require_once __DIR__ . '/widgets/html.php';
        require_once __DIR__ . '/widgets/text-editor.php';
        require_once __DIR__ . '/widgets/image.php';
    }

    /**
     * Register all of the widgets
     * of the plugin.
     *
     * @since    1.0.0
     */
    public function register_widgets()
    {
        $this->include_widgets_files();
        Plugin::instance()->widgets_manager->registerWidgetType(new WizardAI\Widgets\WizardHeading());
        Plugin::instance()->widgets_manager->registerWidgetType(new WizardAI\Widgets\WizardHtml());
        Plugin::instance()->widgets_manager->registerWidgetType(new WizardAI\Widgets\WizardTextEditor());
        Plugin::instance()->widgets_manager->registerWidgetType(new WizardAI\Widgets\WizardImage());
    }

    public function register_category()
    {
        Plugin::$instance->elements_manager->addCategory('wizardai', [
            'title' => __('WizardAI'),
            'icon' => 'ceicon-presta-widget',
        ]);
    }

    public function register_styles()
    {
        $module = Module::getInstanceByName('wizardai');

        wp_register_style(
            'wizardai-icons',
            Tools::getHttpHost(true) . __PS_BASE_URI__ . 'modules/wizardai/views/css/wizardai.elementor.css',
            [],
            $module->version
        );

        wp_enqueue_style('wizardai-icons');
    }
}
