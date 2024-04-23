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

class PostGeneratePortraitCommand implements CommandInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        // Convertir les caractères accentués en non-accentués
        $s_account_id = $this->data['ps_account_id'];
        $nameFormat = iconv('UTF-8', 'ASCII//TRANSLIT', $this->data['name']);
        $functionFormat = iconv('UTF-8', 'ASCII//TRANSLIT', $this->data['function']);
        $nameFormat = str_replace(' ', '_', mb_strtolower($nameFormat));
        $functionFormat = str_replace(' ', '_', mb_strtolower($functionFormat));
        // Construire le nom du fichier basé sur $name et $function
        $filename = $nameFormat . '-' . $functionFormat . '.png';

        // Construire le chemin du fichier
        $filepath = _PS_MODULE_DIR_ . '/wizardai/storages/img/characters/' . $filename;

        // Vérifier si le fichier existe déjà
        if (file_exists($filepath)) {
            // Return web path of filepath
            return '/modules/wizardai/storages/img/characters/' . $filename;
        }

        $url = 'https://wizardai.gekkode.com/api/v1/' . $s_account_id . '/character/portrait';

        $data = [
            'name' => $this->data['name'],
            'function' => $this->data['function'],
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

        // Vérifier les erreurs dans la réponse
        if (isset($decodedResponse['error'])) {
            // Gérer l'erreur comme vous le souhaitez, par exemple en loggant l'erreur et en retournant null
            error_log($decodedResponse['error']);

            return null;
        }

        // Obtenir l'URL de l'image à partir de la réponse
        $imageUrl = $decodedResponse['output'][0];

        // Télécharger et sauvegarder l'image
        $imageData = \Tools::file_get_contents($imageUrl);
        file_put_contents($filepath, $imageData);

        // Retourner le chemin du fichier
        return '/modules/wizardai/storages/img/characters/' . $filename;
    }
}
