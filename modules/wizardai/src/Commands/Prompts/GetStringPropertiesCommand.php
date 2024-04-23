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

namespace WizardAI\Commands\Prompts;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Language;
use WizardAI\Interfaces\CommandInterface;

class GetStringPropertiesCommand implements CommandInterface
{
    private $data;

    public function __construct($data, $context = null)
    {
        $this->data = $data;
        if (!$context) {
            $context = \Context::getContext();
        }
        $this->context = $context;
    }

    public function execute()
    {
        $response = $this->getEntityProperties(\Tools::getValue('entity'));
        echo json_encode($response);
        exit;
    }

    public function getEntityProperties($entityName)
    {
        $idLang = (int) \Configuration::get('PS_LANG_DEFAULT');

        $customProperties = [];
        $entity = null;

        $entities = [
            'product' => [\Product::class, 'getProducts'],
            'category' => [\Category::class, 'getCategories'],
            'supplier' => [\Supplier::class, 'getSuppliers'],
            'manufacturer' => [\Manufacturer::class, 'getManufacturers'],
            'cms' => [\CMS::class, 'getCMSPages'],
            'cms_category' => [\CMSCategory::class, 'getCategories'],
        ];

        $entityProperties = [];

        if ($entityName) {
            if (array_key_exists($entityName, $entities)) {
                $entityClass = $entities[$entityName][0];
                $entityMethod = $entities[$entityName][1];
                $entityArray = null;

                switch ($entityName) {
                    case 'product':
                        $entityArray = \Product::getProducts($idLang, 0, 1, 'id_product', 'DESC')[0];
                        $customProperties[] = '{{product.features}}';
                        $customProperties[] = '{{product.attributes}}';
                        $customProperties[] = '{{product.manufacturer}}';
                        $customProperties[] = '{{product.category_url}}';
                        break;
                    case 'category':
                        $entityArray = \Category::getHomeCategories($idLang)[0];
                        $customProperties[] = '{{category.parent_categories}}';
                        break;
                    case 'supplier':
                    case 'manufacturer':
                        $entityArray = call_user_func([$entityClass, $entityMethod], $idLang)[0];
                        break;
                    case 'cms':
                        $entityArray = \CMS::getCMSPages($idLang)[0];
                        break;
                    case 'cms_category':
                        $entityArray = \CMSCategory::getHomeCategories($idLang)[0];
                        break;
                }

                $entity = new $entityClass($entityArray['id_' . $entityName], false, $idLang);
            }

            // Get properties from entity
            $entityProperties = get_object_vars($entity);
        }

        $languages = \Language::getLanguages(true);

        // Get properties from language
        $languageProperties = get_object_vars(new \Language($languages[0]['id_lang']));

        $shop = new \Shop($this->context->shop->id);

        $shopProperties = get_object_vars($shop);

        // Filter string properties only and format them
        $stringEntityProperties = array_map(function ($key) use ($entityName) {
            return '{{' . $entityName . '.' . $key . '}}';
        }, array_keys(array_filter($entityProperties, 'is_string')));

        $stringLanguageProperties = array_map(function ($key) {
            return '{{language.' . $key . '}}';
        }, array_keys(array_filter($languageProperties, 'is_string')));

        $stringShopProperties = array_map(function ($key) {
            return '{{shop.' . $key . '}}';
        }, array_keys(array_filter($shopProperties, 'is_string')));

        // Merge all properties
        $stringProperties = array_merge($stringEntityProperties, $stringLanguageProperties, $customProperties);
        $stringProperties = array_merge($stringProperties, $stringShopProperties);

        usort($stringProperties, function ($a, $b) use ($entityName) {
            if (strpos($a, '{{' . $entityName . '.') !== false && strpos($b, '{{language.') !== false) {
                return -1;
            }
            if (strpos($a, '{{language.') !== false && strpos($b, '{{' . $entityName . '.') !== false) {
                return 1;
            }
            if (strpos($a, '{{' . $entityName . '.') !== false && strpos($b, '{{shop.') !== false) {
                return -1;
            }

            return strcmp($a, $b);
        });

        return $stringProperties;
    }
}
