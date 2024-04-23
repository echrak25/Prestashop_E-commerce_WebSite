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

namespace WizardAI\Controllers;

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Classe de base pour les contrôleurs d'administration dans le module WizardAI.
 * Fournit des fonctionnalités communes et une structure pour les contrôleurs dérivés.
 */
class WizardAdminController
{
    /**
     * @var mixed instance du contrôleur d'administration
     */
    protected $admin_controllers;

    /**
     * @var string action à exécuter
     */
    protected $action;

    /**
     * @var \Context contexte Prestashop
     */
    protected $context;

    /**
     * @var string onglet actuel
     */
    protected static $tab;

    /**
     * @var mixed traducteur pour les chaînes de caractères
     */
    protected $translator;

    /**
     * @var string URL de redirection après l'enregistrement
     */
    protected $redirect_after;

    /**
     * Constructeur de la classe.
     *
     * @param mixed $admin_controllers instance du contrôleur d'administration
     * @param \Context|null $context contexte de l'application
     */
    public function __construct($admin_controllers, $context = null)
    {
        $this->admin_controllers = $admin_controllers;
        $this->context = $context ?: \Context::getContext();
        self::$tab = \Tools::getValue('tab');
        $this->translator = $this->context->getTranslator();
    }

    /**
     * Traduit une chaîne de caractères.
     *
     * @param string $id identifiant de la chaîne à traduire
     * @param array $parameters paramètres à utiliser dans la traduction
     * @param string|null $domain domaine de la traduction
     * @param string|null $locale locale à utiliser pour la traduction
     *
     * @return string chaîne traduite
     */
    protected function trans($id, array $parameters = [], $domain = null, $locale = null)
    {
        $parameters['legacy'] = 'htmlspecialchars';

        return $this->translator->trans($id, $parameters, $domain, $locale);
    }

    /**
     * Exécute l'action demandée.
     *
     * @return mixed le résultat de l'action
     *
     * @throws \Exception si l'action demandée n'existe pas
     */
    public function run()
    {
        $this->action = \Tools::getValue('a', 'view');
        if (method_exists($this, $this->action)) {
            $this->getMessages();
            $this->context->smarty->assign('isWizardAISubmit', '1');

            return $this->{$this->action}();
        }
        throw new \Exception('Invalid action: ' . $this->action);
    }

    /**
     * Traite l'action demandée.
     *
     * @return bool|mixed retourne vrai ou le résultat de l'action
     */
    public function process()
    {
        $this->action = \Tools::getValue('a');
        if ($this->action && method_exists($this, $this->action) && $this->isFormSubmission()) {
            return $this->{$this->action}();
        }

        return false;
    }

    /**
     * Génère des URLs pour les formulaires.
     *
     * @param array $params paramètres nécessaires pour générer l'URL
     *
     * @return array paramètres avec l'URL d'action générée
     *
     * @throws \Exception si un paramètre requis est manquant
     */
    protected function generateActionURLs(array &$params)
    {
        $requiredParams = ['adminLink', 'tokens', 'action'];
        foreach ($requiredParams as $param) {
            if (empty($params[$param])) {
                throw new \Exception("Missing or empty \"$param\" parameter.");
            }
        }

        $params['action'] = [
            'name' => $params['action'],
            'url' => $params['adminLink'] . '&token=' . $params['tokens'] . '&a=' . $params['action'],
        ];

        return $params;
    }

    /**
     * Vérifie si le mode démo est activé et renvoie une erreur le cas échéant.
     *
     * @return bool true si le mode démo est activé, false sinon
     */
    protected function checkDemoMode()
    {
        if (_PS_MODE_DEMO_) {
            $this->addError($this->trans('This functionality has been disabled in demo.'));

            return true;
        }

        return false;
    }

    protected function redirect($url = null)
    {
        $this->redirect_after = $this->context->link->getAdminLink($this->admin_controllers->controller_name) . '&tab=' . self::$tab;
        if ($url) {
            $this->redirect_after = $url;
        }
        \Tools::redirectAdmin($this->redirect_after);
    }

    protected function isFormSubmission()
    {
        return \Tools::isSubmit('isWizardAISubmit') && \Tools::getValue('isWizardAISubmit') === '1';
    }

    private function addFlashMessage($type, $message)
    {
        $flashMessages = $this->context->cookie->__isset('flash_messages')
            ? json_decode($this->context->cookie->__get('flash_messages'), true)
            : [];

        $flashMessages[$type][] = $message;

        $this->context->cookie->__set('flash_messages', json_encode($flashMessages));
    }

    protected function addConfirmation($message)
    {
        $this->addFlashMessage('success', $message);
    }

    protected function addError($message)
    {
        $this->addFlashMessage('error', $message);
    }

    protected function getMessages()
    {
        if ($this->context->cookie->__isset('flash_messages')) {
            $flashMessages = json_decode($this->context->cookie->__get('flash_messages'), true);

            if (!empty($flashMessages['success'])) {
                foreach ($flashMessages['success'] as $message) {
                    $this->admin_controllers->confirmations[] = $message;
                }
            }

            if (!empty($flashMessages['error'])) {
                foreach ($flashMessages['error'] as $message) {
                    $this->admin_controllers->errors[] = $message;
                }
            }

            $this->context->cookie->__unset('flash_messages');
        }
    }
}
