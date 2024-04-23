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

class Ets_wishlist_pres17ActionModuleFrontController extends ModuleFrontController
{
    public function postProcess()
    {
        if (false === $this->context->customer->isLogged()) {
            die(
                Tools::jsonEncode([
                    'success' => false,
                    'message' => $this->module->l('You aren\'t logged in','action'),
                ])
            );
        }
        if (method_exists($this, Tools::getValue('action') . 'Action')) {
            call_user_func([$this, Tools::getValue('action') . 'Action']);
            exit;
        }
        die(
            Tools::jsonEncode([
                'success' => false,
                'message' => $this->module->l('Unknown action','action'),
            ])
        );
    }
    private function createNewWishListAction()
    {
        if ($name = Tools::getValue('wishlist_name')) {
            if(Validate::isGenericName($name))
            {
                $wishlist = new Ets_wl_wishList();
                $wishlist->name = $name;
                $wishlist->id_shop_group = $this->context->shop->id_shop_group;
                $wishlist->id_customer = $this->context->customer->id;
                $wishlist->id_shop = $this->context->shop->id;
                $wishlist->token = $this->module->generateWishListToken();
    
                if (true === $wishlist->save()) {
                    die(
                        Tools::jsonEncode([
                            'success' => true,
                            'message' => $this->module->l('The list has been properly created','action'),
                            'datas' => [
                                'name' => $wishlist->name,
                                'id_ets_wishlist' => $wishlist->id,
                                'listUrl' => $this->context->link->getModuleLink($this->module->name, 'view', ['id_wishlist' => $wishlist->id]),
                                'shareUrl' => $this->context->link->getModuleLink($this->module->name, 'view', ['token' => $wishlist->token]),
                                'deleteUrl' =>$this->context->link->getModuleLink($this->module->name,'action',['action' => 'deleteWishlist','id_wishlist'=>$wishlist->id]), 
                            ],
                        ])
                    );
                }
                die(
                    Tools::jsonEncode([
                        'success' => false,
                        'message' => $this->module->l('Error occurred while saving the new list','action'),
                    ])
                );
            }
            die(
                Tools::jsonEncode([
                    'success' => false,
                    'message' => $this->module->l('Wish list name is not valid','action'),
                ])
            );
            
        } else {
            die(
                Tools::jsonEncode([
                    'success' => false,
                    'message' => $this->module->l('Missing name parameter','action'),
                ])
            );
        }
    }
    private function addProductToWishListAction()
    {
        $id_product = (int)Tools::getValue('id_product');
        $product = new Product($id_product);
        if (!Validate::isLoadedObject($product)) {
            die(
                Tools::jsonEncode([
                    'success' => false,
                    'message' => $this->module->l('There was an error while adding the product','action'),
                ])
            );
        }
        $idWishList = (int)Tools::getValue('id_wishlist');
        $id_product_attribute = (int)Tools::getValue('id_product_attribute');
        $quantity = (int) Tools::getValue('quantity');
        if (0 === $quantity) {
            $quantity = $product->minimal_quantity;
        }
        if ($id_product_attribute && ($combination = new Combination($id_product_attribute)) && (!Validate::isLoadedObject($combination) || $combination->id_product!=$id_product)) {
            die(
                Tools::jsonEncode([
                    'success' => false,
                    'message' => $this->module->l('There was an error while adding the product attributes','action'),
                ])
            );
        }

        $wishlist = new Ets_wl_wishList($idWishList);
        // Exit if not owner of the wishlist
        if (!Validate::isLoadedObject($wishlist) || $wishlist->id_customer !=$this->context->customer->id) {
            die(
                Tools::jsonEncode([
                    'success' => false,
                    'message' => $this->module->l('There was an error while adding the wish list','action'),
                ])
            );
        }
        $productIsAdded = $wishlist->addProduct(
            $idWishList,
            $this->context->customer->id,
            $id_product,
            $id_product_attribute,
            $quantity
        );  
        $newStat = new Ets_wl_statistics();
        $newStat->id_product = $id_product;
        $newStat->id_product_attribute = $id_product_attribute;
        $newStat->id_shop = $this->context->shop->id;
        $newStat->save();
        if (false === $productIsAdded) {
            die(
                Tools::jsonEncode([
                    'success' => false,
                    'message' => $this->module->l('There was an error while adding the product','action'),
                ])
            );
        }
        die(
            Tools::jsonEncode([
                'success' => true,
                'id_wishlist' => $idWishList,
                'message' => $this->module->l('Product added','action'),
            ])
        );
    }
    private function deleteProductFromWishListAction()
    {
        if (($id_product = (int)Tools::getValue('id_product'))) {
            $id_product_attribute = (int)Tools::getValue('id_product_attribute');
            $id_wishlist = Tools::getValue('id_wishlist');
            $isDeleted = Ets_wl_wishList::removeProduct(
                $id_wishlist,
                $this->context->customer->id,
                $id_product,
                $id_product_attribute
            );
            if (true === $isDeleted) {
                die(
                    Tools::jsonEncode([
                        'success' => true,
                        'message' => $this->module->l('Product successfully removed','action'),
                        'products_list' => Tools::isSubmit('viewpage') && ($wishlist = new Ets_wl_wishList($id_wishlist)) ? $this->module->displayListProductsByWishlist($wishlist):'',
                    ])
                );
            }
            die(
                Tools::jsonEncode([
                    'success' => false,
                    'message' => $this->module->l('Unable to remove product from list','action'),
                ])
            );
        }

        return $this->ajaxRenderMissingParams();
    }
    private function renameWishListAction()
    {
        if (($id_wishlist = (int)Tools::getValue('id_wishlist')) && ($name = Tools::getValue('wishlist_name'))) {
            if(Validate::isGenericName($name))
            {
                $wishlist = new Ets_wl_wishList($id_wishlist);
                $this->assertWriteAccess($wishlist);
                $wishlist->name = $name;
                if (true === $wishlist->save()) {
                    die(
                        Tools::jsonEncode([
                            'success' => true,
                            'message' => $this->module->l('List has been renamed','action'),
                            'datas' => [
                                'name' => $wishlist->name,
                                'id_ets_wishlist' => $wishlist->id,
                                'listUrl' => $this->context->link->getModuleLink($this->module->name, 'view', ['id_wishlist' => $wishlist->id]),
                                'shareUrl' => $this->context->link->getModuleLink($this->module->name, 'view', ['token' => $wishlist->token]),
                            ],
                        ])
                    );
                }
                die(
                    Tools::jsonEncode([
                        'success' => false,
                        'message' => $this->module->l('List could not be renamed','action'),
                    ])
                );
            }
            else
            {
                die(
                    Tools::jsonEncode([
                        'success' => false,
                        'message' => $this->module->l('Wishlist name is not valid','action'),
                    ])
                );
            }
        }
        return $this->ajaxRenderMissingParams();
    }
    private function deleteWishListAction()
    {
        if ($id_wishlist = (int)Tools::getValue('id_wishlist')) {
            $wishlist = new Ets_wl_wishList($id_wishlist);
            // Exit if not owner of the wishlist
            $this->assertWriteAccess($wishlist);
            if (true === (bool) $wishlist->delete()) {
                die(
                    Tools::jsonEncode([
                        'success' => true,
                        'message' => $this->module->l('List has been removed','action'),
                        'datas' => array(
                            'id_ets_wishlist' => $wishlist->id,
                        ),
                    ])
                );
            }

            die(
                Tools::jsonEncode([
                    'success' => false,
                    'message' => $this->module->l('List deletion was unsuccessful','action'),
                ])
            );
        }
        return $this->ajaxRenderMissingParams();
    }
    private function addProductToCartAction()
    {
        $idWishlist = (int)Tools::getValue('idWishlist');
        $id_product = (int)Tools::getValue('id_product');
        $id_product_attribute = (int)Tools::getValue('id_product_attribute');
        $productAdd = Ets_wl_wishList::addBoughtProduct(
            $idWishlist,
            $id_product,
            $id_product_attribute,
            (int) $this->context->cart->id,
            1
        );

        // Transform an add to favorite
        Db::getInstance()->execute('
            UPDATE `' . _DB_PREFIX_ . 'ets_blockwishlist_statistics`
            SET `id_cart` = ' . (int) $this->context->cart->id . '
            WHERE `id_cart` = 0
            AND `id_product` = ' . (int) $id_product . '
            AND `id_product_attribute` = ' . (int) $id_product_attribute . '
            AND `id_shop`= ' . $this->context->shop->id
        );
        if (true === $productAdd) {
            die(
                Tools::jsonEncode([
                    'success' => true,
                    'message' => $this->module->l('Product added to cart','action'),
                ])
            );
        }
        die(
            Tools::jsonEncode([
                'success' => false,
                'message' => $this->module->l('Error when adding product to cart','action'),
            ])
        );
    }
    public function assertWriteAccess($wishlist)
    {
        if (!Validate::isLoadedObject($wishlist) || $wishlist->default || $wishlist->id_customer !=$this->context->customer->id) {
            die(
                Tools::jsonEncode([
                    'success' => false,
                    'message' => $this->module->l('Wishlist is not valid','action'),
                ])
            );
        }
    }
    private function ajaxRenderMissingParams()
    {
        die(
            Tools::jsonEncode([
                'success' => false,
                'message' => $this->module->l('Request is missing one or multiple parameters','action'),
            ])
        );
    }
    private function getProductListAction()
    {
        $id_wishlist = (int)Tools::getValue('id_wishlist');
        $position = Tools::getValue('position');
        die(
            Tools::jsonEncode([
                'success' => true,
                'product_list' => $this->module->displayBlockWishlist($id_wishlist,$position),
            ])
        );
    }
}