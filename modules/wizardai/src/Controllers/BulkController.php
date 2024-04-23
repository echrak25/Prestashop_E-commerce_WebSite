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

use Category;
use Product;
use Shop;
use WizardAI\WizardAI;
use WizardAI\WizardJob;

class BulkController extends WizardAdminController
{
    public function view()
    {
        $this->assignTaskCounts();
        $this->assignOngoingTasks();
        $this->assignCompletedTasks();
        $this->assignFailedTasks();
        $this->assignCredits();

        $view = $this->admin_controllers->getTemplatePath() . 'bulk/index.tpl';
        $this->setShopsVariables();

        $ssl = \Configuration::get('PS_SSL_ENABLED');
        $this->context->smarty->assign('is_ssl', $ssl);

        return $this->context->smarty->fetch($view);
    }

    private function setShopsVariables()
    {
        $shops = [];
        // get all active shop in prestashop
        $shopsPS = \Shop::getShops();
        foreach ($shopsPS as $shop) {
            $shops[] = [
                'title' => $shop['name'],
                'value' => $shop['id_shop'],
            ];
        }
        \Media::addJsDef([
            'shopRadioGroupOptions' => $shops,
        ]);
    }

    /**
     * Récupère le nombre de crédits depuis l'API WizardAI en utilisant l'UUID de la boutique.
     *
     * Cette fonction fait une requête GET à l'API WizardAI pour obtenir le nombre de crédits
     * associés à l'UUID de la boutique configuré dans PrestaShop. Elle effectue une vérification
     * pour s'assurer que la valeur retournée par l'API est numérique. En cas d'erreur lors de la
     * requête ou si la valeur retournée n'est pas numérique, la fonction retourne 0.
     *
     * @return int Le nombre de crédits récupérés depuis l'API. Retourne 0 en cas d'erreur ou si la
     *             valeur retournée par l'API n'est pas numérique.
     */
    public function assignCredits()
    {
        \Context::getContext()->smarty->assign('credits', WizardAI::getCredits());
    }

    private function assignTaskCounts()
    {
        $taskCounts = WizardJob::getTaskCounts();
        \Media::addJsDef(['taskCounts' => $taskCounts]);
        \Context::getContext()->smarty->assign('taskCounts', $taskCounts['queue']);
    }

    private function assignOngoingTasks()
    {
        $ongoingTasks = WizardJob::getOngoingTasks();
        // Enhance task details here (add shop name, entity URL, etc.)
        // For example:
        foreach ($ongoingTasks as &$task) {
            $task['task'] = \Tools::ucfirst(str_replace('_', ' ', $task['task']));
            $task['target'] = \Tools::ucfirst($task['entity']);
            $task['shop_name'] = $this->getShopNameById($task['id_shop']);
            // $task['entity_url'] = $this->getEntityUrl($task['entity'], $task['entity_id']);
            // if task is for product, get product name
            if ($task['entity'] === 'product') {
                $product = new \Product($task['entity_id'], false, (int) \Configuration::get('PS_LANG_DEFAULT'));
                $task['entity_name'] = $product->name;
                // $task['entity_name'] = $task['entity_id'];
            }
            // if task is for category, get category name
            if ($task['entity'] === 'category') {
                $category = new \Category($task['entity_id'], (int) \Configuration::get('PS_LANG_DEFAULT'));
                $task['entity_name'] = $category->name;
                // $task['entity_name'] = $task['entity_id'];
            }
        }

        \Media::addJsDef(['ongoingTasks' => $ongoingTasks]);
    }

    private function assignCompletedTasks()
    {
        $completedTasks = WizardJob::getCompletedTasks();
        foreach ($completedTasks as &$task) {
            $task['task'] = \Tools::ucfirst(str_replace('_', ' ', $task['task']));
            $task['target'] = \Tools::ucfirst($task['entity']);
            $task['shop_name'] = $this->getShopNameById($task['id_shop']);
            // $task['entity_url'] = $this->getEntityUrl($task['entity'], $task['entity_id']);
            // if task is for product, get product name
            if ($task['entity'] === 'product') {
                $product = new \Product($task['entity_id'], false, (int) \Configuration::get('PS_LANG_DEFAULT'));
                $task['entity_name'] = $product->name;
                // $task['entity_name'] = $task['entity_id'];
            }
            // if task is for category, get category name
            if ($task['entity'] === 'category') {
                $category = new \Category($task['entity_id'], (int) \Configuration::get('PS_LANG_DEFAULT'));
                $task['entity_name'] = $category->name;
                // $task['entity_name'] = $task['entity_id'];
            }
        }

        \Media::addJsDef(['completedTasks' => $completedTasks]);
    }

    private function assignFailedTasks()
    {
        $failedTasks = WizardJob::getFailedTasks();
        foreach ($failedTasks as &$task) {
            // format text like "generate_product_description" into "Generate product description"
            $task['task'] = \Tools::ucfirst(str_replace('_', ' ', $task['task']));
            $task['target'] = \Tools::ucfirst($task['entity']);
            $task['shop_name'] = $this->getShopNameById($task['id_shop']);
            // $task['entity_url'] = $this->getEntityUrl($task['entity'], $task['entity_id']);
            // if task is for product, get product name
            if ($task['entity'] === 'product') {
                $product = new \Product($task['entity_id'], false, (int) \Configuration::get('PS_LANG_DEFAULT'));
                $task['entity_name'] = $product->name;
                // $task['entity_name'] = $task['entity_id'];
            }
            // if task is for category, get category name
            if ($task['entity'] === 'category') {
                $category = new \Category($task['entity_id'], (int) \Configuration::get('PS_LANG_DEFAULT'));
                $task['entity_name'] = $category->name;
                // $task['entity_name'] = $task['entity_id'];
            }
        }

        \Media::addJsDef(['failedTasks' => $failedTasks]);
    }

    private function getEntityUrl($entity, $entityId)
    {
        $adminLink = \Context::getContext()->link->getAdminLink('AdminDashboard');

        switch ($entity) {
            case 'Product':
                $controller = 'AdminProducts';
                break;
            case 'Category':
                $controller = 'AdminCategories';
                break;
            default:
                // Handle other entities or return a default or error
                return '';
        }

        return $adminLink . '&controller=' . $controller . '&id_' . strtolower($entity) . '=' . $entityId . '&update' . strtolower($entity);
    }

    private function getShopNameById($shopId)
    {
        $shop = new \Shop($shopId, (int) \Configuration::get('PS_LANG_DEFAULT'));

        return $shop->name;
    }
}
