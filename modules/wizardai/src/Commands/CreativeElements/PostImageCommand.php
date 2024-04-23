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
use WizardAI\ObjectModels\WizardImage;
use WizardAI\WizardAI;

class PostImageCommand implements CommandInterface
{
    private $data;
    private $action = 'image';
    private $context;

    public function __construct($data, $context = null)
    {
        $this->data = $data;
        if ($context) {
            $this->context = $context;
        } else {
            $this->context = \Context::getContext();
        }
    }

    public function execute()
    {
        $url = 'https://wizardai.gekkode.com/api/v1/' . \Configuration::get('WIZARDAI_PS_ACCOUNT_ID') . '/creative-elements/' . $this->action;
        $data = [
            'params' => [
                'prompt' => $this->data['prompt'],
                'width' => 512,
                'height' => 512,
                'refine_steps' => (int) 25,
                'guidance_scale' => (float) 7.5,
                'scheduler' => 'K_EULER',
            ],
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

        // filename use timetamp
        $filename = time() . '.png';
        $filepath = _PS_MODULE_DIR_ . '/wizardai/storages/img/creativeelements/' . $filename;

        // Télécharger et sauvegarder l'image
        $imageData = \Tools::file_get_contents($imageUrl);
        file_put_contents($filepath, $imageData);

        // Créer une instance de WizardImage et enregistrer en base de données
        $wizardImage = new WizardImage();
        $wizardImage->server_path = $filepath;
        $wizardImage->public_path = '/modules/wizardai/storages/img/creativeelements/' . $filename;
        $wizardImage->prompt = $this->data['prompt'];
        $wizardImage->aspect_ratio = '1:1';
        $wizardImage->steps = 25;
        $wizardImage->guidances = 7.5;
        $wizardImage->id_shop = $this->context->shop->id;

        if ($wizardImage->save()) {
            // Retourner l'objet WizardImage si l'enregistrement a réussi
            // http/https + domain + public_path
            // remove first character of public_path
            $public_path = substr($wizardImage->public_path, 1);
            $complete_url = $this->context->link->getBaseLink() . $public_path;

            return $complete_url;
        } else {
            // Gérer les erreurs d'enregistrement en base de données
            return null;
        }
    }
}
