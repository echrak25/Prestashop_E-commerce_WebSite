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
if (!defined('_PS_VERSION_')) {
    exit;
}
use WizardAI\RequestHandler\RequestHandlerFactory;

class WizardAIWebhookModuleFrontController extends ModuleFrontController
{
    /** @var bool If set to true, will be redirected to authentication page */
    public $auth = false;

    /** @var bool */
    public $ajax;

    public $template = 'module:wizardai/views/templates/front/webhook.tpl';

    public function displayAjax()
    {
        $this->checkToken();

        $action = Tools::getValue('action');

        if (!$action) {
            $this->response('No action provided', 'error');
        }

        try {
            // Créer la commande en utilisant la factory
            $command = RequestHandlerFactory::create($action, $_SERVER['REQUEST_METHOD']);

            // Exécuter la commande et obtenir la réponse
            $response = $command->execute();

            // Envoyer la réponse au client
            $this->response($response);
        } catch (Exception $e) {
            $this->response($e->getMessage(), 'error');
        }
    }

    public function checkToken()
    {
        $token = Tools::getValue('token');
        if (!$token || $token !== Configuration::get('WIZARDAI_API_TOKEN', null, null, 1)) {
            $this->response('Invalid token', 'error');
        }
    }

    public function response($data, $type = 'success')
    {
        // get type of data ( string, object, array, ... )
        $dataType = gettype($data);
        $this->ajaxRender(json_encode([
            'status' => $type,
            'type' => $dataType,
            'response' => $data,
        ]));
        exit;
    }
}
