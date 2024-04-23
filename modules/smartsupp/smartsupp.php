<?php
/**
 * Smartsupp Live Chat integration module.
 *
 * @author    Smartsupp <vladimir@smartsupp.com>
 * @copyright 2016 Smartsupp.com
 * @license   GPL-2.0+
 * @package   Smartsupp
 * @link      http://www.smartsupp.com
 *
 * Plugin Name:       Smartsupp Live Chat
 * Plugin URI:        http://www.smartsupp.com
 * Description:       Adds Smartsupp Live Chat code to PrestaShop.
 * Version:           2.2.0
 * Author:            Smartsupp
 * Author URI:        http://www.smartsupp.com
 * Text Domain:       smartsupp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

use Smartsupp\LiveChat\Utility\VersionUtility;

if (!defined('_PS_VERSION_')) {
    exit;
}

class Smartsupp extends Module
{
    public function __construct()
    {
        $this->name = 'smartsupp';
        $this->tab = 'advertising_marketing';
        $this->version = '2.2.0';
        $this->author = 'Smartsupp';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;
        $this->module_key = 'da5110815a9ea717be24a57b804d24fb';

        parent::__construct();

        $this->displayName = $this->l('Smartsupp Live Chat & AI Chatbots');
        $this->description = $this->l('Smartsupp is your personal online shopping assistant, built to increase conversion rates and sales via visitor engagement in real-time, at the right time.');

        $confirm = $this->l('Are you sure you want to uninstall Smartsupp Live Chat? ');
        $confirm .= $this->l('You will lose all the data related to this module.');

        $this->confirmUninstall = $this->l($confirm);

        if (version_compare(_PS_VERSION_, '1.5', '<')) {
            include _PS_MODULE_DIR_ . $this->name . '/backward_compatibility/backward.php';
        }

        $this->autoload();

        if (!Configuration::get('SMARTSUPP_KEY')) {
            $this->warning = $this->l('No Smartsupp key provided.');
        }
    }

    public function install()
    {
        if (version_compare(_PS_VERSION_, '1.6', '>=') && Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = 'AdminSmartsuppAjax';
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = 'Smartsupp';
        }
        $tab->id_parent = -1;
        $tab->module = $this->name;

        if (VersionUtility::isPsVersionGreaterThan('1.6')) {
            $this->registerHook('displayBackOfficeHeader');
        } else {
            $this->registerHook('backOfficeHeader');
        }

        if (!$tab->add()
            || !parent::install()
            || !$this->registerHook('header')
            || !Configuration::updateValue('SMARTSUPP_KEY', '')
            || !Configuration::updateValue('SMARTSUPP_EMAIL', '')
            || !Configuration::updateValue('SMARTSUPP_CUSTOMER_ID', '1')
            || !Configuration::updateValue('SMARTSUPP_CUSTOMER_NAME', '1')
            || !Configuration::updateValue('SMARTSUPP_CUSTOMER_EMAIL', '1')
            || !Configuration::updateValue('SMARTSUPP_CUSTOMER_PHONE', '1')
            || !Configuration::updateValue('SMARTSUPP_CUSTOMER_ROLE', '1')
            || !Configuration::updateValue('SMARTSUPP_CUSTOMER_SPENDINGS', '1')
            || !Configuration::updateValue('SMARTSUPP_CUSTOMER_ORDERS', '1')
            || !Configuration::updateValue('SMARTSUPP_OPTIONAL_API', '')
        ) {
            return false;
        }

        if (VersionUtility::isPsVersionGreaterThan('1.6')) {
            $this->registerHook('displayBackOfficeHeader');
        } else {
            $this->registerHook('backOfficeHeader');
        }

        return true;
    }

    public function uninstall()
    {
        if (VersionUtility::isPsVersionGreaterOrEqualTo('1.7.1')) {
            $id_tab = $this->get('prestashop.core.admin.tab.repository')->findOneIdByClassName('AdminSmartsuppAjax');
        } else {
            $id_tab = (int) Tab::getIdFromClassName('AdminSmartsuppAjax');
        }

        if ($id_tab) {
            $tab = new Tab($id_tab);
            $tab->delete();
        }

        if (VersionUtility::isPsVersionGreaterThan('1.6')) {
            $this->unregisterHook('displayBackOfficeHeader');
        } else {
            $this->unregisterHook('backOfficeHeader');
        }

        if (!parent::uninstall()
            || !$this->unregisterHook('header')
            || !Configuration::deleteByName('SMARTSUPP_KEY')
            || !Configuration::deleteByName('SMARTSUPP_EMAIL')
            || !Configuration::deleteByName('SMARTSUPP_CUSTOMER_ID', '')
            || !Configuration::deleteByName('SMARTSUPP_CUSTOMER_NAME', '')
            || !Configuration::deleteByName('SMARTSUPP_CUSTOMER_EMAIL', '')
            || !Configuration::deleteByName('SMARTSUPP_CUSTOMER_PHONE', '')
            || !Configuration::deleteByName('SMARTSUPP_CUSTOMER_ROLE', '')
            || !Configuration::deleteByName('SMARTSUPP_CUSTOMER_SPENDINGS', '')
            || !Configuration::deleteByName('SMARTSUPP_CUSTOMER_ORDERS', '')
            || !Configuration::deleteByName('SMARTSUPP_OPTIONAL_API', '')
        ) {
            return false;
        }

        return true;
    }

    public function displayForm()
    {
        $default_lang = (int) Configuration::get('PS_LANG_DEFAULT');

        $helper = new HelperForm();

        // Module, token and currentIndex
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;

        // Language
        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;

        // Title and toolbar
        $helper->title = $this->displayName;
        $helper->show_toolbar = true;
        $helper->toolbar_scroll = true;
        $helper->submit_action = 'submit' . $this->name;
        $helper->toolbar_btn = array(
            'save' =>
            array(
                'desc' => $this->l('Save'),
                'href' => AdminController::$currentIndex . '&configure=' . $this->name . '&save' . $this->name .
                '&token=' . Tools::getAdminTokenLite('AdminModules'),
            ),
            'back' => array(
                'href' => AdminController::$currentIndex . '&token=' . Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->l('Back to list')
            )
        );

        $fields_form = array();

        $fields_desc = $this->l('Don\'t put the chat code here - this box is for ');
        $fields_desc .= $this->l('(optional) advanced customizations via ') . '#.';

        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Settings')
            ),
            'input' => array(
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Optional API'),
                    'name' => 'SMARTSUPP_OPTIONAL_API',
                    'desc' => $this->l($fields_desc),
                    'autoload_rte' => false,
                    'rows' => 5
                )
            ),
            'submit' => array(
                'title' => $this->l('Save')
            )
        );

        $helper->fields_value['SMARTSUPP_OPTIONAL_API'] = Configuration::get('SMARTSUPP_OPTIONAL_API');

        return $helper->generateForm($fields_form);
    }

    public function getContent()
    {
        $output = '';
        if (Tools::isSubmit('submit' . $this->name)) {
            $smartsupp_key = Configuration::get('SMARTSUPP_KEY');
            if ($smartsupp_key) {
                $output .= $this->displayConfirmation($this->l('Settings updated successfully'));
            }
            Configuration::updateValue('SMARTSUPP_OPTIONAL_API', Tools::getValue('SMARTSUPP_OPTIONAL_API'));
        }

        if (version_compare(_PS_VERSION_, '1.6', '>=')) {
            $output .= $this->displayForm();
        }

        $ajax_controller_url = $this->context->link->getAdminLink('AdminSmartsuppAjax');
        $this->context->smarty->assign(
            array(
            'ajax_controller_url' => $ajax_controller_url,
            'smartsupp_key' => Configuration::get('SMARTSUPP_KEY'),
            'smartsupp_email' => Configuration::get('SMARTSUPP_EMAIL'),
            )
        );

        return $this->display(__FILE__, 'views/templates/admin/landing_page.tpl') .
                $this->display(__FILE__, 'views/templates/admin/connect_account.tpl') .
                $this->display(__FILE__, 'views/templates/admin/configuration.tpl') .
                $output;
    }

    /**
     * @param  $smartsupp_key
     * @return string
     * @throws Exception
     */
    protected function getSmartsuppJs($smartsupp_key)
    {
        if (empty($smartsupp_key)) {
            return '';
        }

        /*
        NEVER ever put it into use statement as this will break Presta 1.6 installation
        - they use eval which does not run PSR autoloader
        */
        $chat = new \Smartsupp\ChatGenerator($smartsupp_key);
        $chat->setPlatform('Prestashop ' . _PS_VERSION_);
        $chat->setCookieDomain('.' . Tools::getHttpHost(false));

        $customer = $this->context->customer;

        if ($customer->id) {
            if (Configuration::get('SMARTSUPP_CUSTOMER_ID')) {
                $chat->setVariable('id', $this->l('ID'), $customer->id);
            }

            if (Configuration::get('SMARTSUPP_CUSTOMER_NAME')) {
                $customer_name = $customer->firstname . ' ' . $customer->lastname;
                $chat->setVariable('name', $this->l('Name'), $customer_name);
                $chat->setName($customer_name);
            }

            if (Configuration::get('SMARTSUPP_CUSTOMER_EMAIL')) {
                $chat->setVariable('email', $this->l('Email'), $customer->email);
                $chat->setEmail($customer->email);
            }

            if (Configuration::get('SMARTSUPP_CUSTOMER_PHONE')) {
                $addresses = $this->context->customer->getAddresses($this->context->language->id);
                if (!empty($addresses[0])) {
                    $first_address = $addresses[0];
                    $phone = !empty($first_address['phone_mobile'])
                        ? $first_address['phone_mobile'] : $first_address['phone'];
                    $chat->setVariable('phone', $this->l('Phone'), $phone);
                }
            }

            if (Configuration::get('SMARTSUPP_CUSTOMER_ROLE')) {
                $group = new Group($customer->id_default_group, $this->context->language->id, $this->context->shop->id);
                $chat->setVariable('role', $this->l('Role'), $group->name);
            }

            if (Configuration::get('SMARTSUPP_CUSTOMER_SPENDINGS') || Configuration::get('SMARTSUPP_CUSTOMER_ORDERS')) {
                $orders = Order::getCustomerOrders($customer->id, true);
                $count = 0;
                $spending = 0;
                foreach ($orders as $order) {
                    if ($order['valid']) {
                        $count++;
                        $spending += $order['total_paid_real'];
                    }
                }
                if (Configuration::get('SMARTSUPP_CUSTOMER_SPENDINGS')) {
                    $chat->setVariable(
                        'spending',
                        $this->l('Spendings'),
                        Tools::displayPrice(
                            $spending,
                            $this->context->currency->id
                        )
                    );
                }
                if (Configuration::get('SMARTSUPP_CUSTOMER_ORDERS')) {
                    $chat->setVariable('orders', $this->l('Orders'), $count);
                }
            }
        }

        $custom_code = '<script type="text/javascript">';
        $custom_code .= trim(Configuration::get('SMARTSUPP_OPTIONAL_API'));
        $custom_code .= '</script>';

        return $chat->render() . $custom_code;
    }

    public function hookHeader()
    {
        $smartsupp_key = Configuration::get('SMARTSUPP_KEY');
        $this->smarty->assign(array('smartsupp_js' => $this->getSmartsuppJs($smartsupp_key)));

        return $this->display(__FILE__, './views/templates/front/chat_widget.tpl');
    }

    public function hookBackOfficeHeader()
    {
        $js = '';

        if (strcmp(Tools::getValue('configure'), $this->name) === 0) {
            $path = $this->_path;
            $js .= '<script type="text/javascript" src="' . $path . 'views/js/smartsupp.js"></script>';
            $js .= '<link rel="stylesheet" href="' . $path . 'views/css/smartsupp.css" type="text/css" />';
            $js .= '<link rel="stylesheet" href="' . $path . 'views/css/smartsupp-nobootstrap.css" type="text/css" />';
        }

        return $js;
    }

    public function hookDisplayBackOfficeHeader()
    {
        $js = '';

        if (strcmp(Tools::getValue('configure'), $this->name) === 0) {
            $path = $this->_path;
            $this->context->controller->addJquery();
            $this->context->controller->addJs($path . 'views/js/smartsupp.js');
            $this->context->controller->addCSS($path . 'views/css/smartsupp.css');
            $this->context->controller->addCSS($path . 'views/css/smartsupp-nobootstrap.css');
        }

        return $js;
    }

    protected function getAdminDir()
    {
        return basename(_PS_ADMIN_DIR_);
    }

    private function autoload()
    {
        include_once "{$this->getLocalPath()}vendor/autoload.php";
    }
}
