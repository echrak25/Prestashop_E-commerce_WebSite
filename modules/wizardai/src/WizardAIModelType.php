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
class WizardAIModelType
{
    public const TEXT_GENERATION = 'text-generation';
    public const IMAGE_GENERATION = 'image-generation';
    public const IMAGE_EDITING = 'image-editing';

    private $type;

    public function __construct($type)
    {
        $this->validateType($type);
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    private function validateType($type)
    {
        $validTypes = [
            self::TEXT_GENERATION,
            self::IMAGE_GENERATION,
            self::IMAGE_EDITING,
        ];

        if (!in_array($type, $validTypes)) {
            throw new \InvalidArgumentException('Invalid model type provided.');
        }
    }

    public static function assignSmartyModelType($selectedType = null)
    {
        $validTypes = [
            self::TEXT_GENERATION,
            self::IMAGE_GENERATION,
            self::IMAGE_EDITING,
        ];

        $selectableItems = [];
        foreach ($validTypes as $type) {
            $selectableItems[] = [
                'title' => ucfirst(str_replace('-', ' ', $type)),  // Conversion de 'text-generation' en 'Text Generation'
                'value' => $type,
                'disabled' => false,
            ];
        }

        $selectedItem = [
            'title' => ucfirst(str_replace('-', ' ', $selectedType)),
            'value' => $selectedType,
        ];

        if ($selectedType === null) {
            $defaultText = 'Select type of model';
        } else {
            $defaultText = ucfirst(str_replace('-', ' ', $selectedType));
        }

        return [
            'selectedModelType' => json_encode($selectedItem),
            'selectableModelType' => json_encode($selectableItems),
            'defaultModelType' => $defaultText,
        ];
    }
}
