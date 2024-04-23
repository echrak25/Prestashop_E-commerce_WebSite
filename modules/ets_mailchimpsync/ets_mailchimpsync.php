<?php
/**
 * Copyright ETS Software Technology Co., Ltd
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
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
 */

if (!defined('_PS_VERSION_')) {
    exit;
}
if (!class_exists('MCAPI'))
    require_once(_PS_ROOT_DIR_ . '/modules/ets_mailchimpsync/classes/MCAPI.class.php');
if (Tools::isSubmit('module_name') && Tools::getValue('module_name') == 'ets_mailchimpsync')
    require_once(_PS_ROOT_DIR_ . '/modules/ets_mailchimpsync/classes/Array.php');
if (!class_exists('Exception'))
    require_once(_PS_ROOT_DIR_ . '/modules/ets_mailchimpsync/classes/Exception.php');

if (!class_exists('Ets_api_v3_client')) {
    require_once(_PS_ROOT_DIR_ . '/modules/ets_mailchimpsync/ets_api_v3_client.php');
}

if (!class_exists('Mlc_pagginaction_class'))
    require_once(_PS_ROOT_DIR_ . '/modules/ets_mailchimpsync/classes/mlcs_pagginaction_class.php');

class Ets_mailchimpsync extends Module
{
    private $_hooks = array(
        'displayBackOfficeHeader',
    );
    private $post_errors = array();
    private $saveOk = false;
    public $categoryLevel = -2;
    public $limit;
    public $_html;
    public $is17 = false;
    public $is16 = false;
    public $key;

    public function __construct()
    {
        $this->name = 'ets_mailchimpsync';
        $this->tab = 'front_office_features';
        $this->version = '1.1.1';
        $this->author = 'PrestaHero';
        $this->need_instance = 0;
        parent::__construct();
        $this->key = Configuration::get('YBC_API_KEY');
        $this->displayName = $this->l('Automatic Mailchimp Sync');
        $this->description = $this->l("Synchronize your shop’s emails with Mailchimp automatically");
$this->refs = 'https://prestahero.com/';
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall module?');
        $this->ps_versions_compliancy = array('min' => '1.5.0.0', 'max' => _PS_VERSION_);
        $this->bootstrap = version_compare(_PS_VERSION_, '1.6.0', '>=') ? true : false;
        $this->module_key = '431c95fe9edcb5618f5139c5ce60f8f3';
        if (version_compare(_PS_VERSION_, '1.7', '>='))
            $this->is17 = true;
        elseif (version_compare(_PS_VERSION_, '1.6', '>='))
            $this->is16 = true;

        $this->limit = 10;
    }

    public function install()
    {
        if (!parent::install() || !$this->installDB())
            return false;
        foreach ($this->_hooks as $hook) {
            if (!$this->registerHook($hook)) return false;
        }
        if ((string)Tools::substr(sprintf('%o', fileperms(dirname(__FILE__))), -4) != '0755')
            chmod(dirname(__FILE__), 0755);
        if ((string)Tools::substr(sprintf('%o', fileperms(dirname(__FILE__) . '/ajax.php')), -4) != '0755')
            chmod(dirname(__FILE__) . '/ajax.php', 0755);
        if ((string)Tools::substr(sprintf('%o', fileperms(dirname(__FILE__) . '/syncmailchimp.php')), -4) != '0755')
            chmod(dirname(__FILE__) . '/syncmailchimp.php', 0755);
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall() || !$this->uninstallDB()) return false;
        return true;
    }

    public function installDb()
    {
        return (Db::getInstance()->execute("CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "export_filter` (
                  `id_export` int(12) NOT NULL AUTO_INCREMENT,
                  `products` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
                  `spent_from` float(12,2) NOT NULL,
                  `spent_to` float(12,2) NOT NULL,
                  `id_currency` int(12) NOT NULL,
                  `id_category` int(12) NOT NULL,
                  `newsletter` int(2) NOT NULL,
                  `idmailchimp` varchar(200) NOT NULL,
                  `id_country` int(12) NOT NULL,
                  `id_lang` int(11) NOT NULL,
                  `optin` int(2) NOT NULL,
                  PRIMARY KEY (`id_export`)
                )"));
    }

    private function uninstallDb()
    {
        Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'export_filter`');
        Configuration::deleteByName('YBC_API_KEY');
        return true;
    }

    private function getFilter($id_export)
    {
        $id_export = (int)$id_export;
        return Db::getInstance()->getRow("SELECT * FROM  `" . _DB_PREFIX_ . "export_filter` WHERE id_export = " . (int)$id_export);
    }

    private function getAccessories($list_id_products)
    {
        if (!$list_id_products)
            return false;
        return Db::getInstance()->executeS("SELECT * FROM  `" . _DB_PREFIX_ . "product` p,  `" . _DB_PREFIX_ . "product_lang` pl where p.id_product = pl.id_product " . ($list_id_products ? " AND p.id_product IN (" . pSQL($list_id_products) . ")" : "") . "  AND pl.id_lang=" . (int)Context::getContext()->language->id . ' GROUP BY p.id_product');
    }

    public function getContent()
    {
        $ps_version = version_compare(_PS_VERSION_, '1.6.0', '>=') === true ? true : false;
        $page = (int)Tools::getValue('page', 1);
        if (version_compare(_PS_VERSION_, '1.6.0', '>='))
            $postUrl = $this->context->link->getAdminLink('AdminModules', true) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name . '&getlists=1&page=' . $page;
        else
            $postUrl = AdminController::$currentIndex . '&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules') . '&getlists=1&page=' . $page;

        require_once(dirname(__FILE__) . '/classes/MCAPI.class.php');
        $time = date('d-m-Y-H-i-s');
        $errors = array();

        $newsletter = 2;
        $from_price = '';
        $to_price = '';
        $id_currency = 0;
        $id_category = 0;
        $idmailchimp = '';
        $list_id_products = '';
        $id_country = 0;
        $optin = 2;
        $id_lang = 0;
        if ($id_export = (int)Tools::getValue('id_export')) {
            if ($filter = $this->getFilter($id_export)) {
                $newsletter = $filter['newsletter'];
                $from_price = $filter['spent_from'];
                $to_price = $filter['spent_to'];
                $id_currency = $filter['id_currency'];
                $id_category = $filter['id_category'];
                $id_country = $filter['id_country'];
                $idmailchimp = $filter['idmailchimp'];
                $id_lang = $filter['id_lang'];
                $optin = $filter['optin'];
                if ($filter['products'])
                    $list_id_products = implode(',', array_map('intval', explode('-', trim($filter['products'], '-'))));
                if ($list_id_products)
                    $accessories = $this->getAccessories($list_id_products);
            }
        }

        if (Tools::isSubmit('export_list')) {
            $customers = $this->getExportedList((int)Tools::getValue('id_export'));
            header('Content-Encoding: UTF-8');
            header("Content-type: text/csv; charset=UTF-8");
            header("Content-Disposition: attachment; filename=listcustomer$time.csv");
            header("Pragma: no-cache");
            header("Expires: 0");
            echo "\xEF\xBB\xBF";
            $file = fopen('php://output', 'w');
            fputcsv($file, array($this->l('ID Customer'), $this->l('Firstname'), $this->l('Lastname'), $this->l('Gender'), $this->l('Email'), $this->l('Birthday'), $this->l('Language'), $this->l('Newsletter'), $this->l('Opt-in'), $this->l('Country'), $this->l('Total money spent'), $this->l('Currency')));
            if ($customers)
                foreach ($customers as $row) {
                    fputcsv($file, $row);
                }
            exit();
        }
        if (Tools::isSubmit('getlists') && Tools::getValue('getlists')) {
            if (Tools::isSubmit('ajax')) {
                die(json_encode(array(
                        'messageType' => 'success',
                        'html_content' => $this->render_mailing_list()
                    )
                ));
            }
        }
        if (Tools::isSubmit('submit_save_filter') || Tools::isSubmit('submit_update_filter')) {
            if (Tools::isSubmit('inputAccessories'))
                $list_id_products = explode('-', trim(Tools::getValue('inputAccessories'), '-'));
            if ($list_id_products)
                $accessories = $this->getAccessories(implode(',', array_map('intval', $list_id_products)));
            if (!is_numeric(Tools::getValue('from_price')) && Tools::getValue('from_price'))
                $errors[] = $this->l('"From" must be numeric');
            $from_price = Tools::getValue('from_price');
            if (!is_numeric(Tools::getValue('to_price')) && Tools::getValue('to_price'))
                $errors[] = $this->l('"To" price not is numeric');
            $to_price = Tools::getValue('to_price');
            if ((float)$to_price && $from_price > $to_price)
                $errors[] = $this->l('"From" can not be greater than "to"');
            $id_category = (int)Tools::getValue('bought_category');
            $id_currency = (int)Tools::getValue('select_currency');
            $id_country = (int)Tools::getValue('id_country');
            $optin = (int)Tools::getValue('optin');
            $idmailchimp = trim(Tools::getValue('idmailchimp'));
            $id_lang = (int)Tools::getValue('id_lang');
            $newsletter = in_array((int)Tools::getValue('newsletter'), array(0, 1, 2)) ? (int)Tools::getValue('newsletter') : 1;
            $id_export = (int)Tools::getValue('id_export');
            if ($id_export && !$this->getFilter($id_export))
                $errors[] = $this->l('This filter does not exist');
            if (!$errors) {
                if (Tools::isSubmit('submit_save_filter')) {
                    Db::getInstance()->execute("INSERT INTO  `" . _DB_PREFIX_ . "export_filter` id_export,products,spent_from,spent_to,id_currency,id_lang,id_category,newsletter,idmailchimp,id_country,optin) values('','" . pSQL(implode('-', array_map('intval', $list_id_products))) . "','" . (float)$from_price . "','" . (float)$to_price . "','" . (int)$id_currency . "','" . (int)$id_lang . "','" . (int)$id_category . "','" . (int)$newsletter . "', '" . pSQL($idmailchimp) . "','" . (int)$id_country . "','" . (int)$optin . "')");
                    $newsletter = 2;
                    $from_price = '';
                    $to_price = '';
                    $id_currency = 0;
                    $id_category = 0;
                    $idmailchimp = '';
                    $list_id_products = '';
                    $id_country = 0;
                    $optin = 2;
                    $id_lang = 0;
                    $accessories = array();
                    $this->saveOk = true;
                    $this->context->smarty->assign('save_ok', true);
                } else {
                    Db::getInstance()->execute("UPDATE  `" . _DB_PREFIX_ . "export_filter` SET products = '" . pSQL(implode('-', array_map('intval', $list_id_products))) . "',spent_from='" . (float)$from_price . "',spent_to='" . (float)$to_price . "', id_currency='" . (float)$id_currency . "',id_lang='" . (int)$id_lang . "',id_category='" . (float)$id_category . "',newsletter ='" . (int)$newsletter . "',idmailchimp ='" . pSQL($idmailchimp) . "', id_country='" . (int)$id_country . "', optin='" . (int)$optin . "' WHERE id_export ='" . (int)$id_export . "'");
                    $this->context->smarty->assign('update_ok', true);
                }
            }
        } else if (Tools::isSubmit('submit_save_setting')) {
            if (!trim(Tools::getValue('YBC_API_KEY')))
                $errors[] = $this->l('Mailchimp key can not be empty');
            else {
                Configuration::updateValue('YBC_API_KEY', trim(Tools::getValue('YBC_API_KEY')));
                $this->smarty->assign(array('save_ok' => true,));
            }

        } else {
            if ($id_delete = (int)Tools::getValue('delete_id')) {
                Db::getInstance()->execute("DELETE FROM  `" . _DB_PREFIX_ . "export_filter` WHERE id_export=" . (int)$id_delete);
                Tools::redirectAdmin($postUrl . '&delete_ok=yes');
            }
        }

        $shop_link = _PS_BASE_URL_ . __PS_BASE_URI__;

        $api_connect = new ets_api_v3_client(Tools::isSubmit('YBC_API_KEY') ? Tools::getValue('YBC_API_KEY') : Configuration::get('YBC_API_KEY'));
        $status_connect = $api_connect->request('GET');
        $status_error = (!$status_connect || (isset($status_connect->status) && $status_connect->status == '401')) ? true : false;
        if ($status_error) {
            $api_invalid = $this->l('Your API key is invalid. Please check your key again.');
            $this->smarty->assign(array(
                'check_api' => false,
                'api_invalid' => $api_invalid
            ));
        } else {
            $this->smarty->assign(array(
                'check_api' => true
            ));
        }

        $this->smarty->assign(
            array(
                'iso_code' => $this->context->currency->iso_code,
                'retvals' => $this->getRevals(),
                'errors' => $errors,
                'accessories' => isset($accessories) ? $accessories : array(),
                'currencies' => Db::getInstance()->executeS("SELECT c.id_currency,c.iso_code, ch.conversion_rate FROM  `" . _DB_PREFIX_ . "currency` c,  `" . _DB_PREFIX_ . "currency_shop` ch WHERE c.id_currency = ch.id_currency AND ch.id_shop=" . (int)$this->context->shop->id),
                'shop_link' => $shop_link,
                'ps_version_1_6' => $ps_version,
                'postUrl' => $postUrl,
                'from_price' => $from_price,
                'to_price' => $to_price,
                'id_currency' => $id_currency,
                'id_category' => $id_category,
                'id_country' => $id_country,
                'id_lang' => $id_lang,
                'optin' => $optin,
                'idmailchimp' => $idmailchimp,
                'newsletter' => $newsletter,
                'languages' => Language::getLanguages(false),
                'id_export' => (int)Tools::getValue('id_export') && !Tools::isSubmit('export_list') ? (int)Tools::getValue('id_export') : false,
                'delete_ok' => Tools::isSubmit('delete_ok') ? true : false,
                'countries' => $this->getCountries(),
                'YBC_API_KEY' => Tools::isSubmit('YBC_API_KEY') ? Tools::getValue('YBC_API_KEY') : Configuration::get('YBC_API_KEY'),
                'ajaxUrl' => $this->_path . 'syncmailchimp.php',
                'physicalPath' => dirname(__FILE__) . '/syncmailchimp.php',
                'categoryOptions' => $this->displayCategories($this->getCategoryById((int)Configuration::get('PS_ROOT_CATEGORY'))),
                'mailchimpModulePath' => $this->_path,
                'mailchimptoken' => Tools::getAdminTokenLite('AdminModules'),
                'content_mailing' => $this->render_mailing_list()
            )
        );
        if ($ps_version)
            return $this->_html . $this->display(__file__, 'admin-16.tpl') . $this->displayIframe();
        else
            return $this->_html . $this->display(__file__, 'admin.tpl') . $this->displayIframe();
    }

    public function getLists($start = false, $limit = false, Context $context = null)
    {
        if (!$context) {
            $context = Context::getContext();
        }
        if ($start < 0)
            $start = 0;

        $sql = "SELECT ef.*, cl.name as country,l.name as name_lang 
                    FROM  `" . _DB_PREFIX_ . "export_filter` ef 
                    LEFT JOIN  `" . _DB_PREFIX_ . "country_lang` cl ON ef.id_country = cl.id_country 
                    LEFT JOIN  `" . _DB_PREFIX_ . "lang` l on ef.id_lang = l.id_lang 
                    ORDER BY ef.id_export ASC 
                    " . (($limit && $limit > 0) ? "LIMIT " . (int)$start . "," . (int)$limit : "") . " ";
        return Db::getInstance()->executeS($sql);
    }

    public function render_mailing_list()
    {
        $page = (int)Tools::getValue('page', 1);

        if (version_compare(_PS_VERSION_, '1.6.0', '>='))
            $postUrl = $this->context->link->getAdminLink('AdminModules', true) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name . '&getlists=1&page=' . $page;
        else
            $postUrl = AdminController::$currentIndex . '&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules') . '&getlists=1&page=' . $page;

        $sql_total_records = "SELECT ef.id_export FROM  `" . _DB_PREFIX_ . "export_filter` ef LEFT JOIN  `" . _DB_PREFIX_ . "country_lang` cl ON ef.id_country = cl.id_country LEFT JOIN  `" . _DB_PREFIX_ . "lang` l on ef.id_lang = l.id_lang ORDER BY ef.id_export ASC";

        $limit = $this->limit;
        if ($page < 1)
            $page = 1;
        $totalRecords = Db::getInstance()->executeS($sql_total_records);
        $paggination = new Mlcs_pagginaction_class();
        $totalRecords = (int)count($totalRecords);
        $paggination->total = $totalRecords;
        $paggination->url = $this->context->link->getAdminLink('AdminModules', true) . '&configure=' . $this->name . '&module_name=' . $this->name . '&getlists=1&page=_page_';
        $paggination->limit = $limit;
        $totalPages = ceil($totalRecords / $paggination->limit);
        if ($page > $totalPages)
            $page = $totalPages;
        $paggination->page = $page;
        $start = $paggination->limit * ($page - 1);

        $paggination->text = $this->l('Showing {start} to {end} of {total} ( {pages} Page(s) )');
        $paggination->style_links = $this->l('links');
        $paggination->style_results = $this->l('results');

        $list_filters = $this->getLists($start, $limit);

        $list_filters = $this->ets_unique_multidim_array($list_filters, 'id_export');
        if ($list_filters)
            foreach ($list_filters as &$filter) {
                $filter['link_del'] = 'index.php?controller=AdminModules&configure=ets_mailchimpsync&tab_module=front_office_features&module_name=ets_mailchimpsync&token=' . Tools::getAdminToken('AdminModules' . (int)(Tab::getIdFromClassName('AdminModules')) . (int)$this->context->employee->id) . '&delete_id=' . $filter['id_export'];
                $list_id_products = explode('-', $filter['products']);
                if ($list_id_products && is_array($list_id_products))
                    $list_id_products = implode(',', array_map('intval', $list_id_products));
                if ($list_id_products) {
                    $products = Db::getInstance()->executeS("SELECT * FROM  `" . _DB_PREFIX_ . "product` p,  `" . _DB_PREFIX_ . "product_lang` pl where p.id_product = pl.id_product and p.id_product IN (" . pSQL($list_id_products) . ")  AND pl.id_lang=" . (int)Context::getContext()->language->id . ' GROUP BY p.id_product');
                    $list_name_product = '';
                    if ($products)
                        foreach ($products as $product)
                            $list_name_product .= $product['name'] . ' (' . $this->l('Ref') . ': ' . $product['reference'] . '); ';
                } else
                    $list_name_product = '';

                $filter['list_name_product'] = $list_name_product;
                $filter['category_name'] = Db::getInstance()->getValue("SELECT name FROM  `" . _DB_PREFIX_ . "category` c,  `" . _DB_PREFIX_ . "category_lang` cl WHERE c.id_category=cl.id_category AND cl.id_lang=" . (int)$this->context->language->id . " AND c.id_category=" . (int)$filter['id_category']);
                $filter['iso_code'] = Db::getInstance()->getValue("SELECT iso_code FROM  `" . _DB_PREFIX_ . "currency` WHERE id_currency=" . (int)$filter['id_currency']);
            }

        $this->smarty->assign(
            array(
                'list_filters' => $list_filters,
                'postUrl' => $postUrl,
                'id_export' => (int)Tools::getValue('id_export') && !Tools::isSubmit('export_list') ? (int)Tools::getValue('id_export') : false,
                'retvals' => $this->getRevals(),
                'paggination' => $paggination->render(),
            )
        );
        return $this->display(__FILE__, 'render_mailing_list.tpl');
    }

    public function getExportedList($id_export, $start = false)
    {
        if ($filter = $this->getFilter($id_export)) {
            $newsletter = (int)$filter['newsletter'];
            $from_price = (float)$filter['spent_from'];
            $to_price = (float)$filter['spent_to'];
            $id_currency = (int)$filter['id_currency'];
            $id_category = (int)$filter['id_category'];
            $id_country = (int)$filter['id_country'];
            $optin = $filter['optin'];
            $list_id_products = explode('-', trim($filter['products'], '-'));
            if ($list_id_products)
                $list_id_products = implode(',', array_map('intval', $list_id_products));
            $id_shop = $this->context->shop->id;
            $id_lang = $filter['id_lang'];
        } else
            return false;
        if ($id_category) {
            $ids = $this->getCategoryTree($id_category);
        } else
            $ids = false;
        $sql = "SELECT c.id_customer,c.firstname,c.lastname,if(gl.name is not null, gl.name, '--') as gender,CONVERT(c.email, CHAR CHARACTER SET utf8) as email, if(c.birthday is not null AND c.birthday !='000-00-00', c.birthday, '--') as birthday, l.iso_code as lang,c.newsletter,c.optin, if(cl.name is not null, cl.name, '--') as country, if(sum(od.total_price_tax_incl), sum(od.total_price_tax_incl), 0) as total_price, if(cu.iso_code is not null,cu.iso_code,'--') as iso_code
                FROM  `" . _DB_PREFIX_ . "customer` c 
                LEFT JOIN  `" . _DB_PREFIX_ . "orders` o ON c.id_customer = o.id_customer AND o.id_shop=" . (int)$id_shop . "
                LEFT JOIN  `" . _DB_PREFIX_ . "order_detail` od ON o.id_order = od.id_order
                LEFT JOIN (SELECT a.id_customer, cl.name, cl.id_country FROM  `" . _DB_PREFIX_ . "address` a LEFT JOIN  `" . _DB_PREFIX_ . "country_lang` cl ON a.id_country = cl.id_country AND cl.id_lang = " . (int)$this->context->language->id . ($id_country ? " WHERE a.id_country = " . (int)$id_country : "") . " GROUP BY a.id_customer ORDER BY a.id_address ASC) cl ON c.id_customer = cl.id_customer
                LEFT JOIN  `" . _DB_PREFIX_ . "currency` cu ON cu.id_currency = " . ($id_currency ? (int)$id_currency : "0") . "
                lEFT JOIN  `" . _DB_PREFIX_ . "gender_lang` gl ON c.id_gender = gl.id_gender
                LEFT JOIN  `" . _DB_PREFIX_ . "lang` l ON c.id_lang = l.id_lang
                WHERE  
                    c.id_shop=" . (int)$id_shop .
            ((int)$id_currency ? " AND o.id_currency=" . (int)$id_currency : "") .
            ((int)$id_lang ? " AND c.id_lang=" . (int)$id_lang : "") .
            ($newsletter == 0 || $newsletter == 1 ? " AND c.newsletter = " . (int)$newsletter : "") .
            ($optin == 0 || $optin == 1 ? " AND c.optin = " . (int)$optin : "") .
            ($list_id_products ? " AND c.id_customer IN (SELECT o.id_customer FROM  `" . _DB_PREFIX_ . "orders` o JOIN  `" . _DB_PREFIX_ . "order_detail` od ON o.id_order = od.id_order AND od.id_shop = " . (int)$this->context->shop->id . " AND od.product_id IN(" . pSQL($list_id_products) . ") GROUP BY o.id_customer)" : "") .
            ($ids ? " AND c.id_customer IN (SELECT o.id_customer FROM  `" . _DB_PREFIX_ . "orders` o JOIN  `" . _DB_PREFIX_ . "order_detail` od ON o.id_order = od.id_order AND od.id_shop = " . (int)$this->context->shop->id . " JOIN  `" . _DB_PREFIX_ . "category_product` cp ON od.product_id = cp.id_product AND cp.id_category IN  (" . pSQL(implode(',', array_map('intval', $ids))) . ") GROUP BY o.id_customer)" : "") .
            ($id_country ? " AND cl.id_country = " . (int)$id_country : "") . " 
                GROUP BY c.id_customer
                HAVING 1 " . ($from_price ? " AND sum(od.total_price_tax_incl) >= " . (float)$from_price : "") . ($to_price ? " AND sum(od.total_price_tax_incl) <= " . (float)$to_price : "");
        if ($newsletter && !$from_price && !$to_price && !$id_currency && !$id_category && !$id_country && ($optin == 2 || $optin == 0) && !$id_lang && !$filter['products']) {
            if (version_compare(_PS_VERSION_, '1.7.0', '>=') && Module::isInstalled('ps_emailsubscription'))
                $sql2 = 'SELECT "" as id_customer, "" as firstname, "" as lastname,"" as gender,CONVERT(email, CHAR CHARACTER SET utf8) as email,"" as birthday,"" as lang,1 as newsletter,"" as optin,"" as country,"" as total_price,"" as iso_code FROM  `' . _DB_PREFIX_ . 'emailsubscription` where id_shop =' . (int)$id_shop . ' AND email NOT IN (SELECT CONVERT(email, CHAR CHARACTER SET utf8) as email FROM ' . _DB_PREFIX_ . 'customer)';
            elseif (Module::isInstalled('blocknewsletter'))
                $sql2 = 'SELECT "" as id_customer, "" as firstname, "" as lastname,"" as gender,CONVERT(email, CHAR CHARACTER SET utf8) as email,"" as birthday,"" as lang,1 as newsletter,"" as optin,"" as country,"" as total_price,"" as iso_code FROM  `' . _DB_PREFIX_ . 'newsletter` where id_shop=' . (int)$id_shop . ' AND email NOT IN (SELECT CONVERT(email, CHAR CHARACTER SET utf8) as email FROM ' . _DB_PREFIX_ . 'customer)';
        }
        if (isset($sql2))
            $sql = $sql . ' UNION ' . $sql2;
        if ($start !== false) {
            $start = $start * 100;
            $sql .= ' LIMIT ' . $start . ',100';
        }
        return Db::getInstance()->executeS($sql);
    }

    public function getCategoryTree($id_category)
    {
        $ids = array();
        if ($id_category) {
            if (!in_array($id_category, $ids))
                $ids[] = $id_category;
            $sql = "SELECT id_category FROM  `" . _DB_PREFIX_ . "category` WHERE id_parent = " . (int)$id_category;
            if ($categories = Db::getInstance()->executeS($sql)) {
                foreach ($categories as $c) {
                    $ids = array_merge($ids, $this->getCategoryTree($c['id_category']));
                }
            }
        }

        return $ids;
    }

    private function getCountries()
    {
        $sql = "SELECT c.id_country, cl.name
                FROM  `" . _DB_PREFIX_ . "country` c
                LEFT JOIN  `" . _DB_PREFIX_ . "country_lang` cl ON c.id_country = cl.id_country AND cl.id_lang = " . (int)$this->context->language->id . "
                WHERE c.active = 1";
        return Db::getInstance()->executeS($sql);
    }

    public function getRevals()
    {
        $api = new Ets_api_v3_client(Configuration::get('YBC_API_KEY'));
        $retvals = array();
        $result = $api->get('/lists');
        if (!empty($result->lists)) {
            foreach ($result->lists as $list) {
                $arr_temp = array();
                $arr_temp['id'] = $list->id;
                $arr_temp['name'] = $list->name;
                $retvals[] = $arr_temp;
            }
        } else {
            return false;
        }
        return $retvals;
    }

    public function checkList($idlist)
    {
        $api = new MCAPI(Configuration::get('YBC_API_KEY'));
        $retvals = array();
        if ($retvals = $api->lists()) {
            if (isset($retvals['data']))
                $retvals = $retvals['data'];
        }
        foreach ($retvals as $retval) {
            if ($idlist == $retval['id']) {
                return true;
            }
        }
        return false;
    }

    public function synchronizeMailchimpList($id_export, $api = null)
    {
        if (!Configuration::get('YBC_API_KEY')) {
            return array('suc' => false, 'error' => $this->l('You need to configure API key'), 'submitted' => $this->l('No emails submitted'));
        }
        $api = new Ets_api_v3_client(Configuration::get('YBC_API_KEY'));
        $start = Tools::getValue('start', false);
        $users = $this->getExportedList((int)$id_export, $start);
        $filter = $this->getFilter((int)$id_export);

        if ($users && $filter) {
            $mailchimpUsers = $this->formatUserList($users);
            if ($api) {

                $body = $api->get_count_member_list($filter['idmailchimp']);
                $member_count = $body->total_items;

                $member_inlist_arr = array();
                $index = 0;
                $res = ($api->get_all_memeber_list($filter['idmailchimp']));
                for ($offset = 0; $offset < $member_count; $offset += 50) :

                    $data = array(
                        'offset' => $offset,
                        'count' => 50
                    );


                    // connect and get results
                    $res = ($api->get_all_memeber_list($filter['idmailchimp'], $data));
                    if ($res->members) {
                        foreach ($res->members as $member) {
                            $member_inlist_arr[$index]['EMAIL'] = $member->email_address;
                            $member_inlist_arr[$index]['NEWSLETTER'] = $member->status == 'subscribed' ? '1' : ($member->status == 'unsubscribed' ? '0' : '');
                            $index++;
                        }
                    }

                endfor;;
                for ($i = 0, $total = count($mailchimpUsers); $i < $total; $i++) {
                    $arr_temp = array();
                    $arr_temp['EMAIL'] = trim($mailchimpUsers[$i]['EMAIL']);
                    $arr_temp['NEWSLETTER'] = trim($mailchimpUsers[$i]['NEWSLETTER']);

                    if (in_array($arr_temp, $member_inlist_arr)) {
                        unset($mailchimpUsers[$i]);
                    }
                }
            }
            return $this->syncList($mailchimpUsers, $filter['idmailchimp']);
        } else {
            return array('suc' => $this->l('Process completed'), 'error' => '', 'submitted' => $this->l('No emails submitted'));
        }
    }

    public function synchronizeAllMailchimpLists()
    {
        $lists = $this->getLists();
        $lists = $this->ets_unique_multidim_array($lists, 'id_export');
        $return = array();
        if ($lists) {
            foreach ($lists as $list) {
                if (!$list['idmailchimp'])
                    continue;
                $res = $this->synchronizeMailchimpList($list['id_export']);
                $return[] = array(
                    'list_id' => $list['id_export'],
                    'sync_result' => $res,
                );
            }
        }
        return $return;
    }

    public function formatUserList($users)
    {
        $mailChimpUsers = array();
        if ($users) {
            foreach ($users as $n) {
                if ($n['birthday'] != '0000-00-00' && $n['birthday'] != '--' && $n['birthday'])
                    $birthday = date('m/d', strtotime($n['birthday']));
                else
                    $birthday = '';
                $orders = $this->getOrdersInfo($n['id_customer']);
                $mailChimpUsers[] = array(
                    'EMAIL' => $n['email'],
                    'FNAME' => (isset($n['firstname']) ? $n['firstname'] : '.'),
                    'LNAME' => (isset($n['lastname']) ? $n['lastname'] : '.'),
                    'GENDER' => $n['gender'],
                    'ADDRESS' => $this->getAddress($n['id_customer']),
                    'NEWSLETTER' => $n['newsletter'],
                    'OPTIN' => $n['optin'],
                    'LANG' => $n['lang'],
                    'BIRTHDAY' => $birthday,
                    'NBORDERS' => isset($orders['nb']) ? $orders['nb'] : '',
                    'LASTORDER' => isset($orders['date']) && $orders['date'] ? date('Y-m-d', strtotime($orders['date'])) : '',
                    'AMOUNT' => isset($orders['value']) ? $orders['value'] : ''
                );
            }
        }
        return $mailChimpUsers;
    }

    public function syncList($users, $list, $name_list = null)
    {
        $connect = false;
        $api_connect = new Ets_api_v3_client(Configuration::get('YBC_API_KEY'));
        $api_id_list = $list;
        if (!Configuration::get('YBC_API_KEY') || !$api_id_list) {
            return array('suc' => false, 'error' => $this->l('error'), 'submitted' => count($users) . ' ' . $this->l(' email(s) have been submitted to Mailchimp server'));
        }
        $total_rqs = count($users);

        $result_push = '';
        $all_list_mailchimp = $this->getRevals();
        foreach ($all_list_mailchimp as $malchimp) {
            if ($malchimp['id'] == $api_id_list) {
                $name_list = $malchimp['name'];
            }
        }
        $total_sync = 0;
        if ($api_connect) {
            $connect = true;
        }

        foreach ($users as $user) {
            $email = $user['EMAIL'];
            $subscriber_hash = md5(Tools::strtolower(trim($email)));
            $resource = sprintf('/lists/%s/members/%s', $api_id_list, $subscriber_hash);
            $args = array();
            $args['email_address'] = $email;
            $args['status'] = (int)$user['NEWSLETTER'] == 1 ? 'subscribed' : 'unsubscribed';
            $args['merge_fields'] = array(
                'FNAME' => $user['FNAME'] ? $user['FNAME'] : $user['FNAME'],
                'LNAME' => $user['LNAME'] ? $user['LNAME'] : $user['LNAME'],
            );
            // "put" updates the member if it's already on the list... take notice
            $connect = true;
            $result_push = $api_connect->put($resource, $args);

            if ($result_push && is_object($result_push) && ($result_push->status == 'subscribed' || $result_push->status == 'unsubscribed')) {
                $total_sync = $total_sync + 1;
            }
        }
        $ret_text = '';
        if ($connect || Tools::getValue('start') >= 1) {
            $total_sync = $total_sync + Tools::getValue('total_sync');
            if ($total_sync == '0') {
                $ret_text = $this->l('No email is synced');
            } elseif ($total_sync == '1') {
                $ret_text = $total_sync . ' ' . sprintf($this->l('email is successfully synced to %s list on your MailChimp account'), $name_list);
            } else {
                $ret_text = $total_sync . ' ' . sprintf($this->l('email is successfully synced to %s list on your MailChimp account'), $name_list);
            }
            return array('suc' => $this->l('Process completed'), 'total_sync' => $total_sync, 'error' => '', 'submitted' => $ret_text, 'start' => Tools::getValue('start', 0), 'tieptuc' => $total_rqs < 100 ? false : true, 'total_report' => $total_rqs);
        }
        return array('suc' => false, 'error' => $this->l('error'), 'submitted' => $this->l('No email is synced'));
    }

    private function getOrdersInfo($id_customer)
    {
        $orders = Order::getCustomerOrders($id_customer, true);
        if (!$orders)
            return array('nb' => '', 'date' => '', 'value' => '');
        $nb = 0;
        $date = '';
        $orders_value = 0;
        foreach ($orders as $order)
            if ($order['valid'] == 1) {
                if ($nb == 0)
                    $date = $order['date_add'];
                $nb++;
                $orders_value += $order['total_paid_real'];
                if ($order['id_currency'])
                    $currency = new Currency($order['id_currency']);
            }
        if (isset($currency))
            $orders_value = Tools::displayPrice($orders_value, $currency);
        return array('nb' => $nb, 'date' => $date, 'value' => $orders_value);
    }

    private function getAddress($id_customer)
    {
        $nb_adress = Customer::getAddressesTotalById((int)$id_customer);
        if ($nb_adress > 1) {
            $sql = 'SELECT id_order FROM `' . _DB_PREFIX_ . 'orders` WHERE `id_customer` = ' . (int)$id_customer . ' AND `valid` = 1 ORDER BY id_order DESC';
            if ($last_order_id = Db::getInstance()->getRow($sql)) {
                $o = new Order((int)$last_order_id);
                return $this->createAddress((int)$o->id_address_invoice);
            } else {
                $id_address = Address::getFirstCustomerAddressId((int)$id_customer);
                return $this->createAddress((int)$id_address);
            }

        } else {
            $id_address = Address::getFirstCustomerAddressId((int)$id_customer);
            return $this->createAddress((int)$id_address);
        }
    }

    public function createAddress($id_address)
    {
        $delimiter = '  ';
        $address = new Address((int)$id_address);
        $country = new Country((int)$address->id_country);
        if ($address->id_state != 0)
            $state_name = State::getNameById($address->id_state);
        else
            $state_name = '';
        $address = $address->address1 . $delimiter . $address->address2 . $delimiter . $address->city . $delimiter . $state_name . $delimiter . $address->postcode . $delimiter . $country->iso_code;
        return $address;
    }

    public function getCategoryById($id_category)
    {
        $sql = "
            SELECT c.*, cl.name,cl.link_rewrite
            FROM  `" . _DB_PREFIX_ . "category` c
            LEFT JOIN  `" . _DB_PREFIX_ . "category_lang` cl ON c.id_category=cl.id_category AND cl.id_lang=" . (int)$this->context->language->id . "
            WHERE c.id_category " . (is_array($id_category) ? "IN(" . pSQL(implode(',', array_map('intval', $id_category))) . ")" : "=" . (int)$id_category) . "
            ORDER BY cl.name ASC
        ";
        return Db::getInstance()->executeS($sql);
    }

    public function displayCategories($categories)
    {
        if ($categories) {
            $this->categoryLevel++;
            foreach ($categories as &$category)
                $category['sub'] = ($subcategories = $this->getChildCategories((int)$category['id_category'])) ? $this->displayCategories($subcategories) : false;
            $this->smarty->assign(array(
                'categories' => $categories,
                'link' => $this->context->link,
                'categoryLevel' => $this->categoryLevel,
                'rootCategoryId' => (int)Configuration::get('PS_ROOT_CATEGORY'),
                'selectedCategoryId' => !$this->saveOk ? Tools::isSubmit('bought_category') ? (int)Tools::getValue('bought_category') : (($id_export = (int)Tools::getValue('id_export')) && ($filter = $this->getFilter($id_export)) && isset($filter['id_category']) ? (int)$filter['id_category'] : 0) : 0,
            ));
            $this->categoryLevel--;
            return $this->display(__FILE__, 'categories-tree.tpl');
        }
    }

    public function getChildCategories($id_parent)
    {
        return Db::getInstance()->executeS("
            SELECT c.*, cl.name,cl.link_rewrite
            FROM  `" . _DB_PREFIX_ . "category` c
            LEFT JOIN  `" . _DB_PREFIX_ . "category_lang` cl ON c.id_category=cl.id_category AND cl.id_lang=" . (int)$this->context->language->id . "
            WHERE c.id_parent=" . (int)$id_parent . " AND c.id_category!=" . (int)$id_parent . "
            ORDER BY cl.name ASC
        ");
    }

    /**
     * Helper displaying error message(s)
     * @param string|array $error
     * @return string
     */
    public function displayError($error)
    {
        $this->error = true;
        return parent::displayError($error);
    }

    public function ets_unique_multidim_array($array, $key)
    {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::isSubmit('configure') && Tools::strtolower(Tools::getValue('configure')) == 'ets_mailchimpsync') {
            $this->context->controller->addCSS($this->_path . 'views/css/admin.css', 'all');
            $this->context->controller->addJquery();
            $this->context->controller->addJS($this->_path . 'views/js/admin.js');
        }
    }

    public function displayIframe()
    {
        switch ($this->context->language->iso_code) {
            case 'en':
                $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_' . $this->name . '&utm_medium=iframe';
                break;
            case 'it':
                $url = 'https://cdn.prestahero.com/it/prestahero-product-feed?utm_source=feed_' . $this->name . '&utm_medium=iframe';
                break;
            case 'fr':
                $url = 'https://cdn.prestahero.com/fr/prestahero-product-feed?utm_source=feed_' . $this->name . '&utm_medium=iframe';
                break;
            case 'es':
                $url = 'https://cdn.prestahero.com/es/prestahero-product-feed?utm_source=feed_' . $this->name . '&utm_medium=iframe';
                break;
            default:
                $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_' . $this->name . '&utm_medium=iframe';
        }
        $this->smarty->assign(
            array(
                'url_iframe' => $url
            )
        );
        return $this->display(__FILE__, 'iframe.tpl');
    }


}