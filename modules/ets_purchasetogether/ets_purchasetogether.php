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
*  @copyright 2007-2016 PrestaShop SA
*  @version  Release: $Revision$
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

require_once dirname(__FILE__).'/classes/ptProduct.php';

class Ets_purchasetogether extends Module 
{
    private $errorMessage;
    public $configs;
    public $baseAdminPath;
    private $_html;
    public $templates;
    public $is17;
    public $is16;
    public $errors;
    public function __construct()
	{
		$this->name = 'ets_purchasetogether';
		$this->tab = 'front_office_features';
		$this->version = '1.0.1';
		$this->author = 'ETS-Soft';
		$this->need_instance = 0;
		$this->secure_key = Tools::encrypt($this->name);        
		$this->bootstrap = true;
        $this->module_key = '';
		parent::__construct();
        $this->displayName = $this->l('Frequently purchased together PRO');
		$this->description = $this->l('Recommend customer to add products which are frequently purchased together to shopping cart');
		$this->ps_versions_compliancy = array('min' => '1.5.0.0', 'max' => _PS_VERSION_);
        if(isset($this->context->controller->controller_type) && $this->context->controller->controller_type =='admin')
            $this->baseAdminPath = $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $this->is17 = version_compare(_PS_VERSION_, '1.7.0', '>=');
        $this->is16 = version_compare(_PS_VERSION_, '1.6.0', '>=') && version_compare(_PS_VERSION_, '1.7.0', '<=');
        $this->errors=array();
        //Config fields        
        $this->configs = array(
            'ETS_PT_TITLE' => array(
                'label' => $this->l('Title'),
                'type' => 'text',    
                'default' => $this->l('Frequently purchased together'), 
                'validate' => 'isUnsignedInt',  
                'required' => true,    
                'lang' => true,                        
            ),
            'ETS_PT_PRODUCT_OPTION'=>array(
                'label' => $this->l('Display options:'),
                'type' => 'checkboxoptions',
                'options' => array(
                    'query' => array(
                        array(
                            'id'=>'ETS_PT_EXCLUDE_PRODUCT_IN_CART',
                            'label'=>$this->l('Exclude product in cart'),
                            'default' => 0
                        ),
                        array(
                            'id'=>'ETS_PT_EXCLUDE_CURRENT_PRODUCT',
                            'label'=>$this->l('Exclude current product'),
                            'default' => 0
                        ),
                        array(
                            'id'=>'ETS_PT_EXCLUDE_OUT_OF_STOCK',
                            'label'=>$this->l('Exclude out of stock product'),
                            'default' => 0
                        ),
                    ),                                                              
                ), 
            ),
            'ETS_PT_DISPLAY_TYPE' => array(
                'label' => $this->l('Display type:'),
                'type' => 'optionslist',
                'default' => 2,
                'multiple' => true,
                'options' => array(
                    'query' => array(
                        array(
                            'label' => $this->l('Separated product image carousel slider'),
                            'value' => 1,
                            'image' => $this->_path.'views/img/image1.png',
                            'width' => 100
                        ),
                        array(
                            'label' => $this->l('Product list with thumbnail images'),
                            'value' => 2,
                            'image' => $this->_path.'views/img/image2.png',
                            'width' => 100
                        ),
                    )
                ),
            ),
            'ETS_PT_REQUIRE_CURRENT_PRODUCT' => array(
                'label' => $this->l('Require purchasing current product'),
                'type' =>'switch',
                'default' => 1,
            ),
            'ETS_PT_REDIRECT_TO_SHOPPING_CART_PAGE' => array(
                'label' => $this->l('Redirect to shopping cart page'),
                'type' =>'switch',
                'default' => 0,
            ),
            'ETS_PT_DISPLAY_PRODUCT_PRICE' => array(
                'label' => $this->l('Display product price'),
                'type' =>'switch',
                'default' => 1,
            ),
            'ETS_PT_DISPLAY_OLD_PRICE' => array(
                'label' => $this->l('Dispplay old price'),
                'type' =>'switch',
                'default' => 1,
            ),
            'ETS_PT_DISPLAY_DISCOUNT' => array(
                'label' => $this->l('Display discount'),
                'type' =>'switch',
                'default' => 1,
            ),
            'ETS_PT_DISPLAY_PRODUCT_DESCRIPTION' => array(
                'label' => $this->l('Display product description'),
                'type' =>'switch',
                'default' => 1,
            ),
            'ETS_PT_DISPLAY_RATING' => array(
                'label' => $this->l('Display rating (if productcomments is enabled)'),
                'type' =>'switch',
                'default' => 1,
            ),
            'ETS_PT_MAX_DESCRIPTION_LENGHT' => array(
                'label' => $this->l('Maximum description length'),
                'type' => 'text',    
                'default' => 100,  
                'required' => true, 
                'suffix' => 'lenght(s)',
                'validate' => 'isUnsignedInt',                    
            ),
            'ETS_PT_DEFAULT_QUANTITY_ADDED_TO_CART' => array(
                'label' => $this->l('Default quantity added to cart'),
                'type' => 'text',    
                'default' => 1,   
                'required' => true, 
                'suffix' => 'product(s)',
                'validate' => 'isUnsignedInt',                    
            ),
            'ETS_PT_HOOK_TO' => array(
                'type' => 'select',                             
                'label' => $this->l('Hook to'),         
                'desc' => $this->l('Select a position to display the module on the frontend'),                     
                'required' => true,
                'default' => $this->is17?'displayProductAdditionalInfo':'displayLeftColumnProduct',                       
                'options' => array(
                    'query' => array(
                        array(
                            'id_option' => $this->is17?'displayProductAdditionalInfo':'displayLeftColumnProduct',
                            'name' => $this->is17?'displayProductAdditionalInfo':'displayLeftColumnProduct',
                        ),
                        array(
                            'id_option' => 'displayFooterProduct',
                            'name' => 'displayFooterProduct',
                        ),
                    ),                           
                    'id' => 'id_option',                         
                    'name' => 'name'
                ),
            ),                         
        );      
    }
    //suffix
    /**
     * Creates tables
     */
    protected function createTables()
    {
        $res = Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_purchase_together` (
              `id_product` int(10) unsigned NOT NULL,
              `id_product_related` int(10) unsigned NOT NULL,
              `id_product_attribute_related` int(10) unsigned NOT NULL,
              `id_shop` int(10) unsigned NOT NULL,
              PRIMARY KEY (`id_product`,`id_product_related`,id_product_attribute_related,id_shop)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
        ');
        return $res;
    }
    
    /**
	 * @see Module::install()
	 */
    public function install()
	{
	    return parent::install()        
        && $this->registerHook('displayHeader') 
        && $this->registerHook('displayBackOfficeHeader')
        && $this->registerHook('displayAdminProductsExtra') 
        && $this->registerHook('displayProductAdditionalInfo') 
        && $this->registerHook('displayLeftColumnProduct')
        && $this->registerHook('top') 
        && $this->registerHook('displayFooterProduct') 
        && $this->_installDb() 
        && $this->createTables();        
    }
        
    /**
     * deletes tables
     */
    protected function deleteTables()
    {
        return Db::getInstance()->execute('
            DROP TABLE IF EXISTS `'._DB_PREFIX_.'ets_purchase_together`;
        ');
    }
            
    /**
	 * @see Module::uninstall()
	 */
	public function uninstall()
	{
        return parent::uninstall() && $this->_uninstallDb() && $this->deleteTables();
    }
        
    public function _installDb()
    {
        $languages = Language::getLanguages(false);
        if($this->configs)
        {
            foreach($this->configs as $key => $config)
            {
                if(isset($config['lang']) && $config['lang'])
                {
                    $values = array();
                    foreach($languages as $lang)
                    {
                        $values[$lang['id_lang']] = isset($config['default']) ? $config['default'] : '';
                    }
                    Configuration::updateValue($key, $values, true);
                }
                elseif($config['type'] == 'checkboxoptions' && isset($config['options']['query']) && $config['options']['query']){
                    foreach($config['options']['query'] as $row)
                        Configuration::updateValue($row['id'], $row['default']);
                }else
                    Configuration::updateValue($key, isset($config['default']) ? $config['default'] : '',true);
            }
        }        
        return true;
    } 
       
    private function _uninstallDb()
    {
        if($this->configs)
        {
            foreach($this->configs as $key => $config)
            {
                if($config['type'] == 'checkboxoptions' && isset($config['options']['query']) && $config['options']['query']){
                    foreach($config['options']['query'] as $row)
                        Configuration::deleteByName($row['id']);
                }else
                    Configuration::deleteByName($key);
            }
            unset($config);
        }       
        return true;
    }
        
    public function getContent()
	{	   
        $this->_postConfig();
        
        /** check is ver ps17 enable _debug*/
        /* if(_PS_MODE_DEV_ && $this->is17){
            $renderError = $this->l('Please disable debug mode link here').' <a href="'.$this->context->link->getAdminLink('AdminPerformance',true).'" target="_blank"> '.$this->l('Debug mode').' </a>';
            $this->errorMessage = $this->displayError($renderError);
        } */
        /** Display errors if have */
        if($this->errorMessage)
            $this->_html .= $this->errorMessage;     
        
        /** Render views*/
        $this->renderConfig(); 

       return $this->_html.$this->displayIframe();
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
    public function renderConfig()
    {
        $configs = $this->configs;
        $fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Configuration'),
					'icon' => 'icon-AdminAdmin'
				),
				'input' => array(),
                'submit' => array(
					'title' => $this->l('Save'),
				)
            ),
		);
        if($configs)
        {
            foreach($configs as $key => $config)
            {
                $confFields = array(
                    'name' => isset($config['multiple']) && $config['multiple'] ? $key.'[]' : $key,
                    'type' => $config['type'],
                    'label' => $config['label'],
                    'desc' => isset($config['desc']) ? $config['desc'] : false,
                    'required' => isset($config['required']) && $config['required'] ? true : false,
                    'autoload_rte' => isset($config['autoload_rte']) && $config['autoload_rte'] ? true : false,
                    'options' => isset($config['options']) && $config['options'] ? $config['options'] : array(),
                    'suffix' => isset($config['suffix']) && $config['suffix'] ? $config['suffix']  : false,
                    'values' => array(
							array(
								'id' => 'active_on',
								'value' => 1,
								'label' => $this->l('Yes')
							),
							array(
								'id' => 'active_off',
								'value' => 0,
								'label' => $this->l('No')
							)
						),
                    'lang' => isset($config['lang']) ? $config['lang'] : false,
                    'multiple' => isset($config['multiple']) && $config['multiple'],
                );
                if(!$confFields['suffix'])
                    unset($confFields['suffix']);
                if($config['type'] == 'file')
                {
                    if($imageName = Configuration::get($key))
                    {
                        $confFields['display_img'] = $this->_path.'images/config/'.$imageName;
                        if(!isset($config['required']) || (isset($config['required']) && !$config['required']))
                            $confFields['img_del_link'] = $this->baseAdminPath.'&delimage=yes&image='.$key; 
                    }
                }
                $fields_form['form']['input'][] = $confFields;
            }
        }        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->module = $this;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'saveConfig';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=config';
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));        
        $fields = array();        
        $languages = Language::getLanguages(false);
        $helper->override_folder = '/';
        
        /** Save config */
        if(Tools::isSubmit('saveConfig'))
        {            
            if($configs)
            {                
                foreach($configs as $key => $config)
                {
                    if(isset($config['lang']) && $config['lang'])
                    {                        
                        foreach($languages as $l)
                        {
                            $fields[$key][$l['id_lang']] = Tools::getValue($key.'_'.$l['id_lang'],isset($config['default']) ? $config['default'] : '');
                        }
                    }
                    elseif($config['type']=='select' && isset($config['multipe']) && $config['multipe'])
                    {
                        $fields[$key] = Tools::getValue($key, array());   
                    }
                    elseif($config['type']=='optionslist' && isset($config['multipe']) && $config['multipe'])
                    {
                        $fields[$key] = Tools::getValue($key, array());
                    }
                    elseif($config['type']=='checkboxoptions' && isset($config['options']['query']) && $config['options']['query'])
                    {
                        foreach($config['options']['query'] as $item)
                            $fields[$item['id']] = Tools::getValue($item['id'], isset($config['default']) ? $config['default'] : 0);
                    }                        
                    else
                        $fields[$key] = Tools::getValue($key, isset($config['default']) ? $config['default'] : '');
                }
            }
        }
        else
        {
            if($configs)
            {
                    foreach($configs as $key => $config)
                    {
                        if(isset($config['lang']) && $config['lang'])
                        {                    
                            foreach($languages as $l)
                            {
                                $fields[$key][$l['id_lang']] = Configuration::get($key,$l['id_lang']);
                            }
                        }
                        elseif($config['type']=='select' && isset($config['multipe']) && $config['multipe'])
                        {
                            $fields[$key] = Configuration::get($key) ? explode(',',Configuration::get($key)) : array();   
                        }
                        elseif($config['type']=='optionslist')
                        {
                            $fields[$key.'[]'] = Configuration::get($key) ? explode(',',Configuration::get($key)) : array();
                        }
                        elseif($config['type']=='checkboxoptions' && isset($config['options']['query']) && $config['options']['query'])
                        {
                            foreach($config['options']['query'] as $item)
                                $fields[$item['id']] = Configuration::get($item['id'])?1:0;
                        }
                        else
                            $fields[$key] = Configuration::get($key);                   
                    }
            }
        }
        $helper->tpl_vars = array(
			'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
			'fields_value' => $fields,
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,                     
        );  
        $this->_html .= $helper->generateForm(array($fields_form));		
     }
     
     private function _postConfig()
     {
        
        $languages = Language::getLanguages(false);
        $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
        $configs = $this->configs;
        
        //Delete image
        if(Tools::isSubmit('delimage'))
        {
            $image = Tools::getValue('image');
            if(isset($configs[$image]) && !isset($configs[$image]['required']) || (isset($configs[$image]['required']) && !$configs[$image]['required']))
            {
                $imageName = Configuration::get($image);
                $imagePath = dirname(__FILE__).'/images/config/'.$imageName;
                if($imageName && file_exists($imagePath))
                {
                    @unlink($imagePath);
                    Configuration::updateValue($image,'');
                }
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
            }
            else
              $this->errors[] = $configs[$image]['label'].$this->l(' is required');
        }
        if(Tools::isSubmit('saveConfig'))
        {            
            if($configs)
            {
                foreach($configs as $key => $config)
                {
                    if(isset($config['lang']) && $config['lang'])
                    {
                        if(isset($config['required']) && $config['required'] && $config['type']!='switch' && trim(Tools::getValue($key.'_'.$id_lang_default) == ''))
                        {
                            $this->errors[] = $config['label'].' '.$this->l('is required');
                        }                        
                    }
                    else
                    {
                        if(isset($config['required']) && $config['required'] && isset($config['type']) && $config['type']=='file')
                        {
                            if(Configuration::get($key)=='' && !isset($_FILES[$key]['size']))
                                $this->errors[] = $config['label'].' '.$this->l('is required');
                            elseif(isset($_FILES[$key]['size']))
                            {
                                $fileSize = round((int)$_FILES[$key]['size'] / (1024 * 1024));
                    			if($fileSize > 100)
                                    $this->errors[] = $config['label'].$this->l(' can not be larger than 100Mb');
                            }   
                        }                        
                        else
                        {
                            if(isset($config['required']) && $config['required'] && $config['type'] != 'switch' && trim(Tools::getValue($key) == ''))
                            {
                                $this->errors[] = $config['label'].' '.$this->l('is required');
                            }
                            elseif(!Validate::isCleanHtml(trim(Tools::getValue($key))))
                            {
                                $this->errors[] = $config['label'].' '.$this->l('is invalid');
                            } 
                        }                          
                    }                    
                }
            }            
            
            //Custom validation
            if(!$this->errors)
            {
                if($configs)
                {
                    foreach($configs as $key => $config)
                    {
                        if(isset($config['lang']) && $config['lang'])
                        {
                            $valules = array();
                            foreach($languages as $lang)
                            {
                                if($config['type']=='switch')                                                           
                                    $valules[$lang['id_lang']] = (int)trim(Tools::getValue($key.'_'.$lang['id_lang'])) ? 1 : 0;                                
                                else
                                    $valules[$lang['id_lang']] = trim(Tools::getValue($key.'_'.$lang['id_lang'])) ? trim(Tools::getValue($key.'_'.$lang['id_lang'])) : trim(Tools::getValue($key.'_'.$id_lang_default));
                            }
                            Configuration::updateValue($key,$valules,true);
                        }
                        else
                        {
                            
                            if($config['type'] == 'switch')
                            {
                                Configuration::updateValue($key,(int)trim(Tools::getValue($key)) ? 1 : 0,true);
                            }
                            elseif($config['type']=='file')
                            {
                                //Upload file
                                if(isset($_FILES[$key]['tmp_name']) && isset($_FILES[$key]['name']) && $_FILES[$key]['name'])
                                {
                                    $salt = sha1(microtime());
                                    $type = Tools::strtolower(Tools::substr(strrchr($_FILES[$key]['name'], '.'), 1));
                                    $imageName = $salt.'.'.$type;
                                    $fileName = dirname(__FILE__).'/images/config/'.$imageName;                
                                    if(file_exists($fileName))
                                    {
                                        $this->errors[] = $config['label'].$this->l(' already exists. Try to rename the file then reupload');
                                    }
                                    else
                                    {
                                        
                            			$imagesize = @getimagesize($_FILES[$key]['tmp_name']);
                                        
                                        if (!$this->errors && isset($_FILES[$key]) &&				
                            				!empty($_FILES[$key]['tmp_name']) &&
                            				!empty($imagesize) &&
                            				in_array($type, array('jpg', 'gif', 'jpeg', 'png'))
                            			)
                            			{
                            				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');    				
                            				if ($error = ImageManager::validateUpload($_FILES[$key]))
                            					$this->errors[] = $error;
                            				elseif (!$temp_name || !move_uploaded_file($_FILES[$key]['tmp_name'], $temp_name))
                            					$this->errors[] = $this->l('Can not upload the file');
                            				elseif (!ImageManager::resize($temp_name, $fileName, null, null, $type))
                            					$this->errors[] = $this->displayError($this->l('An error occurred during the image upload process.'));
                            				if (isset($temp_name))
                            					@unlink($temp_name);
                                            if(!$this->errors)
                                            {
                                                if(Configuration::get($key)!='')
                                                {
                                                    $oldImage = dirname(__FILE__).'/images/config/'.Configuration::get($key);
                                                    if(file_exists($oldImage))
                                                        @unlink($oldImage);
                                                }                                                
                                                Configuration::updateValue($key, $imageName,true);                                                                                               
                                            }
                                        }
                                    }
                                }
                                //End upload file
                            }
                            elseif($config['type']=='select' && isset($config['multipe']) && $config['multipe'])
                            {
                                Configuration::updateValue($key,implode(',',trim(Tools::getValue($key))));  
                            }
                            elseif($config['type']=='optionslist')
                            {
                                Configuration::updateValue($key, implode(',',Tools::getValue($key)));
                            }
                            elseif($config['type']=='checkboxoptions' && isset($config['options']['query']) && $config['options']['query'])
                            {
                                foreach($config['options']['query'] as $item)
                                    Configuration::updateValue($item['id'], Tools::getValue($item['id'])?1:0);
                            }
                            else
                                Configuration::updateValue($key, trim(Tools::getValue($key)),true);   
                        }                        
                    }
                }                
            }
            if (count($this->errors))
            {
               $this->errorMessage = $this->displayError(implode('<br />', $this->errors));  
            }
            else
               Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);            
        }
     }
     
     public function getConfigs()
     {
        $configs = array();
        foreach($this->configs as $key => $val){
            if($val['type'] == 'checkboxoptions' && isset($val['options']['query']) && $val['options']['query']){
                foreach($val['options']['query'] as $row)
                    $configs[$row['id']] = Configuration::get($row['id'])?Configuration::get($row['id']):0;
            }else{
                $configs[$key] = isset($val['lang']) && $val['lang'] ? Configuration::get($key,$this->context->language->id) : Configuration::get($key);
            }
        }
        return $configs;
     }
     
     public function strToIds($str)
     {
        $ids = array();
        if($temp = explode(',',$str)){
            foreach($temp as $id)
                if(!in_array((int)$id, $ids))
                    $ids[] = (int)$id;
        }
        return $ids;
     }
     
     
	public function assignContentVars($params)
	{
        if($this->is17)
            return;
            
		//global $errors;

		// Set currency
		if ((int)$params['cart']->id_currency && (int)$params['cart']->id_currency != $this->context->currency->id)
			$currency = new Currency((int)$params['cart']->id_currency);
		else
			$currency = $this->context->currency;

		$taxCalculationMethod = Group::getPriceDisplayMethod((int)Group::getCurrent()->id);

		$useTax = !($taxCalculationMethod == PS_TAX_EXC);

		$products = $params['cart']->getProducts(true);
		$nbTotalProducts = 0;
		foreach ($products as $product)
			$nbTotalProducts += (int)$product['cart_quantity'];
		$cart_rules = $params['cart']->getCartRules();

		if (empty($cart_rules))
			$base_shipping = $params['cart']->getOrderTotal($useTax, Cart::ONLY_SHIPPING);
		else
		{
			$base_shipping_with_tax    = $params['cart']->getOrderTotal(true, Cart::ONLY_SHIPPING);
			$base_shipping_without_tax = $params['cart']->getOrderTotal(false, Cart::ONLY_SHIPPING);
			if ($useTax)
				$base_shipping = $base_shipping_with_tax;
			else
				$base_shipping = $base_shipping_without_tax;
		}
		$shipping_cost = Tools::displayPrice($base_shipping, $currency);
		$shipping_cost_float = Tools::convertPrice($base_shipping, $currency);
		$wrappingCost = (float)($params['cart']->getOrderTotal($useTax, Cart::ONLY_WRAPPING));
		$totalToPay = $params['cart']->getOrderTotal($useTax);

		if ($useTax && Configuration::get('PS_TAX_DISPLAY') == 1)
		{
			$totalToPayWithoutTaxes = $params['cart']->getOrderTotal(false);
			$this->smarty->assign('tax_cost', Tools::displayPrice($totalToPay - $totalToPayWithoutTaxes, $currency));
		}

		// The cart content is altered for display
		foreach ($cart_rules as &$cart_rule)
		{
			if ($cart_rule['free_shipping'])
			{
				$shipping_cost = Tools::displayPrice(0, $currency);
				$shipping_cost_float = 0;
				$cart_rule['value_real'] -= Tools::convertPrice($base_shipping_with_tax, $currency);
				$cart_rule['value_tax_exc'] = Tools::convertPrice($base_shipping_without_tax, $currency);
			}
			if ($cart_rule['gift_product'])
			{
				foreach ($products as $key => &$product)
				{
					if ($product['id_product'] == $cart_rule['gift_product']
						&& $product['id_product_attribute'] == $cart_rule['gift_product_attribute'])
					{
						$product['total_wt'] = Tools::ps_round($product['total_wt'] - $product['price_wt'],
							(int)$currency->decimals * _PS_PRICE_DISPLAY_PRECISION_);
						$product['total'] = Tools::ps_round($product['total'] - $product['price'],
							(int)$currency->decimals * _PS_PRICE_DISPLAY_PRECISION_);
						if ($product['cart_quantity'] > 1)
						{
							array_splice($products, $key, 0, array($product));
							$products[$key]['cart_quantity'] = $product['cart_quantity'] - 1;
							$product['cart_quantity'] = 1;
						}
						$product['is_gift'] = 1;
						$cart_rule['value_real'] = Tools::ps_round($cart_rule['value_real'] - $product['price_wt'],
							(int)$currency->decimals * _PS_PRICE_DISPLAY_PRECISION_);
						$cart_rule['value_tax_exc'] = Tools::ps_round($cart_rule['value_tax_exc'] - $product['price'],
							(int)$currency->decimals * _PS_PRICE_DISPLAY_PRECISION_);
					}
				}
			}
		}

		$total_free_shipping = 0;
		if ($free_shipping = Tools::convertPrice(floatval(Configuration::get('PS_SHIPPING_FREE_PRICE')), $currency))
		{
			$total_free_shipping =  floatval($free_shipping - ($params['cart']->getOrderTotal(true, Cart::ONLY_PRODUCTS) +
				$params['cart']->getOrderTotal(true, Cart::ONLY_DISCOUNTS)));
			$discounts = $params['cart']->getCartRules(CartRule::FILTER_ACTION_SHIPPING);
			if ($total_free_shipping < 0)
				$total_free_shipping = 0;
			if (is_array($discounts) && count($discounts))
				$total_free_shipping = 0;
		}
        
        if(Configuration::get('ETS_PT_REDIRECT_TO_SHOPPING_CART_PAGE'))
            $redirect_cart = $this->context->link->getPageLink((Configuration::get('PS_ORDER_PROCESS_TYPE')?'order-opc':'order'), true);
        
        $assign_product = array();
        if(isset($params['product_addeds']) && $params['product_addeds']){
            foreach($params['product_addeds'] as $key => $row){
                $tmp = ptProduct::getProductAttribute((int)$row['id_product'],(int)$row['id_product_attribute'], $this->context->shop->id);
                if(isset($row['errors']) && $row['errors'])
                    $tmp['errors'] = $row['errors'];
                $assign_product[] = $tmp;
            }
        }
        $this->smarty->assign('purchase_together', $assign_product);
        $renderHtml = $this->display(__FILE__, 'renderHtml.tpl');
        
		$this->smarty->assign(array(
			'products' => $products,
			'customizedDatas' => Product::getAllCustomizedDatas((int)($params['cart']->id)),
			'CUSTOMIZE_FILE' => Product::CUSTOMIZE_FILE,
			'CUSTOMIZE_TEXTFIELD' => Product::CUSTOMIZE_TEXTFIELD,
			'discounts' => $cart_rules,
			'nb_total_products' => (int)($nbTotalProducts),
			'shipping_cost' => $shipping_cost,
			'shipping_cost_float' => $shipping_cost_float,
			'show_wrapping' => $wrappingCost > 0 ? true : false,
			'show_tax' => (int)(Configuration::get('PS_TAX_DISPLAY') == 1 && (int)Configuration::get('PS_TAX')),
			'wrapping_cost' => Tools::displayPrice($wrappingCost, $currency),
			'product_total' => Tools::displayPrice($params['cart']->getOrderTotal($useTax, Cart::BOTH_WITHOUT_SHIPPING), $currency),
			'total' => Tools::displayPrice($totalToPay, $currency),
			'order_process' => Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order',
			'ajax_allowed' => (int)(Configuration::get('PS_BLOCK_CART_AJAX')) == 1 ? true : false,
			'static_token' => Tools::getToken(false),
			'free_shipping' => $total_free_shipping,
            'renderHtml' => ($renderHtml? $renderHtml : null),
            'redirect_cart' => (isset($redirect_cart)? $redirect_cart : null),
		));
        
		if (count($this->errors))
			$this->smarty->assign('errors', $this->errors);
		if (isset($this->context->cookie->ajax_blockcart_display))
			$this->smarty->assign('colapseExpandStatus', $this->context->cookie->ajax_blockcart_display);
	}
    
    public function hookAjaxCall($params)
	{
		if ($this->is17 ||Configuration::get('PS_CATALOG_MODE'))
			return;

		$this->assignContentVars($params);
		$res = json_decode($this->display(__FILE__, 'purchasetogether-json.tpl'), true);
        
		if (is_array($res) && ($id_product = Tools::getValue('id_product')) && Configuration::get('PS_BLOCK_CART_SHOW_CROSSSELLING'))
		{
			$this->smarty->assign('orderProducts', OrderDetail::getCrossSells($id_product, $this->context->language->id,
				Configuration::get('PS_BLOCK_CART_XSELL_LIMIT')));
			$res['crossSelling'] = $this->display(__FILE__, 'crossselling.tpl');
		}
		$res = json_encode($res);
		return $res;
	}
    
    private function getCartSummaryURL()
    {
        return $this->context->link->getPageLink(
            'cart',
            null,
            $this->context->language->id,
            array(
                'action' => 'show'
            ),
            false,
            null,
            true
        );
    }
    
    public function displayAjaxUpdate($product_addeds)
    {      
        if (!$this->is17 || Configuration::isCatalogMode()) {
            return;
        }
        $cart_url = $this->getCartSummaryURL();
        $assign = array(
            'cart' => (new PrestaShop\PrestaShop\Adapter\Cart\CartPresenter)->present($this->context->cart),
            'refresh_url' => $this->context->link->getModuleLink('ps_shoppingcart', 'ajax', array(), null, null, null, true),
            'cart_url' => $cart_url
        );
        $this->context->smarty->assign($assign);
        $renderPreview = $this->fetch('module:ets_purchasetogether/views/templates/hook/_shoppingcart.tpl');
        $modal = $this->renderModal($this->context->cart, $product_addeds);
        die(json_encode(array(
            'preview' => $renderPreview,
            'modal'   => $modal
        )));
    }
    
    public function renderModal(Cart $cart, $product_addeds)
    {
        $data = (new PrestaShop\PrestaShop\Adapter\Cart\CartPresenter)->present($cart);
        $products = ptProduct::getProductAttribute_v17($product_addeds);
        $this->smarty->assign(array(
            'products' => $products,
            'cart' => $data,
            'cart_url' => $this->getCartSummaryURL(),
        ));

        return $this->fetch('module:ets_purchasetogether/views/templates/hook/modal.tpl');
    }
     
    public function hookDisplayHeader()
    {
        if(($page = Tools::strtolower(trim(Tools::getValue('controller')))) && $page != 'product')
            return;
        /** Load Css */
        $this->context->controller->addCSS($this->_path.'views/css/purchasetogether.css','all');
        /** Load Js */
        $this->context->controller->addJS($this->_path.'views/js/purchasetogether.js');
        $this->smarty->assign(array(
            '_VER_17' => $this->is17,
            '_VER_16' => $this->is16,
            'configs' => $this->getConfigs(),
            'redirectURL' => ($this->is17?$this->context->link->getPageLink('cart',true,$this->context->language->id,'action=show'):$this->context->link->getPageLink(Configuration::get('PS_ORDER_PROCESS_TYPE')?'order':'order-opc')),
            'static_token' => Tools::getToken(false),
        ));
        return $this->display(__FILE__,'_renderJs.tpl');
    }
     
    public function hookTop($params)
	{
		if ($this->is17 || ((($page = Tools::strtolower(trim(Tools::getValue('controller')))) && $page != 'product') || Configuration::get('PS_CATALOG_MODE')))
			return;
		$this->assignContentVars($params);
		return $this->display(__FILE__, 'displaycart.tpl');
	}
     
     public function hookDisplayBackOfficeHeader($param)
     {
        if(($page = Tools::strtolower(trim(Tools::getValue('controller')))) && !in_array($page, array('adminproducts','adminmodules')) 
            && !(Tools::getIsset('configure') && Tools::getValue('configure') != 'ets_purchasetogether'))
            return;
        $this->context->controller->addCSS($this->_path.'views/css/admin-css.css');
        if($this->is17)
            $this->context->controller->addJquery();
        $this->context->controller->addJS($this->_path.'views/js/etsadmin.js');
     }
     
     public function hookDisplayAdminProductsExtra($param)
     {
        $id_product = ($this->is17? (int)$param['id_product'] : (int)Tools::getValue('id_product'));
        
        if (($product = new ptProduct($id_product)) && Validate::isLoadedObject($product))
        {
            $purchase_togethers = $product->getAllItems();
            $this->smarty->assign(array(
              'product'=>$product,
              'purchase_togethers' => $purchase_togethers,
              'url_ajax'=>Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/ets_purchasetogether/ajax.php?id_shop='.$this->context->shop->id,
              'is17' =>$this->is17,
            ));
            return $this->display(__FILE__,'product_extra.tpl');
        }
     }
     
     public function _hookModule($param)
     {
        if(($page = Tools::strtolower(trim(Tools::getValue('controller')))) && $page != 'product')
            return;
            
        if (($product = new ptProduct((int)Tools::getValue('id_product'))) && Validate::isLoadedObject($product))
        {
            $configs = $this->getConfigs();
            $purchase_togethers = ($this->is17? $product->getItemProducts_v17() : $product->getItemProducts());
            $productIds = array();
            
            if($configs['ETS_PT_EXCLUDE_PRODUCT_IN_CART'] && is_array($purchase_togethers) && $purchase_togethers)
            {
                $cart = new Cart($this->context->cart->id);
                $cart_product = $cart->getProducts(true);
                if(is_array($cart_product) && $cart_product){
                    foreach($cart_product as $pcart)
                        $productIds[] = $pcart['id_product'].'-'.$pcart['id_product_attribute'];
                }
            }
            
            if($this->is16){
                $id_product_attribute_default = ptProduct::getDefaultAttribute($product->id,$product->minimal_quantity);
                $quantity_available = StockAvailable::getQuantityAvailableByProduct($product->id, $id_product_attribute_default);
                $currProduct = ptProduct::getProductAttribute($product->id, $id_product_attribute_default, $this->context->shop->id);
                 /** get all attribute*/
                $product_attributes =  $product->getAttributeCombinations($this->context->language->id);
                if(is_array($product_attributes) && $product_attributes){
                    $combinations = array();$temps = array();
                    foreach($product_attributes as $attribute){
                        if(!in_array($attribute['id_product_attribute'], $temps)){
                            $temps[] = $attribute['id_product_attribute'];
                            $combinations[$attribute['id_product_attribute']] = ptProduct::getProductAttribute($product->id, (int)$attribute['id_product_attribute'], $this->context->shop->id);
                        } 
                    }
                }else{
                    $combinations[0] = ptProduct::getProductAttribute($product->id, 0, $this->context->shop->id);
                }                
                $this->smarty->assign(array(
                    'id_product_attribute_default' => $id_product_attribute_default,
                    'quantity_available' => $quantity_available,
                    'combinations' => $combinations
                ));
            }
            /** validate product before show product to front*/
            $alldisabled = 0;
            if(is_array($purchase_togethers) && $purchase_togethers)
            {
                foreach($purchase_togethers as &$purchase){
                    if((isset($configs['ETS_PT_EXCLUDE_OUT_OF_STOCK']) && $configs['ETS_PT_EXCLUDE_OUT_OF_STOCK'] && (int)$purchase['quantity'] <= 0) 
                        || in_array(($purchase['id_product'].'-'.$purchase['id_product_attribute']), $productIds)){
                        $purchase['disabled'] = 1;
                        $alldisabled++;
                    }else
                        $purchase['disabled'] = 0;  
                }
            }
            if($this->is17){
                $currProduct = $param['product'];
                $attributes = array();
                foreach($currProduct['attributes'] as $attribute)
                    $attributes[] = $attribute['group'].':'.$attribute['name'];
                $currProduct['attribute_small'] = implode(', ',$attributes);
            }
            
            $this->smarty->assign(array(
                'alldisabled' => $alldisabled,
                'purchase_togethers' => $purchase_togethers,
                'currProduct' => (isset($currProduct) && $currProduct)?$currProduct : $product,
                'configs' => $configs,
                'ajax_cart' => $this->context->link->getModuleLink('ets_purchasetogether','etscart'),
                'includeIds' => $productIds
            ));
            
            return $this->is17 ? 'displayProduct_v17.tpl' : 'displayProduct.tpl';
        }
     }
     
     public function hookDisplayLeftColumnProduct($param)
     {
        if($this->is17 || Configuration::get('ETS_PT_HOOK_TO') != 'displayLeftColumnProduct' || (Tools::getIsset('action') && Tools::getValue('action') == 'quickview'))
            return;
        $template = $this->_hookModule($param);
        return $this->display(__FILE__,$template);
     }
     
     public function hookDisplayProductAdditionalInfo($param)
     {
        if(!$this->is17 || Configuration::get('ETS_PT_HOOK_TO') != 'displayProductAdditionalInfo' || (Tools::getIsset('action') && Tools::getValue('action') == 'quickview'))
            return;
        $template = $this->_hookModule($param);
        return $this->display(__FILE__,$template);
     }
     
     public function hookdisplayFooterProduct($param)
     {
        if(Configuration::get('ETS_PT_HOOK_TO') != 'displayFooterProduct' || (Tools::getIsset('action') && Tools::getValue('action') == 'quickview'))
            return;
        $template = $this->_hookModule($param);
        return $this->display(__FILE__,$template);
     }
}