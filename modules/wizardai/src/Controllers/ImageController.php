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

namespace WizardAI\Controllers;

if (!defined('_PS_VERSION_')) {
    exit;
}

use WizardAI\ObjectModels\WizardImage;

class ImageController extends WizardAdminController
{
    public function view()
    {
        $this->context->smarty->assign([
            'selectedRatio' => json_encode([
                'value' => '1:1',
                'title' => 'Square (1:1)',
            ]),
            'selectableRatios' => json_encode([
                ['value' => '16:9', 'title' => 'Cinema (16:9)', 'disabled' => false],
                ['value' => '3:2', 'title' => 'Landscape (3:2)', 'disabled' => false],
                ['value' => '5:4', 'title' => 'Computer (5:4)', 'disabled' => false],
                ['value' => '1:1', 'title' => 'Square (1:1)', 'disabled' => false],
                ['value' => '4:5', 'title' => 'Portrait (4:5)', 'disabled' => false],
                ['value' => '2:3', 'title' => 'Tablet (2:3)', 'disabled' => false],
                ['value' => '9:16', 'title' => 'Phone (9:16)', 'disabled' => false],
                ['value' => '7:9', 'title' => 'Category (7:9)', 'disabled' => false],
            ]),
        ]);

        $this->context->smarty->assign([
            'selectedStep' => json_encode([
                'value' => '25',
                'title' => 'Medium (25 steps)',
            ]),
            'selectableSteps' => json_encode([
                ['value' => '25', 'title' => 'Medium (25 steps)', 'disabled' => false],
                ['value' => '50', 'title' => 'High (50 steps)', 'disabled' => false],
            ]),
        ]);

        $this->context->smarty->assign([
            'selectedGuidance' => json_encode([
                'value' => '7.5',
                'title' => 'Normal (7.5)',
            ]),
            'selectableGuidances' => json_encode([
                ['value' => '2.5', 'title' => 'Free (2.5)', 'disabled' => false],
                ['value' => '7.5', 'title' => 'Normal (7.5)', 'disabled' => false],
                ['value' => '12.5', 'title' => 'Strict (12.5)', 'disabled' => false],
                ['value' => '17.5', 'title' => 'Very Strict (17.5)', 'disabled' => false],
            ]),
        ]);

        $images = WizardImage::getAll();

        \Media::addJsDef([
            'imageList' => $images, // Pass the image list as a JavaScript variable
        ]);

        return $this->context->smarty->fetch($this->admin_controllers->getTemplatePath() . 'images/index.tpl');
    }
}
