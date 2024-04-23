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

/**
 * @since 1.5
 */
class HTMLTemplateCartPdf extends HTMLTemplate
{
    public $data;

    public function __construct($data, $smarty)
    {
        $this->data = $data;
        $this->smarty = $smarty;
        // header informations
        $this->title = '';
        $this->date = date('Y-m-d H:i:s');//Tools::displayDate($this->cart->date_add);
        // footer informations
        $this->shop = new Shop(Context::getContext()->shop->id);
        $this->context = Context::getContext();
    }

    /**
     * Returns the template's HTML content
     * @return string HTML content
     */
    public function getContent()
    {
        $this->context->smarty->assign(array_merge(
            (array)$this->data,
            [
                'PS_SHOP_NAME' => Configuration::get('PS_SHOP_NAME')
            ]
        ));
        $html = $this->context->smarty->fetch(_PS_MODULE_DIR_ . 'ets_savemycart/views/templates/hook/m-content.tpl');
        return $html;
    }

    public function getHeader()
    {
        $this->smarty->assign(
            array(
                'header' => HTMLTemplateCartPdf::l('Shopping cart'),
            )
        );
        return parent::getHeader();
    }

    /**
     * Returns the template filename
     * @return string filename
     */
    public function getFilename()
    {
        return 'shopping_cart.pdf';
    }

    /**
     * Returns the template filename when using bulk rendering
     * @return string filename
     */
    public function getBulkFilename()
    {
        return 'shopping_cart.pdf';
    }
}