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
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_category_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_post_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_list_helper_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_paggination_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_comment_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_slide_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_gallery_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_link_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ImportExport.php');
class Ybc_blog_free extends Module
{
    private $baseAdminPath;
    private $errorMessage = false;
    private $_html = '';
    public $blogDir;
    public $alias;
    public $friendly;
    public $is17 = false;
    public $configTabs = array();
    private $categoryFields = array(
        array(
            'name' => 'id_category',
            'primary_key' => true
        ),
        array(
            'name' => 'title',
            'multi_lang' => true
        ),
        array(
            'name' => 'description',            
            'multi_lang' => true
        ),
        array(
            'name' => 'url_alias',
            'multi_lang'=>true,
        ),
        array(
            'name' => 'meta_keywords',
            'multi_lang' => true
        ),
        array(
            'name' => 'meta_description',
            'multi_lang' => true
        ), 
        array(
            'name' => 'image'
        ),
        array(
            'name' => 'enabled',
            'default' => 1
        ),
        array(
            'name' => 'sort_order',
            'default' => 1
        )
    );
    private $postFields = array(
        array(
            'name' => 'id_post',
            'primary_key' => true
        ),        
        array(
            'name' => 'title',
            'multi_lang' => true
        ),
        array(
            'name' => 'meta_description',
            'multi_lang' => true
        ),
        array(
            'name' => 'meta_keywords',
            'multi_lang' => true
        ),
        array(
            'name' => 'products'
        ),
        array(
            'name' => 'description',            
            'multi_lang' => true
        ),
        array(
            'name' => 'short_description',            
            'multi_lang' => true
        ),
        array(
            'name' => 'url_alias',
            'multi_lang'=>true,
        ), 
        array(
            'name' => 'image'
        ),
        array(
            'name' => 'thumb'
        ),
        array(
            'name' => 'enabled',
            'default' => 1
        ),
        array(
            'name' => 'datetime_active',
        ),
        array(
            'name' => 'is_featured',
            'default' => 1
        ),
        array(
            'name' => 'sort_order',
            'default' => 1
        ),
        array(
            'name' => 'click_number',
            'default' => 0
        ),
        array(
            'name' => 'likes',
            'default' => 0
        )
    );
    private $commentFields = array(
        array(
            'name' => 'id_comment',
            'primary_key' => true
        ),        
        array(
            'name' => 'subject'
        ),
        array(
            'name' => 'comment'
        ),
        array(
            'name' => 'reply'
        ),
        array(
            'name' => 'rating'
        ),
        array(
            'name' => 'approved'
        ),
        array(
            'name' => 'reported'
        )
    );
    private $galleryFields = array(
        array(
            'name' => 'id_gallery',
            'primary_key' => true
        ),        
        array(
            'name' => 'title',
            'multi_lang' => true
        ),
        array(
            'name' => 'description',
            'multi_lang' => true
        ),
        array(
            'name' => 'sort_order',
            'default' => 1
        ),
        array(
            'name' => 'image'
        ),
        array(
            'name' => 'enabled',
            'default' => 1
        ),
        array(
            'name' => 'is_featured',
            'default' => 1
        )
    );
    private $slideFields = array(
        array(
            'name' => 'id_slide',
            'primary_key' => true
        ),        
        array(
            'name' => 'caption',
            'multi_lang' => true
        ),        
        array(
            'name' => 'sort_order',
            'default' => 1
        ),
        array(
            'name' => 'image'
        ),
        array(
            'name' => 'url',
            'multi_lang'=>true
        ),
        array(
            'name' => 'enabled',
            'default' => 1
        )
    );
    public $configs = array(); 
    public $errors = array();
    public $import_ok=false;   
    public function __construct()
	{
	    
		//Ajax search
        $this->ajaxProductSearch();
        
        //Init
        $this->name = 'ybc_blog_free';
		$this->tab = 'front_office_features';
		$this->version = '1.0.4';
		$this->author = 'ETS-Soft';
		$this->need_instance = 0;
		$this->secure_key = Tools::encrypt($this->name);
		$this->bootstrap = true;
        if(version_compare(_PS_VERSION_, '1.7', '>='))
            $this->is17 = true; 
        $this->module_key = 'da314fdf1af6d043f9b2f15dce2bef1e';
		parent::__construct();
        
		$this->displayName = $this->l('PRO blog - All in one package');
		$this->description = $this->l('PRO Blog - All in one package is the most powerful, flexible Prestashop blog module');
		$this->ps_versions_compliancy = array('min' => '1.6.0.0', 'max' => _PS_VERSION_);
        $this->configTabs = array(
            'general' => $this->l('General'),
            'seo' => $this->l('SEO'),
            'blog' => $this->l('Blog post'),
            'gallery' => $this->l('Gallery'),
            'slider' => $this->l('Slider'),            
            'comment' => $this->l('Likes and Comments'),   
            'mail' => $this->l('E-mail'),
            'social' => $this->l('Socials'),
            'sidebar' => $this->l('Sidebar'),
            'home' => $this->l('Home Page'),     
        );
        
        //Config fields        
        $this->configs = array(
            'YBC_BLOG_FREE_LAYOUT' => array(
                //GENERAL
                'label' => $this->l('Blog layout'),
                'type' => 'select',                                     
				'options' => array(
        			 'query' => array( 
                            array(
                                'id_option' => 'large_grid', 
                                'name' => $this->l('Large box and grid')
                            ),
                            array(
                                'id_option' => 'large_list', 
                                'name' => $this->l('Large box and list')
                            ),
                            array(
                                'id_option' => 'grid', 
                                'name' => $this->l('Grid')
                            ),
                            array(
                                'id_option' => 'list', 
                                'name' => $this->l('List')
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'list'
            ),            
            'YBC_BLOG_FREE_CUSTOM_COLOR' => array(
                'label' => $this->l('Custom color'),
                'type' => 'color',
                'default' => '#2fb5d2'
            ),
            'YBC_BLOG_FREE_MAIN_PAGE_POST_TYPE' => array(
                //GENERAL
                'label' => $this->l('Posts to display on main page'),
                'type' => 'select',                                     
				'options' => array(
        			 'query' => array( 
                            array(
                                'id_option' => 'latest', 
                                'name' => $this->l('Latest posts')
                            ),
                            array(
                                'id_option' => 'featured', 
                                'name' => $this->l('Featured posts')
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'latest'
            ),
            'YBC_BLOG_FREE_ENABLE_MAIL' => array(
                'label' => $this->l('Receive alert when a comment is posted '),
                'type' => 'switch',
                'default' => 1,
                'tab' => 'mail',
            ), 
            'YBC_BLOG_FREE_ENABLE_MAIL_REPORT' => array(
                'label' => $this->l('Receive alert when a comment is reported as abuse'),
                'type' => 'switch',
                'default' => 0,
                'tab' => 'mail',
            ),
            'YBC_BLOG_FREE_ALERT_EMAILS' => array(
                'label' => $this->l('Alert emails'),
                'type' => 'text',
                'width' => 200,
                'desc' => $this->l('Emails that you want to receive notifications, separated by a comma (,)'),
                'tab' => 'mail',             
            ), 
            'YBC_BLOG_FREE_DATE_FORMAT' => array(
                'label' => $this->l('Date format'),
                'type' => 'text',
                'default' => 'F jS Y',
                'width' => 200,
                'desc' => $this->l('Default: F jS Y, Check more at http://php.net/manual/en/function.date.php')             
            ), 
            //SEO
            'YBC_BLOG_FREE_FRIENDLY_URL' => array(
                'label' => $this->l('Enable blog friendly url'),
                'type' => 'switch',
                'default' => 1,
                'tab' => 'seo',
            ),
            'YBC_BLOG_FREE_ALIAS' => array(
                'label' => $this->l('Blog alias'),
                'type' => 'text',
                'default' => 'blog',
                'desc' => $this->l('Default: "blog"'),
                'required' => true,
                'lang'=>true,
                'tab' => 'seo',
            ),
            'YBC_BLOG_FREE_URL_SUBFIX' => array(
                'label' => $this->l('Use URL subfix'),
                'type' => 'switch',
                'default' => 1,
                'tab' => 'seo',
            ),
            'YBC_BLOG_FREE_META_TITLE' => array(
                'label' => $this->l('Blog meta title'),
                'type' => 'text',
                'default' => $this->l('PRO Blog - All in one package'),
                'lang' => true,
                'required' => true,
                'tab' => 'seo',
            ),
            'YBC_BLOG_FREE_META_KEYWORDS' => array(
                'label' => $this->l('Blog meta key words'),
                'type' => 'tags',
                'default' => $this->l('lorem,ipsum,dolor'),
                'lang' => true,                
                'desc' => $this->l('Separated by a comma (,)'),
                'tab' => 'seo',                
            ),
            'YBC_BLOG_FREE_META_DESCRIPTION' => array(
                'label' => $this->l('Blog meta description'),
                'type' => 'textarea',
                'default' => $this->l('PRO Blog - All in one package is the most powerful, flexible Prestashop blog module'),
                'lang' => true,                
                'tab' => 'seo',
            ), 
            'YBC_BLOG_FREE_ALIAS_POST' => array(
                'label' => $this->l('Single post page alias'),
                'type' => 'text',
                'default' => 'post',
                'desc' => $this->l('Default: "post"'),
                'required' => true,
                'lang'=>true,
                'tab' => 'seo',
            ), 
            'YBC_BLOG_FREE_ALIAS_CATEGORY' => array(
                'label' => $this->l('Category page alias'),
                'type' => 'text',
                'default' => 'category',
                'desc' => $this->l('Default: "category"'),
                'required' => true,
                'lang'=>true,
                'tab' => 'seo',
            ),  
            'YBC_BLOG_FREE_ALIAS_GALLERY' => array(
                'label' => $this->l('Gallery page alias'),
                'type' => 'text',
                'default' => 'gallery',
                'desc' => $this->l('Default: "gallery"'),
                'required' => true,
                'lang'=>true,
                'tab' => 'seo',
            ),
            'YBC_BLOG_FREE_ALIAS_LATEST' => array(
                'label' => $this->l('Latest posts page alias'),
                'type' => 'text',
                'default' => 'latest',
                'desc' => $this->l('Default: "latest"'),
                'required' => true,
                'lang'=>true,
                'tab' => 'seo',
            ),
            'YBC_BLOG_FREE_ALIAS_SEARCH' => array(
                'label' => $this->l('Search page alias'),
                'type' => 'text',
                'default' => 'search',
                'desc' => $this->l('Default: "search"'),
                'required' => true,
                'lang'=>true,
                'tab' => 'seo',
            ),
            'YBC_BLOG_FREE_ALIAS_AUTHOR' => array(
                'label' => $this->l('Author page alias'),
                'type' => 'text',
                'default' => 'author',
                'desc' => $this->l('Default: "author"'),
                'required' => true,
                'lang'=>true,
                'tab' => 'seo',
            ),
            'YBC_BLOG_FREE_ALIAS_TAG' => array(
                'label' => $this->l('Tag page alias'),
                'type' => 'text',
                'default' => 'tag',
                'desc' => $this->l('Default: "tag"'),
                'required' => true,
                'lang'=>true,
                'tab' => 'seo',
            ),
            //SIDEBAR   
            'YBC_BLOG_FREE_SIDEBAR_POSITION' => array(
                'label' => $this->l('Sidebar position'),
                'type' => 'select',                                       
				'options' => array(
        			 'query' => array( 
                            array(
                                'id_option' => 'left', 
                                'name' => $this->l('Left')
                            ),
                            array(
                                'id_option' => 'right', 
                                'name' => $this->l('Right')
                            ),
                            array(
                                'id_option' => 'none', 
                                'name' => $this->l('No sidebar')
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'left',                
                'tab' => 'sidebar',
            ),      
            'YBC_BLOG_FREE_SIDEBAR_POST_TYPE' => array(
                'label' => $this->l('Type of post blocks in sidebar'),
                'type' => 'select',                                      
				'options' => array(
        			 'query' => array(                            
                            array(
                                'id_option' => 'carousel', 
                                'name' => $this->l('Carousel slider')
                            ),
                            array(
                                'id_option' => 'default', 
                                'name' => $this->l('List')
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'carousel',                
                'tab' => 'sidebar',
            ),
            'YBC_BLOG_FREE_SHOW_LATEST_NEWS_BLOCK' => array(
                'label' => $this->l('Display latest news block'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'sidebar',
            ),
            'YBC_BLOG_FREE_LATES_POST_NUMBER' => array(
                'label' => $this->l('Maximum number of newest posts displayed'),
                'type' => 'text',
                'width' => 200,
                'required' => true,
                'default' => 5,    
                'validate' => 'isInt',            
                'tab' => 'sidebar',             
            ),
            'YBC_BLOG_FREE_SHOW_POPULAR_POST_BLOCK' => array(
                'label' => $this->l('Display pupular posts block'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'sidebar',
            ),
            'YBC_BLOG_FREE_PUPULAR_POST_NUMBER' => array(
                'label' => $this->l('Maximum number of pupular posts displayed'),
                'type' => 'text',
                'width' => 200,
                'required' => true,
                'default' => 5,
                'validate' => 'isInt',                
                'tab' => 'sidebar',             
            ),
            'YBC_BLOG_FREE_SHOW_FEATURED_BLOCK' => array(
                'label' => $this->l('Display featured posts'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'sidebar',
            ),
            'YBC_BLOG_FREE_FEATURED_POST_NUMBER' => array(
                'label' => $this->l('Maximum number of feature posts displayed'),
                'type' => 'text',
                'width' => 200,
                'required' => true,
                'default' => 5, 
                'validate' => 'isInt',               
                'tab' => 'sidebar',             
            ),
            'YBC_BLOG_FREE_SHOW_GALLERY_BLOCK' => array(
                'label' => $this->l('Display featured gallery images'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'sidebar',
            ), 
            'YBC_BLOG_FREE_GALLERY_BLOCK_SIDEBAR_SLIDER_ENABLED' => array(
                'label' => $this->l('Enable gallery carousel slider'),
                'type' => 'switch',
                'default' => 0,                
                'tab' => 'sidebar',
            ), 
            'YBC_BLOG_FREE_GALLERY_POST_NUMBER' => array(
                'label' => $this->l('Maximum number of featured gallery images displayed'),
                'type' => 'text',
                'width' => 200,
                'required' => true,
                'default' => 6,    
                'validate' => 'isInt',            
                'tab' => 'sidebar',             
            ),
            'YBC_BLOG_FREE_SHOW_CATEGORIES_BLOCK' => array(
                'label' => $this->l('Display categories block'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'sidebar',
            ),            
            'YBC_BLOG_FREE_SHOW_TAGS_BLOCK' => array(
                'label' => $this->l('Display tags block'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'sidebar',
            ),
            'YBC_BLOG_FREE_TAGS_NUMBER' => array(
                'label' => $this->l('Maximum number of tags displayed on Tags block'),
                'type' => 'text',
                'width' => 200,
                'required' => true,
                'default' => 20, 
                'validate' => 'isInt',               
                'tab' => 'sidebar',             
            ),
            'YBC_BLOG_FREE_SHOW_SEARCH_BLOCK' => array(
                'label' => $this->l('Display post search block'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'sidebar',
            ),
            //Home page
            'YBC_BLOG_FREE_HOME_POST_TYPE' => array(
                'label' => $this->l('Type of post blocks on home page'),
                'type' => 'select',                                      
				'options' => array(
        			 'query' => array( 
                            array(
                                'id_option' => 'default', 
                                'name' => $this->l('List')
                            ),
                            array(
                                'id_option' => 'carousel', 
                                'name' => $this->l('Carousel slider')
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'carousel',                
                'tab' => 'home',
            ),
            'YBC_BLOG_FREE_SHOW_LATEST_BLOCK_HOME' => array(
                'label' => $this->l('Display latest posts'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'home',
            ),
            'YBC_BLOG_FREE_LATEST_POST_NUMBER_HOME' => array(
                'label' => $this->l('Maximum number of latest posts displayed'),
                'type' => 'text',
                'width' => 200,
                'required' => true,
                'default' => 5,
                'validate' => 'isInt',                
                'tab' => 'home',             
            ),
            'YBC_BLOG_FREE_SHOW_POPULAR_BLOCK_HOME' => array(
                'label' => $this->l('Display popular posts'),
                'type' => 'switch',
                'default' => 0,                
                'tab' => 'home',
            ),
            'YBC_BLOG_FREE_POPULAR_POST_NUMBER_HOME' => array(
                'label' => $this->l('Maximum number of popular posts displayed'),
                'type' => 'text',
                'width' => 200,
                'required' => true,
                'default' => 5,  
                'validate' => 'isInt',              
                'tab' => 'home',             
            ),
            'YBC_BLOG_FREE_SHOW_FEATURED_BLOCK_HOME' => array(
                'label' => $this->l('Display feature posts'),
                'type' => 'switch',
                'default' => 0,                
                'tab' => 'home',
            ),
            'YBC_BLOG_FREE_FEATURED_POST_NUMBER_HOME' => array(
                'label' => $this->l('Maximum number of feature posts displayed'),
                'type' => 'text',
                'width' => 200,
                'required' => true,
                'default' => 5,   
                'validate' => 'isInt',             
                'tab' => 'home',             
            ),
            'YBC_BLOG_FREE_SHOW_GALLERY_BLOCK_HOME' => array(
                'label' => $this->l('Display featured gallery images'),
                'type' => 'switch',
                'default' => 0,                
                'tab' => 'home',
            ),
            'YBC_BLOG_FREE_GALLERY_BLOCK_HOME_SLIDER_ENABLED' => array(
                'label' => $this->l('Enable carousel slider for featured gallery images block'),
                'type' => 'switch',
                'default' => 0,                
                'tab' => 'home',
            ),
            'YBC_BLOG_FREE_GALLERY_POST_NUMBER_HOME' => array(
                'label' => $this->l('Maximum number of featured gallery images displayed'),
                'type' => 'text',
                'width' => 200,
                'required' => true,
                'default' => 12,
                'validate' => 'isInt',                
                'tab' => 'home',             
            ),
            //MAIN BLOG PAGE
            
            'YBC_BLOG_FREE_SHOW_SLIDER' => array(
                'label' => $this->l('Display slider'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'slider',
            ),            
            'YBC_BLOG_FREE_SLIDER_AUTO_PLAY' => array(
                'label' => $this->l('Auto play slider'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'slider',
            ),
            'YBC_BLOG_FREE_SLIDER_SPEED' => array(
                'label' => $this->l('Slider speed'),
                'type' => 'text',
                'default' => 5000,       
                'validate' => 'isInt',         
                'tab' => 'slider',
                'suffix' => 'ms'
            ),
            'YBC_BLOG_FREE_SLIDER_DISPLAY_CAPTION' => array(
                'label' => $this->l('Display caption'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'slider',
            ),
            'YBC_BLOG_FREE_SLIDER_DISPLAY_NAV' => array(
                'label' => $this->l('Display control buttons'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'slider',
            ),
            //GALLERY            
            'YBC_BLOG_FREE_GALLERY_MAX_NUM' => array(
                'label' => $this->l('Number of images on gallery block'),
                'type' => 'text',
                'required' => true,
                'default' => 10,    
                'validate' => 'isInt',            
                'tab' => 'gallery',
            ),
            'YBC_BLOG_FREE_GALLERY_SLIDESHOW_ENABLED' => array(
                'label' => $this->l('Enable gallery slideshow'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'gallery',
            ),
            'YBC_BLOG_FREE_GALLERY_SKIN' => array(
                'label' => $this->l('Gallery slideshow effect'),
                'type' => 'select',                                    
				'options' => array(
        			 'query' => array( 
                            array(
                                'id_option' => 'default', 
                                'name' => $this->l('Default')
                            ),
                            array(
                                'id_option' => 'dark_square', 
                                'name' => $this->l('Dark Square')
                            ),
                            array(
                                'id_option' => 'dark_rounded', 
                                'name' => $this->l('Dark Rounded')
                            ),
                            array(
                                'id_option' => 'facebook', 
                                'name' => $this->l('Facebook')
                            ),  
                            array(
                                'id_option' => 'light_square', 
                                'name' => $this->l('Light Square')
                            ),
                            array(
                                'id_option' => 'light_rounded', 
                                'name' => $this->l('Light Rounded')
                            ),                                  
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'light_square',                
                'tab' => 'gallery',
            ),
            'YBC_BLOG_FREE_GALLERY_AUTO_PLAY' => array(
                'label' => $this->l('Auto play gallery slideshow'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'gallery',
            ),
            'YBC_BLOG_FREE_GALLERY_SPEED' => array(
                'label' => $this->l('Slideshow speed'),
                'type' => 'text',
                'default' => 5000,    
                'validate' => 'isInt',            
                'tab' => 'gallery',
                'suffix' => 'ms',
                'required' => true,  
            ),
            'YBC_BLOG_FREE_GALLERY_THUMB_WIDTH' => array(
                'label' => $this->l('Thumbnail width (px)'),
                'type' => 'text',
                'default' => 200,
                'validate' => 'isInt',
                'desc' => $this->l('Valid values: 50 - 1000'),
                'required' => true,                
                'tab' => 'gallery',
            ),
            'YBC_BLOG_FREE_GALLERY_THUMB_HEIGHT' => array(
                'label' => $this->l('Thumbnail height (px)'),
                'type' => 'text',
                'default' => 200,
                'validate' => 'isInt',
                'desc' => $this->l('Valid values: 50 - 1000'),
                'required' => true,                
                'tab' => 'gallery',
            ),
            
            //BLOG SINGLE PAGE
            'YBC_BLOG_FREE_SHOW_RELATED_PRODUCTS' => array(
                'label' => $this->l('Display related products'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'blog',
            ),
            'YBC_RELATED_PRODUCTS_TYPE' => array(
                'label' => $this->l('Type of related products'),
                'type' => 'select',                                        
				'options' => array(
        			 'query' => array(                            
                            array(
                                'id_option' => 'carousel', 
                                'name' => $this->l('Carousel slider')
                            ),
                            array(
                                'id_option' => 'default', 
                                'name' => $this->l('List')
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name'  
                ),    
                'default' => 'carousel',                
                'tab' => 'blog',
            ),
            'YBC_BLOG_FREE_DISPLAY_RELATED_POSTS' => array(
                'label' => $this->l('Display related posts'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'blog',
                'desc' => $this->l('Posts with the same post tags'),
            ),
            'YBC_BLOG_FREE_RELATED_POST_NUMBER' => array(
                'label' => $this->l('Number of related posts displayed'),
                'type' => 'text',
                'default' => 5,  
                'validate' => 'isInt',              
                'tab' => 'blog',
                'required' => true,
            ),
            'YBC_RELATED_POSTS_TYPE' => array(
                'label' => $this->l('Type of related posts block'),
                'type' => 'select',                                        
				'options' => array(
        			 'query' => array(                             
                            array(
                                'id_option' => 'carousel', 
                                'name' => $this->l('Carousel slider')
                            ),
                            array(
                                'id_option' => 'default', 
                                'name' => $this->l('List')
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name',  
                ),    
                'default' => 'carousel',                
                'tab' => 'blog',
            ),            
            'YBC_BLOG_FREE_ENABLE_POST_SLIDESHOW' => array(
                'label' => $this->l('Enable post image popup'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'blog',
            ), 
            //POST FEATURES
            'YBC_BLOG_FREE_ALLOW_LIKE' => array(
                'label' => $this->l('Enable post likes'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'comment',
            ),
            'YBC_BLOG_FREE_GUEST_LIKE' => array(
                'label' => $this->l('Allow guests to like posts'),
                'type' => 'switch',
                'default' => 0,                
                'tab' => 'comment',
            ),
            'YBC_BLOG_FREE_ALLOW_COMMENT' => array(
                'label' => $this->l('Allow comments'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'comment',
            ),
            'YBC_BLOG_FREE_ALLOW_GUEST_COMMENT' => array(
                'label' => $this->l('Allow guests comments'),
                'type' => 'switch',
                'default' => 0,                
                'tab' => 'comment',
            ),
            'YBC_BLOG_FREE_USE_CAPCHA' => array(
                'label' => $this->l('Use capcha security for comment'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'comment',
            ),
            'YBC_BLOG_FREE_COMMENT_AUTO_APPROVED' => array(
                'label' => $this->l('Auto approved comments'),
                'type' => 'switch',
                'default' => 0,                
                'tab' => 'comment',
            ),
            'YBC_BLOG_FREE_MAX_COMMENT' => array(
                'label' => $this->l('Maximum number of latest comments displayed'),
                'type' => 'text',
                'default' => 50,
                'validate' => 'isInt',
                'required' => true,
                'desc' => $this->l('Set 0 if you want to show all comments of each post'),                
                'tab' => 'comment',
            ),
            'YBC_BLOG_FREE_ALLOW_REPORT' => array(
                'label' => $this->l('Allow vistor to report a comment'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'comment',
            ),
            'YBC_BLOG_FREE_ALLOW_RATING' => array(
                'label' => $this->l('Allow vistor to rate a post in their comment'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'comment',
            ),
            'YBC_BLOG_FREE_DEFAULT_RATING' => array(
                'label' => $this->l('Default rating'),
                'type' => 'text',
                'default' => 5,
                'validate' => 'isInt',
                'required' => true,                
                'tab' => 'comment',
            ),            
            'YBC_BLOG_FREE_ENABLE_FACEBOOK_SHARE' => array(
                'label' => $this->l('Enable Facebook share'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'social',
            ),
            'YBC_BLOG_FREE_ENABLE_GOOGLE_SHARE' => array(
                'label' => $this->l('Enable Google Plus share'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'social',
            ),
            'YBC_BLOG_FREE_ENABLE_TWITTER_SHARE' => array(
                'label' => $this->l('Enable Twitter share'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'social',
            ),   
            'YBC_BLOG_FREE_SHOW_POST_VIEWS' => array(
                'label' => $this->l('Show post views'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'blog',
            ),    
            'YBC_BLOG_FREE_SHOW_POST_DATE' => array(
                'label' => $this->l('Show post publish date'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'blog',
            ),
            'YBC_BLOG_FREE_SHOW_POST_AUTHOR' => array(
                'label' => $this->l('Show post author'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'blog',
            ),
            'YBC_BLOG_FREE_SHOW_POST_TAGS' => array(
                'label' => $this->l('Show post tags'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'blog',
            ),
            'YBC_BLOG_FREE_SHOW_POST_CATEGORIES' => array(
                'label' => $this->l('Show post categories'),
                'type' => 'switch',
                'default' => 1,                
                'tab' => 'blog',
            ),  
            //BLOG LISTING PAGES       
            'YBC_BLOG_FREE_ITEMS_PER_PAGE' => array(
                'label' => $this->l('Number of posts per page on main page'),
                'type' => 'text',
                'width' => 200,
                'validate' => 'isInt',
                'required' => true,
                'default' => 20,                
                'tab' => 'blog',             
            ),
            'YBC_BLOG_FREE_ITEMS_PER_PAGE_INNER' => array(
                'label' => $this->l('Number of posts per page on inner pages'),
                'type' => 'text',
                'width' => 200,
                'validate' => 'isInt',
                'required' => true,
                'default' => 20,                
                'tab' => 'blog',             
            ),    
            'YBC_BLOG_FREE_POST_EXCERPT_LENGTH' => array(
                'label' => $this->l('Post excerpt length'),
                'type' => 'text',
                'width' => 200,
                'validate' => 'isInt',
                'required' => true,
                'default' => 120,                
                'tab' => 'blog',             
            ), 
            'YBC_BLOG_FREE_RTL_MODE' => array(
                'label' => $this->l('RTL mode'),
                'type' => 'select',                                     
				'options' => array(
        			 'query' => array(                             
                            array(
                                'id_option' => 'auto', 
                                'name' => $this->l('Auto detect')
                            ),
                            array(
                                'id_option' => 'rtl', 
                                'name' => $this->l('RTL')
                            ),
                            array(
                                'id_option' => 'ltr', 
                                'name' => $this->l('LTR')
                            ),
                        ),                             
                     'id' => 'id_option',
        			 'name' => 'name',  
                ),    
                'default' => 'auto',                
                'tab' => 'general',
            ),  
            'YBC_BLOG_FREE_GALLERY_PER_PAGE' => array(
                'label' => $this->l('Number of image per page'),
                'type' => 'text',
                'width' => 200,
                'required' => true,
                'default' => 24,
                'validate' => 'isInt',                
                'tab' => 'gallery',             
            ),                                     
        );
        if(Module::isInstalled('ybc_blog_free') && Module::isEnabled('ybc_blog_free'))
        Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'ybc_blog_free_post SET enabled=1 WHERE datetime_active!="0000-00-00" AND enabled=0 AND datetime_active<=NOW()');
        //die('UPDATE '._DB_PREFIX_.'ybc_blog_free_post SET enabled=1 WHERE datetime_active!="0000-00-00" AND enabled=0 AND datetime_active<=NOW()');
        if(!$this->is17 && isset($this->configs['YBC_BLOG_FREE_SIDEBAR_POSITION']))
            unset($this->configs['YBC_BLOG_FREE_SIDEBAR_POSITION']);
        $this->blogDir = $this->_path;  
        $this->alias = Configuration::get('YBC_BLOG_FREE_ALIAS',$this->context->language->id);
        $this->friendly = (int)Configuration::get('YBC_BLOG_FREE_FRIENDLY_URL') && (int)Configuration::get('PS_REWRITING_SETTINGS') ? true : false;
        
        $this->setMetas();
        
        
    }
    
    /**
	 * @see Module::install()
	 */
    public function install()
	{
	    return parent::install()        
        && $this->registerHook('displayLeftColumn')
        && $this->registerHook('displayBackOfficeHeader') 
        && $this->registerHook('displayHome') 
        && $this->registerHook('displayHeader')
        && $this->registerHook('displayFooter')
        && $this->registerHook('blogSearchBlock')
        && $this->registerHook('blogTagsBlock')
        && $this->registerHook('blogNewsBlock')
        && $this->registerHook('blogCategoriesBlock')
        && $this->registerHook('blogSlidersBlock')
        && $this->registerHook('blogGalleryBlock')
        && $this->registerHook('blogPopularPostsBlock')
        && $this->registerHook('moduleRoutes')
        && $this->registerHook('blogSidebar')
        && $this->registerHook('blogFeaturedPostsBlock')
        && $this->_installDb()
        && $this->_installTabs();
        
    }    
    /**
	 * @see Module::uninstall()
	 */
	public function uninstall()
	{
        return parent::uninstall() && $this->_uninstallDb() && $this->_uninstallTabs();
    }
    private function _installDb()
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
                    Configuration::updateValue($key, $values);
                }
                else
                    Configuration::updateValue($key, isset($config['default']) ? $config['default'] : '');
            }
        }
        //Install db structure
        require_once(dirname(__FILE__).'/install/sql.php');
        require_once(dirname(__FILE__).'/install/data.php');    
        //$import = new ImportExport();
        //$import->importData();
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
        $tbls = array('post', 'post_lang', 'post_category', 'category', 'category_lang', 'comment', 'gallery', 'gallery_lang', 'tag', 'slide', 'slide_lang');
        foreach($tbls as $tbl)
        {
            Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'ybc_blog_free_'.$tbl.'`');
        }
        
        $dirs = array('post','category','slide','gallery','post/thumb','gallery/thumb');
        foreach($dirs as $dir)
        {
            $files = glob(dirname(__FILE__).'/views/img/'.$dir.'/*'); 
            foreach($files as $file){ 
              if(is_file($file) && $file!=dirname(__FILE__).'/views/img/'.$dir.'/index.php')
                @unlink($file); 
            }
        }        
        return true;
    }
    public function getContent()
	{
	   $this->baseAdminPath = $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
	   $this->context->controller->addJqueryPlugin('tagify');
	   $control = trim(Tools::getValue('control'));
       if(!$control)
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=post&list=true');
       //Process post
       if($control=='category')
       {
            $this->_postCategory();   
       }
       elseif($control=='post')
       {
            $this->_postPost();   
       }
       elseif($control=='config')
       {
            $this->_postConfig();   
       }      
       elseif($control=='comment')
       {
            $this->_postComment();   
       }
       elseif($control=='gallery')
       {
            $this->_postGallery();   
       }
       elseif($control=='slide')
       {
            $this->_postSlide();   
       }
       elseif($control=='export')
       {
            $this->_postExport();
       }
       return $this->getAminHtml($control).$this->displayIframe();
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
    public function renderAdminBodyHtml($control)
    {
       if($control=='category')
       {
            $this->renderCategoryForm();   
       }
       elseif($control=='post')
       {
            $this->renderPostForm();   
       }
       elseif($control=='config')
       {
            $this->renderConfig();   
       }
       elseif($control=='comment')
       {
            $this->renderCommentsForm();   
       }
       elseif($control=='gallery')
       {
            $this->renderGalleryForm();   
       }
       elseif($control=='slide')
       {
            $this->renderSlideForm();   
       }
       elseif($control=='export')
       {
            $this->renderExportForm();   
       }
       return $this->_html;
    }
    public function getAminHtml($control)
    {       
        $this->smarty->assign(array(
            'ybc_blog_free_ajax_url' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&ajaxproductsearch=true',
            'ybc_blog_free_default_lang' => Configuration::get('PS_LANG_DEFAULT'),
            'ybc_blog_free_is_updating' => Tools::getValue('id_post') || Tools::getValue('id_category') ? 1 :  0,
            'ybc_blog_free_is_config_page' => Tools::getValue('control') == 'config' ? 1 : 0,
            'ybc_blog_free_invalid_file' => $this->l('Invalid file'),
            'ybc_blog_free_module_dir' => $this->_path,
            'ybc_blog_free_sidebar' => $this->renderSidebar(),
            'ybc_blog_free_body_html' => $this->renderAdminBodyHtml($control),
            'ybc_blog_free_error_message' => $this->errorMessage,
        ));
        return $this->display(__FILE__, 'admin.tpl');
    }
        
    /**
     * Category 
     */
    
    public function renderCategoryForm()
    {
        $this->baseAdminPath = $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        //List 
        if(trim(Tools::getValue('list'))=='true')
        {
            $fields_list = array(
                'id_category' => array(
                    'title' => $this->l('Id'),
                    'width' => 40,
                    'type' => 'text',
                    'sort' => true,
                    'filter' => true,
                ),
                'title' => array(
                    'title' => $this->l('Name'),
                    'width' => 140,
                    'type' => 'text',
                    'sort' => true,
                    'filter' => true
                ),
                'description' => array(
                    'title' => $this->l('Description'),
                    'width' => 140,
                    'type' => 'text',
                    'sort' => true,
                    'filter' => true
                ),
                'sort_order' => array(
                    'title' => $this->l('Sort order'),
                    'width' => 40,
                    'type' => 'text',
                    'sort' => true,
                    'filter' => true,
                ),
                'enabled' => array(
                    'title' => $this->l('Enabled'),
                    'width' => 80,
                    'type' => 'active',
                    'sort' => true,
                    'filter' => true,
                    'strip_tag' => false,
                    'filter_list' => array(
                        'id_option' => 'enabled',
                        'value' => 'title',
                        'list' => array(
                            0 => array(
                                'enabled' => 1,
                                'title' => $this->l('Yes')
                            ),
                            1 => array(
                                'enabled' => 0,
                                'title' => $this->l('No')
                            )
                        )
                    )
                ),
            );
            //Filter
            $filter = "";
            if(trim(Tools::getValue('id_category'))!='')
                $filter .= " AND c.id_category = ".(int)trim(urldecode(Tools::getValue('id_category')));
            if(trim(Tools::getValue('sort_order'))!='')
                $filter .= " AND c.sort_order = ".(int)trim(urldecode(Tools::getValue('sort_order')));
            if(trim(Tools::getValue('title'))!='')
                $filter .= " AND cl.title like '%".addslashes(trim(urldecode(Tools::getValue('title'))))."%'";
            if(trim(Tools::getValue('description'))!='')
                $filter .= " AND cl.description like '%".addslashes(trim(urldecode(Tools::getValue('description'))))."%'";
             if(trim(Tools::getValue('enabled'))!='')
                $filter .= " AND c.enabled =".(int)Tools::getValue('enabled');
            
            //Sort
            $sort = "";
            if(trim(Tools::getValue('sort')) && isset($fields_list[Tools::getValue('sort')]))
            {
                $sort .= trim(Tools::getValue('sort'))." ".(Tools::getValue('sort_type')=='asc' ? ' ASC ' :' DESC ')." , ";
            }
            else
                $sort = false;
            
            //Paggination
            $page = (int)Tools::getValue('page') && (int)Tools::getValue('page') > 0 ? (int)Tools::getValue('page') : 1;
            $totalRecords = (int)$this->countCategoriesWithFilter($filter);
            $paggination = new Ybc_blog_free_paggination_class();
            $paggination->total = $totalRecords;
            $paggination->url = $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=category&list=true&page=_page_'.$this->getUrlExtra($fields_list);
            $paggination->limit =  20;
            $totalPages = ceil($totalRecords / $paggination->limit);
            if($page > $totalPages)
                $page = $totalPages;
            $paggination->page = $page;
            $start = $paggination->limit * ($page - 1);
            if($start < 0)
                $start = 0;
            $categories = $this->getCategoriesWithFilter($filter, $sort, $start, $paggination->limit);
            if($categories)
            {
                foreach($categories as &$cat)
                {
                    $cat['view_url'] = $this->getLink('blog',array('id_category' => $cat['id_category']));
                }
            }
            $paggination->text =  $this->l('Showing {start} to {end} of {total} ({pages} Pages)');
            $paggination->style_links = $this->l('links');
            $paggination->style_results = $this->l('results');
            $listData = array(
                'name' => 'ybc_category',
                'actions' => array('edit', 'delete', 'view'),
                'currentIndex' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=category',
                'identifier' => 'id_category',
                'show_toolbar' => true,
                'show_action' => true,
                'title' => $this->l('Blog categories'),
                'fields_list' => $fields_list,
                'field_values' => $categories,
                'paggination' => $paggination->render(),
                'filter_params' => $this->getFilterParams($fields_list),
                'show_reset' =>trim(Tools::getValue('sort_order'))!='' || trim(Tools::getValue('enabled'))!='' || trim(Tools::getValue('id_category'))!='' || trim(Tools::getValue('description'))!='' || trim(Tools::getValue('title'))!='' ? true : false,
                'totalRecords' => $totalRecords
            );            
            return $this->_html .= $this->renderList($listData);      
        }
        //Form
        
        $fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Manage blog categories'),				
				),
				'input' => array(					
					array(
						'type' => 'text',
						'label' => $this->l('Category title'),
						'name' => 'title',
						'lang' => true,    
                        'required' => true,                    
					), 
                    array(
						'type' => 'textarea',
						'label' => $this->l('Meta description'),
						'name' => 'meta_description',
                        'lang' => true,
                        'hint' => $this->l('Invalid characters:').' &lt;&gt;;=#{}'						
					),
                    array(
						'type' => 'tags',
						'label' => $this->l('Meta keywords'),
						'name' => 'meta_keywords',
                        'lang' => true,
                        'hint' => array(
    						$this->l('To add "keywords" click in the field, write something, and then press "Enter."'),
    						$this->l('Invalid characters:').' &lt;&gt;;=#{}'
    					)						
					),
                    array(
						'type' => 'textarea',
						'label' => $this->l('Description'),
						'name' => 'description',
						'lang' => true,  
                        'autoload_rte' => true                      
					),
					array(
						'type' => 'text',
						'label' => $this->l('Url alias'),
						'name' => 'url_alias',
                        'required' => true,
                        'lang'=>true,						
					),
                    array(
						'type' => 'file',
						'label' => $this->l('Image'),
						'name' => 'image',
                        'desc' => $this->l('Recommended size: 1920x750'),               						
					),
                    array(
						'type' => 'text',
						'label' => $this->l('Sort order'),
						'name' => 'sort_order',
                        'required' => true						
					),
                    array(
						'type' => 'switch',
						'label' => $this->l('Enabled'),
						'name' => 'enabled',
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
						)					
					),
                    array(
                        'type' => 'hidden', 
                        'name' => 'control'
                    )
                ),
                'submit' => array(
					'title' => $this->l('Save'),
				)
            ),
		);
        $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->module = $this;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'saveCategory';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->tpl_vars = array(
			'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
            'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL'),
			'fields_value' => $this->getFieldsValues($this->categoryFields,'id_category','Ybc_blog_free_category_class','saveCategory'),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
			'image_baseurl' => $this->_path.'views/img/',
            'link' => $this->context->link,
            'cancel_url' => $this->baseAdminPath.'&control=category&list=true',
            'post_key' => 'id_category',
            'addNewUrl' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=category',
		);
        
        if(Tools::isSubmit('id_category') && $this->itemExists('category','id_category',(int)Tools::getValue('id_category')))
        {
            
            $fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_category');
            $category = new Ybc_blog_free_category_class((int)Tools::getValue('id_category'));
            if($category->image)
            {             
                $helper->tpl_vars['display_img'] = $this->_path.'views/img/category/'.$category->image;
                $helper->tpl_vars['img_del_link'] = $this->baseAdminPath.'&id_category='.Tools::getValue('id_category').'&delcategoryimage=true&control=category';                
            }
        }
        
		$helper->override_folder = '/';
        $this->_html .= $helper->generateForm(array($fields_form));			
    }
    private function _postCategory()
    {
        $errors = array();
        $id_category = (int)Tools::getValue('id_category');
        if($id_category && !$this->itemExists('category','id_category',$id_category) && !Tools::isSubmit('list'))
            Tools::redirectAdmin($this->baseAdminPath);
        /**
         * Change status 
         */
         if(Tools::isSubmit('change_enabled'))
         {
            $status = (int)Tools::getValue('change_enabled') ?  1 : 0;
            $field = Tools::getValue('field');
            $id_category = (int)Tools::getValue('id_category');            
            if(($field == 'enabled' && $id_category))
            {
                $this->changeStatus('category',$field,$id_category,$status);
                if(Tools::isSubmit('ajax'))
                {
                    die(json_encode(array(
                        'listId' => $id_category,
                        'enabled' => $status,
                        'field' => $field,
                        'href' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=category&change_enabled='.($status ? '0' : '1').'&field='.$field.'&id_category='.$id_category,
                    )));
                }
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=category&list=true');
            }
         }
        /**
         * Delete image 
         */         
         if($id_category && $this->itemExists('category','id_category',$id_category) && Tools::isSubmit('delcategoryimage'))
         {
            $category = new Ybc_blog_free_category_class($id_category);
            $icoUrl = dirname(__FILE__).'/views/img/category/'.$category->image; 
            if($category->image && file_exists($icoUrl))
            {
                @unlink($icoUrl);
                $category->image = '';
                $category->datetime_modified = date('Y-m-d H:i:s');
                $category->modified_by = (int)$this->context->employee->id;
                $category->update();  
                if(Tools::isSubmit('ajax'))
                {
                    die(json_encode(
                        array(
                            'messageType' => 'success',
                            'message' => $this->displayConfirmation($this->l('Category image deleted')),
                        )
                    ));
                }                 
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_category='.$id_category.'&control=category');
            }
            else
                $errors[] = $this->l('Image does not exist');   
         }
        /**
         * Delete category 
         */ 
         if(Tools::isSubmit('del'))
         {
            $id_category = (int)Tools::getValue('id_category');
            if(!$this->itemExists('category','id_category',$id_category))
                $errors[] = $this->l('Category does not exist');
            elseif($this->_deleteCategory($id_category))
            {                
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=category&list=true');
            }                
            else
                $errors[] = $this->l('Could not delete the category. Please try again');    
         }                  
        /**
         * Save category 
         */
        if(Tools::isSubmit('saveCategory'))
        {            
            if($id_category && $this->itemExists('category','id_category',$id_category))
            {
                $category = new Ybc_blog_free_category_class($id_category);
                $category->datetime_modified = date('Y-m-d H:i:s');
                $category->modified_by = (int)$this->context->employee->id;
            }
            else
            {
                $category = new Ybc_blog_free_category_class();
                $category->datetime_added = date('Y-m-d H:i:s');
                $category->datetime_modified = date('Y-m-d H:i:s');
                $category->modified_by = (int)$this->context->employee->id;
                $category->added_by = (int)$this->context->employee->id;
            }
            $category->enabled = trim(Tools::getValue('enabled',1)) ? 1 : 0;
            $category->sort_order = (int)trim(Tools::getValue('sort_order',1));
            $languages = Language::getLanguages(false);
            foreach ($languages as $language)
			{			
			    $category->title[$language['id_lang']] = trim(Tools::getValue('title_'.$language['id_lang'])) != '' ? trim(Tools::getValue('title_'.$language['id_lang'])) :  trim(Tools::getValue('title_'.Configuration::get('PS_LANG_DEFAULT')));
                $category->url_alias[$language['id_lang']] = trim(Tools::getValue('url_alias_'.$language['id_lang'])) != '' ? trim(Tools::getValue('url_alias_'.$language['id_lang'])) :  trim(Tools::getValue('url_alias_'.Configuration::get('PS_LANG_DEFAULT')));
                if($category->title[$language['id_lang']] && !Validate::isCleanHtml($category->title[$language['id_lang']]))
                    $errors[] = $this->l('Title in '.$language['name'].' is not valid');
                $category->meta_description[$language['id_lang']] = trim(Tools::getValue('meta_description_'.$language['id_lang'])) != '' ? trim(Tools::getValue('meta_description_'.$language['id_lang'])) :  trim(Tools::getValue('meta_description_'.Configuration::get('PS_LANG_DEFAULT')));
                if($category->meta_description[$language['id_lang']] && !Validate::isCleanHtml($category->meta_description[$language['id_lang']], true))
                    $errors[] = $this->l('Meta description in '.$language['name'].' is not valid');
                $category->meta_keywords[$language['id_lang']] = trim(Tools::getValue('meta_keywords_'.$language['id_lang'])) != '' ? trim(Tools::getValue('meta_keywords_'.$language['id_lang'])) :  trim(Tools::getValue('meta_keywords_'.Configuration::get('PS_LANG_DEFAULT')));
                if($category->meta_keywords[$language['id_lang']] && !Validate::isTagsList($category->meta_keywords[$language['id_lang']], true))
                    $errors[] = $this->l('Meta keywords in '.$language['name'].' is not valid');
                $category->description[$language['id_lang']] = trim(Tools::getValue('description_'.$language['id_lang'])) != '' ? trim(Tools::getValue('description_'.$language['id_lang'])) :  trim(Tools::getValue('description_'.Configuration::get('PS_LANG_DEFAULT')));
                if($category->description[$language['id_lang']] && !Validate::isCleanHtml($category->description[$language['id_lang']], true))
                    $errors[] = $this->l('Description in '.$language['name'].' is not valid');                	
            }
            
            if(Tools::getValue('title_'.Configuration::get('PS_LANG_DEFAULT'))=='')
                $errors[] = $this->l('You need to set blog category title');                    
            if($category->url_alias[Configuration::get('PS_LANG_DEFAULT')]=='')
                $errors[] = $this->l('Url alias is required');
            if(Tools::getValue('sort_order')=='')
                $errors[] = $this->l('Sort order is required');
            elseif(!Validate::isInt(Tools::getValue('sort_order')))
                $errors[] = $this->l('Sort order is not valid');
            /**
             * Upload image 
             */  
            $oldImage = false;
            $newImage = false;       
            if(isset($_FILES['image']['tmp_name']) && isset($_FILES['image']['name']) && $_FILES['image']['name'])
            {
                if(file_exists(dirname(__FILE__).'/views/img/category/'.$_FILES['image']['name']))
                {
                    $_FILES['image']['name'] = sha1(microtime()).'-'.$_FILES['image']['name'];
                }
                
                $type = Tools::strtolower(Tools::substr(strrchr($_FILES['image']['name'], '.'), 1));
    			$imagesize = @getimagesize($_FILES['image']['tmp_name']);
    			if (isset($_FILES['image']) &&				
    				!empty($_FILES['image']['tmp_name']) &&
    				!empty($imagesize) &&
    				in_array($type, array('jpg', 'gif', 'jpeg', 'png'))
    			)
    			{
    				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');    				
    				if ($error = ImageManager::validateUpload($_FILES['image']))
    					$errors[] = $error;
    				elseif (!$temp_name || !move_uploaded_file($_FILES['image']['tmp_name'], $temp_name))
    					$errors[] = $this->l('Can not upload the file');
    				elseif (!ImageManager::resize($temp_name, dirname(__FILE__).'/views/img/category/'.$_FILES['image']['name'], null, null, $type))
    					$errors[] = $this->displayError($this->l('An error occurred during the image upload process.'));
    				if (isset($temp_name))
    					@unlink($temp_name);
                    if($category->image)
                        $oldImage = dirname(__FILE__).'/views/img/category/'.$category->image;
                    $category->image = $_FILES['image']['name'];
                    $newImage = dirname(__FILE__).'/views/img/category/'.$category->image;			
    			}
                
            }			
            
            /**
             * Save 
             */    
             
            if(!$errors)
            {
                if (!Tools::getValue('id_category'))
    			{
    				if (!$category->add())
                    {
                        $errors[] = $this->displayError($this->l('The category could not be added.'));
                        if($newImage && file_exists($newImage))
                        @unlink($newImage);                    
                    }
                    else
                    {
                        $id_category = $this->getMaxId('category','id_category');
                    }                	                    
    			}				
    			elseif (!$category->update())
                {
                    if($newImage && file_exists($newImage))
                        @unlink($newImage); 
                    $errors[] = $this->displayError($this->l('The category could not be updated.'));
                }
                else
                {
                    if($oldImage && file_exists($oldImage))
                    @unlink($oldImage); 
                }
    					                
            }
         }
         if (count($errors))
         {
            if($newImage && file_exists($newImage))
                @unlink($newImage); 
            $this->errorMessage = $this->displayError($errors);  
         }
         $changedImages = array();
         if(!$errors && isset($newImage) && $newImage && file_exists($newImage) && isset($category) && $category){
                $changedImages[] = array(
                    'name' => 'image',
                    'url' => $this->_path.'views/img/category/'.$category->image,
                    'delete_url' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_category='.Tools::getValue('id_category').'&delcategoryimage=true&control=category',
                );
            }         
         if(Tools::isSubmit('ajax'))
            {
                die(json_encode(
                    array(
                        'messageType' => $errors ? 'error' : 'success',
                        'message' => $errors ? $this->errorMessage : (isset($id_category) && $id_category ? $this->displaySuccessMessage($this->l('Category updated'),$this->l('View category'),$this->getLink('blog',array('id_category'=>$id_category))) : $this->displayConfirmation($this->l('Category updated'))),
                        'images' => isset($changedImages) && $changedImages ? $changedImages : array(),
                        'postUrl' => !$errors && Tools::isSubmit('saveCategory') && !(int)Tools::getValue('id_category') ? $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_category='.$this->getMaxId('category','id_category').'&control=category' : 0,
                        'itemKey' => 'id_category',
                        'itemId' => !$errors && Tools::isSubmit('saveCategory') && !(int)Tools::getValue('id_category') ? $this->getMaxId('category','id_category') : ((int)Tools::getValue('id_category') > 0 ? (int)Tools::getValue('id_category') : 0),
                    )
                ));
            } 
         if (Tools::isSubmit('saveCategory') && Tools::isSubmit('id_category'))
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_category='.Tools::getValue('id_category').'&control=category');
		 elseif (Tools::isSubmit('saveCategory'))
         {
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=3&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_category='.$this->getMaxId('category','id_category').'&control=category');
         }
    }
    public function displaySuccessMessage($msg, $title = false, $link = false)
    {
         $this->smarty->assign(array(
            'msg' => $msg,
            'title' => $title,
            'link' => $link
         ));
         if($msg)
            return $this->displayConfirmation($this->display(__FILE__, 'success_message.tpl'));
    }
    private function _deleteCategory($id_category)
    {
        if($this->itemExists('category','id_category',$id_category))
        {
            $category = new Ybc_blog_free_category_class($id_category);
            if($category->image && file_exists(dirname(__FILE__).'/views/img/category/'.$category->image))
            {
                @unlink(dirname(__FILE__).'/views/img/category/'.$category->image);
            }            
            if($category->delete())
            {                                
                $posts = $this->getPostsByIdCategory($id_category);
                if($posts)
                {
                    foreach($posts as $post)
                    {
                        if($this->itemExists('post','id_post',$post['id_post']))
                        {
                            $categories = $this->getCategoriesByIdPost($post['id_post']);
                            if(count($categories) <= 1)
                            {
                                $this->_deletePost($post['id_post']);
                            }
                        }
                    }
                }
                $req = "DELETE FROM "._DB_PREFIX_."ybc_blog_free_post_category WHERE id_category=".(int)$id_category;
                Db::getInstance()->execute($req);
                return true;
            }
        }
        return false;        
    }    
    
    /**
     * Post 
     */
    public function renderPostForm()
    {
        //List 
        if(trim(Tools::getValue('list'))=='true')
        {
            $fields_list = array(
                'id_post' => array(
                    'title' => $this->l('Id'),
                    'width' => 40,
                    'type' => 'text',
                    'sort' => true,
                    'filter' => true,
                ),
                'title' => array(
                    'title' => $this->l('Name'),
                    'width' => 100,
                    'type' => 'text',
                    'sort' => true,
                    'filter' => true
                ),
                'id_category' => array(
                    'title' => $this->l('Category'),
                    'width' => 100,
                    'type' => 'select',
                    'sort' => true,
                    'filter' => true,
                    'strip_tag' => false,
                    'filter_list' => array(
                        'id_option' => 'id_category',
                        'value' => 'title',
                        'list' => $this->getCategories()
                    )
                ),
                'sort_order' => array(
                    'title' => $this->l('Sort order'),
                    'width' => 40,
                    'type' => 'text',
                    'sort' => true,
                    'filter' => true,
                ),
                'click_number' => array(
                    'title' => $this->l('Views'),
                    'width' => 40,
                    'type' => 'text',
                    'sort' => true,
                    'filter' => true,
                ),
                'likes' => array(
                    'title' => $this->l('Likes'),
                    'width' => 40,
                    'type' => 'text',
                    'sort' => true,
                    'filter' => true,
                ),
                'enabled' => array(
                    'title' => $this->l('Enabled'),
                    'width' => 80,
                    'type' => 'active',
                    'sort' => true,
                    'filter' => true,
                    'strip_tag' => false,
                    'filter_list' => array(
                        'id_option' => 'enabled',
                        'value' => 'title',
                        'list' => array(
                            0 => array(
                                'enabled' => 1,
                                'title' => $this->l('Yes')
                            ),
                            1 => array(
                                'enabled' => 0,
                                'title' => $this->l('No')
                            )
                        )
                    )
                ),
                'is_featured' => array(
                    'title' => $this->l('Featured'),
                    'width' => 80,
                    'type' => 'active',
                    'sort' => true,
                    'filter' => true,
                    'strip_tag' => false,
                    'filter_list' => array(
                        'id_option' => 'is_featured',
                        'value' => 'title',
                        'list' => array(
                            0 => array(
                                'is_featured' => 1,
                                'title' => $this->l('Yes')
                            ),
                            1 => array(
                                'is_featured' => 0,
                                'title' => $this->l('No')
                            )
                        )
                    )
                ),
            );
            //Filter
            $filter = "";
            if(trim(Tools::getValue('id_post'))!='')
                $filter .= " AND p.id_post = ".(int)trim(urldecode(Tools::getValue('id_post')));
            if(trim(Tools::getValue('sort_order'))!='')
                $filter .= " AND p.sort_order = ".(int)trim(urldecode(Tools::getValue('sort_order')));
            if(trim(Tools::getValue('click_number'))!='')
                $filter .= " AND p.click_number = ".(int)trim(urldecode(Tools::getValue('click_number')));
            if(trim(Tools::getValue('likes'))!='')
                $filter .= " AND p.likes = ".(int)trim(urldecode(Tools::getValue('likes')));            
            if(trim(Tools::getValue('title'))!='')
                $filter .= " AND pl.title like '%".addslashes(trim(urldecode(Tools::getValue('title'))))."%'";
            if(trim(Tools::getValue('description'))!='')
                $filter .= " AND pl.description like '%".addslashes(trim(urldecode(Tools::getValue('description'))))."%'";
            if(trim(Tools::getValue('id_category'))!='')
                $filter .= " AND p.id_post IN (SELECT id_post FROM "._DB_PREFIX_."ybc_blog_free_post_category WHERE id_category = ".(int)trim(urldecode(Tools::getValue('id_category'))).") ";
            if(trim(Tools::getValue('enabled'))!='')
                $filter .= " AND p.enabled = ".(int)trim(urldecode(Tools::getValue('enabled')));
            if(trim(Tools::getValue('is_featured'))!='')
                $filter .= " AND p.is_featured = ".(int)trim(urldecode(Tools::getValue('is_featured')));
            
            //Sort
            $sort = "";
            if(trim(Tools::getValue('sort')) && isset($fields_list[Tools::getValue('sort')]))
            {
                $sort .= trim(Tools::getValue('sort'))." ".(Tools::getValue('sort_type')=='asc' ? ' ASC ' :' DESC ')." , ";
            }
            else
                $sort = false;
            
            //Paggination
            $page = (int)Tools::getValue('page') && (int)Tools::getValue('page') > 0 ? (int)Tools::getValue('page') : 1;
            $totalRecords = (int)$this->countPostsWithFilter($filter);
            $paggination = new Ybc_blog_free_paggination_class();
            $paggination->total = $totalRecords;
            $paggination->url = $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=post&list=true&page=_page_'.$this->getUrlExtra($fields_list);
            $paggination->limit =  20;
            $totalPages = ceil($totalRecords / $paggination->limit);
            if($page > $totalPages)
                $page = $totalPages;
            $paggination->page = $page;
            $start = $paggination->limit * ($page - 1);
            if($start < 0)
                $start = 0;
            $posts = $this->getPostsWithFilter($filter, $sort, $start, $paggination->limit);            
            if($posts)
            {
                foreach($posts as &$post)
                {
                    $post['id_category'] = $this->getCategoriesStrByIdPost($post['id_post']);
                    $post['view_url'] = $this->getLink('blog',array('id_post'=>$post['id_post']));
                }
                    
            }
            $paggination->text =  $this->l('Showing {start} to {end} of {total} ({pages} Pages)');
            $paggination->style_links = $this->l('links');
            $paggination->style_results = $this->l('results');
            $listData = array(
                'name' => 'ybc_post',
                'actions' => array('edit', 'delete', 'view'),
                'currentIndex' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=post',
                'identifier' => 'id_post',
                'show_toolbar' => true,
                'show_action' => true,
                'title' => $this->l('Blog posts'),
                'fields_list' => $fields_list,
                'field_values' => $posts,
                'paggination' => $paggination->render(),
                'filter_params' => $this->getFilterParams($fields_list),
                'show_reset' => trim(Tools::getValue('likes'))!='' || trim(Tools::getValue('sort_order'))!='' || trim(Tools::getValue('click_number'))!='' || trim(Tools::getValue('enabled'))!='' || trim(Tools::getValue('is_featured'))!='' ||  trim(Tools::getValue('id_category'))!=''  ||  trim(Tools::getValue('id_post'))!='' || trim(Tools::getValue('description'))!='' || trim(Tools::getValue('title'))!='' ? true : false,
                'totalRecords' => $totalRecords,
                'preview_link' => $this->getLink('blog')                
            );            
            return $this->_html .= $this->renderList($listData);      
        }
        //Form
        $fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Manage blog posts'),				
				),
				'input' => array(					
					array(
						'type' => 'text',
						'label' => $this->l('Post title'),
						'name' => 'title',
						'lang' => true,    
                        'required' => true, 
					    'hint' => $this->l('Invalid characters:').' &lt;&gt;;=#{}'                   
					),
                    array(
						'type' => 'textarea',
						'label' => $this->l('Meta description'),
						'name' => 'meta_description',
                        'lang' => true,
                        'hint' => $this->l('Invalid characters:').' &lt;&gt;;=#{}'						
					),
                    array(
						'type' => 'tags',
						'label' => $this->l('Meta keywords'),
						'name' => 'meta_keywords',
                        'lang' => true,
                        'hint' => array(
    						$this->l('To add "keywords" click in the field, write something, and then press "Enter."'),
    						$this->l('Invalid characters:').' &lt;&gt;;=#{}'
    					)						
					),
                    array(
						'type' => 'text',
						'label' => $this->l('Url alias'),
						'name' => 'url_alias',
                        'required' => true,
                        'lang'=>true,
                        'hint' => $this->l('Only letters and the hyphen (-) character are allowed.')						
					),
                    array(
						'type' => 'tags',
						'label' => $this->l('Tags'),
						'name' => 'tags',                        
                        'lang' => true,
                        'hint' => array(
    						$this->l('To add "tags" click in the field, write something, and then press "Enter."'),
    						$this->l('Invalid characters:').' &lt;&gt;;=#{}'
    					)							
					),
                    array(
						'type' => 'textarea',
						'label' => $this->l('Short description'),
						'name' => 'short_description',
						'lang' => true,  
                        'required' => true,
                        'autoload_rte' => true,
                        'hint' => $this->l('Invalid characters:').' <>;=#{}'                      
					),
                    array(
						'type' => 'textarea',
						'label' => $this->l('Description'),
						'name' => 'description',
						'lang' => true,  
                        'autoload_rte' => true,
                        'hint' => $this->l('Invalid characters:').' <>;=#{}'                      
					),
                    array(
						'type' => 'file',
						'label' => $this->l('Thumbnail'),
						'name' => 'thumb',
                        'imageType' => 'thumb',
                        'desc' => $this->l('Recommended size: 260x180'),						
					),
                    array(
						'type' => 'file',
						'label' => $this->l('Image'),
						'name' => 'image',
                        'desc' => $this->l('Recommended size: 1920x750'),						
					),
                    array(
    					'type' => 'blog_categories',
    					'label' => $this->l('Choose one or more categories:'),
    					'categories' => $this->getCategories(),
    					'name' => 'categories',
                        'required' => true,
                        'selected_categories' => $this->getSelectedCategories((int)Tools::getValue('id_post'))                                           
    				),
                    array(
						'type' => 'products_search',
						'label' => $this->l('Related products'),
						'name' => 'products',
                        'selected_products' => $this->getSelectedProducts((int)Tools::getValue('id_post')),						
					    'hint' => array(
    						$this->l('To add "products" type in product name and choose the product from the dropdown'),
    						$this->l('Invalid characters:').' &lt;&gt;;=#{}'
    					)	
                    ),
                    array(
						'type' => 'switch',
						'label' => $this->l('Is featured post'),
						'name' => 'is_featured',
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
						)					
					),
                    array(
						'type' => 'text',
						'label' => $this->l('Sort order'),
						'name' => 'sort_order',
                        'required' => true,                       						
					),
                    array(
						'type' => 'text',
						'label' => $this->l('Views'),
						'name' => 'click_number',
                        'required' => true,                        						
					),
                    array(
						'type' => 'text',
						'label' => $this->l('Likes'),
						'name' => 'likes',
                        'required' => true,                        						
					),
                    array(
						'type' => 'switch',
						'label' => $this->l('Enabled'),
						'name' => 'enabled',
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
						)					
					),
                    array(
						'type' => 'date',
						'label' => $this->l('Date Enabled'),
						'name' => 'datetime_active',					
					),
                    array(
                        'type' => 'hidden', 
                        'name' => 'control'
                    )
                ),
                'submit' => array(
					'title' => $this->l('Save'),
				)
            ),
		);
        $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->module = $this;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savePost';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->tpl_vars = array(
			'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
            'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL'),
			'fields_value' => $this->getFieldsValues($this->postFields,'id_post','Ybc_blog_free_post_class','savePost'),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
			'image_baseurl' => $this->_path.'views/img/',
            'link' => $this->context->link,
            'post_key' => 'id_post',
            'cancel_url' => $this->baseAdminPath.'&control=post&list=true',
            'addNewUrl' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=post',
		);
        
        if(Tools::isSubmit('id_post') && $this->itemExists('post','id_post',(int)Tools::getValue('id_post')))
        {
            
            $fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_post');
            $post = new Ybc_blog_free_post_class((int)Tools::getValue('id_post'));
            if($post->image)
            {             
                $helper->tpl_vars['display_img'] = $this->_path.'views/img/post/'.$post->image;
                $helper->tpl_vars['img_del_link'] = $this->baseAdminPath.'&id_post='.Tools::getValue('id_post').'&delpostimage=true&control=post';                
            }
            if($post->thumb)
            {             
                $helper->tpl_vars['display_thumb'] = $this->_path.'views/img/post/thumb/'.$post->thumb;
                $helper->tpl_vars['thumb_del_link'] = $this->baseAdminPath.'&id_post='.Tools::getValue('id_post').'&delpostthumb=true&control=post';                
            }
        }
        
		$helper->override_folder = '/';
        $this->_html .= $helper->generateForm(array($fields_form));			
    }
    
    private function _postPost()
    {
        $errors = array();
        $id_post = (int)Tools::getValue('id_post');
        if($id_post && !$this->itemExists('post','id_post',$id_post) && !Tools::isSubmit('list'))
            Tools::redirectAdmin($this->baseAdminPath);
        /**
         * Change status 
         */
         if(Tools::isSubmit('change_enabled'))
         {
            $status = (int)Tools::getValue('change_enabled') ?  1 : 0;
            $field = Tools::getValue('field');
            $id_post = (int)Tools::getValue('id_post');            
            if(($field == 'enabled' || $field=='is_featured') && $id_post)
            {
                $this->changeStatus('post',$field,$id_post,$status);
                if(Tools::isSubmit('ajax'))
                {
                    die(json_encode(array(
                        'listId' => $id_post,
                        'enabled' => $status,
                        'field' => $field,
                        'href' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=post&change_enabled='.($status ? '0' : '1').'&field='.$field.'&id_post='.$id_post,
                    )));
                }
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=post&list=true');
            }
         }
         
        /**
         * Delete image 
         */         
         if($id_post && $this->itemExists('post','id_post',$id_post) && (Tools::isSubmit('delpostimage') || Tools::isSubmit('delpostthumb')))
         {
            $post = new Ybc_blog_free_post_class($id_post);
            $imageUrl = dirname(__FILE__).'/views/img/post/'.$post->image;
            $thumbUrl = dirname(__FILE__).'/views/img/post/thumb/'.$post->thumb;
            $post->datetime_modified = date('Y-m-d H:i:s');
            $post->modified_by = (int)$this->context->employee->id;
            if(Tools::isSubmit('delpostthumb'))
            {
                if(file_exists($thumbUrl) && $post->thumb)
                {
                    @unlink($thumbUrl);  
                    $post->thumb = '';              
                    $post->update();    
                    if(Tools::isSubmit('ajax'))
                    {
                        die(json_encode(
                            array(
                                'messageType' => 'success',
                                'message' => $this->displayConfirmation($this->l('Thumbnail image deleted')),
                            )
                        ));
                    }            
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_post='.$id_post.'&control=post');
                }
                else
                {
                    $errors[] = $this->l('Thumbnail image does not exist');
                    if(Tools::isSubmit('ajax'))
                    {
                        die(json_encode(
                            array(
                                'messageType' => 'error',
                                'message' => $this->displayError($errors),
                            )
                        ));
                    }  
                    
                }
                     
            }
            elseif(Tools::isSubmit('delpostimage'))
            {
                if($post->image && file_exists($imageUrl))
                {
                    @unlink($imageUrl);
                    $post->image = '';                
                    $post->update();  
                    if(Tools::isSubmit('ajax'))
                    {
                        die(json_encode(
                            array(
                                'messageType' => 'success',
                                'message' => $this->displayConfirmation($this->l('Image deleted')),
                            )
                        ));
                    }               
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_post='.$id_post.'&control=post');                        
                }
                else
                {
                    $errors[] = $this->l('Image does not exist'); 
                    if(Tools::isSubmit('ajax'))
                    {
                        die(json_encode(
                            array(
                                'messageType' => 'error',
                                'message' => $this->displayError($errors),
                            )
                        ));
                    }  
                }                      
            }
            else
                $errors[] = $this->l('Image does not exist');   
         }
        /**
         * Delete post 
         */ 
         if(Tools::isSubmit('del'))
         {            
            $id_post = (int)Tools::getValue('id_post');
            if(!$this->itemExists('post','id_post',$id_post))
                $errors[] = $this->l('Post does not exist');
            elseif($this->_deletePost($id_post))
            {                
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=post&list=true');
            }                
            else
                $errors[] = $this->l('Could not delete the post. Please try again');
         }                  
        /**
         * Save post 
         */
        if(Tools::isSubmit('savePost'))
        {            
            if($id_post && $this->itemExists('post','id_post',$id_post))
            {
                $post = new Ybc_blog_free_post_class($id_post);
                $post->datetime_modified = date('Y-m-d H:i:s');
                $post->modified_by = (int)$this->context->employee->id;
            }
            else
            {
                $post = new Ybc_blog_free_post_class();
                $post->datetime_added = date('Y-m-d H:i:s');
                $post->datetime_modified = date('Y-m-d H:i:s');
                $post->modified_by = (int)$this->context->employee->id;
                $post->added_by = (int)$this->context->employee->id;
            }
            $post->products = trim(trim(Tools::getValue('inputAccessories','')),'-');
            $post->enabled = Tools::getValue('enabled') ? 1 : 0;
            $post->is_featured = Tools::getValue('is_featured') ? 1 : 0;
            $post->sort_order = (int)Tools::getValue('sort_order',1);
            $post->click_number = (int)Tools::getValue('click_number',0);
            $post->likes = (int)Tools::getValue('likes',0);
            $post->datetime_active=Tools::getValue('datetime_active');
            if($post->click_number < 0)
                $errors[] = $this->l('Views can not be smaller than 0');
            $post->likes = (int)Tools::getValue('likes',1);
            if($post->likes < 0)
                $errors[] = $this->l('Likes can not be smaller than 0');
            $languages = Language::getLanguages(false);
            $tags = array();
            foreach ($languages as $language)
			{			
				$post->title[$language['id_lang']] = trim(Tools::getValue('title_'.$language['id_lang'])) != '' ? trim(Tools::getValue('title_'.$language['id_lang'])) :  trim(Tools::getValue('title_'.Configuration::get('PS_LANG_DEFAULT')));
                $post->url_alias[$language['id_lang']] = trim(Tools::getValue('url_alias_'.$language['id_lang'])) != '' ? trim(Tools::getValue('url_alias_'.$language['id_lang'])) :  trim(Tools::getValue('url_alias_'.Configuration::get('PS_LANG_DEFAULT')));
                if($post->title[$language['id_lang']] && !Validate::isCleanHtml($post->title[$language['id_lang']]))
                    $errors[] = $this->l('Title in '.$language['name'].' is not valid');
                if($post->url_alias[$language['id_lang']] && !Validate::isLinkRewrite($post->url_alias[$language['id_lang']]))
                    $errors[] = $this->l('Url alias in '.$language['name'].' is not valid'); 
                $post->meta_description[$language['id_lang']] = trim(Tools::getValue('meta_description_'.$language['id_lang'])) != '' ? trim(Tools::getValue('meta_description_'.$language['id_lang'])) :  trim(Tools::getValue('meta_description_'.Configuration::get('PS_LANG_DEFAULT')));
                if($post->meta_description[$language['id_lang']] && !Validate::isCleanHtml($post->meta_description[$language['id_lang']], true))
                    $errors[] = $this->l('Meta description in '.$language['name'].' is not valid');
                $post->meta_keywords[$language['id_lang']] = trim(Tools::getValue('meta_keywords_'.$language['id_lang'])) != '' ? trim(Tools::getValue('meta_keywords_'.$language['id_lang'])) :  trim(Tools::getValue('meta_keywords_'.Configuration::get('PS_LANG_DEFAULT')));
                if($post->meta_keywords[$language['id_lang']] && !Validate::isTagsList($post->meta_keywords[$language['id_lang']], true))
                    $errors[] = $this->l('Meta keywords in '.$language['name'].' is not valid');
                $post->short_description[$language['id_lang']] = trim(Tools::getValue('short_description_'.$language['id_lang'])) != '' ? trim(Tools::getValue('short_description_'.$language['id_lang'])) :  trim(Tools::getValue('short_description_'.Configuration::get('PS_LANG_DEFAULT')));
                if($post->short_description[$language['id_lang']] && !Validate::isCleanHtml($post->short_description[$language['id_lang']], true))
                    $errors[] = $this->l('Short description in '.$language['name'].' is not valid');
                $post->description[$language['id_lang']] = trim(Tools::getValue('description_'.$language['id_lang'])) != '' ? trim(Tools::getValue('description_'.$language['id_lang'])) :  trim(Tools::getValue('description_'.Configuration::get('PS_LANG_DEFAULT')));
                if($post->description[$language['id_lang']] && !Validate::isCleanHtml($post->description[$language['id_lang']], true))
                    $errors[] = $this->l('Description in '.$language['name'].' is not valid');
                if($post->products && !preg_match('/^[0-9]+([\-0-9])*$/', $post->products))
                {
                    $errors[] = $this->l('Products is not valid');
                }
                $tagStr = trim(Tools::getValue('tags_'.$language['id_lang']));
                
                if($tagStr && Validate::isTagsList($tagStr))
                    $tags[$language['id_lang']] = explode(',',$tagStr);
                elseif($tagStr && !Validate::isTagsList($tagStr))
                {
                    $tags[$language['id_lang']] = array();
                    $errors[] = $this->l('Tags in '.$language['name'].' is not valid');
                }
                else
                    $tags[$language['id_lang']] = array();                                                           
            }                     
            $categories = Tools::getValue('categories');            
            if(Tools::getValue('title_'.Configuration::get('PS_LANG_DEFAULT'))=='')
                $errors[] = $this->l('You need to set blog post title');
            if(Tools::getValue('short_description_'.Configuration::get('PS_LANG_DEFAULT'))=='')
                $errors[] = $this->l('You need to set blog post short description');            
            if($post->url_alias[(int)Configuration::get('PS_LANG_DEFAULT')]=='')
                $errors[] = $this->l('Url alias is required');
            if(!$categories || !is_array($categories))
                $errors[] = $this->l('You need to choose at least 1 category'); 
            if(Tools::getValue('sort_order')=='')
                $errors[] = $this->l('Sort order is required');
            elseif(!Validate::isInt(Tools::getValue('sort_order')))
                $errors[] = $this->l('Sort order is not valid');
            if(Tools::getValue('click_number')=='')
                $errors[] = $this->l('Views is required');
            elseif(!Validate::isInt(Tools::getValue('click_number')))
                $errors[] = $this->l('Views is not valid');
            if(Tools::getValue('likes')=='')
                $errors[] = $this->l('Likes is required');
            elseif(!Validate::isInt(Tools::getValue('likes')))
                $errors[] = $this->l('Likes is not valid');
                      
            /**
             * Upload image 
             */  
            $oldImage = false;
            $newImage = false;   
            if(isset($_FILES['image']['tmp_name']) && isset($_FILES['image']['name']) && $_FILES['image']['name'])
            {
                if(file_exists(dirname(__FILE__).'/views/img/post/'.$_FILES['image']['name']))
                {
                    $_FILES['image']['name'] = sha1(microtime()).'-'.$_FILES['image']['name'];
                }                
                $type = Tools::strtolower(Tools::substr(strrchr($_FILES['image']['name'], '.'), 1));
    			$imagesize = @getimagesize($_FILES['image']['tmp_name']);
    			if (isset($_FILES['image']) &&
    				in_array($type, array('jpg', 'gif', 'jpeg', 'png'))
    			)
    			{
    				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');    				
    				if ($error = ImageManager::validateUpload($_FILES['image']))
    					$errors[] = $error;
    				elseif (!$temp_name || !move_uploaded_file($_FILES['image']['tmp_name'], $temp_name))
    					$errors[] = $this->l('Can not upload the file');
    				elseif (!ImageManager::resize($temp_name, dirname(__FILE__).'/views/img/post/'.$_FILES['image']['name'], null, null, $type))
    					$errors[] = $this->displayError($this->l('An error occurred during the image upload process.'));
    				if (isset($temp_name))
    					@unlink($temp_name);
                    if($post->image)
                        $oldImage = dirname(__FILE__).'/views/img/post/'.$post->image;
                    $post->image = $_FILES['image']['name'];
                    $newImage = dirname(__FILE__).'/views/img/post/'.$post->image;			
    			}
                elseif(isset($_FILES['image']) &&				
    				!empty($_FILES['image']['tmp_name']) &&
    				!empty($imagesize) &&
    				in_array($type, array('jpg', 'gif', 'jpeg', 'png')
    			))
                    $errors[] = $this->l('Image is invalid');                
            }
            
           
            /**
             * Upload thumbnail
             */  
            $oldThumb = false;
            $newThumb = false;   
            if(isset($_FILES['thumb']['tmp_name']) && isset($_FILES['thumb']['name']) && $_FILES['thumb']['name'])
            {
                if(file_exists(dirname(__FILE__).'/views/img/post/thumb/'.$_FILES['thumb']['name']))
                {
                    $_FILES['thumb']['name'] = sha1(microtime()).'-'.$_FILES['thumb']['name'];
                }                
                $type = Tools::strtolower(Tools::substr(strrchr($_FILES['thumb']['name'], '.'), 1));
    			$thumbsize = @getimagesize($_FILES['thumb']['tmp_name']);
    			if (isset($_FILES['thumb']) &&				
    				!empty($_FILES['thumb']['tmp_name']) &&
    				!empty($thumbsize) &&
    				in_array($type, array('jpg', 'gif', 'jpeg', 'png'))
    			)
    			{
    				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');    				
    				if ($error = ImageManager::validateUpload($_FILES['thumb']))
    					$errors[] = $error;
    				elseif (!$temp_name || !move_uploaded_file($_FILES['thumb']['tmp_name'], $temp_name))
    					$errors[] = $this->l('Can not upload the file');
    				elseif (!ImageManager::resize($temp_name, dirname(__FILE__).'/views/img/post/thumb/'.$_FILES['thumb']['name'], null, null, $type))
    					$errors[] = $this->displayError($this->l('An error occurred during the thumb upload process.'));
    				if (isset($temp_name))
    					@unlink($temp_name);
                    if($post->thumb)
                        $oldThumb = dirname(__FILE__).'/views/img/post/thumb/'.$post->thumb;
                    $post->thumb = $_FILES['thumb']['name'];
                    $newThumb = dirname(__FILE__).'/views/img/post/thumb/'.$post->thumb;			
    			}
                elseif(isset($_FILES['thumb']) &&
    				!in_array($type, array('jpg', 'gif', 'jpeg', 'png'))
    			)
                    $errors[] = $this->l('Thumbnail image is invalid');                
            }				
            
            /**
             * Save 
             */    
            $changedImages = array();
            if(!$errors)
            {
                if (!Tools::getValue('id_post'))
    			{
    				if (!$post->add())
                    {
                        $errors[] = $this->displayError($this->l('The post could not be added.')); 
                        if($newImage && file_exists($newImage))
                        @unlink($newImage);
                        if($newThumb && file_exists($newThumb))
                        @unlink($newThumb);
                    }    					
                    else
                    {
                        $id_post = $this->getMaxId('post','id_post');
                        $this->updateCategories($categories, $id_post);
                        $this->updateTags($id_post, $tags);  
                    }
                                        
    			}				
    			elseif (!$post->update())
                {
                    if($newImage && file_exists($newImage))
                        @unlink($newImage);
                    if($newThumb && file_exists($newThumb))
                        @unlink($newThumb);
                    $errors[] = $this->displayError($this->l('The post could not be updated.'));
                }    					
                else
                {
                    if($oldImage && file_exists($oldImage))
                    {
                        @unlink($oldImage);                        
                    }
                    
                
                    if($oldThumb && file_exists($oldThumb))
                    {
                        @unlink($oldThumb);                        
                    }
                     
                    $this->updateCategories($categories, $id_post);   
                    $this->updateTags($id_post, $tags);
                }                                 
            }
         }
         if (count($errors))
         {
            if($newImage && file_exists($newImage))
                @unlink($newImage);
            if($newThumb && file_exists($newThumb))
                @unlink($newThumb);
            $this->errorMessage = $this->displayError($errors);  
         }
         if(isset($newThumb) && $newThumb && file_exists($newThumb) && !$errors && isset($post))
         {
            $changedImages[] = array(
                'name' => 'thumb',
                'url' => $this->_path.'views/img/post/thumb/'.$post->thumb,
                'delete_url' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_post='.Tools::getValue('id_post').'&delpostthumb=true&control=post',
            );
         } 
         if(isset($newImage) && $newImage && file_exists($newImage) && !$errors && isset($post)){
            $changedImages[] = array(
                'name' => 'image',
                'url' => $this->_path.'views/img/post/'.$post->image,
                'delete_url' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_post='.Tools::getValue('id_post').'&delpostimage=true&control=post',
            );
         }  
         if(Tools::isSubmit('ajax'))
            {
                die(json_encode(
                    array(
                        'messageType' => $errors ? 'error' : 'success',
                        'message' => $errors ? $this->errorMessage : (isset($id_post) && $id_post ? $this->displaySuccessMessage($this->l('Post saved'),$this->l('View this post'),$this->getLink('blog',array('id_post'=>$id_post))) : $this->displayConfirmation($this->l('Post saved'))),
                        'images' => isset($changedImages) && $changedImages ? $changedImages : array(),
                        'postUrl' => !$errors && Tools::isSubmit('savePost') && !(int)Tools::getValue('id_post') ? $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_post='.$this->getMaxId('post','id_post').'&control=post' : 0,
                        'itemKey' => 'id_post',
                        'itemId' => !$errors && Tools::isSubmit('savePost') && !(int)Tools::getValue('id_post') ? $this->getMaxId('post','id_post') : ((int)Tools::getValue('id_post') > 0 ? (int)Tools::getValue('id_post') : 0),
                    )
                ));
            }        
         
         if(!$errors)
         {
            if (Tools::isSubmit('savePost') && Tools::isSubmit('id_post'))
    			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_post='.Tools::getValue('id_post').'&control=post');
    		 elseif (Tools::isSubmit('savePost'))
             {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=3&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_post='.$this->getMaxId('post','id_post').'&control=post');
             }
         }
    }
    
    private function _deletePost($id_post)
    {
        if($this->itemExists('post','id_post',$id_post))
        {
            $post = new Ybc_blog_free_post_class($id_post);
            if($post->image && file_exists(dirname(__FILE__).'/views/img/post/'.$post->image))
            {
                @unlink(dirname(__FILE__).'/views/img/post/'.$post->image);
            }
            if($post->thumb && file_exists(dirname(__FILE__).'/views/img/post/thumb/'.$post->thumb))
            {
                @unlink(dirname(__FILE__).'/views/img/post/thumb/'.$post->thumb);
            }             
            if($post->delete())
            {
                $req = "DELETE FROM "._DB_PREFIX_."ybc_blog_free_post_category WHERE id_post=".(int)$id_post;
                Db::getInstance()->execute($req);
                $req = "DELETE FROM "._DB_PREFIX_."ybc_blog_free_tag WHERE id_post=".(int)$id_post;
                Db::getInstance()->execute($req);
                $req = "DELETE FROM "._DB_PREFIX_."ybc_blog_free_comment WHERE id_post=".(int)$id_post;
                Db::getInstance()->execute($req);
                return true;
            }
        }
        return false;        
    }
    private function _deleteComment($id_comment)
    {
        if($this->itemExists('comment','id_comment',$id_comment))
        {
            $comment = new Ybc_blog_free_comment_class($id_comment);
            return $comment->delete();
        }
        return false; 
    }
    private function _deleteSlide($id_slide)
    {
        if($this->itemExists('slide','id_slide',$id_slide))
        {
            $slide = new Ybc_blog_free_slide_class($id_slide);
            if($slide->image && file_exists(dirname(__FILE__).'/views/img/slide/'.$slide->image))
            {
                @unlink(dirname(__FILE__).'/views/img/slide/'.$slide->image);
            }            
            return $slide->delete();
        }
        return false;        
    }
    private function _deleteGallery($id_gallery)
    {
        if($this->itemExists('gallery','id_gallery',$id_gallery))
        {
            $gallery = new Ybc_blog_free_gallery_class($id_gallery);
            if($gallery->image && file_exists(dirname(__FILE__).'/views/img/gallery/'.$gallery->image))
            {
                @unlink(dirname(__FILE__).'/views/img/gallery/'.$gallery->image);
            } 
            if($gallery->image && file_exists(dirname(__FILE__).'/views/img/gallery/thumb/'.$gallery->image))
            {
                @unlink(dirname(__FILE__).'/views/img/gallery/thumb/'.$gallery->image);
            }            
            return $gallery->delete();
        }
        return false;        
    }
    public function updateCategories($categories, $id_post)
    {
        $req = "DELETE FROM "._DB_PREFIX_."ybc_blog_free_post_category WHERE id_post = ".(int)$id_post;
        Db::getInstance()->execute($req);
        if($categories)
        {            
            foreach($categories as $cat)
            {
                if(!$this->checkPostCategory($id_post, (int)$cat))
                {
                    $req = "INSERT INTO "._DB_PREFIX_."ybc_blog_free_post_category(id_post, id_category) VALUES(".(int)$id_post.", ".(int)$cat.")";
                    Db::getInstance()->execute($req);   
                }                
            }
        }
    }
    public function checkPostCategory($id_post, $id_category)
    {
        $req = "SELECT * FROM "._DB_PREFIX_."ybc_blog_free_post_category WHERE id_post = ".(int)$id_post." AND id_category = ".(int)$id_category;
        return Db::getInstance()->getRow($req);
    }
    public function getCategories()
    {
        $req = "SELECT c.*, cl.title, cl.description
                FROM "._DB_PREFIX_."ybc_blog_free_category c
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_category_lang cl ON c.id_category = cl.id_category
                WHERE cl.id_lang = ".(int)$this->context->language->id;
        return Db::getInstance()->executeS($req);
    }
    public function getCategoriesWithFilter($filter = false, $sort = false, $start = false, $limit = false)
    {          
        $req = "SELECT c.*, cl.title, cl.description
                FROM "._DB_PREFIX_."ybc_blog_free_category c
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_category_lang cl ON c.id_category = cl.id_category
                WHERE cl.id_lang = ".(int)$this->context->language->id.($filter ? $filter : '')." 
                ORDER BY ".($sort ? $sort : '')." datetime_added ASC " . ($start !== false && $limit ? " LIMIT ".(int)$start.", ".(int)$limit : "");      
        
        return Db::getInstance()->executeS($req);
    }
    public function getSlidesWithFilter($filter = false, $sort = false, $start = false, $limit = false)
    {          
        $req = "SELECT s.*, sl.caption, sl.url
                FROM "._DB_PREFIX_."ybc_blog_free_slide s
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_slide_lang sl ON s.id_slide = sl.id_slide
                WHERE sl.id_lang = ".(int)$this->context->language->id.($filter ? $filter : '')." 
                ORDER BY ".($sort ? $sort : '')." s.id_slide ASC " . ($start !== false && $limit ? " LIMIT ".(int)$start.", ".(int)$limit : "");      
        return Db::getInstance()->executeS($req);
    }
    public function countSlidesWithFilter($filter = false)
    {          
        $req = "SELECT COUNT(s.id_slide) as total_slides
                FROM "._DB_PREFIX_."ybc_blog_free_slide s
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_slide_lang sl ON s.id_slide = sl.id_slide
                WHERE sl.id_lang = ".(int)$this->context->language->id.($filter ? $filter : '');
        $row = Db::getInstance()->getRow($req);
        return isset($row['total_slides']) ? (int)$row['total_slides'] : 0;
    }
    public function getGalleriesWithFilter($filter = false, $sort = false, $start = false, $limit = false)
    {          
        $req = "SELECT g.*, gl.title, gl.description
                FROM "._DB_PREFIX_."ybc_blog_free_gallery g
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_gallery_lang gl ON g.id_gallery = gl.id_gallery
                WHERE gl.id_lang = ".(int)$this->context->language->id.($filter ? $filter : '')." 
                ORDER BY ".($sort ? $sort : '')." g.id_gallery ASC " . ($start !== false && $limit ? " LIMIT ".(int)$start.", ".(int)$limit : "");      
        
        return Db::getInstance()->executeS($req);
    }
    public function countGalleriesWithFilter($filter = false)
    {    
        $req = "SELECT COUNT(g.id_gallery) as total_galleries
                FROM "._DB_PREFIX_."ybc_blog_free_gallery g
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_gallery_lang gl ON g.id_gallery = gl.id_gallery
                WHERE gl.id_lang = ".(int)$this->context->language->id.($filter ? $filter : '');
        $row = Db::getInstance()->getRow($req);
        return isset($row['total_galleries']) ? (int)$row['total_galleries'] : 0;
    }
    public function getCategoryById($id_category, $id_lang = false)
    {
        if(!$id_lang)
            $id_lang = (int)$this->context->language->id;
        $req = "SELECT c.*, cl.title, cl.description,cl.meta_keywords,cl.meta_description
                FROM "._DB_PREFIX_."ybc_blog_free_category c
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_category_lang cl ON c.id_category = cl.id_category
                WHERE cl.id_lang = ".(int)$id_lang." AND c.id_category=".(int)$id_category;
        return Db::getInstance()->getRow($req);
    }
    public function countCategoriesWithFilter($filter)
    {
        $req = "SELECT c.*, cl.title, cl.description
                FROM "._DB_PREFIX_."ybc_blog_free_category c
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_category_lang cl ON c.id_category = cl.id_category
                WHERE cl.id_lang = ".(int)$this->context->language->id.($filter ? $filter : '');     
        $res = Db::getInstance()->executeS($req);
        return $res ? count($res) : 0;
    }
    public function getSelectedCategories($id_post)
    {
        if(Tools::isSubmit('savePost'))
        {
            $categories = Tools::getValue('categories');
            if(is_array($categories))
                return $categories;
            else
                return array();
        }            
        $categories = array();
        if($id_post)
        {
            $req = "SELECT id_category FROM "._DB_PREFIX_."ybc_blog_free_post_category
                    WHERE id_post = ".(int)$id_post;            
            $rows = Db::getInstance()->executeS($req);
            if($rows)
                foreach($rows as $row)
                    $categories[] = $row['id_category'];
        }
        return $categories;        
    }
    public function getSelectedProducts($id_post)
    {
        $products = array();
        if(Tools::isSubmit('inputAccessories') && trim(trim(Tools::getValue('inputAccessories')),','))
        {
            $products = explode('-', trim(trim(Tools::getValue('inputAccessories')),'-'));
        }
        elseif($id_post)
        {
            $req = "SELECT products FROM "._DB_PREFIX_."ybc_blog_free_post
                    WHERE id_post = ".(int)$id_post;            
            $row = Db::getInstance()->getRow($req);
            if($row)
            {
                $products = explode('-', trim($row['products'],'-'));                
            }          
        }        
        if($products)
        {
            foreach($products as $key => &$product)
            {
                $product = (int)$product;
            }
            unset($key);
            $sql = 'SELECT p.`id_product`, pl.`name`,p.`reference`
				FROM `'._DB_PREFIX_.'product` p
                '.Shop::addSqlAssociation('product', 'p').'
				LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (p.`id_product` = pl.`id_product` '.Shop::addSqlRestrictionOnLang('pl').')
				WHERE pl.`id_lang` = '.(int)$this->context->language->id.' AND p.`id_product` IN ('.implode(',',$products).')';
            $product_list = Db::getInstance()->executeS($sql);
            return $product_list;          
        }        
        return false;
    }
    public function getTagsByIdPost($id_post, $id_lang = false)
    {
        if(!$id_lang)
            $id_lang = $this->context->language->id;
        $req = "SELECT * FROM "._DB_PREFIX_."ybc_blog_free_tag
                WHERE id_lang = ".(int)$id_lang." AND id_post = ".(int)$id_post."
                ORDER by tag asc";
        $tags = Db::getInstance()->executeS($req);
        if($tags)
        {
            foreach($tags as &$tag)
            {
                $tag['link'] = $this->getLink('blog',array('tag' => urlencode($tag['tag'])));
            }
        }
        return $tags;
    }
    public function increasTagViews($tag)
    {
        $sql = "UPDATE "._DB_PREFIX_."ybc_blog_free_tag
                SET click_number = click_number + 1
                WHERE tag = '".pSQL($tag)."'";
        return Db::getInstance()->execute($sql);
    }
    public function getTags($limit = 20, $id_lang = false)
    {
        if(!$id_lang)
            $id_lang = $this->context->language->id;
        $req = "SELECT DISTINCT ROUND(SUM(t.click_number)/COUNT(t.id_tag)) as viewed, t.tag FROM "._DB_PREFIX_."ybc_blog_free_tag t
                WHERE id_lang = ".(int)$id_lang."
                GROUP BY  t.tag
                ORDER BY viewed desc, tag asc
                LIMIT 0,".(int)$limit;
        $tags = Db::getInstance()->executeS($req);        
        if($tags)
        {
            foreach($tags as &$tag)
            {
                $tag['link'] = $this->getLink('blog',array('tag' => urlencode($tag['tag'])));
            }
        }
        return $tags;
    }
    public function updateTags($id_post, $tags)
    {       
        
        if($id_post && $tags && is_array($tags))
        {
            foreach($tags as $id_lang => $tagList)
            {
                if($tagList && is_array($tagList))
                {                    
                    $str = '';
                    foreach($tagList as $tag)
                    {
                        $tag = Tools::strtolower($tag);
                        if($tag && !$this->checkTagLang($id_post, $id_lang, $tag))
                        {
                            $req = "INSERT INTO "._DB_PREFIX_."ybc_blog_free_tag(id_tag,id_post, id_lang, tag, click_number)
                            VALUES(null, ".(int)$id_post.", ".(int)$id_lang.", '".pSQL($tag)."',0)";
                            Db::getInstance()->execute($req);                                                        
                        }   
                        $str .= pSQL($tag)."','";                                              
                    }
                    $req = "DELETE FROM "._DB_PREFIX_."ybc_blog_free_tag 
                            WHERE id_post = ".(int)$id_post." AND id_lang = ".(int)$id_lang." AND tag NOT IN ('".rtrim($str,"','")."')";                    
                    Db::getInstance()->execute($req);
                }
                else
                {
                    $req = "DELETE FROM "._DB_PREFIX_."ybc_blog_free_tag 
                            WHERE id_post = ".(int)$id_post." AND id_lang = ".(int)$id_lang;
                    Db::getInstance()->execute($req);
                }                
            }
        }
    }
    public function checkTagLang($id_post, $id_lang, $tag)
    {       
        $req = "SELECT * FROM "._DB_PREFIX_."ybc_blog_free_tag
                WHERE id_lang = ".(int)$id_lang." AND id_post = ".(int)$id_post." AND tag = '".pSQL($tag)."'";
        return Db::getInstance()->getRow($req);
    }
    public function getTagStr($id_post, $id_lang)
    {
        if(!$id_post || !$id_lang)
            return '';
        $req = "SELECT tag FROM "._DB_PREFIX_."ybc_blog_free_tag WHERE id_post = ".(int)$id_post." AND id_lang = ".(int)$id_lang;
        $tags = Db::getInstance()->executeS($req);
        $tagStr = '';
        if($tags)
        {
            foreach($tags as $tag)
                $tagStr .= $tag['tag'].',';
        }
        return trim($tagStr,',');        
    }
    /**
     * Sidebar 
     */
     public function renderSidebar()
     {
        $this->baseAdminPath = $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $this->context->smarty->assign(
			array(
				'link' => $this->context->link,
				'list' => array(
                    array(
                        'label' => $this->l('Blog posts'),
                        'url' => $this->baseAdminPath.'&control=post&list=true',
                        'id' => 'ybc_tab_post',
                        'icon' => 'icon-AdminPriceRule'
                    ),
                    array(
                        'label' => $this->l('Blog categories'),
                        'url' => $this->baseAdminPath.'&control=category&list=true',
                        'id' => 'ybc_tab_category',
                        'icon' => 'icon-AdminCatalog'
                    ),
                    array(
                        'label' => $this->l('Blog comments'),
                        'url' => $this->baseAdminPath.'&control=comment&list=true',
                        'id' => 'ybc_tab_comment',
                        'icon' => 'icon-comments'
                    ),
                    array(
                        'label' => $this->l('Blog slider'),
                        'url' => $this->baseAdminPath.'&control=slide&list=true',
                        'id' => 'ybc_tab_slide',
                        'icon' => 'icon-AdminParentModules'
                    ),
                    array(
                        'label' => $this->l('Blog gallery'),
                        'url' => $this->baseAdminPath.'&control=gallery&list=true',
                        'id' => 'ybc_tab_gallery',
                        'icon' => 'icon-AdminDashboard'
                    ),
                    array(
                        'label' => $this->l('Settings'),
                        'url' => $this->baseAdminPath.'&control=config',
                        'id' => 'ybc_tab_config',
                        'icon' => 'icon-AdminAdmin'
                    ),
                    array(
                        'label' => $this->l('Import/Export'),
                        'url' => $this->baseAdminPath.'&control=export',
                        'id' => 'ybc_tab_export',
                        'icon' => 'icon-exchange'
                    )
                ),
                'admin_path' => $this->baseAdminPath,
                'active' => 'ybc_tab_'.(trim(Tools::getValue('control')) ? trim(Tools::getValue('control')) : 'post')			
			)
		);
        return $this->display(__FILE__, 'sidebar.tpl');
     }
    /**
     * Functions 
     */
    public function itemExists($tbl, $primaryKey, $id)
	{
		$req = 'SELECT `'.$primaryKey.'`
				FROM `'._DB_PREFIX_.'ybc_blog_free_'.$tbl.'` tbl
				WHERE tbl.`'.$primaryKey.'` = '.(int)$id;
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);        
		return ($row);
	}
    public function getMaxId($tbl, $primaryKey)
    {
        $req = 'SELECT max(`'.$primaryKey.'`) as maxid
				FROM `'._DB_PREFIX_.'ybc_blog_free_'.$tbl.'` tbl';
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);
        return isset($row['maxid']) ? (int)$row['maxid'] : 0;
    }
    public function getMaxOrder($tbl)
    {
        $req = 'SELECT max(`sort_order`) as maxorder
				FROM `'._DB_PREFIX_.'ybc_blog_free_'.$tbl.'` tbl';
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);
        return isset($row['maxorder']) ? (int)$row['maxorder'] : 0;
    }
    public function getFieldsValues($formFields, $primaryKey, $objClass, $saveBtnName)
	{
		$fields = array();        
		if (Tools::isSubmit($primaryKey))
		{
			$obj = new $objClass((int)Tools::getValue($primaryKey));
			$fields[$primaryKey] = (int)Tools::getValue($primaryKey, $obj->$primaryKey);            
		}
		else
        {
            $obj = new $objClass();
        }
        
        foreach($formFields as $field)
        {
            if(!isset($field['primary_key']) && !isset($field['multi_lang']) && !isset($field['connection']))
            {
                $fieldName = $field['name'];
                $fields[$field['name']] = trim(Tools::getValue($field['name'], $obj->$fieldName));       
            }
                     
        }
        
        $languages = Language::getLanguages(false);
        
        /**
         *  Default
         */
        
        if(!Tools::isSubmit($saveBtnName) && !Tools::isSubmit($primaryKey))
        {
            foreach($formFields as $field)
            {
                if(isset($field['default']) && !isset($field['multi_lang']))
                {
                    if(isset($field['default_submit']))
                        $fields[$field['name']] = (int)Tools::getValue($field['name']) ? (int)Tools::getValue($field['name']) : $field['default'];
                    else
                        $fields[$field['name']] = $field['default'];
                }
            }
        }
        
        /**
         * Multiple language 
         */
		foreach ($languages as $lang)
		{
		    foreach($formFields as $field)
            {
                if(!Tools::isSubmit($saveBtnName) && !Tools::isSubmit($primaryKey))
                {
                    if(isset($field['multi_lang']))
                    {
                        if(isset($field['default']))
                            $fields[$field['name']][$lang['id_lang']] = $field['default'];
                        else
                            $fields[$field['name']][$lang['id_lang']] = '';
                    }
                }
                elseif(Tools::isSubmit($saveBtnName))
                {
                    if(isset($field['multi_lang']))
                        $fields[$field['name']][$lang['id_lang']] = Tools::getValue($field['name'].'_'.(int)$lang['id_lang']);  
                    
                }
                else{                    
                    if(isset($field['multi_lang']))
                    {
                        $fieldName = $field['name'];
                        $field_langs = $obj->$fieldName;                        
                        $fields[$field['name']][$lang['id_lang']] = $field_langs[$lang['id_lang']];
                    }                        
                }                
            }
		}
        $fields['control'] = trim(Tools::getValue('control')) ? trim(Tools::getValue('control')) : '';
        
        /**
         * Tags 
         */
         if($primaryKey=='id_post')
         {
            foreach ($languages as $lang)
            {
                if(Tools::isSubmit('savePost'))
                {                    
                    $fields['tags'][$lang['id_lang']] = trim(trim(Tools::getValue('tags_'.(int)$lang['id_lang'])),',') ? trim(trim(Tools::getValue('tags_'.(int)$lang['id_lang'])),',') : '';
                }
                else
                    $fields['tags'][$lang['id_lang']] = $this->getTagStr((int)Tools::getValue('id_post'), (int)$lang['id_lang']);                
                
            }            
         }
         return $fields;
	}
    public function renderList($listData)
    {        
        if(isset($listData['fields_list']) && $listData['fields_list'])
        {
            foreach($listData['fields_list'] as $key => &$val)
            {
                $val['active'] = trim(Tools::getValue($key));
            }
        }    
        
        $this->context->smarty->assign($listData);
        return $this->display(__FILE__, 'list_helper.tpl');
    }
    public function getUrlExtra($field_list)
    {
        $params = '';
        if(trim(Tools::getValue('sort')) && isset($field_list[trim(Tools::getValue('sort'))]))
        {
            $params .= '&sort='.trim(Tools::getValue('sort')).'&sort_type='.(trim(Tools::getValue('sort_type')) =='asc' ? 'asc' : 'desc');
        }
        if($field_list)
        {
            foreach($field_list as $key => $val)
            {
                if(Tools::getValue($key)!='')
                {
                    $params .= '&'.$key.'='.urlencode(Tools::getValue($key));
                }
            }
            unset($val);
        }
        return $params;
    }
    public function getFilterParams($field_list)
    {
        $params = '';        
        if($field_list)
        {
            foreach($field_list as $key => $val)
            {
                if(Tools::getValue($key)!='')
                {
                    $params .= '&'.$key.'='.urlencode(Tools::getValue($key));
                }
            }
            unset($val);
        }
        return $params;
    }
    public function getPostsWithFilter($filter = false, $sort = false, $start = false, $limit = false)
    { 
        
        $req = "SELECT p.*, pl.title, pl.description, pl.short_description, pl.meta_keywords, pl.meta_description
                FROM "._DB_PREFIX_."ybc_blog_free_post p
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_post_lang pl ON p.id_post = pl.id_post
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_post_category pc ON p.id_post = pc.id_post
                WHERE pl.id_lang = ".(int)$this->context->language->id.($filter ? $filter : '')." 
                GROUP BY p.id_post
                ORDER BY ".($sort ? $sort : '')." datetime_added ASC " . ($start !== false && $limit ? " LIMIT ".(int)$start.", ".(int)$limit : "");    
        
        $posts = Db::getInstance()->executeS($req);        
        return $posts;
    }
    public function countPostsWithFilter($filter)
    {
        $req = "SELECT DISTINCT p.*, pl.title, pl.description
                FROM "._DB_PREFIX_."ybc_blog_free_post p
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_post_lang pl ON p.id_post = pl.id_post
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_post_category pc ON p.id_post = pc.id_post
                WHERE pl.id_lang = ".(int)$this->context->language->id.($filter ? $filter : '');     
        $res = Db::getInstance()->executeS($req);
        return $res ? count($res) : 0;
    }    
    public function getCategoriesStrByIdPost($id_post)
    {
        $categories = Db::getInstance()->executeS("
            SELECT DISTINCT cl.id_category, cl.title
            FROM "._DB_PREFIX_."ybc_blog_free_post_category pc
            LEFT JOIN "._DB_PREFIX_."ybc_blog_free_category_lang cl ON pc.id_category = cl.id_category AND cl.id_lang=".(int)$this->context->language->id."
            WHERE pc.id_post=".(int)$id_post."
        ");
        $this->smarty->assign(array('categories' => $categories));
        return $this->display(__FILE__,'categories_str.tpl');
    }
    public function changeStatus($tbl, $field, $id , $status)
    {
        $req = "UPDATE "._DB_PREFIX_."ybc_blog_free_$tbl SET `$field`=".(int)$status." WHERE id_$tbl=".(int)$id;
        return Db::getInstance()->execute($req);
    }
    public function getPostsByIdCategory($id_category, $id_lang = false, $enabled = false)
    {
        if(!$id_lang)    
            $id_lang = $this->context->language->id;
        $req = "SELECT p.*, pl.title,pl.url_alias, pl.description ,pl.short_description , pl.meta_keywords, pl.meta_description
                FROM "._DB_PREFIX_."ybc_blog_free_post p
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_post_lang pl ON p.id_post = pl.id_post AND pl.id_lang=".(int)$id_lang."
                JOIN "._DB_PREFIX_."ybc_blog_free_post_category pc ON p.id_post = pc.id_post AND pc.id_category=".(int)$id_category."
                ".($enabled ? " WHERE p.enabled = 1" : '');
        return Db::getInstance()->executeS($req);
    }
    public function getPostById($id_post, $id_lang = false)
    {
        if(!$id_lang)    
            $id_lang = $this->context->language->id;
        $req = "SELECT p.*, pl.title,pl.url_alias, pl.description ,pl.short_description , pl.meta_keywords, pl.meta_description, e.firstname, e.lastname
                FROM "._DB_PREFIX_."ybc_blog_free_post p
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_post_lang pl ON p.id_post = pl.id_post AND pl.id_lang=".(int)$id_lang."
                LEFT JOIN "._DB_PREFIX_."employee e ON p.added_by = e.id_employee 
                WHERE p.id_post = ".(int)$id_post;
        return Db::getInstance()->getRow($req);
    }
    public function getCategoriesByIdPost($id_post, $id_lang = false, $enabled = false)
    {
        if(!$id_lang)    
            $id_lang = $this->context->language->id;
        $req = "SELECT c.*, cl.title,cl.url_alias, cl.description, cl.meta_keywords, cl.meta_description 
                FROM "._DB_PREFIX_."ybc_blog_free_category c
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_category_lang cl ON c.id_category = cl.id_category AND cl.id_lang=".(int)$id_lang."
                WHERE c.id_category IN (SELECT id_category FROM "._DB_PREFIX_."ybc_blog_free_post_category WHERE id_post = ".(int)$id_post.")
                ".($enabled ? " AND c.enabled = 1" : '');
        $categories = Db::getInstance()->executeS($req);
        if($categories)
        {
            foreach($categories as &$cat)
                $cat['link'] = $this->getLink('blog',array('id_category' => $cat['id_category']));
        }
        return $categories;
    }
    private function getProductInfo($id_product, $id_lang = false)
    {
        if(!$id_lang)
            $id_lang = $this->context->language->id;
        $id_customer = ($this->context->customer->id) ? (int)($this->context->customer->id) : 0;
        $id_group = null;
        if ($id_customer) {
            $id_group = Customer::getDefaultGroupId((int)$id_customer);
        }
        if (!$id_group) {
            $id_group = (int)Group::getCurrent()->id;
        }
        $group= new Group($id_group);
        if($group->price_display_method)
            $tax=false;
        else
            $tax=true;
        $product = new Product($id_product, true, $id_lang, $this->context->shop->id);
        $pinfo = array();   
        $pinfo['short_description'] = $product->description_short;  
        $pinfo['name'] = $product->name;
        $price = $product->getPrice($tax,null);
        $oldPrice = $product->getPriceWithoutReduct(!$tax,false);
        $discount = $oldPrice - $price;
        $pinfo['price'] = Tools::displayPrice($price);       
        $pinfo['old_price'] = Tools::displayPrice($oldPrice); 
        $pinfo['discount_percent'] = round(($oldPrice - $price) / $oldPrice * 100);
        $pinfo['discount_amount'] = Tools::displayPrice($discount);
        $pinfo['product'] = array('id_product' => $id_product);
        $images = $product->getImages((int)$this->context->cookie->id_lang);
        $link = $this->context->link;
        if(isset($images[0]))
		    $id_image = Configuration::get('PS_LEGACY_IMAGES') ? ($product->id.'-'.$images[0]['id_image']) : $images[0]['id_image'];
		else
            $id_image = $this->context->language->iso_code.'-default';			
        $pinfo['img_url'] =  $link->getImageLink($product->link_rewrite, $id_image, $this->is17 ? ImageType::getFormattedName('home') : ImageType::getFormatedName('home'));
        $pinfo['link'] = $product->getLink();
        return $pinfo;
    }
    public function getRelatedProductByProductsStr($pstr)
    {
        if($pstr)
        {
            $products = array();
            $ids = explode('-', $pstr);
            if($ids)
            {
                foreach($ids as $pid)
                {
                    $product = $this->getProductInfo((int)$pid);
                    if($product)
                        $products[] = $product;
                }
            }
            return $products;
        }
        return false;
    }
    /**
     * Render config form 
     */
     
     public function renderConfig()
     {
        $configs = $this->configs;
        $fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('General settings'),
					'icon' => 'icon-cogs'
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
                $arg = array(
                    'name' => $key,
                    'type' => $config['type'],
                    'label' => $config['label'],
                    'desc' => isset($config['desc']) ? $config['desc'] : false,
                    'required' => isset($config['required']) && $config['required'] ? true : false,
                    'options' => isset($config['options']) && $config['options'] ? $config['options'] : array(),
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
                    'tab' => isset($config['tab']) && $config['tab'] ? $config['tab'] : 'general',
                    'suffix' => isset($config['suffix']) && $config['suffix'] ? $config['suffix'] : false,
                );
                if(isset($arg['suffix']) && !$arg['suffix'])
                    unset($arg['suffix']);
                $fields_form['form']['input'][] = $arg;
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
            'cancel_url' => $this->baseAdminPath.'&control=post&list=true',
            'isConfigForm' => true,
            'configTabs' => $this->configTabs,
            'image_baseurl' => $this->_path.'views/img/',
        );
        
        $this->_html .= $helper->generateForm(array($fields_form));		
     }
     
     private function _postConfig()
     {
        $errors = array();
        $languages = Language::getLanguages(false);
        $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
        if(Tools::isSubmit('saveConfig'))
        {
            $configs = $this->configs;
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
                        if(isset($config['required']) && $config['required'] && $config['type']!='switch' && trim(Tools::getValue($key) == ''))
                        {
                            $errors[] = $config['label'].' '.$this->l('is required');
                        }
                        if(isset($config['validate']) && method_exists('Validate',$config['validate']))
                        {
                            $validate = $config['validate'];
                            if(!Validate::$validate(trim(Tools::getValue($key))))
                                $errors[] = $config['label'].' '.$this->l('is invalid');
                            unset($validate);
                        }
                        elseif(!Validate::isCleanHtml(trim(Tools::getValue($key))))
                        {
                            $errors[] = $config['label'].' '.$this->l('is invalid');
                        }   
                    }                    
                }
            }
            
            
            //Custom validation
            foreach($languages as $lang)
            {
                if($lang['id_lang']==$id_lang_default)
                {
                    if(!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_'.$lang['id_lang'])))
                        $errors[] = $this->l('Blog alias is not valid in ').$lang['iso_code'];
                    if(!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_POST_'.$lang['id_lang'])))
                        $errors[] = $this->l('Single post page alias is not valid in ').$lang['iso_code'];
                    if(!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_CATEGORY_'.$lang['id_lang'])))
                        $errors[] = $this->l('Category page alias is not valid in ').$lang['iso_code'];
                    if(!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_GALLERY_'.$lang['id_lang'])))
                        $errors[] = $this->l('Gallery page alias is not valid in ').$lang['iso_code'];
                    if(!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_LATEST_'.$lang['id_lang'])))
                        $errors[] = $this->l('Latest posts page alias is not valid in ').$lang['iso_code'];
                    if(!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_SEARCH_'.$lang['id_lang'])))
                        $errors[] = $this->l('Search page alias is not valid in ').$lang['iso_code'];
                    if(!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_AUTHOR_'.$lang['id_lang'])))
                        $errors[] = $this->l('Author page alias is not valid in ').$lang['iso_code'];
                    if(!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_TAG_'.$lang['id_lang'])))
                        $errors[] = $this->l('Tag page alias is not valid in').$lang['iso_code'];
                }
                else
                {
                    if(Tools::getValue('YBC_BLOG_FREE_ALIAS_'.$lang['id_lang']) && !Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_'.$lang['id_lang'])))
                        $errors[] = $this->l('Blog alias is not valid in ').$lang['iso_code'];
                    if(Tools::getValue('YBC_BLOG_FREE_ALIAS_POST_'.$lang['id_lang']) && !Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_POST_'.$lang['id_lang'])))
                        $errors[] = $this->l('Single post page alias is not valid in ').$lang['iso_code'];
                    if(Tools::getValue('YBC_BLOG_FREE_ALIAS_CATEGORY_'.$lang['id_lang'])&&!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_CATEGORY_'.$lang['id_lang'])))
                        $errors[] = $this->l('Category page alias is not valid in ').$lang['iso_code'];
                    if(Tools::getValue('YBC_BLOG_FREE_ALIAS_GALLERY_'.$lang['id_lang'])&&!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_GALLERY_'.$lang['id_lang'])))
                        $errors[] = $this->l('Gallery page alias is not valid in ').$lang['iso_code'];
                    if(Tools::getValue('YBC_BLOG_FREE_ALIAS_LATEST_'.$lang['id_lang'])&&!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_LATEST_'.$lang['id_lang'])))
                        $errors[] = $this->l('Latest posts page alias is not valid in ').$lang['iso_code'];
                    if(Tools::getValue('YBC_BLOG_FREE_ALIAS_SEARCH_'.$lang['id_lang'])&&!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_SEARCH_'.$lang['id_lang'])))
                        $errors[] = $this->l('Search page alias is not valid in ').$lang['iso_code'];
                    if(Tools::getValue('YBC_BLOG_FREE_ALIAS_AUTHOR_'.$lang['id_lang'])&&!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_AUTHOR_'.$lang['id_lang'])))
                        $errors[] = $this->l('Author page alias is not valid in ').$lang['iso_code'];
                    if(Tools::getValue('YBC_BLOG_FREE_ALIAS_TAG_'.$lang['id_lang'])&&!Validate::isLinkRewrite(Tools::getValue('YBC_BLOG_FREE_ALIAS_TAG_'.$lang['id_lang'])))
                        $errors[] = $this->l('Tag page alias is not valid in ').$lang['iso_code'];
                }
            }
            
            if(!$errors)
            {
                $aliasArg = array('YBC_BLOG_FREE_ALIAS','YBC_BLOG_FREE_ALIAS_POST','YBC_BLOG_FREE_ALIAS_CATEGORY','YBC_BLOG_FREE_ALIAS_GALLERY','YBC_BLOG_FREE_ALIAS_LATEST','YBC_BLOG_FREE_ALIAS_SEARCH','YBC_BLOG_FREE_ALIAS_AUTHOR','YBC_BLOG_FREE_ALIAS_TAG');
                $alias = array();
                foreach($languages as $lang)
                {
                    $alias[$lang['id_lang']]=array();
                    foreach($aliasArg as $aliaKey)
                    {
                        $postedAlias = trim(Tools::getValue($aliaKey.'_'.$lang['id_lang']));
                        
                        if($postedAlias && in_array($postedAlias,$alias[$lang['id_lang']]))
                        {
                            $errors[] = $this->l('Alias need to be unique in ').$lang['iso_code'];
                            break;                        
                        }
                        elseif($postedAlias){
                            $alias[$lang['id_lang']][] = $postedAlias;
                        }
                    } 
                }
                
            }            
            
            if((int)Tools::getValue('YBC_BLOG_FREE_LATES_POST_NUMBER') <= 0)
                $errors[] = $this->l('Number of latest posts displyed need to be greater than 0');
            if((int)Tools::getValue('YBC_BLOG_FREE_PUPULAR_POST_NUMBER') <= 0)
                $errors[] = $this->l('Number of popular posts displayed need to be greater than 0');
            if((int)Tools::getValue('YBC_BLOG_FREE_GALLERY_MAX_NUM') <= 0)
                $errors[] = $this->l('Number of images on gallery block need to be greater than 0');            
            if((int)Tools::getValue('YBC_BLOG_FREE_GALLERY_THUMB_WIDTH') < 50 || (int)Tools::getValue('YBC_BLOG_FREE_GALLERY_THUMB_WIDTH') > 1000)
                $errors[] = $this->l('Gallery thumbnail width need to be from 50 to 1000');
            if((int)Tools::getValue('YBC_BLOG_FREE_GALLERY_THUMB_HEIGHT') < 50 || (int)Tools::getValue('YBC_BLOG_FREE_GALLERY_THUMB_HEIGHT') > 1000)
                $errors[] = $this->l('Gallery thumbnail height need to be from 50 to 1000');
            if((int)Tools::getValue('YBC_BLOG_FREE_MAX_COMMENT') < 0)
                $errors[] = $this->l('Maximum number of latest comments displayed need to be from 0');     
            if((int)Tools::getValue('YBC_BLOG_FREE_DEFAULT_RATING') < 1 || (int)Tools::getValue('YBC_BLOG_FREE_DEFAULT_RATING') >5)
                $errors[] = $this->l('Default rating must be between 1 - 5');     
            if((int)Tools::getValue('YBC_BLOG_FREE_ITEMS_PER_PAGE') <= 0)
                $errors[] = $this->l('Number of items per page need to be greater than 0');     
            if((int)Tools::getValue('YBC_BLOG_FREE_TAGS_NUMBER') <= 0)
                $errors[] = $this->l('Maximum number of tags displayed on Tags block need to be greater than 0');     
            if((int)Tools::getValue('YBC_BLOG_FREE_POST_EXCERPT_LENGTH') < 0)
                $errors[] = $this->l('Post excerpt length cannot be smaller than 0');
            if((int)Tools::getValue('YBC_BLOG_FREE_GALLERY_PER_PAGE') <= 0)
                $errors[] = $this->l('Number of image per page need to be greater than 0');
            if($emailsStr = Tools::getValue('YBC_BLOG_FREE_ALERT_EMAILS'))
            {
                $emails = explode(',',$emailsStr);
                if($emails)
                {
                    foreach($emails as $email)
                    {
                        if(!Validate::isEmail(trim($email)))
                        {
                            $errors[] = $this->l('One of the sumitted emails is not valid');
                            break;
                        }
                    }
                }
            }
            
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
                            Configuration::updateValue($key,$valules);
                        }
                        else
                        {
                            if($config['type']=='switch')
                            {                           
                                Configuration::updateValue($key,(int)trim(Tools::getValue($key)) ? 1 : 0);
                            }
                            else
                                Configuration::updateValue($key,trim(Tools::getValue($key)));   
                        }                        
                    }
                }
            }
            if (count($errors))
            {
               $this->errorMessage = $this->displayError($errors);  
            }
            //
            if(Tools::isSubmit('ajax'))
            {
                die(json_encode(
                    array(
                        'messageType' => $errors ? 'error' : 'success',
                        'message' => $errors ? $this->errorMessage : $this->displayConfirmation($this->l('Configuration saved')),
                    )
                ));
            }
            
            if(!count($errors))
               Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=config');            
        }
     }
     public function getLink($controller = 'blog', $params = array())
     {
        $context = Context::getContext();
        $id_lang = $context->language->id;
        $link = $context->link;
        $alias = $this->alias;
        $friendly = $this->friendly;
        $blogLink = new Ybc_blog_free_link_class();
        $subfix = (int)Configuration::get('YBC_BLOG_FREE_URL_SUBFIX') ? '.html' : '';
        $page = isset($params['page']) && $params['page'] ? $params['page'] : '';
        if($page)
        {
            $page = $page.'/';
        }            
        if($friendly && $alias)
        {            
			
            $url = $blogLink->getBaseLinkFriendly(null, null).$blogLink->getLangLinkFriendly($id_lang, null, null).$alias.'/';
		
            if($controller=='gallery')
            {                
               $url .= (($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_GALLERY',$this->context->language->id)) ? $subAlias : 'gallery').($page ? '/'.rtrim($page,'/') : '');
               return $url;
            }
            elseif($controller=='blog')
            {
                if(isset($params['id_post']) && $postAlias = $this->getPostAlias((int)$params['id_post']))
                {
                    $url .= (($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_POST',$this->context->language->id)) ? $subAlias : 'post').'/'.(int)$params['id_post'].'-'.$postAlias.$subfix;
                }
                elseif(isset($params['id_category']) && $categoryAlias = $this->getCategoryAlias((int)$params['id_category']))
                {
                    $url .= (($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_CATEGORY',$this->context->language->id)) ? $subAlias : 'category').'/'.$page.(int)$params['id_category'].'-'.$categoryAlias.$subfix;
                }
                elseif(isset($params['id_author']) && $authorAlias = (isset($params['alias']) ? $params['alias'] : 'author'))
                {
                    $url .= (($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_AUTHOR',$this->context->language->id)) ? $subAlias : 'author').'/'.$page.(int)$params['id_author'].'-'.$authorAlias;
                }
                elseif(isset($params['tag']))
                {
                    $url .= $page.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_TAG',$this->context->language->id)) ? $subAlias : 'tag').'/'.(string)$params['tag'];
                }
                elseif(isset($params['search']))
                {
                    $url .= $page.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_SEARCH',$this->context->language->id)) ? $subAlias : 'search').'/'.(string)$params['search'];
                }
                elseif(isset($params['latest']))
                {
                    $url .= (($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_LATEST',$this->context->language->id)) ? $subAlias : 'latest').($page ? '/'.rtrim($page,'/') : '');
                }
                else
                {
                    if($page)
                        $url .= trim($page,'/');
                    else
                        $url = rtrim($url,'/');
                }   
                return $url;            
            }            
        }
        return $link->getModuleLink('ybc_blog_free', $controller, $params);
     }
     private function getCategoryAlias($id_category)
     {
        $req = "SELECT cl.url_alias
                FROM "._DB_PREFIX_."ybc_blog_free_category_lang cl
                WHERE cl.id_category = ".(int)$id_category.' AND cl.id_lang='.(int)$this->context->language->id;
        $row = Db::getInstance()->getRow($req);
        if(isset($row['url_alias']))
            return $row['url_alias'];
        return false;
     }
     private function getPostAlias($id_post)
     {
        $req = "SELECT pl.url_alias
                FROM "._DB_PREFIX_."ybc_blog_free_post_lang pl
                WHERE pl.id_post = ".(int)$id_post.' AND pl.id_lang='.(int)$this->context->language->id;
        $row = Db::getInstance()->getRow($req);
        if(isset($row['url_alias']))
            return $row['url_alias'];
        return false;
     }
     public function getCommentsWithFilter($filter = false, $sort = false, $start = false, $limit = false)
     {          
        $req = "SELECT bc.*, e.firstname as efirstname, e.lastname as elastname
                FROM "._DB_PREFIX_."ybc_blog_free_comment bc
                LEFT JOIN "._DB_PREFIX_."employee e ON e.id_employee = bc.replied_by
                WHERE 1=1 ".($filter ? $filter : '')."
                ORDER BY ".($sort ? $sort : '')." bc.datetime_added desc " . ($start !== false && $limit ? " LIMIT ".(int)$start.", ".(int)$limit : "");
        return Db::getInstance()->executeS($req);
     }
     public function getCommentById($id_comment)
     {          
        return Db::getInstance()->getRow("SELECT bc.*, e.firstname as efirstname, e.lastname as elastname,pl.title as post_title
                FROM "._DB_PREFIX_."ybc_blog_free_comment bc
                LEFT JOIN "._DB_PREFIX_."employee e ON e.id_employee = bc.replied_by
                LEFT JOIN "._DB_PREFIX_."ybc_blog_free_post_lang pl ON bc.id_post = pl.id_post AND pl.id_lang=".(int)$this->context->language->id."
                WHERE bc.id_comment=".(int)$id_comment."
                ");
     }
     public function countCommentsWithFilter($filter = false)
     {          
        $req = "SELECT COUNT(bc.id_comment) as total_comment
                FROM "._DB_PREFIX_."ybc_blog_free_comment bc
                WHERE 1=1 ".($filter ? $filter : '');
         $row = Db::getInstance()->getRow($req);
         return isset($row['total_comment']) ?  (int)$row['total_comment'] : 0;
     }
     public function getEverageReviews($id_post)
     {
        $totalRating = $this->getTotalReviewsWithRating($id_post);
        $numRating = $this->countTotalReviewsWithRating($id_post);
        if($numRating > 0)
            return round($totalRating/$numRating);
        return 0;        
     }
     public function getTotalReviewsWithRating($id_post)
     {
        $req = "SELECT SUM(rating) as total_rating
                FROM "._DB_PREFIX_."ybc_blog_free_comment
                WHERE id_post = ".(int)$id_post." AND rating > 0 AND approved = 1";
        $row = Db::getInstance()->getRow($req);
        if(isset($row['total_rating']))
            return (int)$row['total_rating'];
        return 0;
     }
     public function countTotalReviewsWithRating($id_post)
     {
        $req = "SELECT COUNT(rating) as num_rating
                FROM "._DB_PREFIX_."ybc_blog_free_comment
                WHERE id_post = ".(int)$id_post." AND rating > 0 AND approved = 1";
        $row = Db::getInstance()->getRow($req);
        if(isset($row['num_rating']))
            return (int)$row['num_rating'];
        return 0;
     }
     
     /**
      * Hooks 
      */
      public function hookDisplayLeftColumn()
      {         
          return $this->display(__FILE__, 'blocks.tpl');
      }
      public function hookBlogSidebar()
      {
          return $this->hookDisplayLeftColumn();
      }
      public function hookRightColumn()
      {
          return $this->hookDisplayLeftColumn();
      }      
      public function hookDisplayBackOfficeHeader()
      {
            $this->context->controller->addCSS($this->_path.'views/css/admin.css');
      }
      public function hookDisplayFooter()
      {
            $this->smarty->assign(array(
                    'like_url' => $this->getLink('like'),
                    'YBC_BLOG_FREE_SLIDER_SPEED' => (int)Configuration::get('YBC_BLOG_FREE_SLIDER_SPEED') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_SLIDER_SPEED') : 5000,
                    'YBC_BLOG_FREE_GALLERY_SPEED' => (int)Configuration::get('YBC_BLOG_FREE_GALLERY_SPEED') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_GALLERY_SPEED') : 5000,
                    'YBC_BLOG_FREE_GALLERY_SPEED' => (int)Configuration::get('YBC_BLOG_FREE_GALLERY_SPEED') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_GALLERY_SPEED') : 5000,
                    'YBC_BLOG_FREE_GALLERY_SKIN' => Configuration::get('YBC_BLOG_FREE_GALLERY_SKIN') ? Configuration::get('YBC_BLOG_FREE_GALLERY_SKIN') : 'default',
                    'YBC_BLOG_FREE_GALLERY_AUTO_PLAY' => (int)Configuration::get('YBC_BLOG_FREE_GALLERY_AUTO_PLAY') ? 1 : 0,
                    'ybc_like_error' =>  addslashes($this->l('There was a problem while submitting your request. Try again later'))                                   
                )
            );
            return $this->display(__FILE__, 'footer.tpl');
      }
      public function hookDisplayHeader()
      {
            $this->context->controller->addJS($this->_path.'views/js/owl.carousel.js');
            $this->context->controller->addJS($this->_path.'views/js/jquery.prettyPhoto.js');
            $this->context->controller->addJS($this->_path.'views/js/prettyPhoto.inc.js');
            $this->context->controller->addJS($this->_path.'views/js/blog.js');            
            $this->context->controller->addCSS($this->_path.'views/css/prettyPhoto.css');
            if($this->is17)
            {
                $this->context->controller->addCSS($this->_path.'views/css/font-awesome.css');
                $this->context->controller->addCSS($this->_path.'views/css/fix17.css');
            }                
            else
                $this->context->controller->addCSS($this->_path.'views/css/fix16.css');            
            $this->context->controller->addCSS($this->_path.'views/css/blog.css');
            $this->context->controller->addCSS($this->_path.'views/css/owl.carousel.css');
            $this->context->controller->addCSS($this->_path.'views/css/owl.theme.css');
            $this->context->controller->addCSS($this->_path.'views/css/owl.transitions.css');
            if(Configuration::get('YBC_BLOG_FREE_RTL_MODE')=='auto' && isset($this->context->language->is_rtl) && $this->context->language->is_rtl || Configuration::get('YBC_BLOG_FREE_RTL_MODE')=='rtl')
                $this->context->controller->addCSS($this->_path.'views/css/rtl.css'); 
            if(trim(Tools::getValue('fc'))=='module' && trim(Tools::getValue('module'))=='ybc_blog_free')
            {
                $this->context->controller->addJS($this->_path.'views/js/jquery.nivo.slider.js');
                $this->context->controller->addCSS($this->_path.'views/css/nivo-slider.css');
                $this->context->controller->addCSS($this->_path.'views/css/themes/default/default.css');                
            }
            $this->assignConfig();
            return $this->getInternalStyles();
      }
      public function assignConfig()
      {          
          $assign = array();
          foreach($this->configs as $key => $val)
          {
                $assign[$key] = isset($val['lang']) && $val['lang'] ? Configuration::get($key, $this->context->language->id) : Configuration::get($key);
          }
          if(Configuration::get('YBC_BLOG_FREE_RTL_MODE')=='auto' && isset($this->context->language->is_rtl) && $this->context->language->is_rtl || Configuration::get('YBC_BLOG_FREE_RTL_MODE')=='rtl')
            $rtl = true;
         else
            $rtl = false;
          $assign['YBC_BLOG_FREE_RTL_CLASS'] = $rtl ? 'ybc_blog_free_rtl_mode' : 'ybc_blog_free_ltr_mode';
          $assign['YBC_BLOG_FREE_SHOP_URI'] = _PS_BASE_URL_.__PS_BASE_URI__;
          $this->context->smarty->assign(array('blog_config' => $assign));
      }
      public function hookBlogSearchBlock()
      {
            if(!Configuration::get('YBC_BLOG_FREE_SHOW_SEARCH_BLOCK'))
                return;
            $this->smarty->assign(
                array(
                    'action' => $this->getLink('blog'),
                    'search' => urldecode(trim(Tools::getValue('search'))),
                    'id_lang' => $this->context->language->id
                )
            );
            if(trim(Tools::getValue('blog_search'))!='')
            {
                Tools::redirect($this->getLink('blog',array('search'=>urlencode(trim(Tools::getValue('blog_search'))))));
            }
            return $this->display(__FILE__, 'search_block.tpl');
      }
      public function hookBlogCategoriesBlock()
      {       
            if(!Configuration::get('YBC_BLOG_FREE_SHOW_CATEGORIES_BLOCK'))
                return;
            $categories = $this->getCategoriesWithFilter(' AND c.enabled=1','c.sort_order asc, cl.title asc,');
            if($categories)
            {
                foreach($categories as &$cat)
                {
                    $cat['link'] = $this->getLink('blog',array('id_category'=>$cat['id_category']));
                }
            }
            $this->smarty->assign(
                array(
                    'categories' => $categories,
                    'active' => (int)Tools::getValue('id_category')
                )
            );
            return $this->display(__FILE__, 'categories_block.tpl');
      }
      public function hookBlogTagsBlock()
      {
            if(!Configuration::get('YBC_BLOG_FREE_SHOW_TAGS_BLOCK'))
                return;
            $tags = $this->getTags((int)Configuration::get('YBC_BLOG_FREE_TAGS_NUMBER') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_TAGS_NUMBER') : 20);
            if(is_array($tags) && $tags)
                shuffle($tags);
            $this->smarty->assign(
                array(
                    'tags' => $tags
                )
            );
            return $this->display(__FILE__, 'tags_block.tpl');
      }
      public function hookBlogNewsBlock($params)
      {           
            $context = Context::getContext();
            if(isset($params['page']) && $params['page']=='home')
                $postCount = (int)Configuration::get('YBC_BLOG_FREE_LATEST_POST_NUMBER_HOME') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_LATEST_POST_NUMBER_HOME') : 5;
            else
                $postCount = (int)Configuration::get('YBC_BLOG_FREE_LATES_POST_NUMBER') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_LATES_POST_NUMBER') : 5;
            $posts = $this->getPostsWithFilter(' AND p.enabled=1','p.id_post desc,',0,$postCount);
            if(!$context->cookie->liked_posts)
                $likedPosts = array();
            else
                $likedPosts = @unserialize($context->cookie->liked_posts);          
            
            if($posts)
            {
                foreach($posts as $key => &$post)
                {
                    $post['link'] = $this->getLink('blog',array('id_post' => $post['id_post']));
                    if($post['thumb'])
                        $post['thumb'] = $this->_path.'views/img/post/thumb/'.$post['thumb'];
                    $post['comments_num'] = $this->countCommentsWithFilter(' AND bc.id_post='.$post['id_post'].' AND approved=1');
                    if(is_array($likedPosts) && in_array($post['id_post'], $likedPosts))
                        $post['liked'] = true;
                    else
                        $post['liked'] = false;
                    $post['categories'] = $this->getCategoriesByIdPost($post['id_post'],false,true);
                    
                }
                unset($key); 
            }                           
            $this->smarty->assign(
                array(
                    'posts' => $posts,
                    'latest_link' => $this->getLink('blog',array('latest' => true)),
                    'allowComments' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_COMMENT') ? true : false,
                    'show_views' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_VIEWS') ? true : false,
                    'allow_like' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_LIKE') ? true : false,
                    'sidebar_post_type' => Configuration::get('YBC_BLOG_FREE_SIDEBAR_POST_TYPE'),
                    'date_format' => trim((string)Configuration::get('YBC_BLOG_FREE_DATE_FORMAT')),
                    'hook' => 'homeblog',
                    'blog_skin' => Tools::strtolower(Configuration::get('YBC_BLOG_FREE_SKIN')),
                    'page' => isset($params['page']) && $params['page'] ? $params['page'] : false,
                )
            );
            return $this->display(__FILE__, 'latest_posts_block.tpl');
      }
      
      public function hookDisplayHome()
      { 
        return $this->display(__FILE__, 'home_blocks.tpl');
      }
      
      public function hookBlogPopularPostsBlock($params)
      {
            $context = Context::getContext(); 
            if(isset($params['page']) && $params['page']=='home')
                $postCount = (int)Configuration::get('YBC_BLOG_FREE_POPULAR_POST_NUMBER_HOME') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_POPULAR_POST_NUMBER_HOME') : 5;
            else
                $postCount = (int)Configuration::get('YBC_BLOG_FREE_PUPULAR_POST_NUMBER') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_PUPULAR_POST_NUMBER') : 5;
            $posts = $this->getPostsWithFilter(' AND p.enabled=1','p.click_number desc,',0,$postCount);
            if(!$context->cookie->liked_posts)
                $likedPosts = array();
            else
                $likedPosts = @unserialize($context->cookie->liked_posts);
            if($posts)
                foreach($posts as &$post)
                {
                    $post['link'] = $this->getLink('blog',array('id_post' => $post['id_post']));
                    if($post['thumb'])
                        $post['thumb'] = $this->_path.'views/img/post/thumb/'.$post['thumb'];
                    $post['comments_num'] = $this->countCommentsWithFilter(' AND bc.id_post='.$post['id_post'].' AND approved=1');
                    if(is_array($likedPosts) && in_array($post['id_post'], $likedPosts))
                        $post['liked'] = true;
                    else
                        $post['liked'] = false;
                    $post['categories'] = $this->getCategoriesByIdPost($post['id_post'],false,true);
                }
            $this->smarty->assign(
                array(
                    'posts' => $posts,
                    'latest_link' => $this->getLink('blog',array('latest' => true)),
                    'allowComments' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_COMMENT') ? true : false,
                    'show_views' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_VIEWS') ? true : false,
                    'allow_like' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_LIKE') ? true : false,
                    'sidebar_post_type' => Configuration::get('YBC_BLOG_FREE_SIDEBAR_POST_TYPE'),
                    'date_format' => trim((string)Configuration::get('YBC_BLOG_FREE_DATE_FORMAT')),
                    'blog_skin' => Tools::strtolower(Configuration::get('YBC_BLOG_FREE_SKIN')),
                    'page' => isset($params['page']) && $params['page'] ? $params['page'] : false,
                )
            );
            return $this->display(__FILE__, 'popular_posts_block.tpl');
      }
      public function hookBlogFeaturedPostsBlock($params)
      {
            $context = Context::getContext(); 
            if(isset($params['page']) && $params['page']=='home')
                $postCount = (int)Configuration::get('YBC_BLOG_FREE_FEATURED_POST_NUMBER_HOME') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_FEATURED_POST_NUMBER_HOME') : 5;
            else
                $postCount = (int)Configuration::get('YBC_BLOG_FREE_FEATURED_POST_NUMBER') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_FEATURED_POST_NUMBER') : 5;
            $posts = $this->getPostsWithFilter(' AND p.enabled=1 && p.is_featured=1','p.sort_order asc,p.id_post desc,',0,$postCount);
            if(!$context->cookie->liked_posts)
                $likedPosts = array();
            else
                $likedPosts = @unserialize($context->cookie->liked_posts);
            if($posts)
                foreach($posts as &$post)
                {
                    $post['link'] = $this->getLink('blog',array('id_post' => $post['id_post']));
                    if($post['thumb'])
                        $post['thumb'] = $this->_path.'views/img/post/thumb/'.$post['thumb'];
                    $post['comments_num'] = $this->countCommentsWithFilter(' AND bc.id_post='.$post['id_post'].' AND approved=1');
                    if(is_array($likedPosts) && in_array($post['id_post'], $likedPosts))
                        $post['liked'] = true;
                    else
                        $post['liked'] = false;
                    $post['categories'] = $this->getCategoriesByIdPost($post['id_post'],false,true);
                }
            $this->smarty->assign(
                array(
                    'posts' => $posts,
                    'latest_link' => $this->getLink('blog',array('latest' => true)),
                    'allowComments' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_COMMENT') ? true : false,
                    'show_views' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_VIEWS') ? true : false,
                    'allow_like' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_LIKE') ? true : false,
                    'sidebar_post_type' => Configuration::get('YBC_BLOG_FREE_SIDEBAR_POST_TYPE'),
                    'date_format' => trim((string)Configuration::get('YBC_BLOG_FREE_DATE_FORMAT')),
                    'blog_skin' => Tools::strtolower(Configuration::get('YBC_BLOG_FREE_SKIN')),
                    'page' => isset($params['page']) && $params['page'] ? $params['page'] : false,
                )
            );
            return $this->display(__FILE__, 'featured_posts_block.tpl');
      }
      public function hookBlogSlidersBlock()
      {
            if(!Configuration::get('YBC_BLOG_FREE_SHOW_SLIDER'))
                return;
            $slides = $this->getSlidesWithFilter(' AND s.enabled=1','s.sort_order asc, s.id_slide asc,');            
            if($slides)
                foreach($slides as &$slide)
                {
                    if($slide['image'])
                        $slide['image'] = $this->_path.'views/img/slide/'.$slide['image'];
                }
            $this->smarty->assign(
                array(
                    'loading_img' => $this->_path.'views/img/img/loading.gif',
                    'slides' => $slides,
                    'nivoTheme' => 'default',
                    'nivoAutoPlay' => (int)Configuration::get('YBC_BLOG_FREE_SLIDER_AUTO_PLAY') ? true : false,
                )
            );
            return $this->display(__FILE__, 'slider_block.tpl');
      }
      public function hookBlogGalleryBlock($params)
      {                
            if(isset($params['page']) && $params['page']=='home')
                $postCount = (int)Configuration::get('YBC_BLOG_FREE_GALLERY_POST_NUMBER_HOME') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_GALLERY_POST_NUMBER_HOME') : 10;
            else
                $postCount = (int)Configuration::get('YBC_BLOG_FREE_GALLERY_POST_NUMBER') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_GALLERY_POST_NUMBER') : 10;
            $galleries = $this->getGalleriesWithFilter(' AND g.enabled=1  AND g.is_featured=1','g.sort_order asc, g.id_gallery asc,',0,$postCount);
            
            if($galleries)
                foreach($galleries as &$gallery)
                {
                    if($gallery['image'])
                    {                        
                        $gallery['thumb'] = file_exists(dirname(__FILE__).'/views/img/gallery/thumb/'.$gallery['image']) ? $this->_path.'views/img/gallery/thumb/'.$gallery['image'] : $this->_path.'views/img/gallery/'.$gallery['image'];
                        $gallery['image'] = $this->_path.'views/img/gallery/'.$gallery['image'];    
                    }                        
                }            
            $this->smarty->assign(
                array(
                    'galleries' => $galleries,
                    'gallery_link' => $this->getLink('gallery',array()),                    
                    'page' => isset($params['page']) && $params['page'] ? $params['page'] : false,
                )
            );
            return $this->display(__FILE__, 'gallery_block.tpl');
      }
      /**
       * Comments 
       */
      private function _postComment()
      {
            $errors = array();
            $id_comment = (int)Tools::getValue('id_comment');
            if(Tools::getValue('list')!='true' && ($id_comment && !$this->itemExists('comment','id_comment',$id_comment) || !$id_comment))            
                Tools::redirectAdmin($this->baseAdminPath);
            /**
             * Change status 
             */
             if(Tools::isSubmit('change_enabled'))
             {
                $status = (int)Tools::getValue('change_enabled') ?  1 : 0;
                $field = Tools::getValue('field');
                $id_comment = (int)Tools::getValue('id_comment');            
                if($field == 'approved' || $field == 'reported' && $id_comment)
                {
                    $this->changeStatus('comment',$field,$id_comment,$status);
                    if(Tools::isSubmit('ajax'))
                    {
                        die(json_encode(array(
                            'listId' => $id_comment,
                            'enabled' => $status,
                            'field' => $field,
                            'href' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=comment&change_enabled='.($status ? '0' : '1').'&field='.$field.'&id_comment='.$id_comment,
                        )));
                    }
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=comment&list=true');
                }
             }            
            /**
             * Delete comment 
             */ 
             if(Tools::isSubmit('del'))
             {
                $id_comment = (int)Tools::getValue('id_comment');
                if(!$this->itemExists('comment','id_comment',$id_comment))
                    $errors[] = $this->l('Comment does not exist');
                elseif($this->_deleteComment($id_comment))
                {                
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=comment&list=true');
                }                
                else
                    $errors[] = $this->l('Could not delete the comment. Please try again');    
             }                  
            /**
             * Save comment 
             */
            if(Tools::isSubmit('saveComment'))
            {            
                if($id_comment && $this->itemExists('comment','id_comment',$id_comment))
                {
                    $comment = new Ybc_blog_free_comment_class($id_comment);
                }
                else
                {
                    $errors[] = $this->l('Comment does not exist');
                }
                $comment->subject = trim(Tools::getValue('subject',''));
                $comment->comment = trim(Tools::getValue('comment',''));
                $comment->reply = trim(Tools::getValue('reply',''));
                $comment->rating = trim(Tools::getValue('rating',0)) >=0 && trim(Tools::getValue('rating',0)) <=5 ? trim(Tools::getValue('rating',0)) : 0;
                $comment->approved = trim(Tools::getValue('approved',1)) ? 1 : 0;
                $comment->reported = trim(Tools::getValue('reported',0)) ? 1 : 0;
                $comment->replied_by = (int)$this->context->employee->id;
                if(Tools::strlen($comment->subject) < 10)
                    $errors[] = $this->l('Subject need to be at least 10 characters');
                if(Tools::strlen($comment->subject) >300)
                    $errors[] = $this->l('Subject can not be longer than 300 characters');  
                if(!Validate::isCleanHtml($comment->subject,false))
                    $errors[] = $this->l('Subject need to be clean HTML');
                if(Tools::strlen($comment->comment) < 20)
                    $errors[] = $this->l('Comment need to be at least 20 characters');
                if(!Validate::isCleanHtml($comment->comment,false))
                    $errors[] = $this->l('Comment need to be clean HTML');
                if(Tools::strlen($comment->comment) >2000)
                    $errors[] = $this->l('Comment can not be longer than 2000 characters');                  
                
                if(!Validate::isCleanHtml($comment->reply,false))
                    $errors[] = $this->l('Reply need to be clean HTML');
                if(Tools::strlen($comment->reply) >2000)
                    $errors[] = $this->l('Reply can not be longer than 2000 characters');
                if(!$errors)
                {
                    if(!$comment->update())
                    {                        
                        $errors[] = $this->displayError($this->l('The comment could not be updated.'));
                    }        					                
                }
             }
             if(Tools::isSubmit('ajax'))
             {
                die(json_encode(
                    array(
                        'messageType' => $errors ? 'error' : 'success',
                        'message' => $errors ? $this->displayError($errors) : $this->displayConfirmation($this->l('Comment saved')),
                    )
                ));
             }
             if (count($errors))
             {                
                $this->errorMessage = $this->displayError($errors);  
             }
             elseif (Tools::isSubmit('saveComment') && Tools::isSubmit('id_comment'))
    			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_comment='.Tools::getValue('id_comment').'&control=comment');
    		 elseif (Tools::isSubmit('saveComment'))
             {
                Tools::redirectAdmin($this->baseAdminPath);
             }
       }
       public function renderCommentsForm()
       {
            //List 
            if(trim(Tools::getValue('list'))=='true')
            {
                $fields_list = array(
                    'id_comment' => array(
                        'title' => $this->l('Id'),
                        'width' => 40,
                        'type' => 'text',
                        'sort' => true,
                        'filter' => true,
                    ),
                    'subject' => array(
                        'title' => $this->l('Subject'),
                        'width' => 140,
                        'type' => 'text',
                        'sort' => true,
                        'filter' => true,                        
                    ),                    
                    'rating' => array(
                        'title' => $this->l('Rating'),
                        'width' => 100,
                        'type' => 'select',
                        'sort' => true,
                        'filter' => true,
                        'rating_field' => true,
                        'filter_list' => array(
                            'id_option' => 'rating',
                            'value' => 'stars',
                            'list' => array(
                                0 => array(
                                    'rating' => 0,
                                    'stars' => $this->l('No reviews')
                                ),
                                1 => array(
                                    'rating' => 1,
                                    'stars' => '1 '.$this->l('star')
                                ),
                                2 => array(
                                    'rating' => 2,
                                    'stars' => '2 '.$this->l('stars')
                                ),
                                3 => array(
                                    'rating' => 3,
                                    'stars' => '3 '.$this->l('stars')
                                ),
                                4 => array(
                                    'rating' => 4,
                                    'stars' => '4 '.$this->l('stars')
                                ),
                                5 => array(
                                    'rating' => 5,
                                    'stars' => '5 '.$this->l('stars')
                                ),
                            )
                        )
                    ),
                    'name' => array(
                        'title' => $this->l('Customer'),
                        'width' => 100,
                        'type' => 'text',
                        'sort' => true,
                        'filter' => true
                    ),
                    'approved' => array(
                        'title' => $this->l('Approved'),
                        'width' => 50,
                        'type' => 'active',
                        'sort' => true,
                        'filter' => true,
                        'strip_tag' => false,
                        'filter_list' => array(
                            'id_option' => 'enabled',
                            'value' => 'title',
                            'list' => array(
                                0 => array(
                                    'enabled' => 1,
                                    'title' => $this->l('Yes')
                                ),
                                1 => array(
                                    'enabled' => 0,
                                    'title' => $this->l('No')
                                )
                            )
                        )
                    ),
                    'reported' => array(
                        'title' => $this->l('Not reported'),
                        'width' => 50,
                        'type' => 'active',
                        'sort' => true,
                        'filter' => true,
                        'strip_tag' => false,
                        'filter_list' => array(
                            'id_option' => 'enabled',
                            'value' => 'title',
                            'list' => array(
                                0 => array(
                                    'enabled' => 1,
                                    'title' => $this->l('Yes')
                                ),
                                1 => array(
                                    'enabled' => 0,
                                    'title' => $this->l('No')
                                )
                            )
                        )
                    )
                );
                //Filter
                $filter = "";
                if(trim(Tools::getValue('id_comment'))!='')
                    $filter .= " AND bc.id_comment = ".(int)trim(urldecode(Tools::getValue('id_comment')));
                if(trim(Tools::getValue('comment'))!='')
                    $filter .= " AND bc.comment like '%".addslashes(trim(urldecode(Tools::getValue('comment'))))."%'";
                if(trim(Tools::getValue('subject'))!='')
                    $filter .= " AND bc.subject like '%".addslashes(trim(urldecode(Tools::getValue('subject'))))."%'";
                if(trim(Tools::getValue('rating'))!='')
                    $filter .= " AND bc.rating = ".(int)trim(urldecode(Tools::getValue('rating')));                
                if(trim(Tools::getValue('name'))!='')
                    $filter .= " AND bc.name like '%".addslashes(trim(urldecode(Tools::getValue('name'))))."%'";
                if(trim(Tools::getValue('approved'))!='')
                    $filter .= " AND bc.approved = ".(int)trim(urldecode(Tools::getValue('approved')));
                if(trim(Tools::getValue('reported'))!='')
                    $filter .= " AND bc.reported = ".(int)trim(urldecode(Tools::getValue('reported')));
                
                //Sort
                $sort = "";
                if(trim(Tools::getValue('sort')) && isset($fields_list[Tools::getValue('sort')]))
                {
                    $sort .= trim(Tools::getValue('sort'))." ".(Tools::getValue('sort_type')=='asc' ? ' ASC ' :' DESC ')." , ";
                }
                else
                    $sort = false;
                
                //Paggination
                $page = (int)Tools::getValue('page') && (int)Tools::getValue('page') > 0 ? (int)Tools::getValue('page') : 1;
                $totalRecords = (int)$this->countCommentsWithFilter($filter);
                $paggination = new Ybc_blog_free_paggination_class();
                $paggination->total = $totalRecords;
                $paggination->url = $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=comment&list=true&page=_page_'.$this->getUrlExtra($fields_list);
                $paggination->limit =  20;
                $totalPages = ceil($totalRecords / $paggination->limit);
                if($page > $totalPages)
                    $page = $totalPages;
                $paggination->page = $page;
                $start = $paggination->limit * ($page - 1);
                if($start < 0)
                    $start = 0;
                $comments = $this->getCommentsWithFilter($filter, $sort, $start, $paggination->limit);
                if($comments)
                {
                    foreach($comments as &$comment)
                    {
                        $comment['view_url'] = $this->getLink('blog', array('id_post' => $comment['id_post']));
                        $comment['view_text'] = $this->l('View in post');
                    }
                }
                $paggination->text =  $this->l('Showing {start} to {end} of {total} ({pages} Pages)');
                $paggination->style_links = $this->l('links');
                $paggination->style_results = $this->l('results');
                $listData = array(
                    'name' => 'ybc_comment',
                    'actions' => array('edit', 'delete', 'view'),
                    'currentIndex' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=comment',
                    'identifier' => 'id_comment',
                    'show_toolbar' => true,
                    'show_action' => true,
                    'title' => $this->l('Blog comments'),
                    'fields_list' => $fields_list,
                    'field_values' => $comments,
                    'paggination' => $paggination->render(),
                    'filter_params' => $this->getFilterParams($fields_list),
                    'show_reset' => trim(Tools::getValue('id_comment'))!='' || trim(Tools::getValue('comment'))!='' || trim(Tools::getValue('rating'))!='' || trim(Tools::getValue('subject'))!='' || trim(Tools::getValue('customer'))!='' || trim(Tools::getValue('approved'))!='' || trim(Tools::getValue('reported'))!='' ? true : false,
                    'totalRecords' => $totalRecords,
                    'show_add_new' => false,
                );            
                return $this->_html .= $this->renderList($listData);      
            }
            //Form
            
            $fields_form = array(
    			'form' => array(
    				'legend' => array(
    					'title' => $this->l('Manage blog comments'),				
    				),
    				'input' => array(					
    					array(
    						'type' => 'text',
    						'label' => $this->l('Subject'),
    						'name' => 'subject',    					 
                            'required' => true,
                            'hint' => $this->l('Invalid characters:').' &lt;&gt;;=#{}',
                            'desc' => ($id_comment = (int)Tools::getValue('id_comment')) && ($comment = $this->getCommentById($id_comment)) ? $this->displayCommentInfo($comment,(int)$comment['id_user']?$this->context->link->getAdminLink('AdminCustomers').'&id_customer='.(int)$comment['id_user'].'&updatecustomer':'#',$this->getLink('blog',array('id_post' => (int)$comment['id_post']))) : '',	                    
    					), 
                        array(
        					'type' => 'select',
        					'label' => $this->l('Rating'),
        					'name' => 'rating',
                            'options' => array(
                    			 'query' => array(                                
                                        array(
                                            'id_option' => '0', 
                                            'name' => $this->l('No ratings')
                                        ),
                                        array(
                                            'id_option' => '1', 
                                            'name' => '1 '. $this->l('rating')
                                        ),
                                        array(
                                            'id_option' => '2', 
                                            'name' => '2 '. $this->l('ratings')
                                        ),
                                        array(
                                            'id_option' => '3', 
                                            'name' => '3 '. $this->l('ratings')
                                        ),
                                        array(
                                            'id_option' => '4', 
                                            'name' => '4 '. $this->l('ratings')
                                        ),
                                        array(
                                            'id_option' => '5', 
                                            'name' => '5 '. $this->l('ratings')
                                        )
                                    ),                             
                                 'id' => 'id_option',
                    			 'name' => 'name'  
                            )                
        				),
                        array(
    						'type' => 'textarea',
    						'label' => $this->l('Comment'),
    						'name' => 'comment',                            
                            'hint' => $this->l('Invalid characters:').' &lt;&gt;;=#{}',
                            'required' => true						
    					),
                        array(
    						'type' => 'textarea',
    						'label' => $this->l('Reply to this comment'),
    						'name' => 'reply',                            
                            'hint' => $this->l('Invalid characters:').' &lt;&gt;;=#{}'                           					
    					),                        
                        array(
    						'type' => 'switch',
    						'label' => $this->l('Approved'),
    						'name' => 'approved',
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
    						)					
    					),
                        array(
    						'type' => 'switch',
    						'label' => $this->l('Not reported'),
    						'name' => 'reported',
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
    						)					
    					),
                        array(
                            'type' => 'hidden', 
                            'name' => 'control'
                        )
                    ),
                    'submit' => array(
    					'title' => $this->l('Save'),
    				)
                ),
    		);
            $helper = new HelperForm();
    		$helper->show_toolbar = false;
    		$helper->table = $this->table;
    		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
    		$helper->default_form_language = $lang->id;
    		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
    		$this->fields_form = array();
    		$helper->module = $this;
    		$helper->identifier = $this->identifier;
    		$helper->submit_action = 'saveComment';
    		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
    		$helper->token = Tools::getAdminTokenLite('AdminModules');
    		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
    		$helper->tpl_vars = array(
    			'base_url' => $this->context->shop->getBaseURL(),
    			'language' => array(
    				'id_lang' => $language->id,
    				'iso_code' => $language->iso_code
    			),
                'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL'),
    			'fields_value' => $this->getFieldsValues($this->commentFields,'id_comment','Ybc_blog_free_comment_class','saveComment'),
    			'languages' => $this->context->controller->getLanguages(),
    			'id_language' => $this->context->language->id,
    			'image_baseurl' => $this->_path.'views/img/',
                'link' => $this->context->link,
                'cancel_url' => $this->baseAdminPath.'&control=comment&list=true'
    		);            
            if(Tools::isSubmit('id_comment') && $this->itemExists('comment','id_comment',(int)Tools::getValue('id_comment')))
            {
                
                $fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_comment');                
            }
            
    		$helper->override_folder = '/'; 
            $this->_html .= $helper->generateForm(array($fields_form));			
        }
        public function displayCommentInfo($comment, $customerLink, $postLink)
        {
            $this->smarty->assign(array(
                'comment' => $comment,
                'customerLink' => $customerLink,
                'postLink' => $postLink,
            ));
            return $this->display(__FILE__,'comment_info.tpl');
        }
        /**
         * Side 
         */
        public function renderSlideForm()
        {
            //List 
            if(trim(Tools::getValue('list'))=='true')
            {
                $fields_list = array(
                    'id_slide' => array(
                        'title' => $this->l('Id'),
                        'width' => 40,
                        'type' => 'text',
                        'sort' => true,
                        'filter' => true
                    ),
                    'image' => array(
                        'title' => $this->l('Image'),
                        'width' => 100,
                        'type' => 'text',
                        'filter' => false                       
                    ),                     
                    'caption' => array(
                        'title' => $this->l('Caption'),
                        'width' => 140,
                        'type' => 'text',
                        'sort' => true,
                        'filter' => true
                    ), 
                    'sort_order' => array(
                        'title' => $this->l('Sort order'),
                        'width' => 40,
                        'type' => 'text',
                        'sort' => true,
                        'filter' => true
                    ),                    
                    'enabled' => array(
                        'title' => $this->l('Enabled'),
                        'width' => 80,
                        'type' => 'active',
                        'sort' => true,
                        'filter' => true,
                        'strip_tag' => false,
                        'filter_list' => array(
                            'id_option' => 'enabled',
                            'value' => 'title',
                            'list' => array(
                                0 => array(
                                    'enabled' => 1,
                                    'title' => $this->l('Yes')
                                ),
                                1 => array(
                                    'enabled' => 0,
                                    'title' => $this->l('No')
                                )
                            )
                        )
                    ),
                );
                //Filter
                $filter = "";
                if(trim(Tools::getValue('id_slide'))!='')
                    $filter .= " AND s.id_slide = ".(int)trim(urldecode(Tools::getValue('id_slide')));
                if(trim(Tools::getValue('sort_order'))!='')
                    $filter .= " AND s.sort_order = ".(int)trim(urldecode(Tools::getValue('sort_order')));                
                if(trim(Tools::getValue('caption'))!='')
                    $filter .= " AND sl.caption like '%".addslashes(trim(urldecode(Tools::getValue('title'))))."%'";
                if(trim(Tools::getValue('enabled'))!='')
                    $filter .= " AND s.enabled =".(int)Tools::getValue('enabled');
                
                //Sort
                $sort = "";
                if(trim(Tools::getValue('sort')) && isset($fields_list[Tools::getValue('sort')]))
                {
                    $sort .= trim(Tools::getValue('sort'))." ".(Tools::getValue('sort_type')=='asc' ? ' ASC ' :' DESC ')." , ";
                }
                else
                    $sort = false;
                
                //Paggination
                $page = (int)Tools::getValue('page') && (int)Tools::getValue('page') > 0 ? (int)Tools::getValue('page') : 1;
                $totalRecords = (int)$this->countSlidesWithFilter($filter);
                $paggination = new Ybc_blog_free_paggination_class();
                $paggination->total = $totalRecords;
                $paggination->url = $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=slide&list=true&page=_page_'.$this->getUrlExtra($fields_list);
                $paggination->limit =  20;
                $totalPages = ceil($totalRecords / $paggination->limit);
                if($page > $totalPages)
                    $page = $totalPages;
                $paggination->page = $page;
                $start = $paggination->limit * ($page - 1);
                if($start < 0)
                    $start = 0;
                $slides = $this->getSlidesWithFilter($filter, $sort, $start, $paggination->limit);
                if($slides)
                {
                    foreach($slides as &$slide)
                    {
                        if($slide['image'])
                        {
                            $slide['image'] = array(
                                'image_field' => true,
                                'img_url' => $this->_path.'views/img/slide/'.$slide['image'],
                                'width' => 150
                            );
                        }
                    }
                }
                $paggination->text =  $this->l('Showing {start} to {end} of {total} ({pages} Pages)');
                $paggination->style_links = $this->l('links');
                $paggination->style_results = $this->l('results');
                $listData = array(
                    'name' => 'ybc_slide',
                    'actions' => array('edit', 'delete', 'view'),
                    'currentIndex' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=slide',
                    'identifier' => 'id_slide',
                    'show_toolbar' => true,
                    'show_action' => true,
                    'title' => $this->l('Blog slider'),
                    'fields_list' => $fields_list,
                    'field_values' => $slides,
                    'paggination' => $paggination->render(),
                    'filter_params' => $this->getFilterParams($fields_list),
                    'show_reset' => trim(Tools::getValue('enabled'))!='' || trim(Tools::getValue('id_slide'))!='' || trim(Tools::getValue('description'))!='' || trim(Tools::getValue('title'))!='' || trim(Tools::getValue('sort_order'))!='' ? true : false,
                    'totalRecords' => $totalRecords
                );            
                return $this->_html .= $this->renderList($listData);      
            }
            
            //Form
            
            $fields_form = array(
    			'form' => array(
    				'legend' => array(
    					'title' => $this->l('Manage blog slider'),				
    				),
    				'input' => array(					
    					array(
    						'type' => 'text',
    						'label' => $this->l('Caption'),
    						'name' => 'caption',
    						'lang' => true,    
                            'required' => true,                    
    					), 
                        array(
    						'type' => 'text',
    						'label' => $this->l('Url'),
    						'name' => 'url',
                            'lang'=>true,
                        ),                         
                        array(
    						'type' => 'file',
    						'label' => $this->l('Image'),
    						'name' => 'image',
                            'required' => true,    
                             'desc' => $this->l('Recommended size: 800x470'),       						
    					),
                        array(
    						'type' => 'text',
    						'label' => $this->l('Sort order'),
    						'name' => 'sort_order',    						   
                            'required' => true                    
    					), 
                        array(
    						'type' => 'switch',
    						'label' => $this->l('Enabled'),
    						'name' => 'enabled',
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
    						)					
    					),
                        array(
                            'type' => 'hidden', 
                            'name' => 'control'
                        )
                    ),
                    'submit' => array(
    					'title' => $this->l('Save'),
    				)
                ),
    		);
            $helper = new HelperForm();
    		$helper->show_toolbar = false;
    		$helper->table = $this->table;
    		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
    		$helper->default_form_language = $lang->id;
    		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
    		$this->fields_form = array();
    		$helper->module = $this;
    		$helper->identifier = $this->identifier;
    		$helper->submit_action = 'saveSlide';
    		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
    		$helper->token = Tools::getAdminTokenLite('AdminModules');
    		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
    		$helper->tpl_vars = array(
    			'base_url' => $this->context->shop->getBaseURL(),
    			'language' => array(
    				'id_lang' => $language->id,
    				'iso_code' => $language->iso_code
    			),
                'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL'),
    			'fields_value' => $this->getFieldsValues($this->slideFields,'id_slide','Ybc_blog_free_slide_class','saveSlide'),
    			'languages' => $this->context->controller->getLanguages(),
    			'id_language' => $this->context->language->id,
    			'image_baseurl' => $this->_path.'views/img/',
                'link' => $this->context->link,
                'post_key' => 'id_slide',
                'addNewUrl' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=slide',
                'cancel_url' => $this->baseAdminPath.'&control=slide&list=true'
    		);
            
            if(Tools::isSubmit('id_slide') && $this->itemExists('slide','id_slide',(int)Tools::getValue('id_slide')))
            {
                
                $fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_slide');
                $slide = new Ybc_blog_free_slide_class((int)Tools::getValue('id_slide'));
                if($slide->image)
                {             
                    $helper->tpl_vars['display_img'] = $this->_path.'views/img/slide/'.$slide->image;
                    $helper->tpl_vars['img_del_link'] = $this->baseAdminPath.'&id_slide='.Tools::getValue('id_slide').'&delslideimage=true&control=slide';                
                }
            }
            
    		$helper->override_folder = '/';
            $this->_html .= $helper->generateForm(array($fields_form));			
        }
        public function renderExportForm()
        {
            $this->context->smarty->assign(array(
                'errors'=>$this->errors,
                'import_ok'=>$this->import_ok,
            ));
            $this->_html= $this->display(__FILE__,'export.tpl');
        }
        private function _postSlide()
        {
            $errors = array();
            $id_slide = (int)Tools::getValue('id_slide');
            if($id_slide && !$this->itemExists('slide','id_slide',$id_slide) && !Tools::isSubmit('list'))
                Tools::redirectAdmin($this->baseAdminPath);
            /**
             * Change status 
             */
             if(Tools::isSubmit('change_enabled'))
             {
                $status = (int)Tools::getValue('change_enabled') ?  1 : 0;
                $field = Tools::getValue('field');
                $id_slide = (int)Tools::getValue('id_slide');            
                if(($field == 'enabled' && $id_slide))
                {
                    $this->changeStatus('slide',$field,$id_slide,$status);
                    if(Tools::isSubmit('ajax'))
                    {
                        die(json_encode(array(
                            'listId' => $id_slide,
                            'enabled' => $status,
                            'field' => $field,
                            'href' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=slide&change_enabled='.($status ? '0' : '1').'&field='.$field.'&id_slide='.$id_slide,
                        )));
                    }
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=slide&list=true');
                }
             }
            /**
             * Delete image 
             */         
             if($id_slide && $this->itemExists('slide','id_slide',$id_slide) && Tools::isSubmit('delslideimage'))
             {
                Tools::redirectAdmin($this->baseAdminPath);
                $slide = new Ybc_blog_free_slide_class($id_slide);
                $icoUrl = dirname(__FILE__).'/views/img/slide/'.$slide->image; 
                if($slide->image && file_exists($icoUrl))
                {
                    @unlink($icoUrl);
                    $slide->image = '';                    
                    $slide->update();
                    if(Tools::isSubmit('ajax'))
                    {
                        die(json_encode(
                            array(
                                'messageType' => 'success',
                                'message' => $this->displayConfirmation($this->l('Image deleted')),
                            )
                        ));
                    }                     
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_slide='.$id_slide.'&control=slide');
                }
                else
                    $errors[] = $this->l('Image does not exist');   
             }
            /**
             * Delete slide 
             */ 
             if(Tools::isSubmit('del'))
             {
                $id_slide = (int)Tools::getValue('id_slide');
                if(!$this->itemExists('slide','id_slide',$id_slide))
                    $errors[] = $this->l('Slide does not exist');
                elseif($this->_deleteSlide($id_slide))
                {                
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=slide&list=true');
                }                
                else
                    $errors[] = $this->l('Could not delete the slide. Please try again');    
             }                  
            /**
             * Save slide 
             */
            if(Tools::isSubmit('saveSlide'))
            {            
                if($id_slide && $this->itemExists('slide','id_slide',$id_slide))
                {
                    $slide = new Ybc_blog_free_slide_class($id_slide);
                }
                else
                {
                    $slide = new Ybc_blog_free_slide_class();
                    if(!isset($_FILES['image']['name']) || isset($_FILES['image']['name']) && !$_FILES['image']['name'])
                        $errors[] = $this->l('You need to upload an image');
                }                
                $slide->enabled = trim(Tools::getValue('enabled',1)) ? 1 : 0;
                $slide->sort_order = (int)trim(Tools::getValue('sort_order',1));
                $slide->url = trim(Tools::getValue('url',''));
                $languages = Language::getLanguages(false);
                foreach ($languages as $language)
    			{			
    			    $slide->caption[$language['id_lang']] = trim(Tools::getValue('caption_'.$language['id_lang'])) != '' ? trim(Tools::getValue('caption_'.$language['id_lang'])) :  trim(Tools::getValue('caption_'.Configuration::get('PS_LANG_DEFAULT')));
                    if($slide->caption[$language['id_lang']] && !Validate::isCleanHtml($slide->caption[$language['id_lang']]))
                        $errors[] = $this->l('Caption in '.$language['name'].' is not valid');                                   	
                }
                
                if(Tools::getValue('caption_'.Configuration::get('PS_LANG_DEFAULT'))=='')
                    $errors[] = $this->l('You need to set caption');                    
                if(Tools::getValue('sort_order')=='')
                    $errors[] = $this->l('Sort order is required');
                elseif(!Validate::isInt(Tools::getValue('sort_order')))
                    $errors[] = $this->l('Sort order is not valid');
                /**
                 * Upload image 
                 */  
                $oldImage = false;
                $newImage = false;       
                if(isset($_FILES['image']['tmp_name']) && isset($_FILES['image']['name']) && $_FILES['image']['name'])
                {
                    if(file_exists(dirname(__FILE__).'/views/img/slide/'.$_FILES['image']['name']))
                    {
                        $_FILES['image']['name'] = sha1(microtime()).'-'.$_FILES['image']['name'];
                        //$errors[] = $this->l('Image file name already exists');
                    }                                            
                    $type = Tools::strtolower(Tools::substr(strrchr($_FILES['image']['name'], '.'), 1));
        			$imagesize = @getimagesize($_FILES['image']['tmp_name']);
        			if (isset($_FILES['image']) &&				
        				!empty($_FILES['image']['tmp_name']) &&
        				!empty($imagesize) &&
        				in_array($type, array('jpg', 'gif', 'jpeg', 'png'))
        			)
        			{
        				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');    				
        				if ($error = ImageManager::validateUpload($_FILES['image']))
        					$errors[] = $error;
        				elseif (!$temp_name || !move_uploaded_file($_FILES['image']['tmp_name'], $temp_name))
        					$errors[] = $this->l('Can not upload the file');
        				elseif (!ImageManager::resize($temp_name, dirname(__FILE__).'/views/img/slide/'.$_FILES['image']['name'], null, null, $type))
        					$errors[] = $this->displayError($this->l('An error occurred during the image upload process.'));
        				if (isset($temp_name))
        					@unlink($temp_name);
                        if($slide->image)
                            $oldImage = dirname(__FILE__).'/views/img/slide/'.$slide->image;
                        $slide->image = $_FILES['image']['name'];	
                        $newImage = dirname(__FILE__).'/views/img/slide/'.$slide->image;
                    }
                   
                }			
                
                /**
                 * Save 
                 */    
                 
                if(!$errors)
                {
                    if (!Tools::getValue('id_slide'))
        			{
        				if (!$slide->add())
                        {
                            $errors[] = $this->displayError($this->l('The slide could not be added.'));
                            if($newImage && file_exists($newImage))
                            @unlink($newImage);                    
                        }                	                    
        			}				
        			elseif (!$slide->update())
                    {
                        if($newImage && file_exists($newImage))
                            @unlink($newImage); 
                        $errors[] = $this->displayError($this->l('The slide could not be updated.'));
                    }
                    else
                    {
                        if($oldImage && file_exists($oldImage))
                        @unlink($oldImage); 
                    }
        					                
                }
             }
             $changedImages = array();
             if(isset($newImage) && $newImage && file_exists($newImage) && !$errors && isset($slide)){
                $changedImages[] = array(
                    'name' => 'image',
                    'url' => $this->_path.'views/img/slide/'.$slide->image,                    
                );
             }
             if (count($errors))
             {
                if($newImage && file_exists($newImage))
                    @unlink($newImage); 
                $this->errorMessage = $this->displayError($errors);  
             }
             if(Tools::isSubmit('ajax'))
             {
                die(json_encode(
                    array(
                        'messageType' => $errors ? 'error' : 'success',
                        'message' => $errors ? $this->errorMessage : $this->displaySuccessMessage($this->l('Slide saved'),$this->l('View slider on blog page'),$this->getLink('blog')),
                        'images' => isset($changedImages) && $changedImages ? $changedImages : array(),
                        'postUrl' => !$errors && Tools::isSubmit('saveSlide') && !(int)Tools::getValue('id_slide') ? $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_slide='.$this->getMaxId('slide','id_slide').'&control=slide' : 0,
                        'itemKey' => 'id_slide',
                        'itemId' => !$errors && Tools::isSubmit('saveSlide') && !(int)Tools::getValue('id_slide') ? $this->getMaxId('slide','id_slide') : ((int)Tools::getValue('id_slide') > 0 ? (int)Tools::getValue('id_slide') : 0),
                    )
                ));
             } 
             if (!$errors && Tools::isSubmit('saveSlide') && Tools::isSubmit('id_slide'))
    			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_slide='.Tools::getValue('id_slide').'&control=slide');
    		 elseif (!$errors && Tools::isSubmit('saveSlide'))
             {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=3&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_slide='.$this->getMaxId('slide','id_slide').'&control=slide');
             }
        }
        public function _postExport()
        {
            if(Tools::isSubmit('submitExportBlog'))
            {
                $import= new YbcImportExport();
                $import->generateArchive();
            }
            if(Tools::isSubmit('submitImportBlog'))
            {
                $import= new YbcImportExport();
                $errors =$import->processImport();
                if($errors)            
                    $this->errors=$errors;
                else
                    $this->import_ok=true;                                                                  
            }
        }
        
        /**
         * Gallery 
         */
        public function renderGalleryForm()
        {
            //List 
            if(trim(Tools::getValue('list'))=='true')
            {
                $fields_list = array(
                    'id_gallery' => array(
                        'title' => $this->l('Id'),
                        'width' => 40,
                        'type' => 'text',
                        'sort' => true,
                        'filter' => true,
                    ),
                    'image' => array(
                        'title' => $this->l('Image'),
                        'width' => 140,
                        'type' => 'text',
                        'required' => true                        
                    ), 
                    'title' => array(
                        'title' => $this->l('Name'),
                        'width' => 140,
                        'type' => 'text',
                        'sort' => true,
                        'filter' => true
                    ),
                    'description' => array(
                        'title' => $this->l('Description'),
                        'width' => 140,
                        'type' => 'text',
                        'sort' => true,
                        'filter' => true
                    ),
                    'sort_order' => array(
                        'title' => $this->l('Sort order'),
                        'width' => 40,
                        'type' => 'text',                        
                        'sort' => true,
                        'filter' => true                        
                    ),  
                    'is_featured' => array(
                        'title' => $this->l('Featured'),
                        'width' => 80,
                        'type' => 'active',
                        'sort' => true,
                        'filter' => true,
                        'strip_tag' => false,
                        'filter_list' => array(
                            'id_option' => 'enabled',
                            'value' => 'title',
                            'list' => array(
                                0 => array(
                                    'enabled' => 1,
                                    'title' => $this->l('Yes')
                                ),
                                1 => array(
                                    'enabled' => 0,
                                    'title' => $this->l('No')
                                )
                            )
                        )
                    ),                
                    'enabled' => array(
                        'title' => $this->l('Enabled'),
                        'width' => 80,
                        'type' => 'active',
                        'sort' => true,
                        'filter' => true,
                        'strip_tag' => false,
                        'filter_list' => array(
                            'id_option' => 'enabled',
                            'value' => 'title',
                            'list' => array(
                                0 => array(
                                    'enabled' => 1,
                                    'title' => $this->l('Yes')
                                ),
                                1 => array(
                                    'enabled' => 0,
                                    'title' => $this->l('No')
                                )
                            )
                        )
                    ),
                );
                //Filter
                $filter = "";
                if(trim(Tools::getValue('id_gallery'))!='')
                    $filter .= " AND g.id_gallery = ".(int)trim(urldecode(Tools::getValue('id_gallery')));
                if(trim(Tools::getValue('sort_order'))!='')
                    $filter .= " AND g.sort_order = ".(int)trim(urldecode(Tools::getValue('sort_order')));                
                if(trim(Tools::getValue('title'))!='')
                    $filter .= " AND gl.title like '%".addslashes(trim(urldecode(Tools::getValue('title'))))."%'";
                if(trim(Tools::getValue('description'))!='')
                    $filter .= " AND gl.description like '%".addslashes(trim(urldecode(Tools::getValue('description'))))."%'";
                if(trim(Tools::getValue('enabled'))!='')
                    $filter .= " AND g.enabled =".(int)Tools::getValue('enabled');
                if(trim(Tools::getValue('is_featured'))!='')
                    $filter .= " AND g.is_featured =".(int)Tools::getValue('is_featured');
                
                //Sort
                $sort = "";
                if(trim(Tools::getValue('sort')) && isset($fields_list[Tools::getValue('sort')]))
                {
                    $sort .= trim(Tools::getValue('sort'))." ".(Tools::getValue('sort_type')=='asc' ? ' ASC ' :' DESC ')." , ";
                }
                else
                    $sort = false;
                
                //Paggination
                $page = (int)Tools::getValue('page') && (int)Tools::getValue('page') > 0 ? (int)Tools::getValue('page') : 1;
                $totalRecords = (int)$this->countGalleriesWithFilter($filter);
                $paggination = new Ybc_blog_free_paggination_class();
                $paggination->total = $totalRecords;
                $paggination->url = $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=gallery&list=true&page=_page_'.$this->getUrlExtra($fields_list);
                $paggination->limit =  20;
                $totalPages = ceil($totalRecords / $paggination->limit);
                if($page > $totalPages)
                    $page = $totalPages;
                $paggination->page = $page;
                $start = $paggination->limit * ($page - 1);
                if($start < 0)
                    $start = 0;
                $galleries = $this->getGalleriesWithFilter($filter, $sort, $start, $paggination->limit);
                if($galleries)
                {
                    foreach($galleries as &$gallery)
                    {
                        if($gallery['image'])
                        {
                            $gallery['image'] = array(
                                'image_field' => true,
                                'img_url' => file_exists(dirname(__FILE__).'/views/img/gallery/thumb/'.$gallery['image']) ? $this->_path.'views/img/gallery/thumb/'.$gallery['image'] : $this->_path.'views/img/gallery/'.$gallery['image'],
                                'width' => 150
                            );
                        }
                    }
                }
                $paggination->text =  $this->l('Showing {start} to {end} of {total} ({pages} Pages)');
                $paggination->style_links = $this->l('links');
                $paggination->style_results = $this->l('results');
                $listData = array(
                    'name' => 'ybc_gallery',
                    'actions' => array('edit', 'delete', 'view'),
                    'currentIndex' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=gallery',
                    'identifier' => 'id_gallery',
                    'show_toolbar' => true,
                    'show_action' => true,
                    'title' => $this->l('Blog gallery'),
                    'fields_list' => $fields_list,
                    'field_values' => $galleries,
                    'paggination' => $paggination->render(),
                    'filter_params' => $this->getFilterParams($fields_list),
                    'show_reset' => trim(Tools::getValue('is_featured'))!='' || trim(Tools::getValue('enabled'))!='' || trim(Tools::getValue('id_gallery'))!='' || trim(Tools::getValue('description'))!='' || trim(Tools::getValue('title'))!='' || trim(Tools::getValue('sort_order'))!='' ? true : false,
                    'totalRecords' => $totalRecords,
                    'preview_link' => $this->getLink('gallery'),
                );            
                return $this->_html .= $this->renderList($listData);      
            }
            //Form
            
            $fields_form = array(
    			'form' => array(
    				'legend' => array(
    					'title' => $this->l('Manage blog galleryr'),				
    				),
    				'input' => array(					
    					array(
    						'type' => 'text',
    						'label' => $this->l('Title'),
    						'name' => 'title',
    						'lang' => true,    
                            'required' => true                    
    					),    
                        array(
    						'type' => 'textarea',
    						'label' => $this->l('Description'),
    						'name' => 'description',
    						'lang' => true,  
                            'autoload_rte' => true                      
    					),                     
                        array(
    						'type' => 'file',
    						'label' => $this->l('Image'),
    						'name' => 'image',
                            'required' => true,
                            'desc' => $this->l('Recommended size: 600x600'),						
    					),
                        array(
    						'type' => 'text',
    						'label' => $this->l('Sort order'),
    						'name' => 'sort_order',
                            'required' => true						
    					),
                        array(
    						'type' => 'switch',
    						'label' => $this->l('Featured'),
    						'name' => 'is_featured',
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
    						)					
    					),
                        array(
    						'type' => 'switch',
    						'label' => $this->l('Enabled'),
    						'name' => 'enabled',
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
    						)					
    					),
                        array(
                            'type' => 'hidden', 
                            'name' => 'control'
                        )
                    ),
                    'submit' => array(
    					'title' => $this->l('Save'),
    				)
                ),
    		);
            $helper = new HelperForm();
    		$helper->show_toolbar = false;
    		$helper->table = $this->table;
    		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
    		$helper->default_form_language = $lang->id;
    		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
    		$this->fields_form = array();
    		$helper->module = $this;
    		$helper->identifier = $this->identifier;
    		$helper->submit_action = 'saveGallery';
    		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
    		$helper->token = Tools::getAdminTokenLite('AdminModules');
    		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
            $helper->tpl_vars = array(
    			'base_url' => $this->context->shop->getBaseURL(),
    			'language' => array(
    				'id_lang' => $language->id,
    				'iso_code' => $language->iso_code
    			),
                'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL'),
    			'fields_value' => $this->getFieldsValues($this->galleryFields,'id_gallery','Ybc_blog_free_gallery_class','saveGallery'),
    			'languages' => $this->context->controller->getLanguages(),
    			'id_language' => $this->context->language->id,
    			'image_baseurl' => $this->_path.'views/img/',
                'link' => $this->context->link,
                'cancel_url' => $this->baseAdminPath.'&control=gallery&list=true',
                'post_key' => 'id_gallery',
                'addNewUrl' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=gallery',                   
                
    		);
            
            if(Tools::isSubmit('id_gallery') && $this->itemExists('gallery','id_gallery',(int)Tools::getValue('id_gallery')))
            {
                
                $fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_gallery');
                $gallery = new Ybc_blog_free_gallery_class((int)Tools::getValue('id_gallery'));
                if($gallery->image)
                {             
                    $helper->tpl_vars['display_img'] = $this->_path.'views/img/gallery/'.$gallery->image;
                    $helper->tpl_vars['img_del_link'] = $this->baseAdminPath.'&id_gallery='.Tools::getValue('id_gallery').'&delgalleryimage=true&control=gallery';                
                }
            }
            
    		$helper->override_folder = '/';
            $this->_html .= $helper->generateForm(array($fields_form));			
        }
        private function _postGallery()
        {
            $errors = array();
            $id_gallery = (int)Tools::getValue('id_gallery');
            if($id_gallery && !$this->itemExists('gallery','id_gallery',$id_gallery) && !Tools::isSubmit('list'))
                Tools::redirectAdmin($this->baseAdminPath);
            /**
             * Change status 
             */
             if(Tools::isSubmit('change_enabled'))
             {
                $status = (int)Tools::getValue('change_enabled') ?  1 : 0;
                $field = Tools::getValue('field');
                $id_gallery = (int)Tools::getValue('id_gallery');            
                if(($field == 'enabled' || $field=='is_featured') && $id_gallery)
                {
                    $this->changeStatus('gallery',$field,$id_gallery,$status);
                    if(Tools::isSubmit('ajax'))
                    {
                        die(json_encode(array(
                            'listId' => $id_gallery,
                            'enabled' => $status,
                            'field' => $field,
                            'href' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=gallery&change_enabled='.($status ? '0' : '1').'&field='.$field.'&id_gallery='.$id_gallery,
                        )));
                    }
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=gallery&list=true');
                }
             }
            /**
             * Delete image 
             */         
             if($id_gallery && $this->itemExists('gallery','id_gallery',$id_gallery) && Tools::isSubmit('delgalleryimage'))
             {
                Tools::redirectAdmin($this->baseAdminPath);
                $gallery = new Ybc_blog_free_gallery_class($id_gallery);
                if($gallery->image)
                {
                    $icoUrl = dirname(__FILE__).'/views/img/gallery/'.$gallery->image; 
                    $thumbUrl = dirname(__FILE__).'/views/img/gallery/thumb/'.$gallery->image; 
                    if(file_exists($thumbUrl))
                        @unlink($thumbUrl);
                    if(file_exists($icoUrl))
                    {
                        @unlink($icoUrl);
                        $gallery->image = '';                    
                        $gallery->update(); 
                        if(Tools::isSubmit('ajax'))
                        {
                            die(json_encode(
                                array(
                                    'messageType' => 'success',
                                    'message' => $this->displayConfirmation($this->l('Image deleted')),
                                )
                            ));
                        }                 
                        Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_gallery='.$id_gallery.'&control=gallery');
                    }
                    else
                        $errors[] = $this->l('Image does not exist');  
                }
                else
                    $errors[] = $this->l('Image is  empty'); 
                 
             }
            /**
             * Delete gallery 
             */ 
             if(Tools::isSubmit('del'))
             {
                $id_gallery = (int)Tools::getValue('id_gallery');
                if(!$this->itemExists('gallery','id_gallery',$id_gallery))
                    $errors[] = $this->l('Item does not exist');
                elseif($this->_deleteGallery($id_gallery))
                {                
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&control=gallery&list=true');
                }                
                else
                    $errors[] = $this->l('Could not delete the item. Please try again');    
             }                  
            /**
             * Save gallery 
             */
            if(Tools::isSubmit('saveGallery'))
            {            
                if($id_gallery && $this->itemExists('gallery','id_gallery',$id_gallery))
                {
                    $gallery = new Ybc_blog_free_gallery_class($id_gallery);
                }
                else
                {
                    $gallery = new Ybc_blog_free_gallery_class();
                }                
                $gallery->enabled = trim(Tools::getValue('enabled',1)) ? 1 : 0;
                $gallery->is_featured = trim(Tools::getValue('is_featured',1)) ? 1 : 0;
                $gallery->sort_order = (int)trim(Tools::getValue('sort_order',1));
                $languages = Language::getLanguages(false);
                foreach ($languages as $language)
    			{			
			        $gallery->title[$language['id_lang']] = trim(Tools::getValue('title_'.$language['id_lang'])) != '' ? trim(Tools::getValue('title_'.$language['id_lang'])) :  trim(Tools::getValue('title_'.Configuration::get('PS_LANG_DEFAULT')));
                    if($gallery->title[$language['id_lang']] && !Validate::isCleanHtml($gallery->title[$language['id_lang']]))
                        $errors[] = $this->l('Title in '.$language['name'].' is not valid');
                    $gallery->description[$language['id_lang']] = trim(Tools::getValue('description_'.$language['id_lang'])) != '' ? trim(Tools::getValue('description_'.$language['id_lang'])) :  trim(Tools::getValue('description_'.Configuration::get('PS_LANG_DEFAULT')));
                    if($gallery->description[$language['id_lang']] && !Validate::isCleanHtml($gallery->description[$language['id_lang']], true))
                        $errors[] = $this->l('Description in '.$language['name'].' is not valid');
                }
                
                if(Tools::getValue('title_'.Configuration::get('PS_LANG_DEFAULT'))=='')
                    $errors[] = $this->l('Title is required');                    
                if(Tools::getValue('sort_order')=='')
                    $errors[] = $this->l('Sort order is required');
                elseif(!Validate::isInt(Tools::getValue('sort_order')))
                    $errors[] = $this->l('Sort order is not valid');
                /**
                 * Upload image 
                 */  
                $oldImage = false;
                $newImage = false;       
                $newThumb = false;
                $oldThumb = false;
                if(isset($_FILES['image']['tmp_name']) && isset($_FILES['image']['name']) && $_FILES['image']['name'])
                {
                    if(file_exists(dirname(__FILE__).'/views/img/gallery/'.$_FILES['image']['name']))
                    {
                        $_FILES['image']['name'] = sha1(microtime()).'-'.$_FILES['image']['name'];
                    }                    
                    $type = Tools::strtolower(Tools::substr(strrchr($_FILES['image']['name'], '.'), 1));
        			$imagesize = @getimagesize($_FILES['image']['tmp_name']);
        			if (isset($_FILES['image']) &&				
        				!empty($_FILES['image']['tmp_name']) &&
        				!empty($imagesize) &&
        				in_array($type, array('jpg', 'gif', 'jpeg', 'png'))
        			)
        			{
        				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');    				
        				if ($error = ImageManager::validateUpload($_FILES['image']))
        					$errors[] = $error;
        				elseif (!$temp_name || !move_uploaded_file($_FILES['image']['tmp_name'], $temp_name))
        					$errors[] = $this->l('Can not upload the file');
        				elseif(!ImageManager::resize($temp_name, dirname(__FILE__).'/views/img/gallery/'.$_FILES['image']['name'], null, null, $type))
        					$errors[] = $this->displayError($this->l('An error occurred during the image upload process.'));
        				
                        if($gallery->image)
                        {
                            $oldImage = dirname(__FILE__).'/views/img/gallery/'.$gallery->image;
                            $oldThumb = dirname(__FILE__).'/views/img/gallery/thumb/'.$gallery->image;
                        }                                
                        $gallery->image = $_FILES['image']['name'];
                        $newImage = dirname(__FILE__).'/views/img/gallery/'.$gallery->image;
                        $newThumb = dirname(__FILE__).'/views/img/gallery/thumb/'.$gallery->image;
                        if(!$errors)
                        {
                            $thumbWidth = (int)Configuration::get('YBC_BLOG_FREE_GALLERY_THUMB_WIDTH');
                            $thumbWidth = $thumbWidth >= 50 && $thumbWidth <= 1000 ? $thumbWidth : 200;
                            $thumbHeight = (int)Configuration::get('YBC_BLOG_FREE_GALLERY_THUMB_HEIGHT');
                            $thumbHeight = $thumbHeight >= 50 && $thumbHeight <= 1000 ? $thumbHeight : 200;
                            if(!ImageManager::resize($temp_name, dirname(__FILE__).'/views/img/gallery/thumb/'.$_FILES['image']['name'], $thumbWidth, $thumbHeight, $type))
        					   $errors[] = $this->displayError($this->l('Could not create thumbnail. Please try to upload another image.'));
                        }	
                        if (isset($temp_name))
        					@unlink($temp_name);		
        			}
                    
                }			
                elseif(!$id_gallery)
                    $errors[] = $this->l('Image is required');
                /**
                 * Save 
                 */    
                 
                if(!$errors)
                {
                    if (!Tools::getValue('id_gallery'))
        			{
        				if (!$gallery->add())
                        {
                            $errors[] = $this->displayError($this->l('The item could not be added.'));
                            if($newImage && file_exists($newImage))
                            @unlink($newImage);  
                            if($newThumb && file_exists($newThumb))
                            @unlink($newThumb);                     
                        }                	                    
        			}				
        			elseif (!$gallery->update())
                    {
                        if($newImage && file_exists($newImage))
                            @unlink($newImage);
                        if($newThumb && file_exists($newThumb))
                            @unlink($newThumb); 
                        $errors[] = $this->displayError($this->l('The item could not be updated.'));
                    }
                    else
                    {
                        if($oldImage && file_exists($oldImage))
                        @unlink($oldImage); 
                        if($oldThumb && file_exists($oldThumb))
                        @unlink($oldThumb); 
                    }
        					                
                }
             }
             $changedImages = array();
             if(isset($newImage) && $newImage && file_exists($newImage) && !$errors && isset($gallery)){
                $changedImages[] = array(
                    'name' => 'image',
                    'url' => $this->_path.'views/img/gallery/'.$gallery->image,                    
                );
             }
             if(Tools::isSubmit('ajax'))
             {
                die(json_encode(
                    array(
                        'messageType' => $errors ? 'error' : 'success',
                        'message' => $errors ? $this->displayError($errors) : $this->displaySuccessMessage($this->l('Gallery image saved'),$this->l('View blog gallery'),$this->getLink('gallery')),
                        'images' => isset($changedImages) && $changedImages ? $changedImages : array(),
                        'postUrl' => !$errors && Tools::isSubmit('saveGallery') && !(int)Tools::getValue('id_gallery') ? $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_gallery='.$this->getMaxId('gallery','id_gallery').'&control=gallery' : 0,
                        'itemKey' => 'id_gallery',
                        'itemId' => !$errors && Tools::isSubmit('saveGallery') && !(int)Tools::getValue('id_gallery') ? $this->getMaxId('gallery','id_gallery') : ((int)Tools::getValue('id_gallery') > 0 ? (int)Tools::getValue('id_gallery') : 0),
                    )
                ));
             } 
             if (count($errors))
             {
                if($newImage && file_exists($newImage))
                    @unlink($newImage); 
                if($newThumb && file_exists($newThumb))
                    @unlink($newThumb); 
                $this->errorMessage = $this->displayError($errors);  
             }
             elseif (Tools::isSubmit('saveGallery') && Tools::isSubmit('id_gallery'))
    			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_gallery='.Tools::getValue('id_gallery').'&control=gallery');
    		 elseif (Tools::isSubmit('saveGallery'))
             {
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=3&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_gallery='.$this->getMaxId('gallery','id_gallery').'&control=gallery');
             }
        }
        public function hookModuleRoutes($params) {
            $subfix = (int)Configuration::get('YBC_BLOG_FREE_URL_SUBFIX') ? '.html' : '';
            $blogAlias = Configuration::get('YBC_BLOG_FREE_ALIAS',$this->context->language->id);
            if(!$blogAlias)
                return array();
            $routes = array(
                'ybcblogmainpage' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias,
                    'keywords' => array(),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'ybcblogfeaturedpostspage' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/{page}',
                    'keywords' => array(
                        'page' =>    array('regexp' => '[0-9]+', 'param' => 'page'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),                
                'ybcblogpost' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_POST',$this->context->language->id)) ? $subAlias : 'post').'/{id_post}-{url_alias}'.$subfix,
                    'keywords' => array(
                        'id_post' =>    array('regexp' => '[0-9]+', 'param' => 'id_post'),
                        'url_alias'       =>   array('regexp' => '[_a-zA-Z0-9-]+','param' => 'url_alias'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'categoryblogpost' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_CATEGORY',$this->context->language->id)) ? $subAlias : 'category').'/{id_category}-{url_alias}'.$subfix,
                    'keywords' => array(
                        'id_category' =>    array('regexp' => '[0-9]+', 'param' => 'id_category'),
                        'url_alias'       =>   array('regexp' => '[_a-zA-Z0-9-]+','param' => 'url_alias'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'categoryblogpostpage' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_CATEGORY',$this->context->language->id)) ? $subAlias : 'category').'/{page}/{id_category}-{url_alias}'.$subfix,
                    'keywords' => array(
                        'id_category' =>    array('regexp' => '[0-9]+', 'param' => 'id_category'),
                        'page' =>    array('regexp' => '[0-9]+', 'param' => 'page'),
                        'url_alias'       =>   array('regexp' => '[_a-zA-Z0-9-]+','param' => 'url_alias'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'authorblogpost' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_AUTHOR',$this->context->language->id)) ? $subAlias : 'author').'/{id_author}-{author_name}',
                    'keywords' => array(
                        'id_author' =>    array('regexp' => '[0-9]+', 'param' => 'id_author'),
                        'author_name'       =>   array('regexp' => '(.)+','param' => 'author_name'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'authorblogpostpage' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_AUTHOR',$this->context->language->id)) ? $subAlias : 'author').'/{page}/{id_author}-{author_name}',
                    'keywords' => array(
                        'id_author' =>    array('regexp' => '[0-9]+', 'param' => 'id_author'),
                        'page' =>    array('regexp' => '[0-9]+', 'param' => 'page'),
                        'author_name'       =>   array('regexp' => '(.)+','param' => 'author_name'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'categoryblogtag' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_TAG',$this->context->language->id)) ? $subAlias : 'tag').'/{tag}',
                    'keywords' => array(
                        'tag'       =>   array('regexp' => '.+','param' => 'tag'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'categoryblogtagpage' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/{page}/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_TAG',$this->context->language->id)) ? $subAlias : 'tag').'/{tag}',
                    'keywords' => array(
                        'tag'       =>   array('regexp' => '.+','param' => 'tag'),
                        'page' =>    array('regexp' => '[0-9]+', 'param' => 'page'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'categorybloglatest' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_LATEST',$this->context->language->id)) ? $subAlias : 'latest'),
                    'keywords' => array(),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                        'latest' => 'true'
                    ),
                ),
                'categorybloglatestpage' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_LATEST',$this->context->language->id)) ? $subAlias : 'latest').'/{page}',
                    'keywords' => array(                       
                        'page' =>    array('regexp' => '[0-9]+', 'param' => 'page'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                        'latest' => 'true'
                    ),
                ),
                'categoryblogsearch' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_SEARCH',$this->context->language->id)) ? $subAlias : 'search').'/{search}',
                    'keywords' => array(
                        'search'       =>   array('regexp' => '.+','param' => 'search'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'categoryblogsearchpage' => array(
                    'controller' => 'blog',
                    'rule' => $blogAlias.'/{page}/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_SEARCH',$this->context->language->id)) ? $subAlias : 'search').'/{search}',
                    'keywords' => array(
                        'search'       =>   array('regexp' => '.+','param' => 'search'),
                        'page' =>    array('regexp' => '[0-9]+', 'param' => 'page'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'categorybloggallerypage' => array(
                    'controller' => 'gallery',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_GALLERY',$this->context->language->id)) ? $subAlias : 'gallery').'/{page}',
                    'keywords' => array(
                        'page' =>    array('regexp' => '[0-9]+', 'param' => 'page'),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
                'categorybloggallery' => array(
                    'controller' => 'gallery',
                    'rule' => $blogAlias.'/'.(($subAlias = Configuration::get('YBC_BLOG_FREE_ALIAS_GALLERY',$this->context->language->id)) ? $subAlias : 'gallery'),
                    'keywords' => array(),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'ybc_blog_free',
                    ),
                ),
            );
            return $routes;
        }
        public function setMetas()
        {
            $meta = array();
            if(trim(Tools::getValue('module'))!='ybc_blog_free')
                return;
            $id_lang = $this->context->language->id;
            $meta['meta_title'] = Configuration::get('YBC_BLOG_FREE_META_TITLE',$id_lang);
            $meta['meta_description'] = Configuration::get('YBC_BLOG_FREE_META_DESCRIPTION',$id_lang);
            $meta['meta_keywords'] = Configuration::get('YBC_BLOG_FREE_META_KEYWORDS',$id_lang);
            
            $id_category = (int)Tools::getValue('id_category');
            $id_post = (int)Tools::getValue('id_post');
            
            if($id_category && $this->itemExists('category','id_category', $id_category))
            {
                $category = $this->getCategoryById($id_category);
                if($category['title'])
                    $meta['meta_title'] = $category['title'];
                if($category['meta_description'])
                    $meta['meta_description'] = $category['meta_description'];
                if($category['meta_keywords'])
                    $meta['meta_keywords'] = $category['meta_keywords'];               
            }
            elseif($id_post && $this->itemExists('post','id_post', $id_post))
            {
                $post = $this->getPostById($id_post);
                if($post['title'])
                    $meta['meta_title'] = $post['title'];
                if($post['meta_description'])
                    $meta['meta_description'] = $post['meta_description'];
                if($post['meta_keywords'])
                    $meta['meta_keywords'] = $post['meta_keywords'];  
            }
            elseif(Tools::getValue('tag'))
            {
                $meta['meta_title'] = $this->l('Tag: ').' "'.Tools::getValue('tag').'"';
            }  
            elseif(Tools::getValue('latest'))
            {
                $meta['meta_title'] = $this->l('Latest posts');
            }
            elseif(Tools::getValue('search'))
            {
                $meta['meta_title'] = $this->l('Search:').' "'.Tools::getValue('search').'"';
            } 
            elseif(Tools::getValue('controller')=='gallery')
            {
                $meta['meta_title'] = $this->l('Gallery');
            } 
            elseif(Tools::getValue('id_author'))
            {
                $employee = new Employee((int)Tools::getValue('id_author'));                
                if($employee->firstname || $employee->lastname)
                    $meta['meta_title'] = $this->l('Author: ').'"'.$employee->firstname.' '.$employee->lastname.'"';
            } 
            if(Configuration::get('YBC_BLOG_FREE_RTL_MODE')=='auto' && isset($this->context->language->is_rtl) && $this->context->language->is_rtl || Configuration::get('YBC_BLOG_FREE_RTL_MODE')=='rtl')
                $rtl = true;
            else
                $rtl = false;              
               
            if($this->is17)
            {
                $body_classes = array(
                    'lang-'.$this->context->language->iso_code => true,
                    'lang-rtl' => (bool) $this->context->language->is_rtl,
                    'country-'.$this->context->country->iso_code => true,                                   
                    'ybc_blog_free' => true,
                    'ybc_blog_free_rtl' => $rtl,
                );
                $page = array(
                    'title' => '',
                    'canonical' => '',
                    'meta' => array(
                        'title' => $meta['meta_title'],
                        'description' => $meta['meta_description'],
                        'keywords' => $meta['meta_keywords'],
                        'robots' => 'index',
                    ),
                    'page_name' => 'ybc_blog_free_page',
                    'body_classes' => $body_classes,
                    'admin_notifications' => array(),
                ); 
                $this->context->smarty->assign(array('page' => $page)); 
            }    
            else
            {
                $this->context->smarty->assign($meta);
                if($rtl) 
                    $this->context->smarty->assign(array(
                        'body_classes' => array('ybc_blog_free_rtl'),
                    ));
            }                
        }
        
        private function getAuthorById($id_employee)
        {
            return Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'employee WHERE id_employee = '.(int)$id_employee);
        }
        public function getBreadCrumb()
        {
            $id_post = (int)Tools::getValue('id_post');
            $id_category = (int)Tools::getValue('id_category');
            $id_author = (int)Tools::getValue('id_author');
            $nodes = array();
            $nodes[] = array(
                'title' => $this->l('Home'),
                'url' => $this->context->link->getPageLink('index', true),
            );
            $nodes[] = array(
                'title' => $this->l('Blog'),
                'url' => $this->getLink('blog')
            );
            if($id_category && $category = $this->getCategoryById($id_category))
            {
                $nodes[] = array(
                    'title' => $category['title'],
                    'url' => $this->getLink('blog',array('id_category' => $id_category)),                   
                );
            }
            if($id_author && $author = $this->getAuthorById($id_author))
            {
                $nodes[] = array(
                    'title' => trim(Tools::ucfirst($author['firstname']).' '.Tools::ucfirst($author['lastname'])),
                    'url' => $this->getLink('blog',array('id_author' => $id_author)),               
                );
            }
            if($id_post && $post = $this->getPostById($id_post))
            {
                $nodes[] = array(
                    'title' => $post['title'],
                    'url' => $this->getLink('blog',array('id_post' => $id_post)),                   
                );
            }
            if(Tools::getValue('controller') == 'gallery')
            {
                $nodes[] = array(
                    'title' => $this->l('Gallery'),
                    'url' => $this->getLink('gallery'),                   
                );
            }
            if(Tools::getValue('controller') == 'blog' && Tools::getValue('latest'))
            {
                $nodes[] = array(
                    'title' => $this->l('Latest posts'),
                    'url' => $this->getLink('blog',array('latest' => true)),                   
                );
            }
            if(Tools::getValue('controller') == 'blog' && Tools::getValue('tag'))
            {
                $nodes[] = array(
                    'title' => $this->l('Blog tag').': '.Tools::getValue('tag'),
                    'url' => $this->getLink('blog',array('tag' => Tools::getValue('tag'))),                    
                );
            }
            if(Tools::getValue('controller') == 'blog' && Tools::getValue('search'))
            {
                $nodes[] = array(
                    'title' => $this->l('Blog search').': '.Tools::getValue('search'),
                    'url' => $this->getLink('blog',array('search' => Tools::getValue('search'))),                     
                );
            }
            if($this->is17)
                return array('links' => $nodes,'count' => count($nodes));
            return $this->displayBreadcrumb($nodes);
        }
        public function displayBreadcrumb($nodes)
        {
            $this->smarty->assign(array('nodes' => $nodes));
            return $this->display(__FILE__, 'nodes.tpl');
        }
        private function _installTabs()
        {
            $languages = Language::getLanguages(false);
            $tab = new Tab();
            $tab->class_name = 'AdminYbcBlogFree';
            $tab->module = 'ybc_blog_free';
            $tab->id_parent = 0;            
            foreach($languages as $lang){
                    $tab->name[$lang['id_lang']] = $this->l('Blog');
            }
            $tab->save();
            $blogTabId = Tab::getIdFromClassName('AdminYbcBlogFree');
            if($blogTabId)
            {
                $subTabs = array(
                    array(
                        'class_name' => 'AdminYbcBlogFreePost',
                        'tab_name' => $this->l('Blog posts')
                    ),
                    array(
                        'class_name' => 'AdminYbcBlogFreeCategory',
                        'tab_name' => $this->l('Blog categories')
                    ),
                    array(
                        'class_name' => 'AdminYbcBlogFreeComment',
                        'tab_name' => $this->l('Blog comments')
                    ),
                    array(
                        'class_name' => 'AdminYbcBlogFreeSlider',
                        'tab_name' => $this->l('Blog Slider')
                    ),
                    array(
                        'class_name' => 'AdminYbcBlogFreeGallery',
                        'tab_name' => $this->l('Blog gallery')
                    ),
                    array(
                        'class_name' => 'AdminYbcBlogFreeSetting',
                        'tab_name' => $this->l('Settings')
                    ),
                );
                foreach($subTabs as $tabArg)
                {
                    $tab = new Tab();
                    $tab->class_name = $tabArg['class_name'];
                    $tab->module = 'ybc_blog_free';
                    $tab->id_parent = $blogTabId;            
                    foreach($languages as $lang){
                            $tab->name[$lang['id_lang']] = $tabArg['tab_name'];
                    }
                    $tab->save();
                }                
            }            
            return true;
        }
        private function _uninstallTabs()
        {
            $tabs = array('AdminYbcBlogFree','AdminYbcBlogFreePost','AdminYbcBlogFreeCategory','AdminYbcBlogFreeComment','AdminYbcBlogFreeSlider','AdminYbcBlogFreeGallery','AdminYbcBlogFreeSetting');
            if($tabs)
            foreach($tabs as $classname)
            {
                if($tabId = Tab::getIdFromClassName($classname))
                {
                    $tab = new Tab($tabId);
                    if($tab)
                        $tab->delete();
                }                
            }
            return true;
        }
        public function getRelatedPosts($id_post, $tags, $id_lang = false)
        {
            if(!$id_lang)
                $id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
            $tagElements = array();
            $limit = (int)Configuration::get('YBC_BLOG_FREE_RELATED_POST_NUMBER') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_RELATED_POST_NUMBER') : 5;
            if($tags && is_array($tags))
            {
                
                foreach($tags as $tag)
                    if($tag)
                        $tagElements[] = pSQL($tag['tag']);
                if($tagElements)
                {
                    
                    $sql = "SELECT pl.title, pl.short_description, p.*
                        FROM "._DB_PREFIX_."ybc_blog_free_tag t
                        LEFT JOIN "._DB_PREFIX_."ybc_blog_free_post p ON p.id_post = t.id_post
                        LEFT JOIN "._DB_PREFIX_."ybc_blog_free_post_lang pl ON pl.id_post = t.id_post AND pl.id_lang = ".(int)$id_lang."
                        WHERE t.tag IN ('".implode("','",$tagElements)."') AND t.id_post != ".(int)$id_post."
                        GROUP BY pl.id_post
                        ORDER BY p.sort_order ASC, p.datetime_added DESC
                        LIMIT 0,".(int)$limit."
                        ";                    
                    $posts = Db::getInstance()->executeS($sql);                                        
                    return $posts;
                }                
            }
            return false;
        }
        public function getInternalStyles()
        {
            $color = Configuration::get('YBC_BLOG_FREE_CUSTOM_COLOR');
            if(!$color) 
                $color = '#FF4C65';
            $css = file_exists(dirname(__FILE__).'/views/css/dynamic_style.css') ? Tools::file_get_contents(dirname(__FILE__).'/views/css/dynamic_style.css') : ''; 
            if($css)
                $css = str_replace('[color]',$color,$css);
            $this->smarty->assign(array('css' => $css));
            return $this->display(__FILE__, 'head.tpl');;
        }        
        public function ajaxProductSearch()
        {
            if(!Tools::isSubmit('ajaxproductsearch'))
                return;
            $query = Tools::getValue('q', false);
            if (!$query OR $query == '' OR Tools::strlen($query) < 1)
            	die();        
            /*
             * In the SQL request the "q" param is used entirely to match result in database.
             * In this way if string:"(ref : #ref_pattern#)" is displayed on the return list, 
             * they are no return values just because string:"(ref : #ref_pattern#)" 
             * is not write in the name field of the product.
             * So the ref pattern will be cut for the search request.
             */
            if($pos = strpos($query, ' (ref:'))
            	$query = Tools::substr($query, 0, $pos);
            
            $excludeIds = Tools::getValue('excludeIds', false);
            if ($excludeIds && $excludeIds != 'NaN')
            	$excludeIds = implode(',', array_map('intval', explode(',', $excludeIds)));
            else
            	$excludeIds = '';
            
            // Excluding downloadable products from packs because download from pack is not supported
            $excludeVirtuals = (bool)Tools::getValue('excludeVirtuals', false);
            $exclude_packs = (bool)Tools::getValue('exclude_packs', false);
            
            $sql = 'SELECT p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`, MAX(image_shop.`id_image`) id_image, il.`legend`
            		FROM `'._DB_PREFIX_.'product` p
            		LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.id_product = p.id_product AND pl.id_lang = '.(int)Context::getContext()->language->id.Shop::addSqlRestrictionOnLang('pl').')
            		LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product`)'.
            		Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
            		LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)Context::getContext()->language->id.')
            		WHERE (pl.name LIKE \'%'.pSQL($query).'%\' OR p.reference LIKE \'%'.pSQL($query).'%\')'.
            		(!empty($excludeIds) ? ' AND p.id_product NOT IN ('.$excludeIds.') ' : ' ').
            		($excludeVirtuals ? 'AND p.id_product NOT IN (SELECT pd.id_product FROM `'._DB_PREFIX_.'product_download` pd WHERE (pd.id_product = p.id_product))' : '').
            		($exclude_packs ? 'AND (p.cache_is_pack IS NULL OR p.cache_is_pack = 0)' : '').
            		' GROUP BY p.id_product';
            
            $items = Db::getInstance()->executeS($sql);
            
            $acc = (bool)Tools::isSubmit('excludeIds');
            
            if ($items && $acc)
            	foreach ($items AS $item)
            		echo trim($item['name']).(!empty($item['reference']) ? ' (ref: '.$item['reference'].')' : '').'|'.(int)($item['id_product'])."\n";
            elseif ($items)
            {
            	// packs
            	$results = array();
            	foreach ($items AS $item)
            	{
            		$product = array(
            			'id' => (int)($item['id_product']),
            			'name' => $item['name'],
            			'ref' => (!empty($item['reference']) ? $item['reference'] : ''),
            			'image' => str_replace('http://', Tools::getShopProtocol(), Context::getContext()->link->getImageLink($item['link_rewrite'], $item['id_image'], ImageType::getFormatedName('home'))),
            		);
            		array_push($results, $product);
            	}
            	echo json_encode($results);
            }
            else
            	json_encode(new stdClass);    
            die;   
       }
}