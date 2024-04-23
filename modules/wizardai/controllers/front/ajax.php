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
if (!defined('_PS_VERSION_')) {
    exit;
}
use WizardAI\OpenAI;
use WizardAI\WizardAI;
use WizardAI\WizardJob;
use WizardAI\WizardPrompt;

class WizardAIAjaxModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        try {
            if (
                isset($_SERVER['HTTP_REFERER'])
                && false === strpos($_SERVER['HTTP_REFERER'], '/sell/catalog/products')
                && false === strpos($_SERVER['HTTP_REFERER'], '/sell/catalog/categories')
                && false === strpos($_SERVER['HTTP_REFERER'], '/improve/design/cms-pages')
                && false === strpos($_SERVER['HTTP_REFERER'], '/sell/catalog/brands')
                && false === strpos($_SERVER['HTTP_REFERER'], '/sell/catalog/suppliers')
                && false === strpos($_SERVER['HTTP_REFERER'], '/product/form')
                && false === strpos($_SERVER['HTTP_REFERER'], '/index.php?controller=AdminTranslations')
                && false === strpos($_SERVER['HTTP_REFERER'], '/index.php/improve/international/translations')
                && false === strpos($_SERVER['HTTP_REFERER'], '/index.php?controller=AdminCEEditor')
            ) {
                exit(json_encode([
                    'status' => false,
                    'error' => 'Access denied',
                ]));
            }
            if (empty(Tools::getValue('securityToken')) || Tools::getValue('securityToken') !== Configuration::get('OPENAI_SECURITY_TOKEN')) {
                exit(json_encode([
                    'status' => false,
                    'error' => 'Invalid security token',
                ]));
            }
            if (empty(Tools::getValue('action'))) {
                exit(json_encode([
                    'status' => false,
                    'error' => 'Invalid action',
                ]));
            }
            $action = Tools::getValue('action');
            $creativeelements_action = false;
            if (strpos($action, 'creativeelements:') !== false) {
                $creativeelements_action = str_replace('creativeelements:', '', $action);
            }

            if ($action == 'generateBulkProductsContent') {
                $this->ajaxProcessGenerateBulkProductsContent();
                exit(json_encode([
                    'status' => true,
                    'message' => 'Your request has been sent successfully.',
                ]));
            }

            if ($action == 'generateBulkCategoriesContent') {
                $this->ajaxProcessGenerateBulkCategoriesContent();
                exit(json_encode([
                    'status' => true,
                    'message' => 'Your request has been sent successfully.',
                ]));
            }

            if ($action == 'generateBulkCategoriesContentWithSubCategories') {
                $this->ajaxProcessGenerateBulkCategoriesContentWithSubCategories();
                exit(json_encode([
                    'status' => true,
                    'message' => 'Your request has been sent successfully.',
                ]));
            }

            if ($action == 'default') {
                // Utilisez $prompt comme nécessaire
                // ...
                $language = new Language(Language::getIdByIso(Tools::getValue('locale')));
                $promptContentCompiled = WizardPrompt::compilePromptContent(Tools::getValue('prompt'), Tools::getValue('text'), Tools::getValue('entity'), Tools::getValue('id_entity'), Tools::getValue('locale'));
                $promptContentCompiled .= ' - Write in ' . $language->name;
                $message = OpenAI::ask($promptContentCompiled, Tools::getValue('locale'), Tools::getValue('text'), true);

                exit(json_encode([
                    'status' => true,
                    'message' => 'Your prompt has been generated successfully.',
                    'prompt' => $promptContentCompiled,
                    'descriptions' => $message,
                ]));
            }

            // look if $action has creativeelements:[action], [action] can be creativeelements:ask, creativeelements:generate for exemple
            if ($creativeelements_action) {
                $append_to_text = false;
                $use_markdown = false;
                switch ($creativeelements_action) {
                    case 'heading':
                        $use_markdown = true;
                        $prompt = $this->l('Format your response into markdown format, Limit number of word to 10 maximum for a title. The request to generate :');
                        $prompt .= Tools::getValue('prompt');
                        break;
                    case 'text-editor':
                        $use_markdown = true;
                        $append_to_text = Tools::getValue('text');
                        $prompt = $this->l('Format your response into markdown format. The request to generate :');
                        $prompt .= Tools::getValue('prompt');
                        break;
                    case 'html':
                        $append_to_text = Tools::getValue('text');
                        $prompt = $this->l('Generate the HTML code by following the instructions below. Be careful not to include the doctype, the <html> tag and the <body> tag, the generated code must go to the essence of the request, don\'t write an introduction or a conclusion but only the requested html code. The request to generate :');
                        $prompt .= Tools::getValue('prompt');
                        break;
                    default:
                        break;
                }
                $message = OpenAI::ask($prompt, false, $append_to_text, $use_markdown);
                switch ($creativeelements_action) {
                    case 'text-editor':
                    case 'html':
                        $message = str_replace('<br />', '', $message);
                        $message = str_replace('```html', '', $message);
                        $message = str_replace('```', '', $message);
                        break;
                    case 'heading':
                        $message = str_replace('<br />', '', $message);
                        $message = str_replace('<p>', '', $message);
                        $message = str_replace('</p>', '', $message);
                        $message = str_replace('<h1>', '', $message);
                        $message = str_replace('</h1>', '', $message);
                        $message = str_replace('<h2>', '', $message);
                        $message = str_replace('</h2>', '', $message);
                        $message = str_replace('<h3>', '', $message);
                        $message = str_replace('</h3>', '', $message);
                        $message = str_replace('<h4>', '', $message);
                        $message = str_replace('</h4>', '', $message);
                        break;
                    default:
                        break;
                }
                exit(json_encode([
                    'status' => true,
                    'message' => 'Your prompt has been generated successfully.',
                    'descriptions' => $message,
                ]));
            }

            if ($action == 'translateList') {
                $listTranslated = OpenAI::translateList(Tools::getValue('list'), Tools::getValue('locale'));
                exit(json_encode([
                    'status' => true,
                    'message' => 'Your request has been sent successfully.',
                    'list' => $listTranslated,
                ]));
            }

            if ($action == 'generateFeatures') {
                $features = $this->getAllFeaturesAndValues();
                // count words of $features string
                $featuresLength = str_word_count($features);
                $featuresNotFound = '';
                // if $featuresLength + number token of prompt is greater than max token, return error
                /*if (($featuresLength + 400) > (int)Configuration::get('OPENAI_MAX_TOKENS')) {
                    exit(json_encode([
                        'status' => false,
                        'error' => 'The number of your features is too high.',
                    ]));
                }*/

                $product = new Product(Tools::getValue('id_entity'), false, Context::getContext()->language->id);
                $featuresList = OpenAI::generateFeatures($product->name, $features);
                $db = Db::getInstance();
                $id_product = Tools::getValue('id_entity');
                // get id lang of english
                $id_lang = Language::getIdByIso('en');

                if ($featuresList !== null && count($featuresList) > 0) {
                    foreach ($featuresList as $feature_name => $feature_value) {
                        // Obtenez l'ID de la caractéristique en utilisant son nom
                        if ($id_lang) {
                            $id_feature = $db->getValue('SELECT `id_feature` FROM `' . _DB_PREFIX_ . 'feature_lang` WHERE `name` = "' . pSQL($feature_name) . '" AND `id_lang` = ' . (int) $id_lang);
                        } else {
                            $id_feature = $db->getValue('SELECT `id_feature` FROM `' . _DB_PREFIX_ . 'feature_lang` WHERE `name` = "' . pSQL($feature_name) . '"');
                        }
                        // Si la caractéristique existe (id_feature n'est pas vide), on continue le traitement
                        if ($id_feature) {
                            if ($id_lang) {
                                $id_feature_value = $db->getValue('SELECT fv.`id_feature_value` FROM `' . _DB_PREFIX_ . 'feature_value` fv LEFT JOIN `' . _DB_PREFIX_ . 'feature_value_lang` fvl ON fv.`id_feature_value` = fvl.`id_feature_value` WHERE fvl.`value` = "' . pSQL($feature_value) . '" AND fv.`id_feature` = ' . (int) $id_feature . ' AND fvl.`id_lang` = ' . (int) $id_lang);
                            } else {
                                $id_feature_value = $db->getValue('SELECT fv.`id_feature_value` FROM `' . _DB_PREFIX_ . 'feature_value` fv LEFT JOIN `' . _DB_PREFIX_ . 'feature_value_lang` fvl ON fv.`id_feature_value` = fvl.`id_feature_value` WHERE fvl.`value` = "' . pSQL($feature_value) . '" AND fv.`id_feature` = ' . (int) $id_feature);
                            }
                            // Si la valeur de la caractéristique existe (id_feature_value n'est pas vide), on ajoute cette caractéristique au produit
                            if ($id_feature_value) {
                                // Assumant que $id_product est l'ID de votre produit
                                $product = new Product((int) $id_product);

                                // Vérifier si le produit existe
                                if (Validate::isLoadedObject($product)) {
                                    // Vérifier si la caractéristique est déjà liée au produit
                                    $is_feature_linked = $db->getValue('SELECT COUNT(*) FROM `' . _DB_PREFIX_ . 'feature_product` WHERE `id_product` = ' . (int) $id_product . ' AND `id_feature` = ' . (int) $id_feature . ' AND `id_feature_value` = ' . (int) $id_feature_value);

                                    // Si la caractéristique n'est pas déjà liée, ajoutez-la
                                    if ($is_feature_linked == 0) {
                                        $product->addFeaturesToDB($id_feature, $id_feature_value);
                                    }
                                }
                            } else {
                                $featuresNotFound .= $feature_name . ' : ' . $feature_value . '--';
                            }
                        }
                    }
                }

                exit(json_encode([
                    'status' => true,
                    'message' => 'Features generated successfully, you must reload the page to see the changes.',
                    'features_found' => $features,
                    'features_list' => $featuresList,
                    'features_not_found' => $featuresNotFound,
                ]));
            }

            $prompt = WizardPrompt::getPromptByAction($action);
            if ($prompt !== null) {
                // Utilisez $prompt comme nécessaire
                // ...
                $promptContentCompiled = WizardPrompt::compilePromptContent($prompt->content, Tools::getValue('text'), $prompt->entity, Tools::getValue('id_entity'), Tools::getValue('locale'));
                $use_markdown = true;
                // if meta_title or meta_description, disable markdown
                if (in_array($prompt->field, ['meta_title', 'meta_description']) || $prompt->entity == 'cms_category') {
                    $use_markdown = false;
                }

                if ($prompt->append_to_text) {
                    $message = WizardAI::ask($promptContentCompiled, Tools::getValue('locale'), Tools::getValue('text'), $use_markdown);
                } else {
                    $message = WizardAI::ask($promptContentCompiled, Tools::getValue('locale'), false, $use_markdown);
                }

                exit(json_encode([
                    'status' => true,
                    'message' => 'Your prompt has been generated successfully.',
                    'prompt' => $promptContentCompiled,
                    'descriptions' => $message,
                ]));
            } else {
                exit(json_encode([
                    'status' => false,
                    'error' => 'Prompt not found for the specified action.',
                ]));
            }
        } catch (Exception $e) {
            exit(json_encode([
                'status' => false,
                'error' => $e->getMessage(),
            ]));
        }
    }

    /**
     * Push products into queue jobs
     *
     * @return void
     */
    public function ajaxProcessGenerateBulkProductsContent()
    {
        $products = Tools::getValue('products');
        $contextShopId = (int) Tools::getValue('context_shop_id');
        // get all shop
        if (Shop::isFeatureActive()) {
            // check if current context is all shop or group shop
            if ($contextShopId === Shop::CONTEXT_ALL || $contextShopId === Shop::CONTEXT_GROUP) {
                $shops = Shop::getShops(true, null, true);
                foreach ($shops as $idShop) {
                    foreach ($products as $id_product) {
                        $this->addProductToCron($id_product, $idShop);
                    }
                }
            } else {
                $idShop = Context::getContext()->shop->id;

                foreach ($products as $id_product) {
                    $this->addProductToCron($id_product, $idShop);
                }
            }
        } else {
            $idShop = Context::getContext()->shop->id;

            foreach ($products as $id_product) {
                $this->addProductToCron($id_product, $idShop);
            }
        }
    }

    /**
     * Push Categories into queue jobs
     *
     * @return void
     */
    public function ajaxProcessGenerateBulkCategoriesContent()
    {
        $categories = Tools::getValue('categories');
        $contextShopId = (int) Tools::getValue('context_shop_id');
        // get all shop
        if (Shop::isFeatureActive()) {
            // check if current context is all shop or group shop
            if ($contextShopId === Shop::CONTEXT_ALL || $contextShopId === Shop::CONTEXT_GROUP) {
                $shops = Shop::getShops(true, null, true);
                foreach ($shops as $idShop) {
                    foreach ($categories as $id_category) {
                        $this->addCategoryToCron($id_category, $idShop);
                    }
                }
            } else {
                $idShop = Context::getContext()->shop->id;

                foreach ($categories as $id_category) {
                    $this->addCategoryToCron($id_category, $idShop);
                }
            }
        } else {
            $idShop = Context::getContext()->shop->id;

            foreach ($categories as $id_category) {
                $this->addCategoryToCron($id_category, $idShop);
            }
        }
    }

    /**
     * Process to generate bulk categories content with subcategories.
     *
     * @return void
     */
    private function ajaxProcessGenerateBulkCategoriesContentWithSubCategories()
    {
        $categories = Tools::getValue('categories');
        $contextShopId = (int) Tools::getValue('context_shop_id');

        // Get all shop
        if (Shop::isFeatureActive()) {
            // Check if the current context is all shop or group shop
            if ($contextShopId === Shop::CONTEXT_ALL || $contextShopId === Shop::CONTEXT_GROUP) {
                $shops = Shop::getShops(true, null, true);
                foreach ($shops as $idShop) {
                    foreach ($categories as $id_category) {
                        $this->addCategoryWithSubCategoriesToCron($id_category, $idShop);
                    }
                }
            } else {
                $idShop = Context::getContext()->shop->id;

                foreach ($categories as $id_category) {
                    $this->addCategoryWithSubCategoriesToCron($id_category, $idShop);
                }
            }
        } else {
            $idShop = Context::getContext()->shop->id;

            foreach ($categories as $id_category) {
                $this->addCategoryWithSubCategoriesToCron($id_category, $idShop);
            }
        }
    }

    /**
     * Add category and its subcategories to the cron job.
     *
     * @param int $id_category Category ID
     * @param int $idShop Shop ID
     * @param bool $only_empty Only generate content for empty fields
     *
     * @return void
     */
    private function addCategoryWithSubCategoriesToCron($id_category, $idShop = null, $only_empty = false)
    {
        if ($idShop === null) {
            $idShop = $this->context->shop->id;
        }

        // Get default lang id for the current shop
        $defaultIdLang = (int) Configuration::get('PS_LANG_DEFAULT', null, null, $idShop);

        $this->addCategoryToCron($id_category, $idShop, $only_empty);

        // Recursively add subcategories
        $this->addSubcategoriesToCron($id_category, $idShop, $only_empty, $defaultIdLang);
    }

    /**
     * Recursively add subcategories to the cron job.
     *
     * @param int $id_category Category ID
     * @param int $idShop Shop ID
     * @param bool $only_empty Only generate content for empty fields
     * @param int $defaultIdLang Default language ID
     *
     * @return void
     */
    private function addSubcategoriesToCron($id_category, $idShop, $only_empty, $defaultIdLang)
    {
        // Get subcategories of the current category
        $subCategories = Category::getChildren($id_category, $defaultIdLang);

        // Add prompts for each subcategory
        foreach ($subCategories as $subCategory) {
            $entityId = (int) $subCategory['id_category'];
            $this->addCategoryToCron($entityId, $idShop, $only_empty);
            // Recursively add subcategories of this subcategory
            $this->addSubcategoriesToCron($entityId, $idShop, $only_empty, $defaultIdLang);
        }
    }

    private function addProductToCron($id_product, $idShop = null, $only_empty = false)
    {
        $wizardJob = new WizardJob();

        if ($idShop === null) {
            $idShop = $this->context->shop->id;
        }
        $languages = Language::getLanguages(true, $idShop);
        // get default lang id for current shop
        $defaultIdLang = (int) Configuration::get('PS_LANG_DEFAULT', null, null, $idShop);
        foreach ($languages as $language) {
            $idLang = (int) $language['id_lang'];
            // detect if all shops are selected
            $entity = 'product';
            $entityId = (int) $id_product;
            $prompts = WizardPrompt::getPromptsForCron('product');
            foreach ($prompts as $prompt) {
                if ($only_empty) {
                    $product = new Product($id_product, $idLang, $idShop);
                    if (!empty($product->{$prompt->field})) {
                        continue;
                    }
                }
                if ($prompt->translate_result && $defaultIdLang != $idLang) {
                    $wizardJob->add($entity, $entityId, 'translate_' . $prompt->action, $idLang, $idShop);
                } else {
                    $wizardJob->add($entity, $entityId, $prompt->action, $idLang, $idShop);
                }
            }
        }
    }

    private function addCategoryToCron($id_category, $idShop = null, $only_empty = false)
    {
        $wizardJob = new WizardJob();

        if ($idShop === null) {
            $idShop = $this->context->shop->id;
        }
        $languages = Language::getLanguages(true, $idShop);
        // get default lang id for current shop
        $defaultIdLang = (int) Configuration::get('PS_LANG_DEFAULT', null, null, $idShop);
        foreach ($languages as $language) {
            $idLang = (int) $language['id_lang'];
            // detect if all shops are selected
            $entity = 'category';
            $entityId = (int) $id_category;
            $prompts = WizardPrompt::getPromptsForCron('category');
            foreach ($prompts as $prompt) {
                if ($only_empty) {
                    $category = new Category($id_category, $idLang, $idShop);
                    if (!empty($category->{$prompt->field})) {
                        continue;
                    }
                }
                if ($prompt->translate_result && $defaultIdLang != $idLang) {
                    $wizardJob->add($entity, $entityId, 'translate_' . $prompt->action, $idLang, $idShop);
                } else {
                    $wizardJob->add($entity, $entityId, $prompt->action, $idLang, $idShop);
                }
            }
        }
    }

    public function getAllFeaturesAndValues()
    {
        $db = Db::getInstance();

        $features = $db->executeS('SELECT * FROM `' . _DB_PREFIX_ . 'feature_lang` WHERE `id_lang` = ' . (int) Context::getContext()->language->id);
        $results = [];

        foreach ($features as $feature) {
            $values = $db->executeS('SELECT fv.id_feature, fvl.`value` FROM `' . _DB_PREFIX_ . 'feature_value` fv LEFT JOIN `' . _DB_PREFIX_ . 'feature_value_lang` fvl ON fv.`id_feature_value` = fvl.`id_feature_value` WHERE fv.`id_feature` = ' . (int) $feature['id_feature'] . ' AND fvl.`id_lang` = ' . (int) Context::getContext()->language->id);
            $valueNames = [];

            foreach ($values as $value) {
                $valueNames[] = $value['value'];
            }

            // Remove duplicates
            $valueNames = array_unique($valueNames);

            $results[$feature['name']] = implode('; ', $valueNames);
        }

        $stringResults = '';
        foreach ($results as $feature_name => $feature_values) {
            $stringResults .= '([' . $feature_name . '] => ' . $feature_values . ")\n";
        }

        return $stringResults;
    }
}
