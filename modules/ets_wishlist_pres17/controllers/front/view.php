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

class Ets_wishlist_pres17ViewModuleFrontController extends ModuleFrontController
{
    public $module;
    protected $wishlist;
    public function __construct()
    {
        $module = Module::getInstanceByName('ets_wishlist_pres17');
        $this->module = $module;
        if (empty($this->module->active)) {
            Tools::redirect('index');
        }
        parent::__construct();
    }
    public function init()
    {
        parent::init();
        $id_wishlist = $this->getWishlistId();
        $this->wishlist = new Ets_wl_wishList($id_wishlist);
        if (false === Validate::isLoadedObject($this->wishlist)) {
            Tools::redirect('index.php?controller=404');
        }
        if (false === $this->module->hasReadAccessToWishlist($this->wishlist)) {
            header('HTTP/1.1 403 Forbidden');
            header('Status: 403 Forbidden');
            $this->errors[] = $this->module->l('You do not have access to this wish list.','action');
            $this->setTemplate('errors/forbidden');
            return;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function initContent()
    {
        parent::initContent();
        if (false === $this->module->hasReadAccessToWishlist($this->wishlist)) {
            return;
        }
        $body_classes = array(
            'lang-'.$this->context->language->iso_code => true,
            'lang-rtl' => (bool) $this->context->language->is_rtl,
            'country-'.$this->context->country->iso_code => true,                                   
        );
        $page = array(
            'title' => '',
            'canonical' => '',
            'meta' => array(
                'title' => $this->wishlist->name,
                'description' => '',
                'keywords' => '',
                'robots' => 'index',
            ),
            'page_name' => 'wishlist-page',
            'body_classes' => $body_classes,
            'admin_notifications' => array(),
        );
        $this->context->smarty->assign(
            array(
                'wishlistsLink' => Context::getContext()->link->getModuleLink($this->module->name, 'lists'),
                'addProductToCartUrl' => Context::getContext()->link->getModuleLink($this->module->name,'action',['action'=>'addProductToCart']),
                'list_products' => $this->module->displayListProductsByWishlist($this->wishlist),
                'page'=>$page,
            )
        );
        $this->setTemplate('module:'.$this->module->name.'/views/templates/front/pages/view.tpl');
    }
    private function getWishlistId()
    {
        if (($id_wishlist = (int)Tools::getValue('id_wishlist'))) {
            return (int) $id_wishlist;
        }

        if (($token = Tools::getValue('token')) && Validate::isMessage($token)) {
            $wishlistData = Ets_wl_wishList::getByToken(
                $token
            );

            if (!empty($wishlistData['id_ets_wishlist'])) {
                return $wishlistData['id_ets_wishlist'];
            }
        }
        return false;
    }
    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();

        $breadcrumb['links'][] = $this->addMyAccountToBreadcrumb();
        $breadcrumb['links'][] = [
            'title' => Configuration::get('ETS_WL_MY_WISHLISTS', $this->context->language->id),
            'url' => $this->context->link->getModuleLink('ets_wishlist_pres17', 'lists'),
        ];
        $breadcrumb['links'][] = [
            'title' => $this->wishlist->name,
            'url' => Context::getContext()->link->getModuleLink('ets_wishlist_pres17', 'view', $this->getAccessParams()),
        ];

        return $breadcrumb;
    }
    private function getAccessParams()
    {
        if (Tools::getIsset('token')) {
            return ['token' => Tools::getValue('token')];
        }
        if (($id_wishlist = (int)Tools::getValue('id_wishlist'))) {
            return ['id_wishlist' => $id_wishlist];
        }

        return [];
    }
}
