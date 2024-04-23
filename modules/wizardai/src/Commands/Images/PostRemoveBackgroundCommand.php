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

namespace WizardAI\Commands\Images;

if (!defined('_PS_VERSION_')) {
    exit;
}

use WizardAI\Interfaces\CommandInterface;
use WizardAI\WizardAI;

class PostRemoveBackgroundCommand implements CommandInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        // Validate and process the uploaded image
        if (!isset($_FILES['image'])) {
            return 'No image uploaded.';
        }

        $imageInfo = $_FILES['image'];
        if ($imageInfo['error'] !== UPLOAD_ERR_OK) {
            return 'Error in file upload.';
        }

        // Generate file path for the temporary image
        $extension = pathinfo($imageInfo['name'], PATHINFO_EXTENSION);
        $filename = 'tmp-' . time() . '.' . $extension;
        $filepath = _PS_MODULE_DIR_ . '/wizardai/storages/img/removeBackground/tmp/' . $filename;

        if (!move_uploaded_file($imageInfo['tmp_name'], $filepath)) {
            return 'Failed to save the image.';
        }

        // Prepare data for API request
        $image_url = $this->getImageUrl($filename);
        $data = ['image' => $image_url];

        // Send request to the API
        $result = $this->sendApiRequest('https://wizardai.gekkode.com/api/v1/' . $this->data['ps_account_id'] . '/removeBackground', $data);

        return $result ? 'Image has been sent to the API.' : 'Failed to send the image.';
    }

    private function getImageUrl($filename)
    {
        // Get the base URL of the shop
        $baseUrl = \Context::getContext()->shop->getBaseURL(true);

        // Construct the full URL for the uploaded image
        return $baseUrl . 'modules/wizardai/storages/img/removeBackground/tmp/' . $filename;
    }

    private function sendApiRequest($url, $data)
    {
        $ch = curl_init($url);

        $authorizationHeader = WizardAI::tokenHeader();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            $authorizationHeader,
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        // Check for CURL errors
        if ($error) {
            return 'CURL Error: ' . $error;
        }

        // Check for valid HTTP response codes
        if ($httpCode != 200) {
            return 'API Request failed with HTTP Code ' . $httpCode;
        }

        return $response ? true : false;
    }
}
