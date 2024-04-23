<?php
/**
 * 2007-2024 PrestaHero
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author PrestaHero <etssoft.jsc@gmail.com>
 * @copyright  2007-2024 PrestaHero
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of PrestaHero
 */

if (!defined('_PS_VERSION_')) {
    exit;
}
class PhConApi
{
    public static $instance = null;
    protected $urlModules;
    protected $urlUpgradeModule;
    protected $urlCheckLogin;
    protected $urlCheckModulePaid;
    protected $context;
    protected $shopDomain;
    protected $baseUri;
    public $token = null;
    public $userId = 0;
    public $userName = null;

    public function __construct()
    {
        $this->context = Context::getContext();
        if (defined('_PH_CON_URL_MODULES_')) {
            $this->urlModules = _PH_CON_URL_MODULES_;
        }
        if (defined('_PH_CON_URL_UPGRADE_MODULE_')) {
            $this->urlUpgradeModule = _PH_CON_URL_UPGRADE_MODULE_;
        }
        if (defined('_PH_CON_URL_CHECK_LOGIN_')) {
            $this->urlCheckLogin = _PH_CON_URL_CHECK_LOGIN_;
        }
        if (defined('_PH_CON_URL_CHECK_MODULE_PAID_')) {
            $this->urlCheckModulePaid = _PH_CON_URL_CHECK_MODULE_PAID_;
        }
        if ((int)Configuration::get('PS_SSL_ENABLED')) {
            $this->shopDomain = $this->context->shop->domain_ssl;
        } else {
            $this->shopDomain = $this->context->shop->domain;
        }
        if (!isset($this->context->cookie->phToken) || !isset($this->context->cookie->phUserId) || !isset($this->context->cookie->phUserName) || !isset($this->context->cookie->phIdEmployee)) {
            if (($token = PhConEmployeeToken::getToken($this->context->employee->id)) && $token->token && $token->id_user && (!$token->token_expire_at || $token->token_expire_at == '0000-00-00 00:00:00' || strtotime($token->token_expire_at) >= time())) {
                $this->context->cookie->phUserId = $token->id_user;
                $this->context->cookie->phToken = $token->token;
                $this->context->cookie->phUserName = trim(($token->firstname ? Tools::strtoupper(Tools::substr($token->firstname, 0, 1)) : '') . '.' . Tools::ucfirst($token->lastname));
                $this->context->cookie->phIdEmployee = $token->id_employee;
            } else {
                $this->context->cookie->phUserId = 0;
                $this->context->cookie->phToken = '';
                $this->context->cookie->phUserName = '';
                $this->context->cookie->phIdEmployee = 0;
            }
        }
        if ($this->context->cookie->phIdEmployee && $this->context->employee->id == (int)$this->context->cookie->phIdEmployee) {
            $this->userId = (int)$this->context->cookie->phUserId;
            $this->token = $this->context->cookie->phToken;
            $this->userName = $this->context->cookie->phUserName;
        }
        if (defined('_PH_CON_ON_TESTING_') && _PH_CON_ON_TESTING_) {
            if ($this->shopDomain == 'localhost')
                $this->shopDomain .= '.com';
        }
        $this->baseUri = $this->context->shop->getBaseURI();
        $initParams = 'currencyCode=' . $this->context->currency->iso_code . '&langCode=' . $this->context->language->iso_code . '&shopDomain=' . urlencode($this->shopDomain) . '&psVersion=' . _PS_VERSION_ . '&isNewVersion=1';
        $this->urlModules .= '?' . $initParams;
        $this->urlCheckLogin .= '?' . $initParams;
        $this->urlUpgradeModule .= '?' . $initParams;
        $this->urlCheckModulePaid .= '?' . $initParams;
    }

    public function isLogged()
    {
        return
            isset($this->context->cookie->phIdEmployee) && isset($this->context->cookie->phUserId) && isset($this->context->cookie->phToken) && isset($this->context->cookie->phUserName)
            && (int)$this->context->cookie->phIdEmployee == $this->context->employee->id && $this->context->cookie->phUserId && $this->context->cookie->phToken && $this->context->cookie->phUserName;
    }

    public function logout()
    {
        if ($token = PhConEmployeeToken::getToken($this->context->employee->id)) {
            $token->token = null;
            $token->id_user = null;
            $token->firstname = null;
            $token->lastname = null;
            $token->token_expire_at = null;
            $token->update(true);
        }
        $this->context->cookie->phUserId = 0;
        $this->context->cookie->phToken = '';
        $this->context->cookie->phUserName = '';
        $this->context->cookie->phIdEmployee = 0;
    }

    public function login($email, $password, $rememberMe = false)
    {
        $errors = array();
        if (($res = $this->request($this->urlCheckLogin, array('email' => $email, 'password' => $password))) && ($json = json_decode($res, true))
            && isset($json['success']) && $json['success']) {
            $this->context->cookie->phIdEmployee = $this->context->employee->id;
            $this->context->cookie->phUserId = isset($json['id_customer']) ? $json['id_customer'] : 0;
            $this->context->cookie->phToken = isset($json['token']) ? $json['token'] : '';
            $this->context->cookie->phUserName = trim((isset($json['firstname']) ? Tools::strtoupper(Tools::substr($json['firstname'], 0, 1)) . '.' : '') . Tools::ucfirst(isset($json['firstname']) ? $json['firstname'] : ''));
            $this->context->cookie->write();
            if ($rememberMe) {
                if (!($token = PhConEmployeeToken::getToken($this->context->employee->id)))
                    $token = new PhConEmployeeToken();
                $token->id_employee = $this->context->employee->id;
                $token->token = $this->context->cookie->phToken;
                $token->id_user = $this->context->cookie->phUserId;
                $token->firstname = isset($json['firstname']) ? $json['firstname'] : null;
                $token->lastname = isset($json['lastname']) ? $json['lastname'] : null;
                $token->token_expire_at = isset($json['remaining_lifetime']) && ($remaing = (int)$json['remaining_lifetime']) > 0 ? date('Y-m-d H:i:s', $remaing + time()) : null;
                $token->save(true);
            }
        } elseif (!$res)
            $errors[] = Prestaheroconnect::getInstance()->l('Connection timeout', 'phconapi');
        elseif (isset($json) && $json && isset($json['message'])) {
            $errors[] = $json['message'];
        } else
            $errors[] = Prestaheroconnect::getInstance()->l('Could not authenticate', 'phconapi');
        return !$errors ? true : $errors;
    }

    public function request($url, $params = array(), $stream_context = null, $curl_timeout = 60)
    {
        if ($this->isLogged())
            $url .= '&phToken=' . $this->token . '&phUserId=' . $this->userId;
        if ($stream_context == null && preg_match('/^https?:\/\//', $url)) {
            $stream_context = stream_context_create(array(
                "http" => array(
                    "timeout" => $curl_timeout,
                    "max_redirects" => 101,
                    "header" => 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36'
                ),
                "ssl" => array(
                    "allow_self_signed" => true,
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ),
            ));
        }
        if ($params && is_array($params))
            $params = http_build_query($params);
        if (function_exists('curl_init')) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => html_entity_decode($url),
                CURLOPT_USERAGENT => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36',
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_TIMEOUT => $curl_timeout,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_POSTFIELDS => $params,
            ));
            $content = curl_exec($curl);
            curl_close($curl);
            return $content;
        } elseif (in_array(ini_get('allow_url_fopen'), array('On', 'on', '1')) || !preg_match('/^https?:\/\//', $url)) {
            return Tools::file_get_contents($url . ($params ? '&' . $params : ''), false, $stream_context, $curl_timeout);
        } else {
            return false;
        }
    }

    public function getModulesOnMarket($cache = true)
    {
        $context = Context::getContext();
        if (!$cache || ($cachedData = PhConCache::get($key = $this->context->employee->id . '_' . $this->context->language->iso_code . '_' . $this->context->currency->iso_code)) === false || $cachedData['expired']) {
            if (($res = $this->request($this->urlModules))
                && ($json = json_decode($res, true)) && isset($json['success']) && $json['success']
            ) {
                if (isset($json['logo'])) {
                    Configuration::updateValue('PH_CON_LOGO', (string)$json['logo']);
                } else
                    Configuration::deleteByName('PH_CON_LOGO');
                if (isset($json['cache_ttl'])) {
                    Configuration::updateValue('PH_CON_CACHE_TTL', ($ttl = (int)$json['cache_ttl']) && $ttl >= 1 && $ttl <= 24 ? $ttl : 24);
                } else
                    Configuration::deleteByName('PH_CON_CACHE_TTL');
                if (isset($json['description'])) {
                    $desc = array();
                    if ($languages = Language::getLanguages(false)) {
                        foreach ($languages as $lang) {
                            $desc[$lang['id_lang']] = Configuration::get('PH_CON_DESCRIPTION', $lang['id_lang']) ?: '';
                        }
                    }
                    $desc[$context->language->id] = (string)$json['description'];
                    Configuration::updateValue('PH_CON_DESCRIPTION', $desc, true);
                } else
                    Configuration::deleteByName('PH_CON_DESCRIPTION');
                if (isset($json['notification']['type']))
                    Configuration::updateValue('PH_CON_NOTI_TYPE', in_array($json['notification']['type'], array('info', 'warning', 'danger')) ? $json['notification']['type'] : 'info');
                if (isset($json['notification']) && isset($json['notification']['content'])) {
                    $notification = array();
                    if ($languages = Language::getLanguages(false)) {
                        foreach ($languages as $lang) {
                            $notification[$lang['id_lang']] = Configuration::get('PH_CON_NOTI_CONTENT', $lang['id_lang']) ?: '';
                        }
                    }
                    $notification[$context->language->id] = (string)$json['notification']['content'];
                    Configuration::updateValue('PH_CON_NOTI_CONTENT', $notification, true);
                } else
                    Configuration::deleteByName('PH_CON_NOTI_CONTENT');
                if (isset($json['modules'])) {
                    $modules = is_array($json['modules']) ? $json['modules'] : array();
                    if ($cache && isset($key))
                        PhConCache::set($key, $modules);
                    return $modules;
                }
            }
        }
        return $cache && isset($cachedData['cache']) ? $cachedData['cache'] : array();
    }

    public function downloadModule($moduleName, $idProduct = 0)
    {
        $errors = array();
        if (!is_dir(PhConCache::$cacheDir))
            if (!@mkdir(PhConCache::$cacheDir, 0755, true))
                $errors[] = Prestaheroconnect::getInstance()->l('Could not make cache directory', 'phconapi');
        if (!$errors) {
            $filePath = PhConCache::$cacheDir . $moduleName . '.zip';
            if ($res = $this->request($this->urlUpgradeModule . '&moduleName=' . $moduleName . '&idProduct=' . $idProduct)) {
                @file_put_contents($filePath, $res);
                if (!Tools::ZipTest($filePath)) {
                    if (@file_exists($filePath))
                        @unlink($filePath);
                    if (($resArg = @json_decode($res, true)) !== null && isset($resArg['message'])) {
                        $errors[] = $resArg['message'];
                        $tokenExpired = isset($resArg['token_expired']) && $resArg['token_expired'] ? true : false;
                    } else
                        $errors[] = Prestaheroconnect::getInstance()->l('Module installation file has been broken', 'phconapi');
                }
            } else
                $errors[] = Prestaheroconnect::getInstance()->l('Could not connect to PrestaHero', 'phconapi');
        }
        if (!$errors)
            return isset($filePath) ? $filePath : '';
        return array(
            'success' => false,
            'message' => implode('<br/>', $errors),
            'token_expired' => isset($tokenExpired) && $tokenExpired ? true : false,
        );
    }

    public function checkModulePaid()
    {
        $res = $this->request($this->urlCheckModulePaid);
        $json = json_decode($res, true);
        return $json;
    }

    public static function getApi()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PhConApi();
        }
        return self::$instance;
    }
}