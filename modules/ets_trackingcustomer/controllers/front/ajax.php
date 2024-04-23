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

if (!defined('_PS_VERSION_')) { exit; }
class Ets_trackingcustomerAjaxModuleFrontController extends ModuleFrontController
{
    public function __construct()
	{
		parent::__construct();
	}
    public function postProcess()
    {
        $token = Tools::getValue('token');
        if($token == Configuration::get('ETS_TC_TOKEN_AJAX') && Tools::isSubmit('addActionSessionCustomer') && ($action = Tools::getValue('action')) && Validate::isCleanHtml($action))
        {
            $id_product = (int)Tools::getValue('id_product');
            $id_product_attribute = (int)Tools::getValue('id_product_attribute');
            Ets_tc_session::addAction($action,$id_product,$this->context->cart->id,0,0, (int)$id_product_attribute);
            die($this->module->l('Added action','ajax'));
        }
    }
    public function initContent()
    {
        die($this->module->l('Access denied','ajax'));
    }
 }