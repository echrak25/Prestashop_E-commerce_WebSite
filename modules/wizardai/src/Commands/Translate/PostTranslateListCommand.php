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

namespace WizardAI\Commands\Translate;

if (!defined('_PS_VERSION_')) {
    exit;
}

use WizardAI\Interfaces\CommandInterface;
use WizardAI\WizardAI;

class PostTranslateListCommand implements CommandInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        $url = 'https://wizardai.gekkode.com/api/v1/' . $this->data['ps_account_id'] . '/translate-list';

        $list = $this->data['list'];

        $data = [
             'list' => $list,
             'locale' => $this->data['locale'],
         ];

        $authorizationHeader = WizardAI::tokenHeader();

        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            $authorizationHeader,
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);

        // Décoder la réponse JSON
        $decodedResponse = json_decode($response, true);

        if (!empty($decodedResponse['error'])) {
            throw new \Exception($decodedResponse['error']['message']);
        }

        $orignalResult = str_replace(['<br />', "\n", "\r", "\n\r", '{{', '}}', '&quot;'], '', trim($decodedResponse['result']));
        $result = json_decode($orignalResult, true);
        if ($result === null) {
            return [];
        }

        exit(json_encode([
            'status' => true,
            'message' => 'Your request has been sent successfully.',
            'list' => $result,
        ]));
    }
}
