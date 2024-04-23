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

namespace WizardAI\Commands\CreativeElements;

if (!defined('_PS_VERSION_')) {
    exit;
}

use WizardAI\Interfaces\CommandInterface;
use WizardAI\WizardAI;

class PostTextEditorCommand implements CommandInterface
{
    private $data;
    private $action = 'text-editor';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        if (!isset($this->data['prompt']) || empty($this->data['prompt'])) {
            return 'Prompt is required.';
        }

        $data = [
            'prompt' => $this->data['prompt'],
        ];

        $apiUrl = 'https://wizardai.gekkode.com/api/v1/' . $this->data['ps_account_id'] . '/creative-elements/' . $this->action;
        $result = $this->sendApiRequest($apiUrl, $data);
        $result = json_decode($result);

        if (empty($result) || !isset($result->result)) {
            return 'Error in API response.';
        }

        return $this->format($result->result);
    }

    private function format($message)
    {
        $message = str_replace('<br />', '', $message);
        $message = str_replace('```html', '', $message);
        $message = str_replace('```', '', $message);

        return $message;
    }

    private function sendApiRequest($url, $data)
    {
        $ch = curl_init($url);

        $authorizationHeader = WizardAI::tokenHeader();

        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            $authorizationHeader,
        ];

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

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
