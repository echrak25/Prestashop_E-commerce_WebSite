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

namespace WizardAI\Controllers;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Category;
use Shop;
use WizardAI\ObjectModels\WizardCharacter;
use WizardAI\ObjectModels\WizardPrompt;
use WizardAI\UI\Table;
use WizardAI\UI\TableAdvanced;
use WizardAI\WizardAIModel;

class TemplateController extends WizardAdminController
{
    public function view()
    {
        $this->assignContextData();
        $this->addResources();
        $this->configureAjaxUrl();
        $this->assignPromptsData();

        return $this->fetchTemplates();
    }

    /**
     * Edit page of the controller
     *
     * @return string
     */
    public function editPrompt()
    {
        return $this->getPromptForm();
    }

    /**
     * Create page of the controller
     *
     * @return string
     */
    public function createPrompt()
    {
        return $this->getPromptForm();
    }

    public function deletePrompt()
    {
        if ($this->checkDemoMode()) {
            return;
        }

        $wizardPrompt = new WizardPrompt((int) \Tools::getValue('id'));

        if ($wizardPrompt->delete()) {
            $this->addConfirmation($this->trans('Prompt ' . $wizardPrompt->name . ' has been deleted'));
        } else {
            $this->addError($this->trans('An error occurred while deleting the prompt'));
        }
    }

    /**
     * Store page of the controller
     *
     * @return void
     */
    public function storePrompt()
    {
        if ($this->checkDemoMode() || !$this->isFormSubmission()) {
            $this->redirect();
        }

        $wizardPrompt = new WizardPrompt();
        $wizardPrompt->name = \Tools::getValue('name');
        $wizardPrompt->id_character = \Tools::getValue('id_character');
        $wizardPrompt->entity = \Tools::getValue('entity');
        $wizardPrompt->field = \Tools::getValue('field');
        $wizardPrompt->content = json_encode(\Tools::getValue('content'));
        if (!empty(\Tools::getValue('add_to_cron')) && \Tools::getValue('add_to_cron') == 'on') {
            $wizardPrompt->add_to_cron = 1;
        } else {
            $wizardPrompt->add_to_cron = 0;
        }
        if (!empty(\Tools::getValue('translate_result')) && \Tools::getValue('translate_result') == 'on') {
            $wizardPrompt->translate_result = 1;
        } else {
            $wizardPrompt->translate_result = 0;
        }
        $wizardPrompt->append_to_text = 0;
        if (!empty(\Tools::getValue('is_active')) && \Tools::getValue('is_active') == 'on') {
            $wizardPrompt->is_active = 1;
        } else {
            $wizardPrompt->is_active = 0;
        }
        $wizardPrompt->model = \Tools::getValue('model');
        $wizardPrompt->temperature = \Tools::getValue('temperature');
        $wizardPrompt->top_p = \Tools::getValue('top_p');
        $wizardPrompt->repeat_penalty = \Tools::getValue('repeat_penalty');

        // add multilang label
        $wizardPrompt->label = [];

        // get default lang
        $defaultLang = \Configuration::get('PS_LANG_DEFAULT');
        $labels = \Tools::getValue('label');
        $wizardPrompt->label[$defaultLang] = \Tools::getValue('label_' . $defaultLang);

        foreach (\Language::getLanguages(true) as $lang) {
            if (empty($labels[$lang['id_lang']])) {
                $wizardPrompt->label[$lang['id_lang']] = $labels[$defaultLang];
            } else {
                $wizardPrompt->label[$lang['id_lang']] = $labels[$lang['id_lang']];
            }
        }

        $wizardPrompt->addConditionField('categories', \Tools::getValue('categories'));
        $wizardPrompt->id_shop = (int) $this->context->shop->id;
        if ($wizardPrompt->save()) {
            $this->addConfirmation($this->trans('Prompt Configuration saved successfully'));
        } else {
            $this->addError($this->trans('An error occurred while saving the prompt configuration'));
        }
        $this->redirect();
    }

    /**
     * Update page of the controller
     *
     * @return void
     */
    public function updatePrompt()
    {
        if ($this->checkDemoMode() || !$this->isFormSubmission()) {
            $this->redirect();
        }

        $wizardPrompt = new WizardPrompt((int) \Tools::getValue('id_wizard_prompt'));
        $wizardPrompt->name = \Tools::getValue('name');
        $wizardPrompt->id_character = \Tools::getValue('id_character');
        $wizardPrompt->entity = \Tools::getValue('entity');
        if (\Tools::getValue('field')) {
            $wizardPrompt->field = \Tools::getValue('field');
        }
        $wizardPrompt->content = json_encode(\Tools::getValue('content'));
        if (!empty(\Tools::getValue('add_to_cron')) && \Tools::getValue('add_to_cron') == 'on') {
            $wizardPrompt->add_to_cron = 1;
        } else {
            $wizardPrompt->add_to_cron = 0;
        }
        if (!empty(\Tools::getValue('translate_result')) && \Tools::getValue('translate_result') == 'on') {
            $wizardPrompt->translate_result = 1;
        } else {
            $wizardPrompt->translate_result = 0;
        }
        $wizardPrompt->append_to_text = 0;
        if (!empty(\Tools::getValue('is_active')) && \Tools::getValue('is_active') == 'on') {
            $wizardPrompt->is_active = 1;
        } else {
            $wizardPrompt->is_active = 0;
        }
        $wizardPrompt->model = \Tools::getValue('model');
        $wizardPrompt->temperature = \Tools::getValue('temperature');
        $wizardPrompt->top_p = \Tools::getValue('top_p');
        $wizardPrompt->repeat_penalty = \Tools::getValue('repeat_penalty');

        // add multilang label
        $wizardPrompt->label = [];

        // get default lang
        $defaultLang = \Configuration::get('PS_LANG_DEFAULT');
        $labels = \Tools::getValue('label');
        $wizardPrompt->label[$defaultLang] = \Tools::getValue('label_' . $defaultLang);

        foreach (\Language::getLanguages(true) as $lang) {
            if (empty($labels[$lang['id_lang']])) {
                $wizardPrompt->label[$lang['id_lang']] = $labels[$defaultLang];
            } else {
                $wizardPrompt->label[$lang['id_lang']] = $labels[$lang['id_lang']];
            }
        }

        $wizardPrompt->addConditionField('categories', \Tools::getValue('categories'));
        $wizardPrompt->id_shop = (int) $this->context->shop->id;
        if ($wizardPrompt->save()) {
            $this->addConfirmation($this->trans('Prompt Configuration saved successfully'));
        } else {
            $this->addError($this->trans('An error occurred while saving the prompt configuration'));
        }
        $this->redirect();
    }

    public function togglePrompt()
    {
        if ($this->checkDemoMode()) {
            $this->redirect();
        }
        $wizardPrompt = new WizardPrompt((int) \Tools::getValue('id'));
        $wizardPrompt->is_active = !$wizardPrompt->is_active;
        $wizardPrompt->save();
        $this->addConfirmation($this->trans('Prompt ' . $wizardPrompt->name . ' is now ' . ($wizardPrompt->is_active ? 'active' : 'inactive')));
        $this->redirect();
    }

    public function bulkActivatePrompts()
    {
        if ($this->checkDemoMode()) {
            $this->redirect();
        }
        if (!\Tools::getValue('bulk')) {
            $this->addError('No prompts selected');
            $this->redirect();
        }
        WizardPrompt::activeAllPromptsByIds(\Tools::getValue('bulk'));
        $this->addConfirmation($this->trans('Selected prompts are now active'));
        $this->redirect();
    }

    public function bulkDisablePrompts()
    {
        if ($this->checkDemoMode()) {
            $this->redirect();
        }

        if (!\Tools::getValue('bulk')) {
            $this->addError('No prompts selected');
            $this->redirect();
        }

        WizardPrompt::desactiveAllPromptsByIds(\Tools::getValue('bulk'));
        $this->addConfirmation($this->trans('Selected prompts are now inactive'));
        $this->redirect();
    }

    public function bulkDeletePrompts()
    {
        if ($this->checkDemoMode()) {
            $this->redirect();
        }

        if (!\Tools::getValue('bulk')) {
            $this->addError('No prompts selected');
            $this->redirect();
        }

        WizardPrompt::deletePromptsByIds(\Tools::getValue('bulk'));
        $this->addConfirmation($this->trans('Selected prompts have been deleted'));
        $this->redirect();
    }

    public function bulkActiveCategoriesPrompts()
    {
        if ($this->checkDemoMode()) {
            $this->redirect();
        }

        if (!\Tools::getValue('bulk')) {
            $this->addError('No prompts selected');
            $this->redirect();
        }

        WizardPrompt::activeAllCategoriesByIdsPrompt(\Tools::getValue('wizard_promptsBox'));
        $this->addConfirmation($this->trans('Categories are now active for the selected prompts'));
        $this->redirect();
    }

    /**
     * Edit page of the controller
     *
     * @return string
     */
    public function editCharacter()
    {
        $character = new WizardCharacter((int) \Tools::getValue('id'));

        $formParams = [
            'tokens' => \Tools::getAdminTokenLite($this->admin_controllers->controller_name),
            'adminLink' => $this->context->link->getAdminLink($this->admin_controllers->controller_name, false) . '&tab=' . self::$tab,
            'action' => (\Tools::getValue('a') == 'createCharacter' ? 'storeCharacter' : 'updateCharacter'),
            'data' => $character->toArray(),
        ];

        $this->generateActionURLs($formParams);

        $this->context->smarty->assign('form', $formParams);

        return $this->getCharacterForm();
    }

    /**
     * Create page of the controller
     *
     * @return string
     */
    public function createCharacter()
    {
        $character = new WizardCharacter();

        $formParams = [
            'tokens' => \Tools::getAdminTokenLite($this->admin_controllers->controller_name),
            'adminLink' => $this->context->link->getAdminLink($this->admin_controllers->controller_name, false) . '&tab=' . self::$tab,
            'action' => (\Tools::getValue('a') == 'createCharacter' ? 'storeCharacter' : 'updateCharacter'),
            'data' => $character->toArray(),
        ];

        $this->generateActionURLs($formParams);

        $this->context->smarty->assign('form', $formParams);

        return $this->getCharacterForm();
    }

    public function deleteCharacter()
    {
        if ($this->checkDemoMode() || !$this->isFormSubmission()) {
            $this->redirect();
        }

        $idWizardCharacter = (int) \Tools::getValue('id');
        if (!$idWizardCharacter) {
            $this->addError($this->trans('Invalid character ID'));
            $this->redirect();
        }

        $wizardCharacter = new WizardCharacter($idWizardCharacter);
        if (!\Validate::isLoadedObject($wizardCharacter)) {
            $this->addError($this->trans('Character not found'));
            $this->redirect();
        }

        if ($wizardCharacter->delete()) {
            $this->addConfirmation($this->trans('Character deleted successfully'));
        } else {
            $this->addError($this->trans('An error occurred while deleting the character'));
        }

        $this->redirect();
    }

    public function storeCharacter()
    {
        if ($this->checkDemoMode() || !$this->isFormSubmission()) {
            $this->redirect();
        }

        $idWizardCharacter = (int) \Tools::getValue('id_wizard_character');
        $wizardCharacter = new WizardCharacter($idWizardCharacter ?: null);
        $this->populateCharacterData($wizardCharacter);

        if ($wizardCharacter->save()) {
            $wizardCharacter->generatePortraitIfNeeded();
            $this->addConfirmation($this->trans('Character saved successfully'));
        } else {
            $this->addError($this->trans('An error occurred while saving the character'));
        }

        $this->redirect();
    }

    public function updateCharacter()
    {
        if ($this->checkDemoMode() || !$this->isFormSubmission()) {
            $this->redirect();
        }

        $idWizardCharacter = (int) \Tools::getValue('id_wizard_character');
        if (!$idWizardCharacter) {
            $this->addError($this->trans('Invalid character ID'));
            $this->redirect();
        }

        $wizardCharacter = new WizardCharacter($idWizardCharacter);
        if (!\Validate::isLoadedObject($wizardCharacter)) {
            $this->addError($this->trans('Character not found'));
            $this->redirect();
        }

        $this->populateCharacterData($wizardCharacter);

        if ($wizardCharacter->save()) {
            $this->addConfirmation($this->trans('Character updated successfully'));
        } else {
            $this->addError($this->trans('An error occurred while updating the character'));
        }

        $this->redirect();
    }

    public function getPromptForm()
    {
        $wizardPrompt = new WizardPrompt((int) \Tools::getValue('id'));
        if ($wizardPrompt) {
            $data = $wizardPrompt->toArray();
        } else {
            $data = [
                'id' => null,
                'name' => '',
                'id_character' => null,
                'entity' => 'product',
                'field' => 'description',
                'content' => [],
                'add_to_cron' => 0,
                'translate_result' => 1,
                'append_to_text' => 0,
                'is_active' => 1,
                'model' => 'mistral',
                'temperature' => 0.7,
                'top_p' => 0.9,
                'repeat_penalty' => 1.0,
                'categories' => $this->getCategoryTree($this->context->language->id, $this->context->shop->id),
                'label' => [],
            ];
        }

        $formParams = [
            'tokens' => \Tools::getAdminTokenLite($this->admin_controllers->controller_name),
            'adminLink' => $this->context->link->getAdminLink($this->admin_controllers->controller_name, false) . '&tab=' . self::$tab,
            'action' => (\Tools::getValue('a') == 'createPrompt' ? 'storePrompt' : 'updatePrompt'),
            'data' => $data,
        ];
        $this->generateActionURLs($formParams);

        $this->context->smarty->assign('languages', \Language::getLanguages(true));
        $variableModel = WizardAIModel::assignSmartyModelType($data['model']);
        $this->context->smarty->assign($variableModel);
        $this->context->smarty->assign('creditCostPerInstruction', json_decode($variableModel['selectedModel'])->credit_cost_model);
        $this->context->smarty->assign(WizardCharacter::assignSmartyCharacterAvailable($data['id_character']));
        $this->context->smarty->assign(WizardPrompt::getEntitiesPines($data['entity']));
        $this->context->smarty->assign(WizardPrompt::getPromptsFieldsPines('product', $data['field']));
        $this->context->smarty->assign(WizardPrompt::getPromptsFieldsPines('category', $data['field']));
        $this->context->smarty->assign(WizardPrompt::getPromptsFieldsPines('manufacturer', $data['field']));
        $this->context->smarty->assign(WizardPrompt::getPromptsFieldsPines('supplier', $data['field']));
        $this->context->smarty->assign(WizardPrompt::getPromptsFieldsPines('cms', $data['field']));
        $this->context->smarty->assign(WizardPrompt::getPromptsFieldsPines('cms_category', $data['field']));
        $this->context->smarty->assign('form', $formParams);
        $categories = $this->getCategoryTree($this->context->language->id, $this->context->shop->id, $data['categories']);

        $languages = count(\Language::getLanguages(true)) - 1;
        $this->context->smarty->assign('categories', json_encode([$categories]));
        $this->context->smarty->assign('active_languages', $languages);
        $this->context->smarty->assign('translate_result', $data['translate_result']);
        $this->context->smarty->assign('temperature', $data['temperature']);
        $this->context->smarty->assign('top_p', $data['top_p']);
        $this->context->smarty->assign('repeat_penalty', $data['repeat_penalty']);
        \Media::addJsDef([
            'form' => $formParams,
        ]);

        return $this->context->smarty->fetch($this->admin_controllers->getTemplatePath() . 'prompts/form.tpl');
    }

    private function getCategoryTree($id_lang, $id_shop, $categoriesChecked = [])
    {
        // Récupère la catégorie racine pour la boutique
        $root_category = \Category::getRootCategory($id_lang, new \Shop($id_shop));

        $cat = $root_category->recurseLiteCategTree(0);

        // set propriety "checked" to true for root category and each children recursively
        if (!empty($categoriesChecked)) {
            $cat['checked'] = in_array($root_category->id, $categoriesChecked);
        } else {
            $cat['checked'] = true;
        }
        $this->addCheckedPropriety($cat['children'], $categoriesChecked);

        return $cat;
    }

    private function addCheckedPropriety(&$children, $categoriesChecked = [])
    {
        foreach ($children as &$child) {
            // Définit la propriété "checked" pour chaque enfant
            if (!empty($categoriesChecked)) {
                $child['checked'] = in_array($child['id'], $categoriesChecked);
            } else {
                $child['checked'] = true;
            }
            // Appelle récursivement cette fonction pour tous les enfants de cet enfant
            if (!empty($child['children'])) {
                $this->addCheckedPropriety($child['children'], $categoriesChecked);
            }
        }
    }

    public function getCharacterForm()
    {
        return $this->context->smarty->fetch($this->admin_controllers->getTemplatePath() . 'characters/form.tpl');
    }

    public function getPromptList()
    {
        $params = [
            'tokens' => \Tools::getAdminTokenLite($this->admin_controllers->controller_name),
            'adminLink' => $this->context->link->getAdminLink($this->admin_controllers->controller_name, false) . '&tab=' . self::$tab,
        ];

        $tableParams = [
            'tokens' => $params['tokens'],
            'adminLink' => $params['adminLink'],
            'actions' => [
                'add' => ['text' => 'Add prompt', 'name' => 'createPrompt'],
                'edit' => ['text' => 'Edit', 'name' => 'editPrompt', 'icon' => 'icon-pencil'],
                'delete' => ['text' => 'Delete', 'name' => 'deletePrompt', 'icon' => 'icon-trash'],
            ],
            'bulkActions' => [
                'active' => ['text' => 'Activate prompts', 'name' => 'bulkActivatePrompts', 'icon' => 'icon-pencil'],
                'disable' => ['text' => 'Disable prompts', 'name' => 'bulkDisablePrompts', 'icon' => 'icon-pencil'],
                'delete' => ['text' => 'Delete prompt', 'name' => 'bulkDeletePrompts', 'icon' => 'icon-trash'],
            ],
            'columns' => [
                'name' => 'Name',
                'target' => 'Target',
                'character' => [
                    'name' => 'Character',
                    'template' => '<div class="flex items-center gap-4">
                    <div class="relative h-10 w-10">
                        <img
                                class="h-full w-full rounded-full object-cover object-center"
                                src="{$row.avatar}"
                                alt=""
                        />
                    </div>
                    <div class="text-sm flex items-center">
                        <div class="font-medium text-gray-700">{$row.name}</div>
                    </div>
                </div>',
                ],
                'is_active' => [
                    'name' => 'Status',
                    'template' => '<a href="{$row.href}">
                        <span class="badge {$row.class}">{$row.text}</span>
                </a>',
                ],
            ],
            'data' => WizardPrompt::getFormattedPromptsForTableList($params),
        ];
        $table = new TableAdvanced($this->context, $tableParams);

        return $table->render();
    }

    public function getCharacterList()
    {
        $tableParams = [
            'tokens' => \Tools::getAdminTokenLite($this->admin_controllers->controller_name),
            'adminLink' => $this->context->link->getAdminLink($this->admin_controllers->controller_name, false) . '&tab=' . self::$tab,
            'actions' => [
                'add' => ['text' => 'Add character', 'name' => 'createCharacter'],
                'edit' => ['text' => 'Edit', 'name' => 'editCharacter', 'icon' => 'icon-pencil'],
                'delete' => ['text' => 'Delete', 'name' => 'deleteCharacter', 'icon' => 'icon-trash'],
            ],
            'columns' => [
                'name' => [
                    'name' => 'Name',
                    'template' => '<div class="flex items-center gap-4">
                    <div class="relative h-10 w-10">
                        <img
                                class="h-full w-full rounded-full object-cover object-center"
                                src="{$row.avatar}"
                                alt=""
                        />
                    </div>
                    <div class="text-sm flex items-center">
                        <div class="font-medium text-gray-700">{$row.name}</div>
                    </div>
                </div>',
                ],
                'role' => 'Role',
            ],
            'data' => WizardCharacter::getFormattedCharactersForTableList(),
        ];

        $table = new Table($this->context, $tableParams);

        return $table->render();
    }

    private function populateCharacterData($wizardCharacter)
    {
        $wizardCharacter->name = \Tools::getValue('character_name');
        $wizardCharacter->function = \Tools::getValue('character_function');
        $wizardCharacter->content = \Tools::getValue('editor');
        $wizardCharacter->is_default = 0;
        $wizardCharacter->is_active = 1;
        $wizardCharacter->id_shop = (int) $this->context->shop->id;
    }

    private function assignContextData()
    {
        $allShopsSelected = \Shop::getContext() === \Shop::CONTEXT_ALL || \Shop::getContext() === \Shop::CONTEXT_GROUP;
        $this->context->smarty->assign('wizardai_all_shops_selected', $allShopsSelected);
    }

    private function assignPromptsData()
    {
        // $this->context->smarty->assign('wizardai_prompts', WizardPrompt::getPrompts());
    }

    private function addResources()
    {
        $cssPath = $this->admin_controllers->module->getPathUri() . 'views/css/wizardai.css';
        $jsPath = $this->admin_controllers->module->getPathUri() . 'views/js/wizardai.bundle.js';
        $this->context->controller->addCSS($cssPath);
        $this->context->controller->addJS($jsPath);
    }

    private function fetchTemplates()
    {
        // $debugTemplate = $this->context->smarty->fetch($this->admin_controllers->getTemplatePath() . 'debug.tpl');
        // $warningTemplate = $this->context->smarty->fetch($this->admin_controllers->getTemplatePath() . 'multistore.warning.tpl');

        return $this->getCharacterList() . $this->getPromptList();
    }

    private function configureAjaxUrl()
    {
        $id_entity = preg_match('/\/products\/([0-9]+)/', $_SERVER['REQUEST_URI'], $matches) ? $matches[1] : null;
        if ($id_entity === null) {
            $id_entity = preg_match('/\/categories\/([0-9]+)/', $_SERVER['REQUEST_URI'], $matches) ? $matches[1] : null;
        }

        // get shopId by current url
        // $id_shop = Shop::getContextShopID();
        $ajaxUrl = $this->context->link->getAdminLink('AdminWizardAIAjax', true, false, ['ajax' => true, 'id_product' => $id_entity]);
        // Récupérer le domaine actuel
        $currentDomain = $_SERVER['HTTP_HOST'];
        // Analyser l'URL et récupérer le domaine
        $parsedUrl = parse_url($ajaxUrl);
        $originalDomain = $parsedUrl['host'];
        // Remplacer le domaine original par le domaine actuel
        $ajaxUrl = str_replace($originalDomain, $currentDomain, $ajaxUrl);

        $this->context->smarty->assign('ajaxUrl', $ajaxUrl);

        \Media::addJsDef([
            'ajaxUrl' => $ajaxUrl,
            'securityToken' => \Configuration::get('WIZARDAI_SECURITY_TOKEN'),
        ]);
    }
}
