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
class MM_Menu extends MM_Obj
{
    public $id_menu;
    public $title;    
    public $link;
    public $enabled;
    public $sort_order;
    public $id_category;
    public $id_manufacturer;
    public $id_cms;
    public $link_type;
    public $sub_menu_type;
    public $sub_menu_max_width;
    public $custom_class;
    public $bubble_text;
    public $bubble_text_color;
    public $bubble_background_color;
    public static $definition = array(
		'table' => 'ets_mm_menu',
		'primary' => 'id_menu',
		'multilang' => true,
		'fields' => array(
			'sort_order' => array('type' => self::TYPE_INT), 
            'id_category' => array('type' => self::TYPE_INT),   
            'id_manufacturer' => array('type' => self::TYPE_INT),
            'id_cms' => array('type' => self::TYPE_INT),
            'sub_menu_type' => array('type' => self::TYPE_STRING),
            'link_type' => array('type' => self::TYPE_STRING),
            'sub_menu_max_width' => array('type' => self::TYPE_STRING),
            'custom_class' => array('type' => self::TYPE_STRING),
            'bubble_text_color' => array('type' => self::TYPE_STRING),
            'bubble_background_color' => array('type' => self::TYPE_STRING),
            'enabled' => array('type' => self::TYPE_INT),
            // Lang fields
            'title' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true),			
            'link' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),            
            'bubble_text' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),           
        )
	);
    public	function __construct($id_item = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_item, $id_lang, $id_shop);
        $languages = Language::getLanguages(false);         
        foreach($languages as $lang)
        {
            foreach(self::$definition['fields'] as $field => $params)
            {   
                $temp = $this->$field; 
                if(isset($params['lang']) && $params['lang'] && !isset($temp[$lang['id_lang']]))
                {                      
                    $temp[$lang['id_lang']] = '';                        
                }
                $this->$field = $temp;
            }
        }
        unset($context);        
        $this->setFields(Ets_megamenu::$menus);
	}
}
