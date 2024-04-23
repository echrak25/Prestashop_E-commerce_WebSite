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
class Ets_reviewticker extends Module
{
    private $errorMessage;
    public $configs;
    public $baseAdminPath;
    private $_html;
    public $templates;
    public $is15=false;
    public function __construct()
	{
		$this->name = 'ets_reviewticker';
		$this->tab = 'front_office_features';
		$this->version = '1.0.1';
		$this->author = 'YBC-Theme';
		$this->need_instance = 0;
		$this->secure_key = Tools::encrypt($this->name);        
		$this->bootstrap = true;
        $this->module_key = '0f08eb5f3586470589f15bc238297d62';
		parent::__construct();
        $this->displayName = $this->l('Review Ticker');
		$this->description = $this->l('Dipslay REAL TIME reviews & comments');
		$this->ps_versions_compliancy = array('min' => '1.5.0.0', 'max' => _PS_VERSION_);
        if(isset($this->context->controller->controller_type) && $this->context->controller->controller_type =='admin')
            $this->baseAdminPath = $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        if(version_compare(_PS_VERSION_, '1.6', '<'))
            $this->is15 = true; 
        //Config fields        
        $this->configs = array(
            'ETS_RT_ALERT' => array(
                'label' => $this->l('Alert message'),
                'type' => 'textarea',
                'autoload_rte' => true,     
                'default' => file_exists(dirname(__FILE__).'/data/msg.init.txt') && ($initText = Tools::file_get_contents(dirname(__FILE__).'/data/msg.init.txt')) ? $initText : $this->l('A custom in ').' [city] '.$this->l('just purchased').' [product_name] [time_ago]', 
                'validate' => 'isUnsignedInt',  
                'required' => true,    
                'lang' => true,  
                'desc' => $this->l('Available tags: ').' [product_name], [product_link], [image_url], [time], [time_ago], [price], [customer_name], [title_comment], [content_comment],[grade]',                      
            ), 
            'ETS_RT_ALLOW_CLOSE' => array(
                'label' => $this->l('Enable close button'),
                'type' => 'switch', 
                'default' => 1, 
                'validate' => 'isUnsignedInt',  
                'required' => true,                     
                'desc' => $this->l('Allow customer to close and stop the alert'),   
                'js' => 1,           
            ), 
            'ETS_RT_CLOSE_PERMANAL' => array(
                'label' => $this->l('End alert life time when customer closes review alert'),
                'type' => 'switch', 
                'default' => 0, 
                'validate' => 'isUnsignedInt',  
                'required' => true,                     
                'desc' => $this->l('Stop displaying alerts when customer reloads your website. Alert will display again if "Display review alert again after" is enabled'),   
                'js' => 1,           
            ), 
            'ETS_RT_DATE_FORMAT' => array(
                'label' => $this->l('Date format'),
                'type' => 'text', 
                'default' => '', 
                'desc' => $this->l('PHP date format. Leave blank to use default format. More reference can be found at http://php.net/manual/en/function.date.php'),
            ), 
            'ETS_RT_TRANSITION' => array(
                'label' => $this->l('Alert transition effect'),
                'type' => 'select',
                'options' => array(
        			 'query' => array(
                            array(
                                'id_option' => 'slide_up', 
                                'name' => $this->l('Slide up'),                                
                            ), 
                            array(
                                'id_option' => 'slide_down', 
                                'name' => $this->l('Slide down'),                                
                            ), 
                            array(
                                'id_option' => 'fade_in', 
                                'name' => $this->l('Fade in'),                                
                            ),                            
                            array(
                                'id_option' => 'slide_left', 
                                'name' => $this->l('Slide in left'),                                
                            ), 
                            array(
                                'id_option' => 'slide_right', 
                                'name' => $this->l('Slide in right'),                                
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'slide_up',   
                'js' => 1,                             
            ), 
            'ETS_RT_STOP_WHEN_HOVER' => array(
                'label' => $this->l('Stop sliding alerts when hover'),
                'type' => 'switch', 
                'default' => 1, 
                'validate' => 'isUnsignedInt',  
                'required' => true,    
                'js' => 1,           
            ), 
            'ETS_RT_INCLUDE_IMAGE' => array(
                'label' => $this->l('Use product image'),
                'type' => 'switch', 
                'default' => 1, 
                'validate' => 'isUnsignedInt',  
                'required' => true,                     
                'desc' => $this->l('Display product image besides alert text'),   
                'js' => 1,           
            ), 
            'ETS_RT_HIDE_ON_MOBILE' => array(
                'label' => $this->l('Hide alerts on mobile devices'),
                'type' => 'switch', 
                'default' => 1, 
                'validate' => 'isUnsignedInt',  
                'required' => true,   
                'js' => 1,           
            ), 
            'ETS_RT_POSITION' => array(
                'label' => $this->l('Alert message position'),
                'type' => 'select',
                'options' => array(
        			 'query' => array( 
                            array(
                                'id_option' => 'botton_left', 
                                'name' => $this->l('Bottom left'),                                
                            ),
                            array(
                                'id_option' => 'bottom_right', 
                                'name' => $this->l('Bottom right'),                                
                            ),
                            array(
                                'id_option' => 'top_left', 
                                'name' => $this->l('Top left'),                                
                            ), 
                            array(
                                'id_option' => 'top_right', 
                                'name' => $this->l('Top right'),                                
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'botton_left',   
                'js' => 1,                             
            ),  
            'ETS_RT_TIME_LIMIT_DAY' => array(
                'label' => $this->l('Time limit (day)'),
                'type' => 'text',     
                'default' => 365, 
                'validate' => 'isUnsignedInt',
                'required' => true,                            
            ),
            'ETS_RT_TIME_LIMIT_HOUR' => array(
                'label' => $this->l('Time limit (hour)'),
                'type' => 'text',     
                'default' => 24,   
                'validate' => 'isUnsignedInt',   
                'required' => true,                         
            ),       
            'ETS_RT_TIME_LIMIT_MIN' => array(
                'label' => $this->l('Time limit (minute)'),
                'type' => 'text',     
                'default' => 60, 
                'validate' => 'isUnsignedInt', 
                'required' => true,                             
            ), 
            'ETS_RT_MINIMUM_RATING' => array(
                'label' => $this->l('Minimum rating'),
                'type' => 'text',     
                'default' => 3, 
                'validate' => 'isUnsignedInt', 
                'required' => true,  
                'desc' => $this->l('Leave 0 to display reviews with any rating'),                      
            ), 
            'ETS_RT_APPROVED_ONLY' => array(
                'label' => $this->l('Display approved comments only'),
                'type' => 'switch',     
                'default' => 0, 
                'validate' => 'isUnsignedInt',                           
            ), 
            'ETS_RT_RELATED_ONLY' => array(
                'label' => $this->l('Only display comments for current product when on product page'),
                'type' => 'switch',     
                'default' => 0, 
                'validate' => 'isUnsignedInt',  
                'js' => 1,  
                'desc' => $this->l('When customer is on product page, only display comments of the product they are viewing'),                       
            ),  
            'ETS_RT_ALERT_COUNT' => array(
                'label' => $this->l('Alert count'),
                'type' => 'text',     
                'default' => 5, 
                'validate' => 'isUnsignedInt', 
                'desc' => $this->l('Leave blank to display alert for all reviews found'),                            
            ),    
            'ETS_RT_REPEAT' => array(
                'label' => $this->l('Repeat alert'),
                'type' => 'switch',     
                'default' => 1, 
                'validate' => 'isUnsignedInt',
                'desc' => $this->l('Repeat the review alert when the last alert has been displayed'), 
                'js' => 1,                                     
            ), 
            'ETS_RT_DELAY_START' => array(
                'label' => $this->l('Delay start'),
                'type' => 'text',     
                'default' => 10, 
                'validate' => 'isUnsignedInt',  
                'required' => true,
                'suffix' => $this->l('second(s)'),  
                'desc' => $this->l('The delay time to display the first review alert'),  
                'js' => 1,                                  
            ),
            'ETS_RT_TIME_LANDING' => array(
                'label' => $this->l('Landing time'),
                'type' => 'text',     
                'default' => 5, 
                'validate' => 'isUnsignedInt',  
                'required' => true,
                'suffix' => $this->l('second(s)'),
                'desc' => $this->l('The duration that an alert displayed in'),
                'js' => 1,                                       
            ),
            'ETS_RT_TIME_OUT' => array(
                'label' => $this->l('Alert time out'),
                'type' => 'text',     
                'default' => 20, 
                'validate' => 'isUnsignedInt',  
                'required' => true,
                'suffix' => $this->l('second(s)'),
                'desc' => $this->l('The duration between 2 review alerts'),
                'js' => 1,                                       
            ),
            'ETS_RT_LOOP_OUT' => array(
                'label' => $this->l('Loop time out'),
                'type' => 'text',     
                'default' => 0.5, 
                'validate' => 'isUnsignedFloat',  
                'required' => true,
                'suffix' => $this->l('min(s)'),
                'desc' => $this->l('The duration between 2 loops'),
                'js' => 1,                                       
            ),
            'ETS_RT_TIME_IN' => array(
                'label' => $this->l('Alert life time (display review alert in)'),
                'type' => 'text',     
                'default' => 60, 
                'validate' => 'isUnsignedInt',  
                'required' => true, 
                'suffix' => $this->l('min(s)'),  
                'desc' => $this->l('From the first time customer come to the website. Leave 0 to display review alerts all the time'), 
                'js' => 1,                                  
            ),    
            'ETS_RT_TIME_AGAIN' => array(
                'label' => $this->l('Display review alert again after'),
                'type' => 'text',     
                'default' => 60, 
                'validate' => 'isUnsignedInt',  
                'required' => true, 
                'suffix' => $this->l('min(s)'),  
                'desc' => $this->l('Redisplay review alert after customer saw the last alert. Leave 0 to permanally hide the review alert after alert life time'), 
                'js' => 1,                                  
            ),
            'ETS_RT_REMEMEBER' => array(
                'label' => $this->l('Remeber last alert states'),
                'type' => 'switch',     
                'default' => 1, 
                'validate' => 'isUnsignedInt', 
                'suffix' => $this->l('min(s)'),  
                'desc' => $this->l('Continue the review alert loop after page reloaded instead of starting over. Avoid the same alerts displayed again when customer reload the website'),  
                'js' => 1,                                 
            ),              
            'ETS_RT_PAGE' => array(
                'label' => $this->l('Display review alert on those pages'),
                'type' => 'select',
                'options' => array(
        			 'query' => array( 
                            array(
                                'id_option' => 'all', 
                                'name' => $this->l('All'),                                
                            ),
                            array(
                                'id_option' => 'index', 
                                'name' => $this->l('Home'),                                
                            ),
                            array(
                                'id_option' => 'category', 
                                'name' => $this->l('Category'),                                
                            ), 
                            array(
                                'id_option' => 'product', 
                                'name' => $this->l('Product'),                                
                            ),
                            array(
                                'id_option' => 'cms', 
                                'name' => $this->l('CMS'),                                
                            ),
                            array(
                                'id_option' => 'other', 
                                'name' => $this->l('Other pages'),                                
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'all',
                'multiple' => true,                                
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
        && $this->registerHook('displayBackOfficeHeader')
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
        return true;
    }    
    public function getContent()
	{	   
	   $this->_postConfig();       
       //Display errors if have
       if($this->errorMessage)
            $this->_html .= $this->errorMessage;
       //Add js
       $this->_html .= $this->displayAdminJs();      
       //Render views  
       $this->compatibilityWarning();     
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
    public function compatibilityWarning()
    {
        if(!Module::isInstalled('productcomments') || !Module::isEnabled('productcomments'))
            $this->_html .= $this->display(__FILE__,'warning.tpl');
    }
    public function displayAdminJs()
    {
        $this->smarty->assign(array(
            'ets_ps_url' => $this->_path,
        ));
        return $this->display(__FILE__,'admin-js.tpl');
    } 
    public function renderConfig()
    {
        $configs = $this->configs;
        $fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Review Ticker Configuration'),
					'icon' => 'icon-AdminAdmin'
				),
				'input' => array(),
                'submit' => array(
					'title' => $this->l('Save'),
                    'class'=>'button btn btn-default pull-right',
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
                    'required' => isset($config['required']) && $config['required'] && $config['type']!='switch' ? true : false,
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
                if(!$confFields['multiple'])
                    unset($confFields['multiple']);
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
                            $fields[$key][$l['id_lang']] = str_replace(array('%5B','%5D'),array('[',']'),Tools::getValue($key.'_'.$l['id_lang'],isset($config['default']) ? $config['default'] : ''));
                        }
                    }
                    elseif($config['type']=='select' && isset($config['multiple']) && $config['multiple'])
                    {
                        $fields[$key.'[]'] = Tools::getValue($key,array());   
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
                                $fields[$key][$l['id_lang']] = str_replace(array('%5B','%5D'),array('[',']'),Configuration::get($key,$l['id_lang']));
                            }
                        }
                        elseif($config['type']=='select' && isset($config['multiple']) && $config['multiple'])
                        {
                            $fields[$key.'[]'] = Configuration::get($key)!='' ? explode(',',Configuration::get($key)) : array();   
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
                            elseif(!is_array(Tools::getValue($key)) && isset($config['validate']) && method_exists('Validate',$config['validate']))
                            {
                                $validate = $config['validate'];
                                if(trim(Tools::getValue($key)) && !Validate::$validate(trim(Tools::getValue($key))))
                                    $errors[] = $config['label'].' '.$this->l('is invalid');
                                unset($validate);
                            }
                            elseif(Tools::isSubmit($key) && !is_array(Tools::getValue($key)) && !Validate::isCleanHtml(trim(Tools::getValue($key))))
                            {
                                $errors[] = $config['label'].' '.$this->l('is invalid');
                            } 
                        }                          
                    }                    
                }
            }            
            
            //Custom validation
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
                            elseif($config['type']=='select' && isset($config['multiple']) && $config['multiple'])
                            {
                                Configuration::updateValue($key,implode(',',Tools::getValue($key)));                               
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
     public function getProductReviews($excluded = array(),$id_product = 0)
     {
       
        if(($displayIn = (int)Configuration::get('ETS_RT_TIME_IN')) && isset($this->context->cookie->ets_rt_start) && ($pastIn = (int)$this->context->cookie->ets_rt_start) && ($currentTime = time()) && ($currentTime-$pastIn >= $displayIn * 60))
        { 
            if(($displayAfter = (int)Configuration::get('ETS_RT_TIME_AGAIN')) && ($currentTime-$pastIn-$displayIn*60-$displayAfter*60 >= 0))
            {              
                $this->context->cookie->ets_rt_start = $currentTime;
                $this->context->cookie->write(); 
            }
            else
                return false;
        }
        $ETS_RT_TIME_LIMIT_DAY = (int)Configuration::get('ETS_RT_TIME_LIMIT_DAY') ? (int)Configuration::get('ETS_RT_TIME_LIMIT_DAY') : 0;
        $ETS_RT_TIME_LIMIT_HOUR = (int)Configuration::get('ETS_RT_TIME_LIMIT_HOUR') ? (int)Configuration::get('ETS_RT_TIME_LIMIT_HOUR') : 0;
        $ETS_RT_TIME_LIMIT_MIN = (int)Configuration::get('ETS_RT_TIME_LIMIT_MIN') ? (int)Configuration::get('ETS_RT_TIME_LIMIT_MIN') : 0;
        $startTime = date('Y-m-d H:i:s',time() - (int)($ETS_RT_TIME_LIMIT_DAY * 24 * 3600 + $ETS_RT_TIME_LIMIT_HOUR * 3600 + $ETS_RT_TIME_LIMIT_MIN * 60));
        $limit = (int)Configuration::get('ETS_RT_ALERT_COUNT');        
        $sql = "SELECT pc.*,pl.name FROM "._DB_PREFIX_."product_comment pc,"._DB_PREFIX_."product_shop ps,"._DB_PREFIX_."product_lang pl 
            WHERE pc.deleted=0 ".(($minRating = (int)Configuration::get('ETS_RT_MINIMUM_RATING')) > 0 ? " AND pc.grade>=".(int)$minRating : "").($id_product && (int)Configuration::get('ETS_RT_RELATED_ONLY') ? " AND pc.id_product=".(int)$id_product : "")." AND ps.id_product=pc.id_product AND ps.id_product=pl.id_product AND ps.id_shop='".(int)$this->context->shop->id."' AND pl.id_lang='".(int)$this->context->language->id."'".(Configuration::get('ETS_RT_APPROVED_ONLY')? ' AND pc.validate=1 ':''). "  AND  pc.date_add >='".pSQL($startTime)."'".((int)Configuration::get('ETS_RT_REMEMEBER') && is_array($excluded) && $excluded ? (($minId = (int)$this->minId($limit,$startTime,$id_product)) ? " AND pc.id_product_comment >= ".$minId : "")." AND pc.id_product_comment NOT IN(".implode(',',array_map('intval',$excluded)).")" : "")."
            ORDER BY pc.id_product_comment DESC ".($limit>0? "LIMIT 0,".(int)$limit: "")."
        ";
        $result = Db::getInstance()->executeS($sql);
        return $result;
     }    
     public function minId($limit, $startTime,$id_product = 0)
     {
        if((int)$limit <= 0)
            return 0;
        $sql = "SELECT pc.id_product_comment FROM "._DB_PREFIX_."product_comment pc, "._DB_PREFIX_."product_shop ps WHERE pc.deleted=0 ".(($minRating = (int)Configuration::get('ETS_RT_MINIMUM_RATING')) > 0 ? " AND pc.grade>=".(int)$minRating : "").($id_product && (int)Configuration::get('ETS_RT_RELATED_ONLY') ? " AND pc.id_product=".(int)$id_product : "")." AND pc.id_product=ps.id_product AND ps.id_shop=".(int)$this->context->shop->id.(Configuration::get('ETS_RT_APPROVED_ONLY')? ' AND pc.validate=1 ':'')." AND pc.date_add >='".pSQL($startTime)."' ORDER BY pc.id_product_comment DESC LIMIT 0,".(int)$limit;
        $rows = Db::getInstance()->executeS($sql);        
        if($rows)
            return (int)$rows[count($rows)-1]['id_product_comment'];
        return 0;    
     } 
     public function getConfigs($js = false)
     {
        $configs = array();
        foreach($this->configs as $key => $val){
            if($js && (!isset($val['js']) || isset($val['js']) && !$val['js']))
                continue;
            $configs[$key] = isset($val['lang']) && $val['lang'] ? Configuration::get($key,$this->context->language->id) : Configuration::get($key);
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
     public function hookDisplayHeader()
     {     
        if(!$this->checkAccess())
            return;
        $assigns = $this->getConfigs(true);
        $assigns['ETS_RT_URL_AJAX'] = $this->context->link->getModuleLink($this->name,'ajax');
        $this->smarty->assign('assigns',$assigns);        
        if(!isset($this->context->cookie->ets_rt_start) || isset($this->context->cookie->ets_rt_start) && !$this->context->cookie->ets_rt_start)
        {
            $this->context->cookie->ets_rt_start = time();
            $this->context->cookie->write();   
        }
        $this->context->controller->addCSS($this->_path.'views/css/reviewticker.css','all');
        if($this->is15)
            $this->context->controller->addCSS($this->_path.'views/css/reviewticker15.css','all');        
        $this->context->controller->addJS($this->_path.'views/js/reviewticker.js');
        return $this->display(__FILE__, 'reviewticker.tpl');
     }
     public function hookDisplayBackOfficeHeader()
     {
        if(Tools::isSubmit('configure') && Tools::strtolower(Tools::getValue('configure'))=='ets_reviewticker')
            $this->context->controller->addCSS($this->_path.'views/css/reviewticker.admin.css','all');
        if($this->is15)
            $this->context->controller->addCSS($this->_path.'views/css/reviewticker.admin15.css','all');
     }       
     public function displayAlert($excludedIds = array(),$id_product = 0)
     {  
        $template = Configuration::get('ETS_RT_ALERT',(int)$this->context->language->id);
        $template = str_replace(array('%5B','%5D'),array('[',']'),$template);
        $needFormatTime = version_compare(_PS_VERSION_, '1.6.0', '>=') ? (Tools::strpos($template,'[time_ago]')!==false) : (strpos($template,'[time_ago]')!==false);        
        if(($reviews = $this->getProductReviews($excludedIds,$id_product)) && $reviews){            
            foreach($reviews as &$review){
                $product = new Product($review['id_product'], false, Context::getContext()->language->id);
                if((bool)Configuration::get('ETS_RT_INCLUDE_IMAGE'))
                {                        
                    if($image = Image::getCover($review['id_product']))
                        $id_image = $image['id_image'];
                    elseif($ids = Image::getImages($this->context->language->id,$review['id_product'],null))
                        $id_image = $ids[0]['id_image'];
                    else
                        $id_image = 0;
                    if($id_image)
                    {                        
                        $image_type=version_compare(_PS_VERSION_, '1.7', '<') ? ImageType::getFormatedName('cart') : ImageType::getFormattedName('cart');
                        if($this->is15)
                            $image_type=ImageType::getFormatedName('home');
                        if($imagePath = $this->context->link->getImageLink($product->link_rewrite, $id_image,$image_type ))
                            $review['image'] = $imagePath;                            
                    }                        
                }
                if(!isset($review['image']))
                    $review['image'] = '';
                $review['product_link'] = $this->context->link->getProductLink(array('id_product'=>$review['id_product']),null,null,null,$this->context->language->id,$this->context->shop->id,0);   
                $review['alert'] = str_replace(
                    array('[image_url]','[product_name]','[product_link]','[time]','[time_ago]','[price]','[title_comment]','[content_comment]','[grade]','[customer_name]'),
                    array(   
                        $review['image'],                    
                        $review['name'],
                        $review['product_link'],
                        date(($dateFormat = Configuration::get('ETS_RT_DATE_FORMAT')) ? $dateFormat : 'F j, Y, g:i a',strtotime($review['date_add'])),
                        $needFormatTime ? $this->formatTime($review['date_add']) : $review['date_add'],
                        Tools::displayPrice($product->getPrice()),
                        $review['title'],
                        $review['content'],
                        $this->displayGradeReview($review['grade']),
                        $review['customer_name'],
                    ),$template);                    
            }
            $this->smarty->assign(array(
                'reviews' => $reviews,
                'ETS_RT_ALLOW_CLOSE' => (int)Configuration::get('ETS_RT_ALLOW_CLOSE'),
                'ETS_RT_TRANSITION' => Configuration::get('ETS_RT_TRANSITION'),
                'ETS_RT_POSITION' => Tools::strtolower(Configuration::get('ETS_RT_POSITION')),
                'ETS_RT_HIDE_ON_MOBILE' => (int)Configuration::get('ETS_RT_HIDE_ON_MOBILE'),
                'ETS_RT_RTL' => isset($this->context->language->is_rtl) && $this->context->language->is_rtl,
            )); 
            return $this->display(__FILE__, 'alerts.tpl');
        }        
     }
     public function formatTime($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;    
        $string = array(
            'y' => $this->l('year'),
            'm' => $this->l('month'),
            'w' => $this->l('week'),
            'd' => $this->l('day'),
            'h' => $this->l('hour'),
            'i' => $this->l('minute'),
            's' => $this->l('second'),
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? $this->l('s') : '');
            } else {
                unset($string[$k]);
            }
        }    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . $this->l(' ago') : $this->l('just now');
     }
     public function checkAccess()
     {
        if(!Module::isInstalled('productcomments') || !Module::isEnabled('productcomments'))
            return false;
        if(!($pages = explode(',',Tools::strtolower(Configuration::get('ETS_RT_PAGE')))) || !isset($this->context->controller->php_self))
            return false;           
        if(in_array('all',$pages) || in_array(Tools::strtolower($this->context->controller->php_self),$pages) || (!in_array(Tools::strtolower($this->context->controller->php_self),array('index','category','product','cms')) && in_array('other',$pages)))
            return true;
        return false;
     }
     public function getOrderStates()
     {        
        $states = array(array('id' => 0, 'name' => $this->l('All')));
        if($orderStates = OrderState::getOrderStates($this->context->language->id))
        {
            foreach($orderStates as $state)
            {
                $temp = array(
                    'id' => $state['id_order_state'],
                    'name' => $state['name'],
                );
                $states[] = $temp;
            }
        }
        return $states;   
     }
     public function displayGradeReview($grade)
     {
        $this->context->smarty->assign('grade',$grade);
        return $this->display(__FILE__,'productcomments_reviews.tpl');
     }
}