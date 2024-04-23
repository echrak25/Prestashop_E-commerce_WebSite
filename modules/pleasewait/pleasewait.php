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
class Pleasewait extends Module
{
    private $errorMessage;
    public $configs;
    public $baseAdminPath;
    private $_html;
    public $templates;
    public function __construct()
	{
		$this->name = 'pleasewait';
		$this->tab = 'front_office_features';
		$this->version = '1.0.1';
		$this->author = 'YBC-Theme';
		$this->need_instance = 0;
		$this->secure_key = Tools::encrypt($this->name);        
		$this->bootstrap = true;
        $this->module_key = '5bb3ec04d74c65cf7bb7d646c43327b2';
		parent::__construct();
        $this->displayName = $this->l('Please Wait...!');
		$this->description = $this->l('Display a loading icon while loading your website');
		$this->ps_versions_compliancy = array('min' => '1.6.0.0', 'max' => _PS_VERSION_);
        if(isset($this->context->controller->controller_type) && $this->context->controller->controller_type =='admin')
            $this->baseAdminPath = $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        
        //Config fields        
        $this->configs = array(
            'PLW_ENABLED' => array(
                'label' => $this->l('Enable loading icon'),
                'type' => 'switch',     
                'default' => 1,                             
            ),
            'PLW_SPINNER_TYPE' => array(
                'label' => $this->l('Loading icon type'),
                'type' => 'select',
                'options' => array(
        			 'query' => array( 
                            array(
                                'id_option' => 'type1', 
                                'name' => $this->l('Rotating Plane'),                                
                            ),
                            array(
                                'id_option' => 'type2', 
                                'name' => $this->l('Double Bounce'),                                
                            ),
                            array(
                                'id_option' => 'type3', 
                                'name' => $this->l('Rectangle Wave'),                                
                            ), 
                            array(
                                'id_option' => 'type4', 
                                'name' => $this->l('Wandering Cubes'),                                
                            ),
                            array(
                                'id_option' => 'type5', 
                                'name' => $this->l('Pulse'),                                
                            ),
                            array(
                                'id_option' => 'type6', 
                                'name' => $this->l('Chasing Dots'),                                
                            ),
                            array(
                                'id_option' => 'type7', 
                                'name' => $this->l('Three Bounce'),                                
                            ),
                            array(
                                'id_option' => 'type8', 
                                'name' => $this->l('Scaling circle'),                                
                            ),
                            array(
                                'id_option' => 'type9', 
                                'name' => $this->l('Cube grid'),                                
                            ),
                            array(
                                'id_option' => 'type10', 
                                'name' => $this->l('Fading circle'),                                
                            ),
                            array(
                                'id_option' => 'type11', 
                                'name' => $this->l('Folding cube Plane'),                                
                            ), 
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'type11',                                
            ),  
            'PLW_SPINNER_SIZE' => array(
                'label' => $this->l('Icon size'),
                'type' => 'text',
                'default' => 60,
                'suffix' => 'px',  
                'required' => true,                          
            ),          
            'PLW_LOADING_MESSAGE' => array(
                'label' => $this->l('Message'),
                'type' => 'textarea',
                'lang' => true,                         
            ),            
            'PLW_HOMEPAGE_ONLY' => array(
                'label' => $this->l('Display on home page only'),
                'type' => 'switch',     
                'default' => 1,                                     
            ), 
            'PLW_ICON_COLOR' => array(
                'label' => $this->l('Icon color'),
                'type' => 'color',
                'default' => '#ffffff',                               
            ),
            'PLW_TEXT_COLOR' => array(
                'label' => $this->l('Text color'),
                'type' => 'color',
                'default' => '#ffffff',                      
            ), 
            'PLW_BACKGROUND_COLOR' => array(
                'label' => $this->l('Background color'),
                'type' => 'color',
                'default' => '',                       
            ), 
            'PLW_BACKGROUND_OPACITY' => array(
                'label' => $this->l('Background opacity'),
                'type' => 'text',
                'default' => '1', 
                'required' => true,
                'desc' => $this->l('Background opacity is a float number from 0 to 1'),
            ),                                 
        );        
    }
    /**
	 * @see Module::install()
	 */
    public function install()
	{
	    return parent::install()        
        && $this->registerHook('displayHeader')
        && $this->registerHook('displayFooterBefore')
        && $this->_installDb();        
    }
    /**
	 * @see Module::uninstall()
	 */
	public function uninstall()
	{
        return parent::uninstall() && $this->_uninstallDb();
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
                    Configuration::updateValue($key, $values,true);
                }
                else
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
                Configuration::deleteByName($key);                
            }
            unset($config);
        } 
        $dirs = array('config');
        foreach($dirs as $dir)
        {
            $files = glob(dirname(__FILE__).'/images/'.$dir.'/*'); 
            foreach($files as $file){ 
              if(is_file($file))
                @unlink($file); 
            }
        }       
        return true;
    }    
    public function getContent()
	{	   
	   $this->_postConfig();       
       //Display errors if have
       if($this->errorMessage)
            $this->_html .= $this->errorMessage;
       //Add js
       $this->_html .= '<script>var plw_preview_url=\''.$this->_path.'views/preview/preview.html\';</script><script src="'.$this->_path.'views/js/admin.js"></script>';       
       //Render views
       $this->renderConfig(); 
       return $this->_html;
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
                    'name' => $key,
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
                    'lang' => isset($config['lang']) ? $config['lang'] : false
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
                        else
                            $fields[$key] = Tools::getValue($key,isset($config['default']) ? $config['default'] : '');
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
        $errors = array();
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
                $errors[] = $configs[$image]['label'].$this->l(' is required');
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
                            $errors[] = $config['label'].' '.$this->l('is required');
                        }                        
                    }
                    else
                    {
                        if(isset($config['required']) && $config['required'] && isset($config['type']) && $config['type']=='file')
                        {
                            if(Configuration::get($key)=='' && !isset($_FILES[$key]['size']))
                                $errors[] = $config['label'].' '.$this->l('is required');
                            elseif(isset($_FILES[$key]['size']))
                            {
                                $fileSize = round((int)$_FILES[$key]['size'] / (1024 * 1024));
                    			if($fileSize > 100)
                                    $errors[] = $config['label'].$this->l(' can not be larger than 100Mb');
                            }   
                        }
                        else
                        {
                            if(isset($config['required']) && $config['required'] && $config['type']!='switch' && trim(Tools::getValue($key) == ''))
                            {
                                $errors[] = $config['label'].' '.$this->l('is required');
                            }
                            elseif(!Validate::isCleanHtml(trim(Tools::getValue($key))))
                            {
                                $errors[] = $config['label'].' '.$this->l('is invalid');
                            } 
                        }                          
                    }                    
                }
            }            
            
            //Custom validation
            if((int)Tools::getValue('PLW_SPINNER_SIZE') <= 0 || !Validate::isInt(Tools::getValue('PLW_SPINNER_SIZE')))
                $errors[] = $this->l('Icon size is not valid');
            if(!Validate::isColor(Tools::getValue('PLW_ICON_COLOR')))
                $errors[] = $this->l('Icon color is not valid');
            if(!Validate::isColor(Tools::getValue('PLW_TEXT_COLOR')))
                $errors[] = $this->l('Text color is not valid');
            if(!Validate::isColor(Tools::getValue('PLW_BACKGROUND_COLOR')))
                $errors[] = $this->l('Background color is not valid');
            if((float)Tools::getValue('PLW_BACKGROUND_OPACITY') < 0 || (float)Tools::getValue('PLW_BACKGROUND_OPACITY') > 1 || !Validate::isFloat(Tools::getValue('PLW_BACKGROUND_OPACITY')))
                $errors[] = $this->l('Background opacity is not valid');
            if(!$errors)
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
                            if($config['type']=='switch')
                            {                           
                                Configuration::updateValue($key,(int)trim(Tools::getValue($key)) ? 1 : 0,true);
                            }
                            if($config['type']=='file')
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
                                        $errors[] = $config['label'].$this->l(' already exists. Try to rename the file then reupload');
                                    }
                                    else
                                    {
                                        
                            			$imagesize = @getimagesize($_FILES[$key]['tmp_name']);
                                        
                                        if (!$errors && isset($_FILES[$key]) &&				
                            				!empty($_FILES[$key]['tmp_name']) &&
                            				!empty($imagesize) &&
                            				in_array($type, array('jpg', 'gif', 'jpeg', 'png'))
                            			)
                            			{
                            				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');    				
                            				if ($error = ImageManager::validateUpload($_FILES[$key]))
                            					$errors[] = $error;
                            				elseif (!$temp_name || !move_uploaded_file($_FILES[$key]['tmp_name'], $temp_name))
                            					$errors[] = $this->l('Can not upload the file');
                            				elseif (!ImageManager::resize($temp_name, $fileName, null, null, $type))
                            					$errors[] = $this->displayError($this->l('An error occurred during the image upload process.'));
                            				if (isset($temp_name))
                            					@unlink($temp_name);
                                            if(!$errors)
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
                            else
                                Configuration::updateValue($key,trim(Tools::getValue($key)),true);   
                        }                        
                    }
                }                
            }
            if (count($errors))
            {
               $this->errorMessage = $this->displayError(implode('<br />', $errors));  
            }
            else
               Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);            
        }
     }
     public function hookDisplayHeader()
     {     
        if((!isset($this->context->controller->php_self) || isset($this->context->controller->php_self) && $this->context->controller->php_self!='index') && Configuration::get('PLW_HOMEPAGE_ONLY'))
            return;
        $this->context->controller->addCSS($this->_path.'views/css/types/'.Tools::strtolower(Configuration::get('PLW_SPINNER_TYPE')).'.css','all');
        $this->context->controller->addCSS($this->_path.'views/css/pleasewait.css','all');
        $this->context->controller->addJS($this->_path.'views/js/pleasewait.js');
        if(($type = Tools::strtolower(Configuration::get('PLW_SPINNER_TYPE'))) && (@file_exists(dirname(__FILE__).'/views/css/types/'.$type.'_inline.css')) && ($css = @Tools::file_get_contents(dirname(__FILE__).'/views/css/types/'.$type.'_inline.css')))
        {
            $css = str_replace('{bgcolor}',Configuration::get('PLW_ICON_COLOR'),$css);
            $this->smarty->assign(array('css' => $css));
            return $this->display(__FILE__, 'header.tpl');   
        }   
     }
     public function hookDisplayFooterBefore()
     {
        if((!isset($this->context->controller->php_self) || isset($this->context->controller->php_self) && $this->context->controller->php_self!='index') && Configuration::get('PLW_HOMEPAGE_ONLY'))
            return;
        $xml = @simplexml_load_file(dirname(__FILE__).'/views/xml/html.xml');
        $type = Tools::strtolower(Configuration::get('PLW_SPINNER_TYPE'));
        $html = isset($xml->$type) ? (string)$xml->$type : '';        
        $this->smarty->assign(array(          
            'PLW_HTML' => $html,   
            'PLW_BACKGROUND_COLOR' => $this->hex2rgb(Configuration::get('PLW_BACKGROUND_COLOR'), (float)Configuration::get('PLW_BACKGROUND_OPACITY')),
            'PLW_ICON_COLOR' => Configuration::get('PLW_ICON_COLOR'),
            'PLW_LOADING_MESSAGE' => Configuration::get('PLW_LOADING_MESSAGE',$this->context->language->id),
            'PLW_HOMEPAGE_ONLY' => Configuration::get('PLW_HOMEPAGE_ONLY'),
            'PLW_TEXT_COLOR' => Configuration::get('PLW_TEXT_COLOR'), 
            'PLW_SPINNER_SIZE' => Configuration::get('PLW_SPINNER_SIZE'),
            'PLW_SPINNER_SIZE2' => (int)((int)Configuration::get('PLW_SPINNER_SIZE')/4),          
        ));
        return $this->display(__FILE__, 'pleasewait.tpl');   
     }
     public function hex2rgb($hex, $opacity = 1) {
       if(!Validate::isColor($hex) || $opacity==1)
            return $hex;
       $hex = str_replace("#", "", $hex);
       if($opacity <0 || $opacity > 1)
            $opacity =1;
       if(Tools::strlen($hex) == 3) {
          $r = hexdec(Tools::substr($hex,0,1).Tools::substr($hex,0,1));
          $g = hexdec(Tools::substr($hex,1,1).Tools::substr($hex,1,1));
          $b = hexdec(Tools::substr($hex,2,1).Tools::substr($hex,2,1));
       } else {
          $r = hexdec(Tools::substr($hex,0,2));
          $g = hexdec(Tools::substr($hex,2,2));
          $b = hexdec(Tools::substr($hex,4,2));
       }
       return 'rgba('.$r.','.$g.','.$b.','.$opacity.')';
    }
}