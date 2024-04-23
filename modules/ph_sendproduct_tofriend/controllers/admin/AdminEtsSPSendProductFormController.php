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

require_once dirname(__FILE__).'/AdminEtsSPFormRenderController.php';
class AdminEtsSPSendProductFormController extends AdminEtsSPFormRenderController
{
    public $mPath;
    public function __construct()
    {
        $this->table = 'ph_sendproduct_tofriend';
        $this->list_id = $this->table;
        $this->identifier = 'id_product';
        $this->className = 'EtsSendProductForm';
        $this->bootstrap = true;
        $this->lang = false;
        $this->show_form_cancel_button = false;
        $this->list_no_link = true;
        $this->controllerName = 'AdminEtsSPSendProductForm';
        parent::__construct();

        $this->mPath = $this->module->getPathUri();
        $this->addRowAction('view');
        $this->bulk_actions = array();
        $this->_select = '
            pl.name `name`,
            pl.link_rewrite,
            img_shop.id_image,
            p.id_product,
            tc.count
        ';
        $this->_join = '
            LEFT JOIN (SELECT COUNT(1) `count`, id_sptf FROM `' . _DB_PREFIX_ . 'ph_sendproduct_tofriend` GROUP BY id_product) tc ON (tc.id_sptf = a.id_sptf)
            LEFT JOIN `' . _DB_PREFIX_ . 'product` p ON (a.id_product = p.id_product)
            LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON (p.id_product = pl.id_product AND pl.id_lang=' . (int)$this->context->language->id . ')
            LEFT JOIN `' . _DB_PREFIX_ . 'image` i ON (i.id_product = p.id_product)
            INNER JOIN `' . _DB_PREFIX_ . 'image_shop` img_shop ON (img_shop.id_product = i.id_product AND img_shop.cover=1 AND img_shop.id_shop='.(int)$this->context->shop->id.')
        ';
        $this->_group = 'GROUP BY a.id_product';
        $this->_orderWay = 'DESC';
        $this->_orderBy = 'count';
        $this->_default_pagination = 20;
        $this->_pagination = [20,50,100];

        $this->fields_list = array(
            'id_product' => array(
                'title' => $this->l('Product ID'),
                'type' => 'int',
                'align' => 'center',
                'filter_key' => 'a!id_product',
                'class' => 'fixed-width-xs center',
            ),
            'name' => array(
                'title' => $this->l('Shared product'),
                'align' => 'center',
                'filter_key' => 'name',
                'class' => 'shared_product',
                'callback' => 'displayProductShare',
                'filterHaving' => true
            ),
            'count' => array(
                'title' => $this->l('Shared times'),
                'align' => 'center',
                'filter_key' => 'count',
                'class' => 'fixed-width-xs center',
                'filterHaving' => true
            ),
        );

        $this->fields_options = array(
            'title' => $this->l('Settings'),
            'fields' => Ets_sptf_defines::getInstance()->getConfigs(),
            'icon' => '',
            'submit' => array(
                'title' => $this->l('Save'),
            )
        );
    }

    public function initContent()
    {
        if (!$this->viewAccess()) {
            $this->errors[] = $this->trans('You do not have permission to view this.', [], 'Admin.Notifications.Error');

            return;
        }

        if ($this->display == 'edit' || $this->display == 'add') {
            if (!$this->loadObject(true)) {
                return;
            }

            $this->content .= $this->renderForm();
        } elseif ($this->display == 'view') {
            // Some controllers use the view action without an object
            if ($this->className) {
                $this->loadObject(true);
            }
            $this->content .= $this->renderView();
        } elseif ($this->display == 'details') {
            $this->content .= $this->renderDetails();
        } elseif (!$this->ajax) {
            $this->content .= $this->renderKpis();
            $this->content .= $this->renderOptions();
            $this->content .= $this->renderList();

            // if we have to display the required fields form
            if ($this->required_database) {
                $this->content .= $this->displayRequiredFields();
            }
        }
        $this->content .= $this->module->displayIframe();
        $this->context->smarty->assign([
            'content' => $this->content,
        ]);

    }
    public function validateRules($class_name = null)
    {
        parent::validateRules($class_name); // TODO: Change the autogenerated stub
    }
    public function processUpdateOptions()
    {
        return parent::processUpdateOptions(); // TODO: Change the autogenerated stub
    }

    public function postProcess()
    {
        if (Tools::isSubmit('viewph_sendproduct_tofriend')){
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminEtsSPSendProductDetail').'&id_product='.Tools::getValue('id_product'));
        }
        elseif (Tools::isSubmit('submitOptionsph_sendproduct_tofriend')){
            $this->validateRules();
            if (empty($this->errors)) {
                $this->processUpdateOptions();
            }
        }
        if (Tools::isSubmit('reset_config')){
            Module::getInstanceByName('ph_sendproduct_tofriend')->initDefaultConfig();
            die(json_encode(array(
                'success' => $this->l('Configuration was successfully reset. This page will be reloaded in 3 seconds'),
            )));
        }
        parent::postProcess();
    }
    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme); // TODO: Change the autogenerated stub
        $this->addJS(array(
            $this->mPath . 'views/js/back.js',
        ));
        $this->context->controller->addCSS(array($this->mPath . 'views/css/back.css'), 'all');
    }
    public function displayProductShare($product_name, $tr)
    {
        $product = new Product($tr['id_product'],false,$this->context->language->id);
        $this->context->smarty->assign(array(
            'product_name'=>$product_name,
            'image_url' => $this->context->link->getImageLink($tr['link_rewrite'], $tr['id_image'], ImageType::getFormattedName('small')),
            'product_link' => $this->context->link->getProductLink($product, $product->link_rewrite, $product->category, $product->ean13, $this->context->language->id)
            ));
        return $this->module->fetch(_PS_MODULE_DIR_.$this->module->name.'/views/templates/hook/product_image.tpl');
    }

}