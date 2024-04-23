<?php
/**
* 2007-2017 ETS-Soft
*  @author    ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright 2007-2017 ETS-Soft
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  @version  Release: $Revision$
*  International Registered Trademark & Property of ETS-Soft
*/

if (!defined('_PS_VERSION_'))
	exit;
if(!class_exists('ybc_themeconfig') && @file_exists(dirname(__FILE__).'/../ybc_themeconfig/ybc_themeconfig.php'))
    require_once(dirname(__FILE__).'/../ybc_themeconfig/ybc_themeconfig.php');
require_once(dirname(__FILE__).'/classes/MM_Obj.php');
require_once(dirname(__FILE__).'/classes/MM_Menu.php');
require_once(dirname(__FILE__).'/classes/MM_Column.php');
require_once(dirname(__FILE__).'/classes/MM_Block.php');
require_once(dirname(__FILE__).'/classes/MM_Config.php');
require_once(dirname(__FILE__).'/classes/MM_Cache.php');
class Ets_megamenu extends Module
{    
    private $_html;   
    public $alerts;
    public static $menus; 
    public static $columns;
    public static $blocks;
    public static $trans;    
    public static $configs;
    public $is17 = false;
    public $multiLayout = false;
    public $googlefonts = array();
    public function __construct()
	{
		$this->name = 'ets_megamenu';
		$this->tab = 'front_office_features';
		$this->version = '1.0.1';
		$this->author = 'YBC-Theme';
        $this->module_key = 'be9f54484806a4f886bf7e45aefed605';
		$this->need_instance = 0;
		$this->secure_key = Tools::encrypt($this->name);        
		$this->bootstrap = true;
		parent::__construct();
        $this->displayName = $this->l('Mega Menu PRO');
		$this->description = $this->l('Visual drag and drop mega menu builder');
		$this->ps_versions_compliancy = array('min' => '1.6.0.0', 'max' => _PS_VERSION_);
        $this->translates();
        $this->multiLayout = $this->multiLayoutExist();
        if(version_compare(_PS_VERSION_, '1.7', '>='))
            $this->is17 = true; 
        $this->googlefonts = json_decode(Tools::file_get_contents(dirname(__FILE__).'/data/google-fonts.json'),true);
        if(!$this->googlefonts)
        {
            $this->googlefonts = array(
                array(
                    'id_option' => 'inherit',
                    'name' => $this->l('THEME DEFAULT FONT'),
                ),
                array(
                    'id_option' => 'Arial',
                    'name' => 'Arial',
                ),
                array(
                    'id_option' => 'Times new roman',
                    'name' => 'Times new roman',
                ),
            );
        }     
        self::$menus = array(
            'form' => array(
				'legend' => array(
					'title' => (int)Tools::getValue('itemId') ? $this->l('Edit menu') : $this->l('Add menu'),				
				),
				'input' => array(),
                'submit' => array(
					'title' => $this->l('Save'),
				),
                'name' => 'menu',
                'connect_to' => 'column',
            ),
            'configs' => array(                  
                'link_type' => array(
					'type' => 'select',
					'label' => $this->l('Menu link type'),
					'name' => 'menu_type',                   
                    'class' => 'ybc_menu_type',
					'options' => array(
            			 'query' => array( 
                                array(
                                    'id_option' => 'CUSTOM', 
                                    'name' => $this->l('Custom link')
                                ),
                                array(
                                    'id_option' => 'CMS', 
                                    'name' => $this->l('CMS page')
                                ),
                                array(
                                    'id_option' => 'CONTACT', 
                                    'name' => $this->l('Contact')
                                ),                               
                                array(
                                    'id_option' => 'CATEGORY', 
                                    'name' => $this->l('Category')
                                ),
                                array(
                                    'id_option' => 'MNFT', 
                                    'name' => $this->l('Manufacturer')
                                ),
                                array(
                                    'id_option' => 'HOME', 
                                    'name' => $this->l('Home')
                                )                                    
                            ),                             
                         'id' => 'id_option',
            			 'name' => 'name'  
                    ),
                    'default' => 'CUSTOM',                
				),
                'title' => array(
                    'label' => $this->l('Title'),
                    'type' => 'text',                    
                    'required' => true,      
                    'lang' => true,                   
                ),                        
                'link' => array(
                    'label' => $this->l('Custom link'),
                    'type' => 'text',     
                    'lang' => true,          
                ), 
                'id_manufacturer' => array(
                    'label' => $this->l('Manufacturer'),
                    'type' => 'radio',
                    'values' => $this->getManufacturers(),
                ),  
                'id_category' => array(
					'type'  => 'categories',                    
					'label' => $this->l('Category'),
					'name'  => 'id_parent',                        
					'tree'  => array(
						'id'      => 'categories-tree',
						'selected_categories' => array(),
						'disabled_categories' => array(),                            
                        'use_search' => true,
                        'root_category' => (int)Configuration::get('PS_ROOT_CATEGORY'),
					),                  
				),   
                'id_cms' => array(
                    'label' => $this->l('CMS page'),
                    'type' => 'radio',
                    'values' => $this->getCMSs(),
                ),     
                'sub_menu_type' => array(
					'type' => 'select',
					'label' => $this->l('Submenu alignment').($this->multiLayout ? ' '.$this->l('(LTR layout)') : ''),
					'name' => 'menu_type',                   
                    'class' => 'ybc_menu_type',
					'options' => array(
            			 'query' => array( 
                                array(
                                    'id_option' => 'FULL', 
                                    'name' => $this->l('Full')
                                ),
                                array(
                                    'id_option' => 'LEFT', 
                                    'name' => $this->l('Left')
                                ),
                                array(
                                    'id_option' => 'RIGHT', 
                                    'name' => $this->l('Right')
                                ),                                    
                            ),                             
                         'id' => 'id_option',
            			 'name' => 'name'  
                    ),
                    'default' => 'FULL',
                    'desc' => $this->multiLayout ? $this->l('Submenu alignment is reversed on RTL layout automatically') : '',                
				),             
                'sub_menu_max_width' => array(
                    'label' => $this->l('Sub menu width'),
                    'type' => 'text', 
                    'required' => true,   
                    'default' => 100,     
                    'suffix' => $this->l('%'),  
                    'validate' => 'isUnsignedInt',      
                    'desc' => $this->l('From 10 to 100'),                    
                ),  
                'custom_class' => array(
                    'label' => $this->l('Custom class'),
                    'type' => 'text',                                                       
                ), 
                'bubble_text' => array(
                    'label' => $this->l('Bubble alert text'),
                    'type' => 'text', 
                    'lang' => true,              
                    'desc' => $this->l('New, Sale, Hot... Leave blank if you do not want to have a bubble alert for this menu')                                        
                ), 
                'bubble_text_color' => array(
                    'label' => $this->l('Bubble alert text color'),
                    'type' => 'color',   
                    'default' => '#ffffff',
                    'validate' => 'isColor',                                                    
                ),               
                'bubble_background_color' => array(
                    'label' => $this->l('Bubble alert background color'),
                    'type' => 'color',  
                    'default' => '#FC4444',
                    'validate' => 'isColor',                                                    
                ),
                'sort_order' => array(
                    'label' => $this->l('Sort order'),
                    'type' => 'sort_order', 
                    'required' => true,   
                    'default' => 1,     
                    'order_group' => false,                          
                ), 
                'enabled' => array(
                    'label' => $this->l('Enabled'),
                    'type' => 'switch',                
                    'default' => 1, 
                    'values' => array(
                        array(
                            'label' => $this->l('Yes'),
                            'id' => 'menu_enabled_1',
                            'value' => 1,
                        ),
                        array(
                            'label' => $this->l('No'),
                            'id' => 'menu_enabled_0',
                            'value' => 0,
                        )
                    ),                  
                ),     
            ),            
        ); 
        self::$columns = array(
            'form' => array(
				'legend' => array(
					'title' => (int)Tools::getValue('itemId') ? $this->l('Edit column') : $this->l('Add column'),				
				),
				'input' => array(),
                'submit' => array(
					'title' => $this->l('Save'),
				),
                'name' => 'column',
                'connect_to' => 'block',
                'parent' => 'menu',
            ),
            'configs' => array(
                'column_size' => array(
					'type' => 'select',
					'label' => $this->l('Column width size'),
					'name' => 'menu_type',  
					'options' => array(
            			 'query' => $this->getColumnSizes(),                             
                         'id' => 'id_option',
            			 'name' => 'name'  
                    ),
                    'default' => 'CUSTOM',                
				),    
                'is_breaker' => array(
                    'label' => $this->l('Break'),
                    'type' => 'switch',                
                    'default' => 0, 
                    'values' => array(
                        array(
                            'label' => $this->l('Yes'),
                            'id' => 'menu_enabled_1',
                            'value' => 1,
                        ),
                        array(
                            'label' => $this->l('No'),
                            'id' => 'menu_enabled_0',
                            'value' => 0,
                        )
                    ),  
                    'desc' => $this->l('Break from this column to new line'),                
                ),                         
                'id_menu' => array(
                    'label' => $this->l('Menu'),
                    'type' => 'hidden',     
                    'default' => ($id_menu = (int)Tools::isSubmit('id_menu')) ? $id_menu : 0,
                    'required' => true,   
                ),                
                'sort_order' => array(
                    'label' => $this->l('Sort order'),
                    'type' => 'sort_order', 
                    'required' => true,   
                    'default' => 1,   
                    'order_group' => 'id_menu',                              
                ),      
            ),            
        ); 
        self::$blocks = array(
            'form' => array(
				'legend' => array(
					'title' => (int)Tools::getValue('itemId') ? $this->l('Edit block') : $this->l('Add block'),				
				),
				'input' => array(),
                'submit' => array(
					'title' => $this->l('Save'),
				),
                'name' => 'block',
                'parent' => 'column',
            ),
            'configs' => array(
                'block_type' => array(
					'type' => 'select',
					'label' => $this->l('Block type'),					
					'options' => array(
            			 'query' => array( 
                                array(
                                    'id_option' => 'HTML', 
                                    'name' => $this->l('Text/Html')
                                ),
                                array(
                                    'id_option' => 'IMAGE', 
                                    'name' => $this->l('Image')
                                ),
                                array(
                                    'id_option' => 'CATEGORY', 
                                    'name' => $this->l('Category')
                                ),
                                array(
                                    'id_option' => 'CMS', 
                                    'name' => $this->l('CMS page')
                                ),
                                array(
                                    'id_option' => 'MNFT', 
                                    'name' => $this->l('Manufacturer')
                                ), 
                                array(
                                    'id_option' => 'PRODUCT', 
                                    'name' => $this->l('Products')
                                ),                                                                 
                            ),                             
                         'id' => 'id_option',
            			 'name' => 'name'  
                    ),
                    'default' => 'HTML',                
				),
                'title' => array(
                    'label' => $this->l('Title'),
                    'type' => 'text',                    
                    'required' => true,      
                    'lang' => true,                   
                ),
                'id_column' => array(
                    'label' => $this->l('Column'),
                    'type' => 'hidden',     
                    'default' => ($id_column = (int)Tools::isSubmit('id_column')) ? $id_column : 0,
                    'required' => true,   
                ),
                'title_link' => array(
                    'label' => $this->l('Title link'),
                    'type' => 'text',     
                    'lang' => true,   
                    'desc' => $this->l('Leave blank if you do not want to add a link to block title'),       
                ),                   
                'id_manufacturers' => array(
                    'label' => $this->l('Manufacturers'),
                    'type' => 'checkbox',
                    'values' => array(
                         'query' => $this->getManufacturers(), 
                         'id' => 'id',
			             'name' => 'label'                                                               
                    ),                   
                ),  
                'id_categories' => array(
					'type'  => 'categories',                    
					'label' => $this->l('Categories'),
					'name'  => 'id_parent',                        
					'tree'  => array(
						'id'      => 'categories-tree',
						'selected_categories' => array(),
						'disabled_categories' => array(), 
                        'use_checkbox' => true,                           
                        'use_search' => true,
                        'root_category' => 2
					),                    
				),   
                'id_cmss' => array(
                    'label' => $this->l('CMS pages'),
                    'type' => 'checkbox',
                    'values' => array(
                         'query' => $this->getCMSs(), 
                         'id' => 'id',
			             'name' => 'label'                                                               
                    ),  
                ), 
                'content' => array(
                    'label' => $this->l('HTML/Text content'),
                    'type' => 'textarea', 
                    'lang' => true,                   
                ),  
                'image' => array(
                    'label' => $this->l('Image'),
                    'type' => 'file',  
                    'hide_delete' => true,
                ),    
                'image_link' => array(
                    'label' => $this->l('Image link'),
                    'type' => 'text',     
                    'lang' => true,   
                    'desc' => $this->l('Leave blank if you do not want to add a link to image'),       
                ),  
                'id_products' => array(
                    'label' => $this->l('Products'),
                    'type' => 'text', 
                    'desc' => $this->l('Enter product IDs separated bya comma (,)'),       
                ),       
                'sort_order' => array(
                    'label' => $this->l('Sort order'),
                    'type' => 'sort_order', 
                    'required' => true,   
                    'default' => 1,   
                    'order_group' => 'id_column',                             
                ), 
                'display_title' => array(
                    'label' => $this->l('Display title'),
                    'type' => 'switch',                
                    'default' => 1, 
                    'values' => array(
                        array(
                            'label' => $this->l('Yes'),
                            'id' => 'menu_enabled_1',
                            'value' => 1,
                        ),
                        array(
                            'label' => $this->l('No'),
                            'id' => 'menu_enabled_0',
                            'value' => 0,
                        )
                    ),                  
                ),    
                'enabled' => array(
                    'label' => $this->l('Enabled'),
                    'type' => 'switch',                
                    'default' => 1, 
                    'values' => array(
                        array(
                            'label' => $this->l('Yes'),
                            'id' => 'menu_enabled_1',
                            'value' => 1,
                        ),
                        array(
                            'label' => $this->l('No'),
                            'id' => 'menu_enabled_0',
                            'value' => 0,
                        )
                    ),                  
                ),     
            ),            
        );
        self::$configs = array(
            'form' => array(
				'legend' => array(
					'title' => $this->l('Configuration'),
                    'icon' => 'icon-AdminAdmin'				
				),
				'input' => array(),
                'submit' => array(
					'title' => $this->l('Save'),
				),
                'name' => 'config'
            ),
            'configs' => array(
                    'ETS_MM_LAYOUT' => array(
						'type' => 'select',
						'label' => $this->l('Layout type'),						                                               
						'options' => array(
                			 'query' => array( 
                                    array(
                                        'id_option' => 'layout1', 
                                        'name' => $this->l('Layout 1')
                                    ),
                                    array(
                                        'id_option' => 'layout2', 
                                        'name' => $this->l('Layout 2')
                                    ),
                                    array(
                                        'id_option' => 'layout3', 
                                        'name' => $this->l('Layout 3')
                                    ),
                                    array(
                                        'id_option' => 'layout4', 
                                        'name' => $this->l('Layout 4')
                                    ),
                                    array(
                                        'id_option' => 'layout5', 
                                        'name' => $this->l('Layout 5')
                                    ),                                    
                                ),                             
                             'id' => 'id_option',
                			 'name' => 'name'  
                        ),
                        'default' => $this->is17 ? 'layout5' : 'layout1',                
					), 
                    'ETS_MM_HOOK_TO' => array(
						'type' => 'select',
						'label' => $this->l('Hook to'),						                                               
						'options' => array(
                			 'query' => array( 
                                    array(
                                        'id_option' => 'default', 
                                        'name' => $this->l('Default hook')
                                    ),
                                    array(
                                        'id_option' => 'customhook', 
                                        'name' => $this->l('Custom hook')
                                    ),                                   
                                ),                             
                             'id' => 'id_option',
                			 'name' => 'name',                             
                        ),
                        'default' => 'default', 
                        'desc' => $this->l('Put {hook h=\'displayMegaMenu\'} on tpl file where you want to display the megamenu'),                 
					),
                    'ETS_MM_TRANSITION_EFFECT' => array(
						'type' => 'select',
						'label' => $this->l('Submenu transition effect'),						                                      
						'options' => array(
                			 'query' => array( 
                                    array(
                                        'id_option' => 'fade', 
                                        'name' => $this->l('Default')
                                    ),
                                    array(
                                        'id_option' => 'slide', 
                                        'name' => $this->l('Slide down')
                                    ),
                                    array(
                                        'id_option' => 'scale_down', 
                                        'name' => $this->l('Scale down')
                                    ),
                                    array(
                                        'id_option' => 'fadeInUp', 
                                        'name' => $this->l('Fade in up')
                                    ),
                                    array(
                                        'id_option' => 'zoom', 
                                        'name' => $this->l('Zoom In')
                                    )                                    
                                ),                             
                             'id' => 'id_option',
                			 'name' => 'name'  
                        ),
                        'default' => 'fade',          
					),
                    'ETS_MM_DIR' => array(
						'type' => 'select',
						'label' => $this->l('Direction mode'),					                                           
						'options' => array(
                			 'query' => array( 
                                    array(
                                        'id_option' => 'auto', 
                                        'name' => $this->l('Auto detect LTR or RTL')
                                    ),
                                    array(
                                        'id_option' => 'ltr', 
                                        'name' => $this->l('LTR')
                                    ),
                                    array(
                                        'id_option' => 'rtl', 
                                        'name' => $this->l('RTL')
                                    ),                                    
                                ),                             
                             'id' => 'id_option',
                			 'name' => 'name'  
                        ),
                        'default' => 'auto',                     
					),
                    'ETS_MOBILE_MM_TYPE' => array(
						'type' => 'select',
						'label' => $this->l('Mobile menu type'),					                                      
						'options' => array(
                			 'query' => array(                                     
                                    array(
                                        'id_option' => 'floating', 
                                        'name' => $this->l('Floating')
                                    ),
                                    array(
                                        'id_option' => 'default', 
                                        'name' => $this->l('Bottom')
                                    ),
                                    array(
                                        'id_option' => 'full', 
                                        'name' => $this->l('Full screen')
                                    ),                                    
                                ),                             
                             'id' => 'id_option',
                			 'name' => 'name'  
                        ),
                        'default' => 'floating',                
					),
                    'ETS_MM_INCLUDE_SUB_CATEGORIES' => array(
						'type' => 'switch',
						'label' => $this->l('Include sub-categories'),						
                        'is_bool' => true,
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
                        'default' => 1,					
					), 
                    'ETS_MM_STICKY_ENABLED' => array(
						'type' => 'switch',
						'label' => $this->l('Enable Sticky menu'),						
                        'is_bool' => true,
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
                        'default' => 1,					
					),
                    'ETS_MM_ACTIVE_ENABLED' => array(
						'type' => 'switch',
						'label' => $this->l('Display active menu item'),					
                        'is_bool' => true,
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
                        'default' => 0,					
					),         
                    'ETS_MM_CACHE_ENABLED' => array(
						'type' => 'switch',
						'label' => $this->l('Enable cache'),					
                        'is_bool' => true,
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
                        'default' => 0,					
					),  
                    'ETS_MM_CACHE_LIFE_TIME' => array(
						'type' => 'text',
						'label' => $this->l('Cache lifetime'),
                        'default' => 24,
                        'suffix' => $this->l('Hours'),
                        'validate' => 'isUnsignedInt',					                      
					),                   
                    'ETS_MM_SKIN' => array(
						'type' => 'select',
						'label' => $this->l('Color skin'),						                                              
						'options' => array(
                			 'query' => array( 
                                    array(
                                        'id_option' => 'default', 
                                        'name' => $this->l('Default'),
                                        'colors' => array('#484848','#ec4249','#3cabdb','#50b4df','#333333','#000000','#FF0000','#222222','#ffffff'),
                                    ),
                                    array(
                                        'id_option' => 'black', 
                                        'name' => $this->l('Black'),
                                        'colors' => array('#222222','#000000','#333333','#000000','#222222','#000000','#FF0000','#222222','#ffffff'),
                                    ),
                                    array(
                                        'id_option' => 'pink', 
                                        'name' => $this->l('Pink'),
                                        'colors' => array('#FF6C8D','#FF6C8D','#FF6C8D','#F05D7E','#FF6C8D','#F05D7E','#FF6C8D','#FF6C8D','#ffffff'),
                                    ),  
                                    array(
                                        'id_option' => 'red', 
                                        'name' => $this->l('Red'),
                                        'colors' => array('#EC4249','#EC4249','#EC4249','#D92F36','#EC4249','#D92F36','#EC4249','#EC4249','#ffffff'),
                                    ),
                                    array(
                                        'id_option' => 'green', 
                                        'name' => $this->l('Green'),
                                        'colors' => array('#50BE07','#50BE07','#50BE07','#40AE00','#50BE07','#40AE00','#50BE07','#50BE07','#ffffff'),
                                    ), 
                                    array(
                                        'id_option' => 'orange', 
                                        'name' => $this->l('Orange'),
                                        'colors' => array('#F39C11','#F39C11','#F39C11','#DE8700','#F39C11','#DE8700','#F39C11','#F39C11','#ffffff'),
                                    ),
                                    array(
                                        'id_option' => 'blue', 
                                        'name' => $this->l('Blue'),
                                        'colors' => array('#28ABE3','#28ABE3','#28ABE3','#1FA2D7','#28ABE3','#1FA2D7','#28ABE3','#28ABE3','#ffffff'),
                                    ),         
                                    array(
                                        'id_option' => 'custom', 
                                        'name' => $this->l('Custom color'),
                                        
                                    ),                               
                                ),                             
                             'id' => 'id_option',
                			 'name' => 'name'  
                        ),
                        'default' => 'default',                
					),
                    'ETS_MM_HEADING_FONT' => array(
                        'label' => $this->l('Heading font (font1)'),
                        'type' => 'select', 
    					'options' => array(
                			 'query' => $this->googlefonts,                             
                             'id' => 'id_option',
                			 'name' => 'name'  
                        ),   
                        'desc' => $this->l('Use default font of your theme or select a Google font from the list'),
                        'default' => 'inherit',                                                  
                    ), 
                    'ETS_MM_TEXT_FONT' => array(
                        'label' => $this->l('General text font (font2)'),
                        'type' => 'select', 
    					'options' => array(
                			 'query' => $this->googlefonts,                             
                             'id' => 'id_option',
                			 'name' => 'name'  
                        ),   
                        'desc' => $this->l('Use default font of your theme or select a Google font from the list'),
                        'default' => 'inherit',                                                  
                    ), 
                    'ETS_MM_COLOR1' => array(
						'type' => 'color',
						'label' => $this->l('Main color 1 (color1)'),
                        'validate' => 'isColor',
                        'default' =>  '#484848',						                       
					),
                    'ETS_MM_COLOR2' => array(
						'type' => 'color',
						'label' => $this->l('Main color 2 (color2)'),	
                        'validate' => 'isColor',
                        'default' =>  '#ec4249',					                      
					),
                    'ETS_MM_COLOR3' => array(
						'type' => 'color',
						'label' => $this->l('Main color 3 (color3)'),
                        'validate' => 'isColor',
                        'default' =>  '#3cabdb',					                   
					),
                    'ETS_MM_COLOR4' => array(
						'type' => 'color',
						'label' => $this->l('Text color 1 (color4)'),
                        'validate' => 'isColor',
                        'default' =>  '#50b4df',						                       
					),
                    'ETS_MM_COLOR5' => array(
						'type' => 'color',
						'label' => $this->l('Text color 2 (color5)'),
                        'validate' => 'isColor',
                        'default' =>  '#333333',						                       
					),   
                    'ETS_MM_COLOR6' => array(
						'type' => 'color',
						'label' => $this->l('Text color 3 (color6)'),
                        'validate' => 'isColor',
                        'default' =>  '#000000',						                       
					), 
                    'ETS_MM_COLOR7' => array(
						'type' => 'color',
						'label' => $this->l('Link hover color (color7)'),
                        'validate' => 'isColor',
                        'default' =>  '#ec4249',						                       
					), 
                    'ETS_MM_COLOR8' => array(
						'type' => 'color',
						'label' => $this->l('Background on mobile (color8)'),
                        'validate' => 'isColor',
                        'default' =>  '#222222',						                       
					), 
                    'ETS_MM_COLOR9' => array(
						'type' => 'color',
						'label' => $this->l('Text color on mobile (color9)'),
                        'validate' => 'isColor',
                        'default' =>  '#ffffff',						                       
					),                 
                    'ETS_MM_CUSTOM_CLASS' => array(
						'type' => 'text',
						'label' => $this->l('Custom class'),					                      
					),
                    'ETS_MM_CUSTOM_CSS' => array(
						'type' => 'textarea',
						'label' => $this->l('Custom CSS'),
                        'desc' => $this->l('Available CSS atribute codes:').' "color1", "color2", "color3", "color4", "color5", "color6", "color7", "color8", "color9", "font1", "font2"',					                      
					),
            )
        );                          
    }
    /**
	 * @see Module::install()
	 */
    public function install()
	{
	    $config = new MM_Config();
        $config->installConfigs();
        self::clearAllCache();
        self::clearUploadedImages();
        if($this->is17 && Module::isInstalled('ps_mainmenu'))
            Module::disableByName('ps_mainmenu');
        elseif(!$this->is17 && Module::isInstalled('blocktopmenu'))
            Module::disableByName('blocktopmenu');
        return parent::install()
	        && $this->registerHook('displayHeader')
	        && $this->registerHook('displayTop')
	        && $this->registerHook('displayBlock')
	        && $this->registerHook('displayBackOfficeHeader')
	        && $this->registerHook('displayMMItemMenu')
	        && $this->registerHook('displayMMItemColumn')
	        && $this->registerHook('displayMegaMenu')
	        && $this->registerHook('displayMMItemBlock')
        && $this->installDb();
    }
    /**
	 * @see Module::uninstall()
	 */
	public function uninstall()
	{
        self::clearAllCache();
        self::clearUploadedImages();
        $config = new MM_Config();        
        $config->unInstallConfigs();
        return parent::uninstall() && $this->uninstallDb();
    }
    public function getContent()
	{
	   $this->proccessPost();
       $this->requestForm();
       $this->context->controller->addJqueryUI('ui.sortable');   
       $this->_html .= $this->displayAdminJs();	      
       $this->_html .= $this->renderForm(); 
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
    public function renderForm()
    {
        $menu = new MM_Menu(); 
        $column = new MM_Column();
        $block = new MM_Block();
        $config = new MM_Config();
        $this->smarty->assign(array(
            'menuForm' => $menu->renderForm(),
            'columnForm' => $column->renderForm(),
            'blockForm' => $block->renderForm(),
            'configForm' => $config->renderForm(),
            'menus' => $this->getMenus(false),
            'mmBaseAdminUrl' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name,          
            'layoutDirection' => $this->layoutDirection(),
            'multiLayout' => $this->multiLayout,
            'mm_img_dir' => $this->_path.'views/img/',
            'mm_backend_layout' => $this->context->language->is_rtl ? 'rtl' : 'ltr',
        ));
        return $this->display(__FILE__,'admin-form.tpl');
    } 
    public function baseAdminUrl()
    {
        return $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name;
    }
    public function getColumnSizes()
    {
         $sizes = array();
         for($i = 3; $i<=12; $i++)
         {
            $sizes[] = array(
                'id_option' => $i,
                'name' => $i != 12 ? $i.'/12' : $this->l('12/12 (Full)'),
            );
         }
         return $sizes;
    }
    public function getMenus($activeOnly = true,$id_lang = false,$id_menu = false)
    {
        $where = '';
        if(class_exists('ybc_themeconfig') && isset($this->context->controller->controller_type) && $this->context->controller->controller_type=='front')
        {
            $tc = new Ybc_themeconfig();
            if($tc->devMode && ($ids = $tc->getLayoutConfiguredField('menus')))
            {
                $where = ' AND m.id_menu IN('.implode(',',$ids).') ';
            }
        }
        $menus = Db::getInstance()->executeS("
            SELECT m.*,ml.title,ml.link,ml.bubble_text
            FROM "._DB_PREFIX_."ets_mm_menu m
            LEFT JOIN "._DB_PREFIX_."ets_mm_menu_lang ml
            ON m.id_menu=ml.id_menu AND ml.id_lang=".((int)$id_lang ? (int)$id_lang : (int)$this->context->language->id)."
            WHERE 1 ".($activeOnly ? " AND m.enabled=1" : "").($id_menu ? " AND m.id_menu=".(int)$id_menu : "").$where." 
            ORDER BY m.sort_order asc,ml.title asc
        ");        
        if($menus)
            foreach($menus as &$menu)
            {
                $menu['columns'] = $this->getColumns($menu['id_menu']);
                $menu['menu_link'] = $this->getMenuLink($menu);
            }               
        return $id_menu && $menus ? $menus[0] : $menus;
    }
    public function getColumns($id_menu = false, $id_column = false, $id_lang = false)
    {
        $columns = Db::getInstance()->executeS("
            SELECT *
            FROM "._DB_PREFIX_."ets_mm_column
            WHERE 1 ".($id_menu ? " AND id_menu=".(int)$id_menu : "").($id_column ? " AND id_column=".(int)$id_column : "")."
            ORDER BY sort_order asc
        ");
        if($columns)
            foreach($columns as &$column)
                $column['blocks'] = $this->getBlocks($column['id_column'],false,$id_lang);
        return $id_column && $columns ? $columns[0] : $columns;
    }
    public function getBlocks($id_column = false,$activeOnly = true, $id_block = false,$id_lang = false)
    {
        $blocks = Db::getInstance()->executeS("
            SELECT b.*,bl.title,bl.title_link,bl.content,bl.image_link
            FROM "._DB_PREFIX_."ets_mm_block b
            LEFT JOIN "._DB_PREFIX_."ets_mm_block_lang bl
            ON b.id_block=bl.id_block AND bl.id_lang=".($id_lang ? $id_lang : (int)$this->context->language->id)."
            WHERE 1 ".($activeOnly ? "AND b.enabled=1 " : "").($id_column ? " AND b.id_column=".(int)$id_column." " : "").($id_block ? " AND b.id_block=".(int)$id_block : "")."
            ORDER BY b.sort_order asc,bl.title asc
        ");
        return $id_block && $blocks ? $blocks[0] : $blocks;
    }
    public function getBlockById($id_block)
    {
        return Db::getInstance()->getRow("
            SELECT b.*,bl.title,bl.title_link,bl.content,bl.image_link
            FROM "._DB_PREFIX_."ets_mm_block b
            LEFT JOIN "._DB_PREFIX_."ets_mm_block_lang bl
            ON b.id_block=bl.id_block AND bl.id_lang=".(int)$this->context->language->id."
            WHERE b.id_block=".(int)$id_block."
        ");
    }
    public function getManufacturers($orderBy = 'name asc', $addWhere = false)
    {
        return Db::getInstance()->executeS("
            SELECT id_manufacturer as value,CONCAT('mm_manufacturer_',id_manufacturer) as id, name as label
            FROM "._DB_PREFIX_."manufacturer            
            WHERE active=1 ".($addWhere ? pSQL($addWhere) : "")."
            ORDER BY ".($orderBy ? $orderBy : 'name asc')."
        ");
    }
    public function getCMSs($orderBy = 'cl.meta_title asc', $addWhere = false)
    {
        return Db::getInstance()->executeS("
            SELECT c.id_cms as value,CONCAT('mm_cms_',c.id_cms) as id, cl.meta_title as label            
            FROM "._DB_PREFIX_."cms c
            LEFT JOIN "._DB_PREFIX_."cms_lang cl ON c.id_cms=cl.id_cms AND cl.id_lang=".(int)$this->context->language->id."
            WHERE c.active=1 ".($addWhere ? pSQL($addWhere) : "")."
            ORDER BY ".($orderBy ? $orderBy : 'cl.meta_title asc')."
        ");
    }
    public function proccessPost()
    {
        $this->alerts = array();
        $time = time();
        if(Tools::isSubmit('mm_form_submitted') && ($mmObj = Tools::getValue('mm_object')) && in_array($mmObj,array('MM_Menu','MM_Column','MM_Block')))
        {
            $obj = ($itemId = (int)Tools::getValue('itemId')) && $itemId > 0 ? new $mmObj($itemId) : new $mmObj();
            $this->alerts = $obj->saveData(); 
            $vals = $obj->getFieldVals();      
            if($obj->id && $mmObj == 'MM_Block')
                $vals['blockHtml'] = $this->hookDisplayBlock(array('block' => $this->getBlockById($obj->id)));   
            die(json_encode(array(
                'alert' => $this->displayAlerts($time),
                'itemId' => (int)$obj->id,
                'title' => property_exists($obj,'title') && isset($obj->title[(int)$this->context->language->id]) ? $obj->title[(int)$this->context->language->id] : false,
                'images' => $obj->id && property_exists($obj,'image') && $obj->image ? array(array(
                    'name' => 'image',
                    'url' => $this->_path.'views/img/upload/'.$obj->image,
                    //'delete_url' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&deleteimage=image&itemId='.$obj->id.'&mm_object='.$mmObj,
                )) : false,
                'itemKey' => 'id_'.$obj->fields['form']['name'],
                'time' => $time,
                'id_menu' => ($id_menu = (int)Tools::getValue('id_menu')) ? $id_menu : false,
                'mm_object' => $mmObj, 
                'vals' => $vals,
                'success' => isset($this->alerts['success']) && $this->alerts['success'],
            )));      
        }
        if((Tools::getValue('deleteimage')) && ($mmObj = Tools::getValue('mm_object')) && in_array($mmObj,array('MM_Menu','MM_Column','MM_Block')) && ($itemId = (int)Tools::getValue('itemId')) && $itemId > 0)
        {
            $obj = new $mmObj($itemId);
            $this->alerts = $obj->clearImage('image');
            die(json_encode(array(
                'alert' => $this->displayAlerts($time),
                'itemId' => (int)$obj->id,  
                'itemKey' => 'image',              
                'time' => $time,
                'success' => isset($this->alerts['success']) && $this->alerts['success'],
            ))); 
        }
        if((Tools::getValue('deleteobject')) && ($mmObj = Tools::getValue('mm_object')) && in_array($mmObj,array('MM_Menu','MM_Column','MM_Block')) && ($itemId = (int)Tools::getValue('itemId')) && $itemId > 0)
        {
            $obj = new $mmObj($itemId);
            $this->alerts = $obj->deleteObj();
            die(json_encode(array(
                'alert' => $this->displayAlerts($time),                           
                'time' => $time,
                'itemId' => $itemId,
                'success' => isset($this->alerts['success']) && $this->alerts['success'],
                'successMsg' => isset($this->alerts['success']) && $this->alerts['success'] ? $this->l('Item deleted') : false,
            ))); 
        }
        if((Tools::getValue('duplicateItem')) && ($mmObj = 'MM_'.Tools::ucfirst(Tools::strtolower(Tools::getValue('mm_object')))) && in_array($mmObj,array('MM_Menu','MM_Column','MM_Block')) && ($itemId = (int)Tools::getValue('itemId')) && $itemId > 0)
        {
            $obj = new $mmObj($itemId);  
            if($newObj = $obj->duplicateItem())
            {
                switch($mmObj)
                {
                    case 'MM_Menu':
                        $menu = $this->getMenus(false,false,$newObj->id);
                        $html = $this->hookDisplayMMItemMenu(array('menu' => $menu));
                        break;
                    case 'MM_Column':
                        $column = $this->getColumns(false,$newObj->id);
                        $html = $this->hookDisplayMMItemColumn(array('column' => $column));
                        break;
                    case 'MM_Block':
                        $block = $this->getBlocks(false,false,$newObj->id);
                        $html = $this->hookDisplayMMItemBlock(array('block' => $block));
                        break;
                    default:
                        break;
                }
            }         
            die(json_encode(array(
                'alerts' => $newObj ? array('success' => $this->l('Item duplicated')) : array('errors' => $this->l('Can not duplcate item. An unknown problem happened')),                           
                'time' => $time,
                'itemId' => $itemId,
                'newItemId' => $newObj->id,
                'mm_object' => Tools::getValue('mm_object'),
                'html' => isset($html) ? $html : '',
            ))); 
        }
        if(Tools::isSubmit('mm_config_submitted'))
        {
            $config = new MM_Config();
            $this->alerts = $config->saveData();
            die(json_encode(array(
                'alert' => $this->displayAlerts($time),                           
                'time' => $time, 
                'layout_direction' => $this->layoutDirection(),               
                'success' => isset($this->alerts['success']) && $this->alerts['success'],
            ))); 
        }
        if(Tools::isSubmit('updateOrder'))
        {
            $itemId = (int)Tools::getValue('itemId');
            $objName = 'MM_'.Tools::ucfirst(Tools::strtolower(trim(Tools::getValue('obj'))));
            $parentId = (int)Tools::getValue('parentId') > 0 ? (int)Tools::getValue('parentId') : 0;
            $previousId = (int)Tools::getValue('previousId');
            $result = false;
            if(in_array($objName,array('MM_Menu','MM_Column','MM_Block')) && $itemId > 0)
            {
                $obj = new $objName($itemId);
                $result = $obj->updateOrder($previousId,$parentId);
            }
            die(json_encode(array(
                'success' => $result
            )));
        }
        if(Tools::isSubmit('clearMenuCache'))
        {
            $this->clearAllCache();
            die(json_encode(array(
                'success' => $this->l('Cache cleared'),
            )));                    
        }
        if(Tools::isSubmit('exportMenu'))
        {
            $this->generateArchive();
        }
        if(Tools::getValue('importMenu'))
        {
            $errors = $this->processImport();   
            die(json_encode(array(
                'success' => !$errors ? $this->l('Menu was successfully imported. This page will be reloaded in 3 seconds') : false, 
                'error' => $errors ? implode('; ',$errors) : false,
            )));         
        }
        if(Tools::isSubmit('reset_config'))
        {
            $configuration = new MM_Config();
            $configuration->installConfigs();
            die(json_encode(array(
                'success' => $this->l('Configuration was successfully reset. This page will be reloaded in 3 seconds'),
            )));
        }
    }
    public function requestForm()
    {
        if(Tools::isSubmit('request_form') && ($mmObj = Tools::getValue('mm_object')) && in_array($mmObj,array('MM_Menu','MM_Column','MM_Block')))
        {
            $obj = ($itemId = (int)Tools::getValue('itemId')) && $itemId > 0 ? new $mmObj($itemId) : new $mmObj();
            die(json_encode(array(
                'form' => $obj->renderForm(),
                'itemId' => $itemId,
            )));
        }
    }
    public function displayAdminJs()
    {
        $this->smarty->assign(array(
            'js_dir_path' => $this->_path.'views/js/',
        ));
        return $this->display(__FILE__,'admin-js.tpl');
    }
    public function displayAlerts($time)
    {
        $this->smarty->assign(array(
            'alerts' => $this->alerts,
            'time' => $time,
        ));
        return $this->display(__FILE__,'admin-alerts.tpl');
    }
    public function hookDisplayBlock($params)
    {        
        if(isset($params['block']) && $params['block'])
        {
            $this->smarty->assign(array(
                'block' => $this->convertBlockProperties($params['block']),                
            ));
            return $this->display(__FILE__,'block.tpl');
        }
    }
    public function convertBlockProperties($block)
    {
        if(isset($block['id_manufacturers']) && $block['id_manufacturers'] && ($ids = $this->strToIds($block['id_manufacturers'])))
        {
            if($manufacturers = $this->getManufacturers(false,' AND id_manufacturer IN('.implode(',',$ids).')'))
            {
                foreach($manufacturers as &$manufacturer)
                {
                    if ((int)Configuration::get('PS_REWRITING_SETTINGS'))
						$link_rewrite = Tools::link_rewrite($manufacturer['label']);
					else
						$link_rewrite = 0;
                    $manufacturer['link'] = $this->context->link->getManufacturerLink((int)$manufacturer['value'], $link_rewrite);                     
                }
                $block['manufacturers'] = $manufacturers;
            }            
        }
        if(isset($block['id_cmss']) && $block['id_cmss'] && ($ids = $this->strToIds($block['id_cmss'])))
        {
            if($cmss = $this->getCMSs(false,' AND c.id_cms IN('.implode(',',$ids).')'))
            {               
                foreach($cmss as &$c)
                {                    
                    $c['link'] = $this->context->link->getCMSLink((int)$c['value']);                     
                }
                $block['cmss'] = $cmss;                
            }                        
        }
        if(isset($block['id_categories']) && $block['id_categories'] && ($ids = $this->strToIds($block['id_categories'])))
        {
            $block['categoriesHtml'] = $this->displayCategories($this->getCategoryById($ids));                      
        }
        if(isset($block['image']) && $block['image'])
        {
            $block['image'] = $this->_path.'views/img/upload/'.$block['image'];
        }
        if(isset($block['id_products']) && $block['id_products'])
        {
            $block['productsHtml'] = $this->displayProducts($block['id_products']);
        }
        return $block;
    }
    public function getMenuLink($menu)
    {
        if(isset($menu['link_type']))
        {
            switch($menu['link_type'])
            {
                case 'CUSTOM':
                    return $menu['link'];
                case 'CMS':
                    return $this->context->link->getCMSLink((int)$menu['id_cms']);    
                case 'CUSTOM':
                    return $menu['link'];
                case 'CATEGORY':
                    return $this->context->link->getCategoryLink((int)$menu['id_category']);
                case 'MNFT':
                    $manufacturer = new Manufacturer((int)$menu['id_manufacturer'], (int)$this->context->language->id);
                    if(!is_null($manufacturer->id))
                    {
                        if ((int)Configuration::get('PS_REWRITING_SETTINGS'))
    						$manufacturer->link_rewrite = Tools::link_rewrite($manufacturer->name);
    					else
    						$manufacturer->link_rewrite = 0;
                        return $this->context->link->getManufacturerLink((int)$menu['id_manufacturer'], $manufacturer->link_rewrite);
                    }
                    return '#';                       
                case 'HOME':
                    return $this->context->link->getPageLink('index', true); 
                case 'CONTACT':
                    return $this->context->link->getPageLink('contact', true);       
            }
        }
        return '#';
    }
    public function getProducts($ids, $order_by = false)
    {
        if(!preg_match('/^[0-9]+(,[0-9]+)*$/', $ids))
            return false;
        $nb_days_new_product = Configuration::get('PS_NB_DAYS_NEW_PRODUCT');
        $id_lang = (int)$this->context->language->id;
        if (!Validate::isUnsignedInt($nb_days_new_product)) {
            $nb_days_new_product = 20;
        }        
        if($order_by && !in_array($order_by, array('orderprice asc','rand()','orderprice desc','pl.name asc','pl.name desc','cp.position asc','p.id_product desc','rand')))
            $order_by = $this->renderOrderString($ids);
        if(!$order_by)
            $order_by = $this->renderOrderString($ids);
        $active = true;
        $front = true;
        $sql = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) AS quantity'.(Combination::isFeatureActive() ? ', IFNULL(product_attribute_shop.id_product_attribute, 0) AS id_product_attribute,
					product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity' : '').', pl.`description`, pl.`description_short`, pl.`available_now`,
					pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, image_shop.`id_image` id_image,
					il.`legend` as legend, m.`name` AS manufacturer_name, cl.`name` AS category_default,
					DATEDIFF(product_shop.`date_add`, DATE_SUB("'.date('Y-m-d').' 00:00:00",
					INTERVAL '.(int)$nb_days_new_product.' DAY)) > 0 AS new, product_shop.price AS orderprice
				FROM `'._DB_PREFIX_.'category_product` cp
				LEFT JOIN `'._DB_PREFIX_.'product` p
					ON p.`id_product` = cp.`id_product`
				'.Shop::addSqlAssociation('product', 'p').
                (Combination::isFeatureActive() ? ' LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
				ON (p.`id_product` = product_attribute_shop.`id_product` AND product_attribute_shop.`default_on` = 1 AND product_attribute_shop.id_shop='.(int)$this->context->shop->id.')':'').'
				'.Product::sqlStock('p', 0).'
				LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
					ON (product_shop.`id_category_default` = cl.`id_category`
					AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').')
				LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
					ON (p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').')
				LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
					ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop='.(int)$this->context->shop->id.')
				LEFT JOIN `'._DB_PREFIX_.'image_lang` il
					ON (image_shop.`id_image` = il.`id_image`
					AND il.`id_lang` = '.(int)$id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'manufacturer` m
					ON m.`id_manufacturer` = p.`id_manufacturer`                
				WHERE product_shop.`id_shop` = '.(int)$this->context->shop->id.'
					AND p.id_product IN('.pSQL($ids).') '
                    .($active ? ' AND product_shop.`active` = 1' : '')
                    .($front ? ' AND product_shop.`visibility` IN ("both", "catalog")' : '')
                    .' GROUP BY p.id_product '
                    .($order_by ? 'ORDER BY '.$order_by : '').' 
			     ';
        //die($sql);
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql, true, false);
        if (!$result) {
            return array();
        }

        if ($order_by == 'orderprice') {
            $order_way ='asc';
            Tools::orderbyPrice($result, $order_way);
        }            
        /** Modify SQL result */
        $products = Product::getProductsProperties($id_lang, $result);
        if($this->is17 && Tools::getValue('configure')!='ets_megamenu' && $products)
        {
            $assembler = new ProductAssembler($this->context);

            $presenterFactory = new ProductPresenterFactory($this->context);
            $presentationSettings = $presenterFactory->getPresentationSettings();
            $presenter = new PrestaShop\PrestaShop\Core\Product\ProductListingPresenter(
                new PrestaShop\PrestaShop\Adapter\Image\ImageRetriever(
                    $this->context->link
                ),
                $this->context->link,
                new PrestaShop\PrestaShop\Adapter\Product\PriceFormatter(),
                new PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever(),
                $this->context->getTranslator()
            );
    
            $products_for_template = array();
            
            foreach ($products as $rawProduct) {
                $products_for_template[] = $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct($rawProduct),
                    $this->context->language
                );
            }                
            return $products_for_template;
        }
        return $products;
    }
    private function renderOrderString($ids)
    {
        $argIds = explode(',',$ids);
        $str = '';
        if($argIds)
        {            
            foreach($argIds as $id)
            {                
                $str .= ' p.id_product='.(int)$id.' DESC,';
            }
        }
        return trim($str,',');
    }
    public function displayProducts($ids)
    {
        $compared_products = array();
        if (Configuration::get('PS_COMPARATOR_MAX_ITEM') && isset($this->context->cookie->id_compare)) {
            $compared_products = CompareProduct::getCompareProducts($this->context->cookie->id_compare);
        }        
        $this->smarty->assign(array(
            'products' => $this->getProducts($ids),
            'PS_CATALOG_MODE'     => (bool)Configuration::get('PS_CATALOG_MODE') || (Group::isFeatureActive() && !(bool)Group::getCurrent()->show_prices),
            'comparator_max_item' => (int)Configuration::get('PS_COMPARATOR_MAX_ITEM'),
            'compared_products'   => is_array($compared_products) ? $compared_products : array(),
            'protocol_link' => (Configuration::get('PS_SSL_ENABLED') ) ? 'https://' : 'http://', 
            'link' => new Link(),          
        ));      
        return $this->display(__FILE__,'product-list'.(Tools::getValue('configure')=='ets_megamenu' ? '-mini' : ($this->is17 ? '-17':'')).'.tpl');
    } 
    public function hookDisplayBackOfficeHeader()
    {
        $configure = Tools::getValue('configure');
        $controller = Tools::getValue('controller');
        if(!($controller =='AdminModules' && $configure == $this->name))
            return '';
        $this->context->controller->addCSS($this->_path.'views/css/megamenu-admin.css');
    }
    public function hookDisplayHeader()
    {
        $this->addGoogleFonts();
        if($this->is17)
        {
            $this->addCss17('megamenu','main');
            $this->addCss17('fix17','fix17');    
        }
        else
        {
            Tools::addCSS($this->_path.'views/css/megamenu.css');
            Tools::addCSS($this->_path.'views/css/fix16.css');
        }
        $this->context->controller->addCSS($this->_path.'views/css/animate.css');            
        $this->context->controller->addJS($this->_path.'views/js/megamenu.js');
        $config = new MM_Config();
        $this->context->smarty->assign(array(
            'mm_config' => $config->getConfig(),
        ));
        if(Configuration::get('ETS_MM_CACHE_ENABLED'))
        {
            if(@file_exists(dirname(__FILE__).'/views/css/cache.css') || !@file_exists(dirname(__FILE__).'/views/css/cache.css') && @file_put_contents(dirname(__FILE__).'/views/css/cache.css',$this->getCSS()))                
            {
                if($this->is17)
                    $this->addCss17('cache','cache');
                else
                    Tools::addCSS($this->_path.'views/css/cache.css');
            }
            else
                return $this->displayDynamicCss();
        }
        else
            return $this->displayDynamicCss();
    }
    public function addGoogleFonts($frontend = false)
    {
        $font1 = Configuration::get('ETS_MM_HEADING_FONT');
        $font2 = Configuration::get('ETS_MM_TEXT_FONT');
        if($font1!='Times new roman' && $font1!='Arial' && $font1!='inherit')
        {
            if($this->is17)
            {
                $this->addCss17('https://fonts.googleapis.com/css?family='.urlencode($font1),'mm_gfont_1','remote');
            }   
            else
                $this->context->controller->addCSS('https://fonts.googleapis.com/css?family='.urlencode($font1));   
        }
        if($font2 != $font1 && $font2!='Times new roman' && $font2!='Arial' && $font2!='inherit') 
        {
            if($this->is17)
            {
                $this->addCss17('https://fonts.googleapis.com/css?family='.urlencode($font2),'mm_gfont_2','remote');
            }   
            else
                $this->context->controller->addCSS('https://fonts.googleapis.com/css?family='.urlencode($font2)); 
        } 
        unset($frontend);
    }
    public function addCss17($cssFile,$id = false,$server='local')
    {
        $this->context->controller->registerStylesheet('modules-ets_megamenu'.($id ? '_'.$id : ''), $server=='remote' ? $cssFile : 'modules/'.$this->name.'/views/css/'.$cssFile.'.css', array('media' => 'all', 'priority' => 150,'server' => $server));
    }
    public function displayDynamicCss()
    {
        $this->smarty->assign(array(
            'mm_css' => $this->getCss(),
        ));
        return $this->display(__FILE__,'header.tpl');
    }
    public function getCSS()
    {
        $skin = Tools::strtolower(Configuration::get('ETS_MM_SKIN'));
        $colors = array();        
        if($skin != 'custom' && isset(self::$configs['configs']['ETS_MM_SKIN']['options']['query']) && self::$configs['configs']['ETS_MM_SKIN']['options']['query'])
        {
            foreach(self::$configs['configs']['ETS_MM_SKIN']['options']['query'] as $s)
            {
                if(Tools::strtolower($s['id_option'])==Tools::strtolower($skin) && isset($s['colors']))
                {
                    $colors = $s['colors'];
                    break;
                }                    
            }
        }
        if($skin == 'custom')
        {
            $colors = array(
                Configuration::get('ETS_MM_COLOR1'),
                Configuration::get('ETS_MM_COLOR2'),
                Configuration::get('ETS_MM_COLOR3'),
                Configuration::get('ETS_MM_COLOR4'),
                Configuration::get('ETS_MM_COLOR5'),
                Configuration::get('ETS_MM_COLOR6'),
                Configuration::get('ETS_MM_COLOR7'),
                Configuration::get('ETS_MM_COLOR8'),
                Configuration::get('ETS_MM_COLOR9'),
            );
        } 
        $colors[] = Configuration::get('ETS_MM_HEADING_FONT')!='inherit' ? "'".Configuration::get('ETS_MM_HEADING_FONT')."'" : 'inherit';
        $colors[] = Configuration::get('ETS_MM_TEXT_FONT') !='inherit' ? "'".Configuration::get('ETS_MM_TEXT_FONT')."'" : 'inherit';
        $dynamicCSS = @file_exists(dirname(__FILE__).'/views/css/dynamic.css') && @is_readable(dirname(__FILE__).'/views/css/dynamic.css') ? Tools::file_get_contents(dirname(__FILE__).'/views/css/dynamic.css') : '';        
        $customCSS = trim(Configuration::get('ETS_MM_CUSTOM_CSS'));
        $css =  ($dynamicCSS || $customCSS) ? str_replace(array('color1','color2','color3','color4','color5','color6','color7','color8','color9','font1','font2'),$colors,$dynamicCSS."\n".$customCSS) : '';
        return $css;
    }
    public function strToIds($str)
    {
        $ids = array();
        if($str && ($arg = explode(',',$str)))
        {
            foreach($arg as $id)
                if(!in_array((int)$id, $ids))
                    $ids[] = (int)$id;
        }
        return $ids;
    }    
    public function displayCategories($categories)
    {
        if($categories)
        {            
            if(Configuration::get('ETS_MM_INCLUDE_SUB_CATEGORIES'))
                foreach($categories as &$category)
                    $category['sub'] = ($subcategories = $this->getChildCategories((int)$category['id_category'])) ? $this->displayCategories($subcategories) : false;
            $this->smarty->assign(array(
                'categories' => $categories,
                'link' => $this->context->link,                
            ));
            return $this->display(__FILE__,'categories-tree.tpl');
        }
    }
    public function getCategoryById($id_category)
    {
        $sql = "
            SELECT c.*, cl.name,cl.link_rewrite
            FROM "._DB_PREFIX_."category c
            LEFT JOIN "._DB_PREFIX_."category_lang cl ON c.id_category=cl.id_category AND cl.id_lang=".(int)$this->context->language->id."
            WHERE c.id_category ".(is_array($id_category) ? "IN(".implode(',',$id_category).")" : "=".(int)$id_category)."
            ORDER BY cl.name ASC
        ";
        $categories = $id_category ? (is_array($id_category) ? Db::getInstance()->executeS($sql) : Db::getInstance()->getRow($sql)) : false;           
        return $categories;
    }
    public function getChildCategories($id_parent)
    {
        return Db::getInstance()->executeS("
            SELECT c.*, cl.name,cl.link_rewrite
            FROM "._DB_PREFIX_."category c
            LEFT JOIN "._DB_PREFIX_."category_lang cl ON c.id_category=cl.id_category AND cl.id_lang=".(int)$this->context->language->id."
            WHERE c.id_parent=".(int)$id_parent." AND c.id_category!=".(int)$id_parent."
            ORDER BY cl.name ASC
        ");
    }
    public static function clearAllCache()
    {
        if(@file_exists(dirname(__FILE__).'/views/css/cache.css'))
            @unlink(dirname(__FILE__).'/views/css/cache.css');
        if($files = glob(dirname(__FILE__).'/cache/*'))
        {
            foreach($files as $file)
                if(@file_exists($file) && strpos($file,'index.php')===false)
                    @unlink($file);
        }
    }   
    public static function clearUploadedImages()
    {
        if(@file_exists(dirname(__FILE__).'/views/img/upload/') && ($files = glob(dirname(__FILE__).'/views/img/upload/*')))
        {
            foreach($files as $file)
                if(@file_exists($file) && strpos($file,'index.php')===false)
                    @unlink($file);
        }
    }
    public function multiLayoutExist()
    {
        return Db::getInstance()->getRow("SELECT id_lang FROM "._DB_PREFIX_."lang WHERE is_rtl=0 AND active=1") && Db::getInstance()->getRow("SELECT id_lang FROM "._DB_PREFIX_."lang WHERE is_rtl=1 AND active=1");
    } 
    public function translates()
    {
        self::$trans = array(
            'required_text' => $this->l('is required'),
            'data_saved' => $this->l('Saved'),
            'unkown_error' => $this->l('Unknown error happens'),
            'object_empty' => $this->l('Object is empty'),
            'field_not_valid' => $this->l('Field is not valid'),  
            'file_too_large' => $this->l('Upload file cannot be large than 100MB'),   
            'file_existed' => $this->l('File name already exists. Try to rename the file and upload again'),
            'can_not_upload' => $this->l('Cannot upload file'), 
            'upload_error_occurred' => $this->l('An error occurred during the image upload process.'),   
            'image_deleted' => $this->l('Image deleted'),     
            'item_deleted' => $this->l('Item deleted'),
            'cannot_delete' => $this->l('Cannot delete the item due to an unknown technical problem'),
            'invalid_text' => $this->l('is invalid'),
            'bubble_text_is_too_long' => $this->l('Bubble text cannot be longer than 50 characters'),
            'bubble_text_color_is_required' => $this->l('Bubble alert text color is required'),
            'bubble_background_color_is_required' => $this->l('Bubble alert background color is required'),
            
            'custom_link_required_text' => $this->l('Custom link is required'),  
            'category_required_text' => $this->l('Please select a category'),
            'manufacturer_required_text' => $this->l('Please select a manufacturer'),
            'cms_required_text' => $this->l('CMS page is required'),
            'link_type_not_valid_text' => $this->l('Link type is not valid'),
            'sub_menu_width_invalid' => $this->l('Sub menu width must be between 10 and 100'),
            
            'content_required_text' => $this->l('HTML/Text is required'),
            'cmss_required_text' => $this->l('CMS pages is required'),
            'categories_required_text' => $this->l('Categories is required'),
            'manufacturers_required_text' => $this->l('Manufacturers is required'),
            'image_required_text' => $this->l('Image is required'),
            'block_type_not_valid_text' => $this->l('Block type is not valid'),
            'products_required_text' => $this->l('Please enter product ids'),
            'products_not_valid_text' => $this->l('Product Ids is not valid. Please enter product IDs separated by a comma (,)'),
        );
    }    
    public function modulePath()
    {
        return $this->_path;
    }
    public function layoutDirection()
    {
        if(Configuration::get('ETS_MM_DIR')=='auto')
            return $this->context->language->is_rtl ? 'ets-dir-rtl' : 'ets-dir-ltr';  
        else
           return  'ets-dir-'.(Configuration::get('ETS_MM_DIR') == 'rtl' ? 'rtl' : 'ltr');    
    }
    public function displayMenuFrontend()
    {
        $menuHtml = false;
        if(Configuration::get('ETS_MM_CACHE_ENABLED'))
        {
            $cache = new MM_Cache();
            if(!($menuHtml = $cache->get('menu_'.$this->context->language->iso_code)))            
            {
                $menuHtml = $this->displayMegaMenu();                
                $cache->set('menu_'.$this->context->language->iso_code,$menuHtml);
            }
        }
        else
            $menuHtml = $this->displayMegaMenu();
        $this->smarty->assign(array(
            'menusHTML' => $menuHtml,
            'mm_layout_direction' => $this->layoutDirection(), 
            'mm_multiLayout' => $this->multiLayout,    
        ));
        return $this->display(__FILE__,'megamenu.tpl');
    }
    public function hookDisplayTop(){
        if(Configuration::get('ETS_MM_HOOK_TO')!='customhook')
            return $this->displayMenuFrontend();
    }    
    public function hookDisplayMegaMenu()
    {
        if(Configuration::get('ETS_MM_HOOK_TO')=='customhook')
            return $this->displayMenuFrontend();
    }
    public function displayMegaMenu($id_lang = false)
    {              
        $this->smarty->assign(array(
            'menus' => $id_lang ? $this->getMenus(true,$id_lang) : $this->getMenus(true),            
        ));
        return $this->display(__FILE__,'menu-html.tpl');
    }
    public function hookDisplayMMItemMenu($params)
    {
        $this->smarty->assign(array(
            'menu' => isset($params['menu']) ? $params['menu'] : false,
        ));
        return $this->display(__FILE__,'item-menu.tpl');
    }
    public function hookDisplayMMItemColumn($params)
    {
        $this->smarty->assign(array(
            'column' => isset($params['column']) ? $params['column'] : false,
        ));
        return $this->display(__FILE__,'item-column.tpl');
    }
    public function hookDisplayMMItemBlock($params)
    {
        $this->smarty->assign(array(
            'block' => isset($params['block']) ? $params['block'] : false,
        ));
        return $this->display(__FILE__,'item-block.tpl');
    }
    //Database
    public function installDb()
    {
        $dbExecuted =  
            Db::getInstance()->execute("
                CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."ets_mm_block` (
                  `id_block` int(10) unsigned NOT NULL AUTO_INCREMENT,
                  `id_column` int(11) DEFAULT NULL,
                  `block_type` varchar(20) NOT NULL DEFAULT 'HTML',
                  `image` varchar(500) NOT NULL,
                  `sort_order` int(11) NOT NULL DEFAULT '1',
                  `enabled` tinyint(1) NOT NULL DEFAULT '1',
                  `id_categories` varchar(500) DEFAULT NULL,
                  `id_manufacturers` varchar(500) DEFAULT NULL,
                  `id_products` varchar(500) NOT NULL,
                  `id_cmss` varchar(500) DEFAULT NULL,
                  `display_title` tinyint(1) NOT NULL DEFAULT '1',
                  PRIMARY KEY (`id_block`)
                )
            ")
            &&Db::getInstance()->execute("
                CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."ets_mm_block_lang` (
                  `id_block` int(11) NOT NULL,
                  `id_lang` int(11) NOT NULL,
                  `title` varchar(500) DEFAULT NULL COLLATE utf8mb4_general_ci,
                  `content` text COLLATE utf8mb4_general_ci,
                  `title_link` varchar(500) DEFAULT NULL,
                  `image_link` varchar(500) DEFAULT NULL
                )
            ")
            &&Db::getInstance()->execute("
                CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."ets_mm_column` (
                  `id_column` int(10) unsigned NOT NULL AUTO_INCREMENT,
                  `id_menu` int(11) DEFAULT NULL,
                  `is_breaker` tinyint(1) NOT NULL DEFAULT '0',
                  `column_size` varchar(20) DEFAULT NULL,
                  `sort_order` int(11) NOT NULL DEFAULT '1',
                  PRIMARY KEY (`id_column`)
                )
            ")
            &&Db::getInstance()->execute("
                CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."ets_mm_menu` (
                  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
                  `sort_order` int(11) NOT NULL DEFAULT '1',
                  `enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
                  `id_cms` int(11) DEFAULT NULL,
                  `id_manufacturer` int(11) DEFAULT NULL,
                  `id_category` int(11) DEFAULT NULL,
                  `link_type` varchar(20) NOT NULL DEFAULT 'FULL',
                  `sub_menu_type` varchar(20) NOT NULL DEFAULT 'FULL',
                  `sub_menu_max_width` int(11) NOT NULL DEFAULT '100',
                  `custom_class` varchar(50) DEFAULT NULL,
                  `bubble_text_color` varchar(50) DEFAULT NULL,
                  `bubble_background_color` varchar(50) DEFAULT NULL,
                  PRIMARY KEY (`id_menu`)
                )
            ")
            &&Db::getInstance()->execute("
                CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."ets_mm_menu_lang` (
                  `id_menu` int(10) UNSIGNED NOT NULL,
                  `id_lang` int(10) UNSIGNED NOT NULL,
                  `title` varchar(500) NOT NULL COLLATE utf8mb4_general_ci,
                  `link` varchar(500) DEFAULT NULL,
                  `bubble_text` varchar(50) DEFAULT NULL COLLATE utf8mb4_general_ci
                )
            ");
            if($dbExecuted && @file_exists(dirname(__FILE__).'/data/init.data.zip') && is_readable(dirname(__FILE__).'/data/init.data.zip'))
            {
                $this->processImport(dirname(__FILE__).'/data/init.data.zip',true,false,true);
            }
            return $dbExecuted;
    }
    public function uninstallDb()
    {
        return
            Db::getInstance()->execute("DROP TABLE IF EXISTS "._DB_PREFIX_."ets_mm_block_lang")
            &&Db::getInstance()->execute("DROP TABLE IF EXISTS "._DB_PREFIX_."ets_mm_block")
            && Db::getInstance()->execute("DROP TABLE IF EXISTS "._DB_PREFIX_."ets_mm_column")
            && Db::getInstance()->execute("DROP TABLE IF EXISTS "._DB_PREFIX_."ets_mm_menu_lang")
            && Db::getInstance()->execute("DROP TABLE IF EXISTS "._DB_PREFIX_."ets_mm_menu");
    }
    
    //Import/Export functions
    public function processImport($zipfile = false,$clearData = false,$theme_default_items = array(),$initData = false)
    {
        $errors = array();
        if(!$zipfile)
        {
            $savePath = dirname(__FILE__).'/cache/';
            if(@file_exists($savePath.'megamenu.data.zip'))
                @unlink($savePath.'megamenu.data.zip');
            $uploader = new Uploader('sliderdata');
            $uploader->setCheckFileSize(false);
            $uploader->setAcceptTypes(array('zip'));        
            $uploader->setSavePath($savePath);
            $file = $uploader->process('megamenu.data.zip'); 
            if ($file[0]['error'] === 0) {
                if (!Tools::ZipTest($savePath.'megamenu.data.zip')) 
                    $errors[] = $this->l('Zip file seems to be broken');
            } else {
                $errors[] = $file[0]['error'];
            }
            $extractUrl = $savePath.'megamenu.data.zip';
        }
        else      
            $extractUrl = $zipfile;
        if(!@file_exists($extractUrl))
            $errors[] = $this->l('Zip file doesn\'t exist'); 
        if(!$errors)
        {
            $zip = new ZipArchive();
            if($zip->open($extractUrl) === true)
            {
                if ($zip->locateName('Menu-Info.xml') === false)
                {
                    $errors[] = $this->l('Menu-Info.xml doesn\'t exist');
                    if($extractUrl && !$zipfile)
                        @unlink($extractUrl);
                }
            }
            else
                $errors[] = $this->l('Cannot open zip file. It might be broken or damaged');
        }        
        if(!$errors && (Tools::isSubmit('importoverride') || $clearData) && $zip->locateName('Data.xml') !== false)              
        {
            Db::getInstance()->execute("DELETE FROM "._DB_PREFIX_."ets_mm_block_lang");
            Db::getInstance()->execute("DELETE FROM "._DB_PREFIX_."ets_mm_block");
            Db::getInstance()->execute("DELETE FROM "._DB_PREFIX_."ets_mm_column");
            Db::getInstance()->execute("DELETE FROM "._DB_PREFIX_."ets_mm_menu_lang");
            Db::getInstance()->execute("DELETE FROM "._DB_PREFIX_."ets_mm_menu");
            self::clearUploadedImages();
        }    
        if(!$errors)
        {            
            if(!Tools::ZipExtract($extractUrl, dirname(__FILE__).'/views/'))
                $errors[] = $this->l('Cannot extract zip data');
            if(!@file_exists(dirname(__FILE__).'/views/Data.xml') && !@file_exists(dirname(__FILE__).'/views/Config.xml'))
                $errors[] = $this->l('Neither Data.xml nor Config.xml exists');            
        } 
        if(!@file_exists(dirname(__FILE__).'/views/Menu-Info.xml'))  
            $errors[] = $this->l('Menu-Info.xml doesn\'t exist in "views/" folder');  
           
        if(!$errors)
        {            
            if(@file_exists(dirname(__FILE__).'/views/Data.xml'))
            {                
                if($theme_default_items)
                {
                    $this->importXmlTbl(@simplexml_load_file(dirname(__FILE__).'/views/Data.xml'),$theme_default_items);
                }   
                elseif($initData)
                {                    
                    $info = @simplexml_load_file(dirname(__FILE__).'/views/Menu-Info.xml');
                    $this->importXmlTbl(@simplexml_load_file(dirname(__FILE__).'/views/Data.xml'),$info && isset($info['theme_default_items']) && $info['theme_default_items'] ? explode(',',(string)$info['theme_default_items']) : false);
                }
                else
                    $this->importXmlTbl(@simplexml_load_file(dirname(__FILE__).'/views/Data.xml'));                    
                @unlink(dirname(__FILE__).'/views/Data.xml');
            } 
            if(@file_exists(dirname(__FILE__).'/views/Config.xml'))
            {
                $this->importXmlConfig(@simplexml_load_file(dirname(__FILE__).'/views/Config.xml'));
                @unlink(dirname(__FILE__).'/views/Config.xml');
            }
            if(@file_exists(dirname(__FILE__).'/views/Menu-Info.xml'))
            {
                @unlink(dirname(__FILE__).'/views/Menu-Info.xml');
            }
            if($extractUrl && !$zipfile)
                @unlink($extractUrl);                
        }
        return $errors;        
    }
    private function importXmlConfig($xml)
    {
        if(!$xml)
            return false;
        $languages = Language::getLanguages(false);          
        foreach(self::$configs['configs'] as $key => $config)
        {
            if(property_exists($xml,$key))
            {
                if(isset($config['lang']) && $config['lang'])
                {
                    $temp = array();
                    foreach($languages as $lang)
                    {
                        $node = $xml->$key;
                        $temp[$lang['id_lang']] = isset($node['configValue']) ? (string)$node['configValue'] : (isset($config['default']) ? $config['default'] : '');
                    }
                    Configuration::updateValue($key,$temp);
                }
                else
                {
                    $node = $xml->$key;
                    Configuration::updateValue($key,isset($node['configValue']) ? (string)$node['configValue'] : (isset($config['default']) ? $config['default'] : ''));
                }                   
            }
        }
    }
    private function importXmlTbl($xml,$activeIds = array())
    {       
        
        if(!$xml)
            return false;
        if($xml && property_exists($xml,'menu') && $xml->menu)
        {
            foreach($xml->children() as $menu)
            {                
                if(($attr = $menu->attributes()) && ($id_menu = $this->addObj('menu',$attr,$activeIds)))
                {
                    if($menu->columns->children())
                    {
                        foreach($menu->columns->children() as $column)
                        {                            
                            if(($attr2 = $column->attributes()) && ($attr2['id_menu'] = $id_menu) && ($id_column = $this->addObj('column',$attr2)))
                            {                                
                                if($column->blocks->children())
                                {
                                    foreach($column->blocks->children() as $block)
                                    {
                                        if($attr3 = $block->attributes())
                                        {
                                            $attr3['id_column'] = $id_column;
                                            $this->addObj('block',$attr3);
                                        }
                                    }
                                }    
                            }
                        }
                    }                
                }                
            }
        }
    }    
    private function addObj($obj, $data, $activeIds = array())
    {
        $realOjbect = ($obj == 'menu' ? new MM_Menu() : ($obj=='column' ? new MM_Column() : new MM_Block()));
        $languages = Language::getLanguages(false);
        $attrs = ($obj == 'menu' ? self::$menus : ($obj=='column' ? self::$columns : self::$blocks));        
        foreach($attrs['configs'] as $key => $val)
        {
            if(isset($val['lang']) && $val['lang'])
            {
                $temp = array();
                foreach($languages as $lang)
                {                    
                    $temp[$lang['id_lang']] = isset($data[$key]) ? (string)$data[$key] : (isset($val['default']) ? $val['default'] : '');                    
                }
                $realOjbect->$key = $temp;
            }
            else
            {
                if($data[$key])
                    $realOjbect->$key = (string)$data[$key];
                elseif(isset($val['default']))
                    $realOjbect->$key = $val['default'];
                else
                    $realOjbect->$key = '';
            }
        }
        if($activeIds && isset($data['id_menu']) && !in_array($data['id_menu'],$activeIds))
            $realOjbect->enabled = 0;
        if($realOjbect->add())
            return $realOjbect->id;                        
        return false;
    }
    private function archiveThisFile($obj, $file, $server_path, $archive_path, $greyOutImage = false)
    {
        if (is_dir($server_path.$file)) {
            $dir = scandir($server_path.$file);
            foreach ($dir as $row) {
                if ($row[0] != '.') {
                    $this->archiveThisFile($obj, $row, $server_path.$file.'/', $archive_path.$file.'/', $greyOutImage);
                }
            }
        } 
        elseif($greyOutImage && is_file($server_path.$file) && ($extension = pathinfo($server_path.$file, PATHINFO_EXTENSION)) && ($extension=='png' || $extension=='jpg'))
        {
            $tempDir = dirname(__FILE__).'/data/temp/';
            $greyImage = $tempDir.$file;
            $this->greyOutImage($server_path.$file,$tempDir);        
            if(file_exists($greyImage))
            {
                $obj->addFile($greyImage, $archive_path.$file);
            }            
        }
        else $obj->addFile($server_path.$file, $archive_path.$file);
    } 
    public function greyOutImage($src,$descDir)
    {
        if(!file_exists($src) || !is_dir($descDir))
            return;
        $name = basename($src);
        $extension = pathinfo($src, PATHINFO_EXTENSION);
        if(file_exists($descDir.$name))
            @unlink($descDir.$name);
        if($extension == 'png' || $extension=='jpg')
        {
            $img = ($extension=='jpg' ? imagecreatefromjpeg($src) : imagecreatefrompng($src)); 
            $grey = imagecolorallocate($img, 235, 235, 235);
            $width = imagesx($img);
            $height = imagesy($img);
            imagefilledrectangle($img, 0, 0, $width, $height, $grey);
            
            //Add sizing text
            $font = dirname(__FILE__).'/views/fonts/Montserrat-Bold.ttf';
            $font_size = 30;
            $angle = 45;
            $text = $width.' X '.$height;
            $text_box = imagettfbbox($font_size,$angle,$font,$text);
            $text_width = $text_box[2]-$text_box[0];
            $text_height = $text_box[7]-$text_box[1];
            $grey = imagecolorallocate($img, 160, 160, 160);
            // Calculate coordinates of the text
            $x = ($width/2) - ($text_width/2)-30;
            $y = ($height/2) - ($text_height/2);
            
            // Add some shadow to the text
            imagettftext($img, $font_size, 0, $x, $y, $grey, $font, $text);            
            
            if($extension=='jpg')
                imagejpeg($img, $descDir.$name);
            else
                imagepng($img, $descDir.$name);
        }
        else
            @copy($src,$descDir.$name);
    }    
    public function renderConfigXml()
    {        
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!-- Copyright ETS-Soft --><config></config>');            
        if($configs = $this->getConfigs(true))
        {
            foreach($configs as $key => $val)
            {
                $config = $xml->addChild($key);
                $config->addAttribute('configValue',Configuration::get($key, isset($val['lang']) && $val['lang'] ? (int)Configuration::get('PS_LANG_DEFAULT') : null));   
            }            
        }
        return $xml->asXML();
    }
    public function renderInfoXml()
    {        
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!-- Copyright ETS-Soft --><info></info>'); 
        $xml->addAttribute('export_time',date('l jS \of F Y h:i:s A'));
        $xml->addAttribute('export_source',$this->context->link->getPageLink('index', Configuration::get('PS_SSL_ENABLED')));
        $xml->addAttribute('module_version',$this->version);   
        if(class_exists('ybc_themeconfig') && ($tc = new Ybc_themeconfig()) && $tc->devMode)
        {
            $defaultLayout = isset($tc->configs['YBC_TC_LAYOUT']['default']) ? $tc->configs['YBC_TC_LAYOUT']['default'] : false;                  
            $xml->addAttribute('theme_default_items',$defaultLayout ? implode(',',$tc->getLayoutConfiguredField('menus',$defaultLayout)) : '');
        }      
        return $xml->asXML();
    }
    public function renderMenuDataXml()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!-- Copyright ETS-Soft --><menus></menus>');            
        
        if($menus = $this->getMenus(false,(int)Configuration::get('PS_LANG_DEFAULT')))
        {
            foreach($menus as $menu)
            {                
                $menuNode = $xml->addChild('menu');
                $columnsNode = $menuNode->addChild('columns');                 
                if(isset($menu['columns']) && $menu['columns'])
                {
                    foreach($menu['columns'] as $column)
                    {
                            $columnNode = $columnsNode->addChild('column');
                            $blocksNode = $columnNode->addChild('blocks');
                            if(isset($column['blocks']) && $column['blocks'])
                            {
                                foreach($column['blocks'] as $block)
                                {
                                    $blockNode = $blocksNode->addChild('block');
                                    foreach($block as $key=>$val)
                                    {
                                        if($key!='id_block')
                                            $blockNode->addAttribute($key,$val);
                                    }
                                }
                            }
                            foreach($column as $key=>$val)
                            {
                                if($key!='id_column')
                                    $columnNode->addAttribute($key,$val);
                            }
                    }
                }
                foreach($menu as $field => $val)
                {                    
                    $menuNode->addAttribute($field,$val);                   
                    
                }                   
            }            
        }
        return $xml->asXML();
    }
    public function generateArchive($savePath = false,$greyOutImage = false)
    {
        $zip = new ZipArchive();
        $cacheDir = dirname(__FILE__).'/cache/';
        $zip_file_name = 'megamenu_'.date('dmYHis').'.zip';
        if ($zip->open($cacheDir.$zip_file_name, ZipArchive::OVERWRITE | ZipArchive::CREATE) === true) {
            if (!$zip->addFromString('Config.xml', $this->renderConfigXml())) {
                $this->errors[] = $this->l('Cannot create config xml file.');
            }
            if (!$zip->addFromString('Data.xml', $this->renderMenuDataXml())) {
                $this->errors[] = $this->l('Cannot create data xml file.');
            }
            if (!$zip->addFromString('Menu-Info.xml', $this->renderInfoXml())) {
                $this->errors[] = $this->l('Cannot create Menu-Info.xml');
            }
            $this->archiveThisFile($zip,'upload', dirname(__FILE__).'/views/img/', 'img/',$greyOutImage);
            $zip->close();

            if (!is_file($cacheDir.$zip_file_name)) {
                $this->errors[] = $this->l(sprintf('Could not create %1s', $cacheDir.$zip_file_name));
            }
            if($greyOutImage && ($files = glob(dirname(__FILE__).'/data/temp/*')))
            {
                foreach($files as $file)
                    if(@file_exists($file) && strpos($file,'index.php')===false)
                        @unlink($file);
            }
            if (!$this->errors) {
                if($savePath)
                {
                    if(@file_exists($savePath) && is_file($savePath))
                        @unlink($savePath);
                    $copied = @copy($cacheDir.$zip_file_name,$savePath);
                    @unlink($cacheDir.$zip_file_name);
                    return $copied;
                }
                if (ob_get_length() > 0) {
                    ob_end_clean();
                }

                ob_start();
                header('Pragma: public');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Cache-Control: public');
                header('Content-Description: File Transfer');
                header('Content-type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.$zip_file_name.'"');
                header('Content-Transfer-Encoding: binary');
                ob_end_flush();
                readfile($cacheDir.$zip_file_name);
                @unlink($cacheDir.$zip_file_name);
                exit;
            }
        }
        {
            if($savePath)
                return false;
            echo $this->l('An error occurred during the archive generation');
            die;
        }
    }
    public function getConfigs($id_lang = false)
    {
        $configs = array();
        foreach(self::$configs['configs'] as $key => $val)
        {
            $configs[$key] = Tools::strtolower(Configuration::get($key,isset($val['lang']) && $val['lang'] ? ($id_lang ? $id_lang : (int)$this->context->language->id) : null));
        }
        return $configs;
    }
}