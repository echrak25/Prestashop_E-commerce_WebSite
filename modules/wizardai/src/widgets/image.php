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

namespace WizardAI\Widgets;

if (!defined('_PS_VERSION_')) {
    exit;
}

use CE\ControlsManager;
use CE\GroupControlBorder;
use CE\GroupControlBoxShadow;
use CE\GroupControlCssFilter;
use CE\GroupControlImageSize;
use CE\GroupControlTextShadow;
use CE\GroupControlTypography;
use CE\Helper;
use CE\Plugin;
use CE\SchemeColor;
use CE\SchemeTypography;
use CE\Utils;
use CE\WidgetBase;
use function CE\__;
use function CE\_x;

defined('_PS_VERSION_') or exit;

class WizardImage extends WidgetBase
{
    public function getName()
    {
        return 'wizardai-image';
    }

    public function getTitle()
    {
        return __('AI Image');
    }

    public function getIcon()
    {
        return 'eicon-image';
    }

    public function getCategories()
    {
        return ['wizardai'];
    }

    public function getKeywords()
    {
        return ['image', 'AI', 'WizardAI'];
    }

    protected function _registerControls()
    {
        $this->startControlsSection(
            'content_section',
            [
                'label' => __('Content'),
            ]
        );

        /*$this->addControl(
            'image_prompt',
            [
                'label' => __('Image Prompt'),
                'type' => ControlsManager::TEXT,
                'placeholder' => __('Enter prompt for AI'),
            ]
        );

        $this->addControl(
            'generate_image_button',
            [
                'label' => __('Generate Image'),
                'type' => ControlsManager::BUTTON,
                'text' => __('Generate'),
                'event' => 'wizardai:generate-image',
            ]
        );*/

        $this->addControl(
            'button_wizardai',
            [
                'label' => __('WizardAI'),
                'type' => ControlsManager::BUTTON,
                'text' => __('Ask AI'),
                'event' => 'wizardai:image',
            ]
        );

        $this->addControl(
            'image',
            [
                'label' => __('Choose Image'),
                'type' => ControlsManager::MEDIA,
                'seo' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::getPlaceholderImageSrc(),
                ],
            ]
        );

        $this->addResponsiveControl(
            'align',
            [
                'label' => __('Alignment'),
                'type' => ControlsManager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->addControl(
            'caption',
            [
                'label' => __('Custom Caption'),
                'label_block' => true,
                'type' => ControlsManager::TEXT,
                'placeholder' => __('Enter your image caption'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->addControl(
            'link_to',
            [
                'label' => __('Link'),
                'type' => ControlsManager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __('None'),
                    'file' => __('Media File'),
                    'custom' => __('Custom URL'),
                ],
            ]
        );

        $this->addControl(
            'link',
            [
                'label' => __('Link'),
                'type' => ControlsManager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('https://your-link.com'),
                'condition' => [
                    'link_to' => 'custom',
                ],
                'show_label' => false,
            ]
        );

        $this->addControl(
            'open_lightbox',
            [
                'label' => __('Lightbox'),
                'type' => ControlsManager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __('Default'),
                    'yes' => __('Yes'),
                    'no' => __('No'),
                ],
                'condition' => [
                    'link_to' => 'file',
                ],
            ]
        );

        $this->addControl(
            'view',
            [
                'label' => __('View'),
                'type' => ControlsManager::HIDDEN,
                'default' => 'traditional',
            ]
        );

        $this->endControlsSection();

        $this->startControlsSection(
            'section_style_image',
            [
                'label' => __('Image'),
                'tab' => ControlsManager::TAB_STYLE,
            ]
        );

        $this->addResponsiveControl(
            'width',
            [
                'label' => __('Width'),
                'type' => ControlsManager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px', 'vw'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->addResponsiveControl(
            'space',
            [
                'label' => __('Max Width'),
                'type' => ControlsManager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px', 'vw'],
                'range' => [
                    '%' => [
                        'min' => 1,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->addResponsiveControl(
            'height',
            [
                'label' => __('Height'),
                'type' => ControlsManager::SLIDER,
                'default' => [
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->addResponsiveControl(
            'object-fit',
            [
                'label' => __('Object Fit'),
                'type' => ControlsManager::SELECT,
                'condition' => [
                    'height[size]!' => '',
                ],
                'options' => [
                    '' => __('Default'),
                    'fill' => _x('Fill', 'Background Control'),
                    'cover' => _x('Cover', 'Background Control'),
                    'contain' => _x('Contain', 'Background Control'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );

        $this->addResponsiveControl(
            'object_position',
            [
                'label' => __('Position'),
                'type' => ControlsManager::SELECT,
                'condition' => [
                    'height[size]!' => '',
                ],
                'options' => [
                    '' => __('Default'),
                    'top left' => _x('Top Left', 'Background Control'),
                    'top center' => _x('Top Center', 'Background Control'),
                    'top right' => _x('Top Right', 'Background Control'),
                    'center left' => _x('Center Left', 'Background Control'),
                    'center center' => _x('Center Center', 'Background Control'),
                    'center right' => _x('Center Right', 'Background Control'),
                    'bottom left' => _x('Bottom Left', 'Background Control'),
                    'bottom center' => _x('Bottom Center', 'Background Control'),
                    'bottom right' => _x('Bottom Right', 'Background Control'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image img' => 'object-position: {{VALUE}};',
                ],
            ]
        );

        $this->addControl(
            'separator_panel_style',
            [
                'type' => ControlsManager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->startControlsTabs('image_effects');

        $this->startControlsTab(
            'normal',
            [
                'label' => __('Normal'),
            ]
        );

        $this->addControl(
            'opacity',
            [
                'label' => __('Opacity'),
                'type' => ControlsManager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->addGroupControl(
            GroupControlCssFilter::getType(),
            [
                'name' => 'css_filters',
                'selector' => '{{WRAPPER}} .elementor-image img',
            ]
        );

        $this->endControlsTab();

        $this->startControlsTab(
            'hover',
            [
                'label' => __('Hover'),
            ]
        );

        $this->addControl(
            'opacity_hover',
            [
                'label' => __('Opacity'),
                'type' => ControlsManager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image:hover img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->addGroupControl(
            GroupControlCssFilter::getType(),
            [
                'name' => 'css_filters_hover',
                'selector' => '{{WRAPPER}} .elementor-image:hover img',
            ]
        );

        $this->addControl(
            'background_hover_transition',
            [
                'label' => __('Transition Duration'),
                'type' => ControlsManager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image img' => 'transition-duration: {{SIZE}}s',
                ],
            ]
        );

        $this->addControl(
            'hover_animation',
            [
                'label' => __('Hover Animation'),
                'type' => ControlsManager::HOVER_ANIMATION,
            ]
        );

        $this->endControlsTab();

        $this->endControlsTabs();

        $this->addGroupControl(
            GroupControlBorder::getType(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .elementor-image img',
                'separator' => 'before',
            ]
        );

        $this->addResponsiveControl(
            'image_border_radius',
            [
                'label' => __('Border Radius'),
                'type' => ControlsManager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->addGroupControl(
            GroupControlBoxShadow::getType(),
            [
                'name' => 'image_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .elementor-image img',
            ]
        );

        $this->endControlsSection();

        $this->startControlsSection(
            'section_style_caption',
            [
                'label' => __('Caption'),
                'tab' => ControlsManager::TAB_STYLE,
                'condition' => [
                    'caption!' => '',
                ],
            ]
        );

        $this->addControl(
            'caption_align',
            [
                'label' => __('Alignment'),
                'type' => ControlsManager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-image-caption' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->addControl(
            'text_color',
            [
                'label' => __('Text Color'),
                'type' => ControlsManager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-image-caption' => 'color: {{VALUE}};',
                ],
                'scheme' => [
                    'type' => SchemeColor::getType(),
                    'value' => SchemeColor::COLOR_3,
                ],
            ]
        );

        $this->addControl(
            'caption_background_color',
            [
                'label' => __('Background Color'),
                'type' => ControlsManager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-image-caption' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->addGroupControl(
            GroupControlTypography::getType(),
            [
                'name' => 'caption_typography',
                'selector' => '{{WRAPPER}} .widget-image-caption',
                'scheme' => SchemeTypography::TYPOGRAPHY_3,
            ]
        );

        $this->addGroupControl(
            GroupControlTextShadow::getType(),
            [
                'name' => 'caption_text_shadow',
                'selector' => '{{WRAPPER}} .widget-image-caption',
            ]
        );

        $this->addResponsiveControl(
            'caption_space',
            [
                'label' => __('Spacing'),
                'type' => ControlsManager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-image-caption' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->endControlsSection();
    }

    /**
     * Render image widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     */
    protected function render()
    {
        $settings = $this->getSettingsForDisplay();

        if (empty($settings['image']['url'])) {
            return;
        }

        $has_caption = !Utils::isEmpty($settings, 'caption');
        $link = $this->getLinkUrl($settings);

        if ($link) {
            $this->addLinkAttributes('link', $link);

            if (Plugin::$instance->editor->isEditMode()) {
                $this->addRenderAttribute('link', 'class', 'elementor-clickable');
            }

            if ('custom' !== $settings['link_to']) {
                $this->addLightboxDataAttributes('link', $settings['image']['id'], $settings['open_lightbox']);
            }
        } ?>
        <div class="elementor-image">
            <?php if ($has_caption) { ?>
            <figure class="ce-caption">
                <?php } ?>
                <?php if ($link) { ?>
                <a <?php $this->printRenderAttributeString('link'); ?>>
                    <?php } ?>
                    <?php echo GroupControlImageSize::getAttachmentImageHtml($settings); ?>
                    <?php if ($link) { ?>
                </a>
            <?php } ?>
                <?php if ($has_caption) { ?>
                    <figcaption class="widget-image-caption ce-caption-text"><?php echo $settings['caption']; ?></figcaption>
                <?php } ?>
                <?php if ($has_caption) { ?>
            </figure>
        <?php } ?>
        </div>
        <?php
    }

    /**
     * Render image widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 2.9.0
     */
    protected function contentTemplate()
    {
        ?>
        <# if ( settings.image.url ) {
        var image_url = elementor.imagesManager.getImageUrl( settings.image );

        if ( ! image_url ) {
        return;
        }

        var link_url;

        if ( 'custom' === settings.link_to ) {
        link_url = settings.link.url;
        } else if ( 'file' === settings.link_to ) {
        link_url = image_url;
        }

        #><div class="elementor-image{{ settings.shape ? ' elementor-image-shape-' + settings.shape : '' }}"><#
        var lightbox = 'data-elementor-open-lightbox',
        imgClass = '';

        if ( '' !== settings.hover_animation ) {
        imgClass = 'elementor-animation-' + settings.hover_animation;
        }

        if ( settings.caption ) {
        #><figure class="ce-caption"><#
            }

            if ( link_url ) {
            #><a class="elementor-clickable" {{ lightbox }}="{{ settings.open_lightbox }}" href="{{ link_url }}"><#
                }
                #><img src="{{ image_url }}" class="{{ imgClass }}"><#

                if ( link_url ) {
                #></a><#
            }

            if ( settings.caption ) {
            #><figcaption class="widget-image-caption ce-caption-text">{{{ settings.caption }}}</figcaption><#
            }

            if ( settings.caption ) {
            #></figure><#
        }

        #></div><#
        } #>
        <?php
    }

    /**
     * Retrieve image widget link URL.
     *
     * @since 1.0.0
     *
     * @param array $settings
     *
     * @return array|string|false An array/string containing the link URL, or false if no link
     */
    private function getLinkUrl($settings)
    {
        if ('none' === $settings['link_to']) {
            return false;
        }

        if ('custom' === $settings['link_to']) {
            if (empty($settings['link']['url'])) {
                return false;
            }

            return $settings['link'];
        }

        return [
            'url' => Helper::getMediaLink($settings['image']['url']),
        ];
    }
}
