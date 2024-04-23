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
class MM_Block extends MM_Obj
{
    public $id_block;
    public $title;    
    public $title_link;
    public $content;
    public $enabled;
    public $sort_order;
    public $id_categories;
    public $id_manufacturers;
    public $id_cmss;
    public $block_type;
    public $image;
    public $custom_class;
    public $display_title;
    public $id_column;
    public $image_link;
    public $id_products;
    public static $definition = array(
		'table' => 'ets_mm_block',
		'primary' => 'id_block',
		'multilang' => true,
		'fields' => array(
			'sort_order' => array('type' => self::TYPE_INT),
            'id_column' => array('type' => self::TYPE_INT), 
            'id_categories' => array('type' => self::TYPE_STRING),   
            'id_manufacturers' => array('type' => self::TYPE_STRING),
            'id_cmss' => array('type' => self::TYPE_STRING),  
            'id_products' => array('type' => self::TYPE_STRING),            
            'enabled' => array('type' => self::TYPE_INT),
            'image' => array('type' => self::TYPE_STRING,'lang' => false),
            'block_type' => array('type' => self::TYPE_STRING),
            'display_title' => array('type' => self::TYPE_INT),
            // Lang fields
            'title' => array('type' => self::TYPE_STRING, 'lang' => true),			
            'title_link' => array('type' => self::TYPE_STRING, 'lang' => true), 
            'image_link' => array('type' => self::TYPE_STRING, 'lang' => true),   
            'content' => array('type' => self::TYPE_HTML, 'lang' => true),                
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
        $this->setFields(Ets_megamenu::$blocks);
	}
}
