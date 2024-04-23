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
class Ybc_newsletter extends Module
{
    private $errorMessage;
    public $configs;
    public $baseAdminPath;
    private $_html;
    public $templates;
    public $tableName = 'emailsubscription';
    public $accessable = false;
    public function __construct()
	{
		$this->name = 'ybc_newsletter';
		$this->tab = 'front_office_features';
		$this->version = '1.0.3';
		$this->author = 'YBC-Theme';
		$this->need_instance = 0;
		$this->secure_key = Tools::encrypt($this->name);        
		$this->bootstrap = true;
        $this->module_key = '878e4f88c420caa9b4a5d086e78efbf7';
        if(version_compare(_PS_VERSION_, '1.7', '<'))
            $this->tableName = 'newsletter';
		parent::__construct();
        $this->displayName = $this->l('Responsive Newsletter Popup');
		$this->description = $this->l('Display a newsletter subscription popup form with 6 amazing templates');
		$this->ps_versions_compliancy = array('min' => '1.6.0.0', 'max' => _PS_VERSION_);
        if(isset($this->context->controller->controller_type) && $this->context->controller->controller_type =='admin')
            $this->baseAdminPath = $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $this->_files = array(
			'name' => array('newsletter_conf', 'newsletter_voucher','newsletter_verif'),
			'ext' => array(
				0 => 'html',
				1 => 'txt'
			)
		);
        //Templates
        $data = @simplexml_load_file(dirname(__FILE__).'/xml/data.xml');        
        $this->templates = array(
            'ynpt1' => array(
                'YBC_NEWSLETTER_POPUP_CONTENT' => isset($data->YBC_NEWSLETTER_POPUP_CONTENT) ?  (string)$data->YBC_NEWSLETTER_POPUP_CONTENT : '',
                'YBC_NEWSLETTER_POPUP_TITLE' => $this->l('Newsletter'),
                'YBC_NEWSLETTER_POPUP_SUBTITLE' => $this->l('Welcome to our online Store'),
                'YBC_NEWSLETTER_POPUP_BUTTON_COLOR' => '#28abe3',
                'YBC_NEWSLETTER_POPUP_BUTTON_HOVER_COLOR' => '#e94c6f',
                'YBC_NEWSLETTER_IMAGE' => 'ynpt1.jpg',                
            ),
            'ynpt2' => array(
                'YBC_NEWSLETTER_POPUP_CONTENT' => isset($data->YBC_NEWSLETTER_POPUP_CONTENT) ?  (string)$data->YBC_NEWSLETTER_POPUP_CONTENT : '',
                'YBC_NEWSLETTER_POPUP_BUTTON_COLOR' => '#f9b002',
                'YBC_NEWSLETTER_POPUP_BUTTON_HOVER_COLOR' => '#ffc63d',
                'YBC_NEWSLETTER_POPUP_TITLE' => $this->l('Welcome to Digital Store'),
                'YBC_NEWSLETTER_POPUP_SUBTITLE' => '',
                'YBC_NEWSLETTER_IMAGE' => 'ynpt2.jpg',  
                'YBC_NEWSLETTER_LOGO' => 'logo2.png',                 
            ),
            'ynpt3' => array(
                'YBC_NEWSLETTER_POPUP_CONTENT' => isset($data->YBC_NEWSLETTER_POPUP_CONTENT) ?  (string)$data->YBC_NEWSLETTER_POPUP_CONTENT : '',
                'YBC_NEWSLETTER_POPUP_BUTTON_COLOR' => '#000000',
                'YBC_NEWSLETTER_POPUP_BUTTON_HOVER_COLOR' => '#222222',
                'YBC_NEWSLETTER_POPUP_TITLE' => $this->l('Welcome to our online Store'),
                'YBC_NEWSLETTER_POPUP_SUBTITLE' => '',
                'YBC_NEWSLETTER_IMAGE' => 'ynpt3.jpg',                
            ),
            'ynpt4' => array(
                'YBC_NEWSLETTER_POPUP_CONTENT' => isset($data->YBC_NEWSLETTER_POPUP_CONTENT) ?  (string)$data->YBC_NEWSLETTER_POPUP_CONTENT : '',
                'YBC_NEWSLETTER_POPUP_BUTTON_COLOR' => '#28abe3',
                'YBC_NEWSLETTER_POPUP_BUTTON_HOVER_COLOR' => '#e94c6f',
                'YBC_NEWSLETTER_POPUP_TITLE' => $this->l('Welcome to our Shop...!'),
                'YBC_NEWSLETTER_POPUP_SUBTITLE' => '',
                'YBC_NEWSLETTER_IMAGE' => 'ynpt4.jpg',                
            ),
            'ynpt5' => array(
                'YBC_NEWSLETTER_POPUP_CONTENT' => isset($data->YBC_NEWSLETTER_POPUP_CONTENT) ?  (string)$data->YBC_NEWSLETTER_POPUP_CONTENT : '',
                'YBC_NEWSLETTER_POPUP_BUTTON_COLOR' => '#e1003a',
                'YBC_NEWSLETTER_POPUP_TITLE' => $this->l('Welcome to our online Store'),
                'YBC_NEWSLETTER_POPUP_SUBTITLE' => '',
                'YBC_NEWSLETTER_POPUP_BUTTON_HOVER_COLOR' => '#fa1b53',
                'YBC_NEWSLETTER_IMAGE' => 'ynpt5.jpg',                
            ),
            'ynpt6' => array(
                'YBC_NEWSLETTER_POPUP_CONTENT' => isset($data->YBC_NEWSLETTER_POPUP_CONTENT) ?  (string)$data->YBC_NEWSLETTER_POPUP_CONTENT : '',
                'YBC_NEWSLETTER_POPUP_BUTTON_COLOR' => '',
                'YBC_NEWSLETTER_POPUP_TITLE' => $this->l('HELLO..!'),
                'YBC_NEWSLETTER_POPUP_SUBTITLE' => '',
                'YBC_NEWSLETTER_POPUP_BUTTON_HOVER_COLOR' => '',
                'YBC_NEWSLETTER_IMAGE' => 'ynpt6.jpg',
                'YBC_NEWSLETTER_LOGO' => 'logo6.png',                
            ),      
            'ynpt8' => array(
                'YBC_NEWSLETTER_POPUP_CONTENT' => isset($data->YBC_NEWSLETTER_POPUP_CONTENT) ?  (string)$data->YBC_NEWSLETTER_POPUP_CONTENT : '',
                'YBC_NEWSLETTER_POPUP_BUTTON_COLOR' => '#febb01',
                'YBC_NEWSLETTER_POPUP_TITLE' => $this->l('Welcome to cosmetics Store'),
                'YBC_NEWSLETTER_POPUP_SUBTITLE' => '',
                'YBC_NEWSLETTER_POPUP_BUTTON_HOVER_COLOR' => '#fcc52d',     
                'YBC_NEWSLETTER_IMAGE' => 'ynpt8.jpg',   
                'YBC_NEWSLETTER_LOGO' => 'logo8.png'      
            ),                 
        );
        //Config fields        
        $this->configs = array(
            //gereral
            'YBC_NEWSLETTER_DISPLAY_POPUP' => array(
                'label' => $this->l('Enable newsletter popup'),
                'type' => 'switch',
                'default' => 1
            ),             
            'YBC_NEWSLETTER_POPUP_TITLE' => array(
                'label' => $this->l('Title'),
                'type' => 'text',
                'default' => $this->templates['ynpt4']['YBC_NEWSLETTER_POPUP_TITLE'],
                'lang' => true,
            ), 
            'YBC_NEWSLETTER_POPUP_SUBTITLE' => array(
                'label' => $this->l('SubTitle'),
                'type' => 'text',
                'default' => $this->templates['ynpt4']['YBC_NEWSLETTER_POPUP_SUBTITLE'],
                'lang' => true,
            ),
            'YBC_NEWSLETTER_POPUP_CONTENT' => array(
                'label' => $this->l('Popup content'),
                'type' => 'textarea',
                'default' => $this->templates['ynpt4']['YBC_NEWSLETTER_POPUP_CONTENT'],               
                'lang' => true,
                'autoload_rte' => true,                
            ),
            'YBC_NEWSLETTER_DISPLAY_THANK_YOU' => array(
                'label' => $this->l('Display thank you message'),
                'type' => 'switch',
                'default' => 1,
            ),
            'YBC_NEWSLETTER_POPUP_THANK_YOU' => array(
                'label' => $this->l('Thank you message'),
                'type' => 'textarea',
                'default' => isset($data->YBC_NEWSLETTER_POPUP_THANK_YOU) ?  (string)$data->YBC_NEWSLETTER_POPUP_THANK_YOU : '',               
                'lang' => true,
                'autoload_rte' => true,               
            ),            
            
            // Conditions            
            'YBC_NEWSLETTER_TIME_IN' => array(
                'label' => $this->l('Popup lifetime (display popup in)'),
                'type' => 'text',     
                'default' => 60, 
                'validate' => 'isUnsignedInt',                
                'suffix' => $this->l('min(s)'),  
                'desc' => $this->l('From the first time customer come to the website. Leave blank to ignore popup lifetime'), 
                'js' => 1,                                  
            ),   
            'YBC_NEWSLETTER_CLOSE_PERMANAL' => array(
                'label' => $this->l('End popup lifetime when customer closes popup'),
                'type' => 'switch',
                'default' => 0,
                'validate' => 'isUnsignedInt',                                 
                'desc' => $this->l('Stop displaying popup when customer reloads your website. Popup will display again if "Display pupup again after" is enabled'),   
                'js' => 1,  
            ), 
            'YBC_NEWSLETTER_TIME_AGAIN' => array(
                'label' => $this->l('Display popup again after'),
                'type' => 'text',     
                'default' => 60, 
                'validate' => 'isUnsignedInt',  
                'required' => true, 
                'suffix' => $this->l('min(s)'),  
                'desc' => $this->l('Redisplay popup after a certain time. Leave 0 to permanently hide the popup after popup lifetime'), 
                'js' => 1,                                  
            ),  
            'YBC_NEWSLETTER_POPUP_DELAY' => array(
                'label' => $this->l('Delay start'),
                'type' => 'text',
                'suffix' => 'milliseconds',
                'default' => 2000,
                'required' => true,
                'validate' => 'isUnsignedInt',         
            ),
            'YBC_NEWSLETTER_AUTO_HIDE' => array(
                'label' => $this->l('Auto end popup lifetime after first time customer see it'),
                'type' => 'switch',
                'default' => 0,
                'validate' => 'isUnsignedInt',  
            ),
            'YBC_NEWSLETTER_HIDE_IF_LOGGED_IN' => array(
                'label' => $this->l('Do not display newsletter popup if customer has logged in'),
                'type' => 'switch',
                'default' => 1,
                'validate' => 'isUnsignedInt',  
            ),   
            'YBC_NEWSLETTER_MOBILE_HIDE' => array(
                'label' => $this->l('Hide popup on mobile devices'),
                'type' => 'switch',
                'default' => 0,
                'validate' => 'isUnsignedInt',  
            ),
            // Design
            'YBC_NEWSLETTER_TEMPLATE' => array(
                'label' => $this->l('Popup template'),
                'type' => 'select',                              
				'options' => array(
        			 'query' => array( 
                            array(
                                'id_option' => 'ynpt1', 
                                'name' => $this->l('Template 1')
                            ),
                            array(
                                'id_option' => 'ynpt2', 
                                'name' => $this->l('Template 2')
                            ),
                            array(
                                'id_option' => 'ynpt3', 
                                'name' => $this->l('Template 3')
                            ),
                            array(
                                'id_option' => 'ynpt4', 
                                'name' => $this->l('Template 4')
                            ),
                            array(
                                'id_option' => 'ynpt5', 
                                'name' => $this->l('Template 5')
                            ),
                            array(
                                'id_option' => 'ynpt6', 
                                'name' => $this->l('Template 6')
                            ),                            
                            array(
                                'id_option' => 'ynpt8', 
                                'name' => $this->l('Template 6')
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'ynpt6'
            ), 
            'YBC_NEWSLETTER_POPUP_TYPE_SHOW' => array(
                'label' => $this->l('Display type'),
                'type' => 'select',
                'options' => array(
        			 'query' => array( 
                            array(
                                'id_option' => 'zoomIn', 
                                'name' => $this->l('Zoom In')
                            ),
                            array(
                                'id_option' => 'swing', 
                                'name' => $this->l('Swing')
                            ),
                            array(
                                'id_option' => 'bounceInDown', 
                                'name' => $this->l('Bounce-In-Down')
                            ),
                            array(
                                'id_option' => 'fadeIn', 
                                'name' => $this->l('fadeIn')
                            ),
                            array(
                                'id_option' => 'fadeInDown', 
                                'name' => $this->l('Fade-In-Down')
                            ),                                                        
                            array(
                                'id_option' => 'tada', 
                                'name' => $this->l('Tada')
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'zoomIn'
            ),
            'YBC_NEWSLETTER_POPUP_BUTTON_COLOR' => array(
                'label' => $this->l('Button color'),
                'type' => 'color',
                'default' => "",
            ),
            'YBC_NEWSLETTER_POPUP_BUTTON_HOVER_COLOR' => array(
                'label' => $this->l('Button hovering color'),
                'type' => 'color',
                'default' => "",
            ),            
            'YBC_NEWSLETTER_IMAGE' => array(
                'label' => $this->l('Popup background image'),
                'type' => 'file',
                'default' => $this->templates['ynpt6']['YBC_NEWSLETTER_IMAGE'],      
            ),
            'YBC_NEWSLETTER_LOGO' => array(
                'label' => $this->l('Logo'),
                'type' => 'file',     
            ),      
            'YBC_NEWSLETTER_CUSTOM_CSS' => array(
                'label' => $this->l('Custom CSS'),
                'type' => 'textarea',
                'desc' => $this->l('*Note: Clear your CSS caches to take effect if you made changes to this custom CSS while the caches are enabled'),
            ),
            // Email            
            'YBC_REQUIRE_VERIFICATION' => array(
                'label' => $this->l('Require verification'),
                'type' => 'switch',
                'default' => 0,
                'validate' => 'isUnsignedInt',  
            ),
            'YBC_VERIFICATION_EMAIL' => array(
                'label' => $this->l('Verification email'),
                'type' => 'textarea',
                'default' => isset($data->YBC_VERIFICATION_EMAIL) ?  (string)$data->YBC_VERIFICATION_EMAIL : '',                
                'lang' => true,
                'autoload_rte' => true,   
                'desc' => $this->l('Availabe shortcodes: [verification_url]'),             
            ),
            'YBC_CONFIRMATION' => array(
                'label' => $this->l('Send a confirmation email after subscription'),
                'type' => 'switch',
                'default' => 1,
                'validate' => 'isUnsignedInt',  
            ),
            'YBC_CONFIRMATION_EMAIL' => array(
                'label' => $this->l('Confirmation email'),
                'type' => 'textarea',
                'default' => isset($data->YBC_CONFIRMATION_EMAIL) ?  (string)$data->YBC_CONFIRMATION_EMAIL : '',                
                'lang' => true,
                'autoload_rte' => true,   
                'desc' => $this->l('Availabe shortcodes: [unsubscribe_url]'),             
            ),      
            /*social*/
            'BLOCKSOCIAL_FACEBOOK' => array(                
                'label' => $this->l('Facebook URL'),
                'type' => 'text',
                'desc' => $this->l('Your Facebook fan page.'),  
                'default' => '',                       
            ),
            'BLOCKSOCIAL_TWITTER' => array(                
                'label' => $this->l('Twitter URL'),
                'type' => 'text',
                'desc' => $this->l('Your official Twitter account.'),
                'default' => '',                       
            ),
            'BLOCKSOCIAL_RSS' => array(                
                'label' => $this->l('RSS URL'),
                'type' => 'text',
                'desc' => $this->l('The RSS feed of your choice (your blog, your store, etc.).'),  
                'default' => '',                   
            ),
            'BLOCKSOCIAL_YOUTUBE' => array(                
                'label' => $this->l('YouTube URL'),
                'type' => 'text',
                'desc' => $this->l('Your official YouTube account.'), 
                'default' => '',                    
            ),
            'BLOCKSOCIAL_GOOGLE_PLUS' => array(                
                'label' => $this->l('Google+ URL:'),
                'type' => 'text',
                'desc' => $this->l('Your official Google+ page.'),   
                'default' => '',                  
            ),
            'BLOCKSOCIAL_PINTEREST' => array(                
                'label' => $this->l('Pinterest URL:'),
                'type' => 'text',
                'desc' => $this->l('Your official Pinterest account.'),  
                'default' => '',                       
            ),
            'BLOCKSOCIAL_VIMEO' => array(                
                'label' => $this->l('Vimeo URL:'),	
                'type' => 'text',
                'desc' => $this->l('Your official Vimeo account.'),	
                'default' => '',   	                     
            ),
            'BLOCKSOCIAL_INSTAGRAM' => array(                
                'label' => $this->l('Instagram URL:'),	
                'type' => 'text',
                'desc' => $this->l('Your official Instagram account.'),	   
                'default' => '',                       
            ),
            'BLOCKSOCIAL_LINKEDIN' => array(                
                'label' => $this->l('Lnkedin URL:'),	
                'type' => 'text',
                'desc' => $this->l('Your official linkedin account.'),	     
                'default' => '',                     
            ),
            // Misc
            'YBC_NEWSLETTER_PAGE' => array(
                'label' => $this->l('Display popup on those pages'),
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
                'default' => 'index',
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
        && $this->registerHook('displayFooter')
        && $this->registerHook('displayBackOfficeHeader')
        && $this->_installDb();        
    }
    /**
	 * @see Module::uninstall()
	 */
	public function uninstall()
	{
        $this->_uninstallDb();
        return parent::uninstall();
    }
    public function installTbls()
    {
        return Db::getInstance()->execute('
    		CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.$this->tableName.'` (
    			`id` int(6) NOT NULL AUTO_INCREMENT,
    			`id_shop` INTEGER UNSIGNED NOT NULL DEFAULT \'1\',
    			`id_shop_group` INTEGER UNSIGNED NOT NULL DEFAULT \'1\',
    			`email` varchar(255) NOT NULL,
    			`newsletter_date_add` DATETIME NULL,
    			`ip_registration_newsletter` varchar(15) NOT NULL,
    			`http_referer` VARCHAR(255) NULL,
    			`active` TINYINT(1) NOT NULL DEFAULT \'0\',
    			PRIMARY KEY(`id`)
    		) ENGINE='._MYSQL_ENGINE_.' default CHARSET=utf8');
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
                elseif(isset($config['default']) && Validate::isString((string)$config['default']) && trim((string)$config['default'])!='')
                    Configuration::updateValue($key, trim((string)$config['default']) ,true);
            }
        }
        if(file_exists(dirname(__FILE__).'/views/img/temp/ynpt6.jpg'))
            @copy(dirname(__FILE__).'/views/img/temp/ynpt6.jpg', dirname(__FILE__).'/views/img/config/ynpt6.jpg');
        if($languages)
        {
            foreach($languages as $lang)
            {
                if(!@file_exists(dirname(__FILE__).'/mails/'.$lang['iso_code']))
                    $this->recurse_copy(dirname(__FILE__).'/mails/en',dirname(__FILE__).'/mails/'.$lang['iso_code']);
            }
        }
        $this->installTbls();
        $this->loadTemplate('ynpt6');
        return true;
    }
    public function recurse_copy($src,$dst) { 
        if(!@file_exists($src))
            return false;
        $dir = opendir($src); 
        if(!@mkdir($dst))
            return false;
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) { 
                    $this->recurse_copy($src . '/' . $file,$dst . '/' . $file); 
                } 
                else { 
                    @copy($src . '/' . $file,$dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir); 
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
            $files = glob(dirname(__FILE__).'/views/img/'.$dir.'/*'); 
            foreach($files as $file){                
              if(is_file($file) &&  ($file!=dirname(__FILE__).'/views/img/'.$dir.'/index.php'))
                @unlink($file); 
            }
        }  
          
        return true;
    }    
    public function getContent()
	{
	   if($template = Tools::getValue('loadteamplate'))
       {        
            $this->loadTemplate($template);
            
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);            
       }
	   $this->_postConfig();       
       //Display errors if have
       if($this->errorMessage)
            $this->_html .= $this->errorMessage;       
       //Render views
       $this->renderConfig(); 
       $this->smarty->assign(array('YBC_NEWSLETTER_MODULE_PATH' => $this->_path));       
       return $this->_html.$this->display(__FILE__, 'javascript.tpl').$this->displayIframe();
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
					'title' => $this->l('Newsletter popup settings'),
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
                    'multiple' => isset($config['multiple']) && $config['multiple'],
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
                if($config['type'] == 'file')
                {
                    if($imageName = Configuration::get($key))
                    {
                        $confFields['display_img'] = $this->_path.'views/img/config/'.$imageName;
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
                                $fields[$key][$l['id_lang']] = Configuration::get($key,$l['id_lang']);
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
            'export_link' => $this->baseAdminPath.'&exportNewsletter=yes'            
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
                $imagePath = dirname(__FILE__).'/views/img/config/'.$imageName;
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
        //Export to csv
        if(Tools::isSubmit('exportNewsletter'))
        {
            $emails = $this->getBlockNewsletterSubscriber();            
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=mailing_list.csv');
            $out = fopen('php://output', 'w');
            fputcsv($out, array($this->l('Email'),$this->l('First name'),$this->l('Last name')));  
            if($emails)
            {
                  foreach($emails as $emai)
                    fputcsv($out, array((string)$emai['email'],(string)$emai['firstname'],(string)$emai['lastname']));  
            }              
			fclose($out);
            die;
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
                            elseif(!is_array(Tools::getValue($key)) && !Validate::isCleanHtml(trim(Tools::getValue($key))))
                            {
                                $errors[] = $config['label'].' '.$this->l('is invalid');
                            } 
                        }                          
                    }                    
                }
            }            
            
            //Custom validation
            if(!Validate::isInt(Tools::getValue('YBC_NEWSLETTER_POPUP_DELAY')))
                $errors[] = $this->l('Delay time is not valid');            
            if(!Validate::isColor(Tools::getValue('YBC_NEWSLETTER_POPUP_BUTTON_COLOR')))
                $errors[] = $this->l('Button color is not valid');  
            if(!Validate::isColor(Tools::getValue('YBC_NEWSLETTER_POPUP_BUTTON_HOVER_COLOR')))
                $errors[] = $this->l('Button hovering color is not valid');   
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
                                    $fileName = dirname(__FILE__).'/views/img/config/'.$imageName;                
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
                                                    $oldImage = dirname(__FILE__).'/views/img/config/'.Configuration::get($key);
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
                            //Custom CSS
                            if($css = Tools::getValue('YBC_NEWSLETTER_CUSTOM_CSS'))
                            {
                                @file_put_contents(dirname(__FILE__).'/views/css/custom.css',$css);
                            }
                            elseif(file_exists(dirname(__FILE__).'/views/css/custom.css'))
                                @unlink(dirname(__FILE__).'/views/css/custom.css');                                 
                        }                        
                    }
                }
            }
            if (count($errors))
            {
               $this->errorMessage = $this->displayError($errors);  
            }
            else
               Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);            
        }
     }
     public function hookDisplayFooter()
     {
          if(!$this->accessable)
                return;            
          $image = Configuration::get('YBC_NEWSLETTER_IMAGE') ? $this->_path.'views/img/config/'.Configuration::get('YBC_NEWSLETTER_IMAGE') : '';           
          $logo = Configuration::get('YBC_NEWSLETTER_LOGO') ? $this->_path.'views/img/config/'.Configuration::get('YBC_NEWSLETTER_LOGO') : '';
          $this->smarty->assign(array(
            'YBC_NEWSLETTER_POPUP_CONTENT' => Configuration::get('YBC_NEWSLETTER_POPUP_CONTENT', (int)$this->context->language->id),          
            'YBC_NEWSLETTER_IMAGE' => $image,            
            'YBC_NEWSLETTER_LOGO' => $logo,
            'YBC_NEWSLETTER_ACTION' => $this->context->link->getModuleLink('ybc_newsletter', 'submit'),
            'YBC_NEWSLETTER_LOADING_IMG' => $this->_path.'/views/img/icon/loading.gif',
            'YBC_NEWSLETTER_TPL' => _PS_MODULE_DIR_.'ybc_newsletter/views/templates',
            'YBC_NEWSLETTER_MOBILE_HIDE' => (int)Configuration::get('YBC_NEWSLETTER_MOBILE_HIDE') ? true : false,
            'YBC_NEWSLETTER_AUTO_HIDE' => (int)Configuration::get('YBC_NEWSLETTER_AUTO_HIDE') ? true : false,
            'YBC_NEWSLETTER_TEMPLATE' => Configuration::get('YBC_NEWSLETTER_TEMPLATE'),
            'YBC_NEWSLETTER_POPUP_TITLE' => Configuration::get('YBC_NEWSLETTER_POPUP_TITLE', $this->context->language->id),
            'YBC_NEWSLETTER_POPUP_SUBTITLE' => Configuration::get('YBC_NEWSLETTER_POPUP_SUBTITLE', $this->context->language->id),
            'YBC_NEWSLETTER_POPUP_DELAY' => Configuration::get('YBC_NEWSLETTER_POPUP_DELAY'),
            'YBC_NEWSLETTER_POPUP_TYPE_SHOW' => Configuration::get('YBC_NEWSLETTER_POPUP_TYPE_SHOW'),            
            'YBC_NEWSLETTER_fb_url' => Configuration::get('BLOCKSOCIAL_FACEBOOK'),
			'YBC_NEWSLETTER_tw_url' => Configuration::get('BLOCKSOCIAL_TWITTER'),
			'YBC_NEWSLETTER_rss_url' => Configuration::get('BLOCKSOCIAL_RSS'),
			'YBC_NEWSLETTER_youtb_url' => Configuration::get('BLOCKSOCIAL_YOUTUBE'),
			'YBC_NEWSLETTER_gg_url' => Configuration::get('BLOCKSOCIAL_GOOGLE_PLUS'),
			'YBC_NEWSLETTER_pin_url' => Configuration::get('BLOCKSOCIAL_PINTEREST'),
			'YBC_NEWSLETTER_vimeo_url' => Configuration::get('BLOCKSOCIAL_VIMEO'),
			'YBC_NEWSLETTER_in_url' => Configuration::get('BLOCKSOCIAL_INSTAGRAM'),
            'YBC_NEWSLETTER_li_url' => Configuration::get('BLOCKSOCIAL_LINKEDIN'),
            'YBC_NEWSLETTER_CLOSE_PERMANAL' => Configuration::get('YBC_NEWSLETTER_CLOSE_PERMANAL'),          
          ));
          return $this->display(__FILE__, 'popup.tpl');
     }
     public function hookDisplayHeader()
     {
        if(!isset($this->context->cookie->ybc_popup_start) || (isset($this->context->cookie->ybc_popup_start) && !$this->context->cookie->ybc_popup_start))
        {
            $this->context->cookie->ybc_popup_start = time();
            $this->context->cookie->write();   
        }
        if(!($this->accessable = $this->checkAccess()))
            return;
        if(file_exists(dirname(__FILE__).'/views/css/custom.css'))
            $this->context->controller->addCSS($this->_path.'views/css/custom.css','all');   
        $this->context->controller->addCSS($this->_path.'views/css/newsletter.css','all');   
        $this->context->controller->addJS($this->_path.'views/js/newsletter.js');
        return $this->renderCustomCss();
     }
     public function getBlockNewsletterSubscriber()
	 {
		$rq_sql = 'SELECT CONVERT(n.`email`, CHAR CHARACTER SET utf8) as email, c.firstname,c.lastname
			FROM `'._DB_PREFIX_.$this->tableName.'` n
            LEFT JOIN  `'._DB_PREFIX_.'customer` c ON n.email=c.email COLLATE utf8_unicode_ci
			WHERE n.`active` = 1
            UNION 
            SELECT CONVERT(`email`, CHAR CHARACTER SET utf8),`firstname`,`lastname`
            FROM `'._DB_PREFIX_.'customer`
			WHERE `newsletter` = 1            
            ';        
		if (Context::getContext()->cookie->shopContext)
			$rq_sql .= ' AND `id_shop` = '.(int)Context::getContext()->shop->id;       
		$rq = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($rq_sql);
		return $rq;
    }
    public function loadTemplate($template)
    {
        $templates = $this->templates;
        if(isset($templates[$template]))
        {
            $languages = Language::getLanguages(false);
            foreach($templates[$template] as $key => $value)
            {
                if($key=='YBC_NEWSLETTER_POPUP_CONTENT' || $key=='YBC_NEWSLETTER_POPUP_TITLE' || $key=='YBC_NEWSLETTER_POPUP_SUBTITLE')
                {
                   $values = array();
                   foreach($languages as $lang)
                   {
                        $values[$lang['id_lang']] = $value;
                   } 
                   Configuration::updateValue($key, $values, true); 
                }
                elseif(($key == 'YBC_NEWSLETTER_IMAGE' || $key == 'YBC_NEWSLETTER_LOGO') && file_exists(dirname(__FILE__).'/views/img/temp/'.$value))
                {                    
                    if(@copy(dirname(__FILE__).'/views/img/temp/'.$value, dirname(__FILE__).'/views/img/config/'.$value))
                        Configuration::updateValue($key, $value);   
                }
                else
                    Configuration::updateValue($key, $value);   
            }                      
            Configuration::updateValue('YBC_NEWSLETTER_TEMPLATE',$template);
            return true;   
        }
        return false;
    }
    private function renderCustomCss()
    {            
        $color_button = Configuration::get('YBC_NEWSLETTER_POPUP_BUTTON_COLOR');
        $color_hover = Configuration::get('YBC_NEWSLETTER_POPUP_BUTTON_HOVER_COLOR');
        $template = Configuration::get('YBC_NEWSLETTER_TEMPLATE');  
        $image = Configuration::get('YBC_NEWSLETTER_IMAGE') ? $this->_path.'img/config/'.Configuration::get('YBC_NEWSLETTER_IMAGE') : false;
        $this->smarty->assign(array(
            'color_button' => $color_button,
            'color_hover' => $color_hover,
            'image' => $image,
            'template' => $template,
        ));
        return $this->display(__FILE__, 'css.tpl');
    }
    public function checkAccess()
    {
        if(!Configuration::get('YBC_NEWSLETTER_DISPLAY_POPUP') || isset($this->context->cookie->ybc_subscribed) && $this->context->cookie->ybc_subscribed=='subscribed' || (int)$this->context->customer->id && (int)Configuration::get('YBC_NEWSLETTER_HIDE_IF_LOGGED_IN'))
            return false;        
        if(!($pages = explode(',',Tools::strtolower(Configuration::get('YBC_NEWSLETTER_PAGE')))) || !isset($this->context->controller->php_self))
            return false;           
        if(in_array('all',$pages) || in_array(Tools::strtolower($this->context->controller->php_self),$pages) || (!in_array(Tools::strtolower($this->context->controller->php_self),array('index','category','product','cms')) && in_array('other',$pages)))
        {   
            $displayIn = Configuration::get('YBC_NEWSLETTER_TIME_IN');
            if($displayIn == '')
            {
                return (int)$this->context->cookie->ybc_notshowagain ? false : true;
            }
            $displayIn = (float)$displayIn;
            if(!$displayIn)             
            {
                return false;
            }
            if($displayIn && isset($this->context->cookie->ybc_popup_start) && ($pastIn = (float)$this->context->cookie->ybc_popup_start) && ($currentTime = time()) && ($currentTime-$pastIn >= $displayIn * 60))
            { 
                    if(($displayAfter = (float)Configuration::get('YBC_NEWSLETTER_TIME_AGAIN')) > 0 && ($currentTime-$pastIn-$displayIn*60-$displayAfter*60 >= 0))
                    {              
                        $this->context->cookie->ybc_popup_start = $currentTime;
                        $this->context->cookie->write(); 
                    }
                    else
                        return false;
            }
            if((int)Configuration::get('YBC_NEWSLETTER_AUTO_HIDE') && $displayIn > 0)
            {
                $startTime = time()-60*$displayIn;
                $this->context->cookie->ybc_popup_start = $startTime;
                $this->context->cookie->write();
            }  
            return true;  
        }            
        return false;
    }
    public function hookDisplayBackOfficeHeader()
    {
        if(Tools::isSubmit('configure') && Tools::strtolower(Tools::getValue('configure'))=='ybc_newsletter')
            $this->context->controller->addCSS($this->_path.'views/css/ybc_newsletter.admin.css','all');
    }
}