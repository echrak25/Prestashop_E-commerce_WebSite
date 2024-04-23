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
class Ets_wishlist_pres17ListsModuleFrontController extends ModuleFrontController
{
    /**
     * @var bool If set to true, will be redirected to authentication page
     */
    public $auth = true;

    public function initContent()
    {
        parent::initContent();
        $wishlists = $this->module->getAllWishList();
        if($wishlists)
        {
            foreach($wishlists as &$wishlist)
            {
                $wishlist['products'] = Ets_wl_wishList::printProductsById($wishlist['id_ets_wishlist']);
            }
        }
        $this->context->smarty->assign(
            array(
            'url' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'getAllWishlist']),
            'createUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'createNewWishlist']),
            'deleteListUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'deleteWishlist']),
            'deleteProductUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'deleteProductFromWishlist']),
            'renameUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'renameWishlist']),
            'shareUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'getUrlByIdWishlist']),
            'addUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'addProductToWishlist']),
            'accountLink' => '#',
            'wishlistsTitlePage' => Configuration::get('ETS_WL_MY_WISHLISTS', $this->context->language->id),
            'newWishlistCTA' => Configuration::get('ETS_WL_CREATE_BUTTON_LABEL', $this->context->language->id),
            'wishlists' => $wishlists,
            )
        );
        $this->setTemplate('module:'.$this->module->name.'/views/templates/front/pages/lists.tpl');
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();

        $breadcrumb['links'][] = $this->addMyAccountToBreadcrumb();
        $breadcrumb['links'][] = [
          'title' => Configuration::get('ETS_WL_MY_WISHLISTS', $this->context->language->id),
          'url' => $this->context->link->getModuleLink($this->module->name, 'lists'),
        ];

        return $breadcrumb;
    }
}