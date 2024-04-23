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
use PrestaShop\PrestaShop\Core\Addon\Module\ModuleManagerBuilder;
use PrestaShop\PsAccountsInstaller\Installer\Exception\InstallerException;
use WizardAI\Controllers\BulkController;
use WizardAI\Controllers\DashboardController;
use WizardAI\Controllers\ImageController;
use WizardAI\Controllers\TemplateController;
use WizardAI\Traits\RenderManagerTrait;
use WizardAI\Traits\TabManagerTrait;

/**
 * Class AdminWizardAIConfigController
 * Handles configurations for the Wizard AI module in the admin panel.
 */
class AdminWizardAIConfigController extends ModuleAdminController
{
    use TabManagerTrait;
    use RenderManagerTrait;
    // Constants for tab class names, settings names and action names
    public const CONTROLLER_CLASS_NAME = 'AdminWizardAIConfig';
    public const DEFAULT_GETTER = 'dashboard';

    /**
     * @var array Tabs configuration
     */
    protected $tabs = [
        [
            'name' => 'Dashboard',
            'getter' => 'dashboard',
        ],
        [
            'name' => 'Prompts',
            'getter' => 'templates',
        ],
        [
            'name' => 'Images',
            'getter' => 'images',
        ],
        [
            'name' => 'Bulk Task Management',
            'getter' => 'bulk',
        ],
        [
            'name' => 'Documentation',
            'getter' => 'documentation',
        ],
    ];

    // Constants for URLs
    private const URL_ALPINEJS = 'https://unpkg.com/alpinejs';
    private const URL_TAILWIND = 'https://cdn.tailwindcss.com';
    private const URL_BILLING = 'https://unpkg.com/@prestashopcorp/billing-cdc/dist/bundle.js';
    private const URL_CLOUDSYNC = 'https://assets.prestashop3.com/ext/cloudsync-merchant-sync-consent/latest/cloudsync-cdc.js';

    /**
     * AdminWizardAIConfigController constructor.
     */
    public function __construct()
    {
        $this->controller_name = self::CONTROLLER_CLASS_NAME;
        $this->page_header_toolbar_title = 'WizardAI';
        $this->meta_title = 'WizardAI Configuration';
        $this->bootstrap = true;

        parent::__construct();
    }

    public function init()
    {
        parent::init();
        if (Shop::isFeatureActive()) {
            $this->context->shop->setContext(Shop::CONTEXT_ALL);
        }
    }

    /**
     * Initializes the page header toolbar.
     */
    public function initPageHeaderToolbar()
    {
        parent::initPageHeaderToolbar();
    }

    /**
     * Initializes the content of the page.
     */
    public function initContent()
    {
        $this->display = 'view';
        $this->initToolbar();
        $this->context->smarty->assign([
            'current_tab_level' => 3,
        ]);
        $this->initPsAccountsService();
        $this->initWizardService();
        $this->initBillingService();
        $this->initEventbusService();

        parent::initContent();
    }

    /**
     * Initializes the PrestaShop Accounts service.
     */
    private function initPsAccountsService()
    {
        try {
            $accountsFacade = $this->getService('wizardai.ps_accounts_facade');
            $accountsService = $accountsFacade->getPsAccountsService();
        } catch (InstallerException $e) {
            $accountsInstaller = $this->getService('wizardai.ps_accounts_installer');
            $accountsInstaller->install();
            $accountsFacade = $this->getService('wizardai.ps_accounts_facade');
            $accountsService = $accountsFacade->getPsAccountsService();
        }

        try {
            $contextPsAccounts = $accountsFacade->getPsAccountsPresenter()
                ->present($this->module->name);

            Media::addJsDef([
                'contextPsAccounts' => $contextPsAccounts,
            ]);

            $this->context->smarty->assign('urlAccountsCdn', $accountsService->getAccountsCdn());

            if (empty(Configuration::get('WIZARDAI_PS_ACCOUNT_ID'))) {
                Configuration::updateValue('WIZARDAI_PS_ACCOUNT_ID', $contextPsAccounts['currentShop']['uuid']);
            }
        } catch (Exception $e) {
            $this->context->controller->errors[] = $e->getMessage();
        }
    }

    /**
     * Initializes the Wizard AI service.
     */
    private function initWizardService()
    {
        $this->context->smarty->assign([
            'urlAlpinejs' => self::URL_ALPINEJS,
            'urlTailwind' => self::URL_TAILWIND,
        ]);
    }

    /**
     * Initializes the PrestaShop Billing service.
     */
    private function initBillingService()
    {
        $billingFacade = $this->getService('wizardai.ps_billings_facade');

        Media::addJsDef($billingFacade->present([
            'logo' => $this->module->getLocalPath(),
            'tosLink' => 'https://wizardai.gekkode.com/p/general-conditions-of-sale-and-use',
            'privacyLink' => 'https://wizardai.gekkode.com/p/general-conditions-of-sale-and-use',
            'emailSupport' => 'contact@gekkode.com', // Deprecated but required for backward compatibility
        ]));

        $this->context->smarty->assign('urlBilling', self::URL_BILLING);
    }

    /**
     * Initializes the EventBus service.
     */
    private function initEventbusService()
    {
        $moduleManager = ModuleManagerBuilder::getInstance()->build();

        if ($moduleManager->isInstalled('ps_eventbus')) {
            $eventbusModule = Module::getInstanceByName('ps_eventbus');
            if (version_compare($eventbusModule->version, '1.9.0', '>=')) {
                $eventbusPresenterService = $eventbusModule->getService('PrestaShop\Module\PsEventbus\Service\PresenterService');

                $this->context->smarty->assign('urlCloudsync', self::URL_CLOUDSYNC);

                Media::addJsDef([
                    'contextPsEventbus' => $eventbusPresenterService->expose($this->module, ['info', 'modules', 'themes']),
                ]);
            }
        }
    }

    /**
     * Initializes the header of the page.
     */
    public function initHeader()
    {
        parent::initHeader();

        foreach ($this->tabs as $tab) {
            $this->addTab(self::CONTROLLER_CLASS_NAME, $tab['name'], $tab['getter']);
        }
    }

    /**
     * Processes the post request.
     */
    public function postProcess()
    {
        $tab = Tools::getValue('tab');
        $this->processWizardAIView($tab, self::DEFAULT_GETTER);
        if (Tools::getValue('isWizardAISubmit') == '1') {
            $this->confirmations = ['Settings updated successfully.'];
            $this->redirect_after = $this->context->link->getAdminLink($this->controller_name) . '&tab=' . $tab;
        }
        // parent::postProcess();
    }

    /**
     * Renders the view of the page.
     *
     * @return string Rendered view
     */
    public function renderView()
    {
        $tab = Tools::getValue('tab');

        return $this->renderWizardAIView($tab, self::DEFAULT_GETTER);
    }

    /**
     * Retrieves a service from the container.
     *
     * @param string $serviceName name of the service to retrieve
     *
     * @return mixed the retrieved service
     */
    public function getService($serviceName)
    {
        return $this->container->get($serviceName);
    }

    /**
     * Capitalizes the first letter of an entity and replaces underscores with spaces.
     *
     * @param string $entity the entity to be formatted
     *
     * @return string the formatted entity
     */
    public function ucFirstEntity($entity)
    {
        return str_replace('_', ' ', ucfirst($entity));
    }

    /**
     * Process the Templates Settings view.
     *
     * This method creates an instance of the TemplateController and calls its process method.
     *
     * @return void
     */
    public function processTemplatesView()
    {
        (new TemplateController($this))->process();
    }

    /**
     * Process the Dashboard view.
     *
     * This method creates an instance of the DashboardController and calls its process method.
     *
     * @return void
     */
    public function processDashboardView()
    {
        (new DashboardController($this))->process();
    }

    /**
     * Process the Bulk view.
     *
     * This method creates an instance of the BulkController and calls its process method.
     *
     * @return void
     */
    public function processBulkView()
    {
        (new BulkController($this))->process();
    }

    public function processDocumentationView()
    {
        $this->redirect_after = 'https://wizardai.gekkode.com/docs';

        return Tools::redirect($this->redirect_after);
    }

    /**
     * Process the Images view.
     */
    public function processImagesView()
    {
        (new ImageController($this))->process();
    }

    /**
     * Render the Dashboard view.
     *
     * This method creates an instance of the DashboardController and calls its run method.
     * It is responsible for generating and returning the view for the Dashboard.
     *
     * @return string the HTML content of the Dashboard view
     */
    private function renderDashboardView()
    {
        return (new DashboardController($this))->run();
    }

    /**
     * Render the Bulk  view.
     *
     * This method creates an instance of the BulkController and calls its run method.
     * It is responsible for generating and returning the view for the Bulk .
     *
     * @return string the HTML content of the Bulk view
     */
    private function renderBulkView()
    {
        return (new BulkController($this))->run();
    }

    /**
     * Render the Templates view.
     *
     * This method creates an instance of the TemplateController and calls its run method.
     * It is responsible for generating and returning the view for the Templates.
     *
     * @return string the HTML content of the Templates view
     */
    private function renderTemplatesView()
    {
        return (new TemplateController($this))->run();
    }

    /**
     * Render the Image view
     * */
    private function renderImagesView()
    {
        return (new ImageController($this))->run();
    }
}
