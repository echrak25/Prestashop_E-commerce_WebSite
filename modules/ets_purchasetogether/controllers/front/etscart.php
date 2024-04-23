<?php
/**
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  @version  Release: $Revision$
*  International Registered Trademark & Property of PrestaShop SA
*/
if (!defined('_PS_VERSION_'))
	exit;
    
if(!class_exists('ptProduct') && version_compare(_PS_VERSION_, '1.7.0', '<='))
    require_once dirname(__FILE__).'/classes/ptProduct.php';

class Ets_purchasetogetherEtscartModuleFrontController extends ModuleFrontController
{
    public $_errors = array();
    public $productAddeds = array();
    public $is17;
    public $is16;
    protected $ets_purchasetogether = array();
    /**
     * @see FrontController::init()
    */
    public function init()
    {
        parent::init();
        header('X-Robots-Tag: noindex, nofollow', true);
        $this->is17 = version_compare(_PS_VERSION_, '1.7.0', '>=');
        $this->is16 = version_compare(_PS_VERSION_, '1.6.0', '>=');
    }
    /**
    * @see FrontController::initContent()
    */
    public function initContent()
    {
        parent::initContent();

        if (Tools::getIsset('item') && $this->isTokenValid() && version_compare(_PS_VERSION_, '1.7.0', '<=')) {
            $idCombination = Tools::getValue('ida', 0);
            $id_product = Tools::getValue('idp', 0);
            if (!$id_product && !$idCombination) {
                $this->ajaxDie(json_encode(array(
                    'hasError' => true,
                    'errors' => array($this->module->l('Product is null', 'etscart')),
                )));
            } else {
                $this->ajaxDie(json_encode(array(
                    'hasError' => false,
                    'product' => ptProduct::getProductAttribute($id_product, $idCombination, $this->context->shop->id),
                )));
            }
        }
        if ($this->context->cookie->exists() && !$this->errors && !($this->context->customer->isLogged() && !$this->isTokenValid())) {
            if (Tools::getIsset('add')) {
                $this->processChangeProductInCart();
            }
        } elseif (!$this->isTokenValid()) {
            if (Tools::getValue('ajax')) {
                $this->ajaxDie(json_encode(array(
                    'hasError' => true,
                    'errors' => array($this->module->l('Impossible to add the product to the cart. Please refresh page.', 'etscart')),
                )));
            } else {
                Tools::redirect('index.php');
            }
        }
    }
    
    /**
     * Quá trình này thêm nhiều sản phẩm vào giỏ hàng
     */
    protected function processChangeProductInCart()
    {
        $this->ets_purchasetogether = new Ets_purchasetogether();
        $configs = $this->ets_purchasetogether->getConfigs();
        $productIds = Tools::getValue('productIds')?Tools::getValue('productIds'): '';
        $products =  json_decode($productIds);
        $ajax = Tools::getValue('ajax')? true : false;
        if($this->is17 && $configs['ETS_PT_REQUIRE_CURRENT_PRODUCT']) {
            $id_product = (int)Tools::getValue('id_product') ? (int)Tools::getValue('id_product') : 0;
            $group = is_array(Tools::getValue('group')) ? Tools::getValue('group') : [];
            $id_product_attribute = 0;
            /**
             * Method Product::getIdProductAttributesByIdAttributes removed from 1.7.3
             */
            if ($id_product && $group) {
                $id_product_attribute = method_exists('Product', 'getIdProductAttributesByIdAttributes')
                    ? (int)Product::getIdProductAttributesByIdAttributes($id_product, $group)
                    : (int)self::getIdProductAttributesByIdAttributes($id_product, $group);

                $product_curr = new stdClass();
                if($id_product_attribute && ($qty = Tools::getValue('qty')) && $qty){
                    $product_curr->id_product = $id_product;
                    $product_curr->id_product_attribute = $id_product_attribute;
                    $product_curr->qty = $qty;
                    $product_curr->currProduct = 1;
                }
                array_push($products, $product_curr);
            }
        }
        
        /** each product add to cart*/
        if(is_array($products) && $products)
        {
            foreach($products as $prod)
            {
                /** Create key name for product attribute*/
                $key = $prod->id_product.'_'.$prod->id_product_attribute;
                $this->productAddeds[$key]['errors'] = array();
                
                $this->productAddeds[$key]['id_product'] = $prod->id_product;
                $this->productAddeds[$key]['id_product_attribute'] = $prod->id_product_attribute;
                
                /** kiem tra so luong va id sp*/
                if (!$prod->id_product) {
                    $this->productAddeds[$key]['errors'][] = $this->module->l('Product not found', 'etscart');
                    continue;
                }
                /** kiem tra sp co san sang ko*/
                $product = new Product((int)$prod->id_product);
                if (!$product->id || !$product->active || !$product->checkAccess($this->context->cart->id_customer)) {
                    $this->productAddeds[$key]['errors'][] = $this->module->l('This product is no longer available.', 'etscart');
                    continue;
                }
                
                $qty_to_check = $prod->qty;
                $cart_products = $this->context->cart->getProducts();
                
                /** Xac dinh so luong hien co cua san pham va xac dnh la tang hay giam*/
                if (is_array($cart_products)) {   
                    foreach ($cart_products as $cart_product) {
                        if ((!isset($prod->id_product_attribute) || $cart_product['id_product_attribute'] == $prod->id_product_attribute ) &&
                            (isset($prod->id_product) && $cart_product['id_product'] == $prod->id_product)) {
                            $qty_to_check = $cart_product['cart_quantity'];
                            $qty_to_check += $prod->qty;
                            break;
                        }
                    }
                }
                                
                /** Kiem tra so luong san pham co san*/
                if($configs['ETS_PT_EXCLUDE_OUT_OF_STOCK']){
                    $out_of_stock = StockAvailable::outOfStock($product->id);
                    if ($prod->id_product_attribute) {
                        $out_of_stock = StockAvailable::outOfStock($product->id);
                        if (!Product::isAvailableWhenOutOfStock($out_of_stock) && !self::checkAttributeQty($prod->id_product_attribute, $qty_to_check)) {
                            $this->productAddeds[$key]['errors'][] =  $this->module->l('There isn\'t enough product in stock.', 'etscart');                            
                        }
                    } elseif ($product->hasAttributes()) {
                        $minimumQuantity = ($out_of_stock == 2) ? !Configuration::get('PS_ORDER_OUT_OF_STOCK') : !$out_of_stock;
                        $prod->id_product_attribute = Product::getDefaultAttribute($product->id, $minimumQuantity);
                        // @todo do something better than a redirect admin !!
                        if (!$prod->id_product_attribute) {
                            Tools::redirectAdmin($this->context->link->getProductLink($product));
                        } elseif (!Product::isAvailableWhenOutOfStock($out_of_stock) && !self::checkAttributeQty($prod->id_product_attribute, $qty_to_check)) {
                            $this->productAddeds[$key]['errors'][] = $this->module->l('There isn\'t enough product in stock.', 'etscart');                            
                        }
                    } elseif (!$product->checkQty($qty_to_check)) {
                        $this->productAddeds[$key]['errors'][] = $this->module->l('There isn\'t enough product in stock.', 'etscart');                        
                    }
                }
                
                /** Nếu không có lỗi thì thêm sản phẩm vào giỏ hàng */
                if (!count($this->productAddeds[$key]['errors'])) 
                {
                    /** Thêm giỏ hàng nếu không tìm thấy giỏ hàng*/
                    if (!$this->context->cart->id) {
                        if (Context::getContext()->cookie->id_guest) {
                            $guest = new Guest(Context::getContext()->cookie->id_guest);
                            $this->context->cart->mobile_theme = $guest->mobile_theme;
                        }
                        $this->context->cart->add();
                        if ($this->context->cart->id) {
                            $this->context->cookie->id_cart = (int)$this->context->cart->id;
                        }
                    }
                    /** Nếu không có lỗi thì cập nhật sản phẩm vào giỏ hàng*/
                    if (!count($this->productAddeds[$key]['errors'])) {
                        $update_quantity = $this->context->cart->updateQty($prod->qty, $prod->id_product, $prod->id_product_attribute, false, 'up', 0);
                        if ($update_quantity < 0) {
                            $minimal_quantity = ($prod->id_product_attribute) ? self::getAttributeMinimalQty($prod->id_product_attribute) : $product->minimal_quantity;
                            $this->productAddeds[$key]['errors'][] = sprintf($this->module->l('You must add %d minimum quantity', 'etscart'), $minimal_quantity);
                        } elseif (!$update_quantity) {
                            $this->productAddeds[$key]['errors'][] = $this->module->l('You already have the maximum quantity available for this product.', 'etscart');
                        } 
                    }                    
                }  
            }
        }else{
            $this->errors[] = $this->module->l('No products were added to the cart.', 'etscart');
        }        
        $removed = CartRule::autoRemoveFromCart();
        CartRule::autoAddToCart();
        if($this->is17){ 
            $this->ets_purchasetogether->displayAjaxUpdate($this->productAddeds);
        }
    }
    /**
     * Display ajax content (this function is called instead of classic display, in ajax mode)
     */
    public function displayAjax()
    {
        if($this->is17)
            return; 
        if ($this->errors) {
            $this->ajaxDie(json_encode(array('hasError' => true,'errors' => $this->errors)));
        }        
        // write cookie if can't on destruct
        $this->context->cookie->write();

        if (Tools::getIsset('summary')) {
            $result = array();
            if (Configuration::get('PS_ORDER_PROCESS_TYPE') == 1) {
                $groups = (Validate::isLoadedObject($this->context->customer)) ? $this->context->customer->getGroups() : array(1);
                if ($this->context->cart->id_address_delivery) {
                    $deliveryAddress = new Address($this->context->cart->id_address_delivery);
                }
                $id_country = (isset($deliveryAddress) && $deliveryAddress->id) ? (int)$deliveryAddress->id_country : (int)Tools::getCountry();
                if (method_exists('Cart', 'addExtraCarriers')) {
                    Cart::addExtraCarriers($result);
                }
                else {
                    self::cartAddExtraCarriers($result);
                }
            }
            $result['summary'] = $this->context->cart->getSummaryDetails(null, true);
            $result['customizedDatas'] = Product::getAllCustomizedDatas($this->context->cart->id, null, true);
            $result['HOOK_SHOPPING_CART'] = Hook::exec('displayShoppingCartFooter', $result['summary']);
            $result['HOOK_SHOPPING_CART_EXTRA'] = Hook::exec('displayShoppingCart', $result['summary']);

            foreach ($result['summary']['products'] as $key => &$product) {
                $product['quantity_without_customization'] = $product['quantity'];
                if ($result['customizedDatas'] && isset($result['customizedDatas'][(int)$product['id_product']][(int)$product['id_product_attribute']])) {
                    foreach ($result['customizedDatas'][(int)$product['id_product']][(int)$product['id_product_attribute']] as $addresses) {
                        foreach ($addresses as $customization) {
                            $product['quantity_without_customization'] -= (int)$customization['quantity'];
                        }
                    }
                }
            }
            if ($result['customizedDatas']) {
                Product::addCustomizationPrice($result['summary']['products'], $result['customizedDatas']);
            }

            $json = '';
            Hook::exec('actionCartListOverride', array('summary' => $result, 'json' => &$json));
            $this->ajaxDie(json_encode(array_merge($result, json_decode($json, true))));
        }
        // @todo create a hook
        elseif (file_exists(_PS_MODULE_DIR_.'/ets_purchasetogether/ets_purchasetogether-ajax.php')) {
            require_once(_PS_MODULE_DIR_.'/ets_purchasetogether/ets_purchasetogether-ajax.php');
        }
    }
    
    /**
     * Get quantity for a given attribute combination
     * Check if quantity is enough to serve the customer
     *
     * @param int  $idProductAttribute Product attribute combination id
     * @param int  $qty                Quantity needed
     * @param Shop $shop               Shop
     *
     * @return bool Quantity is available or not
     */
    public static function checkAttributeQty($idProductAttribute, $qty, Shop $shop = null)
    {
        if (!$shop) {
            $shop = Context::getContext()->shop;
        }

        $result = StockAvailable::getQuantityAvailableByProduct(null, (int) $idProductAttribute, $shop->id);

        return ($result && $qty <= $result);
    }

    /**
     * Get minimal quantity for product with attributes quantity
     *
     * @param int $idProductAttribute Product Attribute ID
     *
     * @return mixed Minimal quantity or false if no result
     */
    public static function getAttributeMinimalQty($idProductAttribute)
    {
        $minimalQuantity = Db::getInstance()->getValue('
			SELECT `minimal_quantity`
			FROM `'._DB_PREFIX_.'product_attribute_shop` pas
			WHERE `id_shop` = '.(int) Context::getContext()->shop->id.'
			AND `id_product_attribute` = '.(int) $idProductAttribute
        );

        if ($minimalQuantity > 1) {
            return (int) $minimalQuantity;
        }

        return false;
    }

    /**
     * Execute hook displayCarrierList (extraCarrier) and merge them into the $array
     *
     * @param array $array
     */
    public static function cartAddExtraCarriers(&$array)
    {
        $first = true;
        $hook_extracarrier_addr = array();
        foreach (Context::getContext()->cart->getAddressCollection() as $address) {
            $hook = Hook::exec('displayCarrierList', array('address' => $address));
            $hook_extracarrier_addr[$address->id] = $hook;

            if ($first) {
                $array = array_merge(
                    $array,
                    array('HOOK_EXTRACARRIER' => $hook)
                );
                $first = false;
            }
            $array = array_merge(
                $array,
                array('HOOK_EXTRACARRIER_ADDR' => $hook_extracarrier_addr)
            );
        }
    }

    public static function getIdProductAttributesByIdAttributes($id_product, $id_attributes, $find_best = false)
    {
        if (!is_array($id_attributes)) {
            return 0;
        }

        $id_product_attribute =  Db::getInstance()->getValue('
        SELECT pac.`id_product_attribute`
        FROM `'._DB_PREFIX_.'product_attribute_combination` pac
        INNER JOIN `'._DB_PREFIX_.'product_attribute` pa ON pa.id_product_attribute = pac.id_product_attribute
        WHERE id_product = '.(int)$id_product.' AND id_attribute IN ('.implode(',', array_map('intval', $id_attributes)).')
        GROUP BY id_product_attribute
        HAVING COUNT(id_product) = '.count($id_attributes));

        if ($id_product_attribute === false && $find_best) {
            //find the best possible combination
            //first we order $id_attributes by the group position
            $orderred = array();
            $result = Db::getInstance()->executeS('SELECT `id_attribute` FROM `'._DB_PREFIX_.'attribute` a
            INNER JOIN `'._DB_PREFIX_.'attribute_group` g ON a.`id_attribute_group` = g.`id_attribute_group`
            WHERE `id_attribute` IN ('.implode(',', array_map('intval', $id_attributes)).') ORDER BY g.`position` ASC');

            foreach ($result as $row) {
                $orderred[] = $row['id_attribute'];
            }

            while ($id_product_attribute === false && count($orderred) > 0) {
                array_pop($orderred);
                $id_product_attribute =  Db::getInstance()->getValue('
                SELECT pac.`id_product_attribute`
                FROM `'._DB_PREFIX_.'product_attribute_combination` pac
                INNER JOIN `'._DB_PREFIX_.'product_attribute` pa ON pa.id_product_attribute = pac.id_product_attribute
                WHERE id_product = '.(int)$id_product.' AND id_attribute IN ('.implode(',', array_map('intval', $orderred)).')
                GROUP BY id_product_attribute
                HAVING COUNT(id_product) = '.count($orderred));
            }
        }
        return $id_product_attribute;
    }
}