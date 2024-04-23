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

namespace WizardAI\UI;

if (!defined('_PS_VERSION_')) {
    exit;
}

class TableAdvanced extends Table
{
    protected $templateFile = 'TableAdvanced.tpl';

    public function __construct($context, $params = [])
    {
        parent::__construct($context, $params);
        $this->token = $params['tokens'] ?? \Tools::getAdminTokenLite('AdminModules');
    }

    protected function assignParams()
    {
        parent::assignParams();
        $this->params['actions'] = $this->generateActionURLs($this->params);
        $this->params['bulkActions'] = $this->generateBulkActionURLs($this->params);
        // Traitement des templates
        foreach ($this->params['data'] as &$rowData) {
            foreach ($this->params['columns'] as $columnKey => $columnValue) {
                if (isset($columnValue['template'])) {
                    $template = $columnValue['template'];
                    foreach ($rowData[$columnKey] as $key => $value) {
                        $searchString = '{$row.' . $key . '}';
                        $template = str_replace($searchString, $value, $template);
                    }
                    $rowData[$columnKey]['template'] = $template;
                }
            }
        }

        $this->context->smarty->assign('actions', $this->params['actions']);
        $this->context->smarty->assign('bulkActions', $this->params['bulkActions']);
        $this->context->smarty->assign('columns', $this->params['columns']);
        $this->context->smarty->assign('data', $this->params['data']);
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
    protected function generateBulkActionURLs(array $params): array
    {
        if (!isset($params['adminLink']) || empty($params['adminLink'])) {
            throw new \Exception('Missing or empty "adminLink" parameter.');
        }

        if (!isset($params['tokens']) || empty($params['tokens'])) {
            throw new \Exception('Missing or empty "tokens" parameter.');
        }

        $actions = $params['bulkActions'] ?? [];
        $adminLink = $params['adminLink'];
        $token = $params['tokens'];

        foreach ($actions as &$action) {
            if (isset($action['name'])) {
                $action['url'] = $adminLink . '&token=' . $token . '&a=' . $action['name'];
            }
        }

        return $actions;
    }
}
