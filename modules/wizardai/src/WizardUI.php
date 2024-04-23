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
abstract class WizardUI
{
    protected $params;
    protected $context;
    protected $token;

    protected $templatePath = _PS_MODULE_DIR_ . 'wizardai/views/templates/admin/ui/'; // chemin par défaut
    protected $templateFile; // doit être défini par les classes enfants

    public function __construct($context, $params = [])
    {
        $this->context = $context;
        $this->params = $params;
    }

    protected function assignParams()
    {
        foreach ($this->params as $key => $value) {
            $this->context->smarty->assign($key, $value);
        }

        // Assignation du token pour utilisation dans le template
        $this->context->smarty->assign('token', $this->token);
    }

    public function render()
    {
        $this->assignParams();

        return $this->context->smarty->fetch($this->templatePath . $this->templateFile);
    }

    /**
     * Generates action URLs based on provided parameters.
     *
     * @param array $params parameters containing action info, admin link, and token
     *
     * @return array actions with generated URLs
     *
     * @throws \Exception
     */
    protected function generateActionURLs(array $params): array
    {
        if (!isset($params['adminLink']) || empty($params['adminLink'])) {
            throw new \Exception('Missing or empty "adminLink" parameter.');
        }

        if (!isset($params['tokens']) || empty($params['tokens'])) {
            throw new \Exception('Missing or empty "tokens" parameter.');
        }

        $actions = $params['actions'] ?? [];
        $adminLink = $params['adminLink'];
        $token = $params['tokens'];

        foreach ($actions as &$action) {
            if (isset($action['name'])) {
                $action['url'] = $adminLink . '&token=' . $token . '&a=' . $action['name'];
            }
        }

        return $actions;
    }

    public static function generateActionUrl($id, $adminLink, $token, $actionName)
    {
        return $adminLink . '&token=' . $token . '&a=' . $actionName . '&id=' . $id;
    }
}
