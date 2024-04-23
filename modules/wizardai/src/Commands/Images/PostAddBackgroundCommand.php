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

class PostAddBackgroundCommand implements CommandInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        if (!isset($this->data['image'])) {
            return 'No image uploaded.';
        }

        if (!isset($this->data['prompt']) || empty($this->data['prompt'])) {
            return 'Prompt is required.';
        }

        $data = [
            'image' => $this->data['image'],
            'prompt' => $this->data['prompt'],
        ];

        $apiUrl = 'https://wizardai.gekkode.com/api/v1/' . $this->data['ps_account_id'] . '/addBackground';
        $result = $this->sendApiRequest($apiUrl, $data);
        $result = json_decode($result);

        if (empty($result) || !isset($result->output)) {
            return 'Error in API response.';
        }

        $baseStoragePath = _PS_MODULE_DIR_ . 'wizardai/storages/img/addBackground/';
        $baseUrl = \Context::getContext()->shop->getBaseURL(true);
        $imageUrls = [];

        foreach ($result->output as $key => $imageUrl) {
            if ($key == 0) {
                continue;
            } // Ignorer l'image par défaut

            $filename = time() . "_$key.png";
            $filepath = $baseStoragePath . $filename;

            try {
                $imageData = \Tools::file_get_contents($imageUrl);
                file_put_contents($filepath, $imageData);
                $imageUrls[] = $baseUrl . '/modules/wizardai/storages/img/addBackground/' . $filename;
            } catch (Exception $e) {
                // Gérer les exceptions liées aux opérations de fichiers
                continue;
            }
        }

        return $imageUrls; // Retourne un tableau d'URL d'images
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

        return $response;
    }
}
