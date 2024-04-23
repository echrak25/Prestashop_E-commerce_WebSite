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

namespace WizardAI;

if (!defined('_PS_VERSION_')) {
    exit;
}
class WizardAIClient
{
    /** @var string */
    private $baseUrl = 'https://wizardai.gekkode.com/api/v1/';

    private $baseRequest = 'completions';

    private $ps_customer_id;

    public function __construct(string $ps_customer_id)
    {
        $this->ps_customer_id = $ps_customer_id;
    }

    public function request($request)
    {
        $ch = curl_init();
        $request['model'] = str_replace('/', '==', $request['model']);
        $authorizationHeader = WizardAI::tokenHeader();

        curl_setopt($ch, CURLOPT_URL, $this->baseUrl . $this->ps_customer_id . '/' . $this->baseRequest . '/' . $request['model']);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            $authorizationHeader,
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 160);

        $result = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($result, true);

        if ($result === false) {
            throw new \Exception('No valid JSON returned by WizardAI');
        }

        if (!empty($result['error'])) {
            throw new \Exception($result['error']['message']);
        }

        if (empty($result['result'])) {
            throw new \Exception('No valid content returned by WizardAI');
        }

        return $result['result'];
    }

    public function getDomain()
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            return $_SERVER['HTTP_HOST'];
        } elseif (isset($_SERVER['SERVER_NAME'])) {
            return $_SERVER['SERVER_NAME'];
        } else {
            // Handle the case where the domain cannot be determined
            throw new \Exception('Unable to determine the domain.');
        }
    }
}
