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

$autoloadPath = dirname(__FILE__) . '/vendor/autoload.php';
if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
}

use Prestashop\ModuleLibMboInstaller\Installer;
use Prestashop\ModuleLibMboInstaller\Presenter;
use PrestaShop\ModuleLibServiceContainer\DependencyInjection\ServiceContainer;
use PrestaShop\PrestaShop\Core\Addon\Module\ModuleManagerBuilder;
use WizardAI\ObjectModels\WizardCharacter;
use WizardAI\ObjectModels\WizardImage;
use WizardAI\ObjectModels\WizardPrompt;
use WizardAI\WizardAI as BaseWizardAI;
use WizardAI\WizardJob;

class WizardAI extends Module
{
    public $WizardJob;
    private $container;

    public function __construct()
    {
        $this->name = 'wizardai';
        $this->tab = 'administration';
        $this->version = '2.0.10';
        $this->author = 'Gekkode';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = ['min' => '1.7.7', 'max' => _PS_VERSION_];
        $this->bootstrap = true;
        $this->module_key = '4a79233096c8c89772be3cde9d35bbe7';

        parent::__construct();
        $this->displayName = $this->trans('WizardAI', [], 'Modules.WizardAI.Admin');
        $this->description = $this->trans('AI Content generation powered by OpenAI (ChatGPT) and Mistral. Easily customize content creation with a prompts editor. Use a cron job to generate a large amount of content.', [], 'Modules.WizardAI.Admin');
        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', [], 'Modules.WizardAI.Admin');

        if ($this->container === null) {
            $this->container = new ServiceContainer(
                $this->name,
                $this->getLocalPath()
            );
        }

        $this->WizardJob = new WizardJob();
    }

    /**
     * @throws PrestaShopException
     * @throws Exception
     */
    public function install()
    {
        $this->MBOInstaller();

        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        require_once dirname(__FILE__) . '/sql/install.php';

        Configuration::updateValue('WIZARDAI_SECURITY_TOKEN', bin2hex(random_bytes(32)));
        Configuration::updateValue('WIZARDAI_CRON_TOKEN', bin2hex(random_bytes(32)));

        Configuration::updateValue('WIZARDAI_CRON_AJAX_TOKEN', bin2hex(random_bytes(32)));

        return parent::install()
            && $this->registerHook('displayBackOfficeHeader')
            && $this->registerHook('actionObjectProductAddAfter')
            && $this->registerHook('actionProductAdd')
            && $this->registerHook('actionCreativeElementsInit')
            && $this->installFixtures()
            && $this->installTab();
    }

    public function MBOInstaller()
    {
        if (!class_exists('Prestashop\ModuleLibMboInstaller\Presenter')) {
            require_once dirname(__FILE__) . '/vendor/prestashop/module-lib-mbo-installer/src/Presenter.php';
        }
        if (!class_exists('Prestashop\ModuleLibMboInstaller\Installer')) {
            require_once dirname(__FILE__) . '/vendor/prestashop/module-lib-mbo-installer/src/Installer.php';
        }
        $mboStatus = (new Presenter())->present();

        if (!$mboStatus['isInstalled']) {
            try {
                $mboInstaller = new Installer(_PS_VERSION_);
                /** @var bool */
                $result = $mboInstaller->installModule();

                // Call the installation of PrestaShop Integration Framework components
                $this->installDependencies();
            } catch (Exception $e) {
                // Some errors can happen, i.e during initialization or download of the module
                $this->context->controller->errors[] = $e->getMessage();

                return 'Error during MBO installation';
            }
        } else {
            $this->installDependencies();
        }
    }

    public function uninstall()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        return parent::uninstall()
            && $this->unregisterHook('displayBackOfficeHeader')
            && $this->unregisterHook('actionObjectProductAddAfter')
            && $this->unregisterHook('actionProductAdd')
            && $this->unregisterHook('actionCreativeElementsInit')
            && $this->uninstallTab();
    }

    /**
     * Install PrestaShop Integration Framework Components
     */
    public function installDependencies()
    {
        $moduleManager = ModuleManagerBuilder::getInstance()->build();

        /* PS Account */
        if (!$moduleManager->isInstalled('ps_accounts')) {
            $moduleManager->install('ps_accounts');
        } elseif (!$moduleManager->isEnabled('ps_accounts')) {
            $moduleManager->enable('ps_accounts');
            $moduleManager->upgrade('ps_accounts');
        } else {
            $moduleManager->upgrade('ps_accounts');
        }

        /* Cloud Sync - PS Eventbus */
        if (!$moduleManager->isInstalled('ps_eventbus')) {
            $moduleManager->install('ps_eventbus');
        } elseif (!$moduleManager->isEnabled('ps_eventbus')) {
            $moduleManager->enable('ps_eventbus');
            $moduleManager->upgrade('ps_eventbus');
        } else {
            $moduleManager->upgrade('ps_eventbus');
        }
    }

    public function enable($force_all = false)
    {
        return parent::enable($force_all)
            && $this->installTab();
    }

    public function disable($force_all = false)
    {
        return parent::disable($force_all)
            && $this->uninstallTab();
    }

    public function hookDisplayBackOfficeHeader($params)
    {
        if ('AdminProducts' == Tools::getValue('controller')) {
            Media::addJsDef([
                'context_shop_id' => Shop::getContext(),
                'cron_enabled' => Configuration::get('WIZARDAI_CRON_ENABLE', null, null, Shop::getContext()),
            ]);
            $this->context->controller->addJS($this->_path . 'views/js/products.js');
        }

        if ('AdminCategories' == Tools::getValue('controller')) {
            Media::addJsDef([
                'context_shop_id' => Shop::getContext(),
                'cron_enabled' => Configuration::get('WIZARDAI_CRON_ENABLE', null, null, Shop::getContext()),
            ]);
            $this->context->controller->addJS($this->_path . 'views/js/categories.js');
        }

        if ('AdminProducts' == Tools::getValue('controller') || 'AdminCategories' == Tools::getValue('controller') || 'AdminSuppliers' == Tools::getValue('controller') || 'AdminManufacturers' == Tools::getValue('controller') || 'AdminCmsContent' == Tools::getValue('controller')) {
            $id_entity = preg_match('/\/products\/([0-9]+)/', $_SERVER['REQUEST_URI'], $matches) ? $matches[1] : null;
            if ($id_entity === null) {
                $id_entity = preg_match('/\/products-v2\/([0-9]+)/', $_SERVER['REQUEST_URI'], $matches) ? $matches[1] : null;
            }
            if ($id_entity === null) {
                $id_entity = preg_match('/\/categories\/([0-9]+)/', $_SERVER['REQUEST_URI'], $matches) ? $matches[1] : null;
            }

            // get shopId by current url
            $ajaxUrl = $this->context->link->getAdminLink('AdminWizardAIAjax', true);
            // Récupérer le domaine actuel
            $currentDomain = $_SERVER['HTTP_HOST'];
            // Analyser l'URL et récupérer le domaine
            $parsedUrl = parse_url($ajaxUrl);
            $originalDomain = $parsedUrl['host'];
            // Remplacer le domaine original par le domaine actuel
            $ajaxUrl = str_replace($originalDomain, $currentDomain, $ajaxUrl);

            // load jquery if not already loaded
            $this->context->controller->addJquery();
            $this->context->controller->addJS($this->_path . 'views/js/wizardai.bundle.js');
            $this->context->controller->addCSS($this->_path . 'views/css/wizardai.css');
            $entity = 'product';

            if ('AdminCategories' == Tools::getValue('controller')) {
                $entity = 'category';
            }
            if ('AdminSuppliers' == Tools::getValue('controller')) {
                $entity = 'supplier';
            }
            if ('AdminManufacturers' == Tools::getValue('controller')) {
                $entity = 'manufacturer';
            }
            if ('AdminCmsContent' == Tools::getValue('controller')) {
                // if url contain /cms-pages/category so cms_category
                if (preg_match('/\/cms-pages\/category/', $_SERVER['REQUEST_URI'])) {
                    $entity = 'cms_category';
                } else {
                    $entity = 'cms';
                }
            }

            Media::addJsDef([
                'ajaxUrl' => $ajaxUrl,
                'labelAskButton' => $this->l('Ask AI'),
                'labelModalTitle' => $this->l('What can I do for you?'),
                'labelPromptTextarea' => $this->l('Send a message...'),
                'labelModalSubmit' => $this->l('Send'),
                'labelModalClose' => $this->l('Close'),
                'prompts' => WizardPrompt::getPromptsByEntity($entity, $id_entity),
                'securityToken' => Configuration::get('WIZARDAI_SECURITY_TOKEN', 1, null, 1),
            ]);
        }

        if ('AdminTranslations' == Tools::getValue('controller')) {
            $ajaxUrl = $this->context->link->getAdminLink('AdminWizardAIAjax', true);
            // Récupérer le domaine actuel
            $currentDomain = $_SERVER['HTTP_HOST'];
            // Analyser l'URL et récupérer le domaine
            $parsedUrl = parse_url($ajaxUrl);
            $originalDomain = $parsedUrl['host'];
            // Remplacer le domaine original par le domaine actuel
            $ajaxUrl = str_replace($originalDomain, $currentDomain, $ajaxUrl);
            $this->context->controller->addJS($this->_path . 'views/js/translations.js');
            $this->context->controller->addCSS($this->_path . 'views/css/wizardai.css');
            Media::addJsDef([
                'ajaxUrl' => $ajaxUrl,
                'lang' => Tools::getValue('lang'),
                'labelTranslateButton' => $this->l('Translate with WizardAI'),
                'securityToken' => Configuration::get('WIZARDAI_SECURITY_TOKEN', 1, null, 1),
                'wizardai_ps_account_id' => Configuration::get('WIZARDAI_PS_ACCOUNT_ID'),
            ]);
        }

        if ('AdminWizardAIConfig' == Tools::getValue('controller')) {
            // $ajaxUrl = Context::getContext()->link->getBaseLink() . 'modules/wizardai/ajax.php';
            $this->context->controller->addJS($this->_path . 'views/js/wizardai.bundle.js');
            $ajaxUrl = $this->context->link->getAdminLink('AdminWizardAIAjax', true);
            // TODO get WIZARDAI_CRON_AJAX_TOKEN or generate a new one

            $token = Configuration::get('WIZARDAI_CRON_AJAX_TOKEN');
            if (!$token) {
                $token = bin2hex(random_bytes(32));
                Configuration::updateValue('WIZARDAI_CRON_AJAX_TOKEN', $token);
            }
            Media::addJsDef([
                'ajaxUrl' => $ajaxUrl,
                'securityToken' => Configuration::get('WIZARDAI_SECURITY_TOKEN', 1, null, 1),
                'psToken' => BaseWizardAI::tokenHeader(true),
                'ajaxWizardAIToken' => $token,
                'wizardai_ps_account_id' => Configuration::get('WIZARDAI_PS_ACCOUNT_ID'),
            ]);

            $this->context->controller->addJS('https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js');
            $this->context->controller->addJS('https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/twig/twig.min.js');

            $this->context->controller->addCSS('https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css');
            $this->context->controller->addCSS('https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/theme/darcula.min.css');

            $this->context->controller->addCSS('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');

            $this->context->controller->addJS($this->_path . 'views/js/back.js');
            $this->context->controller->addCSS($this->_path . 'views/css/wizardai.bundle.css');
        }
    }

    public function installFixtures()
    {
        // Vérifier si les tables sont vides
        if (!WizardCharacter::isEmpty() || !WizardPrompt::isEmpty()) {
            // Une des tables n'est pas vide, donc on ne procède pas à l'ajout des fixtures
            return true;
        }

        $wizardCharacterIds = [];

        // start id of table wizard_characters and wizard_prompts to 1
        $db = Db::getInstance();
        $db->execute('ALTER TABLE `' . _DB_PREFIX_ . 'wizard_characters` AUTO_INCREMENT = 1');
        $db->execute('ALTER TABLE `' . _DB_PREFIX_ . 'wizard_prompts` AUTO_INCREMENT = 1');

        // Obtenir le nombre de boutiques et de langues actives
        $shops = Shop::getShops(true, null, true);
        $languages = Language::getLanguages(true);

        // Obtenir le chemin du fichier CSV
        $csvPath = dirname(__FILE__) . '/sql/wizard_characters.csv';

        // Vérifier si le fichier existe
        if (!file_exists($csvPath)) {
            return false;
        }

        // Ouvrir le fichier CSV
        if (($handle = fopen($csvPath, 'r')) !== false) {
            // Lire la première ligne du fichier CSV (entêtes de colonnes)
            $headers = fgetcsv($handle, null, ';');
            // Parcourir les données du fichier CSV
            while (($row = fgetcsv($handle, null, ';')) !== false) {
                // Associer les entêtes de colonnes aux valeurs
                $data = array_combine($headers, $row);

                // Créer un nouvel enregistrement de wizard_prompts pour chaque boutique
                foreach ($shops as $id_shop) {
                    $character = new WizardCharacter();
                    $character->name = $data['name'];
                    $character->function = $data['function'];
                    $character->content = $data['content'];
                    $character->is_default = (bool) $data['is_default'];
                    $character->is_active = (bool) $data['is_active'];
                    $character->id_shop = $id_shop;
                    $character->add();
                    $wizardCharacterIds[$data['id_wizard_character']][$id_shop] = $character->id;
                }
            }
            // Fermer le fichier CSV
            fclose($handle);
        }

        // Obtenir le chemin du fichier CSV
        $csvPath = dirname(__FILE__) . '/sql/wizard_prompts.csv';

        // Vérifier si le fichier existe
        if (!file_exists($csvPath)) {
            return false;
        }

        // Ouvrir le fichier CSV
        if (($handle = fopen($csvPath, 'r')) !== false) {
            // Lire la première ligne du fichier CSV (entêtes de colonnes)
            $headers = fgetcsv($handle, null, ';');

            // Parcourir les données du fichier CSV
            while (($row = fgetcsv($handle, null, ';')) !== false) {
                // Associer les entêtes de colonnes aux valeurs
                $data = array_combine($headers, $row);

                // Créer un nouvel enregistrement de wizard_prompts pour chaque boutique
                foreach ($shops as $id_shop) {
                    $prompt = new WizardPrompt();
                    $prompt->name = $data['name'];
                    $prompt->entity = $data['entity'];
                    $prompt->field = $data['field'];
                    $data['content'] = base64_decode($data['content']);
                    $prompt->content = $data['content'];
                    $prompt->append_to_text = (bool) $data['append_to_text'];
                    $prompt->translate_result = (bool) $data['translate_result'];
                    $prompt->add_to_cron = (bool) $data['add_to_cron'];
                    $prompt->is_default = (bool) $data['is_default'];
                    $prompt->is_active = (bool) $data['is_active'];
                    $prompt->model = $data['model'];
                    $prompt->temperature = $data['temperature'];
                    $prompt->top_p = $data['top_p'];
                    $prompt->repeat_penalty = $data['repeat_penalty'];
                    if (isset($wizardCharacterIds[$data['id_character']][$id_shop])) {
                        $prompt->id_character = $wizardCharacterIds[$data['id_character']][$id_shop];
                    } else {
                        $prompt->id_character = (int) $data['id_character'];
                    }
                    $prompt->id_shop = $id_shop;
                    // Créer les labels pour chaque langue
                    $labels = [];
                    foreach ($languages as $language) {
                        $labels[$language['id_lang']] = $data['label'];
                    }
                    $prompt->label = $labels;

                    // Enregistrer le prompt
                    if ($prompt->save()) {
                        WizardPrompt::activeAllCategoriesByIdsPrompt([$prompt->id]);
                    }
                }
            }

            // Fermer le fichier CSV
            fclose($handle);
        }

        return true;
    }

    private function installTab()
    {
        $tabId = (int) Tab::getIdFromClassName('AdminWizardAIAjax');
        $tab = new Tab($tabId);
        if (!$tabId) {
            $tabId = null;
        }
        $tab->active = 1;
        $tab->class_name = 'AdminWizardAIAjax';
        $tab->name = [];
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = $this->trans('WizardAI AJAX', [], 'Modules.WizardAI.Admin', $lang['locale']);
        }
        $tab->id_parent = (int) 0;
        $tab->module = $this->name;

        $tab->save();
        $tabId = (int) Tab::getIdFromClassName('AdminWizardAIConfig');
        if (!$tabId) {
            $tabId = null;
        }

        $tab = new Tab($tabId);
        $tab->active = 1;
        $tab->class_name = 'AdminWizardAIConfig';
        $tab->name = [];
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = $this->trans('WizardAI', [], 'Modules.WizardAI.Admin', $lang['locale']);
        }
        $tab->id_parent = (int) Tab::getIdFromClassName('AdminAdvancedParameters');
        $tab->module = $this->name;

        return $tab->save();
    }

    private function uninstallTab()
    {
        $tabId = (int) Tab::getIdFromClassName('AdminWizardAIAjax');
        if (!$tabId) {
            return true;
        }

        $tab = new Tab($tabId);

        $tab->delete();

        $tabId = (int) Tab::getIdFromClassName('AdminWizardAIConfig');
        if (!$tabId) {
            return true;
        }

        $tab = new Tab($tabId);

        return $tab->delete();
    }

    public function postProcess()
    {
        if (Tools::getValue('configure') == $this->name) {
            $redirectLink = $this->context->link->getAdminLink('AdminWizardAIConfig', true);
            Tools::redirectAdmin($redirectLink);
        }
    }

    public function getContent()
    {
        $this->postProcess();
    }

    public function hookactionCreativeElementsInit()
    {
        // Check if the module is enabled and if version is > 2.0.0
        if (!Module::isEnabled('creativeelements') || !version_compare(Module::getInstanceByName('creativeelements')->version, '2.0.0', '>=')) {
            return;
        }

        $ajaxUrl = $this->context->link->getAdminLink('AdminWizardAIAjax', true);

        // load jquery if not already loaded
        $this->context->controller->addJquery();
        $this->context->controller->addCSS($this->_path . 'views/css/wizardai.elementor.css');

        $this->context->smarty->assign([
            'ajaxUrl' => $ajaxUrl,
            'path' => $this->_path,
            'labelAskButton' => $this->l('Ask AI'),
            'labelModalTitle' => $this->l('What can I do for you?'),
            'labelPromptTextarea' => $this->l('Send a message...'),
            'labelModalSubmit' => $this->l('Send'),
            'labelModalClose' => $this->l('Close'),
            'securityToken' => Configuration::get('WIZARDAI_SECURITY_TOKEN', 1, null, 1),
            'wizardai_ps_account_id' => Configuration::get('WIZARDAI_PS_ACCOUNT_ID'),
        ]);

        $smartyContent = $this->context->smarty->fetch(_PS_MODULE_DIR_ . 'wizardai/views/templates/hook/wizardai_elementor.tpl');

        CE\add_action('wp_footer', function () use ($smartyContent) {
            echo $smartyContent;
        });
        require_once dirname(__FILE__) . '/src/WizardElementor.php';
        new WizardElementor();
    }

    public function addProductToCron($id_product, $idShop = null, $only_empty = false)
    {
        if ($idShop === null) {
            $idShop = $this->context->shop->id;
        }
        $languages = Language::getLanguages(true, $idShop);
        $defaultIdLang = (int) Configuration::get('PS_LANG_DEFAULT', null, null, $idShop);
        foreach ($languages as $language) {
            $idLang = (int) $language['id_lang'];
            // detect if all shops are selected
            $entity = 'product';
            $entityId = (int) $id_product;
            $prompts = WizardPrompt::getPromptsForCron('product');

            foreach ($prompts as $prompt) {
                if ($only_empty) {
                    $product = new Product($id_product, false, $idLang, $idShop);
                    if (!empty($product->{$prompt->field})) {
                        continue;
                    }
                }
                // if prompt has translate_result
                if ($prompt->translate_result && $defaultIdLang != $idLang) {
                    $this->WizardJob->add($entity, $entityId, 'translate_' . $prompt->action, $idLang, $idShop);
                } else {
                    $this->WizardJob->add($entity, $entityId, $prompt->action, $idLang, $idShop);
                }
            }
        }
    }

    public function addProductReformatToCron($id_product, $idShop = null)
    {
        if ($idShop === null) {
            $idShop = $this->context->shop->id;
        }
        $languages = Language::getLanguages(true, $idShop);
        foreach ($languages as $language) {
            $idLang = (int) $language['id_lang'];
            // detect if all shops are selected
            $entity = 'product';
            $entityId = (int) $id_product;
            // get description of current lang
            $product = new Product($id_product, false, $idLang, $idShop);
            if (!$this->isOnlyText($product->description)) {
                continue;
            }
            $this->WizardJob->add($entity, $entityId, 'reformat_product_description', $idLang, $idShop);
        }
    }

    public function addCategoryReformatToCron($id_category, $idShop = null)
    {
        if ($idShop === null) {
            $idShop = $this->context->shop->id;
        }
        $languages = Language::getLanguages(true, $idShop);
        foreach ($languages as $language) {
            $idLang = (int) $language['id_lang'];
            // detect if all shops are selected
            $entity = 'category';
            $entityId = (int) $id_category;
            // get description of current lang
            $category = new Category($id_category, $idLang, $idShop);
            if (!$this->isOnlyText($category->description)) {
                continue;
            }
            $this->WizardJob->add($entity, $entityId, 'reformat_category_description', $idLang, $idShop);
        }
    }

    public function addCategoryToCron($id_category, $idShop = null, $only_empty = false)
    {
        if ($idShop === null) {
            $idShop = $this->context->shop->id;
        }
        $languages = Language::getLanguages(true, $idShop);
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
                    $this->WizardJob->add($entity, $entityId, 'translate_' . $prompt->action, $idLang, $idShop);
                } else {
                    $this->WizardJob->add($entity, $entityId, $prompt->action, $idLang, $idShop);
                }
            }
        }
    }

    public function isOnlyText($text)
    {
        $text = trim($text);

        if (empty($text)) {
            return false;
        }

        $openTag = '<p';
        $closeTag = '>';
        $fullTag = $openTag . $closeTag;

        $countP = substr_count($text, $fullTag);

        if ($countP > 1) {
            return false;
        }

        if (preg_match('/<(?!(br\s*\/?|\/?p\s*>))/', $text)) {
            return false;
        }

        return true;
    }

    public function deleteImage($id_wizardai_image)
    {
        $wizardImage = new WizardImage((int) $id_wizardai_image);
        if ($wizardImage->deleteWizardAIImage()) {
            return true;
        } else {
            return false;
        }
    }

    public function toJson()
    {
        return json_encode($this);
    }

    /**
     * Retrieve service
     *
     * @param string $serviceName
     *
     * @return mixed
     */
    public function getService($serviceName)
    {
        return $this->container->getService($serviceName);
    }
}
