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
use Context;
use Shop;
use WizardAI\Interfaces\CommandInterface;
use WizardAI\ObjectModels\WizardPrompt;
use WizardAI\WizardAI;
use WizardAI\WizardJob;

class PostGenerateBulkCategoriesContentCommand implements CommandInterface
{
    private $data;
    private $entity;
    private $defaultLang = 1;
    private $id_shop;
    private $WizardJob;
    private $list = [];

    public function __construct($data)
    {
        $this->data = $data;
        $this->id_shop = $this->data['context_shop_id'];
        $this->defaultLang = (int) \Configuration::get('PS_LANG_DEFAULT', null, null, $this->data['context_shop_id']);
        $this->entity = 'category';
        $this->WizardJob = new WizardJob();
    }

    public function execute()
    {
        $categories = $this->data['categories'];
        $contextShopId = (int) $this->data['context_shop_id'];
        // get all shop
        if (\Shop::isFeatureActive()) {
            // check if current context is all shop or group shop
            if ($contextShopId === \Shop::CONTEXT_ALL || $contextShopId === \Shop::CONTEXT_GROUP) {
                $shops = \Shop::getShops(true, null, true);
                foreach ($shops as $idShop) {
                    foreach ($categories as $id_category) {
                        $this->addToList($id_category, $idShop);
                    }
                }
            } else {
                $idShop = \Context::getContext()->shop->id;

                foreach ($categories as $id_category) {
                    $this->addToList($id_category, $idShop);
                }
            }
        } else {
            $idShop = \Context::getContext()->shop->id;

            foreach ($categories as $id_category) {
                $this->addToList($id_category, $idShop);
            }
        }
        $this->sendTaskFromList($this->list);
        echo count($this->list);
        exit;
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
                $lang = \Language::getLanguage(\Configuration::get('PS_LANG_DEFAULT', null, null, $idShop));
                // get iso code of $$lang
                $isoLang = $lang['iso_code'];

                $instructionsCompiled = WizardPrompt::compilePromptContent($prompt, $this->entity, $id_entity, $isoLang);
                $id_job = $this->WizardJob->add($this->entity, $entityId, $prompt->action, $idLang, $idShop);
                $this->list[] = [
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
                ];
            }
        }
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
