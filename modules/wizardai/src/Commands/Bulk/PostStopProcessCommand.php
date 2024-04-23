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

namespace WizardAI\Commands\Bulk;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Configuration;
use WizardAI\Interfaces\CommandInterface;
use WizardAI\WizardAI;
use WizardAI\WizardJob;

class PostStopProcessCommand implements CommandInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->WizardJob = new WizardJob();
    }

    public function execute()
    {
        // Récupération de l'UUID depuis la configuration de PrestaShop
        $uuid = \Configuration::get('WIZARDAI_PS_ACCOUNT_ID');

        // Construction de l'URL de l'API
        $url = 'https://wizardai.gekkode.com/api/v1/' . $uuid . '/webhook/pause';

        $authorizationHeader = WizardAI::tokenHeader();

        // Initialisation de la session cURL
        $curl = curl_init();

        // Configuration des options cURL
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            $authorizationHeader,
        ]);

        // Exécution de la requête cURL
        $response = curl_exec($curl);

        // Fermeture de la session cURL
        curl_close($curl);

        // Traitement de la réponse
        if ($response !== false) {
            $decodedResponse = json_decode($response, true);
        // Traitement de la réponse décodée
        } else {
            // Gérer l'erreur
            $decodedResponse = null; // ou une autre logique d'erreur
        }

        // var_dump($response);
        return $decodedResponse;
    }
}
