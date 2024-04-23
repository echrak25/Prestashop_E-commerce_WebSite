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
use WizardAI\Commands\CommandFactory;

/**
 * Class AdminWizardAIAjaxController
 * Handles ajax request for the Wizard AI module in the admin panel.
 */
class AdminWizardAIAjaxController extends ModuleAdminController
{
    /**
     * AdminWizardAIConfigController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->ajax = true;
    }

    public function displayAjax()
    {
        $action = Tools::getValue('action');

        if (!$action) {
            $this->response('No action provided', 'error');
        }

        try {
            $command = CommandFactory::create($action, $_SERVER['REQUEST_METHOD']);
            $response = $command->execute();
            $this->response($response);
        } catch (Exception $e) {
            $this->response($e->getMessage(), 'error');
        }
    }

    public function response($data, $type = 'success')
    {
        $dataType = gettype($data);
        $this->ajaxRender(json_encode([
            'status' => $type,
            'type' => $dataType,
            'response' => $data,
        ]));
        exit;
    }
}
