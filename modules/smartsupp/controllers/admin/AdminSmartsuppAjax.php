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
 * Text Domain:       smartsupp
 * Author:            Smartsupp
 * Author URI:        http://www.smartsupp.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

use \Smartsupp\Auth\Api;

class AdminSmartsuppAjaxController extends ModuleAdminController
{
    const FILE_NAME = 'AdminSmartsuppAjaxController';
    public $ssl = true;
    private $partnerKey = 'h4w6t8hln9';
    private $response = [];

    public function init()
    {
        $api = new Api();
                
        switch (Tools::getValue('action')) {
            case 'login':
                $this->response = $api->login([
                    'email' => Tools::getValue('email'),
                    'password' => Tools::getValue('password'),
                    'platform' => 'Prestashop ' . _PS_VERSION_,
                ]);
                $this->updateCredentials();
                break;
            case 'create':
                $this->response = $api->create([
                    'email' => Tools::getValue('email'),
                    'password' => Tools::getValue('password'),
                    'partnerKey' => $this->partnerKey,
                    'consentTerms' => 1,
                    'platform' => 'Prestashop ' . _PS_VERSION_,
                ]);
                $this->updateCredentials();
                break;
            case 'deactivate':
                Configuration::updateValue('SMARTSUPP_KEY', '');
                Configuration::updateValue('SMARTSUPP_EMAIL', '');
                break;
        }

        header('Content-Type: application/json');

        $responseData = [
            'key' => Configuration::get('SMARTSUPP_KEY'),
            'email' => Configuration::get('SMARTSUPP_EMAIL'),
            'error' => isset($this->response['error']) ? $this->response['error'] : null,
            'message' => isset($this->response['message']) ? $this->response['message'] : null,
        ];

        $responseData = array_filter($responseData, function ($val) {
            return $val !== null;
        });

        die(json_encode($responseData));
    }


    /**
     * @return void
     */
    private function updateCredentials()
    {
        if (isset($this->response['account']['key'])) {
            Configuration::updateValue('SMARTSUPP_KEY', $this->response['account']['key']);
            Configuration::updateValue('SMARTSUPP_EMAIL', Tools::getValue('email'));

            return;
        }

        $this->response['error'] = isset($this->response['error']) ? $this->response['error'] : $this->module->l('Unknown Error Occurred', self::FILE_NAME);
        $this->response['message'] = isset($this->response['message']) ? $this->response['message'] : $this->module->l('Unknown Error Occurred', self::FILE_NAME);

        Configuration::updateValue('SMARTSUPP_KEY', '');
        Configuration::updateValue('SMARTSUPP_EMAIL', '');
    }
}
