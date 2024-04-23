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

require_once dirname(__FILE__) . '/AdminEtsSPFormRenderController.php';

class AdminEtsSPSendProductDetailController extends AdminEtsSPFormRenderController
{
    public $mPath;
    public $id_product;

    public function __construct()
    {
        $this->table = 'ph_sendproduct_tofriend';
        $this->list_id = $this->table;
        $this->identifier = 'id_sptf';
        $this->className = 'EtsSendProductForm';
        $this->bootstrap = true;
        $this->lang = false;
        $this->show_form_cancel_button = false;
        $this->list_no_link = true;
        parent::__construct();

        $this->mPath = $this->module->getPathUri();
        $this->id_product = (int)Tools::getValue('id_product');
        $this->bulk_actions = array();
        $this->_where = 'AND a.id_product = ' . $this->id_product;
        $this->_orderWay = 'DESC';
        $this->_orderBy = 'date_add';
        $this->_default_pagination = 20;
        $this->_pagination = [20, 50, 100];
        $this->fields_list = array(
            'id_sptf' => array(
                'title' => $this->l('ID'),
                'type' => 'int',
                'align' => 'center',
                'filter_key' => 'a!id_sptf',
                'class' => 'fixed-width-xs center',
            ),
            'sender' => array(
                'title' => $this->l('From'),
                'align' => 'center',
                'filter_key' => 'sender',
                'class' => 'sptf-user-infor',
                'callback' => 'displayUserInformation',
                'filterHaving' => true
            ),
            'receiver' => array(
                'title' => $this->l('To friend'),
                'align' => 'center',
                'filter_key' => 'receiver',
                'class' => 'sptf-user-infor',
                'callback' => 'displayUserInformation',
                'filterHaving' => true
            ),
            'date_add' => array(
                'title' => $this->l('Shared times'),
                'align' => 'center',
                'filter_key' => 'date_add',
                'class' => 'sptf-date-add center',
                'filterHaving' => true
            ),
        );
    }

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        self::$currentIndex .= '&id_product=' . (int)$this->id_product;
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme); // TODO: Change the autogenerated stub
        $this->addJS(array(
            $this->mPath . 'views/js/back.js',
        ));
        $this->context->controller->addCSS(array($this->mPath . 'views/css/back.css'), 'all');
    }

    public function displayUserInformation($name, $tr)
    {
        $customer = new Customer();
        $customer = $customer->getByEmail($tr['email_from']);
        $isLog = false;
        if ($name == $tr['sender']) {
            $email = $tr['email_from'];
            $isLog = $tr['is_logged'];
        } else {
            $email = $tr['email_to'];
        }
        $customer_link = (isset($customer->id) && $customer->id) ? $this->context->link->getAdminLink('AdminCustomers') . '&viewcustomer' . '&id_customer=' . (int)$customer->id : '';
        $this->context->smarty->assign(array(
            'name' => $name,
            'email' => $email,
            'isLog' => $isLog,
            'userLink' => $customer_link,
        ));
        return $this->module->fetch(_PS_MODULE_DIR_ . $this->module->name . '/views/templates/hook/user-row.tpl');
    }
}