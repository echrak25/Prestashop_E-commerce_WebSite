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

namespace WizardAI\Commands\Bulk;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Configuration;
use WizardAI\Interfaces\CommandInterface;
use WizardAI\ObjectModels\WizardPrompt;
use WizardAI\WizardAI;
use WizardAI\WizardJob;

class PostBulkGenerationCommand implements CommandInterface
{
    private $data;
    private $entity;
    private $defaultLang = 1;
    private $id_shop;
    private $onlyActive = 1;
    private $WizardJob;
    private $list = [];
    private $count = 0;

    public function __construct($data)
    {
        $this->data = $data;
        $this->id_shop = $this->data['id_shop'];
        $this->defaultLang = (int) \Configuration::get('PS_LANG_DEFAULT', null, null, $this->data['id_shop']);
        if ($this->data['generate_type'] === 'products') {
            $this->entity = 'product';
        } else {
            $this->entity = 'category';
        }
        if ($this->data['generate_scope'] === 'all') {
            $this->onlyActive = true;
        } else {
            $this->onlyActive = false;
        }
        $this->WizardJob = new WizardJob();
    }

    public function execute()
    {
        $entities = $this->getAll($this->entity);
        $entities = $this->removeEmptyName($entities);
        foreach ($entities as $entity) {
            if ($this->entity === 'product') {
                $this->addToList($entity['id_product']);
            } else {
                $this->addToList($entity['id_category']);
            }
        }
        echo count($this->list);
        exit;
    }

    public function getAll($entity)
    {
        switch ($entity) {
            case 'product':
                // get All products
                $entities = \Product::getProducts(\Context::getContext()->language->id, 0, 0, 'id_product', 'ASC', false, $this->onlyActive);
                break;
            case 'category':
                // get All categories
                $entities = \Category::getCategories(\Context::getContext()->language->id, $this->onlyActive, false);
                // Remove ID 1 and 2 (root and home)
                unset($entities[0]);
                unset($entities[1]);
                break;
        }

        return $entities;
    }

    public function removeEmptyName($entities)
    {
        $entities = array_filter($entities, function ($entity) {
            return !empty($entity['name']);
        });

        return $entities;
    }

    public function addToList($id_entity, $idShop = null)
    {
        if ($idShop === null) {
            $idShop = $this->data['id_shop'];
        }
        $languages = \Language::getLanguages(true, $idShop);
        // detect if all shops are selected
        $entityId = (int) $id_entity;
        $prompts = WizardPrompt::getPromptsForCron($this->entity);
        foreach ($prompts as $prompt) {
            $languages_settings = WizardAI::getLanguageSettings($prompt, \Configuration::get('PS_LANG_DEFAULT', null, null, $idShop));

            if ($prompt->translate_result) {
                // foreach ($languages as $language) {
                $idLang = (int) $this->defaultLang;
                if ($this->data['generate_filter'] === 'generate_only_empty_fields') {
                    if ($this->entity === 'product') {
                        $entityObject = new \Product($id_entity, false, $idLang, $idShop);
                    } else {
                        $entityObject = new \Category($id_entity, $idLang, $idShop);
                    }
                    if (!empty($entityObject->{$prompt->field})) {
                        continue;
                    }
                }

                if ($this->data['generate_filter'] === 'generate_only_plain_text') {
                    if ($this->entity === 'product') {
                        $entityObject = new \Product($id_entity, false, $idLang, $idShop);
                    } else {
                        $entityObject = new \Category($id_entity, $idLang, $idShop);
                    }
                    if (!$this->isOnlyText($entityObject->{$prompt->field})) {
                        continue;
                    }
                }

                if ($this->entity === 'product') {
                    $entityObject = new \Product($id_entity, false, $idLang, $idShop);
                    $selected_categories_ids = $prompt->getConditionFieldValue('categories');
                    if (!empty($selected_categories_ids)) {
                        $categoriesOfProduct = $entityObject->getCategories();
                        if (empty(array_intersect($categoriesOfProduct, $selected_categories_ids))) {
                            continue;
                        }
                    }
                }
                if ($this->entity === 'category') {
                    $entityObject = new \Category($id_entity, $idLang, $idShop);
                    $selected_categories_ids = $prompt->getConditionFieldValue('categories');
                    if (!empty($selected_categories_ids)) {
                        if (!in_array($entityObject->id_category, $selected_categories_ids)) {
                            continue; // Skip if main category is not in selected categories
                        }
                    }
                }

                $lang = \Language::getLanguage(\Configuration::get('PS_LANG_DEFAULT', null, null, $idShop));
                // get iso code of $$lang
                $isoLang = $lang['iso_code'];
                $instructionsCompiled = WizardPrompt::compilePromptContent($prompt, $this->entity, $id_entity, $isoLang);
                $id_job = $this->WizardJob->add($this->entity, $entityId, $prompt->action, $idLang, $idShop);
                $taskRequest = array_merge($languages_settings, [
                    'id_job' => $id_job,
                    'name' => $prompt->action,
                    'entity' => $this->entity,
                    'entity_id' => $id_entity,
                    'model_identifier' => $prompt->model,
                    'temperature' => $prompt->temperature,
                    'top_p' => $prompt->top_p,
                    'repeat_penalty' => $prompt->repeat_penalty,
                    'translate_result' => $prompt->translate_result,
                    'system' => $prompt->getChatbotSystem(),
                    'instructions' => $instructionsCompiled,
                    'id_shop' => $idShop,
                    'default_lang' => $isoLang,
                    'status' => 'pending',
                ]);
                array_push($this->list, $taskRequest);
            // }
            } else {
                $idLang = (int) $this->defaultLang;
                if ($this->data['generate_filter'] === 'generate_only_empty_fields') {
                    if ($this->entity === 'product') {
                        $entityObject = new \Product($id_entity, false, $idLang, $idShop);
                    } else {
                        $entityObject = new \Category($id_entity, $idLang, $idShop);
                    }
                    if (!empty($entityObject->{$prompt->field})) {
                        continue;
                    }
                }

                if ($this->data['generate_filter'] === 'generate_only_plain_text') {
                    if ($this->entity === 'product') {
                        $entityObject = new \Product($id_entity, false, $idLang, $idShop);
                    } else {
                        $entityObject = new \Category($id_entity, $idLang, $idShop);
                    }
                    if (!$this->isOnlyText($entityObject->{$prompt->field})) {
                        continue;
                    }
                }

                $lang = \Language::getLanguage(\Configuration::get('PS_LANG_DEFAULT', null, null, $idShop));
                // get iso code of $$lang
                $isoLang = $lang['iso_code'];

                $instructionsCompiled = WizardPrompt::compilePromptContent($prompt, $this->entity, $id_entity, $isoLang);
                $id_job = $this->WizardJob->add($this->entity, $entityId, $prompt->action, $idLang, $idShop);
                array_push($this->list, [
                    'id_job' => $id_job,
                    'name' => $prompt->action,
                    'entity' => $this->entity,
                    'entity_id' => $id_entity,
                    'model_identifier' => $prompt->model,
                    'temperature' => $prompt->temperature,
                    'top_p' => $prompt->top_p,
                    'repeat_penalty' => $prompt->repeat_penalty,
                    'translate_result' => $prompt->translate_result,
                    'system' => $prompt->getChatbotSystem(),
                    'instructions' => $instructionsCompiled,
                    'id_shop' => $idShop,
                    'default_lang' => $isoLang,
                    'translate_to' => [],
                    'status' => 'pending',
                ]);
            }
        }
    }

    public function isOnlyText($text)
    {
        // Supprimer les espaces blancs inutiles
        $text = trim($text);

        // Vérifier si le texte est vide
        if (empty($text)) {
            return false;
        }

        // Compter le nombre de balises <p> dans le texte
        $countP = substr_count($text, '<p>');

        // Vérifier s'il y a plus d'une balise <p>
        if ($countP > 1) {
            return false;
        }

        // Vérifier si le texte contient des balises autres que <br /> ou <br/>
        if (preg_match('/<(?!(br\s*\/?|\/?p\s*>))/', $text)) {
            return false;
        }

        // Le texte est valide selon les règles spécifiées
        return true;
    }

    public function sendTaskFromList($tasks)
    {
        foreach ($tasks as $task) {
            $this->sendTask($task);
        }
    }

    public function sendTask($task)
    {
        // Récupération de l'UUID depuis la configuration de PrestaShop
        $uuid = \Configuration::get('WIZARDAI_PS_ACCOUNT_ID');

        // Construction de l'URL de l'API
        $url = 'https://wizardai.gekkode.com/api/v1/' . $uuid . '/webhook/makeTask';

        $authorizationHeader = WizardAI::tokenHeader();

        // Initialisation de la session cURL
        $curl = curl_init();

        // Configuration des options cURL pour une requête POST
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(['task' => $task]));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            $authorizationHeader,
        ]);

        // Configuration pour ne pas attendre la réponse
        curl_setopt($curl, CURLOPT_TIMEOUT, 1);
        curl_setopt($curl, CURLOPT_NOSIGNAL, 1);

        // Exécution de la requête cURL
        curl_exec($curl);

        // Fermeture de la session cURL
        curl_close($curl);
    }
}
