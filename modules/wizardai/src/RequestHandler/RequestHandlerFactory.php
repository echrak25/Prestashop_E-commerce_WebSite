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

namespace WizardAI\RequestHandler;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Exception;
use WizardAI\RequestHandler\Bulks\FailedTaskRequestHandler;
use WizardAI\RequestHandler\Bulks\GetTasksRequestHandler;
use WizardAI\RequestHandler\Bulks\HandleTaskRequestHandler;
use WizardAI\RequestHandler\Bulks\OngoingTaskRequestHandler;
use WizardAI\RequestHandler\Images\RemoveBackgroundRequestHandler;

class RequestHandlerFactory
{
    /**
     * Liste des classes de request handler disponibles.
     *
     * @var array
     */
    private static $commands = [
        RemoveBackgroundRequestHandler::class,
        HandleTaskRequestHandler::class,
        FailedTaskRequestHandler::class,
        OngoingTaskRequestHandler::class,
        GetTasksRequestHandler::class,
    ];

    /**
     * Crée une instance de la request handler basée sur l'action et le type de requête.
     *
     * @param string $action L'action à exécuter
     * @param string $requestType Le type de la requête (post, get, etc.).
     *
     * @return object L'instance de la commande
     *
     * @throws \Exception si la classe de commande n'existe pas dans la liste
     */
    public static function create($action, $requestType)
    {
        // Construire le nom de la classe attendue
        $className = ucfirst($action) . 'RequestHandler';

        // Utiliser la réflexion pour trouver la classe correspondante dans les commandes autorisées
        foreach (self::$commands as $commandClass) {
            $reflectedClass = new \ReflectionClass($commandClass);
            if ($reflectedClass->getShortName() === $className) {
                // Vérifier si la classe existe vraiment
                if (!class_exists($commandClass)) {
                    throw new \Exception("RequestHandler class does not exist: $commandClass");
                }

                // Instancier la classe de commande
                return new $commandClass(\Tools::getAllValues());
            }
        }

        // Si aucune classe n'est trouvée, lancer une exception
        throw new \Exception("RequestHandler not permitted: $className");
    }
}
