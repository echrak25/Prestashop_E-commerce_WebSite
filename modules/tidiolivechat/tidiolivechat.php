<?php
/**
* 2007-2021 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2021 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
if (!defined('_PS_VERSION_')) {
    exit;
}

class TidioLiveChat extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'tidiolivechat';
        $this->module_key = '37bd765f5955a9896d968042f31a1bf9';
        $this->tab = 'front_office_features';
        $this->version = '1.3.0';
        $this->author = 'Tidio LLC';
        $this->need_instance = 1;
        $this->ps_versions_compliancy = ['min' => '1.7', 'max' => _PS_VERSION_];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Chatbots, LiveChat and Messenger by Tidio');
        $this->description = $this->l('It’s a multifunctional customer service platform that allows you to actively generate more leads and sales with live chat, chatbots and Messenger integration to offer world-class customer support.');
        $this->confirmUninstall = sprintf(
            $this->l('You will lose all the data related to this module. Are you sure you want to uninstall %s? Please note that your Tidio account and the subscription plan will remain without any changes. For more information please check %s or contact the support via chat on our website %s'),
            $this->displayName,
            'https://help.tidio.com/docs/uninstall-tidio',
            'https://www.tidio.com'
        );
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        // Tab is needed if we would like to use controllers
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = 'AdminTidio'; // Controller name
        $tab->id_parent = -1;
        $tab->module = $this->name;
        $tab->name = [];
        foreach (Language::getLanguages() as $language) {
            $tab->name[$language['id_lang']] = $this->name;
        }

        Configuration::updateValue('TIDIOLIVECHAT_PROJECT_PUBLIC_KEY', false);
        Configuration::updateValue('TIDIOLIVECHAT_PROJECT_PRIVATE_KEY', false);

        return parent::install()
            && $tab->add()
            && $this->registerHook('header')
            && $this->registerHook('displayBackOfficeHeader');
    }

    public function uninstall()
    {
        Configuration::deleteByName('TIDIOLIVECHAT_PROJECT_PUBLIC_KEY');
        Configuration::deleteByName('TIDIOLIVECHAT_PROJECT_PRIVATE_KEY');

        return parent::uninstall()
            && $this->unregisterHook('header')
            && $this->unregisterHook('displayBackOfficeHeader');
    }

    public function getContent()
    {
        $config = $this->buildConfig();
        $this->context->smarty->assign([
            'moduleStatus' => $this->getModuleStatus(),
            'apiUrl' => $this->context->link->getAdminLink('AdminTidio'),
            'panelUrl' => $config['tidio_panel_url'],
        ]);

        return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/index.tpl');
    }

    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('configure') === $this->name) {
            // Since the 1.7.7.0 version jQuery is always included and addJquery() method is deprecated.
            // This if statement prevents errors for newer version of PrestaShop.
            if (version_compare(_PS_VERSION_, '1.7.7.0', '<')) {
                $this->context->controller->addJquery();
            }

            $this->context->controller->addJS($this->_path . 'views/js/back.js');
            $this->context->controller->addCSS($this->_path . 'views/css/back.css');
        }
    }

    public function hookHeader()
    {
        if (TidioIntegrationFacade::MODULE_STATUS_INTEGRATED === $this->getModuleStatus()) {
            $projectPublicKey = Configuration::get('TIDIOLIVECHAT_PROJECT_PUBLIC_KEY');
            $integrationFacade = $this->buildIntegrationFacade();
            $widgetUrl = $integrationFacade->prepareWidgetUrlForProject($projectPublicKey);
        }

        $this->smarty->assign(['widgetUrl' => $widgetUrl ?? null]);

        return $this->display(__FILE__, './views/templates/front/widget.tpl');
    }

    public function buildIntegrationFacade(): TidioIntegrationFacade
    {
        $config = $this->buildConfig();

        return new TidioIntegrationFacade(
            new TidioApi(
                $config['tidio_api_url'],
                new PrestaShopTidioLogger()
            ),
            $config['tidio_panel_url'],
            $config['tidio_widget_url']
        );
    }

    public function buildErrorTranslator(): TidioErrorTranslator
    {
        return new PrestaShopTidioErrorTranslator($this);
    }

    private function buildConfig(): array
    {
        return require _PS_MODULE_DIR_ . '/' . $this->name . '/config.php';
    }

    private function getModuleStatus(): string
    {
        $projectPublicKey = Configuration::get('TIDIOLIVECHAT_PROJECT_PUBLIC_KEY');
        $projectPrivateKey = Configuration::get('TIDIOLIVECHAT_PROJECT_PRIVATE_KEY');
        if ($projectPublicKey && $projectPrivateKey) {
            return TidioIntegrationFacade::MODULE_STATUS_INTEGRATED;
        }

        return TidioIntegrationFacade::MODULE_STATUS_NONINTEGRATED;
    }
}
