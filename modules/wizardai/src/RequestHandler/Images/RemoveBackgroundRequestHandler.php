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

namespace WizardAI\RequestHandler\Images;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Tools;
use WizardAI\Interfaces\RequestHandlerInterface;  // Ensure this is the correct import for PrestaShop's Tools class

class RemoveBackgroundRequestHandler implements RequestHandlerInterface
{
    public function execute()
    {
        // Get the URL of the image
        $imageUrl = \Tools::getValue('image');

        // Validate the URL
        if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            exit('Invalid Image URL');
        }

        // Define the path to save the image
        $targetPath = _PS_MODULE_DIR_ . 'wizardai/storages/img/removeBackground/';

        $randomName = uniqid('image-', true) . '.' . pathinfo($imageUrl, PATHINFO_EXTENSION);

        // Complete file path
        $filePath = $targetPath . $randomName;

        // Check if directory exists, if not create it
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }

        // Download and save the image
        $imageContent = \Tools::file_get_contents($imageUrl);
        if ($imageContent === false) {
            exit('Error downloading the image');
        }

        file_put_contents($filePath, $imageContent);

        // TODO: Implement further logic for removing background

        // Indicate completion
        echo 'Image downloaded and saved: ' . $filePath;
    }
}
