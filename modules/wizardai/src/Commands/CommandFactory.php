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

namespace WizardAI\Commands;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Exception;
use WizardAI\Commands\Bulk\GetWebhookStatusCommand;
use WizardAI\Commands\Bulk\PostBulkGenerationCommand;
use WizardAI\Commands\Bulk\PostClearTasksCommand;
use WizardAI\Commands\Bulk\PostGenerateBulkCategoriesContentCommand;
use WizardAI\Commands\Bulk\PostGenerateBulkCategoriesContentWithSubCategoriesCommand;
use WizardAI\Commands\Bulk\PostGenerateBulkProductsContentCommand;
use WizardAI\Commands\Bulk\PostRelaunchTaskCommand;
use WizardAI\Commands\Bulk\PostStartProcessCommand;
use WizardAI\Commands\Bulk\PostStopProcessCommand;
use WizardAI\Commands\CreativeElements\PostHeadingCommand;
use WizardAI\Commands\CreativeElements\PostHtmlCommand;
use WizardAI\Commands\CreativeElements\PostImageCommand;
use WizardAI\Commands\CreativeElements\PostTextEditorCommand;
use WizardAI\Commands\Images\GetRemovedBackgroundCommand;
use WizardAI\Commands\Images\PostAddBackgroundCommand;
use WizardAI\Commands\Images\PostDeleteImageCommand;
use WizardAI\Commands\Images\PostDeleteRemoveBackgroundCommand;
use WizardAI\Commands\Images\PostRemoveBackgroundCommand;
use WizardAI\Commands\Prompts\GetStringPropertiesCommand;
use WizardAI\Commands\Translate\PostTranslateListCommand;

class CommandFactory
{
    /**
     * Liste des classes de commandes disponibles.
     *
     * @var array
     */
    private static $commands = [
        Images\PostGeneratePortraitCommand::class,
        Images\PostGenerateImageCommand::class,
        PostDeleteImageCommand::class,
        Prompts\PostPromptCommand::class,
        Prompts\PostAskCommand::class,
        PostRemoveBackgroundCommand::class,
        GetRemovedBackgroundCommand::class,
        PostAddBackgroundCommand::class,
        PostDeleteRemoveBackgroundCommand::class,
        GetStringPropertiesCommand::class,
        PostBulkGenerationCommand::class,
        PostRelaunchTaskCommand::class,
        PostClearTasksCommand::class,
        PostStartProcessCommand::class,
        PostStopProcessCommand::class,
        GetWebhookStatusCommand::class,
        PostHeadingCommand::class,
        PostHtmlCommand::class,
        PostImageCommand::class,
        PostTextEditorCommand::class,
        PostTranslateListCommand::class,
        PostGenerateBulkProductsContentCommand::class,
        PostGenerateBulkCategoriesContentCommand::class,
        PostGenerateBulkCategoriesContentWithSubCategoriesCommand::class,
    ];

    /**
     * Crée une instance de la commande basée sur l'action et le type de requête.
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
        $className = ucfirst(strtolower($requestType)) . ucfirst($action) . 'Command';

        // Utiliser la réflexion pour trouver la classe correspondante dans les commandes autorisées
        foreach (self::$commands as $commandClass) {
            $reflectedClass = new \ReflectionClass($commandClass);
            if ($reflectedClass->getShortName() === $className) {
                // Vérifier si la classe existe vraiment
                if (!class_exists($commandClass)) {
                    throw new \Exception("Command class does not exist: $commandClass");
                }

                // Instancier la classe de commande
                return new $commandClass(\Tools::getAllValues());
            }
        }

        // Si aucune classe n'est trouvée, lancer une exception
        throw new \Exception("Command not permitted: $className");
    }
}
