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

use Db;
use WizardAI\ObjectModels\WizardPrompt;

class WizardJob
{
    protected $db;

    public function __construct()
    {
        $this->db = \Db::getInstance();
    }

    /**
     * Ajoute une demande de génération à la table `wizard_jobs`.
     *
     * @param string $entity le type d'entité pour laquelle la demande est créée (ex: "product", "category")
     * @param int $entityId L'identifiant de l'entité concernée
     * @param string $task le nom de la tâche à effectuer (ex: "generate_description", "generate_meta_title")
     * @param int $idLang L'identifiant de la langue pour laquelle la demande est créée
     * @param int $idShop L'identifiant de la boutique pour laquelle la demande est créée
     *
     * @return bool|int retourne `false` si la demande n'a pas pu être ajoutée à la table, sinon retourne l'ID de la demande ajoutée
     */
    public function add($entity, $entityId, $task, $idLang, $idShop)
    {
        $now = date('Y-m-d H:i:s');

        $existingTask = \Db::getInstance()->getValue('
            SELECT COUNT(*) FROM `' . _DB_PREFIX_ . 'wizard_jobs`
            WHERE `entity` = "' . pSQL($entity) . '" AND `entity_id` = ' . (int) $entityId . ' AND `task` = "' . pSQL($task) . '" AND `id_lang` = ' . (int) $idLang . ' AND `id_shop` = ' . (int) $idShop . ' AND (`is_executed` = 0 AND `is_failed` = 0)
        ');

        if ($existingTask > 0) {
            return false;
        }

        $sql = 'INSERT INTO `' . _DB_PREFIX_ . 'wizard_jobs`
                (`entity`, `entity_id`, `task`, `attempts`, `id_lang`, `id_shop`, `is_failed`, `is_executed`, `is_sended`, `generated_at`, `created_at`)
                VALUES
                ("' . pSQL($entity) . '", ' . (int) $entityId . ', "' . pSQL($task) . '", 0, ' . (int) $idLang . ', ' . (int) $idShop . ', 0, 0, 0, NULL, "' . $now . '")';

        if (\Db::getInstance()->execute($sql)) {
            return \Db::getInstance()->Insert_ID();
        }

        return false;
    }

    /**
     * Marks a job as sent by setting the `is_sended` column to true.
     *
     * @param int $idJob the ID of the job to mark as sent
     *
     * @return bool true if the operation was successful, false otherwise
     */
    public function markAsSent($idJob)
    {
        $sql = 'UPDATE `' . _DB_PREFIX_ . 'wizard_jobs`
                SET `is_sended` = 1
                WHERE `id` = ' . (int) $idJob;

        return (bool) \Db::getInstance()->execute($sql);
    }

    /**
     * Supprime une demande de génération en fonction de l'ID de l'entité, du type d'entité et de l'ID de la demande.
     *
     * @param int $idEntity L'ID de l'entité
     * @param string $entity le nom de l'entité (par exemple "product" ou "category")
     * @param int $idJob L'ID de la demande de génération à supprimer
     *
     * @return bool true si la demande a été supprimée avec succès, false sinon
     *
     * @throws \PrestaShopDatabaseException en cas d'erreur lors de la suppression de la demande dans la base de données
     */
    public function remove($idEntity, $entity, $idJob)
    {
        $sql = 'DELETE FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE `entity_id` = ' . (int) $idEntity . ' AND `entity` = "' . pSQL($entity) . '" AND `id` = ' . (int) $idJob;
        $result = \Db::getInstance()->execute($sql);

        if (!$result) {
            throw new \PrestaShopDatabaseException('Erreur lors de la suppression de la demande de génération.');
        }

        return true;
    }

    /**
     * Met à jour une demande qui a échoué.
     *
     * @param int $idEntity L'ID de l'entité
     * @param string $entity le nom de l'entité (ex : "product", "category")
     * @param int $idJob L'ID de la demande
     *
     * @return bool vrai en cas de succès, faux en cas d'erreur
     */
    public function updateFailed($idEntity, $entity, $idJob)
    {
        $sql = 'UPDATE `' . _DB_PREFIX_ . 'wizard_jobs` SET `is_failed` = 1 WHERE `id` = ' . (int) $idJob . ' AND `entity` = "' . pSQL($entity) . '" AND `entity_id` = ' . (int) $idEntity;

        return (bool) \Db::getInstance()->execute($sql);
    }

    /**
     * Met à jour une demande après une tentative échouée.
     *
     * @param int $idEntity L'ID de l'entité concernée
     * @param string $entity le nom de l'entité concernée
     * @param int $idJob L'ID de la demande à mettre à jour
     *
     * @return bool vrai en cas de succès, faux en cas d'échec
     */
    public function updateAttempts($idEntity, $entity, $idJob)
    {
        $query = 'UPDATE `' . _DB_PREFIX_ . 'wizard_jobs` 
              SET attempts = attempts + 1 
              WHERE entity = "' . pSQL($entity) . '" 
              AND entity_id = ' . (int) $idEntity . ' 
              AND id = ' . (int) $idJob;

        return \Db::getInstance()->execute($query);
    }

    /**
     * Met à jour une demande lorsqu'elle a été traitée avec succès
     * en mettant à jour la date de génération et le statut
     *
     * @param int $idEntity L'ID de l'entité liée à la demande
     * @param string $entity Le nom de l'entité liée à la demande (ex: 'product', 'category')
     * @param int $idJob L'ID de la demande à mettre à jour
     *
     * @return bool True si la mise à jour a réussi, false sinon
     */
    public function updateSuccess($idEntity, $entity, $idJob)
    {
        $sql = 'UPDATE `' . _DB_PREFIX_ . 'wizard_jobs`
            SET `generated_at` = NOW(),
                `is_executed` = 1
            WHERE `id` = ' . (int) $idJob . '
                AND `entity` = \'' . pSQL($entity) . '\'
                AND `entity_id` = ' . (int) $idEntity;

        return (bool) \Db::getInstance()->execute($sql);
    }

    /**
     * Récupère une demande en fonction de son ID, de l'ID de l'entité et du nom de l'entité.
     *
     * @param int $idEntity L'ID de l'entité
     * @param string $entity le nom de l'entité
     * @param int $idJob L'ID de la demande
     *
     * @return array|false un tableau contenant les données de la demande, ou false si la demande n'existe pas
     */
    public function get($idEntity, $entity, $idJob)
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs`
            WHERE `id` = ' . (int) $idJob . ' AND `entity` = \'' . pSQL($entity) . '\' AND `entity_id` = ' . (int) $idEntity;

        $result = \Db::getInstance()->getRow($sql);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Récupère toutes les demandes en attente
     *
     * @return array|false|mysqli_result|PDOStatement|resource|null
     */
    public function getWaitingJobs($limit = null, $id_shop = null)
    {
        if ($id_shop === null) {
            $id_shop = \Context::getContext()->shop->id;
        }

        if ($limit === null) {
            $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE is_failed = 0 AND is_executed = 0 AND id_shop = ' . (int) $id_shop . ' ORDER BY id ASC';
        } else {
            $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE is_failed = 0 AND is_executed = 0 AND id_shop = ' . (int) $id_shop . ' ORDER BY id ASC LIMIT ' . (int) $limit;
        }

        return \Db::getInstance()->executeS($sql);
    }

    /**
     * Récupère la première demande en attente
     *
     * @return array|false|mysqli_result|PDOStatement|resource|null
     */
    public function getFirstWaitingJob($id_shop = null)
    {
        if ($id_shop === null) {
            $id_shop = \Context::getContext()->shop->id;
        }

        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE is_failed = 0 AND is_executed = 0 AND id_shop = ' . (int) $id_shop . ' ORDER BY id ASC LIMIT 1';

        return \Db::getInstance()->executeS($sql);
    }

    /**
     * Récupère toutes les demandes qui ont échoué
     *
     * @return array|false|mysqli_result|PDOStatement|resource|null
     */
    public function getFailedJobs($id_shop = null)
    {
        if ($id_shop === null) {
            $id_shop = \Context::getContext()->shop->id;
        }

        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE is_failed = 1 AND id_shop = ' . (int) $id_shop;

        return \Db::getInstance()->executeS($sql);
    }

    /**
     * Récupère toutes les demandes qui ont été exécutées avec succès
     *
     * @return array|false|mysqli_result|PDOStatement|resource|null
     */
    public function getExecutedJobs($id_shop = null)
    {
        if ($id_shop === null) {
            $id_shop = \Context::getContext()->shop->id;
        }

        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE is_failed = 0 AND is_executed = 1 AND id_shop = ' . (int) $id_shop;

        return \Db::getInstance()->executeS($sql);
    }

    /**
     * Récupère toutes les demandes en attente.
     *
     * @return array un tableau contenant les données de toutes les demandes en attente
     */
    public function getAll($id_shop = null)
    {
        if ($id_shop === null) {
            $id_shop = \Context::getContext()->shop->id;
        }

        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs`
            WHERE `is_failed` = 0 AND `is_executed` = 0
            AND id_shop = ' . (int) $id_shop . '
            ORDER BY `created_at` ASC';

        $result = \Db::getInstance()->executeS($sql);

        if ($result) {
            return $result;
        } else {
            return [];
        }
    }

    /**
     * @param $id_shop
     *
     * @return bool
     */
    public static function clearAllJobs($id_shop = null)
    {
        /*if ($id_shop === null) {
            $id_shop = \Context::getContext()->shop->id;
        }

        $sql = 'DELETE FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE id_shop = ' . (int) $id_shop;*/
        $sql = 'DELETE FROM `' . _DB_PREFIX_ . 'wizard_jobs`';

        return \Db::getInstance()->execute($sql);
    }

    /**
     * Retrieves counts of tasks in various states from the wizard_jobs table.
     *
     * This method returns an associative array containing counts of tasks
     * that are queued, ongoing, completed, and failed.
     *
     * @return array associative array with counts of different task states:
     *               'queue' (tasks waiting to be executed),
     *               'ongoing' (tasks that are in progress),
     *               'completed' (tasks that have been successfully executed),
     *               'failed' (tasks that have failed)
     */
    public static function getTaskCounts()
    {
        $sqlQueue = 'SELECT COUNT(*) FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE `is_executed` = 0 AND `is_failed` = 0';
        $sqlOngoing = 'SELECT COUNT(*) FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE `is_executed` = 0 AND `is_failed` = 0 AND `is_sended` = 1';
        $sqlCompleted = 'SELECT COUNT(*) FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE `is_executed` = 1';
        $sqlFailed = 'SELECT COUNT(*) FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE `is_failed` = 1';

        return [
            'queue' => \Db::getInstance()->getValue($sqlQueue),
            'ongoing' => \Db::getInstance()->getValue($sqlOngoing),
            'completed' => \Db::getInstance()->getValue($sqlCompleted),
            'failed' => \Db::getInstance()->getValue($sqlFailed),
        ];
    }

    /**
     * Retrieves ongoing tasks from the wizard_jobs table.
     *
     * Ongoing tasks are those that have not been executed, not failed, and not sent.
     * This method returns an array of such tasks.
     *
     * @return array array of ongoing tasks
     */
    public static function getOngoingTasks($afterId = null)
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE `is_executed` = 0 AND `is_failed` = 0 AND `is_sended` = 1';

        if ($afterId) {
            $sql .= ' AND `id` > ' . (int) $afterId;
        }

        // Order by id
        $sql .= ' ORDER BY id DESC';

        // Limit to 50
        $sql .= ' LIMIT 50';

        return \Db::getInstance()->executeS($sql);
    }

    /**
     * Retrieves completed tasks from the wizard_jobs table.
     *
     * Completed tasks are those that have been executed successfully.
     * This method returns an array of such tasks.
     *
     * @return array array of completed tasks
     */
    public static function getCompletedTasks($afterId = null)
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE `is_executed` = 1';

        if ($afterId) {
            $sql .= ' AND `id` > ' . (int) $afterId;
        }

        // Order by id
        $sql .= ' ORDER BY id DESC';

        // Limit to 50
        $sql .= ' LIMIT 50';

        return \Db::getInstance()->executeS($sql);
    }

    /**
     * Retrieves failed tasks from the wizard_jobs table.
     *
     * Failed tasks are those that have been marked as failed in their execution.
     * This method returns an array of such tasks.
     *
     * @return array array of failed tasks
     */
    public static function getFailedTasks($afterId = null)
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE `is_failed` = 1';

        if ($afterId) {
            $sql .= ' AND `id` > ' . (int) $afterId;
        }

        // Order by id
        $sql .= ' ORDER BY id DESC';

        // Limit to 50
        $sql .= ' LIMIT 50';

        return \Db::getInstance()->executeS($sql);
    }

    /**
     * Completely resets the status of a specific cron task in the wizard_jobs table.
     *
     * This method resets various fields of the task identified by $taskId to their initial values,
     * making it as if it's a new entry in the database. Fields reset include 'is_executed', 'is_failed',
     * 'is_sended', and 'attempts', along with relevant timestamps.
     *
     * @param int $taskId the ID of the task to reset
     *
     * @return bool true on success, false on failure
     */
    public static function resetCronTask($taskId)
    {
        $sql = 'UPDATE `' . _DB_PREFIX_ . 'wizard_jobs`
                SET `is_executed` = 0,
                    `is_failed` = 0,
                    `is_sended` = 0,
                    `attempts` = 0,
                    `generated_at` = NULL
                WHERE `id` = ' . (int) $taskId;

        return \Db::getInstance()->execute($sql);
    }

    public static function markAsOngoing($id_job)
    {
        $sql = 'UPDATE `' . _DB_PREFIX_ . 'wizard_jobs`
                SET `is_sended` = 1
                WHERE `id` = ' . (int) $id_job;

        return \Db::getInstance()->execute($sql);
    }

    public static function markAsCompleted($id_job)
    {
        $sql = 'UPDATE `' . _DB_PREFIX_ . 'wizard_jobs`
            SET `is_executed` = 1, `is_failed` = 0
            WHERE `id` = ' . (int) $id_job;

        return \Db::getInstance()->execute($sql);
    }

    public static function markAsFailed($id_job)
    {
        $sql = 'UPDATE `' . _DB_PREFIX_ . 'wizard_jobs`
                SET `is_failed` = 1
                WHERE `id` = ' . (int) $id_job;

        return \Db::getInstance()->execute($sql);
    }

    /**
     * Récupère toutes les tâches en attente (non envoyées, non exécutées et non échouées).
     *
     * exmple of return :
     * [
     * 'id_job' => $id_job,
     * 'name' => $prompt->action,
     * 'entity' => $this->entity,
     * 'entity_id' => $id_entity,
     * 'model_identifier' => $prompt->model,
     * 'temperature' => $prompt->temperature,
     * 'top_p' => $prompt->top_p,
     * 'repeat_penalty' => $prompt->repeat_penalty,
     * 'translate_result' => $prompt->translate_result,
     * 'system' => $prompt->getChatbotSystem(),
     * 'instructions' => $instructionsCompiled,
     * 'id_shop' => $idShop,
     * 'default_lang' => $isoLang,
     * 'status' => 'pending',
     * ]
     *
     * @return array|false les tâches en attente, ou false en cas d'erreur
     */
    public static function getPendingTasksFromJobs()
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_jobs` WHERE `is_sended` = 0 AND `is_executed` = 0 AND `is_failed` = 0';
        $jobs = \Db::getInstance()->executeS($sql);
        $tasks = [];
        foreach ($jobs as $job) {
            $prompt = WizardPrompt::getPromptByAction($job['task']);

            $lang = \Language::getLanguage(\Configuration::get('PS_LANG_DEFAULT', null, null, $job['id_shop']));
            // get iso code of $$lang
            $isoLang = $lang['iso_code'];
            $instructionsCompiled = WizardPrompt::compilePromptContent($prompt, $job['entity'], $job['entity_id'], $isoLang);
            // $translate_to must only contain iso code of the language ex : ['en', 'fr']
            $translate_to = [];
            if ($prompt->translate_result) {
                $langs = \Language::getLanguages(true, $job['id_shop']);
                foreach ($langs as $lang) {
                    $translate_to[] = $lang['iso_code'];
                }
            }
            $tasks[] = [
                'id_job' => $job['id'],
                'name' => $prompt->action,
                'entity' => $job['entity'],
                'entity_id' => $job['entity_id'],
                'model_identifier' => $prompt->model,
                'temperature' => $prompt->temperature,
                'top_p' => $prompt->top_p,
                'repeat_penalty' => $prompt->repeat_penalty,
                'translate_result' => $prompt->translate_result,
                'system' => $prompt->getChatbotSystem(),
                'instructions' => $instructionsCompiled,
                'id_shop' => $job['id_shop'],
                'translate_to' => $translate_to,
                'default_lang' => $isoLang,
                'status' => 'pending',
            ];
        }

        return $tasks;
    }

    /**
     * @param $jobs
     *
     * @return bool
     */
    public static function markJobsAsSended($jobs)
    {
        $ids = array_map(function ($job) {
            return $job['id_job'];
        }, $jobs);

        $sql = 'UPDATE `' . _DB_PREFIX_ . 'wizard_jobs` SET `is_sended` = 1 WHERE `id` IN (' . implode(',', $ids) . ')';

        return \Db::getInstance()->execute($sql);
    }
}
