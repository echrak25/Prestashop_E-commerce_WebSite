<?php
/**
 * 2007-2022 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 wesite only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2022 ETS-Soft
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */
 
if (!defined('_PS_VERSION_'))
    exit;
class ProductListingFrontController extends ProductListingFrontControllerCore
{
    public function getListingLabel(){
        
    }
    protected function getProductSearchQuery(){
        
    }

    protected function getDefaultProductSearchProvider(){
        
    }
    protected function getAjaxProductSearchVariables()
    {
        $search = $this->getProductSearchVariables();
        $rendered_products_top = $this->render('catalog/_partials/products-top', ['listing' => $search]);
        $assignVariables = Module::getInstanceByName('ets_productlistpagination')->_assignVariables();
        $rendered_products = Context::getContext()->smarty->fetch(_PS_MODULE_DIR_.'ets_productlistpagination/views/templates/hook/catalog/listing/products.tpl', array_merge(array('listing' => $search),$assignVariables));
        $rendered_products_bottom = $this->render('catalog/_partials/products-bottom', ['listing' => $search]);
        $data = array_merge(
            [
                'rendered_pagination_products' => Context::getContext()->smarty->fetch(_PS_MODULE_DIR_.'ets_productlistpagination/views/templates/hook/catalog/listing/pagination.tpl',array_merge(array('pagination' => $search['pagination']),$assignVariables)),
                'rendered_list_products' => Context::getContext()->smarty->fetch(_PS_MODULE_DIR_.'ets_productlistpagination/views/templates/hook/catalog/listing/product_list.tpl', ['products' => $search['products']]),
                'rendered_products_top' => $rendered_products_top,
                'rendered_products' => $rendered_products,
                'rendered_products_bottom' => $rendered_products_bottom,
            ],
            $search
        );
        if (!empty($data['products']) && is_array($data['products'])) {
            $data['products'] = $this->prepareProductArrayForAjaxReturn($data['products']);
        }

        return $data;
    }
}