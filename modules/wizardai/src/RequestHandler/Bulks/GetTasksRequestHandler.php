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

namespace WizardAI\RequestHandler\Bulks;

if (!defined('_PS_VERSION_')) {
    exit;
}

use WizardAI\Interfaces\RequestHandlerInterface;
use WizardAI\WizardJob;

class GetTasksRequestHandler implements RequestHandlerInterface
{
    public function execute()
    {
        // Récupérer les tâches en attente
        $tasks = WizardJob::getPendingTasksFromJobs();

        // Vérifier si des tâches ont été trouvées
        if ($tasks) {
            // Si des tâches sont trouvées, les retourner en format JSON
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'tasks' => $tasks,
            ]);
        } else {
            // Si aucune tâche n'est trouvée, retourner une réponse indiquant qu'aucune tâche n'est en attente
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'No pending tasks found.',
            ]);
        }

        exit;
    }
}
