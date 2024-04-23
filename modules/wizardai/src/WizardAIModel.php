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

use Cache;

class WizardAIModel
{
    private $apiUrl = 'https://wizardai.gekkode.com/api/v1/models/list/text-generation';
    private $cacheId = 'wizardai_models';
    private $cacheDuration = 604800; // Cache for 7 days

    private function fetchModelsFromApi()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            // Handle error, log, etc.
            return [];
        }
        curl_close($ch);

        return json_decode($response, true);
    }

    private function getModels()
    {
        if (!\Cache::isStored($this->cacheId)) {
            $apiModels = $this->fetchModelsFromApi();
            $models = array_map(function ($model) {
                return [
                    'value' => $model['reference'],
                    'title' => $model['name'],
                    'credit_cost_model' => $model['base_credit_cost'],
                    'disabled' => (bool) $model['is_disabled'],
                ];
            }, $apiModels);

            \Cache::store($this->cacheId, $models);
        }

        return \Cache::retrieve($this->cacheId);
    }

    public function getAllModels()
    {
        return $this->getModels();
    }

    /**
     * Get model by ID.
     *
     * @param string $id
     *
     * @return array|null
     */
    public function getModelById($id)
    {
        foreach ($this->models as $model) {
            if ($model['id'] === $id) {
                return $model;
            }
        }

        return null;
    }

    public function getModelByValue($value)
    {
        foreach ($this->getModels() as $model) {
            if ($model['value'] === $value) {
                return $model;
            }
        }

        return null;
    }

    public static function assignSmartyModelType($selectedType = null)
    {
        $instance = new self();
        $allModels = $instance->getAllModels();

        $selectableItems = $allModels;
        $selectedItem = null;

        // If a specific model is selected.
        if ($selectedType) {
            $selectedItem = $instance->getModelByValue($selectedType);
        }

        // If no model is selected, select the first one.
        if (!$selectedItem) {
            $selectedItem = $allModels[0];
        }

        return [
            'selectedModel' => json_encode($selectedItem),
            'selectableModel' => json_encode($selectableItems),
        ];
    }
}
