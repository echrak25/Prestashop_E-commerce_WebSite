<?php
/**
 * Creative Elements - live Theme & Page Builder
 *
 * @author    WebshopWorks, Elementor
 * @copyright 2019-2023 WebshopWorks.com & Elementor.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace WizardAI\Widgets;

if (!defined('_PS_VERSION_')) {
    exit;
}

use CE\ControlsManager;
use CE\WidgetBase;
use function CE\__;

/**
 * Elementor HTML widget.
 *
 * Elementor widget that insert a custom HTML code into the page.
 *
 * @since 1.0.0
 */
class WizardHtml extends WidgetBase
{
    /**
     * Get widget name.
     *
     * Retrieve HTML widget name.
     *
     * @since 1.0.0
     *
     * @return string Widget name
     */
    public function getName()
    {
        return 'wizardai-html';
    }

    /**
     * Get widget title.
     *
     * Retrieve HTML widget title.
     *
     * @since 1.0.0
     *
     * @return string Widget title
     */
    public function getTitle()
    {
        return __('AI HTML');
    }

    /**
     * Get widget icon.
     *
     * Retrieve HTML widget icon.
     *
     * @since 1.0.0
     *
     * @return string Widget icon
     */
    public function getIcon()
    {
        return 'eicon-code';
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 2.1.0
     *
     * @return array Widget keywords
     */
    public function getKeywords()
    {
        return ['html', 'code'];
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the heading widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * @since 2.0.0
     *
     * @return array Widget categories
     */
    public function getCategories()
    {
        return ['wizardai'];
    }

    /**
     * Register HTML widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     */
    protected function _registerControls()
    {
        $this->startControlsSection(
            'section_title',
            [
                'label' => __('HTML Code'),
            ]
        );

        $this->addControl(
            'html',
            [
                'type' => ControlsManager::CODE,
                'placeholder' => __('Enter your code'),
                'show_label' => false,
                'classes' => 'wizardai-source',
            ]
        );

        $this->addControl(
            'button_wizardai',
            [
                'label' => __('WizardAI'),
                'type' => ControlsManager::BUTTON,
                'text' => __('Ask AI'),
                'event' => 'wizardai:html',
            ]
        );

        $this->endControlsSection();
    }

    /**
     * Render HTML widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     */
    protected function render()
    {
        echo $this->getSettingsForDisplay('html');
    }

    /**
     * Render HTML widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 2.9.0
     */
    protected function contentTemplate()
    {
        ?>
        {{{ settings.html }}}
        <?php
    }
}
