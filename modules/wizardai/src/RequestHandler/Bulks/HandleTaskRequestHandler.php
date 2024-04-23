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

use WizardAI;
use WizardAI\Interfaces\RequestHandlerInterface;
use WizardAI\ObjectModels\WizardPrompt;
use WizardAI\WizardJob;

class HandleTaskRequestHandler implements RequestHandlerInterface
{
    public function execute()
    {
        // Get the URL of the image
        $task = json_decode(\Tools::getValue('task'), true);

        try {
            $prompt = WizardPrompt::getPromptByAction($task['name']);
            $is_html = false;
            switch ($prompt->field) {
                case 'short_description':
                case 'description':
                    $is_html = true;
                    break;
            }

            $content = $task['content'];
            $content = WizardAI\WizardAI::formatforPrestashop($content, $prompt);
            foreach ($content as $id_lang => $content) {
                $this->updateEntity($task['entity'], $task['entity_id'], $prompt->field, $content, $id_lang, $task['id_shop'], $is_html);
            }

            WizardJob::markAsCompleted($task['id_job']);
        } catch (\Exception $e) {
            $this->logError($e->getMessage());
            WizardJob::markAsFailed($task['id_job']);
        }
    }

    /**
     * Update an entity (product, category, cms, cms category, supplier, or manufacturer) with a specific field and language in Prestashop using an SQL query.
     *
     * @param string $entity The name of the entity table (e.g., 'product', 'category', 'cms', etc.).
     * @param int $entityId the ID of the entity to update
     * @param string $field The field to update (e.g., 'name', 'description', etc.).
     * @param string $value the new value to set for the field
     * @param int $idLang the language ID for the update
     * @param int $idShop the shop ID for the update
     *
     * @return bool true if the update was successful, false otherwise
     */
    public function updateEntity($entity, $entityId, $field, $value, $idLang, $idShop, $is_html = false)
    {
        if ($is_html) {
            $value = pSQL(\Tools::purifyHTML($value), true);
        } else {
            $value = pSQL($value);
        }

        if ($field == 'short_description') {
            $field = 'description_short';
        }

        $entityId = (int) $entityId;
        $idLang = (int) $idLang;
        $idShop = (int) $idShop;

        $sql = 'UPDATE `' . _DB_PREFIX_ . pSQL($entity) . '_lang` SET `' . pSQL($field) . "` = '" . $value . "' 
            WHERE `id_" . pSQL($entity) . '` = ' . $entityId . ' 
            AND `id_lang` = ' . $idLang . ' 
            AND `id_shop` = ' . $idShop;

        return \Db::getInstance()->execute($sql);
    }

    public function logError($var)
    {
        // generate file txt into storages
        $targetPath = _PS_MODULE_DIR_ . 'wizardai/storages/task/';
        // name of the day + hour + second + '-' + random number
        $name = 'error-' . date('Y-m-d-H-i-s') . '-' . rand(0, 1000) . '.txt';
        $filePath = $targetPath . $name;
        $file = fopen($filePath, 'w');
        fwrite($file, json_encode($var));
        fclose($file);
    }
}
