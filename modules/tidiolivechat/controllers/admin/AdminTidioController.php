<?php
/**
 * 2007-2021 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2007-2021 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

declare(strict_types=1);

class AdminTidioController extends ModuleAdminController
{
    /**
     * @var TidioIntegrationFacade
     */
    private $tidioIntegrationFacade;
    /**
     * @var ApiControllerResponseFactory
     */
    private $responseFactory;
    /**
     * @var TidioErrorTranslator
     */
    private $tidioErrorTranslator;

    public function __construct()
    {
        parent::__construct();

        $this->tidioIntegrationFacade = $this->module->buildIntegrationFacade();
        $this->tidioErrorTranslator = $this->module->buildErrorTranslator();
        $this->responseFactory = new ApiControllerResponseFactory();
    }

    public function init(): void
    {
        $action = Tools::getValue('action', '');
        switch ($action) {
            case 'isEmailRegistered':
                $this->handleIsEmailRegisteredAction();
                break;

            case 'register':
                $this->handleRegisterAction();
                break;

            case 'getAccountDetails':
                $this->handleGetAccountDetailsAction();
                break;

            case 'integrateProject':
                $this->handleIntegrateProjectAction();
                break;

            default:
                $this->responseFactory->printErrorResponse('Invalid controller action provided.');
        }

        die;
    }

    private function handleIsEmailRegisteredAction(): void
    {
        try {
            $isEmailRegistered = $this->tidioIntegrationFacade->checkIfEmailIsRegistered([
                'email' => Tools::getValue('email', ''),
            ]);
        } catch (TidioApiException $exception) {
            $this->printErrorResponseWithTranslatedMessage($exception->getMessage());

            return;
        }

        $this->responseFactory->printOkResponse([
            'isEmailRegistered' => $isEmailRegistered,
        ]);
    }

    private function handleRegisterAction(): void
    {
        $email = Tools::getValue('email', '');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->printErrorResponseWithTranslatedMessage('ERR_INVALID_EMAIL');

            return;
        }

        try {
            $projectKeys = $this->tidioIntegrationFacade->createExternalProject(
                Configuration::get('PS_SHOP_DOMAIN') ?? ''
            );
        } catch (TidioApiException $exception) {
            $this->printErrorResponseWithTranslatedMessage($exception->getMessage());

            return;
        }

        Configuration::updateValue('TIDIOLIVECHAT_PROJECT_PUBLIC_KEY', $projectKeys->publicKey());
        Configuration::updateValue('TIDIOLIVECHAT_PROJECT_PRIVATE_KEY', $projectKeys->privateKey());

        $redirectUrl = $this->tidioIntegrationFacade->prepareRedirectUrl($projectKeys->privateKey(), $email);
        $this->responseFactory->printCreatedResponse([
            'redirectUrl' => urlencode($redirectUrl),
        ]);
    }

    private function handleGetAccountDetailsAction(): void
    {
        try {
            $token = $this->tidioIntegrationFacade->getAccessToken(
                Tools::getValue('email', ''),
                Tools::getValue('password', '')
            );
            $projects = $this->tidioIntegrationFacade->getProjects($token);
        } catch (TidioApiException $exception) {
            $this->printErrorResponseWithTranslatedMessage($exception->getMessage());

            return;
        }

        $this->responseFactory->printOkResponse([
            'apiToken' => $token,
            'projects' => array_map(
                function (TidioProjectDto $project) {
                    return $project->toArray();
                },
                $projects
            ),
        ]);
    }

    private function handleIntegrateProjectAction(): void
    {
        $token = Tools::getValue('apiToken', '');
        $publicKey = Tools::getValue('publicKey', '');
        try {
            $this->tidioIntegrationFacade->integrateProject($token, $publicKey);
            $project = $this->tidioIntegrationFacade->getProjectByPublicKey($token, $publicKey);
        } catch (TidioApiException $exception) {
            $this->printErrorResponseWithTranslatedMessage($exception->getMessage());

            return;
        }

        Configuration::updateValue('TIDIOLIVECHAT_PROJECT_PUBLIC_KEY', $project->publicKey());
        Configuration::updateValue('TIDIOLIVECHAT_PROJECT_PRIVATE_KEY', $project->privateKey());

        $this->responseFactory->printNoContentResponse();
    }

    private function printErrorResponseWithTranslatedMessage(string $errorCode): void
    {
        $errorMessage = $this->tidioErrorTranslator->translate($errorCode);
        $this->responseFactory->printErrorResponse($errorMessage);
    }
}
