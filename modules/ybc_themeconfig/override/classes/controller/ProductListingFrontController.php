<?php
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\Pagination;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchResult;
use PrestaShop\PrestaShop\Core\Product\Search\Facet;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchProviderInterface;
use PrestaShop\PrestaShop\Core\Product\Search\FacetsRendererInterface;
abstract class ProductListingFrontController extends ProductListingFrontControllerCore
{
        protected function getAjaxProductSearchVariables()
        {
            $search = $this->getProductSearchVariables();
            $this->context->smarty->assign(
                array(
                    'static_token' => Tools::getToken(false),
                    'urls'=>$this->getTemplateVarUrls()
                )
            );
            $rendered_products_top = $this->render('catalog/_partials/products-top', array('listing' => $search));
            $rendered_products = $this->render('catalog/_partials/products', array('listing' => $search));
            $rendered_products_bottom = $this->render('catalog/_partials/products-bottom', array('listing' => $search));
    
            $data = array(
                'rendered_products_top' => $rendered_products_top,
                'rendered_products' => $rendered_products,
                'rendered_products_bottom' => $rendered_products_bottom,
            );
    
            foreach ($search as $key => $value) {
                $data[$key] = $value;
            }
    
            return $data;
        }
}