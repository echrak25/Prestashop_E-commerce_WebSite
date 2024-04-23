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
         
class Ybc_productimagehover extends Module
{    
    public function __construct()
	{
		$this->name = 'ybc_productimagehover';
		$this->tab = 'front_office_features';
		$this->version = '1.0.1';
		$this->author = 'ETS-Soft';
		$this->need_instance = 0;
		$this->secure_key = Tools::encrypt($this->name);
        $this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l('Product image rollover');
		$this->description = $this->l('Display second image when hover over product image');
        
        if(version_compare(_PS_VERSION_, '1.5.6.1', '>='))
            $this->ps_versions_compliancy = array('min' => '1.5.6.1', 'max' => _PS_VERSION_);
    }
     /**
	 * @see Module::install()
	 */
    public function install()
	{
        Configuration::updateValue('YBC_PI_TRANSITION_EFFECT','fade');
        Configuration::updateValue('YBC_PI_THOSE_PAGES','allpage'); 
        return  parent::install() 
            && $this->registerHook('productImageHover') 
            && $this->registerHook('displayHeader');
    }
    /**
	 * @see Module::uninstall()
	 */
     
	public function uninstall()
	{
	    Configuration::deleteByName('YBC_PI_TRANSITION_EFFECT');
        Configuration::deleteByName('YBC_PI_THOSE_PAGES');
        return parent::uninstall();
    }
    
    public function hookDisplayHeader()
    {
        $page_setting = explode(',', Configuration::get('YBC_PI_THOSE_PAGES'));
        if(!in_array('allpage', $page_setting) && (($page = Tools::strtolower(trim(Tools::getValue('controller')))) && $page && !in_array($page, $page_setting)))
            return;   
        if(version_compare(_PS_VERSION_, '1.7.0', '>='))
            $this->context->controller->addCSS($this->_path.'views/css/fix17.css', 'all');
        elseif(version_compare(_PS_VERSION_, '1.6.0', '>='))
            $this->context->controller->addCSS($this->_path.'views/css/productimagehover.css', 'all');
        else  
            $this->context->controller->addCSS($this->_path.'views/css/fix15.css', 'all'); 
        
        $this->context->controller->addJS($this->_path.'views/js/productimagehover.js');
        $this->context->smarty->assign(array(
            'baseAjax'=>$this->context->link->getModuleLink('ybc_productimagehover', 'ajax', array(), true),
            'YBC_PI_TRANSITION_EFFECT' => Configuration::get('YBC_PI_TRANSITION_EFFECT'),
            '_PI_VER_17_'=> version_compare(_PS_VERSION_, '1.7.0', '>=') ? 1 : 0,
            '_PI_VER_16_'=> version_compare(_PS_VERSION_, '1.6.0', '>=') ? 1 : 0,
        ));
        return $this->display(__FILE__,'renderJs.tpl');      
    }
    
    public function getContent()
    {
        if(Tools::isSubmit('submitUpdate')){
            Configuration::updateValue('YBC_PI_TRANSITION_EFFECT', Tools::strtolower(trim(Tools::getValue('YBC_PI_TRANSITION_EFFECT'))));
            Tools::getValue('YBC_PI_THOSE_PAGES') && is_array(Tools::getValue('YBC_PI_THOSE_PAGES'))? Configuration::updateValue('YBC_PI_THOSE_PAGES', Tools::strtolower(trim(implode(',',Tools::getValue('YBC_PI_THOSE_PAGES'))))):Configuration::updateValue('YBC_PI_THOSE_PAGES','');
        }
        if(version_compare(_PS_VERSION_, '1.6.0', '>='))
            $postUrl = $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        else
            $postUrl = AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules');
        
        $those_pages = array(
            array(
                'id' => 'allpage',
                'name' => $this->l('All pages')
            ),
            array(
                'id' => 'index',
                'name' => $this->l('Home page')
            ),
            array(
                'id' => 'category',
                'name' => $this->l('Category page')
            ),
            array(
                'id' => 'search',
                'name' => $this->l('Search resuilt page')
            ),
            array(
                'id' => 'pricesdrop',
                'name' => $this->l('Special products page')
            ),
            array(
                'id' => 'newproducts',
                'name' => $this->l('New products page')
            ),
            array(
                'id' => 'bestsales',
                'name' => $this->l('Best sales products page')
            ),
            array(
                'id' => 'manufacturer',
                'name' => $this->l('Manufacturer page')
            ),
            array(
                'id' => 'supplier',
                'name' => $this->l('Supplier page')
            ),
        );
        if(version_compare(_PS_VERSION_, '1.6.0', '>=')){
            $those_pages[] = array(
                'id' => 'product',
                'name' => $this->l('Product detail page')
            );
        }
        $this->smarty->assign(            
            array(
                'postUrl' => $postUrl,
                'effects' => array(
                    array(
                        'id' => 'zoom',
                        'name' => $this->l('Zoom')
                    ),
                    array(
                        'id' => 'fade',
                        'name' => $this->l('Fade')
                    ),
                    array(
                        'id' => 'vertical_scrolling_bottom_to_top',
                        'name' => $this->l('Vertical Scrolling  Bottom To Top')
                    ),
                    array(
                        'id' => 'vertical_scrolling_top_to_bottom',
                        'name' => $this->l('Vertical Scrolling Top To Bottom')
                    ),                    
                    array(
                        'id' => 'horizontal_scrolling_left_to_right',
                        'name' => $this->l('Horizontal Scrolling Left To Right')
                    ),
                    array(
                        'id' => 'horizontal_scrolling_right_to_left',
                        'name' => $this->l('Horizontal Scrolling Right To Left')
                    )
                ),
                'those_pages' =>$those_pages,
                'YBC_PI_TRANSITION_EFFECT' => Configuration::get('YBC_PI_TRANSITION_EFFECT'),
                'YBC_PI_THOSE_PAGES' => Configuration::get('YBC_PI_THOSE_PAGES')? explode(',',Configuration::get('YBC_PI_THOSE_PAGES')): array(),
                'setting_updated' => Tools::isSubmit('submitUpdate') ? true : false,
            )
        );
        $template = ((version_compare(_PS_VERSION_, '1.6.0', '>=') ? 1 : 0)?'admin-config.tpl':'admin-config-v15.tpl');
        return $this->display(__FILE__, $template).$this->displayIframe();
    }
    public function displayIframe()
    {
        switch($this->context->language->iso_code) {
          case 'en':
            $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
            break;
          case 'it':
            $url = 'https://cdn.prestahero.com/it/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
            break;
          case 'fr':
            $url = 'https://cdn.prestahero.com/fr/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
            break;
          case 'es':
            $url = 'https://cdn.prestahero.com/es/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
            break;
          default:
            $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
        }
        $this->smarty->assign(
            array(
                'url_iframe' => $url
            )
        );
        return $this->display(__FILE__,'iframe.tpl');
    }
    public function hookProductImageHover($params)
    {
        $page_setting = explode(',', Configuration::get('YBC_PI_THOSE_PAGES'));
        if(!in_array('allpage', $page_setting) && (($page = Tools::strtolower(trim(Tools::getValue('controller')))) && $page && !in_array($page, $page_setting)))
            return;
            
        if(isset($params['id_product']))
        {
            $product_id=$params['id_product'];
            $sql= "SELECT id_image 
                   FROM  `"._DB_PREFIX_."image` 
                   WHERE  `id_product` =  $product_id AND (cover = 0 OR cover is null) ORDER BY  `position` ASC";
                   
            $image = Db::getInstance()->getRow($sql);
            
            if(!$image)
            {
                $sql= "SELECT id_image 
                       FROM  `"._DB_PREFIX_."image` 
                       WHERE  `id_product` =  $product_id AND cover =  1 ORDER BY  `position` ASC";
                $image = Db::getInstance()->getRow($sql);               
            }
            if($image){
                $product = new Product($product_id,false,$this->context->language->id,$this->context->shop->id);
                
                $this->smarty->assign(array(
                    'product_name' => $product->name,
                    'img_url' => $this->context->link->getImageLink($product->link_rewrite, (int)$image['id_image'], ImageType::getFormattedName('home'))
                ));               
            }
            else
                return;        
        }
        $this->smarty->assign(array('YBC_PI_TRANSITION_EFFECT' => Configuration::get('YBC_PI_TRANSITION_EFFECT')));
        return $this->display(__FILE__, 'image.tpl');
    }
}